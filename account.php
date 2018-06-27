<?php if (!isset($_COOKIE['userid']))
{
  header("location:index.php");
  exit;
}
include_once("header.php");

function getEmail(){
  global $dbh;
  $stmt = $dbh->prepare("SELECT * FROM users WHERE user_id = :id");
  $stmt->execute(array(':id' => $_COOKIE['userid']));
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  return $row['user_email'];
}

function isRegistred(){
  global $dbh;
  $stmt = $dbh->prepare("SELECT * FROM users WHERE user_email = :mail");
  $stmt->execute(array(':mail' => $_POST['newEmail']));
  if ($stmt->rowCount() == 1)
  {
    return true;
  } else {
    return false;
  }
}

if(isset($_POST['action']))
{
  switch ($_POST['action']) {
    case 'changePassword':
      if (strlen($_POST['newPass']) > 5)
      {
        if ($_POST['newPass'] == $_POST['newPassRepeat'])
        {
          if (isset($_POST['currentPass']))
          {
            $query = "SELECT * FROM users WHERE user_id = :id AND user_password = :password";

            $id = $_COOKIE['userid'];
            $password = md5(md5($_POST['currentPass']));

            $stmt = $dbh->prepare($query);
            $stmt->execute(array(':id' => $id,
                       ':password' => $password));

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($stmt->rowCount() == 1)
            {
              $stmt = $dbh->prepare("UPDATE users SET user_password = :pass WHERE user_id = :id");
              $stmt->execute(array(
               "id" => $_COOKIE['userid'],
               "pass" => md5(md5($_POST['newPass']))
               ));

               mail($row['user_email'], "Зміна паролю", "Ваш пароль було змінено !");

               echo '<script type="text/javascript">',
                    'displayNotification("success", "fa fa-check-circle", "Вдало !", "Пароль змінено !");',
                    '</script>';
            } else {
              echo '<script type="text/javascript">',
                   'displayNotification("danger", "fa fa-exclamation-circle", "Помилка !\n", "Текущий пароль неправильний ! Спробуйте ще раз !");',
                   '</script>';
            }
          } else {
            echo '<script type="text/javascript">',
                 'displayNotification("danger", "fa fa-exclamation-circle", "Помилка !\n", "Не введено текущий пароль !");',
                 '</script>';
          }
        } else {
          echo '<script type="text/javascript">',
               'displayNotification("danger", "fa fa-exclamation-circle", "Помилка !\n", "Пароль повторено неправильно ! Спробуйте ще раз !");',
               '</script>';
        }
      } else {
        echo '<script type="text/javascript">',
             'displayNotification("danger", "fa fa-exclamation-circle", "Помилка !\n", "Новий пароль повинен бути не меньше ніж з 6 символів !");',
             '</script>';
      }
      break;

    case 'changeEmail':
      if (filter_var($_POST['newEmail'], FILTER_VALIDATE_EMAIL))
      {
        if ($_POST['newEmail'] != getEmail())
        {
          if (!isRegistred())
          {
            if (isset($_POST['currentPass']))
            {
              $query = "SELECT * FROM users WHERE user_id = :id AND user_password = :password";

              $id = $_COOKIE['userid'];
              $password = md5(md5($_POST['currentPass']));

              $stmt = $dbh->prepare($query);
              $stmt->execute(array(':id' => $id,
                         ':password' => $password));

              $row = $stmt->fetch(PDO::FETCH_ASSOC);

              if ($stmt->rowCount() == 1)
              {
                $stmt = $dbh->prepare("UPDATE users SET user_email = :mail WHERE user_id = :id");
                $stmt->execute(array(
                 "id" => $_COOKIE['userid'],
                 "mail" => $_POST['newEmail']
                 ));

                 mail($row['user_email'], "Зміна електроної адреси", "Вашу електрону адресу було змінено !");
                 mail($_POST['newEmail'], "Зміна електроної адреси", "Підтвердження зміни електроної адреси !");

                 echo '<script type="text/javascript">',
                      'displayNotification("success", "fa fa-check-circle", "Вдало !", "Електрону адресу змінено !");',
                      '</script>';
              } else {
                echo '<script type="text/javascript">',
                     'displayNotification("danger", "fa fa-exclamation-circle", "Помилка !\n", "Текущий пароль неправильний ! Спробуйте ще раз !");',
                     '</script>';
              }
            } else {
              echo '<script type="text/javascript">',
                   'displayNotification("danger", "fa fa-exclamation-circle", "Помилка !\n", "Не ведений текущий пароль !");',
                   '</script>';
            }
          } else {
              echo '<script type="text/javascript">',
                   'displayNotification("danger", "fa fa-exclamation-circle", "Помилка !\n", "Дана електрона адреса уже зареєстрована на сайті ! Спробуйте іншу !");',
                   '</script>';
            }
          } else {
            echo '<script type="text/javascript">',
                 'displayNotification("danger", "fa fa-exclamation-circle", "Помилка !\n", "Нова електрона адреса являється текущою !");',
                 '</script>';
        }
      } else {
        echo '<script type="text/javascript">',
             'displayNotification("danger", "fa fa-exclamation-circle", "Помилка !\n", "Неправильно введена електрона адреса !");',
             '</script>';
      }
      break;
    case 'deleteAcc':
    if (isset($_POST['currentPass']))
    {
      $query = "SELECT * FROM users WHERE user_id = :id AND user_password = :password";

      $id = $_COOKIE['userid'];
      $password = md5(md5($_POST['currentPass']));

      $stmt = $dbh->prepare($query);
      $stmt->execute(array(':id' => $id,
                 ':password' => $password));

      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($stmt->rowCount() == 1)
      {
        $stmt = $dbh->prepare("DELETE from users where user_id = :id1; DELETE from sessions where session_userid = :id1");
        $stmt->execute(array(
         "id1" => $_COOKIE['userid'],
         "id2" => $_COOKIE['userid']
         ));

         mail($row['user_email'], "Акаунт видалено", "Ваш акаунт видалено !");

         echo '<script type="text/javascript">',
              'displayNotification("success", "fa fa-check-circle", "Вдало !", "Ваш аккаунт видалено !");',
              'setTimeout(function() {',
              '    window.location.href = "http://shuna.cf/logout.php/";',
              '  }, 2000);',
              '</script>';
      } else {
        echo '<script type="text/javascript">',
             'displayNotification("danger", "fa fa-exclamation-circle", "Помилка !\n", "Текущий пароль неправильний ! Спробуйте ще раз !");',
             '</script>';
      }
    } else {
      echo '<script type="text/javascript">',
           'displayNotification("danger", "fa fa-exclamation-circle", "Помилка !\n", "Не ведений текущий пароль !");',
           '</script>';
    }
      break;
  }
}
 ?>
