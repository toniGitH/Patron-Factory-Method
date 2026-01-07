<?php
    require_once "main.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Factory Method - PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px 40px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .product {
            margin: 15px 0;
            padding: 15px;
            border-left: 5px solid #4CAF50;
            background-color: #f9f9f9;
            border-radius: 6px;
            font-size: 1.1rem;
        }
        .product b {
            color: #4CAF50;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Factory Method en PHP</h1>
        <div class="product">
            <b>ConcreteCreatorA:</b> <?php echo $resultA; ?>
        </div>
        <div class="product">
            <b>ConcreteCreatorB:</b> <?php echo $resultB; ?>
        </div>
    </div>
</body>
</html>
