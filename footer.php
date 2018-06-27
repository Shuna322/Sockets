<?php include_once("header.php"); include_once("config.php");?>
<footer>
    <!-- Navigation bar 2 -->
    <nav class="navbar navbar-expand-lg  navbar_bg">
      
        <div class="collapse navbar-collapse navbar-nav justify-content-between align-items-center align-content-center" id="footer">
            <!-- Links -->
            <ul class="navbar-nav nav-fill w-100">
                <li class="nav-item">
                    <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#Modal1">
	Контакти
</button>
                    <div class="modal fade" id="Modal1" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                Coming soon...
                            </div>
                        </div>
                    </div>

                </li>
                <li class="nav-item">
                    <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#Modal2">
	Про магазин
</button>
                    <div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                Coming soon...
                            </div>
                        </div>
                    </div>

                </li>
                <li class="nav-item">
                    <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#Modal3">
	Повернення товару
</button>
                    <div class="modal fade" id="Modal3" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                Coming soon...
                            </div>
                        </div>
                    </div>

                </li>
                <li class="nav-item">
                    <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#Modal4">
	Гарантії
</button>
                    <div class="modal fade" id="Modal4" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                Coming soon...
                            </div>
                        </div>
                    </div>

                </li>
                <li class="nav-item">
                    <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#Modal5">
	Способи оплати
</button>
                    <div class="modal fade" id="Modal5" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                Coming soon...
                            </div>
                        </div>
                    </div>

                </li>
            </ul>
        </div>
    </nav>
</footer>

<?php
if (isset($_POST['email']) && !empty($_POST['register']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
{

  $query = "SELECT * FROM users WHERE user_email = :email";
  $email = $_POST['email'];

  $stmt = $dbh->prepare($query);
  $stmt->execute(array(':email' => $email));

  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($stmt->rowCount() == 1)
  {
    echo '<script type="text/javascript">',
         'displayNotification("danger", "fa fa-exclamation-circle", "Помилка !\n", "Користувач з такою електронною адресою уже зареєстрований!");',
         '</script>';
  }
  else
  {
    $result = func::generatePass();
    $msg = 'Дякуємо за реєстрацію на нашому сайті !
    Ваша електрона адреса: '.$_POST['email'].'
    Ваш пароль: '.$result.'
    Заради безпеки вашого акаунта збережіть пароль і видаліть повідомлення, або змініть його в налаштуваннях профілю.
    KejBOOM';
    $stmt = $dbh->prepare("INSERT INTO users(user_id, user_email, user_password)
        VALUES(NULL, :email, :pass)");
        $stmt->execute(array(
        "email" => $_POST['email'],
        "pass" => md5(md5($result)),
        ));

    mail($_POST['email'], "Реєстрація в інтернет-магазині KejBOOM", $msg);

    echo '<script type="text/javascript">',
         'displayNotification("success", "fa fa-check-circle", "Вдало !", "Перевірте вашу електрону адресу !");',
         '</script>';
  }
} else
if (isset($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
   echo '<script type="text/javascript">',
        'displayNotification("danger", "fa fa-exclamation-circle", "Помилка !\n", "Не правильно введена електрона адреса !");',
        '</script>';
 } else
 if (isset($_POST['email']) && ($_POST['password'] == '') && empty($_POST['register']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
   echo '<script type="text/javascript">',
        'displayNotification("danger", "fa fa-exclamation-circle", "Помилка !\n", "Введіть пароль !");',
        '</script>';
 }
 if (isset($_POST['email']) && isset($_POST['password']) && empty($_POST['register']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
 {
   $query = "SELECT * FROM users WHERE user_email = :email AND user_password = :password";

   $email = $_POST['email'];
   $password = md5(md5($_POST['password']));

   $stmt = $dbh->prepare($query);
   $stmt->execute(array(':email' => $email,
              ':password' => $password));

   $row = $stmt->fetch(PDO::FETCH_ASSOC);

   if ($stmt->rowCount() == 1)
   {
     echo '<script type="text/javascript">',
          'displayNotification("success", "fa fa-check-circle", "Вдало !", "Вас успішно авторизовано !");',
          '</script>';
   } else
   {
     echo '<script type="text/javascript">',
          'displayNotification("danger", "fa fa-exclamation-circle", "Помилка !\n", "Не правильно введена електрона адреса або пароль !");',
          '</script>';
   }
 }
?>


</body>

</html>