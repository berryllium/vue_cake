<template>
  <div class="order-form">
    <div class="close">&times;</div>
    <div class="title">{{isSubmit?'Заявка принята':'Оформление заявки'}}</div>
    <div class="subtitle">{{isSubmit?'Мы с Вами свяжемся':'Заполните поля'}}</div>
    <form v-if="!isSubmit" action="#" @submit.prevent="submit">
      <input v-model="name" type="text" name="name" placeholder="Ваше имя" required />
      <input v-model="phone" type="phone" name="phone" placeholder="Ваше телефон" required />
      <input v-model="email" type="email" name="email" placeholder="Ваш email" />
      <input class="submit" type="submit" value="Отправить" />
    </form>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
export default {
  data() {
    return {
      name: "",
      phone: "",
      email: "",
      isSubmit: false
    };
  },
  computed: mapGetters(["allCart"]),
  methods: {
    submit() {
      if (this.name && this.phone) {
        let info = {
          source: 'Корзина',
          name: this.name,
          phone: this.phone,
          email: this.email
        };
        let res = [info,this.allCart]
        fetch("php/send.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/json;charset=utf-8"
          },
          body: JSON.stringify(res)
        })
          .then(response => response.text())
          .then(answer => {
            console.log(answer);
            if (answer == "OK") {
              this.$parent.$emit("submitOrder");
              this.isSubmit = true;
              this.name = this.phone = this.email = "";
            }
          });
      }
    }
  }
};
</script>

<style lang="less" scoped>
@import "../style/variables.less";
.order-form {
  position: relative;
  justify-content: center;
  display: flex;
  flex-direction: column;
  background-color: @braun;
  padding: 25px;
  width: 330px;
  text-align: center;
  color: #fff;
  @media (max-width: @phone) {
    width: 100%;
    height: 100%;
  }
  .close {
    position: absolute;
    right: 10px;
    top: 0;
    font-size: 36px;
    transition: 0.5s;
    &:hover {
      transform: rotate(-90deg);
      cursor: pointer;
    }
    &:active {
      transform: rotate(90deg);
      transform: scale(0.7);
    }
  }
  .title {
    margin-top: 20px;
    font-size: 24px;
    text-transform: uppercase;
  }

  .subtitle {
    margin-bottom: 20px;
  }

  form {
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    width: 80%;

    input {
      font-size: 18px;
      height: 30px;
      margin-bottom: 20px;
      padding-left: 10px;
    }

    [type="submit"] {
      background-color: @orange;
      border: none;
      cursor: pointer;
      outline: none;
      color: #fff;
      border-radius: 10px;
      height: auto;
      padding: 10px 0;
      &:hover {
        background: darken(@orange, 5%);
      }
      &:active {
        transform: scale(0.99);
      }
    }
  }
}
</style>