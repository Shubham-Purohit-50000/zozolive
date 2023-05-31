class Processor {
    constructor() {
        this.video = document.getElementById("video");
        this.canvas = document.getElementById("canvas");
        this.context = this.canvas.getContext("2d");

        this.video.addEventListener(
            "play",
            () => {
                requestAnimationFrame(this.updateCanvas.bind(this));
            },
            false
        );
    }

    updateCanvas() {
        if (this.video.ended || this.video.paused) {
            return;
        }

        this.context.drawImage(
            this.video,
            0,
            0,
            this.video.width,
            this.video.height
        );

        requestAnimationFrame(this.updateCanvas.bind(this));
    }
}

export default new Processor();
