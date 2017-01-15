<?PHP

$name = isset($_COOKIE['user_name']) ? $_COOKIE['user_fullname'] : "";
$active = isset($_COOKIE['user_name']) ? 'readonly="readonly"' : "";

$PrimaryContent = $PrimaryContent.'<div>';
	
	$PrimaryContent = $PrimaryContent.'
            <div class="box-title">Nào chúng ta cùng thảo luận</div>
            <div class="container"></div>
			<div id="commentInfo" style="margin-top:14px;">
				<form id="commentForm" name="commentForm" method="POST" action="">
					<input type="hidden" id="cmoption" name="option" value="'.$option.'">
					<input type="hidden" id="cmitem" name="item" value="'.$id.'">
                    <p style="margin-bottom:10px;">
                        <textarea class="input textarea" id="cmcontent" name="cmcontent" placeholder="Nội dung bình luận" ></textarea>
                    </p>
					<input  name="submit" type="submit" class="button right" id="commentSubmit" value="Gửi bình luận" />
				</form>
			</div>
            <div style="clear: both;"></div>
		</div>
	';
    $PrimaryContent = $PrimaryContent.'
		<div id="comment" style="display:block;">
        <div class="cm-line-content"><p><a href="javascript:void(0)">Ẩn bình luận [-]</a></p></div>
			<div id="news" style="max-height:300px;overflow: auto;">
	';
		$cm = new Comment();
        $condition = array(
            'where'     => 'comment_status=1 AND comment_modules="content" AND comment_item='.intval($id)
        );
        if($comment = $cm->getAllCondition("comment_name,comment_content,comment_update_date",$condition))
        {        
            //LOAD BÌNH LUẬN LÊN
    		foreach ($comment as $comment)
    		{
    			$PrimaryContent = $PrimaryContent.'
    			<div id="cm" style="padding:2px;">
                    <div class="cm-img"></div>
                    <div class="cm-ct">
                        <div class="cm-name">'.$comment->comment_name.'</div>
                        <div class="cm-date-update">Lúc: '.date("h:i:s",strtotime($comment->comment_update_date)).' Ngày '.date("d/m/y",strtotime($comment->comment_update_date)).'</div>
                        <div class="cm-content">'.str_replace("../",MTN_BASE_SITEURL.'/',htmlspecialchars_decode($comment->comment_content)).'</div>
        			</div>
                    <div style="clear:both;height:10px;"></div>
                </div>
    			';
            }
        }
$PrimaryContent = $PrimaryContent.'</div></div>';
?>