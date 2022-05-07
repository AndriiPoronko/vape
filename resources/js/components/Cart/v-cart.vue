<template>
  <div class="v-cart">
    <div class="v-cart__head">
      <div class="v-cart__head-title">Корзина</div>
      <router-link :to="{name: 'catalog'}">
        <div class="v-cart__head-title total-sum">Каталог</div>
      </router-link>
    </div>

    <v-cart-item
      v-for="(product, index) in CART"
      :key="product.id"
      :cart_data="product"
      @deleteFromCart="deleteFromCart(index)"
    />

    <div class="v-cart__head total" v-if="CART.length">
      <div class="v-cart__head-title total-sum" @click="checkOutClose">Оформить заказ</div>
      <button class="v-cart__head-title">{{totalPrice}} грн.</button>
    </div>

    <div class="v-cart__zero" v-if="!CART.length">
      <div class="v-cart__zero-title">Ваша корзина пуста!</div>
      <div class="v-cart__zero-btns">
        <router-link :to="{name: 'main'}">
          <div class="v-cart__zero-btns-btn btn">На главную</div>
        </router-link>
        <router-link :to="{name: 'catalog'}">
          <div class="v-cart__zero-btns-btn btn">Вернуться в каталог</div>
        </router-link>
      </div>
    </div>

    <v-cart-checkout :isCheckout="isCheckout" @checkOutClose="checkOutClose" />
  </div>
</template>

<script>
import vCartItem from "./v-cart-item";
import { mapGetters, mapActions } from "vuex";
import vCartCheckout from "./v-cart-checkout";

export default {
  name: "v-cart",
  components: { vCartItem, vCartCheckout },
  data() {
    return {
      isCheckout: false,
    };
  },
  computed: {
    ...mapGetters(["CART"]),
    totalPrice() {
      let result = [];
      for (let item of this.CART) {
        result.push(item.price * item.quantity);
      }
      result = result.reduce((a, b) => {
        return a + b;
      });
      return result;
    },
  },
  methods: {
    ...mapActions(["DELETE_PRODUCT_FROM_CART"]),
    deleteFromCart(index) {
      this.DELETE_PRODUCT_FROM_CART(index);
    },
    checkOutClose() {
      this.isCheckout = !this.isCheckout;
    },
  },
};
</script>

<style lang="scss">
@import "resources/sass/variables";
.v-cart {
  padding: 75px 15px 15px;
  min-height: 100vh;
  margin: 0 auto;
  max-width: 1370px;
  min-height: 100vh;

  &__head {
    width: 100%;
    background-color: #000;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 5px;

    &-title {
      text-align: center;
      border: 1px solid #fff;
      padding: 5px $padding;
      font-size: $fontSizeBase + 4;
      font-family: $fontBase;
      text-align: center;
      line-height: 30px;
      background-color: #000;
      color: #fff;

      &.total-sum {
        margin: 0 1px 0 0;
        &:hover {
          background-color: #fff;
          color: #000;
          cursor: pointer;
        }
      }
    }

    &.total {
      justify-content: flex-end;
    }
  }
  &__zero {
    display: flex;
    flex-direction: column;
    align-items: center;

    &-title {
      font-size: calc(20px + 20 * ((100vw - 320px) / (1280 - 320)));
      color: #fff;
      font-family: $fontBase;
      margin: $margin 0;
    }
    &-btns {
      display: flex;
      justify-content: center;
      margin: $margin;

      &-btn {
        margin: $margin;
      }
    }
  }
}
</style>
