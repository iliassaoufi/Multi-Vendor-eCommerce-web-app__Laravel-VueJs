<template>
  <div class="welcome-area pt-100 pb-95">
    <div class="container">
      <div class="welcome-content text-center">
        <h5>Who Are We</h5>
        <h1>Welcome To Mall</h1>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
          eiusmod tempor incididunt labor et dolore magna aliqua. Ut enim ad
          minim veniam, quis nostrud exercitation ullamco laboris nisi ut
          aliquip ex ea commo consequat irure
        </p>
      </div>
    </div>
  </div>
  <div class="about-mission-area pb-70">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4">
          <div class="single-mission mb-30">
            <h3>Our vission</h3>
            <p>
              Flone provide how all this mistaken idea of denounc pleasure and
              sing pain was born an will give you a ete account of the system,
              and expound the actual teangs the eat explorer of the truth.
            </p>
          </div>
        </div>
        <div class="col-lg-4 col-md-4">
          <div class="single-mission mb-30">
            <h3>Our mission</h3>
            <p>
              Flone provide how all this mistaken idea of denounc pleasure and
              sing pain was born an will give you a ete account of the system,
              and expound the actual teangs the eat explorer of the truth.
            </p>
          </div>
        </div>
        <div class="col-lg-4 col-md-4">
          <div class="single-mission mb-30">
            <h3>Our goal</h3>
            <p>
              Flone provide how all this mistaken idea of denounc pleasure and
              sing pain was born an will give you a ete account of the system,
              and expound the actual teangs the eat explorer of the truth.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="team-area pt-10 ">
    <div class="container">
      <div class="section-title-2 text-center mb-60">
        <h2>Team Members</h2>
        <p>Lorem ipsum dolor sit amet conse ctetu.</p>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="team-wrapper mb-30">
            <div class="team-img">
              <a href="#">
                <img src="@\assets\img\undraw_male_avatar_323b(2).png" alt="" />
              </a>
              <div class="team-action">
                <a class="facebook" href="#">
                  <i class="fa fa-facebook"></i>
                </a>
                <a class="twitter" title="Wishlist" href="#">
                  <i class="fa fa-twitter"></i>
                </a>
                <a class="instagram" href="#">
                  <i class="fa fa-instagram"></i>
                </a>
              </div>
            </div>
            <div class="team-content text-center">
              <h4>Mr.Mike Banding</h4>
              <span>Manager </span>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="team-wrapper mb-30">
            <div class="team-img">
              <a href="#">
                <img src="@/assets/img\undraw_female_avatar_w3jk.png" alt="" />
              </a>
              <div class="team-action">
                <a class="facebook" href="#">
                  <i class="fa fa-facebook"></i>
                </a>
                <a class="twitter" title="Wishlist" href="#">
                  <i class="fa fa-twitter"></i>
                </a>
                <a class="instagram" href="#">
                  <i class="fa fa-instagram"></i>
                </a>
              </div>
            </div>
            <div class="team-content text-center">
              <h4>Mr.Peter Pan</h4>
              <span>Developer </span>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="team-wrapper mb-30">
            <div class="team-img">
              <a href="#">
                <img src="@\assets\img\undraw_male_avatar_323b(2).png" alt="" />
              </a>
              <div class="team-action">
                <a class="facebook" href="#">
                  <i class="fa fa-facebook"></i>
                </a>
                <a class="twitter" title="Wishlist" href="#">
                  <i class="fa fa-twitter"></i>
                </a>
                <a class="instagram" href="#">
                  <i class="fa fa-instagram"></i>
                </a>
              </div>
            </div>
            <div class="team-content text-center">
              <h4>Ms.Sophia</h4>
              <span>Designer </span>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="team-wrapper mb-30">
            <div class="team-img">
              <a href="#">
                <img src="@/assets/img/undraw_female_avatar_w3jk.png" alt="" />
              </a>
              <div class="team-action">
                <a class="facebook" href="#">
                  <i class="fa fa-facebook"></i>
                </a>
                <a class="twitter" title="Wishlist" href="#">
                  <i class="fa fa-twitter"></i>
                </a>
                <a class="instagram" href="#">
                  <i class="fa fa-instagram"></i>
                </a>
              </div>
            </div>
            <div class="team-content text-center">
              <h4>Mr.John Lee</h4>
              <span>Chairmen </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <h1>{{ articleId }}</h1>
</template>
<script>
import axios from "axios";
export default {
  name: "About",
  data() {
    return {
      info: null,
      loading: true,
      errored: false,
      articleId: "",
    };
  },
  filters: {
    currencydecimal(value) {
      return value.toFixed(2);
    },
  },
  created() {
    // Simple POST request with a JSON body using axios
    const article = { title: "Vue POST Request Example" };
    axios
      .post("https://reqres.in/api/articles", article)
      .then((response) => (this.articleId = response));
  },
  mounted() {
    axios
      .get("https://api.coindesk.com/v1/bpi/currentprice.json")
      .then((response) => {
        this.info = response.data.bpi;
        console.log(response);
      });
  },
};
</script>
<style scoped>
.welcome-area {
  width: 100%;
  height: 450px;
  background: url("../../../src/assets/img/pexels-fauxels-3182759.jpg")
    no-repeat center rgba(0, 0, 0, 0.5);
  background-size: cover;
  background-blend-mode: multiply;
  background-attachment: fixed;
  margin-bottom: 100px;
}
.welcome-area h1 {
  color: #fff;
}

.welcome-area h5,
.welcome-area p {
  color: rgba(255, 255, 255, 0.85);
}
.welcome-content h1:before {
  background-color: #fff;
}
.team-img img {
  height: 200px;

  object-fit: cover;
  background-blend-mode: multiply;
}
</style>
