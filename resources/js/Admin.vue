<script setup>
import axios from 'axios'
import { onMounted, ref } from 'vue';

const paginator = ref({})

onMounted(() => {
    axios.get('/api/emails').then(resp => {
        if(resp.status==200) {
            paginator.value = resp.data
        }
    })
})


function goBack(){
    location.replace('/')
}

</script>
<template>
    <section class="container" style="padding-top: 30px;">

        <table class="table mt-10">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item,i) in paginator.data" :key="i">
                    <th scope="row">{{ item.id }}</th>
                    <td >
                        {{ item.nome }}
                    </td>
                    <td >
                        {{ item.email }}
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="mt-10">
            <button class="btn btn-rounded-black" @click="goBack">Voltar</button>
        </div>
    </section>
</template>
