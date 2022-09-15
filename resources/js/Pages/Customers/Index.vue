<script setup>
  import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
  import { Head, Link } from '@inertiajs/inertia-vue3';
  import Pagination from '@/Components/Pagination.vue'
  import { ref } from 'vue'
  import { Inertia } from '@inertiajs/inertia';
import FlashMessage from '@/Components/FlashMessage.vue';

  defineProps({
    customers: Object
  })

  const search = ref('')

  // ref の値を取得するには .valueが必要
  const searchCustomers = () => {
    Inertia.get(route('customers.index', { search: search.value }))
  }

const deleteCustomer = id => {
  Inertia.delete(route('customers.destroy', {customer: id}), {
    onBefore: () => confirm('本当に削除しますか？')
  })
}
  </script>
  
  <template>
      <Head title="お客様検索" />
  
      <BreezeAuthenticatedLayout>
          <template #header>
              <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                  お客様検索
              </h2>
          </template>
  
          <div class="py-12">
              <div class="xl:px-8 mx-auto sm:px-6 lg:px-8">
                  <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                      <div class="p-6 bg-white border-b border-gray-200">
                        <section class="text-gray-600 body-font">
                          <div class="container px-5 py-8 mx-auto">
                            <FlashMessage />
                            <div class="flex pl-4 my-4 w-full mx-auto">
                              <div>
                                <input type="text" name="search" v-model="search">
                                <button class="bg-blue-300 text-white py-2 px-2"
                                @click="searchCustomers">検索</button>
                              </div>
                              <Link as="button" :href="route('customers.create')" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">新規登録</Link>
                            </div>
                            <div class="w-full mx-auto overflow-auto">
                              <table class="table-auto w-full text-left whitespace-no-wrap">
                                <thead>
                                  <tr>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">No</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">お名前</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">電話</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">住所</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">霊園・寺院</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">閲覧</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">修正・削除</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr v-for="customer in customers.data" :key="customer.id">
                                    <td class="px-4 py-3">{{ customer.id }}</td>
                                    <td class="px-4 py-3">{{ customer.s_name1 }} {{ customer.f_name1 }}</td>
                                    <td class="px-4 py-3">{{ customer.tel1 }}</td>
                                    <td class="px-4 py-3">{{ customer.address1 }}</td>
                                    <td class="px-4 py-3">{{ customer.temple }}</td>
                                    <td class="px-4 py-3"><Link as="button" class="mx-auto text-white bg-indigo-500 border-0 py-1 px-1 focus:outline-none hover:bg-indigo-600 rounded text-lg" :href="route('customers.show', {customer: customer.id })">表示</Link></td>
                                    <td class="px-4 py-3">
                                  <Link as="button" :href="route('customers.edit', {customer: customer.id })" class="mx-auto text-white bg-yellow-500 border-0 py-1 px-1 focus:outline-none hover:bg-yellow-600 rounded text-lg">編集</Link><button @click="deleteCustomer(customer.id)" class="mx-auto text-white bg-red-500 border-0 py-1 px-1 focus:outline-none hover:bg-red-600 rounded text-lg">削除</button></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                              <Pagination class="mt-6" :links="customers.links"></Pagination>
                        </section>
                      </div>
                  </div>
              </div>
          </div>
      </BreezeAuthenticatedLayout>
  </template>
  