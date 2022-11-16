<script setup>
  import GuestLayout from '@/Layouts/GuestLayout.vue';
  import HeaderAuth from '@/Layouts/HeaderAuth.vue';
  import CardAuth from '@/Layouts/CardAuth.vue';
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
    <HeaderAuth>
      <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Register</h2>
    </HeaderAuth>
    <CardAuth>
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
    </CardAuth>
  </GuestLayout>
</template>