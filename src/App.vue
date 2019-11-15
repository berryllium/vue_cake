<template>
<body>
  <Header :contacts="contacts" :cart="allCart" />
  <main>
    <router-view
      :contacts="contacts"
      :products="allCatalog"
      :loading="loadingState"
      @cartOrder="openForm"
    />
  </main>
  <Footer :contacts="contacts" />
  <transition name="fade">
    <Popup
      :cart="allCart"
      v-if="popupVisible"
      @closeForm="close('click')"
      @submitOrder="close('sumbit')"
    />
  </transition>
</body>
</template>

<script>
import $ from "jquery";
import Header from "@/components/Header";
import Footer from "@/components/Footer";
import Popup from "@/components/Popup";
import { mapGetters, mapActions, mapMutations } from "vuex";
export default {
  name: "app",
  components: {
    Header,
    Footer,
    Popup
  },
  data() {
    return {
      popupVisible: false,
      div: true,
      contacts: {
        phone: "+7(967)539-02-99",
        email: "test@yandex.ru"
      }
    };
  },
  computed: {
    ...mapGetters(["allCatalog", "loadingState", "allCart", "getJsonCart"])
  },
  methods: {
    ...mapActions(["fetchCatalog"]),
    ...mapMutations(["clearCart"]),
    openForm() {
      this.popupVisible = true;
    },
    close(arg) {
      if (arg == "click") {
        if (
          event.target.className == "popup-order" ||
          event.target.className == "close"
        ) {
          this.popupVisible = false;
        }
      } else {
        console.log("submit");
        this.clearCart()
        setTimeout(() => (this.popupVisible = false), 2000);
      }
    }
  },
  mounted() {
    this.$store.commit("setCart");
    this.fetchCatalog();
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
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active до версии 2.1.8 */ {
  opacity: 0;
}
</style>
