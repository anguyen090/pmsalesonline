<?php
    $user = new User();
?>
<div id="mainContent">
    <div class="control">
        <a href="index.php"><?PHP echo $language['website_manager']?></a> <img src="imgs/arr_.gif" /> <a href="index.php?option=comment"><?PHP echo $language['command_manager']?></a>
    </div>
    <div class="control">
        <a href="index.php?option=command&action=add"><img alt="Add New product" src="imgs/add_.png" /></a> <span><?PHP echo $language['command_manager']?></span>
    </div>
    <div id="content">
        <div class="buttonUpdate">
            <input type="image" src="./imgs/refesh.gif" onclick="mygrid.clearAll(); mygrid.loadXML('./modules/Fcomment/commentConnect.php');" />
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
			mygrid.setHeader("ID,<?PHP echo $language['comment_modules']?>,<?PHP echo $language['comment_item']?>,<?PHP echo $language['comment_content']?>,<?PHP echo $language['comment_name']?>, <?PHP echo $language['comment_update_date']?>, <?PHP echo $language['comment_update_ip']?>, <?PHP echo $language['comment_status']?>");
			mygrid.setInitWidths("40,160,160,*,120,100,85,80");
			mygrid.setColAlign("center,left,left,left,left,left,left,center");
			mygrid.setColTypes("ro,ro,ro,ro,ro,ro,ro,acheck");
			mygrid.attachHeader("&nbsp;,#connector_select_filter,#connector_text_filter,#connector_text_filter,#connector_text_filter,#connector_text_filter,#connector_text_filter,&nbsp;");
			mygrid.setColSorting("connector,connector,connector,connector,connector,connector,connector,connector");
			mygrid.enableMultiselect(true);
			mygrid.setSkin("dhx_skyblue");
			mygrid.enableRowsHover(true,"grid_hover");
			mygrid.init();
			mygrid.enablePaging(true,50,10,"pagingArea",true);
			mygrid.setPagingSkin("bricks");
			mygrid.loadXML("./modules/Fcomment/commentConnect.php");	//LOAD DATA TO GRID
			
			myDataProcessor = new dataProcessor("./modules/Fcomment/commentConnect.php"); //UPDATE DATA TO GRID
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
