<template>
  <div class=".container-fluid">
    <div class="row" style="margin:0">
      <div class="img-cover col-md-12">
        <img :src="store.imgCover" />
      </div>
      <div class=" col-md-4">
        <div class="img-logo ">
          <img :src="store.imgProfile" />
        </div>
      </div>
      <div class=" col-md-7"></div>
    </div>
  </div>
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-4 store-info">
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
        <div class="col-md-8">
          <Statistic />
        </div>
      </div>
    </div>
  </section>
</template>
<script>
import Statistic from "../Statistic/Statistic";
export default {
  name: "Account_info",
  components: {
    Statistic,
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
      },
    };
  },
  created() {
    this.setStore();
  },
  mounted() {},
  methods: {
    setStore() {
      const storeId = this.$store.state.userSroreId;
      const url = this.$store.state.Api + "SpecificStore/" + Number(storeId);
      axios.get(url).then((response) => {
        // console.log(response.data);
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
  background: rgba(243, 243, 243, 0.904);
  box-shadow: 1px 1px 20px #20202063;
  margin-top: -150px;
  margin-left: 50px;
  display: flex;
  justify-content: center;
  align-items: center;
}

.img-logo img {
  width: 300px;
  height: 300px;
  object-fit: contain;
  padding: 40px;
}
.welcome-content p {
  width: 100;
}
</style>
