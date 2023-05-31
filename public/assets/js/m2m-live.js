// create Agora client
var client = AgoraRTC.createClient({
    mode: "live",
    codec: "vp8",
});
var localTracks = {
    videoTrack: null,
    audioTrack: null,
};
var localTrackState = {
    videoTrackEnabled: true,
    audioTrackEnabled: true,
};
var remoteUsers = {};
// Agora client options
var options = {
    token: "007eJxTYJjYZ61h/UzmUPaZBKXzHAfLo/Y+TjsRUF115fOM2NncvtIKDMlG5kamiWnmBuaJZiaJZqlJiSYWBmZppslJ5oZGqSmWRX+sUwT4GBiCQ7eyMjJAIIivwmBkYWZpmGJpqJtinmqga2KRaKCbaGaUpGuRlJSUaJZsZGBoaMrKYGhpaGAJADDJJsI=",
    appid: "c2725af707a64a6eba4806f5cb712ed9",
    channel: "test",
    uid: 34233,
    role: "audience", // host or audience
};

$("#host-join").click(function (e) {
    options.role = "host";
});

$("#audience-join").click(function (e) {
    options.role = "audience";
});

$("#join-form").submit(async function (e) {
    e.preventDefault();
    $("#host-join").attr("disabled", true);
    $("#audience-join").attr("disabled", true);
    try {
        options.appid = "c2725af707a64a6eba4806f5cb712ed9";
        options.channel = $("#channel").val();
        await join();
    } catch (error) {
        console.error(error);
    } finally {
        $("#leave").attr("disabled", false);
    }
});

$("#leave").click(function (e) {
    leave();
});

async function join() {
    // create Agora client
    client.setClientRole(options.role);
    $("#mic-btn").prop("disabled", false);
    $("#video-btn").prop("disabled", false);
    if (options.role === "audience") {
        $("#mic-btn").prop("disabled", true);
        $("#video-btn").prop("disabled", true);
        // add event listener to play remote tracks when remote user publishs.
        client.on("user-published", handleUserPublished);
        client.on("user-joined", handleUserJoined);
        client.on("user-left", handleUserLeft);
    }
    // join the channel
    options.uid = await client.join(
        options.appid,
        options.channel,
        options.token,
        options.uid
    );
    if (options.role === "host") {
        $("#mic-btn").prop("disabled", false);
        $("#video-btn").prop("disabled", false);
        client.on("user-published", handleUserPublished);
        client.on("user-joined", handleUserJoined);
        client.on("user-left", handleUserLeft);
        // create local audio and video tracks
        localTracks.audioTrack = await AgoraRTC.createMicrophoneAudioTrack();
        localTracks.videoTrack = await AgoraRTC.createCameraVideoTrack();
        showMuteButton();
        // play local video track
        localTracks.videoTrack.play("local-player");
        $("#local-player-name").text(`localTrack(${options.uid})`);
        // publish local tracks to channel
        await client.publish(Object.values(localTracks));
        console.log("Successfully published.");
    }
}

async function leave() {
    for (trackName in localTracks) {
        var track = localTracks[trackName];
        if (track) {
            track.stop();
            track.close();
            $("#mic-btn").prop("disabled", true);
            $("#video-btn").prop("disabled", true);
            localTracks[trackName] = undefined;
        }
    }
    // remove remote users and player views
    remoteUsers = {};
    $("#remote-playerlist").html("");
    // leave the channel
    await client.leave();
    $("#local-player-name").text("");
    $("#host-join").attr("disabled", false);
    $("#audience-join").attr("disabled", false);
    $("#leave").attr("disabled", true);
    hideMuteButton();
    console.log("Client successfully left channel.");
}

async function subscribe(user, mediaType) {
    const uid = user.uid;
    console.error("subscribing");
    // subscribe to a remote user
    await client.subscribe(user, mediaType);
    console.log("Successfully subscribed.");
    if (mediaType === "video") {
        const player = $(`
      <div id="player-wrapper-${uid}">
        <p class="player-name">remoteUser(${uid})</p>
        <div id="player-${uid}" class="player"></div>
      </div>
    `);
        $("#remote-playerlist").append(player);
        user.videoTrack.play(`player-${uid}`);
    }
    if (mediaType === "audio") {
        user.audioTrack.play();
    }
}

// Handle user published
function handleUserPublished(user, mediaType) {
    const id = user.uid;
    remoteUsers[id] = user;
    subscribe(user, mediaType);
}

// Handle user joined
function handleUserJoined(user, mediaType) {
    const id = user.uid;
    remoteUsers[id] = user;
    subscribe(user, mediaType);
}

// Handle user left
function handleUserLeft(user) {
    const id = user.uid;
    delete remoteUsers[id];
    $(`#player-wrapper-${id}`).remove();
}
