<template>
  <transition name="ageOff">
    <div class="v-modal-age" v-show="!isVisible">
      <div class="v-modal-age__block">
        <div class="v-modal-age__block-title">{{title}}</div>
        <div class="v-modal-age__block-btns">
          <div class="v-modal-age__block-btns-btn" @click="changeVisible">да</div>
          <div class="v-modal-age__block-btns-btn" @click="changeTitle">нет</div>
        </div>
        <div
          class="v-modal-age__block-attantion"
        >*Внимание! Данная продукция предназначена лицам 18лет и выше, пожалуйста, подтвердите свой возраст перед посещением сайта.</div>
      </div>
    </div>
  </transition>
</template>

<script>
export default {
  name: "v-modal-age",
  components: {},
  data() {
    return {
      isVisible: false,
      title: "Вам уже исполнилось 18?",
    };
  },
  methods: {
    changeTitle() {
      this.title =
        "Извините, мы не можем предоставить доступ к сайту лицам младше 18 лет.";
    },
    changeVisible() {
      this.isVisible = true;
      localStorage.setItem("isVisible", JSON.stringify(this.isVisible));
    },
  },
  created() {
    this.isVisible = JSON.parse(localStorage.getItem("isVisible")) || false;
  },
};
</script>

<style lang="scss">
@import "resources/sass/variables";
.v-modal-age {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100vh;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 9999;
  display: flex;
  justify-content: center;
  align-items: center;

  &__block {
    max-width: 800px;
    width: 100%;
    padding: 50px $padding $padding;
    display: flex;
    flex-direction: column;
    align-items: center;
    background-image: url("/images/bg-age.jpg");
    background-position: center;
    background-size: cover;
    border-radius: $radius * 3;

    &-title {
      font-size: calc(16px + 10 * ((100vw - 320px) / (1280 - 320)));
      line-height: 40px;
      min-height: 80px;
      text-align: center;
      text-transform: uppercase;
      color: #fff;
      font-family: $fontBase;
    }

    &-btns {
      display: flex;
      margin: 0 0 50px 0;

      &-btn {
        border: 1px solid $colorBorder;
        padding: $padding 0;
        width: 100px;
        color: #fff;
        text-shadow: 0 0 5px black;
        font-size: $fontSizeBase + 8;
        text-transform: uppercase;
        text-align: center;
        font-family: $fontBase;
        cursor: pointer;
        margin: $margin * 2 $margin;
        border-radius: $radius;

        &:hover {
          background-color: $colorMain;
        }
      }
    }

    &-attantion {
      text-align: center;
      color: #ccc;
    }
  }
}
.ageOff-enter-active {
  transition: all 0.3s ease;
}
.ageOff-leave-active {
  transition: all 0.5s cubic-bezier(1, 0.5, 0.8, 1);
}
.ageOff-enter,
.ageOff-leave-to {
  transform: translateY(-100%);
  opacity: 0;
}
</style>
