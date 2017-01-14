<?PHP
$action = isset($_GET['action']) ? $_GET['action'] : 'view';
if($action == "" || $action=='view')
{
?>
<div id="mainContent">
    <div class="control">
        <a href="index.php"><?PHP echo $language['website_manager']?></a> <img src="imgs/arr_.gif" /> <a href="index.php?option=bannerSlide"><?PHP echo $language['bannerSlide_manager']?></a>
    </div>
    <div class="control">
        <a href="index.php?option=bannerSlide&action=add"><img alt="Add New product" src="imgs/add_.png" /></a> <span><?PHP echo $language['bannerSlide_manager']?></span>
    </div>
    <div class="buttonUpdate">
        <input type="image" src="./imgs/export2pdf.gif" onclick="mygrid.toExcel('./dhtmlx/export/pdf/generate.php');" />
		<input type="image" src="./imgs/export2excel.gif" onclick="mygrid.toExcel('./dhtmlx/export/excel/generate.php');" />
    </div>
    <div class="buttonUpdate">
        <input type="image" src="./imgs/refesh.gif" onclick="mygrid.clearAll(); mygrid.loadXML('./modules/EbannerSlide/bannerSlideConnect.php');">
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
		<div style="clear:both;"></div>
    </div>
    <div id="content">
        <div style="clear:both;"></div>
        <div id="gridbox" style="width:100%; height:450px;background-color:white;overflow:hidden"></div>
		<div id="pagingArea"></div>
		<script>
			//init grid and set its parameters (this part as always)
			mygrid = new dhtmlXGridObject('gridbox');
			mygrid.setImagePath("./dhtmlx/imgs/");
			mygrid.setHeader("ID,<?PHP echo $language['bannerSlide_title']?>,<?PHP echo $language['bannerSlide_by']?>, <?PHP echo $language['bannerSlide_update_date']?>, <?PHP echo $language['bannerSlide_update_ip']?>, <?PHP echo $language['language']?>, <?PHP echo $language['bannerSlide_order']?>, <?PHP echo $language['bannerSlide_status']?>,Action");
			mygrid.setInitWidths("40,*,100,120,100,90,90,85,80");
			mygrid.setColAlign("center,left,left,left,left,left,center,center,center");
			mygrid.setColTypes("ro,ed,ro,ro,ro,ro,ed,acheck,link");
			mygrid.attachHeader("&nbsp;,#connector_text_filter,#connector_text_filter,#connector_text_filter,#connector_text_filter,#connector_text_filter,#connector_text_filter,#connector_select_filter,&nbsp;");
			mygrid.setColSorting("connector,connector,connector,connector,connector,connector,connector,connector,connector");
			mygrid.enableMultiselect(true);
			mygrid.setSkin("dhx_skyblue");
			mygrid.enableRowsHover(true,"grid_hover");
			mygrid.init();
			mygrid.enablePaging(true,50,10,"pagingArea",true);
			mygrid.setPagingSkin("bricks");
			mygrid.loadXML("./modules/EbannerSlide/bannerSlideConnect.php");	//LOAD DATA TO GRID
			
			myDataProcessor = new dataProcessor("./modules/EbannerSlide/bannerSlideConnect.php"); //UPDATE DATA TO GRID
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
    </div><!-- END div id content -->
</div><!-- END div mainContent id -->
<?PHP
}
else if($action=='add')
{
?>
<div id="mainContent">
    <div class="control">
        <a href="index.php"><?PHP echo $language['website_manager']?></a> <img src="imgs/arr_.gif" /> <a href="index.php?option=bannerSlide"><?PHP echo $language['bannerSlide_manager']?></a> <img src="imgs/arr_.gif" /> <?PHP echo $language['bannerSlide_add']?>
    </div>
    <div class="control">
        <a href="index.php?option=bannerSlide&action=add"><img alt="Add New product" src="imgs/add_.png" /></a> <span><?PHP echo $language['bannerSlide_add']?></span>
    </div>
    <div id="content">
        <form class="form" name="form_edit" method="post" action="index.php?option=bannerSlideProccess&action=add" enctype="multipart/form-data" onsubmit="return doAction()">
            <label><?PHP echo $language['bannerSlide_title']?></label>
            <input class="input" name="title" type="text" />
            <label><?PHP echo $language['bannerSlide_link']?></label>
            <input class="input" name="link" type="text" />
            <label>Background banner Slideshow</label>
            <input name="bgcolor" class="input" type="text" />
            <label><?PHP echo $language['bannerSlide_images']?></label>
            <input class="input" name="images" id="images" type="file" />
            <div class="language">
                <?PHP include_once "./language/languageCheckbox.php";?>
            </div>
            <div class="buttonAction">
                <input class="button" type="submit" name="button" id="button" value="<?PHP echo $language['btn_save']?>" />
            </div>
		  </form>
          <div style="clear:both"></div>
    </div><!-- END div content id -->
</div><!-- END div mainContent id -->
<?PHP
}
else if($action=='update')
{
	$id = $_GET['id'];
	if($bannerSlide = $db->get_row("SELECT `bannerSlide_id`, `bannerSlide_title`, `bannerSlide_link`, `bannerSlide_note`, `bannerSlide_content`, `bannerSlide_bgcolor`, `bannerSlide_images`, `bannerSlide_lang` FROM `".$tbfix."bannerSlide"."` WHERE `bannerSlide_id` = '$id' LIMIT 1"))
?>
<div id="mainContent">
    <div class="control">
        <a href="index.php"><?PHP echo $language['website_manager']?></a> <img src="imgs/arr_.gif" /> <a href="index.php?option=bannerSlide"><?PHP echo $language['bannerSlide_manager']?></a> <img src="imgs/arr_.gif" /> <?PHP echo $language['bannerSlide_update']?>
    </div>
    <div class="control">
        <a href="index.php?option=bannerSlide&action=add"><img alt="Add New product" src="imgs/add_.png" /></a> <span><?PHP echo $language['bannerSlide_update']?></span>
    </div>
    <div id="content">
        <form class="form" name="form_edit" method="post" action="index.php?option=bannerSlideProccess&action=update&id=<?PHP echo $bannerSlide->bannerSlide_id?>" enctype="multipart/form-data" onsubmit="return doAction()">
            <label><?PHP echo $language['bannerSlide_title']?></label>
            <input class="input" style="WIDTH: 600px" name="title" type="text" value="<?PHP echo str_replace('"',"\'",$bannerSlide->bannerSlide_title)?>" />
            <label><?PHP echo $language['bannerSlide_link']?></label>
            <input class="input" style="WIDTH: 600px" name="link" type="text" value="<?PHP echo str_replace('"',"\'",$bannerSlide->bannerSlide_link)?>" />
            <label>Background banner Slideshow</label>
            <input name="bgcolor" class="input" style="WIDTH: 600px;" value="<?php echo $bannerSlide->bannerSlide_bgcolor; ?>" />
            <label><?PHP echo $language['bannerSlide_images']?></label>
            <input class="input" style="WIDTH: 600px" name="images" id="images" type="file" />
            <div class="language">
            
            </div>
            <div class="buttonAction">
                <input class="button" type="submit" name="submit" id="submit" value="<?PHP echo $language['btn_update']?>" />
				<input class="button" type="submit" name="submit" id="submit" value="<?PHP echo $language['btn_save']?>" />
            </div>
		</form>
        <div class="imgThumbs">
            <ul>
                <li>
                    <a href="<?PHP echo $bannerSlide->bannerSlide_images; ?>" style="cursor: -moz-zoom-in;" onclick="return hs.expand (this, { wrapperClassName: 'wide-border floating-caption', dimmingOpacity: 0.75, align:'center'})" target="_blank"><img src="<?PHP echo $bannerSlide->bannerSlide_images; ?>" /></a>
                    <a href="index.php?option=loainoidungProccess&action=delImage&id=<?php echo $nammerSlide->bannerSlide_id;?>" onclick="return delImage();" class="link"><?php echo $language['delete']; ?></a>
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
    </div>
</div>
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
