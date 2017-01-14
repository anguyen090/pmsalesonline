<?PHP
	//LOAD LANGUAGE
	require "./modules/Aconfiguration/language/".$_SESSION['language'].".php";
	//LOAD CẤU HÌNH
	require "./modules/Aconfiguration/config.php";
    $config = new Configuration();
?>
<?PHP
		$title 				= htmlspecialchars($_POST['title'], ENT_QUOTES);
		$config_logo		= htmlspecialchars($_POST['config_logo'], ENT_QUOTES);
        $slogan			    = htmlspecialchars($_POST['slogan'], ENT_QUOTES);
		$hotline			= htmlspecialchars($_POST['hotline'], ENT_QUOTES);
		$email				= htmlspecialchars($_POST['email'], ENT_QUOTES);
		$facebook			= htmlspecialchars($_POST['facebook'], ENT_QUOTES);
		$twitter			= htmlspecialchars($_POST['twitter'], ENT_QUOTES);
		$youtube			= htmlspecialchars($_POST['youtube'], ENT_QUOTES);
		$contact_info 		= htmlspecialchars($_POST['contact_info'], ENT_QUOTES);
        $description		= htmlspecialchars($_POST['company_info'], ENT_QUOTES);
		$copyright 			= htmlspecialchars($_POST['copyright'], ENT_QUOTES);
        $fanpage            = htmlspecialchars($_POST['fanpage'], ENT_QUOTES);
        $url_website        = htmlspecialchars($_POST['url'], ENT_QUOTES);
		//Language
		$lang_data			= (isset($_POST['language']) || $_POST['language']!="") ? $_POST['language'] : $_SESSION['language'];
		$config->setConfig_website_title($title);
        $config->setConfig_website_url($url_website);
        $config->setConfig_fanpage($fanpage);
        $config->setConfig_slogan($slogan);
        $config->setConfig_hotline($hotline);
        $config->setConfig_email($email);
        $config->setConfig_facebook($facebook);
        $config->setConfig_twitter($twitter);
        $config->setConfig_youtube($youtube);
        $config->setConfig_logo($config_logo);
        $config->setConfig_company_info($description);
        $config->setConfig_contact_info($contact_info);
        $config->setConfig_copyright($copyright);
        $config->getConfig_update_date(date('Y-m-d h:i:s'));
        
        $update = $config->update($lang_data);
        
        if(!$update){
			echo '<script language="javascript">alert("'.$language['confirm_update_error'].'");window.history.back();</script>';
			exit();
        }
		
?>
		<script>
				if(confirm("<?PHP echo $language['confirm_update_ok']?>"))
					document.location="index.php?option=configuration&action=update";
				else
					document.location="index.php";
		</script>

