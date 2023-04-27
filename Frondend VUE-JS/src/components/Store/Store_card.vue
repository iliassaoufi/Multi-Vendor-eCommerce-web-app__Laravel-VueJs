<template>
  <div class="store-card">
    <img class="img-cover" :src="Store.img" />
    <div class="store-info">
      <router-link :to="url">
        <img class="img-logo" :src="Store.logo" />
      </router-link>
      <h3>
        <router-link :to="url"> {{ Store.name }} </router-link>
      </h3>
    </div>
  </div>
</template>
<script>
import axios from "axios";
export default {
  name: "Store_card",
  props: {
    id: Number,
  },
  data() {
    return {
      Store: {
        id: this.id,
        name: String,
        img: String,
        logo: String,
      },
      url: "/Store/" + this.id,
    };
  },
  mounted: function() {
    this.setStore();
  },
  methods: {
    setStore() {
      const url = this.$store.state.Api + "SpecificStore/" + this.id;
      axios.get(url).then((response) => {
        this.Store.name = response.data.name;
        this.Store.img =
          this.$store.state.imgUrl + response.data.image_coverture;
        this.Store.logo = this.$store.state.imgUrl + response.data.image_profil;
      });
    },
  },
};
</script>
<style scoped>
.store-card {
  box-shadow: 0 0 10px rgba(90, 90, 90, 0.22);
  border-radius: 15px;
  margin: 10px;
}
.store-card img {
  height: 210px;
  width: 100%;
  object-fit: cover;
  border-radius: 15px 15px 0 0;
}

.store-info {
  width: 100%;
  height: 60px;
  background: rgba(255, 255, 255, 0.8);
  padding: 7px 0 0 30px;
  display: flex;
  border-radius: 0 0 15px 15px;
  transition: all 0.5s ease;
}

.store-info:hover {
  background: rgba(34, 34, 34, 0);
}
.store-info .img-logo {
  height: 45px;
  width: 45px;
  object-fit: cover;
  border-radius: 50%;
  display: block;
}

.store-info h3 {
  margin: 7px 0 0 20px;
  font-size: 18px;
  font-weight: 500;
  text-transform: capitalize;
}
.store-info h3 a {
  color: rgba(0, 0, 0);
}
</style>
