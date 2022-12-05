<?php
session_start();
require_once '../classes/Product.php';
require_once '../classes/heplers/Image.php';
require_once '../classes/validation/validator.php';

use helpers\Image;
use validation\Validator;



// if user submit
if (isset($_POST['submit'])) {



    // Read data  from form
    $name = $_POST['name'];  // name from form
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $img =  $_FILES['image'];


    // validation 

    $v = new Validator;
    $v->rules('name', $name, ['required', 'string', 'max:100']);
    $v->rules('desc', $desc, ['required', 'string']);
    $v->rules('price', $price, ['required', 'numeric']);
    $errors = $v->errors;






    // if data is valid 
    if ($errors == []) {


        // store in db
        $image = new Image($img);


        $data = [
            'name' => $name,
            'desc' => $desc,
            'price' => $price,
            'img' => $image->new_name
        ];
        $prod = new Product;
        $result = $prod->store($data);


        // if Success 
        if ($result == true) {
            $image->upload();

            header('location:../index.php');
        }
    }
    else{
        $_SESSION['errors'] = $errors ;
        header('location:../add.php');
    }
} else {
    
    header('location:../add.php');
}
