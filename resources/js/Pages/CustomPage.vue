<template>
  <UserLayout>
    <section class="section">
      <div class="container-lg my-2">
        <h1>{{ page_data.title }}</h1>
        <br>
        <br>
        <div class="row">
          <div class="col-sm-12">
            <div v-html="page_data.content">
            </div>
            <hr>
          </div>
        </div>
      </div>
    </section>
  </UserLayout>
</template>

<script>
import UserLayout from "@/Layouts/UserLayout.vue";

export default {
  components: {UserLayout},
  props: ['page_data'],
};
</script>

<style>
.sticky-top {
  top: 100px !important;
}

.list-group-item.list-group-item-action {
  background: none;
  border: none;
  color: #fff;
}

.list-group-item.list-group-item-action.active {
  background: none;
  border: none;
  color: #fff;
  font-weight: 600;
}
</style>
