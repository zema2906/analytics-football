<form action="" method = "post" >
  <p>Select: <input type = "text" name = "Selectq"  style = "width: 80%;" /></p>
  <p><input type = "submit" name="submitSelect" value="Submit"/></p>
</form>
<?php
  $query = $_POST['Selectq'];
  $ResultSelect = MYSQL_QUERY($query);
  if($ResultSelect) {
    if(mysql_num_rows($ResultSelectUser) === 0) {
      echo "No one with such statistic! Next time...";
    }
    else {
?>
    <TABLE border="2" style = "font-size: 120%;
    text-align: center; background-color: white; margin: auto; top: 0;">
      <?php
        require 'select_table.php';
        $_SESSION['act'] = 0;
       ?>
    </TABLE>

<?php
}
  }
  else {
    if(isset($_POST['submitSelect'])) {
        echo "Запрос не удался...";
        $_SESSION['act'] = 0;
    }
  }

//SELECT player_name FROM Player FULL OUTER JOIN Club ON Player.club_id = Club.club_id; - incorrect
//SELECT player_name FROM Player JOIN Club ON Player.club_id = Club.club_id;
//SELECT player_name, club_name FROM Player JOIN Club ON Player.club_id = Club.club_id;
//SELECT player_name, Club_Name FROM Player JOIN Club ON Player.club_id = Club.club_id JOIN Statistic ON Player.statistics_id = Statistic.statistic_id
/*SELECT player_name, club_name FROM Player JOIN Club ON Player.club_id = Club.club_id WHERE Club.Club_name Like 'F%'
GROUP BY column_name(s)
HAVING condition
ORDER BY column_name(s);*/
//SELECT Player_Name, Stat_goals, Stat_pass FROM Players JOIN STATISTIC ON Player.club_id = Club.club_id;
//Select player_name From Player p, Statistic s, Club c WHERE c.club_id = p.club_id AND s.statistic_id = p.statistics_id AND c.club_name = 'PSG' AND s.stat_goals = (SELECT MAX(stat_goals) FROM STATISTIC GROUP BY statistic_id)
//Select player_name From Player p, Statistic s, Club c WHERE c.club_id = p.club_id AND s.statistic_id = p.statistics_id AND c.club_name = 'PSG' AND s.stat_goals = (SELECT MAX(stat_goals) FROM STATISTIC)
//Select player_name From Player p, Statistic s, Club c WHERE c.club_id = p.club_id AND s.statistic_id = p.statistics_id AND c.club_name = 'PSG' AND s.stat_goals = (SELECT MAX(stat_goals) FROM STATISTIC s1, Player p1, Club c1
//WHERE c1.club_id = p1.club_id AND s1.statistic_id = p1.statistics_id AND c1.club_name = 'PSG')

?>
