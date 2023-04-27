<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 menu">
        <div>
          <h2>
            Vendor <br />
            <small> Panel </small>
          </h2>
        </div>
        <div class="menu-link">
          <a @click="index = 1" class="btn "> Account info </a>
          <a @click="index = 2" class="btn "> Update info </a>
          <a @click="index = 3" class="btn "> Sales </a>
          <a @click="index = 4" class="btn "> Add Product</a>
          <a @click="index = 5" class="btn ">List Of Product</a>
          <a @click="index = 6" class="btn ">categories</a>
        </div>
      </div>
      <div class="col-lg-9">
        <div class="animation-slow" v-if="index == 1">
          <InfoAccount />
        </div>
        <div class="animation-slow" v-else-if="index == 2">
          <UpdateAccount />
        </div>
        <div class="animation-slow" v-else-if="index == 3">
          <Sales />
        </div>
        <div class="animation-slow" v-else-if="index == 4">
          <AddProduct @goToList="index = 5" />
        </div>
        <div class="animation-slow" v-else-if="index == 5">
          <ListProduct />
        </div>
        <div class="animation-slow" v-else-if="index == 6">
          <Category />
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import InfoAccount from "./Account/Info";
import UpdateAccount from "./Account/Update";
import Sales from "./Sales/List";
import AddProduct from "./Product/Add";
import ListProduct from "./Product/List";
import Category from "./Category/Category";
export default {
  name: "Vondor",
  components: {
    InfoAccount,
    UpdateAccount,
    Sales,
    AddProduct,
    ListProduct,
    Category,
  },

  data() {
    return {
      index: 1,
    };
  },
  mounted: function() {},
  watch: {
    index: function() {
      window.scrollTo(0, 0);
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
