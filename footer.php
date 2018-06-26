<?php include_once('header.php'); ?>
<footer>
  <div class="spacer">
    <br> <br>
  </div>

  <!-- modal blocks      modal працює не правильно знаходячись в фіксованому нав барі тому їх потрібно винести на нього-->
  <!-- block #1 -->
  <div class="modal fade" id="Delivery" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="container-fluid">
                <div class="row text-center">
                  <div class="col-12 text-primary h1">Способи доставки</div>
                </div>
                <div class="row text-center text-info h5">
                  <div class="col-6">«Нова пошта»</div>
                  <div class="col-6">Адресна доставка по Киеві и області</div>
                </div>
                <div class="row text-center text-info h5">
                  <div class="col-6">Міст Експресс</div>
                  <div class="col-6">Із виставкових залів</div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <br><br><br>
                  </div>
                </div>
                <div class="row text-center">
                  <div class="col-12 text-primary h1">Способи оплати</div>
                </div>
                <div class="row text-center text-info h5">
                  <div class="col-6">Готівка</div>
                  <div class="col-6">Visa і MasterCard</div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!-- block #2 -->
    <div class="modal fade" id="FAQ" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-12">
                    <div class="card w-100">
                      <div class="card-header" id="FAQ1">
                        <h5 class="mb-0">
                          <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Чи доставляєте Ви товари до квартири й підіймаєте на поверх?
                          </button>
                        </h5>
                      </div>
                      <div id="collapseOne" class="collapse" aria-labelledby="headingOne">
                        <div class="card-body">
                          Вартість ручного занесення в квартиру залежить від: габаритів техніки, складності підйому і наявності ліфта (куди товар поміщається в упаковці).
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="card w-100">
                        <div class="card-header" id="FAQ2">
                          <h5 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                              Чи є можливість замовити товар із доставкою в іншу країну?
                            </button>
                          </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo">
                          <div class="card-body">
                            На жаль, зараз ми працюємо тільки на території України.
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="card w-100">
                        <div class="card-header" id="FAQ3">
                          <h5 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                              Скільки днів товар знаходиться в пункті видачі?
                            </button>
                          </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree">
                          <div class="card-body">
                            У відділенні кур'єрської служби «Нова Пошта» замовлення перебуватиме упродовж 5 днів.
                            Після завершення цього терміну товар повертається відправнику.
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="card w-100">
                        <div class="card-header" id="FAQ4">
                          <h5 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                              Що робити, якщо товар було пошкоджено під час перевезення?
                            </button>
                          </h5>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour">
                          <div class="card-body">
                            У разі пошкодження товару або неповної комплектації замовлення — необхідно відмовитися від отримання товару і його оплати, а також скласти акт (претензію).
                            У разі, якщо ця ситуація станеться — просимо Вас повідомте нам неї за тел.: (044) 000-00-00, (044) 111-11-11
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    <!-- block #3 -->
    <div class="modal fade" id="garanty" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <div class="container-fluid">
                  <div class="row text-center">
                    <div class="col-12 text-primary h1">Гарантія та сервісне обслуговування</div>
                  </div>
                  <div class="row text-center text-info h4">
                    <div class="col-12">На які товари надається гарантія?</div>
                  </div>
                  <div class="row text-center text-info h5">
                    <div class="col-12">На товари в нашому магазині надається гарантія, яка підтверджує зобов'язання, що в товарі немає заводських дефектів. Гарантія надається на термін від 2 тижнів до 99 місяців залежно від сервісної політики виробника. Термін гарантії вказано в описі кожного товару на нашому сайті. Підтвердженням гарантійних зобов'язань є гарантійний талон виробника, або гарантійний талон «Sockets».</div>
                  </div>
                  <div class="row text-center text-info h5">
                    <div class="col-12">Будь ласка, перевірте комплектність і відсутність дефектів у товарі під час його отримання (комплектність визначається описом виробу або інструкцією з його експлуатації).</div>
                  </div>
                  <div class="row">
                    <div class="col-12"> <br> <br> <br> </div>
                  </div>
                  <div class="row text-center text-info h4">
                    <div class="col-12">Я можу обміняти або повернути товар?</div>
                  </div>
                  <div class="row text-center text-info h5">
                    <div class="col-12">
                      Щоб скористатися цією можливістю, будь ласка, переконайтеся, що:
                      <br> <br>
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item">товар не був у вжитку і не має слідів використання: подряпин, відколів, потертостей тощо</li>
                        <li class="list-group-item">товар повністю укомплектований і не порушена цілісність упаковки</li>
                        <li class="list-group-item">збережені всі ярлики та заводське маркування</li>
                      </ul>
                      <br> <br>
                      Якщо товар не працює, обмін або повернення товару здійснюється тільки за наявності висновку сервісного центру, авторизованого виробником, про те, що умови експлуатації не порушено.
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- block #4 -->
      <div class="modal fade" id="contacts" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-body">
                <div class="container-fluid">
                    <div class="row text-center">
                      <div class="col-12 text-primary h1">Консультації та замовлення за телефонами</div>
                    </div>
                    <div class="row text-center text-info h3">
                      <div class="col-12">(044) 000-00-00</div>
                    </div>
                    <div class="row text-center text-info h3">
                      <div class="col-12">(044) 111-11-11</div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    <!-- block #5 -->
    <div class="modal fade" id="about" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <div class="container-fluid">
                  <div class="row text-center">
                    <div class="col-12 text-primary h1">Про магазин</div>
                  </div>
                  <div class="row text-center text-info h3">
                    <div class="col-12">Тільки відкрились</div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>

  <!-- Navigation bar 2 -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-bottom">
    <!-- Links -->
    <button class="navbar-toggler center" style="width: 100%; float: none; margin-right: 0px;" data-toggle="collapse" data-target="#bottomNav" aria-controls="bottomNav" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="collapse navbar-collapse navbar-nav nav-fill w-100" id="bottomNav">
      <li class="nav-item">
        <a href="#" role="button" class="nav-link btn" data-toggle="modal" data-target="#Delivery">Доставка та оплата</a>
        <!-- <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#Delivery">Доставка та оплата</button> -->
      </li>
      <li class="nav-item">
        <a href="#" role="button" class="nav-link btn" data-toggle="modal" data-target="#FAQ">Запитання та відповіді</a>

      </li>
      <li class="nav-item">
        <a href="#" role="button" class="nav-link btn" data-toggle="modal" data-target="#garanty">Гарантія</a>
      </li>
      <li class="nav-item">
        <a href="#" role="button" class="nav-link btn" data-toggle="modal" data-target="#contacts">Контакти</a>

      </li>
      <li class="nav-item">
        <a href="#" role="button" class="nav-link btn" data-toggle="modal" data-target="#about">Про магазин</a>
      </li>
    </ul>
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
    $msg = 'Дякуємо за реєстранію на нашому сайті !
    Ваша електрона адреса: '.$_POST['email'].'
    Ваш пароль: '.$result.'
    Заради безпеки вашого акаунта збережіть пароль і видаліть повідомлення, або змініть його в налаштуваннях профілю.
    Sockets';
    $stmt = $dbh->prepare("INSERT INTO users(user_id, user_email, user_password)
        VALUES(NULL, :email, :pass)");
        $stmt->execute(array(
        "email" => $_POST['email'],
        "pass" => md5(md5($result)),
        ));

    mail($_POST['email'], "Реєстрація в інтернет-магазині Sockets", $msg);

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