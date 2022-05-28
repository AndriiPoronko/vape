<template>
    <div class="v-footer">
        <div class="mainer footer">
            <ul class="v-footer__catalog">
                <router-link :to="{ name: 'catalog' }">
                    <li class="v-footer__catalog-item">Каталог</li>
                </router-link>
                <li class="v-footer__catalog-item" v-for="(item, i) in category" :key="i">{{ item.name }}</li>
            </ul>
            <ul class="v-footer__catalog">
                <li class="v-footer__catalog-item">Clients</li>
                <li class="v-footer__catalog-item">О нас</li>
                <li class="v-footer__catalog-item">Оплата и доставка</li>
                <li class="v-footer__catalog-item">Контакты</li>
            </ul>
            <form class="v-footer__form" action="POST">
                <div class="v-footer__form-title">Написать Нам</div>
                <label for="nameUser">Ваше Имя</label>
                <input
                    type="text"
                    maxlength="50"
                    minlength="3"
                    name="nameUser"
                    required
                    id="nameUser"
                    placeholder="Имя"
                />
                <label for="msgUser">Информация, которую вы хотите нам</label>
                <textarea
                    name="msg"
                    maxlength="500"
                    minlength="10"
                    id="msgUser"
                    required
                    rows="5"
                    placeholder="Информация"
                ></textarea>
                <button class="btn" type="submit">Отправить</button>
            </form>
        </div>
        <div class="v-footer-copy">
            При использовании материалов с сайта обязательно указание прямой ссылки на
            источник.
        </div>
        <div class="v-footer-copy">Все права защищены. VapeSteam компани 2022</div>
    </div>
</template>

<script>
// import { mapActions, mapGetters } from "vuex";

export default {
    name: "vFooter",
    components: {},
    data() {
        return {
            category: [
                { "name": "АККУМУЛЯТОРЫ", "subname": [], "value": 1 },
                { "name": "ЖИДКОСТИ", "subname": [], "value": 2 },
                { "name": "ЭЛЕКТРОННЫЕ СИГАРЕТЫ", "subname": [], "value": 3 },
                { "name": "АКСЕСУАРЫ", "subname": [], "value": 4 },
                { "name": "ВСЕ", "subname": [], "value": 5 }
            ],
            footerHeight: null,
        };
    },
    mounted() {
        // this.GET_CATEGORY_FROM_API();

    },
    methods: {
        // ...mapActions(["GET_CATEGORY_FROM_API"]),
    },
    computed: {
        // ...mapGetters(["CATEGORY"]),
    },
};
</script>

<style lang="scss">
@import "resources/sass/variables";
.v-footer {
    padding: 50px 0;
    display: flex;
    flex-direction: column;
    background-image: url( '/images/footer.jpg' );
    background-position: center;
    background-size: cover;

    .footer {
        width: 100%;
        display: flex;
        justify-content: space-between;
    }

    &__catalog {
        display: flex;
        flex-direction: column;
        font-size: $fontSizeBase + 4;
        font-weight: 500;
        font-family: $fontBase;
        color: #ccc;
        text-transform: uppercase;
        align-items: center;

        &-item {
            margin: $margin - 10 0;
            cursor: pointer;
            position: relative;
            padding-bottom: 5px;
            color: #ccc;

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

            &:first-child {
                font-weight: 700;
                font-size: $fontSizeBase + 8;
            }
        }
    }
    &__form {
        padding: 0 $padding;
        display: flex;
        flex-direction: column;

        &-title {
            text-align: center;
            font-size: $fontSizeBase + 8;
            font-weight: 700;
            font-family: $fontBase;
            color: #ccc;
            text-transform: uppercase;
            margin: $margin - 10 0;
        }

        & > label {
            font-size: $fontSizeBase;
            margin: $margin 0;
            color: #ccc;
            cursor: pointer;
        }

        & > input,
        & > textarea {
            width: 100%;
            background-color: #fff;
            padding: $padding - 10 $padding;
            border-radius: $radius;
            border: 1px solid transparent;

            &:focus {
                border: 1px solid $colorMain;
            }
        }
        .btn {
            color: #ccc;
            margin: $margin;
        }
    }
    &-copy {
        margin: 0 auto;
        font-size: $fontSizeBase;
        font-family: $fontBase;
        font-weight: 300;
        color: #ccc;
        padding: 5px;
    }
}
</style>

