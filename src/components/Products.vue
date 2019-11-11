<template>
  <div class="products">
    <product-item v-for="item in products" :item="item" :key="item.id" />
  </div>
</template>

<script>
import PruductItem from "@/components/ProductItem";
export default {
  components: {
    "product-item": PruductItem
  },
  data() {
    return {
      products: []
    };
  },
  mounted() {
    fetch("https://jsonplaceholder.typicode.com/todos")
      .then(response => response.json())
      .then(json => (this.products = json));
  }
};
</script>

<style lang="less" scoped>
@import '../style/variables.less';
.products {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: (1200-350*3)/2px;
  padding: 20px 0;
  @media (max-width: @phone) {
    width: 100%;
    grid-template-columns: 1fr;
    justify-content: center;
    gap: 15px;
  }
}
</style>