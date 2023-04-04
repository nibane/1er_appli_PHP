<?php
session_start();

require_once "Fonction.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Récapitulatif des produits</title>
</head>
<body>
    <nav>

        <div><a href="Index.php">Index</a></div>

        <div><a href="Recap.php">Recap</a></div>

    </nav>
    <?php 
    
        
        $symboles = (isset($_SESSION['symboles'])) ? $_SESSION['symboles'] : null;
        echo $symboles;
        unset($symboles);

        if(!isset($_SESSION['products']) || empty(['products'])){
            echo "<p>Aucun produit en session...</p>";
        }
        else{         
            echo 
                "<table>",
                    "<thead>",
                        "<tr>",
                            "<th>#</th>",
                            "<th>Nom</th>",
                            "<th>Prix</th>",
                            "<th>Quantité</th>",
                            "<th>Total</th>",
                            "<th>Action</th>",
                        "<th>",
                    "</thead>",
                    "<tbody>";
            $totalGeneral = 0;
            $tout_supprimer = 'tout supprimer';
            foreach($_SESSION['products'] as $index => $product){
                echo "<tr>",
                    "<td>".$index."</td>",
                    "<td>".$product['name']."</td>",
                    "<td>".number_format($product['price'], 2, ",","&nbsp;")."&nbsp;.€ </td>",
                    "<td><a href='traitement.php?action=baisserQtt&id=".$index."'>-</a>".$product['qtt']."<a href='traitement.php?action=augmenterQtt&id=".$index."'>+</a></td>",
                    "<td>".number_format($product['total'], 2, ",","&nbsp;")."&nbsp;.€</td>",
                    "<td></td>",
                    "</tr>";
                $totalGeneral+=$product['total'];
                
                

            }
            echo "<tr>",
                "<td colspan=4>Total général : </td>",
                "<td><strong>".number_format($totalGeneral, 2,",", "&nbsp;")."&nbsp;€</strong></td>",
                "</tr>",
                "</tbody>",
                "</table>";
            
        }

        
        echo "<a href='traitement.php?action=tout_supprimer'>vidée pagnier</a>";
    
        echo "<p>".total_qtt()."</p>";

    ?>
</body>
</html>