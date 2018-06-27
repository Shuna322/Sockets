<?php include_once("header.php"); include_once("config.php");?>
  
   <?php
    require_once("connection.php");
if ( isset( $_GET['id'] ) ){
$id = (int)$_GET['id'];
    if ($id > 0)
    {

    $query1 = "select * from photo where id_game = ".$id;
    $query2 = "select * from game where id_game = ".$id;
    $respons = mysqli_query($dbc, $query1);
    $respon = mysqli_query($dbc, $query2);
    $counter = 1;
  
    }
}
  ?>
<?php
if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
           
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

?>


        <div class="container-fluid" style="margin-top:10px">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4  col-xl-4 ">
                        <?php 
                    
                    
                                 if ($respons){
                                    while ($row = mysqli_fetch_assoc($respons)) {
                                        $image=$row ['photo'];                                      
                                            echo '
                                        <img class="d-block w-100" src="data:image/jpeg;base64,'.base64_encode($row["photo"]).'" >
                                      ';
                                        $counter++;
                                        break;
                                    }
                                  }
                           ?>
                    </div>
                    <div class="col-12 col-sm-12  col-md-7 col-lg-7  col-xl-7 ">
                        <div class="card box-shadow">
                              <div class="card-header">
                                <h4 class="my-0 font-weight-normal">
                                   <?php                 


                                          if ($respon){
                                            while ($row = mysqli_fetch_assoc($respon)) {
                                                $name=$row ['name'];
                                                $description=$row ['description'];
                                                $count=$row ['count'];
                                                $year=$row ['year'];
                                                $price=$row ['price'];
                                               
                                                        echo '
                                                '.$name.' 
                                              ';

                                                break;
                                            }
                                          }
                                   ?>
                                  </h4>
                              </div>
                              <div class="card-body">
                                <h1 class="card-title pricing-card-title"> 
                                    <?php          
                                          if ($respon){  echo ''.$price.'';   }
                                   ?> 
                                    <small class="text-muted">$</small></h1>
                                <ul class="list-unstyled mt-3 mb-4">
                                  <li> <?php          
                                          if ($respon){  echo 'Рік виходу:'.$year.'';   }
                                   ?>
                                    </li>
                                     <li> <?php          
                                          if ($respon){  echo 'В наявності '.$count.' одиниць';   }
                                   ?>
                                    </li>
                                  
                             <form method="post" action="product.php?action=add&id=<?php echo $row["id_game"]; ?>">
                                            <input type="number" name="quantity" value="1" min="1" step="1" max="<?php echo $row["count"]; ?>" class="form-control" >

						                    <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" >

						                    <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" >

						                  <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Додати в козрину" />
                                    </form>
                                    
                                </ul>
<!--
                                <button type="button" class="btn btn-lg btn-block btn-primary">Додати в корзину</button>
                                <button type="button" class="btn btn-lg btn-block btn-primary">Купити</button>
                              </div>
-->
                        </div>
                    </div>

                </div>
            </div>


            <div class="container">

                <div id="accordion">
                    <div class="card">
                        <div class="card-header">
                            <a class="card-link" data-toggle="collapse" href="#collapseOne">
         Опис
        </a>
                        </div>
                        <div id="collapseOne" class="collapse show" data-parent="#accordion">
                            <div class="card-body">
                                <p>
                                    <?php              
                                          if ($respon){  echo ''.$description.'';   }
                                   ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                                    Скріншоти
                            </a>
                        </div>
                        <div id="collapseTwo" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <div class="container-fluid">
                                    <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel_action">
                                        <?php
                                              if ($respons){
                                                while ($row = mysqli_fetch_assoc($respons)) {
                                                  $image=$row ['photo'];
                                                  if ($counter == 2){
                                                    // carousel counter
                                                    echo '<ol class="carousel-indicators">
                                                          <li data-target="#carousel" data-slide-to="0" class="active"></li>';
                                                        for ($i=2; $i < mysqli_num_rows($respons); $i++){
                                                            $temp=$i-1;
                                                          echo '<li data-target="#carousel" data-slide-to="'.$temp.'"></li>';
                                                        }
                                                          echo' </ol>
                                                           <div class="carousel-inner">';
                                                           ////////////////////////////
                                                  echo '<div class="carousel-item active">

                                                    <img class="d-block w-100" src="data:image/jpeg;base64,'.base64_encode($row["photo"]).'" alt="Slide #'.$counter.'">

                                                  </div>';
                                                  $counter++;
                                                } else {
                                                  echo '<div class="carousel-item">

                                                    <img class="d-block w-100" src="data:image/jpeg;base64,'.base64_encode($row["photo"]).'" alt="Slide #'.$counter.'">

                                                  </div>';
                                                  $counter++;
                                                  }
                                                }
                                              } else {
                                                echo 'Помилка';
                                                echo mysqli_error($dbc);
                                              }
                                              mysqli_close ($dbc);
                                            ?>

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
                    <div class="card">
                        <div class="card-header">
                            <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
         Відгуки
        </a>
                        </div>
                        <div id="collapseThree" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                               coming soon...
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


</div>

<?php
      include_once("footer.php");
    ?>