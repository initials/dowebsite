<?php
$links = file_get_contents('../_project.htm');
echo $links;	

echo '<link href="projectStyle.css" rel="stylesheet" type="text/css">';
echo '<font face="Helvetica, Arial" font="" size="3">';

$xml = simplexml_load_file("data.xml");
foreach( $xml->children() as $child )
{
	switch( $child->getName() )
	{
		case("name"):
			echo "<b>".$child."</b> <br>";
			break;		
		case("sourcecode"):
			echo "<b> Source code available: ".$child."</b> <br>";
			break;	
		case("download"):
			foreach( $child->children() as $dl ) {
				echo 'Download this game for: '.$dl->getName(). ' link: '.$dl.'<br>';
			}
			break;	
		case("credits"):
			foreach( $child->children() as $dl ) {
				echo 'Credits: '.$dl->getName(). ' link: '.$dl.'<br>';
			}
			break;	
		case("links"):
			echo '<span id="text-place">';
			foreach( $child->children() as $dl ) {
				echo 'Links: '.$dl->getName(). ' link: '.$dl.'<br>';
			}
			echo '</span>';
			break;							
		case("image"):
			echo '<img src="'.$child.'" alt="InitialsLogo Video Games Retro Video Games 8-bit"> <br>';
			break;	

		case("screenshots"):
			if ($handle = opendir('./screenshots')) {
				while (false !== ($entry = readdir($handle))) {
					if ($entry != "." && $entry != ".." && substr($entry,0,1) != "_" && substr($entry,-4) != ".log" && substr($entry,0,6) != "images" && substr($entry,0,8) != "trailers" && substr($entry,0,9) != "error_log") {
						echo '<img src="screenshots/'.$entry.'" /><br>';
						echo '<br>';

					}
					
				}

			}
			closedir($handle);
			break;	







	}
	echo "<br>";
}

echo 'Back to main';

echo "</div></span></font></span></font></body></html>";
?>