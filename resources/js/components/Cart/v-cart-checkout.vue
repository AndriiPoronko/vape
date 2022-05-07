<template>
  <div class="v-modal-checkout" v-if="isCheckout">
    <div class="v-modal-checkout__block">
      <div class="v-modal-checkout__block-name">Оформление заказа</div>
      <div class="v-modal-checkout__block-close" @click="checkOutClose">
        <i class="fas fa-times"></i>
      </div>
      <div class="v-modal-checkout__block-container">
        <div class="v-modal-checkout__block-container-data">
          <div class="v-modal-checkout__block-container-data-title">Ваши контактные данные</div>
          <div class="v-modal-checkout__block-container-data-row">
            <div class="v-modal-checkout__block-container-data-col">
              <label for="nameClient">Имя</label>
              <input type="text" id="nameClient" />
            </div>
            <div class="v-modal-checkout__block-container-data-col">
              <label for="surnameClient">Фамилия</label>
              <input type="text" id="surnameClient" />
            </div>
          </div>
          <div class="v-modal-checkout__block-container-data-row">
            <div class="v-modal-checkout__block-container-data-col">
              <label for="phoneClient">Мобильный телефон</label>
              <input type="text" id="phoneClient" />
            </div>
            <div class="v-modal-checkout__block-container-data-col">
              <label for="cityClient">Город</label>
              <input type="text" id="cityClient" @input="getCity" v-model="city" />
              <div
                class="v-modal-checkout__block-container-data-city"
                v-for="(item, i) of cityList"
                :key="i"
              >
                <span class="v-modal-checkout__block-container-data-city-span">{{item}}</span>
              </div>
            </div>
          </div>
          <div class="v-modal-checkout__block-container-data-title">Доставка в {{city}}</div>
          <div class="v-modal-checkout__block-container-data-row">
            <v-select :options="paymentList" @select="payment" :selected="selectedPayment" />
          </div>
          <div class="v-modal-checkout__block-container-data-row">
            <v-select :options="deliveryList" @select="delivery" :selected="selectedTown" />
          </div>
          <div
            class="v-modal-checkout__block-container-data-row"
            v-if="isDelivery"
            v-show="isDeliveryShow"
          >
            <div class="v-modal-checkout__block-container-data-col">
              <label for="addressClient">Введите ваш адресс</label>
              <input type="text" id="addressClient" />
            </div>
          </div>
          <div
            class="v-modal-checkout__block-container-data-row v-modal-checkout__block-container-data-row--depatment"
            v-else
            v-show="isDeliveryShow"
          >
            <v-select :options="depatmentList" @select="depatment" :selected="selectedDepatment" />
          </div>
        </div>

        <div class="v-modal-checkout__block-container-summ">
          <p class="v-modal-checkout__block-container-summ-title">Итого</p>
          <div class="v-modal-checkout__block-container-summ-check">
            <span class="v-modal-checkout__block-container-summ-check-span">1 товар на сумму</span>
            <span
              class="v-modal-checkout__block-container-summ-check-span v-modal-checkout__block-container-summ-check-span--right"
            >500грн</span>
          </div>
          <div class="v-modal-checkout__block-container-summ-check">
            <span class="v-modal-checkout__block-container-summ-check-span">Стоимость доставки</span>
            <span
              class="v-modal-checkout__block-container-summ-check-span v-modal-checkout__block-container-summ-check-span--right"
            >По тарифам перевозчика</span>
          </div>
          <div class="v-modal-checkout__block-container-summ-check">
            <span class="v-modal-checkout__block-container-summ-check-span">К оплате</span>
            <span
              class="v-modal-checkout__block-container-summ-check-span v-modal-checkout__block-container-summ-check-span--right"
            >500грн</span>
          </div>
          <button class="btn v-modal-checkout__block-container-summ-btn">Заказ подтверждаю</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import vSelect from "../v-select";

