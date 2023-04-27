<template>
  <UserCoponent />
</template>
<script>
import UserCoponent from "../components/User/User";
export default {
  name: "User",
  components: {
    UserCoponent,
  },
  mounted() {
    window.scrollTo(0, 0);
  },
};
</script>
