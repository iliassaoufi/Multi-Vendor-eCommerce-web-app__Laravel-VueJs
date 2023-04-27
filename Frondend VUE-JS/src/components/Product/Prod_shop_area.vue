<template>
  <!--
  <h1>{{ $store.state.cartItem }}</h1>
  <h1>*******{{ $store.state.cartTotalPrice }}</h1>
  -->
  <div class="shop-area pt-100 pb-100">
    <div class="container">
      <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-12">
          <div class="product-details-img mr-20 product-details-tab">
            <div
              id="carouselIndicators"
              class="carousel slide"
              data-ride="carousel"
            >
              <div class="carousel-inner">
                <div
                  :key="index"
                  v-for="(img, index) in product.images"
                  :class="[index == 0 ? 'active' : '', 'carousel-item']"
                >
                  <div class="banner-area pb-70">
                    <div class="row">
                      <img
                        :src="
                          'http://localhost/Laravel/projetPFA/storage/app/' +
                            img.path
                        "
                      />
                    </div>
                  </div>
                </div>
              </div>
              <a
                class="carousel-control-prev"
                href="#carouselIndicators"
                role="button"
                data-slide="prev"
              >
                <i class="fa fa-angle-left"></i>
              </a>
              <a
                class="carousel-control-next"
                href="#carouselIndicators"
                role="button"
                data-slide="next"
              >
                <i class="fa fa-angle-right"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-5 col-lg-5 col-md-12">
          <div class="product-details-content">
            <h2>{{ product.name }}</h2>
            <div class="product-details-price">
              <div v-if="product.salePrice == '' || product.salePrice == null">
                <span>{{ product.price }} </span>
              </div>
              <div v-else>
                <span>{{ product.salePrice }} </span>
                <span class="old">{{ product.price }}</span>
              </div>
            </div>
            <hr />

            <div class="pro-details-rating-wrap">
              <div class="pro-details-rating">
                <i
                  :key="i"
                  v-for="i in Math.ceil(String(product.rating))"
                  class="fa fa-star-o yellow"
                ></i>
                <i
                  :key="i"
                  v-for="i in 5 - Math.ceil(String(product.rating))"
                  class="fa fa-star-o "
                ></i>
              </div>
              <span
                ><a href="#">{{ product.reviews.length }} Reviews</a></span
              >
            </div>

            <p>
              {{ product.shortDescription }}
            </p>
            <div v-if="product.option.name == 4" class="product-option">
              <div class="form-group">
                <select
                  style="border-radius : 0"
                  class="form-control"
                  v-model="selectedOption"
                >
                  <option disabled value="">Please select one</option>
                  <option
                    :key="index"
                    v-for="(option, index) in optoinsToSelect.other"
                    :value="option.id"
                    >{{ option.value }}</option
                  >
                </select>
              </div>
            </div>
            <br />
            <br />
            <hr />
            <br />
            <div
              v-if="product.option.name != 0 && product.option.name != null"
              class="pro-details-size-color"
            >
              <div
                v-if="product.option.name == 1 || product.option.name == 3"
                class="pro-details-color-wrap"
              >
                <span>Color</span>
                <div
                  v-if="optoinsToSelect.color"
                  class="pro-details-color-content"
                >
                  <ul>
                    <li
                      @click="selectedChoice(op, $event, 1)"
                      :key="index"
                      v-for="(op, index) in optoinsToSelect.color"
                      :style="{ background: op.value }"
                    ></li>
                  </ul>
                </div>
              </div>
              <div
                v-if="product.option.name == 2 || product.option.name == 3"
                class="pro-details-size"
              >
                <span>Size</span>
                <div class="pro-details-size-content">
                  <ul>
                    <li
                      @click="selectedChoice(op, $event, 2)"
                      :key="index"
                      v-for="(op, index) in optoinsToSelect.size"
                    >
                      <a>{{ op.value }}</a>
                    </li>
                  </ul>
                </div>
              </div>
              <hr />
            </div>

            <div class="pro-details-quality">
              <div class="cart-plus-minus">
                <input
                  type="number"
                  v-model="quantity"
                  class="cart-plus-minus-box"
                />
              </div>
              <div class="pro-details-cart btn-hover">
                <a @click="addToCart()">Add To Cart</a>
              </div>
              <div class="pro-details-wishlist">
                <a @click="addWishlist()">
                  <i
                    style=" color:red; font-size : 20px "
                    v-if="
                      $store.state.wishlist.includes(Number(productData.id))
                    "
                    class="fa fa-heart"
                  ></i>

                  <i v-else class="fa fa-heart-o"></i
                ></a>
              </div>
            </div>
            <div class="pro-details-meta">
              <span>Categories : </span>
              {{ product.categories }}

              <!--
              <ul>
                <li :key="index" v-for="(cat, index) in product.Categories">
                  <a href="#">{{ cat }}</a>
                </li>
              </ul>
              -->
            </div>

            <div class="pro-details-social">
              <ul>
                <li>
                  <a href="#"><i class="fa fa-facebook"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-dribbble"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-pinterest-p"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-twitter"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-linkedin"></i></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "Prod_shop_area",
  props: ["product"],
  data: function() {
    return {
      productData: {
        id: "",
        name: "",
        price: "",
        salePrice: "",
        description: "",
        shortDescription: "",
        rating: 0,
        option: {
          name: 0,
          options: [],
        },
        Categories: "",
        images: [],
        ProdRelated: [],
        reviews: [],
      },
      optoinsToSelect: {
        color: [],
        size: [],
        other: [],
      },

      quantity: 1,
      selectedOption: "", //this.product.option.options[0].id
    };
  },
  created() {
    this.productData = this.product;

    this.getOptions();
    this.getOptions();
  },

  mounted() {},
  methods: {
    getOptions() {
      const url = this.$store.state.Api + "getOption/" + this.product.id;
      axios
        .get(url)
        .then((response) => {
          this.product.option.options = response.data;
          this.productData.option.options = response.data;
        })
        .then(() => {
          this.setOptions();
        });
    },
    setOptions() {
      //   this.optoinsToSelect.color = options;
      console.log("++++++++++++++++");

      console.log(this.product.option.name);

      if (this.product.option.name == 1) {
        this.optoinsToSelect.color = this.product.option.options;
      } else if (this.product.option.name == 2) {
        this.optoinsToSelect.size = this.product.option.options;
      } else if (this.product.option.name == 3) {
        let op = this.product.option.options;
        this.optoinsToSelect.color = [];
        this.optoinsToSelect.size = [];

        //str.split("/")
        op.forEach((e) => {
          let r = e.value.split("/");
          console.log("00000000000000000000000000");
          console.log(r);
          this.optoinsToSelect.color.push({
            id: e.id,
            value: r[0],
          });
          this.optoinsToSelect.size.push({
            id: e.id,
            value: r[1],
          });
        });
        //  console.log("00000000000000000000000000");
        //console.log(this.optoinsToSelect.color);
      } else if (this.product.option.name == 4) {
        this.optoinsToSelect.other = this.product.option.options;
      }
    },

    addToCart() {
      console.log("click" + this.quantity + this.selectedOption);
      this.$store.commit("increment", {
        product: this.product,
        quantity: this.quantity,
        option: this.selectedOption,
      });
      this.$store.commit("setTotal");
    },
    addWishlist() {
      this.$store.commit("toWishlist", Number(this.productData.id));
    },
    selectedChoice(e, event, type) {
      const element = event.target;
      if (type == 1) {
        const elements = document.getElementsByClassName("addBorder");
        elements.forEach((i) => {
          i.classList.remove("addBorder");
        });
        element.classList.add("addBorder");
      }
      if (type == 2) {
        const elements = document.getElementsByClassName("addBlack");
        elements.forEach((i) => {
          i.classList.remove("addBlack");
        });
        element.classList.add("addBlack");
      }

      //----------------------
      this.selectedOption = e.id;
      this.product.price = e.price;
      //  console.log(this.selectedOption);
    },
  },
};
</script>

<style scoped>
a .fa-angle-right,
a .fa-angle-left {
  color: #222;
  font-size: 50px;
}
.banner-area img {
  height: 680px;
  width: 100%;
  object-fit: cover;
  object-position: center;
}
.product-option {
  margin: 50px auto;
}
.product-details-content .pro-details-size-color .pro-details-color-wrap {
  height: 80px;
}
.product-details-content
  .pro-details-size-color
  .pro-details-color-wrap
  .pro-details-color-content
  ul
  li {
  width: 25px;
  height: 25px;
  border: 2px solid rgba(255, 255, 255, 0.488);
}
.product-details-content
  .pro-details-size-color
  .pro-details-color-wrap
  .pro-details-color-content
  ul
  li:hover {
  width: 30px;
  height: 30px;
}
.addBorder {
  border: 7px solid rgba(255, 255, 255, 0.488) !important;
  width: 30px !important;
  height: 30px !important;
}
.addBlack {
  background-color: #c03131 !important;
  color: #f1f2f6 !important;

  font-size: 15px !important;
}
</style>
