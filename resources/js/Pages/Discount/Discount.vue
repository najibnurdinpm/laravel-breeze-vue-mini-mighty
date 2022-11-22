<script setup>
  import {
    ref,
    onMounted,
    inject
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
  import HeaderTable from '@/Layouts/Tables/HeaderTable.vue';
  import BodyTable from '@/Layouts/Tables/BodyTable.vue';
  import Tables from '@/Layouts/Tables/Tables.vue';
  import Chart from 'chart.js/auto';
  import {
    Menu,
    MenuButton,
    MenuItem,
    MenuItems
  } from '@headlessui/vue'
  import {
    EllipsisVerticalIcon,
    MagnifyingGlassIcon,
    ChevronDownIcon,
    ChevronLeftIcon, 
    ChevronRightIcon
  } from '@heroicons/vue/20/solid'
  import {
    ChartBarIcon,
    CurrencyDollarIcon,
    UserGroupIcon,
    TagIcon,
    XMarkIcon
  } from '@heroicons/vue/24/outline'
  import {
    Link,
  } from '@inertiajs/inertia-vue3';
  const swal = inject('$swal')
  const Items_Checked = ref([])

   onMounted(() => {
    const ck__delete = document.querySelectorAll(".ck-delete")
    
    ck__delete.forEach((items) => {
      const obj = {
        checked:false
      }
      Items_Checked.value.push(obj)
    });
  })

   const people = [{
      name: 'Adidas | Adidas Golf',
      status: 'active',
      inventory: '18 in stock for 1 variants',
      type: 'SHOES',
      vendor: 'Adidas',
      email: 'lindsay.walton@example.com',
      role: 'Member'
    }, {
      name: 'Nike | Nike Air',
      status: 'active',
      inventory: '11 in stock for 2 variants',
      type: 'SHOES',
      vendor: 'Nike',
      email: 'lindsay.walton@example.com',
      role: 'Member'
    },
    // More people...
  ]
 const infotabs = ref('All')
 const CloseInfoTabs = () => {
    infotabs.value = 'All'
    SetLink(0)
  }
   const SetLink = (idx) => {
    event.preventDefault()
    tabs?.value?.map((items, index) => {
      const NewCurrent = (idx == index) ? true : false;
      items.current = NewCurrent
    })
    infotabs.value = tabs?.value[idx].name
  }
  const tabs = ref([{
    name: 'All',
    href: '#',
    current: true
  }, {
    name: 'Active',
    href: '#',
    current: false
  }, {
    name: 'Draft',
    href: '#',
    current: false
  }, {
    name: 'Archived',
    href: '#',
    current: false
  }, ])

  const ckbox = ref(false);
  const CountCkDelete = ref(0)

  const SetCkBox = () => {
      let countCk = 0
      if(event.target.checked) {
        document.querySelectorAll(".ck-delete").forEach((items) => {
          countCk++
        });
        CountCkDelete.value = countCk
        Items_Checked.value.map((items)=>{
          if(!items.checked) {
            items.checked = true
          }
        })
      } else {
        countCk = 0
        Items_Checked.value.map((items)=>{
          if(items.checked) {
            items.checked = false
          }
        })
      }
      ckbox.value = event.target.checked 
      CountCkDelete.value=countCk
  }

  const NewListDelete = (index) => {
    let count__true = 0
    Items_Checked.value[index].checked = event.target.checked;
    Items_Checked.value.map((items)=>{
      items.checked ? count__true++ : '' 
    })
    CountCkDelete.value=count__true
    if(count__true == Items_Checked.value.length) {
      ckbox.value = true
    } else {
      ckbox.value = false
    }
  }

  const Remove_Product = () => {
    swal.fire({
      title: 'Are you sure?',
      text: "Delete this data",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!',
      
    }).then((result) => {
      if (result.isConfirmed) {
        swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
      }
    })
  }
  
</script>
<template lang="">
  <DashboardLayout>
    <HeaderDasboard>
      <HeaderTable>
        <div class="sm:flex-auto">
          <h1 class="text-xl font-semibold text-gray-900 capitalize ">{{$page.url.replaceAll("/","")}}</h1>
          <p class="mt-2 text-sm text-gray-700">A list of all the <span class="lowercase">{{$page.url.replaceAll("/","")}}</span>
          </p>
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
          <Link :href="route('add-discount')" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto"> Add {{$page.url.replaceAll("/","")}} </Link>
        </div>
      </HeaderTable>
    </HeaderDasboard>
    <BodyDashboard>

        <BodyTable>
        <div class="sm:pl-4">
          <div class="sm:hidden">
            <label for="tabs" class="sr-only">Select a tab</label>
            <!-- Use an "onChange" listener to redirect the user to the selected tab URL. -->
            <select id="tabs" name="tabs" class="block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
              <option v-for="tab in tabs" :key="tab.name" :selected="tab.current">{{ tab.name }}</option>
            </select>
          </div>
          <div class="hidden sm:block">
            <div class="border-b border-gray-200">
              <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                <a v-for="(tab, index) in tabs" :key="tab.name" @click="SetLink(index)" href="" :class="[tab.current ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200', 'whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm']" :aria-current="tab.current ? 'page' : undefined">
                  {{ tab.name }}
                  <span v-if="tab.count" :class="[tab.current ? 'bg-indigo-100 text-indigo-600' : 'bg-gray-100 text-gray-900', 'hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block']">{{ tab.count }}</span>
                </a>
              </nav>
            </div>
          </div>
        </div>
        <div :class="[infotabs == 'All' ? 'hidden' : 'block' ,' flex w-full items-center justify-between space-x-6 px-4 pt-2 pb-0']">
          <div class="px-2 py-1 truncate border border-gray-400 hover:bg-gray-100 rounded">
            <div class="flex items-center space-x-1">
              <p class="truncate text-xs font-medium text-gray-900">{{infotabs}}</p>
              <button @click="CloseInfoTabs" type="button" class="ml-1 flex items-center justify-center rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-red-500">
                <XMarkIcon class="h-4 w-4 text-gray-400" aria-hidden="true" />
              </button>
            </div>
          </div>
        </div>
        <div class="flex flex-1 justify-between px-4 py-2 space-x-4">
          <div class="flex flex-1">
            <form class="flex w-full md:ml-0" action="#" method="GET">
              <label for="search-field" class="sr-only">Search</label>
              <div class="relative w-full text-gray-400 focus-within:text-gray-600">
                <div class="pointer-events-none absolute inset-y-0 left-2 flex items-center">
                  <MagnifyingGlassIcon class="h-5 w-5" aria-hidden="true" />
                </div>
                <input id="search-field" class="block h-full w-full border border-gray-200 py-2 pl-8 pr-3 text-gray-900 placeholder-gray-500 focus:border-gray-200 focus:placeholder-gray-400 rounded-md focus:outline-none focus:ring-1 sm:text-sm" placeholder="Search" type="search" name="search" />
              </div>
            </form>
          </div>
          <Menu as="div" class="relative inline-block text-left">
            <div>
              <MenuButton class="inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-100"> Sort
                <ChevronDownIcon class="-mr-1 ml-2 h-5 w-5" aria-hidden="true" />
              </MenuButton>
            </div>
            <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
              <MenuItems class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                <div class="block ">
                  <MenuItem v-slot="{ active }">
                  <div :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700' , 'flex items-center px-4 py-2']">
                    <input id="ascending" name="notification-method" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                    <label for="ascending" class="block px-4 py-2 text-sm flex-1"> Product title A-Z </label>
                  </div>
                  </MenuItem>
                  <MenuItem v-slot="{ active }">
                  <div :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700' , 'flex items-center px-4 py-2']">
                    <input id="descending" name="notification-method" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                    <label for="descending" class="block px-4 py-2 text-sm flex-1"> Product title Z-A </label>
                  </div>
                  </MenuItem>
                </div>
              </MenuItems>
            </transition>
          </Menu>
        </div>

        <div :class="[CountCkDelete ? '' : 'hidden' ,' flex flex-1 justify-start px-2 py-2']">
          <div class="inline-flex w-auto justify-center border border-gray-300 rounded-l bg-white px-2 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-100">
            <div class="flex h-5 items-center">
              <input @change="SetCkBox" id="delete" aria-describedby="delete-description" name="delete" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" :checked="ckbox" />
            </div>
            <div class="ml-3 text-sm">
              <label for="delete" class="font-medium text-gray-700">{{CountCkDelete}} selected</label>
            </div>
          </div>
          <button @click="Remove_Product" type="button" class="inline-flex items-center rounded-r border border-transparent bg-red-600 px-2.5 py-1.5 text-xs font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">Delete</button>
        </div>

        <Tables>
          <thead :class="[CountCkDelete ? 'hidden' : '' , ' bg-gray-50 border-t border-gray-200']">
            <tr>
              <th scope="col" class="whitespace-wrap py-4 pl-4 text-sm font-medium text-gray-900 sm:pl-4">
                <div class="relative flex justify-start items-start">
                  <div class="flex h-5 items-center">
                    <input @change="SetCkBox" id="comments" aria-describedby="comments-description" name="comments" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" :checked="ckbox"/>
                  </div>
                </div>
              </th>
              <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Title</th>
              <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Status</th>
              <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Products</th>
              <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Product Description</th>
              <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                <span class="sr-only">Edit</span>
              </th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200 bg-white">
            <tr v-for="(person, index) in people" :key="person.email">
              <td class="pl-4">
                <div class="relative flex justify-start items-center">
                  <div class="flex h-5 items-center ">
                    <input @change="NewListDelete(index)" aria-describedby="comments-description" name="comments" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 ck-delete" :checked="Items_Checked[index]?.checked"/>
                  </div>
                </div>
              </td>
              <td class="whitespace-wrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 w-64">PGP020D47F0F3B </td>
              <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                <span class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">
                  Active
                </span>
              </td>
              <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Code</td>
              <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Amount of order</td>
              <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                <Link :href="route('edit-discount', index)" class="text-indigo-600 hover:text-indigo-900">Edit</Link>
              </td>
            </tr>
          </tbody>
        </Tables>

      </BodyTable>

    </BodyDashboard>
  </DashboardLayout>
</template>