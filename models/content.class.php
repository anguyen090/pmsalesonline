<?PHP

/**
 * Author: Nguyễn Minh Trực
 * Date: 05/09/2015
 */
 
class Content extends Database {
    
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Properties
     * Các tru?ng trong b?ng database
     */
    private $noidung_id;
    private $loainoidung_id;
    private $noidung_title;
    private $noidung_alias;
    private $noidung_note;
    private $noidung_content;
    private $noidung_author;
    private $noidung_by;
    private $noidung_images;
    private $noidung_date;
    private $noidung_ip;
    private $noidung_update_date;
    private $noidung_update_ip;
    private $noidung_update_by;
    private $noidung_order;
    private $noidung_view;
    private $noidung_hot;
    private $noidung_command;
    private $noidung_count_command;
    private $noidung_rate;
    private $noidung_status;
    private $noidung_editor;
    private $noidung_lang;

    /**
     * Properties GET SET
     */
    //$noidung_id
    public function setNoidung_id($noidung_id){
        $this->noidung_id = $noidung_id;
    }
    
    public function getNoidung_id(){
        return $this->noidung_id;
    }
    
    //$loainoidung_id
    public function setLoainoidung_id($loainoidung_id){
    	$this->loainoidung_id = $loainoidung_id;
    }
    
    public function getLoainoidung_id(){
    	return $this->loainoidung_id;
    }
    
    	//$noidung_title
	public function setNoidung_title($noidung_title){
		$this->noidung_title = $noidung_title;
	}

	public function getNoidung_title(){
		return $this->noidung_title;
	}
	
	//$noidung_alias
	public function setNoidung_alias($noidung_alias){
		$this->noidung_alias = $noidung_alias;
	}

	public function getNoidung_alias(){
		return $this->noidung_alias;
	}
	
	//$noidung_note
	public function setNoidung_note($noidung_note){
		$this->noidung_note = $noidung_note;
	}

	public function getNoidung_note(){
		return $this->noidung_note;
	}
	
	//$noidung_content
	public function setNoidung_content($noidung_content){
		$this->noidung_content = $noidung_content;
	}

	public function getNoidung_content(){
		return $this->noidung_content;
	}
	
	//$noidung_author
	public function setNoidung_author($noidung_author){
		$this->noidung_author = $noidung_author;
	}

	public function getNoidung_author(){
		return $this->noidung_author;
	}
	
	//$noidung_by
	public function setNoidung_by($noidung_by){
		$this->noidung_by = $noidung_by;
	}

	public function getNoidung_by(){
		return $this->noidung_by;
	}
	
	//$noidung_images
	public function setNoidung_images($noidung_images){
		$this->noidung_images = $noidung_images;
	}

	public function getNoidung_images(){
		return $this->noidung_images;
	}
	
	//$noidung_date
	public function setNoidung_date($noidung_date){
		$this->noidung_date = $noidung_date;
	}

	public function getNoidung_date(){
		return $this->noidung_date;
	}
	
	//$noidung_ip
	public function setNoidung_ip($noidung_ip){
		$this->noidung_ip = $noidung_ip;
	}

	public function getNoidung_ip(){
		return $this->noidung_ip;
	}
	
	//$noidung_update_date
	public function setNoidung_update_date($noidung_update_date){
		$this->noidung_update_date = $noidung_update_date;
	}

	public function getNoidung_update_date(){
		return $this->noidung_update_date;
	}
	
	//$noidung_update_ip
	public function setNoidung_update_ip($noidung_update_ip){
		$this->noidung_update_ip = $noidung_update_ip;
	}

	public function getNoidung_update_ip(){
		return $this->noidung_update_ip;
	}
	
	//$noidung_update_by
	public function setNoidung_update_by($noidung_update_by){
		$this->noidung_update_by = $noidung_update_by;
	}

	public function getNoidung_update_by(){
		return $this->noidung_update_by;
	}
	
	//$noidung_order
	public function setNoidung_order($noidung_order){
		$this->noidung_order = $noidung_order;
	}

	public function getNoidung_order(){
		return $this->noidung_order;
	}
	
	//$noidung_view
	public function setNoidung_view($noidung_view){
		$this->noidung_view = $noidung_view;
	}

	public function getNoidung_view(){
		return $this->noidung_view;
	}
	
	//$noidung_hot
	public function setNoidung_hot($noidung_hot){
		$this->noidung_hot = $noidung_hot;
	}

	public function getNoidung_hot(){
		return $this->noidung_hot;
	}
	
