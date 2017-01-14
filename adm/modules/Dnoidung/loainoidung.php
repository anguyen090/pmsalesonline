<?PHP
$action = isset($_GET['action']) ? $_GET['action'] : "";
$lnd = new LoaiNoiDung();
$user = new User();
if($action == "" || $action=='view')
{
?>
<div id="mainContent">
    <div class="control">
        <a href="index.php"><?PHP echo $language['website_manager']?></a> <img src="imgs/arr_.gif" /> <a href="index.php?option=loainoidung"><?PHP echo $language['loainoidung_manager']?></a>
    </div>
    <div class="control">
        <a href="index.php?option=loainoidung&action=add"><img alt="Add New product" src="imgs/add_.png" /></a> <span><?PHP echo $language['loainoidung_manager']?></span>
    </div>
    <div id="content">
        <div class="buttonUpdate">
            <label>Export to</label>
            <input type="image" src="./imgs/export2pdf.gif" onclick="mygrid.toExcel('./dhtmlx/export/pdf/generate.php');" />
            <input type="image" src="./imgs/export2excel.gif" onclick="mygrid.toExcel('./dhtmlx/export/excel/generate.php');" />
        </div>
        <div class="buttonUpdate">
            <input type="image" src="./imgs/refesh.gif" onclick="mygrid.clearAll(); mygrid.loadXML('./modules/Dnoidung/loainoidungConnect.php');">
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
			mygrid.setHeader("ID,<?PHP echo $language['dongnoidung_title']?>,<?PHP echo $language['loainoidung_title']?>,<?PHP echo $language['loainoidung_link']?>,<?PHP echo $language['loainoidung_by']?>, <?PHP echo $language['loainoidung_update_date']?>, <?PHP echo $language['loainoidung_update_ip']?>, <?PHP echo $language['language']?>, <?PHP echo $language['loainoidung_mainmenu']?>, <?PHP echo $language['loainoidung_submenu']?>, <?PHP echo $language['loainoidung_hot']?>, <?PHP echo $language['loainoidung_order']?>, <?PHP echo $language['loainoidung_status']?>,Action");
			mygrid.setInitWidths("40,120,160,100,*,*,*,*,90,80,80,80,85,80");
			mygrid.setColAlign("center,left,left,left,left,left,left,left,center,center,center,center,center,center");
			mygrid.setColTypes("ro,co,ed,link,ro,ro,ro,ro,acheck,acheck,acheck,ed,acheck,link");
			mygrid.attachHeader("&nbsp;,#connector_select_filter,#connector_text_filter,#connector_text_filter,#connector_text_filter,#connector_text_filter,#connector_text_filter,#connector_text_filter,#connector_text_filter,#connector_select_filter,#connector_select_filter,#connector_text_filter,#connector_select_filter,&nbsp;");
			mygrid.setColSorting("connector,connector,connector,connector,connector,connector,connector,connector,connector,connector,connector,connector,connector,connector");
			mygrid.enableMultiselect(true);
			mygrid.setSkin("dhx_skyblue");
			mygrid.enableRowsHover(true,"grid_hover");
			mygrid.init();
			mygrid.enablePaging(true,50,10,"pagingArea",true);
			mygrid.setPagingSkin("bricks");
			mygrid.loadXML("./modules/Dnoidung/loainoidungConnect.php");	//LOAD DATA TO GRID
			
			myDataProcessor = new dataProcessor("./modules/Dnoidung/loainoidungConnect.php"); //UPDATE DATA TO GRID
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
</div> <!-- END div mainContent id-->
<?PHP
}
else if($action=='add')
{
?>
<div id="mainContent">
    <div class="control">
        <a href="index.php"><?PHP echo $language['website_manager']?></a> <img src="imgs/arr_.gif" /> <a href="index.php?option=loainoidung"><?PHP echo $language['loainoidung_manager']?></a> <img src="imgs/arr_.gif" /> <?PHP echo $language['loainoidung_add']?>
    </div>
    <div class="control">
        <a href="index.php?option=loainoidung&action=add"><img alt="Add New product" src="imgs/add_.png" /></a> <span><?PHP echo $language['loainoidung_add']?></span>
    </div>
    <div id="content">
        <form name="form_edit" method="post" action="index.php?option=loainoidungProccess&action=add" enctype="multipart/form-data" onsubmit="return doAction()">
            <div class="small">
                <label><?PHP echo $language['dongnoidung']?></label>
                <select class="input" name="type" >
        			<option value="0">Root Type</option>
        			<?PHP
        				//Load danh sách loại tin tức
                        $lnd->getContentCategory(0,'loainoidung_id,dongnoidung_id,loainoidung_title',null);
        			?>
        		</select>
                <label><?PHP echo $language['loainoidung_title']?></label>
                <input class="input" name="title" type="text" onchange="alias.value=replace_txt(this.value)" />
                <label><?PHP echo $language['loainoidung_alias']?></label>
                <input class="input" id="alias" name="alias" type="text" />
                <label>Từ khóa kết nối với modules</label>
                <input class="input" id="keys" name="keys" type="text" />
                <label><?PHP echo $language['noidung_note']?></label>
                <textarea class="input" name="note"></textarea>
                <label><?PHP echo $language['loainoidung_link']?></label>
                <input class="input" name="link" type="text" />
                <label><?PHP echo $language['noidung_images']?></label>
                <input class="input" name="images" id="images" type="file" />
                <div class="language">
                    <?PHP include_once "./language/languageCheckbox.php";?>
                </div>
            </div>
            <div class="small" style="border: 1px solid #ccc; padding: 20px 20px;">
                <label>Trạng thái hiển thị Menu</label>
                <div class="status">
                    <select name="status" id="status" class="input" onchange="return loadShowInfoUser('#status','.userListInfo','page=loadUser');">
                        <option value="public">Hiển thị với tất cả mọi người</option>
                        <option value="protected">Hiển thị với một ai đó</option>
                    </select>
                </div>
                <hr style="width: 100%; margin: 0px auto;" />
                <div class="userListInfo"></div>
            </div>
            <div style="clear:both;"></div>
            <div class="buttonAction">
                <input class="button" type="submit" name="button" id="button" value="<?PHP echo $language['btn_save']?>" />
            </div>
      </form>
      <div class="clr"></div>
    </div><!-- END div content id-->
</div><!-- END div mainContent id-->
<?PHP
}
else if($action=='update')
{
	if($loainoidung = $lnd->getARecordByID($_GET['id'],'loainoidung_id,dongnoidung_id,loainoidung_title,loainoidung_alias,loainoidung_keys,loainoidung_link,loainoidung_note,loainoidung_images,loainoidung_lang'))
    {
?>
<div id="mainContent">
    <div class="control">
        <a href="index.php"><?PHP echo $language['website_manager']?></a> <img src="imgs/arr_.gif" /> <a href="index.php?option=loainoidung"><?PHP echo $language['loainoidung_manager']?></a> <img src="imgs/arr_.gif" /> <?PHP echo $language['loainoidung_add']?>
    </div>
    <div class="control">
        <a href="index.php?option=loainoidung&action=add"><img alt="Add New product" src="imgs/add_.png" /></a> <span><?PHP echo $language['loainoidung_add']?></span>
    </div>
    <div id="content">
        <form name="form_edit" method="post" action="index.php?option=loainoidungProccess&action=update&id=<?PHP echo $loainoidung->loainoidung_id?>" enctype="multipart/form-data" onsubmit="return doAction()">
            <div class="small">
                <label><?PHP echo $language['dongnoidung']?></label>
                <select class="input" name="type" >
    				<?PHP
    					if($type_old = $lnd->getARecordByID($loainoidung->dongnoidung_id,'loainoidung_id,loainoidung_title'))
    					{
    						echo "<option value=".$type_old->loainoidung_id.">".htmlspecialchars_decode($type_old->loainoidung_title)." </option>";
    					}
    					else
    					{
    						echo "<option value=0>Root Type</option>";
    					}
    					//Load danh sách loại tin tức
    					$lnd->getContentCategory(0,'loainoidung_id,dongnoidung_id,loainoidung_title',null);
    					echo "<option value=0>Root Type</option>";
    				?>
    			</select>
                <label><?PHP echo $language['loainoidung_title']?></label>
                <input class="input" name="title" type="text" onchange="alias.value=replace_txt(this.value)" value="<?PHP echo htmlspecialchars_decode($loainoidung->loainoidung_title);?>" />
                <label><?PHP echo $language['loainoidung_alias']?></label>
                <input class="input" id="alias" name="alias" type="text" value="<?PHP echo htmlspecialchars_decode($loainoidung->loainoidung_alias);?>" />
                <label>Từ khóa kết nối với modules</label>
                <input class="input" id="keys" name="keys" type="text" value="<?PHP echo htmlspecialchars_decode($loainoidung->loainoidung_keys);?>" />
                <label><?PHP echo $language['noidung_note']?></label>
                <textarea class="input" name="note"><?PHP echo htmlspecialchars_decode($loainoidung->loainoidung_note);?></textarea>
                <label><?PHP echo $language['loainoidung_link']?></label>
                <input class="input" name="link" type="text" value="<?PHP echo htmlspecialchars_decode($loainoidung->loainoidung_link);?>" />
                <label><?PHP echo $language['noidung_images']?></label>
                <input class="input" name="images" id="images" type="file" />
            </div>
            <div class="small" style="border: 1px solid #ccc; padding: 20px 20px;">
                <label>Trạng thái hiển thị Menu</label>
                <div class="status">
                    <select name="status" id="status" class="input" onchange="return loadShowInfoUser('#status','.userListInfo','page=loadUserEdit&id=<?php echo $_GET['id'];?>');">
                        <option value="public">Hiển thị với tất cả mọi người</option>
                        <option value="protected">Hiển thị với một ai đó</option>
                    </select>
                </div>
                <hr style="width: 100%; margin: 0px auto;" />
                <div class="userListInfo"></div>
            </div>
            <div style="clear:both;"></div>
            <div class="language">
                <?PHP include_once "./language/languageCheckbox.php";?>
            </div>
            <div class="buttonAction">
                <input class="button" type="submit" name="submit" id="submit" value="<?PHP echo $language['btn_update']?>" />
                <input class="button" type="submit" name="submit" id="submit" value="<?PHP echo $language['btn_save']?>" />
            </div>
        </form>
        <div class="imgThumbs">
            <ul>
            <li>img here</li>
                <?php 
                    if($loainoidung->loainoidung_images){
                        echo '
                            <li>
                                <a  href="'.$loainoidung->loainoidung_images.'" class="fancybox" rel="group_'.$loainoidung->loainoidung_id.'" rev="doSlideshow:true showThis endTask:exit navType:button"><img src="'.str_replace("loainoidung/","loainoidung/",$loainoidung->loainoidung_images).'" /></a>
                                <a href="index.php?option=loainoidungProccess&action=delImage&id='.$loainoidung->loainoidung_id.'" onclick="return delImage();" class="link">'.$language['delete'].'</a>
                            </li>
                        ';
                    }
                ?>
            </ul>
            <script  type="text/javascript">
                function delImage()
                {
                	if(confirm("<?PHP echo $language['confirm_delete_img']?>"))
                	{
                		return true;
                	}
                	return false;
                }
            </script>
        </div>
        <div class="clr"></div>
    </div> <!-- END div content id-->
</div><!-- END div mainContent id-->
<?PHP
    }else {echo "không tồn tại dữ liệu";}
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
