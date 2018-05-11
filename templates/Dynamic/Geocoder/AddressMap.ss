<div class="addressMap">
    <a href="//maps.google.com/?q=$FullAddress">
        <img src="//maps.googleapis.com/maps/api/staticmap?size={$Width}x{$Height}&scale={$Scale}&maptype={$MapType}&markers=<% if $Icon %>icon:$Icon|<% end_if %>$FullAddress<% if $Style %>&$Style<% end_if %>&key=$Key" alt="$FullAddress.ATT" class="img-fluid" />
    </a>
</div>