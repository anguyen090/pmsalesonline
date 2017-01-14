<?PHP
	//LOAD LANGUAGE
	require "./modules/Dnoidung/language/".$_SESSION['language'].".php";
	//KIỂM TRA VÀ TẠO DATABASE CHO MODULES NÀY
	$creatDB = $db->query("
							CREATE TABLE IF NOT EXISTS `".$tbfix."loainoidung` (
							  `loainoidung_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
							  `dongnoidung_id` int(11)  NULL DEFAULT '0',
							  `loainoidung_title` varchar(255)  NULL,
							  `loainoidung_alias` varchar(255)  NULL,
							  `loainoidung_link` text  NULL,
							  `loainoidung_note` text  NULL,
							  `loainoidung_author` varchar(255)  NULL,
							  `loainoidung_by` varchar(255)  NULL,
							  `loainoidung_images` text  NULL,
							  `loainoidung_date` datetime  NULL,
							  `loainoidung_ip` varchar(255)  NULL,
							  `loainoidung_update_date` datetime  NULL,
							  `loainoidung_update_ip` varchar(255)  NULL,
							  `loainoidung_update_by` varchar(255)  NULL,
							  `loainoidung_view` int(11)  NULL DEFAULT '0',
							  `loainoidung_mainmenu` int(11)  NULL DEFAULT '0',
							  `loainoidung_submenu` int(11)  NULL DEFAULT '0',
							  `loainoidung_hot` int(11)  NULL DEFAULT '0',
							  `loainoidung_order` int(11)  NULL DEFAULT '0',
							  `loainoidung_status` int(11)  NULL DEFAULT '0',
							  `loainoidung_editor` varchar(255)  NULL,
							  `loainoidung_lang` varchar(255)  NULL,
							  PRIMARY KEY (`loainoidung_id`)
							) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;
						");
	$creatDB = $db->query("
							CREATE TABLE IF NOT EXISTS `".$tbfix."noidung` (
							  `noidung_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
							  `loainoidung_id` int(11)  NULL DEFAULT '0',
							  `noidung_title` text  NULL,
							  `noidung_alias` varchar(255)  NULL,
							  `noidung_note` text  NULL,
							  `noidung_content` longtext  NULL,
							  `noidung_author` varchar(255)  NULL,
							  `noidung_by` varchar(255)  NULL,
							  `noidung_images` text  NULL,
							  `noidung_date` datetime  NULL,
							  `noidung_ip` varchar(255)  NULL,
							  `noidung_update_date` datetime  NULL,
							  `noidung_update_ip` varchar(255)  NULL,
							  `noidung_update_by` varchar(255)  NULL,
							  `noidung_order` int(11)  NULL DEFAULT '0',
							  `noidung_view` int(11)  NULL DEFAULT '0',
							  `noidung_hot` int(11)  NULL DEFAULT '0',
							  `noidung_command` int(11)  NULL DEFAULT '0',
							  `noidung_count_command` int(11)  NULL DEFAULT '0',
							  `noidung_rate` int(11)  NULL DEFAULT '0',
							  `noidung_status` int(11)  NULL DEFAULT '0',
							  `noidung_editor` varchar(255)  NULL,
							  `noidung_lang` varchar(255)  NULL,
							  PRIMARY KEY (`noidung_id`)
							) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;
						");
		//-------------------------------------------------------------------------------------

	//HIỂN THỊ MENU 
	$menu = '
		stm_aix("p2i0","p1i0",[0,"'.$language['noidung_manager'].'        ","","",-1,-1,0,"","_self","","","","",6,0,0,"js_css/menu/arrow_r.gif","js_css/menu/arrow_w.gif",7,7]);
		stm_bpx("p3","p1",[1,2,-3,0,2,3,0]);
		stm_aix("p3i0","p1i0",[0,"'.$language['noidung_manager'].' 			       ","","",-1,-1,0,"index.php?option=noidung"]);
		stm_aix("p3i0","p1i0",[0,"'.$language['noidung_add'].' 			       ","","",-1,-1,0,"index.php?option=noidung&action=add"]);
		stm_aix("p13i3","p1i4",[]);
		stm_aix("p3i0","p1i0",[0,"'.$language['loainoidung_manager'].' 			       ","","",-1,-1,0,"index.php?option=loainoidung"]);
		stm_aix("p3i0","p1i0",[0,"'.$language['loainoidung_add'].' 			       ","","",-1,-1,0,"index.php?option=loainoidung&action=add"]);
		stm_ep();
	';
	//CẤU HÌNH LINK CHẠY MODULES
	$linkAction = array( 
		array('noidung','Dnoidung/noidung.php' ),
		array('noidungProccess','Dnoidung/noidungProccess.php' ),
		array('loainoidung','Dnoidung/loainoidung.php' ),
		array('loainoidungProccess','Dnoidung/loainoidungProccess.php' ),
	);
?>