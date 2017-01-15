<!DOCTYPE html "✰">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<link rel="shortcut icon" href="<?PHP echo MTN_BASE_SITEURL.DTemplate;?>/icon/iconbar.jpg">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?PHP echo $titlePage.' - '.$_SERVER['HTTP_HOST'];?></title>
	<meta name="description" content="<?php echo stripTags(htmlspecialchars_decode($descriptionPage),false); ?>" /> 
    <meta name="keywords" content="<?PHP echo $titlePage;?>" />
	<meta property="og:type" content="<?php echo $f->getTypeWebsite($option); ?>" />
	<meta property="og:url" content="<?PHP echo "http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];?>" />
	<meta property="og:image" content="<?php echo str_replace('../',MTN_BASE_SITEURL.MTN_URLRewrite,$imagePage); ?>" />
	<meta property="og:title" content="<?PHP echo $titlePage;?>" />
	<meta property="og:description" content="<?php echo stripTags(htmlspecialchars_decode($descriptionPage),false); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	<!-- ADD FONT GOOGLE -->
        <!--<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css' />
    <!-- ADD FONT GOOGLE -->
    <!-- CSS Default Template-->
        <link rel="stylesheet" type="text/css" href="<?PHP echo MTN_BASE_SITEURL.DTemplate;?>/js_css/reset.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?PHP echo MTN_BASE_SITEURL.Templates;?>/js_css/main.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?PHP echo MTN_BASE_SITEURL.DTemplate;?>/validate/css/cmxform.css" media="all" />
    <!-- CSS -->
	<!-- JS -->
		<script>
			var rootPath = '<?PHP echo MTN_BASE_SITEURL;?>';
			var Templates = '<?PHP echo Templates;?>';
		</script>
		<script src="<?PHP echo MTN_BASE_SITEURL.DTemplate;?>/js_css/jquery-2.1.4.min.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" src="<?PHP echo MTN_BASE_SITEURL.Templates;?>/js_css/main.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?PHP echo MTN_BASE_SITEURL.DTemplate;?>/validate/js/jquery.validate.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?PHP echo MTN_BASE_SITEURL.DTemplate;?>/validate/js/check_form.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?PHP echo MTN_BASE_SITEURL.DTemplate;?>/js_css/maincheck.min.js" type="text/javascript" charset="utf-8"></script>
    <!-- JS -->
	<!-- JSSOR -->
		<script type="text/javascript" src="<?PHP echo MTN_BASE_SITEURL.DTemplate;?>/jssor/jssor.js"></script>
		<script type="text/javascript" src="<?PHP echo MTN_BASE_SITEURL.DTemplate;?>/jssor/jssor.slider.min.js"></script>
		<link rel="stylesheet" type="text/css" href="<?PHP echo MTN_BASE_SITEURL.DTemplate;?>/jssor/style.css" media="all" />
	<!-- JSSOR -->
    <!-- Syntax Highlighting -->
        <link rel="stylesheet" type="text/css" href="<?PHP echo MTN_BASE_SITEURL.DTemplate;?>/syntaxhighlighting/js_css/shCoreDefault.css" />
        <script type="text/javascript" src="<?PHP echo MTN_BASE_SITEURL.DTemplate;?>/syntaxhighlighting/js_css/shCore.js"></script>
        <script type="text/javascript" src="<?PHP echo MTN_BASE_SITEURL.DTemplate;?>/syntaxhighlighting/js_css/shBrushJScript.js"></script>
        <script type="text/javascript">
            SyntaxHighlighter.all();
        </script>
    <!-- Syntax Highlighting -->
     <!-- TIME PICKER-->
        <link rel="stylesheet" href="<?PHP echo MTN_BASE_SITEURL.DTemplate;?>/js_css/jquery-ui.min.css"/>
    	<script src="<?PHP echo MTN_BASE_SITEURL.DTemplate;?>/js_css/jquery-ui.min.js"></script>
    	 <script>
    		  $(function() {
    				$( ".datetime" ).datepicker({
    					dateFormat: "dd/mm/yy",
    					minDate: 0,
    					numberOfMonths: 2,
    					changeMonth: true,
    					changeYear: true,
    				});
    		  });
        </script>
        <!-- TIME PICKER-->
    <!-- DD MENU -->
        <link href="<?PHP echo MTN_BASE_SITEURL.DTemplate;?>/ddmenu/ddsmoothmenu.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="<?PHP echo MTN_BASE_SITEURL.DTemplate;?>/ddmenu/ddsmoothmenu.js"></script>
        <script type="text/javascript">
    		ddsmoothmenu.init({
    			mainmenuid: "ddsmoothmenu", //menu DIV id
    			orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
    			classname: 'ddsmoothmenu', //class added to menu's outer DIV
    			contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
    		});
    	</script>
    <!-- DD MENU -->
    <script type="text/javascript">
        scrollDivOnWeb('.box-hot-category',100,10,320);
        scrollDivOnWeb('#info-manager',100,10,320);
    </script>
