<?php

/**
 * Author: Nguyen Minh Truc
 * Date: 11-1-2017
 */

class SalesChannel extends Database {
    
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Properties
     */
    private $salechannel_id;
    private $salechannel_code;
    private $salechannel_title;
    private $salechannel_note;
    private $salechannel_content;
    private $salechannel_website;
    private $salechannel_account;
    private $salechannel_join;
    private $salechannel_author;
    private $salechannel_date;
    private $salechannel_ip;
    private $salechannel_by;
    private $salechannel_update_date;
    private $salechannel_update_ip;
    private $salechannel_update_by;
    private $salechannel_editor;
    private $salechannel_action;
    private $salechannel_status;
    
    /**
     * Properties GET SET
     */
     //$salechannel_id
    public function setSalechannel_id($salechannel_id){
        $this->salechannel_id = $salechannel_id;
    }
    public function getSalechannel_id(){
        return $this->salechannel_id;
    }
    //$salechannel_code
    public function setSalechannel_code($salechannel_code){
        $this->salechannel_code = $salechannel_code;
    }
    public function getSalechannel_code(){
        return $this->salechannel_code;
    }
    //$salechannel_title
    public function setSalechannel_title($salechannel_title){
        $this->salechannel_title = $salechannel_title;
    }
    public function getSalechannel_title(){
        return $this->salechannel_title;
    }
    //$salechannel_node
    public function setSalechannel_note($salechannel_note){
        $this->salechannel_note = $salechannel_note;
    }
    public function getSalechannel_note(){
        return $this->salechannel_note;
    }
    //$salechannel_content
    public function setSalechannel_content($salechannel_content){
        $this->salechannel_content = $salechannel_content;
    }
    public function getSalechannel_content(){
        return $this->salechannel_content;
    }
    //$salechannel_website
    public function setSalechannel_website($salechannel_website){
        $this->salechannel_website = $salechannel_website;
    }
    public function getSalechannel_website(){
        return $this->salechannel_website;
    }
    //$salechannel_account
    public function setSalechannel_account($salechannel_account){
        $this->salechannel_account = $salechannel_account;
    }
    public function getSalechannel_account(){
        return $this->salechannel_account;
    }
    //$salechannel_join
    public function setSalechannel_join($salechannel_join){
        $this->salechannel_join = $salechannel_join;
    }
    public function getSalechannel_join(){
        return $this->salechannel_join;
    }
    //$salechannel_author
    public function setSalechannel_author($salechannel_author){
        $this->salechannel_author = $salechannel_author;
    }
    public function getSalechannel_author(){
        return $this->salechannel_author;
    }
    //$salechannel_date
    public function setSalechannel_date($salechannel_date){
        $this->salechannel_date = $salechannel_date;
    }
    public function getSalechannel_date(){
        return $this->salechannel_date;
    }
    //$salechannel_ip
    public function setSalechannel_ip($salechannel_ip){
        $this->salechannel_ip = $salechannel_ip;
    }
    public function getSalechannel_ip(){
        return $this->salechannel_ip;
    }
    //$salechannel_by
    public function setSalechannel_by($salechannel_by){
        $this->salechannel_by = $salechannel_by;
    }
    public function getSalechannel_by(){
        return $this->salechannel_by;
    }
    //$salechannel_update_date
    public function setSalechannel_update_date($salechannel_update_date){
        $this->salechannel_update_date = $salechannel_update_date;
    }
    public function getSalechannel_update_date(){
        return $this->salechannel_update_date;
    }
    //$salechannel_update_ip
    public function setSalechannel_update_ip($salechannel_update_ip){
        $this->salechannel_update_ip = $salechannel_update_ip;
    }
    public function getSalechannel_update_ip(){
        return $this->salechannel_update_ip;
    }
    //$salechannel_update_by
    public function setSalechannel_update_by($salechannel_update_by){
        $this->salechannel_update_by = $salechannel_update_by;
    }
    public function getSalechannel_update_by(){
        return $this->salechannel_update_by;
    }
    //$salechannel_editor
    public function setSalechannel_editor($salechannel_editor){
        $this->salechannel_editor = $salechannel_editor;
    }
    public function getSalechannel_editor(){
        return $this->salechannel_editor;
    }
    //$salechannel_action
    public function setSalechannel_action($salechannel_action){
        $this->salechannel_action = $salechannel_action;
    }
    public function getSalechannel_action(){
        return $this->salechannel_action;
    }
    //$salechannel_status
    public function setSalechannel_status($salechannel_status){
        $this->salechannel_status = $salechannel_status;
    }
    public function getSalechannel_status(){
        return $this->salechannel_status;
    }
    /**
     * Method function
     */
    //Function insert
    public function insert(){
        $db = new Database();
        $value = array(
            'salechannel_id'            => NULL,
            'salechannel_code'          => $this->getSalechannel_code(),
            'salechannel_title'          => $this->getSalechannel_title(),
            'salechannel_note'          => $this->getSalechannel_note(),
            'salechannel_content'       => $this->getSalechannel_content(),
            'salechannel_website'       => $this->getSalechannel_website(),
            'salechannel_account'       => $this->getSalechannel_account(),
            'salechannel_join'          => $this->getSalechannel_join(),
            'salechannel_author'        => $this->getSalechannel_author(),
            'salechannel_date'          => $this->getSalechannel_date(),
            'salechannel_ip'            => $this->getSalechannel_ip(),
            'salechannel_by'            => $this->getSalechannel_by(),
            'salechannel_update_date'   => $this->getSalechannel_update_date(),
            'salechannel_update_ip'     => $this->getSalechannel_update_ip(),
            'salechannel_update_by'     => $this->getSalechannel_update_by(),
            'salechannel_action'        => $this->getSalechannel_action(),
            'salechannel_status'        => $this->getSalechannel_status()
        );
        $result = $db->insertData('saleschannel',$value);
        return true;
    }
    //Function insert
    public function update($id){
        $db = new Database();
        $value = array(
            'salechannel_code'          => $this->getSalechannel_code(),
            'salechannel_title'         => $this->getSalechannel_title(),
            'salechannel_note'          => $this->getSalechannel_note(),
            'salechannel_content'       => $this->getSalechannel_content(),
            'salechannel_website'       => $this->getSalechannel_website(),
            'salechannel_account'       => $this->getSalechannel_account(),
            'salechannel_join'          => $this->getSalechannel_join(),
            'salechannel_author'        => $this->getSalechannel_author(),
            'salechannel_update_date'   => $this->getSalechannel_update_date(),
            'salechannel_update_ip'     => $this->getSalechannel_update_ip(),
            'salechannel_update_by'     => $this->getSalechannel_update_by(),
            'salechannel_action'        => $this->getSalechannel_action()
        );
        $condition = array(
            'where'     => 'salechannel_id='.intval($id)
        );
        $result = $db->updateData('saleschannel',$value,$condition);
        return $result;
    }
    //Function insert
    public function updateByCode(){
        $db = new Database();
        $value = array(
            'salechannel_title'         => $this->getSalechannel_title(),
            'salechannel_note'          => $this->getSalechannel_note(),
            'salechannel_content'       => $this->getSalechannel_content(),
            'salechannel_website'       => $this->getSalechannel_website(),
            'salechannel_account'       => $this->getSalechannel_account(),
            'salechannel_join'          => $this->getSalechannel_join(),
            'salechannel_author'        => $this->getSalechannel_author(),
            'salechannel_update_date'   => $this->getSalechannel_update_date(),
            'salechannel_update_ip'     => $this->getSalechannel_update_ip(),
            'salechannel_update_by'     => $this->getSalechannel_update_by(),
            'salechannel_action'        => $this->getSalechannel_action()
        );
        $condition = array(
            'where'     => 'salechannel_code='.$this->getSalechannel_code()
        );
        $result = $db->updateData('saleschannel',$value,$condition);
        return true;
    }
    //Function getall
    public function getAll($value){
        $db = new Database();
        $condition = array(
            'where'     => `salechannel_status=1`
        );
        $result = $db->getSData('saleschannel',$value,$condition);
        return $result;
    }
    //Get arecord by id
    public function getARecodeByID($id,$value){
        $db = new Database();
        $condition = array(
            'where'     => 'salechannel_status=1 AND salechannel_id='.intval($id)
        );
        $result = $db->getAData('saleschannel',$value,$condition);
        return $result;
    }
    //Get max id
    public function getMaxID($value){
        $db = new Database();
        $result = $db->getMaxID('saleschannel',$value);
        return $result;
    }
    
}