<?php
$links = file_get_contents('_index.htm');
echo $links;	




if ($handle = opendir('.')) {
	while (false !== ($entry = readdir($handle))) {
		if ($entry != "." && $entry != ".." && substr($entry,0,1) != "_" && strpos($entry, ".") === FALSE && substr($entry,-4) != ".log" && substr($entry,0,6) != "images" && substr($entry,0,8) != "trailers" && substr($entry,0,9) != "error_log") {
			echo '<a href="project.php?f='.$entry.'">'.ucwords(str_replace("_", " ", $entry)).'</a>';
			echo '<br>';
			echo '<br>';
			echo '<a href="project.php?f='.$entry.'">'.'<img src="'.$entry.'/icon.png" alt="InitialsLogo Video Games Retro Video Games 8-bit"></a>';
			echo '<br>';
			echo '<br>';

		}
		
	}
}
closedir($handle);


echo '<br>';
echo 'MicrositeMaker was <a href="http://dopresskit.com/">inspired by presskit()</a><br>';
echo '<a href="https://github.com/initials/dowebsite">ource Code</a><br><br>';
echo "</div></span></font></span></font></body></html>";
?>