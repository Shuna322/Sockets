<?php include_once("header.php"); include_once("config.php");?>
 <content>

   <div class="container h-100">
     <div class="row">
       <div class="col-10 offset-1">
         <div class="card align-items-center">
           <div class="card-body">
                  <div class="col-10 offset-sm-1 text-center text-primary h1">
                    Забули пароль ?
                  </div>
                  <div class="col-10 offset-sm-1 text-center text-info h4">
                    Новий пароль надійде на вказану електрону адресу ?
                  </div>
                  <form class="" action="" method="GET">
                    <input type="text" name="email" placeholder="Введіть електрону адресу." class="form-control">
                    <input type="submit" name="forgot-submit" id="forgot-submit" class="form-control btn btn-success" value="Надіслати">
                  </form>
           </div>
         </div>
       </div>
     </div>
   </div>

 </content>

 <?php
 include_once("footer.php");
 if (isset($_GET['email']) && filter_var($_GET['email'], FILTER_VALIDATE_EMAIL))
 {
   $query = "SELECT * FROM users WHERE user_email = :email";
   $email = $_GET['email'];

   $stmt = $dbh->prepare($query);
   $stmt->execute(array(':email' => $email));

   $row = $stmt->fetch(PDO::FETCH_ASSOC);

   if ($stmt->rowCount() == 1)
   {
     $result = func::generatePass();
     $msg = 'Ваш пароль було скинуто !
     Ваша електрона адреса: '.$email.'
     Ваш пароль: '.$result.'
     Заради безпеки вашого акаунта збережіть пароль і видаліть повідомлення, або змініть його в налаштуваннях профілю.
     kejBOOM';

     $stmt = $dbh->prepare("UPDATE users SET user_password = :pass WHERE user_id = :id");
     $stmt->execute(array(
      "id" => $row['user_id'],
      "pass" => md5(md5($result))
      ));

     mail($email, "Скидання паролю для облікового запису", $msg);

     echo '<script type="text/javascript">',
          'displayNotification("success", "fa fa-check-circle", "Вдало !", "Перевірте вашу електрону адресу !");',
          'setTimeout(function() {',
          '    window.location.href = "http://kejboom.ga/";',
          '  }, 2000);',
          '</script>';

   }
   else
   {
     echo '<script type="text/javascript">',
          'displayNotification("danger", "fa fa-exclamation-circle", "Помилка !\n", "Користувача з такою електроною адресоб не знайдено !");',
          '</script>';
   }
 }
 else if (isset($_GET['email']) && !filter_var($_GET['email'], FILTER_VALIDATE_EMAIL))
 {
   echo '<script type="text/javascript">',
        'displayNotification("danger", "fa fa-exclamation-circle", "Помилка !\n", "Не правильно введена електрона адреса !");',
        '</script>';
 }
  ?>