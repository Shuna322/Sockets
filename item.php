<?php include_once("header.php");
if (!isset($_GET['id']))
{
  header("location:index.php");
}
 ?>

<content>
  <div class="container">
    <div class="row jumbotron">
      <?php
      $stmt = $dbh->prepare("SELECT * FROM goods WHERE good_id = :id");
      $
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
      foreach ($rows as $row) {
      echo '<div class="col-4">
              <img class="card-img-top img-responsive rounded img-fluid" src="data:image/jpeg;base64,'.base64_encode($row["good_picture"]).'" style="object-fit: cover" height="500" >
            </div>

          <div class="card col-8" style="width: 25rem;">
            <div class="card-body">
              <h5 class="card-title">'.$row["good_name"].'</h5>
              <h6 class="card-subtitle mb-2 text-muted">Вартість: '.$row["good_price"].'₴ за 1 шт.</h6>
              <p class="card-text">'.$row["good_description"].'</p>
              <a href="#" class="card-link">Card link</a>
              <a href="#" class="card-link">Another link</a>
            </div>
          </div>
            <div class="card-header">
            <a href="item.php?id='.$row['good_id'].'">
             '.$row["good_name"].'
            </a>
            </div>
              <div class="card-footer bg-transparent border-primary align-items-bottom">
                <p class="card-text">Вартість: '.$row['good_price'].'₴</p>
                <a href="#" role="button" class="btn btn-outline-success">В корзину</a>
              </div>
          </div>';
        }
       ?>
    </div>
  </div>
</content>

 <?php include_once("footer.php"); ?>