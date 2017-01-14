<?php
class EmailTemplates {
    
    //Khai báo biến link
    private $url_art;
    private $link_face_art;
    private $link_googleplus_art;
    private $link_youtube_art;
    private $link_art;
    private $link_cancel_art;
    
    //Khai báo biến bài viết art = article
    private $title_art;
    private $content_art;
    private $image_art;
    
    //Hàm get set
    public function setUrl_art($url_art){
        $this->url_art = $url_art;
    }
    public function getUrl_art(){
        return $this->url_art;
    }
    //$link_face_art
    public function setLink_face_art($link_face_art){
        $this->link_face_art = $link_face_art;
    }
    public function getLink_face_art(){
        return $this->link_face_art;
    }
    //$link_googleplus_art
    public function setLink_googleplus_art($link_googleplus_art){
        $this->link_googleplus_art = $link_googleplus_art;
    }
    public function getLink_googleplus_art(){
        return $this->link_googleplus_art;
    }
    //$link_youtube_art
    public function setLink_youtube_art($link_youtube_art){
        $this->link_youtube_art = $link_youtube_art;
    }
    public function getLink_youtube_art(){
        return $this->link_youtube_art;
    }
    //$link_art
    public function setLink_art($link_art){
        $this->link_art = $link_art;
    }
    public function getLink_art(){
        return $this->link_art;
    }
    //$link_cancel_art
    public function setLink_cancel_art($link_cancel_art){
        $this->link_cancel_art = $link_cancel_art;
    }
    public function getLink_cancel_art(){
        return $this->link_cancel_art;
    }
    //$title_art
    public function setTitle_art($title_art){
        $this->title_art = $title_art;
    }
    public function getTitle_art(){
        return $this->title_art;
    }
    //$content_art
    public function setContent_art($content_art){
        $this->content_art = $content_art;
    }
    public function getContent_art(){
        return $this->content_art;
    }
    //$image_art
    public function setImage_art($image_art){
        $this->image_art = $image_art;
    }
    public function getImage_art(){
        return $this->image_art;
    }
    //Method
}