<template>
  <a
    @click="ShowModel = true"
    class="default-btn btn-list "
    data-toggle="modal"
    data-target="#staticBackdrop"
  >
    <i class="fa fa-eye"> </i>
    see more
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
                <h1>Order Details</h1>
              </div>
            </div>
            <div class="order-info row">
              <div class="col-md-12">
                <div class="order-item ">
                  <div class="col-4">
                    <h4>Date :</h4>
                    <p>{{ ord.date }}</p>
                  </div>
                  <div class="col-4">
                    <h4>State :</h4>
                    <p v-if="ord.state == 0">in processing</p>
                    <p v-if="ord.state == 1">completed</p>
                    <p v-if="ord.state == -1">canceled</p>
                  </div>
                  <div class="col-4">
                    <h4>Total Price :</h4>
                    <p>{{ ord.totalPrice }} dhs</p>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="order-item ">
                  <select
                    @click="changeState()"
                    v-model="ord.state"
                    class="form-control"
                  >
                    <option selected disabled>Change State</option>
                    <option value="0"> in processing </option>
                    <option value="1"> completed </option>
                    <option value="-1"> canceled</option>
                  </select>
                </div>
              </div>
              <div :key="prod.id" v-for="prod in ord.products" class="col-md-6">
                <div class="order-item ">
                  <img :src="prod.img" />
                  <div class="info">
                    <h4>{{ prod.name }}</h4>
                    <p>
                      Quantity : {{ prod.quantity }}
                      <br />
                      Price : {{ prod.price }} dh
                    </p>
                  </div>
                </div>
              </div>
            </div>

            <div class="Buyer-Information container">
              <h3>Buyer Information :</h3>
              <div class="row">
                <div class="col-lg-5 col-md-12">
                  <div class="">
                    <label>Name</label>
                    <h4>{{ ord.buyer.name }}</h4>
                  </div>
                </div>

                <div class="col-lg-6 col-md-12">
                  <div class="">
                    <label>Email Address</label>
                    <h4>{{ ord.buyer.email }}</h4>
                  </div>
                </div>
                <div class="col-lg-5 col-md-12">
                  <div class="">
                    <label>Phone</label>
                    <h4>{{ ord.buyer.phone }}</h4>
                  </div>
                </div>
                <div class="col-lg-6 col-md-12">
                  <div class="">
                    <label>Address</label>
                    <h4>{{ order.buyer.address }}</h4>
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
  name: "order",

  props: {
    ord: Object,
  },
  data() {
    return {
      order: {
        id: "",
        date: "",
        state: "",
        totalPrice: "",
        product: [],
        buyer: {
          name: "",
          email: "",
          phone: "",
          address: "",
        },
      },

      ShowModel: false,
    };
  },
  mounted: function() {
    this.setInfo();
    console.log(this.ord);
  },
  methods: {
    changeState() {
      console.log(this.order.state);
    },
    getBuyerInfo() {
      this.$store.state.Api + "userCartes/" + this.$store.state.user.id;
      axios.post(url, "").then((response) => {});
    },
    setInfo() {
      this.order = {
        id: this.ord.id,
        date: this.ord.date,
        state: this.ord.state,
        totalPrice: this.ord.totalPrice,
        product: this.ord.product,
        buyer: {
          name: "iliass aoufi",
          email: "eee@",
          phone: "448",
          address: "Morocco , fes , zouhour 37",
        },
      };
    },
  },
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
  padding: 30px 20px;
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
  font-size: 15px;
}
.Buyer-Information label {
  color: #6b6b6b;
  font-size: 12px;
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
