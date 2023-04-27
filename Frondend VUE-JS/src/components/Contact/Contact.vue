<template>
  <div class="contact-area pt-30 pb-100">
    <div class="container">
      <div class="contact-map mb-10">
        <iframe
          class="google-map"
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26451.90760561132!2d-5.02380475314434!3d34.03133950912651!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd9f8b49829fbef9%3A0x1ed384adf68bbe4b!2sCentre%20Commercial%20Borj%20Fes!5e0!3m2!1sfr!2sma!4v1617805377571!5m2!1sfr!2sma"
          allowfullscreen=""
          loading="lazy"
        ></iframe>
      </div>
      <div class="custom-row-2">
        <div class="col-lg-4 col-md-5">
          <div class="contact-info-wrap">
            <div class="single-contact-info">
              <div class="contact-icon">
                <i class="fa fa-phone"></i>
              </div>
              <div class="contact-info-dec">
                <p>+012 345 678 102</p>
                <p>+012 345 678 102</p>
              </div>
            </div>
            <div class="single-contact-info">
              <div class="contact-icon">
                <i class="fa fa-globe"></i>
              </div>
              <div class="contact-info-dec">
                <p><a href="#">urname@email.com</a></p>
                <p><a href="#">urwebsitenaem.com</a></p>
              </div>
            </div>
            <div class="single-contact-info">
              <div class="contact-icon">
                <i class="fa fa-map-marker"></i>
              </div>
              <div class="contact-info-dec">
                <p>Address goes here,</p>
                <p>street, Crossroad 123.</p>
              </div>
            </div>
            <div class="contact-social text-center">
              <h3>Follow Us</h3>
              <ul>
                <li>
                  <a href="#"><i class="fa fa-facebook"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-pinterest-p"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-tumblr"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-vimeo"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-twitter"></i></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-md-7">
          <div class="contact-form">
            <div class="contact-title mb-30">
              <h2>Get In Touch</h2>
            </div>
            <form
              class="contact-form-style"
              id="contact-form"
              action="assets/php/mail.php"
              method="post"
            >
              <div class="row">
                <div class="col-lg-6">
                  <input name="name" placeholder="Name*" type="text" />
                </div>
                <div class="col-lg-6">
                  <input name="email" placeholder="Email*" type="email" />
                </div>
                <div class="col-lg-12">
                  <input name="subject" placeholder="Subject*" type="text" />
                </div>
                <div class="col-lg-12">
                  <textarea
                    name="message"
                    placeholder="Your Message*"
                  ></textarea>
                  <button class="submit" type="submit">SEND</button>
                </div>
              </div>
            </form>
            <p class="form-messege"></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "Contact",
};
</script>
<style scoped>
.contact-form {
  background: #f9f9f9;
}
.google-map {
  width: 100%;
  height: 400px;
  border: 5px solid #f3f3f3;
}
</style>
