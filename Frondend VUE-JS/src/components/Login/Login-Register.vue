<template>
  <div class="login-register-area pt-100 pb-100">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 col-md-12 ml-auto mr-auto">
          <div class="login-register-wrapper">
            <div class="login-register-tab-list nav">
              <a
                :class="[id == 1 ? 'active' : '', ' ']"
                data-toggle="tab"
                href="#lg1"
              >
                <h4>login</h4>
              </a>
              <a
                :class="[id == 2 ? 'active' : '', ' ']"
                data-toggle="tab"
                href="#lg2"
              >
                <h4>register</h4>
              </a>
            </div>
            <div class="tab-content">
              <div id="lg1" :class="[id == 1 ? 'active' : '', 'tab-pane ']">
                <div class="login-form-container">
                  <div class="login-register-form">
                    <LoginForm />
                  </div>
                </div>
              </div>
              <div id="lg2" :class="[id == 2 ? 'active' : '', 'tab-pane ']">
                <div class="login-form-container">
                  <div class="login-register-form">
                    <RegisterForm />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import LoginForm from "./Login";
import RegisterForm from "./Register";
export default {
  name: "Login-Register",
  components: {
    LoginForm,
    RegisterForm,
  },
  props: {
    id: Number,
  },
};
</script>
<style scoped>
.login-register-wrapper .login-form-container {
  box-shadow: 0px 0px 10px rgb(0 0 0 / 15%);
}
</style>
