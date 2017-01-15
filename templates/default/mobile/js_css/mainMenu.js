$().ready(function(){
    //Ẩn tất cả menu có class menuDropdown
    $('.menuDropdown').hide();
    //subMainMenu
	$("a.showsub").on("click", function(e) {
		$(this).parent().children("ul").slideToggle( "slow");
		return false;
	});
});
$(document).bind('click', function(event){
	if(!$(event.target).closest($('.Menu, .menuDropdown').children()).length){
		$('.menuDropdown').slideUp('slow');
	}
});
function ShowHideMainMenu(idMenu){
	$(this).addClass('active');
	$("#"+idMenu).slideToggle();
}
//Hiển thị search
function popSearch(id){
    $("#"+id).slideToggle();
}
