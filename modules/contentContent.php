<?PHP
	//$PrimaryContent = "";
	//$PrimaryContent = $PrimaryContent.'<div id="pageViewContent"><div id="widgetP">';
	if(isset($_GET['view']) and $_GET['view']=="chitiet" and isset($_GET['id']))
	{
		include MTN_ROOTDIR."/modules/contentContentDetails.php";
	}
	else if(isset($_GET['view']) and $_GET['view']=="danhsach" and isset($_GET['id']))
	{
		include MTN_ROOTDIR."/modules/contentContentDanhsach.php";
	}
	//$PrimaryContent = $PrimaryContent.'</div><div class="clear"></div></div></div>';
?>
