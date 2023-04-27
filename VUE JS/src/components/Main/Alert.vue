<template>
  <div v-if="show">
    <section v-if="errored">
      <br />
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        There is an <strong>error</strong> please recheck !

        <a type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </a>
      </div>
      <br />
    </section>

    <section v-else>
      <div v-if="loading">
        <div class=" spinner-grow text-primary" role="status">
          <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-secondary" role="status">
          <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-success" role="status">
          <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-danger" role="status">
          <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-warning" role="status">
          <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-info" role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </div>
      <div v-else="loading">
        <br />
        <div
          class="alert alert-success alert-dismissible fade show"
          role="alert"
        >
          great everything is <strong>good</strong>

          <a
            type="button"
            class="close"
            data-dismiss="alert"
            aria-label="Close"
          >
            <span aria-hidden="true">&times;</span>
          </a>
        </div>
        <br />
      </div>
    </section>
  </div>
</template>
<script>
export default {
  name: "Alert",
  props: { loading: null, errored: null, show: null },
};
</script>
<style scoped>
.spinner-grow {
  height: 20px;
  width: 20px;
  margin: 20px 4px;
}
</style>
