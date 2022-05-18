<template>
    <div class="header">
        <div class="mainer">
            <div class="header-block">
                <div class="contact">
                    <a :href="'tel:' + contacts.workPhone" class="contact__phone">
                        <i class="fas fa-mobile-alt"></i>
                        {{ contacts.workPhone }}
                    </a>

                    <ul class="contact__social">
                        <li class="contact__social-item" v-for="item of contacts.socialData" :key="item.url">
                            <a
                                :href="item.url"
                                target="blank"
                                class="contact__social-item-icon"
                                v-html="item.icon"
                            ></a>
                        </li>
                    </ul>
                </div>
                <router-link :to="{ name: 'main' }">
                    <div class="logo">
                        <span class="logo--bold">Steam</span>Vape
                    </div>
                </router-link>
                <ul class="menu">
                    <li class="menu__item menu__item--search">
                        <transition name="fade">
                            <input type="text" placeholder="Поиск" v-show="isSearch"/>
                        </transition>
                        <i class="fas fa-search" @click="isSearch = !isSearch"></i>
                    </li>
                    <li class="menu__item">
                        <i class="fa-heart" :class="favorite_product.length ? 'fas' : 'far'"></i>
                    </li>
                    <router-link :to="{ name: 'cart' }">
                        <li class="menu__item menu__item--basket">
                            <i class="fas fa-shopping-basket"></i>
                            <span class="basket-count">{{ this.CART.length }}</span>
                        </li>
                    </router-link>
                    <li class="menu__item">
                        <a href="/admin"><i class="fas fa-user-circle"></i></a>
                    </li>
                    <li class="menu__item menu__item--toggle" @click="toggleMenu()">
                        <span class="menu__item-line"></span>
                        <span class="menu__item-line"></span>
                        <span class="menu__item-line"></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
import {mapActions, mapGetters} from "vuex";

export default {
    name: "vHeader",
    props: {},
    data() {
        return {
            search: "",
            isSearch: false,
            favorite_product: [],
            cart: [],
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
            }
        };
    },
    mounted() {
        // this.GET_CONTACTS_FROM_API();
    },
    created() {
    },
    methods: {
        // ...mapActions(["GET_CONTACTS_FROM_API"]),
        toggleMenu() {
            this.$emit("toggleMenu");
        },
    },
    computed: {
        ...mapGetters(["CART"]),
    },
};
</script>

<style lang="scss">
@import "resources/sass/variables";

.header {
    position: fixed;
    width: 100%;
    z-index: 99;
}

.header-block {
    display: flex;
    justify-content: space-between;
    align-items: center;

    .contact {
        display: flex;
        align-items: center;
        font-size: $fontSizeBase + 10;
        flex-grow: 1;
        text-shadow: $textshadow;

        &__phone {
            color: $colorBase;
            font-family: $fontSecondary;
            margin: 0 $margin 0 0;
            transition-duration: 0.5s;
            cursor: pointer;

            & > i {
                @include gradient;
                border: 1px solid #fff;
                border-radius: 2px;
            }

            &:hover {
                @include gradient;
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;

                .fa-mobile-alt {
                    border: 1px solid #fff;
                    animation: rotate 2s ease infinite;
                }
            }
        }

        &__social {
            display: flex;
            align-items: center;

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

    .logo {
        font-size: calc(24px + 16 * ((100vw - 320px) / (1280 - 320)));
        text-transform: uppercase;
        font-family: $fontSecondary;
        color: $colorBase;
        opacity: 0.8;
        font-weight: 900;
        position: relative;
        line-height: calc(24px + 26 * ((100vw - 320px) / (1280 - 320)));
        margin: 0 $margin;
        text-shadow: $textshadow;

        &:before {
            content: "";
            position: absolute;
            width: 100%;
            height: 3px;
            background-color: $colorBase;
            bottom: 0;
            animation: line 10s ease-in-out infinite;
        }

        &--bold {
            font-size: calc(24px + 6 * ((100vw - 320px) / (1280 - 320)));
        }
    }

    .menu {
        display: flex;
        align-items: center;
        flex-grow: 1;

        &__item {
            cursor: pointer;
            margin: 0 0 0 $margin * 2;
            font-size: $fontSizeBase + 10;
            color: $colorBorder;
            align-items: center;

            &--search {
                flex-grow: 1;
                display: flex;
                justify-content: flex-end;
                position: relative;

                & > input {
                    position: absolute;
                    height: 25px;
                    border: none;
                    top: 0;
                    right: 30px;
                    border-radius: $radius;
                    padding: 0 10px;
                    font-size: $fontSizeBase - 4;
                    background-color: #fff;
                }
            }

            &--basket {
                position: relative;

                .basket-count {
                    position: absolute;
                    color: #fff;
                    font-size: 10px;
                    width: 15px;
                    height: 15px;
                    border-radius: 50%;
                    background-color: $colorMain;
                    top: 0;
                    right: 0;
                    text-align: center;
                    line-height: 15px;
                }
            }

            &--toggle {
                display: flex;
                flex-direction: column;
                align-items: flex-end;
                width: 28px;
            }

            &-line {
                width: 28px;
                height: 2px;
                background-color: $colorBase;
                transition-duration: 0.5s;

                &:not(:last-child) {
                    margin: 0 0 5px 0;
                }

                &:nth-child(2) {
                    width: 21px;
                }

                &:nth-child(3) {
                    width: 25px;
                }
            }

            &:hover {
                color: $colorBase;

                .menu__item-line {
                    &:first-child {
                        width: 24px;
                    }

                    &:nth-child(2) {
                        width: 28px;
                    }

                    &:nth-child(3) {
                        width: 18px;
                    }
                }
            }
        }
    }
}

.fade-enter {
    width: 0;
    opacity: 0;
}

.fade-enter-to {
    width: 100%;
    opacity: 1;
}

.fade-leave {
    width: 100%;
}

.fade-leave-to {
    width: 0;
    opacity: 0;
}

.fade-enter-active {
    transition-duration: 0.5s;
}

.fade-leave-active {
    transition-duration: 0.5s;
}
</style>

