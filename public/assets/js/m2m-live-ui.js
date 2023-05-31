// Mute audio click
$("#mic-btn").click(function (e) {
    if (localTrackState.audioTrackEnabled) {
        muteAudio();
    } else {
        unmuteAudio();
    }
});

// Mute video click
$("#video-btn").click(function (e) {
    if (localTrackState.videoTrackEnabled) {
        muteVideo();
    } else {
        unmuteVideo();
    }
});

// Hide mute buttons
function hideMuteButton() {
    $("#video-btn").css("display", "none");
    $("#mic-btn").css("display", "none");
}

// Show mute buttons
function showMuteButton() {
    $("#video-btn").css("display", "inline-block");
    $("#mic-btn").css("display", "inline-block");
}

// Mute audio function
async function muteAudio() {
    if (!localTracks.audioTrack) return;
    await localTracks.audioTrack.setEnabled(false);
    localTrackState.audioTrackEnabled = false;
    $("#mic-btn").text("Unmute Audio");
}

// Mute video function
async function muteVideo() {
    if (!localTracks.videoTrack) return;
    await localTracks.videoTrack.setEnabled(false);
    localTrackState.videoTrackEnabled = false;
    $("#video-btn").text("Unmute Video");
}

// Unmute audio function
async function unmuteAudio() {
    if (!localTracks.audioTrack) return;
    await localTracks.audioTrack.setEnabled(true);
    localTrackState.audioTrackEnabled = true;
    $("#mic-btn").text("Mute Audio");
}

// Unmute video function
async function unmuteVideo() {
    if (!localTracks.videoTrack) return;
    await localTracks.videoTrack.setEnabled(true);
    localTrackState.videoTrackEnabled = true;
    $("#video-btn").text("Mute Video");
}
