<?PHP
	//LOAD LANGUAGE
	include "./modules/Aconfiguration/language/".$_SESSION['language'].".php";
	//KIỂM TRA VÀ TẠO DATABASE CHO MODULES NÀY
	$creatDB = $db->query("
							CREATE TABLE IF NOT EXISTS `".$tbfix."configuration` (
							  `config_id` int(11) NOT NULL AUTO_INCREMENT,
							  `config_website_title` text  NULL,
							  `config_hotline` varchar(255)  NULL,
							  `config_support_yahoo` varchar(255)  NULL,
							  `config_support_skype` varchar(255)  NULL,
							  `config_timedown` date  NULL,
							  `config_timedownstatus` varchar(255)  NULL,
							  `config_logo` text  NULL,
							  `config_banner` text  NULL,
							  `config_help` text  NULL,
							  `config_faqs` text  NULL,
							  `config_company_info` text  NULL,
							  `config_contact_info` text  NULL,
							  `config_copyright` text  NULL,
							  `config_update_date` datetime  NULL,
							  `config_lang` varchar(100)  NULL,
							  PRIMARY KEY (`config_id`)
							) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0;
						");
	//KIỂM TRA ĐÃ CÓ ROW DU LIEU CHUA
	$rowCheck = $db->get_var("SELECT COUNT(*) FROM `".$tbfix."configuration` WHERE `config_lang`='".$_SESSION['language']."' ORDER BY `config_id` DESC");
	if($rowCheck==0)
	{
		$creatRow = $db->query("INSERT INTO `".$tbfix."configuration` (`config_id`, `config_update_date`, `config_lang`) VALUES (NULL,  now(), '".$_SESSION['language']."')");
	}

	//HIỂN THỊ MENU 
	$menu = '
		stm_aix("p2i0","p1i0",[0,"'.$language['configuration'].'        ","","",-1,-1,0,"","_self","","","","",6,0,0,"js_css/menu/arrow_r.gif","js_css/menu/arrow_w.gif",7,7]);
		stm_bpx("p3","p1",[1,2,-3,0,2,3,0]);
		stm_aix("p3i0","p1i0",[0,"'.$language['configuration_update'].' 			       ","","",-1,-1,0,"index.php?option=configuration"]);
		stm_ep();
		stm_aix("p13i3","p1i4",[]);
	';
	//CẤU HÌNH LINK CHẠY MODULES
	$linkAction = array( 
		array('configuration','Aconfiguration/configuration.php' ),
		array('configuration_process','Aconfiguration/configurationProcess.php' ),
	);
?>