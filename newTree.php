<?php
  session_start();
	if(!isset($_SESSION['rootPath']))
	{
		$_SESSION['currentPath'] = 'D:\OpenServer\OSPanel\domains';
		$_SESSION['rootPath'] = 'D:\OpenServer\OSPanel\domains';
	}
	elseif(isset($_GET['var']))
	{
		$_SESSION['currentPath'] = $_GET['var'];
	}

?>

<!DOCTYPE HTML>
<HTML>
<HEAD>
	<META charset = "UTF-8">
	<META name = "description" content = "Дерево інформації">
	<META name = "author" content = "Yaroslav Zemlianko">
  <link rel="stylesheet" href="mysite.css" type="text/css">
	<link rel="stylesheet" href="styles.css" type="text/css">

	<TITLE> Дерево інформації </TITLE>

</HEAD>

<BODY>
  <HEADER>
    <div class = "lastmenu">
    <p class = "mail" align=center>Developer`s name: Yaroslav Zemlianko<br>Write to developer`s email: <A class = "lmail" href = mailto:zema290613@gmail.com>zema290613@gmail.com</A></p>
    </div>
  </HEADER>

	<ARTICLE>

		<SECTION>
			<TABLE width = 100% border="2" align = center  style = "font-size: 20px;
      text-align: center; background-color: white;">
				<tr>
					<th width = 10%>Icon</th>
					<th width = 40%>Name</th>
					<th width = 15%>Extension</th>
          <th width = 35%>Size</th>
        </tr>
				<?php require 'Infotree.php'; ?>
			</TABLE>
		<SECTION>
	</ARTICLE>



  <FOOTER>

	</FOOTER>
</BODY>
</HTML>
