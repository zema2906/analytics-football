<?php
  $array1 = array("k1" => "Vadim", "k2" => "Yarik", "k3" => "Lexa", "k4" => "Petr", "Ilya");
  $arr = array(array("11", "12"), array("21", "22"));
  //var_dump($array);

  ?>
  <TABLE  border="2" style = "font-size: 120%;
  text-align: center; background-color: white;">
  <caption> NIce</caption>
    <tr>
      <th >First</th>
      <th>Second</th>
    </tr>
    <tr>
    <?php
    foreach ($arr as $value1) {
      foreach ($value1 as $value2) {
        echo '<td>'.$value2.'</td>';
     }
     echo '<tr></tr>';
   }  ?>
   </tr>
  </TABLE>
    <!-- //echo count($array, COUNT_RECURSIVE);

  //echo $array[0]; -->

<!-- <html>
<head>
<meta charset="utf-8">
<title>The best in the football</title>
<base href = "file:///D:/Web/Website.html"> -->
<!-- <meta name = "author" content="Yaroslav Zemlianko">
<meta name = "description" content="The best teams, football players and coaches from statistic and my opinion">
<meta name = "keywords" content="football, players, best, team, coach, statistic">
<link rel="stylesheet" href="styles.css" type="text/css">
<style type="text/css">
  body {margin: 0; background: blue;}
</style>
</head>
<body style = "background: red;">

</body>
</html> -->
