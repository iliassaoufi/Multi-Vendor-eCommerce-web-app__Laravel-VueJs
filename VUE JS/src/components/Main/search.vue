<template>
  <div class="same-style header-search">
    <a v-on:click="Cart_search" class="search-active" href="#"
      ><i class="pe-7s-search"></i
    ></a>
    <div class="search-content">
      <form>
        <select v-model="selected">
          <option value="1">Products</option>
          <option value="2">Stores</option>
        </select>
        <input v-model="search" type="text" placeholder="Search" />
        <button @click="research()" type="button" class="button-search">
          <i class="pe-7s-search"></i>
        </button>
      </form>
      <br />
      <div class="result">
        <div v-if="products.length > 0" class="row">
          <div
            class="col-md-5 blok"
            :key="index"
            v-for="(prod, index) in products"
          >
            <img :src="$store.state.imgUrl + prod.path" />
            <router-link :to="'/Product/' + prod.id">
              <h5>{{ prod.titre }} <i class="fa fa-arrow-right"></i></h5
            ></router-link>
          </div>
        </div>

        <div v-if="stores.length > 0" class="row">
          <div class="col-md-5 blok" :key="index" v-for="(st, index) in stores">
            <img :src="$store.state.imgUrl + st.image_profil" />
            <router-link :to="'/Store/' + st.id">
              <h5>{{ st.name }} <i class="fa fa-arrow-right"></i></h5
            ></router-link>
          </div>
        </div>
        <div v-if="result == -1">
          <div
            class="alert alert-warning alert-dismissible fade show"
            role="alert"
          >
            Does Not Exist
            <button
              type="button"
              class="close"
              data-dismiss="alert"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "search",
  data: function() {
    return {
      search: "",
      selected: 1,
      products: [],
      stores: [],
      result: 0,
    };
  },
  methods: {
    research() {
      this.result = 1;
      this.products = [];
      this.stores = [];
      if (this.selected == 1) this.researchProducts();
      if (this.selected == 2) this.researchStore();
      /*
      console.log(this.search + "---" + this.selected);

      this.$router.push({
        name: "Product",
        params: {
          id: "1",
        },
      });
      */
    },
    researchProducts() {
      const url = this.$store.state.Api + "searchProducts/" + this.search;

      axios.get(url).then((response) => {
        console.log(response.data);
        this.products = response.data;
        if (response.data.length) {
          this.result = 1;
        } else {
          this.result = -1;
        }
      });
    },
    researchStore() {
      const url = this.$store.state.Api + "searshStore/" + this.search;

      axios.get(url).then((response) => {
        console.log(response.data);
        this.stores = response.data;
        if (response.data.length) {
          this.result = 1;
        } else {
          this.result = -1;
        }
      });
    },
  },
};
</script>
<style scoped>
.header-right-wrap .same-style.header-search .search-content form {
  display: flex;
}
.header-right-wrap .same-style.header-search .search-content form input {
  width: 350px;
  border-radius: 0;
}
.header-right-wrap .same-style.header-search .search-content form select {
  border: 1px solid #d3d3d3;
  border-right-width: 0px;
  outline: medium none;
  padding: 5px 72px 5px 15px;
  transition: all 0.4s ease 0s;
  width: 180px;
  color: #000;
  background: transparent;
  border-radius: 0;
}
.result .blok {
  background-color: rgba(239, 239, 239, 0.522);
  padding: 10px;
  margin: 10px 10px;
  display: flex;
  align-items: center;
}
.result .blok h5 {
  margin-left: 10px;
  font-size: 16px;
}
.result .blok h5:hover {
  padding-bottom: 5px;
  font-weight: 500;
  border-bottom: 2px solid #bbb;
}
.result img {
  object-fit: cover;
  height: 60px;
  width: 50px;
}
.result .row {
  margin-bottom: 20px;
}
.fa-arrow-right {
  color: #bbb;
}
</style>
