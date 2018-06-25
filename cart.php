<?php include_once("config.php");include_once("functions.php");include_once("head.php");?>

<?php
if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="cart.php"</script>';
			}
		}
	}
}
?>
<content>

    <div class="conteiner">
        <div class="row justify-content-center">
            <div class="col-10 ofset-1 md-1">
                <div class="card">
                    <div class="cart-header">
                        <h2 class="text-center">Корзина</h2>
                        <hr>
                    </div>
                    <div class="card-body">

                        <?php if(!$status && !$status2)
                                {
                                  echo " <h2>Спочатку авторизуйтесь</h2>";
                                }                                   
                                else{
                            ?>

                        <div class="table-responsive" >
                            <table class="table table-bordered">
                                <tr>
                                    <th width="40%">Назва</th>
                                    <th width="10%">Кількість</th>
                                    <th width="20%">Ціна</th>
                                    <th width="15%">Загально</th>
                                    <th width="5%">Вилучити</th>
                                </tr>
                               		<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
					<tr>
						<td><?php echo $values["item_name"]; ?></td>
						<td><?php echo $values["item_quantity"]; ?></td>
						<td>$ <?php echo $values["item_price"]; ?></td>
						<td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
						<td><a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Вилучити</span></a></td>
					</tr>
					<?php
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
						}
					?>
					<tr>
						<td colspan="3" align="right">Total</td>
						<td align="right">$ <?php echo number_format($total, 2); ?></td>
						<td></td>
					</tr>
					<?php
					}
                                }?>
                         
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</content>




<?php      include_once("footer.php");    ?>