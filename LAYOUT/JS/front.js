$('input').each(function() {

if ($(this).attr('required') ==='required' ) {
	$(this).after('<span class="asterisk">*</span>');
}
});
$('.confirm').click(function(){
return confirm('sure?');


});

$('.login-page h1 span').click(function(){
  $(this).addClass('selected').siblings().removeClass('selected');
  console.log($(this).data('class'));
  $('.login-page form').hide();
  $('.'+$(this).data('class')).fadeIn(100);
}); 
 $('.live-name').keyup(function()){
console.log($(this.value()));
 });