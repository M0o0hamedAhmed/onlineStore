<?php session_start() ;
include 'inc/header.php';
require_once 'classes/heplers/Str.php';
require_once 'classes/Product.php';
$prod = new Product;
$products = $prod->getAll();

use helpers\Str;
?>

<div class="container my-5">
  <div class="row">
<?php
    if ($products !== []) {
?>
    <?php foreach ($products as $product) {  ?>

      <div class="col-lg-4 mb-3">
        <div class="card">
          <img src="images/<?php echo $product['img'] ?>" class="card-img-top" >
          <div class="card-body">
            <h5 class="card-title"><?php echo $product['name'] ?></h5>
            <p class="card-text"><?php echo Str::limit($product['desc']) ?> </p>
            <a href="show.php?id=<?php echo $product['id'] ?>" class="btn btn-primary"> Show </a>
            <a  href="edit.php?id=<?php echo $product['id'] ?>" class="btn btn-secondary"> Edit </a>
            <a href="handlers/handleDelete.php?id=<?php echo $product['id'] ?>" class="btn btn-danger"> Delete </a>
          </div>
        </div>
      </div>

    <?php } ?>  
     <?php } else {echo "<h2 class='text-center text-danger'>No Product yet</h2>" ;} ?>
  </div>
</div>

<?php include 'inc/footer.php' ?>