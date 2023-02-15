<!DOCTYPE html>
<html>
<head>
	<title>Calculadora IP</title>
</head>
<body>

<?php
if(isset($_POST['submit'])){
	$ip_address = $_POST['ip_address'];
	$cidr = $_POST['cidr'];

	// Calculant la direcció de xarxa
	$ip_bin = sprintf("%032b", ip2long($ip_address));
	$net_bin = substr($ip_bin, 0, $cidr) . str_repeat('0', 32 - $cidr);
	$net_ip = long2ip(bindec($net_bin));

	// Calculant el rang de la xarxa
	$num_hosts = pow(2, 32 - $cidr) - 2;
	$first_ip = long2ip(ip2long($net_ip) + 1);
	$last_ip = long2ip(ip2long($net_ip) + $num_hosts);

	// Calcular la IP de broadcast (La última de la xarxa)
	$broadcast_bin = substr($ip_bin, 0, $cidr) . str_repeat('1', 32 - $cidr);
	$broadcast_ip = long2ip(bindec($broadcast_bin));

	// Calcular IP proposta pel router (IP de network (0+1))
	$router_ip = long2ip(ip2long($net_ip) + 1);

	// Calcular IP proposta pel servidor web (Network + 2 perquè +1 és el router)
	$server_ip = long2ip(ip2long($net_ip) + 2);
?>

	<h2>Resultats</h2>
	<p>Direcció de xarxa: <?php echo $net_ip; ?>/<?php echo $cidr; ?></p>
	<p>Rang de direccions de la xarxa: <?php echo $first_ip; ?> - <?php echo $last_ip; ?></p>
	<p>Direcció del broadcast: <?php echo $broadcast_ip; ?></p>
	<p>Direcció pel router: <?php echo $router_ip; ?></p>
	<p>Direcció recomenada pel servidor web: <?php echo $server_ip; ?></p>

<?php } ?>

	<h2>Calculadora IP</h2>
	<form method="post" action="">
		<label for="ip_address">Introdueix direcció IP:</label>
		<input type="text" name="ip_address"><br>

		<label for="cidr">Introdueix màscara CIDR/decimal:</label>
		<input type="text" name="cidr"><br>

		<input type="submit" name="submit" value="Calcular">
	</form>
</body>
</html>
<p><a href="index.php">Torna a l'inici</a></p>
