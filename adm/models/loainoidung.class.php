<?PHP

    /**
     * Author: Nguyễn Minh Trực
     * Date: 25/07/2015
     */

class LoaiNoiDung extends Database {
    
    
    //Gọi hàm kết nối database, hàm insert, hàm update, hàm get record
    function __construct(){
        parent::__construct();
    }
    
    /**
     * Properties: Thuộc tính của lớp
     * Tương ứng với các trường trong bảng
     */
    private $loainoidung_id;
    private $dongnoidung_id;
    private $loainoidung_title;
    private $loainoidung_alias;
    private $loainoidung_keys;
    private $loainoidung_link;
    private $loainoidung_note;
    private $loainoidung_author;
    private $loainoidung_by;
    private $loainoidung_user_id;
    private $loainoidung_permission;
    private $loainoidung_images;
    private $loainoidung_date;
    private $loainoidung_ip;
    private $loainoidung_update_date;
    private $loainoidung_update_ip;
    private $loainoidung_update_by;
    private $loainoidung_view;
    private $loainoidung_mainmenu;
    private $loainoidung_submenu;
    private $loainoidung_hot;
    private $loainoidung_order;
    private $loainoidung_status;
    private $loainoidung_editor;
    private $loainoidung_lang;
    
    /**
      * Properties GET SET
      * Luu ý sử dụng hàm: nếu đặt biến trong hàm trùng với biên được khai báo ở trên thì phải dùng $this->bien
      * Set: là đặt giá trị cho biến (luu gia tri vao)
      * Get: trả về giá trị (lay gia tri ra)
      */
    //$loainoidung_id
    public function setLoaiNoiDung_id($loainoidung_id){
        $this->loainoidung_id = $loainoidung_id;
    }
    
    public function getLoaiNoiDung_id(){
        return $this->loainoidung_id;
    }
    
    //$dongnoidung_id
    public function setDongNoiDung_id($dongnoidung_id){
        $this->dongnoidung_id = $dongnoidung_id;
    }
    
    public function getDongNoiDung_id(){
        return $this->dongnoidung_id;
    }
    
    //$loainoidung_title
    public function setLoaiNoiDung_title($loainoidung_title){
        $this->loainoidung_title = $loainoidung_title;
    }
    
    public function getLoaiNoiDung_title(){
        return $this->loainoidung_title;
    }
    //$loainoidung_alias
    public function setLoaiNoiDung_alias($loainoidung_alias){
        $this->loainoidung_alias = $loainoidung_alias;
    }
    public function getLoaiNoiDung_alias(){
        return $this->loainoidung_alias;
    }
    //$loainoidung_alias
    public function setLoaiNoiDung_keys($loainoidung_keys){
        $this->loainoidung_keys = $loainoidung_keys;
    }
    public function getLoaiNoiDung_keys(){
        return $this->loainoidung_keys;
    }
    //$loainoidung_link
    public function setLoaiNoiDung_link($loainoidung_link){
        $this->loainoidung_link = $loainoidung_link;
    }
    
    public function getLoaiNoiDung_link(){
        return $this->loainoidung_link;
    }
    
    //$loainoidung_note
    public function setLoaiNoiDung_note($loainoidung_note){
        $this->loainoidung_note = $loainoidung_note;
    }
    
    public function getLoaiNoiDung_note(){
        return $this->loainoidung_note;
    }
    
    //$loainoidung_author
    public function setLoaiNoiDung_author($loainoidung_author){
        $this->loainoidung_author = $loainoidung_author;
    }
    
    public function getLoaiNoiDung_author(){
        return $this->loainoidung_author;
    }
    
    //$loainoidung_by
    public function setLoaiNoiDung_by($loainoidung_by){
        $this->loainoidung_by = $loainoidung_by;
    }
    
    public function getLoaiNoiDung_by(){
        return $this->loainoidung_by;
    }
    
    //$loainoidung_user_id
    public function setLoainoidung_user_id($loainoidung_user_id){
        $this->loainoidung_user_id = $loainoidung_user_id;
    }
    public function getLoainoidung_user_id(){
        return $this->loainoidung_user_id;
    }
    
