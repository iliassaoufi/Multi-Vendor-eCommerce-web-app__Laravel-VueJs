<template>
  <div class="container">
    <div class="store-info col-md-12">
      <div class="contact-social welcome-content">
        <h1>My Wishlist</h1>
      </div>
    </div>

    <div class="row">
      <div
        :key="index"
        v-for="(id, index) in productWishlist"
        class="col-xl-4 col-md-6 col-lg-4 col-sm-6 pad-small"
      >
        <ProductCard :id="id" />
      </div>
    </div>
  </div>
</template>
<script>
import ProductCard from "../Product/Product_Card";
export default {
  name: "",
  props: {
    user: Object,
  },
  components: {
    ProductCard,
  },
  data: function() {
    return {
      productWishlist: [],
    };
  },
  mounted() {
    this.setProductWishlist();
  },
  methods: {
    setProductWishlist() {
      this.productWishlist = this.$store.state.wishlist;
    },
  },
};
</script>
<style scoped>
.store-info h1 {
  margin-bottom: 100px;
}
.pad-small {
  padding: 20px 40px;
}
</style>
