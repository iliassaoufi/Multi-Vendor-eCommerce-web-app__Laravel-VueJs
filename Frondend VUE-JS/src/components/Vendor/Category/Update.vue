<template>
  <a
    @click="ShowModel = true"
    class="default-btn btn-list "
    data-toggle="modal"
    data-target="#staticBackdrop"
  >
    <i class="fa fa-wrench"></i>
  </a>

  <!-- Modal -->
  <div v-if="ShowModel">
    <div
      class="modal fade"
      id="staticBackdrop"
      data-backdrop="static"
      data-keyboard="false"
      tabindex="-1"
      aria-labelledby="staticBackdropLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button
              @click="ShowModel = false"
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="contact-form">
              <form class="contact-form-style container">
                <div class="row">
                  <div class="col-md-12 in_row">
                    <input
                      v-model="CategoryName"
                      placeholder="Category Name *"
                      type="text"
                    />
                    <button
                      @click="UpdateCategory()"
                      type="button"
                      data-dismiss="modal"
                    >
                      Update
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- 
       <div class="contact-form">
              <form class="contact-form-style container">
                <div class="row">
                  <div class="col-md-7 in_row">
                    <input placeholder="Category Name *" type="text" />
                    <button
                      @click="UpdateCategory()"
                      type="button"
                      data-dismiss="modal"
                    >
                      Add
                    </button>
                  </div>
                </div>
              </form>
        </div>

  -->
</template>
<script>
export default {
  name: "update",

  props: {
    name: String,
    id: Number,
  },
  data() {
    return {
      ShowModel: false,
      CategoryName: this.name,
    };
  },
  mounted: function() {},
  methods: {
    UpdateCategory() {
      const url = this.$store.state.Api + "updateCategory/" + this.id;
      const cat = {
        name: this.CategoryName,
      };
      axios.post(url, cat).then((response) => {
        //console.log(response.data);
        //console.log("------------" + this.index);
        this.$emit("update", "");
      });
    },
  },
};
</script>
<style scoped>
.modal-dialog {
  margin: 5% auto;
  max-width: 500px;
  width: 500px;
}
.modal-header {
  padding: 8px 20px;
}
.modal-dialog .modal-body {
  padding: 35px 15px;
}
.contact-form {
  padding: 0;
}
.btn-list {
  padding: 15px;
  font-size: 20px;
  margin: auto 10px;
  text-align: center;
  text-transform: capitalize;
}
.btn-list {
  padding: 15px;
  font-size: 20px;
  margin: auto 10px;
  text-align: center;
  text-transform: capitalize;
}
.contact-form .contact-form-style button {
  margin-top: 8px;
}
</style>
