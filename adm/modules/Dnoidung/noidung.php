<?PHP
$action = isset($_GET['action']) ? $_GET['action'] : "";
$nd = new Content();
$lnd = new LoaiNoiDung();
$user = new User();
if($action == "" || $action=='view')
{
?>
<div id="mainContent">
    <div class="control">
        <a href="index.php"><?PHP echo $language['website_manager']?></a> <img src="imgs/arr_.gif" /> <a href="index.php?option=noidung"><?PHP echo $language['noidung_manager']?></a>
    </div>
    <div class="control">
        <a href="index.php?option=noidung&action=add"><img alt="Add New product" src="imgs/add_.png" /></a> <span><?PHP echo $language['noidung_manager']?></span>
    </div>
    <div id="content">
        <div class="buttonUpdate">
            <label>Export to: </label>
            <input type="image" src="./imgs/export2pdf.gif" onclick="mygrid.toExcel('./dhtmlx/export/pdf/generate.php');" />
    		<input type="image" src="./imgs/export2excel.gif" onclick="mygrid.toExcel('./dhtmlx/export/excel/generate.php');" />
        </div>
        <div class="buttonUpdate">
            <input type="image" src="./imgs/refesh.gif" onclick="mygrid.clearAll(); mygrid.loadXML('./modules/Dnoidung/noidungConnect.php');" />
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
    		mygrid.setHeader("ID,<?PHP echo $language['dongnoidung_title']?>,<?PHP echo $language['noidung_title']?>,<?PHP echo $language['noidung_by']?>, <?PHP echo $language['noidung_update_date']?>, <?PHP echo $language['noidung_update_ip']?>, <?PHP echo $language['language']?>, <?PHP echo $language['noidung_hot']?>, <?PHP echo $language['noidung_command']?>, <?PHP echo $language['noidung_order']?>, <?PHP echo $language['noidung_status']?>,Action");
    		mygrid.setInitWidths("40,120,*,100,120,100,90,90,90,85,85,80");
    		mygrid.setColAlign("center,left,left,left,left,left,left,center,center,center,center,center");
    		mygrid.setColTypes("ro,co,ro,ro,ro,ro,ro,acheck,acheck,ed,acheck,link");
    		mygrid.attachHeader("&nbsp;,#connector_select_filter,#connector_text_filter,#connector_text_filter,#connector_text_filter,#connector_text_filter,#connector_text_filter,#connector_text_filter,#connector_select_filter,#connector_text_filter,#connector_select_filter,&nbsp;");
    		mygrid.setColSorting("connector,connector,connector,connector,connector,connector,connector,connector,connector,connector,connector,connector");
    		mygrid.enableMultiselect(true);
    		mygrid.setSkin("dhx_skyblue");
    		mygrid.enableRowsHover(true,"grid_hover");
    		mygrid.init();
    		mygrid.enablePaging(true,50,10,"pagingArea",true);
    		mygrid.setPagingSkin("bricks");
    		mygrid.loadXML("./modules/Dnoidung/noidungConnect.php");	//LOAD DATA TO GRID
    		
    		myDataProcessor = new dataProcessor("./modules/Dnoidung/noidungConnect.php"); //UPDATE DATA TO GRID
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
        <a href="index.php"><?PHP echo $language['website_manager']?></a> <img src="imgs/arr_.gif" /> <a href="index.php?option=noidung"><?PHP echo $language['noidung_manager']?></a> <img src="imgs/arr_.gif" /> <?PHP echo $language['noidung_add']?>
    </div>
    <div class="control">
        <a href="index.php?option=noidung&action=add"><img alt="Add New product" src="imgs/add_.png" /></a> <span><?PHP echo $language['noidung_add']?></span>
    </div>
    <div id="content">
        <form class="form" name="form_edit" method="post" action="index.php?option=noidungProccess&action=add" enctype="multipart/form-data" onsubmit="return doAction()">
            <label><?PHP echo $language['loainoidung']?></label>
            <select class="input" name="type" >
				<option value="0">Root Type</option>
				<?PHP
					//Load loại nội dung
                    $lnd->getContentCategory(0,'loainoidung_id,dongnoidung_id,loainoidung_title',null);
				?>
			</select>
            <label><?PHP echo $language['noidung_title']?></label>
            <input class="input" name="title" type="text" />
            <label>Ngày cập nhật</label>
            <input class="input" id="calInput3" name="updatedate" type="text" />
            <label><?PHP echo $language['noidung_author']?></label>
            <input class="input" name="author" type="text" />
            <label><?PHP echo $language['noidung_note']?></label>
            <textarea class="input" name="note"></textarea>
            <label><?PHP echo $language['noidung_content']?></label>
            <textarea class="input" name="content"></textarea>
            <label><?PHP echo $language['noidung_images']?></label>
            <input class="input" name="images" id="images" type="file" />
            <div class="language">
                <?PHP include_once "./language/languageCheckbox.php";?>
            </div>
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
	$id = intval($_GET['id']);
	if($noidung = $nd->getARecordByID($id,'noidung_id,loainoidung_id,noidung_title,noidung_note,noidung_content,noidung_author,noidung_images,noidung_update_date,noidung_lang'))
    {
?>
<div id="mainContent">
    <div class="control">
        <a href="index.php"><?PHP echo $language['website_manager']?></a> <img src="imgs/arr_.gif" /> <a href="index.php?option=noidung"><?PHP echo $language['noidung_manager']?></a> <img src="imgs/arr_.gif" /> <?PHP echo $language['noidung_update']?>
    </div>
    <div class="control">
        <a href="index.php?option=noidung&action=add"><img alt="Add New product" src="imgs/add_.png" /></a> <span><?PHP echo $language['noidung_update']?></span>
    </div>
    <div id="content">
        <form class="form" name="form_edit" method="post" action="index.php?option=noidungProccess&action=update&id=<?PHP echo $noidung->noidung_id?>" enctype="multipart/form-data" onsubmit="return doAction()">
            <label><?PHP echo $language['noidung']?></label>
            <select class="input" name="type" >
				<?PHP
					if($type_old = $lnd->getARecordByID($noidung->loainoidung_id,'loainoidung_id,loainoidung_title,loainoidung_note'))
					{
						echo "<option value=".$type_old->loainoidung_id.">".htmlspecialchars_decode($type_old->loainoidung_title)." </option>";
					}
					else
					{
						echo "<option value=0>".$lang['loainoidung_select']."</option>";
					}
					//Load danh sách loại rao vặt
					$lnd->getContentCategory(0,'loainoidung_id,dongnoidung_id,loainoidung_title',null);
					echo "<option value=0>Root Type</option>";
				?>
			</select>
            <label><?PHP echo $language['noidung_title']?></label>
            <input class="input" name="title" type="text" value="<?PHP echo htmlspecialchars_decode($noidung->noidung_title)?>" />
            <label>Ngày cập nhật</label>
            <input class="input" id="calInput3" name="updatedate" type="text" value="<?PHP echo date("d/m/Y h:i:s",strtotime($noidung->noidung_update_date));?>" />
            <label><?PHP echo $language['noidung_author']?></label>
            <input class="input" name="author" type="text" value="<?PHP echo htmlspecialchars_decode($noidung->noidung_author)?>" />
            <label><?PHP echo $language['noidung_note']?></label>
            <textarea class="input" name="note"><?PHP echo htmlspecialchars_decode($noidung->noidung_note)?></textarea>
            <label><?PHP echo $language['noidung_content']?></label>
            <textarea class="input" name="content"><?PHP echo htmlspecialchars_decode($noidung->noidung_content)?></textarea>
            <label><?PHP echo $language['noidung_images']?></label>
            <input class="input" name="images" id="images" type="file" />
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
                <li>
                    <a href="<?PHP echo $noidung->noidung_images; ?>" style="cursor: -moz-zoom-in;" onclick="return hs.expand (this, { wrapperClassName: 'wide-border floating-caption', dimmingOpacity: 0.75, align:'center'})" target="_blank"><img src="<?PHP echo $noidung->noidung_images; ?>" /></a>
                    <a href="index.php?option=loainoidungProccess&action=delImage&id=<?php echo $noidung->noidung_id;?>" onclick="return delImage();" class="link"><?php echo $language['delete']; ?></a>
                </li>
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
    }
}
else
{
?>
<script language="javascript">
		alert("<?PHP echo $language['find_not_found'];?>");
       window.history.back();
</script>
<?PHP
}
?>
