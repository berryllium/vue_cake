<template>
<body>
  <Header :contacts="allContacts" :cart="allCart" />
  <main>
    <router-view
      :contacts="allContacts"
      :products="allCatalog"
      :loading="loadingState"
      @cartOrder="openForm"
    />
  </main>
  <Footer :contacts="allContacts" />
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
// import $ from "jquery";
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
      div: true
    };
  },
  computed: {
    ...mapGetters([
      "allContacts",
      "allCatalog",
      "loadingState",
      "allCart",
      "getJsonCart"
    ])
  },
  methods: {
    ...mapActions(["fetchCatalog", "fetchContacts"]),
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
        this.clearCart();
        setTimeout(() => (this.popupVisible = false), 2000);
      }
    }
  },
  mounted() {
    this.fetchCatalog();
    this.fetchContacts();
    var $ = require("jquery");
    window.jQuery = $;
    require("@fancyapps/fancybox");
    this.$store.commit("setCart");
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
@import url("style/font-awesome.css");
@import url("style/jquery.fancybox.css");
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
