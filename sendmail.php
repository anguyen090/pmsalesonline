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
	$configuration = $db->get_row("SELECT `config_id`, `config_website_title`,`config_copyright` FROM `".$tbfix."configuration` LIMIT 1");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title><?PHP echo $configuration->config_website_title; ?></title>
    <link rel="stylesheet" type="text/css" href="./js_css/main.css" media="all" />
    <link rel="stylesheet" type="text/css" href="./js_css/modules.css" media="all" />
	<script src="./js_css/jquery-1.4.2.min.js" type="text/javascript" charset="utf-8"></script>
	<!--[if lt IE 7]>
	<link rel="stylesheet" href="./js_css/highslide/highslide-ie6.css" type="text/css" />
	<script language="JavaScript">
	function correctPNG() // correctly handle PNG transparency in Win IE 5.5 & 6.
	{
	   var arVersion = navigator.appVersion.split("MSIE")
	   var version = parseFloat(arVersion[1])
	   if ((version >= 5.5) && (document.body.filters)) 
	   {
		  for(var i=0; i<document.images.length; i++)
		  {
			 var img = document.images[i]
			 var imgName = img.src.toUpperCase()
			 if (imgName.substring(imgName.length-3, imgName.length) == "PNG")
			 {
				var imgID = (img.id) ? "id='" + img.id + "' " : ""
				var imgClass = (img.className) ? "class='" + img.className + "' " : ""
				var imgTitle = (img.title) ? "title='" + img.title + "' " : "title='" + img.alt + "' "
				var imgStyle = "display:inline-block;" + img.style.cssText 
				if (img.align == "left") imgStyle = "float:left;" + imgStyle
				if (img.align == "right") imgStyle = "float:right;" + imgStyle
				if (img.parentElement.href) imgStyle = "cursor:hand;" + imgStyle
				var strNewHTML = "<span " + imgID + imgClass + imgTitle
				+ " style=\"" + "width:" + img.width + "px; height:" + img.height + "px;" + imgStyle + ";"
				+ "filter:progid:DXImageTransform.Microsoft.AlphaImageLoader"
				+ "(src=\'" + img.src + "\', sizingMethod='scale');\"></span>" 
				img.outerHTML = strNewHTML
				i = i-1
			 }
		  }
	   }    
	}
	window.attachEvent("onload", correctPNG);
	</script>
	<![endif]-->	
</head>

