$(document).ready(function() {
  $('#register, #registerLabel').click(function() {
    if ($('#register').is(":checked")) {
      $('#password').prop("disabled", true);
      $('#remember').prop("disabled", true);
      $('#login-submit').prop("value", "Зареєструватися");
    } else {
      $('#password').prop("disabled", false);
      $('#remember').prop("disabled", false);
      $('#login-submit').prop("value", "Авторизуватися");
    }
  });
});

function displayNotification(_type, _icon, _title, _message) {
  $.notify({
	// options
	icon: _icon,
	title: _title,
	message: _message,
},{
	// settings
	type: _type,
  delay: 5000,
  timer: 1000,
  mouse_over: true,
  animate: {
  enter: 'animated fadeInDown',
  exit: 'animated fadeOutUp'
  }
});
}