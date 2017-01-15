<?PHP
session_start();
//Dat gia tri cho duong dan khoi dong Web admin
define('_AK_MOS_', 1 );
//Load file ket noi data
require("./includes/_mainconn.php");
//Kiem tra Language
require("./includes/lang_check.php");
//Kiem tra Language
//Load cau hinh site
	$configuration = $db->get_row("SELECT `config_id`, `config_website_title`,`config_copyright` FROM `".$tbfix."configuration` WHERE `config_lang`='".$_SESSION['language']."' LIMIT 1");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="../js_css/modules.css" media="all" />
	<link rel="stylesheet" type="text/css" href="../js_css/main.css" media="all" />

    <title><?PHP echo htmlspecialchars_decode($configuration->config_website_title); ?></title>
</head>

<body style="background:none;margin:10px;padding:10px;">
	<div style="float:right;"><a style="color:#0063d2;" href=# onclick="javascript:print()"><div style="width:80px;height:13px;background: #ffffff url(../images/printthis.jpg)"></div></a></div>

<?PHP
if(isset($_GET['option']) && $_GET['option']=="content")
{
	// Thông tin chi tiết
	$content = $db->get_row("SELECT `noidung_id`, `noidung_title`, `noidung_note`, `noidung_content`,`noidung_by`,`noidung_update_date`,`noidung_update_date` FROM `".$tbfix."noidung` WHERE `noidung_id`='".$_GET['id']."' AND `noidung_lang`='".$_SESSION['language']."' ORDER BY `noidung_update_date` DESC LIMIT 1");
?>
	<div id="news">
		<div class="newstitle" style="font-size:14px;"><b><?PHP echo $content->noidung_title;?></b></div>
			<?PHP
				echo '
					<div class="dateUpdate" style="font-size:11px;">'.$lang['update_by'].$content->noidung_by.' - '.$lang['update_datetime'].date($lang['format_datetime'],strtotime($content->noidung_update_date)).'</div>
				';
			?>
		<?PHP 
		
			echo str_replace("../","./",htmlspecialchars_decode($content->noidung_content))
		?>
	</div>
<?PHP
}
else if(isset($_GET['option']) && $_GET['option']=="products")
{
	// Thông tin chi tiết
	$sanpham = $db->get_row("SELECT `sanpham_id`,`loaisanpham_id`, `sanpham_title`, `sanpham_note`, `sanpham_content`, `sanpham_by`, `sanpham_images`,`sanpham_update_date`,DATE_FORMAT(`sanpham_update_date`,'".$lang['formatdate']."') AS `ngaycapnhat`, `sanpham_view` FROM `".$tbfix."sanpham` WHERE `sanpham_id`='".$_GET['id']."' LIMIT 1");
	//Xu l? Images
	$image="";
	$images  = $sanpham->sanpham_images;
	$image_list = explode("^_^AK^_^", $images);
	if($image_list[0])
	{
		$images = '<img class="imgNews" style="border:0px;" src="'.$image_list[0].'"/>';
	}	
?>
	<div id="news">
		<div class="newstitle"><b><?PHP echo $sanpham->sanpham_title;?></b></div>
		<?PHP 
			echo "<center>".$images."</center>";
			echo '<div style="float:left;">
				'.str_replace("../","./",htmlspecialchars_decode($sanpham->sanpham_note)).'
			</div>';
			echo '<div class="clear"></div>';
			echo str_replace("../","./",htmlspecialchars_decode($sanpham->sanpham_content));								
			echo '<div class="clear"></div>';
		?>
	</div>
<?PHP
}
else if(isset($_GET['option']) && $_GET['option']=="contact")
{
	// Thông tin chi tiết
	$contact = $db->get_row("SELECT `config_id`, `config_contact_info` FROM `".$tbfix."configuration` WHERE `config_lang`='".$_SESSION['language']."' LIMIT 1");
?>
	<div id="news">
		<div style="float:right;"><a href=# onclick="javascript:print()"><img src="../images/icon_printer.gif" style="float:left;margin-top:3px;margin-right:5px;"/><b><?PHP echo $lang['printer'];?></b></a></div>
		<div class="newstitle"><b></b></div>
		<?PHP 
			echo str_replace("../","./",htmlspecialchars_decode($contact->config_contact_info))							
		?>
	</div>
<?PHP
}
?>


<div style="clear:both;margin-top:10px;margin-bottom:10px;height:1px;font-size:1px;border-bottom:1px #000000 dashed "></div>
<?PHP echo str_replace("../","./",htmlspecialchars_decode($configuration->config_copyright)); ?>
</html>
