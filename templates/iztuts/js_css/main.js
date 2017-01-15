//jQuery.editable
$(function() {    
  $(".editable_select").editable("<?php print $url ?>save.php", { 
    indicator : '<img src="img/indicator.gif">',
    data   : "{'Lorem ipsum':'Lorem ipsum','Ipsum dolor':'Ipsum dolor','Dolor sit':'Dolor sit'}",
    type   : "select",
    submit : "OK",
    style  : "inherit",
    submitdata : function() {
      return {id : 2};
    }
  });
  $(".editable_select_json").editable("<?php print $url ?>save.php", { 
    indicator : '<img src="img/indicator.gif">',
    loadurl : "<?php print $url ?>json.php",
    type   : "select",
    submit : "OK",
    style  : "inherit"
  });
  $(".editable_textarea").editable("", { 
      indicator : "<img src='img/indicator.gif'>",
      type   : 'textarea',
      submitdata: { _method: "put" },
      select : true,
      submit : 'OK',
      cancel : 'cancel',
      cssclass : "editable"
  });
  $(".editable_textile").editable("<?php print $url ?>save.php?renderer=textile", { 
      indicator : "<img src='img/indicator.gif'>",
      loadurl   : "<?php print $url ?>load.php",
      type      : "textarea",
      submit    : "OK",
      cancel    : "Cancel",
      tooltip   : "Click to edit..."
  });
  
  $(".click").editable("<?php print $url ?>echo.php", { 
      indicator : "<img src='img/indicator.gif'>",
      tooltip   : "Click to edit...",
	  submit    : "Lưu lại",
      cancel    : "Cancel",
      style  : "inherit"
  });
  $(".dblclick").editable("<?php print $url ?>echo.php", { 
      indicator : "<img src='img/indicator.gif'>",
      tooltip   : "Doubleclick to edit...",
      event     : "dblclick",
      style  : "inherit"
  });
  $(".mouseover").editable("<?php print $url ?>echo.php", { 
      indicator : "<img src='img/indicator.gif'>",
      tooltip   : "Move mouseover to edit...",
      event     : "mouseover",
      style  : "inherit"
  });
  
  /* Should not cause error. */
  $("#nosuch").editable("<?php print $url ?>echo.php", { 
      indicator : "<img src='img/indicator.gif'>",
      type   : 'textarea',
      submit : 'OK'
  });

});
//Function view more slide news order
$(document).ready(function(){
   var but = $(".button-viewmore");
   var box = $("#newsOrder");
   
   but.click(function(){
        var news = $("#newsOrder .order-news:first-child");
        news.hide("fast","linear",function(){
            box.append($(this));
            $(this).css("display","block");
        });
   });
   
});
//Function checklogin
function checkLogin(){
    var uname = $("#username").val();
    var pword = $("#password").val();
    var dataString = "username=" + uname + "&password=" + pword + "&page=login";
    var location = rootPath + "/webAction.php";
    $.ajax({
        type: "POST",
        url: location,
        data: dataString,
        cache: false,
        beforeSend: function()
        {
            $(".container").html("<br clear='all'><center><div>Đang tải...</div></center<br clear='all'>");
        },
        success: function(response)
        {
            $(".container").hide().fadeIn('slow').html(response);
        }
    });
    return false;
}
//Xử lý logout website
$(document).ready(function(){
   $("#logout").click(function(){
        var dataString = "&page=logout";
        var location = rootPath + "/webAction.php";
        $.ajax({
            type: "POST",
            url: location,
            data: dataString,
            cache: false,
            beforeSend: function()
            {
                $(".container").html("<br clear='all'><center><div>Đang tải...</div></center<br clear='all'>");
            },
            success: function(response)
            {
                $(".container").hide().fadeIn('slow').html(response);
            }
        });
        return false;
   });
   $("a#web-like-add").click(function(){
        var likecutstra = $(this).attr("alt");
    	var likevara = likecutstra.split("|");
    	var addUserID = likevara[0];
    	var addContentID = likevara[1];
        var dataString = "addUserID=" + addUserID + "&addContentID=" + addContentID + "&page=addlike";
        var location = rootPath + "/webAction.php";
        console.log(addUserID + '-' + addContentID);
        $.ajax({
            type: "POST",
            url: location,
            data: dataString,
            cache: false,
            beforeSend: function()
            {
                $(".container").html("<br clear='all'><center><div>Đang tải...</div></center<br clear='all'>");
            },
            success: function(response)
            {
                $(".container").hide().fadeIn('slow').html(response);
            }
        });
        return false;
   });
   $("a#web-like-update").click(function(){
        var likecutstre = $(this).attr("alt");
    	var likevare = likecutstre.split("|");
    	var editUserID = likevare[0];
    	var editContentID = likevare[1];
        var dataString = "editUserID=" + editUserID + "&editContentID=" + editContentID + "&page=updatelike";
        var location = rootPath + "/webAction.php";
        $.ajax({
            type: "POST",
            url: location,
            data: dataString,
            cache: false,
            beforeSend: function()
            {
                $(".container").html("<br clear='all'><center><div>Đang tải...</div></center<br clear='all'>");
            },
            success: function(response)
            {
                $(".container").hide().fadeIn('slow').html(response);
            }
        });
        return false;
   });
});
$(document).ready(function () {
	$.ionTabs("#tabPaneProducts, #tabHotNew ,#tab1, #tab2", {
		type: "none"
	});
	$("select.cSelect").each(function() {					
			var sb = new SelectBox({
			selectbox: $(this),
			height: 150,
			width: 160
		});
	});	
//LOAD MORE
$("#loadmore").on("click", function(e) {
	var nstr = $(this).attr("alt");
	var altvar = nstr.split("|");
	var IDShow = altvar[0];
	var optionShow = altvar[1];
	var typeID = altvar[2];
	var starShow = parseInt(altvar[3]);
	var soluongShow = parseInt(altvar[4]);
	$("#loadmore span").html("<img style=\'vertical-align:center;\' src=\'"+rootPath+Templates+"/js_css/images/loadmore.gif\' alt=\'\'/>");
	$.ajax({
		type: "POST",
		url: rootPath+"/ajaxLoadContent.php",
		data: { option: optionShow, typeID: typeID, starShow: starShow, soluongShow: soluongShow}, 
		success: function(data)
		{
			$("#loadmore").attr("alt",IDShow+"|"+optionShow+"|"+typeID+"|"+(starShow+soluongShow)+"|"+soluongShow);
			$("#"+IDShow).append(data);
		
			$("#loadmore span").html("");
		}
	});
	
	return false;
});			



});

