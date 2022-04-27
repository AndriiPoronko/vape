<template>
    <div class="v-time">
        <div class="v-time__num days">{{ days }}</div>
        <div class="v-time__num hours">{{ hours }}</div>
        <div class="v-time__num minutes">{{minutes}}</div>
        <div class="v-time__num seconds">{{seconds}}</div>
    </div>
</template>

<script>
export default {
    name: "v-time",
    props: {
        endtime: {
            type: String,
            default() {
                return "";
            },
        },
    },
    data() {
        return {
            days: "00",
            hours: "00",
            minutes: "00",
            seconds: "00",
            interval: "00",
        };
    },
    computed: {},
    methods: {
        startTimer() {
            this.interval = setInterval(this.countDown, 1000);
        },
        countDown() {
            let t = Date.parse(this.endtime) - Date.parse(new Date());
            if (t < 0) {
                clearInterval(this.interval);
                return;
            }
            this.seconds = Math.floor((t / 1000) % 60);

            this.minutes = Math.floor((t / 1000 / 60) % 60);
            this.hours = Math.floor((t / (1000 * 60 * 60)) % 24);
            this.days = Math.floor(t / (1000 * 60 * 60 * 24));
            if (this.days < 10) {
                this.days = "0" + this.days;
            }
            if (this.seconds < 10) {
                this.seconds = "0" + this.seconds;
            }
            if (this.minutes < 10) {
                this.minutes = "0" + this.minutes;
            }
            if (this.hours < 10) {
                this.hours = "0" + this.hours;
            }
        },
    },
    mounted() {
        this.startTimer();
    },
};
</script>

<style lang="scss">
@import "resources/sass/variables";
.v-time {
    color: #ccc;
    display: flex;
    font-size: calc(24px + 26 * ((100vw - 320px) / (1280 - 320)));
    font-family: $fontBase;
    font-weight: bold;

    &__num {
        margin: $margin;
        border: 1px solid #ccc;
        padding: $padding;
        border-radius: $radius;
    }
}
</style>
