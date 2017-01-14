<?PHP
	//LOAD LANGUAGE
	require "./modules/Bwidget/language/".$_SESSION['language'].".php";
	//KIỂM TRA VÀ TẠO DATABASE CHO MODULES NÀY
	$creatDB = $db->query("
							CREATE TABLE IF NOT EXISTS `".$tbfix."widget` (
							  `widget_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
							  `widget_code` varchar(255) NULL,
							  `widget_modules` varchar(255) NULL,
							  `widget_title` text NULL,
							  `widget_content` text NULL,
							  `widget_style` int(11) NULL,
							  `widget_type` int(11) NULL,
							  `widget_state` varchar(255) NULL,
							  `widget_info` text NULL,
							  `widget_soluong` int(11) NULL,
							  `widget_by` varchar(255) NULL,
							  `widget_date` datetime NULL,
							  `widget_ip` varchar(255) NULL,
							  `widget_update_date` datetime NULL,
							  `widget_update_ip` varchar(255) NULL,
							  `widget_order` int(11) NULL,
							  `widget_status` int(11) NULL,
							  `widget_editor` varchar(255) NULL,
							  `widget_lang` varchar(255) NULL,
							  PRIMARY KEY (`widget_id`)
							) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;
						");
	//---------------------------------------------------------------------------------
	//HIỂN THỊ MENU 
	$menu = '
		stm_aix("p2i0","p1i0",[0,"'.$language['widget'].'        ","","",-1,-1,0,"","_self","","","","",6,0,0,"js_css/menu/arrow_r.gif","js_css/menu/arrow_w.gif",7,7]);
		stm_bpx("p3","p1",[1,2,-3,0,2,3,0]);
		stm_aix("p3i0","p1i0",[0,"'.$language['widget_manager'].' 			       ","","",-1,-1,0,"index.php?option=widget"]);
		stm_aix("p3i0","p1i0",[0,"'.$language['widget_add'].' 			       ","","",-1,-1,0,"index.php?option=widget&action=add"]);
		stm_ep();
	';
	//CẤU HÌNH LINK CHẠY MODULES
	$linkAction = array( 
		array('widget','Bwidget/widget.php' ),
		array('widgetProccess','Bwidget/widgetProccess.php' ),
	);
	
	//Kiểm tra thư mục widgets xem có widgets nào cài đặt sẳn hok!?
		foreach (glob("../widgets/*/config.php",GLOB_BRACE) as $filename) {
			require_once $filename;
			//Kiểm tra xem widget này đã có trong data chưa!?
			$countThis = $db->get_var("SELECT COUNT(*) FROM `".$tbfix."widget` WHERE `widget_code`='".$widget_code."'");
			if($countThis==0)
			{
				//lưu vào csdl
				$insertWidget = $db->query("INSERT INTO `".$tbfix."widget` 
					(`widget_id`, `widget_title`, `widget_code`, `widget_modules`, `widget_content`, `widget_style`, `widget_by`, `widget_date`, `widget_ip`, `widget_update_date`, `widget_update_ip`, `widget_order`, `widget_status`,`widget_lang`) VALUES 
					(NULL ,'$widget_title', '$widget_code', '$widget_modules', '$widget_filename', '$widget_style','".$_COOKIE['login_fullname']."', now(), '".$_SERVER['REMOTE_ADDR']."', now(), '".$_SERVER['REMOTE_ADDR']."', '0', '1','vietnam')");
			}
			
		}
?>