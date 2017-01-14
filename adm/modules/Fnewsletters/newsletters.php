<?PHP
$action = isset($_GET['action']) ? $_GET['action'] : 'view';
$newsletters = new Newsletter();
$lnd = new LoaiNoiDung();
if($action == "" || $action=='view')
{
?>
<div id="mainContent">
  	<div class="control">
        <a href="index.php"><?PHP echo $language['website_manager']?></a> <img src="imgs/arr_.gif" /> <a href="index.php?option=newsletters"><?PHP echo $language['newsletters_manager']?></a>
    </div>
    <div class="control">
        <a href="index.php?option=newsletters&action=add"><img alt="Add New product" src="imgs/add_.png" align="middle" border="0" /></a><span><?PHP echo $language['newsletters_manager']?></span>
    </div>
    <div id="content">
        <div class="buttonUpdate">
            <input style="float:left;" type="image" src="./imgs/export2pdf.gif" onclick="mygrid.toExcel('./dhtmlx/export/pdf/generate.php');" />
			<input style="float:left;" type="image" src="./imgs/export2excel.gif" onclick="mygrid.toExcel('./dhtmlx/export/excel/generate.php');" />
        </div>
        <div class="buttonUpdate">
            <input style="float:left;" type="image" src="./imgs/refesh.gif" onclick="mygrid.clearAll(); mygrid.loadXML('./modules/Fnewsletters/newslettersConnect.php');" />
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
			mygrid.setHeader("ID,<?PHP echo $language['newsletters_email']?>,<?PHP echo $language['newsletters_option']?>, <?PHP echo $language['newsletters_parent']?>, <?PHP echo $language['newsletters_update_date']?>, <?PHP echo $language['newsletters_update_ip']?>, <?PHP echo $language['newsletters_status']?>,Action");
			mygrid.setInitWidths("40,*,240,120,240,180,100,100");
			mygrid.setColAlign("center,left,center,center,center,center,center,center");
			mygrid.setColTypes("ro,ed,ro,ro,ro,ed,acheck,link");
			mygrid.attachHeader("&nbsp;,#connector_text_filter,#connector_text_filter,#connector_text_filter,#connector_text_filter,#connector_text_filter,#connector_select_filter,&nbsp;");
			mygrid.setColSorting("connector,connector,connector,connector,connector,connector,connector,connector");
			mygrid.enableMultiselect(true);
			mygrid.setSkin("dhx_skyblue");
			mygrid.enableRowsHover(true,"grid_hover");
			mygrid.init();
			mygrid.enablePaging(true,50,10,"pagingArea",true);
			mygrid.setPagingSkin("bricks");
			mygrid.loadXML("./modules/Fnewsletters/newslettersConnect.php");	//LOAD DATA TO GRID
			
			myDataProcessor = new dataProcessor("./modules/Fnewsletters/newslettersConnect.php"); //UPDATE DATA TO GRID
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
    </div>
</div>
<?PHP
}
else if($action=='add')
{
?>
<div id="mainContent">
    <div class="control">
        <a href="index.php"><?PHP echo $language['website_manager']?></a> <img src="imgs/arr_.gif" /> <a href="index.php?option=newsletters"><?PHP echo $language['newsletters_manager']?></a> <img src="imgs/arr_.gif" /> <?PHP echo $language['newsletters_add']?>
    </div>
    <div class="control">
        <a href="index.php?option=newsletters&action=add"><img alt="Add New product" src="imgs/add_.png" /></a><span><?PHP echo $language['newsletters_add']?></span>
    </div>
    <div id="content">
        <form class="form" name="form_add" method="post" action="index.php?option=newslettersProccess&action=add" enctype="multipart/form-data" onsubmit="return doAction()">
            <label><?PHP echo $language['newsletters_email']?></label>
            <input class="input" style="WIDTH: 600px" name="email" type="text" value="" />
            <label><?PHP echo $language['newsletters_option']?></label>
            <select class="input" name="option">
                <option value="index">Trang chủ</option>
                <option value="content">Trang content</option>
            </select>
            <label><?PHP echo $language['newsletters_parent']?></label>
            <select class="input" name="parent">
                <?php
                    $lnd->getContentCategory(0,'loainoidung_id,dongnoidung_id,loainoidung_title','--/')
                ?>
            </select>
            <div class="language">
                <?PHP include_once "./language/languageCheckbox.php";?>
            </div>
            <div class="buttonAction">
                <input class="button" type="submit" name="button" id="button" value="<?PHP echo $language['btn_save']?>" />
            </div>
    	 </form>
         <div style="clear:both;"></div>
    </div><!-- END div class content -->
</div><!-- END div id mainContent -->
<?PHP
}
else if($action=='update')
{
	$id = $_GET['id'];
	if($getNewslt = $newsletters->getARecordByID($id,"newsletters_id,newsletters_email,newsletters_option,newsletters_parent"))
?>
<div id="mainContent">
    <div class="control">
        <a href="index.php"><?PHP echo $language['website_manager']?></a> <img src="imgs/arr_.gif" /> <a href="index.php?option=newsletters"><?PHP echo $language['newsletters_manager']?></a> <img src="imgs/arr_.gif" /> <?PHP echo $language['newsletters_update']?>
    </div>
    <div class="control">
        <a href="index.php?option=newsletters&action=add"><img alt="Add New product" src="imgs/add_.png" /></a> <span><?PHP echo $language['newsletters_update']?></span>
    </div>
    <div id="content">
        <form class="form" name="form_edit" method="post" action="index.php?option=newslettersProccess&action=update&id=<?PHP echo $_GET['id']; ?>" enctype="multipart/form-data" onsubmit="return doAction()">
            <label><?PHP echo $language['newsletters_email']?></label>
            <input class="input" style="WIDTH: 600px" name="email" type="text" value="<?php echo $newsletters->getNewsletters($id,'newsletters_email'); ?>" />
            <label><?PHP echo $language['newsletters_option']?></label>
            <select class="input" name="option">
                <option <?php if($newsletters->getNewsletters($id,'newsletters_option')=='index') echo 'selected'; else echo ''; ?> value="index">Trang chủ</option>
                <option <?php if($newsletters->getNewsletters($id,'newsletters_option')=='content') echo 'selected'; else echo ''; ?> value="content">Trang content</option>
            </select>
            <label><?PHP echo $language['newsletters_parent']?></label>
            <select class="input" name="parent">
                <?php
                    if($getNewslt->newsletters_parent!=0){
                        echo '<option value="'.$lnd->getContentType($getNewslt->newsletters_parent,'loainoidung_id').'">'.$lnd->getContentType($getNewslt->newsletters_parent,'loainoidung_title').'</option>';
                    }
                ?>
                <?php
                    $lnd->getContentCategory(0,'loainoidung_id,dongnoidung_id,loainoidung_title','--/')
                ?>
            </select>
            <div class="language">
                <?PHP include_once "./language/languageCheckbox.php";?>
            </div>
            <div class="buttonAction">
                <input class="button" type="submit" name="submit" id="submit" value="<?PHP echo $language['btn_update']?>" />
            </div>
        </form>
        <div style="clear:both;"></div>
    </div><!-- END div class content -->
</div><!-- END div mainContent id -->
<?PHP
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
