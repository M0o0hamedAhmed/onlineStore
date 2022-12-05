<?php 
session_start() ;
include 'inc/header.php';
require_once 'classes/Product.php';
$prod = new Product;
$id = $_GET['id'];
$product = $prod->getOne($id);


?>

<div class="container my-5">
    <div class="row">


        <?php
        if ($product !== Null) {
        ?>
            <div class="col-lg-6">
                <img src="images/<?php echo $product['img'] ?>" class="card-img-top">
            </div>
            <div class=" col-lg-6">

                <h5><?php echo $product['name'] ?></h5>
                <p class="text-muted"><?php echo $product['price'] ?> </p>
                <p class=""><?php echo $product['desc'] ?> </p>
                <a href="index.php" class="btn btn-primary"> Back </a>
                <a  href="edit.php?id=<?php echo $product['id'] ?>" class="btn btn-info"> Edit </a>
                <a href="handlers/handleDelete.php?id=<?php echo $product['id'] ?>" class="btn btn-danger"> Delete </a>

            </div>

        <?php
        } else {
            echo "<p>Not Found</p>";
        }
        ?>
    </div>
</div>

<?php include 'inc/footer.php' ?>