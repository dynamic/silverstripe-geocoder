<?php

namespace Dynamic\SilverStripeGeocoder;

use SilverStripe\Control\Director;
use SilverStripe\Core\Config\Config;
use SilverStripe\Core\Manifest\ModuleResourceLoader;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\ReadonlyField;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\DataExtension;
use SilverStripe\View\SSViewer;
use SilverStripe\View\ThemeResourceLoader;

class AddressDataExtension extends DataExtension
{
    /**
     * @var array
     */
    private static $db = [
        'Address' => 'Varchar(255)',
        'Address2' => 'Varchar(255)',
        'City' => 'Varchar(64)',
        'State' => 'Varchar(64)',
        'PostalCode' => 'Varchar(10)',
        'Country' => 'Varchar(2)',
        'Lat' => 'Decimal(10,7)',
        'Lng' => 'Decimal(10,7)',
    ];

    /**
     * @param FieldList $fields
     */
    public function updateCMSFields(FieldList $fields)
    {
        if ($this->owner->config()->address_tab_name) {
            $tab_name = $this->owner->config()->address_tab_name;
        } else {
            $tab_name = Config::inst()->get(AddressDataExtension::class, 'address_tab_name');
        }

        $fields->addFieldsToTab('Root.' . $tab_name, [
            TextField::create('Address'),
            TextField::create('Address2', 'Address 2'),
            TextField::create('City'),
            TextField::create('State'),
            TextField::create('PostalCode'),
            TextField::create('Country'),
            ReadonlyField::create('Lat'),
            ReadonlyField::create('Lng'),
        ]);
    }

    /**
     * Returns the full address as a simple string.
     *
     * @return string
     */
    public function getFullAddress()
    {
        $parts = [
            $this->owner->Address,
            $this->owner->Address2,
            $this->owner->City,
            $this->owner->State,
            $this->owner->PostalCode,
            $this->owner->Country,
        ];

        return implode(', ', array_filter($parts));
    }

    /**
     * @return bool
     */
    public function hasAddress()
    {
        return (
            $this->owner->Address
            && $this->owner->City
            && $this->owner->State
            && $this->owner->PostalCode
        );
    }

    /**
     * Returns a static google map of the address, linking out to the address.
     *
     * @param int $width (optional)
     * @param int $height (optional)
     * @param int $scale (optional)
     *
     * @return string
     */
    public function AddressMap($width = 320, $height = 240, $scale = 1)
    {
        $styleJSON = static::getMapStyleJSONPath();
        $style = false;
        if ($styleJSON !== false) {
            $style = $this->mapStylesUrlArgs(file_get_contents($styleJSON));
        }

        $icon = Director::absoluteURL(static::getIconImage(false));

        $data = $this->owner->customise([
            'Width' => $width,
            'Height' => $height,
            'Scale' => $scale,
            'Address' => rawurlencode($this->getFullAddress()),
            'Style' => $style,
            'Icon' => $icon,
            'Key' => Config::inst()->get(GoogleGeocoder::class, 'geocoder_api_key'),
        ]);

        return $data->renderWith('Dynamic/Geocoder/AddressMap');
    }

    /**
     * @return bool|string
     */
    public static function getMapStyleJSONPath()
    {
        if ($styleJSON = static::getMapStyleJSON()) {
            return BASE_PATH . DIRECTORY_SEPARATOR . $styleJSON;
        }

        return false;
    }

    /**
     * Gets the style of the map
     * @return string|null
     */
    public static function getMapStyleJSON()
    {
        $folders = [
            'client/dist/js/',
            'client/dist/javascript/',
            'dist/js/',
            'dist/javascript/',
            'src/javascript/thirdparty',
            'js/',
            'javascript/',
        ];
        $file = 'mapStyle.json';

        foreach ($folders as $folder) {
            if ($style = ThemeResourceLoader::inst()->findThemedResource(
                "{$folder}{$file}",
                SSViewer::get_themes()
            )) {
                return $style;
            }
        }

        return false;
    }

    /**
     * Gets the maker icon image
     * @var boolean $svg if svgs should be included
     * @return null|string
     */
    public static function getIconImage($svg = true)
    {
        $folders = [
            'client/dist/img/',
            'client/dist/images/',
            'dist/img/',
            'dist/images/',
            'img/',
            'images/',
        ];

        $extensions = [
            'png',
            'jpg',
            'jpeg',
            'gif',
        ];

        if ($svg === true) {
            array_unshift($extensions, 'svg');
        }

        $file = 'mapIcon';

        foreach ($folders as $folder) {
            foreach ($extensions as $extension) {
                if ($icon = ThemeResourceLoader::inst()->findThemedResource(
                    "{$folder}{$file}.{$extension}",
                    SSViewer::get_themes()
                )) {
                    return ModuleResourceLoader::resourceURL($icon);
                }
            }
        }

        return false;
    }

    /**
     * From https://gist.github.com/wouterds/5942b891cdad4fc90f40
     * @param $mapStyleJson
     *
     * @return string
     */
    public function mapStylesUrlArgs($mapStyleJson)
    {
        $params = [];
        foreach (json_decode($mapStyleJson, true) as $style) {
            $styleString = '';
            if (isset($style['stylers']) && count($style['stylers']) > 0) {
                $styleString .= (isset($style['featureType']) ?
                        ('feature:' . $style['featureType']) : 'feature:all') . '|';
                $styleString .= (isset($style['elementType']) ?
                        ('element:' . $style['elementType']) : 'element:all') . '|';
                foreach ($style['stylers'] as $styler) {
                    $propertyname = array_keys($styler)[0];
                    $propertyval = str_replace('#', '0x', $styler[$propertyname]);
                    $styleString .= $propertyname . ':' . $propertyval . '|';
                }
            }
            $styleString = substr($styleString, 0, strlen($styleString) - 1);
            $params[] = 'style=' . $styleString;
        }

        return implode("&", $params);
    }

    /**
     * Returns TRUE if any of the address fields have changed.
     *
     * @param int $level
     *
     * @return bool
     */
    public function isAddressChanged($level = 1)
    {
        $fields = ['Address', 'Address2', 'City', 'State', 'PostalCode', 'Country'];
        $changed = $this->owner->getChangedFields(false, $level);
        foreach ($fields as $field) {
            if (array_key_exists($field, $changed)) {
                return true;
            }
        }

        return false;
    }

    /**
     *
     */
    public function onBeforeWrite()
    {
        parent::onBeforeWrite();
        if ($this->hasAddress() && !$this->owner->config()->get('disable_geocoding')) {
            if (!$this->isAddressChanged()) {
                return;
            }
            if ($address = $this->getFullAddress()) {
                $geocoder = new GoogleGeocoder($address);
                $response = $geocoder->getResult();
                $this->owner->Lat = $response->getLatitude();
                $this->owner->Lng = $response->getLongitude();
            }
        }
    }
}
