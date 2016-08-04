<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php
			$review = $_POST['review'];
			$score = $_POST['score'];
			$id = $_POST['id'];
		  	@ $db = new mysqli('localhost', 'student', 'student123', 'student');
			if (mysqli_connect_errno()) {
				echo "Error: Could not connect database";
				exit;
			}
			$query = "insert into student values('".
					$id."', '".$score."', '".$review."')";
			$db -> query("SET NAMES 'UTF8'");
			$result = $db -> query($query);
			if ($result) {
				echo "提交成功";
			} else {
				echo "提交失败";
			}
		?>
	</body>
</html>
