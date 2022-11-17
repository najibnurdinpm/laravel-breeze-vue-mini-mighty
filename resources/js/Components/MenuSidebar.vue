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

const navigation = [
  { name: 'Dashboard', href: '#', icon: HomeIcon, current: true },
  { name: 'Product', href: '#', icon: TagIcon, current: false },
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
        <a v-for="item in navigation" :key="item.name" :href="item.href" :class="[item.current ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white', 'group flex items-center px-2 py-2 text-sm font-medium rounded-md']">
            <component :is="item.icon" :class="[item.current ? 'text-gray-300' : 'text-gray-400 group-hover:text-gray-300', 'mr-3 flex-shrink-0 h-6 w-6']" aria-hidden="true" />
            {{ item.name }}
        </a>
    </div>
</template>
