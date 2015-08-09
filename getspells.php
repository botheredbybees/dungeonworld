<?php


$json = file_get_contents("Wizard_Spells.json");

// This will remove unwanted characters.
// Check http://www.php.net/chr for details
for ($i = 0; $i <= 31; ++$i) { 
    $json = str_replace(chr($i), "", $json); 
}
$json = str_replace(chr(127), "", $json);

// This is the most common part
// Some file begins with 'efbbbf' to mark the beginning of the file. (binary level)
// here we detect it and we remove it, basically it's the first 3 characters 
if (0 === strpos(bin2hex($json), 'efbbbf')) {
   $json = substr($json, 3);
}

$json = json_decode( $json, true );
//print_r($json['Root']);
$title = $json['Root']['h1'];
echo '<h1>'.$title.'.</h1>';
$sections = $json['Root']['Body']['div'];
foreach($sections as $section) {
	echo '<h2>'.$section['h2'].'.</h2>';
	//echo '<p>'.$section['p'][0]['#text'].'.</p>';
	foreach($section['p'] as $spells) {
		if(isset($spells['span'])) {
			//print_r($spells['span']);
			echo('<h3>'.$spells['span']['#text'].'</h3>');
			//echo('<p>'.$spells['#text'].'</p>');
		}
		if(isset($spells['#text']) && !isset($spells['span']['#text'])) {
			echo('<p>'.$spells['#text'].'</p>');
		}
			
		//print_r($spells);
		
	}
}
// foreach ($json['Root'] as $rec) {
// 	//print_r($rec);
// 	if(count($rec) > 0) {
// 		foreach($rec as $record) {
// 			//print_r($record);
// 		}
// 	}
//}
?>