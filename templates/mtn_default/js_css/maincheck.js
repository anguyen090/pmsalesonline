//Check form liên hệ trang liên hệ
function checkContact(){
    var ct_name = $("#ct_name").val();
    var ct_email = $("#ct_email").val();
    var ct_address = $("#ct_address").val();
    var ct_phone = $("#ct_phone").val();
    var ct_content = $("#ct_content").val();
    var dataString = "ct_name="+ct_name+"&ct_email="+ct_email+"&ct_phone="+ct_phone+"&ct_address="+ct_address+"&ct_content="+ct_content+"&page=contactpage";
    var location = rootPath + "/webAction.php";
    $.ajax({
        type: 'POST',
        url: location,
        data: dataString,
        beforeSend:function(){
            $("#contact-alert").html("Đang tải...");
        },
        success: function(response){
            $("#contact-alert").fadeIn('slow').html(response);
        }
    });
    return false;
}
//Check comment
function checkComment(){
    var cmcontent   = $("#cmcontent").val();
    var cmoption    =  $("#cmoption").val();
    var cmitem      =  $("#cmitem").val();
    var dataString  = "cmcontent=" + cmcontent + "&cmoption=" + cmoption + "&cmitem=" + cmitem + "&page=comment";
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
//Check register page
function checkRegister(){
    var rgt_act = $("#rgt_action").val();
    var rgt_uname = $("#rgt_username").val();
    var rgt_upass = $("#rgt_password").val();
    var rgt_fname = $("#rgt_firstname").val();
    var rgt_lname = $("#rgt_lastname").val();
    var rgt_addr = $("#rgt_address").val();
    var rgt_email = $("#rgt_email").val();
    var rgt_phone = $("#rgt_phone").val();
    var rgt_sex = $("#rgt_sex").val();
    var rgt_date = $("#rgt_date").val();
    var rgt_month = $("#rgt_month").val();
    var rgt_year = $("#rgt_year").val();
    var dataString =    "rgt_act="+rgt_act+
                        "&rgt_uname="+rgt_uname+
                        "&rgt_upass="+rgt_upass+
                        "&rgt_fname="+rgt_fname+
                        "&rgt_lname="+rgt_lname+
                        "&rgt_addr="+rgt_addr+
                        "&rgt_email="+rgt_email+
                        "&rgt_phone="+rgt_phone+
                        "&rgt_sex="+rgt_sex+
                        "&rgt_date="+rgt_date+
                        "&rgt_month="+rgt_month+
                        "&rgt_year="+rgt_year+
                        "&page=register";
    var location = rootPath + "/webAction.php";
    $.ajax({
        type: 'POST',
        url: location,
        data: dataString,
        beforeSend:function(){
            $(".alert").html("Đang tải...");
        },
        success: function(response){
            $(".alert").fadeIn('slow').html(response);
        }
    });
    return false;
}
//Hàm check login
function checkLogin(){
    var uname = $("#login_usename").val();
    var pword = $("#login_password").val();
    var dataString = "u="+uname+"&p="+pword+"&page=login";
    var location = rootPath + "/webAction.php";
    $.ajax({
        type: 'POST',
        url: location,
        data: dataString,
        beforeSend:function(){
            $(".login-error").html("Đang tải...");
        },
        success: function(response){
            $(".login-error").fadeIn('slow').html(response);
        }
    });
    return false;
}
//Hàm check Logout
function checkLogout(){
    var dataString = "page=logout";
    var location = rootPath + "/webAction.php";
    $.ajax({
        type: 'POST',
        url: location,
        data: dataString,
        beforeSend:function(){
            $(".alert").html("Đang tải...");
        },
        success: function(response){
            $(".alert").fadeIn('slow').html(response);
        }
    });
}
//Hàm show content when click
//Function show hide content
    function showHideContent(name,icon,after,before){
        $(name+".active").show();
        $(name).slideToggle('slow',function(){
            $(name+".active").show();
        });
        $(icon).text($(icon).text() == after ? before : after); // <- HERE
    	return false;
    }
$().ready(function(){
   $("#box-show-tuts-order li.active").show();
   $("#showhide").click(function(){
        var nstring = $(this).attr('rel');
        //Cut nstring
        var plstr = nstring.split('|');
        var sname = plstr[0];
        var sicon = plstr[1];
        var safter = plstr[2];
        var sbefore = plstr[3];
        showHideContent(sname,sicon,safter,sbefore);
        return false;
   });
});
//Scroll div
function scrollDivOnWeb(div,top,topdiv,dftop){
    var lastScrollTop = 0;
    $(window).scroll(function(event){
       var st = $(this).scrollTop();
       if (st > top){
          $(div).stop().animate({"top":topdiv},1000);
       }
       else {
          $(div).stop().animate({"top":dftop},1000);
       }
       lastScrollTop = st;
    });
}
