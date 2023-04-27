<template>
  <ProductsComponent />
</template>

<script>
import ProductsComponent from "../components/Product/Products";
export default {
  name: "Producttts",
  components: {
    ProductsComponent,
  },
  data: function() {
    return {
      // productId: this.$route.params.id,
    };
  },
  mounted() {
    window.scrollTo(0, 0);
  },
};
</script>
<style scoped lang="scss"></style>
