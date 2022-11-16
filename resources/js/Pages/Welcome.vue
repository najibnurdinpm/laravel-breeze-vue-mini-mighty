<script setup>
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
  import {
    EllipsisVerticalIcon
  } from '@heroicons/vue/20/solid'
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
      <h1 class="text-2xl font-semibold text-gray-900">Dashboard</h1>
    </HeaderDasboard>
    <BodyDashboard>
      <div class="relative z-0 flex flex-1 overflow-hidden">
        <MainDashboard>
          <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-2 mb-6">
            <li v-for="person in people" :key="person.email" class="col-span-1 divide-y divide-gray-200 rounded-lg bg-white shadow">
              <div class="flex w-full items-center justify-between space-x-6 p-6">
                <div class="flex-1 truncate">
                  <div class="flex items-center space-x-3">
                    <h3 class="truncate text-sm font-medium text-gray-900">Total Sales</h3>
                  </div>
                  <p class="mt-1 truncate text-sm text-gray-500">122</p>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 flex-shrink-0">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                </svg>
              </div>
              <div>
                <div class="-mt-px flex divide-x divide-gray-200">
                  <div class="flex w-0 flex-1">
                    <a class="relative -mr-px inline-flex w-0 flex-1 items-center justify-center rounded-bl-lg border border-transparent py-4 text-xs font-small text-gray-700 hover:text-gray-500">
                      <span class="ml-3">1 Total order</span>
                    </a>
                  </div>
                  <div class="-ml-px flex w-0 flex-1">
                    <a class="relative inline-flex w-0 flex-1 items-center justify-center rounded-br-lg border border-transparent py-4 text-xs font-small text-gray-700 hover:text-gray-500">
                      <span class="ml-3">view report</span>
                    </a>
                  </div>
                </div>
              </div>
            </li>
          </ul>
          <div class="grid grid-cols-1 sm:grid-cols-1 mb-6">
            <div class="relative flex items-center space-x-3 rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:border-gray-400">
              <div class="flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5L12 21m0 0l-7.5-7.5M12 21V3" />
                </svg>
              </div>
              <div class="min-w-0 flex-1">
                <span class="" aria-hidden="true" />
                <p class="text-sm font-medium text-gray-900">30 order fulfill</p>
              </div>
            </div>
          </div>
          <CardDashboardLayout>
            <CardHeaderLayout>
              <p class="text-sm font-medium text-gray-900 mb-2">Engage your customers with a holiday campaign</p>
              <p class="text-sm font-small text-gray-500">Start the holidays off right with tools to help you grow your business</p>
            </CardHeaderLayout>
            <CardBodyLayout>
              <li class="col-span-1 flex rounded-md shadow-sm border border-gray-200 bg-white">
                <div class="flex-shrink-0 flex items-center justify-center w-16  text-sm font-medium rounded-l-md">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 010 12.728M16.463 8.288a5.25 5.25 0 010 7.424M6.75 8.25l4.72-4.72a.75.75 0 011.28.53v15.88a.75.75 0 01-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.01 9.01 0 012.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75z" />
                  </svg>
                </div>
                <div class="flex flex-1 items-center justify-between truncate rounded-r-md ">
                  <div class="flex-1 truncate px-4 py-2 text-xs">
                    <p class="text-gray-500">Mauve / Medium 1 order</p>
                  </div>
                  <div class="flex-1 flex justify-end  px-4 py-2">
                    <button type="button" class="inline-flex items-center rounded border border-gray-400 bg-white px-2.5 py-1.5 text-xs font-medium text-gray-700 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Create compaign</button>
                  </div>
                </div>
              </li>
            </CardBodyLayout>
          </CardDashboardLayout>
          <CardDashboardLayout>
            <CardHeaderLayout>
              <p class="text-sm font-medium text-gray-900 mb-2">These products were viewed most often</p>
              <p class="text-sm font-small text-gray-500">Products that get more views are more likely to be purchased.</p>
            </CardHeaderLayout>
            <CardBodyLayout>
              <li v-for="project in projects" :key="project.name" class="col-span-1 flex rounded-md shadow-sm border border-gray-200 bg-white">
                <div class="flex flex-1 items-center justify-between truncate rounded-r-md ">
                  <div class="flex-1 truncate px-4 py-4 text-xs">
                    <a :href="project.href" class="font-medium text-gray-900 hover:text-gray-600">Homepage</a>
                  </div>
                  <div class="flex-1 flex justify-end  px-4 py-2">
                    <p class="text-xs font-small  text-gray-600 ">5</p>
                  </div>
                </div>
              </li>
            </CardBodyLayout>
          </CardDashboardLayout>
          <CardDashboardLayout>
            <CardHeaderLayout>
              <p class="text-sm font-medium text-gray-900 mb-2">Your visitors are using some new search terms</p>
              <p class="text-sm font-small text-gray-500">People are searching for these terms on your online store. Keeping an eye on new search terms can help you discover what your customers want.</p>
            </CardHeaderLayout>
            <CardBodyLayout>
              <li v-for="project in projects" :key="project.name" class="col-span-1 flex rounded-md shadow-sm border border-gray-200 bg-white">
                <div class="flex-shrink-0 flex items-center justify-center w-16  text-sm font-medium rounded-l-md">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                  </svg>
                </div>
                <div class="flex flex-1 items-center justify-between truncate rounded-r-md ">
                  <div class="flex-1 truncate px-4 py-2 text-xs">
                    <a :href="project.href" class="font-medium text-gray-900 hover:text-gray-600">Shoes Adidas</a>
                    <p class="text-gray-500">First search: Today</p>
                  </div>
                  <div class="flex-1 flex justify-end  px-4 py-2">
                    <p class="text-xs font-small  text-gray-600 ">4</p>
                  </div>
                </div>
              </li>
            </CardBodyLayout>
          </CardDashboardLayout>
          <CardDashboardLayout>
            <CardHeaderLayout>
              <p class="text-sm font-medium text-gray-900 mb-2">Some of your visitors can’t find what they’re looking for</p>
              <p class="text-sm font-small text-gray-500">People are searching for these terms on your online store. Keeping an eye on new search terms can help you discover what your customers want.</p>
            </CardHeaderLayout>
            <CardBodyLayout>
              <li v-for="project in projects" :key="project.name" class="col-span-1 flex rounded-md shadow-sm border border-gray-200 bg-white">
                <div class="flex-shrink-0 flex items-center justify-center w-16  text-sm font-medium rounded-l-md">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                  </svg>
                </div>
                <div class="flex flex-1 items-center justify-between truncate rounded-r-md ">
                  <div class="flex-1 truncate px-4 py-2 text-xs">
                    <a :href="project.href" class="font-medium text-gray-900 hover:text-gray-600">Shoes Adidas</a>
                    <p class="text-gray-500">First search: Today</p>
                  </div>
                  <div class="flex-1 flex justify-end  px-4 py-2">
                    <p class="text-xs font-small  text-gray-600 ">4</p>
                  </div>
                </div>
              </li>
            </CardBodyLayout>
          </CardDashboardLayout>
          <CardDashboardLayout>
            <CardHeaderLayout>
              <p class="text-xs font-medium text-gray-900 mb-2">These products were viewed most often</p>
              <p class="text-xs font-small text-gray-500">Products that get more views are more likely to be purchased.</p>
            </CardHeaderLayout>
            <CardBodyLayout>
              <li v-for="project in projects" :key="project.name" class="col-span-1 flex rounded-md shadow-sm border border-gray-200 bg-white">
                <div class="flex-shrink-0 flex items-center justify-center w-16  text-sm font-medium rounded-l-md">
                  <img class="h-10 w-10" src="https://cdn.shopify.com/s/files/1/0624/5135/1770/products/44694ee386818f3276566210464cf341_350x350.jpg?v=1653011890" alt="" />
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
              <li v-for="project in projects" :key="project.name" class="col-span-1 flex  rounded-md ">
                <div class="flex-shrink-0 flex items-center justify-center text-white text-sm font-medium rounded-md bg-[url('https://cdn.shopify.com/s/files/1/0617/6414/1261/products/navy-dress-DQ-2568-a_50x50@2x.jpg?v=1668525989')] w-10 h-10 bg-center bg-no-repeat bg-auto"></div>
                <div class="flex flex-1 items-center justify-between truncate rounded-r-md bg-white">
                  <div class="flex-1 truncate px-4 py-2 text-sm">
                    <p class="text-gray-500 text-xs">https://cdn.shopify...</p>
                  </div>
                  <div class="flex-shrink-0">
                    <p class="text-gray-500 text-xs"> $49.00 </p>
                  </div>
                </div>
              </li>
            </ul>
          </CardAsideLayout>
          <CardAsideLayout>
            <HeaderCardAside>
              <div class="ml-4 mt-2">
                <p class="text-xs font-small text-gray-900">TOP PRODUCTS</p>
              </div>
              <div class="ml-4 mt-2 flex-shrink-0">
                <p class="text-xs font-small text-gray-500">Today</p>
              </div>
            </HeaderCardAside>
            <TableAsideLayout> 
              <tr class="flex" v-for="person in people" :key="person.email">
                <td class="whitespace-nowrap flex-1 py-1 text-xs text-gray-900 ">Added to cart</td>
                <td class="whitespace-nowrap py-1 text-xs mr-2 text-gray-500">12	</td>
                <td class="whitespace-nowrap py-1 text-xs text-gray-500">5.2%</td>
              </tr>
            </TableAsideLayout>
          </CardAsideLayout>
          <CardAsideLayout>
            <HeaderCardAside>
              <div class="ml-4 mt-2">
                <p class="text-xs font-small text-gray-900">TOP PRODUCTS</p>
              </div>
              <div class="ml-4 mt-2 flex-shrink-0">
                <p class="text-xs font-small text-gray-500">Today</p>
              </div>
            </HeaderCardAside>
            <TableAsideLayout> 
              <tr class="flex" v-for="person in people" :key="person.email">
                <td class="whitespace-nowrap flex-1 py-1 text-xs text-gray-900 ">Added to cart</td>
                <td class="whitespace-nowrap py-1 text-xs mr-2 text-gray-500">12	</td>
                <td class="whitespace-nowrap py-1 text-xs text-gray-500">5.2%</td>
              </tr>
            </TableAsideLayout>
          </CardAsideLayout>
          <CardAsideLayout>
            <HeaderCardAside>
              <div class="ml-4 mt-2">
                <p class="text-xs font-small text-gray-900">TOP PRODUCTS</p>
              </div>
              <div class="ml-4 mt-2 flex-shrink-0">
                <p class="text-xs font-small text-gray-500">Today</p>
              </div>
            </HeaderCardAside>
            <TableAsideLayout> 
              <tr class="flex" v-for="person in people" :key="person.email">
                <td class="whitespace-nowrap flex-1 py-1 text-xs text-gray-900 ">Added to cart</td>
                <td class="whitespace-nowrap py-1 text-xs mr-2 text-gray-500">12	</td>
                <td class="whitespace-nowrap py-1 text-xs text-gray-500">5.2%</td>
              </tr>
            </TableAsideLayout>
          </CardAsideLayout>
          <CardAsideLayout>
            <HeaderCardAside>
              <div class="ml-4 mt-2">
                <p class="text-xs font-small text-gray-900">TOP PRODUCTS</p>
              </div>
              <div class="ml-4 mt-2 flex-shrink-0">
                <p class="text-xs font-small text-gray-500">Today</p>
              </div>
            </HeaderCardAside>
            <TableAsideLayout> 
              <tr class="flex" v-for="person in people" :key="person.email">
                <td class="whitespace-nowrap flex-1 py-1 text-xs text-gray-900 ">Added to cart</td>
                <td class="whitespace-nowrap py-1 text-xs mr-2 text-gray-500">12	</td>
                <td class="whitespace-nowrap py-1 text-xs text-gray-500">5.2%</td>
              </tr>
            </TableAsideLayout>
          </CardAsideLayout>
          <CardAsideLayout>
            <HeaderCardAside>
              <div class="ml-4 mt-2">
                <p class="text-xs font-small text-gray-900">TOP PRODUCTS</p>
              </div>
              <div class="ml-4 mt-2 flex-shrink-0">
                <p class="text-xs font-small text-gray-500">Today</p>
              </div>
            </HeaderCardAside>
            <TableAsideLayout> 
              <tr class="flex" v-for="person in people" :key="person.email">
                <td class="whitespace-nowrap flex-1 py-1 text-xs text-gray-900 ">Added to cart</td>
                <td class="whitespace-nowrap py-1 text-xs mr-2 text-gray-500">12	</td>
                <td class="whitespace-nowrap py-1 text-xs text-gray-500">5.2%</td>
              </tr>
            </TableAsideLayout>
          </CardAsideLayout>
        </AsideDashboard>
      </div>
    </BodyDashboard>
  </DashboardLayout>
</template>