<!DOCTYPE html>
<html>
      <head>
            <meta charset="utf-8">
            <title></title>
            <style media="screen">
                  .inner{
                        display:inline-block;
                  }
            </style>
            <?php
                  @ $db = new mysqli('localhost', 'student', 'student123', 'student');
                  if (mysqli_connect_errno()) {
                        echo "Error: Could not connect database.";
                  }
                  $db->query("SET NAMES 'UTF8'");
                  $query = "select * from student";
                  $result = $db -> query($query);
                  $num_result = $result->num_rows;
            ?>
      </head>
      <body>
            <div class="">
                  <p>
                        冲突人员：
                  </p>
                  <?php
                        for ($i=0; $i < $num_result; $i++) {
                              $row = $result->fetch_assoc();
                              $count = 0;
                              if ($row['employ_department']!='NULL') {
                                    $count++;
                              }
                              if ($row['employ_department1']!='NULL') {
                                    $count++;
                              }
                              if ($row['employ_department2']!='NULL') {
                                    $count++;
                              }
                              if ($row['employ_department3']!='NULL') {
                                    $count++;
                              }
                              if ($count > 1) {
                                    echo "<div class = \"display\" >";
      					echo "<div class = \"inner\">".$row['id']."."."&nbsp;</div>";
      					echo "<div class = \"inner\" ><a href = \"see_about.php?id=".$row['id']."\">".htmlspecialchars(stripslashes($row['name']))."</a>  &nbsp;</div>";
      					echo "<div class = \"inner\">".htmlspecialchars(stripslashes($row['gender']))."&nbsp;</div>";
                                    if ($row['employ_department'] !='NULL') {
                                          echo "<div class =
                                           \"inner\">".htmlspecialchars(stripslashes($row['employ_department']))."&nbsp;</div>";
                                    }
                                    if ($row['employ_department1'] !='NULL') {
                                          echo "<div class =
                                           \"inner\">".htmlspecialchars(stripslashes($row['employ_department1']))."&nbsp;</div>";
                                    }
                                    if ($row['employ_department2'] !='NULL') {
                                          echo "<div class =
                                           \"inner\">".htmlspecialchars(stripslashes($row['employ_department2']))."&nbsp;</div>";
                                    }
                                    if ($row['employ_department3'] !='NULL') {
                                          echo "<div class =
                                           \"inner\">".htmlspecialchars(stripslashes($row['employ_department3']))."&nbsp;</div>";
                                    }
      					echo "</div>";
                              }
                        }
                  ?>
            </div>
            <div class="">
                  <p>
                        已录用：
                  </p>
            </div>
            <div class="">
                  <p>
                        未录用：
                  </p>
            </div>
      </body>
</html>
