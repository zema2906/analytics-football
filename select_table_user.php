<tr>
<?php
    for($c = 0; $c < mysql_num_fields($ResultSelectUser); $c++) {
      echo '<th>'.mysql_field_name($ResultSelectUser, $c).'</th>';
    }
?>
</tr>
<?php
  for($r = 0; $r < mysql_num_rows($ResultSelectUser); $r++) {
    for($c = 0; $c < mysql_num_fields($ResultSelectUser); $c++) {
      echo '<td>'.mysql_result($ResultSelectUser, $r, $c).'</td>';
    }
    echo '<tr>';
  }
?>
