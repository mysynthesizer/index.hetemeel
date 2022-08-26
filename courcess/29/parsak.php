<?php
$myarray=Array();
$host = 'localhost';
$user = 'root';
$password = 'root';
$database = 'rty';

$link = mysqli_connect($host,$user,$password,$database);
if (!$link) {
    die('Connection error: ' . mysqli_connect_error());
}

$a = mysqli_query($link, 'SELECT `id`, `n`, `txt`, `dat` FROM `rty`');
//$tbl = '';
while ($row = mysqli_fetch_array($a)) {
	$n = $row['n'];
//	echo $n;
	array_push($myarray, $n);
//	$tbl .= '<tr><td>'.$row['id'].'</td><td><a href="https://kwork.ru/projects/'.$row['n'].'/view">'.$row['n'].'</a></td><td>'.$row['txt'].'</td><td>'.$row['dat'].'</td></tr>';
}

//echo $tbl;

//print_r($myarray);
$fds = $myarray[count($myarray)-1];
//echo $fds;

//$n = $_GET['n'];
@$razmetka_html = file_get_contents('https://kwork.ru/projects');
//echo $razmetka_html;
@$dom = new DOMDocument;
@$dom -> loadHTML($razmetka_html);
@$tegi = $dom -> getElementsByTagName("div");
$resolution = true;
$array = Array();$array1 = Array();
//print_r($array);
foreach ($tegi as $teg) {
	$temp = $teg -> getAttribute('class');
	if($temp == "wants-card__left"){
		if($resolution == true){
	//		$resolution = false;
			$aa = $teg -> getElementsByTagName("a");
	//	for($i=0; $i < count($aa); $i ++){
	//		echo $aa[0] -> getAttribute('href') . "<br>\r\n";
			$rty = substr($aa[0] -> getAttribute('href'), 0, 26);
			$ytr = substr($aa[0] -> getAttribute('href'), 26, 33);
			$sdf = $aa[0] -> nodeValue;
	//		echo $ytr . '&' . $sdf;
			array_push($array, $ytr);
			array_push($array1, $sdf);
	//		echo $ytr . "<br>\r\n";
	//	}
		}
	}
}
$ytr1=$array[0];
$sdf1=$array1[0];
//echo $ytr;

if ($ytr1 != $fds){
//	mysqli_query($link, "INSERT INTO `rty`(`id`, `n`, `txt`, `dat`) VALUES ('0','$ytr','$sdf',NOW())");
	$ii = array_search($fds, $array);
	if (!$ii){
		mysqli_query($link, "INSERT INTO `rty`(`id`, `n`, `txt`, `dat`) VALUES ('0','$ytr1','$sdf1', NOW())");
	}else{
		for($i = 0; $i < $ii; $i ++){
			$iii = $ii - 1 - $i;
			mysqli_query($link, "INSERT INTO `rty`(`id`, `n`, `txt`, `dat`) VALUES ('0','$array[$iii]','$array1[$iii]', NOW())");
		}
	}
}

$a = mysqli_query($link, 'SELECT `id`, `n`, `txt`, `dat` FROM `rty`');
$tbl = '';
while ($row = mysqli_fetch_array($a)) {
	$n = $row['n'];
//	echo $n;
	array_push($myarray, $n);
	$tbl .= '<tr><td>'.$row['id'].'</td><td><a href="https://kwork.ru/projects/'.$row['n'].'/view">'.$row['n'].'</a></td><td>'.$row['txt'].'</td><td>'.$row['dat'].'</td></tr>';
}

mysqli_close($link);

echo $ytr1 . '&' . $sdf1 . '&' . $tbl;

//print_r($array);
//echo $array[3];
//echo array_search(1683105, $array);


//@$razmetka_html = file_get_contents('https://ru.stackoverflow.com/questions/tagged/javascript');
//echo $razmetka_html;
//@$dom = new DOMDocument;
//@$dom -> loadHTML($razmetka_html);
//@$tegi = $dom -> getElementsByTagName("div");






//$a = mysqli_query($link, 'SELECT `id`, `n`, `txt`, `dat` FROM `rty`');
///$tbl = '';
//while ($row = mysqli_fetch_array($a)) {
//	$nn = $row['n'];
//	$tbl .= '<tr><td>'.$row['id'].'</td><td><a href="https://kwork.ru/projects/'.$row['n'].'/view">'.$row['n'].'</a></td><td>'.$row['txt'].'</td><td>'.$row['dat'].'</td></tr>';
//}

//if ($nn != $n and $n != 0){
//	mysqli_query($link, "INSERT INTO `rty`(`id`, `n`, `txt`, `dat`) VALUES ('0','$ytr','$sdf',NOW())");
//}


//if ($nn != $n) mysqli_query($link, "INSERT INTO `rty`(`id`, `n`, `txt`, `dat`) VALUES ('0','$ytr','$sdf',NOW())");
//$tbl .= '</table>';
//mysqli_close($link);
//echo $ytr . '&' . $sdf . '&' . $tbl;

?>