<?PHP

    /**
     * Author: Nguyễn Minh Trực
     * Creat date: 19-07-2015
     */

class BannerSlide extends Database {

    function __construct(){
        parent::__construct();
    }
    
    /**
     * Properties: Thuộc tính class
     * Tương ứng với các trường trong table bannerslide
     */
     
     private $bannerSlide_id;
     private $bannerSlide_title;
     private $bannerSlide_link;
     private $bannerSlide_note;
     private $bannerSlide_bgcolor;
     private $bannerSlide_content;
     private $bannerSlide_by;
     private $bannerSlide_images;
     private $bannerSlide_date;
     private $bannerSlide_ip;
     private $bannerSlide_update_date;
     private $bannerSlide_update_by;
     private $bannerSlide_update_ip;
     private $bannerSlide_order;
     private $bannerSlide_status;
     private $bannerSlide_lang;
     private $bannerSlide_editor;
     
     
    /**
      * Properties GET SET
      * Lưu ý sử dụng hàm: Nếu đặt biết trong hàm trùng với biên được khai báo ở trên thì phải dùng $this->biến
      * Set: là đặt giá trị cho biến (luu gia tri vao)
      * Get: trả về giá trị (lay gia tri ra)
      */
    
    //$bannerSlide_id
    public function setBannerSlide_id($bannerSlide_id){
        $this->bannerSlide_id = $bannerSlide_id;
    }
    
    public function getBannerSlide_id(){
        return $this->bannerSlide_id;
    }
    
    
    //$bannerSlide_title
    public function setBannerslide_title($bannerSlide_title){
        $this->bannerSlide_title = $bannerSlide_title;
    }
    
    public function getBannerSlide_title(){
        return $this->bannerSlide_title;
    }
    
    //$bannerSlide_link
    public function setBannerSlide_link($bannerSlide_link){
        $this->bannerSlide_link = $bannerSlide_link;
    }
    
    public function getBannerSlide_link(){
        return $this->bannerSlide_link;
    }
    
    //$bannerSlide_note
    public function setBannerSlide_note($bannerSlide_note){
        $this->bannerSlide_note = $bannerSlide_note;
    }
    
    public function getBannerSlide_note(){
        return $this->bannerSlide_note;
    }
    
    //$bannerSlide_content
    public function setBannerSlide_content($bannerSlide_content) {
        $this->bannerSlide_content = $bannerSlide_content;
    }
    
    public function getBannerSlide_content(){
        return $this->bannerSlide_content;
    }
    
    //$bannerSlide_bgcolor
    public function setBannerSlide_bgcolor($bannerSlide_bgcolor) {
        $this->bannerSlide_content = $bannerSlide_content;
    }
    
    public function getBannerSlide_bgcolor(){
        return $this->bannerSlide_bgcolor;
    }
    
    //$bannerSlide_by
    public function setBannerSlide_by($bannerSlide_by){
        $this->bannerSlide_by = $bannerSlide_by;
    }
    
    public function getBannerSlide_by(){
        return $this->bannerSlide_by;
    }
    
    //$bannerSlide_images
    public function setBannerSlide_images($bannerSlide_images){
        $this->bannerSlide_images = $bannerSlide_images;
    }
    
    public function getBannerSlide_images() {
        return $this->bannerSlide_images;
    }
    
    //$bannerSlide_date
    public function setBannerSlide_date($bannerSlide_date){
        $this->bannerSlide_date = $bannerSlide_date;
    }
    
    public function getBannerSlide_date(){
        return $this->bannerSlide_date;
    }
    
    //$bannerSlide_ip
    public function setBannerSlide_ip($bannerSlide_ip){
        $this->bannerSlide_ip = $bannerSlide_ip;
    }
    
    public function getBannerSlide_ip(){
        return $this->bannerSlide_ip;    
    }
    
    //$bannerSlide_update_date
    public function setBannerSlide_update_date($bannerSlide_update_date){
        $this->bannerSlide_update_date = $bannerSlide_update_date;
    }
    
    public function getBannerSlide_update_date(){
        return $this->bannerSlide_update_date;
    }
    
    //$bannerSlide_update_by
    public function setBannerSlide_update_by($bannerSlide_update_by){
        $this->bannerSlide_update_by = $bannerSlide_update_by;
    }
    
    public function getBannerslide_update_by(){
        return $this->bannerSlide_update_by;
    }
    
    //$bannerSlide_update_ip
    public function setBannerSlide_update_ip($bannerSlide_update_ip){
        $this->bannerSlide_update_ip = $bannerSlide_update_ip;
    }
    
    public function getBannerSlide_update_ip(){
        return $this->bannerSlide_update_ip;
    }
    
    //$bannerSlide_order
    public function setBannerSlide_order($bannerSlide_order){
        $this->bannerSlide_order = $bannerSlide_order;
    }
    
    public function getBannerSlide_order(){
        return $this->bannerSlide_order;
    }
    
    //$bannerSlide_status
    public function setBannerSlide_status($bannerSlide_status){
        $this->bannerSlide_status = $bannerSlide_status;
    }
    
    public function getBannerSlide_status(){
        return $this->bannerSlide_status;
    }
    
    //$bannerSlide_lang
    public function setBannerSlide_lang($bannerSlide_lang){
        $this->bannerSlide_lang = $bannerSlide_lang;
    }
    
