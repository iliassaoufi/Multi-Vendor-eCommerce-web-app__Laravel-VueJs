<template>
  <div class="product-area pb-60">
    <div class="container">
      <div class="section-title text-center">
        <h2>DAILY DEALS</h2>
      </div>
      <div class="product-tab-list nav pt-30 pb-55 text-center">
        <a class="active" href="#product-1" data-toggle="tab">
          <h4>New Arrivals</h4>
        </a>
        <a href="#product-2" data-toggle="tab">
          <h4>Best Sellers</h4>
        </a>
        <!--
        <a href="#product-3" data-toggle="tab">
          <h4>Sale Items</h4>
        </a>
        -->
      </div>
      <div class="tab-content jump">
        <div class="tab-pane active" id="product-1">
          <div class="row">
            <div
              :key="index"
              v-for="(prod, index) in ProductNew"
              class="col-xl-3 col-md-6 col-lg-4 col-sm-6"
            >
              <ProductCard :id="prod.id" />
            </div>
          </div>
        </div>
        <div class="tab-pane " id="product-2">
          <div class="row">
            <div
              :key="index"
              v-for="(prod, index) in ProductBest"
              class="col-xl-3 col-md-6 col-lg-4 col-sm-6"
            >
              <ProductCard :id="prod.id" />
            </div>
          </div>
        </div>
        <!--
        <div class="tab-pane" id="product-3">
          <div class="row">
            <div
              :key="index"
              v-for="(id, index) in ProductSale"
              class="col-xl-3 col-md-6 col-lg-4 col-sm-6"
            >
              <ProductCard :id="id" />
            </div>
          </div>
        </div>
        -->
      </div>
    </div>
  </div>
</template>
<script>
import ProductCard from "../Product/Product_Card";
export default {
  name: "Group_products",
  components: {
    ProductCard,
  },
  data: function() {
    return {
      ProductNew: [],
      ProductBest: [],
      ProductSale: [],
    };
  },
  mounted() {
    this.newProducts();
    this.bestProducts();
    // this.ProductNew = [12, 65, 45, 48, 85];
    // this.ProductBest = [12, 65, 45, 85];
    // this.ProductSale = [12, 65, 45, 85];
  },
  methods: {
    newProducts() {
      const url = this.$store.state.Api + "newProducts";
      axios.get(url).then((response) => {
        this.ProductNew = response.data;
        // console.log(response.data);
      });
    },
    bestProducts() {
      const url = this.$store.state.Api + "bestProducts";
      axios.get(url).then((response) => {
        this.ProductBest = response.data;
        // console.log(response.data);
      });
    },
  },
};
</script>

<style scoped>
.active h4 {
  font-size: 24px !important;
}
.product-tab-list a {
  margin: auto 15px;
}
</style>
