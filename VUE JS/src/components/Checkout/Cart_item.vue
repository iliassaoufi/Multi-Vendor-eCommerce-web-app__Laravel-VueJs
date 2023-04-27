<template>
  <div class="shopping-cart-img">
    <a href="#"
      ><img alt="" :src="$store.state.imgUrl + cartitem.product.images[0].path"
    /></a>
  </div>
  <div class="shopping-cart-title">
    <h4>
      <a href="#">{{ cartitem.product.name }}</a>
    </h4>
    <h6>Qty: {{ cartitem.quantity }}</h6>
    <span>Price :{{ cartitem.product.price }} dhs</span>
  </div>
  <div class="shopping-cart-delete">
    <a @click="deleteItem()"><i class="fa fa-times-circle"></i></a>
  </div>
</template>
<script>
export default {
  name: "Cart_item",
  props: {
    cartitem: Object,
    index: Number,
  },
  methods: {
    deleteItem() {
      this.$store.commit("cartDeleteItem", this.index);
      this.$store.commit("setTotal");
    },
  },
};
</script>
<style scoped>
.shopping-cart-img img {
  height: 50px;
  width: 40px;
}
</style>
