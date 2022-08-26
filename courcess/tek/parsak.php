<?php
$n = $_GET['n'];
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
	//		echo $ytr . '&' . $sdf;
	//	}
		}
	}
//	echo '<hr>\r\n';
}




//@$razmetka_html = file_get_contents('https://ru.stackoverflow.com/questions/tagged/javascript');
//echo $razmetka_html;
//@$dom = new DOMDocument;
//@$dom -> loadHTML($razmetka_html);
//@$tegi = $dom -> getElementsByTagName("div");



$host = 'localhost';
$user = 'root';
$password = 'root';
$database = 'rty';

$link = mysqli_connect($host,$user,$password,$database);
if (!$link) {
    die('Connection error: ' . mysqli_connect_error());
}

$a = mysqli_query($link, 'SELECT `id`, `n`, `txt`, `dat` FROM `rty`');
$tbl = '';
while ($row = mysqli_fetch_array($a)) {
	$nn = $row['n'];
//	$tbl .= '<tr><td>'.$row['id'].'</td><td><a href="https://kwork.ru/projects/'.$row['n'].'/view">'.$row['n'].'</a></td><td>'.$row['txt'].'</td><td>'.$row['dat'].'</td></tr>';
}

if ($nn != $n and $n != 0){
	mysqli_query($link, "INSERT INTO `rty`(`id`, `n`, `txt`, `dat`) VALUES ('0','$ytr','$sdf',NOW())");
}

$a = mysqli_query($link, 'SELECT `id`, `n`, `txt`, `dat` FROM `rty`');
$tbl = '';
while ($row = mysqli_fetch_array($a)) {
//	$nn = $row['n'];
	$tbl .= '<tr><td>'.$row['id'].'</td><td><a href="https://kwork.ru/projects/'.$row['n'].'/view">'.$row['n'].'</a></td><td>'.$row['txt'].'</td><td>'.$row['dat'].'</td></tr>';
}

//if ($nn != $n) mysqli_query($link, "INSERT INTO `rty`(`id`, `n`, `txt`, `dat`) VALUES ('0','$ytr','$sdf',NOW())");
//$tbl .= '</table>';
mysqli_close($link);
echo $ytr . '&' . $sdf . '&' . $tbl;
?>