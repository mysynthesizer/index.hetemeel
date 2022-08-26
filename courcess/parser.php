<style>
body{
	background: white;
	font-family: arial;
	font-size: 10px;
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
	font-size: 10px;
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
	left: 370px;
	top: 15px;
	background: rgba(255,255,255,0.7);
	paddind: 10px;
	border-radius: 5px;
	width: 50px;
	height: 30px;
	z-index: 100;
	text-align: center;
}
#b1{
	position: fixed;
	left: 320px;
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
<audio id=au src='zwon.mp3' controls></audio><br /><audio src='guitar-fight.mp3' controls loop></audio><br /><br />
<div id=b>300</div><div id=b1>0</div>
<table id=tbl border=1 cellpadding=5 cellspacing=0></table><br />
<div id=a></div>
<script>
let bt = b.textContent;
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
			document.scrollTop = document.scrollHeight;
			win = window.open('https://kwork.ru/projects/' + text1[0]);
		}
		n = text1[0];
		b1.textContent = text1[3];
		document.scrollTop = 3000;
	}else{b1.textContent = 0};
}
fetchData();
//setInterval(fetchData, 180000);
setInterval(function(){
	b.textContent --;
	if (b.textContent < 0) {
		b.textContent = bt;
		fetchData();
	}
}, 1000);
document.ondblclick=_=>window.scrollTop=100;
</script>