<template>
  <section class="container">
    <h1>Корзина</h1>
    <div class="cart-items">
      <cart-item v-for="item in products" :item="item" :key="item.id" />
    </div>
  </section>
</template>

<script>
import CartItem from "@/components/CartItem";
export default {
  components: {
    "cart-item": CartItem
  },
  computed: {
    products() {
      return this.$store.state.cart.products;
    }
  }
};
</script>

<style lang="less" scoped>
</style>