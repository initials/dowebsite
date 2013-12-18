<?php
$links = file_get_contents('_index.htm');
echo $links;	

echo '<div class="icons">';


$arr = array();


if ($handle = opendir('.')) {
	while (false !== ($entry = readdir($handle))) {
		if ($entry != "." && $entry != ".." && substr($entry,0,1) != "_" && strpos($entry, ".") === FALSE && substr($entry,-4) != ".log" && substr($entry,0,6) != "images" && substr($entry,0,7) != "LICENSE" && substr($entry,0,8) != "trailers" && substr($entry,0,9) != "error_log") {
			
			$xml = simplexml_load_file($entry."/data.xml");
			$pos = $xml->{'mainPagePosition'};
			$arr[$entry] = $pos;
			
			/*
			echo '<a href="project.php?f='.$entry.'">'.'<img src="'.$entry.'/icon.png" alt="InitialsLogo Video Games Retro Video Games 8-bit"></a>';
			echo '<br>';
			echo '<a href="project.php?f='.$entry.'">'.ucwords(str_replace("_", " ", $entry)).'</a>';
			echo '<br>';
			echo '<br>';
			echo '<br>';
			*/
		}
	}
}
closedir($handle);

natsort($arr);

foreach ($arr as $key => $value) {

	echo '<a href="project.php?f='.$key.'">'.'<img src="'.$key.'/icon.png" alt="InitialsLogo Video Games Retro Video Games 8-bit"></a>';
	echo '<br>';
	echo '<a href="project.php?f='.$key.'">'.ucwords(str_replace("_", " ", $key)).'</a>';
	echo '<br>';
	echo '<br>';
	echo '<br>';
}

echo '</div>';
echo '<br>';
echo 'MicrositeMaker was <a href="http://dopresskit.com/">inspired by presskit()</a><br>';
echo '<a href="https://github.com/initials/dowebsite">source Code</a><br><br>';
echo "</div></span></font></span></font></body></html>";
?>