<template>
  <div class="products">
    <loader v-if="loading" />
    <product-item v-else v-for="item in products" :item="item" :key="item.id" />
  </div>
</template>

<script>
import PruductItem from "@/components/ProductItem";
import Loader from "@/components/Loader";
export default {
  components: {
    "product-item": PruductItem,
    loader: Loader
  },
  data() {
    return {
      loading: true,
      products: []
    };
  },
  mounted() {
    fetch("https://jsonplaceholder.typicode.com/todos")
      .then(response => response.json())
      .then(json => {
        setTimeout(() => {
          this.products = json;
          this.loading = false;
        },500);
      });
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