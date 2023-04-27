<template>
  <h1>{{}}</h1>
  <ProdShop :product="product" />
  <ProdDescreption @refresh="getComments" :product="product" />

  <ProdRelated :SameStoreProducts="SameStoreProducts" />
</template>
<script>
import ProdShop from "./Prod_shop_area";
import ProdDescreption from "./Prod_description";
import ProdRelated from "./Prod_related";
export default {
  name: "Product", //
  components: {
    ProdShop,
    ProdDescreption,
    ProdRelated,
  },
  props: {
    productId: Number,
  },
  data: function() {
    return {
      product: {
        id: this.productId,
        storeId: "",
        name: "",
        price: "",
        salePrice: "",
        quantity: "",
        description: "",
        shortDescription: "",
        rating: 0,
        option: {
          name: "",
          options: [],
        },
        Categories: "",
        images: [],
        //  ProdRelated: [],
        reviews: [],
      },
      onSale: false,
      test: "",
      SameStoreProducts: [],
    };
  },
  mounted() {
    this.product.id = this.productId;

    // this.product.ProdRelated = [1, 2, 3, 5, 5, 6];
    this.setProduct();
    if (this.product.salePrice != "" || this.product.salePrice != null)
      this.onSale = true;
    //---------
  },

  methods: {
    setProduct() {
      const url = this.$store.state.Api + "SpecificProduit/" + this.productId;
      axios.get(url).then((response) => {
        response.data = response.data[0];
        this.product.id = response.data.id;
        this.product.storeId = response.data.store_id;
        this.product.name = response.data.titre;
        this.product.price = response.data.prix;
        this.product.quantity = response.data.qte;
        this.product.salePrice = null;
        this.product.description = response.data.description;
        this.product.shortDescription = response.data.shortDescription;
        this.product.option.name = response.data.option_name;
        this.product.categories = response.data.catName;

        this.getImg();
        //this.getRating();
        //this.getOptions();
        this.getComments();
        //----
        this.SameStoreProduct();
      });
    },
    getImg() {
      const url = this.$store.state.Api + "productImages/" + this.productId;
      axios.get(url).then((response) => {
        this.product.images = response.data;
      });
    },

    getRating() {
      const url =
        this.$store.state.Api + "productRatingComments/" + this.productId;
      axios.get(url).then((response) => {
        this.product.rating = Math.ceil(String(response.data[0].productRating));
      });
    },
    getComments() {
      const url = this.$store.state.Api + "productComments/" + this.productId;
      axios.get(url).then((response) => {
        this.product.reviews = response.data;

        if (this.product.reviews.length > 0) {
          let sum = 0;
          this.product.reviews.forEach((e) => {
            sum += e.rating;
          });

          this.product.rating = sum / this.product.reviews.length;
        } else {
          this.product.rating = 0;
        }
      });
    },
    SameStoreProduct() {
      const url =
        this.$store.state.Api + "SameStoreProducts/" + this.product.storeId;
      axios.get(url).then((response) => {
        this.SameStoreProducts = response.data;
        // console.log(response.data);
      });
    },
  },
};
</script>
