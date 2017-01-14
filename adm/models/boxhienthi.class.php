<?php

    /**
     * Author: Nguyễn Minh Trực
     * Creat date: 19-12-2015
     */

class Boxhienthi extends Database {
    
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Properties: Thuộc tính class
     * Các trường trong database
     */
    private $boxhienthi_id;
    private $boxhienthi_title;
    private $boxhienthi_option;
    private $boxhienthi_value;
    private $boxhienthi_by;
    private $boxhienthi_date;
    private $boxhienthi_ip;
    private $boxhienthi_update_date;
    private $boxhienthi_update_ip;
    private $boxhienthi_order;
    private $boxhienthi_status;
    private $boxhienthi_editor;
    private $boxhienthi_lang;
    
    /**
     * Properties get set
     */
     //$boxhienthi_id
    public function setBoxhienthi_id($boxhienthi_id){
        $this->boxhienthi_id = $boxhienthi_id;
    }
    
    public function getBoxhienthi_id(){
        return $this->boxhienthi_id;
    }
    
    //$boxhienthi_title
    public function setBoxhienthi_title($boxhienthi_title){
        $this->boxhienthi_title = $boxhienthi_title;
    }
    
    public function getBoxhienthi_title(){
        return $this->boxhienthi_title;
    }
    
    //$boxhienthi_option
    public function setBoxhienthi_option($boxhienthi_option){
        $this->boxhienthi_option = $boxhienthi_option;
    }
    
    public function getBoxhienthi_option(){
        return $this->boxhienthi_option;
    }
    
    //$boxhienthi_value
    public function setBoxhienthi_value($boxhienthi_value){
        $this->boxhienthi_value = $boxhienthi_value;
    }
    
    public function getBoxhienthi_value(){
        return $this->boxhienthi_value;
    }
    
    //$boxhienthi_by
    public function setBoxhienthi_by($boxhienthi_by){
        $this->boxhienthi_by = $boxhienthi_by;
    }
    
    public function getBoxhienthi_by(){
        return $this->boxhienthi_by;
    }
    
    //$boxhienthi_date
    public function setBoxhienthi_date($boxhienthi_date){
        $this->boxhienthi_date = $boxhienthi_date;
    }
    
    public function getBoxhienthi_date(){
        return $this->boxhienthi_date;
    }
    
    //$boxhienthi_ip
    public function setBoxhienthi_ip($boxhienthi_ip){
        $this->boxhienthi_ip = $boxhienthi_ip;
    }
    
    public function getBoxhienthi_ip(){
        return $this->boxhienthi_ip;
    }
    
    //$boxhienthi_update_date
    public function setBoxhienthi_update_date($boxhienthi_update_date){
        $this->boxhienthi_update_date = $boxhienthi_update_date;
    }
    
    public function getBoxhienthi_update_date(){
        return $this->boxhienthi_update_date;
    }
    
    //$boxhienthi_update_ip
    public function setBoxhienthi_update_ip($boxhienthi_update_ip){
        $this->boxhienthi_update_ip = $boxhienthi_update_ip;
    }
    
    public function getBoxhienthi_update_ip(){
        return $this->boxhienthi_update_ip;
    }
    
    //$boxhienthi_order
    public function setBoxhienthi_order($boxhienthi_order){
        $this->boxhienthi_order = $boxhienthi_order;
    }
    
    public function getBoxhienthi_order(){
        return $this->boxhienthi_order;
    }
    
    //$boxhienthi_status
    public function setBoxhienthi_status($boxhienthi_status){
        $this->boxhienthi_status = $boxhienthi_status;
    }
    
    public function getBoxhienthi_status(){
        return $this->boxhienthi_status;
    }
    
    //$boxhienthi_editor
    public function setBoxhienthi_editor($boxhienthi_editor){
        $this->boxhienthi_editor = $boxhienthi_editor;
    }
    
    public function getBoxhienthi_editor(){
        return $this->boxhienthi_editor;
    }
    
    //$boxhienthi_lang
    public function setBoxhienthi_lang($boxhienthi_lang){
        $this->boxhienthi_lang = $boxhienthi_lang;
    }
    
    public function getBoxhienthi_lang(){
        return $this->boxhienthi_lang;
    }
    
    /**
     * Mehod: Thuộc tính (Hàm)
     */
    //Insert
    public function insert(){
        
        $db = new Database();
        
        $value = array(
            'boxhienthi_id' 			=> null,
            'boxhienthi_title' 			=> $this->getBoxhienthi_title(),
            'boxhienthi_option' 		=> $this->getBoxhienthi_option(),
            'boxhienthi_value' 			=> $this->getBoxhienthi_value(),
            'boxhienthi_by' 			=> $this->getBoxhienthi_by(),
            'boxhienthi_date' 			=> $this->getBoxhienthi_date(),
            'boxhienthi_ip' 			=> $this->getBoxhienthi_ip(),
            'boxhienthi_update_date' 	=> $this->getBoxhienthi_update_date(),
            'boxhienthi_update_ip' 		=> $this->getBoxhienthi_update_ip(),
            'boxhienthi_order' 			=> $this->getBoxhienthi_order(),
            'boxhienthi_status' 		=> $this->getBoxhienthi_status(),
            'boxhienthi_editor' 		=> null,
            'boxhienthi_lang' 			=> $this->getBoxhienthi_lang()
        );
        
        $result = $db->insertData('boxhienthi',$value);
        
        return $result;
        
    }
    
    //Update
    public function update($id){
        
        $db = new Database();
        
        $value = array(
            'boxhienthi_title' 			=> $this->getBoxhienthi_title(),
            'boxhienthi_option' 		=> $this->getBoxhienthi_option(),
            'boxhienthi_value' 			=> $this->getBoxhienthi_value(),
            'boxhienthi_update_date' 	=> $this->getBoxhienthi_update_date(),
            'boxhienthi_update_ip' 		=> $this->getBoxhienthi_update_ip(),
            'boxhienthi_lang' 			=> $this->getBoxhienthi_lang()
        );
        
        $condition = array(
            'where'     => 'boxhienthi_id='.intval($id)
        );
        
        $result = $db->updateData('boxhienthi',$value,$condition);
        
        return $result;
        
    }
    
    //delete
    public function delete($id){
        
        $db = new Database();
        
        $condition = array(
            'where'     => 'boxhienthi_id='.intval($id)
        );
        
        $result = $db->deleteData('boxhienthi',$condition);
        
    }
    
    //getARecord
    public function getARecord($value){
        
        $db = new Database();
        
        $condition = array(
            'order_by'      => 'boxhienthi_id DESC',
            'limit_start'   => 0,
            'limit_end'     => 1
        );
        
        $result = $db->getAData('boxhienthi',$value,$condition);
        
        return $result;
    }
    
    //getARecordByID
    public function getARecordByID($id,$value){
        
        $db = new Database();
        
        $condition = array(
            'where'     => 'boxhienthi_id='.intval($id)
        );
        
        $result = $db->getAData('boxhienthi',$value,$condition);
        
        return $result;
        
    }
    
    //getAll
    public function getAll($value){
        
        $db = new Database();
        
        $condition = array(
            'order_by'    => 'boxhienthi_update_date DESC'
        );
        
        $result = $db->getSData('boxhienthi',$value,$condition);
        
        return $result;
        
    }
    
    //Get max
    public function getMaxByID(){
        
        $db = new Database();
        
        $value = 'boxhienthi_id';
        
        $result = $db->getMaxID('boxhienthi',$value);
    }
    
}