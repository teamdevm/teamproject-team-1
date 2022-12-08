<?php
	session_start();
	include "database.php";
	if (isset($_POST['submit'])) { $name_bludo = $_POST['submit'];} 
	if (empty($name_bludo)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
		exit ("Вы ничего не выбрали! Пожалуйста, отметьте один ингредиент для поиска.");
    }
	
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset=UTF-8">
	<link rel="stylesheet" href="style.css" type="text/css" />
	<title></title>
</head>
<header>	
		<img  style="position:absolute; top:10px; left:10px; width:50px;"src="img/1.png">
		<div style="position:absolute; top:15px; left:-70px;"class = "title">поедИм</div>
		<ul class = "menu" >
		<li ><a style="color: #372637 ;text-decoration: none; " href ="index.php" "#">главная</a></li>
		<li ><a style=" position:absolute; color: #372637 ;text-decoration: none; margin-top: -30px; margin-left:150px; " href ="Rand.php" "#">рецепт фортуны</a></li>
		</ul>
</header>
<body>
<?php
$result=mysqli_query($induction,"select image_bludo, id_bludo from bludo where name_bludo='$name_bludo';");
		while ($row=mysqli_fetch_array($result)){
			$image_bludo=$row['image_bludo'];
			$id_bludo=$row['id_bludo'];
		} ?>

	<img src="<?php echo $image_bludo;?>" >
	<?php echo $name_bludo;?>
<?php
$res=mysqli_query($induction,"select name_ing, massa, name_m from rec  inner join ing on (rec.id_ing_r=ing.id_ing) inner join mass on (ing.id_ing=mass.id_ing_m)  where id_bludo_r='$id_bludo' LIMIT 0, 25;");
		while ($yum=mysqli_fetch_array($res)){
			$name_ing=$yum['name_ing'];
			$massa=$yum['massa'];
			$name_m=$yum['name_m'];
			echo $name_ing;?> <?php
			echo $massa;?> <?php
			echo $name_m;?>
			<br><?php
		} ?>
</body>
</html>
