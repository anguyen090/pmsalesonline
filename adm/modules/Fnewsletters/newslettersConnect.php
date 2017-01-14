<?PHP
//Connect
require_once ("../../../includes/dhtmlx_conn.php");
//Kiem tra dang nhap
//require_once ("../../includes/session_check.php");

//Kiem tra Language
require_once ("../../includes/lang_check_sub.php");
//LOAD LANGUAGE
require_once ("../../modules/Fnewsletters/language/".$_SESSION['language'].".php");


//DHTMLX Connect
require_once ("../../dhtmlx/dhtmlx_connect/grid_connector.php");
$conn = mysql_connect($server,$userdata,$db_pass);
mysql_select_db($database);
mysql_query("SET NAMES 'utf8'", $conn);

	//FORMAT BEFOR LOAD -- Select
	function formattingLoad($row){
                  //formattingDATE newsletters_update_date
                  $data = $row->get_value("newsletters_update_date");
                  $row->set_value("newsletters_update_date",date("d/m/Y - H:i:s",strtotime($data)));
				  
                  //formatting EDITOR
                  $data = $row->get_value("newsletters_id");
                  $row->set_value("newsletters_editor","<a href='index.php?option=newsletters&action=update&id={$data}'>Sửa chi tiết</a>");
	}
	
	//FORMAT BEFOR Processing -- Update
	function CheckDataUpdate($action){
            $new_value = date("y-m-d H:i:s"); //Ngày cập nhật là ngày hiện tại
            $action->set_value("newsletters_update_date",$new_value);
	}
	

	$grid = new GridConnector($conn,"MySQL");
	$grid->event->attach("beforeRender","formattingLoad");
	$grid->event->attach("beforeUpdate","CheckDataUpdate");
	$grid->dynamic_loading(50);
	
    $grid->render_table($tbfix."newsletters","newsletters_id","newsletters_id, newsletters_email, newsletters_option, newsletters_parent, newsletters_update_date, newsletters_update_ip, newsletters_status, newsletters_editor"); 



?>