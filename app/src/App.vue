<template>
  <div id="nav">
    <navbar></navbar>
    <!-- <Homepage></Homepage> -->

    <router-view />
  </div>
</template>

<script>
import navbar from "@/components/TheNavBar";
// import Homepage from "@/views/Home";

export default {
  components: {
    navbar,
    // Homepage
  },
};
</script> 
<style scoped>
*,
html {
  background-color: rgb(0, 0, 0);
}
</style>
