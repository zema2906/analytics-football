<?php

	$scan = scandir($_SESSION['currentPath']);

  /*if (strpos($_SESSION['currentPath'], $_SESSION['rootPath']) === false) {
      $url = $_SESSION['rootPath'];
      header("Location: $url");
  }*/

    for($i = 0; $i <= count($scan) - 2; $i++)
    {
        for($j = 0; $j <= count($scan) - 2; $j++)
        {
            if(!is_dir($_SESSION['currentPath']."\\".$scan[$j]) && is_dir($_SESSION['currentPath']."\\".$scan[$j + 1]))
            {
                $temp = $scan[$j + 1];
                $scan[$j + 1] = $scan[$j];
                $scan[$j] = $temp;
            }
        }
    }

    foreach($scan as $scanFor)
    {
        $makeLink = false;
        $variables = '';

        $fileType = pathinfo($scanFor, PATHINFO_EXTENSION);
        $iconPath = 'icon\\';
        if($scanFor == '.')
        {
            $iconPath = $iconPath.'folder_root.png';
        }
        elseif($scanFor == '..')
        {
            $iconPath = $iconPath.'folder_parent.png';
        }
        elseif(is_dir($_SESSION['currentPath']."\\".$scanFor))
        {
            $iconPath = $iconPath.'folder.png';
        }
        elseif($fileType == 'jpeg' || $fileType == 'jpg' || $fileType == 'bmp' || $fileType == "png" || $fileType == "JPG" || $fileType == 'PNG')
        {
            $iconPath = $iconPath.'img.png';
        }
        elseif($fileType == 'txt' || $fileType == 'rtf')
        {
            $iconPath = $iconPath.'txt.png';
        }
        elseif($fileType == 'avi' || $fileType == 'mp4')
        {
            $iconPath = $iconPath.'video.png';
        }
        elseif($fileType == 'css')
        {
            $iconPath = $iconPath.'css.png';
        }
        elseif($fileType == 'html')
        {
            $iconPath = $iconPath.'html.png';
        }
        elseif($fileType == 'php')
        {
            $iconPath = $iconPath.'php.png';
        }
        else
        {
            $iconPath = $iconPath.'file.png';
        }

        if($scanFor == '.' || $scanFor == '..' || is_dir($_SESSION['currentPath']."\\".$scanFor))
        {
            if($scanFor == '.')
                $variables = $_SESSION['rootPath'];
            elseif($scanFor == '..')
            {
                $pathExplode = explode('\\', $_SESSION['currentPath']);
                for($i = 0; $i < count($pathExplode) - 1; $i++)
                {
                    if($i == count($pathExplode) - 2)
                        $variables = $variables.$pathExplode[$i];
                    else
                        $variables = $variables.$pathExplode[$i]."\\";
                }
            }
            else
                $variables = $_SESSION['currentPath']."\\".$scanFor;

                if ($_SESSION['currentPath'] == $_SESSION['rootPath'] AND $scanFor == '..') {
            echo "<td>";
            echo "<img src = ".$iconPath." width = 70px height = 70px/></a></td>";
                }
                else {

              echo "<td><a href = '?var=$variables'>";
              echo "<img src = ".$iconPath." width = 70px height = 70px/></a></td>";
                }
        }
        else
            echo "<td><img src = ".$iconPath." width = 70px height = 70px/></td>";

        if(!is_dir($_SESSION['currentPath']."\\".$scanFor))
        {
            echo '<td>'.pathinfo($scanFor, PATHINFO_FILENAME).'</td>';
            echo '<td>'.pathinfo($scanFor, PATHINFO_EXTENSION).'</td>';
            $fileSize = filesize($_SESSION['currentPath']."\\".$scanFor);
            echo '<td>';
            if($fileSize > 1000000)
            {
              echo round($fileSize / 1024 / 1024, 2).' MB';
            }
            elseif($fileSize > 10240)
            {
              echo round($fileSize / 1024, 2).' KB';
            }
            else {
              echo $fileSize.' bytes';
            }
            echo '</td>';
        }
        elseif($scanFor == '.')
        {
            echo "<td><a href = '?var=$variables'>Root directory</a></td>";
            echo "<td><a href = '?var=$variables'></a></td>
            <td><a href = '?var=$variables'></a></td>";
        }
        elseif($scanFor == '..')
        {
          $str = "href = '?var=$variables'";
          if ($_SESSION['currentPath'] == $_SESSION['rootPath']) {
            echo "<td>Parent directory</td>";
            echo "<td></td>.
            <td></td>";
          }
          else {
            echo "<td><a href = '?var=$variables'>Parent directory</a></td>";
            echo "<td><a href = '?var=$variables'></a></td>
            <td><a href = '?var=$variables'></a></td>";
          }
        }
        else
        {
            echo "<td><a href = '?var=$variables'>".pathinfo($scanFor, PATHINFO_FILENAME)."</a></td>";
            echo "<td><a href = '?var=$variables'>Folder</a></td>";
            echo "<td></td>";
        }
        echo '</tr>';

    }
?>
