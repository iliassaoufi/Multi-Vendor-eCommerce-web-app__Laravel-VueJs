<template>
  <div class="product-area pt-0 pb-60">
    <div class="container">
      <div class="section-title text-center pt-40 pb-40">
        <h2>
          Our Stors
        </h2>
      </div>
      <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div
            :key="index"
            v-for="(i, index) in Math.ceil(storesId.length / 3)"
            :class="[index == 0 ? 'active' : '', 'carousel-item']"
          >
            <div class="banner-area pb-70">
              <div class="row">
                <div
                  :key="store.id"
                  v-for="store in storesId.slice(-3 + i * 3, i * 3)"
                  class="col-lg-4 col-md-4"
                  style="margin : 0  ; padding : 5px"
                >
                  <StoreCard :id="store.id" />
                </div>
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
</template>

<script>
import StoreCard from "../Store/Store_card";
export default {
  name: "stores",
  components: {
    StoreCard,
  },
  data() {
    return {
      storesId: [],
    };
  },
  mounted: function() {
    // this.storesId = [1, 2, 3, 4, 5, 6, 7];
    this.getAllStores();
  },
  methods: {
    getAllStores() {
      const url = this.$store.state.Api + "allStores";
      axios.get(url).then((response) => {
        this.storesId = response.data;
        // console.log(response.data);
      });
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
.carousel-control-next,
.carousel-control-prev {
  background: #fff;
  width: 4%;
  opacity: 0.2;
  border-radius: 100px;
  margin: -5%;
}
.pb-70 {
  padding-bottom: 0px;
}
.product-area {
  margin-bottom: 60px;
}
</style>
