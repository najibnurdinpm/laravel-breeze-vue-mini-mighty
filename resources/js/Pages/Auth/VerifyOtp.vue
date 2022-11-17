<script setup>
  import { inject } from 'vue';
  import Checkbox from '@/Components/Checkbox.vue';
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
  defineProps({
    canResetPassword: Boolean,
    status: String,
  });
  const form = useForm({
    otp: '',
  });
  const submit = () => {
    form.post(route('login'), {
      onFinish: () =>{
        form.reset('otp'),
        alertSwal({
          icon:'success',
          title:'Otp successfully'
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

  const InputOTP = (event) => {
    var theEvent = event || window.event;
    // Handle paste
    if (theEvent.type === "paste") {
      key = event.clipboardData.getData("text/plain");
    } else {
      // Handle key press
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode(key);
    }
    var regex = /[0-9]|\./;
    if (!regex.test(key)) {
      theEvent.returnValue = false;
      if (theEvent.preventDefault) theEvent.preventDefault();
    }
  }
</script>
<template>
  <GuestLayout>
    <HeaderAuth>
      <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Please Insert Verify OTP</h2>
    </HeaderAuth>
    <CardAuth>
      <form @submit.prevent="submit" class="space-y-6">
        <div>
          <InputLabel for="otp" value="Verification code has been sent via SMS to 0897XXXX9293" />
          <div class="mt-1">
            <input @keypress="InputOTP" id="otp" name="otp" type="text" v-model="form.otp" autocomplete="otp" size="6" maxlength="6" required="" class="block w-full appearance-none border-2 border-x-white border-y-white border-b-gray-300  px-3 py-2 placeholder-gray-300 focus:border-x-white focus:border-y-white focus:border-b-gray-300 sm:text-2xl tracking-[20px] text-center text-gray-500 focus:ring-0" />
          </div>
          <p class="mt-2 text-sm text-gray-500">Didn't receive the code? Click <a class="text-indigo-600 hover:text-indigo-500 text-sm" href=""> Here </a>to resend </p>
        </div>
        <div>
          <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
              Verify
          </PrimaryButton> 
        </div>
      </form>
    </CardAuth>
  </GuestLayout>
</template>