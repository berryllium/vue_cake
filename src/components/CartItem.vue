<template>
  <div class="cart-item">
    <img :src="this.item.img" alt="photo" />
    <div class="info">
      <div class="name">{{this.item.name}}</div>
      <div class="price">{{this.item.price}} руб/кг</div>
      <div class="counter">
        <button class="minus-btn" @click="sub">-</button>
        <div class="count-item">{{this.item.count}} кг.</div>
        <button class="plus-btn" @click="add">+</button>
      </div>
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
      this.$emit("add", this.item);
    },
    sub() {
      this.$emit("sub", this.item);
    }
  },
  mounted() {}
};
</script>

<style lang="less" scoped>
@import "../style/variables.less";
.cart-item {
  display: flex;
  margin-bottom: 20px;
  @media (max-width: @phone) {
    flex-direction: column;
    align-items: center;
    width: 100%;
  }
  img {
    width: 150px;
    height: 100px;
    object-fit: cover;
    @media (max-width: @phone) {
        width: 80%;
        height: auto;
      }
  }
  .info {
    @media (max-width: @phone) {
      width: 100%;
      display: grid;
      justify-content: center;
      text-align: center;
      gap: 10px;
      &>div {
        width: 100%;
      }
    }
    padding: 20px;
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  .name {
    font-size: 24px;
    font-weight: bold;
    width: 35%;
  }
  .counter {
    display: flex;
    align-items: center;
    font-size: 24px;
    .count-item {
      width: 80px;
      text-align: center;
      font-weight: bold;
    }
    button {
      cursor: pointer;
      outline: none;
      border: none;
      color: #fff;
      background-color: @orange;
      width: 30px;
      height: 30px;
      border-radius: 15px;
      &:hover {
        background-color: darken(@orange, 10%);
      }
      &:active {
        transform: scale(0.95);
      }
      @media (max-width: @phone) {
        width: 40px;
        height: 40px;
        border-radius: 20px;
      }
    }
  }
  .price {
    font-weight: bold;
    font-style: italic;
    font-size: 18px;
    width: 20%;
  }
}
</style>