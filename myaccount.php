<?php 
include('config/db.php');
 

include('inc/header.php');  


include('inc/nav.php'); 


?>
 
 
<div class="container my-5">
    <h2 class='text-center'>My Account</h2>

    <section id="content">
		<div class="content-blog content-account">
			<div class="container">
				<div class="row">
				 
					<div class="col-md-12">

			<h3>Recent Orders</h3>
			<br>
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>No.</th>
						<th>User Id</th>
						<th>Total Price</th>
						<th>Order Status</th>
						<th>Paymentmode</th>
						<th>Date and Time</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$c_id = $_SESSION['customerid'];

 
  
				$sql = "SELECT * FROM orders WHERE userid='$c_id'";
				$result = mysqli_query($conn, $sql);
			  
				if (mysqli_num_rows($result) > 0) {
				 // output data of each row
				 while($row = mysqli_fetch_assoc($result)) {
 			?>
					<tr>
						<td>
							<?php echo $row["id"] ?>
						</td>
						<td>
							<?php echo $row["userid"] ?>
						</td>
						<td>
							<?php echo $row["totalprice"] ?>
						</td>
						<td>
						<?php echo $row["orderstatus"] ?>
						</td>
						<td>
						<?php echo $row["paymentmode"] ?>		
						</td>
						<td>
						<?php echo $row["timestamp"] ?>		
						</td>
						<td>
							<a class="btn btn-info" href="view-order.php?id=<?php echo $row["id"] ?>">View</a> 
							<?php if($row["orderstatus"] != 'Cancelled'){ ?>
							</br>
							<a class="btn btn-danger" href="cancel-order.php?id=<?php echo $row["id"] ?>">cancel</a> 
							<?php }?>
						</td>
					</tr>
				 
			
			<?php
				}
			   } else {
				 echo "0 results";
			   }
			 
			 
			 ?>




				
				</tbody>
			</table>		

		 

			<div class="ma-address">
						<h3>My Addresses</h3>
						<p>The following addresses will be used for checkout.</p>

						<div class="row px-5 py-3">
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


