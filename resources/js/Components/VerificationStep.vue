<template>
  <div id="afterLogin" class="modal fade modalBody" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" style="background: transparent">
        <div
            class="modal-header ps-0"
            style="display: flex; justify-content: space-between"
        >
          <div class="ps-0 createAcount">
            <h5 class="text-light-gray">Create Model Account</h5>
          </div>
          <div>
            <button
                aria-label="Close"
                class="customClose"
                data-bs-dismiss="modal"
                type="button"
            >
              ×
            </button>
          </div>
        </div>
        <div class="modal-body p-0" style="background-color: #3b3b3b">
          <div
              class="col-lg-12 col-md-12 d-flex flex-column align-items-center justify-content-center; background: #3b3b3b"
          >
            <div class="card mb-0 container-fluid">
              <div
                  class="formbody row align-items-center"
                  style="background-color: #3b3b3b"
              >
                <div class="px-0">
                  <ul
                      class="odList nav nav-tabs"
                      role="tablist"
                  >
                    <li
                        class="nav-item flex-fill"
                        role="presentation"
                    >
                      <button
                          id="email-verification-tab"
                          aria-controls="home"
                          aria-selected="true"
                          class="nav-link w-100 active"
                          role="tab"
                          type="button"
                      >
                        1. &nbsp;&nbsp; Email
                        Verification
                      </button>
                    </li>
                    <li
                        class="nav-item flex-fill"
                        role="presentation"
                    >
                      <button
                          id="verification-tab-profile-setting"
                          aria-controls="home"
                          aria-selected="true"
                          class="nav-link w-100"
                          role="tab"
                          type="button"
                      >
                        2. &nbsp;&nbsp; Profile Setting
                      </button>
                    </li>
                    <li
                        class="nav-item flex-fill"
                        role="presentation"
                    >
                      <button
                          id="verification-tab-identification"
                          aria-controls="home"
                          aria-selected="true"
                          class="nav-link w-100"
                          role="tab"
                          type="button"
                      >
                        3. &nbsp;&nbsp; Identification
                      </button>
                    </li>
                  </ul>
                  <div class="tab-content">
                    <div
                        id="email-verification-tab-content"
                        class="tab-pane fade show active"
                        role="tabpanel"
                    >
                      <div class="welcomeText">
                        <div>
                          Welcome {{ username }}!
                        </div>
                        <div>
                          Please enter your OTP.
                        </div>
                      </div>
                      <div class="d-flex flex-row justify-content-center otp__box">
                        <v-otp-input
                            ref="otpInput"
                            :is-input-num="true"
                            :num-inputs="6"
                            :should-auto-focus="true"
                            input-classes="otp-input"
                            separator=" "
                            @on-change="handleOnChange"
                            @on-complete="handleOnComplete"
                        />
                      </div>
                      <div class="d-flex justify-content-center">
                        <button class="btn verify__btn" @click="verifyOtp"><span>Verify OTP</span>
                          <div v-show="isLoading" class="spinner-border text-primary ml-1" role="status">
                            <span class="visually-hidden">Loading...</span>
                          </div>
                        </button>
                      </div>
                      <div class="inboxText">
                        Check your inbox or
                        <u
                        >resend otp</u
                        >
                      </div>
                      <div class="confirmationText">
                        We have sent the confirmation
                        link to the following email:
                      </div>
                      <div class="chngeEmail mb-3">
                        If this is wrong, please
                        <u> change the email</u>
                        address.
                      </div>
                    </div>
                    <div
                        id="verification-tab-profile-setting-content"
                        class="tab-pane fade p-3"
                        role="tabpanel"
                    >
                      <div class="row mb-2">
                        <div class="col-3 inputLabel">
                          Interested in:
                        </div>
                        <div class="col-9">
                          <select
                              v-model="form.interest"
                              class="inputBox"
                              style="color: #888;"
                          >
                            <option v-for="(interest, i) in interests" :value="i" :key="i">{{ interest }}</option>
                          </select>
                          <div class="text-danger">{{ errors && errors.interest ? errors.interest.toString() : '' }}
                          </div>
                        </div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-3 inputLabel">
                          Languages:
                        </div>
                        <div class="col-9">
                          <select
                              v-model="form.language_id"
                              class="inputBox"
                              style="color: #888"
                          >
                            <option v-for="language in languages" :value="language.uuid">
                              {{ language.name }}
                            </option>
                          </select>
                          <div class="text-danger">{{ errors && errors.language_id ? errors.language_id.toString() : ''
                            }}
                          </div>
                        </div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-3 inputLabel">
                          Specifics
                        </div>
                        <div class="col-9">
                          <select
                              v-model="form.specific_id"
                              class="inputBox"
                              style="color: #888;"
                          >
                            <option v-for="specific in specifics" :value="specific.uuid">{{ specific.name }}</option>
                          </select>
                          <div class="text-danger">{{ errors && errors.specific_id ? errors.specific_id.toString() : ''
                            }}
                          </div>
                        </div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-3 inputLabel">
                          Subculture
                        </div>
                        <div class="col-9">
                          <select
                              v-model="form.subculture_id"
                              class="inputBox"
                              style="color: #888"
                          >
                            <option v-for="subculture in subculture" :value="subculture.uuid">{{ subculture.name }}
                            </option>
                          </select>
                          <div class="text-danger">{{
                              errors && errors.subculture_id ? errors.subculture_id.toString() : '' }}
                          </div>
                        </div>
                      </div>
                      <div class="row mb-1">
                        <div
                            class="col-md-3 inputLabel"
                        >
                          About me:
                        </div>
                        <div class="col-md-9">
                          <textarea
                              id="w3review"
                              v-model="form.about"
                              class="TextArea"
                              cols="50"
                              name="w3review"
                              rows="4"
                              style="color: #888"
                          ></textarea>
                          <div class="text-danger">{{ errors && errors.about ? errors.about.toString() : '' }}</div>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-3"></div>
                        <div
                            class="col-9"
                            style="
                                                        font-size: small;
                                                        color: #888;
                                                    "
                        >
                          Let your fans know you
                          better by providing more
                          info about yourself! Models
                          who add "About Me"
                          information attract a lot of
                          attention of users and earn
                          more money. Be creative,
                          feel free to share some
                          secret desires or
                          interesting facts about
                          yourself.
                        </div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-3 inputLabel">
                          Your profile Image:
                        </div>
                        <div class="col-3">
                          <label
                              class="fileClass"
                              for="fileinput1"
                          >Upload Image</label
                          >

                          <input
                              id="fileinput1"
                              class="inputBox1 file-input"
                              placeholder="Please, select...... "
                              style="color: #888;"
                              type="file"
                              @input="handleProfileFile"
                          />

                          <!-- <textarea id="w3review" name="w3review" rows="4" cols="50" class="inputBox" style="color: #888;"></textarea>  -->
                        </div>
                        <div class="col-md-3 show_example">
                          <span>Show Example</span>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-3"></div>
                        <div class="col-9">
                          <div class="text-danger">{{
                              errors && errors.profile_image ? errors.profile_image.toString() : '' }}
                          </div>
                        </div>
                      </div>
                      <div class="d-flex justify-content-center align-items-center my-3">
                        <img id="fileinput1_img" alt="" class="w-20" src="">
                      </div>
                      <div class="row mb-2">
                        <div class="col-3 inputLabel">
                          Cover Image:
                        </div>
                        <div class="col-3">
                          <label
                              class="fileClass"
                              for="fileinput2"
                          >Upload Image</label
                          >
                          <input
                              id="fileinput2"
                              class="inputBox1 file-input"
                              placeholder="Please, select...... "
                              style="color: #888"
                              type="file"
                              @input="handleCoverFile"
                          />
                          <!-- <textarea id="w3review" name="w3review" rows="4" cols="50" class="inputBox" style="color: #888;"></textarea>  -->

                          <!-- <textarea id="w3review" name="w3review" rows="4" cols="50" class="inputBox" style="color: #888;"></textarea>  -->
                        </div>
                        <div class="col-3 show_example">
                          <span>Show Example</span>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-3"></div>
                        <div class="col-9">
                          <div class="text-danger">{{
                              errors && errors.cover_image ? errors.cover_image.toString() : '' }}
                          </div>
                        </div>
                      </div>
                      <div class="d-flex justify-content-center align-items-center my-3">
                        <img id="fileinput2_img" alt="" class="w-20" src="">
                      </div>
                      <div class="row mb-2">
                        <div class="col-3"></div>
                        <div class="col-9 inputLabel">
                          make sure your cover image
                          doesn't violate
                          <a href="#"> our rules </a>
                          <!-- <input type="file" placeholder="Please, select...... "class="inputBox1 file-input" style="color: #888;"> -->
                          <!-- <textarea id="w3review" name="w3review" rows="4" cols="50" class="inputBox" style="color: #888;"></textarea>  -->
                        </div>
                        <div class="col-3"></div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-3">
                          <h6>Pricing</h6>
                        </div>
                        <div
                            class="col-9 inputLabel"
                        ></div>
                      </div>
                      <div class="text-danger">{{ errors && errors.pricing ? errors.pricing.toString() : '' }}</div>
                      <PlanPricingItem v-for="plan in pricing" :key="plan.uuid" :plan="plan" @updateTokenPrice="updateTokenPrice"/>
                      <hr
                          style="
                                                            color: black;
                                                            width: 100%;
                                                            margin-top: 1rem;
                                                        "
                      />
                      <div class="d-flex justify-content-end">
                        <button
                            class="btn next__btn"
                            @click="nextStep"
                        ><span>Next</span>
                          <div v-show="isLoading" class="spinner-border text-primary ml-1" role="status">
                            <span class="visually-hidden">Loading...</span>
                          </div>
                        </button>
                      </div>
                    </div>

                    <div
                        id="verification-tab-identification-content"
                        class="tab-pane fade px-3"
                        role="tabpanel"
                    >
                      <p class="my-3" style="color: #888">
                        This Direct Model Appearance
                        Agreement and Release (this
                        “Agreement”), dated as of the
                        date set forth above (the
                        “Effective Date”), between the
                        undersigned individual (“Model”)
                        and , a Republic of Cyprus
                        company with registration number
                        HE349515 and registered address
                        at (“Operator”).
                      </p>
                      <div class="row mb-2">
                        <div class="col-3 inputLabel">
                          Name:
                        </div>
                        <div class="col-9">
                          <input
                              v-model="form.name"
                              class="inputBox text_color--gray"
                              placeholder="As written in your official documents"
                              type="text"
                          />
                          <div class="text-danger">{{
                              errors && errors.name ? errors.name.toString() : '' }}
                          </div>
                        </div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-3 inputLabel">
                          Gender:
                        </div>
                        <div class="col-9">
                          <select
                              v-model="form.gender"
                              class="inputBox text_color--gray"
                          >
                            <option value="female">
                              Female
                            </option>
                            <option value="male">
                              Male
                            </option>
                          </select>
                          <div class="text-danger">{{
                              errors && errors.gender ? errors.gender.toString() : '' }}
                          </div>
                        </div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-3 inputLabel">
                          Birth date:
                        </div>
                        <div class="col-9">
                          <input
                              class="inputBox text_color--gray"
                              min="2000-01-01"
                              type="date"
                              v-model="form.birth_date"
                          />
                          <div class="text-danger">{{
                              errors && errors.birth_date ? errors.birth_date.toString() : '' }}
                          </div>
                        </div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-3 inputLabel">
                          ID number:
                        </div>
                        <div class="col-9">
                          <input
                              v-model="form.id_number"
                              class="inputBox text_color--gray"
                              type="text"
                          />
                          <div class="text-danger">{{
                              errors && errors.id_number ? errors.id_number.toString() : '' }}
                          </div>
                        </div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-3 inputLabel">
                          Address:
                        </div>
                        <div class="col-9">
                          <input
                              v-model="form.address"
                              class="inputBox text_color--gray"
                              type="text"/>
                          <div class="text-danger">{{
                              errors && errors.address ? errors.address.toString() : '' }}
                          </div>
                        </div>
                      </div>
                      <div class="row mb-2 inputLabel">
                        <div class="col-3">
                          ID Issuing Country:
                        </div>
                        <div class="col-9">
                          <select
                              v-model="form.id_issuing_country"
                              class="inputBox text_color--gray"
                          >
                            <option v-for="country in countries" :value="country.id">
                              {{ country.name }}
                            </option>
                          </select>
                          <div class="text-danger">{{
                              errors && errors.id_issuing_country ? errors.id_issuing_country.toString() : '' }}
                          </div>
                        </div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-3 inputLabel">
                          Country:
                        </div>
                        <div class="col-9">
                          <select
                              v-model="form.country_id"
                              class="inputBox text_color--gray"
                              @change="handleCountryChange"
                          >
                            <option v-for="country in countries" :value="country.id">
                              {{ country.name }}
                            </option>
                          </select>
                          <div class="text-danger">{{
                              errors && errors.country_id ? errors.country_id.toString() : '' }}
                          </div>
                        </div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-3 inputLabel">
                          State:
                        </div>
                        <div class="col-9">
                          <select
                              v-model="form.state_id"
                              class="inputBox text_color--gray"
                          >
                            <option v-for="state in states" :value="state.id">
                              {{ state.name }}
                            </option>
                          </select>
                          <div class="text-danger">{{
                              errors && errors.state_id ? errors.state_id.toString() : '' }}
                          </div>
                        </div>
                      </div>

                      <h5>Document upload</h5>
                      <div class="row mb-2 align-items-center">
                        <div class="col-4 inputLabel">
                          Close-up photo of your ID:
                        </div>
                        <div class="col-3">
                          <label
                              class="fileClass"
                              for="document_upload"
                          >Upload Document</label
                          >
                          <input
                              id="document_upload"
                              class="inputBox1 file-input file__upload_hide"
                              placeholder="Please, select...... "
                              style="color: #888"
                              type="file"
                              @input="handleDocumentUpload"
                          />
                          <!-- <textarea id="w3review" name="w3review" rows="4" cols="50" class="inputBox" style="color: #888;"></textarea>  -->
                        </div>
                        <div class="col-4 d-flex align-items-center">
                          <span
                              class="inputLabel show_example"
                          >
                            show example
                          </span>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-3"></div>
                        <div class="col-9">
                          <div class="text-danger">{{
                              errors && errors.document ? errors.document.toString() : '' }}
                          </div>
                        </div>
                      </div>
                      <div class="d-flex justify-content-center align-items-center mb-2">
                        <img
                            v-show="document"
                            id="document_upload--preview"
                            alt="document"
                            class="document__photo--preview" src=""/>
                      </div>

                      <!-- <div class="col-2">tokens/min</div> -->

                      <div class="row mb-2 align-items-center">
                        <div
                            class="col-4 inputLabel"
                        >
                          Photos of you holding
                          your ID and a
                          handwritten note with
                          your username and
                          current date:
                        </div>
                        <div class="col-3">
                          <label
                              class="fileClass"
                              for="upload_id_photo"
                          >Upload Photo ID</label
                          >
                          <input
                              id="upload_id_photo"
                              class="inputBox1 file-input file__upload_hide"
                              placeholder="Please, select...... "
                              style="color: #888"
                              type="file"
                              @input="handleIdPhotoUpload"
                          />
                          <!-- <textarea id="w3review" name="w3review" rows="4" cols="50" class="inputBox" style="color: #888;"></textarea>  -->
                        </div>
                        <div class="col-4 d-flex align-items-center">
                          <span
                              id="upload_photo_id--preview"
                              class="inputLabel show_example"
                          >
                            show example
                          </span>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-3"></div>
                        <div class="col-9">
                          <div class="text-danger">{{
                              errors && errors.id_photo ? errors.id_photo.toString() : '' }}
                          </div>
                        </div>
                      </div>
                      <div class="d-flex justify-content-center align-items-center mb-3">
                        <img
                            v-show="id_photo"
                            id="id_photo--preview"
                            alt="Photo ID"
                            class="document__photo--preview" src=""/>
                      </div>
                      <hr class="w-100">
                      <div class="d-flex justify-content-between my-3">
                        <button
                            class="btn previous__btn"
                            @click="previousStep"
                        >
                          <i class="bi bi-arrow-left"></i>
                        </button>
                        <button
                            class="btn next__btn"
                            @click="requestApproval"
                        ><span>Request Approval</span>
                          <div v-show="isLoading" class="spinner-border text-primary ml-1" role="status">
                            <span class="visually-hidden">Loading...</span>
                          </div>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- <div class="col-md-6 background-image-createlogin" style="min-height:560px;"></div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
      <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body">
          <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="#198754" viewBox="0 0 20 20"
               xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                  d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                  clip-rule="evenodd"></path>
          </svg>
          <p>{{ successMsg }}</p>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import VOtpInput from "vue3-otp-input";
