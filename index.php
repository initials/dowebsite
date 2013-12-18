<?php
$links = file_get_contents('_index.htm');
echo $links;	


if ($handle = opendir('.')) {
	while (false !== ($entry = readdir($handle))) {
		if ($entry != "." && $entry != ".." && substr($entry,0,1) != "_" && strpos($entry, ".") === FALSE && substr($entry,-4) != ".log" && substr($entry,0,6) != "images" && substr($entry,0,8) != "trailers" && substr($entry,0,9) != "error_log") {
			echo '<a href="'.$entry.'/index.php">'.ucwords(str_replace("_", " ", $entry)).'</a>';
			echo '<br>';
			echo '<img src="'.$entry.'/icon.png" alt="InitialsLogo Video Games Retro Video Games 8-bit">';
			echo '<br>';
			echo '<br>';

		}
		
	}
}
closedir($handle);



/*
$xml = simplexml_load_file("data.xml");
foreach( $xml->children() as $child )
{
	foreach( $child->children() as $child2 ) 
	{
		switch( $child2->getName() )
		{
			case("name"):
				echo $child2." <br>";
				break;		
		}
	}
	echo "<br>";
}
*/

echo "</div></span></font></span></font></body></html>";
?>