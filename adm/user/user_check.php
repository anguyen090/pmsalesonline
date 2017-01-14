<?PHP
include_once "../../_sys/_config.php";
include_once "../../_sys/database.class.php";
include_once "../../_sys/functions.class.php";
include_once "../../_sys/ez_sql_core.php";
include_once "../../_sys/ez_sql_mysql.php";
include_once "../models/user.class.php";
include_once "../models/checkfilelog.class.php";
$user = new User();
$log = new CheckFileLog();
$f = new functionGet();
?>
<?PHP
	$username = htmlspecialchars($_POST['user'],ENT_QUOTES);
	$password = md5(md5($_POST['pass']));
    $login = $user->login($username,$password);
	if($login)
	{
		$p="/";
		$user_userid	= $login->user_id;
        $user_firstname  = $login->user_firstname;
        $user_lastname  = $login->user_lastname;
        $user_name      = $login->user_name;
		setcookie('login_userid',$f->encodeID('$Log@KwID','KwiD',$user_userid),0, "$p");
		setcookie('login_firstname',$f->encodeID('$Log@KwFname','FLnA',$user_firstname),0,"$p");
        setcookie('login_lastname',$f->encodeID('$Log@KwLname','LLnA',$user_lastname),0,"$p");
        setcookie("login_username",$user_name,0,"$p");
        $log->checkLogWebsiteLogin($_SERVER['REMOTE_ADDR'],"../log/log_login/","Success",$_POST['user'],$_POST['pass'],$log->curentPage());
?>
		<script type="text/javascript">			
			window.location="../index.php?lang=<?PHP echo $_POST['lang'];?>";
		</script>
<?PHP
	}else {
	   echo"<script language=\"javascript\">alert('Sai username hoặc password hoặc tài khoản của bạn đang bị khóa, Vui lòng đăng nhập lại');window.location=\"user_login.php?username=$username\";</script>";  
	   $log->checkLogWebsiteLogin($_SERVER['REMOTE_ADDR'],"../log/log_login/","falid",$_POST['user'],$_POST['pass'],$log->curentPage());
    }
?>