	//$noidung_command
	public function setNoidung_command($noidung_command){
		$this->noidung_command = $noidung_command;
	}

	public function getNoidung_command(){
		return $this->noidung_command;
	}
	
	//$noidung_count_command
	public function setNoidung_count_command($noidung_count_command){
		$this->noidung_count_command = $noidung_count_command;
	}

	public function getNoidung_count_command(){
		return $this->noidung_count_command;
	}
	
	//$noidung_rate
	public function setNoidung_rate($noidung_rate){
		$this->noidung_rate = $noidung_rate;
	}

	public function getNoidung_rate(){
		return $this->noidung_rate;
	}
	
	//$noidung_status
	public function setNoidung_status($noidung_status){
		$this->noidung_status = $noidung_status;
	}

	public function getNoidung_status(){
		return $this->noidung_status;
	}
	
	//$noidung_editor
	public function setNoidung_editor($noidung_editor){
		$this->noidung_editor = $noidung_editor;
	}

	public function getNoidung_editor(){
		return $this->noidung_editor;
	}
	
	//$noidung_lang
	public function setNoidung_lang($noidung_lang){
		$this->noidung_lang = $noidung_lang;
	}

	public function getNoidung_lang(){
		return $this->noidung_lang;
	}
    
    /**
     * Method
     * Các function
     */
    //GET a record
    public function getARecord(){
        
        $db = new Database();
        
        $value = "
            noidung_id,
            loainoidung_id,
            noidung_title,
            noidung_alias,
            noidung_note,
            noidung_content,
            noidung_author,
            noidung_by,
            noidung_images,
            noidung_update_date,
            noidung_view,
            noidung_count_command
        ";
        $condition = array(
            'where'     => 'noidung_status=1'
        );
        
        $result = $db->getAData('noidung', $value, $condition);
        
        return $result;
    }
    
    //GET a record
    public function getARecordByID($id){
        
        $db = new Database();
        
        $value = "
            noidung_id,
            loainoidung_id,
            user_id,
            noidung_title,
            noidung_alias,
            noidung_note,
            noidung_content,
            noidung_author,
            noidung_by,
            noidung_images,
            noidung_update_date,
            noidung_view,
            noidung_command,
            noidung_count_command,
            noidung_view
        ";
        $condition = array(
            'where'     => 'noidung_status=1 AND noidung_id='.intval($id)
        );
        
        $result = $db->getAData('noidung', $value, $condition);
        
        return $result;
    }
    
    // GET all record
    public function getAll(){
        
        $db = new Database();
        
        $value = "
            noidung_id,
            loainoidung_id,
            user_id,
            noidung_title,
            noidung_alias,
            noidung_note,
            noidung_content,
            noidung_author,
            noidung_by,
            noidung_images,
            noidung_update_date
        ";
        $condition = array(
            'where'     => 'noidung_status=1',
			'order_by'	=> 'noidung_order DESC, noidung_update_date DESC'
        );
        
        $result = $db->getSData('noidung', $value, $condition);
        
        return $result;
    }
    
    // GET all record By loại nội dung id
    public function getAllByID($lid, $start, $end){
        
        $db = new Database();
        
        $value = "
            noidung_id,
            loainoidung_id,
            user_id, 
            noidung_title, 
            noidung_note, 
            noidung_content, 
            noidung_author, 
            noidung_images,
            noidung_update_date,
            noidung_date, 
            noidung_view, 
            noidung_rate, 
            noidung_command,
            noidung_count_command
        ";
        $condition = array(
            'where'     => 'noidung_status=1 AND loainoidung_id='.intval($lid),
            'order_by'  => 'noidung_order DESC, noidung_update_date DESC',
            'limit_start'   => $start,
            'limit_end'     => $end
        );
        
        $result = $db->getSData('noidung', $value, $condition);
        
        return $result;
    }
    
    /**
     * Hàm lấy nội dung bài viết bởi state bài viết
     * VD: hot -> loainoidung_hot,
     * $state: trạng thái bài viết
     * $value: Các trường cần lấy
     * $start: Bắt đầu tin được lấy
     * $num: số lượng tin được lấy
     */
    public function getAllByHot($state,$value,$start,$num){
        $db = new Database();
        $condition = array(
            'where'         => 'noidung_hot=1',
            'limit_start'   => intval($start),
            'limit_end'     => intval($num),
            'order_by'      => 'noidung_order DESC, noidung_update_date DESC'
        );
        $result = $db->getSData('noidung',$value,$condition);
        return $result;
    }
    
