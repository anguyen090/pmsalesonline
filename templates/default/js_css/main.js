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
});
//LOAD MORE
$(document).ready(function(){
    //Addclass border table
	$('table[border="1"]').addClass('border');
	$('table[border="2"]').addClass('border');
	$('table[border="0"]').addClass('noborder');
    //Check uploads
    $(".fileUpload").change(function(){
        $("ul.f-upload").html('<li><input name="submit" class="btn-upload" type="submit" value="Cập nhật avatar" /></li>');
        $("ul.f-upload").css({"z-index":3});
    });
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
//Function show popup
function popupmember(type,title){
    $("h2.mem.title").html(title);
    $("."+type+"popup").fadeIn('slow');
    var wid = $("."+type+"popup").width();
    var hei = $("."+type+"popup").height();
    var popw = $("#"+type+"popupShow").width();
    var poph = $("#"+type+"popupShow").height();
    $(".popupShow").css({"margin-left":wid/2-popw/2,"margin-top":hei/2-poph/2});
}
//Function show popup edit bank
function popupshoweditbank(type,title,id,bank,name,num,branch){
    $("h2.mem.title").html(title);
    $("#eb_id").val(id);
    $("#eb_bank").val(bank);
    $("#eb_accounter").val(name);
    $("#eb_series").val(num);
    $("#eb_chinhanh").val(branch);
    $("."+type+"popup").fadeIn('slow');
    var wid = $("."+type+"popup").width();
    var hei = $("."+type+"popup").height();
    var popw = $("#"+type+"popupShow").width();
    var poph = $("#"+type+"popupShow").height();
    $(".popupShow").css({"margin-left":wid/2-popw/2,"margin-top":hei/2-poph/2});
}
//Function close
function closePopup(type){
    $("."+type+"popup").fadeOut(100);
}

