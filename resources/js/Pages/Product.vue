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

  import {
    Link,
  } from '@inertiajs/inertia-vue3';

const people = [
  { name: 'Adidas | Adidas Golf', status: 'active', inventory:'18 in stock for 1 variants', type:'SHOES', vendor:'Adidas', email: 'lindsay.walton@example.com', role: 'Member' },
  { name: 'Nike | Nike Air', status: 'active', inventory:'11 in stock for 2 variants', type:'SHOES', vendor:'Nike', email: 'lindsay.walton@example.com', role: 'Member' },
  // More people...
]

const ListTab = [
      {title:"All", slug:"all", status:true},
      {title:"Active", slug:"active", status:false},
      {title:"Draft", slug:"draft", status:false},
      {title:"Archived", slug:"archived", status:false},
  ]

  const tabs = [
  { name: 'All', href: '#', current: false },
  { name: 'Active', href: '#', current: false },
  { name: 'Draft', href: '#', current: true },
  { name: 'Archived', href: '#', current: false },
]

</script>
<template lang="">
  <DashboardLayout>

  <HeaderDasboard>
   <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-xl font-semibold text-gray-900">{{$page.component}}</h1>
        <p class="mt-2 text-sm text-gray-700">A list of all the <span class="lowercase">{{$page.component}}</span> </p>
      </div>
      <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
        <Link :href="route('add-product')" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto"> Add {{$page.component}} </Link>
      </div>
    </div>
    </HeaderDasboard>
  
    <BodyDashboard>

   
    <div class="mt-8 flex flex-col">
      <div class="-my-2 overflow-x-auto sm:-mx-4 lg:-mx-4">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
          <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
          
          

                                
              <div>

            </div>




            <table class="min-w-full divide-y divide-gray-300">
              <thead class="bg-gray-50">
                <tr>
                  <th scope="col" class="whitespace-wrap py-4 pl-4 text-sm font-medium text-gray-900 sm:pl-3">
                    <div class="relative flex justify-start items-start">
                      <div class="flex h-5 items-center">
                        <input id="comments" aria-describedby="comments-description" name="comments" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                      </div>
                    </div>
                  </th>
                  <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Product</th>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Status</th>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Inventory</th>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Type</th>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Vendor</th>
                  <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                    <span class="sr-only">Edit</span>
                  </th>
                </tr>
              </thead>
              
              <tbody class="divide-y divide-gray-200 bg-white">
                <tr v-for="person in people" :key="person.email">
                  
                  <td class="whitespace-wrap py-4 pl-4 text-sm font-medium text-gray-900 sm:pl-0">
                      <div class="relative flex justify-center items-start">
                      <div class="flex h-5 items-center">
                        <input id="comments" aria-describedby="comments-description" name="comments" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                      </div>
                      
                      <!-- <div class="ml-3 text-sm"> -->
                      <div class="ml-3 flex h-5 items-center">
                      <img class="h-10 w-10 object-contain" src="https://cdn.shopify.com/s/files/1/0624/5135/1770/products/44694ee386818f3276566210464cf341_350x350.jpg?v=1653011890" alt="">
                      </div>
                    </div>
                  </td>
                  <td class="whitespace-wrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 w-64">{{ person.name }}</td>
                  <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                    <span class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">
                      {{person.status}}
                    </span>
                  </td>
                  <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ person.inventory }}</td>
                  <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ person.type }}</td>
                  <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ person.vendor }}</td>
                  <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                    <a href="#" class="text-indigo-600 hover:text-indigo-900"
                      >Edit</a
                    >
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    </BodyDashboard>

  </DashboardLayout>
</template>