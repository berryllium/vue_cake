<template>
  <section class="container">
    <h1>Корзина</h1>
    <div class="cart-wrap" v-if="this.sum">
      <div class="cart-items">
        <cart-item
          v-for="item in allCart"
          :item="item"
          :key="item.id"
          @add="addToCart"
          @sub="removeFromCart"
        />
      </div>
      <div class="result">
        <h3>Оформите заказ</h3>
        <div class="result-price">
          {{sum}}
          <span>руб.</span>
        </div>
        <div class="ps">*Детали обсуждаются при уточнении заказа</div>
        <button class="cart-order" @click="$emit('cartOrder')">Оформить</button>
      </div>
    </div>
    <div class="nothing" v-else>Вы еще ничего не выбрали</div>
  </section>
</template>

<script>
import CartItem from "@/components/CartItem";
import { mapGetters, mapMutations } from "vuex";
export default {
  components: {
    "cart-item": CartItem
  },
  methods: mapMutations(["addToCart", "removeFromCart"]),
  computed: {
    ...mapGetters(["allCart"]),
    sum() {
      let sum = 0;
      this.allCart.forEach(element => {
        sum += element.price * element.count;
      });
      return sum;
    }
  }
};
</script>

<style lang="less" scoped>
@import "../style/variables.less";
.nothing {
  font-size: 24px;
  font-weight: bold;
  text-align: center;
}
.cart-wrap {
  display: flex;
  @media (max-width: @phone) {
    flex-direction: column;
  }
  .cart-items {
    width: 60%;
    @media (max-width: @phone) {
      width: 100%;
    }
  }
  .result {
    width: 40%;
    h3 {
      text-transform: uppercase;
      font-size: 36px;
      padding: 0;
      margin: 0;
      text-align: center;
    }
    .result-price {
      margin-top: 50px;
      text-align: center;
      font-size: 36px;
      font-weight: bold;
      span {
        font-size: 0.7em;
      }
    }
    .ps {
      text-align: center;
    }
    .cart-order {
      padding: 20px 25px;
      display: block;
      margin: 20px auto;
      border: none;
      border-radius: 15px;
      outline: none;
      background-color: @orange;
      font-size: 24px;
      text-transform: uppercase;
      color: #fff;
      &:hover {
        cursor: pointer;
        background-color: darken(@orange, 10%);
      }
      &:active {
        transform: scale(0.95);
      }
    }
        @media (max-width: @phone) {
        width: 100%;
        .result-price {
          margin-top: 20px;
          font-size: 28px;
        }
      }
  }
}
</style>