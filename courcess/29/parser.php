<style>
body{
	background: white;
	font-family: arial;
}
#tbl{
	background: #ff8;
	border-radius: 10px;
	transition: 0.5s;
	border-color: blue;
	border-style: dotted;
	cursor: pointer;
}
#tbl:hover{
	background: pink;
	border-color: #0ff;
//	transition: 0.5s;
}
td{
	border-style: dashed;
	border-width: 3px;
	border-color: #8ff;
	border-radius: 10px;
//	color: #811;
//	background: #ff8;
	opacity: 0.8;
}
tr{
	transition: 0.5s;
	background: gold;
	color: #811;
}
tr:hover{
	border-color: black;
	color: red;
	background: white;
	transition: 0.5s;
}
#b{
	position: fixed;
	left: 350px;
	top: 15px;
	background: rgba(255,255,255,0.7);
	paddind: 10px;
	border-radius: 5px;
	width: 50px;
	height: 30px;
	z-index: 100;
	text-align: center;
}
</style>
<audio id=au src='zwon.mp3' controls></audio><br /><br />
<div id=b>180</div>
<table id=tbl border=1 cellpadding=10 cellspacing=0></table><br />
<div id=a></div>
<script>
let n = 0, win; 
async function fetchData() {
	const url = 'parsak.php?n=' + n;
	const response = await fetch(url);
	const text = await response.text();
	let text1 = text.split('&');
	if (text1[0] != n) {
		tbl.innerHTML = text1[2];
		a.innerHTML += text1[0] + ' <a href="https://kwork.ru/projects/' + text1[0] + '">' + text1[1] + '</a><br />';
		if (n) {
			au.play();
			win = window.open('https://kwork.ru/projects/' + text1[0]);
		}
		n = text1[0];
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