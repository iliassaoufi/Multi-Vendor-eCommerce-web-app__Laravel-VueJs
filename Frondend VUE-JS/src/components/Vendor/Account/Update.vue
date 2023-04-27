<template>
  <div class="store-info col-md-12">
    <div class="contact-social welcome-content">
      <h1>Create Store</h1>
    </div>
  </div>
  <div class="contact-form">
    <form class="contact-form-style">
      <div class="row">
        <div class="col-lg-6">
          <div class="upload">
            <!--
            <div class="upload-img">
              <img v-bind:src="imageCoverPreview" v-show="imageCoverPreview" />
              <i v-show="!imageCoverPreview" class="fa fa-image"></i>
            </div>
           
            <button type="button" @click="$refs.coverImgInput.click()">
              <i class="fa fa-upload"> </i> Store Cover
            </button>
            <input
              style="display:none"
              type="file"
              accept="image/*"
              @change="uploadImageCover($event)"
              ref="coverImgInput"
            />
            -->
          </div>
        </div>
        <div class="col-lg-6">
          <div class="upload">
            <!--
            <div class="upload-img">
              <img v-bind:src="imageLogoPreview" v-show="imageLogoPreview" />
              <i v-show="!imageLogoPreview" class="fa fa-image"></i>
            </div>
           
            <button type="button" @click="$refs.logoImgInput.click()">
              <i class="fa fa-upload"> </i> store Logo
            </button>
            <input
              style="display:none"
              type="file"
              accept="image/*"
              @change="uploadImageLogo($event)"
              ref="logoImgInput"
            />
            -->
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <input v-model="store.name" placeholder="Store Name" type="text" />
        </div>
        <div class="col-lg-12">
          <input v-model="store.email" placeholder="Store Email" type="email" />
        </div>
        <div class="col-lg-12">
          <input v-model="store.phone" placeholder="Store Phone" type="text" />
        </div>

        <div class="col-lg-12">
          <textarea
            v-model="store.description"
            placeholder="Store description"
          ></textarea>
          <button @click="updateStore()" type="button">SEND</button>
          <Alert :loading="loading" :errored="errored" :show="show" />
        </div>
      </div>
    </form>
    <p class="form-messege"></p>
  </div>
</template>
<script>
import Alert from "../../Main/Alert";

export default {
  name: "Update_account_info",
  components: {
    Alert,
  },
  data: function() {
    return {
      store: {
        name: "",
        description: "",
        email: "",
        phone: "",
        imgCover: "",
        imgLogo: "",
      },
      imageCoverPreview: "",
      imageLogoPreview: "",
      loading: false,
      errored: false,
      show: false,
    };
  },
  mounted() {
    this.setStore();
    this.fileInput();
  },
  methods: {
    fileInput() {
      $('input[type="file"]').change(function(e) {
        var fileName = e.target.files[0].name;
        $(".custom-file-label").html(fileName);
      });
    },
    uploadImageCover(event) {
      const Img = event.target.files[0];
      this.store.imgCover = Img;
      let reader = new FileReader();
      reader.readAsDataURL(Img);
      reader.onload = (e) => {
        this.imageCoverPreview = e.target.result;
      };
    },
    uploadImageLogo(event) {
      const Img = event.target.files[0];
      this.store.imgLogo = Img;
      let reader = new FileReader();
      reader.readAsDataURL(Img);
      reader.onload = (e) => {
        this.imageLogoPreview = e.target.result;
      };
    },
    updateStore() {
      this.loading = true;
      this.errored = false;
      this.show = true;
      const storeId = this.$store.state.userSroreId;
      const url = this.$store.state.Api + "updateStore/" + storeId;

      //console.log("++++++++++");

      let formData = new FormData();

      formData.append("name", this.store.name);
      formData.append("email", this.store.email);
      formData.append("description", this.store.description);
      formData.append("imgLogo", "this.store.imgLogo");
      formData.append("imgCover", "this.store.imgCover");
      formData.append("numero", this.store.phone);

      axios
        .post(url, formData)
        .then((response) => {
          console.log(response.data);
        })
        .catch((error) => {
          console.log(error);
          this.errored = true;
        })
        .finally(() => (this.loading = false));
    },

    setStore() {
      const storeId = this.$store.state.userSroreId;
      const url = this.$store.state.Api + "SpecificStore/" + Number(storeId);
      axios.get(url).then((response) => {
        //console.log(response.data);
        this.store = {
          id: storeId,
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
        this.imageCoverPreview =
          "http://localhost/Laravel/projetPFA/storage/app/" +
          response.data.image_coverture;
        this.imageLogoPreview =
          "http://localhost/Laravel/projetPFA/storage/app/" +
          response.data.image_profil;
      });
    },
  },
};
</script>
<style>
.contact-form {
  background-color: #efefef00;
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
  width: 230px;
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
</style>
