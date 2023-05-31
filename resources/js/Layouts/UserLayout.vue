<template>
    <div class="chat__wrapper">
        <slot></slot>
        <SignupModal />
        <LoginModal />
    </div>
</template>

<script>
import LoginModal from "@/Components/LoginModal.vue";
import SignupModal from "@/Components/SignupModal.vue";

export default {
    components: { SignupModal, LoginModal },
};
</script>

<style scoped>
.chat__wrapper {
    /*height:80vh;*/
    /*margin-bottom: 3rem;*/
}
</style>
