		<style>.jssorb05 div, .jssorb05 div:hover, .jssorb05 .av {    background: url(<?PHP echo MTN_BASE_SITEURL.DTemplate;?>/jssor/img/b12.png) no-repeat;    overflow: hidden;    cursor: pointer;}.jssorb05 div {    background-position: -7px -7px;}    .jssorb05 div:hover, .jssorb05 .av:hover {        background-position: -37px -7px;    }.jssorb05 .av {    background-position: -67px -7px;}.jssorb05 .dn, .jssorb05 .dn:hover {    background-position: -97px -7px;}.jssora12l, .jssora12r, .jssora12ldn, .jssora12rdn {    position: absolute;    cursor: pointer;    display: block;    background: url(<?PHP echo MTN_BASE_SITEURL.DTemplate;?>/jssor/img/a03.png) no-repeat;    overflow: hidden;}.jssora12l {    background-position: 1px -1px;}.jssora12r {    background-position: -28px 0px;}.jssora12l:hover {    background-position: 1px -1px;}.jssora12r:hover {    background-position: -28px 0px;}.jssora12ldn {    background-position: -256px -37px;}.jssora12rdn {    background-position: -315px -37px;}</style>
				<style>.viewmore{width:84px;height:22px;line-height:22px;font-size:12px;text-tranform:uppercase;text-align:center;margin:10px;background: url('<?PHP echo MTN_BASE_SITEURL.Templates;?>/js_css/images/more_bg.png') top left no-repeat;}
				.captionOrange, .captionBlue, .captionBlack, .captionSymbol{ display: block; color: #fff; font-size: 30px; line-height: 30px;padding:20px; border-radius: 4px;}.captionOrange{ background: #69b0d7; background-color: rgba(105, 176, 215, 0.6);}.captionBlue{ background: #746FBD; background-color: rgba(21, 21, 120, 0.6);}.captionBlack{ background: #000; background-color: rgba(0, 0, 0, 0.4);}.captionSymbol{	border-radius: 100px !important;	font-weight: 400 !important;	font-size: 26px !important; background: #000; background-color: rgba(0, 0, 0, 0.4);}.captionTextBlack{	display: block;	color: #000;	font-size: 20px;	line-height: 30px;}.captionTextWhite{	display: block;	color: #fff;	font-size: 20px;	line-height: 30px;}a.captionOrange, a.captionOrange:active, a.captionOrange:visited,a.captionTextWhite, a.captionTextWhite:active, a.captionTextWhite:visited{	color: #fff;	text-decoration: none;}a.captionOrange:hover{ color: #eb5100; text-decoration: underline; background-color: #eeeeee; background-color: rgba(238, 238, 238, 0.7);}a.captionTextBlack, a.captionTextBlack:active, a.captionTextBlack:visited{	color: #000;	text-decoration: none;}a.captionTextWhite:hover{ color: #eb5100; text-decoration: underline;}a.captionTextBlack:hover{ color: #eb5100; text-decoration: underline;}.jssorb01 div, .jssorb01 div:hover, .jssorb01 .av{filter: alpha(opacity=70);opacity: .7;overflow:hidden;cursor: pointer;border: #000 1px solid;-webkit-border-radius: 6px;-moz-border-radius: 6px;border-radius: 6px;}.jssorb01 div { background-color: gray; }.jssorb01 div:hover, .jssorb01 .av:hover { background-color: #d3d3d3; }.jssorb01 .av { background-color: #fff; }.jssorb01 .dn, .jssorb01 .dn:hover { background-color: #555555; }.thumbnail{display:block;padding:4px;margin-bottom:20px;line-height:1.42857143;text-align:center;background-color:#fff;border:1px solid #ddd;border-radius:4px;-webkit-transition:border .2s ease-in-out;-o-transition:border .2s ease-in-out;transition:border .2s ease-in-out}.imgSlide img{max-height:100%;}.play,.pause{font-size: 40px;color:#999;position:absolute;z-index:99;top:10px;right:10px;border: 8px solid;padding: 8px;border-radius: 50%;cursor: pointer;}.controls{padding-bottom: 20px;}
				.jssora12l{width: 24px; height: 24px; top: -40px; right: 40px;}
				.jssora12r{width: 24px; height: 24px; top: -40px; right: 10px;}
				#doitactslide_container{background: url(<?PHP echo MTN_BASE_SITEURL.Templates;?>/js_css/images/top_bbg.gif) top left repeat-x;clear:both;position: relative; top: 0px; left: 0px;margin:0px auto; width: 990px;height: 145px;}
				#doitactslide_container_s{background: url(<?PHP echo MTN_BASE_SITEURL.Templates;?>/js_css/images/bottom_bbg.gif) bottom left repeat-x;cursor: move; position: absolute; left: -10px; top: 0px; width: 990px; height: 152px; overflow: hidden;}
				.imgSlide {width: 77px;height: 53px;border: 1px solid #cdced0;float: left; margin-right: 10px;}
                .note {text-align: justify;color: #555;padding: 5px 0px;}
                .topic {float: left;}
                .topic span {color: #555;}
                .viewdetailt {display: block;width: 102px; height: 21px; background: blue; color: #fff; float: right;background:  url(<?PHP echo MTN_BASE_SITEURL.Templates;?>/button/btn_viewdetailt.gif) top left no-repeat;}
                .viewdetailt a {display: block; padding: 2px 10px; color: #fff;}
                .title a {color: #000;}
                </style>
				<div id="doitactslide_container">
					<!-- Loading Screen -->
					<div u="loading" style="position: absolute; top: 0px; left: 0px;">
						<div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;background-color: #000000; top: 0px; left: 0px;width: 100%;height:100%;">
						</div>
						<div style="position: absolute; display: block; background: url(<?PHP echo MTN_BASE_SITEURL;?>/widgets/doitac/js_css/img/loading.gif) no-repeat center center;top: 0px; left: 0px;width: 100%;height:100%;"></div>
					</div>

					<!-- Slides Container -->
					<div id="doitactslide_container_s" u="slides">
						<?PHP
							$content = new Content();
                            $lnd = new LoaiNoiDung();
                            $user = new User();
                            $f = new functionGet();
							if($contentS = $content->getContentState('hot','noidung_id,loainoidung_id,noidung_title,user_id,noidung_images,noidung_note,noidung_update_date',0,10))
							{
								foreach($contentS as $contentS)
								{
									echo '
                                        <div>
                                            <div class="slide">
                                                <div class="imgSlide">
                                                    <img u="image" src="'.str_replace("../",MTN_BASE_SITEURL.'/',$contentS->noidung_images).'"  alt="'.$contentS->noidung_title.'" />
                                                </div>
                                                <h3 class="title" style="padding: 0px 10px;">
                                                    <a href="'.MTN_BASE_SITEURL.MTN_URLRewrite.$lnd->RootContentAliasLink($contentS->loainoidung_id,"").$contentS->noidung_id.'-'.$f->convertViToEn($contentS->noidung_title).'.html">'.$contentS->noidung_title.'</a>
                                                    <div class="datetime" style="font-weight: normal">Lúc '.date('h:i:s', strtotime($contentS->noidung_update_date)).' Ngày '.date('d/m/Y', strtotime($contentS->noidung_update_date)).'</div>
                                                </h3>
                                            </div>
                                            <div class="note" style="clear:both;margin-top:5px;">
                                                '.cutStr(htmlspecialchars_decode($contentS->noidung_note),30).'
                                            </div>
                                            <div class="topic">
                                                <a href="'.MTN_BASE_SITEURL.MTN_URLRewrite.$lnd->RootContentAliasLink($contentS->loainoidung_id,"").'">'.$lnd->getContentType($contentS->loainoidung_id,'loainoidung_title').'</a> <span>|</span>
                                                <a href="'.MTN_BASE_SITEURL.MTN_URLRewrite.$user->getUser($contentS->user_id,'user_name').'">'.$user->getUser($contentS->user_id,'user_firstname').' '.$user->getUser($contentS->user_id,'user_lastname').'</a>
                                            </div>
                                            <div class="viewdetailt">
                                                <a href="'.MTN_BASE_SITEURL.MTN_URLRewrite.$lnd->RootContentAliasLink($contentS->loainoidung_id,"").$contentS->noidung_id.'-'.$f->convertViToEn($contentS->noidung_title).'.html">Xem chi tiết</a>
                                            </div>
                                        </div>';
								}
							}
						?>
					</div>
					<div u="navigator" class="jssorb05" style="position: absolute;z-index:4; bottom: 15px; left: 16px;">
						<!-- bullet navigator item prototype -->
						<div u="prototype" style="POSITION: absolute; WIDTH: 22px; HEIGHT: 22px;"></div>
					</div>
					<span u="arrowleft" class="jssora12l"></span>
					<!-- Arrow Right -->
					<span u="arrowright" class="jssora12r"></span>
				</div>
				<script>
					jQuery(document).ready(function ($) {
						var options = {
							$AutoPlay: false,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
							$AutoPlaySteps: 4,                                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
							$AutoPlayInterval: 4000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
							$PauseOnHover: 1,                               //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

							$ArrowKeyNavigation: true,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
							$SlideDuration: 160,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
							$MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
							$SlideWidth: 320,                                   //[Optional] Width of every slide in pixels, default value is width of 'slides' container
							$SlideHeight: 140,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
							$SlideSpacing: 10, 					                //[Optional] Space between each slide in pixels, default value is 0
							$DisplayPieces: 4,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
							$ParkingPosition: 8,                              //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
							$UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
							$PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
							$DragOrientation: 1,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

							$BulletNavigatorOptions: {                                //[Optional] Options to specify and enable navigator or not
								$Class: $JssorBulletNavigator$,                       //[Required] Class to create navigator instance
								$ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
								$AutoCenter: 0,                                 //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
								$Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
								$Lanes: 1,                                      //[Optional] Specify lanes to arrange items, default value is 1
								$SpacingX: 0,                                   //[Optional] Horizontal space between each item in pixel, default value is 0
								$SpacingY: 0,                                   //[Optional] Vertical space between each item in pixel, default value is 0
								$Orientation: 1                                 //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
							},

							$ArrowNavigatorOptions: {
								$Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
								$ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
								$AutoCenter: 0,                                 //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
								$Steps: 4                                       //[Optional] Steps to go for each navigation request, default value is 1
							}
						};
						//responsive code begin
						var jssor_doitactslide = new $JssorSlider$("doitactslide_container", options);

						//responsive code begin
						//you can remove responsive code if you don't want the slider scales while window resizes
						function ScaleSlider() {
							var bodyWidth = document.body.clientWidth;
							if (bodyWidth)
								jssor_doitactslide.$ScaleWidth(Math.min(bodyWidth, 990));
							else
								window.setTimeout(ScaleSlider, 30);
						}
						ScaleSlider();

						$(window).bind("load", ScaleSlider);
						$(window).bind("resize", ScaleSlider);
						$(window).bind("orientationchange", ScaleSlider);
					});
				</script>
				<div class="clear"></div>