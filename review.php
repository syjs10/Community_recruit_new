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
			$department = $_POST['department'];
		  	@ $db = new mysqli('localhost', 'student', 'student123', 'student');
			if (mysqli_connect_errno()) {
				echo "Error: Could not connect database";
				exit;
			}
			$query = "insert into review values('".
					$id."', '".$department."', '".$score."', '".$review."')";
			$db -> query("SET NAMES 'UTF8'");
			$result = $db -> query($query);
			if ($result) {
				echo "<script>alert(\"提交成功\");location.href=\"mianshi.php?department=".$department."\"</script>";
			} else {
				echo "提交失败";
			}
		?>

	</body>
</html>
