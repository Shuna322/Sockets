<?php include_once("functions.php"); include_once("config.php");
$status = func::checkLoginState($dbh);
$status2 = false;
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
    func::createRecord($dbh, $row['user_email'], $row['user_id']);
    $status2 = true;
  }
}


?>
<html lang="ua">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Інтернет магазин Sockets</title>
  <link rel="icon" href="img\logo.png">
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom size css -->
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="/css/animate.css">
  <!-- Icon fonts -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/solid.css" integrity="sha384-Rw5qeepMFvJVEZdSo1nDQD5B6wX0m7c5Z/pLNvjkB14W6Yki1hKbSEQaX9ffUbWe" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/regular.css" integrity="sha384-EWu6DiBz01XlR6XGsVuabDMbDN6RT8cwNoY+3tIH+6pUCfaNldJYJQfQlbEIWLyA" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/brands.css" integrity="sha384-VGCZwiSnlHXYDojsRqeMn3IVvdzTx5JEuHgqZ3bYLCLUBV8rvihHApoA1Aso2TZA" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/fontawesome.css" integrity="sha384-GVa9GOgVQgOk+TNYXu7S/InPTfSDTtBalSgkgqQ7sCik56N9ztlkoTr2f/T44oKV" crossorigin="anonymous">
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <!-- <script src="js/bootstrap.min.js"></script> -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
  <script src="js/bootstrap-notify.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light navbar-light" style="padding: 0px;">
      <!-- Links -->
      <ul class="navbar-nav nav-fill w-100">
        <li class="nav-item">
          <a class="nav-link" href="http:\\shuna.cf\">Sockets</a>
        </li>
      </ul>
    </nav>

    <!-- Navigation bar 1 -->
    <nav class="navbar sticky-top navbar-expand-lg  bg-light navbar-light pd-1 pt-1">
      <button class="navbar-toggler center" style="width: 100%; float: none; margin-right: 0px;" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse navbar-nav justify-content-between align-items-center align-content-center" id="navbarSupportedContent">
        <div class="nav-item dropdown mr-3 mb-1 mt-1">
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
              Каталог товарів
            </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="index.php#motherboards">Материнські плати</a>
            <a class="dropdown-item" href="index.php#CPU">Процесори</a>
            <a class="dropdown-item" href="index.php#GPU">Відеокарти</a>
            <a class="dropdown-item" href="index.php#RAM">Оперативна пам'ять</a>
          </div>
        </div>
          <form action="search.php" method="get" class="nav-item input-group mr-3 mb-1 mt-1">
            <input type="text" class="form-control" name="search" placeholder="Пошук" aria-label="Пошук" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" type="submit">Знайти</button>
            </div>
          </form>
        <div class="nav-item mr-3 mb-1 mt-1">
          <a href="cart.php" id="cart" class="nav-link">
              <i class="fa fa-shopping-cart" style="font-size:50px"></i><span class="badge badge-pill badge-secondary" style="position:absolute;">
                <?php
                $itemsInCart = 0;
                if(isset($_SESSION['shopping_cart'])){
                foreach($_SESSION["shopping_cart"] as $keys => $values)
                {
                  $itemsInCart += $values['item_amount'];
                }
                if ($itemsInCart != 0) {
                  echo $itemsInCart;
                }
              } else echo $itemsInCart;?>
              </span>
          </a>
        </div>
        <div class="nav-item mb-1 mt-1 ">
          <a class="nav-link text-center" id="navbardrop" data-toggle="dropdown"><i class="far fa-user" style="font-size:50px"></i></a>
          <div class="dropdown-menu dropdown-menu-right">

            <!-- ******************************************************** -->
            <div class="col-lg-12 dropdown-form-size text-center">
              <?php
              if($status)
                {
                  echo '<div class="col-12 h5 text-centered text-info">Ви авторизовані як '.$_SESSION['email'].'</div>
                  <div class="col-12">
                    <a href="account.php" role="button" class="btn btn-primary btn-lg btn-block m-1 active">Налаштування профілю</a>
                  </div>
                  <div class="col-12">
                    <a href="logout.php" role="button" id="logout-submit" class="btn btn-danger btn-lg btn-block m-1 active">Вийти з акаунту</a>
                  </div>
                  </form>';
                }
                else
                  if ($status2){
                    echo '<div class="col-12 h5 text-centered text-info">Ви авторизовані як '.$_SESSION['email'].'</div>
                    <div class="col-12">
                      <a href="account.php" role="button" class="btn btn-primary btn-lg btn-block m-1 active">Налаштування профілю</a>
                    </div>
                    <div class="col-12">
                      <a href="logout.php" role="button" id="logout-submit" class="btn btn-danger btn-lg btn-block m-1 active">Вийти з акаунту</a>
                    </div>
                    </form>';
                  }
                  else
                  {
                    echo '<form method="post" role="form" autocomplete="off">
                      <div class="form-group">
                        <label for="email">Електрона адреса</label>
                        <input type="text" name="email" id="email" tabindex="1" class="form-control" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <label for="password">Пароль</label>
                        <input type="password" name="password" id="password" tabindex="2" class="form-control" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-lg-6">
                            <input type="checkbox" tabindex="3" name="register" id="register">
                            <label for="register" id="registerLabel">Не маєте аккаунта ?</label>
                          </div>
                          <div class="col-lg-6">
                            <input type="checkbox" tabindex="4" name="remember" id="remember">
                            <label for="remember" id="rememberLabel">Запам`ятати мене</label>
                          </div>
                          <div class="col-lg-12">
                            <input type="submit" name="login-submit" id="login-submit" tabindex="5" class="form-control btn btn-success" value="Авторизуватися">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="text-center">
                              <a href="forgot_password.php" tabindex="6" class="forgot-password">Забули пароль ?</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>';
                }
               ?>
             </div>
<!-- ******************************************************** -->

        </div>
      </div>
    </div>
    </nav>
