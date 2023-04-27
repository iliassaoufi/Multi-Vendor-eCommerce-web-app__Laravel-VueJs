<template>
  <Header />
  <router-view :key="$route.path" />
  <Footer />
</template>
<script>
import Header from "./components/Main/Header";
import Footer from "./components/Main/Footer";
export default {
  name: "App",
  components: {
    Header,
    Footer,
  },
  mounted() {
    //  this.$store.state.cartItem = $cookies.get("cart");
  },
};
</script>

<style lang="scss"></style>
