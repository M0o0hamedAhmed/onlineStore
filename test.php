<?php
    
include 'classes/Product.php' ;

$prod = new Product ;
// $prod->getAll()  ;
// $prod->getOne(0) ;
// $prod->store(['p','d','d.jpg','2334']) ;
// $prod->create()
//  ;var_dump( $prod->getAll() ) ;
echo "<hr />";

// var_dump( $prod->getOne(0) ) ;
echo "<hr />";
echo $prod->update (0,[
    'name' => 'new Product update' ,
    'desc' => 'new Product' ,
    'img' => '4.jpg' ,
    'price' => 99.9 ,
]) ;
echo $prod->delete(0) ;
echo "<hr />";
echo "<hr />";
echo "<hr />";
echo "<hr />";