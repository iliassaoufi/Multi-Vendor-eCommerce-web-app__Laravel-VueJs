<template>
  <div class="product-area pb-60">
    <div class="container">
      <div class="section-title text-center">
        <h2>Recommended product</h2>
      </div>

      <div class="row">
        <div
          :key="index"
          v-for="(id, index) in productIds"
          class="col-xl-3 col-md-6 col-lg-4 col-sm-6"
        >
          {{ id }}
          <ProductCard :id="id" />
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import ProductCard from "../Product/Product_Card";
export default {
  name: "Recommended_products",
  components: {
    ProductCard,
  },
  data: function() {
    return {
      productIds: [],
    };
  },
  mounted() {
    this.productIds = [1, 2, 3, 4];
  },
};
</script>
