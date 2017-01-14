function loadUserList(id,dataString){
    //var rootpath = 'http://myproject.net/adm';
    var location = rootpath + "/modules/Dnoidung/userlist.php";
    $.ajax({
        type: 'POST',
        url: location,
        data: dataString,
        beforeSend:function(){
            $(id).html("Đang tải...");
        },
        success: function(response){
            $(id).fadeIn('slow').html(response);
        }
    });
    return false;
}
//Hàm này load khi change
function loadShowInfoUser(stas,divUInfo,dataString){
    var chstas = $(stas).val();
    if(chstas=="protected"){
        loadUserList(divUInfo,dataString);
    }
};