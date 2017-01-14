<?PHP
$action = isset($_GET['action']) ? $_GET['action'] : 'view';
$configE = new Config_email();
if($action == "" || $action=='view')
{
?>
<div id="mainContent">
  	<div class="control">
        <a href="index.php"><?PHP echo $language['website_manager']?></a> <img src="imgs/arr_.gif" /> <a href="index.php?option=configemail"><?PHP echo $language['configemail_manager']?></a>
    </div>
    <div class="control">
        <a href="index.php?option=configemail&action=add"><img alt="Add New product" src="imgs/add_.png" align="middle" border="0" /></a><span><?PHP echo $language['configemail_manager']?></span>
    </div>
    <div id="content">
        <div class="buttonUpdate">
            <input style="float:left;" type="image" src="./imgs/export2pdf.gif" onclick="mygrid.toExcel('./dhtmlx/export/pdf/generate.php');" />
			<input style="float:left;" type="image" src="./imgs/export2excel.gif" onclick="mygrid.toExcel('./dhtmlx/export/excel/generate.php');" />
        </div>
        <div class="buttonUpdate">
            <input style="float:left;" type="image" src="./imgs/refesh.gif" onclick="mygrid.clearAll(); mygrid.loadXML('./modules/Fconfigemail/configemailConnect.php');" />
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
                $getPer = $user->checkPerAdmin(array(1),'group_id',$f->decodeID($getKey['log_key_en_id'],$getKey['log_key_cv_id'],$_COOKIE['login_userid']),$_COOKIE['login_username']);
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
			mygrid.setHeader("ID,<?PHP echo $language['configemail_email']?>,<?PHP echo $language['configemail_smtp']?>, <?PHP echo $language['configemail_port']?>, <?PHP echo $language['configemail_aut']?>, <?PHP echo $language['configemail_update_date']?>, <?PHP echo $language['configemail_update_ip']?>, <?PHP echo $language['configemail_update_by']?>,<?PHP echo $language['configemail_status']?>,Action");
			mygrid.setInitWidths("40,*,120,120,120,120,150,85,80,80");
			mygrid.setColAlign("center,left,center,center,center,center,center,center,center,center");
			mygrid.setColTypes("ro,ed,ro,ro,ro,ro,ro,ed,acheck,link");
			mygrid.attachHeader("&nbsp;,#connector_text_filter,#connector_text_filter,#connector_text_filter,#connector_text_filter,#connector_text_filter,#connector_text_filter,#connector_text_filter,#connector_select_filter,&nbsp;");
			mygrid.setColSorting("connector,connector,connector,connector,connector,connector,connector,connector,connector,connector");
			mygrid.enableMultiselect(true);
			mygrid.setSkin("dhx_skyblue");
			mygrid.enableRowsHover(true,"grid_hover");
			mygrid.init();
			mygrid.enablePaging(true,50,10,"pagingArea",true);
			mygrid.setPagingSkin("bricks");
			mygrid.loadXML("./modules/Fconfigemail/configemailConnect.php");	//LOAD DATA TO GRID
			
			myDataProcessor = new dataProcessor("./modules/Fconfigemail/configemailConnect.php"); //UPDATE DATA TO GRID
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
        <a href="index.php"><?PHP echo $language['website_manager']?></a> <img src="imgs/arr_.gif" /> <a href="index.php?option=configemail"><?PHP echo $language['configemail_manager']?></a> <img src="imgs/arr_.gif" /> <?PHP echo $language['configemail_add']?>
    </div>
    <div class="control">
        <a href="index.php?option=configemail&action=add"><img alt="Add New product" src="imgs/add_.png" /></a><span><?PHP echo $language['configemail_add']?></span>
    </div>
    <div id="content">
        <form class="form" name="form_add" method="post" action="index.php?option=configemailProccess&action=add" enctype="multipart/form-data" onsubmit="return doAction()">
            <label><?PHP echo $language['configemail_email']?></label>
            <input class="input" style="WIDTH: 600px" name="email" type="text" />
            <label><?PHP echo $language['configemail_smtp']?></label>
            <input class="input" style="WIDTH: 600px" name="smtp" type="text" />
            <label><?PHP echo $language['configemail_port']?></label>
            <input class="input" style="WIDTH: 600px" name="port" type="text" />
            <label><?PHP echo $language['configemail_pass']?></label>
            <input class="input" style="WIDTH: 600px" name="pass" type="password" />
            <label><?PHP echo $language['configemail_aut']?></label>
            <input name="aut" value="auto" type="radio" /> AUTO
            <input name="aut" value="ssl" type="radio" checked="checked" /> SSL
            <input name="aut" value="tls" type="radio" /> TLS
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
	if($configemail = $configE->getARecord($id,"email_id,email_email,email_smtp,email_port,email_aut"))
?>
<div id="mainContent">
    <div class="control">
        <a href="index.php"><?PHP echo $language['website_manager']?></a> <img src="imgs/arr_.gif" /> <a href="index.php?option=configemail"><?PHP echo $language['configemail_manager']?></a> <img src="imgs/arr_.gif" /> <?PHP echo $language['configemail_update']?>
    </div>
    <div class="control">
        <a href="index.php?option=configemail&action=add"><img alt="Add New product" src="imgs/add_.png" /></a> <span><?PHP echo $language['configemail_update']?></span>
    </div>
    <div id="content">
        <form class="form" name="form_edit" method="post" action="index.php?option=configemailProccess&action=update&id=<?PHP echo $_GET['id']; ?>" enctype="multipart/form-data" onsubmit="return doAction()">
            <label><?PHP echo $language['configemail_email']?></label>
            <input class=input style="WIDTH: 600px" name="email" type="text" value="<?php echo $configE->getConfigEmail($id,'email_email') ?>" />
            <label><?PHP echo $language['configemail_smtp']?></label>
            <input class=input style="WIDTH: 600px" name="smtp" type="text" value="<?php echo $configE->getConfigEmail($id,"email_smtp"); ?>" />
            <label><?PHP echo $language['configemail_port']?></label>
            <input class=input style="WIDTH: 600px" name="port" type="text" value="<?php echo $configE->getConfigEmail($id,'email_port'); ?>" />
            <label><?PHP echo $language['configemail_pass']?></label>
            <input class=input style="WIDTH: 600px" name="pass" type="password" placeholder="Nhập mật khẩu nếu có thay đổi" />
            <label><?PHP echo $language['configemail_aut']?></label>
            <input <?php if($configE->getConfigEmail($id,'email_aut')=='auto') echo 'checked="checked"'; else echo ""; ?> name="aut" value="auto" type="radio" /> AUTO
            <input <?php if($configE->getConfigEmail($id,'email_aut')=='ssl') echo 'checked="checked"'; else echo ""; ?> name="aut" value="ssl" type="radio" /> SSL
            <input <?php if($configE->getConfigEmail($id,'email_aut')=='tls') echo 'checked="checked"'; else echo ""; ?> name="aut" value="tls" type="radio" /> TLS
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
