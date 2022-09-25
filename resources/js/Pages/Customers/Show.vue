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
              <h2 class="font-semibold text-xl text-white leading-tight -my-3">
                  お客様情報詳細
              </h2>
          </template>
  
          <div class="py-12 dspy0">
              <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                  <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                      <div class="p-6 bg-white border-b border-gray-200">
                        <section class="text-gray-600 body-font relative">
                          <div class="container px-5 py-8 mx-auto">
                            <div class="w-full">
                              <div class="w-1/4 block float-right mr-20">
                                <label for="id" class="leading-7 text-sm text-gray-600">NO</label>
                                <div id="id" class="w-full border-b border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.id }}</div>
                                <label for="m_name" class="leading-7 text-sm text-gray-600">担当者</label>
                                <div id="m_name" class="w-full border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  {{ customer.m_name }}
                                </div>
                              </div>
                              <div class="clear-both"></div>
                            </div>
                            <!--<div class="lg:w-1/2 md:w-2/3 mx-auto">-->
                            <div class="w-1/2 inline-block clear-both">
                              <div class="flex flex-wrap -m-2 p-2">
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label class="leading-7 text-sm text-gray-600">電話番号</label><br>
                                    <div id="tel1" class="w-2/5 inline-block border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.tel1 }}</div>
                                    <div v-if="customer.tel2" id="tel2" class="w-2/5 inline-block border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.tel2 }}</div>
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
                                    <div id="address2" class="w-full border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"><span v-if="customer.address2">{{ customer.address2 }}</span>　</div>
                                  </div>
                                </div>
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label for="temple" class="leading-7 text-sm text-gray-600">霊園・寺院名</label><br>
                                    <div id="temple" class="w-full border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"><span v-if="customer.temple">{{ customer.temple }}</span>　</div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="w-1/2 inline-block">
                              <div class="flex flex-wrap -m-2 p-2">
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label class="leading-7 text-sm text-gray-600">お名前1</label><br>
                                    <div id="s_name1" class="w-4/5 m-1 border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.s_name1 }} {{ customer.f_name1 }} 様</div>
                                  </div>
                                </div>
                                <div class="p-2 -mt-4 w-full">
                                  <div class="relative">
                                    <label class="leading-7 text-sm text-gray-600">フリガナ1</label><br>
                                    <div id="s_ruby1" class="w-4/5 m-1 border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.s_ruby1 }} {{ customer.f_ruby1 }} 様</div>
                                  </div>
                                </div>
                                <div v-if="customer.f_name2" class="p-2 my-2 w-full">
                                  <div class="relative">
                                    <label class="leading-7 text-sm text-gray-600">お名前2</label><br>
                                    <div id="s_name2" class="w-4/5 m-1 border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.s_name2 }} {{ customer.f_name2 }} 様</div>
                                  </div>
                                </div>
                                <div v-if="customer.f_ruby2" class="p-2 -mt-6 w-full">
                                  <div class="relative">
                                    <label class="leading-7 text-sm text-gray-600">フリガナ2</label><br>
                                    <div id="s_ruby2" class="w-4/5 m-1 border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.s_ruby2 }} {{ customer.f_ruby2 }} 様</div>
                                  </div>
                                </div>
                                <div v-if="customer.f_name3" class="p-2 my-2 w-full">
                                  <div class="relative">
                                    <label class="leading-7 text-sm text-gray-600">お名前3</label><br>
                                    <div id="s_name3" class="w-4/5 m-1 border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.s_name3 }} {{ customer.f_name3 }} 様</div>
                                  </div>
                                </div>
                                <div v-if="customer.f_ruby3" class="p-2 -mt-6 w-full">
                                  <div class="relative">
                                    <label class="leading-7 text-sm text-gray-600">フリガナ3</label><br>
                                    <div id="s_ruby3" class="w-4/5 m-1 border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ customer.s_ruby3 }} {{ customer.f_ruby3 }} 様</div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="w-full">
                              <table class="w-full">
                                <thead class=" bg-indigo-200">
                                  <tr>
                                    <th class="border border-gray-500 w-1/4 p-2 font-normal">
                                      墓
                                    </th>
                                    <th class="border border-gray-500 w-1/4 p-2 font-normal">
                                      改修工事
                                    </th>
                                    <th class="border border-gray-500 w-1/4 p-2 font-normal">
                                      仏壇
                                    </th>
                                    <th class="border border-gray-500 w-1/4 p-2 font-normal">
                                      仏具
                                    </th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td class=" bg-gray-50 border border-gray-500 p-2">
                                      <span v-if="customer.grave1">{{ customer.grave1 }}</span>　
                                    </td>
                                    <td class=" bg-gray-50 border border-gray-500 p-2">
                                      {{ customer.repair1 }}
                                    </td>
                                    <td class=" bg-gray-50 border border-gray-500 p-2">
                                      {{ customer.baltar1 }}
                                    </td>
                                    <td class=" bg-gray-50 border border-gray-500 p-2">
                                      {{ customer.bafittings1 }}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class=" bg-gray-50 border border-gray-500 p-2">
                                      {{ customer.grave2 }}
                                    </td>
                                    <td class=" bg-gray-50 border border-gray-500 p-2">
                                      {{ customer.repair2 }}
                                    </td>
                                    <td class=" bg-gray-50 border border-gray-500 p-2">
                                      {{ customer.baltar2 }}
                                    </td>
                                    <td class=" bg-gray-50 border border-gray-500 p-2">
                                      {{ customer.bafittings2 }}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class=" bg-gray-50 border border-gray-500 p-2">
                                      {{ customer.grave3 }}
                                    </td>
                                    <td class=" bg-gray-50 border border-gray-500 p-2">
                                      {{ customer.repair3 }}
                                    </td>
                                    <td class=" bg-gray-50 border border-gray-500 p-2">
                                      {{ customer.baltar3 }}
                                    </td>
                                    <td class=" bg-gray-50 border border-gray-500 p-2">
                                      {{ customer.bafittings3 }}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class=" bg-gray-50 border border-gray-500 p-2">
                                      {{ customer.grave4 }}
                                    </td>
                                    <td class=" bg-gray-50 border border-gray-500 p-2">
                                      {{ customer.repair4 }}
                                    </td>
                                    <td class=" bg-gray-50 border border-gray-500 p-2">
                                      {{ customer.baltar4 }}
                                    </td>
                                    <td class=" bg-gray-50 border border-gray-500 p-2">
                                      {{ customer.bafittings4 }}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class=" bg-gray-50 border border-gray-500 p-2">
                                      {{ customer.grave5 }}
                                    </td>
                                    <td class=" bg-gray-50 border border-gray-500 p-2">
                                      {{ customer.repair5 }}
                                    </td>
                                    <td class=" bg-gray-50 border border-gray-500 p-2">
                                      {{ customer.baltar5 }}
                                    </td>
                                    <td class=" bg-gray-50 border border-gray-500 p-2">
                                      {{ customer.bafittings5 }}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class=" bg-gray-50 border border-gray-500 p-2">
                                      {{ customer.grave6 }}
                                    </td>
                                    <td class=" bg-gray-50 border border-gray-500 p-2">
                                      {{ customer.repair6 }}
                                    </td>
                                    <td class=" bg-gray-50 border border-gray-500 p-2">
                                      {{ customer.baltar6 }}
                                    </td>
                                    <td class=" bg-gray-50 border border-gray-500 p-2">
                                      {{ customer.bafittings6 }}
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label for="memo" class="leading-7 text-sm text-gray-600">備考</label>
                                    <div v-if="customer.memo === ''" id="memo" class="w-full overflow-y-auto border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">
                                      {{ customer.memo }}
                                    </div>
                                    <div v-else-if="customer.memo" id="memo" v-html="nl2br(customer.memo)" class="w-full overflow-y-auto border-b-2 border-dotted border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></div>
                                  </div>
                                </div>
                                <div v-if="$page.props.auth.user.admin === 1" class="dspnn p-2 w-full">
                                  <Link as="button" :href="route('customers.edit', {customer: customer.id})" class="flex mx-auto text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 rounded text-lg">編集</Link>
                                </div>
                                <div v-if="$page.props.auth.user.admin === 1" class="dspnn mt-5 p-2 w-full">
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
  
<css>
  @media print {
      .dspnn {
          display:none;
      }
      .dspy0 {
        margin-top: -3rem;
      }
  }
</css>