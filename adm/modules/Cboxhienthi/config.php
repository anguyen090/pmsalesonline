<?PHP
	//LOAD LANGUAGE
	require "./modules/Cboxhienthi/language/".$_SESSION['language'].".php";
	//KIỂM TRA VÀ TẠO DATABASE CHO MODULES NÀY
		$creatDB = $db->query("
							CREATE TABLE IF NOT EXISTS `".$tbfix."boxhienthi` (
							  `boxhienthi_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
							  `boxhienthi_title` text NULL,
							  `boxhienthi_option` text NULL,
							  `boxhienthi_value` int(11) NULL,
							  `boxhienthi_by` varchar(255) NULL,
							  `boxhienthi_date` datetime NULL,
							  `boxhienthi_ip` varchar(255) NULL,
							  `boxhienthi_update_date` datetime NULL,
							  `boxhienthi_update_ip` varchar(255) NULL,
							  `boxhienthi_order` int(11) NULL,
							  `boxhienthi_status` int(11) NULL,
							  `boxhienthi_editor` varchar(255) NULL,
							  `boxhienthi_lang` varchar(255) NULL,
							  PRIMARY KEY (`boxhienthi_id`)
							) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;
						");
		$creatDB = $db->query("
							CREATE TABLE IF NOT EXISTS `".$tbfix."hienthivitri` (
							  `hienthivitri_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
							  `boxhienthi_id` int(11) NULL,
							  `hienthivitri_column` text NULL,
							  `hienthivitri_content` text NULL,
							  PRIMARY KEY (`hienthivitri_id`)
							) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;
						");
	//---------------------------------------------------------------------------------
	//HIỂN THỊ MENU 
	$menu = '
		stm_aix("p2i0","p1i0",[0,"'.$language['boxhienthi'].'        ","","",-1,-1,0,"","_self","","","","",6,0,0,"js_css/menu/arrow_r.gif","js_css/menu/arrow_w.gif",7,7]);
		stm_bpx("p3","p1",[1,2,-3,0,2,3,0]);
		stm_aix("p3i0","p1i0",[0,"'.$language['boxhienthi_manager'].' 			       ","","",-1,-1,0,"index.php?option=boxhienthi"]);
		stm_aix("p3i0","p1i0",[0,"'.$language['boxhienthi_add'].' 			       ","","",-1,-1,0,"index.php?option=boxhienthi&action=add"]);
		stm_ep();
		stm_aix("p13i3","p1i4",[]);
	';
	//CẤU HÌNH LINK CHẠY MODULES
	$linkAction = array( 
		array('boxhienthi','Cboxhienthi/boxhienthi.php' ),
		array('boxhienthiProccess','Cboxhienthi/boxhienthiProccess.php' ),
	);
?>