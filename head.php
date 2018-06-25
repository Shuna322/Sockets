<?php include_once("functions.php"); include_once("config.php");
$status = func::checkLoginState($dbh);
if (isset($_POST['email']) && isset($_POST['password']))
{
  $status2 = true;
  $query = "SELECT * FROM users WHERE user_email = :email AND user_password = :password";

  $email = $_POST['email'];
  $password = $_POST['password'];

  $stmt = $dbh->prepare($query);
  $stmt->execute(array(':email' => $email,
             ':password' => $password));

  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($row['user_id'] > 0)
  {
    func::createRecord($dbh, $row['user_email'], $row['user_id']);
  }
}else $status2 = false;
?>


<html lang="ua">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>kejboom</title>
  <link rel="icon" href="img\logo.png">
  <!-- Bootstrap -->
  <link href="css/bootstrap.css" rel="stylesheet">
  <!-- Custom size css -->
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="/css/stl.css">
  <!-- Icon fonts -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/solid.css" integrity="sha384-Rw5qeepMFvJVEZdSo1nDQD5B6wX0m7c5Z/pLNvjkB14W6Yki1hKbSEQaX9ffUbWe" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/regular.css" integrity="sha384-EWu6DiBz01XlR6XGsVuabDMbDN6RT8cwNoY+3tIH+6pUCfaNldJYJQfQlbEIWLyA" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/brands.css" integrity="sha384-VGCZwiSnlHXYDojsRqeMn3IVvdzTx5JEuHgqZ3bYLCLUBV8rvihHApoA1Aso2TZA" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/fontawesome.css" integrity="sha384-GVa9GOgVQgOk+TNYXu7S/InPTfSDTtBalSgkgqQ7sCik56N9ztlkoTr2f/T44oKV" crossorigin="anonymous">


  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
</head>

<body  class="s_layout_fixed">
       <nav class="navbar bg-light navbar_bg" style="padding: 0px;">
                <!-- Links -->
                <ul class="navbar-nav nav-fill w-100">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php"><img src="img\logo.png" alt="Logo" class="mr-3" style="width:45px;">KejBOOM</a>
                    </li>
                </ul>
            </nav>

            <!-- Navigation bar 1 -->
            <nav class="navbar navbar-expand-lg sticky-top navbar_bg navbar-light " >
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  style="width: 100%; float: none; margin-right: 0px;" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon" style="color:#ff0000"></span>
      </button>
                <div class="collapse navbar-collapse navbar-nav justify-content-between align-items-center align-content-center" id="navbarSupportedContent">
                    <div class="nav-item dropdown mr-3 mb-1 mt-1">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
              Каталог товарів
            </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="index.php#carusel_ekshn">Екшен </a>
                            <a class="dropdown-item" href="#">Шутери</a>
                            <a class="dropdown-item" href="#">Пригоди</a>
                            <a class="dropdown-item" href="#">Інді</a>
                            <a class="dropdown-item" href="#">Симулятори </a>
                            <a class="dropdown-item" href="#">Стратегії</a>
                            <a class="dropdown-item" href="index.php#racing">Спорт і гонки</a>
                            <a class="dropdown-item" href="#">Казуальні</a>
                            <a class="dropdown-item" href="#">Хоррор</a>
                            <a class="dropdown-item" href="index.php#survival">Виживання</a>
                            <a class="dropdown-item" href="#">Відкритий світ</a>
                            <a class="dropdown-item" href="#">З сюжетом</a>
                        </div>
                    </div>
        <div class="nav-item input-group mr-3 mb-1 mt-1">
          <input type="text" class="form-control" placeholder="Пошук" aria-label="Пошук" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button">Знайти</button>
          </div>
        </div>        
        <div class="nav-item mr-3 mb-1 mt-1">
          <a href="cart.php" id="cart" class="nav-link">
              <i class="fa fa-shopping-cart" style="font-size:50px; color:#87888e"></i>
          </a>
      </div>
      <div class="nav-item mb-1 mt-1">
          <a class="nav-link" id="navbardrop" data-toggle="dropdown"><i class="far fa-user" style="font-size:50px; color:#87888e"></i></a>
          <div class="dropdown-menu dropdown-menu-right">

            <!-- ******************************************************** -->
            <div class="col-lg-12 dropdown-form-size text-center">

              <?php
              if($status)
                {
                  echo "Vu avtoruzovani ". $_SESSION['email'];
                }
                else
                {
                  if ($status2)
                  {
                    echo "Vas zaloginulu yak ".$_SESSION['email'];
                  }
                  else
                  {
                    echo '<form id="ajax-login-form" action="index.php" method="post" role="form" autocomplete="off">
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
                            <input type="checkbox" tabindex="3" name="account" id="account">
                            <label for="account" id="accountLabel">Не маєте аккаунта ?</label>
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
                              <a href="" tabindex="6" class="forgot-password">Забули пароль ?</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>';
                }
              }
               ?>
             </div>
<!-- ******************************************************** -->

        </div>
      </div>
        </div>
    </nav>
