<template>
  <LoginComponent :id="id" />
</template>
<script>
import LoginComponent from "../components/Login/Login-Register";
export default {
  name: "Login",
  components: {
    LoginComponent,
  },
  data: function() {
    return {
      id: this.$route.params.id,
    };
  },
  mounted() {
    if (this.id == "login") this.id = 1;
    else if (this.id == "register") this.id = 2;

    window.scrollTo(0, 0);
    // console.log("--------" + this.id);
  },
};
</script>
<style scoped></style>