    public function getBannerSlide_lang(){
        return $this->bannerSlide_lang;
    }
    
    //$bannerSlide_editor
    public function setBannerSlide_editor($bannerSlide_eidtor){
        $this->bannerSlide_editor = $bannerSlide_eidtor;
    }
    
    public function getBannerSlide_editor(){
        return $this->bannerSlide_editor;
    }
    
     /**
       * Methods: Thuộc tính
       * Các hàm cần thiết trong class: insert, update, getinfo,...
       */
     
     /**
     bannerSlide_id;
     bannerSlide_title;
     bannerSlide_link;
     bannerSlide_note;
     bannerSlide_content;
     bannerSlide_by;
     bannerSlide_images;
     bannerSlide_date;
     bannerSlide_ip;
     bannerSlide_update_date;
     bannerSlide_update_by;
     bannerSlide_update_ip;
     bannerSlide_order;
     bannerSlide_status;
     bannerSlide_lang;
     bannerSlide_editor;
     */
     
     //function Insert
     public function insert() {
        //Mo ket noi database
        $db = new Database();
        $value = array(
            'bannerSlide_id'        => 'NULL',
            'bannerSlide_title'     => $this->getBannerSlide_title(),
            'bannerSlide_link'      => $this->getBannerSlide_link(),
            'bannerSlide_note'      => $this->getBannerSlide_note(),
            'bannerSlide_content'   => $this->getBannerSlide_content(),
            'bannerSlide_by'        => $this->getBannerSlide_by(),
            'bannerSlide_images'    => $this->getBannerSlide_images(),
            'bannerSlide_date'      => $this->getbannerSlide_date(),
            'bannerSlide_ip'        => $this->getBannerSlide_ip(),
            'bannerSlide_update_date'=>$this->getBannerSlide_update_date(),
            'bannerSlide_update_by' => $this->getBannerslide_update_by(),
            'bannerSlide_update_ip' => $this->getBannerSlide_update_ip(),
            'bannerSlide_order'     => $this->getBannerSlide_order(),
            'bannerSlide_status'    => $this->getBannerSlide_status(),
            'bannerSlide_lang'      => $this->getBannerSlide_lang(),
            'bannerSlide_editor'    => $this->getBannerSlide_editor()
            
        );
        $insert = $db->insertData('bannerslide',$value);
        
        return true;
     }
     
     //function Update
     public function update() {
        //open connection
        $db = new Database();
        $value = array(
            'bannerSlide_title'     => $this->getBannerSlide_title(),
            'bannerSlide_link'      => $this->getBannerSlide_link(),
            'bannerSlide_note'      => $this->getBannerSlide_note(),
            'bannerSlide_content'   => $this->getBannerSlide_content(),
            'bannerSlide_by'        => $this->getBannerSlide_by(),
            'bannerSlide_images'    => $this->getBannerSlide_images(),
            'bannerSlide_date'      => $this->getbannerSlide_date(),
            'bannerSlide_ip'        => $this->getBannerSlide_ip(),
            'bannerSlide_update_date'=>$this->getBannerSlide_update_date(),
            'bannerSlide_update_by' => $this->getBannerslide_update_by(),
            'bannerSlide_update_ip' => $this->getBannerSlide_update_ip(),
            'bannerSlide_order'     => $this->getBannerSlide_order(),
            'bannerSlide_status'    => $this->getBannerSlide_status(),
            'bannerSlide_lang'      => $this->getBannerSlide_lang(),
            'bannerSlide_editor'    => $this->getBannerSlide_editor()
            
        );
        $condition = array(
            'where' => 'bannerSlide_id=' . $this->getBannerSlide_id()
        );
        
        $update = $db->updateData('bannerslide', $value, $condition);
        
        return true;
     }
     
     public function getARecord($value){
        $db = new Database();
        $condition = array(
            'order_by'      => 'config_id DESC',
            'limit_start'   => 0,
            'limit_end'     => 1
        );
        $result = $db->getAData('bannerslide',$value,$condition);
        return $result;
     }
     
     //Function getdata
     public function getARecordByID($id,$value) {
        //open connection
        $db = new Database();
        $condition = array(
            'where'     => 'bannerSlide_status=1 AND bannerSlide_id ='.intval($id),
            'order_by'  => 'bannerSlide_order DESC, bannerSlide_update_date DESC'
        );
        $results = $db->getAData('bannerslide',$value,$condition);
        return $results;
     }
     
     //Function getdata all
     function getAll($value){
        //open connection
        $db = new Database();
        $condition = array(
            'where'     => 'bannerSlide_status=1',
            'order_by'  => 'bannerSlide_order DESC, bannerSlide_update_date DESC'
        );
        $results = $db->getSData('bannerslide',$value,$condition);
        return $results;
        $this->db->close();
     }
     public function getBannerSlide($id,$value){
        $getB = $this->getARecordByID($id,$value);
        $result = $getB->$value;
        return $result;
     }
     /**
      * Kiểm tra tồn tại giá trị hay chưa
      * Giá trị trả về là true/false
      */
     function checkBannerSlide($name,$value){
        $db = new Database();
        $condition = array(
            'where'     => "bannerSlide_title='".$name."'"
        );
        $result = $db->getSData('bannerslide',$value,$condition);
        return $result;
        $this->db->close();
     }
}