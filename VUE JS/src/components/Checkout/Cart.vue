<template>
  <div class="same-style cart-wrap">
    <button class="icon-cart">
      <i class="pe-7s-shopbag"></i>
      <span class="count-style">{{ $store.state.cartItem.length }}</span>
    </button>
    <div class="shopping-cart-content">
      <ul>
        <li
          :key="index"
          v-for="(item, index) in $store.state.cartItem"
          class="single-shopping-cart"
        >
          <CartItem :cartitem="item" :index="index" />
        </li>
      </ul>
      <div class="shopping-cart-total">
        <h4>
          Total Cart :
          <span class="shop-total">{{ $store.state.cartTotalPrice }}</span>
        </h4>
      </div>
      <div class="shopping-cart-btn btn-hover text-center">
        <router-link class="default-btn" to="/Checkout">checkout</router-link>
      </div>
    </div>
  </div>
</template>
<script>
import CartItem from "./Cart_item";
export default {
  name: "cart",
  components: {
    CartItem,
  },
};
</script>
