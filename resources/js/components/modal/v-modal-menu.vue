<template>
    <div class="v-modal-menu">
        <transition name="modalbg">
            <div class="v-modal-menu-bg" @click="isVisible" v-if="visible"></div>
        </transition>
        <transition name="modal">
            <div class="v-modal-menu-bg__block" v-if="visible">
                <ul class="v-modal-menu__catalog">

                        <li @click.prevent="toCatalog" class="v-modal-menu__catalog-item">КАТАЛОГ</li>

                    <li
                        class="v-modal-menu__catalog-item"
                        v-for="(item, i) in category"
                        :key="i"
                    >
                        {{ item.name }}
                    </li>
                </ul>
                <ul class="v-modal-menu__catalog">
                    <li class="v-modal-menu__catalog-item">Популярные</li>
                    <li class="v-modal-menu__catalog-item">Предложение недели</li>
                    <li class="v-modal-menu__catalog-item">Новые поступления</li>
                    <li class="v-modal-menu__catalog-item">Контакты</li>
                    <li class="v-modal-menu__catalog-item">О нас</li>
                    <li class="v-modal-menu__catalog-item">Оплата и доставка</li>
                </ul>
                <ul class="v-modal-menu__social">
                    <li
                        class="v-modal-menu__social-item"
                        v-for="item of contacts.socialData"
                        :key="item.url"
                    >
                        <a
                            :href="item.url"
                            target="blank"
                            class="v-modal-menu__social-item-icon"
                            v-html="item.icon"
                        ></a>
                    </li>
                </ul>
                <div class="btn" @click="openModalCall">Заказать звонок</div>
            </div>
        </transition>
    </div>
</template>

<script>
import {mapActions, mapGetters} from "vuex";

export default {
    name: "v-modal-menu",
    components: {},
    props: {
        visible: {
            type: Boolean,
            default() {
                return false;
            },
        },
    },
    data() {
        return {
            contacts: {
                "workPhone": "+38 093 678 73 89",
                "socialData": [
                    {
                        "url": "https://www.facebook.com/",
                        "icon": "<i class=\"fab fa-facebook-f\"></i>"
                    },
                    {
                        "url": "https://www.instagram.com/",
                        "icon": "<i class=\"fab fa-instagram\"></i>"
                    },
                    {
                        "url": "https://web.telegram.org/",
                        "icon": "<i class=\"fab fa-telegram-plane\"></i>"
                    }
                ],
                "email": "steamvapeinua@gmail.com"
            },
            category: [
                {"name": "АККУМУЛЯТОРЫ", "subname": [], "value": 1},
                {"name": "ЖИДКОСТИ", "subname": [], "value": 2},
                {"name": "ЭЛЕКТРОННЫЕ СИГАРЕТЫ", "subname": [], "value": 3},
                {"name": "АКСЕСУАРЫ", "subname": [], "value": 4},
                {"name": "ВСЕ", "subname": [], "value": 5}
            ]
        };
    },
    mounted() {
        // this.GET_CATEGORY_FROM_API();
        // this.GET_CONTACTS_FROM_API();
    },
    methods: {
        ...mapActions([
            // "GET_CATEGORY_FROM_API",
            // "GET_CONTACTS_FROM_API",
            "ACTIVE_MODAL_CALL",
        ]),
        isVisible() {
            this.$emit("visible");
        },
        toCatalog() {
            this.isVisible();
            this.$router.push({name: 'catalog'});
        },
        openModalCall() {
            this.ACTIVE_MODAL_CALL();
            this.isVisible();
        },
    },
    computed: {
        // ...mapGetters(["CATEGORY", "CONTACTS"]),
    },
};
</script>


<style lang="scss">
@import "resources/sass/variables";

.v-modal-menu {
    &-bg {
        width: calc(100% - 500px);
        height: 100%;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 10;
        background-color: rgba(0, 0, 0, 0.7);
        display: flex;
        justify-content: flex-end;
        transition-duration: 0.5s;
    }

    .v-modal-menu-bg__block {
        padding: 100px 15px;
        position: fixed;
        width: 500px;
        top: 0;
        right: 0;
        z-index: 11;
        min-height: 100vh;
        background-color: #000;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    &__catalog {
        display: flex;
        flex-direction: column;
        color: #ccc;
        margin: $margin 25px;
        align-items: flex-start;

        &-item {
            color: #ccc;
            line-height: 40px;
            font-family: $fontBase;
            font-size: calc(12px + 8 * ((100vw - 320px) / (1280 - 320)));
            position: relative;
            cursor: pointer;

            &:before {
                content: "";
                width: 0;
                height: 2px;
                background-color: #ccc;
                position: absolute;
                bottom: 0;
                left: 0;
                transition-duration: 0.5s;
            }

            &:hover:before {
                width: 100%;
            }
        }
    }

    &__social {
        margin: 50px 0 0 0;
        display: flex;
        justify-content: center;

        &-item {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            border: 2px solid $colorBorder;
            background-color: $colorGray;
            transition-duration: 0.3s;
            margin-right: 10px;

            &:hover {
                @include gradient;
                border: none;
            }

            &-icon {
                font-size: $fontSizeBase + 10;
                width: 100%;
                height: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                color: $colorBase;
            }
        }
    }
}

.modal-enter-active {
    transition: all 1s;
}

.modal-leave-active {
    transition: all 1s;
}

.modal-enter {
    transform: translateX(100%);
    opacity: 0;
}

.modal-leave-to {
    transform: translateX(100%);
    opacity: 0;
}

.modalbg-enter-active,
.modalbg-leave-active {
    transition: all 1s;
}

.modalbg-enter,
.modalbg-leave-to {
    transform: translateX(-100%);
    opacity: 0;
}
</style>
