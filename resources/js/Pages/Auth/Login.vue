<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

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
        onFinish: () => form.reset('remember', 'phone'),
    });
};
</script>
<template>
  <div class="flex min-h-full flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
      <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company" />
      <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Sign in to your account</h2>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
      <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
        <form @submit.prevent="submit" class="space-y-6" >

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
                <Link v-if="canResetPassword" :href="route('register')" class="text-indigo-600 hover:text-indigo-500">
                    Here
                </Link>
              </p>
            </div>
          </div>

          <div>
            <button type="submit" class="flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Sign in</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</template>

