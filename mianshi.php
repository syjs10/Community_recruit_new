<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>技术部</title>
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
			<div class="title">
				<h1>技术部面试</h1>
			</div>
			<?php
				@ $db = new mysqli('localhost', 'student', 'student123', 'student');
				if (mysqli_connect_errno()) {
					echo "Error: Could not connect database.";
					exit;
				}
				$db->query("SET NAMES 'UTF8'");
				$query = "select * from student where department like '%技术%'";
				$result = $db -> query($query);
				$num_result = $result->num_rows;

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
