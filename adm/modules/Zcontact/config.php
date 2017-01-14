<?PHP
	//LOAD LANGUAGE
	require "./modules/Zcontact/language/".$_SESSION['language'].".php";
	//KIỂM TRA VÀ TẠO DATABASE CHO MODULES NÀY
	$creatDB = $db->query("
							CREATE TABLE IF NOT EXISTS `".$tbfix."contact` (
							  `contact_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
							  `contact_name` varchar(255)  NULL,
							  `contact_phone` varchar(255)  NULL,
							  `contact_email` varchar(255)  NULL,
							  `contact_address` text  NULL,
							  `contact_content` text  NULL,
							  `contact_date` datetime  NULL,
							  `contact_ip` varchar(255)  NULL,
							  `contact_update_date` datetime  NULL,
							  `contact_update_ip` varchar(255)  NULL,
							  `contact_status` int(11)  NULL,
							  PRIMARY KEY (`contact_id`)
							) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;
						");
	//HIỂN THỊ MENU 
	$menu = '
		stm_aix("p13i3","p1i4",[]);
		stm_aix("p2i0","p1i0",[0,"'.$language['contact'].'        ","","",-1,-1,0,"","_self","","","","",6,0,0,"js_css/menu/arrow_r.gif","js_css/menu/arrow_w.gif",7,7]);
		stm_bpx("p3","p1",[1,2,-3,0,2,3,0]);
		stm_aix("p3i0","p1i0",[0,"'.$language['contact_manager'].' 			       ","","",-1,-1,0,"index.php?option=contact"]);
		stm_ep();
	';
	//CẤU HÌNH LINK CHẠY MODULES
	$linkAction = array( 
		array('contact','Zcontact/contact.php' ),
		array('contact_proccess','Zcontact/contactProcess.php' ),
	);
?>