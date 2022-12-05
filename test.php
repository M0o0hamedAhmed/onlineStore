<?php


session_start() ;
include 'inc/header.php';
require_once 'classes/Product.php';
$prod = new Product ;


if(isset($_POST['submit'])){

    $img = $_FILES['img'] ; // name, tmp_name,  new_name [unique name]
    $name = $img['name'] ;
    $tmp_name = $img['tmp_name'] ;
    $ext =  pathinfo($name)['extension'] ;
    $new_name = uniqid().'.'.$ext ;
    
// upload img 
    move_uploaded_file($tmp_name,'images/'.$new_name) ;



   echo "name => ". $name ."<br/>" ;
   echo "tmp name => ".$tmp_name ."<br/>" ;
  echo "extension =>". $ext ;
  echo "new_name =>". $new_name ;

   
}

?>



<div class="container my-5">
  <div class="row">


  <form action="test.php" method="post" enctype="multipart/form-data">

  <div class="mb-3 ">
  <input type="file" class="form-control" id="exampleInputPassword1" name="img">
    <label class="form-check-label" for="exampleCheck1">image</label>
  </div>


  <input type="submit" class="btn btn-primary" name="submit" value="Add">
</form>

      

   
  </div>
</div>

<?php include 'inc/footer.php' ?>

<?php
    
// $prod->getAll()  ;
// $prod->getOne(0) ;
// $prod->store(['p','d','d.jpg','2334']) ;
// $prod->create()
//  ;var_dump( $prod->getAll() ) ;
// echo "<hr />";

// var_dump( $prod->getOne(0) ) ;
// echo "<hr />";

// echo $prod->store ([
//     'name' => 'new Product update' ,
//     'desc' => 'new Product' ,
//     'img' => '4.jpg' ,
//     'price' => 99.9 ,
// ]) ;


// echo $prod->update (1,[
//     'name' => 'new Product update' ,
//     'desc' => 'new Product' ,
//     'img' => '4.jpg' ,
//     'price' => 99.9 ,
// ]) ;
// echo $prod->delete(0) ;
// echo "<hr />";

// echo "<hr />";
// echo "<hr />";
// echo "<hr />";


?>