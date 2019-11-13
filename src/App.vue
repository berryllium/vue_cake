<template>
<body>
  <Header :contacts="contacts" />
  <main>
    <router-view :contacts="contacts" :goods="goods" />
  </main>
  <Footer :contacts="contacts" />
</body>
</template>

<script>
import $ from "jquery";
import Header from "@/components/Header";
import Footer from "@/components/Footer";
export default {
  name: "app",
  components: {
    Header,
    Footer
  },
  data() {
    return {
      goods: {
        loading: true,
        products: []
      },
      contacts: {
        phone: "+7(967)539-02-99",
        email: "test@yandex.ru"
      }
    }
  },
  mounted() {
    fetch("db/catalog.json")
      .then(response => response.json())
      .then(json => {
        this.$store.commit('fetchGoods', json);
      });
    // мобильное меню
    $(".menu-btn").on("click", function(e) {
      e.preventDefault();
      $(this).toggleClass("menu-btn_active");
      $("nav").animate({ width: "toggle" }, 350);
    });
    if (screen.width < 768) {
      $(".nav-item").on("click", () => {
        $(".menu-btn").trigger("click");
      });
    };
  }
};
</script>

<style lang="less">
@import url("style/normalize.css");
@import url("style/variables.less");
@import url("style/style.less");
</style>
