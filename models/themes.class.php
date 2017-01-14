<?PHP
    /**
     * Author: Nguy?n Minh Tr?c
     * Creat date: 02-03-2016
     */
     
class Themes extends Database {
    
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Thuộc tính
    */
    private $themes_id;
    private $themes_name;
    private $themes_folder;
    private $themes_status;
    
    /**
     * Properties GET SET
     */
    //$themes_id
    public function setThemes_id($themes_id){
        $this->themes_id = $themes_id;
    }
    
    public function getThemes_id(){
        return $this->themes_id;
    }
    
    //$themes_name
    public function setThemes_name($themes_name){
        $this->themes_name = $themes_name;
    }
    public function getThemes_name(){
        return $this->themes_name;
    }
    
    //$themes_folder
    public function setThemes_folder($themes_folder){
        $this->themes_folder = $themes_folder;
    }
    public function getThemes_folder(){
        return $this->themes_folder;
    }
    
    //$themes_status
    public function setThemes_status($themes_status){
        $this->themes_status = $themes_status;
    }
    public function getThemes_status(){
        return $this->themes_status;
    }
    
    /**
     * Method
     */
    //Get a record (only choose one theme)
    public function getArecord($value) {
        $db = new Database();
        $condition = array(
            'where'         => 'themes_status=1',
            'order_by'      => 'themes_id DESC',
            'limit_start'   => 0,
            'limit_end'     => 1
        );
        $result = $db->getAData('themes',$value,$condition);
        return $result;
    }
    
    //Get themes
    public function getThemes($value){
        $getThemes = $this->getArecord($value);
        $res = $getThemes->$value;
        return $res;
    }
    
}