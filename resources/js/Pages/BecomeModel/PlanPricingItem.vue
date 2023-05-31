<template>
  <div class="row mb-2">
    <div class="col-3 inputLabel">
      {{ plan.plan_name }}
    </div>
    <div class="col-3">
      <div></div>
      <select
          class="inputBox"
          style="color: #888"
          v-model="selectedToken"
      >
        <option v-for="i in (plan.maximum_token_limit - plan.minimum_token_limit+1)"
                :value="i+(plan.minimum_token_limit - 1)"
        >
          {{ i + (plan.minimum_token_limit - 1) }}
        </option>
      </select>
    </div>
    <div
        class="col-2 inputLabel"
        style="margin-top: 7px"
    >
      tokens/min
    </div>
    <div class="col-4"></div>
  </div>
</template>

<script>
export default {
  name: "PlanPricingItem",
  props: {
    plan: {
      type: [Array, Object]
    }
  },
  data(){
    return {
      selectedPlan: this.plan.uuid,
      selectedToken: ""
    }
  },
  watch:{
    selectedToken(val){
      this.$emit('updateTokenPrice',{
        pricing_id: this.selectedPlan,
        token: val
      });
    }
  }

}
</script>

<style scoped>

</style>
