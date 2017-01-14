<?php

/**
 * Author: Nguyễn Minh Trực
 * Date: 03/03/2016
 */
 class Group extends Database {
    
    public function __construct() {
        parent::__construct();
    }
    
    //Properties
    private $group_id;
    private $group_name;
    private $group_value;
    private $group_note;
    private $group_type;
    
    //Properties GET SET
    //$group_id
    public function setGroup_id($group_id){
        $this->group_id = $group_id;
    }
    
    public function getGroup_id(){
        return $this->group_id;
    }
    
    //$group_nam
    public function setGroup_name($group_name){
        $this->group_name = $group_name;
    }
    
    public function getGroup_name(){
        return $this->group_name;
    }
    
    //$group_value
    public function setGroup_value($group_value){
        $this->group_value = $group_value;
    }
    
    public function getGroup_value(){
        return $this->group_value;
    }
    
    //$group_note
    public function setGroup_note($group_note){
        $this->group_note = $group_note;
    }
    
    public function getGroup_note(){
        return $this->group_note;
    }
    
    //$group_type
    public function setGroup_type($group_type){
        $this->group_type = $group_type;
    }
    
    public function getGroup_type(){
        return $this->group_type;
    }
    
    //Insert
    public function insert(){
        $db = new Database();
        $value = array(
            'group_id'      => 'NULL',
            'group_name'    => $this->getGroup_name(),
            'group_value'   => $this->getGroup_value(),
            'group_note'    => $this->getGroup_note(),
            'group_type'    => $this->getGroup_type()
        );
        $result = $db->insertData('group',$value);
        return $result;
    }
    
    // Update
    public function update($id){
        $db = new Database();
        $value = array(
            'group_name'    => $this->getGroup_name(),
            'group_value'   => $this->getGroup_value(),
            'group_note'    => $this->getGroup_note(),
            'group_type'    => $this->getGroup_type()
        );
        $condition = array(
            'where'     => 'group_id='.intval($id)
        );
        $result = $db->updateData('group',$value,$condition);
        return $result;
    }
    
    //Get Arecord
    public function getArecord($value){
        $db = new Database();
        $condition = array(
            'order_by'      => 'group_id DESC',
            'limit_start'   => 0,
            'limit_end'     => 1
        );
        $result = $db->getAData('group', $value, $condition);
        return $result;
    }
    
    //GetARecord by id
    public function getArecordByID($id,$value){
        $db = new Database();
        $condition = array(
            'where'      => 'group_id='.intval($id)
        );
        $result = $db->getAData('group', $value, $condition);
        return $result;
    }
    //GET ALL
    public function getAll($value){
        $db = new Database();
        $condition = array();
        $result = $db->getSData('group',$value,$condition);
        return $result;        
    }
    //GET Group
    public function getGroup($id,$value){
        $group = $this->getArecordByID($id);
        $res = $group->$value;
        return $res;    
    }
    
 }