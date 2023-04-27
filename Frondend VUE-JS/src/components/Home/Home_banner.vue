<template>
  <section>
    <div class="s1">
      <div class="s1-bg "></div>

      <div class="s1-content animation-slow  ">
        <br />
        <h2>Mall Store</h2>
        <div class="border"></div>

        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam
          veniam velit delectus dolores reprehenderit! Voluptatem harum
          veritatis quaerat.
        </p>
        <div class="shopping-cart-btn btn-hover ">
          <router-link class="default-btn" to="/Stores/0"
            >View Stores</router-link
          >
        </div>
      </div>
    </div>
  </section>
</template>
<script>
export default {
  name: "Home_Banner",
};
</script>
<style lang="css" scoped>
/********************************/
.s1 {
  position: relative;
  width: 100%;
  height: 600px;
  background: url("../../assets/img/pexels-edgars-kisuro-1488463.jpg") center;
  background-size: cover;
}

.s1-bg {
  position: absolute;
  top: 0;
  left: 0;
  clip-path: polygon(15% 0, 65% 0, 85% 100%, 35% 100%);
  background-color: rgba(0, 0, 0, 0.537);
  width: 100%;
  height: 600px;
  animation-name: animation-slide;
  animation-duration: 0.4s;
  animation-timing-function: cubic-bezier(0.2, 0.4, 0.7, 1);
}
/*
.s1-bg img {
  position: absolute;
  right: 60px;
  height: 80vh;
  width: 500px;
}
*/

.s1-content {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 600px;
  display: flex;
  text-align: center;
  flex-direction: column;

  align-items: center;
  justify-content: center;
}
/******/
.s1-content h2 {
  font-size: 3.5rem;
  width: 70%;
  margin-bottom: 1rem;
  color: rgb(233, 233, 233);
}
.border {
  border-bottom: 4px solid #fff;
  width: 100px;
  margin: 20px auto 30px;
}

.s1-content p {
  width: 40%;
  margin-bottom: 3.5rem;
  color: rgb(236, 234, 234);
}
.s1-content a.default-btn {
  color: #fff;
  border-color: rgb(255, 255, 255);
}
.s1-content a.default-btn:hover {
  color: rgb(148, 35, 20);
  border-color: #fff;
  background: #fff !important;
}
/************ s2 ***********/
.animation-slow {
  animation-name: animation-slow;
  animation-duration: 0.7s;
  animation-timing-function: cubic-bezier(0.2, 0.4, 0.7, 1);
}
@keyframes animation-slow {
  0% {
    transform: rotateY(80deg);
  }

  100% {
    transform: rotateY(0);
  }
}
@keyframes animation-slide {
  0% {
    transform: translateX(-100px);
  }

  100% {
    transform: translateX(0);
  }
}
</style>
