<template>
  <div class="checkout-area pt-95 pb-100">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div class="billing-info-wrap">
            <h3>Billing Details</h3>
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="billing-info mb-20">
                  <label>User Name</label>
                  <input type="text" v-model="order.username" />
                </div>
              </div>

              <div class="col-lg-6 col-md-6">
                <div class="billing-info mb-20">
                  <label>Phone</label>
                  <input type="text" v-model="order.phone" />
                </div>
              </div>
              <div class="col-lg-12 col-md-12">
                <div class="billing-info mb-20">
                  <label>Email </label>
                  <input type="text" v-model="order.email" />
                </div>
              </div>
              <div class="col-lg-6 col-md-6">
                <div class="billing-info mb-20">
                  <label>Country</label>
                  <input type="text" v-model="order.country" />
                </div>
              </div>
              <div class="col-lg-6 col-md-6">
                <div class="billing-info mb-20">
                  <label>City</label>
                  <input type="text" v-model="order.city" />
                </div>
              </div>
              <div class="col-lg-12">
                <div class="billing-info mb-20">
                  <label>Street Address</label>
                  <input type="text" v-model="order.address" />
                </div>
              </div>
            </div>
            <br />
            <br />

            <div class="additional-info-wrap">
              <h4>Additional information</h4>
              <div class="additional-info">
                <label>You can leave a notes for your order </label>
                <textarea v-model="order.note"></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="your-order-area">
            <h3>Your order</h3>
            <div class="your-order-wrap gray-bg-4">
              <div class="your-order-product-info">
                <div class="your-order-top">
                  <ul>
                    <li>Product</li>
                    <li>Total</li>
                  </ul>
                </div>
                <div class="your-order-middle">
                  <ul>
                    <li
                      :key="index"
                      v-for="(item, index) in $store.state.cartItem"
                    >
                      <span class="order-middle-left"
                        >{{ item.product.name }} X {{ item.quantity }}</span
                      >
                      <span class="order-price"
                        >{{
                          Number(item.product.price) * Number(item.quantity)
                        }}
                      </span>
                    </li>
                  </ul>
                </div>

                <div class="your-order-bottom">
                  <ul>
                    <li class="your-order-shipping">Shipping</li>
                    <li>Free shipping</li>
                  </ul>
                </div>

                <div class="your-order-total">
                  <ul>
                    <li class="order-total">Total</li>
                    <li>{{ $store.state.cartTotalPrice }}</li>
                  </ul>
                </div>
              </div>
              <div class="payment-method">
                <div class="payment-accordion element-mrg">
                  <div class="panel-group" id="accordion">
                    <div class="panel payment-accordion">
                      <div class="panel-heading" id="method-one">
                        <h4 class="panel-title">
                          <a
                            data-toggle="collapse"
                            data-parent="#accordion"
                            href="#method1"
                          >
                            Paypal Paymment
                          </a>
                        </h4>
                      </div>
                      <div id="method1" class="panel-collapse collapse show">
                        <div class="panel-body">
                          <form
                            action="https://www.paypal.com/cgi-bin/webscr"
                            method="post"
                          >
                            <!-- Identify your business so that you can collect the payments. -->
                            <input
                              type="hidden"
                              name="business"
                              value="herschelgomez@xyzzyu.com"
                            />

                            <!-- Specify a Buy Now button. -->
                            <input type="hidden" name="cmd" value="_xclick" />

                            <!-- Specify details about the item that buyers will purchase. -->
                            <input
                              type="hidden"
                              name="item_name"
                              value="Hot Sauce-12oz. Bottle"
                            />
                            <input type="hidden" name="amount" value="5.95" />
                            <input
                              type="hidden"
                              name="currency_code"
                              value="USD"
                            />

                            <!-- Display the payment button. -->
                            <input
                              class="paypal-btn"
                              type="submit"
                              name="submit"
                              border="0"
                              src=""
                              value="Paypal"
                              alt="Buy Now"
                            />
                            <img
                              alt=""
                              border="0"
                              width="1"
                              height="1"
                              src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif"
                            />
                          </form>
                        </div>
                      </div>
                    </div>

                    <div class="panel payment-accordion">
                      <div class="panel-heading" id="method-three">
                        <h4 class="panel-title">
                          <a
                            class="collapsed"
                            data-toggle="collapse"
                            data-parent="#accordion"
                            href="#method3"
                          >
                            Cash on delivery
                          </a>
                        </h4>
                      </div>
                      <div id="method3" class="panel-collapse collapse">
                        <div class="panel-body">
                          <p>
                            Please send a check to Store Name, Store Street,
                            Store Town, Store State / County, Store Postcode.
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="Place-order mt-25">
              <Alert :loading="loading" :errored="errored" :show="show" />
              <a
                v-if="!show || errored || loading"
                class="btn-hover"
                @click="placeOrder()"
                >Place Order</a
              >
              <router-link
                v-if="show && !errored && !loading"
                to="/"
                class="btn-hover"
                >Go To Home</router-link
              >
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import Alert from "../Main/Alert";

export default {
  name: "Checkout",
  components: {
    Alert,
  },

  data: function() {
    return {
      order: {
        id: 0,
        userID: 1,
        username: "iliass",
        phone: "",
        email: "iliass@gmail.com",
        country: "morocco",
        city: "",
        address: "",
        note: "",
        orderItem: [],
      },
      loading: false,
      errored: false,
      show: false,
    };
  },
  mounted() {
    this.orderItems();
  },
  methods: {
    orderItems() {
      let orderItem;
      let orderItems = this.$store.state.cartItem;

      for (let i = 0; i < orderItems.length; i++) {
        orderItem = {
          productId: orderItems[i].product.id,
          ProductPrice: orderItems[i].product.price,
          quantity: orderItems[i].quantity,
          optionId: orderItems[i].option,
        };
        this.order.orderItem.push(orderItem);
      }
    },
    placeOrder() {
      this.loading = true;
      this.errored = false;
      this.show = true;
      const url = this.$store.state.Api + "createOrder";
      const userorder = {
        user_id: this.order.userID,
        statut_achat: 0,
        name: this.order.username,
        phone: this.order.phone,
        email: this.order.email,
        address:
          this.order.country +
          " , " +
          this.order.city +
          " , " +
          this.order.address,
        note: this.order.note,
      };

      axios
        .post(url, userorder)
        .then((response) => {
          //  console.log(response.data);
          this.order.id = response.data.orderId;
          console.log(this.order.id);
          this.placeOrderItems();
        })
        .catch((error) => {
          console.log(error);
          this.errored = true;
        })
        .finally(() => (this.loading = false));
    },
    placeOrderItems() {
      for (let i = 0; i < this.order.orderItem.length; i++) {
        this.placeOrderItem(i);
      }
    },
    placeOrderItem(index) {
      const url = this.$store.state.Api + "createOrderItem";
      const userOrderItem = {
        produit_id: "" + this.order.orderItem[index].productId,
        carte_id: this.order.id,
        qte: this.order.orderItem[index].quantity,
        prix: "" + this.order.orderItem[index].ProductPrice,
      };
      console.log(userOrderItem);

      axios.post(url, userOrderItem).then((response) => {
        console.log(response.data);
      });
    },
  },
};
</script>
<style scoped>
.your-order-area .Place-order > a,
.billing-info-wrap .checkout-account-toggle button.checkout-btn {
  border-radius: 0;
}
</style>
