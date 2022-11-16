<!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<template>
  <!--
    This example requires updating your template:

    ```
    <html class="h-full bg-gray-100"><body class="h-full">
    ```
  -->
  <div>
    <TransitionRoot as="template" :show="sidebarOpen">
      <Dialog as="div" class="relative z-40 md:hidden" @close="sidebarOpen = false">
        <TransitionChild as="template" enter="transition-opacity ease-linear duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="transition-opacity ease-linear duration-300" leave-from="opacity-100" leave-to="opacity-0">
          <div class="fixed inset-0 bg-gray-600 bg-opacity-75" />
        </TransitionChild>
        <div class="fixed inset-0 z-40 flex">
          <TransitionChild as="template" enter="transition ease-in-out duration-300 transform" enter-from="-translate-x-full" enter-to="translate-x-0" leave="transition ease-in-out duration-300 transform" leave-from="translate-x-0" leave-to="-translate-x-full">
            <DialogPanel class="relative flex w-full max-w-xs flex-1 flex-col bg-gray-800 pt-5 pb-4">
              <TransitionChild as="template" enter="ease-in-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in-out duration-300" leave-from="opacity-100" leave-to="opacity-0">
                <div class="absolute top-0 right-0 -mr-12 pt-2">
                  <button type="button" class="ml-1 flex h-10 w-10 items-center justify-center rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" @click="sidebarOpen = false">
                    <span class="sr-only">Close sidebar</span>
                    <XMarkIcon class="h-6 w-6 text-white" aria-hidden="true" />
                  </button>
                </div>
              </TransitionChild>
              <div class="flex flex-shrink-0 items-center px-4">
                <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" />
              </div>
              <div class="mt-5 h-0 flex-1 overflow-y-auto">
                <nav class="space-y-1 px-2">
                  <a v-for="item in navigation" :key="item.name" :href="item.href" :class="[item.current ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white', 'group flex items-center px-2 py-2 text-base font-medium rounded-md']">
                    <component :is="item.icon" :class="[item.current ? 'text-gray-300' : 'text-gray-400 group-hover:text-gray-300', 'mr-4 flex-shrink-0 h-6 w-6']" aria-hidden="true" />
                    {{ item.name }}
                  </a>
                </nav>
              </div>
            </DialogPanel>
          </TransitionChild>
          <div class="w-14 flex-shrink-0" aria-hidden="true">
            <!-- Dummy element to force sidebar to shrink to fit close icon -->
          </div>
        </div>
      </Dialog>
    </TransitionRoot>
    <!-- Static sidebar for desktop -->
    <div class="hidden md:fixed md:inset-y-0 md:flex md:w-64 md:flex-col">
      <!-- Sidebar component, swap this element with another sidebar if you like -->
      <div class="flex min-h-0 flex-1 flex-col bg-gray-800">
        <div class="flex h-16 flex-shrink-0 items-center bg-gray-900 px-4">
          <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" />
        </div>
        <div class="flex flex-1 flex-col overflow-y-auto">
          <nav class="flex-1 space-y-1 px-2 py-4">
            <a v-for="item in navigation" :key="item.name" :href="item.href" :class="[item.current ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white', 'group flex items-center px-2 py-2 text-sm font-medium rounded-md']">
              <component :is="item.icon" :class="[item.current ? 'text-gray-300' : 'text-gray-400 group-hover:text-gray-300', 'mr-3 flex-shrink-0 h-6 w-6']" aria-hidden="true" />
              {{ item.name }}
            </a>
          </nav>
        </div>
      </div>
    </div>
    <div class="flex flex-col md:pl-64">
      <div class="sticky top-0 z-10 flex h-16 flex-shrink-0 bg-white shadow">
        <button type="button" class="border-r border-gray-200 px-4 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 md:hidden" @click="sidebarOpen = true">
          <span class="sr-only">Open sidebar</span>
          <Bars3BottomLeftIcon class="h-6 w-6" aria-hidden="true" />
        </button>
        <div class="flex flex-1 justify-between px-4">
          <div class="flex flex-1">
            <form class="flex w-full md:ml-0" action="#" method="GET">
              <label for="search-field" class="sr-only">Search</label>
              <div class="relative w-full text-gray-400 focus-within:text-gray-600">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center">
                  <MagnifyingGlassIcon class="h-5 w-5" aria-hidden="true" />
                </div>
                <input id="search-field" class="block h-full w-full border-transparent py-2 pl-8 pr-3 text-gray-900 placeholder-gray-500 focus:border-transparent focus:placeholder-gray-400 focus:outline-none focus:ring-0 sm:text-sm" placeholder="Search" type="search" name="search" />
              </div>
            </form>
          </div>
          <div class="ml-4 flex items-center md:ml-6">
            <button type="button" class="rounded-full bg-white p-1 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
              <span class="sr-only">View notifications</span>
              <BellIcon class="h-6 w-6" aria-hidden="true" />
            </button>
            <!-- Profile dropdown -->
            <Menu as="div" class="relative ml-3">
              <div>
                <MenuButton class="flex max-w-xs items-center rounded-full bg-white text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                  <span class="sr-only">Open user menu</span>
                  <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                </MenuButton>
              </div>
              <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                <MenuItems class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                  <MenuItem v-for="item in userNavigation" :key="item.name" v-slot="{ active }">
                  <a :href="item.href" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">{{ item.name }}</a>
                  </MenuItem>
                </MenuItems>
              </transition>
            </Menu>
          </div>
        </div>
      </div>
      <main class="flex-1">
        <div class="py-6">
          <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
            <h1 class="text-2xl font-semibold text-gray-900">Dashboard</h1>
          </div>
          <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
            <!-- Replace with your content -->
            <div class="py-4">
              <div class="h-96 rounded-lg ">
                <div class="flex min-w-0 flex-1 flex-col overflow-hidden">
                  <div class="lg:hidden">
                    <div class="flex items-center justify-between px-4 py-1.5">
                      <div>
                        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company" />
                      </div>
                      <div>
                        <button type="button" class="-mr-3 inline-flex h-12 w-12 items-center justify-center rounded-md text-gray-500 hover:text-gray-900" @click="sidebarOpen = true">
                          <span class="sr-only">Open sidebar</span>
                          <Bars3Icon class="h-6 w-6" aria-hidden="true" />
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="relative z-0 flex flex-1 overflow-hidden">
                    <main class="relative z-0 flex-1 overflow-y-auto focus:outline-none">
                      <!-- Start main area-->
                      <div class=" inset-0 py-4 px-4 sm:px-6 lg:px-4">
                        <div class="h-full rounded-lg ">
                          <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-2 mb-6">
                            <li v-for="person in people" :key="person.email" class="col-span-1 divide-y divide-gray-200 rounded-lg bg-white shadow">
                              <div class="flex w-full items-center justify-between space-x-6 p-6">
                                <div class="flex-1 truncate">
                                  <div class="flex items-center space-x-3">
                                    <h3 class="truncate text-sm font-medium text-gray-900">Total Sales</h3>
                                  </div>
                                  <p class="mt-1 truncate text-sm text-gray-500">122</p>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 flex-shrink-0">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                                </svg>
                              </div>
                              <div>
                                <div class="-mt-px flex divide-x divide-gray-200">
                                  <div class="flex w-0 flex-1">
                                    <a class="relative -mr-px inline-flex w-0 flex-1 items-center justify-center rounded-bl-lg border border-transparent py-4 text-xs font-small text-gray-700 hover:text-gray-500">
                                      <span class="ml-3">1 Total order</span>
                                    </a>
                                  </div>
                                  <div class="-ml-px flex w-0 flex-1">
                                    <a class="relative inline-flex w-0 flex-1 items-center justify-center rounded-br-lg border border-transparent py-4 text-xs font-small text-gray-700 hover:text-gray-500">
                                      <span class="ml-3">view report</span>
                                    </a>
                                  </div>
                                </div>
                              </div>
                            </li>
                          </ul>
                          <div class="grid grid-cols-1 sm:grid-cols-1 mb-6">
                            <div class="relative flex items-center space-x-3 rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:border-gray-400">
                              <div class="flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5L12 21m0 0l-7.5-7.5M12 21V3" />
                                </svg>
                              </div>
                              <div class="min-w-0 flex-1">
                                <span class="" aria-hidden="true" />
                                <p class="text-sm font-medium text-gray-900">30 order fulfill</p>
                              </div>
                            </div>
                          </div>
                          <div class="border-b border-gray-200 bg-white px-4 py-5 sm:px-6 rounded-lg mb-6">
                            <div class="-ml-4 -mt-4">
                              <div class="ml-4 mt-4">
                                <div class="">
                                  <div class="mb-6">
                                    <p class="text-sm font-medium text-gray-900 mb-2">Engage your customers with a holiday campaign</p>
                                    <p class="text-sm font-small text-gray-500">Start the holidays off right with tools to help you grow your business</p>
                                  </div>
                                  <ul role="list" class="mt-3 grid grid-cols-1 gap-4 sm:grid-cols-1 sm:gap-4 lg:grid-cols-1">
                                    <li class="col-span-1 flex rounded-md shadow-sm border border-gray-200 bg-white">
                                      <div class="flex-shrink-0 flex items-center justify-center w-16  text-sm font-medium rounded-l-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 010 12.728M16.463 8.288a5.25 5.25 0 010 7.424M6.75 8.25l4.72-4.72a.75.75 0 011.28.53v15.88a.75.75 0 01-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.01 9.01 0 012.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75z" />
                                        </svg>
                                      </div>
                                      <div class="flex flex-1 items-center justify-between truncate rounded-r-md ">
                                        <div class="flex-1 truncate px-4 py-2 text-xs">
                                          <p class="text-gray-500">Mauve / Medium 1 order</p>
                                        </div>
                                        <div class="flex-1 flex justify-end  px-4 py-2">
                                          <button type="button" class="inline-flex items-center rounded border border-gray-400 bg-white px-2.5 py-1.5 text-xs font-medium text-gray-700 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Create compaign</button>
                                        </div>
                                      </div>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="border-b border-gray-200 bg-white px-4 py-5 sm:px-6 rounded-lg mb-6">
                            <div class="-ml-4 -mt-4">
                              <div class="ml-4 mt-4">
                                <div class="">
                                  <div class="mb-6">
                                    <p class="text-sm font-medium text-gray-900 mb-2">These products were viewed most often</p>
                                    <p class="text-sm font-small text-gray-500">Products that get more views are more likely to be purchased.</p>
                                  </div>
                                  <ul role="list" class="mt-3 grid grid-cols-1 gap-4 sm:grid-cols-1 sm:gap-4 lg:grid-cols-1">
                                    <li v-for="project in projects" :key="project.name" class="col-span-1 flex rounded-md shadow-sm border border-gray-200 bg-white">
                                      <div class="flex flex-1 items-center justify-between truncate rounded-r-md ">
                                        <div class="flex-1 truncate px-4 py-4 text-xs">
                                          <a :href="project.href" class="font-medium text-gray-900 hover:text-gray-600">Homepage</a>
                                        </div>
                                        <div class="flex-1 flex justify-end  px-4 py-2">
                                          <p class="text-xs font-small  text-gray-600 ">5</p>
                                        </div>
                                      </div>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="border-b border-gray-200 bg-white px-4 py-5 sm:px-6 rounded-lg mb-6">
                            <div class="-ml-4 -mt-4">
                              <div class="ml-4 mt-4">
                                <div class="">
                                  <div class="mb-6">
                                    <p class="text-sm font-medium text-gray-900 mb-2">Your visitors are using some new search terms</p>
                                    <p class="text-sm font-small text-gray-500">People are searching for these terms on your online store. Keeping an eye on new search terms can help you discover what your customers want.</p>
                                  </div>
                                  <ul role="list" class="mt-3 grid grid-cols-1 gap-4 sm:grid-cols-1 sm:gap-4 lg:grid-cols-1">
                                    <li v-for="project in projects" :key="project.name" class="col-span-1 flex rounded-md shadow-sm border border-gray-200 bg-white">
                                      <div class="flex-shrink-0 flex items-center justify-center w-16  text-sm font-medium rounded-l-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                        </svg>
                                      </div>
                                      <div class="flex flex-1 items-center justify-between truncate rounded-r-md ">
                                        <div class="flex-1 truncate px-4 py-2 text-xs">
                                          <a :href="project.href" class="font-medium text-gray-900 hover:text-gray-600">Shoes Adidas</a>
                                          <p class="text-gray-500">First search: Today</p>
                                        </div>
                                        <div class="flex-1 flex justify-end  px-4 py-2">
                                          <p class="text-xs font-small  text-gray-600 ">4</p>
                                        </div>
                                      </div>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="border-b border-gray-200 bg-white px-4 py-5 sm:px-6 rounded-lg mb-6">
                            <div class="-ml-4 -mt-4">
                              <div class="ml-4 mt-4">
                                <div class="">
                                  <div class="mb-6">
                                    <p class="text-sm font-medium text-gray-900 mb-2">Some of your visitors can’t find what they’re looking for</p>
                                    <p class="text-sm font-small text-gray-500">People are searching for these terms on your online store. Keeping an eye on new search terms can help you discover what your customers want.</p>
                                  </div>
                                  <ul role="list" class="mt-3 grid grid-cols-1 gap-4 sm:grid-cols-1 sm:gap-4 lg:grid-cols-1">
                                    <li v-for="project in projects" :key="project.name" class="col-span-1 flex rounded-md shadow-sm border border-gray-200 bg-white">
                                      <div class="flex-shrink-0 flex items-center justify-center w-16  text-sm font-medium rounded-l-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                        </svg>
                                      </div>
                                      <div class="flex flex-1 items-center justify-between truncate rounded-r-md ">
                                        <div class="flex-1 truncate px-4 py-2 text-xs">
                                          <a :href="project.href" class="font-medium text-gray-900 hover:text-gray-600">Shoes Adidas</a>
                                          <p class="text-gray-500">First search: Today</p>
                                        </div>
                                        <div class="flex-1 flex justify-end  px-4 py-2">
                                          <p class="text-xs font-small  text-gray-600 ">4</p>
                                        </div>
                                      </div>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="border-b border-gray-200 bg-white px-4 py-5 sm:px-6 rounded-lg mb-6">
                            <div class="-ml-4 -mt-4">
                              <div class="ml-4 mt-4">
                                <div class="">
                                  <div class="mb-6">
                                    <p class="text-xs font-medium text-gray-900 mb-2">These products were viewed most often</p>
                                    <p class="text-xs font-small text-gray-500">Products that get more views are more likely to be purchased.</p>
                                  </div>
                                  <ul role="list" class="mt-3 grid grid-cols-1 gap-4 sm:grid-cols-1 sm:gap-4 lg:grid-cols-1">
                                    <li v-for="project in projects" :key="project.name" class="col-span-1 flex rounded-md shadow-sm border border-gray-200 bg-white">
                                      <div class="flex-shrink-0 flex items-center justify-center w-16  text-sm font-medium rounded-l-md">
                                        <img class="h-10 w-10" src="https://cdn.shopify.com/s/files/1/0624/5135/1770/products/44694ee386818f3276566210464cf341_350x350.jpg?v=1653011890" alt="" />
                                      </div>
                                      <div class="flex flex-1 items-center justify-between truncate rounded-r-md ">
                                        <div class="flex-1 truncate px-4 py-2 text-xs">
                                          <a :href="project.href" class="font-medium text-gray-900 hover:text-gray-600">https://cdn.shopify.com/s/...</a>
                                          <p class="text-gray-500">Mauve / Medium 1 order</p>
                                        </div>
                                        <div class="flex-1 flex justify-end  px-4 py-2">
                                          <p class="text-xs font-small  text-gray-600 ">5</p>
                                        </div>
                                      </div>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="border-b border-gray-200 bg-white px-4 py-5 sm:px-6 rounded-lg mb-6">
                            <div class="-ml-4 -mt-4">
                              <div class="ml-4 mt-4">
                                <div class="">
                                  <div class="mb-6">
                                    <p class="text-sm font-medium text-gray-900 mb-2">These returning customers haven’t made a purchase recently</p>
                                    <p class="text-xs font-small text-gray-500">Try emailing them a discount code to encourage them to make their next purchase.</p>
                                  </div>
                                  <ul role="list" class="mt-3 grid grid-cols-1 gap-4 sm:grid-cols-1 sm:gap-4 lg:grid-cols-1">
                                    <li v-for="project in projects" :key="project.name" class="col-span-1 flex rounded-md shadow-sm border border-gray-200 bg-white">
                                      <div class="flex-shrink-0 flex items-center justify-center w-16  text-sm font-medium rounded-l-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-9 h-9">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                      </div>
                                      <div class="flex flex-1 items-center justify-between truncate rounded-r-md ">
                                        <div class="flex-1 truncate px-4 py-2 text-xs">
                                          <a :href="project.href" class="font-medium text-gray-900 hover:text-gray-600">Devan ramadhan</a>
                                          <p class="text-gray-500">Total spent to date: $428.84</p>
                                        </div>
                                        <div class="flex-1 flex justify-end  px-4 py-2">
                                          <p class="text-xs font-small  text-gray-600 ">Oct 6, 2022</p>
                                        </div>
                                      </div>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- End main area -->
                    </main>
                    <aside class="relative hidden lg:block w-80 flex-shrink-0 overflow-y-auto xl:flex xl:flex-col">
                      <!-- Start secondary column (hidden on smaller screens) -->
                      <div class=" inset-0 py-4 px-4 sm:px-4 lg:px-4">
                        <div class="h-full rounded-lg ">
                          <div class="border-b border-gray-200 bg-white px-4 py-5 sm:px-6">
                            <div class="-ml-4 -mt-1 flex flex-wrap items-center justify-between sm:flex-nowrap">
                              <div class="ml-4 mt-2">
                                <p class="text-xs font-small leading-6 text-gray-900">TOTAL SALES</p>
                              </div>
                              <div class=" mt-2 flex-shrink-0">
                                <p class="text-xs font-small leading-6 text-gray-700">Today</p>
                              </div>
                            </div>
                            <div class="-ml-4 -mt-1 flex flex-wrap items-center justify-between sm:flex-nowrap">
                              <div class="ml-4 mt-2">
                                <h3 class="text-xl font-small leading-6 text-gray-900">$132.98</h3>
                              </div>
                              <div class=" mt-2 flex-shrink-0">
                                <p class="text-xs font-small leading-6 text-gray-700">1 order</p>
                              </div>
                            </div>
                            <div class="-ml-4 mt-1 flex flex-wrap items-center justify-between sm:flex-nowrap">
                              <div class="ml-4 mt-2">
                                <p class="text-xs font-small leading-6 text-gray-900">Total sales over time </p>
                              </div>
                              
            <canvas id="myChart" width="200" height="100"></canvas>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- End secondary column -->
                    </aside>
                  </div>
                </div>
              </div>
            </div>
            <!-- /End replace -->
          </div>
        </div>
      </main>
    </div>
  </div>
