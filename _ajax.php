<?php
include './_conf.php'; // getting constants

if(isset($_POST['aID'])){
	$aID = $_POST['aID']; // let's put album id here so it is easie to use later
	$file = file_get_contents('http://picasaweb.google.com/data/feed/api/user/'.$uName.'/albumid/'.$aID.'?kind=photo&access=public&thumbsize=72c&imgmax='.$maxSize); // get the contents of the album
	$xml = new SimpleXMLElement($file); // convert feed into simplexml object
	$xml->registerXPathNamespace('media', 'http://search.yahoo.com/mrss/'); // define namespace media
	foreach($xml->entry as $feed){ // go over the pictures
		$group = $feed->xpath('./media:group/media:thumbnail'); // let's find thumbnail tag
		$description = $feed->xpath('./media:group/media:description');
		if(str_word_count($description[0]) > 0){ // if picture has description, we'll use it as title
			$description = $feed->title. ": ". $description[0]; // file name appended by image captioning
		}else{
			$description =$feed->title; // if not will use file name as title
		}
		$a = $group[0]->attributes(); // now we need to get attributes of thumbnail tag, so we can extract the thumb link
		$b = $feed->content->attributes(); // now we convert "content" attributes into array
		echo '<a rel="'.$aID.'" href="'.$b['src'].'" title="'.$description.'"><img src="'.$a['url'].'" alt="'.$feed->title.'" width="'.$a['width'].'" height="'.$a['height'].'"/></a>';
	}
}else{
	echo 'Error! Please provide album id.';
}
