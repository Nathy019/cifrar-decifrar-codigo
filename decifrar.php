<?php
function decifraDeCesar($texto, $deslocamento) {
    $resultado = "";
    $texto = strtoupper($texto);

    for ($i = 0; $i < strlen($texto); $i++) {
        $char = $texto[$i];

        if (ctype_alpha($char)) {
            $letraDecifrada = chr(((ord($char) - 65 - $deslocamento + 26) % 26) + 65);
            $resultado .= $letraDecifrada;
        } else {
            $resultado .= $char;
        }
    }

    return $resultado;
}

echo '<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Decifrar</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="resultado-container">
';

if (isset($_GET['textoCifrado']) && isset($_GET['deslocamento'])) {
    $textoCifrado = $_GET['textoCifrado'];
    $deslocamento = intval($_GET['deslocamento']);
    
    echo "<h2>Texto Cifrado:</h2><p>$textoCifrado</p>";
    echo "<h3>Deslocamento Atual: $deslocamento</h3>";

    $textoDecifrado = decifraDeCesar($textoCifrado, $deslocamento);
    echo "<h2>Texto Decifrado:</h2><p>$textoDecifrado</p>";

    echo "<br><a href='formulario-cifrar.html'>CIFRAR</a>";
} else {
    echo "<p>Parâmetros de entrada não encontrados.</p>";
}

echo '
</div>
</body>
</html>';
?>
