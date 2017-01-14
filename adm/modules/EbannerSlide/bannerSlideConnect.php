<?PHP
//Connect
require_once ("../../../includes/dhtmlx_conn.php");
//Kiem tra dang nhap
//require_once ("../../includes/session_check.php");

//Kiem tra Language
require_once ("../../includes/lang_check_sub.php");
//LOAD LANGUAGE
require_once ("../../modules/EbannerSlide/language/".$_SESSION['language'].".php");


//DHTMLX Connect
require_once ("../../dhtmlx/dhtmlx_connect/grid_connector.php");
$conn = mysql_connect($server,$userdata,$db_pass);
mysql_select_db($database);
mysql_query("SET NAMES 'utf8'", $conn);

	//FORMAT BEFOR LOAD -- Select
	function formattingLoad($row){
                  //formattingDATE bannerSlide_update_date
                  $data = $row->get_value("bannerSlide_update_date");
                  $row->set_value("bannerSlide_update_date",date("d/m/Y - H:i:s",strtotime($data)));
				  
                  //formatting EDITOR
                  $data = $row->get_value("bannerSlide_id");
                  $row->set_value("bannerSlide_editor","<a href='index.php?option=bannerSlide&action=update&id={$data}'>Sửa chi tiết</a>");
	}
	
	//FORMAT BEFOR Processing -- Update
	function CheckDataUpdate($action){
            $new_value = date("y-m-d H:i:s"); //Ngày cập nhật là ngày hiện tại
            $action->set_value("bannerSlide_update_date",$new_value);
			
            $action->set_value("bannerSlide_by",$_COOKIE['login_fullname']);//người cập nhật 
	}
	

	$grid = new GridConnector($conn,"MySQL");
	$grid->event->attach("beforeRender","formattingLoad");
	$grid->event->attach("beforeUpdate","CheckDataUpdate");
	$grid->dynamic_loading(50);
	
    $grid->render_table($tbfix."bannerslide","bannerSlide_id","bannerSlide_id, bannerSlide_title, bannerSlide_by, bannerSlide_update_date, bannerSlide_update_ip, bannerSlide_lang, bannerSlide_order, bannerSlide_status, bannerSlide_editor"); 



?>