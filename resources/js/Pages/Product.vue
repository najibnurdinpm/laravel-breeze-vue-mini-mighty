<script setup>
 import {
    ref,
    onMounted
  } from 'vue'
  import DashboardLayout from '@/Layouts/Dashboard/DashboardLayout.vue';
  import HeaderDasboard from '@/Layouts/Dashboard/HeaderDasboard.vue';
  import BodyDashboard from '@/Layouts/Dashboard/BodyDashboard.vue';
  import MainDashboard from '@/Layouts/Dashboard/MainDashboard.vue';
  import CardAsideLayout from '@/Layouts/Dashboard/CardDashboard/CardAsideDashboard/CardAsideLayout.vue';
  import HeaderCardAside from '@/Layouts/Dashboard/CardDashboard/CardAsideDashboard/HeaderCardAside.vue';
  import TableAsideLayout from '@/Layouts/Dashboard/CardDashboard/CardAsideDashboard/TableAsideLayout.vue';
  import AsideDashboard from '@/Layouts/Dashboard/AsideDashboard.vue';
  import CardDashboardLayout from '@/Layouts/Dashboard/CardDashboard/CardDashboardLayout.vue';
  import CardHeaderLayout from '@/Layouts/Dashboard/CardDashboard/CardHeaderLayout.vue';
  import CardBodyLayout from '@/Layouts/Dashboard/CardDashboard/CardBodyLayout.vue';
   import Chart from 'chart.js/auto';
  import {
    EllipsisVerticalIcon
  } from '@heroicons/vue/20/solid'
  import {
  ChartBarIcon,
  CurrencyDollarIcon,
  UserGroupIcon,
  TagIcon
} from '@heroicons/vue/24/outline'

  const data = {
  labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
  datasets: [{
    label: 'Value with Rupiah',
    data: [1000, 5000, 3000, 9000, 2000, 3200, 4900],
    fill: false,
    borderColor: 'rgb(75, 192, 192)',
  }]
};


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
  }, 
  
  ]

  const TopProduct = [{
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
  }, {
    name: 'Component Design',
    initials: 'CD',
    href: '#',
    members: 12,
    bgColor: 'bg-purple-600'
  }, {
    name: 'Component Design',
    initials: 'CD',
    href: '#',
    members: 12,
    bgColor: 'bg-purple-600'
  }, 
  
  ]

   const HeaderCard = [{
    name: 'Total Sales',
    initials: 'S',
    href: '#',
    icon:CurrencyDollarIcon,
    members: 3200,
    title: 'Sales',
    bgColor: 'bg-pink-600'
  }, {
    name: 'Total Orders',
    initials: 'O',
    href: '#',
    icon:ChartBarIcon,
    members: 5900,
    title: 'Orders',
    bgColor: 'bg-purple-600'
  }, 
  {
    name: 'Total Visitor',
    initials: 'V',
    href: '#',
    icon:UserGroupIcon,
    members: 9863,
    title: 'Visitor',
    bgColor: 'bg-yellow-500'
  }, {
    name: 'Product Seen',
    initials: 'P',
    href: '#',
    icon:TagIcon,
    members: 96847498,
    title: 'Visitor',
    bgColor: 'bg-green-500'
  }, 
  
  ]
  const people = [{
      name: 'Jane Cooper',
      title: 'Regional Paradigm Technician',
      role: 'Admin',
      email: 'janecooper@example.com',
      telephone: '+1-202-555-0170',
      imageUrl: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60',
    }, {
      name: 'Jane Cooper',
      title: 'Regional Paradigm Technician',
      role: 'Admin',
      email: 'janecooper@example.com',
      telephone: '+1-202-555-0170',
      imageUrl: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60',
    },
    // More people...
  ]
</script>
<template lang="">
  <DashboardLayout>
  
    <BodyDashboard>
        {{ $page.url }}
    </BodyDashboard>
  </DashboardLayout>
</template>