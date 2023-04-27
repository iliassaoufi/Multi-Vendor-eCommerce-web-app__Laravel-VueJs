<template>
  <a
    @click="ShowModel = true"
    class="default-btn btn-list "
    data-toggle="modal"
    data-target="#staticBackdrop"
  >
    <i class="fa fa-eye"> </i>
    Buyer Info
  </a>

  <!-- Modal -->
  <div v-if="ShowModel">
    <div
      class="modal fade"
      id="staticBackdrop"
      data-backdrop="static"
      data-keyboard="false"
      tabindex="-1"
      aria-labelledby="staticBackdropLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <!--<h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>-->
            <button
              @click="ShowModel = false"
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="store-info col-md-12">
              <div class="contact-social welcome-content">
                <h1>Buyer Details</h1>
              </div>
            </div>

            <div class="Buyer-Information container">
              <div class="row">
                <div class="col-lg-6 col-md-12">
                  <div class="">
                    <label>Name</label>
                    <h4>{{ buyerInfo.name }}</h4>
                  </div>
                </div>

                <div class="col-lg-6 col-md-12">
                  <div class="">
                    <label>Phone</label>
                    <h4>{{ buyerInfo.phone }}</h4>
                  </div>
                </div>
                <div class="col-lg-12 col-md-12">
                  <div class="">
                    <label>Email Address</label>
                    <h4>{{ buyerInfo.email }}</h4>
                  </div>
                </div>
                <div class="col-lg-12 col-md-12">
                  <div class="">
                    <label>Address</label>
                    <h4>{{ buyerInfo.address }}</h4>
                  </div>
                </div>
                <div
                  v-if="!(buyerInfo.note == null)"
                  class="col-lg-12 col-md-12"
                >
                  <div class="">
                    <label>Order note </label>
                    <h4>{{ buyerInfo.note }}</h4>
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
  name: "buyer",

  props: {
    buyerInfo: Object,
  },
  data() {
    return {
      ShowModel: false,
    };
  },
  mounted() {},
};
</script>
<style scoped>
.btn-list {
  padding: 15px;
  font-size: 15px;
  width: 130px;
  text-align: center;
  text-transform: capitalize;
}
.contact-social {
  margin-top: 0;
}
.modal-dialog {
  margin: 3% auto;
  max-width: 700px;
  width: 700px;
}
.modal-header {
  padding: 8px 20px;
}
.Buyer-Information {
  background: #f6f6f8;
  padding: 10px 20px;
  border-radius: 20px;
  margin: 20px auto;
}
.Buyer-Information h3 {
  color: #222222;
  font-size: 18px;
  font-weight: 500;
}
.Buyer-Information h4 {
  color: #424242;
  font-size: 17px;
}
.Buyer-Information label {
  color: #6b6b6b;
  font-size: 14px;
  padding-top: 20px;
}
.Buyer-Information label::after {
  content: " :";
}
/**********************************/
.order-info .order-item {
  background: #f6f6f8;
  margin: 10px auto;
  padding: 15px 20px;
  border-radius: 20px;
  display: flex;
}
.order-info .order-item img {
  width: 70px;
  height: 80px;
  object-fit: cover;
}
.order-info .order-item .info {
  margin-left: 20px;
}
.order-info .order-item h4 {
  color: #222222;
  font-size: 18px;
  font-weight: 500;
}
.order-info .order-item p {
  color: #6b6b6b;
  font-size: 12px;
}
</style>
