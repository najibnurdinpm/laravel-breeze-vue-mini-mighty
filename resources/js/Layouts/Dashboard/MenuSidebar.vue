<script setup>
import { ref, computed } from 'vue';




import {
    
  ReceiptPercentIcon,
  ChartBarIcon,
  FolderIcon,
  HomeIcon,
  WalletIcon,
  TagIcon,
} from '@heroicons/vue/24/outline'

 import {
    Link
  } from '@inertiajs/inertia-vue3';

  
import NavLink from '@/Components/NavLink.vue';

const navigation = [
  { name: 'Dashboard', href: '/', icon: HomeIcon, current: true },
  { name: 'Product', href: '/product', icon: TagIcon, current: false },
  { name: 'Collection', href: '#', icon: FolderIcon, current: false },
  { name: 'Discounts', href: '#', icon: ReceiptPercentIcon, current: false },
  { name: 'Withdrawals', href: '#', icon: WalletIcon, current: false },
  { name: 'Orders', href: '#', icon: ChartBarIcon, current: false },
];


const props = defineProps({
    coba: {
        type: [Array],
    },
    isMobile: {
        type: Boolean,
    },
    value: {
        default: null,
    },
});

</script>

<template>
    <div v-if="props.isMobile">
        <a v-for="item in navigation" :key="item.name" :href="item.href" :class="[item.current ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white', 'group flex items-center px-2 py-2 text-base font-medium rounded-md']">
            <component :is="item.icon" :class="[item.current ? 'text-gray-300' : 'text-gray-400 group-hover:text-gray-300', 'mr-4 flex-shrink-0 h-6 w-6']" aria-hidden="true" />
            {{ item.name }} 
        </a>
    </div>
    <div v-else>
        <Link :href="route('/')" :class="[$page.url == '/' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white', 'group flex items-center px-2 py-2 text-sm font-medium rounded-md']">
            <component :is="HomeIcon" :class="[$page.url == '/' ? 'text-gray-300' : 'text-gray-400 group-hover:text-gray-300', 'mr-3 flex-shrink-0 h-6 w-6']" aria-hidden="true" />
            Dashboard
        </Link>
        <Link :href="route('product')" :class="[$page.url == '/product' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white', 'group flex items-center px-2 py-2 text-sm font-medium rounded-md']">
            <component :is="TagIcon" :class="[$page.url == '/product' ? 'text-gray-300' : 'text-gray-400 group-hover:text-gray-300', 'mr-3 flex-shrink-0 h-6 w-6']" aria-hidden="true" />
            Product
        </Link>
         <Link :href="route('collection')" :class="[$page.url == '/collection' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white', 'group flex items-center px-2 py-2 text-sm font-medium rounded-md']">
            <component :is="FolderIcon" :class="[$page.url == '/collection' ? 'text-gray-300' : 'text-gray-400 group-hover:text-gray-300', 'mr-3 flex-shrink-0 h-6 w-6']" aria-hidden="true" />
            Collection
        </Link>
        <Link :href="route('discount')" :class="[$page.url == '/discount' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white', 'group flex items-center px-2 py-2 text-sm font-medium rounded-md']">
            <component :is="ReceiptPercentIcon" :class="[$page.url == '/product' ? 'text-gray-300' : 'text-gray-400 group-hover:text-gray-300', 'mr-3 flex-shrink-0 h-6 w-6']" aria-hidden="true" />
            Discounts
        </Link>
         <Link :href="route('/')" :class="[$page.url == '/' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white', 'group flex items-center px-2 py-2 text-sm font-medium rounded-md']">
            <component :is="WalletIcon" :class="[$page.url == '/product' ? 'text-gray-300' : 'text-gray-400 group-hover:text-gray-300', 'mr-3 flex-shrink-0 h-6 w-6']" aria-hidden="true" />
            Withdrawals
        </Link>
        <Link :href="route('/')" :class="[$page.url == '/' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white', 'group flex items-center px-2 py-2 text-sm font-medium rounded-md']">
            <component :is="ChartBarIcon" :class="[$page.url == '/product' ? 'text-gray-300' : 'text-gray-400 group-hover:text-gray-300', 'mr-3 flex-shrink-0 h-6 w-6']" aria-hidden="true" />
            Orders
        </Link>
    </div>
</template>
