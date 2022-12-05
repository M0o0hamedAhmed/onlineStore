<?php

use helpers\Image;

require_once '../classes/Product.php';
require_once  '../classes/heplers/Image.php';
session_start();


// if user submit
if (isset($_POST['submit'])) {



$id = $_GET['id'] ;

    // Read data  from form
    $name = $_POST['name'];  // name from form
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $img =  $_FILES['image'];
    $prod = new Product;
    $product = $prod->getOne($id);
    $oldImage =  $product['img'] ;


    // if data is valid 
    if ($img['name'] ) {
        echo "hi" ;
        unlink('../images/'.$oldImage ) ;
       
        $image = new Image($img)  ;
        // store in db
      
        $data = [
            'name' => $name,
            'desc' => $desc,
            'price' => $price,
            'img' => $image->new_name
          
        ];
        $prod = new Product;
        $result = $prod->update($id,$data);

        // if Success 
        if ( $result ==true) {
            $image->upload() ;
           header('location:../show.php?id='.$id);
        }
    }else {
    
        // store in db
      
        $data = [
            'name' => $name,
            'desc' => $desc,
            'price' => $price,
            'img' => $oldImage
          
        ];

        $prod = new Product;
        $result = $prod->update($id,$data);

        // if Success 
        if ( $result ==true) {
           
            header('location:../show.php?id='.$id);
        }
    }
} 


else {

    header('location:../index.php');
}
