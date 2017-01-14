<?PHP
//Xác định trang layout được tạo: Trang chủ, trang content,...
$bid = $boxID;
function getLoaiTin($bid)
{
    $lnd = new LoaiNoiDung();
    $contentType = $lnd->getARecord($id);
    return $contentType->loainoidung_title;
}
function widgetShow($vitriLayout){
    global $tbfix,$db,$PrimaryContent,$lang,$urlRewrite,$pri,$option,$view,$action,$id,$page,$chuyendoi;
    //Khởi tạo lớp widget để lấy ra các widget tương ứng với từng vị trí
    $widgetContent = new Widgets();
    //Kiểm tra xem $vitrilayout có phải là một mảng trả về hay không?
    if(is_array($vitriLayout))
    {
        echo '<div id="widget">';
        //Duyệt qua tất cả các vị trí trong database
        //echo count($vitriLayout);
        for($i = 0 ; $i<count($vitriLayout); $i++){
            $dem=0;
            foreach($vitriLayout[$i] as $key=>$value){
                //$key: hienthivitri_positioin; $value: hienthivitri_content;
                if($showContent  =  $widgetContent->checkWidgetContent($value))
                {
                   //if($showContent['contentPrimary']=="") echo "Đang cập nhật";
                   //Khai báo vị trí nào không có chữ đăng bởi hoặc vào lúc.
                   $w = array(6);
                   $dd = in_array($key,$w,true) ? "" : "Đăng bởi: ";
                   //dt = date time
                   $dt = in_array($key,$w,true) ? "" : "Vào lúc: ";
                   //Nếu tồn tại vị trí chỉ định thì chỉ hiển thị ngày ngược lại hiển thị cả ngày lẫn giờ
                   $setdate = in_array($key,$w,true) ? "d/m/Y" : "d/m/Y h:i:s";
                        //Nếu là widget quảng cáo hiển thị tiêu đề
                        if(isset($showContent['widgetTitle']))  echo '<div id="WidgetTitle"><h2 class="title">' . $showContent['widgetTitle'] . '</h2></div>';
                        //Nếu là widget mặc định cài đặt bằng code tự viết
                        //$widgetDefault = isset($showContent['widgetContentDefault']) ? MTN_ROOTDIR . "/widgets/" . $showContent['widgetContentDefault'] : "";
                        
                        //if(empty($showContent)) echo "Không có dữ liệu";
						$style = '';
						$style = str_replace('<p>','',htmlspecialchars_decode($showContent['widgetStyle']));
						$style = str_replace('</p>','',htmlspecialchars_decode($style));
                        if(isset($showContent['widgetContentDefault'])){
                            echo '<div id="widgetContent" style="'.$style.'">';
                                require_once MTN_ROOTDIR . "/widgets/" . $showContent['widgetContentDefault'];
                            echo '</div>';
                        }
                        //Nếu là gia tri mac dinh
                        else if(isset($showContent['contentPrimary']) && $showContent['contentPrimary']!="") {
                            echo $showContent['contentPrimary'];
                        }
                        //Nếu là widget quảng cáo hiển thị nội dung
                        else if(isset($showContent['widgetContent'])) {
							$style = '';
							$style = str_replace('<p>','',htmlspecialchars_decode($showContent['widgetStyle']));
							$style = str_replace('</p>','',htmlspecialchars_decode($style));
                            echo '<div id="WidgetContent" style="'.$style.'">' . $showContent['widgetContent'] . '</div>';
                        }
                        else {
                        echo '<div id="widgetContent">';
                            echo '<ul>';
                            $dem = 0;
                            foreach($showContent as $k=>$item){
                                $dem++;
                                if($dem>1){
                                echo '<li>';
                                        $articleLink    = isset($item['link']) ? $item['link'] : "";
                                        $userLink       = isset($item['userlink']) ? $item['userlink'] : "";
                                        $topiclink      = isset($item['topiclink']) ? $item['topiclink'] : "";
                                        $image          = isset($item['images']) ? $item['images'] : "";
                                        $title          = isset($item['title']) ? $item['title'] : "";
                                        $note           = isset($item['note']) ? $item['note'] : "";
                                        $dateUpdate     = isset($item['updateDate']) ? $item['updateDate'] : "";
                                        $contentBy      = isset($item['contentby']) ? $item['contentby'] : "";
                                        $contentType    = isset($item['contenttype']) ? $item['contenttype'] : "";
                                        $content        = isset($item['content']) ? $item['content'] : "";
                                        $view           = isset($item['view']) ? $item['view'] : 0;
                                        $comment        = isset($item['comment']) ? $item['comment'] : 0;
                                        if(isset($item['images']) && $item['images'] != "") { echo '<div class="imgNews big">' . $image . '</div>'; }
                                        if(isset($item['title'])) { echo '<h3 class="title"><a href="'.$articleLink.'">' . $title . '</a></h3>'; }
                                        //datetime-w: Datetime của widget, datetime-a: Datetime của bài viết
                                        if(isset($item['updateDate'])) { echo '<div class="datetime">'.$dd.' <a href="'.$userLink.'">' .$contentBy. '</a> - '.$dt . date($setdate,strtotime($dateUpdate)) . '</div>'; }
                                        if(isset($item['note'])) { echo '<div class="note">' . cutStr($note,30) . '</div>'; }
                                        if(isset($item['content'])) { echo '<div class="content">' . $item['content'] . '</div>'; }
                                        if(isset($contentType) && $contentType !="") {
                                            echo '
                                                <div class="postdecription"> 
                                                    <ul>
                                                        <li class="topic">
                                                            <a href="'.$topiclink.'">' . $contentType . '</a>
                                                        </li>
                                                        <li class="comment">
                                                            Bình luận: '.$comment.'
                                                        </li>
                                                        <li class="view">
                                                            Xem: '.$view.'
                                                        </li>
                                                    </ul>
                                                </div>'; 
                                        }
                                    echo '<div style="clear:both;"></div></li>';
                                    }
                                }//END foreach
                            echo '</ul>';
                        echo '</div>';//END div widgetContent id
                   }//END else
                }
            }//END foreach
        }
        echo '</div>';//END div widget
    }//END if check array
}
//Function add layout content
function addLayoutContent($boxID)
{
    global $PrimaryContent;
    //Khởi tạo biến
    $pageShowContent = '';
    //Khởi tạo lớp Hiển Thị vị trí
    $vitriShow = new HienThiViTri();
    /**
     * Kiểm tra hiển thị tương ứng 14 vị trí
     */
    $vitri1Layout = $vitriShow->positionShow($boxID,'1');
    if(isset($vitri1Layout) && !empty($vitri1Layout)){
        echo '<div id="vitri1">';
            widgetShow($vitri1Layout);
        echo '</div>';
    }
    echo '<div style="clear:both;"></div>';
    //END VI TRI 1
    $vitri2Layout = $vitriShow->positionShow($boxID,'2');
    if(isset($vitri2Layout) && !empty($vitri2Layout)){
        echo '<div class="wrapper"><div id="vitri2">';
            widgetShow($vitri2Layout);
        echo '</div>';
    }
    echo '</div><div style="clear:both;"></div>';
    echo '<div id="vitri34"><div class="wrapper">';
        $vitri3Layout = $vitriShow->positionShow($boxID,'3');
        if(isset($vitri3Layout) && !empty($vitri3Layout)){
            echo '<div id="vitri3">';
                widgetShow($vitri3Layout);
            echo '</div>';
        }
        $vitri4Layout = $vitriShow->positionShow($boxID,'4');
        if(isset($vitri4Layout) && $vitri4Layout!= ""){
            echo '<div id="vitri4">';
                widgetShow($vitri4Layout);
            echo '</div>';
        }
    echo '</div><div style="clear:both"></div></div>';
    //END VI TRI 2 3
    echo '<div id="vitri56"><div class="wrapper">';
    $vitri5Layout = $vitriShow->positionShow($boxID,'5');
    if(isset($vitri5Layout) && !empty($vitri5Layout)){
        echo '<div id="vitri5">';
            widgetShow($vitri5Layout);
        echo '</div>';
    }
    $vitri6Layout = $vitriShow->positionShow($boxID,'6');
    if(isset($vitri6Layout) && !empty($vitri6Layout)){
        echo '<div id="vitri6">';
            widgetShow($vitri6Layout);
        echo '</div>';
    }
    echo '</div><div style="clear:both;"></div></div>';
    //END VI TRI 45
    echo '<div id="78"><div class="wrapper">';
    $vitri7Layout = $vitriShow->positionShow($boxID,'7');
    if(isset($vitri7Layout) && !empty($vitri7Layout)){
        echo '<div id="vitri7">';
            widgetShow($vitri7Layout);
        echo '</div>';
    }
    $vitri8Layout = $vitriShow->positionShow($boxID,'8');
    if(isset($vitri8Layout) && !empty($vitri8Layout)){
        echo '<div id="vitri8">';
            widgetShow($vitri8Layout);
        echo '</div>';
    }
    echo '</div><div style="clear:both;"></div></div>';
    //END VI TRI 67
    echo '<div id="910"><div class="wrapper">';
    $vitri9Layout = $vitriShow->positionShow($boxID,'9');
    if(isset($vitri9Layout) && !empty($vitri9Layout)){
        echo '<div id="vitri9">';
            widgetShow($vitri9Layout);
        echo '</div>';
    }
    $vitri10Layout = $vitriShow->positionShow($boxID,'10');
    if(isset($vitri10Layout) && !empty($vitri10Layout)){
        echo '<div id="vitri10">';
            widgetShow($vitri10Layout);
        echo '</div>';
    }
    echo '</div><div style="clear:both;"></div></div>';
    //END VI TRI 6 7
    echo '<div id="vitri111213"><div class="wrapper">';
    $vitri11Layout = $vitriShow->positionShow($boxID,'11');
    if(isset($vitri11Layout) && !empty($vitri11Layout)){
        echo '<div id="vitri11">';
            widgetShow($vitri11Layout);
        echo '</div>';
    }
    $vitri12Layout = $vitriShow->positionShow($boxID,'12');
    if(isset($vitri12Layout) && !empty($vitri12Layout)){
        echo '<div id="vitri12">';
            widgetShow($vitri12Layout);
        echo '</div>';
    }
    $vitri13Layout = $vitriShow->positionShow($boxID,'13');
    if(isset($vitri13Layout) && !empty($vitri13Layout)){
        echo '<div id="vitri13">';
            widgetShow($vitri13Layout);
        echo '</div>';
    }
    echo '</div><div style="clear:both;"></div></div>';
    echo '<div id="vitri141516"><div class="wrapper">';
    $vitri14Layout = $vitriShow->positionShow($boxID,'14');
    if(isset($vitri14Layout) && !empty($vitri14Layout)){
        echo '<div id="vitri14">';
            widgetShow($vitri14Layout);
        echo '</div>';
    }
    $vitri15Layout = $vitriShow->positionShow($boxID,'15');
    if(isset($vitri15Layout) && !empty($vitri15Layout)){
        echo '<div id="vitri15">';
            widgetShow($vitri15Layout);
        echo '</div>';
    }
    $vitri16Layout = $vitriShow->positionShow($boxID,'16');
    if(isset($vitri16Layout) && !empty($vitri16Layout)){
        echo '<div id="vitri16">';
            widgetShow($vitri16Layout);
        echo '</div>';
    }
    echo '</div><div style="clear:both;"></div></div>';
    $vitri17Layout = $vitriShow->positionShow($boxID,'17');
    if(isset($vitri17Layout) && !empty($vitri17Layout)){
        echo '<div id="vitri17">';
            widgetShow($vitri17Layout);
        echo '</div>';
    }
}
//Hiển thị layout
addLayoutContent($bid);

