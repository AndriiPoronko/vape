<template>
    <div class="v-tranding">
        <div class="v-tranding__title" data-aos="slide-left">Tranding</div>
        <div class="mainer block-container">
            <div class="v-tranding__item" data-aos="flip-up" v-for="(item, i) in trands" :key="i">
                <div class="v-tranding__item-img">
                    <img :src="('/storage/images/' + item.image)" alt="item.title" />
                </div>
                <div class="v-tranding__item-name">{{ item.name }}</div>
                <div class="v-tranding__item-raiting">
          <span class="v-tranding__item-raiting-stars">
            <span
                class="v-tranding__item-raiting-stars-bg"
                :style="{ width: item.raiting * 20 + '%' }"
            ></span>
          </span>
                </div>
                <div class="v-tranding__item-price">{{ item.price }} грн.</div>
                <button class="btn v-tranding__item-buy">В корзину</button>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: "v-tranding",
    components: {},
    data() {
        return {
            trands: [
                {
                    "name": "OVNS Saber-S Kit ORIGINAL",
                    "image": "trand/8.png",
                    "price": 270,
                    "raiting": 4,
                    "id": 1000,
                    "quantity": 1
                },
                {
                    "name": "VOOPOO Drag Nano Pod Kit ORiGiNAL",
                    "image": "trand/10.png",
                    "price": 210,
                    "raiting": 4,
                    "id": 1002,
                    "quantity": 1
                },
                {
                    "name": "Hotcig Kubi Pod kit ORIGINAL",
                    "image": "trand/11.png",
                    "price": 330,
                    "raiting": 5,
                    "id": 1003,
                    "quantity": 1
                },
                {
                    "name": "Vaporesso Renova Zero Pod Kit ORIGINAL",
                    "image": "trand/12.png",
                    "price": 390,
                    "raiting": 5,
                    "id": 1004,
                    "quantity": 1
                },
                {
                    "name": "Vaporesso Renova Zero Pod Kit ORIGINAL мятный",
                    "image": "trand/9.png",
                    "price": 1200,
                    "raiting": 3,
                    "id": 1005,
                    "quantity": 1
                }
            ],
        };
    },
    mounted() {
    },
    methods: {
    },
    computed: {
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
            content: "tranding";
            position: absolute;
            font-size: calc(24px + 36 * ((100vw - 320px) / (1280 - 320)));
            color: $colorMain;
            text-transform: uppercase;
            letter-spacing: 5px;
            transform: translateX(-50%);
            left: 50%;
            bottom: 0%;
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
                background-image: url('/storage/images/icons/rating-bg.png');
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
            transform: scale(1.03);
            .btn {
                opacity: 1;
            }
        }
    }
}
</style>

