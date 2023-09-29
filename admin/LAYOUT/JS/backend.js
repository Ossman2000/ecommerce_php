$('input').each(function() {

if ($(this).attr('required') ==='required' ) {
	$(this).after('<span class="asterisk">*</span>');
}
});
$('.confirm').click(function(){
return confirm('sure?');


});