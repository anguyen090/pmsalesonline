<?PHP
session_start();
//Dat gia tri cho duong dan khoi dong Web admin
	define( '_AK_MOS_', 1 );
	define('MTN_ROOTDIR',pathinfo(str_replace(DIRECTORY_SEPARATOR,'/',__file__),PATHINFO_DIRNAME));
    //Load file ket noi data
    require("./includes/_mainconn.php");
    require("./includes/_functions.php");
    //Kiem tra Language
    require("./includes/lang_check.php");
    //open class database
    require("./_sys/database.class.php");
    require("./_sys/functions.class.php");
    //Class configuration
	include MTN_ROOTDIR."/models/configuration.class.php";
    $config = new Configuration();
    //open class loainoidun
    require("./models/loainoidung.class.php");
    //open class loainoidun
    require("./models/user.class.php");
    //open class content
    require("./models/content.class.php");
    $lnd = new LoaiNoiDung();
    $ct = new Content();
    $f = new functionGet();
    $user = new User();
    define('MTN_BASE_SITEURL',$config->getUrl($config->getConfig('config_website_url')));
	define('MTN_URLRewrite','/');
	$urlRewrite = './?';
	$option = $f->convertViToEn($_POST['option']);
	$typeIDList = $_POST['typeID'];
	$starShow = intval($_POST['starShow']);
	$soluongShow = intval($_POST['soluongShow']);
	
	$results = '<ul>';
	if(isset($option)){
		switch($option) {
			case "contentlist" :// LOAD MORE
				$whereType = " AND `loainoidung_id` IN (".$typeIDList.")";
				if($typeIDList=="" OR $typeIDList=="all")
				{
					$whereType = "";
				}
				if($content = $db->get_results("SELECT `noidung_id`,`user_id`,`loainoidung_id`,`noidung_title`,`noidung_note`,`noidung_content`,`noidung_images`,`noidung_update_date`,`noidung_author`,`noidung_view`, `noidung_count_command` FROM `".$tbfix."noidung` WHERE `noidung_lang`='".$_SESSION['language']."' ".$whereType." AND `noidung_status`='1' ORDER BY `noidung_order` DESC, `noidung_update_date` DESC LIMIT ".$starShow.",".$soluongShow))
				{	
					$i=0;
					foreach ($content as $content)
					{
						//su ly image
						$image = "";
						if($content->noidung_images!="")
						{
							$image = '<img src="'.str_replace("../",MTN_BASE_SITEURL.'/',$content->noidung_images).'" />';
						}
						//-------------------------
						$results = $results.'
							<li>
                                <div class="imgNews big">
                                    '.$image.'
                                </div>
                                <h3 class="title">
                                    <a href="'.MTN_BASE_SITEURL.MTN_URLRewrite.$lnd->RootContentAliasLink($content->loainoidung_id,"").$content->noidung_id.'-'.chuyendoi(stripTags(str_replace("../",MTN_BASE_SITEURL.'/',htmlspecialchars_decode($content->noidung_title)),false)).'.html" title="'.str_replace("../",MTN_BASE_SITEURL.'/',$content->noidung_title).'">
                                        '.str_replace("../",MTN_BASE_SITEURL.'/',htmlspecialchars_decode($content->noidung_title)).'
                                    </a>
                                </h3>
                                <div class="datetime">
                                    Đăng bởi: <a href="'.MTN_BASE_SITEURL.'/'.$user->getUser($content->user_id,'user_name').'">'.$user->getFullname($content->user_id).'</a> - Vào lúc: '.date("d/m/y",strtotime($content->noidung_update_date)).'
                                </div>
                                <div class="note">
                                    '.$f->cutStr(str_replace("../",MTN_BASE_SITEURL.'/',htmlspecialchars_decode($content->noidung_note)),30).'
                                </div>
                                <div class="postdecription">
                                    <ul>
                                        <li class="topic">
                                            <a href="'.MTN_BASE_SITEURL.MTN_URLRewrite.$lnd->RootContentAliasLink($content->loainoidung_id,"").'">'.$lnd->getContentType($content->loainoidung_id,'loainoidung_title').'</a>
                                        </li>
                                        <li class="comment">
                                            Bình luận: '.$content->noidung_count_command.'
                                        </li>
                                        <li class="view">
                                            Xem: '.$content->noidung_view.'
                                        </li>
                                    </ul>
                                </div>
                                <div style="clear:both;"></div>
                            </li>
						';
					}					
				}
			break;
			case "contentlistsearch" :// LOAD MORE SEARCH
				if(isset($typeIDList)and $typeIDList!="") 
				{
					$keySearchword = $typeIDList;
					$dieukien = "(LOWER(CONVERT(`noidung_title` USING utf8)) LIKE '%".mb_strtolower($keySearchword,'utf-8')."%' OR LOWER(CONVERT(`noidung_title` USING utf8)) LIKE '%".mb_strtolower(chuyendoi($keySearchword),'utf-8')."%')  AND";
				}
				else
				{
					$keySearchword = "";
					$dieukien = "1=1 AND";
				}
			
				if($content = $db->get_results("SELECT `noidung_id`,`user_id`,`loainoidung_id`,`noidung_title`,`noidung_note`,`noidung_content`,`noidung_images`,`noidung_update_date`,`noidung_author` FROM `".$tbfix."noidung` WHERE `noidung_lang`='".$_SESSION['language']."' AND ".$dieukien." `noidung_status`='1' ORDER BY `noidung_order` DESC, `noidung_update_date` DESC LIMIT ".$starShow.",".$soluongShow))
				{
					foreach ($content as $content)
					{
						//su ly image
						$image = "";
						if($content->noidung_images!="")
						{
							$image = '<img src="'.str_replace("../",MTN_BASE_SITEURL.'/',$content->noidung_images).'"/>';
						}
						//-------------------------
						$results = $results.'
							<li>
                                <div class="imgNews big">
                                    '.$image.'
                                </div>
                                <h3 class="title">
                                    <a href="'.MTN_BASE_SITEURL.MTN_URLRewrite.$lnd->RootContentAliasLink($content->loainoidung_id,"").$content->noidung_id.'-'.chuyendoi(stripTags(str_replace("../",MTN_BASE_SITEURL.'/',htmlspecialchars_decode($content->noidung_title)),false)).'.html" title="'.str_replace("../",MTN_BASE_SITEURL.'/',$content->noidung_title).'">
                                        '.str_replace("../",MTN_BASE_SITEURL.'/',htmlspecialchars_decode($content->noidung_title)).'
                                    </a>
                                </h3>
                                <div class="datetime">
                                    Đăng bởi: <a href="'.MTN_BASE_SITEURL.'/'.$user->getUser($content->user_id,'user_name').'">'.$user->getFullname($content->user_id).'</a> - Vào lúc: '.date("d/m/y",strtotime($content->noidung_update_date)).'
                                </div>
                                <div class="note">
                                    '.$f->cutStr(str_replace("../",MTN_BASE_SITEURL.'/',htmlspecialchars_decode($content->noidung_note)),30).'
                                </div>
                                <div class="postdecription">
                                    <ul>
                                        <li class="topic">
                                            <a href="'.MTN_BASE_SITEURL.MTN_URLRewrite.$lnd->RootContentAliasLink($content->loainoidung_id,"").'">'.$lnd->getContentType($content->loainoidung_id,'loainoidung_title').'</a>
                                        </li>
                                        <li class="comment">
                                            Bình luận: '.$content->noidung_count_command.'
                                        </li>
                                        <li class="view">
                                            Xem: '.$content->noidung_view.'
                                        </li>
                                    </ul>
                                </div>
                                <div style="clear:both;"></div>
                            </li>
						';
					}					
				}
			break;
			default:
				$results = '';
		}
	}
	echo $results.'</ul>';
?>