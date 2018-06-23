<?php
    require_once("connection.php");
if ( isset( $_GET['id'] ) ){
$id = (int)$_GET['id'];
    if ($id > 0)
    {

    $query1 = "select * from photo where id_game = ".$id;
    $query2 = "select * from game where id_game = ".$id;
    $respons = mysqli_query($dbc, $query1);
    $respon = mysqli_query($dbc, $query2);
    $counter = 1;
  
    }
}
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

        <nav class="navbar bg-light navbar_bg sticky-top" style="padding: 0px;">
            <!-- Links -->
            <ul class="navbar-nav nav-fill w-100">
                <li class="nav-item">
                    <a class="nav-link" href="index.php"><img src="img\logo.png" alt="Logo" class="mr-3" style="width:45px;">KejBOOM</a>
                </li>
            </ul>
        </nav>





        <div class="container-fluid" style="margin-top:10px">
            <div class="container">
                <div class="row">
                    <div class="col-4">
                        <?php 
                    
                    
                                 if ($respons){
                                    while ($row = mysqli_fetch_assoc($respons)) {
                                        $image=$row ['photo'];                                      
                                            echo '
                                        <img class="d-block w-100" src="data:image/jpeg;base64,'.base64_encode($row["photo"]).'" >
                                      ';
                                        $counter++;
                                        break;
                                    }
                                  }
                           ?>
                    </div>
                    <div class="col-7">
                        <div class="card box-shadow">
                              <div class="card-header">
                                <h4 class="my-0 font-weight-normal">
                                   <?php                 


                                          if ($respon){
                                            while ($row = mysqli_fetch_assoc($respon)) {
                                                $name=$row ['name'];
                                                $description=$row ['description'];
                                                $count=$row ['count'];
                                                $year=$row ['year'];
                                                $price=$row ['price'];
                                               
                                                        echo '
                                                '.$name.' 
                                              ';

                                                break;
                                            }
                                          }
                                   ?>
                                  </h4>
                              </div>
                              <div class="card-body">
                                <h1 class="card-title pricing-card-title"> 
                                    <?php          
                                          if ($respon){  echo ''.$price.'';   }
                                   ?> 
                                    <small class="text-muted">$</small></h1>
                                <ul class="list-unstyled mt-3 mb-4">
                                  <li> <?php          
                                          if ($respon){  echo 'Рік виходу:'.$year.'';   }
                                   ?>
                                    </li>
                                     <li> <?php          
                                          if ($respon){  echo 'В наявності '.$count.' одиниць';   }
                                   ?>
                                    </li>
                                  
                                </ul>
                                <button type="button" class="btn btn-lg btn-block btn-primary">Додати в корзину</button>
                                <button type="button" class="btn btn-lg btn-block btn-primary">Купити</button>
                              </div>
                        </div>
                    </div>

                </div>
            </div>


            <div class="container">

                <div id="accordion">
                    <div class="card">
                        <div class="card-header">
                            <a class="card-link" data-toggle="collapse" href="#collapseOne">
         Опис
        </a>
                        </div>
                        <div id="collapseOne" class="collapse show" data-parent="#accordion">
                            <div class="card-body">
                                <p>
                                    <?php              
                                          if ($respon){  echo ''.$description.'';   }
                                   ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                                    Скріншоти
                            </a>
                        </div>
                        <div id="collapseTwo" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <div class="container-fluid">
                                    <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel_action">
                                        <?php
                                              if ($respons){
                                                while ($row = mysqli_fetch_assoc($respons)) {
                                                  $image=$row ['photo'];
                                                  if ($counter == 2){
                                                    // carousel counter
                                                    echo '<ol class="carousel-indicators">
                                                          <li data-target="#carousel" data-slide-to="0" class="active"></li>';
                                                        for ($i=2; $i < mysqli_num_rows($respons); $i++){
                                                            $temp=$i-1;
                                                          echo '<li data-target="#carousel" data-slide-to="'.$temp.'"></li>';
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
                    <div class="card">
                        <div class="card-header">
                            <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
         Відгуки
        </a>
                        </div>
                        <div id="collapseThree" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.js"></script>
    </body>

    </html>