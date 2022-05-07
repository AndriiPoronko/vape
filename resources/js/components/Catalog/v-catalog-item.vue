<template>
    <div class="v-catalog-item">
        <div class="v-catalog-item-img">
            <img :src="('/images/' + product_data.image)" alt />
        </div>
        <div class="v-catalog-item-title" @click="modalProduct">{{product_data.title}}</div>
        <div class="v-catalog-item-raiting">
      <span class="v-catalog-item-raiting-stars">
        <span
            class="v-catalog-item-raiting-stars-bg"
            :style="{width: product_data.raiting * 20 + '%'}"
        ></span>
      </span>
        </div>
        <div class="v-catalog-item-price">{{product_data.price}} грн.</div>
        <div
            class="v-catalog-item-avialable"
            :class="{ 'no-avialable' : !product_data.is_avialable }"
            v-text="product_data.is_avialable ? 'Есть в наличии' : 'Ожидается'"
        ></div>
        <button
            class="v-catalog-item-btn btn"
            :disabled="!product_data.is_avialable"
            @click="addToCart"
            v-text="product_data.is_avialable ? 'В корзину' : ''"
        ></button>
    </div>
</template>

<script>
export default {
    name: "v-catalog-item",
    components: {},
    props: {
        product_data: {
            type: Object,
            default() {
                return {};
            },
        },
    },
    data() {
        return {};
    },
    methods: {
        addToCart() {
            this.$emit("addToCart", this.product_data);
        },
        modalProduct() {
            this.$emit("modalProduct", this.product_data);
        },
    },
    mounted() {
        this.$set(this.product_data, "quantity", 1);
    },
};
</script>

<style lang="scss">
@import "resources/sass/variables";
.v-catalog-item {
    padding: $padding;
    margin: 5px;
    width: 250px;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    color: #fff;
    border: 1px solid $colorBorder;
    flex-grow: 1;
    overflow: hidden;
    font-family: $fontBase;

    &-img {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;

        & > img {
            width: 100%;
            display: block;
        }
    }

    &-title {
        font-size: $fontSizeBase;
        font-weight: 700;
        width: 100%;
        text-align: center;
        margin: 5px 0;
        line-height: 20px;
        height: 40px;
        overflow: hidden;
        cursor: pointer;

        &:hover {
            color: $colorMain;
        }
    }

    &-price {
        font-size: $fontSizeBase + 8;
        margin: 5px 0;
    }

    &-avialable {
        font-size: $fontSizeBase - 2;
        color: $colorGreen;
        align-self: flex-end;
        margin: 0 0 $margin 0;

        &.no-avialable {
            color: $colorRed;
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
        text-align: center;
        transition-duration: 0.5s;
        width: 130px;
        align-self: flex-end;

        &:hover {
            width: 100%;
        }

        &:disabled {
            width: 130px;
            background-color: transparent;
            border: none;
            cursor: auto;
        }
    }
    &.empty {
        padding-top: 0;
        padding-bottom: 0;
        border: none;
    }
}
</style>
