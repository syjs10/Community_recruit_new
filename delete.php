<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php
			$id = $_POST['id'];
			//$department = $_POST['department'];
			@ $db = new mysqli('localhost', 'student', 'student123', 'student');
			if (mysqli_connect_errno()) {
				echo "Error: Could not connect database.";
			}
			$db->query("SET NAMES 'UTF8'");
			$query = "select * from student where id like '".$id."'";
			$result = $db -> query($query);
			$row = $result -> fetch_assoc();
			$query1 = "update student set employ_department = 'NULL' where id = ".$id;
			$result1 = $db -> query($query1);
			if ($result1) {
				echo "已取消录取";
			}


		?>
	</body>
</html>