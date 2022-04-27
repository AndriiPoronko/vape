<template>
    <div class="v-line-callback">
        <div class="v-line-callback__text">Хотите мы Вам перезвоним?</div>
        <div
            class="v-line-callback__btn btn"
            data-aos="zoom-out-down"
        >
            Жду звонка
        </div>
    </div>
</template>

<script>

export default {
    name: "v-line-callback",
    components: {},
    data() {
        return {};
    },
    methods: {
    },
};
</script>

<style lang="scss">
@import "resources/sass/variables";
.v-line-callback {
    padding: 50px $padding;
    background-color: #000;
    color: $colorBase;
    display: flex;
    justify-content: center;
    align-items: center;
    &__text {
        font-family: $fontBase;
        font-size: $fontSizeBase + 10;
    }

    &__btn {
        width: 200px;
        margin: 0 0 0 $margin;
    }
}
</style>

