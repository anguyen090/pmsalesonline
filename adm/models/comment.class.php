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
    public function getARecord($id) {
        
        $db = new Database();
        
        $value = "comment_modules,comment_item,comment_parent,comment_name,comment_content,comment_update_date";
        
        $condition = array(
            'where'     => 'comment_status=1 AND comment_id='.$id
        );
        
        $result = $db->getAData('comment',$value,$condition);
        
        return $result;
        
    }
    
    //get all
    public function getAll(){
        
        $db = new Database();
        
        $value = "comment_modules,comment_item,comment_parent,comment_name,comment_content,comment_update_date";
        
        $condition = array(
            'where'     => 'comment_status=1'
        );
        
        $result = $db->getSData('comment',$value,$condition);
        
        return $result;
    }
    
    //get all nhiều điều kiện
    public function getAllCondition($condition=array()){
        
        $db = new Database();
        
        $value = "comment_modules,comment_item,comment_parent,comment_name,comment_content,comment_update_date";
        
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
    
    
}