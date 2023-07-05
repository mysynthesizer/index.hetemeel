//const URL = 'voice.php';
let div = document.createElement('div');
div.id = 'messages';
let start = document.createElement('button');
start.id = 'start';
start.innerHTML = 'Start1';
let stop = document.createElement('button');
stop.id = 'stop';
stop.innerHTML = 'Stop';
stop.disabled=true;
document.body.appendChild(div);
document.body.appendChild(start);
document.body.appendChild(stop);
navigator.mediaDevices.getUserMedia({ audio: true})
    .then(stream => {
        const mediaRecorder = new MediaRecorder(stream);

        document.querySelector('#start').addEventListener('click', function(){
            mediaRecorder.start();
start.disabled=true;
        stop.disabled=false;   

setTimeout(function(){stop.click()},5000);
            
        });
      audioChunks = [];
        mediaRecorder.addEventListener("dataavailable",function(event) {
    let rrr=Uint8Array(event.data);
            console.log(event.data);
console.log(rrr);

            
            audioChunks.push(event.data);
  console.log(audioChunks);
            //      alert(audioChunks[0].type);
            audioChunks[0].type="audio/wav";
//alert(audioChunks[0].type);

            
        });
        
        document.querySelector('#stop').addEventListener('click', function(){
            mediaRecorder.stop();
            start.disabled=false;
            stop.disabled=true;
        });

        mediaRecorder.addEventListener("stop", function() {
 console.log("77"+audioChunks.length);
  console.log(Array.isArray(audioChunks));
            //    alert(audioChunks.length);
            const audioBlob = new Blob(audioChunks, {
                type: 'audio/wav'
            });
au.src=mya.href=URL.createObjectURL(audioBlob);
  au.play();
            mya.download="rty";
      //      let fd = new FormData();
       //     fd.append('voice', audioBlob);
     //       sendVoice(fd);
           audioChunks = [];
        });
    });
//au.onended=function(){start.click()};
async function sendVoice(form) {
    let promise = await fetch(URL, {
        method: 'POST',
        body: form});
    if (promise.ok) {
        let response =  await promise.json();
        console.log(response.data);
        let audio = document.createElement('audio');
        audio.src = response.data;
        audio.controls = true;
        audio.autoplay = true;
        document.querySelector('#messages').appendChild(audio);
    }
}
let trewq={
rty: "ytr",
sdf: 323
        };
alert(trewq.rty);
trewq.rty="qwert";
alert(trewq.rty);
console.log(trewq);
