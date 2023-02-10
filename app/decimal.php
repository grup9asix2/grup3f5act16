<html>
<head>
    <title>Passar màscara CIDR a màscara decimal</title>
</head>
<body>
    <form action="" method="post">
        El resultat en format CIDR: <input type="text" name="cidr">
        <input type="submit" value="Convertir">
    </form>
    <?php
        if ($_POST) {
            $cidr = $_POST['cidr'];
            $mascara = cidrToDecimalmascara($cidr);
            echo "La máscara decimal es: $mascara";
        }
    ?>
<p><a href="index.php">Torna a l'inici</a></p>
</body>
</html>

<?php

function cidrToDecimalmascara($cidr) {
    list($ip, $mascara) = explode('/', $cidr);
    $allargada = bindec(str_pad('', $mascara, '1') . str_pad('', 32-$mascara, '0'));
    return long2ip($allargada);
}
?>
