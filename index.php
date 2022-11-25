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

		<img  style="position:absolute; top:10px; left:10px; width:50px;"src="img/1.jpg">
		<div style="position:absolute; top:15px; left:-70px; "class = "title">поедИм</div>
		<ul class = "menu" >
		<li ><a style="color: #372637 ;text-decoration: none; " href ="index.php" "#">главная</a></li>
		</ul>
</header>
<body>
	<div class = "fon">
	<div class = "fon2">
	<h1 style="  opacity: 1;">Отметьте один игредиент для поиска подходящего вам рецета</h1>
	<form method="POST" action="Podhod.php" >
	<div class="checkbox-wrapper">
	<table   style="margin-left: 35%; color: #372637; opacity: 1;">
	  <?php
			$result=mysqli_query($induction,"select * from `ing` order by `name_ing` asc");
			
			$i=0;
			$a = mysqli_query($induction,"SELECT COUNT(*) FROM `ing` ");
			$b = mysqli_fetch_array( $a );
					
					?>
					<tr>
					<?php
					while($i<$b[0]){
						if($i%2===0)
						{
							$row=mysqli_fetch_array($result);
							$id_ing=$row['id_ing'];
							$name_ing=$row['name_ing'];
							?>
								<td> <label><input  type="radio"class="modern-radio" name="ingredient" style="column" value="<?php echo $name_ing?>"> <?php echo $name_ing?> <span></span></label></td>
							<?php						
					}
					$i=$i+1;
						if($i%2 !== 0)
						{
							$row=mysqli_fetch_array($result);
							$id_ing=$row['id_ing'];
							$name_ing=$row['name_ing'];
							?>
								<td><label><input type="radio" class="modern-radio" name="ingredient" style="column" value="<?php echo $name_ing?>"> <?php echo $name_ing?> <span></span></label></td>
							<?php
						}
					$i=$i+1;
						?>
					</tr>
		<?php			
	}
	?>
	</table>
	</div>
	<div style="  opacity: 1;">
    <button style="  opacity: 1;   margin-top: 2%;	margin-left: 40.5%;" class="shine-button" type="submit"  value="Найти рецепт" >скорее! кушать хочу</button>
	</div>
	</form>

</div>
	</div>
	</div>
</body>

</html>
