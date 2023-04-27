<template>
  <AboutComponent />
</template>

<script>
import AboutComponent from "../components/About/About";
export default {
  name: "About",
  components: {
    AboutComponent,
  },
  mounted() {
    window.scrollTo(0, 0);
  },
};
</script>
<style scoped lang="scss"></style>
