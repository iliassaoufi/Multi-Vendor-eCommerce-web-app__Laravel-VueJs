<template>
  <!--
  <div class="user-logo">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
      <path
        d="M19 7.001c0 3.865-3.134 7-7 7s-7-3.135-7-7c0-3.867 3.134-7.001 7-7.001s7 3.134 7 7.001zm-1.598 7.18c-1.506 1.137-3.374 1.82-5.402 1.82-2.03 0-3.899-.685-5.407-1.822-4.072 1.793-6.593 7.376-6.593 9.821h24c0-2.423-2.6-8.006-6.598-9.819z"
      />
    </svg>
  </div>
  -->
  <div class="store-info col-md-12">
    <div class="contact-social welcome-content">
      <h1>My Account</h1>
    </div>
  </div>
  <div class="checkout-area pb-80 pt-50">
    <div class="container">
      <div class="row">
        <div class="col-lg-11">
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
                      >Account information
                    </a>
                  </h3>
                </div>
                <div id="my-account-1" class="panel-collapse collapse show">
                  <div class="panel-body">
                    <div class="myaccount-info-wrapper">
                      <div class="row">
                        <div class="col-lg-12 col-md-12">
                          <div class="billing-info">
                            <label>First Name</label>
                            <h4>{{ user.name }}</h4>
                          </div>
                        </div>

                        <div class="col-lg-12 col-md-12">
                          <div class="billing-info">
                            <label>Email Address</label>
                            <h4>{{ user.email }}</h4>
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
                      >Edit information
                    </a>
                  </h3>
                </div>
                <div id="my-account-2" class="panel-collapse collapse ">
                  <div class="panel-body">
                    <div class="myaccount-info-wrapper">
                      <div class="row">
                        <div class="col-lg-12 col-md-12">
                          <div class="billing-info">
                            <label>User Name</label>
                            <input v-model="infoUser.name" type="text" />
                          </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                          <div class="billing-info">
                            <label>Email Address</label>
                            <input v-model="infoUser.email" type="email" />
                          </div>
                        </div>
                      </div>
                      <div class="billing-back-btn">
                        <div class="billing-back">
                          <a href="#"><i class="fa fa-arrow-up"></i> back</a>
                        </div>
                        <div class="billing-btn">
                          <button @click="updateInfo()" type="button">
                            Continue
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel panel-default single-my-account">
                <div class="panel-heading my-account-title">
                  <h3 class="panel-title">
                    <span>3 .</span>
                    <a
                      data-toggle="collapse"
                      data-parent="#faq"
                      href="#my-account-3"
                      >Change password
                    </a>
                  </h3>
                </div>
                <div id="my-account-3" class="panel-collapse collapse">
                  <div class="panel-body">
                    <div class="myaccount-info-wrapper">
                      <div class="row">
                        <div class="col-lg-12 col-md-12">
                          <div class="billing-info">
                            <label> New Password</label>
                            <input
                              v-model.lazy="infoUser.password"
                              type="password"
                            />
                          </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                          <div class="billing-info">
                            <label>Password Confirm</label>
                            <input
                              v-model="infoUser.confirmPassword"
                              type="password"
                            />
                            <small
                              v-if="
                                infoUser.password != infoUser.confirmPassword
                              "
                              style="color:red;"
                              >Doesn't match !</small
                            >
                          </div>
                        </div>
                      </div>
                      <div class="billing-back-btn">
                        <div class="billing-back">
                          <a href="#"><i class="fa fa-arrow-up"></i> back</a>
                        </div>
                        <div class="billing-btn">
                          <button @click="updatePassword()" type="button">
                            Continue
                          </button>
                        </div>
                      </div>
                    </div>
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
export default {
  name: "",
  props: ["user"],
  data: function() {
    return {
      infoUser: {
        name: "",
        email: "",
        password: "",
        confirmPassword: "",
      },
    };
  },
  mounted() {
    this.infoUser.name = this.user.name;
    this.infoUser.email = this.user.email;
  },
  methods: {
    updateInfo() {
      console.log(this.infoUser);
    },
    updatePassword() {
      if (this.infoUser.password == this.infoUser.confirmPassword)
        console.log(this.infoUser.password);
    },
  },
};
</script>
<style scoped>
.single-my-account .myaccount-info-wrapper .billing-info label {
  color: rgba(0, 0, 0, 0.61);
}
.single-my-account .myaccount-info-wrapper .billing-info label::after {
  content: " :";
}
.user-logo {
  width: 100%;

  height: 180px;
  display: flex;
  justify-content: center;
  align-content: center;
}
.user-logo svg {
  margin: 40px 0px;

  padding: 10px;
  border-radius: 100px;
  border: 3px solid rgb(0, 0, 0);
  color: rgb(0, 0, 0);
}
</style>
