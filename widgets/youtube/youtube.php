<div id="widgetContent" class="youtube" style="padding: 10px 0px;border: 0px;text-align: center;">
<script src="https://apis.google.com/js/platform.js"></script>
<?php
	$config = new Configuration();
    if($config->getConfig('config_youtube')!=''){
        echo '<div class="g-ytsubscribe" data-channelid="'.$config->getConfig('config_youtube').'" data-layout="full" data-count="default"></div>';
    }
?>
</div>