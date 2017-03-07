/*弹出定位*/
function PopUp(pclass,tclass){
	$(function(){
		var left=(parseInt($(window).width())-parseInt($(pclass).css('width')))/2;
		var top=(parseInt($(window).height())-parseInt($(pclass).css('height')))/2;
		$(pclass).css({'top':top+'px','left':left+'px'});
		$(pclass).children('.pop-head').children('.close').click(function(){
			$(this).closest('#mask').fadeOut(300);
			a=setTimeout(function(){
				$('.pop-up-box').hide();
			},300);
		});
		$(pclass).children('.pop-foot').children('.for-align').children('.cancel').click(function(){
			$(pclass).children('.pop-head').children('.close').click();
		});
		if(tclass){
			$(tclass).click(function(){
				$(pclass).show();
				$('#mask').fadeIn(300);
			});
		}

	});
}
$(function(){
		$('.pop-head .close').click(function(){
			$(this).closest("#mask").fadeOut(300);
		});
})
