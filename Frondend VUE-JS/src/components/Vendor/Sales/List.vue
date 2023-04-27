<template>
  <div class="store-info col-md-12">
    <div class="contact-social welcome-content">
      <h1>Sales</h1>
    </div>
  </div>

  <div class="cart-main-area pt-40 pb-100">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
          <form action="#">
            <div class="table-content table-responsive cart-table-content">
              <table>
                <thead>
                  <tr>
                    <th></th>
                    <th>Praducts</th>
                    <th>Quantity</th>

                    <th>Date</th>
                    <th>Order Id</th>
                    <th>Buyer Info</th>
                  </tr>
                </thead>
                <tbody>
                  <tr :key="index" v-for="(p, index) in productSales">
                    <td class="">
                      <img :src="p.path" height="60" alt="" />
                    </td>
                    <td class="">
                      {{ p.titre }}
                    </td>
                    <td class="">
                      {{ p.qte }} X {{ p.prix }} = {{ p.qte * p.prix }}dh
                    </td>

                    <td class="">
                      {{ convertDate(p.created_at) }}
                    </td>
                    <td class="">
                      {{ p.orderId }}
                    </td>
                    <td>
                      <div class="shopping-cart-btn btn-hover ">
                        <Buyer :buyerInfo="p" />
                      </div>
                    </td>
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
import Buyer from "./Buyer";
export default {
  name: "List_sales",
  components: {
    Buyer,
  },
  data: function() {
    return {
      productSales: [],
    };
  },
  mounted() {
    this.setInfo();
  },
  methods: {
    setInfo() {
      const url = this.$store.state.Api + "StoreOrderItem/" + 1; //  this.$store.state.userSroreId;

      axios.get(url).then((response) => {
        console.log(response.data);
        this.productSales = response.data;
      });
    },

    convertDate(date) {
      let dateObj = new Date(date);

      let myDate =
        dateObj.getUTCDate() +
        "/" +
        (dateObj.getMonth() + 1) +
        "/" +
        dateObj.getUTCFullYear();

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
