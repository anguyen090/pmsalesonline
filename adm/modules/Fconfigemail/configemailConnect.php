<?PHP
//Connect
require_once ("../../../includes/dhtmlx_conn.php");
//Kiem tra dang nhap
//require_once ("../../includes/session_check.php");

//Kiem tra Language
require_once ("../../includes/lang_check_sub.php");
//LOAD LANGUAGE
require_once ("../../modules/Fconfigemail/language/".$_SESSION['language'].".php");


//DHTMLX Connect
require_once ("../../dhtmlx/dhtmlx_connect/grid_connector.php");
$conn = mysql_connect($server,$userdata,$db_pass);
mysql_select_db($database);
mysql_query("SET NAMES 'utf8'", $conn);

	//FORMAT BEFOR LOAD -- Select
	function formattingLoad($row){
                  //formattingDATE configemail_update_date
                  $data = $row->get_value("email_update_date");
                  $row->set_value("email_update_date",date("d/m/Y - H:i:s",strtotime($data)));
				  
                  //formatting EDITOR
                  $data = $row->get_value("email_id");
                  $row->set_value("email_editor","<a href='index.php?option=configemail&action=update&id={$data}'>Sửa chi tiết</a>");
	}
	
	//FORMAT BEFOR Processing -- Update
	function CheckDataUpdate($action){
            $new_value = date("y-m-d H:i:s"); //Ngày cập nhật là ngày hiện tại
            $action->set_value("email_update_date",$new_value);
			
            $action->set_value("email_update_by",$_COOKIE['login_fullname']);//người cập nhật 
	}
	

	$grid = new GridConnector($conn,"MySQL");
	$grid->event->attach("beforeRender","formattingLoad");
	$grid->event->attach("beforeUpdate","CheckDataUpdate");
	$grid->dynamic_loading(50);
	
    $grid->render_table($tbfix."config_email","email_id","email_id, email_email, email_smtp, email_port, email_aut, email_update_date, email_update_ip, email_update_by, email_status, email_editor"); 



?>