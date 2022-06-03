<template>
    <div class="v-modal-checkout" v-if="isCheckout">
        <form class="v-modal-checkout__block">
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
                            <input type="text" required v-model="first_name" id="nameClient"/>
                        </div>
                        <div class="v-modal-checkout__block-container-data-col">
                            <label for="surnameClient">Фамилия</label>
                            <input type="text" required v-model="last_name" id="surnameClient"/>
                        </div>
                    </div>
                    <div class="v-modal-checkout__block-container-data-row">
                        <div class="v-modal-checkout__block-container-data-col">
                            <label for="phoneClient">Мобильный телефон</label>
                            <input type="text" required v-model="phone_number" id="phoneClient"/>
                        </div>
                        <div class="v-modal-checkout__block-container-data-col">
                            <label for="cityClient">Город</label>
                            <input type="text" required pattern="[а-яА-ЯёЁ\s-]" id="cityClient" @input="getCity"
                                   v-model="city"/>
                            <div class="v-modal-checkout__block-container-data-city">
                                <div
                                    v-for="(item, i) of cityList"
                                    :key="i"
                                    @click.prevent="cityInNP(item)"
                                >{{ item }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="v-modal-checkout__block-container-data-title">Доставка в {{ city }}</div>
                    <div class="v-modal-checkout__block-container-data-row">
                        <v-select :options="paymentList" @select="payment" :selected="selectedPayment"/>
                    </div>
                    <div class="v-modal-checkout__block-container-data-row">
                        <v-select :options="deliveryList" @select="delivery" :selected="selectedTown"/>
                    </div>
                    <div
                        class="v-modal-checkout__block-container-data-row"
                        v-if="isDelivery"
                        v-show="isDeliveryShow"
                    >
                        <div class="v-modal-checkout__block-container-data-col">
                            <label for="addressClient">Введите ваш адресс</label>
                            <input type="text" v-model="address" id="addressClient"/>
                        </div>
                    </div>

                    <div
                        class="v-modal-checkout__block-container-data-row v-modal-checkout__block-container-data-row--depatment"
                        v-else
                        v-show="isDeliveryShow"
                    >

                        <v-select :options="departmentList" @select="department" :selected="selectedDepartment"/>
                    </div>
                </div>

                <div class="v-modal-checkout__block-container-summ">
                    <p class="v-modal-checkout__block-container-summ-title">Итого</p>
                    <div class="v-modal-checkout__block-container-summ-check">
                        <span
                            class="v-modal-checkout__block-container-summ-check-span">{{
                                totalCount
                            }} товар на сумму</span>
                        <span
                            class="v-modal-checkout__block-container-summ-check-span v-modal-checkout__block-container-summ-check-span--right"
                        >{{ totalPrice }}грн</span>
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
                        >{{ totalPrice }}грн</span>
                    </div>
                    <button type="submit" class="btn v-modal-checkout__block-container-summ-btn" @click.prevent="order">Заказ
                        подтверждаю
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
import vSelect from "../v-select";
import {mapState} from 'vuex'
import axios from "axios";

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
                {title: "Самовывоз из Новой Почты", value: 1},
                {title: "Курьер Новой Почты", value: 2},
            ],
            paymentList: [
                {title: "Наложный платеж", value: 1},
                {title: "Оплата на карту", value: 2},
            ],
            cityList: [],
            departmentList: [],
            warehousesList: [{
                title: 'Почтовое отделение',
                ref: '841339c7-591a-42e2-8233-7a0a00f0ed6f',
                value: 1
            }, {
                title: 'Почтомат приват банка',
                ref: '95dc212d-479c-4ffb-a8ab-8c1b9073d0bc',
                value: 2
            }, {
                title: 'Грузовое отделение',
                ref: '9a68df70-0267-42a8-bb5c-37f427e36ee4',
                value: 3
            }, {
                title: 'Почтомат',
                ref: 'f9316480-5f2d-425d-bc2c-ac7cd29decf0',
                value: 4
            }],
            city: "",
            cityDelivery: "",
            selectedTown: "Способ доставки",
            selectedPayment: "Способ оплаты",
            selectedDepartment: "Выберите отделение",
            isDelivery: false,
            isDeliveryShow: false,
            data: {
                modelName: "",
                calledMethod: "",
                methodProperties: {},
                apiKey: "3242cb852293f7e6bc99d746faa68277",
            },
            first_name: null,
            last_name: null,
            phone_number: null,
            address: ''
        };
    },
    methods:
        {
            checkOutClose() {
                this.$emit("checkOutClose");
            }
            ,
            delivery(option) {
                this.selectedTown = option.title;
                if (option.value === 2) {
                    this.isDelivery = true;
                } else if (option.value === 1) {
                    this.isDelivery = false;
                    this.data.modelName = "Address";
                    this.data.calledMethod = "getWarehouses";
                    this.data.methodProperties.CityName = this.city;
                    this.data.methodProperties.Limit = 200;
                    this.data.methodProperties.Language = 'RU';
                    this.data.methodProperties.TypeOfWarehouseRef = '841339c7-591a-42e2-8233-7a0a00f0ed6f';
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
                                this.departmentList = [];
                                list.data.forEach((item, i) => {
                                    this.departmentList[i] = {title: item.DescriptionRu, value: i};
                                });
                            });
                }
                this.isDeliveryShow = true;
            }
            ,
            payment(option) {
                this.selectedPayment = option.title;
            }
            ,
            department(option) {
                this.selectedDepartment = option.title;
            }

            ,
            getCity() {
                if (this.city) {
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
                            if (data.data[0].Addresses.length) {
                                data.data[0].Addresses.forEach((item) => {
                                    if (item.MainDescription) {
                                        this.cityList.push(item.MainDescription);
                                    }
                                });
                            }
                        });
                }
            }
            ,
            cityInNP(item) {
                this.city = item;
                this.cityList = [];
            },
            order() {
                const products = this.cart.map(item => {
                    return {'id': item.id, 'quantity': item.quantity}
                })
                axios.post('/api/orders', {
                    first_name: this.first_name,
                    last_name: this.last_name,
                    phone_number: this.phone_number,
                    city: this.city,
                    payment: this.selectedPayment,
                    delivery: this.selectedTown,
                    address: this.address,
                    department: this.selectedDepartment !== 'Выберите отделение' ? this.selectedDepartment : '',
                    products: products,
                }).then(res => {
                    this.$store.dispatch('DELETE_ALL_PRODUCTS_FROM_CART')
                    this.isCheckout = false
                    this.selectedTown = "Способ доставки"
                    this.$router.push({name: 'catalog'})
                }).catch(e => {
                    console.log(e)
                })
            }

        }
    ,
    created() {
    }
    ,
    mounted() {
        this.getCity()
    },
    computed: {
        ...mapState(["cart"]),
        totalCount() {
            if (this.cart) {
                let totalCount = 0;
                this.cart.forEach(item => totalCount += item.quantity)
                return totalCount
            }
        },
        totalPrice() {
            if (this.cart) {
                let totalPrice = 0;
                this.cart.forEach(item => totalPrice += item.price * item.quantity)
                return totalPrice
            }

        }
    },
    watch: {}
}
;
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

                &-city {
                    position: absolute;
                    left: 0;
                    width: calc(100% - 15px);
                    top: 60px;

                    div {
                        font-size: 15px;
                        background: #000;
                        color: white;
                        line-height: 20px;
                        padding-left: 5px;
                        border-bottom: 1px solid white;
                        max-width: 100%;
                        cursor: pointer;

                        &:hover {
                            background: #fff;
                            color: #000;
                            border-bottom: 1px solid #000;
                        }
                    }
                }

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
