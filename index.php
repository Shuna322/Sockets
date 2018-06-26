<?php include_once("header.php"); include_once("config.php");?>
  <content>
    <div class="container">
      <div class="row">
        <div class="col-10 offset-1">
          <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">

              <?php
                $response = $dbh->prepare("select * from carousel");
                $response->execute();
                $counter = 1;
                  if ($response){
                    $rows = $response->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($rows as $row) {
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
                        <img class="d-block w-100" src="data:image/jpeg;base64,'.base64_encode($row["picture"]).'" alt="Slide #'.$counter.'" style="object-fit: cover" height="520">
                      </div>';
                      $counter++;
                    } else {
                      echo '<div class="carousel-item">
                      <img class="d-block w-100" src="data:image/jpeg;base64,'.base64_encode($row["picture"]).'" alt="Slide #'.$counter.'" style="object-fit: cover" height="520">
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
        <div class="row jumbotron">
          <div class="col-12 text-center h2 text-info">
            Вас це може зацікавити
          </div>
          <div class="col-12 d-flex">
            <?php
            $stmt = $dbh->prepare("SELECT good_id, good_name, good_picture, good_price FROM goods WHERE good_id = 1 OR good_id = 3 OR good_id = 5 OR good_id = 8");
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rows as $row) {
                echo '
                <div class="card border-primary m-3" style="max-width: 30rem;">

                    <a href="item.php?id='.$row['good_id'].'">
                      <img class="card-img-top img-responsive rounded" src="data:image/jpeg;base64,'.base64_encode($row["good_picture"]).'" style="object-fit: cover" height="260" >
                    </a>

                  <div class="card-header">
                  <a href="item.php?id='.$row['good_id'].'">
                   '.$row["good_name"].'
                  </a>
                  </div>
                    <div class="card-footer bg-transparent border-primary align-items-bottom">
                      <p class="card-text">Вартість: '.$row['good_price'].'₴</p>
                      <a href="#" role="button" class="btn btn-outline-success">В корзину</a>
                    </div>
                </div>
                ';
              }
             ?>
          </div>
        </div>

    </div>
  </content>

<?php include_once("footer.php");?>