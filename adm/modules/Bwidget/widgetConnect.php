<?PHP
//Connect
require_once ("../../../includes/dhtmlx_conn.php");
//Kiem tra dang nhap
//require_once ("../../includes/session_check.php");

//Kiem tra Language
require_once ("../../includes/lang_check_sub.php");
//LOAD LANGUAGE
require_once ("../../modules/Bwidget/language/".$_SESSION['language'].".php");


//DHTMLX Connect
require_once ("../../dhtmlx/dhtmlx_connect/grid_connector.php");
$conn = mysql_connect($server,$userdata,$db_pass);
mysql_select_db($database);
mysql_query("SET NAMES 'utf8'", $conn);

	//FORMAT BEFOR LOAD
	function formattingLoad($row){
      //formattingDATE widget_update_date
      $data = $row->get_value("widget_update_date");
      $row->set_value("widget_update_date",date("d/m/Y - h:i:s",strtotime($data)));
	  
      //formatting EDITOR
      $data = $row->get_value("widget_id");
      $row->set_value("widget_editor","<a href='index.php?option=widget&action=update&id={$data}'>Sửa chi tiết</a>");
	}
	//FORMAT BEFOR Processing
	function CheckDataUpdate($action){
            $new_value = date("y-m-d h:i:s"); //Ngày cập nhận là ngày hiện tại
            $action->set_value("widget_update_date",$new_value);
	}
	

$grid = new GridConnector($conn,"MySQL");
$grid->event->attach("beforeRender","formattingLoad");
$grid->event->attach("beforeUpdate","CheckDataUpdate");
$grid->dynamic_loading(50);
$grid->render_table($tbfix."widget","widget_id","widget_id, widget_title, widget_modules, widget_by, widget_update_date, widget_update_ip, widget_lang, widget_order, widget_status, widget_editor");



?>