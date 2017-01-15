<?PHP
//error_reporting(E_ALL);
ini_set('display_errors', 1);
//error_reporting(0);
header("Content-type: text/xml");
//Khai báo các biến khởi tạo
	define( '_AK_MOS_', 1 );
	define('MTN_ROOTDIR',pathinfo(str_replace(DIRECTORY_SEPARATOR,'/',__file__),PATHINFO_DIRNAME));
	require_once(MTN_ROOTDIR."/includes/lang_check.php");
	require_once(MTN_ROOTDIR."/includes/date_function.php");
    require_once (MTN_ROOTDIR."/_sys/_config.php");
    require_once (MTN_ROOTDIR."/_sys/ez_sql_core.php");
    require_once (MTN_ROOTDIR."/_sys/ez_sql_mysql.php");
//LOAD FILE CONNECT DATABASE
    require_once(MTN_ROOTDIR."/_sys/database.class.php");
//Load file ket noi data
	require_once(MTN_ROOTDIR."/includes/_mainconn.php");
//Load file functions
	require_once(MTN_ROOTDIR."/includes/_functions.php");
    //Load file functions
	require_once(MTN_ROOTDIR."/_sys/functions.class.php");
	//Class loainoidung
    include MTN_ROOTDIR."/models/loainoidung.class.php";
	//Class content
    require_once MTN_ROOTDIR."/models/content.class.php";
	include MTN_ROOTDIR."/models/configuration.class.php";
    $config = new Configuration();
    $configuration = $config->getARecord("config_website_title,config_website_url,config_logo,config_company_info,config_contact_info,config_copyright");
    define('MTN_BASE_SITEURL',$config->getUrl($config->getConfig('config_website_url')));
	define('MTN_URLRewrite','/');
    $titlePage = $configuration->config_website_title;
	$descriptionPage = htmlspecialchars_decode($configuration->config_company_info);
	if($descriptionPage==""){$descriptionPage=$titlePage;}
	$items='';
	$op = isset($_GET['op'])?$_GET['op']:'';
	$lnd = new LoaiNoiDung();
	$ct = new Content();
    $f = new functionGet();
	$op = isset($_GET['op'])?$_GET['op']:'';
	if(!isset($_GET['op'])){
		if($tintuclist = $ct->getAll()){
            foreach($tintuclist as $tintuc){
				$link = MTN_BASE_SITEURL.MTN_URLRewrite.$lnd->RootContentAliasLink($tintuc->loainoidung_id,"").$tintuc->noidung_id.'-'.$f->convertViToEn($tintuc->noidung_title).'.html';
				$image="";
				if($tintuc->noidung_images!=""){$image = '<img src="'.str_replace("../",MTN_BASE_SITEURL.'/',$tintuc->noidung_images).'" alt="'.$tintuc->noidung_title.'"/>';}
				$items .= '
					<item>
						<title>'.$tintuc->noidung_title.'</title>
						<link>'.$link.'</link>
						<description><![CDATA[ '.$image.str_replace(array("\n", "\r"), '', str_replace('../',MTN_BASE_SITEURL, htmlspecialchars_decode($tintuc->noidung_note))).' ]]></description>
						<content:encoded><![CDATA[ '.str_replace(array("\n", "\r"), '', str_replace('../',MTN_BASE_SITEURL, htmlspecialchars_decode($tintuc->noidung_content))).' ]]></content:encoded>
						<pubDate>'.date("D, d M Y H:i:s O",strtotime($tintuc->noidung_update_date)).'</pubDate>
						<guid>'.$link.'</guid>
					</item>
				';
			}
		}
	}else if($op == 'category'){
		if($proType = $lnd->getAll()){
            foreach($proType as $proType){
				$link = $proType->loainoidung_link != "" ? str_replace('../',MTN_BASE_SITEURL.MTN_URLRewrite,$proType->loainoidung_link) : MTN_BASE_SITEURL.MTN_URLRewrite.$lnd->RootContentAliasLink($proType->loainoidung_id,"");
				$image="";
				if($proType->loainoidung_images!=""){$image = '<img src="'.str_replace("../",MTN_BASE_SITEURL.'/',$proType->loainoidung_images).'" alt="'.$proType->loainoidung_title.'"/>';}
				$items .= '<item>
				<title>'.$proType->loainoidung_title.'</title>
				<link>'.$link.'</link>
				<description><![CDATA[ '.$image.str_replace(array("\n", "\r"), '', str_replace('../', MTN_BASE_SITEURL, htmlspecialchars_decode($proType->loainoidung_note))).' ]]></description>
				<pubDate>'.date("D, d M Y H:i:s O",strtotime($proType->loainoidung_update_date)).'</pubDate>
				<guid>'.$link.'</guid>
			</item>
			';
			}
		}
	}
	echo '<?xml version="1.0" encoding="UTF-8"?>
		<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:atom="http://www.w3.org/2005/Atom">
		  <channel>
			<title>'.stripTags($titlePage,false).'</title>
			<description><![CDATA['.stripTags($descriptionPage,false).']]></description>
			<link>'.MTN_BASE_SITEURL.'</link>
				'.$items.'
		  </channel>
		</rss>';
?>