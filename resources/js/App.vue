<script setup>
import axios from 'axios'
import { ref } from 'vue'
import Errors from './components/Errors.vue';

const data = ref({nome: '', email: ''})
const errors = ref(null)
const message = ref(null)

function save() {
    errors.value = null
    axios.post('/api/emails', {...data.value})
    .then(resp => {
        if(resp.status === 200){
            const { data } = resp
            message.value = data.message

            setTimeout(() => {
                location.reload()
            }, 3000)
        }
    })
    .catch(error => {
        if (error.response) {
            console.log(error.response.data)
            errors.value = error.response.data.errors
            message.value = error.response.data.message
        }
    })
}


</script>
<template>
    <form>
        <div class="d-flex flex-column">
            <label for="nome">Seu nome(requerido)</label>
            <input v-model="data.nome" id="nome" />
            <Errors v-if="errors" :errors="errors.nome"></Errors>
            <label for="email">Seu E-mail(requerido)</label>
            <input v-model="data.email" id="email" />
            <Errors v-if="errors" :errors="errors.email"></Errors>
            <div v-if="message">
                <p :class="errors? 'text-danger': 'text-success'" class="message">{{ message }}</p>
            </div>
        </div>
        <button @click.prevent="save()" type="submit" class="btn btn-rounded-black" style="margin-top: 50px">Enviar</button>
    </form>
</template>
