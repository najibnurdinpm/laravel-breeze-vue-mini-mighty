<script setup>
  import {
    ref,
    onMounted,
    inject
  } from 'vue'
  import DashboardLayout from '@/Layouts/Dashboard/DashboardLayout.vue';
  import HeaderDasboard from '@/Layouts/Dashboard/HeaderDasboard.vue';
  import BodyDashboard from '@/Layouts/Dashboard/BodyDashboard.vue';
  import MainDashboard from '@/Layouts/Dashboard/MainDashboard.vue';
  import CardAsideLayout from '@/Layouts/Dashboard/CardDashboard/CardAsideDashboard/CardAsideLayout.vue';
  import HeaderCardAside from '@/Layouts/Dashboard/CardDashboard/CardAsideDashboard/HeaderCardAside.vue';
  import TableAsideLayout from '@/Layouts/Dashboard/CardDashboard/CardAsideDashboard/TableAsideLayout.vue';
  import AsideDashboard from '@/Layouts/Dashboard/AsideDashboard.vue';
  import CardDashboardLayout from '@/Layouts/Dashboard/CardDashboard/CardDashboardLayout.vue';
  import CardHeaderLayout from '@/Layouts/Dashboard/CardDashboard/CardHeaderLayout.vue';
  import CardBodyLayout from '@/Layouts/Dashboard/CardDashboard/CardBodyLayout.vue';
  import TextInput from '@/Components/TextInput.vue';
  import Checkbox from '@/Components/Checkbox.vue';
  import VueSweetalert2 from 'vue-sweetalert2';

  
  import {
    Head,
    Link,
    useForm,
    usePage
  } from '@inertiajs/inertia-vue3';
  import {
    TrashIcon,
    PlusIcon,
    PencilSquareIcon,
    ChevronLeftIcon,
  } from '@heroicons/vue/24/outline'
  const form = useForm({
    vendor: 'nike',
    title: '',
    description: '',
    product_photo: [{
      index: 0,
      image: "",
      PreviewImage: ""
    }],
    price: '',
    sku: '',
    isbn: '',
    country: '',
    postal_code: '',
    variant: false,
    product_variant: [],
  });
  const submit = () => {

    form.post(route('product'), {
      onFinish: () => {
        swal.fire(
          'Success!',
          'Data has been insert.',
          'success'
        )
      }
    });
  };
  const people = [{
      name: 'Adidas | Adidas Golf',
      status: 'active',
      inventory: '18 in stock for 1 variants',
      type: 'SHOES',
      vendor: 'Adidas',
      email: 'lindsay.walton@example.com',
      role: 'Member'
    }, {
      name: 'Nike | Nike Air',
      status: 'active',
      inventory: '11 in stock for 2 variants',
      type: 'SHOES',
      vendor: 'Nike',
      email: 'lindsay.walton@example.com',
      role: 'Member'
    },
    // More people...
  ]
  const ListTab = [{
    title: "All",
    slug: "all",
    status: true
  }, {
    title: "Active",
    slug: "active",
    status: false
  }, {
    title: "Draft",
    slug: "draft",
    status: false
  }, {
    title: "Archived",
    slug: "archived",
    status: false
  }, ]
  const tabs = [{
    name: 'All',
    href: '#',
    current: false
  }, {
    name: 'Active',
    href: '#',
    current: false
  }, {
    name: 'Draft',
    href: '#',
    current: true
  }, {
    name: 'Archived',
    href: '#',
    current: false
  }, ]
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
  }, ]
  const TopProduct = [{
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
  }, {
    name: 'Component Design',
    initials: 'CD',
    href: '#',
    members: 12,
    bgColor: 'bg-purple-600'
  }, {
    name: 'Component Design',
    initials: 'CD',
    href: '#',
    members: 12,
    bgColor: 'bg-purple-600'
  }, ]
  const inputChecked = ref(false);

  const swal = inject('$swal')



  const Pust_Variant = (idx) => {
    const objVariant = {
      index: idx,
      variant: '',
      value: ''
    }
    if (form.product_variant.length < 3) {
      form.product_variant.push(objVariant);
    }
  }
  const ShowHideVarian = (event) => {
    form.variant ? Pust_Variant(0) : form.product_variant = []
  }
  const Add_Another__variants = (index) => {
    Pust_Variant(index)
  }
  const Input_Variant = (index) => {
    if (form.product_variant[index].index == index) {
      form.product_variant[index].variant = event.target.value
    }
  }
  const Input_Value = (index) => {
    if (form.product_variant[index].index == index) {
      form.product_variant[index].value = event.target.value
    }
  }
  const upload_image = (idx) => {
    const NowIndex = idx - 1
    const NextIdx = idx
    const objProductImg = {
      index: NextIdx,
      image: "",
      PreviewImage: ""
    }
    if (form.product_photo.length < 7) {
      form.product_photo.push(objProductImg)
      form.product_photo.map((item, index) => {
        if (NowIndex == index) {
          item.image = event.target.files[0],
            item.PreviewImage = URL.createObjectURL(event.target.files[0])
        }
      })
    }
    console.log('form.product_photo', form.product_photo)
  }
  const remove_item__variants = (index) => {
    form.product_variant.splice(index, 1);
    if (!form.product_variant.length) {
      form.variant = false
    }
    form.product_variant.map((items, index) => {
      const IndexLawas = items.index
      console.log(items.index, IndexLawas, index)
      if (IndexLawas == items.index) {
        items.index = index
      }
    })
  }

  const run_remove__product__review = (index) => {
    form.product_photo.splice(index, 1);
    form.product_photo.map((items, index) => {
      const IndexLawas = items.index
      if (IndexLawas == items.index) {
        items.index = index
      }
    })
  }

  const remove_product__review = (index) => {
    swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!',
      
    }).then((result) => {
      if (result.isConfirmed) {
        swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
        run_remove__product__review(index)
      }
    })
  }

  const edit_product__review = (index) => {
    if (index == form.product_photo[index].index) {
      form.product_photo[index].image = event.target.files[0]
      form.product_photo[index].PreviewImage = URL.createObjectURL(event.target.files[0])
    }
    console.log(index, event, form.product_photo[index])
  }
