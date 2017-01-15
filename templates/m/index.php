    <!DOCTYPE html public "✰">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
    <title><?PHP echo $titlePage.' - '.$_SERVER['HTTP_HOST'];?></title>
	<meta name="description" content="<?PHP echo $descriptionPage;?>" /> 
    <meta name="keywords" content="<?PHP echo $titlePage.' - '.$_SERVER['HTTP_HOST'];?>" />	
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <!-- LOAD LIBRARY DEFAULT -->
        <!--CSS DEFAULT-->
        <link rel="stylesheet" type="text/css" href="<?PHP echo MTN_BASE_SITEURL.DTemplate;?>/js_css/reset.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?PHP echo MTN_BASE_SITEURL.Templates;?>/js_css/main.mobile.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?PHP echo MTN_BASE_SITEURL.DTemplate;?>/validate/css/cmxform.css" media="all" />
        <!--CSS DEFAULT-->
        <!--JS DEFAULT-->
        <script src="<?PHP echo MTN_BASE_SITEURL.DTemplate;?>/js_css/jquery-2.1.4.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?PHP echo MTN_BASE_SITEURL.DTemplate;?>/validate/js/jquery.validate.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?PHP echo MTN_BASE_SITEURL.DTemplate;?>/validate/js/check_form.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?PHP echo MTN_BASE_SITEURL.DTemplate;?>/js_css/maincheck.min.js" type="text/javascript" charset="utf-8"></script>
        <!-- JSSOR -->
        <script type="text/javascript" src="<?PHP echo MTN_BASE_SITEURL.DTemplate;?>/jssor/jssor.js"></script>
        <script type="text/javascript" src="<?PHP echo MTN_BASE_SITEURL.DTemplate;?>/jssor/jssor.slider.min.js"></script>
    	<link rel="stylesheet" type="text/css" href="<?PHP echo MTN_BASE_SITEURL.DTemplate;?>/jssor/style.css" media="all" />
    	<!-- JSSOR -->
        <link rel="stylesheet" href="<?PHP echo MTN_BASE_SITEURL.DTemplate;?>/fancybox/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
        <script type="text/javascript" src="<?PHP echo MTN_BASE_SITEURL.DTemplate;?>/fancybox/jquery.fancybox.pack.js?v=2.1.5"></script>
        <!--JS DEFAULT-->
    <!-- END LOAD LIBRARY DEFAULT -->
    <!-- ADD FONT GOOGLE -->
        <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css' />
    <!-- ADD FONT GOOGLE -->
	<!-- CSS -->
        <link rel="stylesheet" type="text/css" href="<?PHP echo MTN_BASE_SITEURL.Templates;?>/js_css/font-awesome.min.css" media="all" />
	<!-- CSS -->
	<!-- JS -->
		<script>
			var rootPath = '<?PHP echo MTN_BASE_SITEURL;?>';
			var Templates = '<?PHP echo Templates;?>';
		</script>
		<script src="<?PHP echo MTN_BASE_SITEURL.Templates;?>/js_css/mainMenu.js" type="text/javascript" charset="utf-8"></script>
		<script src="<?PHP echo MTN_BASE_SITEURL.Templates;?>/js_css/main.js" type="text/javascript" charset="utf-8"></script>
		<script src="<?PHP echo MTN_BASE_SITEURL.Templates;?>/js_css/jquery.cookie.js" type="text/javascript" charset="utf-8"></script>
	   
    <!-- JS -->
    <!-- Syntax Highlighting -->
        <link rel="stylesheet" type="text/css" href="<?PHP echo MTN_BASE_SITEURL.DTemplate;?>/syntaxhighlighting/js_css/shCoreDefault.css" />
        <script type="text/javascript" src="<?PHP echo MTN_BASE_SITEURL.DTemplate;?>/syntaxhighlighting/js_css/shCore.js"></script>
        <script type="text/javascript" src="<?PHP echo MTN_BASE_SITEURL.DTemplate;?>/syntaxhighlighting/js_css/shBrushJScript.js"></script>
        <script type="text/javascript">
            SyntaxHighlighter.all();
        </script>
    <!-- Syntax Highlighting -->
    <!-- SWIPER -->
        <link rel="stylesheet" type="text/css" href="<?PHP echo MTN_BASE_SITEURL.Templates;?>/js_css/swiper/swiper.min.css" media="all" />
        <script src="<?PHP echo MTN_BASE_SITEURL.Templates;?>/js_css/swiper/swiper.min.js" type="text/javascript" charset="utf-8"></script>
    <!-- SWIPER -->
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
    <div id="siteContent">
        <div id="topbar">
            <div class="dm-menu Menu">
                <a href="javascript:void(0);"  onclick="return ShowHideMainMenu('danhmuc');"><span><i class="fa fa-bars"></i> Danh mục</span></a>
                <?PHP
        			include_once MTN_ROOTDIR."/modules/mainMenuMobileContent.php";
        		?>
            </div>
            <div class="social-top">
                <ul>
                    <li> <a href="https://www.youtube.com/channel/UCcTV71gmfH-X7ki-bO8tabA" title="Minh Trực - AZtuts" target="_blank"><i class="fa fa-youtube"></i></a></li>
                    <li><a href="https://www.facebook.com/thembansevui/" title="Bạn và tôi" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="https://plus.google.com/+MinhTr%E1%BB%B1cAZtuts" title="Minh Trực - AZtuts" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                </ul>
            </div>
            <div style="clear: both;"></div>
        </div>
		<div id="header">
			<div class="wrapper">
				<div class="logo">
					<?PHP echo str_replace("../",MTN_BASE_SITEURL.'/',htmlspecialchars_decode($configuration->config_logo));?>
				</div>
			</div>
		</div>
        <div class="navigation">
            <ul class="account">
                <?php
                    if(isset($_COOKIE['login_userid'])){
                        $linkacc = '<li>'.$f->decodeID('$Log@KwFname','FLnA',$_COOKIE['login_firstname']) .' '.$f->decodeID('$Log@KwLname','LLnA',$_COOKIE['login_lastname']).', <a href="#" id="logOut">Logout</a></li>';
                    }else {
                        $linkacc = '<li><a href="'.MTN_BASE_SITEURL.'/dang-ky.html">Đăng ký</a></li><li class="sub-menuline"></li><li><a href="'.MTN_BASE_SITEURL.'/dang-nhap.html">Đăng nhập</a></li>';
                    }
                    echo $linkacc;
                ?>
            </ul>
            <div class="nav-button-search">
                <a href="#" onclick="return popSearch('searchForm');"><i class="fa fa-search"></i></a>
            </div>
            <div id="searchForm" class="searchForm">
    			<form name="search" action="<?PHP echo MTN_BASE_SITEURL;?>/search/ket-qua-tim-kiem.html" method="POST">
    				<div class="searchLine"></div>
                    <input type="hidden" name="type" value="products"/>
    				<input class="inputtext" name="q" placeholder="Nhập từ khóa..."/>
    				<button type="submit" class="btnSearch"><i class="fa fa-search"></i></button>
    			</form>
    		</div>
            <div style="clear: both;"></div>
        </div>
		<div class="pageContent">
				<?PHP
						//LOAD WEBSITE Content
						if(isset($option)){
							switch($option) {
								case "content" :
									require_once MTN_ROOTDIR."/modules/contentContent.php";
									break;
								case "products" :
									require_once MTN_ROOTDIR."/modules/productsContent.php";
									break;
								case "search" :
									require_once MTN_ROOTDIR."/modules/searchContent.php";
									break;
								case "contact" :
									require_once MTN_ROOTDIR."/modules/contactContent.php";
									break;
								case "sitemap" :
									require_once MTN_ROOTDIR."/modules/sitemapContent.php";
									break;
                                case "register" :
									require_once MTN_ROOTDIR."/widgets/register/register.php";
									break;
                                case "login" :
									require_once MTN_ROOTDIR."/widgets/login/login.php";
									break;
                                case "dashboard" :
									require_once MTN_ROOTDIR."/widgets/dashboard/dashboard.php";
									break;
								default:
									require_once MTN_ROOTDIR."/modules/mainContentIndex.php";
							}
						}else{
							require_once MTN_ROOTDIR."/includes/pageShowContent.php";
						}
					echo $PrimaryContent;
				?>
		</div><!-- END PAGE CONTENT -->
		<div id="footerContent">
			<div class="wrapper">
				<table width="100%">
					<tr>
						<td valign="top" style="padding-left:20px;width:460px;">
							<?PHP echo str_replace("../",MTN_BASE_SITEURL.'/',htmlspecialchars_decode($configuration->config_copyright));?>
						</td>
						<td valign="top" style="display:none;width:190px;">
							<div style="width: 190px;height:55px;line-height:18px;padding:10px;padding-left:45px;text-align:left;color:#000;background: url('<?PHP echo MTN_BASE_SITEURL.Templates;?>/js_css/images/visitor_bg.png') top left no-repeat;">
									<?PHP
										//Kiem tra client truy cap
										if((!isset($_COOKIE['visitor']) OR $_COOKIE['visitor']=="") AND isset($_SERVER['HTTP_COOKIE']))
										{
											//them nguoi truy cap
											$insert = $db->query("INSERT INTO `".$tbfix."countert_onlines` (`id`,`time`,`session_cookie`,`client_ip`) VALUES(null,'".time()."','".$_SERVER['HTTP_COOKIE']."','".$_SERVER['REMOTE_ADDR']."')");
											setcookie('visitor',$_SERVER['HTTP_COOKIE']);
											
											//kiem tra ngay truy cap
											$startDay = $db->get_row("SELECT `date` FROM  `".$tbfix."countert_days` ORDER BY `date` DESC LIMIT 1");
											if($startDay->date < date("Y-m-d"))
											{
												//khong lam gi ca
												$insert = $db->query("INSERT INTO `".$tbfix."countert_days` (`id`,`date`,`sum`) VALUES(null,'".date("Y-m-d")."','1')");
											}
											else
											{
												$update = $db->query("UPDATE `".$tbfix."countert_days` SET `sum`=sum+1 WHERE `date`='".date("Y-m-d")."'");
											}
										}
										//DELETE user online
										$onlineTime =  time() - 900;
										$delete = $db->query("DELETE FROM `".$tbfix."countert_onlines` WHERE `time`<".$onlineTime);
										//Tính toán show thong tin truy cap ra
										$counterAll 		= 0;
										$counterOnline		= 1;
										$counterToday		= 0;
										$counterYesterday	= 0;
										$startOfMonth 		= 0; 
										$endOfMonth 		= 0;
										$counterMonth		= 0;
										$counterLastMonth	= 0;
										$counterWeek		= 0;
										$counterLastWeek	= 0;
										$time	= 0;
											$counterAll 		+= $db->get_var("SELECT SUM(sum) FROM ".$tbfix."countert_days");
										$counterOnline		+= $db->get_var("SELECT COUNT(*) FROM ".$tbfix."countert_onlines");
										$counterToday		+= $db->get_var("SELECT SUM(sum) FROM ".$tbfix."countert_days WHERE date='".date("Y-m-d")."'");
										$counterYesterday	+= $db->get_var("SELECT SUM(sum) FROM ".$tbfix."countert_days WHERE date='".date("Y-m-d",(time() - 3600 * 24))."'");
											$startOfMonth 		= date("Y-m",time())."-01"; 
											$endOfMonth 		= date("Y-m",time())."-".date("t",time());
										$counterMonth		+= $db->get_var("SELECT SUM(sum) FROM ".$tbfix."countert_days WHERE date>='".$startOfMonth."' AND date<='".$endOfMonth."'");
											$startOfMonth 		= date("Y-m",strtotime("-1 month",time()))."-01"; 
											$endOfMonth 		= date("Y-m",strtotime("-1 month",time()))."-".date("t",strtotime("-1 month",time()));
										$counterLastMonth	+= $db->get_var("SELECT SUM(sum) FROM ".$tbfix."countert_days WHERE date>='".$startOfMonth."' AND date<='".$endOfMonth."'");
												$start = 0;
												$time = $time?$time:time();
												$date = date("w",$time);
												$startDate = $date - $start;
												$endDate = (6 + $start) - $date;
												$startDay = date("Y-m-d",$time -  $startDate*3600*24);
												$endDay = date("Y-m-d",$time +  $endDate*3600*24);;
												$where = "WHERE date>='".$startDay."' AND date<='".$endDay."'";
										$counterWeek		+=$db->get_var("SELECT SUM(sum) FROM ".$tbfix."countert_days ".$where);
												$start = 0;
												$time = $time?$time:time();
												$date = date("w",$time);
												$startDate = $date - $start + 7;
												$endDate = (6 + $start) - $date - 7;
												$startDay = date("Y-m-d",$time -  $startDate*3600*24);
												$endDay = date("Y-m-d",$time +  $endDate*3600*24);;
												$where = "WHERE date>='".$startDay."' AND date<='".$endDay."'";
										$counterLastWeek	+= $db->get_var("SELECT SUM(sum) FROM ".$tbfix."countert_days ".$where);
											function getArrayNumber($num,$amountDigit)
											{
												$arr = array();while($num > 0){$mod = $num % 10;$num = floor($num / 10);array_push($arr,$mod);}$diff = $amountDigit - count($arr);if($diff > 0){for($i=0;$i<$diff;$i++){array_push($arr,0);}}return array_reverse($arr);
											}
										//$arrImageD = getArrayNumber($counterAll,9);
										//for($i=0;$i<count($arrImageD);$i++)
										//{
										//	echo '<img src="../images/visitor/'.$arrImageD[$i].'.png"/>';
										//}
										?>
										<?PHP echo $lang['visitor'].": <span style='color:red'>".$counterAll."</span>"?><br>
										<?PHP echo $lang['online'].":  <span style='color:red'>".$counterOnline."</span>"?><br>
							</div>
						</td>
					</tr>
				</table>
			</div>
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
                <div style="clear: both;"></div>
            </div>
		</div>
        <?php
            //Xử lý truy cập
            include_once MTN_ROOTDIR."/modules/checklogwebsite.php";
        ?>
        <div class="copyright-footer">
            <div class="wrapper" style="text-align: center;">Bản quyền © 2016 thuộc <?php echo MTN_BASE_SITEURL; ?>.</div>
        </div>
	</div>
</body>
</html>