    /**
     * $state = hot,view,..
     * Lấy tất cả các bài viết có biến $state = 1
     */
    public function getContentState($state, $value, $start, $end){
        
        $db = new Database();
        
        $condition = array(
            'where'         => 'noidung_status=1 AND noidung_'.$state.'=1',
            'order_by'      => 'noidung_order DESC, noidung_update_date DESC',
            'limit_start'   => intval($start),
            'limit_end'     => intval($end)
        );
        
        $result = $db->getSData('noidung',$value,$condition);
        
        return $result;
    }
    
    //Get record có số lượng
    public function getRecordByNum($num){
        
        $db = new Database();
        
        $value = "
            noidung_id,
            loainoidung_id,
            user_id,
            noidung_title,
            noidung_alias,
            noidung_note,
            noidung_content,
            noidung_author,
            noidung_by,
            noidung_view,
            noidung_count_command,
            noidung_images,
            noidung_update_date
        ";
        
        $condition = array(
            'where'     => 'noidung_status=1',
            'order_by'  => 'noidung_order DESC, noidung_update_date DESC',
            'limit_start'   => 0,
            'limit_end'     => $num
        );
        
        $result = $db->getSData('noidung', $value, $condition);
        
        return $result;
        
    }
    /**
     * Hàm lấy tất cả bài viết theo loại dãy loại nội dung 2,12,21,...
     * Hàm này có tác dụng lấy ra tất cả nội dung thuộc tất cả các chủ đề con khi ta vào chủ đề cha
     * $list: Danh sách các loainoidung_id thuộc vào chủ để cha và bao gồm luôn chủ đề cha
     * $value: Danh sách các trường cần lấy
     * $start: lấy từ
     * $end: Lấy bao nhiêu
     */
     public function getContentByTopicList($list,$value,$start,$end){
        $db = new Database();
        $condition = array(
            'where'     => 'noidung_status=1 AND loainoidung_id IN ('.$list.')',
            'order_by'      => 'noidung_order DESC, noidung_update_date DESC',
            'limit_start'   => intval($start),
            'limit_end'     => intval($end)
        );
        $result = $db->getSData('noidung',$value,$condition);
        return $result;
     }
    // Count record
    
    /** 
     * Hàm Get content
     * Hàm này có chức năng lấy dữ liệu từ $id, và trả về giá trị value
     */
    public function getContent($id,$value){
        
        $getC = $this->getARecordByID($id);
        
        $res = $getC->$value;
        
        return $res;
    }
    
    //Tang lượt bình luận lên 1
    public function countCommentUpdate($module, $id){
        
        $db = new Database();
        
        $value=array(
            'noidung_count_command' => $this->getContent($id,"noidung_count_command")+1
        );
        
        $condition=array(
            'where'     => 'noidung_id='.$id
        );
        
        $result = $db->updateData('noidung',$value,$condition);
        
        return $result;
            
    }
    
    /**
     * Hàm tăng lượt view lên 1
     * 1. Kiểm tra xem có tồn tại sesstion checkview hay chưa? Nếu chưa thì cập nhật, ngược lại không làm gì cả
     * $check là tên session
     * $id: là id bài viết
     */
    public function contentViewUpdate($check,$id){
        
        $db = new Database();
        
        //Kiểm tra session check có tồn tại không, nếu tồn tại update, ngược lại không
        if(!isset($_SESSION[$check.$id]) OR $_SESSION[$check.$id]!='view'.$id){
         
            $value=array(
                'noidung_view' => $this->getContent($id,"noidung_view")+1
            );
            
            $condition=array(
                'where'     => 'noidung_id='.$id
            );
            
            $result = $db->updateData('noidung',$value,$condition);
            
            if($result) {$_SESSION[$check.$id] = 'view'.$id;}
            
        }
    }
    /**
     * Hàm tự động hiển thị code trên trình duyệt
     * $tstart: Loại code thay thế đầu tiên: Tức là khi gặp mã này sẽ được thay thế bằng mã đã được gán
     * $tend: Loại dữ liệu thay thế kết thúc: Tức là gặp mã này thì gán mã kết thúc cho nó
     * $str: Dữ liệu vào: Input
     */
     function strReplaceCode($start,$end,$str){
        $tt = '<pre class="brush: js;">';
        $te = '</pre>';
        $result = '';
        if($start == '<blockquote>'){
            $result = str_replace($start,$tt,$str);
        }
        if($end == '</blockquote>'){
            $result = str_replace($end,$te,$result);
        }
        else {
            $result = $str;
        }
        return $result;
    }
}