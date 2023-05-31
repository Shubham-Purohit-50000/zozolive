<template>
  <section class="mt-150">
    <div class="container">
      <div class="row justify-content-center text-center w-100 m-auto">
        <h1 class="secondHead mt-m10">Private & Exclusive Private call</h1>
        <!--        <h1 class="secondHead mt-m10">Exclusive Private</h1>-->
        <!--        <h1 class="secondHead mt-m10">call</h1>-->
        <br/>
      </div>
    </div>
    <div class="container-fluid mt-50">
      <div class="text-center videoBox m-auto" style="height: 46rem; width: 49%;">
        <img
            class="video-player__video"
            style="object-fit: cover; width: 100%; height: 100%"
            src="/img/host.jpeg"
        />
      </div>
    </div>
    <div class="container mt-50 boxSection">
      <div class="row">
        <div class="col-md-3 boxLayout">
          <div class="roundIconBack">
            <i class="bi bi-funnel"></i>
          </div>
          <h3 class="boxHead">Receive Private tips</h3>
        </div>
        <div class="col-md-3 boxLayout">
          <div class="roundIconBack">
            <i class="bi bi-eye"></i>
          </div>
          <h3 class="boxHead">Earn with private</h3>
        </div>
        <div class="col-md-3 boxLayout">
          <div class="roundIconBack">
            <i class="bi bi-files"></i>
          </div>
          <h3 class="boxHead">Sell shows</h3>
        </div>
        <div class="col-md-3 boxLayout">
          <div class="roundIconBack">
            <i class="bi bi-lightning-charge-fill"></i>
          </div>
          <h3 class="boxHead">Get Private </h3>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {};
</script>

<style scoped>
video {
  width: 75%;
}

.w-80 {
  width: 80%;
}

@media screen and (max-width: 1150px) {
  .boxHead {
    font-size: 1.4rem !important;
  }

  .boxSection {
    max-width: 100%;
  }
}


@media screen and (max-width: 700px) {
  .mt-150 {
    margin-top: 3rem;
  }

  .mt-50 {
    margin-top: 0.6rem;
  }

  .roundIconBack {
    height: 50px;
    width: 50px;
    font-size: 18px;
  }

  .boxHead {
    font-size: 0.9rem !important;
  }

  .secondHead {
    font-size: 3rem !important;
  }

  .videoBox {
    width: 60% !important;
    height: 30rem !important;
  }
}

@media screen and (max-width: 520px) {
  .secondHead {
    font-size: 2rem !important;
  }

  .mt-150 {
    margin-top: 2.75rem;
  }

  .mt-50 {
    margin-top: 1rem;
  }

  .videoBox {
    height: 29rem;
    width: 74%;
  }

  .boxSection {
    padding: 0;
  }
}

@media screen and (max-width: 400px) {
  .secondHead {
    font-size: 1.5rem !important;
  }

  .videoBox {
    width: 80% !important;
  }
}
</style>
