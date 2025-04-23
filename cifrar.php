<?php
function cifraDeCesar($texto, $deslocamento) {
    $resultado = "";
    $texto = strtoupper($texto); // Converte para maiúsculo

    for ($i = 0; $i < strlen($texto); $i++) {
        $char = $texto[$i];

        if (ctype_alpha($char)) {
            $letraCifrada = chr(((ord($char) - 65 + $deslocamento) % 26) + 65);
            $resultado .= $letraCifrada;
        } else {
            $resultado .= $char; // Mantém espaços e pontuação
        }
    }

    return $resultado;
}

echo '<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Resultado da Cifra</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="resultado-container">
';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['texto']) && isset($_POST['deslocamento'])) {
    $texto = $_POST['texto'];
    $deslocamento = intval($_POST['deslocamento']);

    if ($deslocamento < 3 || $deslocamento > 25) {
        echo "<p>Erro: O deslocamento deve ser entre 3 e 25.</p>";
    } else {
        $textoCifrado = cifraDeCesar($texto, $deslocamento);
        echo "<h2>Texto Cifrado:</h2><p>$textoCifrado</p>";

        echo "<br><a href='decifrar.php?textoCifrado=" . urlencode($textoCifrado) . "&deslocamento=$deslocamento'>DECIFRAR</a>";
    }
} else {
    echo "<p>Acesse este arquivo através do formulário.</p>";
}

echo '
</div>
</body>
</html>';
?>
