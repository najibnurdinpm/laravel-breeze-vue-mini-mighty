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
    Head,
    useForm,
  } from '@inertiajs/inertia-vue3';
  const swal = inject('$swal')
  const form = useForm({
    is_approve:false,
    is_checked: [],
  });

  const props = defineProps({
    data: {
        type: [Array],
    },
});

  const ckbox = ref(false);

  onMounted(() => {
    props?.data.map((items, index)=>{
      form.is_checked.push(items.id)
    })
  });

  const Approve__Submission = () => {
    swal.fire({
      title: 'Are you sure?',
      text: "Approve this data",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, reject it!',
      
    }).then((result) => {
      if (result.isConfirmed) {
        Approve() 
      }
    })
  }



  const Approve = () => {
    form.post(route('update-withdrawal', form.is_checked), {
      onFinish: () => {
        swal.fire(
          'Success!',
          'Data has been update.',
          'success'
        )
      }
    });
  }
  
</script>
<template lang="">
  <Head title="Withdrawal" />
  <DashboardLayout>
    <HeaderDasboard>
      <HeaderTable>
        <div class="flex items-center space-x-3">
         <Link :href="route('withdrawal')" class="inline-flex items-center rounded border border-gray-300 bg-white px-2.5 py-1.5 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"> 
          <div class="flex items-center space-x-3">
              <component :is="ChevronLeftIcon" class="h-5 w-5" aria-hidden="true" /> 
               <p class=" h-5 w-auto">Back</p> 
          </div> 
        </Link>
        <h3 class="text-lg font-medium leading-6 text-gray-900 ml-4 flex items-center">Request Reject withdrawal</h3>
      </div>
      </HeaderTable>
     
    </HeaderDasboard>
    <BodyDashboard>

        <BodyTable>
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

        <Tables>
          <thead :class="[CountCkDelete ? 'hidden' : '' , ' bg-gray-50 border-t border-gray-200']">
            <tr>
              <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">No</th>
              <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
              <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Bank account</th>
              <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">total</th>
              <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Date of filing</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200 bg-white">
            <tr v-for="(items, index) in data" :key="data.Rekening">
              <td class="whitespace-wrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ Number(index) + 1 }} </td>
              <td class="whitespace-wrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ items.nama }} </td>
              <td class="whitespace-wrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ items.Rekening }}</td>
              <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ items.Nominal }}</td>
              <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ items.data_request }}</td>
            </tr>
          </tbody>
        </Tables>

      </BodyTable>
      <div class="flex  mt-4 mx-4">
        <div class="flex-1 mx-6 py-2">
          <div class="flex justify-center">
              <ul role="list" class="grid grid-cols-2 gap-4 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2">
    <li class="col-span-1 flex flex-col text-center">
      <div class="flex flex-1 flex-col ">
        <div class="mx-auto h-auto w-auto flex-shrink-0 rounded-full">
           <Link :href="route('withdrawal')" type="button" class="inline-flex items-center rounded border border-gray-300 bg-white px-2.5 py-1.5 text-xs font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Cancel</Link>
        </div>
      </div>
    </li>
     <li class="col-span-1 flex flex-col text-center">
      <div class="flex flex-1 flex-col ">
        <div class="mx-auto h-auto w-auto flex-shrink-0 rounded-full">
          <button @click="Approve__Submission" type="button" class="inline-flex items-center rounded border border-transparent bg-red-600 px-2.5 py-1.5 text-xs font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">Reject</button>
        </div>
      </div>
    </li>
  </ul>
          </div>
        </div>
      </div>


    </BodyDashboard>

    

  </DashboardLayout>
</template>