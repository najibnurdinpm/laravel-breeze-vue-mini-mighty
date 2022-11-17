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
  ArrowsPointingInIcon
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

    onMounted(() => {
       const ctx = document.getElementById('myChart');
      const myChart = new Chart(ctx, {
        type: 'line',
        data: data,
        options: {
    animations: {
      tension: {
        duration: 1000,
        easing: 'linear',
        from: 1,
        to: 0,
        loop: true
      }
    },
    scales: {
      y: { // defining min and max so hiding the dataset does not change scale range
        min: 0,
        max: 10000,
        ticks: {
                    // Include a dollar sign in the ticks
                    callback: function(value, index, ticks) {
                      return 'IDR. ' + value.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1\.") + ' K'

                    }
                }

      }
    }
  }
    });
   })

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
    members: 59000,
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
    name: 'product seen',
    initials: 'P',
    href: '#',
    icon:ArrowsPointingInIcon,
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
    <HeaderDasboard>
      <h1 class="text-2xl font-semibold text-gray-900 mb-4 px-4 sm:px-0 lg:px-0">Dashboard</h1>
      <ul role="list" class="mt-3 grid grid-cols-1 gap-5 sm:grid-cols-2 sm:gap-6 lg:grid-cols-4">
      <li v-for="project in HeaderCard" :key="project.name" class="col-span-1 flex rounded-md shadow-sm px-4 sm:px-0 lg:px-0">
        <div :class="[project.bgColor, 'flex-shrink-0 flex items-center justify-center w-16 text-white text-sm font-medium rounded-l-md']"><component :is="project.icon" class="text-white h-6 w-6" aria-hidden="true" /></div>
        <div class="flex flex-1 items-center justify-between truncate rounded-r-md border-t border-r border-b border-gray-200 bg-white">
          <div class="flex-1 truncate px-4 py-2 text-sm">
            <a :href="project.href" class="font-medium text-gray-900 hover:text-gray-600">{{ project.name }}</a>
            <p class="text-gray-500">{{ project.members }}</p>
          </div>
          <div class="flex-shrink-0 pr-2">
            <button type="button" class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-white bg-transparent text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
              <span class="sr-only">Open options</span>
              <EllipsisVerticalIcon class="h-5 w-5" aria-hidden="true" />
            </button>
          </div>
        </div>
      </li>
    </ul>
    </HeaderDasboard>
    <BodyDashboard>
      <div class="relative z-0 flex flex-1 overflow-hidden">
        <MainDashboard>
         
         <!-- chart.js in hire -->
         <CardDashboardLayout>
          <CardBodyLayout>
            <canvas id="myChart"></canvas>
          </CardBodyLayout>
         </CardDashboardLayout>

         
            <CardDashboardLayout>
              <CardHeaderLayout>
                <p class="text-sm font-medium text-gray-900 mb-2">These products were viewed most often</p>
                <p class="text-sm font-small text-gray-500">Products that get more views are more likely to be purchased.</p>
              </CardHeaderLayout>
              <CardBodyLayout>
                <li v-for="project in projects" :key="project.name" class="col-span-1 flex rounded-md shadow-sm border border-gray-200 bg-white">
                  <div class="flex-shrink-0 flex items-center justify-center w-16  text-sm font-medium rounded-l-md">
                    <img class="h-10 w-10 object-contain" src="https://cdn.shopify.com/s/files/1/0624/5135/1770/products/44694ee386818f3276566210464cf341_350x350.jpg?v=1653011890" alt="" />
                  </div>
                  <div class="flex flex-1 items-center justify-between truncate rounded-r-md ">
                    <div class="flex-1 truncate px-4 py-2 text-xs">
                      <a :href="project.href" class="font-medium text-gray-900 hover:text-gray-600">https://cdn.shopify.com/s/...</a>
                      <p class="text-gray-500">Mauve / Medium 1 order</p>
                    </div>
                    <div class="flex-1 flex justify-end  px-4 py-2">
                      <p class="text-xs font-small  text-gray-600 ">5</p>
                    </div>
                  </div>
                </li>
              </CardBodyLayout>
            </CardDashboardLayout>


          <div class="sm:hidden">          
           <CardDashboardLayout>
            <CardHeaderLayout>
              <p class="text-sm font-medium text-gray-900 mb-2">Top Products</p>
            </CardHeaderLayout>
            <CardBodyLayout>
              <li v-for="project in projects" :key="project.name" class="col-span-1 flex rounded-md shadow-sm border border-gray-200 bg-white">
                <div class="flex-shrink-0 flex items-center justify-center w-16  text-sm font-medium rounded-l-md">
                  <img class="h-10 w-10 object-contain" src="https://cdn.shopify.com/s/files/1/0617/6414/1261/products/navy-dress-DQ-2568-a_50x50@2x.jpg?v=1668525989" alt="" />
                </div>
                <div class="flex flex-1 items-center justify-between truncate rounded-r-md ">
                  <div class="flex-1 truncate px-4 py-2 text-xs">
                    <a :href="project.href" class="font-medium text-gray-900 hover:text-gray-600">NIKE | CRACKLE PRINT TB TEE NIKE | CRACKLE PRINT TB TEE </a>
                    <p class="text-gray-500">Rp.300.000</p>
                  </div>
                  <div class="flex-1 flex justify-end  px-4 py-2">
                    <p class="text-xs font-small  text-gray-600 ">27 Items</p>
                  </div>
                </div>
              </li>
            </CardBodyLayout>
          </CardDashboardLayout>
          </div>

        </MainDashboard>
        <AsideDashboard>
          <CardAsideLayout>
            <HeaderCardAside>
              <div class="ml-4 mt-2">
                <p class="text-xs font-small text-gray-900">TOP PRODUCTS</p>
              </div>
              <div class="ml-4 mt-2 flex-shrink-0">
                <p class="text-xs font-small text-gray-500">Today</p>
              </div>
            </HeaderCardAside>
            <ul role="list" class="mt-3 grid grid-cols-1 gap-4 sm:grid-cols-1 sm:gap-6 lg:grid-cols-1">
              <li v-for="project in TopProduct" :key="project.name" class="col-span-1 flex  rounded-md ">
                <div class="flex-shrink-0 flex items-center justify-center text-white text-sm font-medium rounded-md bg-[url('https://cdn.shopify.com/s/files/1/0617/6414/1261/products/navy-dress-DQ-2568-a_50x50@2x.jpg?v=1668525989')] w-10 h-10 bg-center bg-no-repeat bg-auto"></div>
                <div class="flex flex-1 items-center justify-between truncate rounded-r-md bg-white">
                  
                   <div class="flex flex-1 items-center justify-between truncate rounded-r-md mr-auto">
                 <div class="flex-1 truncate px-4 text-xs">
                    <a :href="project.href" class="font-medium text-gray-900 hover:text-gray-600">NIKE | CRACKLE PRINT TB TEE NIKE | CRACKLE PRINT TB TEE </a>
                    <p class="text-gray-500">Rp.300.000</p>
                  </div>
                </div>
                  
                  <div class="flex-shrink-0">
                    <p class="text-gray-500 text-xs">27 Items</p>
                  </div>
                </div>
              </li>
            </ul>
          </CardAsideLayout>
        </AsideDashboard>
      </div>
    </BodyDashboard>
  </DashboardLayout>
</template>