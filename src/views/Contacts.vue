<template>
  <section class="contacts">
    <div class="container">
      <h1>Контакты</h1>
      <div class="wrap">
        <div class="map">
          <iframe
            src="https://yandex.ru/map-widget/v1/?um=constructor%3Acdda55db439583887354173f87b390bf93f3ddf89dd8b787aa37b66b1e2bb87d&amp;source=constructor"
            width="550"
            height="400"
            frameborder="0"
          ></iframe>
          <address>
            <p>
              <i class="fa fa-map-marker"></i>
              <span>c.Натальино, ул. Революционная, д.93</span>
            </p>
            <p>
              <i class="fa fa-envelope-o"></i><a href="mailto: test@yandex.ru">test@yandex.ru</a>
            </p>
            <p>
              <i class="fa fa-phone"></i><a href="tel:+79999999999"></a>
            </p>
          </address>
        </div>
        <div class="contact-form">
          <div class="title">Оставьте заявку</div>
          <div class="subtitle">мы с Вами свяжемся!</div>
          <form action="send.php">
            <input type="text" name="name" placeholder="Ваше имя" />
            <input type="phone" name="phone" placeholder="Ваше телефон" />
            <input type="email" name="email" placeholder="Ваш email" />
            <textarea name="text" cols="30" rows="10" placeholder="Ваше сообщение"></textarea>
            <input type="submit" value="Отправить" />
          </form>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'Contacts',
  mounted() {
    console.log('ok')
    console.log(this.$root.$data)
  }
}
</script>

<style lang="less" scoped>
@import "../style/variables.less";
.wrap {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  address {
    width: 100%;
    padding: 20px;
  }
  .contact-form {
    background-color: @braun;
    width: 50%;
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