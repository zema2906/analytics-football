<html>
<head>
<meta charset="utf-8">
<title>Delete</title>
<meta name = "author" content="Yaroslav Zemlianko">
<meta name = "description" content="The best teams, football players and coaches from statistic and my opinion">
<meta name = "keywords" content="football, players, best, team, coach, statistic">
<link rel="stylesheet" href="styles.css" type="text/css">
<link rel="stylesheet" href="delstyle.css" type="text/css">
</head>
<body>
<div class = "misha">
  <?php
  $connection = mysql_connect('localhost', 'root', '');
  if(!$connection) {
    die('Could not connect to the database: '.mysql_error());
  }

  //выбираем базу данных
  $db_selected = mysql_select_db('test_db', $connection);
  if(!$db_selected) {
    die('Could not connect to the database: '.mysql_error());
  }
  $query = "INSERT INTO ".$_POST['TableInsert']." VALUES (".$_POST['ClubId'].", ".$_POST['ClubName'].", ".$_POST['ClubNumPlayers'].")";
  // $query = "Delete From ".$_POST['TableEdit']." WHERE ".$id_column." = ".$_POST['IDDel'];
  $result2 = MYSQL_QUERY($query);
  echo "Okay: ".$query." ?";
  mysql_close($connection);
  ?>
  <form action="main_database.php" method = "post">
    <p><input type = "submit" name="submit" value="OK"/>
      <input type = "reset" name="reset" value="Reset"/></p>
  </form>
</body>
</html>
