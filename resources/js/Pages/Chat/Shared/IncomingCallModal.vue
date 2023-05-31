<template>
    <div class="modal fade" id="incomingCall" tabindex="-1">
        <div class="modal-dialog modal-sm">
            <div class="modal-content" style="background: transparent">
                <div class="modal-header ps-0">
                    <button
                        type="button"
                        class="customClose"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    >
                        ×
                    </button>
                </div>

                <div class="modal-body modal-body-all">
                    <div
                        class="col-lg-12 col-md-12 d-flex flex-column align-items-center justify-content-center"
                    >
                        <div class="card row mb-3">
                            <div class="card-body modal-body-all">
                                <div class="col-md-12">
                                    <div class="row my-5" v-if="incomingCall">
                                        <div class="col-md-12 callBox">
                                            <p>
                                                Incoming Call From
                                                <strong>{{
                                                    incomingCaller
                                                }}</strong>
                                            </p>
                                            <span>Calling</span>
                                            <div
                                                class="btn-group actionBTN"
                                                role="group"
                                            >
                                                <button
                                                    type="button"
                                                    class="btn btn-danger"
                                                    data-dismiss="modal"
                                                    @click="$emit('decline')"
                                                >
                                                    Decline
                                                </button>
                                                <button
                                                    type="button"
                                                    class="btn btn-success ml-5"
                                                    @click="$emit('accept')"
                                                >
                                                    Accept
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    emits: ["decline", "accept"],
    props: {
        incomingCall: Boolean,
        incomingCaller: String,
    },
};
</script>

<style scoped>
#incomingCall .callBox {
    text-align: center;
    color: #fff;
}

#incomingCall .callBox p {
    color: #fff;
}

#incomingCall .callBox .actionBTN {
    display: flex;
}

#incomingCall .callBox .actionBTN button {
    margin: 10px;
    border-radius: 27px;
}
</style>
