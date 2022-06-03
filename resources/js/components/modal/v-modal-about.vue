<template>
    <transition name="modalProduct">
        <div class="v-modal-about" v-if="MODALPRODUCT">
            <div class="v-modal-about__block">
                <div class="v-modal-about__block-left">
                    <div class="v-modal-about__block-left-img">
                        <img :src="('/storage/' + ONEPRODUCT.image)" alt/>
                    </div>
                    <div class="v-modal-about__block-left-info">
                        <div class="v-modal-about__block-left-info-raiting">
              <span class="v-modal-about__block-left-info-raiting-stars" :style="{'background-image': 'url(' + 'storage/images/icons/rating-bg.png' + ')'}">
                <span
                    class="v-modal-about__block-left-info-raiting-stars-bg"
                    :style="{width: ONEPRODUCT.raiting * 20 + '%'}"
                ></span>
              </span>
                        </div>
                        <div class="v-modal-about__block-left-info-price">{{ ONEPRODUCT.price }} грн.</div>
                        <div
                            class="v-modal-about__block-left-info-avialable"
                            :class="{ 'no-avialable' : !ONEPRODUCT.is_avialable }"
                            v-text="ONEPRODUCT.is_avialable ? 'Есть в наличии' : 'Ожидается'"
                        ></div>
                        <button
                            class="v-modal-about__block-left-info-btn btn"
                            :disabled="!ONEPRODUCT.is_avialable"
                            @click="addToCart()"
                        >В корзину
                        </button>
                        <div class="v-modal-about__block-left-info-color"></div>
                    </div>
                </div>
                <div class="v-modal-about__block-right">
                    <div style="height: 48px" class="v-modal-about__block-right-name">{{ ONEPRODUCT.title }}</div>
                    <div class="v-modal-about__block-right-name">Характеристики</div>
                    <div class="v-modal-about__block-right-specif" v-if="ONEPRODUCT.colors.length">
                        <span>Цвет</span>
                        <div class="dotted"></div>
                        <span
                            class="specif"
                            v-for="(color, i) of ONEPRODUCT.colors"
                            :key="i"
                            :style="{'background-color': color.title}"
                        ></span>
                    </div>

                    <div class="v-modal-about__block-right-specif" v-if="ONEPRODUCT.size">
                        <span>Параметры:</span>
                        <div class="dotted"></div>
                        <ul class="equipment">
                            <li
                                class="equipment-item"
                            >{{ ONEPRODUCT.size }}
                            </li>
                        </ul>
                    </div>
                    <div class="v-modal-about__block-right-specif" v-if="ONEPRODUCT.battery">
                        <span>Аккумулятор:</span>
                        <div class="dotted"></div>
                        <ul class="equipment">
                            <li
                                class="equipment-item"
                            >{{ ONEPRODUCT.battery }}
                            </li>
                        </ul>
                    </div>
                    <div class="v-modal-about__block-right-specif" v-if="ONEPRODUCT.cartridge">
                        <span>Картридж:</span>
                        <div class="dotted"></div>
                        <ul class="equipment">
                            <li
                                class="equipment-item"
                            >{{ ONEPRODUCT.cartridge }}
                            </li>
                        </ul>
                    </div>
                    <div class="v-modal-about__block-right-specif" v-if="ONEPRODUCT.set">
                        <span>Комплект:</span>
                        <div class="dotted"></div>
                        <ul class="equipment">
                            <li
                                class="equipment-item"
                            >{{ ONEPRODUCT.set }}
                            </li>
                        </ul>
                    </div>

                    <div class="v-modal-about__block-right-name" v-if="ONEPRODUCT.description">Описание товара</div>

                    <div class="v-modal-about__block-right-block-description">{{ ONEPRODUCT.description }}</div>
                </div>
            </div>
            <div class="v-modal-about__block-close" @click="closeModal">
                <i class="fas fa-times"></i>
            </div>
        </div>
    </transition>
</template>

<script>
import {mapActions, mapGetters} from "vuex";

