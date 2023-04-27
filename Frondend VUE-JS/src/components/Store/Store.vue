<template>
  <div class=".container-fluid">
    <div class="row" style="margin:0">
      <div class="img-cover col-md-12">
        <img alt="" :src="store.imgCover" />
      </div>
      <div class=" col-md-4">
        <div class="img-logo ">
          <img alt="" :src="store.imgProfile" />
        </div>
      </div>
      <div class="store-info col-md-7">
        <div class="contact-social welcome-content">
          <h1>{{ store.name }}</h1>
          <p>
            {{ store.description }}

            <br />
            <br />
            <i class="fa fa-envelope"></i> : {{ store.email }}
            <br />
            <i class="fa fa-phone"></i> : {{ store.phone }}
          </p>
        </div>
      </div>
    </div>
  </div>

  <div class="store-product">
    <div class="shop-area pt-95 pb-100">
      <div class="container">
        <div class="row flex-row-reverse">
          <div class="col-lg-9">
            <div class="shop-bottom-area mt-35">
              <div class="tab-content jump">
                <div id="shop-1" class="tab-pane active">
                  <div class="row">
                    <div
                      :key="prod.id"
                      v-for="prod in store.product"
                      class="col-xl-4 col-md-6 col-lg-6 col-sm-6"
                    >
                      <Product :id="prod.id" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="pro-pagination-style text-center mt-30">
                <ul>
                  <li>
                    <a class="prev" href="#"
                      ><i class="fa fa-angle-double-left"></i
                    ></a>
                  </li>
                  <li><a class="active" href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li>
                    <a class="next" href="#"
                      ><i class="fa fa-angle-double-right"></i
                    ></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
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
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import Product from "../Product/Product_Card";
export default {
  name: "Store",
  props: {
    id: Number,
  },
  components: {
    Product,
  },
  data: function() {
    return {
      store: {
        id: "",
        name: "",
        description: "",
        phone: "",
        email: "",
        imgCover: "",
        imgProfile: "",
        product: Array,
      },
    };
  },
  mounted() {
    this.setStore();
    this.getProductStore();
  },

  methods: {
    setStore() {
      const url = this.$store.state.Api + "SpecificStore/" + this.id;
      axios.get(url).then((response) => {
        console.log(response.data);
        this.store = {
          name: response.data.name,
          description: response.data.description,
          phone: response.data.numero,
          email: response.data.email,
          imgCover:
            "http://localhost/Laravel/projetPFA/storage/app/" +
            response.data.image_coverture,
          imgProfile:
            "http://localhost/Laravel/projetPFA/storage/app/" +
            response.data.image_profil,
        };
        this.store.id = this.id;
      });
    },

    getProductStore() {
      const url = this.$store.state.Api + "StoreProduct/" + this.id;

      axios.get(url).then((response) => {
        this.store.product = response.data;
      });
    },
  },
};
</script>
<style scoped>
.img-cover img {
  height: 450px;
  width: 100%;
  object-fit: cover;
  object-position: center;
}

.img-logo {
  height: 300px;
  width: 300px;
  border-radius: 50%;
  background: #f3f3f3;
  box-shadow: 1px 1px 20px #20202063;
  margin-top: -150px;
  margin-left: 50px;
  display: flex;
  justify-content: center;
  align-items: center;
}

.img-logo img {
  width: 300px;
  padding: 40px;
}

.store-info h1,
.store-info p,
.store-info ul {
  margin-left: 30px;
}
</style>
