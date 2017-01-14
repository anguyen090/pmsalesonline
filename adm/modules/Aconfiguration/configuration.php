<?PHP
$action = null;
if(isset($_GET['action'])){
	$action = $_GET['action'];
}
if($action == "" || $action='update')
{
 $configuration = $config->getARecord('`config_id`, `config_website_title`, `config_slogan`, `config_hotline`, `config_company_info`, `config_support_yahoo`,`config_support_skype`,`config_email`,`config_facebook`,`config_twitter`,`config_youtube`,`config_logo`, `config_contact_info`, `config_copyright`');
?>
<div id="mainContent">
    <div class="control">
        <a href="index.php"><?PHP echo $language['website_manager']?></a> <img src="imgs/arr_.gif" /> <a href="index.php?option=configuration"><?PHP echo $language['configuration']?></a> <img src="imgs/arr_.gif" /> <?PHP echo $language['configuration_update']?>
    </div>
    <div class="control">
        <a href="index.php?option=configuration&action=add"><img alt="Add New Content" src="imgs/add_.png" /> <span><?PHP echo $language['configuration_update']?></span></a>
    </div>
    <div id="content">
        <form class="form" name="form_add" method="post" action="index.php?option=configuration_process&action=add" enctype="multipart/form-data">
            <label><?PHP echo $language['configuration_title']?></label>
            	<input class="input" name="title" type="text" value="<?PHP echo  htmlspecialchars_decode($configuration->config_website_title)?>" />
            <label>Cấu hình địa chỉ website</label><br />
                <div class="small left" style="width: 30%!important;">
                    <input class="input" readonly="readonly" type="text" value="http://<?PHP echo $_SERVER['HTTP_HOST']; ?>" />
                </div>
                <div style="width: 2%;float: left;height: 30px;line-height: 30px; text-align: center;">
                    /
                </div>
                <div class="right">
                    <input class="input" style="width: 380px;" name="url" type="text" value="<?PHP echo  htmlspecialchars_decode($config->getConfig('config_website_url')); ?>" />
                </div>
                <div style="clear: both;"></div>
            <label>Mô tả về website</label>
                  <textarea name="company_info" class="input" style="height:150px"><?PHP echo htmlspecialchars_decode($configuration->config_company_info)?></textarea>
            <label><?PHP echo $language['configuration_hotline']?></label>
            	<input class="input" name="hotline" type="text" value="<?PHP echo  htmlspecialchars_decode($configuration->config_hotline)?>" />
    		<label><?PHP echo $language['configuration_logo']?></label>
                  <textarea name="config_logo" class="input" style="height:300px"><?PHP echo htmlspecialchars_decode($configuration->config_logo)?></textarea>
    		<label><?PHP echo $language['configuration_contact']?></label>
                  <textarea name="contact_info" class="input" style="height:300px"><?PHP echo htmlspecialchars_decode($configuration->config_contact_info)?></textarea>
            <label><?PHP echo $language['configuration_copyright']?></label>
                  <textarea name="copyright" class="input" style="height:300px"><?PHP echo htmlspecialchars_decode($configuration->config_copyright)?></textarea>
    		<label>Giao diện mặt định</label>
            <select name="themes" id="themes" class="input">
                <?php
                    $template = $themes->getAll('themes_id,themes_name');
                    foreach($template as $item){
                        echo '<option value="'.$item->themes_id.'" >'.$item->themes_name.'</option>';
                    }
                ?>
                
            </select>
			<label>Fanpage (Chỉ được chèn fanpage, link facebook cá nhân không được)</label>
			<input class="input" name="fanpage" id="fanpage" type="text" placeholder="https://facebook.com/fanpagename" value="<?PHP echo $config->getConfig('config_fanpage'); ?>" />
            <label>Youtube (Chèn id trang Youtube của bạn)</label>
			<input class="input" name="youtube" id="youtube" type="text" placeholder="UCcTV71gmfH-X7ki-bO8tabA" value="<?PHP echo $config->getConfig('config_youtube'); ?>" />
            <div class="language">
                <?PHP include_once "./language/languageCheckbox.php";?>
            </div>
            <div class="buttonAction">
                <input class="button" type="submit" name="submit" id="submit" value="<?PHP echo $language['btn_update']?>" />
            </div>
        </form>
        <div class="clr"></div>
    </div> <!-- END div content id-->
</div><!-- END div mainContent id-->
<?PHP
}
else
{
?>
<script type="text/javascript">
    alert("<?PHP echo $language['find_not_found']?>");
    window.history.back();
</script>
<?PHP
}
?>
