<template>
  <form action="#" method="post">
    <input v-model="user.username" type="text" placeholder="User Name" />
    <input v-model="user.email" placeholder="Email" type="email" />
    <input v-model="user.password" type="password" placeholder="Password" />
    <div class="button-box">
      <button @click="Register()" type="button"><span>Register</span></button>
      <Alert :loading="loading" :errored="errored" :show="show" />
    </div>
  </form>
</template>
<script>
import axios from "axios";
import Alert from "../Main/Alert";

export default {
  name: "Register",
  components: {
    Alert,
  },
  data: function() {
    return {
      user: {
        username: "",
        email: "",
        password: "",
        role: "",
      },
      loading: false,
      errored: false,
      show: false,
    };
  },
  mounted() {},
  methods: {
    Register() {
      this.loading = true;
      this.errored = false;
      this.show = true;

      const url = this.$store.state.Api + "register";
      const userRegister = {
        name: this.user.username,
        email: this.user.email,
        password: this.user.password,
        role: "0",
      };
      axios
        .post(url, userRegister)
        .then((response) => {
          this.$store.commit("setUser", response.data.user);
          this.$router.push("/User");
        })
        .catch((error) => {
          console.log(error);
          this.errored = true;
        })
        .finally(() => (this.loading = false));

      // localStorage.setItem("user", JSON.stringify(this.user));
      // this.$router.push("/User");
    },
  },
};
</script>
<style scoped></style>
