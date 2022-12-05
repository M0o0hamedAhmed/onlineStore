<?php
session_start();
include 'inc/header.php';

require_once 'classes/Product.php';

?>



<div class="container my-5">
  <div class="row">

    <?php if (isset($_SESSION['errors'])) { ?>
      <div class="alert alert-danger">
        <?php
        foreach ($_SESSION['errors'] as $error) { ?>
          <p class="text-center mb-0">
          <?php } ?>
          <?php echo $error; ?></p>

        <?php
      }
        ?>

      </div>


      <form action="handlers/handleAdd.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">

        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Desc</label>
          <input type="text" class="form-control" id="exampleInputPassword1" name="desc">
        </div>
        <div class="mb-3 ">
          <label class="form-check-label" for="exampleCheck1">Price</label>
          <input type="text" class="form-control" id="exampleInputPassword1" name="price">


        </div>
        <div class="mb-3 ">
          <input type="file" class="form-control" id="exampleInputPassword1" name="image">

          <label class="form-check-label" for="exampleCheck1">image</label>
        </div>
        <input type="submit" class="btn btn-primary" name="submit" value="Add">
      </form>




  </div>
</div>

<?php include 'inc/footer.php' ?>