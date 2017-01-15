<?PHP
	$lnd = new LoaiNoiDung();
    $ct = new Content();
    $user = new User();
    $config = new Configuration();
    $f = new functionGet();
    $PrimaryContent = '';
    //TIN TỨC NỔI BẬC
    $PrimaryContent .= '
        <style>
			.swiper-container {height: 350px; margin: 20px auto 10px auto;}
			.swiper-slide{background:#fff;}
		</style>    
		<div id="widgetP">
			<div id="widgetPContent" style="padding:0px 0px;position:relative;display:block;">
				<div class="swiper-container">
					<div class="swiper-wrapper">
			';
    if($hotContent = $ct->getAllByHot('hot','noidung_id,loainoidung_id,user_id,noidung_title,noidung_images,noidung_view,noidung_count_command,noidung_update_date',0,10)){
        $hotList = '';
        foreach($hotContent as $items){
            $hotList .= '
                        <div class="swiper-slide">
                			<div id="news">
                                <h3 class="title-h">'.cutStr($items->noidung_title,10).'</h3>
                                <div class="datetime">Đăng bởi:  <a href="'.MTN_BASE_SITEURL.'/'.$user->getUser($items->user_id,'user_name').'">'.$user->getFullname($items->user_id).'</a> - Ngày: '.date("d/m/Y",strtotime($items->noidung_update_date)).'</div>
                                <img class="imgBig" src="'.str_replace('../',MTN_BASE_SITEURL.'/',$items->noidung_images).'" alt="'.$items->noidung_title.'" />
                                <div class="postdecription long"> 
                                    <ul>
                                        <li class="topic">
                                            <a href="'.MTN_BASE_SITEURL.MTN_URLRewrite.$lnd->RootContentAliasLink($items->loainoidung_id,"").'">'.$lnd->getContentType($items->loainoidung_id,"loainoidung_title").'</a>
                                        </li>
                                        <li class="comment">
                                            Bình luận: '.$items->noidung_count_command.'
                                        </li>
                                        <li class="view">
                                            Xem: '.$items->noidung_view.'
                                        </li>
                                    </ul>
                                </div>
                            </div>
                		</div>
            ';
        }
    }
    $PrimaryContent .= $hotList;
    $PrimaryContent .= '
					</div>
					<!-- Add Pagination -->
				</div>
				<script>
				var swiper = new Swiper(".swiper-container", {
				    effect: "slide",
                    autoplay: 5000,
					spaceBetween: 10,
                    mode: "horizontal",
                    breakpoints: {
            			360: {
            			  slidesPerView: 1,
            			  spaceBetweenSlides: 0
            			},
                        670: {
            			  slidesPerView: 2,
            			  spaceBetweenSlides: 10
            			},
            			980: {
            			  slidesPerView: 3,
            			  spaceBetweenSlides: 30
            			},
                        1024: {
            			  slidesPerView: 3,
            			  spaceBetweenSlides: 10
            			},
                        1349: {
            			  slidesPerView: 4,
            			  spaceBetweenSlides: 10
            			}
        		  }
				});  
				</script>
				<div class="clear"></div>
			</div>
		</div>
	';
	//TIN TỨC MỚI NHẤT
	$PrimaryContent .= '
		<div id="widgetP">
			<h2 class="title-w">BÀI VIẾT MỚI NHẤT</h2>
            <div id="widgetPContent" style="padding:10px 0px;">
			';
		if($noidung = $ct->getRecordByNum(10))
		{
			$i = 1;
			$newList = '<ul>';
			$otherNews = '';
			foreach ($noidung as $noidung)
			{
				$newList = $newList.'<li>';
                $imagesub = '';//'<a href="'.RootContentAliasLink($noidung->loainoidung_id,"").$noidung->noidung_id.'-'.chuyendoi(stripTags(str_replace("../",MTN_BASE_SITEURL.'/',htmlspecialchars_decode($noidung->noidung_title)),false)).'.html" title="'.str_replace("../",MTN_BASE_SITEURL.'/',$noidung->noidung_title).'"><img style="margin-top:5px;margin-right:5px;" src="'.MTN_BASE_SITEURL.'/images/icon_news.gif"/></a>';
				$image = "";
				if($noidung->noidung_images!="")
				{
					$image = '<a href="'.$lnd->RootContentAliasLink($noidung->loainoidung_id,"").$noidung->noidung_id.'-'.$f->convertViToEn(stripTags(str_replace("../",MTN_BASE_SITEURL.'/',htmlspecialchars_decode($noidung->noidung_title)),false)).'.html"><div class="imgNews"><img src="'.str_replace("../",MTN_BASE_SITEURL.'/',str_replace("noidung/","noidung/",$noidung->noidung_images)).'"/></div></a>';
				}
                $newList = $newList.$image;
				$newList = $newList. '<div class="title"><a class="title" href="'.$lnd->RootContentAliasLink($noidung->loainoidung_id,"").$noidung->noidung_id.'-'.$f->convertViToEn(stripTags(str_replace("../",MTN_BASE_SITEURL.'/',htmlspecialchars_decode($noidung->noidung_title)),false)).'.html"><h2 class="title">'.str_replace("../",MTN_BASE_SITEURL.'/',htmlspecialchars_decode($noidung->noidung_title)).'</h2></a></div>';
				$newList = $newList. '<div class="dateUpdate">'.$noidung->noidung_author.' - '.date('d/m/Y',strtotime($noidung->noidung_update_date)).'</div>';
                $newList = $newList. '<div class="note">'.$f->cutStr(htmlspecialchars_decode($noidung->noidung_note),30).'</div>';
                $newList = $newList. '
                                <div class="postdecription default-none"> 
                                    <ul>
                                        <li>
                                            <i class="fa fa-folder"></i> <a href="'.MTN_BASE_SITEURL.MTN_URLRewrite.$lnd->RootContentAliasLink($noidung->loainoidung_id,"").'">'.$lnd->getContentType($noidung->loainoidung_id,"loainoidung_title").'</a>
                                        </li>
                                        <li>
                                            <i class="fa fa-comment-o"></i> '.$noidung->noidung_count_command.'
                                        </li>
                                        <li>
                                           <i class="fa fa-eye"></i> '.$noidung->noidung_view.'
                                        </li>
                                    </ul>
                                </div>
                                ';
                $newList = $newList.'<div class="clear"></div></li>';
            }
            $newList = $newList.'</ul>';
			$PrimaryContent .= '
				<div id="news" class="mb-index">
					<div class="newsFirst">
						'.$newList.'
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
				</div>				
			';
		}	
	$PrimaryContent .= '
			</div>
		</div>
	';
    
    /**
     * Hiển thị các widget tin tức
     * Tạo một mảng lưu các loainoidung_id cần hiển thị, mỗi loainoidung_id sẽ hiển thị một list tin tức thuộc vào loainoidung_id dó
     * Duyệt qua từng phần tử của mảng, Kiểm tra xem dm này có dm con hay không? Nếu có hiển thị tất cả nội dung bao gồm tất cả loại con
     */
     $arrList = array(
        'HTML CĂN BẢN'    => 40
     );
     foreach($arrList as $key=>$list){
        //Lấy ra các loại con của từng loại
        $listPro = $lnd->typeCategory($list);
        if($listContent = $ct->getContentByTopicList($listPro,"noidung_id,loainoidung_id,user_id,noidung_title,noidung_note,noidung_content,noidung_images,noidung_update_date,noidung_view,noidung_count_command",0,10))
        {
            $newsList = '
                <div id="widgetP">
        			<h2 class="title-w">'.$key.'</h2>
                    <div id="widgetPContent" style="padding:10px 0px;">
                    <div id="news" class="mb-index">
					   <div class="newsFirst">
            ';
            $newsList .= '<ul>';
            foreach($listContent as $items){
                $newsList = $newsList.'<li>';
                $imagesub = '';//'<a href="'.RootContentAliasLink($noidung->loainoidung_id,"").$noidung->noidung_id.'-'.chuyendoi(stripTags(str_replace("../",MTN_BASE_SITEURL.'/',htmlspecialchars_decode($noidung->noidung_title)),false)).'.html" title="'.str_replace("../",MTN_BASE_SITEURL.'/',$noidung->noidung_title).'"><img style="margin-top:5px;margin-right:5px;" src="'.MTN_BASE_SITEURL.'/images/icon_news.gif"/></a>';
				$image = "";
				if($items->noidung_images!="")
				{
					$image = '<a href="'.$lnd->RootContentAliasLink($items->loainoidung_id,"").$items->noidung_id.'-'.$f->convertViToEn(stripTags(str_replace("../",MTN_BASE_SITEURL.'/',htmlspecialchars_decode($items->noidung_title)),false)).'.html"><div class="imgNews"><img src="'.str_replace("../",MTN_BASE_SITEURL.'/',str_replace("noidung/","noidung/",$items->noidung_images)).'"/></div></a>';
				}
                $newsList = $newsList.$image;
				$newsList = $newsList. '	<div class="title"><a class="title" href="'.$lnd->RootContentAliasLink($items->loainoidung_id,"").$items->noidung_id.'-'.$f->convertViToEn(stripTags(str_replace("../",MTN_BASE_SITEURL.'/',htmlspecialchars_decode($items->noidung_title)),false)).'.html"><h2 class="title">'.str_replace("../",MTN_BASE_SITEURL.'/',htmlspecialchars_decode($items->noidung_title)).'</h2></a></div>';
				$newsList = $newsList. '	<div class="dateUpdate"><a href="'.$user->getUser($items->user_id,"user_name").'">'.$user->getFullname($items->user_id).'</a> - '.date('d/m/Y',strtotime($items->noidung_update_date)).'</div>';
                $newsList = $newsList. '<div class="note">'.$f->cutStr(htmlspecialchars_decode($items->noidung_note),30).'</div>';
                $newsList = $newsList. '
                                <div class="postdecription default-none"> 
                                    <ul>
                                        <li>
                                            <i class="fa fa-folder"></i> <a href="'.MTN_BASE_SITEURL.MTN_URLRewrite.$lnd->RootContentAliasLink($items->loainoidung_id,"").'">'.$lnd->getContentType($items->loainoidung_id,"loainoidung_title").'</a>
                                        </li>
                                        <li>
                                            <i class="fa fa-comment-o"></i> '.$items->noidung_count_command.'
                                        </li>
                                        <li>
                                           <i class="fa fa-eye"></i> '.$items->noidung_view.'
                                        </li>
                                    </ul>
                                </div>
                                ';
                $newsList = $newsList.'<div class="clear"></div></li>';
            }
            $newsList = $newsList.'</ul></div></div></div>';
        }
        $PrimaryContent .= $newsList;
        
     }
    //FACEBOOK
    $PrimaryContent .= '<div id="widgetContent" style="width: auto;text-align: center;">';
        if($config->getConfig('config_fanpage') != ""){
            $PrimaryContent .= '<div id="fb-root"></div>
                                    <script>(function(d, s, id) {
                                          var js, fjs = d.getElementsByTagName(s)[0];
                                          if (d.getElementById(id)) return;
                                          js = d.createElement(s); js.id = id;
                                          js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5";
                                          fjs.parentNode.insertBefore(js, fjs);
                                        }(document, "script", "facebook-jssdk"));
                                    </script>
                                    <div class="fb-page" data-href="'.$config->getConfig('config_fanpage').'" data-tabs="event" data-width="340" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div>
                            ';
        }
   $PrimaryContent .= '</div>';
   //YOUTUBE
   $PrimaryContent .= '<div id="widgetContent" style="margin-bottom: 10px;text-align: center;">
                        <script src="https://apis.google.com/js/platform.js"></script>';
    
        if($config->getConfig('config_youtube')!=''){
            $PrimaryContent .=  '<div class="g-ytsubscribe" data-channelid="'.$config->getConfig('config_youtube').'" data-layout="full" data-count="default"></div>';
        }
   $PrimaryContent .= '</div>';
   $PrimaryContent .= '<div style="clear: both;"></div></div></div>';
?>
