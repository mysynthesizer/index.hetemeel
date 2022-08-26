rty
<div id=b>180</div><div id=a></div>
<script>
async function fetchData() {
	const url = 'parsak.php';
	const response = await fetch(url);
	const text = await response.text();
	a.innerHTML += text;
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