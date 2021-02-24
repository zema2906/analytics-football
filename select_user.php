<form action="" method = "post" >
  <p>Min_goals (1...999): <input type = "text" name = "Min_goals"  pattern="^([1-9]|[1-9][0-9]|[1-9][0-9][0-9])$" style = "width: 10%;" /></p>
  <p>Min_pass (1...999): <input type = "text" name = "Min_pass" pattern="^([1-9]|[1-9][0-9]|[1-9][0-9][0-9])$" style = "width: 10%;" /></p>
  <p><input type = "submit" name="submituserSelect" value="Submit"/></p>
</form>
<?php
  // $query = "SELECT player_name, club_name, stat_goals, stat_pass FROM Player p, Club c, Statistic s WHERE p.club_id = c.club_id AND s.Statistic_ID = p.Statistics_id AND s.Stat_goals > ".$_POST['Min_goals']." AND s.Stat_pass > ".$_POST['Min_goals'];
$query = "SELECT player_name, club_name, stat_goals, stat_pass FROM Player p, Club c, Statistic s WHERE p.club_id = c.club_id  AND s.Statistic_ID = p.Statistics_id AND s.Stat_goals > ".$_POST['Min_goals']." AND s.Stat_pass > ".$_POST['Min_pass'];
  $ResultSelectUser = MYSQL_QUERY($query);
  if($ResultSelectUser) {
    if(mysql_num_rows($ResultSelectUser) === 0) {
        if(isset($_POST['submituserSelect']))
      echo "No one with such statistic! Next time...";
    }
    else {
?>

    <TABLE border="2" style = "font-size: 120%;
    text-align: center; background-color: white; margin: auto; top: 0;">
      <?php
        require 'select_table_user.php';
        $_SESSION['act'] = 0;
       ?>
    </TABLE>

<?php
}}
  else {
    if(isset($_POST['submituserSelect'])) {
        echo "Запрос не удался...";
        $_SESSION['act'] = 0;
    }
  }
