<template>
<body>
  <Header :contacts="contacts" :cart="allCart"/>
  <main>
    <router-view :contacts="contacts" :products="allCatalog" :loading = "loadingState"/>
  </main>
  <Footer :contacts="contacts" />
</body>
</template>

<script>
import $ from "jquery";
import Header from "@/components/Header";
import Footer from "@/components/Footer";
import {mapGetters, mapActions} from 'vuex'
export default {
  name: "app",
  components: {
    Header,
    Footer
  },
  data() {
    return {
      contacts: {
        phone: "+7(967)539-02-99",
        email: "test@yandex.ru"
      }
    };
  },
  computed: mapGetters(['allCatalog','loadingState','allCart']),
  methods: {
    ...mapActions(['fetchCatalog'])
  },
  mounted() {
    this.fetchCatalog()
    this.$store.commit('getLocalCart')
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
    }
  }
};
</script>

<style lang="less">
@import url("style/normalize.css");
@import url("style/variables.less");
@import url("style/style.less");
</style>
