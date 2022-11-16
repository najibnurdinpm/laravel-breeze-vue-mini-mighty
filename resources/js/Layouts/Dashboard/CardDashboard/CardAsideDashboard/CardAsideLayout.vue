<script setup>
     const projects = [{
    name: 'Graph API',
    initials: 'GA',
    href: '#',
    members: 16,
    bgColor: 'bg-pink-600'
  }, {
    name: 'Component Design',
    initials: 'CD',
    href: '#',
    members: 12,
    bgColor: 'bg-purple-600'
  }, ]
</script>

<template lang="">
    <div class="border-b border-gray-200 bg-white px-4 py-5 sm:px-6">
       <slot />
    </div>
</template>