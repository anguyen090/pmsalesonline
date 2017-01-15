<?PHP 
	$lnd = new LoaiNoiDung();
    $nd = new Content();
    $f =  new functionGet();
    $PrimaryContent = '';
		$PrimaryContent = $PrimaryContent.'
			<div id="widgetPTitle"><div class="title">'.$lang['sitemap'].'</div></div>
						<div id="widgetPContent">
		';
	$PrimaryContent = $PrimaryContent.'
			<div id="news" style="margin-left:20px;">
			<link rel="stylesheet" href="'.MTN_BASE_SITEURL.Templates.'/js_css/treeview/jquery.treeview.css" />
			<script src="'.MTN_BASE_SITEURL.Templates.'/js_css/treeview/jquery.cookie.js" type="text/javascript"></script>
			<script src="'.MTN_BASE_SITEURL.Templates.'/js_css/treeview/jquery.treeview.js" type="text/javascript"></script>
			<script type="text/javascript">
				$(function() {
					$("#tree").treeview({
						collapsed: false,
						animated: "medium",
						control:"#sidetreecontrol",
						persist: "location"
					});
				})
				
			</script>
			
			<div id="sidetree">
			<div id="sidetreecontrol">
				<a href="#"><b>Website</b></a>
			</div>

			<ul id="tree">
				<li><a href="index.php"><strong>'.$lang['homepage'].'</strong></a>';
					if(!$noidung_type= $lnd->getAll())
					{
						//khong lam gi khi khong co du lieu
					}
					else
					{
						echo "not null";
                        function noidung_category($submenu,$parentid,$aCats){
							global $db,$tbfix,$PrimaryContent;
							$h_c = false;
							foreach($aCats as $v){
								if($v->dongnoidung_id == $parentid){
									if ( $h_c == false ) {
										$h_c = true;
										$PrimaryContent = $PrimaryContent.'<ul>';
									}
									$link = MTN_BASE_SITEURL.MTN_URLRewrite.$lnd->RootContentAliasLink($v->loainoidung_id,"");
									if($v->loainoidung_link!=""){$link = $v->loainoidung_link;}

									$PrimaryContent = $PrimaryContent.'<li class="closed">';
									$PrimaryContent = $PrimaryContent.'<a href="'.$link.'">'.stripTags(str_replace("../",MTN_BASE_SITEURL.'/',htmlspecialchars_decode($v->loainoidung_title)), false).'</a>';
										noidung_category($submenu+1,$v->loainoidung_id,$aCats);
									$PrimaryContent = $PrimaryContent.'</li>';
								}
							}
						if ( $h_c == true ) {
								$PrimaryContent = $PrimaryContent.'</ul>';
							}
						}
						$sMenu = noidung_category(0,0,$noidung_type);
					}
					
			$PrimaryContent = $PrimaryContent.'
				</li>
				<li><a href="'.MTN_BASE_SITEURL.'/lien-he.html">Liên hệ</a></li>
			</ul>
			</div>

		';
		$PrimaryContent = $PrimaryContent.'</div>';
		$PrimaryContent = $PrimaryContent.'
							<div class="clear"></div>
						</div>
					<div id="widgetPFooter"></div>
		';
?>