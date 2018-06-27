<?php include_once("header.php");
if (!isset($_GET['id']) && !isset($_GET['add_to_cart']))
{
  header("location:index.php");
}
 ?>

<content>
  <div class="container">
    <div class="row jumbotron">
      <?php
      $stmt = $dbh->prepare("SELECT * FROM goods WHERE good_id = :id");
      $stmt->execute(array(':id' => $_GET['id']));

      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
      foreach ($rows as $row) {
      echo '<div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 p-0">
              <img class="card-img-top img-responsive rounded img-fluid" src="data:image/jpeg;base64,'.base64_encode($row["good_picture"]).'" style="object-fit: cover" max-height="500" >
            </div>

          <div class="card col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8" style="width: 25rem;">
            <div class="card-body">
              <h5 class="card-title">'.$row["good_name"].'</h5>
              <h6 class="card-subtitle mb-2 text-muted">Вартість: '.number_format($row["good_price"], 2).'₴ за 1 шт.</h6>
              <p class="card-text">'.$row["good_description"].'</p>
            </div>
            <div class="card-footer align-items-bottom">
            <div class="container-fluid">
            <div class="row">
             <div class="col-12">
             <p class="text-primary h4">';
             if ($row['good_amount'] == 0 ) { echo "Закінчилися"; } else if ($row['good_amount'] > 0 && $row['good_amount'] < 10) { echo "Закінчуються"; } else if ( $row['good_amount'] > 10 ) { echo "В наявності"; }
             echo '</p>
             </div>
            </div>
            <div class="row">
             <div class="col-12">
             <form method="GET">';
             if ($row['good_amount'] == 0 ) {
               echo '<div class="input-group">
                      <input type="number" name="item_amount" value="1" min="1" step="1" max="'.$row['good_amount'].'" class="form-control" disabled>
                        <div class="input-group-append">
                          <button class="btn btn-success" type="button" disabled>Добавити в корзину</button>
                        </div>
                    </div>';
             } else
             echo '<div class="input-group">
                    <input type="number" name="item_amount" value="1" min="1" step="1" max="'.$row["good_amount"].'" class="form-control">
                    <input type="hidden" name="hiden_item_id" value="'.$row['good_id'].'" class="form-control">
                    <input type="hidden" name="id" value="'.$row['good_id'].'" class="form-control">
                    <input type="hidden" name="hiden_item_name" value="'.$row['good_name'].'" class="form-control">
                    <input type="hidden" name="hiden_item_price" value="'.$row['good_price'].'" class="form-control">

                      <div class="input-group-append">
                        <button class="btn btn-success" type="submit" name="add_to_cart" value="add">Добавити в корзину</button>
                      </div>
                  </div>';
            echo '</form>
            </div>
            </div>
            </div>
            </div>
          </div>';

        }
       ?>
    </div>
  </div>
</content>

 <?php include_once("footer.php"); ?>