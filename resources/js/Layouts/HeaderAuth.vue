<script setup>
  import ApplicationLogo from '@/Components/ApplicationLogo.vue';
</script>

<template>
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <ApplicationLogo :isDashboard="false" />
        <slot />
    </div>
</template>