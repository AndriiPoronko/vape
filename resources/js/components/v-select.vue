<template>
    <div class="v-select">
        <p class="title" @click="areOptionsVisible = !areOptionsVisible" v-text="selected">Select</p>
        <div class="options" v-if="areOptionsVisible">
      <span
          v-for="option in options"
          :key="option.value"
          @click="selectOption(option)"
      >{{option.title}}</span>
        </div>
    </div>
</template>

<script>
export default {
    name: "v-select",
    props: {
        options: {
            type: Array,
            default() {
                return [];
            },
        },
        selected: {
            type: String,
            default() {
                return "";
            },
        },
    },
    data() {
        return {
            areOptionsVisible: false,
        };
    },
    methods: {
        selectOption(option) {
            this.$emit("select", option);
            this.areOptionsVisible = false;
        },
        hideSelect() {
            this.areOptionsVisible = false;
        },
    },
    mounted() {
        document.addEventListener("click", this.hideSelect.bind(this), true);
    },
    beforeDestroy() {
        document.addEventListener("click", this.hideSelect);
    },
};
</script>

<style lang="scss">
@import "resources/sass/variables";
.v-select {
    position: relative;
    min-width: 300px;
    cursor: pointer;
}
.title {
    border: 1px solid #fff;
    padding: 5px $padding;
    font-size: $fontSizeBase + 4;
    font-family: $fontBase;
    text-align: center;
    line-height: 30px;
    background-color: #000;
    color: $colorBase;
    cursor: pointer;
}
.options {
    text-align: center;
    border: 1px solid #fff;
    position: absolute;
    left: 0;
    max-height: 250px;
    top: 0;
    width: auto;
    display: flex;
    flex-direction: column;
    background-color: #000;
    color: #fff;
    z-index: 2;
    overflow: auto;
    overflow-x: hidden;

    span {
        min-width: 300px;
        max-width: 650px;
        padding: 5px $padding;
        font-size: $fontSizeBase + 4;
        font-family: $fontBase;
        text-align: center;
        line-height: 30px;
        background-color: #000;
        color: $colorBase;
        white-space: nowrap;

        &:hover {
            background-color: lighten(#000, 20);
        }
    }
}
</style>
