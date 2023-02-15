<html>
<head>
    <title>Passar màscara decimal a màscara CDIR</title>
</head>
<body>
    <form action="" method="post">
        Introdueix la màscara en decimal: <input type="text" name="mascara">
        <input type="submit" value="Convertir">
    </form>
    <?php
        if ($_POST) {
            $mascara = $_POST['mascara'];
            $cidr = decimalmascaraToCIDR($mascara);
            echo "En format CIDR és: $cidr";
        }
    ?>
<p><a href="index.php">Torna a l'inici</a></p>
</body>
</html>

<?php

function decimalmascaraToCIDR($mascara) {
    $allargada = ip2long($mascara);
    $base = ip2long('255.255.255.255');
    $bits = 32 - log(($allargada ^ $base) + 1, 2);
    return $bits;
}
?>
