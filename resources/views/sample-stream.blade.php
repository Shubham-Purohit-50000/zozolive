<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Basic Live -- Agora</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="./index.css"> --}}
    <style>
        .sso-hidden {
            display: block;
        }

        .banner {
            padding: 0;
            background-color: #52575c;
            color: white;
        }

        .banner-text {
            padding: 8px 20px;
            margin: 0;
        }


        #join-form {
            margin-top: 10px;
        }

        .tips {
            font-size: 12px;
            margin-bottom: 2px;
            color: gray;
        }

        .join-info-text {
            margin-bottom: 2px;
        }

        input {
            width: 100%;
            margin-bottom: 2px;
        }

        .player {
            width: 480px;
            height: 320px;
        }

        .player-name {
            margin: 8px 0;
        }

        #success-alert,
        #success-alert-with-token {
            display: none;
        }

        @media (max-width: 640px) {
            .player {
                width: 320px;
                height: 240px;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid banner">
        <p class="banner-text">Basic Live</p>
        <a style="color: rgb(255, 255, 255);fill: rgb(255, 255, 255);fill-rule: evenodd; position: absolute; right: 10px; top: 4px;"
            class="Header-link " href="https://github.com/AgoraIO/API-Examples-Web/tree/main/Demo">
            <svg class="octicon octicon-mark-github v-align-middle" height="32" viewBox="0 0 16 16" version="1.1"
                width="32" aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z">
                </path>
            </svg>
        </a>
    </div>

    <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congratulations!</strong><span> You can invite others to watch your live by click </span><a
            href="" target="_blank">here</a>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="container">
        <form id="join-form" name="join-form">
            <div class="row join-info-group">
                <div class="col-sm sso-hidden">
                    <p class="join-info-text">AppID</p>
                    <input id="appid" type="text" placeholder="enter appid">
                    <p class="tips">If you don`t know what is your appid, checkout <a
                            href="https://docs.agora.io/en/Agora%20Platform/terms?platform=All%20Platforms#a-nameappidaapp-id">this</a>
                    </p>
                </div>
                <div class="col-sm sso-hidden">
                    <p class="join-info-text">Token(optional)</p>
                    <input id="token" type="text" placeholder="enter token">
                    <p class="tips">If you don`t know what is your token, checkout <a
                            href="https://docs.agora.io/en/Agora%20Platform/terms?platform=All%20Platforms#a-namekeyadynamic-key">this</a>
                    </p>
                </div>
                <div class="col-sm">
                    <p class="join-info-text">Channel</p>
                    <input id="channel" type="text" placeholder="enter channel name" required>
                    <p class="tips">If you don`t know what is your channel, checkout <a
                            href="https://docs.agora.io/en/Agora%20Platform/terms?platform=All%20Platforms#channel">this</a>
                    </p>
                </div>
                <div class="col-sm">
                    <p class="join-info-text">User ID(optional)</p>
                    <input id="uid" type="text" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')"
                        onafterpaste="this.value=this.value.replace(/[^0-9]/g,'')" placeholder="Enter the user ID">
                </div>
            </div>

            <div class="button-group">
                <button id="host-join" type="submit" class="btn btn-primary btn-sm">Join as host</button>
                <div class="btn-group">
                    <button id="audience-join" type="button" class="btn btn-primary btn-sm" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Join as audience
                    </button>
                    <div class="audience dropdown-menu">
                        <a id="lowLatency" class="dropdown-item" label="Interactive Live Streaming Standard"
                            href="#">Interactive
                            Live Streaming Standard</a>
                        <a id="ultraLowLatency" class="dropdown-item" label="Interactive Live Streaming Premium"
                            href="#">Interactive Live Streaming Premium</a>
                    </div>
                </div>
                <button id="leave" type="button" class="btn btn-primary btn-sm" disabled>Leave</button>
            </div>

        </form>
        <!-- Single button -->
        <div class="row video-group">
            <div class="col">
                <p id="local-player-name" class="player-name"></p>
                <div id="local-player" class="player"></div>
            </div>
            <div class="w-100"></div>
            <div class="col">
                <div id="remote-playerlist"></div>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
    <script src="https://download.agora.io/sdk/release/AgoraRTC_N.js"></script>
    {{-- <script src="./basicLive.js"></script> --}}
    <script>
        // create Agora client
        var client = AgoraRTC.createClient({
            mode: "live",
            codec: "vp8"
        });
        var localTracks = {
            videoTrack: null,
            audioTrack: null
        };
        var remoteUsers = {};
        // Agora client options
        var options = {
            appid: null,
            channel: null,
            uid: null,
            token: null,
            role: "host",
            // host or audience
            audienceLatency: 2
        };

        // the demo can auto join channel with params in url
        $(() => {
            var urlParams = new URL(location.href).searchParams;
            options.appid = urlParams.get("appid");
            options.channel = urlParams.get("channel");
            options.token = urlParams.get("token");
            options.uid = urlParams.get("uid");
            if (options.appid && options.channel) {
                $("#uid").val(options.uid);
                $("#appid").val(options.appid);
                $("#token").val(options.token);
                $("#channel").val(options.channel);
                $("#join-form").submit();
            }
        });
        $("#host-join").click(function(e) {
            options.role = "host";
        });
        $("#lowLatency").click(function(e) {
            options.role = "audience";
            options.audienceLatency = 1;
            $("#join-form").submit();
        });
        $("#ultraLowLatency").click(function(e) {
            options.role = "audience";
            options.audienceLatency = 2;
            $("#join-form").submit();
        });
        $("#join-form").submit(async function(e) {
            e.preventDefault();
            $("#host-join").attr("disabled", true);
            $("#audience-join").attr("disabled", true);
            try {
                options.channel = $("#channel").val();
                options.uid = Number($("#uid").val());
                options.appid = $("#appid").val();
                options.token = $("#token").val();
                await join();
                if (options.role === "host") {
                    $("#success-alert a").attr("href",
                        `index.html?appid=${options.appid}&channel=${options.channel}&token=${options.token}`
                    );
                    if (options.token) {
                        $("#success-alert-with-token").css("display", "block");
                    } else {
                        $("#success-alert a").attr("href",
                            `index.html?appid=${options.appid}&channel=${options.channel}&token=${options.token}`
                        );
                        $("#success-alert").css("display", "block");
                    }
                }
            } catch (error) {
                console.error(error);
            } finally {
                $("#leave").attr("disabled", false);
            }
        });
        $("#leave").click(function(e) {
            leave();
        });
        async function join() {
            // create Agora client

            if (options.role === "audience") {
                client.setClientRole(options.role, {
                    level: options.audienceLatency
                });
                // add event listener to play remote tracks when remote user publishs.
                client.on("user-published", handleUserPublished);
                client.on("user-unpublished", handleUserUnpublished);
            } else {
                client.setClientRole(options.role);
            }

            // join the channel
            options.uid = await client.join(options.appid, options.channel, options.token || null, options.uid || null);
            if (options.role === "host") {
                // create local audio and video tracks
                if (!localTracks.audioTrack) {
                    localTracks.audioTrack = await AgoraRTC.createMicrophoneAudioTrack({
                        encoderConfig: "music_standard"
                    });
                }
                if (!localTracks.videoTrack) {
                    localTracks.videoTrack = await AgoraRTC.createCameraVideoTrack();
                }
                // play local video track
                localTracks.videoTrack.play("local-player");
                $("#local-player-name").text(`localTrack(${options.uid})`);
                $("#joined-setup").css("display", "flex");
                // publish local tracks to channel
                await client.publish(Object.values(localTracks));
                console.log("publish success");
            }
        }
        async function leave() {
            for (trackName in localTracks) {
                var track = localTracks[trackName];
                if (track) {
                    track.stop();
                    track.close();
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
            $("#joined-setup").css("display", "none");
            console.log("client leaves channel success");
        }
        async function subscribe(user, mediaType) {
            const uid = user.uid;
            // subscribe to a remote user
            await client.subscribe(user, mediaType);
            console.log("subscribe success");
            if (mediaType === 'video') {
                const player = $(`
      <div id="player-wrapper-${uid}">
        <p class="player-name">remoteUser(${uid})</p>
        <div id="player-${uid}" class="player"></div>
      </div>
    `);
                $("#remote-playerlist").append(player);
                user.videoTrack.play(`player-${uid}`, {
                    fit: "contain"
                });
            }
            if (mediaType === 'audio') {
                user.audioTrack.play();
            }
        }

        function handleUserPublished(user, mediaType) {
            //print in the console log for debugging 
            console.log('"user-published" event for remote users is triggered.');
            const id = user.uid;
            remoteUsers[id] = user;
            subscribe(user, mediaType);
        }

        function handleUserUnpublished(user, mediaType) {
            //print in the console log for debugging 
            console.log('"user-unpublished" event for remote users is triggered.');
            if (mediaType === 'video') {
                const id = user.uid;
                delete remoteUsers[id];
                $(`#player-wrapper-${id}`).remove();
            }
        }
    </script>

</body>

</html>
