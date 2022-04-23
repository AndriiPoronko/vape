<template>
    <div>
        <v-header/>
        <keep-alive>
            <router-view></router-view>
        </keep-alive>
        <v-footer/>
    </div>
</template>


<script>
import vHeader from './v-header'
import vFooter from './v-footer'
export default {
    name: "App",
    components: {
        vHeader,
        vFooter
    }
}
</script>

<style>

</style>
