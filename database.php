<?php

$par1_ip="127.0.0.1";
$par2_name="root";
$par3_p="";
$par4_db="yummy";

$induction = mysqli_connect($par1_ip, $par2_name, $par3_p, $par4_db);

if ($induction == false)
{
	echo "Ошибка подключения";
}
?>