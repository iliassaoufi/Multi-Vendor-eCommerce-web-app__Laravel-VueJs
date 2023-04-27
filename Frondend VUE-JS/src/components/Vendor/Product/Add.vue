<template>
  <div class="store-info col-md-12">
    <div class="contact-social welcome-content">
      <h1 v-if="isUpdate">Update product</h1>
      <h1 v-else>Add product</h1>
    </div>
  </div>
  <div class="contact-form">
    <form class="contact-form-style">
      <div class="row">
        <div class="col-lg-6">
          <input
            v-model="product.name"
            placeholder="Product Name*"
            type="text"
          />
        </div>
        <div class="col-lg-6">
          <select v-model="product.category">
            <option selected disabled value="0"> select category </option>
            <option
              :key="index"
              v-for="(cat, index) in category"
              :value="cat.id"
            >
              {{ cat.name }}</option
            >
          </select>
        </div>
        <div class="col-lg-6">
          <input
            v-model="product.price"
            placeholder="Product Price*"
            type="text"
          />
        </div>

        <div class="col-lg-6">
          <input
            v-model="product.quantity"
            placeholder="Quantity in stock"
            type="number"
          />
        </div>
        <div class="col-lg-12">
          <textarea
            v-model="product.shortDescription"
            style="height: 100px;"
            placeholder="Short description"
          ></textarea>
        </div>

        <div class="col-lg-12">
          <textarea
            v-model="product.longDescription"
            placeholder="Long description"
          ></textarea>
        </div>
      </div>
      <div class="checkout-area pb-0 pt-50">
        <div class="">
          <div class="row">
            <div class="col-lg-12">
              <div class="checkout-wrapper">
                <div id="faq" class="panel-group">
                  <div class="panel panel-default single-my-account">
                    <div class="panel-heading my-account-title">
                      <h3 class="panel-title">
                        <span>1 .</span>
                        <a
                          data-toggle="collapse"
                          data-parent="#faq"
                          href="#my-account-1"
                          >Add imeges
                        </a>
                      </h3>
                    </div>
                    <div id="my-account-1" class="panel-collapse collapse show">
                      <div class="panel-body">
                        <div class="myaccount-info-wrapper">
                          <div class="row">
                            <div
                              class="col-lg-12 btn-add-delete"
                              v-if="!isUpdate"
                            >
                              <button
                                @click="imgPriv.length += 1"
                                type="button"
                              >
                                +
                              </button>
                              <button
                                @click="imgPriv.length -= 1"
                                type="button"
                              >
                                -
                              </button>
                            </div>
                            <div
                              class="col-lg-4"
                              :key="index"
                              v-for="(img, index) in imgPriv"
                            >
                              <div class="upload">
                                <div class="upload-img">
                                  <img v-bind:src="img" v-show="img" />
                                  <i v-show="!img" class="fa fa-image"></i>
                                </div>
                                <button
                                  v-if="!isUpdate"
                                  type="button"
                                  @click="$refs['img' + index].click()"
                                >
                                  <i class="fa fa-upload"> </i> Image
                                  {{ index + 1 }}
                                </button>
                                <input
                                  style="display:none"
                                  type="file"
                                  accept="image/*"
                                  @change="setImgPriv($event, index)"
                                  :ref="'img' + index"
                                />
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="panel panel-default single-my-account">
                  <div class="panel-heading my-account-title">
                    <h3 class="panel-title">
                      <span>2 .</span>
                      <a
                        data-toggle="collapse"
                        data-parent="#faq"
                        href="#my-account-2"
                        >Add Products Variation
                      </a>
                    </h3>
                  </div>
                  <div id="my-account-2" class="panel-collapse collapse ">
                    <div class="panel-body">
                      <div class="myaccount-info-wrapper">
                        <!--////////////////////////////////////////////////////-->

                        <div class="row justify-content-center pb-50">
                          <div class="col-8">
                            <select v-model="product.optionName">
                              <option selected value="0">
                                Select Variation
                              </option>
                              <option value="1"> Color </option>
                              <option value="2"> Size </option>
                              <option value="3"> Color / Size </option>
                              <option value="4"> Other Variation </option>
                            </select>
                          </div>
                          <div
                            v-if="product.optionName != 0"
                            class="col-lg-8 btn-add-delete"
                          >
                            <button @click="initOption(1)" type="button">
                              +
                            </button>
                            <button @click="initOption(-1)" type="button">
                              -
                            </button>
                          </div>
                        </div>
                        <div v-if="product.optionName == 1">
                          <div
                            :key="index"
                            v-for="(option, index) in options"
                            class="row justify-content-center"
                          >
                            <div class="col-1">
                              <input
                                v-model="options[index].value.color"
                                type="color"
                              />
                            </div>
                            <div class="col-3">
                              <input
                                v-model="options[index].value.color"
                                type="text"
                                placeholder="Color #EF0C5A "
                              />
                            </div>
                            <div class="col-3">
                              <input
                                v-model="options[index].price"
                                type="text"
                                placeholder="Price * "
                              />
                            </div>
                            <div class="col-3">
                              <input
                                v-model="options[index].quantity"
                                type="number"
                                placeholder="Quantity  "
                              />
                            </div>
                          </div>
                        </div>
                        <div
                          v-else-if="product.optionName == 2"
                          class="row  justify-content-center"
                        >
                          <div
                            :key="index"
                            v-for="(option, index) in options"
                            class="row justify-content-center"
                          >
                            <div class="col-4">
                              <input
                                v-model="options[index].value.size"
                                type="text"
                                placeholder="Size : XL "
                              />
                            </div>
                            <div class="col-4">
                              <input
                                v-model="options[index].price"
                                type="text"
                                placeholder="Price * "
                              />
                            </div>
                            <div class="col-4">
                              <input
                                v-model="options[index].quantity"
                                type="number"
                                placeholder="Quantity  "
                              />
                            </div>
                          </div>
                        </div>
                        <div
                          v-else-if="product.optionName == 3"
                          class="row  justify-content-center "
                        >
                          <div
                            :key="index"
                            v-for="(option, index) in options"
                            class="row justify-content-center"
                          >
                            <div class="col-1">
                              <input
                                v-model="options[index].value.color"
                                type="color"
                              />
                            </div>
                            <div class="col-2">
                              <input
                                v-model="options[index].value.color"
                                type="text"
                                placeholder="Color "
                              />
                            </div>
                            <div class="col-2">
                              <input
                                v-model="options[index].value.size"
                                type="text"
                                placeholder="Size  "
                              />
                            </div>
                            <div class="col-3">
                              <input
                                v-model="options[index].price"
                                type="text"
                                placeholder="Price * "
                              />
                            </div>
                            <div class="col-3">
                              <input
                                v-model="options[index].quantity"
                                type="number"
                                placeholder="Quantity  "
                              />
                            </div>
                          </div>
                        </div>
                        <div
                          v-else-if="product.optionName == 4"
                          class="row  justify-content-center "
                        >
                          <div
                            :key="index"
                            v-for="(option, index) in options"
                            class="row justify-content-center"
                          >
                            <div class="col-4">
                              <input
                                v-model="options[index].value.other"
                                type="text"
                                placeholder="Variation Value * "
                              />
                            </div>
                            <div class="col-4">
                              <input
                                v-model="options[index].price"
                                type="text"
                                placeholder="Price * "
                              />
                            </div>
                            <div class="col-4">
                              <input
                                v-model="options[index].quantity"
                                type="number"
                                placeholder="Quantity  "
                              />
                            </div>
                          </div>
                        </div>
                        <div
                          v-else
                          class="row  justify-content-center pt-50"
                        ></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <button
                class="send-btn"
                @click="productAction()"
                type="button"
                data-dismiss="modal"
              >
                Send
              </button>
              <Alert :loading="loading" :errored="errored" :show="show" />
              {{ product }}
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>
<script>
import Alert from "../../Main/Alert";

