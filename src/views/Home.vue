<template>
<main>
    <section class="intro">
      <div class="container">
        <div class="left">
          <h1>Кондитерская на дому</h1>
          <div class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae maiores eveniet enim.
            Fuga aliquid molestias quia veniam voluptatibus inventore dignissimos dolorem quisquam accusantium?
            Reprehenderit reiciendis asperiores fuga, saepe et illo quidem facilis voluptatum corporis, qui, quisquam
            magni esse dicta doloremque pariatur quaerat veniam cum? Aperiam, vitae facilis obcaecati, quis laborum ut
            inventore quidem recusandae totam quam distinctio perferendis expedita porro eius deleniti. Sunt qui
            pariatur sit fuga, nemo quia necessitatibus omnis assumenda! Necessitatibus beatae aperiam deserunt nesciunt
            nostrum in, nulla ex doloribus ut eos velit consequuntur consectetur consequatur at officiis enim illum odit
            id excepturi dolorem blanditiis aspernatur ullam. Esse.</div>
        </div>
        <div class="right">
          <div class="main-form">
            <div class="title">Оставьте заявку</div>
            <div class="subtitle">мы с Вами свяжемся!</div>
            <form action="send.php">
              <input type="text" name="name" placeholder="Ваше имя">
              <input type="phone" name="phone" placeholder="Ваше телефон">
              <input type="email" name="email" placeholder="Ваш email">
              <input type="submit" value="Отправить">
            </form>
          </div>
        </div>
      </div>
    </section>
  </main>
</template>

<style lang="less" scoped>
@import '../style/variables.less';
main {
  .intro {
    background: linear-gradient(
      rgba(0, 0, 0, 0.7), 
      rgba(0, 0, 0, 0.7)
    ), url(../img/bg1.jpg);
    background-size  : cover;
    background-repeat: no-repeat;
    min-height       : 800px;

    .container {
      display: flex;
      flex-wrap: wrap;
      align-items: flex-start;
      margin-top: 50px;
      .left,
      .right {
        width  : 50%;
        padding: 20px;
        @media (max-width: @phone) {
          width: 100%;
          padding: 0;
        }
      }
      
      .left {
        color: #fff;

        h1 {
          margin-bottom: 30px;
        }

        .text {
          font-size  : 18px;
          line-height: 150%;
        }
        @media (max-width: @phone) {
          padding: 10px;
        }
      }

      .right {
        display        : flex;
        justify-content: center;

        .main-form {
          background-color: @braun;
          padding         : 20px;
          width           : 330px;
          text-align      : center;
          color           : #fff;
          @media (max-width: @phone) {
            width: 100%;
          }
          .title {
            font-size     : 24px;
            text-transform: uppercase;
          }

          .subtitle {
            margin-bottom: 20px;
          }

          form {
            margin        : 0 auto;
            display       : flex;
            flex-direction: column;
            width         : 80%;

            input {
              font-size    : 18px;
              height       : 30px;
              margin-bottom: 20px;
              padding-left: 10px;
            }

            [type="submit"] {
              background-color: @orange;
              border          : none;
              cursor          : pointer;
              outline         : none;
              color           : #fff;
              border-radius   : 10px;
              height          : auto;
              padding         : 10px 0;
              &:hover {
                background:darken(@orange, 5%);
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
}
</style>