    //$loainoidung_permission
    public function setLoainoidung_permission($loainoidung_permission){
        $this->loainoidung_permission = $loainoidung_permission;
    }
    public function getLoainoidung_permission(){
        return $this->loainoidung_permission;
    }
    
    //$loainoidung_images
    public function setLoaiNoiDung_images($loainoidung_images){
        $this->loainoidung_images = $loainoidung_images;
    }
    
    public function getLoaiNoiDung_images(){
        return $this->loainoidung_images;
    }
    
    //$loainoidung_date
    public function setLoaiNoiDung_date($loainoidung_date){
        $this->loainoidung_date = $loainoidung_date;
    }
    
    public function getLoaiNoiDung_date(){
        return $this->loainoidung_date;
    }
    
    //$loainoidung_ip
    public function setLoaiNoiDung_ip($loainoidung_ip){
        $this->loainoidung_ip = $loainoidung_ip;
    }
    
    public function getLoaiNoiDung_ip(){
        return $this->loainoidung_ip;
    }
    
    //$loainoidung_update_date
    public function setLoaiNoiDung_update_date($loainoidung_update_date){
        $this->loainoidung_update_date = $loainoidung_update_date;
    }
    
    public function getLoaiNoiDung_update_date(){
        return $this->loainoidung_update_date;
    }
    
    //$loainoidung_update_by
    public function setLoaiNoiDung_update_by($loainoidung_update_by){
        $this->loainoidung_update_by = $loainoidung_update_by;
    }
    
    public function getLoaiNoiDung_update_by(){
        return $this->loainoidung_update_by;
    }
    
    //$loainoidung_update_ip
    public function setLoaiNoiDung_update_ip($loainoidung_update_ip){
        $this->loainoidung_update_ip = $loainoidung_update_ip;
    }
    
    public function getLoaiNoiDung_update_ip(){
        return $this->loainoidung_update_ip;
    }
    
    //$loainoidung_view
    public function setLoaiNoiDung_view($loainoidung_view){
        $this->loainoidung_view = $loainoidung_view;
    }
    
    public function getLoaiNoiDung_view(){
        return $this->loainoidung_view;
    }
    
    //$loainoidung_mainmenu
    public function setLoaiNoiDung_mainmenu($loainoidung_mainmenu){
        $this->loainoidung_mainmenu = $loainoidung_mainmenu;
    }
    
    public function getLoaiNoiDung_mainmenu(){
        return $this->loainoidung_mainmenu;
    }
    
    //$loainoidung_submenu
    public function setLoaiNoiDung_submenu($loainoidung_submenu){
        $this->loainoidung_submenu = $loainoidung_submenu;
    }
    
    public function getLoaiNoiDung_submenu(){
        return $this->loainoidung_submenu;
    }
    
    //$loainoidung_hot
    public function setLoaiNoiDung_hot($loainoidung_hot){
        $this->loainoidung_hot = $loainoidung_hot;
    }
    
    public function getLoaiNoiDung_hot(){
        return $this->loainoidung_hot;
    }
    
    //$loainoidung_order
    public function setLoaiNoiDung_order($loainoidung_order){
        $this->loainoidung_order = $loainoidung_order;
    }
    public function getLoaiNoiDung_order(){
        return $this->loainoidung_order;
    }
    
    //$loainoidung_status
    public function setLoaiNoiDung_status($loainoidung_status){
        $this->loainoidung_status = $loainoidung_status;
    }
    
    public function getLoaiNoiDung_status(){
        return $this->loainoidung_status;
    }
    
    //$loainoidung_editor
    public function setLoaiNoiDung_editor($loainoidung_editor){
        $this->loainoidung_editor = $loainoidung_editor;
    }
    
    public function getLoaiNoiDung_editor(){
        return $this->loainoidung_editor;
    }
    
    //$loainoidung_lang
    public function setLoaiNoiDung_lang($loainoidung_lang){
        $this->loainoidung_lang = $loainoidung_lang;
    }
    
    public function getLoaiNoiDung_lang(){
        return $this->loainoidung_lang;
    }
    
