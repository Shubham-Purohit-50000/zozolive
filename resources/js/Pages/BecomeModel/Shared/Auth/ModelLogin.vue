<template>
  <div class="modal fade" id="modelLogin" tabindex="-1">
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
                    <span v-show="errors && errors.username" class="error_msg ml-2">{{
                        errors && errors.username
                            ? errors.username.toString()
                            : ""
                      }}</span>
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
                    <span v-show="errors && errors.password" class="error_msg ml-2">{{
                        errors && errors.password
                            ? errors.password.toString()
                            : ""
                      }}</span>
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
                        style="color: #a4a4a4;
                                                cursor: pointer;
                                                display: inline-block;
                                                padding-top: 5px;
                                                font-size: 0.9rem;
                                            "
                    >Forgot password?</a
                    >
                  </div>
                  <div v-if="errorMsg" class="text-danger"> {{  errorMsg }}</div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
      <div id="loginToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body">
          <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="#198754" viewBox="0 0 20 20"
               xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                  d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                  clip-rule="evenodd"></path>
          </svg>
          <p>{{ errorMsg }}</p>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "ModelLogin",
  data() {
    return {
      form: {
        username: "",
        password: "",
      },
      errors: null,
      errorMsg: ""
    };
  },
  methods: {
    loginUser() {
      this.errors = null;
      axios
          .post("/model/login", this.form)
          .then((res) => {
            if (res.status == 200 && res.data.url) {
              window.location.href = res.data.url;
            }
          })
          .catch((err) => {
            if (err.response.status == 403) {
              $("#modelLogin").modal("hide");
              this.$emit('updateLoginUsername', this.form.username);
              $("#afterLogin").modal("show");
            }
            else if (err.response.status == 401) {
              this.errorMsg = 'Authentication failed, please check your login details';
            }
            else if (err.response.status == 400) {
              this.errorMsg = err.response.data.msg;
              $('#loginToast').removeClass('hide');
              $('#loginToast').addClass('show');
              setTimeout(() => {
                this.errorMsg = "";
                $('#loginToast').addClass('hide');
                $('#loginToast').removeClass('show');
                $('#modelLogin').modal('hide');
              }, 2000)
            } else {
              this.errors = err.response.data.errors;
            }
          });
    },
  },
}
</script>

<style scoped>
form {
  padding-bottom: 2rem;
}

.card {
  background-color: transparent;
}

.card-body, .modal-body {
  border-radius: 1rem
}
</style>
