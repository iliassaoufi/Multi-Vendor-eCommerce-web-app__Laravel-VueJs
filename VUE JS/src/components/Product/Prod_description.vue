<template>
  <div class="description-review-area pb-90">
    <div class="container">
      <div class="description-review-wrapper">
        <div class="description-review-topbar nav">
          <a class="active" data-toggle="tab" href="#des-details2"
            >Description</a
          >
          <a data-toggle="tab" href="#des-details3"
            >Reviews ({{ product.reviews.length }})</a
          >
        </div>
        <div class="tab-content description-review-bottom">
          <div id="des-details2" class="tab-pane active">
            <div class="product-description-wrapper">
              {{ product.description }}
            </div>
          </div>

          <div id="des-details3" class="tab-pane">
            <div class="row">
              <div class="col-lg-7">
                <div class="review-wrapper">
                  <div
                    :key="index"
                    v-for="(rev, index) in product.reviews"
                    class="single-review"
                  >
                    <Review :rev="rev" />
                  </div>
                </div>
              </div>
              <div class="col-lg-5">
                <div class="ratting-form-wrapper pl-50">
                  <h3>Add a Review</h3>

                  <div class="ratting-form">
                    <form v-if="$store.state.user" action="#">
                      <span>Your rating:</span>
                      <br />
                      <div class="star-box">
                        <div class="ratting-star">
                          <i
                            :key="index"
                            v-for="(i, index) in form.rating"
                            class="fa fa-star"
                            @click="form.rating = index + 1"
                          ></i>
                          <i
                            :key="index"
                            v-for="(i, index) in 5 - form.rating"
                            class="fa fa-star-o "
                            @click="form.rating = form.rating + index + 1"
                          ></i>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="rating-form-style form-submit">
                            <textarea
                              v-model="form.text"
                              name="Your Review"
                              placeholder="Message"
                            ></textarea>
                            <input
                              @click="addReview()"
                              type="button"
                              value="Submit"
                            />
                            <Alert
                              :loading="loading"
                              :errored="errored"
                              :show="show"
                            />
                          </div>
                        </div>
                      </div>
                    </form>
                    <div v-else>
                      <br />
                      <br />
                      <h4><strong>You Should login First</strong></h4>
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
import Review from "./review";
import Alert from "../Main/Alert";

export default {
  name: "Prod_description",
  components: {
    Review,
    Alert,
  },

  props: {
    product: Object,
  },
  data: function() {
    return {
      form: {
        rating: 0,

        text: "",
      },
      loading: false,
      errored: false,
      show: false,
    };
  },
  mounted() {
    this.form.rating = 0;
  },
  methods: {
    getReview() {
      const url = this.$store.state.Api + "AddComment";

      axios.get(url).then((response) => {
        // console.log("///////////////");
        // console.log(response);
      });
    },
    addReview() {
      this.loading = true;
      this.errored = false;
      this.show = true;

      const url = this.$store.state.Api + "AddComment";
      const rev = {
        produit_id: this.product.id,
        user_id: this.$store.state.user.id,
        message: this.form.text,
        rating: Number(this.form.rating),
      };
      axios
        .post(url, rev)
        .then((response) => {
          // console.log("///////////////");
          // console.log(response);
          this.$emit("refresh", "");
        })
        .catch((error) => {
          console.log(error);
          this.errored = true;
        })
        .finally(() => (this.loading = false));
    },
  },
};
</script>
<style scoped>
.fa-star,
.fa-star-o {
  font-size: 25px;
  cursor: pointer;
  margin: 5px 3px;
}
</style>
