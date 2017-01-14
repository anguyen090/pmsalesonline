<?PHP
	require "./language/config.php";
	foreach ($langCheck as $langCheck)
	{
		//Check link hiện tại
		$languagelink = $_SERVER['REQUEST_URI']."?lang=".$langCheck[0] ;
		$ex = explode("?", $_SERVER['REQUEST_URI']);
		if(isset($ex[1]))
		{
			$languagelink = $_SERVER['REQUEST_URI']."&lang=".$langCheck[0] ;
		}
		echo '<img style="float:left;margin-top:6px;margin-right:10px;" src="./imgs/arr_.gif"><a style="float:left;" href="'.$languagelink.'">'.$langCheck[1].'</a><br>';
	}
?>