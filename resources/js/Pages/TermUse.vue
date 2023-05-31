<template>
  <UserLayout>
    <section class="section">
      <div class="container-lg my-2">
        <h1>Terms of Use</h1>
        <div class="row" v-if="lists && lists.length">
          <div class="col-sm-4" id="myScrollspy" style="z-index:9">
            <div class="list-group sticky-top">
              <a v-for="list in lists" class="list-group-item list-group-item-action" :href="`#${list.uuid}`">{{
                  list.title }}</a>
            </div>
          </div>
          <div class="col-sm-8">
            <div v-for="list in lists" :id="list.uuid">
              <h2>{{ list.title }}</h2>
              <div v-html="list.description">
              </div>
            </div>
            <hr>
          </div>
        </div>
        <div v-else>
          <h3 class="text-center mt-3">Not Found</h3>
        </div>
      </div>
    </section>
  </UserLayout>
</template>

<script>
import UserLayout from "@/Layouts/UserLayout.vue";

export default {
  components: {UserLayout},
  props: ['lists'],
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
