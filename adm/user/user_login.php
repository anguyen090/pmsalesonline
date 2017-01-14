<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../js_css/style.css" type="text/css" rel="stylesheet" />
<title>Welcome Administrator Control</title>
<?PHP
//Kiem tra Language
include "../language/vietnam.php";
include_once "../../_sys/_config.php";
include_once "../../_sys/database.class.php";
include_once "../../_sys/functions.class.php";
include_once "../../_sys/ez_sql_core.php";
include_once "../../_sys/ez_sql_mysql.php";
include_once "../models/user.class.php";
include_once "../models/configuration.class.php";
include_once "../models/checkfilelog.class.php";
$log = new CheckFileLog();
$user = new User();
$config = new Configuration();
?>
<body  onload="onload()">
<div id="siteContent">
    <header>
        <div class="logo"><?php echo str_replace('../','http://'.$_SERVER['HTTP_HOST'].'/'.$config->getUrl('config_website_url').'/',htmlspecialchars_decode($config->getConfig('config_logo'))); ?></div>
        <div class="keylogin">
            ĐĂNG NHẬP <img src="../imgs/unlocked.gif" style="vertical-align: middle;" />
        </div>
    </header>
    <div class="wrapper">
        <div id="login">
            <h1>ĐĂNG NHẬP</h1>
            <div class="content">
                <form name="login" method="post" action="user_check.php">
                    <span>Tên đăng nhập:</span><br />
                    <input size="30" type="text" class="input" name="user"  value="<?PHP if(isset($_GET['username'])){echo $_GET['username'];}?>" /></td>
                    <span>Mật khẩu:</span><br />
                    <input size="30" type="password" class="input" name="pass" />
                    <span>Ngôn ngữ:</span><br />
                    <select name="lang" class="input" style="width: 150px;" id="jumpMenu">
                        <?PHP include "../language/languageLogin.php"?>
                    </select><br />
                    <input name="send" type="submit" value=" Đăng nhập " class="button" />
                    <input name="send2" type="button" value="Hủy bỏ" onClick="window.location='../../'" class="button" />
                </form>
            </div>
        </div>
    </div>
    <footer>
        <?php
            //Load check file log truy cập website
            $log->checkLogWebsiteLogin($_SERVER['REMOTE_ADDR'],"../log/log_adm/","Desktop","Trang "," Đăng nhập",$log->curentPage());
        ?>
        <?PHP echo $lang['copyright'];?>
    </footer>
</div>
<script type="text/javascript">
function onload()
{
	document.login.user.focus();
}
</script>
</body>
</html>