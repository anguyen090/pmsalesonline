<?PHP
	//LOAD LANGUAGE
	require "./modules/Fconfigemail/language/".$_SESSION['language'].".php";
	//KIỂM TRA VÀ TẠO DATABASE CHO MODULES NÀY
	$creatDB = $db->query("
							CREATE TABLE IF NOT EXISTS `".$tbfix."config_email` (
							  `email_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
							  `email_email` varchar(100) NULL,
							  `email_smtp` varchar(20) NULL,
							  `email_port` varchar(10) NULL,
							  `email_aut` varchar(10) NULL,
                              `email_pass` varchar(100)	 NULL,
							  `email_date` datetime NULL,
							  `email_ip` varchar(20) NULL,
							  `email_by` varchar(50)  NULL,
							  `email_update_date` datetime  NULL,
							  `email_update_ip` varchar(20)  NULL,
							  `email_update_by` varchar(50)  NULL,
							  `email_status` int(11)  NULL,
							  `email_editor` varchar(255)  NULL,
							  PRIMARY KEY (`email_id`)
							) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;
						");

	//HIỂN THỊ MENU 
	$menu = '
		stm_aix("p2i0","p1i0",[0,"'.$language['configemail'].'        ","","",-1,-1,0,"","_self","","","","",6,0,0,"js_css/menu/arrow_r.gif","js_css/menu/arrow_w.gif",7,7]);
		stm_bpx("p3","p1",[1,2,-3,0,2,3,0]);
		stm_aix("p3i0","p1i0",[0,"'.$language['configemail_manager'].' 			       ","","",-1,-1,0,"index.php?option=configemail"]);
		stm_aix("p3i0","p1i0",[0,"'.$language['configemail_add'].' 			       ","","",-1,-1,0,"index.php?option=configemail&action=add"]);
		stm_ep();
	';
	//CẤU HÌNH LINK CHẠY MODULES
	$linkAction = array( 
		array('configemail','Fconfigemail/configemail.php' ),
		array('configemailProccess','Fconfigemail/configemailProccess.php' ),
	);
?>