export default {
  name: "v-modal-checkout",
  components: {
    vSelect,
  },
  props: {
    isCheckout: {
      type: Boolean,
      default() {
        return false;
      },
    },
  },
  data() {
    return {
      deliveryList: [
        { name: "Самовывоз из Новой Почты", value: 1 },
        { name: "Курьер Новой Почты", value: 2 },
      ],
      paymentList: [
        { name: "Наложный платеж", value: 1 },
        { name: "Оплата на карту", value: 2 },
      ],
      cityList: ["Чернигов", "Киев"],
      depatmentList: [],
      city: "",
      selectedTown: "Способ доставки",
      selectedPayment: "Способ оплаты",
      selectedDepatment: "Выберите отделение",
      isDelivery: false,
      isDeliveryShow: false,
      data: {
        modelName: "",
        calledMethod: "",
        methodProperties: {},
        apiKey: "0689024fb11bc6a5869fbbc738554ac3",
      },
    };
  },
  methods: {
    checkOutClose() {
      this.$emit("checkOutClose");
    },
    delivery(option) {
      this.selectedTown = option.name;
      if (option.value === 2) {
        this.isDelivery = true;
      } else if (option.value === 1) {
        this.isDelivery = false;
        this.data.modelName = "AddressGeneral";
        this.data.calledMethod = "getWarehouses";
        this.data.methodProperties.CityName = this.city;
        fetch("https://api.novaposhta.ua/v2.0/json/", {
          crossDomain: true,
          method: "POST",
          headers: {
            "content-type": "application/json",
          },
          processData: false,
          body: JSON.stringify(this.data),
        })
          .then((response) => {
            return response.json();
          })
          .then((list) => {
            this.depatmentList = [];
            list.data.forEach((item, i) => {
              this.depatmentList[i] = { name: item.DescriptionRu, value: i };
            });
          });
      }
      this.isDeliveryShow = true;
    },
    payment(option) {
      this.selectedPayment = option.name;
    },
    depatment(option) {
      this.selectedDepatment = option.name;
    },
    getCity() {
      this.data.modelName = "Address";
      this.data.calledMethod = "searchSettlements";
      this.data.methodProperties.CityName = this.city;
      this.data.methodProperties.Limit = 5;
      fetch("https://api.novaposhta.ua/v2.0/json/", {
        crossDomain: true,
        method: "POST",
        headers: {
          "content-type": "application/json",
        },
        processData: false,
        body: JSON.stringify(this.data),
      })
        .then((response) => {
          return response.json();
        })
        .then((data) => {
          this.cityList = [];
          console.log(data.data[0].Addresses);
          if (data.data[0].Addresses.length) {
            data.data[0].Addresses.forEach((item) => {
              if (item.MainDescription) {
                this.cityList.push(item.Present);
              }
            });
          }

          console.log(this.cityList);
        });
    },
  },
  created() {},
};
</script>

<style lang="scss">
@import "resources/sass/variables";
.v-modal-checkout {
  width: 100%;
  height: 100vh;
  position: fixed;
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 99;
  padding: $padding;
  top: 0;
  left: 0;

  &__block {
    max-width: 1000px;
    width: 100%;
    background-color: #fff;
    padding: $padding;
    position: relative;

    &-name {
      font-family: $fontBase;
      font-size: calc(16px + 12 * ((100vw - 320px) / (1280 - 320)));
      padding: 0 0 $padding 0;
    }
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

    &-container {
      display: flex;
      justify-content: space-between;

      &-data {
        display: flex;
        flex-direction: column;
        flex-grow: 1;

        &-title {
          font-size: calc(12px + 6 * ((100vw - 320px) / (1280 - 320)));
          font-family: $fontBase;
          padding: $padding 0 0 0;
        }

        &-row {
          display: flex;
          flex-direction: row;
          margin: $margin 0 0 0;
        }

        &-col {
          display: flex;
          flex-direction: column;
          flex-grow: 1;
          max-width: 50%;
          position: relative;
          padding: 0 $padding 0 0;

          & > label {
            font-family: $fontBase;
            color: $colorBorder;
            cursor: pointer;
          }
          & > input {
            font-family: $fontBase;
            height: 40px;
            border: 1px solid $colorBorder;
            padding: 0 $padding - 5;
          }
        }
      }

      &-summ {
        width: 300px;
        background-color: $colorBorder;
        padding: $padding;

        &-title {
          font-size: 28px;
          font-family: $fontBase;
          margin: 0 0 $margin 0;
        }

        &-check {
          display: flex;
          justify-content: space-between;

          &-span {
            text-align: left;
            width: 50%;
            margin: 0 0 $margin 0;
            font-family: $fontBase;
            font-size: 15px;

            &--right {
              text-align: right;
            }
          }
        }

        &-btn {
          width: 100%;
          margin: $margin * 2 0 0 0;
          background-color: #000;
        }
      }
    }
  }
}
</style>
