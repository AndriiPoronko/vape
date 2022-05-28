<template>
        <swiper
            class="swiper"
            :options="swiperOption"
            :height="height"
            :style="{'height': height + 'px'}"
        >

                <swiper-slide>
                    <img class="swiper-slide__image" src="/images/slide_1.jpg" alt="">
                    <div class="info" v-html="'<p>' + title + '</p>'"></div>
                </swiper-slide>
                <swiper-slide>
                    <img class="swiper-slide__image" src="/images/slide_2.jpg" alt="">
                    <div class="info" v-html="'<p>' + title + '</p>'"></div>
                </swiper-slide>
                <swiper-slide>
                    <img class="swiper-slide__image" src="/images/slide_3.jpg" alt="">
                    <div class="info" v-html="'<p>' + title + '</p>'"></div>
                </swiper-slide>
                <div class="swiper-pagination" slot="pagination"></div>

        </swiper>

</template>

<script>
import { Swiper, SwiperSlide } from "vue-awesome-swiper";
import 'swiper/css/swiper.css'

export default {
    name: "vCarouselMain",
    components: {
        Swiper,
        SwiperSlide
    },
    data() {
        return {
            height: 100,
            swiperOption: {
                pagination: {
                    el: '.swiper-pagination',
                    dynamicBullets: true
                }
            },
            title: 'Очень много интересного текста!'
        }
    },
    methods:{
        documentHeight() {
            this.height = document.documentElement.clientHeight;
        },
        updateHeight() {
            const imgBlock = document.querySelector(".swiper-wrapper");
            if (imgBlock) {
                this.height = imgBlock.clientWidth / 1.5;
                if (imgBlock.clientHeight < this.height) {
                    this.height = document.documentElement.clientHeight;
                }
            }
        },
    },
    created() {
        this.documentHeight();
        window.addEventListener("resize", this.updateHeight);
    },
    destroyed() {
        window.removeEventListener("resize", this.updateHeight);
    },

}
</script>

<style lang="scss">
@import "resources/sass/variables";

    .swiper-slide__image{
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .info {
        position: absolute;
        left: 50px;
        bottom: 25%;
        font-family: $fontSecondary;
        font-size: calc(20px + 30 * ((100vw - 320px) / (1280 - 320)));
        text-shadow: $textshadow;
        color: #fff;
    }
</style>
