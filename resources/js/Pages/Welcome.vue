<template lang="">
  <DashboardLayout>
      <HeaderDasboard>
        <h1 class="text-2xl font-semibold text-gray-900">Dashboard</h1>
      </HeaderDasboard>
      <BodyDashboard>
          <div class="h-96 rounded-lg border-4 border-dashed border-gray-200" />
      </BodyDashboard>
  </DashboardLayout>
</template>

<script setup>
  import DashboardLayout from '@/Layouts/Dashboard/DashboardLayout.vue';
  import HeaderDasboard from '@/Layouts/Dashboard/HeaderDasboard.vue';
  import BodyDashboard from '@/Layouts/Dashboard/BodyDashboard.vue';
</script>