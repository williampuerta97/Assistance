<div style="width:100%">
  <img src="/img/logo.png" class="logo" style="width:10%;display:none;margin:auto">
  <h1 class="title text-center" style="font-size:60px;">Control de ingresos y salidas.</h1>
</div>

<script type="text/javascript">
  function typeEffect(element, speed) {
	var text = $(element).text();
	$(element).html('');
	
	var i = 0;
	var timer = setInterval(function() {
					if (i < text.length) {
						$(element).append(text.charAt(i));
						i++;
					} else {
						clearInterval(timer);
					}
				}, speed);
}

$( document ).ready(function() {
  var speed = 75;
  var delay = $('.title').text().length * speed + speed;
  typeEffect($('.title'), speed);
  setTimeout(function(){
    $('.logo').css('display', 'block');
    typeEffect($('.logo'), speed);
  }, delay);
});
</script>