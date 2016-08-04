<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>选人</title>
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
				echo "报名人员";
				for ($i = 0; $i < $num_result; $i++) {
					$row = $result->fetch_assoc();
					echo "<div class = \"display\" >";
					echo "<div class = \"inner\">".($i+1)."."."</div>";
					echo "<div class = \"inner\" ><a href = \"see_all.php?id=".$row['id']."&department=".$row['department']."\">".htmlspecialchars(stripslashes($row['name']))."</a></div>";
					echo "<div class = \"inner\">".htmlspecialchars(stripslashes($row['gender']))."</div>";
					echo "<div class = \"inner\">调剂部门: ".htmlspecialchars(stripslashes($row['department1'])).
					" ".htmlspecialchars(stripslashes($row['department2']))." ".
					htmlspecialchars(stripslashes($row['department2']))."</div>";
					if ($row['employ_department'] != 'NULL') {
						echo "<div class = \"inner\">已录用</div>";
					} else {
						echo "<div class = \"inner\">未录用</div>";
					}
					echo "</div>";
				}
				echo "<br/>";
				echo "调剂人员";
				$query1 = "select * from student where department1 like '%".$department."%'"." or department2 like '%".$department."%'"." or department3 like '%".$department."%'";
				$result1 = $db -> query($query1);
				$num_result1 = $result1->num_rows;
				for ($i = 0; $i < $num_result1; $i++) {
					$row1 = $result1->fetch_assoc();
					echo "<div class = \"display\" >";
					echo "<div class = \"inner\">".($i+1)."."."</div>";
					echo "<div class = \"inner\" ><a href = \"see_all.php?id=".$row1['id']."&department=".$row1['department']."\">".htmlspecialchars(stripslashes($row1['name']))."</a></div>";
					echo "<div class = \"inner\">".htmlspecialchars(stripslashes($row1['gender']))."</div>";
					echo "<div class = \"inner\">调剂部门: ".htmlspecialchars(stripslashes($row1['department1'])).
					" ".htmlspecialchars(stripslashes($row1['department2']))." ".
					htmlspecialchars(stripslashes($row1['department2']))."</div>";
					if ($row1['employ_department'] != 'NULL') {
						echo "<div class = \"inner\">已录用</div>";
					} else {
						echo "<div class = \"inner\">未录用</div>";
					}
					echo "</div>";
				}
			?>
		</div>
	</body>
</html>
