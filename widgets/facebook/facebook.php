<div id="widgetContent" style="padding: 0px;">
<?php

    $config = new Configuration();
    if($config->getConfig('config_fanpage') != ""){

?>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <div class="fb-page" data-href="<?php echo $config->getConfig('config_fanpage'); ?>" data-tabs="event" data-width="310" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div>
<?php
    }
?>
</div>