<?php

class CheckFileLog {
    public function __construct() {
        //None code here
    }
    
    //Hàm lấy url hiện tại
    public function curentPage(){
        //Link bắt đầu bằng http
        $pageURL = 'http';
        //Nếu server hỗ trợ ssl https thì thêm chữ s phía sau http
        if ($_SERVER["HTTPS"] == "on") {
        
            $pageURL .= "s";
        
        }
        //Sau http thì thêm :// vào phía sau
        $pageURL .= "://";
        //Trả về cổng người dùng đang sử dụng, nếu không đúng 80 thì tên miền trả về thêm :cổng đang sử dụng
        if ($_SERVER["SERVER_PORT"] != "80") {
        
            $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
        
        } else {
        
            $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
        
        }
        return $pageURL;
    }
    
    //Hàm kiểm tra tuy cập
    public function checkLogWebsiteLogin($ip,$folder,$status,$username,$password,$url){
        //Lấy địa chỉ ip truy cập
        //$ip = $_SERVER['REMOTE_ADDR'];
        $dt = date("Y-m-d h:i:s A");
        $dht = date("Y-m-d");
        $file=fopen($folder.$dht."_ip_log.txt","a");
        $data = $status . " - " .$username. ' -> ' . $password . ' : ' . $ip.' '.$dt. ' ' . $url . "\n";
        fwrite($file, $data); 
        fclose($file);
    }
}