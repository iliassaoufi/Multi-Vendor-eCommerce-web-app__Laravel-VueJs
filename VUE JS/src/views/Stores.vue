<template>
  <StoresComponet :id="categoryId" />
</template>

<script>
import StoresComponet from "../components/Store/Stores";
export default {
  name: "Stores",
  components: {
    StoresComponet,
  },
  data: function() {
    return {
      categoryId: this.$route.params.id,
    };
  },
  mounted() {
    window.scrollTo(0, 0);
  },
};
</script>
<style scoped lang="scss"></style>
