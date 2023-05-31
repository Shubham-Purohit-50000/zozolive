<template>
  <section class="primaryBack">
    <div class="container">
      <section class="section error-404 d-flex flex-column align-items-center justify-content-top">
        <h1 class="mainHead">Zozolive</h1>
        <h2 class="text-center subHead">Show your talent.<br>
          Make money. Fulfill dreams.</h2>
        <a class="btn customBtn" href="#"
           data-bs-toggle="modal" data-bs-target="#modelSignup"
        ><i class="bi bi-funnel"></i> &nbsp; Become a Model</a>
      </section>
    </div>
  </section>
</template>

<script>
export default {
  name: "Section1"
}
</script>

<style scoped>
@media screen and (max-width: 1000px){
  .mainHead{
    font-size: 8rem;
  }
}
@media screen and (max-width: 700px){
  .mainHead{
    font-size: 6rem;
  }
}
@media screen and (max-width: 500px){
  .mainHead{
    font-size: 4rem;
    line-height: 80px !important;
  }
  .subHead{
    font-size: 1.5rem !important;
  }
}
@media screen and (max-width: 400px){
  .mainHead{
    font-size: 3rem;
    margin-bottom: 0 !important;
  }
  .subHead{
    font-size: 1.2rem !important;
  }
  .customBtn{
    font-size: 1rem;
  }
}
</style>