//--------------------------------------------------------------------------------------------
	//Auto Resize Image
	//Script Images Resize
	SMR_confMaxDim = 700; // pixels
	function SMR_resize(obj) {
		thisWidth = obj.width;
	    thisHeight = obj.height;
	   
	   if(thisWidth > thisHeight) thisMaxDim = thisWidth;
	   else thisMaxDim = thisHeight;
	   
	   if(thisMaxDim > SMR_confMaxDim) {
		  thisMinDim = Math.round((((thisWidth > thisHeight)?thisHeight:thisWidth) * SMR_confMaxDim) / thisMaxDim); 
		  
		  if(thisWidth > thisHeight) {
			 thisWidth = SMR_confMaxDim;
			 thisHeight = thisMinDim;
		  } else {
			 thisHeight = SMR_confMaxDim;
			 thisWidth = thisMinDim;
		  }
	   } // if(thisMaxDim > SMR_confMaxDim)
		obj.height = thisHeight;
	    obj.width = thisWidth;
	}
	function SMR_setLink(obj) {
	   thisInnerHtml = obj.innerHTML;
	   tmpArray = thisInnerHtml.split(' src=\"');
	   tmpArray = tmpArray[1].split('"');
	   obj.href = tmpArray[0];
	}
//--------------------------------------------------------------------------------------------
function ChangeTemplate(templateName)
{
	$.cookie("templates", templateName, { expires: 7, path: "/" });
	window.location.reload();
	return false;
}

