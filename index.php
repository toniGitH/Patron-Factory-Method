<?php require_once 'main.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrón Factory Method - Ejemplo</title>
    <link rel="stylesheet" href="estilos.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500&family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>

<div class="container">
    <header>
        <h1>Factory Method</h1>
        <p>Implementación práctica y visualización del patrón</p>
    </header>

    <div class="card-grid">
        <?php foreach ($resultados as $index => $resultado): ?>
            <div class="card">
                <div class="card-header">
                    <span class="card-icon">
                        <?php 
                        // Icono simple basado en el título
                        if (strpos($resultado['titulo'], 'coches') !== false) echo '🚗';
                        elseif (strpos($resultado['titulo'], 'motos') !== false) echo '🏍️';
                        elseif (strpos($resultado['titulo'], 'camiones') !== false) echo '🚚';
                        else echo '📦';
                        ?>
                    </span>
                    <div>
                        <h2>Ejemplo <?php echo $index + 1; ?></h2>
                    </div>
                </div>
                <p class="card-desc"><?php echo $resultado['descripcion']; ?></p>
                <div class="output-box"><?php echo htmlspecialchars($resultado['salida']); ?></div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="benefits-section">
        <h2>💡 ¿Qué ventaja aporta este patrón?</h2>
        <p>Supongamos que mañana quiero empezar a vender también <strong>autobuses</strong>...</p>
        
        <div class="benefits-list">
            <?php foreach ($ventajas as $ventaja): ?>
                <div class="benefit-item">
                    <span class="check-icon">✓</span>
                    <span><?php echo $ventaja; ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

</body>
</html>
