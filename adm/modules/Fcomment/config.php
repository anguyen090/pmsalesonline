<?PHP
	//LOAD LANGUAGE
	require "./modules/Fcomment/language/".$_SESSION['language'].".php";
	//KIỂM TRA VÀ TẠO DATABASE CHO MODULES NÀY
	$creatDB = $db->query("
							CREATE TABLE IF NOT EXISTS `".$tbfix."comment` (
							  `comment_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
							  `comment_modules` varchar(255) NULL,
							  `comment_item` int(11)  NULL DEFAULT '0',
							  `comment_parent` int(11)  NULL DEFAULT '0',
							  `comment_name` varchar(255) NULL,
							  `comment_content` text NULL,
							  `comment_update_date` datetime NULL,
							  `comment_update_ip` varchar(255) NULL,
							  `comment_status` int(11)  NULL DEFAULT '0',
							  PRIMARY KEY (`comment_id`)
							) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;
						");
	//HIỂN THỊ MENU 
	$menu = '
		stm_aix("p2i0","p1i0",[0,"'.$language['comment'].'        ","","",-1,-1,0,"","_self","","","","",6,0,0,"js_css/menu/arrow_r.gif","js_css/menu/arrow_w.gif",7,7]);
		stm_bpx("p3","p1",[1,2,-3,0,2,3,0]);
		stm_aix("p3i0","p1i0",[0,"'.$language['comment_manager'].' 			       ","","",-1,-1,0,"index.php?option=comment"]);
		stm_ep();
	';
	//CẤU HÌNH LINK CHẠY MODULES
	$linkAction = array( 
		array('comment','Fcomment/comment.php' ),
	);
?>