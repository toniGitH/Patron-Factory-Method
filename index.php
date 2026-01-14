<?php require_once 'main.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrón Factory Method - Ejemplo PHP</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Patrón Factory Method</h1>
            <div class="subtitle">Ejemplo práctico de implementación en PHP</div>
        </header>

        <section class="results-grid">
            <?php foreach ($resultados as $resultado): ?>
                <article class="card">
                    <h2><?php echo htmlspecialchars($resultado['identificación_del_pedido']); ?></h2>
                    <div class="description">
                        <?php echo htmlspecialchars($resultado['descripcion_del_pedido']); ?>
                    </div>
                    <div class="output">
                        <?php echo nl2br(htmlspecialchars($resultado['salida'])); ?>
                    </div>
                </article>
            <?php endforeach; ?>
        </section>

        <section class="advantages-section">
            <h2>Ventajas del Patrón</h2>
            <ul class="advantages-list">
                <?php foreach ($ventajas as $ventaja): ?>
                    <li><?php echo htmlspecialchars($ventaja); ?></li>
                <?php endforeach; ?>
            </ul>
        </section>
    </div>
</body>
</html>
