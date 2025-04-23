<?php
function cifraDeCesar($texto, $deslocamento) {
    $resultado = "";
    $texto = strtoupper($texto); // Converte para maiúsculo

    for ($i = 0; $i < strlen($texto); $i++) {
        $char = $texto[$i];

        if (ctype_alpha($char)) {
            // 'A' = 65 na tabela ASCII
            $letraCifrada = chr(((ord($char) - 65 + $deslocamento) % 26) + 65);
            $resultado .= $letraCifrada;
        } else {
            $resultado .= $char; // Mantém espaços e pontuação
        }
    }

    return $resultado;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['texto']) && isset($_POST['deslocamento'])) {
    $texto = $_POST['texto'];
    $deslocamento = intval($_POST['deslocamento']);

    if ($deslocamento < 3 || $deslocamento > 25) {
        echo "Erro: O deslocamento deve ser entre 3 e 25.";
    } else {
        $textoCifrado = cifraDeCesar($texto, $deslocamento);
        echo "<h2>Texto Cifrado:</h2><p>$textoCifrado</p>";

        // Gerar o link para a página de decifração, com o texto cifrado e o deslocamento já no link
        echo "<br><a href='decifrar.php?textoCifrado=" . urlencode($textoCifrado) . "&deslocamento=$deslocamento'>Ir para a página de Decifrar</a>";
    }
} else {
    echo "Acesse este arquivo através do formulário.";
}
?>
