<template>
  <div class="related-product-area pb-95">
    <div class="container">
      <div class="section-title text-center mb-50">
        <h2>Store's Products</h2>
      </div>

      <div class="row">
        <div
          :key="index"
          v-for="(prod, index) in SameStoreProducts"
          class="col-xl-3 col-md-6 col-lg-4 col-sm-6"
        >
          <ProductCard :id="prod.id" />
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import ProductCard from "./Product_Card";
export default {
  name: "prod_related",
  components: {
    ProductCard,
  },
  props: {
    SameStoreProducts: {},
  },
  data: function() {
    return {
      productsRelated: [],
    };
  },

  mounted() {},
  methods: {
    /*
    bestProducts() {
      const url = this.$store.state.Api + "bestProducts";
      axios.get(url).then((response) => {
        this.ProductBest = response.data;
        // console.log(response.data);
      });
    },
    */
  },
};
</script>
