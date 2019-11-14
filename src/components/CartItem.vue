<template>
  <div class="cart-item">
    <img :src="this.item.img" alt="photo" />
    <div class="info">
      <div class="name">{{this.item.name}}</div>
      <div class="desc">Описание</div>
      <div class="counter">
        <button class="plus-btn" @click="add">+</button>
      <div class="count-item">{{this.item.count}}</div>
      <button class="minus-btn" @click="sub">-</button>
      </div>
      
      <div class="price">{{this.item.price}} руб/кг</div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["item"],
  data() {
    return {
      isAdded: false,
      count: 0
    };
  },
  methods: {
    add() {
      this.$emit('add', this.item)
    },
    sub() {
      this.$emit('sub', this.item)
    }
  },
  mounted() {

  }
};
</script>

<style lang="less" scoped>
  .cart-item {
    width: 100%;
    display: flex;
    margin-bottom: 20px;
    img {
      width: 150px;
      height: 100px;
      object-fit: cover;
    }
    .info {
      display: grid;
      gap: 20px;
      grid-template-columns: repeat(4, 1fr);
    }
  }
</style>