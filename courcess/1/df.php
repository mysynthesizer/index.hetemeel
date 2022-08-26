<?php
@$razmetka_html = file_get_contents('https://kwork.ru/projects');
//echo $razmetka_html;
@$dom = new DOMDocument;
@$dom->loadHTML($razmetka_html);
@$tegi = $dom->getElementsByTagName("div");
$resolution = true;
foreach ($tegi as $teg) {
	$temp = $teg -> getAttribute('class');
	if($temp == "wants-card__left"){
		if($resolution == true){
			$resolution = false;
			$aa = $teg -> getElementsByTagName("a");
	//	for($i=0; $i < count($aa); $i ++){
	//		echo $aa[0] -> getAttribute('href') . "<br>\r\n";
			$rty = substr($aa[0] -> getAttribute('href'), 0, 26);
			$ytr = substr($aa[0] -> getAttribute('href'), 27, 33);
			echo $ytr . "<br>\r\n";
	//	}
		}
	}
//	echo '<hr>\r\n';
}

/*
@$razmetka_html = file_get_contents('http://www.nostalgie.fr/playlists/playlist-nostalgie');
@$dom = new DOMDocument;
@$dom->loadHTML($razmetka_html);
@$tegi = $dom->getElementsByTagName("ul");
foreach ($tegi as $teg) {
	$myclass = $teg->getAttribute('class');
	if($myclass == "list-tracks"){
		$allli=$teg->getElementsByTagName("li");
		foreach ($allli as $myli) {
			$alldiv=$myli->getElementsByTagName("div");
			foreach ($alldiv as $div1) {
				$mydiv=$div1->getElementsByTagName("div");
				foreach ($mydiv as $div2) {
					$myp=$div2->getElementsByTagName("p");
					foreach ($myp as $myvalue) {
						$cl=$myvalue->getAttribute('class');
						if($cl == "track-artist"){
							echo "<b>".$myvalue->nodeValue."</b>&nbsp;&nbsp;&nbsp;";
						}else{
							echo "<font color='blue'>".$myvalue->nodeValue."</font><br>";
						}
					}
				}
			}	
		}
	}
}
*/
?>