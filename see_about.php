<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php
			$id = $_GET['id'];
			@ $db = new mysqli('localhost', 'student', 'student123', 'student');
			if (mysqli_connect_errno()) {
				echo "Error: Could not connect database.";
				exit;
			}
			$db->query("SET NAMES 'UTF8'");
			$query = "select * from student where id = ".$id;
			$result = $db -> query($query);
			$num_result = $result->num_rows;
			$row = $result->fetch_assoc();
			echo "<div class = \"form\"> <table>";
			echo "<tr>";
			echo "<td>姓名：</td>";
			echo "<td>".htmlspecialchars(stripslashes($row['name']))."</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>性别：</td>";
			echo "<td>".htmlspecialchars(stripslashes($row['gender']))."</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>班级：</td>";
			echo "<td>".htmlspecialchars(stripslashes($row['class']))."</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>调剂部门：</td>";
			echo "<td>".htmlspecialchars(stripslashes($row['department1']))." ".
			htmlspecialchars(stripslashes($row['department2']))." ".
			htmlspecialchars(stripslashes($row['department3']))." "."</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>自我介绍：</td>";
			echo "<td>".htmlspecialchars(stripslashes($row['introduction']))."</td>";
			echo "</tr>";
			echo "</table></div>";
		?>
		<form class="" action="index.html" method="post">
			面试官评价：<br/>
			<textarea name="review" rows="8" cols="40"></textarea>
			<br/>
			面试官打分：<br/>
			<input type="text" name="score" maxlength="3">
			<br/>
			<input type="submit"value="提交">
		</form>
	</body>
</html>