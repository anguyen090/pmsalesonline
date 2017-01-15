<?php
    $b = new BannerSlide();
?>
<div class="bannerSlide">
    <div class="wrapper">
        <div id="slider1_container" style="position: relative; top: 0px; left: 0px;margin-bottom:1px; width: 995px; height: 193px;">
            <!-- Loading Screen -->
            <div u="loading" style="position: absolute; top: 0px; left: 0px;">
                <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;background-color: #000000; top: 0px; left: 0px;width: 100%;height:100%;">
                </div>
                <div style="position: absolute; display: block; background: url(<?PHP echo MTN_BASE_SITEURL;?>/widgets/bannerSlide/js_css/img/loading.gif) no-repeat center center;top: 0px; left: 0px;width: 100%;height:100%;"></div>
            </div>
    
            <!-- Slides Container -->
            
            <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 995px; height: 193px; overflow: hidden;">
    			<?PHP
    				if($bGetS = $b->getAll("bannerSlide_id,bannerSlide_title,bannerSlide_bgcolor,bannerSlide_link,bannerSlide_images"))
                    {
                        
                        foreach ($bGetS as $item)
                        {
                            
                            echo '<div>
                                    <a rel="'.$item->bannerSlide_bgcolor.'" href="'.$item->bannerSlide_link.'" title="'.$item->bannerSlide_title.'">
            							 <img id="image_'.$i.'" u="image" rel="'.$item->bannerSlide_bgcolor.'" src="'.str_replace("../",MTN_BASE_SITEURL.'/',$item->bannerSlide_images).'" />
                                    </a>
                                </div>';
                            $i++;
                        }
                    }
    			?>
    		</div>
    	</div>
        <script>
    		jQuery(document).ready(function ($) {
    			var captionTransitions_childSliders = [
                //R|IB
                {$Duration: 900, x: -0.6, $Easing: { $Left: $JssorEasing$.$EaseInOutBack }, $Opacity: 2 }
                //B|IB
                , { $Duration: 900, y: -0.6, $Easing: { $Top: $JssorEasing$.$EaseInOutBack }, $Opacity: 2 }
                //R*|IB
                , { $Duration: 900, x: -0.6, $Zoom: 3, $Rotate: -0.3, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Rotate: $JssorEasing$.$EaseInBack }, $Opacity: 2 }
                //B*|IB
                , { $Duration: 900, y: -0.6, $Zoom: 3, $Rotate: -0.3, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Rotate: $JssorEasing$.$EaseInBack }, $Opacity: 2 }
                //R-*|IB
                , { $Duration: 900, x: -0.7, $Rotate: 0.5, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseInQuad, $Rotate: $JssorEasing$.$EaseInBack }, $Opacity: 2, $During: { $Left: [0.2, 0.8]} }
                //B-*|IB
                , { $Duration: 900, y: -0.7, $Rotate: 0.5, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseInQuad, $Rotate: $JssorEasing$.$EaseInBack }, $Opacity: 2, $During: { $Top: [0.2, 0.8]} }
                //CLIP|LR
                , { $Duration: 900, $Clip: 3, $Easing: { $Clip: $JssorEasing$.$EaseInOutCubic }, $Opacity: 2 }
                //CLIP|TB
                , { $Duration: 900, $Clip: 12, $Easing: { $Clip: $JssorEasing$.$EaseInOutCubic }, $Opacity: 2 }
                //CLIP|L
                , { $Duration: 800, $Clip: 1, $Easing: { $Clip: $JssorEasing$.$EaseInOutCubic }, $Opacity: 2 }
                //ZM*JDN|RB
                , { $Duration: 1200, x: -0.8, y: -0.5, $Zoom: 11, $Easing: { $Left: $JssorEasing$.$EaseLinear, $Top: $JssorEasing$.$EaseOutCubic, $Zoom: $JssorEasing$.$EaseInCubic }, $Opacity: 2, $During: { $Top: [0, 0.5]} }
                //RTT*JUP|RB
                , { $Duration: 1200, x: -0.8, y: -0.5, $Zoom: 11, $Rotate: 0.2, $Easing: { $Left: $JssorEasing$.$EaseLinear, $Top: $JssorEasing$.$EaseInCubic, $Zoom: $JssorEasing$.$EaseInCubic }, $Opacity: 2, $During: { $Top: [0, 0.5]} }
                //TORTUOUS|VB
                , { $Duration: 1800, y: -0.2, $Zoom: 1, $Easing: { $Top: $JssorEasing$.$EaseOutWave, $Zoom: $JssorEasing$.$EaseOutCubic }, $Opacity: 2, $During: { $Top: [0, 0.7] }, $Round: { $Top: 1.3} }
                ];	
                var optionsSlide = {
                    $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                    $AutoPlaySteps: 1,                                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
                    $AutoPlayInterval: 3000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                    $PauseOnHover: 1,                               //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, default value is 1
                    $ArrowKeyNavigation: true,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                    $SlideDuration: 500,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                    $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
                    $SlideSpacing: 0, 					                //[Optional] Space between each slide in pixels, default value is 0
                    $DisplayPieces: 1,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                    $ParkingPosition: 0,                                //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
                    $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                    $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
                    $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)
                    $SlideshowOptions: {                                //[Optional] Options to specify and enable slideshow or not
                        $Class: $JssorSlideshowRunner$,                 //[Required] Class to create instance of slideshow
                        $Transitions: [{ $Duration: 1200, $Opacity: 2 }],//[SLIDE][Required] An array of slideshow transitions to play slideshow
                        $TransitionsOrder: 1,                           //[Optional] The way to choose transition to play slide, 1 Sequence, 0 Random
                        $ShowLink: true                                    //[Optional] Whether to bring slide link on top of the slider when slideshow is running, default value is false
                    },
    				$CaptionSliderOptions: {                            //[Optional] Options which specifies how to animate caption
                        $Class: $JssorCaptionSlider$,                   //[Required] Class to create instance to animate caption
                        $CaptionTransitions: captionTransitions_childSliders,       //[Required] An array of caption transitions to play caption, see caption transition section at jssor slideshow transition builder
                        $PlayInMode: 1,                                 //[Optional] 0 None (no play), 1 Chain (goes after main slide), 3 Chain Flatten (goes after main slide and flatten all caption animations), default value is 1
                        $PlayOutMode: 3                                 //[Optional] 0 None (no play), 1 Chain (goes before main slide), 3 Chain Flatten (goes before main slide and flatten all caption animations), default value is 1
                    }
                };
                //responsive code begin
                //you can remove responsive code if you don't want the slider scales while window resizes
                function ScaleSlider(jssor_slider,swidth) {
                    var parentWidth = jssor_slider.$Elmt.parentNode.clientWidth;
                    if (parentWidth)
                        jssor_slider.$SetScaleWidth(Math.min(parentWidth, swidth));
                    else
                        window.setTimeout(ScaleSlider(jssor_slider,swidth), 30);
                }
    			//THUC THI CHAY SLIDE
    			var jssor_slider1 = new $JssorSlider$("slider1_container", optionsSlide);
                ScaleSlider(jssor_slider1,995);
                function SlideParkEventHandler(slideIndex, fromIndex) {
                    var colorEachImg = $("#image_" + slideIndex).attr("rel");
                    setTimeout(function(){
                        $(".bannerSlide").css({"background-color":"#"+colorEachImg,"border-top":"1px solid #e7e7e7","margin-top":"1px", "transition":"background-color 1s ease"});
                    }, 500);
                }
        
                jssor_slider1.$On($JssorSlider$.$EVT_PARK, SlideParkEventHandler);
            });
        </script>
    </div>
</div>