<?php
function decifraDeCesar($texto, $deslocamento) {
    $resultado = "";
    $texto = strtoupper($texto);

    for ($i = 0; $i < strlen($texto); $i++) {
        $char = $texto[$i];

        if (ctype_alpha($char)) {
            // Desloca para trás no alfabeto
            $letraDecifrada = chr(((ord($char) - 65 - $deslocamento + 26) % 26) + 65);
            $resultado .= $letraDecifrada;
        } else {
            $resultado .= $char; // Mantém espaços e pontuação
        }
    }

    return $resultado;
}

if (isset($_GET['textoCifrado']) && isset($_GET['deslocamento'])) {
    $textoCifrado = $_GET['textoCifrado'];
    $deslocamento = intval($_GET['deslocamento']);
    
    // Exibe o texto cifrado e o deslocamento atual
    echo "<h2>Texto Cifrado:</h2><p>$textoCifrado</p>";
    echo "<h3>Deslocamento Atual: $deslocamento</h3>";

    // Decifra o texto com o deslocamento fornecido
    $textoDecifrado = decifraDeCesar($textoCifrado, $deslocamento);
    echo "<h2>Texto Decifrado:</h2><p>$textoDecifrado</p>";
    

echo "<br><a href='formulario-cifrar.html'>Voltar para a página de Cifrar</a>";
}
?>
