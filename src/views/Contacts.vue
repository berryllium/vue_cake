<template>
  <section class="contacts">
    <div class="container">
      <h1>Контакты</h1>
      <div class="wrap">
        <div class="map">
          <iframe
            src="https://yandex.ru/map-widget/v1/?um=constructor%3Acdda55db439583887354173f87b390bf93f3ddf89dd8b787aa37b66b1e2bb87d&amp;source=constructor"
            :width="mapWidth"
            :height="mapHeight"
            frameborder="0"
          ></iframe>
          <address>
            <p>
              <i class="fa fa-map-marker"></i>
              <span>c.Натальино, ул. Революционная, д.93</span>
            </p>
            <p>
              <i class="fa fa-envelope-o"></i>
              <a :href="'mailto: ' + contacts.email">{{contacts.email}}</a>
            </p>
            <p>
              <i class="fa fa-phone"></i>
              <a :href="'tel: ' + contacts.phone">{{contacts.phone}}</a>
            </p>
          </address>
        </div>
        <div class="contact-form">
          <div class="title">{{isSubmit?'Заявка принята':'Оставьте заявку'}}</div>
          <div class="subtitle">{{isSubmit?'Мы с Вами свяжемся':'Заполните поля'}}</div>
          <form v-if="!isSubmit" action="#" @submit.prevent="submit">
            <input v-model="name" type="text" name="name" placeholder="Ваше имя" required />
            <input v-model="phone" type="phone" name="phone" placeholder="Ваше телефон" required />
            <input v-model="email" type="email" name="email" placeholder="Ваш email" />
            <textarea
              v-model="message"
              name="text"
              cols="30"
              rows="10"
              placeholder="Ваше сообщение"
              required
            ></textarea>
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
      email: "",
      message: ""
    };
  },
  computed: {
    mapWidth() {
      if (document.documentElement.clientWidth > 768) return 550;
      else return document.documentElement.clientWidth;
    },
    mapHeight() {
      if (document.documentElement.clientWidth > 768) return 400;
      else return 250;
    }
  },
  methods: {
    submit() {
      let info = {
        source: "Контакты",
        name: this.name,
        phone: this.phone,
        email: this.email,
        message: this.message
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
          console.log(answer)
          if (answer == "OK") {
            this.isSubmit = true;
            this.name = this.phone = this.email = this.message = "";
            setTimeout(() => (this.isSubmit = false), 2000);
          }
        });
    }
  }
};
</script>

<style lang="less" scoped>
@import "../style/variables.less";
.wrap {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  align-items: flex-start;
  iframe {
    @media (max-width: @phone) {
      padding: 0 10px;
      box-sizing: border-box;
    }
  }
  address {
    width: 100%;
    padding: 20px;
    box-sizing: border-box;
    p {
      font-size: 18px;
      display: grid;
      grid-template-columns: 30px 1fr;
    }
    i {
      color: @orange;
    }
    span,
    a {
      color: @brown;
      text-decoration: none;
    }
  }
  .contact-form {
    background-color: @brown;
    width: 47%;
    padding: 20px;
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
      textarea,
      input {
        font-size: 18px;
        padding-left: 10px;
      }
      input {
        font-size: 18px;
        height: 30px;
        margin-bottom: 20px;
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
        margin-top: 20px;
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
</style>