<template>
  <section class="container">
    <h1>Наш ассортимент</h1>
    <div class="category">
      <div
        class="product-category"
        :class="currentCategory == 'all'?'active-category':''"
        @click="filter('all')"
      >Все категории</div>
      <div
        class="product-category"
        :class="currentCategory == category?'active-category':''"
        v-for="category in this.allCategories"
        :key="category"
        @click="filter(category)"
      >{{category}}</div>
    </div>
    <div class="products">
      <loader v-if="loading" />
      <product-item
        v-else
        v-for="item in this.filteredCatalog"
        :item="item"
        :key="item.id"
        @buy="clickBuy(item)"
      />
    </div>
  </section>
</template>

<script>
import PruductItem from "@/components/ProductItem";
import Loader from "@/components/Loader";
import { mapMutations, mapActions, mapGetters } from "vuex";

export default {
  data() {
    return {
      currentCategory: "all"
    };
  },
  props: ["products", "loading"],
  methods: {
    ...mapMutations(["clickBuy", "increment"]),
    filter(category) {
      this.currentCategory = category;
    }
  },
  computed: {
    ...mapGetters(["allCart", "allCategories"]),
    filteredCatalog() {
      let filtered = [];
      if (this.currentCategory == "all") filtered = this.products;
      else
        filtered = this.products.filter(
          element => element.category == this.currentCategory
        );
      return filtered;
    }
  },
  components: {
    "product-item": PruductItem,
    loader: Loader
  },
  mounted() {}
};
</script>

<style lang="less" scoped>
@import "../style/variables.less";
.category {
  display: flex;
  flex-wrap: wrap;
  justify-content: flex-start;
  .product-category {
    font-size: 1.2em;
    font-weight: bold;
    font-style: italic;
    text-transform: capitalize;
    padding: 10px 20px;
    margin-right: 20px;
    border-radius: 20px;
    border: 2px solid transparent;
    margin-bottom: 30px;
    &:active,
    &:hover {
      cursor: pointer;
      border-color: @brown;
    }
    &.active-category {
      &:hover {
        border-color: transparent;
      }
      background-color: @orange;
      color: #fff;
    }
  }
}
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