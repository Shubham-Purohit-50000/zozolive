<template>
    <h2 class="left-align">Get started with interactive live streaming</h2>
    <div class="row">
        <div>
            <input type="radio" id="host" name="joinAs" value="host" />
            <label>Host</label><br />
            <input type="radio" id="Audience" name="joinAs" value="audience" />
            <label>Audience</label><br />
            <button type="button" id="join">Join</button>
            <button type="button" id="leave">Leave</button>
        </div>
    </div>
</template>

<script>
export default {
    mounted(){
        AgoraRTC.createClient({
            clientRoleOptions: {

            },
            mode:{
                
            }
        })
    }
};
</script>

<style></style>
