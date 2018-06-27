<?php include_once("header.php");
if (!isset($_GET['search'])) {
  header("location:index.php");
}
?>
<content>
  <div class="container">
    <div class="row jumbotron d-flex justify-content-around">
      <div class="col-12 text-center h2 text-info ">
        Результати пошуку по запросу "<?php echo $_GET['search']; ?>"
      </div>

        <?php
        $stmt = $dbh->prepare("SELECT good_id, good_name, good_picture, good_price FROM goods WHERE good_name LIKE :text OR good_description LIKE :text");
        $stmt->execute(array(':text' => '%'.$_GET['search'].'%'));
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row) {
            echo '
            <div class="card border-primary m-3 col-12 col-sm-12 col-md-4 col-lg-3 col-xl-3" style="max-width: 14.5rem;">
                <a href="item.php?id='.$row['good_id'].'">
                  <img class="card-img-top img-responsive rounded" src="data:image/jpeg;base64,'.base64_encode($row["good_picture"]).'" style="object-fit: cover" height="260" >
                </a>
              <div class="card-header">
              <a href="item.php?id='.$row['good_id'].'">
               '.$row["good_name"].'
              </a>
              </div>
                <div class="card-footer bg-transparent border-primary align-items-bottom">
                <p class="card-text">Вартість: '.number_format($row['good_price'], 2).'₴</p>
                <form method="GET">
                <input type="hidden" name="item_amount" value="1" class="form-control">
                <input type="hidden" name="hiden_item_id" value="'.$row['good_id'].'" class="form-control">
                <input type="hidden" name="hiden_item_name" value="'.$row['good_name'].'" class="form-control">
                <input type="hidden" name="hiden_item_price" value="'.$row['good_price'].'" class="form-control">';
                if (!$row['good_amount'] = 0) {
                echo '<button class="btn btn-success" type="submit" name="add_to_cart" value="add">В корзину</button>';
              } else {
                echo '<button class="btn btn-danger" type="submit" name="add_to_cart" value="add" disabled>Закінчилися</button>';
              }
              echo '</form>
                </div>
                </div>';
        }
         ?>
    </div>
    </div>
  </div>
</content>
<?php include_once("footer.php"); ?>