
<form action="test.php" method = "post">
  <p>Sql-query: <input type = "text" name = "inputFolderQuery"  style = "width: 30%;" /></p>
  <p>Table: <input type = "text" name = "inputFolderTable"  style = "width: 30%;" /></p>
  <p>UserName: <input type = "text" name = "inputFolderUserName"  style = "width: 30%;" /></p>
  <p>FC: <input type = "text" name = "inputFolderFC"  style = "width: 30%;" /></p>
  <p>Stat: <input type = "text" name = "inputFolderStat"  style = "width: 30%;" /></p>
  <p><input type = "submit" name="submit" value="Submit"/>
</form>

<?php
$user_name = $_POST['inputFolderUserName'];
$fc = $_POST['inputFolderFC'];
$stat = $_POST['inputFolderStat'];
/* Визначаємо значення для змінних*/
$hostname="localhost";
$username="root";
$password="";
/* ім’я бази даних */
$dbName="test_db";
/* Ім’я таблиці  */
$usertable = $_POST['inputFolderTable'];
/* Створити з’єднання з MySql*/
MYSQL_CONNECT($hostname,$username,$password) OR DIE("Не можу підключитися");
/* Вибір БД */
MYSQL_SELECT_DB($dbName) or die("Не можу вибрати БД");
/* Введення інформації в БД */
//$query = $_POST['inputFolder'];
$query = "INSERT INTO $usertable VALUES (15,'$user_name','$fc','$stat')";
$query = $_POST['inputFolderQuery'];
$result = mysql_query("Select * From PLAYER");
$num_rows_was = mysql_num_rows($result);
$_SESSION['delete_raws'] = $num_rows_was;
$result1 = MYSQL_QUERY($query);

/* Закрити з’єднання */
MYSQL_CLOSE();
print $query;
if($result1)
  include 'database.php';


?>
