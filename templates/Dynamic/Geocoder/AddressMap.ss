<div class="addressMap">
    <a href="//maps.google.com/?q=$Address">
        <img src="//maps.googleapis.com/maps/api/staticmap?size={$Width}x{$Height}&scale={$Scale}&maptype={$MapType}&markers=<% if $Icon %>icon:$Icon|<% end_if %>$Address<% if $Style %>&$Style<% end_if %>&key=$Key" alt="$FullAddress.ATT" />
    </a>
</div>
