import { createStore } from "vuex";

export default createStore({
  state: {
    Api: "http://127.0.0.1:8000/api/",
    imgUrl: "http://localhost/Laravel/projetPFA/storage/app/",
    token: JSON.parse(localStorage.getItem("token")) || null,
    user: JSON.parse(localStorage.getItem("user")) || null,
    cartItem: JSON.parse(localStorage.getItem("cart")) || [],
    cartTotalPrice: 0,
    wishlist: JSON.parse(localStorage.getItem("wishlist")) || [],
    userSroreId: JSON.parse(localStorage.getItem("userSroreId")) || "",
  },
  mutations: {
    //----------------- user --------------------------
    setToken(state, token) {
      state.token = token;
      localStorage.setItem("token", JSON.stringify(state.token));
    },
    setUser(state, user) {
      state.user = user;
      localStorage.setItem("user", JSON.stringify(state.user));
    },
    UpdateUserRole(state, role) {
      state.user.role = role;
      localStorage.setItem("user", JSON.stringify(state.user));
    },
    UserStoreId(state, id) {
      state.userSroreId = id;
      localStorage.setItem("userSroreId", JSON.stringify(state.userSroreId));
    },
    checkUser(state) {},
    //----------------- cart --------------------------
    increment(state, item) {
      state.cartItem.push(item);
      localStorage.setItem("cart", JSON.stringify(state.cartItem));
    },

    setTotal(state) {
      let p = 0;
      let price = state.cartItem.map((value, index, array) => {
        return value.product.price * value.quantity;
      });
      price.forEach((i) => {
        p += Number(i);
      });
      state.cartTotalPrice = p;
    },
    cartDeleteItem(state, index) {
      state.cartItem.splice(index, 1);
      localStorage.setItem("cart", JSON.stringify(state.cartItem));
      // setTotal();
    },
    //--------------------- wishlist -----------------------

    toWishlist(state, item) {
      if (state.wishlist.includes(item)) {
        const i = state.wishlist.indexOf(item);
        state.wishlist.splice(i, 1);
        localStorage.setItem("wishlist", JSON.stringify(state.wishlist));
      } else {
        state.wishlist.push(item);
        localStorage.setItem("wishlist", JSON.stringify(state.wishlist));
      }
    },
  },

  actions: {},
  modules: {},
});
