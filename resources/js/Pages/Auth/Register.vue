<script setup>
  import GuestLayout from '@/Layouts/GuestLayout.vue';
  import ApplicationLogo from '@/Components/ApplicationLogo.vue';
  import HeaderAuthLayout from '@/Layouts/HeaderAuthLayout.vue';
  import InputError from '@/Components/InputError.vue';
  import InputLabel from '@/Components/InputLabel.vue';
  import PrimaryButton from '@/Components/PrimaryButton.vue';
  import TextInput from '@/Components/TextInput.vue';
  import {
    Head,
    Link,
    useForm
  } from '@inertiajs/inertia-vue3';
  const form = useForm({
    name: '',
    email: '',
    telp: '',
    password: '',
    password_confirmation: '',
    terms: false,
  });
  const submit = () => {
      console.log('form', form)
    // form.post(route('register'), {
    //   onFinish: () => form.reset('password', 'password_confirmation'),
    // });
  };
</script>
<!-- <template><GuestLayout><Head title="Register" /><form @submit.prevent="submit"><div><InputLabel for="name" value="Name" /><TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus autocomplete="name" /><InputError class="mt-2" :message="form.errors.name" /></div><div class="mt-4"><InputLabel for="email" value="Email" /><TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autocomplete="username" /><InputError class="mt-2" :message="form.errors.email" /></div><div class="mt-4"><InputLabel for="password" value="Password" /><TextInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="new-password" /><InputError class="mt-2" :message="form.errors.password" /></div><div class="mt-4"><InputLabel for="password_confirmation" value="Confirm Password" /><TextInput id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation" required autocomplete="new-password" /><InputError class="mt-2" :message="form.errors.password_confirmation" /></div><div class="flex items-center justify-end mt-4"><Link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900">
                    Already registered?
                </Link><PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Register
                </PrimaryButton></div></form></GuestLayout></template> -->
<template>
  <GuestLayout>
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
      <ApplicationLogo />
      <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Register</h2>
    </div>
    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
      <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
        <form class="space-y-6" @submit.prevent="submit">
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700">name</label>
            <div class="mt-1">
              <TextInput id="name" type="name" v-model="form.name" required autofocus autocomplete="name" />
            </div>
          </div>
          <div>
            <label for="password" class="block text-sm font-medium text-gray-700">email</label>
            <div class="mt-1">
                 <TextInput id="email" type="email" v-model="form.email" required autocomplete="email" />
            </div>
          </div>
          <div>
            <label for="telp" class="block text-sm font-medium text-gray-700">Telp</label>
            <div class="mt-1">
                <TextInput id="telp" type="number" v-model="form.telp" required autocomplete="telp" />
            </div>
          </div>
          <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <div class="mt-1">
                 <TextInput id="password" type="password" v-model="form.password" required autocomplete="password" />
            </div>
          </div>
          <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Confirm password</label>
            <div class="mt-1">
                 <TextInput id="password_confirmation" type="password" v-model="form.password_confirmation" required autocomplete="lastname" />
            </div>
          </div>
          <div>
            <button type="submit" class="flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Register</button>
          </div>
        </form>
      </div>
    </div>
  </GuestLayout>
</template>