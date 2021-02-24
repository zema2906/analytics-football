<tr>
<?php
    for($c = 0; $c < mysql_num_fields($ResultSelect); $c++) {
      echo '<th>'.mysql_field_name($ResultSelect, $c).'</th>';
    }
?>
</tr>
<?php
  for($r = 0; $r < mysql_num_rows($ResultSelect); $r++) {
    for($c = 0; $c < mysql_num_fields($ResultSelect); $c++) {
      echo '<td>'.mysql_result($ResultSelect, $r, $c).'</td>';
    }
    echo '<tr>';
  }
?>