export default {
  name: "Add_Product",
  components: {
    Alert,
  },
  props: {
    id: null,
    isUpdate: false,
  },
  data: function() {
    return {
      product: {
        name: "",
        quantity: "",
        price: "",
        priceONSale: "",
        category: 0,
        shortDescription: "",
        longDescription: "",
        img: [],
        optionName: 0,
      },
      options: [],
      imgPriv: new Array(3),
      loading: false,
      errored: false,
      show: false,
    };
  },
  mounted() {
    this.initOption();
    this.setCategory();
    if (this.isUpdate) {
      this.setProduct();
    }
  },
  methods: {
    initOption(i) {
      let option = {
        value: {
          color: "",
          size: "",
          other: "",
        },
        price: "",
        quantity: "",
      };

      if (i > 0) {
        for (let j = 0; j < i; j++) this.options.push(option);
      } else if (i < 0) {
        for (let j = 0; j < -1 * i; j++) this.options.pop(option);
      } else {
        this.options.push(option);
      }
    },
    setProduct() {
      const url = this.$store.state.Api + "SpecificProduit/" + this.id;
      axios.get(url).then((response) => {
        response.data = response.data[0];
        this.product.id = response.data.id;
        this.product.name = response.data.titre;
        this.product.price = response.data.prix;
        this.product.quantity = response.data.qte;
        this.product.priceONSale = null;
        this.product.longDescription = response.data.description;
        this.product.shortDescription = response.data.shortDescription;

        this.getImg();
      });
    },
    getImg() {
      this.imgPriv = new Array();
      const url = this.$store.state.Api + "productImages/" + this.id;
      axios.get(url).then((response) => {
        console.log(response.data);
        response.data.forEach((e, index) => {
          this.imgPriv[index] = this.$store.state.imgUrl + e.path;
        });
      });
    },
    setCategory() {
      const url =
        this.$store.state.Api +
        "getStoreCategory/" +
        this.$store.state.userSroreId;

      axios.get(url).then((response) => {
        this.category = response.data;
      });
    },
    setImgPriv(event, i) {
      const Img = event.target.files[0];
      this.product.img[i] = Img;
      let reader = new FileReader();
      reader.readAsDataURL(Img);
      reader.onload = (e) => {
        this.imgPriv[i] = e.target.result;
      };
      console.log(this.product.img);
    },
    productAction() {
      if (this.isUpdate) {
        this.updateProduct();
      } else {
        this.addproduct();
      }
    },
    addproduct() {
      this.loading = true;
      this.errored = false;
      this.show = true;

      const url = this.$store.state.Api + "Addproduit";
      const prod = {
        store_id: this.$store.state.userSroreId,
        titre: this.product.name,
        description: this.product.longDescription,
        shortDescription: this.product.shortDescription,
        qte: this.product.quantity,
        prix: this.product.price,
        category_id: this.product.category,
        option_name: this.product.optionName,
      };
      axios
        .post(url, prod)
        .then((response) => {
          console.log(response.data);
          this.uploadOption(response.data.productId);
          this.uploadImg(response.data.productId);
          this.$emit("goToList", "");
        })
        .catch((error) => {
          console.log(error);
          this.errored = true;
        })
        .finally(() => {
          this.loading = false;
        });

      //  console.log("---------------------");
      //console.log(this.product);
    },
    uploadImg(id) {
      const url = this.$store.state.Api + "AddImage";

      for (let i = 0; i < this.product.img.length; i++) {
        let formData = new FormData();
        formData.append("produit_id", id);
        formData.append("file", this.product.img[i]);

        axios.post(url, formData).then((response) => {
          console.log(response.data);
        });
      }
    },
    uploadOption(id) {
      const url = this.$store.state.Api + "addOption";
      let option = [];
      let s = "";
      this.options.forEach((op, index) => {
        if (this.product.optionName == 1) s = op.value.color;
        if (this.product.optionName == 2) s = op.value.size;
        if (this.product.optionName == 3)
          s = op.value.color + "/" + op.value.size;
        if (this.product.optionName == 4) s = op.value.other;

        option[index] = {
          product_id: id,
          value: s,
          price: op.price,
          quantity: op.quantity,
        };
      });

      axios.post(url, option).then((response) => {
        console.log(response.data);
      });
    },
    updateProduct() {
      //   console.log("updateProduct");
      const url = this.$store.state.Api + "updateProduct/" + this.id;
      const prod = {
        titre: this.product.name,
        description: this.product.longDescription,
        shortDescription: this.product.shortDescription,
        qte: this.product.quantity,
        prix: this.product.price,
      };
      axios.post(url, prod).then((response) => {
        // console.log(response.data);
        // this.uploadImg(response.data.productId);
        this.$emit("update", "");
      });
    },
  },
};
</script>
<style scoped>
.contact-form {
  background-color: #ffffff;
  padding: 50px 60px;
}
.custom-file {
  margin-bottom: 30px;
}
.upload-img {
  width: 100%;
  height: 200px;
  background: #dedede3f;
  padding: 10px;
}
.upload {
  display: flex;
  flex-direction: column;
  margin-bottom: 50px;
}
.upload button {
  margin: 20px auto;
  width: 200px;
}
.upload-img img {
  height: 100%;
  width: 100%;
  object-fit: contain;
}
.upload-img .fa-image {
  width: 100%;
  margin-top: 50px;
  font-size: 100px;
  color: rgba(0, 0, 0, 0.153);
  text-align: center;
}
/************************* */

select {
  background: transparent;
  border: 1px solid #c1c1c1;
  height: 40px;
  padding: 2px 14px;
  margin-bottom: 30px;
  color: #000;
}

/*********************** */

.btn-add-delete {
  display: flex;
  justify-content: center;
}
.btn-add-delete button {
  margin: 0;
  margin-bottom: 20px;
  padding: 10px 25px;
  height: 40px;
}
.send-btn {
  width: 50%;
  height: 50px;
}
/**************************** */
input[type="color"] {
  padding: 1px 2px;
}
</style>
