<template>
  <a
    @click="ShowModel = true"
    class="default-btn btn-list "
    data-toggle="modal"
    data-target="#staticBackdrop"
  >
    <i class="fa fa-trash"></i>
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
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <br />
            <div class="">
              <h4>
                Are you sure you want to delete <strong>{{ name }}</strong>
              </h4>
            </div>
            <br /><br />

            <button
              @click="del()"
              type="button"
              class="btn btn-outline-danger"
              data-dismiss="modal"
            >
              Delete
            </button>
            <button type="button" class="btn " data-dismiss="modal">
              Cancel
            </button>
            <br />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "order",

  props: {
    name: String,
    id: Number,
    index: Number,
  },
  data() {
    return {
      ShowModel: false,
    };
  },
  mounted: function() {},
  methods: {
    del() {
      const url = this.$store.state.Api + "deleteProduit/" + this.id;

      axios.post(url, "").then((response) => {
        //console.log(response.data);
        //console.log("------------" + this.index);
        this.$emit("del", this.index);
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
.btn-list {
  padding: 15px;
  font-size: 20px;

  text-align: center;
  text-transform: capitalize;
}
.btn-outline-danger {
  border-radius: 0px;
}
</style>
