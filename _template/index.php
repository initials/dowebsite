<?php
$links = file_get_contents('_index.htm');
echo $links;	


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


echo "</div></span></font></span></font></body></html>";
?>