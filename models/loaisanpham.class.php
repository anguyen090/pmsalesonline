<?php

/**
 * Author: Nguy?n Minh Tr?c
 * Date: 12/01/2017
 */
class Loaisanpham extends Database {
    
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Properties
     */
    private $loaisanpham_id;
    private $dongsanpham_id;
    private $loaisanpham_title;
    private $loaisanpham_alias;
    private $loaisanpham_link;
    private $loaisanpham_note;
    private $loaisanpham_author;
    private $loaisanpham_by;
    private $loaisanpham_images;
    private $loaisanpham_date;
    private $loaisanpham_ip;
    private $loaisanpham_update_date;
    private $loaisanpham_update_ip;
    private $loaisanpham_update_by;
    private $loaisanpham_hot;
    private $loaisanpham_view;
    private $loaisanpham_order;
    private $loaisanpham_status;
    private $loaisanpham_editor;
    private $loaisanpham_lang;
    /**
     * Properties GET SET
     */
     /*
    //$loaisanpham_id
    public function setLoaisanpham_id($loaisanpham_id){
        $this->loaisanpham_id = $loaisanpham_id;
    }
    public function getLoaisanpham_id(){
        return $this->loaisanpham_id;
    }
    //$dongsanpham_id
    public function setDongsanpham_id($dongsanpham_id){
        $this->dongsanpham_id = $dongsanpham_id;
    }
    public function getDongsanpham_id(){
        return $this->dongsanpham_id;
    }
    //$loaisanpham_title
    public function setLoaisanpham_title($loaisanpham_title){
        $this->loaisanpham_title = $loaisanpham_title;
    }
    public function getLoaisanpham_title(){
        return $this->loaisanpham_title;
    }
    //$loaisanpham_alias
    public function setLoaisanpham_alias($loaisanpham_alias){
        $this->loaisanpham_alias = $loaisanpham_alias;
    }
    public function getLoaisanpham_alias(){
        return $this->loaisanpham_alias;
    }
    //$loaisanpham_link
    public function setLoaisanpham_link($loaisanpham_link){
        $this->loaisanpham_link = $loaisanpham_link;
    }
    public function getLoaisanpham_link(){
        return $this->loaisanpham_link;
    }
    //$loaisanpham_note
    public function setLoaisanpham_note($loaisanpham_note){
        $this->loaisanpham_note = $loaisanpham_note;
    }
    public function getLoaisanpham_note(){
        return $this->loaisanpham_note;
    }*/
    //$loaisanpham_id
    public function setLoaisanpham_id($loaisanpham_id){ 
    $this->loaisanpham_id = $loaisanpham_id; 
    } 
    public function getLoaisanpham_id($loaisanpham_id){ 
    return $this->loaisanpham_id; 
    } 
    
    //$dongsanpham_id
    public function setDongsanpham_id($dongsanpham_id){ 
    $this->dongsanpham_id = $dongsanpham_id; 
    } 
    public function getDongsanpham_id($dongsanpham_id){ 
    return $this->dongsanpham_id; 
    } 
    
    //$loaisanpham_title
    public function setLoaisanpham_title($loaisanpham_title){ 
    $this->loaisanpham_title = $loaisanpham_title; 
    } 
    public function getLoaisanpham_title($loaisanpham_title){ 
    return $this->loaisanpham_title; 
    } 
    
    //$loaisanpham_alias
    public function setLoaisanpham_alias($loaisanpham_alias){ 
    $this->loaisanpham_alias = $loaisanpham_alias; 
    } 
    public function getLoaisanpham_alias($loaisanpham_alias){ 
    return $this->loaisanpham_alias; 
    } 
    
    //$loaisanpham_link
    public function setLoaisanpham_link($loaisanpham_link){ 
    $this->loaisanpham_link = $loaisanpham_link; 
    } 
    public function getLoaisanpham_link($loaisanpham_link){ 
    return $this->loaisanpham_link; 
    } 
    
    //$loaisanpham_note
    public function setLoaisanpham_note($loaisanpham_note){ 
    $this->loaisanpham_note = $loaisanpham_note; 
    } 
    public function getLoaisanpham_note($loaisanpham_note){ 
    return $this->loaisanpham_note; 
    } 
    
