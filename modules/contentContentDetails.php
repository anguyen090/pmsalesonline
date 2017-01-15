<?PHP
if(isset($_GET['id']) & $_GET['id']!='' & $_GET['id']!=0)
{
	$lnd = new LoaiNoiDung();
    $ct = new Content();
    $user = new User();
    $f = new functionGet();
    //Tăng lượt view lên 1
    $ct->contentViewUpdate('checkview',$id);
	//Thông tin chi tiet
	$details = $ct->getARecordByID($id);
	//Lay thong tin loai san pham
	$linkPaloainoidung = '';

	$loainoidungHotIDList = $details->loainoidung_id;
	if($loainoidung = $lnd->getARecord($details->loainoidung_id))
	{
		//Lấy ra chủ đề tin hiện tại
        $linkPaloainoidung = $linkPaloainoidung.'<a style="float:left;" href="'.MTN_BASE_SITEURL.MTN_URLRewrite.$lnd->RootContentAliasLink($loainoidung->loainoidung_id,"").'">'.str_replace("../",MTN_BASE_SITEURL.'/',htmlspecialchars_decode($loainoidung->loainoidung_title)).'</a>';
		//Kiểm tra chủ đề hiện tại có chủ đề cha không? nếu có hiển thị chủ đề cha -> chủ đề con
        if($paloainoidung = $lnd->getARecord($loainoidung->dongnoidung_id))
		{
			$linkPaloainoidung = '<a style="float:left;" href="'.MTN_BASE_SITEURL.MTN_URLRewrite.$lnd->RootContentAliasLink($paloainoidung->loainoidung_id,"").'">'.str_replace("../",MTN_BASE_SITEURL.'/',htmlspecialchars_decode($paloainoidung->loainoidung_title)).'</a><img style="float:left;margin-top:13px;margin-left:5px;margin-right:5px;" src="'.MTN_BASE_SITEURL.Templates.'/icon/address_arrow.gif"/> '.$linkPaloainoidung;
		}
        
		//Lấy tổng số loại con của loại nội dung này tạo thành 1 mãng array
	   $loainoidungHotIDList = $lnd->typeCategory($loainoidung->loainoidung_id);
	}

	//su ly image
	//	$image = '<a href="'.$image_list[0].'" onclick="return hs.expand(this, { captionText: this.getAttribute(\'alt\')  } )" name="'.$details->noidung_title.'"><img class="img-left" src="'.$image_list[0].'" width="150px" /></a>';
	$image="";
	$images  = $details->noidung_images;
	$image_list = explode("^_^AK^_^", $images);
	for ($ii = 0; $ii < count($image_list); $ii++) {
		if($image_list[$ii]!="")
		{
			$image = $image.'
					<li>
					  <a href="'.$image_list[$ii].'">
						<img src="'.str_replace("../",MTN_BASE_SITEURL.'/',str_replace("noidung/","noidung/thumbs/",$image_list[$ii])).'" style="height:60px;" class="image'.$ii.'" title="<a href=\''.str_replace("../",MTN_BASE_SITEURL.'/',$image_list[$ii]).'\' onclick=\'return hs.expand(this)\' ><img src=\''.MTN_BASE_SITEURL.'/images/icon_zoom.png\'/> Phóng to</a>">
					  </a>
					</li>
			';
		}
	}
	//'.$linkPaloainoidung.'
    $PrimaryContent="";
	$PrimaryContent = $PrimaryContent.'
			<div id="widgetTitle">
				<h2 class="title">'.$linkPaloainoidung.'</h2>
				<div class="toolRight">
					<a style="float:right;" href="javascript:history.go(-1)"><img src="'.MTN_BASE_SITEURL.Templates.'/icon/icon_back.gif"/> '.$lang['goback'].'</a>
					<a style="float:right;" href="javascript;" onclick="javascript:window.open(\''.MTN_BASE_SITEURL.'/sendmail.php?link=http://'.$_SERVER['SERVER_NAME'].str_replace("&","^_^",$_SERVER['REQUEST_URI']).'\', \'popD\',\'toolbar=no,menubar=no,resizable=yes,scrollbars=yes,status=no,location=no,width=450,height=500\');return false;"><img src="'.MTN_BASE_SITEURL.Templates.'/icon/icon_email.gif"/> '.$lang['sendmail2friend'].'</a>
					<a style="float:right;" href="javascript;" onclick="javascript:window.open(\''.MTN_BASE_SITEURL.'/ContentPrint.php?option=content&view=chitiet&id='.$details->noidung_id.'\', \'popD\',\'toolbar=no,menubar=no,resizable=yes,scrollbars=yes,status=no,location=no,width=680,height=600\');return false;"><img src="'.MTN_BASE_SITEURL.Templates.'/icon/icon_print.gif"/> '.$lang['print'].'</a>
				</div>
                <div style="clear:both;"></div>
			</div>
			<div id="widgetContent">
	';
?>
		<?PHP
			//HIEN THI NOI DUNG CHINHS
				$noidung_content =  str_replace("../",MTN_BASE_SITEURL.'/',htmlspecialchars_decode($details->noidung_content));
				$PrimaryContent = $PrimaryContent.'
						<div id="news">
							<h1 class="title">
								'.str_replace("../",MTN_BASE_SITEURL.'/',htmlspecialchars_decode($details->noidung_title)).'
							</h1>
							<div class="datetime">Đăng bởi: <a href="'.MTN_BASE_SITEURL.'/'.$user->getUser($details->user_id,"user_name").'">'.$user->getFullname($details->user_id).'</a> - Đăng lúc: '.date("d/m/y h:i:s",strtotime($details->noidung_update_date)).'</div>
							<div class="content">'.$ct->strReplaceCode("<blockquote>","</blockquote>",htmlspecialchars_decode($noidung_content)).'</div>
                            <div class="authorby">Theo: '.htmlspecialchars_decode($details->noidung_author).'</div>
						</div>
				';
				//Kiểm tra cho phép Command hok?
				$btn_command = "";
				//$option_command cho biết là content hay là products
                $option_command = $option;
                //$option_item cho biết là 
				$option_item = $details->noidung_id;
                //Gọi lớp comment
                $cm = new Comment();                
				//Điếm số bình luận cho mẫu tin này!
				$countCommand = $cm->countComment($option_command,$option_item);
				$PrimaryContent = $PrimaryContent.'
					<div class="clear" style="margin-top:10px;" ></div>
					'.$btn_command.'
					<div style="margin-top:10px;border-top:1px #0263b2 dotted;border-bottom:1px #0263b2 dotted;padding:5px 0px;padding-left:5px;color:#000;font-size:11px;">
						<div style="float:left;width:150px;">
							<script>(function(d, s, id) {
                            	  var js, fjs = d.getElementsByTagName(s)[0];
                            	  if (d.getElementById(id)) return;
                            	  js = d.createElement(s); js.id = id;
                            	  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5";
                            	  fjs.parentNode.insertBefore(js, fjs);
                            	}(document, "script", "facebook-jssdk"));
                            </script>
                            <div class="fb-like" data-href="'.MTN_BASE_SITEURL.MTN_URLRewrite.$lnd->RootContentAliasLink($details->loainoidung_id,"").$details->noidung_id.'-'.$f->convertViToEn($details->noidung_title).'.html" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
                        </div>
                        <div style="float:right;width:200px;margin-right:5px;margin-top:5px">
							<span style="float:right;margin-left:10px;">'.$lang['comment'].' <font style="color:#ff0000">'.$countCommand.'</font></span>
							<span style="float:right;margin-left:10px;">'.$lang['view'].' <font style="color:#ff0000">'.$details->noidung_view.'</font></span>
						</div>
						<div class="clear"></div>
					</div>
				';
				//Nhúng Comment vào
				if(isset($details->noidung_command) && $details->noidung_command==1)
				{
					require MTN_ROOTDIR."/modules/commandContent.php";
				}else {
				    $PrimaryContent = $PrimaryContent . '
                        <div class="alert alert-danger" role="alert" style="margin: 10px 0px;">
                          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                          <span class="sr-only">Error:</span>
                          Bài viết tạm thời đã khóa chức năng bình luận
                        </div>
                    ';
				}
			//Lấy Các tin mới hơn
			if($other = $db->get_results("SELECT `noidung_id`, `user_id`,`loainoidung_id`,`noidung_title`,`noidung_note`,`noidung_images`,`noidung_author`,`noidung_update_date`, `noidung_view`, `noidung_count_command` FROM `".$tbfix."noidung` WHERE `noidung_lang`='".$_SESSION['language']."' AND `loainoidung_id` IN (".$loainoidungHotIDList.") AND `noidung_status`='1' ORDER BY `noidung_order` DESC, `noidung_update_date` DESC LIMIT 0,8"))
			{
				$PrimaryContent = $PrimaryContent.'<div class="order-new-title"><h2 class="title related">Tin liên quan</h2></div>';
				$PrimaryContent = $PrimaryContent.'<div><ul>';
				$i=0;
				foreach ($other as $other)
				{
						//su ly image
						$image = "";
						if($other->noidung_images!="")
						{
							$image = '<img src="'.str_replace("../",MTN_BASE_SITEURL.'/',$other->noidung_images).'" alt="'.$other->noidung_title.'" />';
						}
					$PrimaryContent = $PrimaryContent.'
							<li>
                                <div class="imgNews big">
                                    '.$image.'
                                </div>
                                <h3 class="title">
                                    <a href="'.MTN_BASE_SITEURL.MTN_URLRewrite.$lnd->RootContentAliasLink($other->loainoidung_id,"").$other->noidung_id.'-'.chuyendoi(stripTags(str_replace("../",MTN_BASE_SITEURL.'/',htmlspecialchars_decode($other->noidung_title)),false)).'.html">
                                        '.str_replace("../",MTN_BASE_SITEURL.'/',htmlspecialchars_decode($other->noidung_title)).'
                                    </a>
                                </h3>
                                <div class="datetime">
                                    Đăng bởi: <a href="'.MTN_BASE_SITEURL.'/'.$user->getUser($other->user_id,'user_name').'">'.$user->getFullname($other->user_id).'</a> - Vào lúc: '.date("d/m/y",strtotime($other->noidung_update_date)).'
                                </div>
                                <div class="note">
                                    '.$f->cutStr(htmlspecialchars_decode($other->noidung_note),30).'
                                </div>
                                <div class="postdecription">
                                    <ul>
                                        <li class="topic">
                                            <a href="'.MTN_BASE_SITEURL.MTN_URLRewrite.$lnd->RootContentAliasLink($other->loainoidung_id,"").'">'.$lnd->getContentType($other->loainoidung_id,'loainoidung_title').'</a>
                                        </li>
                                        <li class="comment">
                                            Bình luận: '.$other->noidung_count_command.'
                                        </li>
                                        <li class="view">
                                            Xem: '.$other->noidung_view.'
                                        </li>
                                    </ul>
                                </div>
                                <div style="clear:both;"></div>
                            </li>
					';
				}
				$PrimaryContent = $PrimaryContent.'</div>';
				//$PrimaryContent = $PrimaryContent.'<div id="loadmore" alt="newsContentShow|contentlist|'.$loainoidungHotIDList.'|4|4">Xem thêm <span></span></div>';
			}
		?>
<?PHP
	$PrimaryContent = $PrimaryContent.'
				<div class="clear"></div>
	       </ul>
        </div>
	';
}
?>
