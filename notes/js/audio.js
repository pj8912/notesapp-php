URL = window.URL || window.webkitURL

var gumStream;
var rec;
var input;

var AudioContext = window.AudioContext || window.webkitAudioContext;
var audioContext;

var recordButton = document.getElementById("recordButton");
var stopButton = document.getElementById("stopButton");
var pauseButton = document.getElementById("pauseButton");

recordButton.addEventListener("click", startRecording);
stopButton.addEventListener("click", stopRecording);

pauseButton.addEventListener("click", pauseRecording);

stopButton.style.display = "none";
pauseButton.style.display = "none";


function startRecording() {
    document.getElementById('recordingList').innerHTML = "";
    var constrains = { audio: true, video: false }
    recordButton.disabled = true;
    recordButton.style.display = "none";
    stopButton.disabled = false;
    pauseButton.disabled = false;

    stopButton.style.display = "block";
    pauseButton.style.display = "block"

    navigator.mediaDevices.getUserMedia(constrains).then(function(stream) {
            audioContext = new AudioContext();
            gumStream = stream;
            input = audioContext.createMediaStreamSource(stream);

            rec = new Recorder(input, { numChannels: 1 })
            rec.record()
            console.log("Recording started!!");
        })
        .catch((err) => {
            recordButton.disabled = false;
            stopButton.disabled = true;
            pauseButton.disabled = true;

        })
}

function pauseRecording() {
    if (rec.recording) {
        rec.stop()
        pauseButton.innerHTML = "Resume";
    } else {
        rec.record();
        pauseButton.innerHTML = "Pause";
    }
}

function stopRecording() {
    stopButton.disabled = true;
    recordButton.disabled = false;
    pauseButton.disabled = true;

    recordButton.style.display = "block";
    stopButton.style.display = "none";
    pauseButton.style.display = "none";


    pauseButton.innerHTML = "Pause";
    rec.stop();
    gumStream.getAudioTracks()[0].stop();
    rec.exportWAV(createDownloadLink);
}

function createDownloadLink(blob) {

    var url = URL.createObjectURL(blob);

    var au = document.createElement('audio');
    var li = document.createElement('li');
    var link = document.createElement('a');

    var filename = new Date().toISOString();

    au.controls = true;
    au.src = url;
    // au.style.width = "50%"
    //link.href = url;
    //link.download = filename+".wav";
    //link.innerHTML = "Save to disk";

    li.appendChild(au);
    //li.appendChild(document.createTextNode(filename+".wav "));
    //li.appendChild(link);
    var cancel = document.createElement('a')
    cancel.href = "#";
    // cancel.classList.add('btn');
    // cancel.classList.add('btn-default');
    cancel.classList.add('rounded-5');
    cancel.classList.add('m-3');
    cancel.innerHTML = `

	<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
</svg>

				 


	`;

    cancel.addEventListener("click", (event) => {
        li.innerHTML = "";

    });
    li.style.display = "flex";

    li.appendChild(cancel);

    //     var upload = document.createElement('a');
    //     upload.href = "#";
    //     upload.classList.add('btn');
    //     upload.classList.add('btn-success');
    //     upload.classList.add('rounded-5');
    //     upload.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-down" viewBox="0 0 16 16">
    //   <path fill-rule="evenodd" d="M3.5 10a.5.5 0 0 1-.5-.5v-8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 0 0 1h2A1.5 1.5 0 0 0 14 9.5v-8A1.5 1.5 0 0 0 12.5 0h-9A1.5 1.5 0 0 0 2 1.5v8A1.5 1.5 0 0 0 3.5 11h2a.5.5 0 0 0 0-1h-2z"/>
    //   <path fill-rule="evenodd" d="M7.646 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V5.5a.5.5 0 0 0-1 0v8.793l-2.146-2.147a.5.5 0 0 0-.708.708l3 3z"/>
    // </svg>Save Audio`;



    //     upload.addEventListener("click", function(event) {
    //         var xhr = new XMLHttpRequest();
    //         xhr.onload = function(e) {
    //             if (this.readyState === 4) {
    //                 console.log("Server returned");
    //             }
    //         };
    //         var fd = new FormData();
    //         fd.append("audio_data", blob, filename);
    //         xhr.open("POST", "upload_audio.php", true);
    //         xhr.send(fd);
    //         li.innerHTML = "";
    //     });


    //     li.appendChild(document.createTextNode(" "));
    //     li.appendChild(upload);




    recordingList.appendChild(li);
}