<?php include('inc/header.php');  ?>

<?php include('inc/nav.php');  

include('config/db.php');

if(isset($_GET['id'])){
    $product_id = $_GET['id'];
   $sql = "SELECT * FROM products  WHERE product_id='$product_id'";
   $result = mysqli_query($conn, $sql);
//    header('location:products.php');

$row = mysqli_fetch_assoc($result);

$product_name  = $row['product_name'];
$cat_id  = $row['cat_id']; 
$price  = $row['price'];
$product_description  = $row['product_description'];
$thumb  = $row['thumb'];
}


?>
 
 
 
<div class="container mt-5">
<h1 class="text-center"><u>Item Dettails</u></h1>
    <div class="row">
        <div class="card col-md-4 ">
            <img src="admin/<?php echo $thumb ?>" alt="" class='img-fluid' style='height:300px;width:320px;'>
        </div>
        
        <div class="car-body col-md-6 pt-5">
            <h3><?php echo $product_name ?></h3><br>
            <h3>Rs: <?php echo  $price ?>.00</h3><br>
            <p><?php echo $product_description ?></p>            
       
            <div class="row">
                <div class="col-md-2">Quantity:</div>
                <div class="col-md-2">
            <form action='addToCart.php'>  
                <input type="hidden" name='id' value='<?php echo  $product_id ?>'>
                <input type="number" class='form-control' name='quantity' value='1'> 
       
            </div>
   
        </div>

    <div class="row ">

    <div class="col-md-12 category">

    <?php

        $sql2 = "SELECT * FROM Category where cat_id = '$cat_id'";
        $result2 = mysqli_query($conn, $sql2); 
        // output data of each row
        $row2 = mysqli_fetch_assoc($result2)
    ?>

     <!-- Categories - <a href="index.php?id=<?php echo $cat_id ?>"><?php echo $row2["cat_name"] ?></a>    -->
                
     

            <div class="row mt-4">
                <div class="col-md-4">
                    <button  type='submit' class="btn btn-warning btn-xs pull-right"  >
                        <i class="fa fa-cart-arrow-down"></i> Add To Cart
                    </button>
                </div>
            </div>
            
            </form>


</div>
        
</div>






 





















































</div>





<?php include('inc/footer.php');  ?>



