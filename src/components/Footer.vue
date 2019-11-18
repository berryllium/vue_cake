<template>
  <footer>
    <div class="container">
      <div class="footer-item">
        <h3>Время работы</h3>
        <p>{{contacts.work}}</p>
      </div>
      <div class="footer-item">
        <h3>Наши контакты</h3>
        <p>
          Звоните:
          <a :href="'tel:'+contacts.phone">{{contacts.phone}}</a>
        </p>
        <p>
          Пишите:
          <a :href="'mailto: ' + contacts.email">{{contacts.email}}</a>
        </p>
      </div>
      <div class="footer-item">
        <h3>Мы в соцсетях</h3>
        <div class="social-links">
          <a v-if="contacts.vk" :href="contacts.vk">
            <i class="fa fa-vk" aria-hidden="true" target="_blank"></i>
          </a>
          <a v-if="contacts.inst" :href="contacts.inst">
            <i class="fa fa-instagram" aria-hidden="true" target="_blank"></i>
          </a>
          <a v-if="contacts.ok" :href="contacts.ok">
            <i class="fa fa-odnoklassniki" aria-hidden="true" target="_blank"></i>
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
  background-color: @brown;
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
