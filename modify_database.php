<form action="main_database.php" method = "post">
  <p>Action:
    <select name="action" onchange="this.form.submit()">
      <option selected value="Choose your Action">Choose your Action:
      <option value="Insert">Insert
      <option value="Edit">Edit
      <option value="Delete">Delete
    </select>
  </p>
  <input type = "submit" name="reset" value="Reset"/>
  <!-- <input type = "submit" name="submit" value="Submit"/> -->
</form>


<?php
  if($_POST['reset'] == 'Reset') {
    $_SESSION['act'] = 0;
  }
  elseif($_POST['action'] == 'Insert')
    $_SESSION['act'] = 1;
  elseif ($_POST['action'] == 'Edit') {
    $_SESSION['act'] = 2;
  }
  elseif ($_POST['action'] == 'Delete') {
    $_SESSION['act'] = 3;
  }

      $proverka = true;

  if($_SESSION['act'] == 1) {
    ?>
    <h2>Insert
    </h2>
    <form action="main_database.php" method = "post">
      <p>Table: <input type = "text" name = "TableInsert"  style = "width: 30%;" /></p>
      <p><input type = "submit" name="submit" value="Submit"/>
    </form>
    <?php
    $_SESSION['act'] = 5;
  }
  elseif($_SESSION['act'] == 2) {
    ?>
    <h2>Edit
    </h2>
    <form action="main_database.php" method = "post">
      <p>Table: <input type = "text" name = "TableEdit"  style = "width: 30%;" /></p>
      <p><input type = "submit" name="submit" value="Submit"/>
    </form>
    <?php
    $_SESSION['act'] = 4;
  }
  elseif($_SESSION['act'] == 3) {
    ?>
    <h2>Delete
    </h2>
    <form action="" method = "post" >
      <table>
        <tr>
          <td>Table: </td>
          <td width = 300px><input type = "text" name = "TableDel"  style = "width: 30%;" /></td>
        </tr>
        <tr>
          <td>Id: </td>
          <td width = 300px><input type = "text" name = "IDDel"  style = "width: 30%;" /></td>
        </tr>
        <tr>
          <td><input type = "submit" name="deletesubmit" value="Submit"/></td>
        </tr>
      </table>
    </form>
    <?php
    $result = mysql_query("select * from ".$_POST['TableDel'], $connection);
    if($result) {
    $num_rows_old = mysql_num_rows($result);
    $id_column = mysql_field_name($result, 0);
    $query = "Delete From ".$_POST['TableDel']." WHERE ".$id_column." = ".$_POST['IDDel'];
    $result2 = MYSQL_QUERY($query);
    if(isset($_POST['deletesubmit'])) {
      $query = "select * from ".$_POST['TableDel'];
      $result2 = MYSQL_QUERY($query);
      $num_rows_new = mysql_num_rows($result2);
      if($num_rows_new == $num_rows_old) {
          echo "Delete was not correct! ".mysql_error();
      }
    }
    }
    // echo var_dump($_POST);
    // echo $query;
  }
  elseif($_SESSION['act'] == 4) {
    if(mysql_query("select * from ".$_POST['TableEdit'], $connection)) {
    ?>
    <h2>Edit Table: "<?php
    echo $edit_table;
    echo $_POST['TableEdit'];
    ?>"
  </h2>

    <?php

    if($_POST['TableEdit'][0] == 'C' || $_POST['TableEdit'][0] == 'c') {
      ?>
      <form action="" method = "post" >
        <p>Table: <input type = "text" name = "TableEdit" value="CLUB" readonly  style = "width: 5%;" /></p>
        <p>Club_Id (1...999): <input type = "text" name = "ClubId"  pattern="^([1-9]|[1-9][0-9]|[1-9][0-9][0-9])$" style = "width: 5%;" /></p>
        <p>Club_Name: <input type = "text" name = "ClubName"  style = "width: 15%;" /></p>
        <p>Club_Num_Players (20...999): <input type = "text" name = "ClubNumPlayers" pattern="^([2-9][0-9]|[1-9][0-9][0-9])$" style = "width: 5%;" /></p>
        <p><input type = "submit" name="submitEdit" value="Submit"/></p>
      </form>
      <?php
      $resultEdit = mysql_query("select * from ".$_POST['TableEdit'], $connection);
      $id_column = mysql_field_name($resultEdit, 0);
      // $query = "INSERT INTO ".$_POST['TableEdit']." VALUES (".$_POST['ClubId'].", '".$_POST['ClubName']."', ".$_POST['ClubNumPlayers'].")";
      if(isset($_POST['ClubId']) || isset($_POST['ClubName']) || isset($_POST['ClubNumPlayers']))
        $proverka = false;
      $query = "UPDATE ".$_POST['TableEdit']." SET Club_Name = '".$_POST['ClubName']."', Club_num_players = ".$_POST['ClubNumPlayers']." WHERE ".$id_column." = ".$_POST['ClubId'];
      $ResultEdit = MYSQL_QUERY($query);
    }
    elseif ($_POST['TableEdit'][0] == 'P' || $_POST['TableEdit'][0] == 'p') {
      ?>
      <form action="" method = "post" >
        <p>Table: <input type = "text" name = "TableEdit" value="PLAYER" readonly  style = "width: 5%;" /></p>
        <p>Player_Id (1...999): <input type = "text" name = "PlayerId" pattern="^([1-9]|[1-9][0-9]|[1-9][0-9][0-9])$" style = "width: 5%;" /></p>
        <p>Player_Name: <input type = "text" name = "PlayerName"  style = "width: 20%;" /></p>
        <p>Club_id(1...999): <input type = "text" name = "Clubid" pattern="^([1-9]|[1-9][0-9]|[1-9][0-9][0-9])$" style = "width: 5%;" /></p>
        <p>Statistics_id (1...999): <input type = "text" name = "Statisticsid" pattern="^([1-9]|[1-9][0-9]|[1-9][0-9][0-9])$" style = "width: 5%;" /></p>
        <p><input type = "submit" name="submitEdit" value="Submit"/></p>
      </form>
      <?php
      $resultEdit = mysql_query("select * from ".$_POST['TableEdit'], $connection);
      $id_column = mysql_field_name($resultEdit, 0);
      if(isset($_POST['PlayerIdId']) || isset($_POST['PlayerName']) || isset($_POST['Clubid']) || isset($_POST['Statisticsid']))
        $proverka = false;
      $query = "UPDATE ".$_POST['TableEdit']." SET Player_Name = '".$_POST['PlayerName']."', Club_id = ".$_POST['Clubid'].", Statistics_id = ".$_POST['Statisticsid']." WHERE ".$id_column." = ".$_POST['PlayerId'];
      $ResultEdit = MYSQL_QUERY($query);
    }
    elseif ($_POST['TableEdit'][0] == 'S' || $_POST['TableEdit'][0] == 's') {
      ?>
      <form action="" method = "post" >
        <p>Table: <input type = "text" name = "TableEdit" value="STATISTIC" readonly  style = "width: 5%;" /></p>
        <p>Statistic_Id (1...999): <input type = "text" name = "StatId" pattern="^([1-9]|[1-9][0-9]|[1-9][0-9][0-9])$" style = "width: 5%;" /></p>
        <p>Stat_goals (1...999): <input type = "text" name = "StatGoals" pattern="^([1-9]|[1-9][0-9]|[1-9][0-9][0-9])$" style = "width: 5%;" /></p>
        <p>Stat_pass (1...999): <input type = "text" name = "StatPass" pattern="^([1-9]|[1-9][0-9]|[1-9][0-9][0-9])$" style = "width: 5%;" /></p>
        <p><input type = "submit" name="submitEdit" value="Submit"/></p>
      </form>
      <?php
      $resultEdit = mysql_query("select * from ".$_POST['TableEdit'], $connection);
      $id_column = mysql_field_name($resultEdit, 0);
      if(isset($_POST['StatId']) || isset($_POST['StatGoals']) || isset($_POST['StatPass']))
        $proverka = false;
      $query = "UPDATE ".$_POST['TableEdit']." SET Stat_goals = '".$_POST['StatGoals']."', Stat_pass = ".$_POST['StatPass']." WHERE ".$id_column." = ".$_POST['StatId'];
      $ResultEdit = MYSQL_QUERY($query);
    }
    if($ResultEdit == false) {
      if($proverka === false) {
        echo "Edit was not correct! ".mysql_error();
      }
    }
  }
  else {
    echo "This table is not in your database! WHAT".mysql_error();
    //echo var_dump($_POST);
    //echo "UPDATE ".$_POST['TableEdit']." SET Stat_goals = '".$_POST['StatGoals']."', Stat_pass = ".$_POST['StatPass']." WHERE ".$id_column." = ".$_POST['StatId'];
  }
  ?>
    <?php
  }
  elseif($_SESSION['act'] == 5) {
    if(mysql_query("select * from ".$_POST['TableInsert'], $connection)) {
    ?>
    <h2>Insert in Table: "<?php
    echo $edit_table;
    echo $_POST['TableInsert'];
    ?>"
  </h2>
  <?php
  if($_POST['TableInsert'][0] == 'C' || $_POST['TableInsert'][0] == 'c') {
    ?>
    <form action="" method = "post" >
      <p>Table: <input type = "text" name = "TableInsert" value="CLUB" readonly  style = "width: 5%;" /></p>
      <p>Club_Id (1...999): <input type = "text" name = "ClubId"  pattern="^([1-9]|[1-9][0-9]|[1-9][0-9][0-9])$" style = "width: 5%;" /></p>
      <p>Club_Name: <input type = "text" name = "ClubName"  style = "width: 15%;" /></p>
      <p>Club_Num_Players (20...999): <input type = "text" name = "ClubNumPlayers" pattern="^([2-9][0-9]|[1-9][0-9][0-9])$" style = "width: 5%;" /></p>
      <p><input type = "submit" name="submitInsert" value="Submit"/></p>
    </form>
    <?php
    if(isset($_POST['ClubId']) || isset($_POST['ClubName']) || isset($_POST['ClubNumPlayers']))
      $proverka = false;
    $query = "INSERT INTO ".$_POST['TableInsert']." VALUES (".$_POST['ClubId'].", '".$_POST['ClubName']."', ".$_POST['ClubNumPlayers'].")";
    // if ($_POST['ClubNumPlayers'] < 14) {
    //   $query = "";
    //   echo "Must be number bigger than 13! ".mysql_error();
    //   $proverka = true;
    // }
    $ResultInsert = MYSQL_QUERY($query);
  }
  elseif ($_POST['TableInsert'][0] == 'P' || $_POST['TableInsert'][0] == 'p') {
    ?>
    <form action="" method = "post" >
      <p>Table: <input type = "text" name = "TableInsert" value="PLAYER" readonly  style = "width: 5%;" /></p>
      <p>Player_Id (1...999): <input type = "text" name = "PlayerId" pattern="^([1-9]|[1-9][0-9]|[1-9][0-9][0-9])$" style = "width: 5%;" /></p>
      <p>Player_Name: <input type = "text" name = "PlayerName"  style = "width: 20%;" /></p>
      <p>Club_id(1...999): <input type = "text" name = "Clubid" pattern="^([1-9]|[1-9][0-9]|[1-9][0-9][0-9])$" style = "width: 5%;" /></p>
      <p>Statistics_id (1...999): <input type = "text" name = "Statisticsid" pattern="^([1-9]|[1-9][0-9]|[1-9][0-9][0-9])$" style = "width: 5%;" /></p>
      <p><input type = "submit" name="submitInsert" value="Submit"/></p>
    </form>
    <?php
    if(isset($_POST['PlayerIdId']) || isset($_POST['PlayerName']) || isset($_POST['Clubid']) || isset($_POST['Statisticsid']))
      $proverka = false;
    $query = "INSERT INTO ".$_POST['TableInsert']." VALUES (".$_POST['PlayerId'].", '".$_POST['PlayerName']."', ".$_POST['Clubid'].", ".$_POST['Statisticsid'].")";
    $ResultInsert = MYSQL_QUERY($query);
  }
  elseif ($_POST['TableInsert'][0] == 'S' || $_POST['TableInsert'][0] == 's') {
    ?>
    <form action="" method = "post" >
      <p>Table: <input type = "text" name = "TableInsert" value="STATISTIC" readonly  style = "width: 5%;" /></p>
      <p>Statistic_Id (1...999): <input type = "text" name = "StatId" pattern="^([1-9]|[1-9][0-9]|[1-9][0-9][0-9])$" style = "width: 5%;" /></p>
      <p>Stat_goals (1...999): <input type = "text" name = "StatGoals" pattern="^([1-9]|[1-9][0-9]|[1-9][0-9][0-9])$" style = "width: 5%;" /></p>
      <p>Stat_pass (1...999): <input type = "text" name = "StatPass" pattern="^([1-9]|[1-9][0-9]|[1-9][0-9][0-9])$" style = "width: 5%;" /></p>
      <p><input type = "submit" name="submitInsert" value="Submit"/></p>
    </form>
    <?php
    if(isset($_POST['StatId']) || isset($_POST['StatGoals']) || isset($_POST['StatPass']))
      $proverka = false;
    $query = "INSERT INTO ".$_POST['TableInsert']." VALUES (".$_POST['StatId'].", '".$_POST['StatGoals']."', ".$_POST['StatPass'].")";
    $ResultInsert = MYSQL_QUERY($query);
  }
  if($ResultInsert == false) {
    if($proverka === false) {
      echo "Insert was not correct! ".mysql_error();
    }
  }
  }
  else {
    echo "This table is not in your database! ".mysql_error();
  }
  }
  //
  // if($ResultInsert) {
  //   echo "Insert was correct!";
  //   $ResultInsert = !$ResultInsert;
  // }
  // echo $query;


?>
