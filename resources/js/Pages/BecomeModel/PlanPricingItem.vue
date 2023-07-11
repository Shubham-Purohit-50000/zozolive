<template>
  <div class="row mb-2">
    <div class="col-3 inputLabel">
     Private
    </div>
    <div class="col-6">
      <select
          class="inputBox"
          style="color: #888"
          v-model="selectedToken"
      >
        <option value="10" style="font-size: small"> 10 tk </option>
        <option value="10" style="font-size: small"> 15 tk </option>
        <option value="10" style="font-size: small"> 18 tk </option>
        <option value="10" style="font-size: small"> 20 tk </option>
        <option value="10" style="font-size: small"> 25 tk </option>
        <option value="10" style="font-size: small"> 30 tk </option>
        <option value="10" style="font-size: small"> 35 tk </option>                         
      </select>
    </div>
    <div
        class="col-2 inputLabel"
        style="margin-top: 7px"
    >
      Tokens/min
    </div>
    <div class="col-4"></div>
  </div>
</template>

<script>
export default {
  name: "PlanPricingItem",
  props: ['plan'],
  data(){
    return {
      selectedToken: "",
    }
  },
  watch:{
    selectedToken(val){
      this.$emit('updateTokenPrice',{
        token: val
      });
    }
  }

}
</script>

<style scoped>

</style>
