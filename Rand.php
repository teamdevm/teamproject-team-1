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
<header style="position:absolute; top:7px;">	
		<img  style="position:absolute; top:10px; left:10px; width:50px;"src="img/1.png">
		<div style="position:absolute; top:15px; left:-70px;"class = "title">поедИм</div>
		<ul class = "menu" >
		</ul>
</header>
<body>
<?php
$a = mysqli_query($induction,"SELECT COUNT(*) FROM `bludo` ");
$b = mysqli_fetch_array( $a );
$result=rand(1, $b[0] );


$bl=mysqli_query($induction,"select image_bludo, name_bludo from bludo where  id_bludo='$result';");
		while ($row=mysqli_fetch_array($bl)){
			$image_bludo=$row['image_bludo'];
			$name_bludo=$row['name_bludo'];
		} ?>

	<img style="  width: 300px; border-radius: 15px;"src="<?php echo $image_bludo;?>" >
	<h2><?php echo $name_bludo;?></h2>
<?php
$res=mysqli_query($induction,"select name_ing, massa, name_m from rec  inner join ing on (rec.id_ing_r=ing.id_ing) inner join mass on (ing.id_ing=mass.id_ing_m)  where id_bludo_r='$result' LIMIT 0, 25;");
		while ($yum=mysqli_fetch_array($res)){
			$name_ing=$yum['name_ing'];
			$massa=$yum['massa'];
			$name_m=$yum['name_m'];
			echo $name_ing;?> <?php
			echo $massa;?> <?php
			echo $name_m;?>
			<br><?php
		} 
		?>
	
<h2 ><center>следуй судьбе как и пошаговому рецепту!</center></h2>
<?php
$a = mysqli_query($induction,"select COUNT(*) from rec inner join steps on (rec.id_step_r=steps.id_step) where id_bludo_r='$result' LIMIT 0, 25; ");
			$b = mysqli_fetch_array( $a );
			$i=$b[0]-$b[0]+1;
while ($i<=$b[0]){
$r=mysqli_query($induction,"select id_step,photo_step, about_step from rec inner join steps on (rec.id_step_r=steps.id_step) where id_bludo_r='$result' LIMIT 0, 25;");
		while ($st=mysqli_fetch_array($r)){
			$id_step=$st['id_step'];
			$photo_step=$st['photo_step'];
			$about_step=$st['about_step'];
			
			?>
			<h2>шаг<?php echo $i;?></h2>
			<img style=" "src="<?php echo $photo_step;?>" >
			<?php echo $about_step;?>
			<?php
			$i=$i+1;
				}
		} ?>
</body>
</html>
