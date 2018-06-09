<?php
    require_once("db_connect.php");
    $query = "select * from carousel";
    $response = mysqli_query($dbc, $query);
    $counter = 1;
  ?>
<!DOCTYPE html>
<html lang="ua">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Інтернет магазин Sockets</title>
  <link rel="icon" href="img\logo.png">
  <!-- Bootstrap -->
  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <!-- Custom size css -->
  <link rel="stylesheet" href="/css/style.css">
  <!-- Icon fonts -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/solid.css" integrity="sha384-Rw5qeepMFvJVEZdSo1nDQD5B6wX0m7c5Z/pLNvjkB14W6Yki1hKbSEQaX9ffUbWe" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/regular.css" integrity="sha384-EWu6DiBz01XlR6XGsVuabDMbDN6RT8cwNoY+3tIH+6pUCfaNldJYJQfQlbEIWLyA" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/brands.css" integrity="sha384-VGCZwiSnlHXYDojsRqeMn3IVvdzTx5JEuHgqZ3bYLCLUBV8rvihHApoA1Aso2TZA" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/fontawesome.css" integrity="sha384-GVa9GOgVQgOk+TNYXu7S/InPTfSDTtBalSgkgqQ7sCik56N9ztlkoTr2f/T44oKV" crossorigin="anonymous">
</head>

<body>
  <header>
    <nav class="navbar bg-light navbar-light" style="padding: 0px;">
      <!-- Links -->
      <ul class="navbar-nav nav-fill w-100">
        <li class="nav-item">
          <a class="nav-link" href="#"><img src="img\logo.png" alt="Logo" class="mr-3" style="width:45px;">Sockets</a>
        </li>
      </ul>
    </nav>

    <!-- Navigation bar 1 -->
    <nav class="navbar navbar-expand-lg bg-light navbar-light sticky-top" style="padding-top:0px; padding-bottom:0px;">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse navbar-nav justify-content-between align-items-center align-content-center" id="navbarSupportedContent">
        <div class="nav-item dropdown mr-3 mb-1 mt-1">
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
              Каталог товарів
            </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Материнські плати</a>
            <a class="dropdown-item" href="#">Процесори</a>
            <a class="dropdown-item" href="#">Відеокарти</a>
            <a class="dropdown-item" href="#">Оперативна пам'ять</a>
            <a class="dropdown-item" href="#">Системи охолодження</a>
            <a class="dropdown-item" href="#">Жорсткі диски та дискові масиви</a>
          </div>
        </div>
        <div class="nav-item input-group mr-3 mb-1 mt-1">
          <input type="text" class="form-control" placeholder="Пошук" aria-label="Пошук" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button">Знайти</button>
          </div>
        </div>
        <div class="nav-item mr-3 mb-1 mt-1">
          <a href="" id="cart" class="nav-link">
              <i class="fa fa-shopping-cart" style="font-size:50px"></i>
          </a>
        </div>
        <div class="nav-item dropdown mb-1 mt-1">
          <a class="nav-link" href="#" id="navbardrop" data-toggle="dropdown"><i class="far fa-user" style="font-size:50px"></i><div class="text-center">Вхід</div></a>
          <div class="dropdown-menu dropdown-menu-right">
            <div class="col-lg-12 dropdown-form-size text-center">
              <form id="ajax-login-form" action="" method="post" role="form" autocomplete="off">
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
                      <label for="account">Не маєте аккаунта ?</label>
                    </div>
                    <div class="col-lg-6">
                      <input type="checkbox" tabindex="4" name="remember" id="remember">
                      <label for="remember">Запам'ятати мене</label>
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
              </form>
            </div>
          </div>
        </div>
    </nav>
  </header>
  <content>
    <div class="container">
      <div class="row">
        <div class="col-sm-10 offset-sm-1">
          <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
              <?php
                  if ($response){
                    while ($row = mysqli_fetch_assoc($response)) {
                      $image=$row ['picture'];
                      if ($counter == 1){
                        // carousel counter
                        echo '<ol class="carousel-indicators">
                              <li data-target="#carousel" data-slide-to="0" class="active"></li>';
                            for ($i=1; $i < mysqli_num_rows($response); $i++){
                              echo '<li data-target="#carousel" data-slide-to="'.$i.'"></li>';
                            }
                              echo' </ol>
                               <div class="carousel-inner">';
                               ////////////////////////////
                      echo '<div class="carousel-item active">
                        <img class="d-block w-100" src="data:image/jpeg;base64,'.base64_encode($row["picture"]).'" alt="Slide #'.$counter.'">
                      </div>';
                      $counter++;
                    } else {
                      echo '<div class="carousel-item">
                      <img class="d-block w-100" src="data:image/jpeg;base64,'.base64_encode($row["picture"]).'" alt="Slide #'.$counter.'">
                      </div>';
                      $counter++;
                      }
                    }
                  } else {
                    echo 'Помилка';
                    echo mysqli_error($dbc);
                  }

                  mysqli_close ($dbc);

               ?>
              <!-- <div class="carousel-item active">
                <img class="d-block w-150" src="https://i.ytimg.com/vi/sNJOisDTYEg/maxresdefault.jpg" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-150" src="https://i.ytimg.com/vi/rhUqkd_6j3M/maxresdefault.jpg" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-150" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTSt40yn47VONeyoPmG2978v8r-wE-ElJw9oPrCGW8fA1njUZHm" alt="Third slide">
              </div> -->
            </div>
            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </content>

  <footer>
    <!-- Navigation bar 2 -->
    <nav class="navbar navbar-expand-lg bg-light">
      <!-- Links -->
      <ul class="navbar-nav nav-fill w-100">
        <li class="nav-item">
          <a class="nav-link" href="#">Доставка та оплата</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Запитання та відповіді</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Гарантія</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Контакти</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Про магазин</a>
        </li>
      </ul>
    </nav>
  </footer>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.js"></script>
</body>

</html>