</template>
<script setup>
  import {
    ref,
    onMounted
  } from 'vue'
  import {
    Dialog,
    DialogPanel,
    Menu,
    MenuButton,
    MenuItem,
    MenuItems,
    TransitionChild,
    TransitionRoot,
  } from '@headlessui/vue'
  import {
    Bars3BottomLeftIcon,
    BellIcon,
    CalendarIcon,
    ChartBarIcon,
    FolderIcon,
    HomeIcon,
    InboxIcon,
    UsersIcon,
    XMarkIcon,
  } from '@heroicons/vue/24/outline'
  import {
    MagnifyingGlassIcon,
    EllipsisVerticalIcon
  } from '@heroicons/vue/20/solid'

  import Chart from 'chart.js/auto';

   onMounted(() => {
       const ctx = document.getElementById('myChart');
      const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Nov 1', 'Nov 2', 'Nov 3'],
            datasets: [{
                label: '$',
                data: ["27", "19", "50"],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(54, 162, 235, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
               yAxes: [{
                  ticks: {
                    callback: function(value, index, values) {
                      return value.toLocaleString("en-US",{style:"currency", currency:"USD"});
                    }
                  }
                }]
            }
        }
    });
   })

  const navigation = [{
    name: 'Dashboard',
    href: '#',
    icon: HomeIcon,
    current: true
  }, {
    name: 'Team',
    href: '#',
    icon: UsersIcon,
    current: false
  }, {
    name: 'Projects',
    href: '#',
    icon: FolderIcon,
    current: false
  }, {
    name: 'Calendar',
    href: '#',
    icon: CalendarIcon,
    current: false
  }, {
    name: 'Documents',
    href: '#',
    icon: InboxIcon,
    current: false
  }, {
    name: 'Reports',
    href: '#',
    icon: ChartBarIcon,
    current: false
  }, ]
  const userNavigation = [{
    name: 'Your Profile',
    href: '#'
  }, {
    name: 'Settings',
    href: '#'
  }, {
    name: 'Sign out',
    href: '#'
  }, ]
  const people = [{
      name: 'Jane Cooper',
      title: 'Regional Paradigm Technician',
      role: 'Admin',
      email: 'janecooper@example.com',
      telephone: '+1-202-555-0170',
      imageUrl: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60',
    }, {
      name: 'Jane Cooper',
      title: 'Regional Paradigm Technician',
      role: 'Admin',
      email: 'janecooper@example.com',
      telephone: '+1-202-555-0170',
      imageUrl: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60',
    },
    // More people...
  ]
  const projects = [{
    name: 'Graph API',
    initials: 'GA',
    href: '#',
    members: 16,
    bgColor: 'bg-pink-600'
  }, {
    name: 'Component Design',
    initials: 'CD',
    href: '#',
    members: 12,
    bgColor: 'bg-purple-600'
  }]
  const sidebarOpen = ref(false)
</script>