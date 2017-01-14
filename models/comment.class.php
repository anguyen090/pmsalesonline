<?PHP

    /**
     * Author: Nguyễn Minh Trực
     * Creat date: 19-07-2015
     */
     
class Comment extends Database {
    
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Properties
     */
    private $comment_id;
    private $comment_modules;
    private $comment_item;
    private $comment_parent;
    private $comment_name;
    private $comment_content;
    private $comment_update_date;
    private $comment_update_ip;
    private $comment_status;
    
    /**
     * Properties Get Set
     */
    //$comment_id
    public function setComment_id($comment_id) {
        $this->comment_id = $comment_id;
    }
    
    public function getComment_id(){
        return $this->comment_id;
    }
    
    //$comment_modules
    public function setComment_modules($comment_modules){
        $this->comment_modules = $comment_modules;
    }
    
    public function getComment_modules(){
        return $this->comment_modules;
    }
    
    //$comment_item
    public function setComment_item($comment_item){
        $this->comment_item = $comment_item;
    }
    
    public function getComment_item(){
        return $this->comment_item;
    }
    
    //$comment_parent
    public function setComment_parent($comment_parent){
        $this->comment_parent = $comment_parent;
    }
    
    public function getComment_parent(){
        return $this->comment_parent;
    }
    
    //$comment_name
    public function setComment_name($comment_name){
        $this->comment_name = $comment_name;
    }
    
    public function getComment_name(){
        return $this->comment_name;
    }
    
    //$comment_content
    public function setComment_content($comment_content){
        $this->comment_content = $comment_content;
    }
    
    public function getComment_content(){
        return $this->comment_content;
    }
    
    //$comment_update_date
    public function setComment_update_date($comment_update_date){
        $this->comment_update_date = $comment_update_date;
    }
    
    public function getComment_update_date(){
        return $this->comment_update_date;
    }
    
    //$comment_update_ip
    public function setComment_update_ip($comment_update_ip){
        $this->comment_update_ip = $comment_update_ip;
    }
    
    public function getComment_update_ip(){
        return $this->comment_update_ip;
    }
    
    //$comment_status
    public function setComment_status($comment_status){
        $this->comment_status = $comment_status;
    }
    
    public function getComment_status(){
        return $this->comment_status;
    }
    
    //insert
    public function insert(){
        $db = new Database();
        $value = array(
            'comment_id'            => 'NULL',
            'comment_modules'       => $this->getComment_modules(),
            'comment_item'          => $this->getComment_item(),
            'comment_parent'        => $this->getComment_parent(),
            'comment_name'          => $this->getComment_name(),
            'comment_content'       => $this->getComment_content(),
            'comment_update_date'   => $this->getComment_update_date(),
            'comment_update_ip'     => $this->getComment_update_ip(),
            'comment_status'        => '1'
        );
        $result = $db->insertData('comment',$value);
        return $result;
    }
    
    //update
    public function update($id){
        $db = new Database();
        $value = array(
            'comment_modules'       => $this->getComment_modules(),
            'comment_item'          => $this->getComment_item(),
            'comment_parent'        => $this->getComment_parent(),
            'comment_name'          => $this->getComment_name(),
            'comment_content'       => $this->getComment_content(),
            'comment_update_date'   => $this->getComment_update_date(),
            'comment_update_ip'     => $this->getComment_update_ip()
        );
        $condition = array(
            'where'     => 'comment_id='.$id
        );
        $result = $db->updateData('comment',$value,$condition);
        return $result;
    }
    
    //delete
    
    //get a record
    public function getARecord($id,$value) {
        $db = new Database();
        $condition = array(
            'where'     => 'comment_status=1 AND comment_id='.intval($id)
        );
        $result = $db->getAData('comment',$value,$condition);
        return $result;
    }
    
    //get all
    public function getAll($value){
        $db = new Database();
        $condition = array(
            'where'     => 'comment_status=1'
        );
        $result = $db->getSData('comment',$value,$condition);
        return $result;
    }
    
