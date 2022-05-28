<template>
    <div class="v-login" :style="{'min-height': height + 'px'}">

        <form class="v-login__block" @submit="checkForm" :style="{'background-image': 'url(' + 'storage/images/bg/register.jpg' + ')'}">

            <div class="v-login__block-title">Авторизация</div>
            <p class="v-login__block-error" v-if="error">Введеный логин или пароль не верны</p>
            <label for="userEmail">Email</label>
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
            <p class="v-login__block-reg">
                Нет аккаунта?
                <router-link :to="{name: 'register'}">
                    <span>ЗАРЕГИСТРИРОВАТЬСЯ</span>
                </router-link>
            </p>
            <button class="btn v-login__block-btn" type="submit">Войти</button>
        </form>

    </div>
</template>

<script>
export default {
    name: "v-login",
    data(){
        return{
            height: 500,
            email: null,
            password: null,
            error: false
        }
    },
    methods:{
        getHeightForPage() {
            this.height = (document.querySelector('.App').clientHeight) - (document.querySelector('.v-footer').clientHeight);
        },
        checkForm(e){
            if(this.email && this.password){
                this.login();
            }

            this.error = (!this.email || !this.password) ? true : '';

            e.preventDefault()
        },
        login(){
            axios.post('/api/auth/login', {
                email: this.email,
                password: this.password
            }).then(res => {
                localStorage.setItem('access_token', res.data.access_token);
                this.$store.dispatch('ADD_TOKEN', res.data.access_token);
                this.$router.push({name: 'personal'})

            })
        },
    },
    mounted() {
        this.getHeightForPage();
    }

}
</script>

<style lang="scss">
@import "resources/sass/variables";

.v-login{
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

        &-reg{
            color: $colorBase;
            margin-top: $margin;
            font-family: $fontBase;

            span{
                color: orange;
            }
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
