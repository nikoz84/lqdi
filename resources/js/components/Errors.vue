<script setup>
defineProps(['errors'])

</script>

<template>
    <div>
        <p class="text-danger"
            style="font-size: 15px;margin-top:5px"
            v-for="(error,i) in errors"
            v-bind:key="i">
            {{ error }}
        </p>
    </div>
</template>