import PlanPricingItem from "@/Pages/BecomeModel/PlanPricingItem";

export default {
  name: "VerificationStep",
  components: {
    PlanPricingItem,
    VOtpInput,
  },
  props: {
    username: {
      type: String,
    },
    email: {
      type: String,
    },
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
      verifyForm: {
        otp: "",
        username: this.$props.username,
      },
      form: {
        interest: "",
        language_id: "",
        subculture_id: "",
        specific_id: "",
        about: "",
        pricing: [],
        name: "",
        gender: "",
        birth_date: "",
        id_number: "",
        address: "",
        id_issuing_country: "",
        country_id: "",
        state_id: "",
        document: "",
        id_photo: "",

      },
      cover_image: null,
      profile_image: null,
      document: null,
      id_photo: null,
      isLoading: false,
      errors: null,
      step: 1,
      stepTwoKeys: [],
      states: [],
      successMsg: ""
    }
  },
  watch: {
    username(val) {
      this.verifyForm.username = val;
    }
  },
  methods: {
    handleOnChange(value) {
      console.log('value change', value);
    },
    handleOnComplete(value) {
      this.verifyForm.otp = value;
      this.verifyOtp();
    },
    handleCoverFile(e) {
      this.cover_image = e.target.files[0];
      let file = URL.createObjectURL(this.cover_image);
      $('#fileinput2_img').attr('src', file)
    },
    handleProfileFile(e) {
      this.profile_image = e.target.files[0];
      let file = URL.createObjectURL(this.profile_image);
      $('#fileinput1_img').attr('src', file)
    },
    handleDocumentUpload(e) {
      this.document = e.target.files[0];
      let file = URL.createObjectURL(this.document);
      $('#document_upload--preview').attr('src', file)
    },
    handleIdPhotoUpload(e) {
      this.id_photo = e.target.files[0];
      let file = URL.createObjectURL(this.id_photo);
      $('#id_photo--preview').attr('src', file)
    },
    async handleCountryChange() {
      this.states = [];
      const res = await axios.post('/get-states', {
        country_id: this.form.country_id
      });
      if (res.status === 200) {
        this.states = res.data;
      }
    },
    validateStepTwo() {

    },
    verifyOtp() {
      this.isLoading = true;
      axios.post('/model/verify-otp', this.verifyForm)
          .then(res => {
            this.isLoading = false;
            if (res.status == 200) {
              $('.tab-pane').removeClass('active');
              $('#email-verification-tab').removeClass('active');
              $('#verification-tab-profile-setting').addClass('active');
              $('#verification-tab-profile-setting-content').addClass('active show');
              this.step = 2;
            }
          }).catch(err => {
        this.errors = err.response.data.errors
        this.isLoading = false;
      })
    },
    updateTokenPrice(val) {
      if (this.form.pricing && this.form.pricing.length > 0) {
        const index = this.form.pricing.findIndex(item => item.pricing_id == val.pricing_id);
        if (index != -1) {
          this.form.pricing[index] = val;
        }
        this.form.pricing.push(val);
        return;
      }
      this.form.pricing.push(val);
    },
    previousStep() {
      $('.tab-pane').removeClass('active');
      $('#verification-tab-identification').removeClass('active');
      $('#verification-tab-profile-setting').addClass('active');
      $('#verification-tab-profile-setting-content').addClass('active show');
    },
    nextStep() {
      this.isLoading = true;
      const formData = new FormData();
      formData.append('profile_image', this.profile_image);
      formData.append('cover_image', this.cover_image);
      Object.keys(this.form).forEach(key => {
        formData.append(key, this.form[key]);
      });
      axios.post('/model/validate-sign-up-step-2', formData)
          .then(res => {
            this.isLoading = false;
            if (res.status === 200) {
              $('.tab-pane').removeClass('active');
              $('#email-verification-tab').removeClass('active');
              $('#verification-tab-profile-setting').removeClass('active');
              $('#verification-tab-identification').addClass('active');
              $('#verification-tab-identification-content').addClass('active show');
            }
          }).catch(err => {
        this.isLoading = false;
        this.errors = err.response.data.errors;
      })
    },
    requestApproval() {
      console.log('pricing', this.form.pricing);
      this.isLoading = true;
      const formData = new FormData();
      Object.keys(this.form).forEach(key => {
        formData.append(key, this.form[key]);
      });
      formData.append('pricing', JSON.stringify(this.form.pricing));
      formData.append('profile_image', this.profile_image);
      formData.append('cover_image', this.cover_image);
      formData.append('document', this.document);
      formData.append('id_photo', this.id_photo);
      formData.append('username', this.username);
      console.log('form', formData);
      axios.post('/model/request-approval', formData)
          .then(res => {
            this.isLoading = false;
            if (res.status == 200) {
              this.successMsg = res.data.msg;
              $('#liveToast').removeClass('hide');
              $('#liveToast').addClass('show');
              setTimeout(() => {
                $("#afterLogin").modal("hide");
                this.successMsg = "";
                $('#liveToast').addClass('hide');
                $('#liveToast').removeClass('show');
              }, 2000)
            }
          }).catch(err => {
        this.isLoading = false;
        this.errors = err.response.data.errors;
      })
    }
  }
};
</script>

