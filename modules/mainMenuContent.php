<div id="mainMenuContent">
	<div id="smooth_navigational_menu" class="ddsmoothmenu">
		<?php
			if(!$noidung_type= $db->get_results("SELECT `loainoidung_id`, `dongnoidung_id`, `loainoidung_title`, `loainoidung_link` FROM `".$tbfix."loainoidung` WHERE `loainoidung_lang`='".$_SESSION['language']."' AND `loainoidung_status`='1' AND `loainoidung_mainmenu`='1' ORDER BY `loainoidung_order` DESC"))
			{
				//khong lam gi khi khong co du lieu
			}
			else
			{
				echo '
					<ul class="Menu" id="mainMenu">
				';
				//ham loc lay dongnoidung == 0
				function abcdContent($lid){
					global $db,$tbfix;
					$bienMenu = 0;
					if($dlnd = $db->get_row("SELECT `loainoidung_id`,`dongnoidung_id` FROM `".$tbfix."loainoidung` WHERE `loainoidung_id`='".$lid."' LIMIT 1")){
						if($dlnd->dongnoidung_id==0)
						{
							$bienMenu = $dlnd->loainoidung_id;
						}
						else
						{
							$bienMenu = $dlnd->dongnoidung_id;
							abcdContent($bienMenu);
						}
					}
					return $bienMenu;
				}
				//diem xem có bao nhiêu cái menu cha
				$countLoai = $db->get_var("SELECT count(*) FROM `".$tbfix."loainoidung` WHERE `loainoidung_lang`='".$_SESSION['language']."' AND `loainoidung_status`='1' AND `loainoidung_mainmenu`='1' ORDER BY `loainoidung_order` DESC ");
				$i=0;
				//MENU FUNCTION
				function menu_category($submenu,$parentid,$aCats){
					global $db,$tbfix,$countLoai,$template,$members_id,$id;
					$countpa = $db->get_var("SELECT count(*) FROM `".$tbfix."loainoidung` WHERE  `loainoidung_lang`='".$_SESSION['language']."' AND `loainoidung_status`='1' AND `loainoidung_mainmenu`='1' AND `dongnoidung_id`='0' ");
					$countpaSub = $db->get_var("SELECT count(*) FROM `".$tbfix."loainoidung` WHERE  `loainoidung_lang`='".$_SESSION['language']."' AND `loainoidung_status`='1' AND `loainoidung_mainmenu`='1' AND `dongnoidung_id`='".$parentid."' ");
					$h_c = false;
					$ulmo = "";
					$uldong = "";
					$apa = 1;
					$apasub = 1;
					$icon_submenu = "";
					$last = '';
					$menuline = '';
					foreach($aCats as $v){
						if($v->dongnoidung_id == $parentid){
							if ( $h_c == false ) {
								$h_c = true;
								if($submenu==0)
								{
									echo '';
								}
								else
								{
									$ulmo = "<ul>\n";
									$uldong = "</ul>\n";
									echo $ulmo;
									$subhaveSubTop = '<li class="first"></li>';
									$subhaveSubBottom = '<li class="last"></li>';
									
								}
							}
							//Active link
							if($parentid==0)
							{
								$keyMenu = abcdContent(htmlspecialchars_decode(str_replace('"',"",str_replace("'","",$id))));
								$firstPadding = '';
								if($apa==1){$firstPadding = 'padding-left:0px;';}
								$liwidth = ' style="'.$firstPadding.'"';
								$last = '';
								$menuline = '<li class="menuline">  </li>';
								if($apa==$countpa){$menuline = '';$last = ' class="last" ';}
								if($countMain = $db->get_var("SELECT count(*) FROM `".$tbfix."loainoidung` WHERE `loainoidung_lang`='".$_SESSION['language']."' AND `dongnoidung_id`='".$v->loainoidung_id."' AND `loainoidung_status`='1' AND `loainoidung_mainmenu`='1'")!=0)
								{
									//-------------
									$icon_submenu = '';
								}
								else
								{
									//----------
									$icon_submenu = '';
								}
								$apa = $apa+1;
							}
							else
							{
								$liwidth = '';
								$keyMenu = mysql_real_escape_string(str_replace('"',"",str_replace("'","",$id)));
								$onclick = '';
								$menuline = '<li class="menuline">  </li>';
								if($apasub==$countpaSub){$menuline = '';$last = ' class="last" ';}
								$apasub = $apasub+1;
							}
							$menuActive = "";
							$menuActive1 = "";
							if($_GET['option']=='content' AND $keyMenu==$v->loainoidung_id){$menuActive = ' class="active"';}
							//Neu Trang Chu
							if($_GET['option']=='' AND $v->loainoidung_id==1){$menuActive1 = ' ';}		
							if(strlen(utf8_decode($v->loainoidung_title))>30){$liwidth = 'style="width:60px;"';}		
							//Neu noi dung
							if($_GET['option']=='content' AND $keyMenu==$v->loainoidung_id){$menuActive = ' class="active"';}
							//Kiểm tra nếu là sản phâm
							if($_GET['option']=="products" AND $v->loainoidung_title=="Sản phẩm"){$menuActive = ' class="active"';}		
							//Kiểm tra nếu là sản phâm
							if($_GET['option']=="maybo" AND $v->loainoidung_title=="Lấp ráp máy bộ"){$menuActive = ' class="active"';}		
							//Kiểm tra liên kết
							$link = MTN_BASE_SITEURL.MTN_URLRewrite.RootContentAliasLink($v->loainoidung_id,"");
							if($v->loainoidung_link!=""){$link = $v->loainoidung_link;}
							echo '<li '.$last.' '.$liwidth.'>';
							echo '<a '.$menuActive.$menuActive1.' href="'.$link.'"><span>'.$v->loainoidung_title.$icon_submenu.'</span></a>';
									menu_category($submenu+1,$v->loainoidung_id,$aCats);
							echo "</li>\n".$menuline;
						}
					}
					if ( $h_c == true ) {
						echo $uldong;
					}
				}
				$sMenu = menu_category(0,0,$noidung_type);
				echo '
						</ul>
				';
			}
		?>	
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
</div>
<link href="<?PHP echo MTN_BASE_SITEURL.Templates;?>/js_css/ddsmoothmenu/ddsmoothmenu.css" rel="stylesheet" type="text/css" />
<script src="<?PHP echo MTN_BASE_SITEURL.Templates;?>/js_css/ddsmoothmenu/ddsmoothmenu.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
	ddsmoothmenu.init({
	//arrowimages: {down: ['downarrowclass', '<?PHP echo MTN_BASE_SITEURL.Templates;?>/js_css/ddsmoothmenu/images/arrow-menu-top.png', 23],right: ['rightarrowclass', '<?PHP echo MTN_BASE_SITEURL.Templates;?>/js_css/ddsmoothmenu/images/mtop_right.gif']},
	mainmenuid: "smooth_navigational_menu", //Menu DIV id
	zIndex: 500,
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
	});
</script>
