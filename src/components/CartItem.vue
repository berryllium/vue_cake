<template>
  <div :item="item" class="cart-item">
    <img :src="this.item.img" alt="photo" />
    <div class="info">
      <div class="name">{{this.item.name}}</div>
      <div class="desc">Описание</div>
      <div class="counter">
        <button class="plus-btn" @click="add">+</button>
      <div class="count-item">{{count}}</div>
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
    getCount() {
      this.count = this.$store.getters.getCountById(this.item.id).count
    },
    add() {
      this.$store.commit("changeCart", {id: this.item.id, action: 'add'});
      this.getCount()
    },
    sub() {
      this.$store.commit("changeCart", {id: this.item.id, action: 'sub'});
      this.getCount()
    }
  },
  mounted() {
    this.getCount()
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