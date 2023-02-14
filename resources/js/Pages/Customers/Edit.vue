<script setup>
  import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
  import { Head } from '@inertiajs/inertia-vue3';
  import { reactive } from 'vue';
  import { Inertia } from '@inertiajs/inertia'
  import BreezeValidationErrors from '@/Components/ValidationErrors.vue';

  const props = defineProps({
    customer: Object
  })

  const form = reactive({
    id: props.customer.id,
    m_name: props.customer.m_name,
    tel1: props.customer.tel1,
    tel2: props.customer.tel2,
    postcode: props.customer.postcode,
    address1: props.customer.address1,
    address2: props.customer.address2,
    temple: props.customer.temple,
    s_name1: props.customer.s_name1,
    f_name1: props.customer.f_name1,
    s_ruby1: props.customer.s_ruby1,
    f_ruby1: props.customer.f_ruby1,
    s_name2: props.customer.s_name2,
    f_name2: props.customer.f_name2,
    s_ruby2: props.customer.s_ruby2,
    f_ruby2: props.customer.f_ruby2,
    s_name3: props.customer.s_name3,
    f_name3: props.customer.f_name3,
    s_ruby3: props.customer.s_ruby3,
    f_ruby3: props.customer.f_ruby3,
    grave1: props.customer.grave1,
    repair1: props.customer.repair1,
    baltar1: props.customer.baltar1,
    bafittings1: props.customer.bafittings1,
    grave2: props.customer.grave2,
    repair2: props.customer.repair2,
    baltar2: props.customer.baltar2,
    bafittings2: props.customer.bafittings2,
    grave3: props.customer.grave3,
    repair3: props.customer.repair3,
    baltar3: props.customer.baltar3,
    bafittings3: props.customer.bafittings3,
    grave4: props.customer.grave4,
    repair4: props.customer.repair4,
    baltar4: props.customer.baltar4,
    bafittings4: props.customer.bafittings4,
    grave5: props.customer.grave5,
    repair5: props.customer.repair5,
    baltar5: props.customer.baltar5,
    bafittings5: props.customer.bafittings5,
    grave6: props.customer.grave6,
    repair6: props.customer.repair6,
    baltar6: props.customer.baltar6,
    bafittings6: props.customer.bafittings6,
    memo: props.customer.memo
  })

  const updateCustomer = id => {
    Inertia.put(route('customers.update', {customer: id}), form, {
      onBefore: () => confirm('本当に更新しますか？')
    })
  }
  
  </script>
  
  <template>
      <Head title="お客様編集" />
  
      <BreezeAuthenticatedLayout>
          <template #header>
              <h2 class="font-semibold text-xl text-white leading-tight -my-3">
                  お客様編集
              </h2>
          </template>
  
          <div class="py-12">
              <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                  <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                      <div class="p-6 bg-white border-b border-gray-200">
                        <BreezeValidationErrors class="mb-4" />
                        <section class="text-gray-600 body-font relative">
                          <form @submit.prevent="updateCustomer(form.id)">
                          <div class="container px-5 py-8 mx-auto">
                            <div class="w-full">
                              <div class="w-1/4 block float-right mr-9">
                                <div class="-mb-2"><label for="id" class="leading-3 text-sm text-gray-600">NO</label></div>
                                <div id="id" class="w-full border-b border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-5 transition-colors duration-200 ease-in-out">{{ customer.id }}</div>
                                <div class="-mb-1"><label for="m_name" class="leading-3 text-sm text-gray-600">担当者</label></div>
                                <input type="text" id="m_name" name="m_name" v-model="form.m_name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                              </div>
                              <div class="clear-both"></div>
                            </div>
                            <!--<div class="lg:w-1/2 md:w-2/3 mx-auto">-->
                            <div class="w-1/2 inline-block clear-both">
                              <div class="flex flex-wrap -m-2 p-2 pr-10">
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <div class="-mb-2"><label class="leading-3 text-sm text-blue-800">電話番号<span class="text-red-800">「-」無し</span></label></div>
                                    <span class="text-blue-800">1　</span> <input type="text" id="tel1" name="tel1" v-model="form.tel1" class="w-2/3 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 my-1 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"><br>
                                    <span class="text-blue-800">2　</span> <input type="text" id="tel2" name="tel2" v-model="form.tel2" class="w-2/3 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 my-1 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div class="p-2 w-1/2 mt-1">
                                  <div class="relative">
                                    <div class="-mb-1"><label for="postcode" class="leading-3 text-sm text-blue-800">郵便番号<span class="text-red-800">「-」無し</span></label></div>
                                    <input type="text" id="postcode" name="postcode" v-model="form.postcode" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div class="p-2 w-full mt-1">
                                  <div class="relative">
                                    <div class="-mb-1"><label for="address1" class="leading-3 text-sm text-blue-800">住所</label></div>
                                    <input type="text" id="address1" name="address1" v-model="form.address1" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div class="p-2 w-full mt-1">
                                  <div class="relative">
                                    <div class="-mb-1"><label for="address2" class="leading-3 text-sm text-blue-800">番地</label></div>
                                    <input type="text" id="address2" name="address2" v-model="form.address2" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div class="p-2 w-full mt-1">
                                  <div class="relative">
                                    <div class="-mb-1"><label for="temple" class="leading-3 text-sm text-blue-800">霊園・寺院名</label></div>
                                    <input type="text" id="temple" name="temple" v-model="form.temple" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="w-1/2 inline-block">
                              <div class="flex flex-wrap -m-2 p-1 pl-10">
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <div class="-mb-2"><label class="leading-3 text-sm text-blue-800">お名前1</label></div>
                                    <input type="text" id="s_name1" name="s_name1" v-model="form.s_name1" class="w-5/12 m-1 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    <input type="text" id="f_name1" name="f_name1" v-model="form.f_name1" class="w-5/12 m-1 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">　様
                                  </div>
                                </div>
                                <div class="p-2 -mt-4 w-full">
                                  <div class="relative">
                                    <div class="-mb-2"><label class="leading-3 text-sm text-blue-800">フリガナ1</label></div>
                                    <input type="text" id="s_ruby1" name="s_ruby1" v-model="form.s_ruby1" class="w-5/12 m-1 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    <input type="text" id="f_ruby1" name="f_ruby1" v-model="form.f_ruby1" class="w-5/12 m-1 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">　様
                                  </div>
                                </div>
                                <div class="p-2 my-2 w-full">
                                  <div class="relative">
                                    <div class="-mb-2"><label class="leading-3 text-sm text-blue-800">お名前2</label></div>
                                    <input type="text" id="s_name2" name="s_name2" v-model="form.s_name2" class="w-5/12 m-1 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    <input type="text" id="f_name2" name="f_name2" v-model="form.f_name2" class="w-5/12 m-1 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">　様
                                  </div>
                                </div>
                                <div class="p-2 -mt-6 w-full">
                                  <div class="relative">
                                    <div class="-mb-2"><label class="leading-3 text-sm text-blue-800">フリガナ2</label></div>
                                    <input type="text" id="s_ruby2" name="s_ruby2" v-model="form.s_ruby2" class="w-5/12 m-1 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    <input type="text" id="f_ruby2" name="f_ruby2" v-model="form.f_ruby2" class="w-5/12 m-1 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">　様
                                  </div>
                                </div>
                                <div class="p-2 my-2 w-full">
                                  <div class="relative">
                                    <div class="-mb-2"><label class="leading-3 text-sm text-blue-800">お名前3</label></div>
                                    <input type="text" id="s_name3" name="s_name3" v-model="form.s_name3" class="w-5/12 m-1 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    <input type="text" id="f_name3" name="f_name3" v-model="form.f_name3" class="w-5/12 m-1 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">　様
                                  </div>
                                </div>
                                <div class="p-2 -mt-6 w-full">
                                  <div class="relative">
                                    <div class="-mb-2"><label class="leading-3 text-sm text-blue-800">フリガナ3</label></div>
                                    <input type="text" id="s_ruby3" name="s_ruby3" v-model="form.s_ruby3" class="w-5/12 m-1 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    <input type="text" id="f_ruby3" name="f_ruby3" v-model="form.f_ruby3" class="w-5/12 m-1 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">　様
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="w-full mt-7">
                              <table class="w-full">
                                <thead>
                                  <tr>
                                    <th class="w-1/4 px-2 h-10">
                                      <div class=" bg-blue-700 text-white rounded py-3">墓</div>
                                    </th>
                                    <th class="w-1/4 px-2 h-10">
                                      <div class=" bg-blue-700 text-white rounded py-3">改修工事</div>
                                    </th>
                                    <th class="w-1/4 px-2 h-10">
                                      <div class=" bg-blue-700 text-white rounded py-3">仏壇</div>
                                    </th>
                                    <th class="w-1/4 px-2 h-10">
                                      <div class=" bg-blue-700 text-white rounded py-3">仏具</div>
                                    </th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td class="px-2 py-1">
                                      <input type="text" id="grave1" name="grave1" v-model="form.grave1" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out mt-1">
                                    </td>
                                    <td class="px-2 py-1">
                                      <input type="text" id="repair1" name="repair1" v-model="form.repair1" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out mt-1">
                                    </td>
                                    <td class="px-2 py-1">
                                      <input type="text" id="baltar1" name="baltar1" v-model="form.baltar1" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out mt-1">
                                    </td>
                                    <td class="px-2 py-1">
                                      <input type="text" id="bafittings1" name="bafittings1" v-model="form.bafittings1" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out mt-1">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="px-2 py-1">
                                      <input type="text" id="grave2" name="grave2" v-model="form.grave2" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </td>
                                    <td class="px-2 py-1">
                                      <input type="text" id="repair2" name="repair2" v-model="form.repair2" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </td>
                                    <td class="px-2 py-1">
                                      <input type="text" id="baltar2" name="baltar2" v-model="form.baltar2" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </td>
                                    <td class="px-2 py-1">
                                      <input type="text" id="bafittings2" name="bafittings2" v-model="form.bafittings2" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="px-2 py-1">
                                      <input type="text" id="grave3" name="grave3" v-model="form.grave3" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </td>
                                    <td class="px-2 py-1">
                                      <input type="text" id="repair3" name="repair3" v-model="form.repair3" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </td>
                                    <td class="px-2 py-1">
                                      <input type="text" id="baltar3" name="baltar3" v-model="form.baltar3" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </td>
                                    <td class="px-2 py-1">
                                      <input type="text" id="bafittings3" name="bafittings3" v-model="form.bafittings3" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="px-2 py-1">
                                      <input type="text" id="grave4" name="grave4" v-model="form.grave4" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </td>
                                    <td class="px-2 py-1">
                                      <input type="text" id="repair4" name="repair4" v-model="form.repair4" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </td>
                                    <td class="px-2 py-1">
                                      <input type="text" id="baltar4" name="baltar4" v-model="form.baltar4" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </td>
                                    <td class="px-2 py-1">
                                      <input type="text" id="bafittings4" name="bafittings4" v-model="form.bafittings4" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="px-2 py-1">
                                      <input type="text" id="grave5" name="grave5" v-model="form.grave5" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </td>
                                    <td class="px-2 py-1">
                                      <input type="text" id="repair5" name="repair5" v-model="form.repair5" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </td>
                                    <td class="px-2 py-1">
                                      <input type="text" id="baltar5" name="baltar5" v-model="form.baltar5" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </td>
                                    <td class="px-2 py-1">
                                      <input type="text" id="bafittings5" name="bafittings5" v-model="form.bafittings5" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="px-2 py-1">
                                      <input type="text" id="grave6" name="grave6" v-model="form.grave6" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </td>
                                    <td class="px-2 py-1">
                                      <input type="text" id="repair6" name="repair6" v-model="form.repair6" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </td>
                                    <td class="px-2 py-1">
                                      <input type="text" id="baltar6" name="baltar6" v-model="form.baltar6" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </td>
                                    <td class="px-2 py-1">
                                      <input type="text" id="bafittings6" name="bafittings6" v-model="form.bafittings6" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                                <div class="p-2 w-full mt-7">
                                  <div class="relative">
                                    <div class="bg-blue-700 text-white rounded p-3 pl-5 mb-2"><label for="memo" class="leading-3 font-bold">備考</label></div>
                                    <textarea id="memo" name="memo" v-model="form.memo" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                                  </div>
                                </div>
                                <div class="p-2 w-full">
                                  <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-14 focus:outline-none hover:bg-indigo-600 rounded text-lg">更新</button>
                                </div>
                            </div>
                          </div>
                        </form>
                        </section>
                      </div>
                  </div>
              </div>
          </div>
      </BreezeAuthenticatedLayout>
  </template>
  