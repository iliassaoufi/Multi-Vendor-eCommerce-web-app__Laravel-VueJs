<template>
  <form>
    <div v-if="showMsg == true" class="alert alert-danger" role="alert">
      E-mail or password is incorrect
    </div>

    <input v-model="user.email" type="email" placeholder="E-mail" />
    <input v-model="user.password" type="password" placeholder="Password" />
    <div class="button-box">
      <!--
      <div class="login-toggle-btn">
        <input type="checkbox" />
        <label>Remember me</label>
        <a href="#">Forgot Password?</a>
      </div>
      -->
      <button @click="login()" type="button">
        <span>Login </span>
      </button>
      <Alert :loading="loading" :errored="errored" :show="show" />
    </div>
  </form>
</template>
<script>
import axios from "axios";
import Alert from "../Main/Alert";
export default {
  name: "Login",
  components: {
    Alert,
  },
  data: function() {
    return {
      user: {
        id: 0,
        email: "",
        password: "",
        role: "",
      },
      showMsg: false,
      userValide: false,
      loading: false,
      errored: false,
      show: false,
    };
  },

  methods: {
    login() {
      this.loading = true;
      this.errored = false;
      this.show = true;
      const url = this.$store.state.Api + "login";
      const userLogin = {
        email: this.user.email,
        password: this.user.password,
      };
      axios
        .post(url, userLogin)
        .then((response) => {
          this.$store.commit("setToken", response.data.token);
          this.$store.commit("setUser", response.data.user);
          this.$router.push("/User");
        })
        .catch((error) => {
          console.log(error);
          this.errored = true;
        })
        .finally(() => (this.loading = false));
      /*
      console.log(this.user.email + "------" + this.user.password);
      if (this.user.password == "0000") {
        //-----------
        this.showMsg = false;
        this.userValide = true;
        // this.$router.push("/User");
      } else {
        this.showMsg = true;
        this.userValide = false;
      }
      if (this.userValide) {
        this.$router.push("/User");
      }
      */
      // $cookies.set("name", "66", "1h");
      //  console.log($cookies.get("name"));
    },
  },
};

/*
@click="this.$router.push('Stores')"
*/
</script>
<style scoped></style>
