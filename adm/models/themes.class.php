<?php

/**
 * Author: Nguy?n Minh Tr?c
 * Date: 03/04/2016
 * Get theme website
 */
class Themes extends Database {
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Thu?c tính
    */
    private $themes_id;
    private $themes_name;
    private $themes_folder;
    private $themes_isMobile;
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
    
    //$themes_isMobile
    public function setThemes_isMobile($themes_isMobile){
        $this->themes_isMobile = $themes_isMobile;
    }
    
    public function getThemes_isMobile(){
        return $this->themes_isMobile;
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
    //Get a record (only choose one theme), ch? có 1 themes duy nhat duoc active co gia tri status=1
    public function getArecord($value) {
        $db = new Database();
        $condition = array(
            'where'         => 'themes_status=1'
        );
        $result = $db->getAData('themes',$value,$condition);
        return $result;
    }
    //Get all themes
    public function getAll($value){
        $db = new Database();
        $condition = array(
            'order_by'     => 'themes_id DESC'
        );
        $result = $db->getSData('themes',$value,$condition);
        return $result;
    }
    //Get status
    public function getStatus($value){
        $db = new Database();
        $condition = array(
            'where'     => 'themes_status = 1'
        );
        $result = $db->getASData('themes',$value,$condition);
        $res = $result->themes_id;
        return $res;
    }
}