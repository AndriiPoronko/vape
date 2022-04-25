<template>
<div>
   <v-carousel-main/>
    <v-category/>
    <v-tranding/>
    <v-deals/>
    <v-new-arrivals/>
    <v-line-callback/>
</div>
</template>

<script>
import vCarouselMain from './carousel/v-carousel-main'
import vCategory from './v-category'
import vTranding from './trands/v-tranding'
import vDeals from './deals/v-deals'
import vNewArrivals from './new/v-new-arrivals'
import vLineCallback from './v-line-callback'
export default {
    name: "MainComponent",
    components: {
        vCarouselMain,
        vCategory,
        vTranding,
        vDeals,
        vNewArrivals,
        vLineCallback,
    },

}
</script>

<style scoped>
</style>
