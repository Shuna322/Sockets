<?php include_once("header.php");?>

<content>
  <div class="container">
    <div class="row jumbotron">
      <div class="col-12 h2 text-info text-center">Кошик</div>
      <?php
			if(isset($_SESSION['shopping_cart'])){
        if (count($_SESSION['shopping_cart']) == 0)
        {
          echo '<div class="col-12 h5 text-center mt-2">Тут порожньо, додайте товару з каталогу</div>';
        }
        else
        {
        $total = 0;
          echo '<div class="col-12">
            <table class="table table-bordered table-striped table-hover">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Назва товару</th>
                  <th scope="col">Кількість</th>
                  <th scope="col">Вартість</th>
                  <th scope="col">Ціна</th>
                  <th scope="col">Дія</th>
                </tr>
              </thead>
              <tbody>';
          foreach($_SESSION["shopping_cart"] as $keys => $values)
          {
            echo '<tr>
                    <th scope="row">'.$values['item_name'].'</th>
                    <td>'.$values['item_amount'].'</td>
                    <td>'.$values['item_price'].'</td>
                    <td>'.number_format($values['item_price']*$values['item_amount'],2).'</td>
                    <td><a href="?action=delete&id='.$values['item_id'].'"><p class="text-danger text-center">Видалити</p></a></td>
                  </tr>';
            $total = $total + ($values["item_amount"] * $values["item_price"]);
          }
            echo '<tr>
  						<td colspan="3" align="right">У загальному:</td>
  						<td>'.number_format($total, 2).'</td>
  						<td><a href="confirm-order.php"><p class="text-success text-center">Купити</p></a></td>
  					</tr>
            </tbody>
            </table>';
        }
			} else echo '<div class="col-12 h5 text-center mt-2">Тут порожньо, додайте товару з каталогу</div>';
       ?>
      </div>
    </div>
  </div>
</content>


<?php include_once("footer.php"); ?>