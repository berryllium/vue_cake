<template>
  <section class="intro">
    <div class="container">
      <div class="left">
        <h2>{{contacts.header}}</h2>
        <div class="page-text-content" v-html="contacts.delivery"></div>
      </div>
      <div class="right">
        <div class="main-form">
          <div class="title">{{isSubmit?'Заявка принята':'Оставьте заявку'}}</div>
          <div class="subtitle">{{isSubmit?'Мы с Вами свяжемся':'Заполните поля'}}</div>
          <form v-if="!isSubmit" action="#" @submit.prevent="submit">
            <input v-model="name" type="text" name="name" placeholder="Ваше имя" />
            <input v-model="phone" type="phone" name="phone" placeholder="Ваше телефон" />
            <input v-model="email" type="email" name="email" placeholder="Ваш email" />
            <input type="submit" value="Отправить" />
          </form>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
export default {
  props: ["contacts"],
  data() {
    return {
      isSubmit: false,
      name: "",
      phone: "",
      email: ""
    };
  },
  methods: {
    submit() {
      let info = {
        source: "Главная",
        name: this.name,
        phone: this.phone,
        email: this.email
      };
      fetch("../php/send.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json;charset=utf-8"
        },
        body: JSON.stringify(info)
      })
        .then(response => response.text())
        .then(answer => {
          console.log(answer);
          if (answer == "OK") {
            this.isSubmit = true;
            this.name = this.phone = this.email = "";
            setTimeout(() => (this.isSubmit = false), 2000);
          }
        });
    }
  }
};
</script>
<style lang="less" scoped>
@import "../style/variables.less";
.intro {
  background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
    url(../img/bg1.jpg);
  background-size: cover;
  background-repeat: no-repeat;
  min-height: 800px;
  @media (max-width: @phone) {
    background-position: 50%;
  }
  .container {
    display: flex;
    flex-wrap: wrap;
    align-items: flex-start;
    padding-top: 50px;
    .left,
    .right {
      width: 50%;
      padding: 20px;
      @media (max-width: @phone) {
        width: 100%;
        padding: 0;
      }
    }

    .left {
      color: #fff;

      h2 {
        margin-top: 0;
        margin-bottom: 30px;
        text-transform: uppercase;
      }
      @media (max-width: @phone) {
        padding: 10px;
      }
    }

    .right {
      display: flex;
      justify-content: center;

      .main-form {
        background-color: @brown;
        padding: 20px;
        width: 330px;
        text-align: center;
        color: #fff;
        @media (max-width: @phone) {
          width: 100%;
        }
        .title {
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
    }
  }
}
</style>