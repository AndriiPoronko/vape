<template>
    <div>
        <v-header  @toggleMenu="toggleMenu"/>
        <keep-alive>
            <router-view></router-view>
        </keep-alive>
        <v-footer/>
        <v-modal-menu
            :visible="isModalMenuVisible"
            @visible="isModalMenuVisible = !isModalMenuVisible"
        />
        <v-modal-call />
        <v-modal-age />
        <v-modal-about />
    </div>
</template>


<script>
import vHeader from './v-header'
import vFooter from './v-footer'
import vModalMenu from './modal/v-modal-menu'
import vModalCall from './modal/v-modal-call'
import vModalAge from './modal/v-modal-age'
import vModalAbout from './modal/v-modal-about'
export default {
    name: "App",
    components: {
        vHeader,
        vFooter,
        vModalMenu,
        vModalCall,
        vModalAge,
        vModalAbout
    },
    data() {
        return {
            isModalMenuVisible: false,
        };
    },
    methods: {
        toggleMenu() {
            this.isModalMenuVisible = !this.isModalMenuVisible;
        }
    },
    computed: {
    },
}
</script>

<style>

</style>
