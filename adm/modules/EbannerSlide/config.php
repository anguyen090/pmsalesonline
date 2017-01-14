<?PHP
	//LOAD LANGUAGE
	require "./modules/EbannerSlide/language/".$_SESSION['language'].".php";
	//KIỂM TRA VÀ TẠO DATABASE CHO MODULES NÀY
	$creatDB = $db->query("
							CREATE TABLE IF NOT EXISTS `".$tbfix."bannerslide` (
							  `bannerSlide_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
							  `bannerSlide_title` varchar(255) NULL,
							  `bannerSlide_link` text NULL,
							  `bannerSlide_note` text NULL,
							  `bannerSlide_content` text NULL,
                              `bannerSlide_bgcolor` varchar(20) NULL,
							  `bannerSlide_by` varchar(255) NULL,
							  `bannerSlide_images` text NULL,
							  `bannerSlide_date` datetime  NULL,
							  `bannerSlide_ip` varchar(255)  NULL,
							  `bannerSlide_update_date` datetime  NULL,
							  `bannerSlide_update_ip` varchar(255)  NULL,
							  `bannerSlide_update_by` varchar(255)  NULL,
							  `bannerSlide_order` int(11)  NULL DEFAULT '0',
							  `bannerSlide_status` int(11) NULL,
							  `bannerSlide_lang` varchar(255) NULL,
							  `bannerSlide_editor` varchar(255)  NULL,
							  PRIMARY KEY (`bannerSlide_id`)
							) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;
						");

	//HIỂN THỊ MENU 
	$menu = '
		stm_aix("p2i0","p1i0",[0,"'.$language['bannerSlide'].'        ","","",-1,-1,0,"","_self","","","","",6,0,0,"js_css/menu/arrow_r.gif","js_css/menu/arrow_w.gif",7,7]);
		stm_bpx("p3","p1",[1,2,-3,0,2,3,0]);
		stm_aix("p3i0","p1i0",[0,"'.$language['bannerSlide_manager'].' 			       ","","",-1,-1,0,"index.php?option=bannerSlide"]);
		stm_aix("p3i0","p1i0",[0,"'.$language['bannerSlide_add'].' 			       ","","",-1,-1,0,"index.php?option=bannerSlide&action=add"]);
		stm_ep();
	';
	//CẤU HÌNH LINK CHẠY MODULES
	$linkAction = array( 
		array('bannerSlide','EbannerSlide/bannerSlide.php' ),
		array('bannerSlideProccess','EbannerSlide/bannerSlideProccess.php' ),
	);
?>