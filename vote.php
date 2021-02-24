<html>
<head>
<meta charset="utf-8">
<title>Vote yourself</title>
<meta name = "author" content="Yaroslav Zemlianko">
<meta name = "description" content="Vote yourself the best teams and football players">
<meta name = "keywords" content="vote,football, players, best, team, coach, statistic">
<link rel="stylesheet" href="styles.css" type="text/css">
<link rel="stylesheet" href="votestyle.css" type="text/css">
<style type="text/css">
  body {margin: 0; background: blue;}
</style>
</head>

<body>
    <HEADER>
      <div class = "mainmenu">
        <ul class = "list">
          <li class = "topteams"><a class="link" href="teams.html">The best teams (top 10)</a></li>
          <li class = "topgoalkeepers"><a class="link" href="goalkeepers.html">The best goalkeepers (top 10)</a></li>
          <li class = "topdefenders"><a class="link" href="defenders.html">The best defenders (top 10)</a></li>
          <li class = "topmidfielder"><a class="link" href="midfielder.html">The best midfielder (top 10)</a></li>
          <li class = "topforwards"><a class="link" href="forwards.html">The best forwards (top 10)</a></li>
        </ul>
      </div>
    </HEADER>

	<ARTICLE>
		<!--<SECTION>
			<TABLE border = '1'  align = center>
				<CAPTION>Розклад</CAPTION>
				<tr>
					<th width = 30%>Дата</th>
					<th width = 40%>Час</th>
					<th width = 30%>Подія</th>
                </tr>
				<?php //require 'calendar.php'; ?>
				<?php //include 'calendar.php'; ?>
				<tr>
					<td colspan = "3" id = "bottomLine"></td>
				</tr>
			</TABLE>
		<SECTION> -->


  <!--  <a class = "votefoto" href = "#main"></a> -->
    <h1 class = "h1" align = center><font color = purple face = "agency fb">
      <a name = "main">VOTE YOURSELF</a>
    </font></h1>

    <table border="2" align = center  style = "font-size: 20px;
    text-align: center; background-color: white;">
      <tr>
        <th width = 100px>№</th>
        <th width = 100px>Previous position</th>
        <th width = 300px>Football player</th>
        <th width = 150px>Rating</th>
        <th width = 100px>Vote</th>
      </tr>
      <?php require 'calendar.php'?>
    </table>

    <h1 align = left style="font-size: 32px; margin-top: 10px;"> Your choice was: </h1>
    <?php
    /*$file_name = 'data.txt';
    if(is_readable($file_name) OR filesize($file_name) != 0) {
      $fp = fopen($file_name, "r");
      $content = fread($fp, filesize($file_name));
      fclose($fp);
      echo $content;
    }
    else {
      echo "Kapec :( /n";
    }*/
    ?>




	</ARTICLE>



	<FOOTER>
  <div class = "lastmenu">
  <p class = "mail" align=center>Developer`s name: Yaroslav Zemlianko<br>Write to developer`s email: <A class = "lmail" href = mailto:zema290613@gmail.com>zema290613@gmail.com</A></p>
  </div>
	</FOOTER>
  </body>
  </html>
