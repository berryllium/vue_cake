<template>
  <div :item="item" class="product-item">
    <img :src="this.item.img" alt="photo" />
    <div class="info">
      <div class="name">{{this.item.name}}</div>
      <div class="price">{{this.item.price}} руб/кг</div>
      <div class="desc">Описание</div>
      <button class="buy" @click="console.log('toCart')" :class="{added: isAdded}">{{status}}</button>
    </div>
  </div>
</template>

<script>
export default {
  props: ["item"],
  data() {
    return {
      isAdded: false
    };
  },
  computed: {
    status() {
      return this.isAdded ? "В корзине" : "В корзину";
    }
  },
  methods: {

  },
  mounted() {

  }
};
</script>

<style lang="less" scoped>
@import "../style/variables.less";
.product-item {
  width: 350px;
  height: 400px;
  img {
    width: 350px;
    height: 250px;
    object-fit: cover;
  }
  .info {
    padding: 20px;
    text-align: center;
    .name {
      text-transform: uppercase;
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 10px;
    }
    .price {
      margin-bottom: 5px;
      font-style: italic;
    }
    .desc {
      margin-bottom: 10px;
    }
    .buy {
      width: 150px;
      height: 30px;
      border: none;
      outline: none;
      background-color: @braun;
      color: #fff;
      &:hover {
        cursor: pointer;
        background-color: darken(@braun, 10%);
      }
      &:active {
        transform: scale(0.95);
      }
      &.added {
        background-color: @orange;
      }
    }
  }
  @media (max-width: @phone) {
    width: 300px;
    height: 300px;
    margin: 0 auto;
  }
}
</style>
