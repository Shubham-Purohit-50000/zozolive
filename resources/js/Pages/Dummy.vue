<template>
    <div>
     
    </div>
</template>

<script>
import EventBus from '../event-bus';
export default {
    name: "Dummy",
    components: {
      
    },
    emits:['project-created'],
    
    data() {
        return {
            
        };
    },
    created() {
        EventBus.on('project-created', (value) => {
			console.log('bc');
            EventBus.emit('host-page', true);
		});
    },
  
};
</script>

<style>
.album_photo {
    width: 200px;
    padding: 20px 0px;
    margin-right: 20px;
}
.photo_album_area {
    display:none;
}
.mt-3rem {
    margin-top: 0px;
}
.badge-pill {
    background-color: #a2262e;
}
.font-size-14 {
    font-size: 14px;
}
.dropdown-menu-arrow::before {
    display: none
}
.stream__offline--text {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
    color: var(--primary);
}
</style>
<style scoped>
.ticket_show {
    position: absolute;
    /* position: absolute; */
    /* position: relative; */
    text-align: center;
    align-items: center;
    justify-content: center;
    left: 0;
    right: -20px;
   top:0;
   bottom: 0;
    font-size: 70px;
    background: #000;
    opacity: .9;
    height: 580px;
}
.ticket_show i{
    position: absolute;
    left: 0;
    right: 0;
    top: 10%;
}
.ticket_show h4{ 
    position: absolute;
    left: 0;
    right: 0;
    top: 25%;
}
.ticket_show .btn{ 
    position: relative;
    left: 0;
    right: 0;
    top: 15%;
    width: 200px;
    z-index: 999;
}
.btn-live {
    color: #fff;
}

.action_box {
    display: flex;
    color: #958d8d;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    background: transparent;
    font-weight: 500;
    font-size: 14px;
    position: absolute;
    width: 100%;
    bottom: 0;
}
.progress {
    background-color: #3f3838;
    height: 30px;
    display: block;
}
.p-absolute {
    position: absolute;
}

.bg-progress {
    background-color: #91102e;
    height: 100%;
}


/*Chrome*/
@media screen and (-webkit-min-device-pixel-ratio:0) {
    input[type='range'] {
      overflow: hidden;
      width: 80px;
      -webkit-appearance: none;
      background-color: #9a905d;
    }
    
    input[type='range']::-webkit-slider-runnable-track {
      height: 10px;
      -webkit-appearance: none;
      color: #a2262e;
      margin-top: -1px;
    }
    
    input[type='range']::-webkit-slider-thumb {
      width: 10px;
      -webkit-appearance: none;
      height: 10px;
      cursor: ew-resize;
      background: #434343;
      box-shadow: -80px 0 0 80px #a2262e;
    }

}
/** FF*/
input[type="range"]::-moz-range-progress {
  background-color: #a2262e; 
}
input[type="range"]::-moz-range-track {  
  background-color: #9a905d;
}
/* IE*/
input[type="range"]::-ms-fill-lower {
  background-color: #a2262e; 
}
input[type="range"]::-ms-fill-upper {  
  background-color: #9a905d;
}

.action_box .like {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.action_box .like i {
    font-size: 20px;
    margin-right: 9px;
    cursor: pointer;
}

.action_box .private button {
    margin-bottom: 0px;
    border: 2px solid #a1a1a1;
    border-radius: 20px;
    padding: 5px 15px;
    background: #821e25;
    color: #fff;
}
.action_box .private button:hover{
     background: #821e25 !important;
}

.action_box .tip button {
    margin-bottom: 0px;
    border: 2px solid #a1a1a1;
    border-radius: 20px;
    padding: 5px 15px;
    background: #79943d;
    color: #fff;
}

.bi-heart-fill {
    color: #ff2c3a;
}

.hostPageTabs li button {
    color: #a4a4a4;
    font-weight: 500;
    font-size: 16px;
    background: none;
}

.font-size-16 {
    font-size: 25px;
}
.hostPageTabs li button.active {
    background: none;
    color: #fff;
}

.hostPageTabs li button:hover {
    color: #fff;
}

.hostPageTabs {
    border-bottom: none;
}

.player {
    width: 100%;
    height: 500px;
}

.hostPageTabs li button.active {
    background: none;
    color: #fff;
}

.hostPageTabs li button:hover {
    color: #fff;
}

.hostPageTabs {
    border-bottom: none;
}

#sendtipModal .modal-header {
    background: #212121;
    border-radius: 0px;
    padding: 10px 15px;
}

