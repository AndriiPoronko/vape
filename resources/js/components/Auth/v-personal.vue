<template>
    <div class="v-personal" :style="{'min-height': height + 'px'}">Profile in progress...</div>
</template>

<script>
export default {
    name: "v-personal",
    data(){
        return{
            id: 13,
            height: 100
        }
    },
    methods: {
        getHeightForPage() {
            this.height = (document.querySelector('.App').clientHeight) - (document.querySelector('.v-footer').clientHeight);
        },
    },
    mounted(){
        this.getHeightForPage();
    }
}
</script>

<style lang="scss">
    .v-personal{
        color: white;
        padding: 100px;
        font-size: 30px;
    }
</style>
