<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <title>Ajout produit</title>
</head>

<body>
    <?php
        
        session_start();
        $message = (isset($_SESSION['message'])) ? $_SESSION['message'] : null;
        echo $message;
        unset($message);

        ?>
    <nav>

        <div><a href="Index.php">Index</a></div>

        <div><a href="Recap.php">Recap</a></div>

    </nav>
    
    <h1>Ajouter un produit</h1>
    <form action="traitement.php?action=addProduct" method="post">
        
        <p>
            <label>
                Nom du produit :
                <input type="text" name="name"  class="form-control">
            </label>
        </p>

        <p>
            <label>
                Prix du produit :
                <input type="number" step="any" name="price"  class="form-control">
            </label>
        </p>

        <p>
            <label>
                Quantité désirée :
                <input type="number" name="qtt" value="1"  class="form-control">
            </label>
        </p>

        <p>
            <input type="submit" name="submit" value="Ajouter le produit">
        </p>

    </form>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>