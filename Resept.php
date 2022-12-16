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
<h2 ><center>следуй пошаговому рецепту!</center></h2>
<?php

			$a = mysqli_query($induction,"select COUNT(*) from rec inner join steps on (rec.id_step_r=steps.id_step) where id_bludo_r='$id_bludo' LIMIT 0, 25; ");
			$b = mysqli_fetch_array( $a );
			$i=$b[0]-$b[0]+1;
while ($i<=$b[0]){
$r=mysqli_query($induction,"select id_step,photo_step, about_step from rec inner join steps on (rec.id_step_r=steps.id_step) where id_bludo_r='$id_bludo' LIMIT 0, 25;");
		while ($st=mysqli_fetch_array($r)){
			$id_step=$st['id_step'];
			$photo_step=$st['photo_step'];
			$about_step=$st['about_step'];

			?>
			<h2>шаг<?php echo $i;?></h2>
			<img style=""src="<?php echo $photo_step;?>" >
			<b><?php echo $about_step;?></b> 
			<?php
			$i=$i+1;
				}
		} ?>

</body>
</html>
