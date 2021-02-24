<table border="0" class="tables">
  <tr>
    <td align=center><figure><figcaption>CLUB</figcaption>
      <TABLE  border="2" style = "font-size: 120%;
      text-align: center; background-color: white">
        <tr>
          <th> Club_Id</th>
          <th> Club_Name</th>
          <th> Club_num_players</th>
        </tr>
        <?php
         $result = mysql_query("Select * From CLUB", $connection);
         require 'Table_db.php';
         ?>
      </TABLE>
    </figure></td>
    <td align=center><figure><figcaption>PLAYER</figcaption>
      <TABLE  border="2" style = "font-size: 120%;
      text-align: center; background-color: white;">
        <tr>
          <th >Player_Id</th>
          <th>Player_Name</th>
          <th>Club_id</th>
          <th>Statistics_id</th>
        </tr>
        <?php
         $result = mysql_query("Select * From PLAYER", $connection);
         require 'Table_db.php';
         ?>
      </TABLE>
    </figure></td>
    <td align=center><figure><figcaption>STATISTIC</figcaption>
      <TABLE border="2" style = "font-size: 120%;
      text-align: center; background-color: white;">
        <tr>
          <th>Statistic_Id</th>
          <th>Stat_goals</th>
          <th>Stat_pass</th>
        </tr>
        <?php
         $result = mysql_query("Select * From STATISTIC", $connection);
         require 'Table_db.php';
         ?>
      </TABLE></figure>
  </td>
  </tr>
</table>
