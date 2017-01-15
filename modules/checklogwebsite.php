<?php
    //echo MTN_BASE_SITEURL;
    //Lấy địa chỉ ip truy cập
    $ip = $_SERVER['REMOTE_ADDR'];
    $dt = date("Y-m-d H:i:s A");
    $dht = date("Y-m-d");
    $typeClient = MOBILE==1 ? " - mobile" : " - desktop";
    $file=fopen("log/".$dht."_ip_log.txt","a");
    $data = $typeClient . " - " . $ip.' '.$dt. ' ' . $f->curPageURL() . "\n";
    fwrite($file, $data); 
    fclose($file);
?>