    //get all nhiều điều kiện
    public function getAllCondition($value,$condition=array()){
        $db = new Database();
        $result = $db->getSData('comment',$value,$condition);
        return $result;
    }
    
    //count data dó điều kiện
    public function countComment($module, $id){
        $db = new Database();
        $value = "  COUNT(*) ";
        $condition = array(
            'where'     => 'comment_status=1 AND comment_modules= "'. $module .'" AND comment_item='.$id
        );
        $comment = $db->countData('comment', $value, $condition);
        $result = $comment > 0 ? $comment : 0;
        return $result;
        
    }
    /**
     * Hàm đếm số bình luận mới hiển thị thông báo cho admin
     * $type: Giá trị cần lấy: 1 hoặc 2
     * $value: Giá trị cần đếm (có thể là count(*))
     */
    public function countNewComment($type,$value){
        $db = new Database();
        $condition = array(
            'where'     => 'comment_isread='.intval($type)
        );
        $result = $db->countData('comment',$value,$condition);
        return $result;
    }
	/** Hàm lấy tất cả các comment cho vào một mảng */
	public function getCommentToArray($id,$value){
		$condition = array(
            'where'     => 'comment_status=1 AND comment_modules="content" AND comment_item='.intval($id)
        );
		$getComm = $this->getAllCondition($value,$condition);
		$commArr = array();
		foreach($getComm as $values){
			$commArr[] = $values;
		}
		return $commArr;
	}
	/**
	 * Hàm hiển thị comment khi được đệ quy
	*/
	public function checkCommentShow($parentid,$value,$opts,$idc,$user,$uname){
		//Lấy ra tất cả các comment
		$getCommContent = $this->getCommentToArray($idc,$value);
		$commentShow .= '';
		//Khai báo mảng tạm để lưu giá trị khi duyệt qua mảng getCommContent
		$comment_tmp = array();
		foreach($getCommContent as $key=>$val){
			if($val->comment_parent == $parentid){
				$comment_tmp[] = $val;
				unset($getCommContent[$key]); //Hủy Loại nội dung đã lấy ra.
			}
		}
		//Kiểm tra xem $comment_tmp có dữ liệu không? nếu có thì lấy ra
		if($comment_tmp){
			foreach($comment_tmp as $items){
				$name = $items->comment_name != "" ? $items->comment_name : "Giấu tên";
				if($items->comment_parent==0) {
					$addClass = "comment-box-show-parent";
					$marginbottom = "margin-top: 10px;";
				}else {
					$addClass = "comment-box-show-child";
					$marginbottom = "margin-top: 0px;";
				}
				$commentShow .= '
					<div class="'.$addClass.'">
						<div id="cm" style="padding:5px;'.$marginbottom.'">
							<div class="cm-img"><img src="'.MTN_BASE_SITEURL.MTN_URLRewrite.DTemplate.'/icon/icon-user.jpg" style="vertical-align: middle;" /></div>
							<div class="cm-ct">
								<div class="cm-name">'.$name.'</div><div class="cm-date-update"> - lúc: '.date("h:i:s",strtotime($items->comment_update_date)).' Ngày '.date("d/m/y",strtotime($items->comment_update_date)).'</div><div class="clear"></div>
								<div class="cm-content">'.str_replace("../",MTN_BASE_SITEURL.'/',htmlspecialchars_decode($items->comment_content)).'</div>
								<a href="#" id="loadcommentform" data-parent-id="'.$items->comment_id.'" data-rel="'.$opts.'|'.$idc.'|'.$user.'|'.$uname.'">Trả lời</a>
							</div>
							<div style="clear:both;"></div>
							<div class="comment-form" id="commentform_'.$items->comment_id.'"></div>
						</div>
					</div>
				';
				$commentShow .= $this->checkCommentShow($items->comment_id,$value,$opts,$idc,$user,$uname);
			}
		}
		return $commentShow;
	}
}