<template>
  <div class="store-info col-md-12">
    <div class="contact-social welcome-content">
      <h1>Caterories</h1>
    </div>
  </div>
  <br />
  <br />
  <br />
  <div class="contact-form">
    <form class="contact-form-style container">
      <div class="row">
        <div class="col-md-7 in_row">
          <input v-model="category" placeholder="Category Name *" type="text" />
          <button @click="AddCategory()" type="button" data-dismiss="modal">
            Add
          </button>
        </div>
      </div>
    </form>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
          <form action="#">
            <div class="table-content table-responsive cart-table-content">
              <table>
                <thead>
                  <tr>
                    <th>Category name</th>

                    <th style="width:30%"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr :key="index" v-for="(cat, index) in categories">
                    <td class="">
                      {{ cat.name }}
                    </td>

                    <td>
                      <div class="shopping-cart-btn btn-hover ">
                        <Update @update="upd" :id="cat.id" :name="cat.name" />
                        <Delete
                          @del="del"
                          :index="index"
                          :id="cat.id"
                          :name="cat.name"
                        />
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import Update from "./Update";
import Delete from "./Delete";
export default {
  name: "category",
  components: {
    Update,
    Delete,
  },
  data: function() {
    return {
      category: "",
      categories: [],
    };
  },
  mounted() {
    this.setCategories();
  },
  methods: {
    setCategories() {
      const url =
        this.$store.state.Api +
        "getStoreCategory/" +
        this.$store.state.userSroreId;

      axios.get(url).then((response) => {
        this.categories = response.data;
      });
    },
    AddCategory() {
      const url = this.$store.state.Api + "addCategory/";
      const cat = {
        name: this.category,
        store_id: this.$store.state.userSroreId,
      };
      axios.post(url, cat).then((response) => {
        this.setCategories();
      });
    },
    del(val) {
      this.categories.splice(val, 1);
    },
    upd() {
      this.setCategories();
    },
  },
};
</script>
<style scoped>
.modal-header {
  border-bottom: 0px solid #dee2e6;
}
.in_row {
  display: flex;
}
.in_row input {
  height: 50px !important;
}
.in_row button {
  margin: 0;
  height: 50px;
}
.contact-form {
  padding: 0;
}

table {
  width: 80%;
  margin-bottom: 100px;
}
table td,
table th {
  text-align: left !important;
  padding: 20px 30px !important;
}
.product-img-small {
  height: 65px;
  width: 50px;
  object-fit: cover;
}
.shopping-cart-btn {
  display: inline-flex;
}
</style>
