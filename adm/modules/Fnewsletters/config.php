<?PHP
	//LOAD LANGUAGE
	require "./modules/Fnewsletters/language/".$_SESSION['language'].".php";
	//KIỂM TRA VÀ TẠO DATABASE CHO MODULES NÀY
	$creatDB = $db->query("
							CREATE TABLE IF NOT EXISTS `".$tbfix."newsletters` (
							  `newsletters_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
							  `newsletters_email` varchar(200) NULL,
							  `newsletters_option` varchar(100) NULL,
							  `newsletters_parent` int(11) NULL,
							  `newsletters_note` text NULL,
                              `newsletters_date` datetime	 NULL,
							  `newsletters_ip` varchar(20) NULL,
							  `newsletters_update_date` datetime NULL,
							  `newsletters_update_ip` varchar(20)  NULL,
							  `newsletters_status` int(11)  NULL
							  PRIMARY KEY (`newsletters_id`)
							) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
						");

	//HIỂN THỊ MENU 
	$menu = '
		stm_aix("p2i0","p1i0",[0,"'.$language['newsletters'].'        ","","",-1,-1,0,"","_self","","","","",6,0,0,"js_css/menu/arrow_r.gif","js_css/menu/arrow_w.gif",7,7]);
		stm_bpx("p3","p1",[1,2,-3,0,2,3,0]);
		stm_aix("p3i0","p1i0",[0,"'.$language['newsletters_manager'].' 			       ","","",-1,-1,0,"index.php?option=newsletters"]);
		stm_aix("p3i0","p1i0",[0,"'.$language['newsletters_add'].' 			       ","","",-1,-1,0,"index.php?option=newsletters&action=add"]);
		stm_ep();
	';
	//CẤU HÌNH LINK CHẠY MODULES
	$linkAction = array( 
		array('newsletters','Fnewsletters/newsletters.php' ),
		array('newslettersProccess','Fnewsletters/newslettersProccess.php' ),
	);
?>