<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="js_css/style.css" type="text/css" rel="stylesheet" />
<link href="../js_css/modules.css" type="text/css" rel="stylesheet" />
<title><?PHP echo $lang['site_title'];?></title>

	<script type="text/javascript" src="./js_css/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="./js_css/dropdowncontent.js"></script>
	<script type="text/javascript" src="./js_css/menu/stmenu.js"></script>
    <script type="text/javascript" src="./js_css/maincheck.js"></script>
    <script type="text/javascript">
        var rootpath = '<?PHP echo MTN_BASE_SITEURL;?>/adm';
    </script>
	<!-- Script DHTMLX -->
        <link rel="STYLESHEET" type="text/css" href="./dhtmlx/dhtmlxgrid.css" />
		<link rel="stylesheet" type="text/css" href="./dhtmlx/skins/dhtmlxgrid_dhx_skyblue.css" />
		<link rel="stylesheet" type="text/css" href="./dhtmlx/skins/dhtmlxgrid_dhx_terrace.css" />
		<link rel="stylesheet" type="text/css" href="./dhtmlx/ext/dhtmlxgrid_pgn_bricks.css" />
		<link rel="stylesheet" type="text/css" href="./dhtmlx/dhtmlxCalendar/dhtmlxcalendar.css" />
		<style>
		.grid_hover {
			background-color:#ffc8ff;
			font-size:20px;
		}
		div.gridbox_light table.obj tr.rowselected td.cellselected, div.gridbox table.obj td.cellselected {
			background-color:#ACCADD;
		}
		</style>
		<script  src="./dhtmlx/dhtmlxcommon.js"></script>
		<script  src="./dhtmlx/dhtmlxgrid.js"></script>		
		<script  src="./dhtmlx/dhtmlxgridcell.js"></script>
		<script  src="./dhtmlx/dhtmlxdataprocessor.js"></script>
		<!-- <script  src="./dhtmlx/dhtmlxdataprocessor_debug.js"></script> -->
		<!-- Script DHTMLX Connect -->
		<script  src="./dhtmlx/dhtmlx_connect/connector.js"></script>
		<!-- Script DHTMLX excells -->
		<script  src="./dhtmlx/excells/dhtmlxgrid_excell_3but.js"></script>
		<script  src="./dhtmlx/excells/dhtmlxgrid_excell_acheck.js"></script>
		<!-- <script  src="./dhtmlx/excells/dhtmlxgrid_excell_calendar.js"></script> -->
		<script  src="./dhtmlx/excells/dhtmlxgrid_excell_cntr.js"></script>
		<script  src="./dhtmlx/excells/dhtmlxgrid_excell_context.js"></script>
		<script  src="./dhtmlx/excells/dhtmlxgrid_excell_dhxcalendar.js"></script>
		<script  src="./dhtmlx/excells/dhtmlxgrid_excell_grid.js"></script>
		<script  src="./dhtmlx/excells/dhtmlxgrid_excell_link.js"></script>
		<script  src="./dhtmlx/excells/dhtmlxgrid_excell_tree.js"></script>
		<!-- Script DHTMLX excells -->
		<!-- Script DHTMLX ext -->
		<script  src="./dhtmlx/ext/dhtmlxgrid_deprecated.js"></script>
		<script  src="./dhtmlx/ext/dhtmlxgrid_drag.js"></script>
		<script  src="./dhtmlx/ext/dhtmlxgrid_export.js"></script>
		<script  src="./dhtmlx/ext/dhtmlxgrid_filter.js"></script>
		<script  src="./dhtmlx/ext/dhtmlxgrid_keymap_access.js"></script>
		<!-- <script  src="./dhtmlx/ext/dhtmlxgrid_keymap_excel.js"></script> -->
		<!-- <script  src="./dhtmlx/ext/dhtmlxgrid_keymap_extra.js"></script> -->
		<script  src="./dhtmlx/ext/dhtmlxgrid_nxml.js"></script>
		<script  src="./dhtmlx/ext/dhtmlxgrid_selection.js"></script>
		<script  src="./dhtmlx/ext/dhtmlxgrid_pgn.js"></script>
		<script  src="./dhtmlx/ext/dhtmlxgrid_start.js"></script>
		<script  src="./dhtmlx/ext/dhtmlxgrid_validation.js"></script>
		<!-- Script DHTMLX ext -->
		<!-- Script DHTMLX Calendar -->
		<link rel="stylesheet" type="text/css" href="./dhtmlx/dhtmlxwindows.css" />
		<link rel="stylesheet" type="text/css" href="./dhtmlx/skins/dhtmlxwindows_dhx_skyblue.css" />
		<script src="./dhtmlx/dhtmlxwindows.js"></script>
		<script src="./dhtmlx/dhtmlxcontainer.js"></script>
		<link rel="STYLESHEET" type="text/css" href="./dhtmlx/dhtmlxCalendar/skins/dhtmlxcalendar_dhx_skyblue.css" />
		<script  src="./dhtmlx/dhtmlxCalendar/dhtmlxcalendar.js"></script>
		<!-- Script DHTMLX Calendar -->
		<script>
		var dhxWins,w1;
		var idPrefix = 1;
		function showPopup(title,linkurl,x,y) {
			dhxWins = new dhtmlXWindows();
			dhxWins.enableAutoViewport(false);
			dhxWins.attachViewportTo("areaPopup");
			dhxWins.setImagePath("./imgs/dhtmlx/");
			
			var id = "userWin"+(idPrefix++);
			w1 = dhxWins.createWindow("w1", 200, 100, x, y);
			w1.setText(title);
			w1.attachURL(linkurl, true);
		}
		</script>
	<!-- Script DHTMLX -->
	<!-- Script TINYMCE 3x
		<script type="text/javascript" src="./js_css/tiny_mce/tiny_mce.js"></script> 
		<script type="text/javascript" src="./js_css/adm_tinymce_config.js"></script> 
	<!-- Script TINYMCE -->
    <!-- Script TINYMCE 4x -->
		<script type="text/javascript" src="./js_css/tinymce/tinymce.min.js"></script> 
		<script type="text/javascript" src="./js_css/tinymce4_config.js"></script> 
	<!-- Script TINYMCE -->
    <script>
		var myCalendar;
		window.onload = function() {
			myCalendar = new dhtmlXCalendarObject(["calInput1","calInput2","calInput3"]);
			myCalendar.setDateFormat("%d/%m/%Y %H:%i:%s");
			myCalendar.loadUserLanguage('vi');
		}
	</script>
	<!-- Script highslide -->
		<link rel="stylesheet" href="./js_css/highslide/highslide.css" type="text/css" />
		<script type="text/javascript" src="./js_css/highslide/highslide-with-gallery.js"></script>
		<script type="text/javascript">
			hs.graphicsDir = './js_css/highslide/graphics/';
			hs.align = 'center';
			hs.transitions = ['expand', 'crossfade'];
			hs.outlineType = 'drop-shadow';
			//hs.wrapperClassName = 'dark';
			
			hs.fadeInOut = true;
			if (hs.addSlideshow) hs.addSlideshow({
				//slideshowGroup: 'group1',
				interval: 5000,
				repeat: false,
				useControls: false,
				fixedControls: 'fit',
				overlayOptions: {
					opacity: .6,
					position: 'bottom center',
					hideOnMouseOut: true
				}
			});
		</script>
	<!--Script highslide-->
	<script type="text/javascript" src="./js_css/customer.js"></script> 
