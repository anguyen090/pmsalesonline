<?PHP
defined( '_AK_MOS_' ) or die( 'Restricted access' );?>
<div id="mainContent">
    <div class="control">
        <img src="imgs/control.png" style="vertical-align: middle;" /> <?PHP echo $lang['website_manager'];?>
    </div>
    <div id="content">
        <div class="visitor">
            <h2><strong>Thống kê truy cập</strong></h2>
            <div class="clr" style="width: 80%; border-top: 1px solid #ccc;margin-bottom: 10px;"></div>
                <?PHP
                //KHỞI TẠO DATABASE VISITOR
                	$visitorCreator =  $db->query("
                		CREATE TABLE IF NOT EXISTS `".$tbfix."countert_days` (
                		  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                		  `date` date NOT NULL DEFAULT '0000-00-00',
                		  `sum` double NOT NULL DEFAULT '0',
                		  PRIMARY KEY (`id`)
                		) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;
                	");
                	$visitorCreator =  $db->query("
                		CREATE TABLE IF NOT EXISTS `".$tbfix."countert_onlines` (
                		  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                		  `time` int(11) NOT NULL DEFAULT '0',
                		  `session_cookie` varchar(1000) NOT NULL DEFAULT '0.0.0.0',
                		  `client_ip` varchar(255) NOT NULL,
                		  PRIMARY KEY (`id`)
                		) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
                	");
                	$visitorCreator =  $db->query("
                		CREATE TABLE IF NOT EXISTS `".$tbfix."useronline` (
                		  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                		  `s_time` int(10) NOT NULL,
                		  `s_id` varchar(40) NOT NULL,
                		  PRIMARY KEY (`id`)
                		) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
                	");
                //Tính toán show thong tin truy cap ra
                $counterAll 		= 0;
                $counterOnline		= 0;
                $counterToday		= 0;
                $counterYesterday	= 0;
                $startOfMonth 		= 0; 
                $endOfMonth 		= 0;
                $counterMonth		= 0;
                $counterLastMonth	= 0;
                $time 				= 0;
                $counterWeek		= 0;
                $counterLastWeek	= 0;
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
                $arrImageD = getArrayNumber($counterAll,6);
                //echo "./imgs/visitor/".$arrImageD[$i].".png";
                ?>
<div class="count-visitor">
                <ul>
                    <li class="online">
                        <p>Số lượt đang online</p> : <span><?php echo $counterOnline; ?></span> lượt
                    </li>
                    <li class="total">
                        <p>Tổng số lượt xem</p>  : <span><?php echo $counterAll;?></span> lượt.
                    </li>
                    <li class="today">
                        <p>Hôm nay</p> : <span><?php echo $counterToday; ?></span> lượt.
                    </li>
                    <li class="yesterday">
                        <p>Hôm qua</p> : <span><?php echo $counterYesterday; ?></span> lượt.
                    </li>
                    <li class="week">
                        <p>Tuần này</p> : <span><?php echo $counterWeek; ?></span> lượt.
                    </li>
                    <li class="weekend">
                        <p>Tuần trước</p> : <span><?php echo $counterLastWeek; ?></span> lượt.
                    </li>
                    <li class="month">
                        <p>Tháng này</p> : <span><?php echo $counterMonth; ?></span> lượt.
                    </li>
                    <li class="last-month">
                        <p>Tháng trước</p> : <span><?php echo $counterLastMonth; ?></span> lượt.
                    </li>
                </ul>
            </div>
            <div class="ip-visitor">
                <b>IP đang online</b>
                <?PHP 
    				//LAY IP DANG ONLINE RA
    				if($iponline= $db->get_results("SELECT `client_ip` FROM ".$tbfix."countert_onlines"))
    				{
    					$stt = 1;
                        $showContent = '';
    					$showContent = $showContent .'<table>';
    					$showContent = $showContent. '<tr><td>STT</td><td>IP truy cập</td></tr>';
    					foreach($iponline as $iponline)
    					{
    						$showContent = $showContent . '
    						<tr>
    							<td width="30px">'.$stt.'</td>
    							<td>
    								<a href="http://en.iponmap.com/'.$iponline->client_ip.'" target="_blank" onclick=\'return hs.htmlExpand( this, {objectType: "iframe", outlineType: "rounded-white", wrapperClassName: "highslide-wrapper drag-header",outlineWhileAnimating: true, preserveContent: false, width: 800,height: 600 } )\'>'.$iponline->client_ip.'</a>
    							</td>
    						</tr>';			
    						$stt= $stt+1;
    					}
    					$showContent = $showContent . '</table>';
                        echo $showContent;
    				}
    			?>
            </div>
        </div>
        <div id="cpanel">
    		<h3><strong><br />Chào mừng bạn đến hệ thống quản trị cơ sơ dữ liệu website!</strong></h3>
    		<h2><strong>Welcome to Website Administrator Control <br /><br /></strong></h2>
    	</div>
        <div class="clr"></div>
    </div>
</div>
