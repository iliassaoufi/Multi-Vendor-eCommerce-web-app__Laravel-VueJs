<template>
  <ProductComponent :productId="productId" />
</template>

<script>
import ProductComponent from "../components/Product/Product";
export default {
  name: "Producttt",
  components: {
    ProductComponent,
  },
  data: function() {
    return {
      productId: this.$route.params.id,
    };
  },
  mounted() {
    window.scrollTo(0, 0);
  },
};
</script>
<style scoped lang="scss"></style>
