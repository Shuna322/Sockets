<?php
    include_once("header.php");
  ?>
  
  <content>
    <div class="container">
      <div class="row">
        <div class="col-sm-10 offset-sm-1">
          <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
              <?php
                $response = $dbh->prepare("select * from carousel");
                $response->execute();
                $counter = 1;
                  if ($response){
                    $rows = $response->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($rows as $row) {
                      $image=$row['picture'];
                      if ($counter == 1){
                        // carousel counter
                        echo '<ol class="carousel-indicators">
                              <li data-target="#carousel" data-slide-to="0" class="active"></li>';
                            for ($i=1; $i < $response->rowCount(); $i++){
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
                  }
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

  <?php
      include_once("footer.php");
    ?>
