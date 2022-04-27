<template>
    <div class="v-deals">
        <div class="mainer end">
            <div class="v-deals__row">
                <div class="v-deals__row-img">
                    <img
                        :src="('/images/dealstop.png')"
                        :alt="deals.name"
                        data-aos="slide-right"
                    />
                </div>
                <div class="v-deals__row-info" data-aos="slide-left">
                    <div class="v-deals__row-info-name">{{deals.name}}</div>
                    <div class="v-deals__row-info-price">
                        <div class="v-deals__row-info-price-first">{{deals.price}} грн.</div>
                        <div class="v-deals__row-info-price-second">
                            <s>{{deals['sale-price']}} грн.</s>
                        </div>
                    </div>
                    <div class="v-deals__row-info-raiting">
            <span class="v-deals__row-info-raiting-stars">
              <span
                  class="v-deals__row-info-raiting-stars-bg"
                  :style="{width: deals.raiting * 20 + '%'}"
              ></span>
            </span>
                    </div>
                    <div class="v-deals__row-info-btn btn">В корзину</div>
                    <div class="v-deals__row-info-time">
                        <v-time :endtime="deals.endtime" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import vTime from "./v-time";

export default {
    name: "v-deals",
    components: {
        vTime,
    },
    data() {
        return {
            deals: {
                "endtime": "2022-05-31 18:30:40",
                "image": "dealstop.png",
                "name": "HIGH VOLTAGE energy inflused E-Liquil Vaporz",
                "price": 999,
                "sale-price": 1634,
                "raiting": 4.3,
                "avialable": true,
                "id": 555,
                "quantity": 1
            },
        };
    },
    methods: {
    },
    mounted() {
    },
    computed: {
    },
};
</script>

<style lang="scss">
@import "resources/sass/variables";
.v-deals {
    background-image: url("/images/fordeals.jpg");
    background-position: center;
    background-size: cover;
    display: flex;
    padding: 50px 0 0;

    .end {
        display: flex;
        justify-content: flex-end;
        width: 100%;
    }

    &__row {
        width: 1000px;
        padding: 0 $padding;
        display: flex;

        &-img {
            max-width: 500px;
            width: 100%;

            img {
                margin: 0 auto;
                display: block;
            }
        }
        &-info {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            padding: $padding;
            justify-content: space-between;
            width: 100%;

            &-name {
                font-family: $fontBase;
                font-weight: 700;
                font-size: $fontSizeBase + 10;
                color: $colorBase;
                line-height: 30px;
            }

            &-price {
                display: flex;
                font-family: $fontBase;
                font-weight: 700;
                color: #ccc;

                &-first {
                    font-size: calc(24px + 26 * ((100vw - 320px) / (1280 - 320)));
                }
                &-second {
                    font-size: calc(16px + 16 * ((100vw - 320px) / (1280 - 320)));
                }
            }
            &-raiting {
                width: 109px;
                display: flex;
                margin: 10px 0;

                &-stars {
                    background-image: url("/images/rating-bg.png");
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

            &-btn {
                width: 150px;
                text-align: center;
            }

            &-time {
                display: flex;
                justify-content: center;
            }
        }
    }
}
</style>
