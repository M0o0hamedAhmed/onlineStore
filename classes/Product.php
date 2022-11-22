<?php

use FTP\Connection;


require_once 'Mysql.php';
class Product extends Mysql
{



    // get all  [Read]
    public function getAll()
    {

        $query = "SELECT * FROM  products";
        $result = $this->connect()->query($query);
        $products = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($products, $row);
            }
        }
        return $products;
    }



    // get one  [Read]
public function getOne($id){
$query ="SELECT * FROM products WHERE id = '$id' " ;
$result = $this->connect()->query($query) ;
$product = null ;

if($result->num_rows > 0){
    $product = $result->fetch_assoc() ;
}
return $product ;
}


 // creat  new   [Creat]
public function store(array $data){

    $query = "INSERT INTO  products (`name`,`desc`,price,img,created_at) 
             VALUES ('{$data['name']}','{$data['desc']}','{$data['price']}','{$data['img']}',CURRENT_TIME())"  ;
    $result = $this->connect()->query($query) ;
    if($result==true){
        return true ;
    } else false ;
       
} 


    // edit  [Update]
public function update($id, array $date){
$query = "UPDATE products SET
    `name` = '{$date['name']}' ,
    `desc` = '{$date['desc']}' ,
    `img` = '{$date['img']}' ,
    `price` = '{$date['price']}' 
    WHERE id = '$id'" ;

    $result = $this->connect()->query($query) ;
    if($result==true){
        return true ;   }
        else false ;

}





    // delete  [Deleted]

public function delete($id){
    $query = "DELETE FROM products WHERE id = '$id' " ;
    $result = $this->connect()->query($query) ;
    if($result==true){
        return true ;   }
        else false ;


}


}
