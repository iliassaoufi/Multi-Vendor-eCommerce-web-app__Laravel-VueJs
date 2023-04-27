<template>
  <div class="store-info col-md-12">
    <div class="contact-social welcome-content">
      <h1>My Perchases</h1>
    </div>
  </div>

  <div class="cart-main-area pt-40 pb-100">
    <div class="container">
      <div class="row">
        <div class="col-lg-11 col-md-12 col-sm-12 col-12">
          <form action="#">
            <div class="table-content table-responsive cart-table-content">
              <table>
                <thead>
                  <tr>
                    <th>Date</th>
                    <th>Order</th>
                    <th>Total Price</th>
                    <th>Order state</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <tr :key="index" v-for="(order, index) in orders">
                    <td class="">
                      <strong>{{ order.date }}</strong>
                    </td>
                    <td class="">
                      <div :key="index" v-for="(p, index) in order.products">
                        {{ p.name }} x {{ p.quantity }} <br />
                      </div>
                    </td>
                    <td class="">
                      {{ order.totalPrice }}
                    </td>
                    <td class="">
                      <p v-if="order.state == 0">in processing</p>
                      <p v-if="order.state == 1">completed</p>
                      <p v-if="order.state == -1">canceled</p>
                    </td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "",
  props: {
    user: Object,
  },
  data: function() {
    return {
      orders: [],
    };
  },
  mounted() {
    this.setOrders();
  },
  methods: {
    setOrders() {
      const url = this.$store.state.Api + "userCartes/" + this.user.id;

      axios.post(url, "").then((response) => {
        response.data.forEach((element, index) => {
          this.orders.push({
            date: this.convertDate(element.created_at),
            products: [],
            totalPrice: 0,
            state: element.statut_achat,
          });
          this.getOrderItem(element.id, index);
        });
      });
    },
    getOrderItem(orderId, index) {
      const url = this.$store.state.Api + "carteProducts/" + orderId;
      let items = new Array();
      let price = 0;

      axios.get(url, "").then((response) => {
        response.data.forEach((e) => {
          items.push({ name: e.titre, quantity: e.qte, price: e.prix });
          price += e.qte * e.prix;
        });
        this.orders[index].products = items;
        this.orders[index].totalPrice = price;
      });
    },
    convertDate(date) {
      let dateObj = new Date(date);

      let myDate =
        dateObj.getUTCFullYear() +
        "/" +
        (dateObj.getMonth() + 1) +
        "/" +
        dateObj.getUTCDate();
      return myDate;
    },
  },
};
</script>
<style scoped>
table {
  width: 100%;
}
table td,
table th {
  text-align: left !important;
  padding: 20px 30px !important;
}
</style>