    //$loaisanpham_author
    public function setLoaisanpham_author($loaisanpham_author){ 
    $this->loaisanpham_author = $loaisanpham_author; 
    } 
    public function getLoaisanpham_author($loaisanpham_author){ 
    return $this->loaisanpham_author; 
    } 
    
    //$loaisanpham_by
    public function setLoaisanpham_by($loaisanpham_by){ 
    $this->loaisanpham_by = $loaisanpham_by; 
    } 
    public function getLoaisanpham_by($loaisanpham_by){ 
    return $this->loaisanpham_by; 
    } 
    
    //$loaisanpham_images
    public function setLoaisanpham_images($loaisanpham_images){ 
    $this->loaisanpham_images = $loaisanpham_images; 
    } 
    public function getLoaisanpham_images($loaisanpham_images){ 
    return $this->loaisanpham_images; 
    } 
    
    //$loaisanpham_date
    public function setLoaisanpham_date($loaisanpham_date){ 
    $this->loaisanpham_date = $loaisanpham_date; 
    } 
    public function getLoaisanpham_date($loaisanpham_date){ 
    return $this->loaisanpham_date; 
    } 
    
    //$loaisanpham_ip
    public function setLoaisanpham_ip($loaisanpham_ip){ 
    $this->loaisanpham_ip = $loaisanpham_ip; 
    } 
    public function getLoaisanpham_ip($loaisanpham_ip){ 
    return $this->loaisanpham_ip; 
    } 
    
    //$loaisanpham_update_date
    public function setLoaisanpham_update_date($loaisanpham_update_date){ 
    $this->loaisanpham_update_date = $loaisanpham_update_date; 
    } 
    public function getLoaisanpham_update_date($loaisanpham_update_date){ 
    return $this->loaisanpham_update_date; 
    } 
    
    //$loaisanpham_update_ip
    public function setLoaisanpham_update_ip($loaisanpham_update_ip){ 
    $this->loaisanpham_update_ip = $loaisanpham_update_ip; 
    } 
    public function getLoaisanpham_update_ip($loaisanpham_update_ip){ 
    return $this->loaisanpham_update_ip; 
    } 
    
    //$loaisanpham_update_by
    public function setLoaisanpham_update_by($loaisanpham_update_by){ 
    $this->loaisanpham_update_by = $loaisanpham_update_by; 
    } 
    public function getLoaisanpham_update_by($loaisanpham_update_by){ 
    return $this->loaisanpham_update_by; 
    } 
    
    //$loaisanpham_hot
    public function setLoaisanpham_hot($loaisanpham_hot){ 
    $this->loaisanpham_hot = $loaisanpham_hot; 
    } 
    public function getLoaisanpham_hot($loaisanpham_hot){ 
    return $this->loaisanpham_hot; 
    } 
    
    //$loaisanpham_view
    public function setLoaisanpham_view($loaisanpham_view){ 
    $this->loaisanpham_view = $loaisanpham_view; 
    } 
    public function getLoaisanpham_view($loaisanpham_view){ 
    return $this->loaisanpham_view; 
    } 
    
    //$loaisanpham_order
    public function setLoaisanpham_order($loaisanpham_order){ 
    $this->loaisanpham_order = $loaisanpham_order; 
    } 
    public function getLoaisanpham_order($loaisanpham_order){ 
    return $this->loaisanpham_order; 
    } 
    
    //$loaisanpham_status
    public function setLoaisanpham_status($loaisanpham_status){ 
    $this->loaisanpham_status = $loaisanpham_status; 
    } 
    public function getLoaisanpham_status($loaisanpham_status){ 
    return $this->loaisanpham_status; 
    } 
    
    //$loaisanpham_editor
    public function setLoaisanpham_editor($loaisanpham_editor){ 
    $this->loaisanpham_editor = $loaisanpham_editor; 
    } 
    public function getLoaisanpham_editor($loaisanpham_editor){ 
    return $this->loaisanpham_editor; 
    } 
    
    //$loaisanpham_lang
    public function setLoaisanpham_lang($loaisanpham_lang){ 
    $this->loaisanpham_lang = $loaisanpham_lang; 
    } 
    public function getLoaisanpham_lang($loaisanpham_lang){ 
    return $this->loaisanpham_lang; 
    }
}