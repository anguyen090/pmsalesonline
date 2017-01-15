<?PHP
$f = new functionGet();
$cm = new Comment();
$name = isset($_COOKIE['login_username']) ? $_COOKIE['login_firstname'].''.$_COOKIE['login_lastname'] : "";
$active = isset($_COOKIE['login_username']) ? 'readonly="readonly"' : "";
//Khai báo các khóa dữ liệu
	$getKey = array(
		'log_key_en_id'         => '$Log@KwID',
		'log_key_cv_id'         => 'KwiD',
		'log_key_en_firstname'  => '$Log@KwFname',
		'log_key_cv_firstname'  => 'FLnA',
		'log_key_en_lastname'   => '$Log@KwLname',
		'log_key_cv_lastname'      => 'LLnA'
	);
	$firstname = $f->decodeID($getKey['log_key_en_firstname'],$getKey['log_key_cv_firstname'],$_COOKIE['login_firstname']);
	$flastname = $f->decodeID($getKey['log_key_en_lastname'],$getKey['log_key_cv_lastname'],$_COOKIE['login_lastname']);
	$fullname = isset($_COOKIE['login_firstname']) && isset($_COOKIE['login_lastname']) ? $firstname.' '.$flastname : "";
	$countCommand = $cm->countComment($option,$id);
	$PrimaryContent = $PrimaryContent.'<div>';
	$PrimaryContent = $PrimaryContent.'
            <div class="comment-box">
                <div class="comment-box-title">Nào chúng ta cùng thảo luận</div>
            </div>
            <div class="comment-box">
                <div class="cm-alert"></div>
            </div>
			<div id="commentInfo" style="margin-top:14px;">
                <form id="commentForm" name="commentForm" method="POST" action="">
                    <div class="comment-box">
                        <div class="comment-box-full">
        					<input type="hidden" id="cmoption" name="option" value="'.$option.'">
        					<input type="hidden" id="cmitem" name="item" value="'.$id.'">
                            <input type="hidden" id="cmuser" name="cmuser" value="'.$_COOKIE['login_username'].'">
							<input type="hidden" id="cmparent" name="cmparent" value="0">
                            <textarea class="input textarea" id="cmcontent" name="cmcontent" required placeholder="Nội dung bình luận" ></textarea>
                        </div>
                        <div class="comment-box-input">
                            <div class="comment-box-left">
                                <input class="input" name="cmname" id="cmname" type="text" value="'.$fullname.'" '.$active.' required placeholder="Nhập tên của bạn" />
                            </div>
                            <div class="comment-box-right">
        					   <input  name="submit" type="submit" class="button right" value="Gửi bình luận" />
                            </div>
                            <div style="clear: both;"></div>
                        </div>
                    <div>
				</form>
			</div>
            <div style="clear: both;"></div>
		</div>
	';
    $PrimaryContent = $PrimaryContent.'
		<div id="comment" style="display:block;">
        <div class="comment-box">
            <div class="comment-line-content">
                <p class="left">
					Bình luận : <strong>'.$countCommand.'</strong>
				</p>
				<p>
                    <a class="right" href="javascript:void(0)" onclick="return showHideContent(\'comment-box-content\',\'closecm\',\'Ẩn bình luận [-]\',\'Hiện bình luận [+]\');"><span class="closecm">Ẩn bình luận [-]</span></a>
                </p>
                <div class="clear"></div>
            </div>
        </div>
		<div id="comment-box-content">
            <div class="comment-box">
	';
        $PrimaryContent = $PrimaryContent.$cm->checkCommentShow(0,"comment_id,comment_name,comment_parent,comment_content,comment_update_date",$option,$id,$_COOKIE['login_username'],$fullname);
		/*
		if($comment = $cm->getAllCondition("comment_id,comment_name,comment_parent,comment_content,comment_update_date",$condition))
        {        
            //LOAD BÌNH LUẬN LÊN
    		foreach ($comment as $comment)
    		{
    			$name = $comment->comment_name != "" ? $comment->comment_name : "Giấu tên";
				/*
				$PrimaryContent = $PrimaryContent.'
    			<div id="cm" style="padding:2px;">
                    <div class="cm-img"><img src="'.MTN_BASE_SITEURL.MTN_URLRewrite.DTemplate.'/icon/icon-user.jpg" style="vertical-align: middle;" /></div>
                    <div class="cm-ct">
                        <div class="cm-name">'.$name.'</div><div class="cm-date-update"> - lúc: '.date("h:i:s",strtotime($comment->comment_update_date)).' Ngày '.date("d/m/y",strtotime($comment->comment_update_date)).'</div><div class="clear"></div>
                        <div class="cm-content">'.str_replace("../",MTN_BASE_SITEURL.'/',htmlspecialchars_decode($comment->comment_content)).'</div>
						<a href="#" id="loadcommentform" data-parent-id="'.$comment->comment_id.'" data-rel="'.$option.'|'.$id.'|'.$_COOKIE['login_username'].'">Trả lời</a>
						<div class="comment-form" id="commentform_'.$comment->comment_id.'"></div>
        			</div>
                    <div style="clear:both;height:10px;"></div>
                </div>
                ';
            }
        }*/
$PrimaryContent = $PrimaryContent.'</div></div></div></div></div>';
?>