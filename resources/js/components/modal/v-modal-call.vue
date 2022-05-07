<template>
  <transition name="modalcall">
    <div class="v-modal-call" v-if="MODALCALL">
      <div class="v-modal-call__bg">
        <form class="v-modal-call__bg-block" method="POST">
          <div class="v-modal-call__bg-block-close" @click="closeModalCall">
            <i class="fas fa-times"></i>
          </div>
          <div class="v-modal-call__bg-block-title">Заказать звонок</div>
          <label for="nameUserCall">Ваше Имя</label>
          <input
            type="text"
            maxlength="50"
            minlength="3"
            name="nameUser"
            required
            id="nameUserCall"
            placeholder="Имя"
            autocomplete="off"
          />
          <label for="phoneUserCall">Ваш номер телефона</label>
          <input
            type="text"
            maxlength="50"
            minlength="3"
            name="phoneUserCall"
            required
            id="nameUser"
            placeholder="Телефон"
            autocomplete="off"
          />
          <button class="btn v-modal-call__bg-btn" type="submit">Отправить</button>
        </form>
      </div>
    </div>
  </transition>
</template>

<script>
import { mapActions, mapGetters } from "vuex";

export default {
  name: "v-modal-call",
  components: {},
  data() {
    return {};
  },
  methods: {
    ...mapActions(["ACTIVE_MODAL_CALL"]),
    closeModalCall() {
      this.ACTIVE_MODAL_CALL();
    },
  },
  created() {
    setTimeout(() => this.ACTIVE_MODAL_CALL(), 50000);
  },
  computed: {
    ...mapGetters(["MODALCALL"]),
  },
};
</script>

<style lang="scss">
@import "resources/sass/variables";
.v-modal-call__bg {
  width: calc(100%);
  height: 100%;
  position: fixed;
  top: 0;
  left: 0;
  z-index: 8;
  background-color: rgba(0, 0, 0, 0.5);
  display: flex;
  justify-content: center;
  align-items: center;
}
.v-modal-call__bg-block {
  padding: $padding * 2 $padding;
  background-image: url("/images/man-smoke.jpg");
  max-width: 700px;
  width: 100%;
  display: flex;
  flex-direction: column;
  position: relative;
  transition-duration: 1s;
  z-index: 9;

  &-close {
    position: absolute;
    width: 30px;
    height: 30px;
    background-color: #fff;
    top: 0;
    right: 0;
    color: #ccc;
    font-size: $fontSizeBase + 6;
    text-align: center;
    line-height: 30px;
    border: 2px solid #ccc;
    cursor: pointer;
  }

  &-title {
    text-transform: uppercase;
    font-size: $fontSizeBase + 6;
    color: $colorBase;
    font-family: $fontBase;
  }
  & > label {
    font-size: $fontSizeBase;
    margin: $margin 0;
    color: #ccc;
    cursor: pointer;
  }
  & > input {
    font-family: $fontBase;
    font-size: $fontSizeBase + 4;
    width: 50%;
    background-color: #ccc;
    padding: $padding - 5 $padding;
    border-radius: $radius;
    border: 1px solid transparent;

    &:focus {
      border: 1px solid $colorMain;
    }
  }

  .v-modal-call__bg-btn {
    width: 50%;
    margin: $margin 0;
    color: $colorBase;
  }
}
.modalcall-enter-active,
.modalcall-leave-active {
  transition: ease 0.5s;
}
.modalcall-enter,
.modalcall-leave-to {
  opacity: 0;
}
</style>