#sendtipModal .card-header {
    background: #000001;
    border-radius: 0px;
    padding-top: 5px;
}

.token_box label {
    background: #191919;
    padding: 8px;
    font-size: 18px;
    font-weight: 600;
    min-width: 60px;
    text-align: center;
    border-radius: 12px;
    cursor: pointer;
}
.border-dark {
    border: 2px solid #396220 !important;
}

.token_box ul {
    padding-inline-start: 0px;
    display: flex;
    overflow-x: scroll;
}

.token_box ul li {
    list-style: none;
    margin-top: 15px;
    margin-right: 15px;
    margin-bottom: 15px;
}

.token_box input {
    width: 75%;
    margin-left: 15px;
    height: 45px;
    border-radius: 27px;
    background: #000;
    border-color: #000;
    color: #fff;
    text-align: center;
}

.token_box button {
    margin-bottom: 0px;
    border: 2px solid #a1a1a1;
    border-radius: 20px;
    padding: 10px 25px;
    background: #79943d;
    color: #fff;
    margin-left: 0px;
}

#remote-playerlist {
    height: 100%;
}

.full-screen {
    position: absolute;
    width: 100%;
    top: 5px;
    right: 16px;
    display: flex;
    justify-content: flex-end;
    align-items: center;
}

#full-screen-btn {
    cursor: pointer;
}

/* .header {
    min-height: 150px;
} */

#fileinput1 {
    display: none;
}

.fileClass {
    display: inline-block;
    border: 3px solid green;
    border-radius: 20px;
    padding: 3px 10px;
    font-size: 12px;
}

.profile {
    text-decoration: none;
    border: none;
    background: none;
    color: white;
}

.level {
    text-decoration: none;
    border: none;
    background: none;
    color: white;
    margin-left: 3rem;
}

.profilebackgroundImage {
    background-image: url("/img/host_cover.jpg");
    border-top-left-radius: calc(0.42rem - 1px);
    border-top-right-radius: calc(0.42rem - 1px);
    height: 30rem;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    padding: 0;
    position: relative;
}

.header-content {
    display: flex;
    position: absolute;
    bottom: 0;
    /* left: 0; */
    background: #222222;
    width: 100%;
    height: 5rem;
}

.circleModal {
    position: absolute;
    bottom: 20%;
    width: 8rem;
    height: 8rem;
    border-radius: 50%;
    background-color: #26272b;
    border: 6px solid #9f9f9f;
    /* margin-left: 10px; */
    font-size: 10px;
    line-height: 80px;
    text-align: center;
    margin: auto;
}

.informationDiv {
    background-color: #26272b;
    width: 40%;
    padding: 1rem 1rem;
}


#showVolumeBtn {
    display: none;
}
.PrfileDiv2 {
    background-color: #26272b;
    width: 60%;
    padding: 1rem 1rem;
}
.PrfileDiv2 .profile__img {
    width: 10rem;
    height: 6rem;
    object-fit: cover;
}
.user__avatar {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
}
.profile__img_actions {
    margin-top: 1rem;
}
.profile__img_actions button {
    background: var(--primary);
    border-radius: 2rem;
    padding: 0.3rem 1.3rem;
}
#profileModal .modal-dialog{
  max-width: 100%;
}

@media (max-width: 700px) {
    .video-group {
    min-height: 200px;
}
.mt-3rem {
    margin-top: 3rem !important;
}
}

</style>
