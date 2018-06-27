<?php include_once("config.php");include_once("functions.php");include_once("header.php");?>

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

    <div class="conteiner h-100">
        <div class="row justify-content-center h-100">
            <div class="col-10 ofset-1 md-1">
                <div class="card h-100 cartbg">
                    <div class="cart-header">
                        <h2 class="text-center" style="color:#ffffff">Корзина</h2>
                        <hr>
                    </div>
                    <div class="card-body">

                        <?php if(!$status && !$status2)
                                {
                                  echo ' <h2 style="color:#ffffff">Спочатку авторизуйтесь</h2>';
                                }                                   
                                else{
                            ?>

                        <div class="table-responsive" >
                            <table class="table table-bordered">
                                <tr  style="color:#ffffff">
                                    <th  style="color:#ffffff" width="40%">Назва</th>
                                    <th  style="color:#ffffff" width="10%">Кількість</th>
                                    <th  style="color:#ffffff" width="20%">Ціна</th>
                                    <th  style="color:#ffffff" width="15%">Загально</th>
                                    <th  style="color:#ffffff" width="5%">Вилучити</th>
                                </tr>
                               		<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
					<tr  style="color:#ffffff">
						<td  style="color:#ffffff"><?php echo $values["item_name"]; ?></td>
						<td  style="color:#ffffff"><?php echo $values["item_quantity"]; ?></td>
						<td  style="color:#ffffff">$ <?php echo $values["item_price"]; ?></td>
						<td  style="color:#ffffff">$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
						<td  style="color:#ffffff"><a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Вилучити</span></a></td>
					</tr>
					<?php
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
						}
					?>
					<tr style="color:#ffffff">
						<td style="color:#ffffff" colspan="3" align="right">Total</td>
						<td style="color:#ffffff" align="right">$ <?php echo number_format($total, 2); ?></td>
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