<?php
session_start();


if (isset($_GET['action'])) {
    switch($_GET['action']){
        case "addProduct" : 
            
            if (isset($_POST['submit'])) {

                $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
                $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);

                if ($name && $price && $qtt) {

                    $product = [
                        "name" => $name,
                        "price" => $price,
                        "qtt" => $qtt,
                        "total" => $price * $qtt,
                    ];

                    $_SESSION["products"][] = $product;
                }

            }
        break;
        case "augmenterQtt":
            if (isset($_GET['id'])&& isset($_SESSION["products"][$_GET['id']])){

                $_SESSION["products"][$_GET['id']]['qtt']++;
                $_SESSION["products"][$_GET['id']]['total'] = $_SESSION["products"][$_GET['id']]['qtt'] * $_SESSION["products"][$_GET['id']]['price'];

            }
            header("Location:Recap.php");
            die();

        case "baisserQtt":
            if (isset($_GET['id'])&& isset($_SESSION["products"][$_GET['id']])){
            
                $_SESSION["products"][$_GET['id']]['qtt']--;
                $_SESSION["products"][$_GET['id']]['total'] = $_SESSION["products"][$_GET['id']]['qtt'] * $_SESSION["products"][$_GET['id']]['price'];
            }
            header("Location:Recap.php");
            die();
            
        
            
        }}



$_SESSION['Message'] = "sdfqdsf"

header("Location:index.php");
