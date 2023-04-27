<template>
  <Contactcomponent />
</template>

<script>
import Contactcomponent from "../components/Contact/Contact";
export default {
  name: "Contact",
  components: {
    Contactcomponent,
  },
  mounted() {
    window.scrollTo(0, 0);
  },
};
</script>
<style scoped lang="scss"></style>
