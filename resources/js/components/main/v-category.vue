<template>
    <div class="v-category">
        <div class="v-category__item" data-aos="fade-right">
            <p class="v-category__item-title">Испарители</p>
            <div class="v-category__item-icon">
                <img src="/images/icon1.jpg" alt />
            </div>
        </div>
        <div class="v-category__item" data-aos="fade-right">
            <p class="v-category__item-title">Под системы</p>
            <div class="v-category__item-icon">
                <img src="/images/icon2.jpg" alt />
            </div>
        </div>
        <router-link :to="{ name: 'catalog' }">
            <div class="v-category__logo" data-aos="fade-up" data-aos-delay="200">
                <img src="/images/icon-catalog.jpg" alt />
            </div>
        </router-link>
        <div class="v-category__item" data-aos="fade-left">
            <p class="v-category__item-title">Зарядки</p>
            <div class="v-category__item-icon">
                <img src="/images/icon3.jpg" alt />
            </div>
        </div>
        <div class="v-category__item" data-aos="fade-left">
            <p class="v-category__item-title">Жидкости</p>
            <div class="v-category__item-icon">
                <img src="/images/icon4.jpg" alt />
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "v-category",
    data() {
        return {
            showItem: false,
        };
    },
    methods:{}

};
</script>

<style lang="scss">
@import "resources/sass/variables";
.v-category {
    max-width: 800px;
    margin: 0 auto;
    display: flex;
    position: relative;
    top: -100px;

    &__item {
        flex-grow: 1;
        max-width: 150px;
        display: flex;
        flex-direction: column-reverse;
        align-items: center;
        justify-content: center;
        font-family: $fontBase;
        font-weight: bold;
        font-size: $fontSizeBase + 5;
        color: #fff;
        z-index: 2;

        &-icon {
            border-radius: 50%;
            border: 3px solid $colorBorder;
            overflow: hidden;
            padding: 2px;
            background-color: #fff;
            cursor: pointer;
            box-shadow: 0 0 5px 5px rgba(0, 0, 0, 0.5);
            transition-duration: 0.5s;

            p {
                text-shadow: $textshadow;
            }

            &:hover {
                border-color: #009fff;
                transform: scale(1.1);
            }
        }
    }
    &__logo {
        max-width: 200px;
        max-height: 200px;
        position: relative;
        background-color: #fff;
        overflow: hidden;
        z-index: 2;
        padding: $padding;
        border-radius: 50%;
        border: 5px solid $colorBorder;
        cursor: pointer;
        transition-duration: 0.5s;
        box-shadow: 0 0 10px 10px rgba(0, 0, 0, 0.5);

        &:hover {
            border-color: #009fff;
            transform: scale(1.1);
        }

        img {
            width: 100%;
        }
    }
}
</style>

