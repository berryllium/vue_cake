<template>
  <footer>
    <div class="container">
      <div class="footer-item">
        <h3>Время работы</h3>
        <p>Работаем каждый день с 9.00 до 21.00</p>
      </div>
      <div class="footer-item">
        <h3>Наши контакты</h3>
        <p>
          Звоните:
          <a :href="'tel:'+contacts.phone">{{contacts.phone}}</a>
        </p>
        <p>
          Пишите:
          <a href="mailto: test@yandex.ru">test@yandex.ru</a>
        </p>
      </div>
      <div class="footer-item">
        <h3>Мы в соцсетях</h3>
        <div class="social-links">
          <a href="#">
            <i class="fa fa-vk" aria-hidden="true"></i>
          </a>
          <a href="#">
            <i class="fa fa-instagram" aria-hidden="true"></i>
          </a>
          <a href="#">
            <i class="fa fa-odnoklassniki" aria-hidden="true"></i>
          </a>
        </div>
      </div>
    </div>
  </footer>
</template>
<script>
export default {
  props: ['contacts']
}
</script>

<style lang="less" scoped>
@import "../style/variables.less";
footer {
  background-color: @braun;
  .container {
    display: flex;
    justify-content: space-between;
    color: #c3c3c3;
    a {
      text-decoration: none;
      color: #c3c3c3;
    }
    .social-links {
      display: flex;
      a {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 30px;
        height: 30px;
        border-radius: 15px;
        margin-right: 10px;
        background-color: @orange;
        color: white;
        &:hover {
          background-color: darken(@orange, 5%);
        }
      }
    }
    @media (max-width: @phone) {
      flex-direction: column;
      padding: 10px;
    }
  }
}
</style>
