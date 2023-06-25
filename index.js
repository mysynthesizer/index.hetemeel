(function () {
    let url = null;

 //   const audioplayer = new Audioplayer();

    function uploadFiles() {
        const elFile = document.querySelector("#file");

        elFile.addEventListener("change", (e) => {
            const file = e.target.files[0];

            url = window.URL.createObjectURL(file);
        });
    }

    function setPlayAudio() {
        const elBtnPlay = document.querySelector(".btn-play");

        elBtnPlay.addEventListener("click", () => {
            audioplayer.play = !audioplayer.play;

            if (url) {
               // audioplayer.playAudio(url);
                elFile.play(url);
            }
            
        });
    }

    uploadFiles();
    setPlayAudio();
}());

class Audioplayer {
    constructor() {
        this.elAudio = document.createElement("audio");
        this.elCanvasAnim = document.querySelector(".audio-player__anim-canvas");

        this.play = false;
        this.animIsActive = false;
        this.audioAnalyser = null;
    }

    playAudio(audioSrc) {
        if (audioSrc !== this.elAudio.src) {
            this.elAudio.src = audioSrc;
            this.play = true;
        }

        const promise = fetch(audioSrc)
            .then((res) => res.blob())
            .then(() => this.elAudio.play());

        if (promise !== undefined) {
            promise
                .then(() => {
                    if (this.play) {
                        this.elAudio.play();

                        const ctx = new (window.AudioContext || window.webkitAudioContext)();
                        const source = ctx.createMediaElementSource(this.elAudio);

                        this.audioAnalyser = ctx.createAnalyser();

                        this.audioAnalyser.connect(ctx.destination);

                        source.connect(ctx.destination);
                        source.connect(this.audioAnalyser);

                        if (!this.animIsActive) {
                            this.animIsActive = true;

                            this._setAudioBarsAnim();
                        }
                    } else {
                        this.elAudio.pause();
                    }
                }).catch((err) => {
                    throw err;
                });
        }
    }

    _setAudioBarsAnim() {
        const canvas = this.elCanvasAnim;
        const ctx = canvas.getContext("2d");
        const countLinesOnArea = 250;
        const widthLine = canvas.offsetWidth / countLinesOnArea;

        canvas.width = canvas.offsetWidth;
        canvas.height = canvas.offsetHeight;

        const drawBars = () => {
            const fbcArray = new Uint8Array(this.audioAnalyser.frequencyBinCount);

            this.audioAnalyser.getByteFrequencyData(fbcArray);

            ctx.clearRect(0, 0, canvas.offsetWidth, canvas.offsetHeight);

            fbcArray.slice(0, countLinesOnArea).forEach((n, i) => {
                const x = i * widthLine;
                const percent = Math.ceil((n / 255) * 100);
                const height = (percent * canvas.offsetHeight) / 100;

                ctx.fillStyle = "white";
                ctx.fillRect(x, canvas.offsetHeight - height, widthLine, height);
            });

            (window.requestAnimationFrame || window.webkitRequestAnimationFrame)(drawBars);
        };

        drawBars();
    }
}
