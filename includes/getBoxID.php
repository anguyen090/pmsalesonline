<?PHP
	$boxID = "";
	$whereChude = "";
	//Điều kiện khi nó là trang chủ
	if(!isset($option) OR $option=="")
	{
		$whereChude = " `boxhienthi_option`='index' AND ";
	}
	//Điều kiện khi nó là chủ đề
	else if($option=="content" OR $option=="products" OR $option=="faqs")
	{
		if($id>0){
			$whereChude = " `boxhienthi_option`='".$option."' AND `boxhienthi_value`='".$id."' AND ";
		}else{
			$whereChude = " `boxhienthi_option`='".$option."' AND `boxhienthi_value`='0' AND ";
		}
	}
	//Điều kiện dành cho tất cả các trang
	else{
		$whereChude = " (`boxhienthi_option`='".$option."') AND ";
	}
	//KIỂM TRA TRANG VÀ LOAD BOXID
	if($sqlboxID = $db->get_row("SELECT `boxhienthi_id` FROM `".$tbfix."boxhienthi` WHERE `boxhienthi_lang`='".$_SESSION['language']."' AND ".$whereChude." `boxhienthi_status`='1' ORDER BY `boxhienthi_update_date` DESC LIMIT 1"))
	{
		$boxID = $sqlboxID->boxhienthi_id;
	}
	else
	{
		if($sqlboxID = $db->get_row("SELECT `boxhienthi_id` FROM `".$tbfix."boxhienthi` WHERE (`boxhienthi_option`='default') AND `boxhienthi_lang`='".$_SESSION['language']."' AND `boxhienthi_status`='1' ORDER BY `boxhienthi_update_date` DESC LIMIT 1"))
		{
			$boxID = $sqlboxID->boxhienthi_id;
		}
	}
?>