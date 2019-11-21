<template>
  <div class="product-item">
    <a :href="this.item.img_big" data-fancybox :data-caption="this.item.name"><img :src="this.item.img" alt="photo" /></a>
    <div class="info">
      <div class="name">{{this.item.name}}</div>
      <div class="cat">({{this.item.category}})</div>
      <div class="price">{{this.item.price}} руб/{{this.item.units}}</div>
      <div class="desc">{{this.item.desc}}</div>
    </div>
      <button
        class="buy"
        @click="buy"
        :class="{added: this.isAdded}"
      >{{this.isAdded ? "В корзине" : "В корзину"}}</button>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
export default {
  props: ["item"],
  data() {
    return {
      isAdded: true
    };
  },
  computed: {
    ...mapGetters(["allCart"])
  },
  methods: {
    buy() {
      this.$emit("buy", this.item.id);
      this.isAdded = !this.isAdded;
    },
    getStatus() {
      let status = this.allCart.find(el => el.id == this.item.id);
      this.isAdded = status ? true : false;
    }
  },
  mounted() {
    this.getStatus();
  }
};
</script>

<style lang="less" scoped>
@import "../style/variables.less";
.product-item {
  width: 350px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  align-items: center;
  img {
    width: 350px;
    height: 250px;
    object-fit: cover;
    @media (max-width: @phone) {
      width: 100%;
    }
  }
  .info {
    padding-top: 20px;
    align-items: center;
    display: flex;
    flex-direction: column;
    flex: 1;
    .name {
      text-transform: uppercase;
      font-size: 18px;
      font-weight: bold;
    }
    .cat {
      text-transform: lowercase;
      font-size: 16px;
      margin-bottom: 10px;
    }
    .price {
      margin-bottom: 5px;
      font-style: italic;
    }
    .desc {
      margin-bottom: 10px;
      text-align: center;
    }
  }
    .buy {
      width: 150px;
      height: 30px;
      border: none;
      border-radius: 15px;
      outline: none;
      background-color: @brown;
      color: #fff;
      &:hover {
        cursor: pointer;
        background-color: darken(@brown, 10%);
      }
      &:active {
        transform: scale(0.95);
      }
      &.added {
        background-color: @orange;
      }
    }
  @media (max-width: @phone) {
    width: 300px;
    margin: 0 auto;
  }
}
</style>