</script>
<template lang="">
  <Head title="Add Product" />
  <DashboardLayout>
    <HeaderDasboard>
      <div class="flex items-center space-x-3">
        <Link :href="route('product')" class="inline-flex items-center justify-center rounded-md border border-transparent bg-yellow-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 sm:w-auto"> 
          <div class="flex items-center space-x-3">
              <component :is="ChevronLeftIcon" class="h-5 w-5 text-white" aria-hidden="true" /> 
               <p class=" h-5 w-auto text-white">Back</p> 
          </div> 
        </Link>
        <h3 class="text-lg font-medium leading-6 text-gray-900 ml-4 flex items-center">Create product</h3>
      </div>
    </HeaderDasboard>
    <BodyDashboard>
      <div class="relative z-0 flex flex-1 overflow-hidden">
        <MainDashboard>
          <CardDashboardLayout>
            <form @submit.prevent="submit" class="space-y-8 divide-y divide-gray-200">
            
              <CardBodyLayout>
              
                <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                  <div class="space-y-6 pt-8 sm:space-y-5 sm:pt-10">
                    <div class="space-y-6 sm:space-y-5">
                      <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="country" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Collection</label>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                          <select id="country" name="country" autocomplete="country-name" class="block w-full  rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            <option>Nike</option>
                            <option>Adidas</option>
                            <option>Vans</option>
                          </select>
                          <p class="mt-2 text-sm text-gray-500 hidden">Write a few sentences about yourself.</p>
                        </div>
                      </div>
                      <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="first-name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Title</label>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                          <TextInput id="title" type="text" v-model="form.title" required autofocus autocomplete="first-name" />
                          <p class="mt-2 text-sm text-gray-500 hidden">Write a few sentences about yourself.</p>
                        </div>
                      </div>
                      <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="about" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Description</label>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                          <textarea id="about" name="about" rows="3" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                          <p class="mt-2 text-sm text-gray-500 hidden">Write a few sentences about yourself.</p>
                        </div>
                      </div>
                      <div class="sm:grid grid-cols-3  sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="cover-photo" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Image product</label>
                        <div class="mt-1 sm:col-span-2 sm:mt-0 ">
                          <div :class="[form.product_photo.length > 1 ? 'flex flex-wrap max-w-full justify-center sm:justify-start' : 'flex  max-w-full justify-center', ' gap-2.5 rounded-md border-2 border-dashed border-gray-300 px-3 sm:pl-2.5 sm:pr-2 pt-2.5 pb-6 ']">
                            <!-- loop preview image -->
                            <div v-for="(item, index) in form.product_photo">
                              <div v-if="form.product_photo.length < 7">
                                <div :class="[item.PreviewImage ? 'hidden' : '' , 'text-center relative py-4 px-4 ']">
                                  <div class="h-32 w-32 flex flex-wrap items-center">
                                    <svg class="mx-auto h-14 w-14 text-gray-400 " stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                      <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex flex-wrap text-sm text-gray-600  absolute top-0 left-0 w-full h-full">
                                      <label for="file-upload" class=" flex-1 absolute top-0 left-0 w-full h-full cursor-pointer rounded-md bg-transparent font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                                        <input @change="upload_image(form.product_photo.length)" id="file-upload" name="file-upload" type="file" class="sr-only bg-blue-900 w-40" />
                                      </label>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                  </div>
                                </div>
                              </div>
                              <div :class="[item.PreviewImage ? '' : 'hidden', 'space-y-4 text-center border border-orange-200' ]">
                                <div class="col-span-1 flex flex-col divide-y divide-gray-200 rounded-lg bg-gray-300text-center shadow">
                                  <div class="flex flex-1 flex-col p-8 ">
                                    <img class="mx-auto h-32 w-32 flex-shrink-0 object-contain bg-gray-300" :src="item.PreviewImage" alt="" />
                                  </div>
                                  <div>
                                    <div class="-mt-px flex divide-x divide-gray-200">
                                      <div class="flex w-0 flex-1">
                                        <button @click="remove_product__review(index)" type="button" class="relative inline-flex w-0 flex-1 items-center justify-center rounded-br-lg border border-transparent py-4 text-sm font-medium text-gray-700 hover:text-gray-500">
                                          <component :is="TrashIcon" class="h-6 w-6 text-red-500" aria-hidden="true" />
                                        </button>
                                      </div>
                                      <div class="-ml-px flex w-0 flex-1 relative ">
                                        <div class="">
                                          <label for="edit_preview__image" class="block text-sm absolute top-0 left-0 w-full h-full font-medium text-gray-700 hover:cursor-pointer">
                                            <div class="flex items-center justify-center rounded-br-lg border border-transparent py-4 text-sm font-medium text-gray-700 hover:text-gray-500">
                                              <component :is="PencilSquareIcon" class="h-6 w-6 text-yellow-500 hover:cursor-pointer" aria-hidden="true" />
                                            </div>
                                            <input @change="edit_product__review(index)" class="absolute top-0 left-0 w-full h-full bg-transparent opacity-0 " type="file" />
                                          </label>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="first-name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Price</label>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                          <TextInput id="price" type="number" v-model="form.price" required autofocus autocomplete="price" />
                          <p class="mt-2 text-sm text-gray-500">Write Price</p>
                        </div>
                      </div>
                      <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="first-name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">SKU (Stock Keeping Unit)</label>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                          <TextInput id="sku" type="text" v-model="form.sku" required autofocus autocomplete="sku" />
                          <p class="mt-2 text-sm text-gray-500 hidden">Write a few sentences about yourself.</p>
                        </div>
                      </div>
                      <!-- <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="first-name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Barcode (ISBN, UPC, GTIN, etc.)</label>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                          <TextInput id="isbn" type="text" v-model="form.isbn" required autofocus autocomplete="isbn" />
                          <p class="mt-2 text-sm text-gray-500 hidden">Write a few sentences about yourself.</p>
                        </div>
                      </div> -->
                    <!--  <div class=" sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="first-name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">country</label>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                          <TextInput id="country" type="text" v-model="form.country" required autofocus autocomplete="country" />
                          <p class="mt-2 text-sm text-gray-500 hidden">Write a few sentences about yourself.</p>
                        </div>
                      </div>
                      <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="first-name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Postal Code</label>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                          <TextInput id="postal_code" type="text" v-model="form.postal_code" required autofocus autocomplete="postal_code" />
                          <p class="mt-2 text-sm text-gray-500 hidden">Write a few sentences about yourself.</p>
                        </div>
                      </div> -->
                      <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <div class="relative flex items-start">
                          <div class="flex h-5 items-center">
                            <Checkbox @change="ShowHideVarian" id="variant-checkbox" name="variant-checkbox" v-model:checked="form.variant" />
                          </div>
                          <div class="ml-3 text-sm">
                            <label for="variant-checkbox" class="font-medium text-gray-700">This product has options, like size or color</label>
                          </div>
                        </div>
                        <div :class="[ form.variant ? 'block' : 'hidden', 'sm:col-span-2']">
                          <div class="sm:grid sm:grid-cols-1 sm:items-start sm:gap-4">
                          
                            <div class="max-w-lg ">
                            
                              <!-- looping varian size ,color and etc -->
                              <div v-for="(item, index) in form.product_variant" class="flex w-full items-start justify-between p-4 border border-gray-300 rounded-md mb-4">
                                <div class="flex-1">
                                  <div class="">
                                    <div class="mt-1 flex-1 sm:mt-0 mb-4">
                                      <input @keyup="Input_Variant(index)" type="text" :id="'item_variant__'+index" :autocomplete="'item_variant__'+index" placeholder="Color, Size, Etc" class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" />
                                      <p class="mt-2 text-sm text-gray-500 hidden hidden">Write a few sentences about yourself.</p>
                                    </div>
                                  </div>
                                  <div class="mt-1 flex-1 sm:mt-0 ">
                                    <input @keyup="Input_Value(index)" type="text" :id="'item_value__'+index" :autocomplete="'item_value__'+index" class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Green, M, etc" />
                                    <p class="mt-2 text-sm text-gray-500 hidden hidden">Write a few sentences about yourself.</p>
                                  </div>
                                </div>
                                <div class="h-full flex items-start ml-4">
                                  <button @click="remove_item__variants(index)" type="button" className="inline-flex items-center rounded border border-transparent bg-transparent px-1 py-1 text-xs font-medium text-white shadow-sm hover:border-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                    <component :is="TrashIcon" class="h-6 w-6 text-red-500" aria-hidden="true" />
                                  </button>
                                </div>
                              </div>
                              <!-- end looping varian size, color and etc -->
                              <button @click="Add_Another__variants(form.product_variant.length)" type="button" :class="[form.product_variant.length < 3 ? 'block' : 'hidden', 'inline-flex items-center rounded border border-gray-400  px-2.5 py-1.5 text-sm font-medium text-gray-900 shadow-sm hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2' ]">
                                <component :is="PlusIcon" class="h-4 w-4 mr-2.5 text-gray-900" aria-hidden="true" /> Add another options
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="pt-5">
                  <div class="flex justify-end">
                    <button type="button" class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Cancel</button>
                    <button type="submit" class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
                  </div>
                </div>
              </CardBodyLayout>
            </form>
          </CardDashboardLayout>
        </MainDashboard>
      </div>
    </BodyDashboard>
  </DashboardLayout>
</template>