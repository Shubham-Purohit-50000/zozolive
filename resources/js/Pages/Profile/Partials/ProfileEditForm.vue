<template>
    <div>
        <InputBox
            label="Name"
            v-model="form.name"
            :error="errors?.name?.toString()"
        />
        <InputBox
            label="From"
            v-model="form.from"
            :error="errors?.from?.toString()"
            placeholder="State or City"
        />
        <InputBox
            label="About"
            v-model="form.about"
            placeholder="About Me"
            :error="errors?.about?.toString()"
        />
        <InputBox
            label="Birth Date"
            v-model="form.dob"
            type="date"
            :error="errors?.dob?.toString()"
        />
        <!-- <div class="row mb-2 align-items-center">
            <div class="col-md-3" style="color: #878787">Interest:</div>
            <div class="col-md-9">
                <multiselect
                    v-model="interest"
                    :options="options"
                ></multiselect>
            </div>
        </div> -->
        <div class="profile__actions mt-3">
            <button
                class="btn text-white"
                @click="$emit('updateEditMode', false)"
            >
                Cancel
            </button>
            <button class="btn text-white" @click="updateProfile">Save</button>
        </div>
    </div>
</template>

<script>
import InputBox from "@/Pages/Profile/Partials/InputBox.vue";
import Multiselect from "vue-multiselect";
import { toast } from "vue3-toastify";
import "vue3-toastify/dist/index.css";
export default {
    name: "ProfileEditForm",
    components: { InputBox, Multiselect },
    emits: ["updateProfile"],
    inject: ["authUser"],
    data() {
        return {
            form: {
                name: this.authUser?.name || "",
                from: this.authUser?.from || "",
                about: this.authUser?.about || "",
                dob: this.authUser?.dob || "",
                // interest: "",
            },
            interest: null,
            errors: "",
            options: ["Canada", "United States"],
        };
    },
    methods: {
        handleInterestChange(e) {
            console.log("e", e);
        },
        updateProfile() {
            axios
                .post("/update-user-profile", this.form)
                .then((res) => {
                    if (res.status == 200) {
                        this.errors = "";
                        toast(res.data.msg, {
                            autoClose: 1000,
                        });
                        window.location.reload();
                        // this.$emit("updateEditMode", false);
                    }
                })
                .catch((err) => {
                    this.errors = err?.response?.data?.errors;
                });
        },
    },
};
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style scoped>
.profile__actions {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 1rem;
}
.profile__actions button {
    background: var(--primary);
    border-radius: 2rem;
    padding: 0.5rem 1.5rem;
}
</style>
