<?php include_once("header.php"); include_once("config.php");?>

<?php
    require_once("connection.php");
if ( isset( $_GET['searchbar'] ) ){
$text = $_GET['searchbar'];
    $secondcheckrow3 = 0;  $secondcheckitem3 = 0;
        debug_to_console(".$text.");
    $query5 = "SELECT * FROM photo O JOIN game I ON O.id_game = I.id_game JOIN geners P ON P.id_genres = I.id_genres where O.id_photo = 1 and(I.name LIKE '%".$text."%' or I.year LIKE '%".$text."%' or P.genr LIKE '%".$text."%');";
    $resp = mysqli_query($dbc, $query5);
    $counter = 1;
    $result = mysqli_num_rows($resp);
}
  ?>
<content>   
    
          <nav id="Search_result" class="navbar navbar-expand-lg navbar-light navbar_bg">
            <h4 class="bar">Результатів пошуку пошуку <?php echo"$result"    ?></h4>
        </nav>
   
   <div class="container-fluid h-100">
       
       
               <div id="carousel_action" class="carousel slide carousel-fade" data-ride="carousel_action">
                <div class="container">
                    <?php
                  if ($resp){
                      
                      if (mysqli_num_rows($resp) > 18) {
                          echo '<ol class="carousel-indicators">
                              <li data-target="#carousel_action" data-slide-to="0" class="active"></li>';
                            for ($i=1; $i < mysqli_num_rows($response); $i+=18){
                              echo '<li data-target="#carousel_action" data-slide-to="'.$i.'"></li>';
                            }
                              echo' </ol>';
                      } 
                      
                      echo' <div class="carousel-inner">';
                      
                      $items = 1; $rowcount = 1; $counter = 0; $active = true; $secondcheckrow = 0;  $secondcheckitem = 0;
                      while ($row = mysqli_fetch_assoc($resp)) {
                          
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
                                        
                                if ($rowcount > 6) {
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
</content>


<?php      include_once("footer.php");    ?>