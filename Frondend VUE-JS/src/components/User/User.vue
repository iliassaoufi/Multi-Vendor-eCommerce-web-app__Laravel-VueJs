<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 menu">
        <div>
          <h2>
            User <br />
            <small> Panel </small>
          </h2>
        </div>
        <div class="menu-link">
          <a @click="index = 1" class="btn "> My Account </a>
          <a @click="index = 2" class="btn "> My Purchases </a>
          <a @click="index = 3" class="btn "> My Wishlist </a>
          <a v-if="user.role == 0" @click="index = 4" class="btn ">
            Create Store</a
          >
          <a v-if="user.role == 1" @click="gotoStore()" class="btn ">
            Go To Store</a
          >
          <a @click="logout()" class="btn "> Logout </a>
        </div>
      </div>
      <div class="col-lg-9">
        <div class="animation-slow" v-if="index == 1">
          <Account :user="user" />
        </div>
        <div class="animation-slow" v-else-if="index == 2">
          <Purchases :user="user" />
        </div>
        <div class="animation-slow" v-else-if="index == 3">
          <Wishlist :user="user" />
        </div>
        <div class="animation-slow" v-else-if="index == 4">
          <CreateStore :user="user" />
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import Account from "./myAccount";
import Purchases from "./myPurchases";
import Wishlist from "./myWishlist";
import CreateStore from "./CreateStore";
export default {
  name: "Vondor",
  components: {
    Account,
    Purchases,
    Wishlist,
    CreateStore,
  },
  data() {
    return {
      user: this.$store.state.user,
      index: 1,
    };
  },
  mounted: function() {
    this.checkUser();
  },
  methods: {
    checkUser() {
      console.log(this.$store.state.user);
      if (this.$store.state.user == null) {
        this.$router.push("/");
      }
    },
    logout() {
      this.$store.commit("setUser", null);
      this.$store.commit("setToken", null);
      this.$router.push("/");
    },
    gotoStore() {
      if (this.user.role == 1) this.$router.push("/Vendor");
    },
  },
};
</script>
<style scoped>
/*******************************/
.menu {
  background-color: #f6f6f8;
  min-height: 90vh;
  color: #fff;
  padding: 0;
}

.menu h2 {
  margin: 0;
  padding: 3rem 1rem 4rem 2rem;
  background-color: #f3f3f5;
  font-size: 2.5rem;
  font-weight: 300;
}

.menu h2 small {
  font-size: 1rem;
  font-weight: 300;
}

.menu .menu-link {
  font-size: 1rem;
  font-weight: 300;
  margin: 0;
  padding: 0;
  width: 100%;
  height: 40vh;
  position: absolute;
}

.menu .menu-link .btn {
  display: inline-block;
  color: #222;
  background-color: #f6f6f8;
  font-size: 1rem;
  font-weight: 600;
  border-radius: 0;
  width: 100%;
  padding: 1.3rem 0rem 1.3rem 4rem;
  transition: all 0.3s ease-in;
  text-align: start;
}

.menu .menu-link .btn:hover {
  color: #7b241c;
  background-color: #fff;
}

.menu .menu-link .btn .bi {
  font-size: 1.5rem;
  margin-right: 1rem;
}
.animation-slow {
  animation-name: animation-slow;
  animation-duration: 0.25s;
  animation-timing-function: cubic-bezier(0.3, 0.6, 0.8, 1);
}
@keyframes animation-slow {
  0% {
    transform: translateY(15px);
  }

  100% {
    transform: translateY(0px);
  }
}

/**********************************************************************/
</style>
