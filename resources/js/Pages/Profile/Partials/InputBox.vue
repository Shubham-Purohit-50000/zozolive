<template>
    <div class="row mb-2 align-items-center">
        <div class="col-md-3" style="color: #878787">{{ label }}:</div>
        <div class="col-md-9">
            <div class="input-group has-validation modal-input usernameBox">
                <input
                    :placeholder="placeholder || label"
                    :type="type"
                    :name="name"
                    :value="modelValue"
                    @input="$emit('update:modelValue', $event.target.value)"
                    class="form-control username__input"
                    required=""
                />
            </div>
            <span class="error_msg">{{ error }}</span>
        </div>
    </div>
</template>

<script>
export default {
    name: "InputBox",
    props: {
        label: String,
        placeholder: {
            type: String,
            default: () => "",
        },
        type: {
            type: String,
            default: "text",
        },
        name: String,
        modelValue: [String, Number],
        error: {
            type: String,
            default: () => "",
        },
    },
};
</script>

<style scoped></style>
