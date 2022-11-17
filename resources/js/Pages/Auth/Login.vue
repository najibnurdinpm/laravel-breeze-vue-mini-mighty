<script setup>
  import { inject } from 'vue'
  import Checkbox from '@/Components/Checkbox.vue';
  import ApplicationLogo from '@/Components/ApplicationLogo.vue';
  import GuestLayout from '@/Layouts/GuestLayout.vue';
  import HeaderAuth from '@/Layouts/HeaderAuth.vue';
  import CardAuth from '@/Layouts/CardAuth.vue';
  import InputError from '@/Components/InputError.vue';
  import InputLabel from '@/Components/InputLabel.vue';
  import PrimaryButton from '@/Components/PrimaryButton.vue';
  import TextInput from '@/Components/TextInput.vue';
  import { XCircleIcon } from '@heroicons/vue/20/solid'
  import VueSweetalert2 from 'vue-sweetalert2';

  import {
    Head,
    Link,
    useForm
  } from '@inertiajs/inertia-vue3';
  defineProps({
    canResetPassword: Boolean,
    status: String,
  });
  const form = useForm({
    phone: '',
    remember: false
  });
  const submit = () => {
    form.post(route('login'), {
      onFinish: () => {
        form.reset('remember', 'phone'),
        alertSwal({
          icon:'success',
          title:'Login successfully'
        })
      }
    });
  };
  const swal = inject('$swal')
  const alertSwal = (res) => {
    swal.fire({
        icon: res.icon,
        title: res.title,
        showConfirmButton: true,
        timer: 1500
    });


  }


</script>
<template>
  <GuestLayout>
    
    
    

    <HeaderAuth>
      <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Sign in to your account</h2>
    </HeaderAuth>
    <CardAuth>
      <form @submit.prevent="submit" class="space-y-6">
        <div>
          <InputLabel for="phone" value="Please insert to your phone number" />
          <div class="mt-1">
            <TextInput id="phone" type="number" v-model="form.phone" required autofocus autocomplete="phone" />
          </div>
        </div>
        <div class="flex items-center justify-between">
          <div class="flex items-center">
            <Checkbox id="remember-me" name="remember-me" v-model:checked="form.remember" />
            <label for="remember-me" class="ml-2 block text-xs text-gray-900">Remember me</label>
          </div>
          <div class="">
            <p class="block text-xs text-gray-900">Don’t have an account ? Register
              <Link v-if="canResetPassword" :href="route('register')" class="text-indigo-600 hover:text-indigo-500"> Here </Link>
            </p>
          </div>
        </div>
        <div>
          <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
              Sign in
          </PrimaryButton> 
        </div>
      </form>
    </CardAuth>
  </GuestLayout>
</template>