rty
<audio id=au src='zwon.mp3' controls></audio>
<div id=b>180</div><div id=a></div>
<script>
let n = 0;
async function fetchData() {
	const url = 'parsak.php';
	const response = await fetch(url);
	const text = await response.text();
	let text1 = text.split('&');
	console.log(text1);
	if (text1[0] != n) {
		n = text1[0];
		a.innerHTML += text1[0] + ' <a href="https://kwork.ru/projects/' + text1[0] + '">' + text1[1] + '</a><br />';
		au.play();
	}
}
fetchData();
//setInterval(fetchData, 180000);
setInterval(function(){
	b.textContent --;
	if (b.textContent < 0) {
		b.textContent = 180;
		fetchData();
	}
}, 1000);


</script>