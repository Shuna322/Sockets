<?php include_once("header.php"); include_once("config.php");?>

<?php
  require_once("connection.php");
    $query = "SELECT * FROM photo O JOIN game I ON O.id_game = I.id_game JOIN geners P ON P.id_genres = I.id_genres where O.id_photo = 1 and P.id_genres = 1";
    $query1 = "SELECT * FROM photo O JOIN game I ON O.id_game = I.id_game JOIN geners P ON P.id_genres = I.id_genres where O.id_photo = 1 and P.id_genres = 2";
 $query2 = "SELECT * FROM photo O JOIN game I ON O.id_game = I.id_game JOIN geners P ON P.id_genres = I.id_genres where O.id_photo = 1 and P.id_genres = 3";
    $response = mysqli_query($dbc, $query);
    $response1 = mysqli_query($dbc, $query1);
    $response2 = mysqli_query($dbc, $query2);
    $counter = 1;
    $counter2 = 1;
    $counter3 = 1;
  ?>

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
                <div class="container">
                    <?php
                  if ($response){
                      
                      if (mysqli_num_rows($response) > 18) {
                          echo '<ol class="carousel-indicators">
                              <li data-target="#carousel_action" data-slide-to="0" class="active"></li>';
                            for ($i=1; $i < mysqli_num_rows($response); $i+=12){
                              echo '<li data-target="#carousel_action" data-slide-to="'.$i.'"></li>';
                            }
                              echo' </ol>';
                      } 
                      
                      echo' <div class="carousel-inner">';
                      
                      $items = 1; $rowcount = 1; $counter = 0; $active = true; $secondcheckrow = 0;  $secondcheckitem = 0;
                      while ($row = mysqli_fetch_assoc($response)) {
                          
                            if ($items == 1) {
                                echo '<div class="carousel-item '.(($active) ? 'active' : '').'">';                                
                            }
                               
                                if ($rowcount == 1) {
                                    echo '<div class="row ">';                                   
                                }
                                
                                    echo '
                                        <div class="col-2">
                                            <a href="product.php?id='.$row["id_game"].'">
                                                <img class= "d-block w-100" src="data:image/jpeg;base64,'.base64_encode($row["photo"]).'" alt="Slide #'.$counter.'">   
                                            </a>
                                    </div>';
                                    $items++; $rowcount++; $active = false; $counter++; $secondcheckitem = 0;  $secondcheckrow = 0;
                                        
                                if ($rowcount > 4) {
                                    echo '</div>';                                    
                                    $secondcheckrow = 1;
                                }
                            
                      
                            if ($items > 18) {
                                echo '</div>';

                                $secondcheckitem = 1;
                            }
                          
                        
                          
                          if ($items > 18) {
                              $items = 1;
                               
                          }
                          if ($rowcount > 6) {
                              $rowcount = 1;
                             
                          }
                           
                      }
                    
                  
                  }
      if( !$secondcheckrow)
                          {
                                 echo '</div> '; 
                            }
                          
                        if( !$secondcheckitem)
                          {
                                 echo '</div> ';

                          }
                       
                echo' </div">';
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
        </div>
        </div>




        <!-- racing -->



        <nav id="racing" class="navbar navbar-expand-lg navbar-light navbar_bg">
            <h4 class="bar">Гонки та спорт</h4>

        </nav>


        <div class="container-fluid">
            <div id="carousel_racing" class="carousel slide carousel-fade" data-ride="carousel_racing">
                <div class="container">
                    <?php
                  if ($response1){
                      
                      if (mysqli_num_rows($response1) > 18) {
                          echo '<ol class="carousel-indicators">
                              <li data-target="#carousel_racing" data-slide-to="0" class="active"></li>';
                            for ($i=1; $i < mysqli_num_rows($response1); $i+=12){
                              echo '<li data-target="#carousel_racing" data-slide-to="'.$i.'"></li>';
                            }
                              echo' </ol>';
                      } 
                      
                      echo' <div class="carousel-inner">';
                      
                      $items2 = 1; $rowcount2 = 1; $counter2 = 0; $active2 = true; $secondcheckrow2=0;  $secondcheckitem2=0;
                      while ($row2 = mysqli_fetch_assoc($response1)) {
                          
                            if ($items2 == 1) {
                                echo '<div class="carousel-item '.(($active2) ? 'active' : '').'">';
                                
                            }
                               
                                if ($rowcount2 == 1) {
                                    echo '<div class="row ">';
                                    
                                }
                                
                                    echo '
                                        <div class="col-2">
                                            <a href="product.php?id='.$row2["id_game"].'">
                                                <img class= "d-block w-100" src="data:image/jpeg;base64,'.base64_encode($row2["photo"]).'" alt="Slide #'.$counter2.'">   
                                            </a>
                                    </div>';
                                    $items2++; $rowcount2++; $active2 = false; $counter2++;$secondcheckitem2 = 0; $secondcheckrow2 = 0;
                                        
                                if ($rowcount2 > 6 ){
                                    echo '</div>';
                                       $secondcheckrow2 = 1;
                                }
                            
                      
                            if ($items2 > 18) {
                                echo '</div>';
                                 $secondcheckitem2 = 1;
                            }
                          
                          
                          
                          if ($items2 > 18) {
                              $items2 = 1;
                          }
                          if ($rowcount2 > 6) {
                              $rowcount2 = 1;
                          }
                            
                      }
                  
                    
                        
                  }
                     echo' </div">';                    
               
                    if( $secondcheckrow2 == 0)
                          {
                                 echo' </div>';
                            
                                
                          }
                          
                             if( $secondcheckitem2 == 0)
                          {
                                 echo' </div>';
                                
                          }
               ?>

                </div>
                <a class="carousel-control-prev" href="#carousel_racing" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
                <a class="carousel-control-next" href="#carousel_racing" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
            </div>
        </div>

        </div>

        <!--survival-->



        <nav id="survival" class="navbar navbar-expand-lg navbar-light navbar_bg">
            <h4 class="bar">Виживання</h4>

        </nav>


        <div class="container-fluid">
            <div id="carousel_survival" class="carousel slide carousel-fade" data-ride="carousel_survival">
                <div class="container">
                    <?php
                  if ($response2){
                      
                      if (mysqli_num_rows($response2) > 18) {
                          echo '<ol class="carousel-indicators">
                              <li data-target="#carousel_survival" data-slide-to="0" class="active"></li>';
                            for ($i=1; $i < mysqli_num_rows($response2); $i+=12){
                              echo '<li data-target="#carousel_survival" data-slide-to="'.$i.'"></li>';
                            }
                              echo' </ol>';
                      } 
                      
                      echo' <div class="carousel-inner">';
                      
                      $items3 = 1; $rowcount3 = 1; $counter3 = 0; $active3 = true; $secondcheckrow3 = 0;  $secondcheckitem3 = 0;
                      while ($row3 = mysqli_fetch_assoc($response2)) {
                          
                            if ($items3 == 1) {
                                echo '<div class="carousel-item '.(($active3) ? 'active' : '').'">';                                
                            }
                               
                                if ($rowcount3 == 1) {
                                    echo '<div class="row ">';                                   
                                }
                                
                                    echo '
                                        <div class="col-2">
                                            <a href="product.php?id='.$row3["id_game"].'">
                                                <img class= "d-block w-100" src="data:image/jpeg;base64,'.base64_encode($row3["photo"]).'" alt="Slide #'.$counter3.'">   
                                            </a>
                                    </div>';
                                    $items3++; $rowcount3++; $active3 = false; $counter3++; $secondcheckitem3 = 0;  $secondcheckrow3 = 0;
                                        
                                if ($rowcount3 > 6) {                                    echo '</div>';
                                     echo '</div>';
                                    $secondcheckrow3 = 1;
                                }
                            
                      
                            if ($items3 > 18) {
                                echo '</div>';
                               
                                $secondcheckitem3 = 1;
                            }
                          
                        
                          
                          if ($items3 >18) {
                              $items3 = 1;
                               
                          }
                          if ($rowcount3 > 6) {
                              $rowcount3 = 1;
                             
                          }
                           
                      }
                    
                      
                  }

                  if( !$secondcheckrow3)
                          {
                                 echo '</div> '; 
                            
                          }
                          
                        if( !$secondcheckitem3)
                          {
                                 echo '</div> ';
                             
                          }
                       
                echo' </div">';                    
                    ?>

                </div>
                <a class="carousel-control-prev" href="#carousel_survival" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
                <a class="carousel-control-next" href="#carousel_survival" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
            </div>

        </div>
        </div>

    </content>



    <?php
      include_once("footer.php");
    ?>
