<?php

    session_start();
  if (!isset($_SESSION['act'])) {
  $_SESSION['act'] = 0;
  } else {
  }
?>
<!DOCTYPE HTML>
<HTML>
<HEAD>
	<META charset = "UTF-8">
	<META name = "description" content = "Дерево інформації">
	<META name = "author" content = "Yaroslav Zemlianko">
	<!-- <link rel="stylesheet" href="styles.css" type="text/css"> -->
  <link rel="stylesheet" href="site_n.css" >
	<TITLE> База даних </TITLE>
</HEAD>

<BODY>
  <div class = "lastmenu">
  <p align=center class="mail" style="font-size: 24px;"  >Database</p>
  </div>

  <?php
      //открываем соеденение
        $connection = mysql_connect('localhost', 'root', '');
        if(!$connection) {
          die('Could not connect to the database: '.mysql_error());
        }
        //выбираем базу данных
        $db_selected = mysql_select_db('test_db', $connection);
        if(!$db_selected) {
          die('Could not connect to the database: '.mysql_error());
        }
  ?>

  <div>
  <?php
      //Редактирование
      require "modify_database.php";
  ?>
  </div>


  <div>
  <?php
      //Таблицы
      include "tables_database.php";
  ?>
  </div>

<hr color = "white" size = 3px />
  <div style="position: relative;  margin-bottom: 5px">
    <?php
      include "select_database.php";
    ?>
  </div>

  <hr color = "white" size = 3px />
    <div style="position: relative;  margin-bottom: 5px">FOR USER:
      <?php
        include "select_user.php";
      ?>
    </div>

    <?php
      mysql_close($connection);
    ?>
    <div class = "lastmenu">
    <p class = "mail" align=center>Developer`s name: Yaroslav Zemlianko<br>Write to developer`s email: <A class = "lmail" href = mailto:zema290613@gmail.com>zema290613@gmail.com</A></p>
    </div>
</BODY>
</HTML>
