<?php

include('inc/header.php');  
include('config/db.php'); 

include('inc/nav.php'); 

?>

<!-- Products Start -->
<section>
  <h2 class="text-center mt-3">OnePlus Products</h2>

  <div class="container-fluid" style="background-color: white;">
    <div class="row">

    <?php 

        $sql = "SELECT * FROM products";
        if(isset($_GET['id'])){
        $catID = $_GET['id'];
        $sql .= " WHERE cat_id = '$catID'";
        }
        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($result)) {

    ?>

          <div class="col-sm-12 col-md-4 col-lg-3 mt-4 mb-4">
            <div class="card">
              <img class="card-img" src="admin/<?php echo  $row["thumb"] ?>" alt="">
              <div class="card-body text-center">
                <h3 class="card-title"><?php echo $row["product_name"]; ?></h3>
                  <h6 class="text-warning">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                  </h6>

                <h4 class="card-text">Rs : <?php echo number_format($row["price"],2) ; ?></h4>
                  <div class="buy">
                    <a href='addToCart.php?id=<?php echo  $row["product_id"] ?>' class="btn btn-warning mt-3">
                    <i class="fas fa-cart-arrow-down"></i> Add To Cart</a>
                    <a   href='single.php?id=<?php echo  $row["product_id"] ?>' class="btn btn-info mx-4">
                        <i class="fa fa-eye"></i> View </a>
                  </div>
                  
              </div>
            </div>
          </div>
        <?php }  ?>
    </div>
  </div>
</section>
<!-- Products End -->







<?php include('inc/script.php');  ?>
<?php include('inc/footer.php');  ?>


