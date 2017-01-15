<?PHP 
	$lnd = new LoaiNoiDung();
    $nd = new Content();
    $user = new User();
    $f = new functionGet();
    $PrimaryContent = '';
					$PrimaryContent = $PrimaryContent.'';
					$PrimaryContent = $PrimaryContent.'
						<div id="widgetTitle"><h2 class="title"> '.$lang['searchResults'].'</h2></div>';
					$PrimaryContent = $PrimaryContent.'<div id="widgetContent">';
			if (isset($_POST["keySearch"])and $_POST["keySearch"]!="") 
			{
				$keySearchword = $_POST["keySearch"];
				$dieukien = "(LOWER(CONVERT(`noidung_title` USING utf8)) LIKE '%".mb_strtolower($keySearchword,'utf-8')."%' OR LOWER(CONVERT(`noidung_title` USING utf8)) LIKE '%".mb_strtolower(chuyendoi($keySearchword),'utf-8')."%')";
			}
			else
			{
				$keySearchword = "";
				$dieukien = "1=1 ";
			}
			//Thực hiện câu lệnh tìm kiếm
						$count_record = $db->get_var("SELECT count(*) FROM `".$tbfix."noidung` WHERE ".$dieukien." AND `noidung_lang`='".$_SESSION['language']."' AND `noidung_status`='1' ORDER BY `noidung_update_date` DESC ");
			
						$PrimaryContent = $PrimaryContent.'<div style="padding:5px;color:#000;">'.$lang['have'].' <b>'.$count_record.'</b> '.$lang['results'].' " <b style="color:#cd0000;">'.$keySearchword.'</b> "</div>';
						$PrimaryContent = $PrimaryContent.'<ul>';
								if($results = $db->get_results("SELECT `noidung_id`,`user_id`,`loainoidung_id`,`noidung_title`,`noidung_note`,`noidung_by`,`noidung_images`,`noidung_update_date`,`noidung_view`,`noidung_count_command` FROM `".$tbfix."noidung` WHERE ".$dieukien." AND `noidung_lang`='".$_SESSION['language']."' AND `noidung_status`='1' ORDER BY `noidung_update_date` DESC LIMIT 0, 10"))
								{
									$PrimaryContent = $PrimaryContent.'';		
									foreach($results as $results)
									{
										//xuly image
										$images="";
										if($results->noidung_images!="")
										{
											$imglist = explode("^_^AK^_^",$results->noidung_images);
											$images = '<img src="'.str_replace("noidung/","noidung/",str_replace("../",MTN_BASE_SITEURL.'/',$imglist[0])).'"/>';
										}
										$PrimaryContent = $PrimaryContent.'
											<li>
                                                <div class="imgNews big">
                                                    '.$images.'
                                                </div>
                                                <h3 class="title">
                                                    <a href="'.MTN_BASE_SITEURL.MTN_URLRewrite.$lnd->RootContentAliasLink($results->loainoidung_id,"").$results->noidung_id.'-'.chuyendoi(stripTags(str_replace("../",MTN_BASE_SITEURL.'/',htmlspecialchars_decode($results->noidung_title)),false)).'.html">
                                                        '.str_replace("../",MTN_BASE_SITEURL.'/',htmlspecialchars_decode($results->noidung_title)).'
                                                    </a>
                                                </h3>
                                                <div class="datetime">
                                                    Đăng bởi: <a href="'.MTN_BASE_SITEURL.'/'.$user->getUser($results->user_id,'user_name').'">'.$user->getFullname($results->user_id).'</a> - Vào lúc: '.date("d/m/y",strtotime($results->noidung_update_date)).'
                                                </div>
                                                <div class="note">
                                                    '.$f->cutStr(str_replace("../",MTN_BASE_SITEURL.'/',htmlspecialchars_decode($results->noidung_note)),30).'
                                                </note>
                                                <div class="postdecription">
                                                    <ul>
                                                        <li class="topic">
                                                            <a href="'.MTN_BASE_SITEURL.MTN_URLRewrite.$lnd->RootContentAliasLink($results->loainoidung_id,"").'">'.$lnd->getContentType($results->loainoidung_id,'loainoidung_title').'</a>
                                                        </li>
                                                        <li class="comment">
                                                            Bình luận: '.$results->noidung_count_command.'
                                                        </li>
                                                        <li class="view">
                                                            View: '.$results->noidung_view.'
                                                        </li>
                                                </div>
                                                <div style="clear:both;"></div>
                                            </li>
										';
									}	
									if($count_record>0)
									{
										$PrimaryContent = $PrimaryContent.'<div id="contentShow"></div>';
                                        $PrimaryContent = $PrimaryContent.'<div id="loadmore" alt="contentShow|contentlistSearch|'.$keySearchword.'|10|10">Xem thêm <span></span></div>';
									}
								}
								else
								{
									$PrimaryContent = $PrimaryContent.'<center style="padding:10px;"><b>'.$lang['findnotfound'].'</b></center>';
								}
	$PrimaryContent = $PrimaryContent.'</ul><div class="clear"></div></div>'
	;
?>