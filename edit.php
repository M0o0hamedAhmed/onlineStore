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


  <form action="handlers/handleEdit.php?id=<?php echo $product['id'] ?>" method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label" >Name</label>
    <input value="<?php echo $product['name']?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
   
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label"  >Desc</label>
    <input value="<?php echo $product['desc']?>" type="text" class="form-control" id="exampleInputPassword1" name="desc">
  </div>
  <div class="mb-3 ">
  <label class="form-check-label" for="exampleCheck1"  >Price</label>
  <input  value="<?php echo $product['price']?>" type="text" class="form-control" id="exampleInputPassword1" name="price">

  
  </div>
  <div class="mb-3 ">
  <input type="file" class="form-control" id="exampleInputPassword1" name="image">
    <label class="form-check-label" for="exampleCheck1">image</label>
  </div>
  <input type="submit" class="btn btn-primary" name="submit" value="Edit">
</form>


   
  </div>
</div>

<?php include 'inc/footer.php' ?>