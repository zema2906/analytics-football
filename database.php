<!DOCTYPE HTML>
<HTML>
<HEAD>
	<META charset = "UTF-8">
	<META name = "description" content = "Дерево інформації">
	<META name = "author" content = "Yaroslav Zemlianko">
	<link rel="stylesheet" href="styles.css" type="text/css">
  <link rel="stylesheet" href="dbsite_new.css">
	<TITLE> База даних </TITLE>
</HEAD>

<BODY>
  <div class = "lastmenu">
  <p class = "mail" align=center>Developer`s name: Yaroslav Zemlianko<br>Write to developer`s email: <A class = "lmail" href = mailto:zema290613@gmail.com>zema290613@gmail.com</A></p>
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

      //выбираем все с таблицы
      //$result = mysql_query("Alter TABLE CLUB add column yu", $connection);
      $result = mysql_query("Select * From PLAYER Group BY player_id Order By player_id DESC", $connection);

      //количество рядов запроса
      $num_rows = mysql_num_rows($result);
      //echo "Получено $num_rows рядов\n";

      //выводим второй ряд запроса
      //echo '<div>'.mysql_result($result, 4, 1).'</div>';

      //получение одного ряда запроса
      $row = mysql_fetch_row($result);
      //echo $row[1];
  ?>


  <TABLE width = 30% border="2" align = left  style = "font-size: 14px;
  text-align: center; background-color: white;">
    <tr>
      <th width = 20%>Club_Id</th>
      <th width = 60%>Club_Name</th>
      <th width = 20%>Club_num_players</th>
			<th width = 20%>Club_num_players</th>
    </tr>
    <?php
     require 'Table_db.php';
     ?>
  </TABLE>

	<div align = center>
	<?php
	$num_rows_is = mysql_num_rows($result);
	$num_rows_is = $_SESSION['delete_raws'] - $num_rows_is;
	if($num_rows_is >= 0)
	echo "Delete: ".$num_rows_is." raw/raws.";
      //закрываем соеденение
      mysql_close($connection);
  ?>

	</div>



</BODY>
</HTML>
