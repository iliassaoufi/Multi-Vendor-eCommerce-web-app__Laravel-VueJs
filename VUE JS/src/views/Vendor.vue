<template>
  <VendorCoponent />
</template>
<script>
import VendorCoponent from "../components/Vendor/Vendor";
export default {
  name: "Vendor",
  components: {
    VendorCoponent,
  },
  mounted() {
    window.scrollTo(0, 0);
  },
};
</script>
