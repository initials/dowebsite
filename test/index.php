<?php
$links = file_get_contents('../_project.htm');
echo $links;	

echo '<link href="projectStyle.css" rel="stylesheet" type="text/css">';
echo '<font face="Helvetica, Arial" font="" size="3">';

$xml = simplexml_load_file("data.xml");
foreach( $xml->children() as $child )
{
	foreach( $child->children() as $child2 ) 
	{
		switch( $child2->getName() )
		{
			case("name"):
				echo "<b>".$child2."</b> <br>";
				break;		
			case("download"):
				echo "Download link: ".$child2." <br>";
				break;	
			case("image"):
				echo '<img src="'.$child2.'" alt="InitialsLogo Video Games Retro Video Games 8-bit"> <br>';
				break;	
		}
	}
	echo "<br>";
}


echo "</div></span></font></span></font></body></html>";
?>