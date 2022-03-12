<?php 
include('config/db.php');
 

include('inc/header.php');  


include('inc/nav.php'); 



?>
 
 
 
 
<div class="container">
    <h2 class='text-center '>My Account</h2>

    <section id="content">
		<div class="content-blog content-account">
			<div class="container">
				<div class="row">
				 
					<div class="col-md-12">

			<h3>Recent Orders</h3>
			<br>
			<table class="cart-table table-striped  table table-bordered">
				<thead>
					<tr>
						<th>Product</th>
						<th>Quantity</th>
						<th>price</th>
						<th>Total Price</th>
						
					</tr>
				</thead>
				<tbody>
				<?php
				$c_id = $_SESSION['customerid'];

				if(isset($_GET['id'])){
					$o_id = $_GET['id'];
				}


				$sql_orders = "SELECT * FROM orders WHERE id='$o_id' AND userid='$c_id'";
				$result_orders = mysqli_query($conn, $sql_orders);

				$row_orders = mysqli_fetch_assoc($result_orders);
				
				$sql = "SELECT * FROM ordersItems WHERE orderid='$o_id'";
				$result = mysqli_query($conn, $sql);
			  
				if (mysqli_num_rows($result) > 0) {
			 
				 while($row = mysqli_fetch_assoc($result)) {
                  $prodID = $row["productid"] 
 			?>
					<tr>
						<td>

                        <?php 
                        
                        $sql_product = "SELECT * FROM products  WHERE product_id='$prodID'";
                        $result_prod = mysqli_query($conn, $sql_product);
                      
                     $row_prod = mysqli_fetch_assoc($result_prod);
                     
                      
                        
                        ?>


						<a href="single.php?id=<?php echo $prodID ;?>">
						<?php echo $row_prod['product_name'];?></a>
					 
						</td>
						<td>
						<?php echo $row["quantity"] ?>
						</td>
						<td>
						<?php echo $row["productprice"] ?>		
						</td>
						<td>
						<?php echo $row["quantity"] * $row["productprice"] ?>		
						</td>
					 
					</tr>
				 
			
			<?php
				}
			   } else {
				 echo "0 results";
			   }
			 
			 
			 ?>




				
				</tbody>
                <tfooer>
					<tr>
						 
						<th></th>
						<th></th>
						<th>Total Price</th>
						<th><?php echo  $row_orders['totalprice'] ?></th>
					</tr>
                    <tr>
					 
						<th></th>
						<th></th>
						<th>Order Status</th>
						<th><?php echo  $row_orders['orderstatus'] ?></th>
					</tr>
                   
				</tfooer>
			</table>		

		 

			<div class="ma-address mt-5">
						<h3>My Addresses</h3>
						<p>The following addresses will be used for your shipping.</p>

			<div class="row  px-5 py-3">
				<div class="col-md-6">
								<h4>Billing Address <a href="update_address.php?id=<?php echo $c_id ?>">Edit</a></h4>
                                <?php  
                        $sql_add = "SELECT * FROM user_data  WHERE userid='$c_id'";
                        $result_add = mysqli_query($conn, $sql_add);
                      
                     $row_add = mysqli_fetch_assoc($result_add); 
                        echo $row_add['firstname'] ." ". $row_add['lastname'] . "<br>";
                        echo $row_add['address1'] . "<br>";
                        echo $row_add['address2'] . "<br>";
                        echo $row_add['city'] . "<br>";
                        echo $row_add['zip'] . "<br>";
                        echo $row_add['country'] . "<br>";
                        echo $row_add['mobile'] . "<br>";

                        ?>

 
				</div>

			 
			</div>



			</div>

					</div>
				</div>
			</div>
		</div>
	</section>
	
 
</div>







<?php include('inc/footer.php');  ?>