    /**
       * Methods: Thu?c tính
       * Các hàm cần thiết trong class: insert, update, getinfo,...
       */
      
      public function insert(){
        
        $db = new Database();
        
        $value = array(
            'loainoidung_id'            => NULL,
            'dongnoidung_id'            => $this->getDongNoiDung_id(),
            'loainoidung_title'         => $this->getLoaiNoiDung_title(),
            'loainoidung_alias'         => $this->getLoaiNoiDung_alias(),
            'loainoidung_keys'         => $this->getLoaiNoiDung_keys(),
            'loainoidung_link'          => $this->getLoaiNoiDung_link(),
            'loainoidung_note'          => $this->getLoaiNoiDung_note(),
            'loainoidung_author'        => $this->getLoaiNoiDung_author(),
            'loainoidung_by'            => $this->getLoaiNoiDung_by(),
            'loainoidung_user_id'       => $this->getLoainoidung_user_id(),
            'loainoidung_permission'    => $this->getLoainoidung_permission(),
            'loainoidung_date'          => $this->getLoaiNoiDung_date(),
            'loainoidung_ip'            => $this->getLoaiNoiDung_ip(),
            'loainoidung_update_date'   => $this->getLoaiNoiDung_update_date(),
            'loainoidung_update_ip'     => $this->getLoaiNoiDung_update_ip(),
            'loainoidung_update_by'     => $this->getLoaiNoiDung_update_by(),
            'loainoidung_view'          => $this->getLoaiNoiDung_view(),
            'loainoidung_mainmenu'      => $this->getLoaiNoiDung_mainmenu(),
            'loainoidung_submenu'       => $this->getLoaiNoiDung_submenu(),
            'loainoidung_hot'           => $this->getLoaiNoiDung_hot(),
            'loainoidung_order'         => $this->getLoaiNoiDung_order(),
            'loainoidung_status'        => $this->getLoaiNoiDung_status(),
            'loainoidung_editor'        => $this->getLoaiNoiDung_editor(),
            'loainoidung_lang'          => $this->getLoaiNoiDung_lang()
        );
        
        $result = $db->insertData('loainoidung', $value);
        
        return $result;
        
      }
      
      //Hàm cập nhật loại nội dung
      public function update($id) {
        
        $db = new Database();
        
        $value = array(
            'dongnoidung_id'            => $this->getDongNoiDung_id(),
            'loainoidung_title'         => $this->getLoaiNoiDung_title(),
            'loainoidung_alias'         => $this->getLoaiNoiDung_alias(),
            'loainoidung_keys'          => $this->getLoaiNoiDung_keys(),
            'loainoidung_link'          => $this->getLoaiNoiDung_link(),
            'loainoidung_user_id'       => $this->getLoainoidung_user_id(),
            'loainoidung_permission'    => $this->getLoainoidung_permission(),
            'loainoidung_note'          => $this->getLoaiNoiDung_note(),
            'loainoidung_update_date'   => $this->getLoaiNoiDung_update_date(),
            'loainoidung_update_ip'     => $this->getLoaiNoiDung_update_ip(),
            'loainoidung_update_by'     => $this->getLoaiNoiDung_update_by(),
            'loainoidung_lang'          => $this->getLoaiNoiDung_lang()
        );
        
        $condition = array(
            'where'     => 'loainoidung_id='.intval($id)
        );
        
        $result = $db->updateData('loainoidung',$value,$condition);
        
        return $result;
      }
      
      public function getARecord($value) {
        
        $db = new Database();
        
        $condition = array(
            'where'         => 'loainoidung_status=1',
            'order_by'      => 'loainoidung_id DESC',
            'limit_start'   => '0',
            'limit_end'     => '1'
        );
        
        $result = $db->getAData('loainoidung', $value, $condition);
        
        return $result;
      }
      
      public function getARecordByID($id, $value) {
        
        $db = new Database();
        
        $condition = array(
            'where'         => 'loainoidung_id='.intval($id)
        );
        
        $result = $db->getAData('loainoidung', $value, $condition);
        
        return $result;
      }
      
