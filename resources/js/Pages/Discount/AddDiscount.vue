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

  
  import {
    Head,
    Link,
    useForm,
    usePage
  } from '@inertiajs/inertia-vue3';
  import {
    TrashIcon,
    PlusIcon,
    PencilSquareIcon,
  } from '@heroicons/vue/24/outline'
  const swal = inject('$swal')
  const form = useForm({
    title: '',
    description: '',
  });
  const submit = () => {
      form.post(route('collection'), {
      onFinish: () => {
        swal.fire(
          'Success!',
          'Data has been insert.',
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
                      <h3 class="text-lg font-medium leading-6 text-gray-900">Add Collection</h3>
                      <p class="mt-1 max-w-2xl text-sm text-gray-500">Add collection </p>
                    </div>
                    <div class="space-y-6 sm:space-y-5">
                    



                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                          <label for="region" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Discount code</label>
                          <div class="mt-1 sm:col-span-2 sm:mt-0">
                            <input type="text" name="region" id="region" autocomplete="address-level1" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
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
                                    <input type="text" name="discount" id="region" autocomplete="address-level1" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder=""  />
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
                                          <input @click="Hide__Or__Show__MPA"  id="no__mpa" name="push-notifications" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500" :value="false" />
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
                                <input type="text" name="region" id="region" autocomplete="address-level1" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="IDR. 0.00" />
                              </div>
                          </div>



                           <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                          <label for="region" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Active Dates</label>
                          <div class="mt-1 sm:col-span-1 sm:mt-0">
                            <label for="region" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pb-2 ">Start Dates</label>
                              <input type="text" name="region" id="region" autocomplete="address-level1" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                            </div>

                          <div class="mt-1 sm:col-span-1 sm:mt-0">
                            <label for="region" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pb-2 ">End Dates</label>
                              <input type="text" name="region" id="region" autocomplete="address-level1" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                            </div>

                          </div>
                          







                    </div>
                  </div>
                </div>
                <div class="pt-5">
                  <div class="flex justify-end">
                    <button type="button" class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Cancel</button>
                    <button type="submit" class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
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