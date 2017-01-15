<?PHP

/**
 * lnd: Loại nội dung
 * ct: Nội dung
 */
$lnd = new LoaiNoiDung();
$ct = new Content();
$f = new functionGet();
$user = new User();

if($loainoidung = $lnd->getAllByID($id))
{
	//paLoainoidung
    $PrimaryContent="";
	$linkPaloainoidung = '';
	foreach($loainoidung as $loainoidung)
	{
		if($paloainoidung = $lnd->getARecord($loainoidung->dongnoidung_id))
		{
			$linkPaloainoidung = $linkPaloainoidung.'<a style="float:left;" href="'.MTN_BASE_SITEURL.MTN_URLRewrite.$lnd->RootContentAliasLink($paloainoidung->loainoidung_id,"").'">'.str_replace("../",MTN_BASE_SITEURL.'/',htmlspecialchars_decode($paloainoidung->loainoidung_title)).'</a><img class="imgArrow" style="float:left;margin-top:15px;margin-left:5px;margin-right:5px;" src="'.MTN_BASE_SITEURL.Templates.'/icon/address_arrow.gif"/>';
		}
		//Lấy tổng số loại con của loại san pham này tạo thành 1 mãng array
		$loainoidungHotIDList = '';
		$loainoidungHotIDList = $lnd->typeCategory($loainoidung->loainoidung_id);

		$PrimaryContent = $PrimaryContent.'
            <div id="WidgetTitle"><h2 class="title">'.$linkPaloainoidung.str_replace("../",MTN_BASE_SITEURL.'/',htmlspecialchars_decode($loainoidung->loainoidung_title)).'</h2></div>
                <div id="widgetContent">
		';
?>
		<?PHP
			if($content = $ct->getContentByTopicList($loainoidungHotIDList,"noidung_id,loainoidung_id,user_id,noidung_title,noidung_note,noidung_content,noidung_images,noidung_update_date,noidung_view",0,10))
			{
				//Kiểm tra xem có nhiều mẫu tin hok!? nếu có 1 thì hiển thị nội dung chi tiết luôn
				if(count($content)==1)
				{
					foreach ($content as $content)
					{
						//-------------------------
						$noidung_content =  str_replace("../",MTN_BASE_SITEURL.'/',htmlspecialchars_decode($content->noidung_content));
						$PrimaryContent = $PrimaryContent.'
								<div id="news">
									<h2 class="title">
										'.str_replace("../",MTN_BASE_SITEURL.'/',htmlspecialchars_decode($content->noidung_title)).'
									</h2>
									<div class="datetime">Đăng bởi: <a href="'.MTN_BASE_SITEURL.'/'.$user->getUser($content->user_id,'user_id').'">'.$user->getFullname($content->user_id).'</a> - Lúc: '.date("h:i:s",strtotime($content->noidung_update_date)).' Ngày '.date("d/m/y",strtotime($content->noidung_update_date)).'</div>
									<div class="content">'.str_replace("/>","/></a>",$noidung_content).'</div>
								</div>
								<div style="float:right;width:400px;margin-top:15px;margin-bottom:15px;">
									<a style="float:right;margin-right:10px;color:#6c0107;" href="javascript:history.go(-1)"><img style="padding-top:4px;_padding-top:3px;" src="'.MTN_BASE_SITEURL.Templates.'/icon/icon_back.gif"/> Về trước</a>
									<a style="float:right;margin-right:10px;color:#6c0107;" href="javascript;" onclick="javascript:window.open(\''.MTN_BASE_SITEURL.'/sendmail.php?link=http://'.$_SERVER['SERVER_NAME'].str_replace("&","^_^",$_SERVER['REQUEST_URI']).'\', \'popD\',\'toolbar=no,menubar=no,resizable=yes,scrollbars=yes,status=no,location=no,width=450,height=500\');return false;"><img style="padding-top:4px;_padding-top:3px;" src="'.MTN_BASE_SITEURL.Templates.'/icon/icon_email.gif"/> Gởi email bạn bè</a>
									<a style="float:right;margin-right:10px;color:#6c0107;" href="javascript;" onclick="javascript:window.open(\''.MTN_BASE_SITEURL.'/ContentPrint.php?option=content&view=chitiet&id='.$content->noidung_id.'\', \'popD\',\'toolbar=no,menubar=no,resizable=yes,scrollbars=yes,status=no,location=no,width=680,height=600\');return false;"><img style="padding-top:4px;_padding-top:3px;" src="'.MTN_BASE_SITEURL.Templates.'/icon/icon_print.gif"/> Bản in ấn</a>
					           </div>
                               <div style="clear:both;"></div>
						';
					}
				}
				else
				{
					$PrimaryContent = $PrimaryContent.'';
					$i=0;
                    $PrimaryContent = $PrimaryContent.'<ul>';
					foreach ($content as $content)
					{
							//su ly image
							$image = "";
							if($content->noidung_images!="")
							{
								$image = '<img src="'.str_replace("../",MTN_BASE_SITEURL.'/',$content->noidung_images).'" alt="'.$content->noidung_title.'" />';
							}
						//-------------------------
							$PrimaryContent = $PrimaryContent.'
								<li>
									<div class="imgNews big">
										'.$image.'
									</div>
									<h3 class="title">
										<a href="'.MTN_BASE_SITEURL.MTN_URLRewrite.$lnd->RootContentAliasLink($content->loainoidung_id,"").$content->noidung_id.'-'.$f->convertViToEn(stripTags(str_replace("../",MTN_BASE_SITEURL.'/',htmlspecialchars_decode($content->noidung_title)),false)).'.html">
											'.str_replace("../",MTN_BASE_SITEURL.'/',htmlspecialchars_decode($content->noidung_title)).'
										</a>
									</h3>
									<div class="datetime">
										Đăng bởi: <a href="'.MTN_BASE_SITEURL.'/'.$user->getUser($content->user_id,'user_name').'">'.$user->getFullname($content->user_id).'</a> - Lúc: '.date("h:i:s",strtotime($content->noidung_update_date)).' Ngày '.date("d/m/y",strtotime($content->noidung_update_date)).'
									</div>
									<div class="note">
										'.$f->cutStr(htmlspecialchars_decode($content->noidung_note),30).'
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
									<div style="clear:both"></div>
								</li>
						   ';													
					}
                    $PrimaryContent = $PrimaryContent.'</ul>';
					$PrimaryContent = $PrimaryContent.'<div id="contentShow"></div>';
					$PrimaryContent = $PrimaryContent.'<div id="loadmore" alt="contentShow|contentlist|'.$loainoidungHotIDList.'|10|10">Xem thêm <span></span></div>';
				}
			}
			else
			{
				$PrimaryContent = $PrimaryContent.'<div style="border:0px;text-align:center;padding-top:20px;padding-bottom:20px;">'.$lang['no_content'].'</div>';
			}
		?>
<?PHP
		$PrimaryContent = $PrimaryContent.'
                </ul>
            </div> <!-- END div widgetContent id-->
		';
	}
}
?>
