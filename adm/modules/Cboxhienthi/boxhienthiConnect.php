<?PHP
//Connect
require_once ("../../../includes/dhtmlx_conn.php");
//Kiem tra dang nhap
//require_once ("../../includes/session_check.php");

//Kiem tra Language
require_once ("../../includes/lang_check_sub.php");
//LOAD LANGUAGE
require_once ("../../modules/Cboxhienthi/language/".$_SESSION['language'].".php");


//DHTMLX Connect
require_once ("../../dhtmlx/dhtmlx_connect/grid_connector.php");
$conn = mysql_connect($server,$userdata,$db_pass);
mysql_select_db($database);
mysql_query("SET NAMES 'utf8'", $conn);

	//FORMAT BEFOR LOAD
	function formattingLoad($row){
                  //formattingDATE boxhienthi_update_date
                  $data = $row->get_value("boxhienthi_update_date");
                  $row->set_value("boxhienthi_update_date",date("d/m/Y - h:i:s",strtotime($data)));
				  
                  //formatting EDITOR
                  $data = $row->get_value("boxhienthi_id");
                  $row->set_value("boxhienthi_editor","<a href='index.php?option=boxhienthi&action=update&id={$data}'>Sửa chi tiết</a>");
	}
	//FORMAT BEFOR Processing
	function CheckDataUpdate($action){
            $new_value = date("y-m-d h:i:s"); //Ngày cập nhật là ngày hiện tại
            $action->set_value("boxhienthi_update_date",$new_value);
			
            $action->set_value("boxhienthi_by",$_COOKIE['login_fullname']);//người cập nhật 
	}
	

$grid = new GridConnector($conn,"MySQL");
$grid->event->attach("beforeRender","formattingLoad");
$grid->event->attach("beforeUpdate","CheckDataUpdate");
$grid->dynamic_loading(50);
$grid->render_table($tbfix."boxhienthi","boxhienthi_id","boxhienthi_id, boxhienthi_title, boxhienthi_option, boxhienthi_by, boxhienthi_update_date, boxhienthi_update_ip, boxhienthi_lang, boxhienthi_order, boxhienthi_status, boxhienthi_editor");



?>