<script setup>
  import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
  import { Head } from '@inertiajs/inertia-vue3';
  import { reactive } from 'vue';
  import { Inertia } from '@inertiajs/inertia';
  import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
  import { Core as YubinBangoCore } from "yubinbango-core2";

  const form = reactive({
    m_name: null,
    tel1: null,
    tel2: null,
    postcode: null,
    address1: null,
    address2: null,
    temple: null,
    s_name1: null,
    f_name1: null,
    s_ruby1: null,
    f_ruby1: null,
    s_name2: null,
    f_name2: null,
    s_ruby2: null,
    f_ruby2: null,
    s_name3: null,
    f_name3: null,
    s_ruby3: null,
    f_ruby3: null,
    grave1: null,
    repair1: null,
    baltar1: null,
    bafitting1: null,
    grave2: null,
    repair2: null,
    baltar2: null,
    bafitting2: null,
    grave3: null,
    repair3: null,
    baltar3: null,
    bafitting3: null,
    grave4: null,
    repair4: null,
    baltar4: null,
    bafitting4: null,
    grave5: null,
    repair5: null,
    baltar5: null,
    bafitting5: null,
    grave6: null,
    repair6: null,
    baltar6: null,
    bafitting6: null,
    memo: null,
  })

  const fetchAddress = () => {
    new YubinBangoCore(String(form.postcode), (value) => {
      //console.log(value)
      form.address1 = value.region + value.locality + value.street
    })
  }

  const storeCustomer = () => {
    Inertia.post('/customers', form)
  }
  </script>
  
  <template>
      <Head title="お客様登録" />
  
      <BreezeAuthenticatedLayout>
          <template #header>
              <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                  お客様登録
              </h2>
          </template>
  
          <div class="py-12">
              <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                  <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                      <div class="p-6 bg-white border-b border-gray-200">
                        <BreezeValidationErrors class="mb-4" />
                        <section class="text-gray-600 body-font relative">
                          <form @submit.prevent="storeCustomer">
                          <div class="container px-5 py-8 mx-auto">
                            <div class="w-full">
                              <div class="w-1/4 flex flex-wrap right-0">
                                <label for="m_name" class="leading-7 text-sm text-gray-600">担当者</label>
                                <input type="text" id="m_name" name="m_name" v-model="form.m_name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                              </div>
                            </div>
                            <!--<div class="lg:w-1/2 md:w-2/3 mx-auto">-->
                            <div class="w-1/2 inline-block clear-both">
                              <div class="flex flex-wrap -m-2 p-2">
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label class="leading-7 text-sm text-gray-600">電話番号</label><br>
                                    1 <input type="text" id="tel1" name="tel1" v-model="form.tel1" class="w-3/5 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"><br>
                                    2 <input type="text" id="tel2" name="tel2" v-model="form.tel2" class="w-3/5 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div class="p-2 w-1/2">
                                  <div class="relative">
                                    <label for="postcode" class="leading-7 text-sm text-gray-600">郵便番号</label><br>
                                    <input type="text" id="postcode" name="postcode" @change="fetchAddress" v-model="form.postcode" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label for="address1" class="leading-7 text-sm text-gray-600">住所</label><br>
                                    <input type="text" id="address1" name="address1" v-model="form.address1" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label for="address2" class="leading-7 text-sm text-gray-600">番地</label><br>
                                    <input type="text" id="address2" name="address2" v-model="form.address2" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label for="temple" class="leading-7 text-sm text-gray-600">霊園・寺院名</label><br>
                                    <input type="text" id="temple" name="temple" v-model="form.temple" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="w-1/2 inline-block">
                              <div class="flex flex-wrap -m-2 p-2">
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label class="leading-7 text-sm text-gray-600">お名前1</label><br>
                                    <input type="text" id="s_name1" name="s_name1" v-model="form.s_name1" class="w-2/5 m-1 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    <input type="text" id="f_name1" name="f_name1" v-model="form.f_name1" class="w-2/5 m-1 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"> 様
                                  </div>
                                </div>
                                <div class="p-2 -mt-4 w-full">
                                  <div class="relative">
                                    <label class="leading-7 text-sm text-gray-600">フリガナ1</label><br>
                                    <input type="text" id="s_ruby1" name="s_ruby1" v-model="form.s_ruby1" class="w-2/5 m-1 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    <input type="text" id="f_ruby1" name="f_ruby1" v-model="form.f_ruby1" class="w-2/5 m-1 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"> 様
                                  </div>
                                </div>
                                <div class="p-2 my-2 w-full">
                                  <div class="relative">
                                    <label class="leading-7 text-sm text-gray-600">お名前2</label><br>
                                    <input type="text" id="s_name2" name="s_name2" v-model="form.s_name2" class="w-2/5 m-1 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    <input type="text" id="f_name2" name="f_name2" v-model="form.f_name2" class="w-2/5 m-1 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"> 様
                                  </div>
                                </div>
                                <div class="p-2 -mt-6 w-full">
                                  <div class="relative">
                                    <label class="leading-7 text-sm text-gray-600">フリガナ2</label><br>
                                    <input type="text" id="s_ruby2" name="s_ruby2" v-model="form.s_ruby2" class="w-2/5 m-1 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    <input type="text" id="f_ruby2" name="f_ruby2" v-model="form.f_ruby2" class="w-2/5 m-1 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"> 様
                                  </div>
                                </div>
                                <div class="p-2 my-2 w-full">
                                  <div class="relative">
                                    <label class="leading-7 text-sm text-gray-600">お名前3</label><br>
                                    <input type="text" id="s_name3" name="s_name3" v-model="form.s_name3" class="w-2/5 m-1 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    <input type="text" id="f_name3" name="f_name3" v-model="form.f_name3" class="w-2/5 m-1 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"> 様
                                  </div>
                                </div>
                                <div class="p-2 -mt-6 w-full">
                                  <div class="relative">
                                    <label class="leading-7 text-sm text-gray-600">フリガナ3</label><br>
                                    <input type="text" id="s_ruby3" name="s_ruby3" v-model="form.s_ruby3" class="w-2/5 m-1 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    <input type="text" id="f_ruby3" name="f_ruby3" v-model="form.f_ruby3" class="w-2/5 m-1 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"> 様
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="w-full">
                              <table class="w-full">
                                <thead>
                                  <tr>
                                    <th class="w-1/4">
                                      墓
                                    </th>
                                    <th class="w-1/4">
                                      改修工事
                                    </th>
                                    <th class="w-1/4">
                                      仏壇
                                    </th>
                                    <th class="w-1/4">
                                      仏具
                                    </th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>
                                      <input type="text" id="grave1" name="grave1" v-model="form.s_grave1" class="w-full m-1 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </td>
                                    <td>
                                      <input type="text" id="repair1" name="repair1" v-model="form.repair1" class="w-full m-1 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </td>
                                    <td>
                                      <input type="text" id="baltar1" name="baltar1" v-model="form.baltar1" class="w-full m-1 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </td>
                                    <td>
                                      <input type="text" id="bafittings1" name="bafittings1" v-model="form.bafittings1" class="w-full m-1 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <input type="text" id="grave2" name="grave2" v-model="form.s_grave2" class="w-full m-1 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </td>
                                    <td>
                                      <input type="text" id="repair2" name="repair2" v-model="form.repair2" class="w-full m-1 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </td>
                                    <td>
                                      <input type="text" id="baltar2" name="baltar2" v-model="form.baltar2" class="w-full m-1 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </td>
                                    <td>
                                      <input type="text" id="bafittings2" name="bafittings2" v-model="form.bafittings2" class="w-full m-1 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <input type="text" id="grave3" name="grave3" v-model="form.s_grave3" class="w-full m-1 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </td>
                                    <td>
                                      <input type="text" id="repair3" name="repair3" v-model="form.repair3" class="w-full m-1 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </td>
                                    <td>
                                      <input type="text" id="baltar3" name="baltar3" v-model="form.baltar3" class="w-full m-1 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </td>
                                    <td>
                                      <input type="text" id="bafittings3" name="bafittings3" v-model="form.bafittings3" class="w-full m-1 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <input type="text" id="grave4" name="grave4" v-model="form.s_grave4" class="w-full m-1 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </td>
                                    <td>
                                      <input type="text" id="repair4" name="repair4" v-model="form.repair4" class="w-full m-1 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </td>
                                    <td>
                                      <input type="text" id="baltar4" name="baltar4" v-model="form.baltar4" class="w-full m-1 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </td>
                                    <td>
                                      <input type="text" id="bafittings4" name="bafittings4" v-model="form.bafittings4" class="w-full m-1 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <input type="text" id="grave5" name="grave5" v-model="form.s_grave5" class="w-full m-1 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </td>
                                    <td>
                                      <input type="text" id="repair5" name="repair5" v-model="form.repair5" class="w-full m-1 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </td>
                                    <td>
                                      <input type="text" id="baltar5" name="baltar5" v-model="form.baltar5" class="w-full m-1 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </td>
                                    <td>
                                      <input type="text" id="bafittings5" name="bafittings5" v-model="form.bafittings5" class="w-full m-1 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <input type="text" id="grave6" name="grave6" v-model="form.s_grave6" class="w-full m-1 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </td>
                                    <td>
                                      <input type="text" id="repair6" name="repair6" v-model="form.repair6" class="w-full m-1 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </td>
                                    <td>
                                      <input type="text" id="baltar6" name="baltar6" v-model="form.baltar6" class="w-full m-1 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </td>
                                    <td>
                                      <input type="text" id="bafittings6" name="bafittings6" v-model="form.bafittings6" class="w-full m-1 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label for="memo" class="leading-7 text-sm text-gray-600">備考</label>
                                    <textarea id="memo" name="memo" v-model="form.memo" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                                  </div>
                                </div>
                                <div class="p-2 w-full">
                                  <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">登録</button>
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
  