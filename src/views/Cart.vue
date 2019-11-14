<template>
  <section class="container">
    <h1>Корзина</h1>
    <div class="cart-items">
      <cart-item v-for="item in allCart" :item="item" :key="item.id" @add="addToCart" @sub="removeFromCart"/>
    </div>
  </section>
</template>

<script>
import CartItem from "@/components/CartItem";
import {mapGetters, mapMutations} from 'vuex'
export default {
  components: {
    "cart-item": CartItem
  },
  methods: mapMutations(['addToCart','removeFromCart']),
  computed: mapGetters(['allCart'])
};
</script>

<style lang="less" scoped>
</style>