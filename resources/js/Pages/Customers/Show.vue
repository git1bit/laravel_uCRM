<script setup>
  import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
  import { Head, Link } from '@inertiajs/inertia-vue3';
  import { nl2br } from '@/common';
import { Inertia } from '@inertiajs/inertia';

  defineProps({
    customer: Object
  })

  const deleteCustomer = id => {
    Inertia.delete(route('customers.destroy', {customer: id}), {
      onBefore: () => confirm('本当に削除しますか？')
    })
  }

  </script>
  
  <template>
      <Head title="お客様情報詳細" />
  
      <BreezeAuthenticatedLayout>
          <template #header>
              <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                  お客様情報詳細
              </h2>
          </template>
  
          <div class="py-12">
              <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                  <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                      <div class="p-6 bg-white border-b border-gray-200">
                        <section class="text-gray-600 body-font relative">
                          <div class="container px-5 py-8 mx-auto">
                            <div class="w-full">
                              <div class="w-1/4 flex flex-wrap right-0">
                                <label for="m_name" class="leading-7 text-sm text-gray-600">担当者</label>
                                <div id="m_name" class="w-full border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  {{ customer.m_name }}
                                </div>
                              </div>
                            </div>
                            <!--<div class="lg:w-1/2 md:w-2/3 mx-auto">-->
                            <div class="w-1/2 inline-block clear-both">
                              <div class="flex flex-wrap -m-2 p-2">
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label class="leading-7 text-sm text-gray-600">電話番号</label><br>
                                    1 <div id="tel1" class="w-3/5 border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.tel1 }}</div>
                                    2 <div id="tel2" class="w-3/5 border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.tel2 }}</div>
                                  </div>
                                </div>
                                <div class="p-2 w-1/2">
                                  <div class="relative">
                                    <label for="postcode" class="leading-7 text-sm text-gray-600">郵便番号</label><br>
                                    <div id="postcode" class="w-full border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.postcode }}</div>
                                  </div>
                                </div>
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label for="address1" class="leading-7 text-sm text-gray-600">住所</label><br>
                                    <div id="address1" class="w-full border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.address1 }}</div>
                                  </div>
                                </div>
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label for="address2" class="leading-7 text-sm text-gray-600">番地</label><br>
                                    <div id="address2" class="w-full border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.address2 }}</div>
                                  </div>
                                </div>
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label for="temple" class="leading-7 text-sm text-gray-600">霊園・寺院名</label><br>
                                    <div id="temple" class="w-full border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.temple }}</div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="w-1/2 inline-block">
                              <div class="flex flex-wrap -m-2 p-2">
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label class="leading-7 text-sm text-gray-600">お名前1</label><br>
                                    <div id="s_name1" class="w-2/5 m-1 border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.s_name1 }}</div>
                                    <div id="f_name1" class="w-2/5 m-1 border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.f_name1 }}</div> 様
                                  </div>
                                </div>
                                <div class="p-2 -mt-4 w-full">
                                  <div class="relative">
                                    <label class="leading-7 text-sm text-gray-600">フリガナ1</label><br>
                                    <div id="s_ruby1" class="w-2/5 m-1 border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.s_suby1 }}</div>
                                    <div id="f_ruby1" class="w-2/5 m-1 border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.f_ruby1 }}</div> 様
                                  </div>
                                </div>
                                <div class="p-2 my-2 w-full">
                                  <div class="relative">
                                    <label class="leading-7 text-sm text-gray-600">お名前2</label><br>
                                    <div id="s_name2" class="w-2/5 m-1 border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.s_name2 }}</div>
                                    <div id="f_name2" class="w-2/5 m-1 border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.f_name2 }}</div> 様
                                  </div>
                                </div>
                                <div class="p-2 -mt-6 w-full">
                                  <div class="relative">
                                    <label class="leading-7 text-sm text-gray-600">フリガナ2</label><br>
                                    <div id="s_ruby2" class="w-2/5 m-1 border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.s_ruby2 }}</div>
                                    <div id="f_ruby2" class="w-2/5 m-1 border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.f_ruby2 }}</div> 様
                                  </div>
                                </div>
                                <div class="p-2 my-2 w-full">
                                  <div class="relative">
                                    <label class="leading-7 text-sm text-gray-600">お名前3</label><br>
                                    <div id="s_name3" class="w-2/5 m-1 border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.s_name3 }}</div>
                                    <div id="f_name3" class="w-2/5 m-1 border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.f_name3 }}</div> 様
                                  </div>
                                </div>
                                <div class="p-2 -mt-6 w-full">
                                  <div class="relative">
                                    <label class="leading-7 text-sm text-gray-600">フリガナ3</label><br>
                                    <div id="s_ruby3" class="w-2/5 m-1 border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.s_ruby3 }}</div>
                                    <div id="f_ruby3" class="w-2/5 m-1 border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.f_ruby3 }}</div> 様
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
                                      <div id="grave1" class="w-full m-1 border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.grave1 }}</div>
                                    </td>
                                    <td>
                                      <div id="repair1" class="w-full m-1 border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.repair1 }}</div>
                                    </td>
                                    <td>
                                      <div id="baltar1" class="w-full m-1 border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.baltar1 }}</div>
                                    </td>
                                    <td>
                                      <div id="bafittings1" class="w-full m-1 border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.bafittings1 }}</div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <div id="grave2" class="w-full m-1 border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.grave2 }}</div>
                                    </td>
                                    <td>
                                      <div id="repair2" class="w-full m-1 border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.repair2 }}</div>
                                    </td>
                                    <td>
                                      <div id="baltar2" class="w-full m-1 border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.baltar2 }}</div>
                                    </td>
                                    <td>
                                      <div id="bafittings2" class="w-full m-1 border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.bafittings2 }}</div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <div id="grave3" class="w-full m-1 border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.grave3 }}</div>
                                    </td>
                                    <td>
                                      <div id="repair3" class="w-full m-1 border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.repair3 }}</div>
                                    </td>
                                    <td>
                                      <div id="baltar3" class="w-full m-1 border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.baltar3 }}</div>
                                    </td>
                                    <td>
                                      <div id="bafittings3" class="w-full m-1 border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.bafittings3 }}</div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <div id="grave4" class="w-full m-1 border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.grave4 }}</div>
                                    </td>
                                    <td>
                                      <div id="repair4" class="w-full m-1 border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.repair4 }}</div>
                                    </td>
                                    <td>
                                      <div id="baltar4" class="w-full m-1 border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.baltar4 }}</div>
                                    </td>
                                    <td>
                                      <div id="bafittings4" class="w-full m-1 border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.bafittings4 }}</div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <div id="grave5" class="w-full m-1 border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.grave5 }}</div>
                                    </td>
                                    <td>
                                      <div id="repair5" class="w-full m-1 border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.repair5 }}</div>
                                    </td>
                                    <td>
                                      <div id="baltar5" class="w-full m-1 border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.baltar5 }}</div>
                                    </td>
                                    <td>
                                      <div id="bafittings5" class="w-full m-1 border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.bafittings5 }}</div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <div id="grave6" class="w-full m-1 border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.grave6 }}</div>
                                    </td>
                                    <td>
                                      <div id="repair6" class="w-full m-1 border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.repair6 }}</div>
                                    </td>
                                    <td>
                                      <div id="baltar6" class="w-full m-1 border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.baltar6 }}</div>
                                    </td>
                                    <td>
                                      <div id="bafittings6" class="w-full m-1 border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.bafittings6 }}</div>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label for="memo" class="leading-7 text-sm text-gray-600">備考</label>
                                    <div id="memo" v-html="nl2br(customer.memo)" class="w-full overflow-y-auto border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></div>
                                  </div>
                                </div>
                                <div class="p-2 w-full">
                                  <Link as="button" :href="route('customers.edit', {customer: customer.id })" class="flex mx-auto text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 rounded text-lg">編集</Link>
                                </div>
                                <div class="mt-20 p-2 w-full">
                                  <button @click="deleteCustomer(customer.id)" class="flex mx-auto text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg">削除</button>
                                </div>
                            </div>
                          </div>
                        </section>
                      </div>
                  </div>
              </div>
          </div>
      </BreezeAuthenticatedLayout>
  </template>
  