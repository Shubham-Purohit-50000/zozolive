<template>
    <div class="modal fade" id="loginModal" tabindex="-1">
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
                        <div class="card mb-3">
                            <div class="card-body formbody modal-body-all">
                                <div class="pt-8 pb-2">
                                    <h1
                                        class="card-title-modal-login text-center pb-0 fs-4 mb-0"
                                    >
                                        Log In
                                    </h1>
                                </div>

                                <form
                                    class="row g-3 needs-validation loginForm"
                                    novalidate=""
                                    @submit.prevent="loginUser"
                                >
                                    <div class="col-12">
                                        <!-- <label for="yourUsername" class="form-label">Username</label> -->
                                        <!-- <div class="input-group has-validation"> -->
                                        <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                                        <input
                                            type="text"
                                            name="username"
                                            class="form-control modal-input"
                                            placeholder="Username or Email"
                                            v-model="form.username"
                                            required=""
                                        />
                                        <span
                                            v-show="errors && errors.username"
                                            class="error_msg ml-2"
                                            >{{
                                                errors && errors.username
                                                    ? errors.username.toString()
                                                    : ""
                                            }}</span
                                        >
                                        <!-- <div class="invalid-feedback">Please enter your username.</div> -->
                                        <!-- </div> -->
                                    </div>

                                    <div class="col-12">
                                        <!-- <label for="yourPassword" class="form-label">Password</label> -->
                                        <input
                                            type="password"
                                            name="username"
                                            class="form-control modal-input"
                                            placeholder="Please enter your password"
                                            v-model="form.password"
                                            required=""
                                        />

                                        <!-- <input type="password" name="password" class="form-control" id="yourPassword" required=""> -->
                                        <!-- <div class="invalid-feedback">Please enter your password!</div> -->
                                        <span
                                            v-show="errors && errors.password"
                                            class="error_msg ml-2"
                                            >{{
                                                errors && errors.password
                                                    ? errors.password.toString()
                                                    : ""
                                            }}</span
                                        >
                                    </div>

                                    <div class="col-12">
                                        <button
                                            @click="loginUser"
                                            class="btn btn-primary w-100 btn-login"
                                            type="submit"
                                        >
                                            Login
                                        </button>
                                    </div>
                                    <div
                                        class="col-12 mt-0"
                                        style="text-align: center"
                                    >
                                        <a
                                            href="#"
                                            class="forget"
                                            style="
                                                color: #a4a4a4;
                                                cursor: pointer;
                                                display: inline-block;
                                                padding-top: 5px;
                                                font-size: 0.9rem;
                                            "
                                            >Forgot password?</a
                                        >
                                    </div>

                                    <p
                                        class="text-center mt-100"
                                        style="color: #fff"
                                    >
                                        or Login with
                                    </p>
                                    <div
                                        class="socialBox col-md-12 d-flex align-items-center justify-content-between"
                                    >
                                        <div>
                                            <a
                                                class="btn btn-primary w-100 btn-login withoutEmail"
                                                href="/google/auth"
                                            >
                                                <i class="bi bi-google"></i>
                                                Google
                                            </a>
                                        </div>
                                        <div>
                                            <a
                                                class="btn btn-primary w-100 btn-login withoutEmail"
                                                href="/facebook/auth"
                                            >
                                                <i class="bi bi-facebook"></i>
                                                Facebook
                                            </a>
                                        </div>
                                    </div>
                                    <!-- <div class="col-12 mt-1">
                                        <p
                                            class="small mb-0 text-center alreadyAcc mt-0"
                                        >
                                            <a
                                                class="btn btn-primary w-100 btn-login withoutEmail mt-0"
                                                href="javascript:void(0)"
                                                @click="guestLogin"
                                                >Guest Login</a
                                            >
                                        </p>
                                    </div> -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import firebase from "@/firebase";

export default {
    data() {
        return {
            form: {
                username: "",
                password: "",
            },
            errors: null,
        };
    },
    methods: {
        loginUser() {
            this.errors = null;
            axios
                .post("/api/login-user", this.form)
                .then((res) => {
                    if (res.status == 200 && res.data.url) {
                        const db = firebase.database();
                        const ref = db.ref("user-online-status");
                        ref.child(res.data.user_id).set({
                            is_online: true,
                            updated_at: new Date().toLocaleString(),
                        });
                        window.location.href = res.data.url;
                    }
                })
                .catch((err) => {
                    this.errors = err?.response?.data?.errors;
                });
        },
        guestLogin() {
            this.errors = null;
            axios
                .post("/guest-login")
                .then((res) => {
                    if (res.status == 200 && res.data.url) {
                        window.location.href = res.data.url;
                    }
                })
                .catch((err) => {
                    if (err.response.data.errors) {
                        this.errors = err.response.data.errors;
                    } else {
                        this.errors = err.response.data?.msg;
                    }
                });
        },
    },
};
</script>
