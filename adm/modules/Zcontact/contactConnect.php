<?PHP
//Connect
require_once ("../../../includes/dhtmlx_conn.php");
//Kiem tra dang nhap
//require_once ("../../includes/session_check.php");

//Kiem tra Language
require_once ("../../includes/lang_check_sub.php");
//LOAD LANGUAGE
require_once ("../../modules/Zcontact/language/".$_SESSION['language'].".php");


//DHTMLX Connect
require_once ("../../dhtmlx/dhtmlx_connect/grid_connector.php");
$conn = mysql_connect($server,$userdata,$db_pass);
mysql_select_db($database);
mysql_query("SET NAMES 'utf8'", $conn);

	//FORMAT BEFOR LOAD -- Select
	function formattingLoad($row){
		global $tbfix;
		
                  //formattingDATE contact_update_date
                  $data = $row->get_value("contact_update_date");
                  $row->set_value("contact_update_date",date("d/m/Y - h:i:s",strtotime($data)));
				  
                  //formattingDATE contact VIEW DETAIL
                  $data = $row->get_value("contact_id");
                  $row->set_value("contact_content","<a href='./modules/Zcontact/contactDetail.php?id=".$data."' target='_blank' onclick=\"showPopup('Thông tin liên hệ','./modules/Zcontact/contactDetail.php?id=".$data."','530','410');return false;\"><b>Xem chi tiết</b></a>");
				  
	}
	
	//FORMAT BEFOR Processing -- Update
	function CheckDataUpdate($action){
            $new_value = date("y-m-d h:i:s"); //Ngày cập nhật là ngày hiện tại
            $action->set_value("contact_update_date",$new_value);
	}
	

	$grid = new GridConnector($conn,"MySQL");
	$grid->event->attach("beforeRender","formattingLoad");
	$grid->event->attach("beforeUpdate","CheckDataUpdate");
	$grid->dynamic_loading(50);
    
    $grid->render_table($tbfix."contact","contact_id","contact_id, contact_name, contact_email, contact_phone, contact_address, contact_content, contact_update_date, contact_update_ip, contact_status"); 



?>