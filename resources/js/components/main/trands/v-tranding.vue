<template>
    <div class="v-tranding" v-if="TRENDS.length">
        <div class="v-tranding__title" data-aos="slide-left">Trending</div>
        <div class="mainer block-container">
            <div class="v-tranding__item" data-aos="zoom-out-down" v-for="(item, i) in TRENDS" :key="i">
                <div class="v-tranding__item-img">
                    <img :src="('/storage/images/trand/' + item.image)" alt="item.title" />
                </div>
                <div class="v-tranding__item-name" @click="modalProduct(item)">{{ item.title }}</div>
                <div class="v-tranding__item-raiting">
          <span class="v-tranding__item-raiting-stars">
            <span
                class="v-tranding__item-raiting-stars-bg"
                :style="{ width: item.raiting * 20 + '%' }"
            ></span>
          </span>
                </div>
                <div class="v-tranding__item-price">{{ item.price }} грн.</div>
                <button class="btn v-tranding__item-buy" @click="addToCart(item)">В корзину</button>
            </div>
        </div>
    </div>
</template>

<script>
import {mapActions, mapGetters} from "vuex";
export default {
    name: "v-tranding",
    components: {},
    data() {
        return {
        };
    },
    mounted() {
        this.GET_TRENDS_FROM_API();
    },
    methods: {
        ...mapActions(['ACTIVE_MODAL_PRODUCT', 'ADD_TO_CART', 'GET_TRENDS_FROM_API']),
        modalProduct(item){
            this.ACTIVE_MODAL_PRODUCT(item);
        },
        addToCart(product){
            this.ADD_TO_CART(product);
        }
    },
    computed: {
        ...mapGetters(['TRENDS']),
    },
};
</script>

<style lang="scss">
@import "resources/sass/variables";
.v-tranding {
    &__title {
        font-family: $fontBase;
        font-size: calc(24px + 76 * ((100vw - 320px) / (1280 - 320)));
        font-weight: bold;
        color: darken($colorMain, 40);
        text-transform: uppercase;
        margin: -100px 0 0 0;
        text-align: center;
        position: relative;

        &:before {
            content: "trending";
            position: absolute;
            font-size: calc(24px + 36 * ((100vw - 320px) / (1280 - 320)));
            color: $colorMain;
            text-transform: uppercase;
            letter-spacing: 5px;
            transform: translateX(-50%);
            left: 50%;
            bottom: 0;
        }
    }

    .block-container {
        display: flex;
        justify-content: center;
        padding: 50px 15px 0 15px;
        min-height: 440px;
    }

    &__item {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: $padding;
        max-width: 250px;
        transition-duration: 0.5s;
        cursor: pointer;
        border: 1px solid transparent;
        border-radius: $radius;

        &-img {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;

            & > img {
                display: block;
                width: 100%;
            }
        }

        &-name {
            font-size: $fontSizeBase;
            font-weight: bold;
            font-family: $fontBase;
            color: $colorBorder;
            letter-spacing: 1px;
            line-height: 25px;
            overflow: hidden;
            height: 50px;
            text-align: center;
            cursor: pointer;

            &:hover {
                color: $colorMain;
            }
        }

        &-raiting {
            width: 109px;
            display: flex;
            margin: 10px 0;

            &-stars {
                background-image: url('/images/rating-bg.png');
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

        &-price {
            font-family: $fontBase;
            font-size: $fontSizeBase + 8;
            font-weight: 700;
            color: $colorBase;
            margin: 0 0 $margin * 2 0;
        }

        &-buy {
            width: 100%;
            opacity: 0;
        }

        &:hover {
            border: 1px solid $colorBorder;
            -webkit-transform: scale(1.05);
            .btn {
                opacity: 1;
            }
        }
    }
}
</style>

