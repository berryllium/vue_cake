<template>
<body>
  <Header />
  <main>
    <router-view />
  </main>
  <Footer />
</body>
</template>

<script>
import $ from 'jquery'
import Header from "@/components/Header"
import Footer from "@/components/Footer"
export default {
  name: "app",
  components: {
    Header,
    Footer
  },
    mounted() {
    // мобильное меню
    $(".menu-btn").on("click", function(e) {
      e.preventDefault();
      $(this).toggleClass("menu-btn_active");
      $("nav").animate({ width: "toggle" }, 350);
    });
    $('.nav-item').on("click", () => {
      $(".menu-btn").trigger("click")
    })
  }
};
</script>

<style lang="less">
@import url("style/normalize.css");
@import url("style/style.less");
</style>