<body style="background:none;margin:10px;">
<?PHP
//KHI SUBMIT FORM
if(isset($_POST['action']) and $_POST['action']=="^_^AK^_^")
{
	if($_SESSION['security_code'] == $_POST['captcha'] && !empty($_SESSION['security_code'] ))
	{
		//THUC HIỆN GỞI MAIL
		$namefrom 	= $_POST['namefrom'];
		$emailfrom 	= $_POST['emailfrom'];
		$nameto 	= $_POST['nameto'];
		$emailto 	= $_POST['emailto'];
		$subject 	= $_POST['title'];
		$content 	= $_POST['content'];
				//thực hiện tạo email để kích hoạt mật khẩu mới
				require("./includes/class.phpmailer.php");
				// Send the email
				 $mail = new PHPMailer();
				 $mail->IsSMTP();   // send via SMTP
				 $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
				 $mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
				 $mail->Port       = 465;             
				 $mail->SMTPAuth = true;     // turn on SMTP authentication
				 $mail->Username = "admin@namsonghau.com";  // SMTP username
				 $mail->Password = "h@obi`nh0610"; // SMTP password
				 $mail->From     ="admin@namsonghau.com";
				 $mail->FromName = $namefrom."-".$emailfrom;
				 $mail->AddAddress($emailto,""); //$email là địa chỉ email mà bạn muốn gởi
				 $mail->IsHTML(true);                               // send as HTML

				 $mail->Subject  =  $subject;
				 // HTML body
				 $body  = '
							Email From: '.$namefrom."-".$emailfrom.', <br><br>				 
							Chào '.$nameto.'!,<br><br>
							'.$content.'
				 ';

				 // Plain text body (for mail clients that cannot read HTML)
				 $text_body  = '
							Email From: '.$namefrom."-".$emailfrom.', \n\n
							Chao '.$nameto.'!,\n\n
							'.chuyendoi($content).'				 
				 ';

				 $mail->Body    = $body;
				 $mail->AltBody = $text_body;

				if(!$mail->Send())
				 {
					$thongbao	= "Lỗi: Không thể gởi Email đến ".$email."<br>".$mail->ErrorInfo;
					exit();
				 }
			//Chuyển trang khi gởi email xong
				echo '<center><br><br><b>E-mail của bạn đã được gởi thành công!!!!</b><br>Click <a href=# onclick="return hs.close(this)">CLOSE</a> để đóng cửa sổ này</center>';
	}
	else {
		echo '<script language="javascript">alert("Mã xác nhận không chính xác !\n Vui lòng gởi lại!");window.history.back();</script>';
		exit();
	}
}
else
{
?>
<script type="text/javascript" src="./adm/js_css/tiny_mce/tiny_mce.js"></script> 
<script type="text/javascript">
	// Creates a new plugin class and a custom listbox 
	// Initialize TinyMCE with the new plugin and product_type button 
	tinyMCE.init({ 
	mode : "textareas", 
	theme : "advanced", 
	plugins : 'fullscreen,preview,inlinepopups', // - tells TinyMCE to skip the loading of the plugin 
	
	// Theme options
		theme_advanced_buttons1 : "mybutton,bold,italic,justifyleft,justifycenter,justifyright,justifyfull,underline,separator,strikethrough,forecolor,backcolor",
		theme_advanced_buttons2 : "undo,redo,fontselect,fontsizeselect,justifyfull,fullscreen",
		theme_advanced_buttons3 : "",
	theme_advanced_toolbar_location : "top", 
	theme_advanced_toolbar_align : "left", 
	theme_advanced_statusbar_location : "bottom"  
	}); 
</script>
	<form id=contact name="contactFrom" method="POST" action="sendmail.php">
		<input type="hidden" name="action" value="^_^AK^_^"/>
		<table border=0 width=450>
			<tr>
				<td align=center colspan=2><h3>GỞI MAIL</h3></td>
			</tr>
			<tr>
				<td valign="top" width=150>Họ tên người gởi: </td><td width=300><input style="width:250px;" name="namefrom"></td>
			</tr>
			<tr>
				<td valign="top">Email người gởi: </td><td><input style="width:250px;" name="emailfrom"></td>
			</tr>
			<tr>
				<td valign="top">Họ tên người nhận: </td><td><input style="width:250px;" name="nameto"></td>
			</tr>
			<tr>
				<td valign="top">Email người nhận: </td><td><input style="width:250px;" name="emailto"></td>
			</tr>
			<tr>
				<td valign="top">Tiêu đề E-mail: </td><td><input style="width:250px;" name="title" value="<?PHP echo $configuration->config_website_title; ?>"></td>
			</tr>
			<td colspan=2 height="5px"></td>
			<tr>
				<td valign="top">Nội dung: </td><td><textarea name="content" style="width:250px;height:120px;">Tôi tìm được trên mạng có tin này rất hay! nên gởi cho bạn xem nè!<br>
				Click chuột <a href="http://<?PHP echo str_replace("^_^","&",$_GET['link']); ?>" >vào đây </a>để xem chi tiết nhé!
				<br><br>
				Bạn cũng có thể copy liên kết sau vào trình duyệt để xem: <br>
				http://<?PHP echo str_replace("^_^","&",$_GET['link']); ?>
				</textarea><br></td>
			</tr>
			<tr>
				<td colspan=2>Nhập mã xác nhận</td>
			</tr>
			<tr>
				<td valign="top"><img src="./includes/captcha/CaptchaSecurityImages.php?width=150&height=20&characters=6" alt="" /></td><td valign="top"><input  type="text" name="captcha"/></td>
			</tr>
			<tr>
				<td colspan=2 valign=top style="padding-left:100px;padding-top:10px;"><input style="clear:both;" name=".:: Gởi E-mail ::." type="submit" value=".:: Gởi E-mail ::." onclick="javascript:document.contactFrom.submit();" /></td>
			</tr>
		</table>
	</form>
<?PHP
}
?>
</body>
</html>
