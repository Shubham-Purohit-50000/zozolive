<template>
  <div class="modal fade" id="basicModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
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
        <div
            class="modal-body modal-body-all"
            style="border-radius: 1rem"
        >
          <div
              class="col-lg-12 col-md-12 d-flex flex-column align-items-center justify-content-center"
          >
            <div class="card mb-0 container-fluid bg-transparent">
              <div
                  class="card-body formbody modal-body-all row align-items-center"
                  style="border-radius: 1rem"
              >
                <div class="col-md-12 col-lg-6" style="padding: 30px">
                  <div class="pt-4 pb-2">
                    <h5
                        class="card-title-modal-login text-center pb-0 fs-4"
                    >
                      Create an Account
                    </h5>
                  </div>
                  <p class="error_msg text-center" v-show="guestError">{{ guestError }}</p>
                  <form
                      class="g-3 needs-validation"
                      @submit.prevent=""
                      novalidate=""
                  >
                    <div class="col-12">
                      <div
                          class="input-group has-validation modal-input usernameBox"
                      >
                        <input
                            placeholder="Username"
                            type="text"
                            v-model="form.username"
                            name="username"
                            class="form-control username__input"
                            required=""
                        />
                        <i
                            title="Generate Username"
                            @click="generateUsername"
                            class="bi bi-magic d-flex justify-content-center align-items-center username__input--icon"
                        ></i>
                      </div>
                      <span v-show="errors" class="error_msg ml-2">{{
                          errors && errors.username
                              ? errors.username.toString()
                              : ""
                        }}</span>
                    </div>
                    <div class="col-12 mt-3">
                      <div
                          class="input-group has-validation modal-input usernameBox"
                      >
                        <input
                            placeholder="Password"
                            type="password"
                            v-model="form.password"
                            name="username"
                            class="form-control username__input"
                            required=""
                        />
                      </div>
                      <span v-show="errors" class="error_msg ml-2">{{
                          errors && errors.password
                              ? errors.password.toString()
                              : ""
                        }}</span>
                    </div>

                    <div class="col-12 mt-3">
                      <div
                          class="input-group has-validation modal-input usernameBox"
                      >
                        <input
                            placeholder="Email"
                            type="text"
                            name="email"
                            autocomplete="off"
                            v-model="form.email"
                            class="form-control username__input"
                            required=""
                        />
                      </div>
                      <span v-show="errors" class="error_msg ml-2">{{
                          errors && errors.email
                              ? errors.email.toString()
                              : ""
                        }}</span>
                      <p
                          class="mb-0 text-center text-light-5 mt-1"
                      >
                        We'll send a password to this
                        email
                      </p>
                    </div>
                    <br/>
                    <div class="col-12">
                      <button
                          class="btn btn-primary w-100 btn-login submitButton"
                          @click="registerUser"
                      >
                        Create Free Account
                      </button>
                    </div>
                    <p
                        class="text-center mt-100"
                        style="color: #fff"
                    >
                      or Continue with
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
                          &nbsp; Google
                        </a>
                      </div>
                      <div>
                        <a
                            class="btn btn-primary w-100 btn-login withoutEmail"
                            href="/facebook/auth"
                        >
                          <i
                              class="bi bi-facebook"
                          ></i>
                          &nbsp; Facebook
                        </a>
                      </div>
                    </div>
                    <!-- <div class="col-12">
                      <button
                          @click="guestSingup"
                          class="btn btn-primary w-100 btn-login withoutEmail"
                          type="button"
                      >
                        Guest Signup
                      </button>
                    </div> -->
                    <div class="col-12">
                      <p
                          class="small mb-0 text-center alreadyAcc"
                      >
                        Already have an account?
                        <a
                            href="javascript:void(0)"
                            data-bs-toggle="modal"
                            data-bs-target="#loginModal"
                            class="login__text"
                        >Log In</a
                        >
                      </p>
                    </div>
                  </form>
                </div>
                <div
                    class="col-md-6 col-lg-6 background-image-createlogin"
                ></div>
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
  name: "SignupModal",
  data() {
    return {
      form: {
        username: "",
        email: "",
        password: ""
      },
      errors: null,
      guestError: null
    };
  },
  methods: {
    generateUsername() {
      axios.post("/generate-username").then((res) => {
        if (res.status === 200) {
          this.form.username = res.data;
        }
      });
    },
    guestSingup() {
      axios.post('/guest-signup')
          .then((res) => {
            if (res.status == 200 && res.data.url) {
              window.location.href = res.data.url;
            }
          })
          .catch((err) => {
            if (err.response.status == 401) {
              this.guestError = err.response.data.errors;
            } else {
              this.errors = err.response.data.errors;
            }
          });
    },
    registerUser() {
      this.errors = null;
      axios
          .post("/register-user", this.form)
          .then((res) => {
            if (res.status == 200 && res.data.url) {
              window.location.href = res.data.url;
            }
          })
          .catch((err) => {
            this.errors = err.response.data.errors;
          });
    },
  },
};
</script>

<style scoped>
.text-light-5 {
  color: rgba(255, 255, 255, 0.5);
}

.login__text {
  color: #fff;
}

/* media queries */
@media screen and (max-width: 992px){
    .background-image-createlogin{
      display: none;
    }
}
</style>
