onmessage = function(e){
	let index = 0;
	let arr = e.data[0];
	let mylength = arr.length;
	let out = [[], []];
	for(i = 0; i < mylength; i ++){
		for(j = 0; j < e.data[1] - 1; j ++){
			while(out[1][index] = false){
				index ++;
				if(index >= mylength) index = 0;
			}
			index ++;
			if(index >= mylength) index = 0;
		}
		out[0][i] = arr[index];
		out[1][index] = false;
	}
	postMessage(out[0]);
}