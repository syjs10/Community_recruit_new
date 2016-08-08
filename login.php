<!DOCTYPE html>
<html>
      <head>
            <meta charset="utf-8">
            <title></title>
      </head>
      <body>

      </body>
</html>
<?php
      $user = $_POST['user'];
      $password = md5($_POST['password']);
      $db = new mysqli("localhost", "student", "student123", "student");
      if(!$db){
            echo "Error: could not connect database";
      }
      $db->query("SET NAMES 'UTF8'");
      $query="select * from admin where department like '".$user."'";

      $result = $db -> query($query);
      $row = $result -> fetch_assoc();
      if($row['passwd'] == $password){
            echo "<script>alert(\"登陆成功\");location.href=\"xuanren.php?department=".$user."\"</script>";
      }
?>
