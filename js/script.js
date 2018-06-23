$(document).ready(function() {
  $('#account, #accountLabel').click(function(){
    if($('#account').is(":checked")) {
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