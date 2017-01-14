<?PHP

/**
 * Author: Nguy?n Minh Tr?c
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
    private $user_id;
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
    
    //$user_id
    public function setUser_id($user_id){
        $this->user_id = $user_id;
    }
    
    public function getUser_id(){
        return $this->user_id;
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
    
    //Hàm insert
    public function insert(){
        
        $db = new Database();
        
        $value = array(
            'noidung_id'                => null,
            'loainoidung_id'            => $this->getLoainoidung_id(),
            'user_id'                   => $this->getUser_id(),
            'noidung_title'             => $this->getNoidung_title(),
            'noidung_alias'             => null,
            'noidung_note'              => $this->getNoidung_note(),
            'noidung_content'           => $this->getNoidung_content(),
            'noidung_author'            => $this->getNoidung_author(),
            'noidung_by'                => $this->getNoidung_by(),
            'noidung_date'              => $this->getNoidung_date(),
            'noidung_ip'                => $this->getNoidung_ip(),
            'noidung_update_date'       => $this->getNoidung_update_date(),
            'noidung_update_ip'         => $this->getNoidung_update_ip(),
            'noidung_update_by'         => $this->getNoidung_update_by(),
            'noidung_order'             => $this->getNoidung_order(),
            'noidung_view'              => $this->getNoidung_view(),
            'noidung_hot'               => $this->getNoidung_hot(),
            'noidung_command'           => $this->getNoidung_command(),
            'noidung_count_command'     => $this->getNoidung_count_command(),
            'noidung_rate'              => $this->getNoidung_rate(),
            'noidung_status'            => $this->getNoidung_status(),
            'noidung_editor'            => NULL,
            'noidung_lang'              =>  $this->getNoidung_lang()
        );
        
        $result = $db->insertData('noidung',$value);
        
        return $result;
    }
    
    //Hàm update
    public function update($id){
        
        $db = new Database();
        
        $value = array(
            'loainoidung_id'            => $this->getLoainoidung_id(),
            'noidung_title'             => $this->getNoidung_title(),
            'noidung_note'              => $this->getNoidung_note(),
            'noidung_content'           => $this->getNoidung_content(),
            'noidung_author'            => $this->getNoidung_author(),
            'noidung_update_date'       => $this->getNoidung_update_date(),
            'noidung_update_ip'         => $this->getNoidung_update_ip(),
            'noidung_update_by'         => $this->getNoidung_update_by(),
            'noidung_lang'              =>  $this->getNoidung_lang()
        );
        
        $condition = array(
            'where'     => 'noidung_id='.intval($id)
        );
        
        $result = $db->updateData('noidung',$value,$condition);
        
        return $result;
    }
    
    /**
     * Method
     * Các function
     */
    //GET a record
    public function getARecord($value){
        
        $db = new Database();
        
        $condition = array(
            'where'         => 'noidung_status=1',
            'order_by'      => 'noidung_id DESC',
            'limit_start'   => 0,
            'limit_end'     => 1
        );
        
        $result = $db->getAData('noidung', $value, $condition);
        
        return $result;
    }
    
    //GET a record
    public function getARecordByID($id,$value){
        
        $db = new Database();
        
        $condition = array(
            'where'     => 'noidung_status=1 AND noidung_id='.intval($id)
        );
        
        $result = $db->getAData('noidung', $value, $condition);
        
        return $result;
    }
    
    // GET all record
    public function getAll($value){
        
        $db = new Database();
        
        $condition = array(
            'where'     => 'noidung_status=1'
        );
        
        $result = $db->getSData('noidung', $value, $condition);
        
        return $result;
    }
    
    // GET all record By id
    public function getAllByID($id, $value, $start, $end){
        
        $db = new Database();
        
        $condition = array(
            'where'     => 'noidung_status=1 AND noidung_id='.$id,
            'order_by'  => 'noidung_order DESC, noidung_update_date DESC',
            'limit_start'   => $start,
            'limit_end'     => $end
        );
        
        $result = $db->getSData('noidung', $value, $condition);
        
        return $result;
    }
    
    //Get record có số lượng
    public function getRecordByNum($num, $value){
        
        $db = new Database();
        
        $condition = array(
            'where'     => 'noidung_status=1',
            'order_by'  => 'noidung_order DESC, noidung_update_date DESC',
            'limit_start'   => 0,
            'limit_end'     => $num
        );
        
        $result = $db->getSData('noidung', $value, $condition);
        
        return $result;
        
    }
    
    // Count record
    
    /** 
     * Hàm Get content
     * Hàm này có chức năng lấy dữ liệu từ $id, và trả về giá trị value
     */
    public function getContent($id,$value){
        
        $getC = $this->getARecordByID($id,$value);
        
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
        
        //Kiểm tra session check có tồn tại không, nếu tồn tại update, người lại không
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
    
    //update images
     public function updateImages($folder,$ftype,$fname,$fsize,$ftmp){
        
        $db = new Database();
        
        //kết nối class function upload images
        $f = new functionGet();
        
        if($fname!=NULL AND $ftype!=null){
			//Đường dẫn upload
			$big_path = "../uploads/".$folder."/";
			$thumb_path = "../uploads/".$folder."/thumbs/";
            
            $linkimages = $f->uploadImages($ftype,$fname,$fsize,$ftmp,$big_path,$thumb_path,"200","");
			
            //Luu vao du lieu
            if(isset($_GET['id']) & $_GET['id']!=NULL){
                $getImages = $this->getARecordByID(intval($_GET['id']),'noidung_id,noidung_images');
                //xóa hình cu
				if($getImages->noidung_images!="")
				{
					@unlink($getImages->noidung_images);
				}
            }else {
                $getImages = $this->getARecord('noidung_id');
            }
            $value = array(
                'noidung_images'   => $linkimages
            );
            
            $condition = array(
                'where'     => 'noidung_id='.$getImages->noidung_id
            );
            
            $result = $db->updateData('noidung',$value,$condition);
			
            return $result;
            		
        }
     }
     
     //Hàm xóa hình ảnh
     public function deleteImages($id) {
        
        $db = new Database();
        
        $getImages = $this->getARecordByID($id,'noidung_images');
        //Xóa hình
        @unlink($getImages->noidung_images);
        
        $value = array(
            'noidung_images' => ""
        );
        
        $condition = array(
            'where'     => 'noidung_id='.intval($id)
        );
        
        $result = $db->updateData('noidung',$value,$condition);
        
        return $result;
        
     }
}