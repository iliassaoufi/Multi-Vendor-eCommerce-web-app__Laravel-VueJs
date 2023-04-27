<template>
  <div class="store-product">
    <div class="shop-area pt-95 pb-100">
      <div class="container">
        <div class="row flex-row-reverse">
          <div class="col-lg-12">
            <div class="shop-bottom-area mt-35">
              <div class="tab-content jump">
                <div id="shop-1" class="tab-pane active">
                  <div class="row">
                    <div
                      :key="prod.id"
                      v-for="prod in products.slice(-8 + i * 8, i * 8)"
                      class="col-xl-3 col-md-6 col-lg-6 col-sm-6"
                    >
                      <Product :id="prod.id" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="pro-pagination-style text-center mt-30">
                <ul>
                  <li>
                    <a class="prev" @click="if (i > 1) i -= 1;"
                      ><i class="fa fa-angle-double-left"></i
                    ></a>
                  </li>
                  <!--
                  <li><a class="active" href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  -->
                  <li>
                    <a
                      class="next"
                      @click="if (i < products.length / 8) i += 1;"
                      ><i class="fa fa-angle-double-right"></i
                    ></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <!--
          <div class="col-lg-3">
            <div class="sidebar-style mr-30">
              <div class="sidebar-widget">
                <h4 class="pro-sidebar-title">Search</h4>
                <div class="pro-sidebar-search mb-50 mt-25">
                  <form class="pro-sidebar-search-form" action="#">
                    <input type="text" placeholder="Search here..." />
                    <button>
                      <i class="pe-7s-search"></i>
                    </button>
                  </form>
                </div>
              </div>
              <div class="sidebar-widget">
                <h4 class="pro-sidebar-title">Refine By</h4>
                <div class="sidebar-widget-list mt-30">
                  <ul>
                    <li>
                      <div class="sidebar-widget-list-left">
                        <input type="checkbox" />
                        <a href="#">On Sale <span>4</span> </a>
                        <span class="checkmark"></span>
                      </div>
                    </li>

                    <li>
                      <div class="sidebar-widget-list-left">
                        <input type="checkbox" value="" />
                        <a href="#">In Stock <span>4</span> </a>
                        <span class="checkmark"></span>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="sidebar-widget mt-45">
                <h4 class="pro-sidebar-title">Filter By Price</h4>
                <div class="price-filter mt-10">
                  <div class="price-slider-amount">
                    <label for="customRange2">Example range</label>
                    <input
                      type="range"
                      class="custom-range"
                      min="0"
                      max="50000"
                      id="customRange2"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
          -->
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import Product from "./Product_Card";

export default {
  name: "products",
  components: {
    Product,
  },
  data: function() {
    return {
      products: [],
      i: 1,
    };
  },

  mounted() {
    this.getAllProducts();
  },
  methods: {
    getAllProducts() {
      const url = this.$store.state.Api + "allproducts";
      axios.get(url).then((response) => {
        this.products = response.data;
        console.log(response.data);
      });
    },
  },
};
</script>
