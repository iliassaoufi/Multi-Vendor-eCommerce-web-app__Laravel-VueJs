<template>
  <a @click="gotoProduct()" class="default-btn btn-list ">
    <i class="fa fa-eye"></i>
  </a>
</template>
<script>
export default {
  name: "order",

  props: {
    id: {
      type: String,
      default: "100",
    },
  },
  data() {
    return {};
  },
  mounted() {},
  methods: {
    gotoProduct() {
      this.$router.push({ path: "/product/" + this.id });
      console.log(Number(this.id));
    },
  },
};
</script>
<style scoped>
.btn-list {
  padding: 15px;
  font-size: 20px;

  text-align: center;
  text-transform: capitalize;
}
</style>
