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
    otp: '',
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};

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
  <!--
    This example requires updating your template:

    ```
    <html class="h-full bg-gray-50">
    <body class="h-full">
    ```
  -->
  <div class="flex min-h-full flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
      <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company" />
      <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Please Insert Verify OTP</h2>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
      <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
        <form class="space-y-6" action="#" method="POST">
          <div>
            <InputLabel for="otp" value="Verification code has been sent via SMS to 0897XXXX9293" />
            <div class="mt-1">
               <input @keypress="InputOTP" id="otp" name="otp" type="text" autocomplete="otp" size="6" maxlength="6" required="" class="block w-full appearance-none rounded-md border-2 border-x-white border-y-white border-b-gray-300  px-3 py-2 placeholder-gray-300 shadow-sm focus:border-x-white focus:border-y-white focus:border-b-gray-300 sm:text-2xl tracking-[20px] text-center text-gray-500 focus:ring-0" /> 
              </div>
              <p class="mt-2 text-sm text-gray-500">Didn't receive the code? Click <a class="text-indigo-600 hover:text-indigo-500 text-sm" href=""> Here </a>to resend</p>
          </div>

          <div>
            <button type="submit" class="flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Verify</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>
