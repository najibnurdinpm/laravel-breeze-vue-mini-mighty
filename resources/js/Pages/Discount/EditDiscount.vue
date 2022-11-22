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
  import TextInput from '@/Components/TextInput.vue';
  import Checkbox from '@/Components/Checkbox.vue';
  import VueSweetalert2 from 'vue-sweetalert2';
  import Datepicker from 'vuejs3-datepicker';
import moment from 'moment';


  
  import {
    Head,
    Link,
    useForm,
    usePage
  } from '@inertiajs/inertia-vue3';
  import {
      ArrowLeftIcon
  } from '@heroicons/vue/24/outline'
  const swal = inject('$swal')
  const form = useForm({
    id:window.location.href.split('/').pop(),
    discount_code: 'tes5 123',
    value_discount: '10 %',
    minimum_p__:true,
    value_m__pa: 0,
    start_date:new Date(moment()),
    end_date:new Date(moment()),
  });

  const state = {
    date: new Date(moment())
  }
  console.log(new Date(moment()))


  const submit = () => {
      form.post(route('update-discount', form.id), {
      onFinish: () => {
        swal.fire(
          'Success!',
          'Data has been update.',
          'success'
        )
      }
    });
  };
  const tabs = ref([
  { name: 'Percentage', key:'percent', href: '', current: true },
  { name: 'Fixed Amount', key:'amount', href: '', current: false },
])

const Minimum__Purchase__amount = ref(false)

const ChangeActiveTabs = (idx) => {
  event.preventDefault();
  tabs.value.map((items, index)=>{
    const cek__current = idx == index ? true : false
    items.current = cek__current
  })
  const cek__ph = (tabs.value[idx].key == "amount") ? 'IDR. 0.00' :  '%'
  document.getElementsByName('discount')[0].placeholder=cek__ph;
}

const Hide__Or__Show__MPA = () => {
  const cek__mpa = (event.target.value == "true") ? true : false 
  Minimum__Purchase__amount.value=cek__mpa
}

</script>
<template lang="">
  <Head title="Add Product" />
  <DashboardLayout>
    <HeaderDasboard></HeaderDasboard>
    <BodyDashboard>
      <div class="relative z-0 flex flex-1 overflow-hidden">
        <MainDashboard>
          <CardDashboardLayout>


            <form @submit.prevent="submit" class="space-y-8 divide-y divide-gray-200">
            
              <CardBodyLayout>
              
                <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                  <div class="space-y-6 pt-8 sm:space-y-5 sm:pt-10">
                    <div>
                      <div class="flex">
                          <Link :href="route('discount')" class="inline-flex items-center justify-center rounded-md border border-transparent bg-yellow-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 sm:w-auto"> <component :is="ArrowLeftIcon" class="h-5 w-5 text-white" aria-hidden="true" /> </Link>
                          <h3 class="text-lg font-medium leading-6 text-gray-900 ml-4 flex items-center">Edit diskon</h3>
                      </div>
                    </div>
                    <div class="space-y-6 sm:space-y-5">
                    



                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                          <label for="region" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Discount code</label>
                          <div class="mt-1 sm:col-span-2 sm:mt-0">
                          <TextInput id="title" type="text" placeholde="Discount mode" v-model="form.discount_code" autofocus required />
                          </div>
                        </div>


                          







                            <div class="pt-6 sm:pt-5">
                              <div role="group" aria-labelledby="label-notifications">
                                <div class="sm:grid sm:grid-cols-3 sm:items-baseline sm:gap-4">
                                  <div>
                                    <div class="text-base font-medium text-gray-900 sm:text-sm sm:text-gray-700" id="label-notifications">Value</div>
                                  </div>
                                  <div class="sm:col-span-2">
                                    <div class="w-full">


                                        <div>
                              <div class="sm:hidden">
                                <label for="tabs" class="sr-only">Select a tab</label>
                                <!-- Use an "onChange" listener to redirect the user to the selected tab URL. -->
                                <select id="tabs" name="tabs" class="block w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                                  <option v-for="tab in tabs" :key="tab.name" :selected="tab.current">{{ tab.name }}</option>
                                </select>
                              </div>
                              <div class="hidden sm:block">
                                <div class="flex space-x-4">
                                  <nav class="flex" aria-label="Tabs">
                                    <a v-for="(tab, index) in tabs" :key="tab.name" @click="ChangeActiveTabs(index)" :href="tab.href" :class="[tab.current ? 'bg-indigo-100 text-indigo-700' : 'text-gray-500 hover:text-gray-700  border-gray-300', 'border px-3 py-2 font-medium text-sm']" :aria-current="tab.current ? 'page' : undefined">{{ tab.name }}</a>
                                  </nav>
                                  
                                  <div class="mt-1 flex-1 sm:col-span-2 sm:mt-0">
                                    <TextInput name="discount" type="text" placeholder="%" v-model="form.value_discount" required />
                                  </div>
                                  
                                </div>
                              </div>
                            </div>
                                       
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>





                            


                             <div class="pt-6 sm:pt-5">
                              <div role="group" aria-labelledby="label-notifications">
                                <div class="sm:grid sm:grid-cols-3 sm:items-baseline sm:gap-4">
                                  <div>
                                    <div class="text-base font-medium text-gray-900 sm:text-sm sm:text-gray-700" id="label-notifications">Minimum purchase requirements</div>
                                  </div>
                                  <div class="sm:col-span-2">
                                    <div class="max-w-lg">
                                       <div class="mt-4 space-y-4">
                                        <div class="flex items-center">
                                          <input @click="Hide__Or__Show__MPA"  id="no__mpa" name="push-notifications" type="radio" class="active h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500" :value="false" :checked="!minimum_p__a" />
                                          <label for="no__mpa" class="ml-3 block text-sm font-medium text-gray-700">No minimum requirements</label>
                                        </div>
                                        <div class="flex items-center">
                                          <input @click="Hide__Or__Show__MPA" id="m-p__a" name="push-notifications" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500" :value="true" />
                                          <label  for="m-p__a" class="ml-3 block text-sm font-medium text-gray-700">Minimum purchase amount (IDR)</label>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div :class="[Minimum__Purchase__amount ? 'sm:grid' : 'sm:hidden ' , 'sm:grid sm:grid-cols-6 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5']">
                              <div class="sm:col-start-3 mt-1 sm:col-span-4 sm:mt-0">
                                <TextInput placeholder="IDR. 0.00" type="number" v-model="form.value_m__pa" />
                              </div>
                          </div>



                           <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                          <label for="region" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Active Dates</label>
                          <div class="mt-1 sm:col-span-1 sm:mt-0">
                            <label for="region" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pb-2 ">Start Dates</label>
                              <datepicker  v-model="form.start_date"></datepicker>
                            </div>

                          <div class="mt-1 sm:col-span-1 sm:mt-0">
                            <label for="region" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pb-2 ">End Dates</label>
                              <datepicker  v-model="form.end_date"></datepicker>
                            </div>

                          </div>
                          







                    </div>
                  </div>
                </div>
                <div class="pt-5">
                  <div class="flex justify-end">
                    <button type="submit" class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Cancel</button>
                    <button type="submit" class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-yellow-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2">Edit</button>
                  </div>
                </div>
              </CardBodyLayout>
            </form>

            
          </CardDashboardLayout>
        </MainDashboard>
      </div>
    </BodyDashboard>
  </DashboardLayout>
</template>