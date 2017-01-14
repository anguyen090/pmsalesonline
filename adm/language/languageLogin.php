<?PHP
	require "../language/config.php";

	foreach ($langCheck as $langCheck)
	{
		//Checked language
		$checked = "";
		if($_SESSION['language']==$langCheck[0])
		{
			$checked = "checked";
		}
		echo '
			<option value="'.$langCheck[0].'" '.$checked.'/>'.$langCheck[1].'</option>
		';
	}
?>
