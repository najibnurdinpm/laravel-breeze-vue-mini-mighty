<script setup>
   const props = defineProps({
      isDashboard: {
         type: Boolean,
      },
      value: {
         default: null,
      },
   });
</script>

<template>
   <div v-if="props.isDashboard">
      <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" />
   </div>
   <div v-else>
      <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company" />
   </div>
</template>
