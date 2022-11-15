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
  });
  const submit = () => {
      console.log('form', form)
    // form.post(route('register'), {
    //   onFinish: () => form.reset('password', 'password_confirmation'),
    // });
  };
</script>
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
            <InputLabel for="name" value="Name" />
            <div class="mt-1">
              <TextInput id="name" type="name" v-model="form.name" required autofocus autocomplete="name" />
            </div>
          </div>
          <div>
            <InputLabel for="email" value="Email" />
            <div class="mt-1">
                 <TextInput id="email" type="email" v-model="form.email" required autocomplete="email" />
            </div>
          </div>
          <div>
            <InputLabel for="telp" value="Telp" />
            <div class="mt-1">
                <TextInput id="telp" type="number" v-model="form.telp" required autocomplete="telp" />
            </div>
          </div>
          <div>
          <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
              Register
          </PrimaryButton> 
          </div>
        </form>
      </div>
    </div>
  </GuestLayout>
</template>