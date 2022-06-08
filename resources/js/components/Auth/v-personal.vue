<template>
    <div class="v-personal" :style="{'min-height': height + 'px'}">Profile in progress...
    <ol v-if="person">
        <li>Name: {{person.first_name}}</li>
        <li>Surname: {{person.last_name}}</li>
        <li>Email: {{person.email}}</li>
        <li>Phone: {{person.phone_number}}</li>
        <li>Age: {{person.age}}</li>
    </ol>
    </div>
</template>

<script>
import API from '../../api'
export default {
    name: "v-personal",
    data(){
        return{
            id: 13,
            height: 100,
            person: null
        }
    },
    methods: {
        getHeightForPage() {
            this.height = (document.querySelector('.App').clientHeight) - (document.querySelector('.v-footer').clientHeight);
        },
        getMe(){
            API.post('/api/auth/me')
            .then(res=>{
                this.person = res.data
                console.log(this.person)
            })
        }
    },
    mounted(){
        this.getHeightForPage();
        this.getMe();
    }
}
</script>

<style lang="scss">
    .v-personal{
        color: white;
        padding: 100px;
        font-size: 30px;
    }
</style>
