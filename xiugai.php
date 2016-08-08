<!DOCTYPE html>
<html>
      <head>
            <meta charset="utf-8">
            <title></title>
      </head>
      <body>
            <?php
                  $department = $_POST['department'];
                  $password = $_POST['password'];
                  $newpassword = $_POST['newpassword'];
                  $newpassword1 = $_POST['newpassword1'];

                  $db = new mysqli("localhost", "student", "student123", "student");
                  if(!$db){
                        echo "Error: could not connect database";
                  }
                  $db->query("SET NAMES 'UTF8'");
                  $query="select * from admin where department like '".$department."'";

                  $result = $db -> query($query);
                  $row = $result -> fetch_assoc();
                  if($row['passwd'] == md5($password)){
                        if($newpassword == $newpassword1){
                              $query1 = "update admin set passwd = '".md5($newpassword)."' where department = '".$department."'";
                              $result = $db -> query($query1);
                              if ($result) {
                                    echo "<script>alert(\"修改成功\");location.href=\"xuanren.php?department=".$department."\"</script>";
                              }

                        } else {
                              echo 修改失败;
                        }

                  } else {
                        echo "<script>alert(\"密码错误\");</script>";
                  }
            ?>
      </body>
</html>
