<template>
  <div class="modal fade" id="modelSignup" tabindex="-1">
    <div class="modal-dialog modal-lg mx-auto">
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
                <div class="col-md-6 col-12" style="padding: 30px">
                  <div class="pt-4 pb-2">
                    <h5
                        class="card-title-modal-login text-center pb-0 fs-4"
                    >
                      Create Model Account
                    </h5>
                  </div>
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
                            id="yourUsername"
                            required=""
                        />
                      </div>
                      <span v-show="errors" class="error_msg">{{
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
                            id="yourUsername"
                            required=""
                        />
                      </div>
                      <span v-show="errors" class="error_msg">{{
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
                      <span v-show="errors" class="error_msg">{{
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
                    <div class="col-12">
                      <p
                          class="small mb-0 text-center alreadyAcc"
                      >
                        Already have an account?
                        <a
                            href="javascript:void(0)"
                            data-bs-toggle="modal"
                            data-bs-target="#modelLogin"
                            class="login__text"
                        >Log In</a
                        >
                      </p>
                    </div>
                  </form>
                </div>
                <div
                    class="col-md-6 background-image-createlogin"
                ></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <VerificationStep :username="form.username || loginUsername"
                    :email="form.email || loginUsername"
                    :languages="languages"
                    :interests="interests"
                    :specifics="specifics"
                    :subculture="subculture"
                    :pricing="pricing"
                    :countries="countries"
  />
  <ModelLogin @updateLoginUsername="updateLoginUsername"/>
</template>

<script>
import VerificationStep from "@/Components/VerificationStep";
import ModelLogin from "@/Pages/BecomeModel/Shared/Auth/ModelLogin";

export default {
  name: "ModelSignup",
  components: {ModelLogin, VerificationStep},
  props: {
    languages: {
      type: [Array, Object]
    },
    specifics: {
      type: [Array, Object]
    },
    subculture: {
      type: [Array, Object]
    },
    interests: {
      type: [Array, Object]
    },
    pricing: {
      type: [Array, Object]
    },
    countries: {
      type: [Array, Object]
    }
  },
  data() {
    return {
      form: {
        username: "",
        password: "",
        email: "",
      },
      errors: null,
      showVerification: false,
      loginUsername: ""
    };
  },
  methods: {
    registerUser() {
      this.errors = null;
      axios
          .post("/model/signup", this.form)
          .then((res) => {
            if (res.status === 200 && res.data.url) {
              console.log('res', res)
              // window.location.href = res.data.url;
              $("#afterLogin").modal("show");
              $("#modelSignup").modal("hide");
            }
          })
          .catch((err) => {
            this.errors = err.response.data.errors;
          });
    },
    updateLoginUsername(value) {
      console.log('user', value)
      this.loginUsername = value;
    }
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

@media screen and (max-width: 992px){
  #modelSignup .modal-dialog{
    max-width: 80% !important;
  }
}
@media screen and (max-width: 768px){
  .background-image-createlogin{
    display: none;
  }
}
</style>

<style>

.toast-body {
  background-color: rgba(0, 0, 0, 0.6) !important;
  display: flex;
  justify-content: space-between;
}

.toast-body p {
  color: #fff;
}

.toast-body svg {
  width: 2rem;
}
</style>
