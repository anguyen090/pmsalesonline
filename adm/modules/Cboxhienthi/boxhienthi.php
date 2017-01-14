<link rel="stylesheet" type="text/css" href="./js_css/drapdropVBB/controlpanel.css" />
<link rel="stylesheet" type="text/css" href="./js_css/drapdropVBB/grids.css" />
<link rel="stylesheet" type="text/css" href="./js_css/drapdropVBB/vbulletin_yui_grid_addon.css" />
<script type="text/javascript" src="./js_css/drapdropVBB/yuiloader-dom-event.js"></script>
<script type="text/javascript" src="./js_css/drapdropVBB/connection-min.js"></script>
<script type="text/javascript" src="./js_css/drapdropVBB/vbulletin-core.js"></script><script type="text/javascript" src="./js_css/drapdropVBB/dragdrop-min.js"></script>
<script type="text/javascript" src="./js_css/drapdropVBB/animation-min.js"></script>
<script type="text/javascript" src="./js_css/drapdropVBB/vbulletin_overlay.js"></script>
<script type="text/javascript" src="./js_css/drapdropVBB/vbulletin_cpcms_layout.js"></script>
<?PHP
$action = null;
if(isset($_GET['action'])){
	$action = $_GET['action'];
}
$user = new User();
if($action == "" || $action=='view')
{
?>
<div id="mainContent">
    <div class="control">
        <a href="index.php"><?PHP echo $language['website_manager']?></a> <img src="imgs/arr_.gif" /> <a href="index.php?option=boxhienthi"><?PHP echo $language['boxhienthi_manager']?></a>
    </div>
    <div class="control">
        <a href="index.php?option=boxhienthi&action=add"><img alt="Add New product" src="imgs/add_.png" /></a> <span><?PHP echo $language['boxhienthi_manager']?></span>
    </div>
    <div id="content">
        <div class="buttonUpdate">
            <label>Export to: </label>
				<input type="image" src="./imgs/export2pdf.gif" onclick="mygrid.toExcel('./dhtmlx/export/pdf/generate.php');" />
				<input type="image" src="./imgs/export2excel.gif" onclick="mygrid.toExcel('./dhtmlx/export/excel/generate.php');" />
        </div>
        <div class="buttonUpdate">
            <input type="image" src="./imgs/refesh.gif" onclick="mygrid.clearAll(); mygrid.loadXML('./modules/Cboxhienthi/boxhienthiConnect.php');" />
			<?PHP
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
                $getPer = $user->checkPerAdmin(array(1,2,3),'group_id',$f->decodeID($getKey['log_key_en_id'],$getKey['log_key_cv_id'],$_COOKIE['login_userid']),$_COOKIE['login_username']);
                //$per = $user->isUpdate($_COOKIE['login_userright']);
                if($getPer==true){
                    echo '<input type="image" src="./imgs/update.gif" onclick="myDataProcessor.sendData()">';
                    echo '<input type="image" src="./imgs/delete.gif" onclick="mygrid.deleteSelectedItem()">';
                }
			?>
        </div>
        <div class="clr"></div>
        <div id="gridbox" style="width:100%; height:450px;background-color:white;overflow:hidden"></div>
		<div id="pagingArea"></div>
		<script>
			//init grid and set its parameters (this part as always)
			mygrid = new dhtmlXGridObject('gridbox');
			mygrid.setImagePath("./dhtmlx/imgs/");
			mygrid.setHeader("ID,<?PHP echo $language['boxhienthi_title']?>,<?PHP echo $language['boxhienthi_option']?>,<?PHP echo $language['boxhienthi_by']?>, <?PHP echo $language['boxhienthi_update_date']?>, <?PHP echo $language['boxhienthi_update_ip']?>, <?PHP echo $language['language']?>, <?PHP echo $language['boxhienthi_order']?>, <?PHP echo $language['boxhienthi_status']?>,Action");
			mygrid.setInitWidths("40,*,120,100,120,100,90,90,85,80");
			mygrid.setColAlign("center,left,left,left,left,left,left,center,center,center");
			mygrid.setColTypes("ro,ed,ro,ro,ro,ro,ro,ed,acheck,link");
			mygrid.attachHeader("&nbsp;,#connector_text_filter,#connector_text_filter,#connector_text_filter,#connector_text_filter,#connector_text_filter,#connector_text_filter,#connector_text_filter,#connector_select_filter,&nbsp;");
			mygrid.setColSorting("connector,connector,connector,connector,connector,connector,connector,connector,connector,connector");
			mygrid.enableMultiselect(true);
			mygrid.setSkin("dhx_skyblue");
			mygrid.enableRowsHover(true,"grid_hover");
			mygrid.init();
			mygrid.enablePaging(true,50,10,"pagingArea",true);
			mygrid.setPagingSkin("bricks");
			mygrid.loadXML("./modules/Cboxhienthi/boxhienthiConnect.php");	//LOAD DATA TO GRID
			
			myDataProcessor = new dataProcessor("./modules/Cboxhienthi/boxhienthiConnect.php"); //UPDATE DATA TO GRID
			myDataProcessor.init(mygrid);
			myDataProcessor.setUpdateMode("off");
			myDataProcessor.styles={
				updated:"font-weight:bold;font-style:italic; color:green;",
				inserted:"font-weight:bold; color:green;",
				deleted:"font-weight:0; color:red;text-decoration:line-through;",
				invalid:"color:orange; text-decoration:underline;",
				error:"color:red; text-decoration:underline;",
				clear:"font-weight:normal;text-decoration:none;"
			}
		</script>
    </div><!-- END div content id-->
</div><!-- END div mainContent id-->
<?PHP
}
else if($action=='add')
{
?>
<div id="mainContent">
    <div class="control">
        <a href="index.php"><?PHP echo $language['website_manager']?></a> <img src="imgs/arr_.gif" /> <a href="index.php?option=boxhienthi"><?PHP echo $language['boxhienthi_manager']?></a> <img src="imgs/arr_.gif" /> <?PHP echo $language['boxhienthi_add']?>
    </div>
    <div class="control">
        <a href="index.php?option=boxhienthi&action=add"><img alt="Add New product" src="imgs/add_.png" /></a> <span><?PHP echo $language['boxhienthi_add']?></span>
    </div>
    <div id="content">
        <form id="cpform" method="POST" name="editForm "action="index.php?option=boxhienthiProccess&action=add">
            <div class="form">
                <input id="do" name="do" value="updatelayout" type="hidden" />
                <div id="ctrl_title"><input type="hidden" name="title221" value="Home (25,75,240px)" size="35" /></div>
                <label><?PHP echo $language['boxhienthi_title']?></label>
                <input class="input" name="boxhienthi_title" type="text" />
                <label><?PHP echo $language['boxhienthi_option']?></label>
                <select class="input"name="boxhienthi_option">
    				<option value="default"> Mặc định cho tất cả các trang - Defaults Layout</option>
    				<option value="index"> Trang chủ - Index page</option>
    				<option value="contact"> Trang liên hệ - Contact page</option>
    				<option value="search"> Trang tìm kiếm - Search page</option>
    				<option value="register"> Trang đăng ký - Register page</option>
                    <option value="login"> Trang đăng nhập - Login page</option>
                    <option value="dashboard"> Trang thông tin thành viên - Dashboard page</option>
    				<?PHP
    					///Kiểm tra xem modules noi dung có tồn tại không!?
    					if(is_dir("./modules/Dnoidung"))
    					{
    						echo '<optgroup label="--------------------------------------------------------------------------"></optgroup>';
    						echo '<option value="content"> Trang  bài viết - Content page</option>';
    						echo '<option value="details"> Trang chi tiết bài viết - Content Details page</option>';
    						echo '<optgroup label="Trang theo chủ đề - Select Type Content Page">';
    						if($loainoidung = $db->get_results("SELECT  `loainoidung_id`,`dongnoidung_id`, `loainoidung_title`, `loainoidung_keys` from `".$tbfix."loainoidung` "))
    						{
    							function chude_choice($parentid,$aCats,$res = '',$sep = ''){
    							$stt=1;
    								foreach($aCats as $v){
    											if($v->dongnoidung_id==0)
    											{
    												$dongnoidung =  "Root Type";
    											}
    											else
    											{
    												$dongnoidung = $v->dongnoidung_id;
    											}
    
    									if($v->dongnoidung_id == $parentid){
    										$modkey = $v->loainoidung_keys!="" ? $v->loainoidung_keys : "content";
                                            $re = '<option value="'.$modkey.'^_^AK^_^'.$v->loainoidung_id.'"> '.$sep.htmlspecialchars_decode($v->loainoidung_title).'</option>';
    										$res.=chude_choice($v->loainoidung_id,$aCats,$re,$sep."---/ ");
    									}
    									$stt=$stt+1;
    								}
    								return $res;
    							}
    							$sMenu = chude_choice(0,$loainoidung);						
    							print $sMenu;
    						}
    						echo '</optgroup>';
    					}
    				?>
    			</select>
            </div>
            <div class="clr"></div>
            <div class="layoutWidget">
                <label>Lựa chọn Widget hiển thị</label>
                <div id="ctrl_gridid"></div>
                <select id="widgetbox" size="15" class="input" style="width:200px;">
                    <?PHP
    					if($widget = $db->get_results("SELECT `widget_id`,`widget_title` FROM `".$tbfix."widget` WHERE `widget_status`='1' ORDER BY `widget_order`, `widget_update_date` DESC "))
    					{
    						$i = 1;
    						foreach ($widget as $widget)
    						{
    							//selected
    							$selected = "";
    							if($i==1){$selected = "selected";}
    							echo '<option value="'.$widget->widget_id.'" '.$selected.'>'.htmlspecialchars_decode($widget->widget_title).'</option>';
    							$i=$i+1;
    						}
    					}
                    ?>
                </select>
            </div>
            <div class="layoutButton">
                <button style="margin-top:80px;" id="addwidget">Chọn >></button>
            </div>
            <!--include script-->
            <script type="text/javascript">
					var vbphrase = {
						"remove_widget"  : "Remove this widget?",
						"primary_widget" : "Primary Content",
						"please_enter_layout_title" : "Please enter a title for this layout"
					};

					var widgetarray = new Array(
						[3, 0, "Primary Content"]
					);
			</script>
            <!-- END include cript-->
            <div class="layoutContent" style="width:770px;" id="layout">
                <div id="doc3" style="margin:0px;">
					<div id="hd">
						<div class="yui-u yui-header">
							<ul id="widgetlist_column1" class="list_no_decoration widget_list"></ul>
						</div>
					</div>
					<div id="bd" style="margin-top:5px;">
						<div id="yui-main">
							<div class="yui-b">
								<div class="yui-g" style="margin-bottom:5px;">
									<div class="first yui-panel" style="float:left;width:770px;background:#fff;margin-right:5px;">
										<div style="clear:both;width:770px;margin-bottom:5px;margin-left:5px;">
											<div style="float:left;width:760px;margin-right:5px;background:#cbcbcb;margin-bottom:5px;">
												<ul id="widgetlist_column2" class="list_no_decoration widget_list"></ul>
											</div>
                                            <div style="clear:both;"></div>
										</div>
                                        <div style="clear:both;width:770px;margin-bottom:5px;margin-left:5px;">
											<div style="float:left;width:180px;margin-right:5px;background:#cbcbcb;margin-bottom:5px;">
												<ul id="widgetlist_column3" class="list_no_decoration widget_list"></ul>
											</div>
											<div style="float:right;width:585px;">
												<div style="float:left;width:575px;margin-right:5px;margin-bottom:5px;background:#cbcbcb">
													<ul id="widgetlist_column4" class="list_no_decoration widget_list"></ul>
												</div>
											</div>
                                            <div style="clear:both;"></div>
										</div>
										<div style="clear:both;width:770px;margin-left:5px;margin-bottom:5px;">
											<div style="float:left;width:575px;margin-right:5px;background:#cbcbcb">
												<ul id="widgetlist_column5" class="list_no_decoration widget_list"></ul>
											</div>
											<div style="float:left;width:180px;background:#cbcbcb">
												<ul id="widgetlist_column6" class="list_no_decoration widget_list"></ul>
											</div>
                                            <div style="clear:both;"></div>
                                        </div>
										<div style="clear:both;width:770px;margin-left:5px;margin-bottom:5px;">
											<div style="float:left;width:575px;margin-right:5px;background:#cbcbcb">
												<ul id="widgetlist_column7" class="list_no_decoration widget_list"></ul>
											</div>
											<div style="float:left;width:180px;background:#cbcbcb">
												<ul id="widgetlist_column8" class="list_no_decoration widget_list"></ul>
											</div>
                                            <div style="clear:both;"></div>
                                        </div>
										<div style="clear:both;width:770px;margin-left:5px;margin-bottom:5px;">
											<div style="float:left;width:377px;margin-right:5px;background:#cbcbcb;">
												<ul id="widgetlist_column9" class="list_no_decoration widget_list"></ul>
											</div>
                                            <div style="float:left;width:377px;margin-right:5px;background:#cbcbcb;">
												<ul id="widgetlist_column10" class="list_no_decoration widget_list"></ul>
											</div>
											<div style="clear:both;"></div>
										</div>
										<div style="clear:both;width:770px;margin-left:5px;margin-bottom:5px;">
    										<div style="float:left;width:251px;margin-right:5px;background:#cbcbcb">
    											<ul id="widgetlist_column11" class="list_no_decoration widget_list"></ul>
    										</div>
                                            <div style="float:left;width:252px;margin-right:5px;background:#cbcbcb;">
    											<ul id="widgetlist_column12" class="list_no_decoration widget_list"></ul>
    										</div>
                                            <div style="float:left;width:252px;margin-right:5px;background:#cbcbcb;">
    											<ul id="widgetlist_column13" class="list_no_decoration widget_list"></ul>
    										</div>
                                            <div style="clear:both;"></div>
    									</div>
                                        <div style="clear:both;width:770px;margin-left:5px;">
											<div style="float:left;width:180px;margin-right:5px;background:#cbcbcb">
												<ul id="widgetlist_column14" class="list_no_decoration widget_list"></ul>
											</div>
                                            <div style="float:left;width:395px;margin-right:5px;background:#cbcbcb;">
												<ul id="widgetlist_column15" class="list_no_decoration widget_list"></ul>
											</div>
											<div style="float:left;width:180px;margin-right:5px;background:#cbcbcb">
												<ul id="widgetlist_column16" class="list_no_decoration widget_list"></ul>
											</div>
                                        </div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="ft">
						<div class="yui-u yui-footer">
						  <ul id="widgetlist_column17" class="list_no_decoration widget_list"></ul>
                        </div>
					</div>
                    <script type="text/javascript">
						var LayoutManager = new vB_CMS_Layout_Config("doc3", "cms_layout", widgetarray);
					</script>
				</div>
            </div> <!-- END div layout id-->
            <div class="clr"></div>
            <div class="language pleft">
                <?PHP include "./language/languageCheckbox.php";?>
            </div>
            <div class="buttonAction">
                <input class="button" type="submit" value="<?PHP echo $language['btn_save']?>" />
            </div>
        </form>
        <div class="clr"></div>
    </div><!-- END div content it-->
</div><!-- END div mainContent id-->
<?PHP
}
else if($action=='update')
{
	$id = intval($_GET['id']);
	if($boxhienthi = $db->get_row("SELECT `boxhienthi_id`, `boxhienthi_title`, `boxhienthi_option`, `boxhienthi_value`, `boxhienthi_lang` FROM `".$tbfix."boxhienthi"."` WHERE `boxhienthi_id` = '$id' LIMIT 1"))
    //lay thong tin boxhienthioption
		$boxhienthioption = "";
		if(isset($boxhienthi->boxhienthi_option)){
			switch($boxhienthi->boxhienthi_option) {
				case "default" :
					$boxhienthioption = "Mặc định cho tất cả các trang - Defaults Layout";
					break;
				case "index" :
					$boxhienthioption = "Trang chủ - Index page";
					break;
				case "contact" :
					$boxhienthioption = "Trang liên hệ - Contact page";
					break;
				case "search" :
					$boxhienthioption = "Trang tìm kiếm - Search page";
					break;
				case "register" :
					$boxhienthioption = "Trang đăng ký - Register page";
					break;
                case "login" :
					$boxhienthioption = "Trang đăng nhập - Login page";
					break;
                case "dashboard" :
					$boxhienthioption = "Trang thông tin thành viên - Dashboard page";
					break;
				default: 
					//lấy thông tin chủ đề
					$chude = $db->get_row("SELECT `loainoidung_title` FROM `".$tbfix."loainoidung` WHERE `loainoidung_id`='".$boxhienthi->boxhienthi_value."' LIMIT 1");
					$boxhienthioption = $language['boxhienthi_chude'].' - '.htmlspecialchars_decode($chude->loainoidung_title);
			}
		}else{	$boxhienthioption = "";}
		
		if($boxhienthi->boxhienthi_value!=""){$boxhienthivalue="^_^AK^_^".$boxhienthi->boxhienthi_value;}
?>
<div id="mainContent">
    <div class="control">
        <a href="index.php"><?PHP echo $language['website_manager']?></a> <img src="imgs/arr_.gif" /> <a href="index.php?option=boxhienthi"><?PHP echo $language['boxhienthi_manager']?></a> <img src="imgs/arr_.gif" /> <?PHP echo $language['boxhienthi_update']?>
    </div>
    <div class="control">
        <a href="index.php?option=boxhienthi&action=add"><img alt="Add New product" src="imgs/add_.png" /> <span><?PHP echo $language['boxhienthi_update']?></span></a>
    </div>
    <div id="content">
        <form id="cpform" method="POST" name="editForm" action="index.php?option=boxhienthiProccess&action=update&id=<?PHP echo $id; ?>">
            <div class="form">
                <input id="do" name="do" value="updatelayout" type="hidden" />
                <div id="ctrl_title"><input type="hidden" name="title221" value="Home (25,75,240px)" size="35" /></div>
                <label><?PHP echo $language['boxhienthi_title']?></label>
                <input class="input" name="boxhienthi_title" type="text" value="<?PHP echo htmlspecialchars_decode($boxhienthi->boxhienthi_title);?>" />
                <?PHP echo $language['boxhienthi_option']?>
                <select class="input"name="boxhienthi_option">
    				<option value="<?PHP echo $boxhienthi->boxhienthi_option.$boxhienthivalue?>"> <?PHP echo $boxhienthioption; ?></option>
    				<option value="default"> Mặc định cho tất cả các trang - Defaults Layout</option>
    				<option value="index"> Trang chủ - Index page</option>
    				<option value="contact"> Trang liên hệ - Contact page</option>
    				<option value="search"> Trang tìm kiếm - Search page</option>
    				<option value="register"> Trang đăng ký - Register page</option>
                    <option value="login"> Trang đăng nhập - Login page</option>
                    <option value="dashboard"> Trang thông tin thành viên - Dashboard page</option>
    				<?PHP
    					///Kiểm tra xem modules noi dung có tồn tại không!?
    					if(is_dir("./modules/Dnoidung"))
    					{
    						echo '<optgroup label="--------------------------------------------------------------------------"></optgroup>';
    						echo '<option value="content"> Trang bài viết - Content page</option>';
    						echo '<option value="details"> Trang chi tiết bài viết - Content Details page</option>';
    						echo '<optgroup label="Trang theo chủ đề - Select Type Content Page">';
    						if($loainoidung = $db->get_results("SELECT  `loainoidung_id`,`dongnoidung_id`, `loainoidung_title`, `loainoidung_keys` from `".$tbfix."loainoidung` "))
    						{
    							function chude_choice($parentid,$aCats,$res = '',$sep = ''){
    							$stt=1;
    								foreach($aCats as $v){
    											if($v->dongnoidung_id==0)
    											{
    												$dongnoidung =  "Root Type";
    											}
    											else
    											{
    												$dongnoidung = $v->dongnoidung_id;
    											}
    
    									if($v->dongnoidung_id == $parentid){
    										$modekey = $v->loainoidung_keys!="" ? $v->loainoidung_keys : "content";
                                            $re = '<option value="'.$modekey.'^_^AK^_^'.$v->loainoidung_id.'"> '.$sep.htmlspecialchars_decode($v->loainoidung_title).'</option>';
    										$res.=chude_choice($v->loainoidung_id,$aCats,$re,$sep."---/ ");
    									}
    									$stt=$stt+1;
    								}
    								return $res;
    							}
    							$sMenu = chude_choice(0,$loainoidung);						
    							print $sMenu;
    						}
    						echo '</optgroup>';
    					}
    				?>
    				<?PHP
    					///Kiểm tra xem modules sản phẩm có tồn tại không!?
    					if(is_dir("./modules/Dsanpham"))
    					{										
    						echo '<optgroup label="--------------------------------------------------------------------------"></optgroup>';
    						echo '<option value="products"> Trang sản phẩm - Products page</option>';
    						echo '<option value="productsDetails"> Trang chi sản phẩm - Products Details page</option>';
    						echo '<optgroup label="Trang theo loại sản phẩm - Select Type Products Page">';
    						if($loaisanpham = $db->get_results("SELECT  `loaisanpham_id`,`dongsanpham_id`, `loaisanpham_title` from `".$tbfix."loaisanpham` "))
    						{
    							function loaisanpham_choice($parentid,$aCats,$res = '',$sep = ''){
    							$stt=1;
    								foreach($aCats as $v){
    											if($v->dongsanpham_id==0)
    											{
    												$dongsanpham =  "Root Type";
    											}
    											else
    											{
    												$dongsanpham = $v->dongsanpham_id;
    											}
    
    									if($v->dongsanpham_id == $parentid){
    										$re = '<option value="products^_^AK^_^'.$v->loaisanpham_id.'"> '.$sep.htmlspecialchars_decode($v->loaisanpham_title).'</option>';
    										$res.=loaisanpham_choice($v->loaisanpham_id,$aCats,$re,$sep."---/ ");
    									}
    									$stt=$stt+1;
    								}
    								return $res;
    							}
    							$sMenu = loaisanpham_choice(0,$loaisanpham);						
    							print $sMenu;
    						}
    						echo '</optgroup>';
    					}
    				?>
    			</select>
            </div>
            <div class="clr"></div>
            <div class="layoutWidget">
                <label>Lựa chọn Widget hiển thị</label>
                <div id="ctrl_gridid"></div>
                <select id="widgetbox" size="15" class="input" style="width:200px;">
        			<?PHP
        				if($widget = $db->get_results("SELECT `widget_id`,`widget_title` FROM `".$tbfix."widget` WHERE `widget_status`='1' ORDER BY `widget_order`, `widget_update_date` DESC "))
        				{
        					$i = 1;
        					foreach ($widget as $widget)
        					{
        						//selected
        						$selected = "";
        						if($i==1){$selected = "selected";}
        						echo '<OPTION value="'.$widget->widget_id.'" '.$selected.'>'.htmlspecialchars_decode($widget->widget_title).'</OPTION>';
        						$i=$i+1;
        					}
        				}
        			?>
                </select>
            </div>
            <div class="layoutButton">
                <button id="addwidget">Chọn >></button>
            </div>
            <script type="text/javascript">
    				var vbphrase = {
    					"remove_widget"  : "Remove this widget?",
    					"primary_widget" : "Primary Content",
    					"please_enter_layout_title" : "Please enter a title for this layout"
    				};
    				var widgetarray = new Array(
    					<?PHP 
    					//Load thoong tin vi tri hien thi
    					if($hienthivitri = $db->get_results("SELECT `hienthivitri_id`,`boxhienthi_id`,`hienthivitri_column`,`hienthivitri_content` FROM `".$tbfix."hienthivitri` WHERE `boxhienthi_id`='".$boxhienthi->boxhienthi_id."' ORDER BY `hienthivitri_id` "))
    					{
    						//kiemtra dau phay
    						$ii = 0;
    						$countII = count($hienthivitri);
    						foreach ( $hienthivitri as $hienthivitri )
    						{	
    							$phay = '';
    							if($ii < ($countII-1)){$phay = ',';}
    							$column = $hienthivitri->hienthivitri_column;
    							//widget Title
    							if($hienthivitri->hienthivitri_content==0){$widgetTitle = 'Primary Content';}
    							else{
    								//Lấy widget Title
    								$widgetTitle = '';
    								if($widgetT = $db->get_row("SELECT `widget_title` FROM `".$tbfix."widget` WHERE `widget_id`='".$hienthivitri->hienthivitri_content."' LIMIT 1"))
    								{
    									$widgetTitle = stripTags(htmlspecialchars_decode($widgetT->widget_title),false);
    								}
    							}
    							
    							$col = explode("widgetlist_column",$hienthivitri->hienthivitri_column);
    
    							echo '['.$col[1].', '.$hienthivitri->hienthivitri_content.', "'.$widgetTitle.'"]'.$phay;
    							$ii = $ii+1;
    						}
    					}
    					?>
    				);
    		</script>
            <div class="layoutContent" style="width:770px;" id="layout">
                <div id="doc3" style="margin:0px;">
					<div id="hd">
						<div class="yui-u yui-header">
							<ul id="widgetlist_column1" class="list_no_decoration widget_list"></ul>
						</div>
					</div>
					<div id="bd" style="margin-top:5px;">
						<div id="yui-main">
							<div class="yui-b">
								<div class="yui-g" style="margin-bottom:5px;">
									<div class="first yui-panel" style="float:left;width:770px;background:#fff;margin-right:5px;">
										<div style="clear:both;width:770px;margin-bottom:5px;margin-left:5px;">
											<div style="float:left;width:760px;margin-right:5px;background:#cbcbcb;margin-bottom:5px;">
												<ul id="widgetlist_column2" class="list_no_decoration widget_list"></ul>
											</div>
                                            <div style="clear:both;"></div>
										</div>
                                        <div style="clear:both;width:770px;margin-bottom:5px;margin-left:5px;">
											<div style="float:left;width:180px;margin-right:5px;background:#cbcbcb;margin-bottom:5px;">
												<ul id="widgetlist_column3" class="list_no_decoration widget_list"></ul>
											</div>
											<div style="float:right;width:585px;">
												<div style="float:left;width:575px;margin-right:5px;margin-bottom:5px;background:#cbcbcb">
													<ul id="widgetlist_column4" class="list_no_decoration widget_list"></ul>
												</div>
											</div>
                                            <div style="clear:both;"></div>
										</div>
                                        <div style="clear:both;width:770px;margin-left:5px;margin-bottom:5px;">
											<div style="float:left;width:575px;margin-right:5px;background:#cbcbcb">
												<ul id="widgetlist_column5" class="list_no_decoration widget_list"></ul>
											</div>
											<div style="float:left;width:180px;background:#cbcbcb">
												<ul id="widgetlist_column6" class="list_no_decoration widget_list"></ul>
											</div>
                                            <div style="clear:both;"></div>
                                        </div>
                                        <div style="clear:both;width:770px;margin-left:5px;margin-bottom:5px;">
											<div style="float:left;width:575px;margin-right:5px;background:#cbcbcb">
												<ul id="widgetlist_column7" class="list_no_decoration widget_list"></ul>
											</div>
											<div style="float:left;width:180px;background:#cbcbcb">
												<ul id="widgetlist_column8" class="list_no_decoration widget_list"></ul>
											</div>
                                            <div style="clear:both;"></div>
                                        </div>
										<div style="clear:both;width:770px;margin-left:5px;margin-bottom:5px;">
											<div style="float:left;width:377px;margin-right:5px;background:#cbcbcb;">
												<ul id="widgetlist_column9" class="list_no_decoration widget_list"></ul>
											</div>
                                            <div style="float:left;width:377px;margin-right:5px;background:#cbcbcb;">
												<ul id="widgetlist_column10" class="list_no_decoration widget_list"></ul>
											</div>
											<div style="clear:both;"></div>
										</div>
										<div style="clear:both;width:770px;margin-left:5px;margin-bottom:5px;">
											<div style="float:left;width:251px;margin-right:5px;background:#cbcbcb">
												<ul id="widgetlist_column11" class="list_no_decoration widget_list"></ul>
											</div>
                                            <div style="float:left;width:252px;margin-right:5px;background:#cbcbcb;">
												<ul id="widgetlist_column12" class="list_no_decoration widget_list"></ul>
											</div>
                                            <div style="float:left;width:252px;margin-right:5px;background:#cbcbcb;">
												<ul id="widgetlist_column13" class="list_no_decoration widget_list"></ul>
											</div>
                                            <div style="clear:both;"></div>
										</div>
                                        <div style="clear:both;width:770px;margin-left:5px;">
											<div style="float:left;width:180px;margin-right:5px;background:#cbcbcb">
												<ul id="widgetlist_column14" class="list_no_decoration widget_list"></ul>
											</div>
                                            <div style="float:left;width:395px;margin-right:5px;background:#cbcbcb;">
												<ul id="widgetlist_column15" class="list_no_decoration widget_list"></ul>
											</div>
											<div style="float:left;width:180px;margin-right:5px;background:#cbcbcb">
												<ul id="widgetlist_column16" class="list_no_decoration widget_list"></ul>
											</div>
                                        </div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="ft">
						<div class="yui-u yui-footer">
						  <ul id="widgetlist_column17" class="list_no_decoration widget_list"></ul>
                        </div>
					</div>
                    <script type="text/javascript">
						var LayoutManager = new vB_CMS_Layout_Config("doc3", "cms_layout", widgetarray);
					</script>
				</div>
            </div><!-- END div layout id-->
            <div class="clr"></div>
            <div class="language pleft">
                <?PHP include "./language/languageCheckbox.php";?>
            </div>
            <div class="buttonAction">
                <input class="button" type="submit" value="<?PHP echo $language['btn_update']?>" />
            </div>
        </form>
        <div class="clr"></div>
    </div> <!-- END div content id-->
</div><!-- END div mainContent id-->
<?PHP
}
else
{
?>
<script type="text/javascript">
		alert("<?PHP echo $language['find_not_found'];?>");
       window.history.back();
</script>
<?PHP
}
?>
