<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php
		 	//create short variable name
			$name = $_POST['name'];
			$gender = $_POST['gender'];
			$class = $_POST['class'];
			$phonenum = $_POST['phonenum'];
			$qqnum = $_POST['qqnum'];
			$department = $_POST['department'];
			$department1 = $_POST['department1'];
			$department2 = $_POST['department2'];
			$department3 = $_POST['department3'];
			$introduction = $_POST['introduction'];
			if (!$name || !$gender || !$class || !$phonenum || !$qqnum || !$department || !$introduction){
				echo "请填全注册信息";
				exit;
			}
			if (!get_magic_quotes_gpc()){
				$name = addslashes($name);
				$gender = addslashes($gender);
				$class = addslashes($class);
				$phonenum = addslashes($phonenum);
				$qqnum = addslashes($qqnum);
				$department = addslashes($department);
				$department1 = addslashes($department1);
				$department2 = addslashes($department2);
				$department3 = addslashes($department3);
				$introduction = addslashes($introduction);
			}

			@ $db = new mysqli('localhost', 'student', 'student123', 'student');
			if(mysqli_connect_errno()){
				echo 'Error: Could not connect to database. Please try again.';
				exit;
			}
			$db->query("SET NAMES 'UTF8'");
			$query = "insert into student values(
					'NULL','".$name."', '".$gender."', '".$class."', '".
					$phonenum."', '".$qqnum."', '".$department."', '".
					$department1."', '".$department2."', '".$department1.
					"', '".$introduction."', 'NULL','NULL','NULL','NULL')";
			$result = $db -> query($query);
			if ($result){

				$query1 = "select * from student where name like '".$name."' and phonenum like '".$phonenum."'";
				$result1 = $db -> query($query1);
				$row = $result1 -> fetch_assoc();

				echo "<script>alert(\"".$name."同学报名成功\");location.href=\"student_commit_success.php?id=".$row['id']."\"</script>";
			} else {
				echo "报名失败";
				echo mysql_error();
			}
			$db -> close();
		?>

	</body>
</html>
