<?php

$gamename = $_GET['f'];


$links = file_get_contents('_project.htm');
echo $links;	

echo '<link href="'.$gamename.'/projectStyle.css" rel="stylesheet" type="text/css">';
echo '<font face="Helvetica, Arial" font="" size="3">';

$xml = simplexml_load_file($gamename."/data.xml");
foreach( $xml->children() as $child )
{
	switch( $child->getName() )
	{
		case("name"):
			echo "<b>".$child."</b> <br>";
			break;		
		case("sourcecode"):
			echo  '<a href="'.$child.'">Source code available.</a><br>';
			break;	
		case("download"):
			foreach( $child->children() as $dl ) {
				echo  '<a href="'.$dl.'">Download this game for: '.$dl->getName().'</a><br>';
			}
			break;	
		case("informations"):
			foreach( $child->children() as $info ) {
				echo $info.'<br>';
			}
			break;				
		case("credits"):
			echo 'Credits<br>';
			foreach( $child->children() as $credit ) {
				/*echo 'Name: '.$credit->{'name'}.'Web: '.$credit->{'website'}.'role: '.$credit->{'role'}  ;*/
				echo  '<a href="'.$credit->{'website'}.'">'.$credit->{'name'}.'</a> '.$credit->{'role'}.' <br>';
			}
			break;	
		case("links"):
			echo '<br>&nbsp<br>';
			echo 'Links<br>';
			foreach( $child->children() as $links ) {
				echo  '<a href="'.$links->{'web'}.'">'.$links->{'name'}.'</a><br>';
				echo '<br>';
			}
			break;							
		case("image"):
			
			echo '<img src="'.$gamename.'/'.$child.'" alt="InitialsLogo Video Games Retro Video Games 8-bit"> <br>';
			
			break;	

		case("screenshots"):
			echo '<div class="screenies_media">';
			echo '<div class="wrapper">';
			echo '<div class="screenies">';

			if ($handle = opendir($gamename.'/screenshots')) {
				while (false !== ($entry = readdir($handle))) {
					if ($entry != "." && $entry != ".." && substr($entry,0,1) != "_" && substr($entry,-4) != ".log" && substr($entry,0,6) != "images" && substr($entry,0,8) != "trailers" && substr($entry,0,9) != "error_log") {
						
						echo '<a href="'.$gamename.'//screenshots//'.$entry.'"><img src="'.$gamename.'//screenshots//'.$entry.'" /></a>';
						

					}
					
				}

			}

			closedir($handle);
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '<br>';
			break;
	}
	echo "<br>";
}

echo '<a href="index.php">Back to main</a>';

echo "</div></span></font></span></font></body></html>";
?>