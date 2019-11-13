<template>
  <header>
    <div class="container">
      <div class="top-menu">
        <a to="/" class="menu-btn">
          <span></span>
        </a>
        <router-link class="logo" to="/">
          <img src="../img/logo.png" alt="logo" />
        </router-link>
        <nav>
          <ul>
            <li class="nav-item">
              <router-link to="/">Главная</router-link>
            </li>
            <li class="nav-item">
              <router-link to="/каталог">Каталог</router-link>
            </li>
            <li class="nav-item">
              <router-link to="/о_нас">О нас</router-link>
            </li>
            <li class="nav-item">
              <router-link to="/доставка">Доставка</router-link>
            </li>
            <li class="nav-item">
              <router-link to="/контакты">Контакты</router-link>
            </li>
          </ul>
        </nav>
        <router-link to="/корзина" class="cart">
          <i class="fa fa-shopping-cart"></i>
          <div class="cart-count">3</div>
        </router-link>
      </div>
    </div>
  </header>
</template>


<style scoped lang="less">
@import "../style/variables.less";
header {
  padding-bottom: 15px;
  background-color: lighten(@braun, 45%);

  .top-menu {
    position: relative;
    display: flex;
    justify-content: space-between;
    padding-top: 20px;

    .menu-btn {
      display: none;
      position: absolute;
      z-index: 2;
      justify-content: center;
      top: 10px;
      left: 10px;
      width: 40px;
      height: 40px;
      border-radius: 20px;
      background-color: @braun;

      span,
      span:before,
      span:after {
        position: absolute;
        display: block;
        top: 50%;
        margin-top: -1px;
        left: 50%;
        margin-left: -10px;
        width: 20px;
        height: 2px;
        background-color: #fff;
      }

      span:before,
      span:after {
        content: "";
        transition: 0.5s;
        transform-origin: left bottom;
      }

      span:before {
        transform: translateY(5px);
      }

      span:after {
        transform: translateY(-5px);
      }

      @media (max-width: @phone) {
        display: block;
      }
    }

    .menu-btn_active {
      span:before,
      span:after {
        width: 10px;
      }

      span:before {
        transform: rotate(45deg);
      }

      span:after {
        transform: rotate(-45deg);
      }
    }

    .logo {
      display: flex;
      text-transform: uppercase;
      align-items: center;

      img {
        @media (max-width: @phone) {
          width: 150px;
          margin-left: 70px;
        }
      }
    }

    nav {
      display: flex;
      align-items: flex-end;

      @media (max-width: @phone) {
        display: none;
        position: absolute;
        z-index: 1;
        background-color: @braun;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        align-items: flex-start;
      }

      ul {
        margin: 0;
        padding: 0;
        list-style-type: none;
        display: flex;
        align-items: center;
        justify-content: space-between;

        @media (max-width: @phone) {
          flex-direction: column;
          align-items: flex-start;
          margin-top: 70px;
          min-width: 340px;
        }

        .nav-item {
          @media (max-width: @phone) {
            margin-top: 20px;
          }

          a {
            color: @braun;
            font-weight: 700;
            border: none;
            text-transform: uppercase;
            text-decoration: none;
            padding: 10px 0;
            margin: 20px;
            font-size: 24px;
            transition: 0.2s;

            @media (max-width: @phone) {
              color: @yellow;
            }

            &:hover {
              border-bottom: 3px solid @braun;

              @media (max-width: @phone) {
              }
            }
          }
        }
      }
    }

    .cart {
      position: relative;
      font-size: 32px;
      display: flex;
      align-items: flex-end;
      justify-content: flex-start;
      margin-right: 20px;
      text-decoration: none;

      i {
        color: @braun;
        &:hover {
          color: darken(@braun, 10%);
        }
      }

      .cart-count {
        position: absolute;
        display: flex;
        justify-content: center;
        align-items: center;
        right: -15px;
        bottom: 15px;
        font-size: 16px;
        height: 20px;
        width: 20px;
        border-radius: 10px;
        background-color: @orange;
        color: #fff;
      }
    }
  }
}
</style>