      public function getAll($value)
      {
        $db = new Database();
        
        $condition = array(
            'where'     => 'loainoidung_status=1',
            'order_by'  => 'loainoidung_order ASC'
        );
        
        $result = $db->getSData('loainoidung', $value, $condition);

        return $result;
        
      }
      //$lid : loainoidung_id
      public function getAllByID($lid,$value)
      {
        $db = new Database();
        
        $condition = array(
            'where'     => 'loainoidung_status=1 AND loainoidung_id='.intval($lid),
            'order_by'  => 'loainoidung_order ASC, loainoidung_update_date ASC'
        );
        
        $result = $db->getSData('loainoidung', $value, $condition);

        return $result;
        
      }
      
        /**
         * Hàm lấy thông tin loại nội dung
         * $id: loainoidung_id của bài viết
         * $value: Giá trị trả về: loainoidung_id, loainoidung_title. Các trường trong bảng loại nội dung
         */
        public function getContentType($id,$value){
            
            $getlnd = $this->getARecordByID($id,$value);
            
            $res = $getlnd->$value;
            
            return $res;
        }
    /**
       * Hàm lấy dãy id loainoidung_user_id và kiểm tra xem, nếu id rỗng thì bỏ qua.
       * $listID: là dãy id được lấy ra từ trường loainoidung_user_id
       */
      public function getTypeContentByUserID($listID){
        $split = explode("^MT^",$listID);
        $res = array();
        for($i=0;$i<count($split)-1;$i++){
            $res[] = $split[$i];
        }
        return $res;
      }
        
    //Lấy tất cả loại nội dung đưa vào 1 mảng
    public function contentArrayList($value){
        
        //Khởi tạo mảng rỗng lưu giá trị
        $contentArr = array();
        
        $result = $this->getAll($value);
        
        foreach($result as $values){
            
            $contentArr[] = $values;
            
        } 
        
        return $contentArr;
        
    }
    
    //Đệ quy loại nội dung để lấy ra các loại nội dung tương ứng theo từng cấp
    public function getContentCategory($parentid,$value,$res=''){
        //Lấy ra tất cả dữ liệu trong mảng contentArrayList
        $contentType = $this->contentArrayList($value);
        //Khai báo mảng tạm để chứa giá trị theo cấp khi duyệt qua mảng ContentType
        $content_tmp = array();
        foreach($contentType as $key=>$val){
            if($val->dongnoidung_id == $parentid){
                $content_tmp[] = $val;
                unset($contentType[$key]); //Hủy Loại nội dung đã lấy ra.
            }
        }
        //Kiểm tra xem $content_tmp có dữ liệu không? nếu có thì lấy ra
        if($content_tmp){
            foreach($content_tmp as $items){
               echo '<option value="'.$items->loainoidung_id.'">'.$res.$items->loainoidung_title.'</option>';
               //Gọi lại hàm gọi là đệ quy
               $this->getContentCategory($items->loainoidung_id,$value,'---/');
            }
            
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
                $getImages = $this->getARecordByID(intval($_GET['id']),'loainoidung_id,loainoidung_images');
                //xóa hình cu
				if($getImages->loainoidung_images!="")
				{
					@unlink($getImages->loainoidung_images);
				}
            }else {
                $getImages = $this->getARecord('loainoidung_id');
            }
            $value = array(
                'loainoidung_images'   => $linkimages
            );
            
            $condition = array(
                'where'     => 'loainoidung_id='.$getImages->loainoidung_id
            );
            
            $result = $db->updateData('loainoidung',$value,$condition);
			
            return $result;
            		
        }
     }
     //Hàm xóa hình ảnh
     public function deleteImages($id) {
        
        $db = new Database();
        
        $getImages = $this->getARecordByID($id,'loainoidung_images');
        //Xóa hình
        @unlink($getImages->loainoidung_images);
        
        $value = array(
            'loainoidung_images' => ""
        );
        
        $condition = array(
            'where'     => 'loainoidung_id='.intval($id)
        );
        
        $result = $db->updateData('loainoidung',$value,$condition);
        
        return $result;
        
     }
        
}