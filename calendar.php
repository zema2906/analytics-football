<?php
$proverka = true;
    if(file_exists("voting.txt")) {
      $newFile = file("voting.txt");
      $row = 1;
      $file = fopen('data.txt', 'w');
      foreach ($newFile as $string) {
        $voting = explode(" / ", $string);
        $nFile = 0;
        $proverka = 0;
        foreach($voting as $block) {
          $proverka  += 1;
        }
        $pro = false;
        $col = 1;
        echo '<tr>';
        foreach ($voting as $block) {
          if($proverka > 4) {
              echo '<td colspan = "5">incorrect data in this row</td>';
              $pro = true;
              break;
          }
            else {
              if($col < 3){
                if(!is_numeric(trim($block))) {
                    echo '<td>incorrect data</td>';
                }
                else {
                  echo '<td>'.$block.'</td>';
                }
              }
              elseif($col == 4) {
                if(preg_match('/(^\s*\d+\.?\d*)\s(%)?\s*$/', $block)) {
                  echo '<td>'.$block.'</td>';
                }
                else {
                  echo '<td>incorrect data</td>';
                }
              }
              else {
                if($col > 4) {
                  echo '<td>incorrect data</td>';
                }
                  else
                echo '<td>'.$block.'</td>';
              }
              $col += 1;
            }
        }
        $row += 1;
        if($pro == true) {

        }
        else {
          echo '<td>'.
          '<form action = "vote.php" method = "post">
          <div>
          <input type = "image" src = "vote.png" id = "num" height = 120px weight = 60px/>
          </div>
          </form>'
          .'</td>';
        }

        echo '<tr>';
      }
    }
    else {
      echo "File is exist";
    }
    if($proverka == false) {
      $file = fopen('data.txt', 'w');
      fwrite($file, "Pomylka in ".$n." column");
      fclose($file);
    }
    /*if(isset($_POST["num"])) {
      $file = fopen('data.txt', 'w+');
      fwrite($file, 'opa');
      fwrite($file, ' vau!');
      fclose($file);
    }*/
/*if($n < 3) {
  if(!is_numeric(trim($block))) {
    $proverka = false;
  }
  else {
    $n += 1;
    echo '<td>'.$block.'</td>';
}
}
if($proverka == false) {
break;
}*/

/* 13-27
foreach ($voting as $block) {
  if(n < 2) {
    if(!is_numeric(trim($block))) {
      $proverka = false;
      break;
    }
    else {
      echo '<td>'.$block.'</td>';
    }
  }
  $n += 1;
}
if($proverka == false) {
  break;
}*/



// <form action = "vote.php" method = "post">
// <button><img src="vote.png" alt="Кнопка «button»" height = 105px weight = 100px></button>
/*
'<form>
<div>
<input type = "image" src="vote.png" height = 100px weight = 50px/>
</div>
</form>'
*/

?>
