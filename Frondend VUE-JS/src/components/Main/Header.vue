<template>
  <header
    class="header-area header-padding-1 sticky-bar header-res-padding clearfix"
  >
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-2 col-lg-2 col-md-6 col-4">
          <div class="logo">
            <router-link to="/">
              MALL.
            </router-link>
          </div>
        </div>
        <div class="col-xl-8 col-lg-8 d-none d-lg-block">
          <div class="main-menu">
            <nav>
              <ul>
                <li>
                  <router-link to="/">Home</router-link>
                </li>
                <!--
                <li>
                  <a>Categories<i class="fa fa-angle-down"></i></a>
                  <ul class="mega-menu mega-menu-padding">
                    <li :key="index" v-for="(i, index) in 2">
                      <ul>
                        <li
                          :key="index"
                          v-for="(cat, index) in categories.slice(
                            Math.ceil(categories.length / 2) * (i - 1),
                            i * Math.ceil(categories.length / 2)
                          )"
                        >
                          <router-link :to="'/Stores/' + cat.id">{{
                            cat.name
                          }}</router-link>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </li>
                -->
                <li>
                  <router-link to="/Products">All Products</router-link>
                </li>
                <li>
                  <router-link to="/Stores/0">Stores</router-link>
                </li>
                <li>
                  <router-link to="/About">About</router-link>
                </li>
                <li><router-link to="/Contact">Contact</router-link></li>
              </ul>
            </nav>
          </div>
        </div>
        <div class="col-xl-2 col-lg-2 col-md-6 col-8">
          <div class="header-right-wrap">
            <Search />
            <!---->
            <div class="same-style account-satting">
              <a class="account-satting-active" href="#"
                ><i class="pe-7s-user-female"></i
              ></a>

              <div class="account-dropdown">
                <ul>
                  <li v-if="$store.state.user != null">
                    <router-link to="/User">Profile</router-link>
                  </li>
                  <li v-if="$store.state.user == null">
                    <router-link to="/Login/login">Login</router-link>
                  </li>
                  <li v-if="$store.state.user == null">
                    <router-link to="/Login/register">Register</router-link>
                  </li>
                </ul>
              </div>
            </div>
            <div class="same-style header-wishlist">
              <a href="wishlist.html"><i class="pe-7s-like"></i></a>
            </div>
            <Cart />
          </div>
        </div>
      </div>
    </div>
  </header>

  <!--
    ***************************************************************
  -->
</template>
<script>
import Cart from "../Checkout/Cart";
import Search from "./search";
export default {
  name: "Header",
  components: {
    Cart,
    Search,
  },
  data: function() {
    return {
      categories: [],
    };
  },
  mounted: function() {
    this.$store.commit("setTotal");
    this.jquery();
    this.setCategory();
  },
  methods: {
    jquery() {
      $(".account-satting-active , .search-active").on("click", function(e) {
        e.preventDefault();
        $(this)
          .parent()
          .find(".account-dropdown , .search-content")
          .slideToggle("medium");
      });
      /* Cart dropdown */
      var iconCart = $(".icon-cart");
      iconCart.on("click", function() {
        $(".shopping-cart-content").toggleClass("cart-visible");
      });
    },
    setCategory() {
      this.categories = [
        { id: 12, name: "cat1" },
        { id: 20, name: "cat2" },
        { id: 20, name: "cat3" },
      ];
    },
  },
};
</script>
<style scoped>
header {
  background: #fff;
}
ul.mega-menu {
  width: 450px !important;
}
.logo a {
  font-size: 40px;
  color: #c0392b !important;
  letter-spacing: 10px;
}
.logo a:hover {
  letter-spacing: 15px;
}
header {
  box-shadow: 0px 0px 30px rgba(59, 59, 59, 0.1);
}
</style>
