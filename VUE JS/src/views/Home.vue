<template>
  <HomeComponent />
</template>

<script>
import HomeComponent from "../components/Home/Home";
export default {
  name: "Home",
  components: {
    HomeComponent,
  },
  mounted() {
    window.scrollTo(0, 0);
  },
};
</script>
<style scoped lang="scss"></style>
