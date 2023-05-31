<template>
  <div class="modal fade" id="sendtipModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" style="background: transparent">
        <div class="modal-header ps-0">
          <button type="button" class="customClose" data-bs-dismiss="modal" aria-label="Close">×</button>
        </div>
        <div class="modal-body modal-body-all" style="border-radius: 1rem">
          <div class="card chat_card">
            <div class="card-header chat_card--header">
              <div class="row">
                <ul class="nav nav-tabs chat_card--tabs d-flex" id="chat_box"
                    role="tablist">
                  <li class="nav-item flex-fill" role="presentation">
                    <button class="nav-link w-100 chat_card--btn active" id="home-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#bordered-justified-home" type="button" role="tab"
                            aria-controls="home" aria-selected="true">
                      <i class="bi bi-chat-fill"></i> &nbsp;&nbsp; Public
                    </button>
                  </li>
                  <li class="nav-item flex-fill" role="presentation">
                    <button class="nav-link w-100 chat_card--btn" id="profile-tab" data-bs-toggle="tab"
                            data-bs-target="#bordered-justified-profile" type="button" role="tab"
                            aria-controls="profile" aria-selected="false"><i
                        class="bi bi-chat-heart-fill"></i>
                      &nbsp;&nbsp; Private
                    </button>
                  </li>
                  <li class="nav-item flex-fill" role="presentation">
                    <button class="nav-link w-100 chat_card--btn" id="contact-tab" data-bs-toggle="tab"
                            data-bs-target="#bordered-justified-contact" type="button" role="tab"
                            aria-controls="contact" aria-selected="false"><i
                        class="bi bi-people-fill"></i>
                      &nbsp;&nbsp; 2100
                    </button>
                  </li>
                </ul>
              </div>
            </div>
            <div class="card-body position-relative chat_card--body" style="height:500px;">
              <div class="tab-content pt-2 mt-20 h-100" id="chat_boxContent">
                
                <div class="tab-pane fade px-3" id="bordered-justified-contact" role="tabpanel"
                     aria-labelledby="contact-tab">
                  <h6>30 Watching Now</h6>
                  <div>
                    <span class="text-gray">Users with tokens: </span>
                    <span>10</span>
                  </div>
                  <div>
                    <span class="text-gray">Others: </span>
                    <span>20</span>
                  </div>
                  <div class="mt-3 stream__user" v-for="n in 7">
                    <span class="stream__user--level">
                      <span>{{ n }}</span>
                    </span>
                    <span class="text-gray font-bold">&nbsp;abhay sexy</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "SendtipModal",
};
</script>

