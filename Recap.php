<?php
session_start() 
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
        if(!isset($_SESSION['products']) || empty(['products'])){
            echo "<p>Aucun produit en session...</p>";
        }
        else{         
            echo "<table>",
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
            $total_qtt = 0;
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
                $total_qtt+=$product['qtt'];
        
            }
            echo "<tr>",
                "<td colspan=4>Total général : </td>",
                "<td><strong>".number_format($totalGeneral, 2,",", "&nbsp;")."&nbsp;€</strong></td>",
                "</tr>",
                "</tbody>";

                

            
        }

        
    ?>
</body>
</html>