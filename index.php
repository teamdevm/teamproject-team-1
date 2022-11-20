<?php
session_start();
include "database.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset=UTF-8">
	<link rel="stylesheet" href="style.css" type="text/css" />
	<title></title>
</head>
<header>	
		<div class = "title">Найти рецепт</div>
		<ul class = "menu" >
		<li><a href ="index.php" "#">Главная</a></li>
		</ul>
</header>
<body>
<h1>Пожалуйста, отметьте один игредиент для поиска подходящего вам рецета</h1>

<h2></h2>
<form method="POST" action="Podhod.php" >
<div>
  <?php
		$result=mysqli_query($induction,"select * from `ing`");
			while ($row=mysqli_fetch_array($result)){
				$id_ing=$row['id_ing'];
				$name_ing=$row['name_ing'];
	?>
	
    <input type="radio" name="ingredient" value="<?php echo $name_ing?>"> <?php echo $name_ing?> <br>
<?php
	}
?>
</div>
<div>
    <button type="submit"  value="Найти рецепт" >Найти рецепт</button>

</div>
</form>

</body>

</html>
