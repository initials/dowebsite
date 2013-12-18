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
		case("download"):
			echo '<a href="Download this game"'.$child.">Download</a><br>";
			break;	
		case("image"):
			echo '<img src="'.$child.'" alt="InitialsLogo Video Games Retro Video Games 8-bit"> <br>';
			break;	
	}
	echo "<br>";
}

echo 'Back to main';

echo "</div></span></font></span></font></body></html>";
?>