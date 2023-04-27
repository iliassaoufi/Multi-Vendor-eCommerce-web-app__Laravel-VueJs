<template>
  <div class="store-info col-md-12">
    <div class="contact-social welcome-content">
      <h1>List Of Products</h1>
    </div>
  </div>

  <div class="cart-main-area pt-40 pb-100">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
          <form action="#">
            <div class="table-content table-responsive cart-table-content">
              <table>
                <thead>
                  <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <tr :key="index" v-for="(prod, index) in products">
                    <td class="">
                      <img
                        class="product-img-small"
                        :src="
                          'http://localhost/Laravel/projetPFA/storage/app/' +
                            prod.path
                        "
                      />
                    </td>
                    <td class="">
                      {{ prod.titre }}
                    </td>
                    <td class="">
                      {{ prod.prix }}
                    </td>

                    <td class="">
                      {{ prod.qte }}
                    </td>

                    <td>
                      <div class="shopping-cart-btn btn-hover ">
                        <Product :id="prod.id" />
                        <Update @update="upd" :id="prod.id" />
                        <Delete
                          @del="del"
                          :index="index"
                          :id="prod.id"
                          :name="prod.titre"
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
import Product from "./Product";
import Delete from "./Delete";

export default {
  name: "update_product",
  components: {
    Update,
    Product,
    Delete,
  },
  data() {
    return {
      products: [],
    };
  },
  mounted() {
    this.listProducts();
  },
  methods: {
    listProducts() {
      const url =
        this.$store.state.Api + "StoreProduct/" + this.$store.state.userSroreId;

      axios.get(url).then((response) => {
        console.log(response.data);
        this.products = response.data;
      });
    },
    del(val) {
      // console.log("+++++++++++++++++" + val);
      this.products.splice(val, 1);
    },
    upd() {
      this.listProducts();
    },
  },
};
</script>
<style scoped>
.modal-header {
  border-bottom: 0px solid #dee2e6;
}
table {
  width: 100%;
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
