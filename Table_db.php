<?php
  for($r = 0; $r < mysql_num_rows($result); $r++) {
    for($c = 0; $c < mysql_num_fields($result); $c++) {
      echo '<td>'.mysql_result($result, $r, $c).'</td>';
    }
    echo '<tr>';
  }
?>
