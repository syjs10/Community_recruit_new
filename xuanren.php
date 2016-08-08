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
				if($department == 'root'){
					echo "<script>location.href=\"root.php\"</script>";
				}
				@ $db = new mysqli('localhost', 'student', 'student123', 'student');
				if (mysqli_connect_errno()) {
					echo "Error: Could not connect database.";
					exit;
				}
				$db->query("SET NAMES 'UTF8'");
				$query = "select * from review where department like '".$department."' order by score desc";
				$result = $db -> query($query);
				$num_result = $result->num_rows;
				echo "<div class=\"title\">";
				echo "<h1>".$department."选人</h1>";
				echo "</div>";
				echo "报名人员";
				for ($i = 0; $i < $num_result; $i++) {
					$row = $result->fetch_assoc();
					$query0 = "select * from student where id=".$row['id'];
					$result0 = $db -> query($query0);
					$row0 = $result0->fetch_assoc();
					echo "<div class = \"display\" >";
					echo "<div class = \"inner\">".($i+1)."."."</div>";
					echo "<div class = \"inner\" ><a href = \"see_all.php?id=".$row0['id']."&department=".$department."\">".htmlspecialchars(stripslashes($row0['name']))."</a></div>";
					echo "<div class = \"inner\">".htmlspecialchars(stripslashes($row0['gender']))."</div>";
					echo "<div class = \"inner\">其他部门: ".htmlspecialchars(stripslashes($row0['department1'])).
					" ".htmlspecialchars(stripslashes($row0['department2']))." ".
					htmlspecialchars(stripslashes($row0['department2']))."</div>";
					echo "<div class = \"inner\">".htmlspecialchars(stripslashes($row['score']))."</div>";
					echo "</div>";
				}
				echo "<br/>";


			?>
		</div>
	</body>
</html>
