<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>面试</title>
		<style media="screen">
			.body{
				position: absolute;
				left: 10%;
				border: 2px solid #ccc;
			}
			.display{
				border: 1px solid #000;
			}
			.inner{
				display: inline-block;
				margin-left: 20px;
			}
		</style>
	</head>
	<body>

		<div class="body">

			<?php

				$department = $_GET['department'];
				@ $db = new mysqli('localhost', 'student', 'student123', 'student');
				if (mysqli_connect_errno()) {
					echo "Error: Could not connect database.";
					exit;
				}
				$db->query("SET NAMES 'UTF8'");
				$query = "select * from student where department like '%".$department."%'";
				$result = $db -> query($query);
				$num_result = $result->num_rows;
				echo "<div class=\"title\">";
				echo "<h1>".$department."面试</h1>";
				echo "</div>";
				for ($i = 0; $i < $num_result; $i++) {
					$row = $result->fetch_assoc();
					echo "<div class = \"display\" >";
					echo "<div class = \"inner\">".($i+1)."."."</div>";
					echo "<div class = \"inner\" ><a href = \"see_about.php?id=".$row['id']."\">".htmlspecialchars(stripslashes($row['name']))."</a></div>";
					echo "<div class = \"inner\">".htmlspecialchars(stripslashes($row['gender']))."</div>";
					echo "<div class = \"inner\">调剂部门: ".htmlspecialchars(stripslashes($row['department1'])).
					" ".htmlspecialchars(stripslashes($row['department2']))." ".
					htmlspecialchars(stripslashes($row['department2']))."</div>";
					echo "</div>";
				}
			?>
		</div>
	</body>
</html>
