<?php
@$razmetka_html = file_get_contents('https://kwork.ru/projects');
//echo $razmetka_html;
@$dom = new DOMDocument;
@$dom -> loadHTML($razmetka_html);
@$tegi = $dom -> getElementsByTagName("div");
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
			$ytr = substr($aa[0] -> getAttribute('href'), 26, 33);
			$sdf = $aa[0] -> nodeValue;
			echo $ytr . '&' . $sdf;
	//	}
		}
	}
//	echo '<hr>\r\n';
}
?>