</head>
<body>
<div id="TipBox"></div>
<div id="siteContent">
    <header>
        <div class="logo"><?php echo str_replace('../../','http://'.$_SERVER['HTTP_HOST'].'/'.$config->getUrl('config_website_url').'/',htmlspecialchars_decode($config->getConfig('config_logo'))); ?></div>
        <div class="keylogin">
            <?PHP echo $lang['language_manager']?>: <a href="#" style="text-decoration:none;font-weight:bold;" id='languages' rel='languagesShow'><?PHP if($_SESSION['language']=="vietnam"){ echo "Tiếng Việt";} elseif($_SESSION['language']=="english"){ echo "Engish";} elseif($_SESSION['language']=="deutsch"){ echo "Deutsch";} elseif($_SESSION['language']=="germany"){ echo "Germany";} elseif($_SESSION['language']=="chinese"){ echo "Chinese";} else {echo "Tiếng Việt";}?> <img style='border:0px;margin-left:5px;' src='./imgs/icon_down.gif'/></a>
			<div id='languagesShow' style='width:150px;position:absolute; visibility: hidden;margin-left:-50px;'>
				<div style='background:#ffffff;border:1px solid #e6e6e6;padding:10px;line-height:30px;width:110px;'>
				<?PHP include_once "./language/languageStatus.php";?>
				</div>
			</div>
			<script type='text/javascript'>
				dropdowncontent.init('languages', 'bottom-middle', 200, 'click')
			</script>
            <img src="imgs/user.gif" style="vertical-align: middle; padding: 0px 10px;" />
        </div>
    </header>
    <nav>
        <div id="mainMenu">
            <?php
                /**
                 * Khai báo các giá trị hàm decode
                 * log_key_en_id: từ khóa cho key endcode id
                 * log_key_cv_id: Từ khóa cho key convert id
                 */
                $getKey = array(
                    'log_key_en_id'         => '$Log@KwID',
                    'log_key_cv_id'         => 'KwiD',
                    'log_key_en_firstname'  => '$Log@KwFname',
                    'log_key_cv_firstname'  => 'FLnA',
                    'log_key_en_lastname'   => '$Log@KwLname',
                    'log_key_cv_lastname'      => 'LLnA'
                );
            ?>
            <script type="text/javascript">
                stm_bm(["menu4fd9",830,"","js_css/menu/blank.gif",0,"","",0,0,0,0,1000,1,0,0,"","100%",0,0,1,1,"default","hand",""],this);
                stm_bp("p0",[0,4,0,0,3,4,0,0,100,"",-2,"",-2,90,0,0,"#000000","#e6e6e6","",3,0,0,"#000000"]);
                stm_ai("p0i0",[0,"<?PHP echo $lang['website'];?>","","",-1,-1,0,"","_self","","","","",0,0,0,"","",0,0,0,0,1,"#FFFFFF",0,"#009edf",0,"","",3,3,0,0,"#FFFFF7","#000000","#000000","#FFFFFF","bold 8pt 'Tahoma','Arial'","bold 8pt 'Tahoma','Arial'",0,0],50,0);
                stm_bp("p1",[1,4,0,0,2,3,6,0,100,"",-2,"",-2,100,2,3,"#999999","#FFFFFF","",3,1,1,"#ACA899"]);
                stm_aix("p1i0","p0i0",[0,"<?PHP echo $lang['home'];?>","","",-1,-1,0,"index.php","_self","","","","",6,0,0,"","",0,0,0,0,1,"#FFFFFF",0,"#8c8e88",0,"","",3,3,0,0,"#FFFFF7","#000000","#000000","#FFFFFF","8pt 'Tahoma','Arial'","8pt 'Tahoma','Arial'"]);
                <?PHP
                //Kiểm tra Quyền Quản trị
                $getPer = $user->checkPerAdmin(array(1),'group_id',$f->decodeID($getKey['log_key_en_id'],$getKey['log_key_cv_id'],$_COOKIE['login_userid']),$_COOKIE['login_username']);
                if($getPer==true)
                {
                	echo '
                		stm_aix("p1i1","p1i0",[0,"'.$lang['user_manager'].'","","",-1,-1,0,"index.php?option=user"]);
                	';
                }
                ?>
                stm_ai("p1i4",[6,1,"#ACA899","",0,0,0]);
                stm_aix("p1i5","p1i0",[0,"<?PHP echo $lang['logout'];?>","","",-1,-1,0,"./user/user_logout.php"]);
                stm_ep();
                stm_aix("p0i1","p0i0",[0,"<?PHP echo $lang['content'];?>"],50,0);
                stm_bpx("p2","p1",[1,4,0,0,2,3,6,7]);
                <?PHP
                	//LOC Folder Modules Hien thi Menu 
                	foreach (glob("./modules/*/config.php",GLOB_BRACE) as $filename) {
                		include $filename;
                		echo $menu;
                	}
                ?>
                stm_ep();
                stm_aix("p0i3","p0i0",[0,"<?PHP echo $lang['help'];?>"],50,0);
                stm_bpx("p13","p2",[]);
                stm_aix("p13i1","p1i0",[0,"<?PHP echo $lang['help_manager'];?>","","",-1,-1,0,"http://support.mientaynet.com"]);
                stm_aix("p13i3","p1i4",[]);
                stm_aix("p13i4","p1i0",[0,"<?PHP echo $lang['version'];?>          ","","",-1,-1,0,"index.php?option=version"]);
                stm_ep();
                stm_ep();
                stm_em();
            </script>
        </div>
        <div class="account">
            <ul>
                <li class="view"><a href="#" onclick="window.location='index.php?option=user&action=view&id=<?PHP echo $f->decodeID($getKey['log_key_en_id'],$getKey['log_key_cv_id'],$_COOKIE['login_userid']); ?>'"><?PHP echo $f->decodeID($getKey['log_key_en_firstname'],$getKey['log_key_cv_firstname'],$_COOKIE['login_firstname']).' '. $f->decodeID($getKey['log_key_en_lastname'],$getKey['log_key_cv_lastname'],$_COOKIE['login_lastname']); ?></a></li>
                <li class="user">
                    <a href="#" onclick="show_right()">
                        <?PHP 
                            $getU = $user->getArecordByID($f->decodeID($getKey['log_key_en_id'],$getKey['log_key_cv_id'],$_COOKIE['login_userid']),'user_id,group_id');
                            if($resgr = $group->getArecordByID($getU->group_id,'group_name')){
                                echo $right = $resgr->group_name;
                            }
            			?>
                        <script type="text/javascript">
                    	   	function show_right(){
                    			alert("<?PHP echo $lang['user_right'];?><?PHP echo $right?>");
                    		}
                    	   </script>	
              	     </a>
                </li>
                <li class="logout"><a href="./user/user_logout.php"><?PHP echo $lang['logout'];?></a></li>
                <div class="clr"></div>
            </ul>
        </div>
    </nav>
</div><!-- END div siteContent id-->