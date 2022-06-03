<template>
    <div class="v-new-arrivals" v-if="NEW_ARRIVALS.length">
        <div class="v-new-arrivals__title" data-aos="slide-left">New arrivals</div>

        <div class="mainer">
            <swiper class="swiper" :options="swiperOption">
                <swiper-slide class="item" v-for="(product, i) of NEW_ARRIVALS" :key="i">
                    <div class="item__img">
                        <img :src="('/storage/' + product.image)" alt="product.title" />
                        <span :style="{'background-image': 'url(' + 'storage/images/icons/new.png' + ')'}"></span>
                    </div>
                    <div class="item__name" @click.prevent="modalProduct(product)" >{{ product.title }}</div>
                    <div class="item__raiting">
            <span class="item__raiting-stars" :style="{'background-image': 'url(' + 'storage/images/icons/rating-bg.png' + ')'}">
              <span class="item__raiting-stars-bg" :style="{ width: product.raiting * 20 + '%' }"></span>
            </span>
                    </div>
                    <div class="item__price">{{ product.price }} грн.</div>
                    <div class="item__btn btn" @click.prevent="addToCart(product)">В корзину</div>
                </swiper-slide>
                <div class="swiper-button-prev" slot="button-prev">
                    <i class="fas fa-arrow-left"></i>
                </div>
                <div class="swiper-button-next" slot="button-next">
                    <i class="fas fa-arrow-right"></i>
                </div>
            </swiper>
        </div>
    </div>
</template>

<script>
import { Swiper, SwiperSlide } from "vue-awesome-swiper";
import { Navigation } from "swiper";
import { mapActions, mapGetters } from 'vuex'

export default {
    name: "v-new-arrivals",
    components: {
        Swiper,
        SwiperSlide,
    },
    data() {
        return {
            swiperOption: {
                slidesPerView: 5,
                spaceBetween: 50,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                breakpoints: {
                    1280: {
                        slidesPerView: 5,
                        spaceBetween: 40,
                    },
                    1024: {
                        slidesPerView: 4,
                        spaceBetween: 40,
                    },
                    768: {
                        slidesPerView: 3,
                        spaceBetween: 30,
                    },
                    640: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    320: {
                        slidesPerView: 1,
                        spaceBetween: 10,
                    },
                },
            },
        };
    },
    mounted() {
        this.GET_NEW_ARRIVALS_FROM_API();
    },
    methods: {
        ...mapActions(['GET_NEW_ARRIVALS_FROM_API', 'ADD_TO_CART', 'ACTIVE_MODAL_PRODUCT']),
        addToCart(product){
            this.ADD_TO_CART(product);
        },
        modalProduct(item){
            this.ACTIVE_MODAL_PRODUCT(item);
        },

    },
    computed: {
        ...mapGetters(['NEW_ARRIVALS']),
    },
};
</script>

<style lang="scss">
@import "resources/sass/variables";
.v-new-arrivals {
    padding: 50px 0 0 0;
    &__title {
        font-family: $fontBase;
        font-size: calc(24px + 76 * ((100vw - 320px) / (1280 - 320)));
        font-weight: bold;
        color: darken($colorMain, 40);
        text-transform: uppercase;
        text-align: center;
        position: relative;

        &:before {
            content: "new arrivals";
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

    .item {
        border: 1px solid $colorBorder;
        padding: 0 $padding $padding;
        overflow: hidden;
        box-sizing: border-box;

        &__img {
            margin: 0 (-$margin);
            position: relative;
            img {
                width: 100%;
                display: block;
            }
            span {
                width: 100px;
                height: 50px;
                position: absolute;
                top: 5px;
                left: 5px;
            }
        }

        &__name {
            margin: $margin 0;
            height: 50px;
            line-height: 25px;
            text-align: center;
            font-family: $fontBase;
            font-size: $fontSizeBase + 4;
            color: $colorBase;
            overflow: hidden;
            cursor: pointer;

            &:hover {
                color: $colorMain;
            }
        }

        &__price {
            font-size: $fontSizeBase + 8;
            color: $colorBase;
            font-family: $fontBase;
            font-weight: bold;
            margin: 0 0 $margin 0;
            text-align: center;
        }
        &__raiting {
            width: 109px;
            display: flex;
            margin: 10px auto;

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
    }
    .swiper {
        padding: 50px 0 25px 0;
    }
    .swiper-button-next,
    .swiper-button-prev {
        color: $colorBase;
        width: 52px;
        font-size: 40px;
        position: relative;
        bottom: -15px;
        padding: 5px;
        cursor: pointer;

        &:hover {
            color: $colorMain;
        }
    }
    .swiper-button-next {
        left: 50%;
        bottom: -10px;

        &:after{
            display: none;
        }
    }
    .swiper-button-prev {
        bottom: -32px;
        left: calc(50% - 50px);

        &:after{
            display: none;
        }
    }
    .swiper-button-disabled {
        color: rgb(121, 113, 113);

        &:hover {
            color: rgb(121, 113, 113);
        }
    }
}
</style>