<style scoped>
.nav-tabs {
  border-color: #000;
}

.nav-tabs .nav-link {
  border-radius: initial !important;
}

.nav-tabs .nav-link.active {
  background-color: var(--primary);
  color: #fff;
}

.nav-tabs .nav-link:focus,
.nav-tabs .nav-link:hover {
  border: none !important;
  outline: none !important;
}

.welcomeText {
  margin-bottom: 2rem;
}


.spinner-border {
  width: 1rem !important;
  height: 1rem !important;
}

.show_example {
  display: flex;
  align-items: center;
}

.previous__btn {
  /*color: #000;*/
  text-align: center;
}

.previous__btn i {
  font-size: 1.25rem;
  color: #fff;
}

.next__btn {
  background-color: var(--primary);
  color: #fff;
  text-align: center;
  padding: 0.5rem 1.2rem;
}

.show_example {
  text-decoration: underline;
}

.document__photo--preview {
  max-height: 20rem;
  width: 20rem;
}

.text-danger {
  color: #ff0000 !important;
}

.mr-2 {
  margin-right: 0.2rem;
}
</style>

<style>
.otp__box {
  margin-bottom: 1rem;
}

.otp-input {
  width: 2.25rem;
  border-radius: 0.2rem;
  background: transparent;
  border: 1px solid rgba(255, 255, 255, 0.5);
  outline: none;
  color: #fff;
  margin-right: 1rem;
  text-align: center;
  padding: 0.4rem;
}

.verify__btn {
  background-color: var(--primary);
  color: #fff;
  padding: 0.54rem 2rem;
}

.verify__btn:hover {
  background-color: var(--primary);
}

.w-20 {
  width: 20rem;
}

select {
  border: none;
}
</style>
