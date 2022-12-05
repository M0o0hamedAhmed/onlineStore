<?php
    session_start() ;

    require_once '../classes/Product.php'  ;

    $id = $_GET['id'] ;

    $prod = new Product() ;



    $product =$prod->getOne($id) ;
    $img = $product['img'] ;

    unlink('../images/'.$img) ;

    $result = $prod->delete($id) ;



    if($result == true){
      
    }else{
        //header('Location: ../edit.php') ;
    }
     header('Location: ../index.php') ;
    
?>