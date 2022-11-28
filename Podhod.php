<?php
	session_start();
	include "database.php";
	if (isset($_POST['ingredient'])) { $ingredient = $_POST['ingredient'];} 
	if (empty($ingredient))
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

		<img  style="position:absolute; top:10px; left:10px; width:50px;"src="img/1.jpg">
		<div style="position:absolute; top:15px; left:-70px;"class = "title">поедИм</div>
		<ul class = "menu" >
		<li ><a style="color: #372637 ;text-decoration: none; " href ="index.php" "#">главная</a></li>
		</ul>
</header>
<body>

		<div class = "fon3">
<h1>Ваш выбор - <?php echo $ingredient ?>.<br>Мы нашли для вас рецепты!</h1>

<?php
	$result=mysqli_query($induction,"select name_bludo, about_bludo, image_bludo from rec inner join bludo on (rec.id_bludo_r=bludo.id_bludo) inner join ing on (rec.id_ing_r=ing.id_ing) where ing.name_ing='$ingredient' LIMIT 0, 25;");
		while ($row=mysqli_fetch_array($result)){
			$name_bludo=$row['name_bludo'];
			$about_bludo=$row['about_bludo'];
			$image_bludo=$row['image_bludo'];
	?>

<table style="margin-top:30px; margin-bottom:30px; ">
<tr>
	<td><img style="  width: 300px;"src="<?php echo $image_bludo;?>"></td>
	<td rowspan="2"><h2><?php echo $name_bludo;?></h2><br><b><?php echo $about_bludo;?></b> </td>
</tr>
</table>
<?php
}
?>
</div>

</body>
</html>
