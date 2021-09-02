var checked = $(".colored-radio1").first();
checked.css('background',checked.attr('data-color'));

$(".colored-radio1:not(:checked)").click( function () {
  checked.css('background', 'transparent');
  checked = $(this);
  checked.css('background',checked.attr('data-color'));
});

var checked2 = $(".colored-radio2").first();
checked2.css('background',checked2.attr('data-color'));

$(".colored-radio2:not(:checked)").click( function () {
  checked2.css('background', 'transparent');
  checked2 = $(this);
  checked2.css('background',checked2.attr('data-color'));
});


var checked3 = $(".colored-radio3").first();
checked3.css('background',checked3.attr('data-color'));

$(".colored-radio3:not(:checked)").click( function () {
	checked3.css('background', 'transparent');
	checked3 = $(this);
	checked3.css('background',checked3.attr('data-color'));
});
