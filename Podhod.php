<?php
	session_start();
	include "database.php";
	if (isset($_POST['ingredient'])) { $ingredient = $_POST['ingredient'];} 
	if (empty($ingredient)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
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
<header  style="position:absolute; top:7px;">	
		<img  style="position:absolute; top:10px; left:10px; width:50px;"src="img/1.jpg">
		<div style="position:absolute; top:15px; left:-70px;"class = "title">поедИм</div>
		<ul class = "menu" >
		<li ><a style="color: #372637 ;text-decoration: none; " href ="index.php" "#">главная</a></li>
		<li ><a style=" position:absolute; color: #372637 ;text-decoration: none; margin-top: -30px; margin-left:150px; " href ="Rand.php" "#">рецепт фортуны</a></li>
		</ul>
</header>
<body style = "background-image: url(img/10.png); 
    background-attachment: fixed; ">

		<div  >
<h1 style="margin-top:100px; ">ваш выбор - <?php echo $ingredient ?>.<br>мы нашли для вас рецепты!</h1>
<?php
	$result=mysqli_query($induction,"select name_bludo, about_bludo, image_bludo from rec inner join bludo on (rec.id_bludo_r=bludo.id_bludo) inner join ing on (rec.id_ing_r=ing.id_ing) where ing.name_ing='$ingredient' LIMIT 0, 25;");
		while ($row=mysqli_fetch_array($result)){
			$name_bludo=$row['name_bludo'];
			$about_bludo=$row['about_bludo'];
			$image_bludo=$row['image_bludo'];
	?>
	
<form method="POST" action="Resept.php" >
<table  style="   margin-left: 15%; margin-right: 15%;margin-top:30px; margin-bottom:30px; padding-top: 10px; padding-bottom: 10px;padding-left: 10px; padding-right: 10px;box-shadow: 0 0 0 10px #FFFFFF;background: #FFFFFF;">
<tr>
	<td><img style="  width: 300px; border-radius: 15px;"src="<?php echo $image_bludo;?>" ></td>
	<td  style="  padding-left: 50px;" rowspan="2">
	<input style="  border-radius: 15px;" type="submit"  name="submit" value="<?php echo $name_bludo;?>">
	
	<br><b><?php echo $about_bludo;?></b> 
	<input type="hidden" name="name_bludo"  value="<?php echo $name_bludo?>"></td>
</tr>
</table>
<?php
}
?>
</form>
</div>
</body>
</html>
