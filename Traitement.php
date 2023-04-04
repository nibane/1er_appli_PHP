<?php
session_start();
$_SESSION['message'] = "";


if (isset($_GET['action'])) {
    switch($_GET['action']){
        case "addProduct" : 
            if (isset($_POST['submit'])) {
                $_SESSION['message'] = "element ajouter";
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
                    else{
                        $_SESSION['message'] = "ERREUR";
                    }
                
            }
            break;
        case "augmenterQtt":
             if (isset($_GET['id'])&& isset($_SESSION["products"][$_GET['id']])){
                 
                 $_SESSION["products"][$_GET['id']]['qtt']++;
                 $_SESSION["products"][$_GET['id']]['total'] = $_SESSION["products"][$_GET['id']]['qtt'] * $_SESSION["products"][$_GET['id']]['price'];
                 $_SESSION['symboles'] = "produit "." ajoutée dans le pagnier";
                 
                }
                header("Location:Recap.php");
                die();
                
        case "baisserQtt":
            if (isset($_GET['id'])&& isset($_SESSION["products"][$_GET['id']])){
                        
                $_SESSION["products"][$_GET['id']]['qtt']--;
                $_SESSION["products"][$_GET['id']]['total'] = $_SESSION["products"][$_GET['id']]['qtt'] * $_SESSION["products"][$_GET['id']]['price'];
                $_SESSION['symboles'] = "produit retirée du pagnier";
            }
                header("Location:Recap.php");
                die();
                    
                    
                    
    }
}
                
                

                
                header("Location:index.php");
                
                