</head>
<body>
	<script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-81141444-1', 'auto');
      ga('send', 'pageview');
    </script>
    <div class="siteContent">
		<div id="header">
			<div class="wrapper">
				<div class="logo">
                    <a href="<?php echo MTN_BASE_SITEURL; ?>">
                        <?PHP echo str_replace('../.',MTN_BASE_SITEURL.'/',htmlspecialchars_decode($configuration->config_logo)); ?>
				    </a>
                </div>
                <div class="form">
                    <div class="submenu">
                        <div class="alert" style="display: none;"></div>
                        <ul>
                            <?php
                                /**
                                 * Khai báo các giá trị hàm decode
                                 * log_key_en_id: từ khóa cho key endcode id
                                 * log_key_cv_id: Từ khóa cho key convert id
                                 */
                                $getKey = array(
                                    'log_key_en_id'         => '$Log@KwID',
                                    'log_key_cv_id'         => 'KwiD',
                                    'log_key_en_firstname'  => '$Log@KwFname',
                                    'log_key_cv_firstname'  => 'FLnA',
                                    'log_key_en_lastname'   => '$Log@KwLname',
                                    'log_key_cv_lastname'   => 'LLnA'
                                );
                                /**
                                $cid = $f->decodeID($getKey['log_key_en_id'],$getKey['log_key_cv_id'],$_COOKIE['login_userid']);
                                $firstname = $f->decodeID($getKey['log_key_en_firstname'],$getKey['log_key_cv_firstname'],$_COOKIE['login_firstname']);
                                $lastname = $f->decodeID($getKey['log_key_en_lastname'],$getKey['log_key_cv_lastname'],$_COOKIE['login_lastname']);
                                if(isset($cid) && intval($cid)>0){
                                    $linkacc = '<li>'.$firstname.' '.$lastname.', <a href="#" onclick="return checkLogout();">Logout</a></li><li class="sub-menuline"></li>';
                                }else {
                                    $linkacc = '<li><a href="'.MTN_BASE_SITEURL.'/dang-ky.html">Đăng ký</a></li><li class="sub-menuline"></li><li><a href="'.MTN_BASE_SITEURL.'/dang-nhap.html">Đăng nhập</a></li>';
                                }
                                $lnd = new LoaiNoiDung();
                                echo $linkacc;
                                $lnd->getMenuSub('loainoidung_id,loainoidung_title,loainoidung_alias,loainoidung_link');
                                */
                            ?>
                        </ul>
                    </div>
                </div>
                <div id="mainMenu">
                    <div id="ddsmoothmenu" class="ddsmoothmenu">
                        <?PHP
                			//Khởi tạo lớp loainoidung
                            $loainoidung = new LoaiNoiDung();
                            //$arrID = $loainoidung->getTypeContentByUserID("1^MT^2^MT^3^MT^4^MT^");
                            //print_r($arrID);
                            $loainoidung->setUser_id($_COOKIE['login_userid']);
                            $loainoidung->getMenuCategory(0,$id,"loainoidung_id,dongnoidung_id,loainoidung_title,loainoidung_alias,loainoidung_link,loainoidung_user_id,loainoidung_permission");
                            //$active = isset($option) && $option=="" ? 'class="active"' : "";
                        ?>
                        <!--
                        <ul>
                            <li><a href="#" <?php echo $active; ?> >BÁO CÁO BÁN HÀNG</a></li>
                            <li><a href="#">KÊNH BÁN HÀNG</a></li>
                            <li><a href="#">ĐƠN HÀNG</a></li>
                            <li><a href="#">SẢN PHẨM</a></li>
                            <li><a href="#">NHẬP/XUẤT HÀNG</a></li>
                            <li><a href="#">DOANH THU</a></li>
                            <li><a href="#">TÀI KHOẢN</a></li>
                        </ul>
                        -->
                    </div>
                </div>
            </div>
		</div>
		<div class="pageContent">
			 <?PHP
				require_once MTN_ROOTDIR."/includes/getBoxID.php";
				//LOAD WEBSITE Content
				echo $option;
                if(isset($option)){
					switch($option) {
						case "content" :
							require_once MTN_ROOTDIR."/modules/contentContent.php";
                            require_once MTN_ROOTDIR."/includes/pageShowContent.php";
							break;
						case "products" :
							require_once MTN_ROOTDIR."/modules/productsContent.php";
							require_once MTN_ROOTDIR."/includes/pageShowContent.php";
							break;
						case "search" :
							require_once MTN_ROOTDIR."/modules/searchContent.php";
							require_once MTN_ROOTDIR."/includes/pageShowContent.php";
							break;
						case "contact" :
							require_once MTN_ROOTDIR."/modules/contactContent.php";
							require_once MTN_ROOTDIR."/includes/pageShowContent.php";
							break;
						case "sitemap" :
							require_once MTN_ROOTDIR."/modules/sitemapContent.php";
							require_once MTN_ROOTDIR."/includes/pageShowContent.php";
							break;
							
						default:
							require_once MTN_ROOTDIR."/includes/pageShowContent.php";
					}
				}else{
					require_once MTN_ROOTDIR."/includes/pageShowContent.php";
				}
				?>
		</div>
		<div id="footerContent">
            <div class="wrapper">
    			<div style="clear:both;padding-top:10px;margin-bottom:10px;"></div>
    			<div style="padding:0px;padding-bottom:0px;margin:0px auto;">
    				<table width="100%">
    					<tr>
    						<td valign="top">
    							<?PHP echo htmlspecialchars_decode($configuration->config_copyright); ?>
    						</td>
                            <td>
                                <?php
                                    //Lấy option và item(id loại sản phẩm)
                                    $typeList = $f->getTypeContent($option,$view,$id);
                                ?>
                                <div class="newsletters-form">
                                    <h4 class="newsletters-title">ĐĂNG KÝ NHẬN TIN MỚI</h4>
                                    <form name="newslettersregister" id="newslettersregister" action="<?php echo $f->encodeLink(MTN_BASE_SITEURL,'webAction.php','newslettersemail','newslettersemail','','knsv_@NewsLettes$123') ?>" method="POST">
                                        <input name="newslettersoption" class="input" id="newslettersoption" type="hidden" value="<?php echo $typeList['option']; ?>" />
                                        <input name="newslettersitem" class="input" id="newslettersitem" type="hidden" value="<?php echo $typeList['item']; ?>" />
                                        <input class="input" name="newslettersemail" id="newslettersemail" type="email" placeholder="Nhập email đăng ký" required="true" />
                                        <input name="submit" type="submit" class="button" value="ĐĂNG KÝ" />
                                    </form>
                                </div>
                            </td>
    						<td valign="top">
    								<div class="visitor" >
    										<?PHP
                                            $dateht = $cDays->getDate();
                                            //echo $dateht;
                                            //Kiểm tra client tuy cập 
                                            // SET giá trị cho các biến trong bảng CountertOnlines
                                            $cOnlines->setTime(time());
                                            $cOnlines->setSession_cookie($_SERVER['HTTP_COOKIE']);
                                            $cOnlines->setClient_ip($_SERVER['REMOTE_ADDR']);
                                            
                                            //SET giá trị cho các biến trong bảng Countert Days
                                            $cDays->setSum('1');
                                            $countDateOnline = $cOnlines->checkClient($_COOKIE['visitor'], $_SERVER['HTTP_COOKIE'], $dateht);
                                            //DELETE user online
                                            $onlineTime = time() - 900;
                                            $cOnlines->delete($onlineTime);
    										//$onlineTime =  time() - 900;
    										//$delete = $db->query("DELETE FROM `".$tbfix."countert_onlines` WHERE `time`<".$onlineTime);
    										//Tính toán show thong tin truy cap ra
                                            //echo date("Y-m-d",(time() - 3600 * 24));
    										//$counterAll 		= 0;
    										$counterOnline		= 1;
    										//$counterToday		= 0;
    										//$counterYesterday	= 0;
    										$startOfMonth 		= 0; 
    										$endOfMonth 		= 0;
    										//$counterMonth		= 0;
    										$counterLastMonth	= 0;
    										$counterWeek		= 0;
    										$counterLastWeek	= 0;
    										$time	= 0;
    											//$counterAll 		+= $db->get_var("SELECT SUM(sum) FROM ".$tbfix."countert_days");
                                           // echo "Tổng truy cập: " . $cDays->countAll();
                                           // echo "Truy cập hôm nay: ". $cDays->countToDay($cDays->getDate());
                                           // echo "Hôm qua: " . $cDays->countYesterday(date("Y-m-d",(time() - 3600 * 24)));
    										$counterOnline		+= $db->get_var("SELECT COUNT(*) FROM ".$tbfix."countert_onlines");
    										//$counterToday		+= $db->get_var("SELECT SUM(sum) FROM ".$tbfix."countert_days WHERE date='".date("Y-m-d")."'");
    										//$counterYesterday	+= $db->get_var("SELECT SUM(sum) FROM ".$tbfix."countert_days WHERE date='".date("Y-m-d",(time() - 3600 * 24))."'");
    										$startOfMonth 		= date("Y-m",time())."-01"; 
    										$endOfMonth 		= date("Y-m",time())."-".date("t",time());
                                           // echo "Tháng này: " . $cDays->counterMonth($startOfMonth, $endOfMonth);
    										//$counterMonth		+= $db->get_var("SELECT SUM(sum) FROM ".$tbfix."countert_days WHERE date>='".$startOfMonth."' AND date<='".$endOfMonth."'");
    									//	echo "counterMonth".$counterMonth;
                                            	$startOfMonth 		= date("Y-m",strtotime("-1 month",time()))."-01"; 
    											$endOfMonth 		= date("Y-m",strtotime("-1 month",time()))."-".date("t",strtotime("-1 month",time()));
    										$counterLastMonth	+= $db->get_var("SELECT SUM(sum) FROM ".$tbfix."countert_days WHERE date>='".$startOfMonth."' AND date<='".$endOfMonth."'");
    												$start = 0;
    												$time = $time?$time:time();
    												$date = date("w",$time);
    												$startDate = $date - $start;
    												$endDate = (6 + $start) - $date;
    												$startDay = date("Y-m-d",$time -  $startDate*3600*24);
    												$endDay = date("Y-m-d",$time +  $endDate*3600*24);
    										//echo "Tuần này: " . $cDays->counterWeek($startDay, $endDay);
    												$start = 0;
    												$time = $time?$time:time();
    												$date = date("w",$time);
    												$startDate = $date - $start + 7;
    												$endDate = (6 + $start) - $date - 7;
    												$startDay = date("Y-m-d",$time -  $startDate*3600*24);
    												$endDay = date("Y-m-d",$time +  $endDate*3600*24);
    										//echo "Tuần rồi: " . $cDays->counterLastWeek($startDay, $endDay);
                                                echo "Tổng lượt truy cập: <span style='color:red'>".$cDays->countAll()."</span><br />";
                                                echo "Hôm nay:  <span style='color:red'>".$cDays->countToDay($dateht)."</span><br />";
    											
    										?>
    								</div>
                                    <div class="inf">
                                        <a href="http://khoinghiepsinhvien.com" title="Thiết kế bởi Minh Trực IT"> Thiết kế bởi Minh Trực IT</a>
                                        <p>Sự phát triển của website là sự đóng góp của tất thành viên</p>
                                    </div>
    						</td>
    					</tr>
    				</table>
    			</div>
                <?php
                    //Xử lý truy cập
                    include_once MTN_ROOTDIR."/modules/checklogwebsite.php";
                ?>
                <script>
                    $(document).ready(function(e){
                        $("#version").click(function(){
                            var id = $(this).attr('href');
                            var winH = $("body").height();
                            var winW = $("body").width();
                            $(id).css('top', winH/2-$(id).height()-300);
                            $(id).css('left', winW/2-$(id).width()/2);
                            $(id).fadeIn('slow');
                        });
                        $('.close-version').click(function(){
                            $('#versionShow').fadeOut('slow');
                        });
                    });
                </script>
                <script>
                    $(document).ready(function(){
                        $(window).scroll(function(){
                           if($(this).scrollTop()>100){
                                $(".top").fadeIn("slow");
                           }else {
                                $(".top").fadeOut("slow");
                           } 
                        });
                        $(".top").click(function(){
                            $("body").animate({ scrollTop: 0 }, 800);
                            return false;
                        });
                    });
                </script>
                <style>
                    .top {
                        position: fixed;
                        bottom: 10px;
                        right: 10px;
                        z-index: 99;
                        display: none;
                    }
                </style>
                <a href="javascript:void(0)" class="top"><img src="<?PHP echo MTN_BASE_SITEURL.Templates;?>/button/scrolltop.png" /></a>
    		</div><!-- END FOOTER Content-->
        </div>
        <div class="clear"></div>
		<!-- Thêm khung chat facebook 
			<script language="javascript">
				/*************************
				Phần mềm LiveChat Fanpage Facebook miễn phí
				Verison 2.1 (Update 04-11-2015)
				Tác giả Hoangluyen.com 
				Email: admin@hoangluyen.com
				Download Source: https://hoangluyen.com/livechat-fanpage-facebook/
				*************************/
				var f_chat_vs = "Version 2.1";
				var f_chat_domain =  "<?php echo MTN_BASE_SITEURL.DTemplate; ?>/js_css";    
				var f_chat_name = "Hỗ trợ khách hàng";
				var f_chat_star_1 = "Chào bạn!";
				var f_chat_star_2 = 'Chào mừng bạn đến với Khoinghiepsinhvien.com. Chúng tôi có thể giúp gì cho bạn! ,<em>Gửi vài giây trước</em>';
				var f_chat_star_3 = "<a href='javascript:;' onclick='f_bt_start_chat()' id='f_bt_start_chat'>Bắt đầu Chat</a>";
				var f_chat_star_4 = "Chú ý: Bạn phải đăng nhập <a href='http://facebook.com/' target='_blank' rel='nofollow'>Facebook</a> mới có thể trò chuyện.";
				var f_chat_fanpage = "thembansevui"; /* Đây là địa chỉ Fanpage*/
				var f_chat_background_title = "#F77213"; /* Lấy mã màu tại đây http://megapixelated.com/tags/ref_colorpicker.asp */
				var f_chat_color_title = "#fff";
				var f_chat_cr_vs = 21; /* Version ID */
				var f_chat_vitri_manhinh = "right:10px;"; /* Right: 10px; hoặc left: 10px; hoặc căn giữa left:45% */    
			</script>
			<style>
				#f_chat_source {display: none;}
			</style>
			<!-- $Chat iCon Font (có thể bỏ) 
			<link rel="stylesheet" href="<?php echo MTN_BASE_SITEURL.DTemplate; ?>/js_css/livechat/fonts/css/font-awesome.min.css" type="text/css"/>
			<!-- $Chat Javascript (không được xóa)
			<script src="<?php echo MTN_BASE_SITEURL.DTemplate; ?>/js_css/livechat/chat.js?vs=2.1"></script>
			<!-- $Chat HTML (không được xóa)
			<div id='fb-root'></div>
			<a title='Mở hộp Chat' id='chat_f_b_smal' onclick='chat_f_show()' class='chat_f_vt'><i class='fa fa-comments title-f-chat-icon'></i> Hỗ trợ</a><div id='b-c-facebook' class='chat_f_vt'><div id='chat-f-b' onclick='b_f_chat()' class='chat-f-b'><i class='fa fa-comments title-f-chat-icon'></i><label id="f_chat_name"></label><span id='fb_alert_num'>1</span><div id='t_f_chat'><a href='javascript:;' onclick='chat_f_close()' id='chat_f_close' class='chat-left-5'>x</a></div></div><div id='f-chat-conent' class='f-chat-conent'><script>document.write("<div class='fb-page' data-tabs='messages' data-href='https://www.facebook.com/"+f_chat_fanpage+"' data-width='250' data-height='310' data-small-header='true' data-adapt-container-width='true' data-hide-cover='true' data-show-facepile='false' data-show-posts='true'></div>");</script><div id='fb_chat_start'><div id='f_enter_1' class='msg_b fb_hide'></div><div id='f_enter_2' class='msg_b fb_hide'></div><br/><p id='f_enter_3' class='fb_hide' align='center'><a href='javascript:;' onclick='f_bt_start_chat()' id='f_bt_start_chat'>Bắt đầu Chat</a></p><br/><p id='f_enter_4' class='fb_hide' align='center'></p></div><div id="f_chat_source" class='chat-single'></div></div></div>
			<!-- #CHAT -->
        <div class="copyright">
            <div class="wrapper">
                <p class="cl">Copyright 2015, bởi Khởi nghiệp sinh viên</p>
                <p class="cr"><a href="#versionShow" id="version">MTWeb.ver.1.01</a></p>
                <div style="clear: both;"></div>
            </div>
        </div>
	</div>
</body>
</html>
