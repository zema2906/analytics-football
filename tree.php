<?php
$exist = 0;
  session_start();
	if(!isset($_SESSION['rootPath']))
	{
		$_SESSION['currentPath'] = 'D:\OpenServer\OSPanel\domains';
		$_SESSION['rootPath'] = 'D:\OpenServer\OSPanel\domains';
	}
  elseif($_SESSION['pomylka'] == 1)
	{
		$_SESSION['currentPath'] = 'D:\OpenServer\OSPanel\domains';
	}
	elseif(isset($_GET['var']))
	{
		$_SESSION['currentPath'] = $_GET['var'];
	}
  elseif(isset($_POST['inputFolder']))
	{
		$_SESSION['currentPath'] = $_POST['inputFolder'];
	}
  $_SESSION['pomylka'] = 0;
?>

<!DOCTYPE HTML>
<HTML>
<HEAD>
	<META charset = "UTF-8">
	<META name = "description" content = "Дерево інформації">
	<META name = "author" content = "Yaroslav Zemlianko">
	<link rel="stylesheet" href="styles.css" type="text/css">
  <link rel="stylesheet" href="mysite.css" >
	<TITLE> Дерево інформації </TITLE>
</HEAD>

<BODY>
  <HEADER>
    <div class = "lastmenu">
    <p class = "mail" align=center>Developer`s name: Yaroslav Zemlianko<br>Write to developer`s email: <A class = "lmail" href = mailto:zema290613@gmail.com>zema290613@gmail.com</A></p>
    </div>
  </HEADER>

	<ARTICLE>

    <?php
    echo $_SESSION['otvet'];
    //echo "<div class = 'path'>Current path: ".realpath($str)."</div>"
    ?>

    <form action="tree.php" method = "post">
      <p>Directory: <input type = "text" name = "inputFolder"  style = "width: 30%;" /></p>
      <p><input type = "submit" name="submit" value="Submit"/>
    </form>
    <p>
      <?php
        $str = "proverka";
        $str = $_POST['inputFolder'];
        if(realpath($str) != false) {
          //echo realpath($str);
          $_SESSION['pomylka'] = 0;
          $_SESSION['otvet'] = "Everything is okay!)))";
          $pos = strrpos(realpath($str), "D:\OpenServer\OSPanel\domains");
            if ($pos === false) {
                $_SESSION['pomylka'] = 1;
                $_SESSION['otvet'] = "Your entry directory is outside the specified directory! You comeback to default directory.";
            }
            else {
              $_SESSION['otvet'] = "Everything is okay!)))";
            }
        }
        else {
          //echo "EZ";
          //$_POST['inputFolder'] = 'D:\OpenServer\OSPanel\domains';
          $_SESSION['pomylka'] = 1;
          $_SESSION['otvet'] = "Your entry directory was not found! You comeback to default directory.";
        }
        /*$path_parts['filename'] = $str;
        $path_parts = pathinfo($str);
        echo '<p>Dirname: '.$path_parts['dirname'].'</p>';
        echo '<p>Basename: '.$path_parts['basename'].'</p>';
        echo '<p>Extension: '.$path_parts['extension'].'</p>';
        echo '<p>Filename: '.$path_parts['filename'].'</p>';*/
      ?>
    </p>
    <p><?php
    echo "<div style='color:purple; font-size:25px;'>Current path: ".$_SESSION['currentPath']."</div>"
    ?></p>
		<SECTION>
			<TABLE width = 100% border="2" align = center  style = "font-size: 20px;
      text-align: center; background-color: white;">
				<tr>
					<th width = 10%>Icon</th>
					<th width = 40%>Name</th>
					<th width = 15%>Extension</th>
          <th width = 35%>Size</th>
        </tr>
				<?php
        if ($_SESSION['pomylka'] == 1) {
          echo("<meta http-equiv='refresh' content='0'>");
        }
        else
         require 'Infotree.php'; ?>
			</TABLE>
		</SECTION>
	</ARTICLE>



  <FOOTER>

	</FOOTER>
</BODY>
</HTML>