<content>
  <div class="container">
    <div class="row jumbotron d-flex justify-content-around">
      <div class="col-12">
        <div class="accordion" id="accordionUser">
          <div class="card">
            <div class="card-header" id="headingOne">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#changePassword" aria-expanded="false" aria-controls="collapseOne">
                  Змінити пароль
                </button>
              </h5>
            </div>

            <div id="changePassword" class="collapse" aria-labelledby="changePassword" data-parent="#accordionUser">
              <div class="card-body">
                <form action="" method="post">
                  <p class="h5 text-info text-centered">Введіть новий пароль</p>
                  <input type="password" class="form-control" name="newPass">
                  <p class="h5 text-info text-centered">Повторіть новий пароль</p>
                  <input type="password" class="form-control" name="newPassRepeat">
                  <br> <br>
                  <p class="h5 text-info text-centered">Введіть текущий пароль</p>
                  <input type="password" class="form-control" name="currentPass">
                  <input type="hidden" name="action" value="changePassword">
                  <button class="btn btn-success btn-lg btn-block m-1 active" type="submit">Змінити</button>
                </form>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingTwo">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#changeEmail" aria-expanded="false" aria-controls="collapseTwo">
                  Змінити електрону адресу
                </button>
              </h5>
            </div>
            <div id="changeEmail" class="collapse" aria-labelledby="changeEmail" data-parent="#accordionUser">
              <div class="card-body">
                <form action="" method="post">
                  <p class="h5 text-info text-centered">Ваша текуща електрона адреса:</p>
                  <p class="h5 text-success text-centered"><?php
                  echo getEmail();
                  ?></p>
                  <p class="h5 text-info text-centered">Введіть нову електрону адресу</p>
                  <input type="text" class="form-control" name="newEmail">
                  <br> <br>
                  <p class="h5 text-info text-centered">Введіть текущий пароль</p>
                  <input type="password" class="form-control" name="currentPass">
                  <input type="hidden" name="action" value="changeEmail">
                  <button class="btn btn-success btn-lg btn-block m-1 active" type="submit">Змінити</button>
                </form>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingThree">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#deleteAcc" aria-expanded="false" aria-controls="collapseThree">
                  Видалити профіль
                </button>
              </h5>
            </div>
            <div id="deleteAcc" class="collapse" aria-labelledby="deleteAcc" data-parent="#accordionUser">
              <div class="card-body">
                <form action="" method="post">
                  <p class="h5 text-info text-centered">Ви дійсно хочете видалити даний аккаунт ?</p>
                  <p class="h5 text-info text-centered">Увага аккаунт відновити буде неможливо !</p>
                  <br> <br>
                  <p class="h5 text-info text-centered">Для підтвердження введіть текущий пароль</p>
                  <input type="password" class="form-control" name="currentPass">
                  <input type="hidden" name="action" value="deleteAcc">
                  <button class="btn btn-danger btn-lg btn-block m-1 active" type="submit">Видалити</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</content>
<?php include_once("footer.php"); ?>