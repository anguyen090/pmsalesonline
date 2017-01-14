<?PHP
session_start();
//error_reporting(0);
//Dat gia tri cho duong dan khoi dong Web admin
    define( '_AK_MOS_', 1 );
	define('MTN_ROOTDIR',pathinfo(str_replace(DIRECTORY_SEPARATOR,'/',__file__),PATHINFO_DIRNAME));
//Kiem tra Language
	require_once(MTN_ROOTDIR."/includes/lang_check.php");
	require_once(MTN_ROOTDIR."/includes/date_function.php");
    require_once (MTN_ROOTDIR."/_sys/_config.php");
    require_once (MTN_ROOTDIR."/_sys/ez_sql_core.php");
    require_once (MTN_ROOTDIR."/_sys/ez_sql_mysql.php");
    
//LOAD FILE CONNECT DATABASE
    require_once(MTN_ROOTDIR."/_sys/database.class.php");
//Load file ket noi data
	require_once(MTN_ROOTDIR."/includes/_mainconn.php");
//Class User
    require_once MTN_ROOTDIR."/models/user.class.php";
//Load file functions
	require_once(MTN_ROOTDIR."/includes/_functions.php");
    $d = new Database();
    //$d->openConnection();
//LOAD FUNCTION CLASS
    require_once(MTN_ROOTDIR."/_sys/functions.class.php");
    $f = new functionGet();
    //Class Widget
    require_once MTN_ROOTDIR."/models/comment.class.php";
    //Class content
    require_once MTN_ROOTDIR."/models/content.class.php";
    //Class content
    require_once MTN_ROOTDIR."/models/group.class.php";
    //Class Widget
    require_once MTN_ROOTDIR."/models/contact.class.php";
     //Class Widget
    require_once MTN_ROOTDIR."/models/widget.class.php";
     //Class Hiển thị vị trí
    include MTN_ROOTDIR."/models/hienthivitri.class.php";
    //Class CoutertOnlines
    include MTN_ROOTDIR."/models/countert_onlines.class.php";
    //Gọi lớp BannerSlide
    $cOnlines = new CountertOnlines();
    //Class CoutertDays
    include MTN_ROOTDIR."/models/countert_days.class.php";
    //Gọi lớp Counter Day
    $cDays = new CountertDaysClass();
    //Class bannerslide
    include MTN_ROOTDIR."/models/bannerslide.class.php";
    //Class loainoidung
    include MTN_ROOTDIR."/models/loainoidung.class.php";
    //Class config email
    include MTN_ROOTDIR."/models/configemail.class.php";
    //Class newsletters
    include MTN_ROOTDIR."/models/newsletters.class.php";
    //Class saleschannel
    include MTN_ROOTDIR."/models/saleschannel.class.php";
    //Gọi lớp Loại nội dung
    $loainoidung = new LoaiNoiDung();
    //Class configuration
	include MTN_ROOTDIR."/models/configuration.class.php";
    $config = new Configuration();
    $configuration = $config->getARecord("config_website_title,config_website_url,config_logo,config_company_info,config_contact_info,config_copyright");
    $titlePage = $configuration->config_website_title;
    $descriptionPage = htmlspecialchars_decode($configuration->config_company_info);
    $imagePage = $config->getUrl($config->getConfig('config_website_url'));
    //Class themes choose
    require_once MTN_ROOTDIR."/models/themes.class.php";
    $themes = new Themes();
    $getTheme = $themes->getArecord('themes_id,themes_name,themes_folder,themes_key,themes_isMobile,themes_status');
	//print_r($template);
    //COOKIE TEMPLATE
//LOAD CLASS FILE
	$breadcrumb = '';
	//SET LINK ADDRESS
	$option = null;	$view = null;	$action = null;	$id = null;	$sid = null;$page = null;
	$listAddress = '';
    
	if(!isset($_GET['option']) OR $_GET['option']=="")
	{
		$listAddress = explode("/", khoitaoURL());
		
		//GET METHOD   OPTION	VIEW	ACTION	ID	PAGE
			if(isset($listAddress[0])){$option 	= $_GET['option'] 	= htmlspecialchars($listAddress[0], ENT_QUOTES);}
			if(isset($listAddress[1])){$view 	= $_GET['view'] 	= htmlspecialchars($listAddress[1], ENT_QUOTES);}
			if(isset($listAddress[2])){$id		= $_GET['id'] 		= htmlspecialchars($listAddress[2], ENT_QUOTES);}
			if(isset($listAddress[3])){$sid		= $_GET['sid'] 		= htmlspecialchars($listAddress[3], ENT_QUOTES);}
			if(isset($listAddress[4])){$action	= $_GET['action'] 	= htmlspecialchars($listAddress[4], ENT_QUOTES);}
			if(isset($listAddress[5])){$page	= $_GET['page'] 	= htmlspecialchars($listAddress[5], ENT_QUOTES);}
    }
	else{
		//GET METHOD   OPTION	VIEW	ACTION	ID	PAGE
		$option 	= htmlspecialchars($_GET["option"], ENT_QUOTES);
		$view 		= htmlspecialchars($_GET["view"], ENT_QUOTES);
		$action 	= htmlspecialchars($_GET["action"], ENT_QUOTES);
		$id			= htmlspecialchars($_GET["id"], ENT_QUOTES);
		$sid 		= htmlspecialchars($_GET["sid"], ENT_QUOTES);
		$page 		= htmlspecialchars($_GET["page"], ENT_QUOTES);
	};
    //COOKIE TEMPLATE
	$defaultTemplate = $getTheme->themes_folder;
    $template = '/templates';
    define('MOBILE',0);
    //COOKIE TEMPLATE
    require('./checkMobile.php');
	if(is_mobile())
	{
		$defaultTemplate = $getTheme->themes_folder.'/mobile';
        $template = '/templates/m';
        define('MOBILE',1);
	}
    //$tmp_key = $template->themes_key;
    //-------------------------------
    //Khai báo các biến khởi tạo
	define('MTN_BASE_SITEURL',$config->getUrl($config->getConfig('config_website_url')));
	define('Templates','/templates/'.$defaultTemplate);
    define('DTemplate','/templates/mtn_default');
	define('MTN_URLRewrite','/');
    include MTN_ROOTDIR.$template."/index.php";
?>