export default {
    name: "v-modal-about",
    data() {
        return {
            raiting: 3,
        };
    },
    methods: {
        ...mapActions(["ACTIVE_MODAL_PRODUCT", "ADD_TO_CART"]),
        closeModal() {
            this.ACTIVE_MODAL_PRODUCT();
        },
        addToCart() {
            this.ADD_TO_CART(this.ONEPRODUCT);
        },
    },
    computed: {
        ...mapGetters(["MODALPRODUCT", "ONEPRODUCT", "CATEGORIES"]),
    },
};
</script>

<style lang="scss">
@import "resources/sass/variables";

.v-modal-about {
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    position: fixed;
    top: 0;
    left: 0;
    padding: $padding;
    z-index: 99;

    &__block {
        max-width: 1000px;
        width: 100%;
        background-color: rgb(56, 53, 53);
        position: relative;
        display: flex;
        border-radius: $radius * 2;
        color: #fff;

        &-left {
            width: 30%;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: $padding;

            &-img {
                width: 100%;
                border-radius: $radius;
                overflow: hidden;

                & > img {
                    width: 100%;
                    display: block;
                }
            }

            &-info {
                width: 100%;

                &-raiting {
                    width: 109px;
                    display: flex;
                    margin: $margin 0;

                    &-stars {
                        background-position: left bottom;
                        width: 109px;
                        display: block;

                        &-bg {
                            background-image: inherit;
                            height: 16px;
                            display: block;
                            background-position: left top;
                        }
                    }
                }

                &-price {
                    font-size: calc(20px + 12 * ((100vw - 320px) / (1280 - 320)));
                    font-family: $fontBase;
                    font-weight: 700;
                    margin: 0 0 $margin * 2 0;
                    color: #ccc;
                }

                &-avialable {
                    font-size: $fontSizeBase;
                    color: $colorGreen;
                    margin: 0 0 $margin 0;

                    &.no-avialable {
                        color: $colorRed;
                    }
                }

                &-btn {
                    width: 100%;

                    &:disabled:hover {
                        background-color: #ccc;
                        cursor: auto;
                    }
                }
            }
        }

        &-right {
            width: 70%;
            padding: $padding;
            font-family: $fontBase;

            &-name {
                font-size: calc(16px + 8 * ((100vw - 320px) / (1280 - 320)));
                line-height: 24px;
                overflow: hidden;
                margin: $margin 0;
            }

            &-specif {
                width: 100%;
                display: flex;
                justify-content: space-between;
                margin: $margin 0;

                & > span {
                    font-size: $fontSizeBase;
                    line-height: 16px;
                    font-weight: 300;
                    margin: 0 2px 0;
                }

                & > .specif {
                    width: 16px;
                    height: 16px;
                    border: 1px solid $colorBorder;
                    border-radius: $radius;
                }

                & > .equipment {
                    display: flex;
                    flex-direction: column;
                    align-items: flex-end;

                    .equipment-item {
                        line-height: 16px;
                        text-align: right;
                    }
                }
            }

            &-block {
                &-caption {
                    font-size: 20px;
                    text-transform: uppercase;
                    font-weight: 700;
                    margin: $margin - 10 0;
                }

                &-description {
                    font-size: $fontSizeBase;
                }
            }
        }

        &-close {
            position: absolute;
            width: 30px;
            height: 30px;
            background-color: #fff;
            top: 0;
            right: 0;
            color: #ccc;
            font-size: $fontSizeBase + 6;
            text-align: center;
            line-height: 30px;
            border: 2px solid #ccc;
            cursor: pointer;
        }
    }
}

.dotted {
    flex-grow: 1;
    position: relative;

    &:before {
        content: "";
        position: absolute;
        width: 100%;
        border-bottom: 1px dotted $colorBorder;
        top: 14px;
    }
}

.modalProduct-enter-active,
.modalProduct-leave-active {
    transition: all 0.5s;
}

.modalProduct-enter,
.modalProduct-leave-to {
    transform: translateY(100px);
    opacity: 0;
}
</style>
