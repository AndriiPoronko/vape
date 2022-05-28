<template>
    <div class="v-register" :style="{'min-height': height + 'px'}">

        <form class="v-register__block" @submit="checkForm" :style="{'background-image': 'url(' + 'storage/images/bg/register.jpg' + ')'}">

            <div class="v-register__block-title">Регистрация</div>
            <p class="v-register__block-error" v-if="errors">{{ errors }}</p>
            <label for="nameUserCall">Ваше Имя</label>
            <input
                type="text"
                maxlength="50"
                minlength="3"
                required
                v-model="first_name"
                id="nameUserCall"
                placeholder="Имя"
                autocomplete="off"
            />
            <label for="lastNameUserCall">Ваша Фамилия</label>
            <input
                type="text"
                maxlength="50"
                minlength="3"
                v-model="last_name"
                required
                id="lastNameUserCall"
                placeholder="Фамилия"
                autocomplete="off"
            />
            <label for="phoneUserCall">Ваш номер телефона</label>
            <input
                type="text"
                maxlength="20"
                minlength="7"
                v-model="phone_number"
                required
                id="phoneUserCall"
                placeholder="Телефон"
                autocomplete="off"
            />
            <label for="userAge">Ваш возраст</label>
            <input
                type="text"
                maxlength="3"
                minlength="2"
                v-model="age"
                required
                id="userAge"
                placeholder="Возраст"
                autocomplete="off"
            />
            <label for="userEmail">Ваш email</label>
            <input
                type="email"
                maxlength="100"
                v-model="email"
                required
                id="userEmail"
                placeholder="Email"
                autocomplete="on"
            />
            <label for="userPassword">Пароль</label>
            <input
                type="password"
                maxlength="16"
                minlength="6"
                v-model="password"
                required
                id="userPassword"
                placeholder="Пароль"
                autocomplete="off"
            />
            <label for="userPasswordConfirm">Подтверждение пароля</label>
            <input
                type="password"
                maxlength="16"
                minlength="6"
                v-model="password_confirmation"
                required
                id="userPasswordConfirm"
                placeholder="Подтвердите пароль"
                autocomplete="off"
            />
            <button class="btn v-register__block-btn" type="submit">Зарегистрироваться</button>
        </form>

    </div>
</template>

<script>
import axios from 'axios'
export default {
    name: "v-register",
    data() {
        return {
            height: 100,
            errors: null,
            first_name: null,
            last_name: null,
            age: null,
            email: null,
            phone_number: null,
            password: null,
            password_confirmation: null,
        }
    },
    methods: {
        getHeightForPage() {
            this.height = (document.querySelector('.App').clientHeight) - (document.querySelector('.v-footer').clientHeight);
        },
        checkForm: function (e) {

            if (this.first_name && this.last_name && this.age && this.email && this.phone_number && this.password && this.password === this.password_confirmation) {
                this.storeUser();
            }

            this.errors = null;

            if (!this.first_name || !this.last_name || !this.age || !this.email || !this.phone_number || !this.password || !this.password_confirmation) {
                this.errors = ('Заполните все поля пожалуйста.');
                e.preventDefault();
                return false;
            }
            if (this.password !== this.password_confirmation){
                this.errors = 'Пароли должны совпадать.';
            }

            e.preventDefault();
        },
        storeUser(){
            axios.post('/api/user', {
                first_name: this.first_name,
                    last_name: this.last_name,
                    age: this.age,
                    email: this.email,
                    phone_number: this.phone_number,
                    password: this.password,
                    password_confirmation: this.password_confirmation,
            }).then(result => {
                localStorage.setItem('access_token', result.data.access_token)
                this.$store.dispatch('ADD_TOKEN', result.data.access_token)
                this.$router.push({name: 'personal'});
            }).catch(e => {
                this.errors = e.response.data.message;
            })
        }
    },
    mounted() {
        this.getHeightForPage();
    }
}
</script>

<style lang="scss">
@import "resources/sass/variables";

.v-register {
    padding: 100px 0;
    background: rgb(9, 9, 9);

    &__block {
        max-width: 750px;
        margin: 0 auto;
        border: 1px solid white;
        padding: $padding * 2 $padding;
        display: flex;
        flex-direction: column;
        background-repeat: no-repeat;

        &-title {
            text-transform: uppercase;
            font-size: $fontSizeBase + 6;
            color: $colorBase;
            font-family: $fontBase;
        }

        &-error{
            color: $colorRed;
            font-size: $fontSizeBase;
            margin: $margin 0;
        }

        & > label {
            font-size: $fontSizeBase;
            margin: $margin 0;
            color: #ccc;
            cursor: pointer;
        }
        & > input {
            font-family: $fontBase;
            font-size: $fontSizeBase + 4;
            width: 50%;
            background-color: #ccc;
            padding: $padding - 5 $padding;
            border-radius: $radius;
            border: 1px solid transparent;

            &:focus {
                border: 1px solid $colorMain;
            }
        }

        &-btn{
            width: 50%;
            margin: $margin 0;
            color: $colorBase;
        }

    }
}
</style>
