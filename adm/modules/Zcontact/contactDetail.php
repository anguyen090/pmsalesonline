<?PHP
//Kiem tra dang nhap
include("../../includes/session_check.php");
//-------------------------------------------
require("../../../includes/dhtmlx_conn.php");
//Kiem tra Language
require("../../includes/lang_check_sub.php");
//LOAD LANGUAGE
include "../../modules/Zcontact/language/".$_SESSION['language'].".php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Untitled Document</title>
        <link type="text/css" rel="stylesheet" href="js_css/main.css" />
    </head>
    <body style="background:#fff;padding:20px;">
		<?PHP
			$updateStatus = $db->query("UPDATE `".$tbfix."contact` SET `contact_status`='1' WHERE `contact_id`='".$_GET['id']."' LIMIT 1");
			//lay thong tin clip tu ID
			$contactDetail = $db->get_row("SELECT  `contact_id`, `contact_name`, `contact_address`, `contact_email`, `contact_phone`,`contact_content`,`contact_date`, `contact_ip`, `contact_update_date`, `contact_update_ip`, `contact_status` from `".$tbfix."contact` WHERE `contact_id`='".$_GET['id']."' LIMIT 1");
		?>
		<table width="90%" border="0" cellspacing="0" cellpadding="0" style="margin:20px;">
		  <tr>
		    <td valign=top width="150px"><?PHP echo $language['contact_fullname']?></td>
		    <td valign=top><b><?PHP echo $contactDetail->contact_name?></b></td>
	      </tr>
		  <tr>
		    <td valign=top><?PHP echo $language['contact_address']?></td>
		    <td valign=top><b><?PHP echo $contactDetail->contact_address?></b></td>
	      </tr>
		  <tr>
		    <td valign=top><?PHP echo $language['contact_email']?></td>
		    <td valign=top><b><?PHP echo $contactDetail->contact_email?></b></td>
	      </tr>
		  <tr>
		    <td valign=top><?PHP echo $language['contact_phone']?></td>
		    <td valign=top><b><?PHP echo $contactDetail->contact_phone?></b></td>
	      </tr>
		  <tr>
		    <td valign=top>&nbsp;</td>
		    <td valign=top>&nbsp;</td>
	      </tr>
		  <tr>
		    <td valign=top><?PHP echo $language['contact_content']?></td>
		    <td valign=top><?PHP echo $contactDetail->contact_content?></td>
	      </tr>
</table>
    </body>
</html>
