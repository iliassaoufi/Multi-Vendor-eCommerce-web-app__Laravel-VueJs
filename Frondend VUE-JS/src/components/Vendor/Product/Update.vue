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
            <AddProduct @update="upd" :id="id" isUpdate="true" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import AddProduct from "./Add";
export default {
  name: "order",
  components: {
    AddProduct,
  },
  props: {
    id: Number,
  },
  data() {
    return {
      ShowModel: false,
    };
  },
  mounted: function() {},
  methods: {
    upd() {
      this.$emit("update", "");
    },
  },
};
</script>
<style scoped>
.btn-list {
  padding: 15px;
  font-size: 20px;
  margin: auto 10px;
  text-align: center;
  text-transform: capitalize;
}
</style>
