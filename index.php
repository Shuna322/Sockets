<?php
    require_once("connection.php");
    $query = "select * from photo where id_photo = 1";
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
    <title>KejBOOM</title>
    <link rel="icon" href="img\logo.png">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/stl.css" rel="stylesheet">
    <!-- Custom size css -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/solid.css" integrity="sha384-Rw5qeepMFvJVEZdSo1nDQD5B6wX0m7c5Z/pLNvjkB14W6Yki1hKbSEQaX9ffUbWe" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/regular.css" integrity="sha384-EWu6DiBz01XlR6XGsVuabDMbDN6RT8cwNoY+3tIH+6pUCfaNldJYJQfQlbEIWLyA" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/brands.css" integrity="sha384-VGCZwiSnlHXYDojsRqeMn3IVvdzTx5JEuHgqZ3bYLCLUBV8rvihHApoA1Aso2TZA" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/fontawesome.css" integrity="sha384-GVa9GOgVQgOk+TNYXu7S/InPTfSDTtBalSgkgqQ7sCik56N9ztlkoTr2f/T44oKV" crossorigin="anonymous">
</head>

<body class="s_layout_fixed">

    <header>
        <nav class="navbar bg-light navbar_bg" style="padding: 0px;">
            <!-- Links -->
            <ul class="navbar-nav nav-fill w-100">
                <li class="nav-item">
                    <a class="nav-link" href="#"><img src="img\logo.png" alt="Logo" class="mr-3" style="width:45px;">KejBOOM</a>
                </li>
            </ul>
        </nav>

        <!-- Navigation bar 1 -->
        <nav class="navbar navbar-expand-lg navbar_bg navbar-light sticky-top" style="padding-top:0px; padding-bottom:0px;">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon" style="color:#87888e"></span>
      </button>
            <div class="collapse navbar-collapse navbar-nav justify-content-between align-items-center align-content-center" id="navbarSupportedContent">
                <div class="nav-item dropdown mr-3 mb-1 mt-1">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
              Каталог товарів
            </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#carusel_ekshn">Екшен </a>
                        <a class="dropdown-item" href="#">Шутери</a>
                        <a class="dropdown-item" href="#">Пригоди</a>
                        <a class="dropdown-item" href="#">Інді</a>
                        <a class="dropdown-item" href="#">Симулятори </a>
                        <a class="dropdown-item" href="#">Стратегії</a>
                        <a class="dropdown-item" href="#">Спорт і гонки</a>
                        <a class="dropdown-item" href="#">Казуальні</a>
                        <a class="dropdown-item" href="#">Хоррор</a>
                        <a class="dropdown-item" href="#">Виживання</a>
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
                    <a href="" id="cart" class="nav-link">
              <i class="fa fa-shopping-cart" style="font-size:50px; color:#87888e"></i>
          </a>
                </div>
                <div class="nav-item dropdown mb-1 mt-1">
                    <a class="nav-link" href="#" id="navbardrop" data-toggle="dropdown"><i class="far fa-user" style="font-size:50px; color:#87888e"></i><div class="text-center"></div></a>
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
        <div id="carusel" class="carousel slide " data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carusel" data-slide-to="0" class="active"></li>
                <li data-target="#carusel" data-slide-to="1"></li>
                <li data-target="#carusel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="img/carousel/001.jpg" alt="GTA V">
                </div>
                <div class="carousel-item">

                    <img class="d-block w-100" src="img/carousel/002.jpg" alt="PUBG">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="img/carousel/003.jpg" alt="DIVISION">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carusel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
            <a class="carousel-control-next" href="#carusel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
        </div>

<!--       action-->
       
        <nav id="carusel_ekshn" class="navbar navbar-expand-lg navbar-light navbar_bg">
            <h4 class="bar">Eкшн</h4>

        </nav>
        

        <div class="container-fluid">
        <div id="carousel_action" class="carousel slide carousel-fade" data-ride="carousel_action">
               <?php
                  if ($response){
                    while ($row = mysqli_fetch_assoc($response)) {
                      $image=$row ['photo'];
                      if ($counter == 1){
                        // carousel counter
                        echo '<ol class="carousel-indicators">
                              <li data-target="#carousel_action" data-slide-to="0" class="active"></li>';
                            for ($i=1; $i < mysqli_num_rows($response); $i++){
                              echo '<li data-target="#carousel" data-slide-to="'.$i.'"></li>';
                            }
                              echo' </ol>
                               <div class="carousel-inner">';
                               ////////////////////////////
                      echo '<div class="carousel-item active">
                        <img class="d-block w-100" src="data:image/jpeg;base64,'.base64_encode($row["photo"]).'" alt="Slide #'.$counter.'">
                      </div>';
                      $counter++;
                    } else {
                      echo '<div class="carousel-item">
                      <img class="d-block w-100" src="data:image/jpeg;base64,'.base64_encode($row["photo"]).'" alt="Slide #'.$counter.'">
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
           
            </div>
            <a class="carousel-control-prev" href="#carousel_action" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel_action" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        <!-- Second carusel -->






    </content>


    <footer>
        <!-- Navigation bar 2 -->
        <nav class="navbar navbar-expand-lg navbar_bg">
            <!-- Links -->
            <ul class="navbar-nav nav-fill w-100">
                <li class="nav-item">
                    <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">
	Вікно
</button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                         SDXGVJK'L
                            </div>
                        </div>
                    </div>

                </li>
                <li class="nav-item">
                    <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">
	Вікно
</button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                    GDHFJGKHJL;K
                            </div>
                        </div>
                    </div>

                </li>
                <li class="nav-item">
                    <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">
	Вікно
</button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                               GDXBCNVMH,BJ
                            </div>
                        </div>
                    </div>

                </li>
                <li class="nav-item">
                    <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">
	Вікно
</button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                FVGBHNJGFKH,GL
                            </div>
                        </div>
                    </div>

                </li>
                <li class="nav-item">
                    <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">
	Вікно
</button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                           DFSDGFHGJH
                            </div>
                        </div>
                    </div>

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
