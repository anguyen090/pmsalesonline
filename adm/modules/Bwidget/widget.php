<script>
	$(document).ready(function () {	
		$.fn.tabControl = function(){ 
			//Default Action
			$(this).find(".tab_content").hide(); //Hide all content
			$(this).find("ul.tabs li.active").addClass("active").show(); //Activate first tab
			$(this).find(".tab_content.active").show(); //Show first tab content
			//On Click Event
			$("ul.tabs li").click(function() {
				$(this).parent().parent().find("ul.tabs li").removeClass("active"); //Remove any "active" class
				$(this).addClass("active"); //Add "active" class to selected tab
				$(".tab_content").hide(); //Hide all tab content
				var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
				$(activeTab).fadeIn(); //Fade in the active content
                return false;
			});
		};//end function
		$("div[class^='tabControl']").tabControl(); //Run function on any div with class name of "Simple Tabs"
	});
</script>
<?PHP
$action = isset($_GET['action']) ? $_GET['action'] : "";
$w = new Widgets();
$lnd = new LoaiNoiDung();
if($action == "" || $action=='view')
{
?>
<div id="mainContent">
    <div class="control">
        <a href="index.php"><?PHP echo $language['website_manager']?></a> <img src="imgs/arr_.gif" /> <a href="index.php?option=widget"><?PHP echo $language['widget_manager']?></a>
    </div>
    <div class="control">
        <a href="index.php?option=widget&action=add"><img alt="Add New product" src="imgs/add_.png" /></a> <span><?PHP echo $language['widget_manager']?></span>
    </div>
    <div id="content">
        <div class="buttonUpdate">
            <label>Export to: </label>
            <input type="image" src="./imgs/export2pdf.gif" onclick="mygrid.toExcel('./dhtmlx/export/pdf/generate.php');" />
			<input type="image" src="./imgs/export2excel.gif" onclick="mygrid.toExcel('./dhtmlx/export/excel/generate.php');" />
        </div>
        <div class="buttonUpdate">
            <input type="image" src="./imgs/refesh.gif" onclick="mygrid.clearAll(); mygrid.loadXML('./modules/Bwidget/widgetConnect.php');" />
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
        <div style="clear:both;"></div>
        <div id="gridbox" style="width:100%; height:450px;background-color:white;overflow:hidden"></div>
			<div id="pagingArea"></div>
			<script>
				//init grid and set its parameters (this part as always)
				mygrid = new dhtmlXGridObject('gridbox');
				mygrid.setImagePath("./dhtmlx/imgs/");
				mygrid.setHeader("ID,<?PHP echo $language['widget_title']?>,<?PHP echo $language['widget_modules']?>,<?PHP echo $language['widget_by']?>, <?PHP echo $language['widget_update_date']?>, <?PHP echo $language['widget_update_ip']?>, <?PHP echo $language['language']?>, <?PHP echo $language['widget_order']?>, <?PHP echo $language['widget_status']?>,Action");
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
				mygrid.loadXML("./modules/Bwidget/widgetConnect.php");	//LOAD DATA TO GRID
				
				myDataProcessor = new dataProcessor("./modules/Bwidget/widgetConnect.php"); //UPDATE DATA TO GRID
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
    </div> <!-- END div content id-->
</div><!-- END div mainContent id-->
<?PHP
}
else if($action=='add')
{
?>
<div id="mainContent">
    <div class="control">
        <a href="index.php"><?PHP echo $language['website_manager']?></a> <img src="imgs/arr_.gif" /> <a href="index.php?option=widget"><?PHP echo $language['widget_manager']?></a> <img src="imgs/arr_.gif" /> <?PHP echo $language['widget_add']?>
    </div>
    <div class="control">
        <a href="index.php?option=widget&action=add"><img alt="Add New product" src="imgs/add_.png" /> <span><?PHP echo $language['widget_add']?></span></a>
    </div>
    <div id="content">
        <div class="tabControl">
            <div class="TabContent">
    			<ul class="tabs">
    				<li class="active"><a href="#tab1"><?PHP echo $language['widget_quangcao']?></a></li>
    				<?PHP
    					if(is_dir("./modules/Dnoidung"))
    					{
    						echo '<li><a href="#tab2">'.$language['widget_noidung'].'</a></li>';
    					}
    				?>
    			</ul>
            </div>
            <div class="tab_container">
        		<div id="tab1" class="tab_content active">
        			<form class="form" name="form_edit" method="post" action="index.php?option=widgetProccess&action=add" enctype="multipart/form-data" onsubmit="return doAction()">
        				<input name="widget_modules" type="hidden" value="quangcao" />
                        <label><?PHP echo $language['widget_title']?></label>
                        <input class="input" name="widget_title" type="text" />
                        <label><?PHP echo $language['widget_content']?></label>
                        <textarea class="input" name="widget_content"></textarea>
						<label>Widget Style <em>(css riêng cho từng widget)</em></label>
                        <textarea class="input" name="widget_style"></textarea>
                        <label><?PHP echo $language['widget_info']?></label>
                        <div class="checkWidget">
                            <ul>
                                <li><input type="checkbox" name="widget_info[]" value="title" checked="true" /> <?PHP echo $language['widget_info_title']?></li>
                                <li><input type="checkbox" name="widget_info[]" value="content" checked="true" /><?PHP echo $language['widget_info_content']?></li>
                            </ul>
                        </div>
                        <div class="language">
                            <?PHP include "./language/languageCheckbox.php";?>
                        </div>
                        <div class="buttonAction">
                            <input class="button" type="submit" name="button" id="button" value="<?PHP echo $language['btn_save']?>" />
                        </div>
                    </form>
        		</div>
            </div><!-- END div tab_content class-->
            <?PHP
    			if(is_dir("./modules/Dnoidung"))
    			{
    		?>
            <div class="tab_container">
                <div id="tab2" class="tab_content">
                    <form class="form" name="form_edit" method="post" action="index.php?option=widgetProccess&action=add" enctype="multipart/form-data" onsubmit="return doAction()">
                        <input name="widget_modules" type="hidden" value="noidung" />
                        <label><?PHP echo $language['widget_title']?></label>
                        <input class="input" name="widget_title" type="text" />
                        <label><?PHP echo $language['widget_content']?></label>
                        <textarea class="input" name="widget_content"></textarea>
                        <label><?PHP echo $language['widget_noidung_type']?></label>
                        <select class="input" style="WIDTH: 600px" name="widget_type">
                            <option value="0"><?PHP echo $language['widget_noidung_type_All']?></option>
    						<?PHP
    							//Load loại chủ đề cần chọn
                                $lnd->getContentCategory(0,'loainoidung_id,dongnoidung_id,loainoidung_title',null);
    						?>
    					</select>
                        <label><?PHP echo $language['widget_state']?></label>
                        <select class="input" name="widget_state">
    						<option value="danhmuc">Danh mục Menu Sub</option>
    						<option value="new" selected="selected"><?PHP echo $language['widget_noidung_state_new']?></option>
    						<option value="hot"><?PHP echo $language['widget_noidung_state_hot']?></option>
    						<option value="random"><?PHP echo $language['widget_noidung_state_random']?></option>
    						<option value="view"><?PHP echo $language['widget_noidung_state_view']?></option>
    						<option value="rate"><?PHP echo $language['widget_noidung_state_rate']?></option>
    						<option value="command"><?PHP echo $language['widget_noidung_state_command']?></option>
    					</select>
                        <label><?PHP echo $language['widget_soluong']?></label>
                        <input type="text" class="input" name="widget_soluong" value="10" placeholder="10" />
                        <label><?PHP echo $language['widget_info']?></label>
                        <div class="checkWidget">
                            <ul>
                                <li><input type="checkbox" name="widget_info[]" value="title" checked="true" /><?PHP echo $language['widget_info_title']?></li>
                                <li>
                                    <select name="widget_info[]">
                                        <option value="image^_^AK^_^0">Không hiển thị hình ảnh</option>
                                        <option value="image^_^AK^_^1">Hiển thị hình ảnh cho tin đầu tiên</option>
                                        <option value="image^_^AK^_^2">Hiển thị hình ảnh cho 2 tin đầu tiên</option>
                                        <option value="image^_^AK^_^3">Hiển thị hình ảnh cho tất cả các tin</option>
                                    </select>
                                </li>
                                <li><input type="checkbox" name="widget_info[]" value="noidungtitle" checked="true" /><?PHP echo $language['widget_noidung_info_title']?></li>
                                <li><input type="checkbox" name="widget_info[]" value="update" checked="true" /><?PHP echo $language['widget_info_update']?></li>
                                <li><input type="checkbox" name="widget_info[]" value="note" checked="true" /><?PHP echo $language['widget_info_note']?></li>
                                <li><input type="checkbox" name="widget_info[]" value="content" /><?PHP echo $language['widget_info_content']?></li>
                                <li><input type="checkbox" name="widget_info[]" value="contentby" />Thông tin người đăng</li>
                                <li><input type="checkbox" name="widget_info[]" value="contenttype" />Hiển thị chủ đề bài viết</li>
                            </ul>
                        </div>
						<label>Widget Style <em>(css riêng cho từng widget)</em></label>
                        <textarea class="input" name="widget_style"></textarea>
                        <div class="language">
                            <?PHP include "./language/languageCheckbox.php";?>
                        </div>
                        <div class="buttonAction">
                            <input class="button" type="submit" name="button" id="button" value="<?PHP echo $language['btn_save']?>" />
                        </div>
                    </form>
                </div>
                <div class="clr"></div>
            </div><!-- END div tab_content class-->
        </div><!-- END div tabContent-->
        <?php
            }
        ?>
        <div class="clr"></div>
    </div> <!-- END div content id-->
</div><!-- END div mainContent id-->
<?PHP
}
else if($action=='update')
{
	$id = intval($_GET['id']);
	//button products Update p_update
	$btn_update_quangcao = '';
	$btn_update_noidung = '';
	$btn_update_sanpham = '';
    $widget_code = '';
	if($widget = $w->getARecordByID($id,'widget_id,widget_modules,widget_title,widget_code,widget_content,widget_style,widget_info,widget_type,widget_state,widget_soluong,widget_lang'))
	$widget_style = $widget->widget_style!="" || $widget->widget_style!=0 ? $widget->widget_style : "";
	//kiểm tra xem đây có phải là Code được viết sẵn hay không!?
	if($widget->widget_code!="" && $widget->widget_modules=="Widget" || $widget->widget_modules=="widget"){
	   //echo '<script language="javascript">alert("'.$language['widget_handCode'].'");window.history.back()</script>';exit();
        $btn_update_widget_default = '<br /><input class="button" type="submit" name="submit" id="submit" value="'.$language['btn_update'].'">';
        $widget_default_active=" active";
        $widget_default_title = $widget->widget_title;
        $widget_default_content = $widget->widget_content;
		$widget_default_style = $widget->widget_style;
        $widget_code = $widget->widget_code;
        //widget_info -> quangcao_info
		$view_list = explode("^_^AK^_^",$widget->widget_info);
		if (in_array('title', $view_list, true)){$widget_default_info_title = 'checked="checked"';}
		if (in_array('content', $view_list, true)){$widget_default_info_content = 'checked="checked"';}
    }
	//Kiểm tra modules
	//Xu Ly neu là Quảng cáo
	if($widget->widget_modules=="quangcao")
	{
		$btn_update_quangcao = '<br /><input class="button" type="submit" name="submit" id="submit" value="'.$language['btn_update'].'">';
		//quangcao Active -> quangcao_active
		$quangcao_active=" active";
        $widget_code = '';
		//widget_title -> quangcao_title
		$quangcao_title = $widget->widget_title;
		//widget_content -> quangcao_content
		$quangcao_content = $widget->widget_content;
		//widget_style -> bài viết style
		$stylename = "Style ".$widget->widget_style;
		if($widget->widget_style==0)
		{
			$stylename = "No Style ";
		}
		//widget_info -> quangcao_info
		$view_list = explode("^_^AK^_^",$widget->widget_info);
		if (in_array('title', $view_list, true)){$quangcao_info_title = 'checked="checked"';}
		if (in_array('content', $view_list, true)){$quangcao_info_content = 'checked="checked"';}
	}
	//Xu Ly neu là bài viết
    $noidung_active = $widget->widget_modules=="noidung" ? " active" : "";
	if($widget->widget_modules=="noidung")
	{
		$btn_update_noidung = '<br /><input class="button" type="submit" name="submit" id="submit" value="'.$language['btn_update'].'">';
		//widget_title -> noidung_title
		$noidung_title = $widget->widget_title;
        $widget_code = '';
		//widget_content -> quangcao_content
		$quangcao_content = $widget->widget_content;
		//widget_style -> bài viết style
		$stylename = "Style ".$widget->widget_style;
		if($widget->widget_style==0)
		{
			$stylename = "No Style ";
		}
		//widget_type -> baiviet_loai
		if($type_old = $lnd->getARecordByID($widget->widget_type,'loainoidung_id,loainoidung_title'))
		{
			$noidung_loai= "<option value=".$type_old->loainoidung_id.">".$type_old->loainoidung_title." </option>";
		}
		else
		{
			$noidung_loai= "<option value=0>".$language['widget_noidung_type_All']."</option>";
		}
		//widget_state -> baiviet_state
        if($widget->widget_state=="like"){$noidung_state = "Bài viết tôi thích";}
		if($widget->widget_state=="danhmuc"){$noidung_state = "Danh mục Menu Sub";}
		if($widget->widget_state=="new"){$noidung_state = $language['widget_noidung_state_new'];}
		if($widget->widget_state=="hot"){$noidung_state = $language['widget_noidung_state_hot'];}
		if($widget->widget_state=="random"){$noidung_state = $language['widget_noidung_state_random'];}
		if($widget->widget_state=="view"){$noidung_state = $language['widget_noidung_state_view'];}
		if($widget->widget_state=="rate"){$noidung_state = $language['widget_noidung_state_rate'];}
		if($widget->widget_state=="command"){$noidung_state = $language['widget_noidung_state_command'];}
		//widget_info -> baiviet_info
		$view_list = explode("^_^AK^_^",$widget->widget_info);
		if (in_array('image', $view_list, true)){$noidung_info_image = 'checked="checked"';}
		if (in_array('title', $view_list, true)){$noidung_info_title = 'checked="checked"';}
		if (in_array('noidungtitle', $view_list, true)){$noidung_noidung_info_title = 'checked="checked"';}
		if (in_array('update', $view_list, true)){$noidung_info_update = 'checked="checked"';}
		if (in_array('note', $view_list, true)){$noidung_info_note = 'checked="checked"';}
		if (in_array('content', $view_list, true)){$noidung_info_content = 'checked="checked"';}
        if (in_array('contentby', $view_list, true)){$noidung_info_content_by = 'checked="checked"';}
        if (in_array('contenttype', $view_list, true)){$noidung_info_content_type = 'checked="checked"';}
	}
?>
<div id="mainContent">
    <div class="control">
        <a href="index.php"><?PHP echo $language['website_manager']?></a> <img src="imgs/arr_.gif" /> <a href="index.php?option=widget"><?PHP echo $language['widget_manager']?></a> <img src="imgs/arr_.gif" /> <?PHP echo $language['widget_update']?>
    </div>
    <div class="control">
        <a href="index.php?option=widget&action=add"><img alt="Add New product" src="imgs/add_.png" /> <span><?PHP echo $language['widget_update']?></span></a>
    </div>
    <div id="content">
        <div class="tabControl">
            <div class="TabContent">
        		<ul class="tabs">
        			<li class="<?PHP echo $quangcao_active;?>"><a href="#tab1"><?PHP echo $language['widget_quangcao']?></a></li>
        			<?PHP
        				if(is_dir("./modules/Dnoidung"))
        				{
        					echo '<li class="'.$noidung_active.'"><a href="#tab2">'.$language['widget_noidung'].'</a></li>';
        				}
        			?>
                    <li class="<?PHP echo $widget_default_active;?>"><a href="#tab4">Widget mặc định</a></li>
        		</ul>
            </div>
            <div class="tab_container">
                <div id="tab1" class="tab_content <?PHP echo $quangcao_active;?>">
                    <form class="form" name="form_edit" method="post" action="index.php?option=widgetProccess&action=update&id=<?PHP echo $id?>" enctype="multipart/form-data" onsubmit="return doAction()">
                        <input name="widget_modules" type="hidden" value="quangcao" />
                        <input name="widget_code" type="hidden" value="<?PHP echo $widget_code; ?>" />
                        <label><?PHP echo $language['widget_title']?></label>
                        <input class="input" name="widget_title" type="text" value='<?PHP echo htmlspecialchars_decode($quangcao_title);?>' />
                        <label><?PHP echo $language['widget_content']?></label>
                        <textarea class="input" name="widget_content"> <?PHP echo htmlspecialchars_decode($quangcao_content);?></textarea>
                        <label><?PHP echo $language['widget_info']?></label>
                        <div class="checkWidget">
                            <ul>
                                <li><input type="checkbox" name="widget_info[]" value="title" <?PHP echo $quangcao_info_title;?> /><?PHP echo $language['widget_info_title']?></li>
                                <li><input type="checkbox" name="widget_info[]" value="content" <?PHP echo $quangcao_info_content;?> /><?PHP echo $language['widget_info_content']?></li>
                            </ul>
                        </div>
						<label>Widget Style <em>(css riêng cho từng widget)</em></label>
                        <textarea class="input" name="widget_style"><?PHP echo htmlspecialchars_decode($widget_style);?></textarea>
                        <div class="language">
                            <?PHP include "./language/languageCheckbox.php";?>
                        </div>
                        <div class="buttonAction">
                            <?PHP echo $btn_update_quangcao;?><input class="button" type="submit" name="submit" id="submit" value="<?PHP echo $language['btn_save']?>" />
                        </div>
                    </form>
                </div>
            </div><!-- END div tab_container class-->
            <?PHP
				if(is_dir("./modules/Dnoidung"))
				{
			?>
            <div  class="tab_container">
                <div id="tab2" class="tab_content <?PHP echo $noidung_active;?>">
                    <form class="form" name="form_edit" method="post" action="index.php?option=widgetProccess&action=update&id=<?PHP echo $id?>" enctype="multipart/form-data" onsubmit="return doAction()">
                        <input name="widget_modules" type="hidden" value="noidung" />
                        <input name="widget_code" type="hidden" value="<?PHP echo $widget_code; ?>" />
                        <label><?PHP echo $language['widget_title']?></label>
                        <input class="input" name="widget_title" type="text" value='<?PHP echo htmlspecialchars_decode($noidung_title);?>' />
                        <label><?PHP echo $language['widget_content']?></label>
                        <textarea class="input" name="widget_content"> <?PHP echo htmlspecialchars_decode($quangcao_content);?></textarea>
                        <label><?PHP echo $language['widget_noidung_type']?></label>
                        <select class="input" name="widget_type">
    						<?PHP echo $noidung_loai;?>
    						<option value="0"><?PHP echo $language['widget_noidung_type_All']?></option>
        					<?PHP
        						//Load loại nội dung chọn
                                $lnd->getContentCategory(0,'loainoidung_id,dongnoidung_id,loainoidung_title',null);
        					?>
    					</select>
                        <label><?PHP echo $language['widget_state']?></label>
                        <select class="input" name="widget_state">
    						<option value="<?PHP echo $widget->widget_state;?>"><?PHP echo $noidung_state;?></option>
    						<option value="danhmuc">Danh mục Menu Sub</option>
    						<option value="new"><?PHP echo $language['widget_noidung_state_new']?></option>
    						<option value="hot"><?PHP echo $language['widget_noidung_state_hot']?></option>
    						<option value="random"><?PHP echo $language['widget_noidung_state_random']?></option>
    						<option value="view"><?PHP echo $language['widget_noidung_state_view']?></option>
    						<option value="rate"><?PHP echo $language['widget_noidung_state_rate']?></option>
    						<option value="command"><?PHP echo $language['widget_noidung_state_command']?></option>
    					</select>
                        <label><?PHP echo $language['widget_soluong']?></label>
                        <input type="text" class="input" name="widget_soluong" value="<?PHP echo $widget->widget_soluong;?>" />
                        <label><?PHP echo $language['widget_info']?></label>
                        <div class="checkWidget">
                            <ul>
                                <li><input type="checkbox" name="widget_info[]" value="title" <?PHP echo $noidung_info_title;?> /><?PHP echo $language['widget_info_title']?></li>
                                <li>
                                    <select name="widget_info[]">
                                        <option value="image^_^AK^_^0" <?PHP if (in_array('0', $view_list, true)) echo 'selected=selected'; else echo ''; ?> >Không hiển thị hình ảnh</option>
                                        <option value="image^_^AK^_^1" <?PHP if (in_array('1', $view_list, true)) echo 'selected=selected'; else echo ''; ?>>Hiển thị hình ảnh cho tin đầu tiên</option>
                                        <option value="image^_^AK^_^2" <?PHP if (in_array('2', $view_list, true)) echo 'selected=selected'; else echo ''; ?> >Hiển thị hình ảnh cho 2 tin đầu tiên</option>
                                        <option value="image^_^AK^_^3" <?PHP if (in_array('3', $view_list, true)) echo 'selected=selected'; else echo ''; ?>>Hiển thị hình ảnh cho tất cả các tin</option>
                                    </select>    
                                </li>
                                <li><input type="checkbox" name="widget_info[]" value="noidungtitle" <?PHP echo $noidung_noidung_info_title;?> /><?PHP echo $language['widget_noidung_info_title']?></li>
                                <li><input type="checkbox" name="widget_info[]" value="update" <?PHP echo $noidung_info_update;?> /><?PHP echo $language['widget_info_update']?></li>
                                <li><input type="checkbox" name="widget_info[]" value="note" <?PHP echo $noidung_info_note;?> /><?PHP echo $language['widget_info_note']?></li>
                                <li><input type="checkbox" name="widget_info[]" value="content" <?PHP echo $noidung_info_content;?> /><?PHP echo $language['widget_info_content']?></li>
                                <li><input type="checkbox" name="widget_info[]" value="contentby" <?PHP if(isset($noidung_info_content_by)) echo $noidung_info_content_by; ?> />Thông tin người đăng</li>
                                <li><input type="checkbox" name="widget_info[]" value="contenttype" <?PHP if(isset($noidung_info_content_type)) echo $noidung_info_content_type; ?> />Hiển thị chủ đề bài viết</li>
                            </ul>
                        </div>
						<label>Widget Style <em>(css riêng cho từng widget)</em></label>
                        <textarea class="input" name="widget_style"><?PHP echo htmlspecialchars_decode($widget_style);?></textarea>
                        <div class="language">
                            <?PHP include "./language/languageCheckbox.php";?>
                        </div>
                        <div class="buttonAction">
                            <?PHP echo $btn_update_noidung;?><input class="button" type="submit" name="submit" id="submit" value="<?PHP echo $language['btn_save']?>" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab_container">
                <div id="tab4" class="tab_content <?php echo $widget_default_active; ?>">
                    <form class="form" name="form_edit" method="post" action="index.php?option=widgetProccess&action=update&id=<?PHP echo $id?>" enctype="multipart/form-data" onsubmit="return doAction()">
                        <input name="widget_modules" type="hidden" value="Widget" />
                        <input name="widget_code" type="hidden" value="<?PHP echo $widget_code; ?>" />
                        <label><?PHP echo $language['widget_title']?></label>
                        <input class="input" name="widget_title" type="text" value='<?PHP echo htmlspecialchars_decode($widget_default_title);?>' />
                        <label><?PHP echo $language['widget_content']?></label>
                        <input class="input" name="widget_content" value="<?PHP echo htmlspecialchars_decode($widget_default_content);?>" />
						<label>Widget Style <em>(css riêng cho từng widget)</em></label>
                        <textarea class="input" name="widget_style"><?PHP echo htmlspecialchars_decode($widget_default_style);?></textarea>
                        <label><?PHP echo $language['widget_info']?></label>
                        <div class="checkWidget">
                            <ul>
                                <li><input type="checkbox" name="widget_info[]" value="title" <?PHP echo $widget_default_info_title;?> /><?PHP echo $language['widget_info_title']?></li>
                                <li><input type="checkbox" name="widget_info[]" value="content" <?PHP echo $widget_default_info_content;?> /><?PHP echo $language['widget_info_content']?></li>
                            </ul>
                        </div>
                        <div class="language">
                            <?PHP include "./language/languageCheckbox.php";?>
                        </div>
                        <div class="buttonAction">
                            <?PHP echo $btn_update_widget_default;?><input class="button" type="submit" name="submit" id="submit" value="<?PHP echo $language['btn_save']?>" />
                        </div>
                    </form>
                </div>
            </div><!-- END div tab_container class-->
            <?php
                }
            ?>
        </div><!-- END div tabControl class-->
        <div class="clr"></div>
    </div><!-- END div content id-->
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
