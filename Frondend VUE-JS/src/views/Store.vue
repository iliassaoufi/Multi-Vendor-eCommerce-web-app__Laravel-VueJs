<template>
  <StoreComponent :id="storeId" />
</template>

<script>
import StoreComponent from "../components/Store/Store";
export default {
  name: "Store",
  components: {
    StoreComponent,
  },
  data: function() {
    return {
      storeId: this.$route.params.id,
    };
  },
  mounted() {
    window.scrollTo(0, 0);
  },
};
</script>
<style scoped></style>
