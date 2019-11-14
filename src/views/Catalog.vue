<template>
  <section class="container">
    <h1>Наш ассортимент</h1>
    <div class="products">
      <loader v-if="loading" />
      <product-item v-else v-for="item in products" :item="item" :key="item.id" @buy="clickBuy(item)"/>
    </div>
  </section>
</template>

<script>
import PruductItem from '@/components/ProductItem'
import Loader from '@/components/Loader'
import {mapMutations, mapActions, mapGetters} from 'vuex'
export default {
  props: ['products', 'loading'],
  methods: {
    ...mapMutations(['clickBuy','increment']),
  },
  computed: {
    ...mapGetters(['allCart']),
  },
  components: {
    "product-item": PruductItem,
    loader: Loader
  }
};
</script>

<style lang="less" scoped>
@import "../style/variables.less";
.products {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: (1200-350 * 3)/2px;
  padding: 20px 0;
  @media (max-width: @phone) {
    width: 100%;
    grid-template-columns: 1fr;
    justify-content: center;
    gap: 15px;
  }
}
</style>