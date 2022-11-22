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
    ArrowLeftIcon,
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
                          <Link :href="route('collection')" class="inline-flex items-center justify-center rounded-md border border-transparent bg-yellow-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 sm:w-auto"> <component :is="ArrowLeftIcon" class="h-5 w-5 text-white" aria-hidden="true" /> </Link>
                          <h3 class="text-lg font-medium leading-6 text-gray-900 ml-4 flex items-center">Create colletion</h3>
                      </div>
                    </div>
                    <div class="space-y-6 sm:space-y-5">
                    
                      <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="first-name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Title</label>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                          <TextInput id="title" type="text" v-model="form.title" required autofocus autocomplete="first-name" />
                          <p class="mt-2 text-sm text-gray-500 hidden">Write a few sentences about yourself.</p>
                        </div>
                      </div>
                      <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="about" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Description</label>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                          <textarea id="about" name="about" rows="3" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                          <p class="mt-2 text-sm text-gray-500 hidden">Write a few sentences about yourself.</p>
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