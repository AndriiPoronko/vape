<template>
  <div class="v-cart-item">
    <div class="v-cart-item__img">
      <img :src="('/storage/' + cart_data.image)" alt />
    </div>
    <div class="v-cart-item__info">
      <div class="v-cart-item__info-title">{{cart_data.title}}</div>
      <div class="v-cart-item__info-price">{{cart_data.price}} грн.</div>
      <div class="v-cart-item__info-raiting">
        <span class="v-cart-item__info-raiting-stars" :style="{'background-image': 'url(' + 'storage/images/icons/rating-bg.png' + ')'}">
          <span
            class="v-cart-item__info-raiting-stars-bg"
            :style="{width: cart_data.raiting * 20 + '%'}"
          ></span>
        </span>
      </div>
    </div>
    <div class="v-cart-item__counter">
      <div class="v-cart-item__counter-symbol">
        <i
          class="fas fa-minus"
          @click="cart_data.quantity--"
          v-if="cart_data.quantity < 2 ? false : true"
        ></i>
      </div>
      <input class="v-cart-item__counter-number" v-model="cart_data.quantity" />
      <div class="v-cart-item__counter-symbol">
        <i class="fas fa-plus" @click="cart_data.quantity++"></i>
      </div>
    </div>
    <div class="v-cart-item__total">{{cart_data.price * cart_data.quantity}} грн.</div>
    <div class="v-cart-item__delete">
      <i class="far fa-times-circle" @click="deleteFromCart"></i>
    </div>
  </div>
</template>

<script>
export default {
  name: "v-cart-item",
  props: {
    cart_data: {
      type: Object,
      default() {
        return {};
      },
    },
  },
  components: {},
  data() {
    return {};
  },
  methods: {
    deleteFromCart() {
      this.$emit("deleteFromCart");
    },
  },
};
</script>

<style lang="scss">
@import "resources/sass/variables";
.v-cart-item {
  border: 1px solid $colorBorder;
  margin: $margin;
  display: flex;
  justify-content: space-between;
  font-family: $fontBase;

  &__img {
    padding: $padding;
    max-width: 150px;
    display: flex;
    justify-content: center;
    align-items: center;

    & > img {
      width: 100%;
      display: block;
    }
  }

  &__info {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    color: #fff;
    padding: $padding;
    width: 250px;
    align-items: center;

    &-raiting {
      width: 109px;
      display: flex;
      margin: 10px 0;

      &-stars {
        background-position: left bottom;
        width: 109px;
        display: block;

        &-bg {
          background-image: inherit;
          height: 16px;
          display: block;
          background-position: left top;
        }
      }
    }
    &-title {
      font-size: $fontSizeBase;
      font-weight: 700;
      width: 100%;
      text-align: center;
      margin: 5px 0;
      line-height: 20px;
      height: 60px;
      overflow: hidden;
    }

    &-price {
      font-size: $fontSizeBase + 8;
      margin: 5px 0;
    }
  }
  &__counter {
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: $fontSizeBase + 10;
    color: #fff;

    &-number {
      width: 50px;
      height: 50px;
      background-color: #fff;
      border-radius: $radius;
      padding: 5px;
      text-align: center;
      font-weight: 700;
    }
    &-symbol {
      width: 50px;
      height: 50px;
      cursor: pointer;
      display: flex;
      justify-content: center;
      align-items: center;
    }
  }
  &__total {
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: $fontSizeBase + 15;
    width: 200px;
    text-align: center;
    padding: $padding;
    color: $colorBase;
  }
  &__delete {
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 40px;
    color: #ccc;
    padding: $padding;

    & > i:hover {
      color: $colorRed;
      cursor: pointer;
    }
  }
}
</style>
