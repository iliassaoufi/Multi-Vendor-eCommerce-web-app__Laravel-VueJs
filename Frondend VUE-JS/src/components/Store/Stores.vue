<template>
  <div class="shop-area pt-95 pb-100">
    <div class="container">
      <div class="row flex-row-reverse">
        <div class="col-lg-12">
          <div class="">
            <div class="row">
              <div class="col-8">
                <input
                  @input="filterByCategory()"
                  v-model="storeSearch"
                  class="form-control"
                  type="text"
                  placeholder="Searche ..."
                />
              </div>
              <div class="col-4">
                <select
                  @click="filterByCategory()"
                  class="form-control"
                  v-model="categorySlected"
                >
                  <option value="0"> All </option>
                  <option
                    :key="cat.id"
                    v-for="cat in categories"
                    :value="cat.id"
                  >
                    {{ cat.name }}</option
                  >
                </select>
              </div>
            </div>
          </div>
          <div class="shop-bottom-area">
            <div class="row">
              <div
                :key="store.id"
                v-for="store in showStores"
                class="col-xl-4 col-md-6 col-lg-4 col-sm-6"
              >
                <br />
                <div>
                  <StoreCard :id="store.id" />
                </div>
                <br />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import StoreCard from "./Store_card";
export default {
  name: "Stores",
  components: {
    StoreCard,
  },
  props: {
    id: 0,
  },
  data: function() {
    return {
      categories: [],
      stores: [],
      categorySlected: "",
      storeSearch: "",
      showStores: [],
    };
  },
  mounted() {
    this.categorySlected = Number(this.id);
    // console.log(this.categorySlected + "---" + this.id);
    this.categories = [
      { id: 12, name: "cat1" },
      { id: 20, name: "cat2" },
    ];

    this.stores = [
      {
        id: 1,
        name: "store1",
        categories: [20, 12],
      },
      {
        id: 2,
        name: "store2",
        categories: [20],
      },
      {
        id: 3,
        name: "store3",
        categories: [20, 12],
      },
      {
        id: 4,
        name: "store4",
        categories: [20, 12],
      },
    ];

    //--------------------------

    this.filterByCategory();
  },
  methods: {
    filterByCategory: function() {
      if (this.categorySlected == 0) this.showStores = this.stores;
      else
        this.showStores = this.stores.filter((item) =>
          item.categories.includes(this.categorySlected)
        );
      this.showStores = this.showStores.filter((item) =>
        item.name.includes(this.storeSearch)
      );
    },
  },
};
</script>
<style scoped>
select,
input {
  margin: 0;
  background: transparent;
  border: 2px solid #f1f1f1;
  height: 50px;
  margin-bottom: 30px;
  color: #000;
  width: 100%;
  padding: 0px 30px !important;
}
</style>
