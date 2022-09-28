<script setup>
  import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
  import { Head, Link } from '@inertiajs/inertia-vue3';
  import Pagination from '@/Components/Pagination.vue';
  import { Inertia } from '@inertiajs/inertia';
import FlashMessage from '@/Components/FlashMessage.vue';
  import { onMounted } from 'vue';
  

var tableToCSVadmin = {
  export: function(elm /*, delimiter */) {
    var table = elm;
    var rows  = this.getRows(table);
    var lines = [];
    var delimiter = delimiter || ',';

    for (var i = 0, numOfRows = rows.length; i < numOfRows; i++) {
      var cols    = this.getCols(rows[i]);
      var line = [];

      for (var j = 0, numOfCols = cols.length-2; j < numOfCols; j++) {
          var text = cols[j].textContent || cols[j].innerText;
          text = '"'+text.replace(/"/g, '""')+'"';

          line.push(text);
      }

      lines.push(line.join(delimiter));
    }

    this.saveAsFile(lines.join("\r\n"));
  },

  saveAsFile: function(csv) {
    var blob = new Blob([csv], {type: 'text/csv'});
    var url  = URL.createObjectURL(blob);

    var a = document.createElement("a");

    a.href = url;
    a.target = '_blank';
    a.download = 'table.csv';

    a.click();
  },

  getRows: function(elm){
    return Util.getNodesByName(elm, 'tr');
  },

  getCols: function(elm){
    return Util.getNodesByName(elm, ['td', 'th']);
  }
}

var Util = {
  getNodesByName: function(elm /*, string or array*/) {
    var children  = elm.childNodes;
    var nodeNames = ('string' === typeof arguments[1]) ? [arguments[1]] : arguments[1] ;
    nodeNames = nodeNames.map(function(str){ return str.toLowerCase() });

    var results  = [];

    for (var i = 0, max = children.length; i < max; i++ ) {
      if (nodeNames.indexOf(children[i].nodeName.toLowerCase()) !== -1)
      {
         results.push(children[i]);
      }
      else
      {
         results = results.concat(this.getNodesByName(children[i], nodeNames));
      }
    }

    return results;
  }
}

var tableToCSV = {
  export: function(elm /*, delimiter */) {
    var table = elm;
    var rows  = this.getRows(table);
    var lines = [];
    var delimiter = delimiter || ',';

    for (var i = 0, numOfRows = rows.length; i < numOfRows; i++) {
      var cols    = this.getCols(rows[i]);
      var line = [];

      for (var j = 0, numOfCols = cols.length-1; j < numOfCols; j++) {
          var text = cols[j].textContent || cols[j].innerText;
          text = '"'+text.replace(/"/g, '""')+'"';

          line.push(text);
      }

      lines.push(line.join(delimiter));
    }

    this.saveAsFile(lines.join("\r\n"));
  },

  saveAsFile: function(csv) {
    var blob = new Blob([csv], {type: 'text/csv'});
    var url  = URL.createObjectURL(blob);

    var a = document.createElement("a");

    a.href = url;
    a.target = '_blank';
    a.download = 'table.csv';

    a.click();
  },

  getRows: function(elm){
    return Util.getNodesByName(elm, 'tr');
  },

  getCols: function(elm){
    return Util.getNodesByName(elm, ['td', 'th']);
  }
}

var Util = {
  getNodesByName: function(elm /*, string or array*/) {
    var children  = elm.childNodes;
    var nodeNames = ('string' === typeof arguments[1]) ? [arguments[1]] : arguments[1] ;
    nodeNames = nodeNames.map(function(str){ return str.toLowerCase() });

    var results  = [];

    for (var i = 0, max = children.length; i < max; i++ ) {
      if (nodeNames.indexOf(children[i].nodeName.toLowerCase()) !== -1)
      {
         results.push(children[i]);
      }
      else
      {
         results = results.concat(this.getNodesByName(children[i], nodeNames));
      }
    }

    return results;
  }
}

window.onload = function(){
  if(document.getElementById('download_admin')){document.getElementById('download_admin').addEventListener('click', function (e){ e.preventDefault(); tableToCSVadmin.export(document.getElementById('tbl')); })};
  if(document.getElementById('download')){document.getElementById('download').addEventListener('click', function (e){ e.preventDefault(); tableToCSV.export(document.getElementById('tbl')); })};
}

  // defineProps({
  //   customers: Object
  // })
  const props = defineProps({
    customers: Object,
    tel: String,
    sname: String,
    fname: String,
    sruby: String,
    fruby: String,
    post: String,
    address: String,
    temple: String,
    grave: String,
    repair: String,
    baltar: String,
    bafittings: String,
    memo: String
  })


  onMounted(() => {
    console.log(props.customers)
    console.log(props.customers.total)
    console.log(props.tel)
    console.log(props.pg)
  })


  // const form = reactive({
  //   tel: $requst-> session() ->get('tel'),
  //   post: null,
  //   address: null,
  //   temple: null,
  //   sname: null,
  //   fname: null,
  //   sruby: null,
  //   fruby: null,
  //   grave: null,
  //   repair: null,
  //   baltar: null,
  //   bafittings: null,
  //   memo: null
  // })

  // const tel = ref('')
  // const temple = ref('')
  

  // ref の値を取得するには .valueが必要
  // const searchCustomers = () => {
  //   Inertia.get(route('customers.index', {
  //      tel: sessionStorage('tel'),
  //      sname: sname.value,
  //      fname: fname.value,
  //      sruby: sruby.value,
  //      fruby: fruby.value,
  //      post: post.value,
  //      address: address.value,
  //      temple: temple.value,
  //      grave: grave.value,
  //      repair: repair.value,
  //      valtar: valtar.value,
  //      bafitting:bafitting.value,
  //      memo: memo.value
  //     }))
  // }
  

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
              <h2 class="font-extrabold py-0 my-0 text-xl text-white leading-tight">
                  お客様検索
              </h2>
          </template>

          <div id="app" class="">
              <div class="xl:px-8 mx-auto sm:px-6 lg:px-8">
                  <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                      <div class="p-6 bg-white">
                        <div class="search">
                          <form>

                            <div class="form-gruop">
                              <div class="w-1/2 float-left">
                                <div class="py-1">
                                  <label for="" class="w-1/5 text-right inline-block">電話番号　</label>
                                      <input type="text" id="tel" name="tel" v-model="tel" class="w-1/3 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                <div class="py-1">
                                  <label for="" class="w-1/5 text-right inline-block">名前　</label>
                                      <input type="text" id="sname" name="sname" v-model="sname" class="w-1/3 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">　
                                      <input type="text" id="fname" name="fname" v-model="fname" class="w-1/3 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                <div class="py-1">
                                  <label for="" class="w-1/5 text-right inline-block">フリガナ　</label>
                                      <input type="text" id="sruby" name="sruby" v-model="sruby" class="w-1/3 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">　
                                      <input type="text" id="fruby" name="fruby" v-model="fruby" class="w-1/3 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                <div class="py-1">
                                  <label for="" class="w-1/5 text-right inline-block">郵便番号　</label>
                                      <input type="text" id="post" name="post" v-model="post" class="w-1/3 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                <div class="py-1">
                                  <label for="" class="w-1/5 text-right inline-block">住所　</label>
                                      <input type="text" id="address" name="address" v-model="address" class="w-2/3 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                <div class="py-1">
                                  <label for="" class="w-1/5 text-right inline-block">霊園・寺院　</label>
                                      <input type="text" id="temple" name="temple" v-model="temple" class="w-2/3 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                              <div class="w-1/2 float-right">
                                <div class="py-1">
                                  <label for="" class="w-1/5 text-right inline-block">墓　</label>
                                      <input type="text" id="grave" name="grave" v-model="grave" class="w-1/3 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                <div class="py-1">
                                  <label for="" class="w-1/5 text-right inline-block">改修工事　</label>
                                      <input type="text" id="repair" name="repair" v-model="repair" class="w-1/3 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                <div class="py-1">
                                  <label for="" class="w-1/5 text-right inline-block">仏壇　</label>
                                      <input type="text" id="baltar" name="baltar" v-model="baltar" class="w-1/3 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                <div class="py-1">
                                  <label for="" class="w-1/5 text-right inline-block">仏具　</label>
                                      <input type="text" id="bafittings" name="bafittings" v-model="bafittings" class="w-1/3 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                <div class="py-1">
                                  <label for="" class="w-1/5 text-right inline-block">備考　</label>
                                      <input type="textarea" id="memo" name="memo" v-model="memo" class="w-2/3 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out resize-none">
                                </div>
                              </div>
                                <div class="p-2 w-full clear-both">
                                  <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg" @click="searchCustomers">検索</button>
                                </div>
                            </div>
                          </form>

                        </div>
                      </div>
                  </div>
              </div>
          </div>
  
          <div class="py-12">
              <div class="xl:px-8 mx-auto sm:px-6 lg:px-8">
                  <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                      <div class="p-6 bg-white border-b border-gray-200">
                        <section class="text-gray-600 body-font">
                          <div class="container px-5 py-8 mx-auto">
                            <FlashMessage />
                            
                            <div class="flex pl-4 my-4 w-full mx-auto">
                              <div>
                                <!-- <input type="text" name="search" v-model="search" @click="searchCustomers"> -->
                                <!-- <input type="text" name="temple" v-model="temple" @click="searchTemples"> -->
                                <!-- 　<button class="bg-blue-300 text-white py-2 px-2"
                                @click="searchCustomers">検索</button> -->
                              </div>
                              <Link as="button" :href="route('customers.create')" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-10 focus:outline-none hover:bg-indigo-600 rounded">新規登録</Link>
                            </div>
                            <div class="w-full mx-auto">
                              <table id="tbl" class="table-auto w-full text-left whitespace-no-wrap table-striped index">
                                <thead>
                                  <tr>
                                    <th class="text-center border-r border-gray-400 px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">No</th>
                                    <th class="text-center border-r border-gray-400 px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">お名前</th>
                                    <th class="text-center border-r border-gray-400 px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">電話</th>
                                    <th class="text-center border-r border-gray-400 px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">住所</th>
                                    <th class="text-center border-r border-gray-400 px-4 py-3 title-font trackiωng-wider font-medium text-gray-900 text-sm bg-gray-100">霊園・寺院</th>
                                    <th class="text-center px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">閲覧</th>
                                    <th v-if="$page.props.auth.user.admin === 1" class="text-center border-l border-gray-400 px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">修正・削除</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr v-for="customer in customers.data" :key="customer.id">
                                    <td class="px-4 py-3">{{ customer.id }}</td>
                                    <td class="px-4 py-3">{{ customer.s_name1 }} {{ customer.f_name1 }}</td>
                                    <td class="px-4 py-3">{{ customer.tel1 }}</td>
                                    <td class="px-4 py-3">{{ customer.address1 }}</td>
                                    <td class="px-4 py-3">{{ customer.temple }}</td>
                                    <td class="px-4 py-3 text-center"><Link as="button" class="w-20 mx-auto text-white bg-indigo-500 border-0 py-1 px-1 focus:outline-none hover:bg-indigo-600 rounded text-lg" :href="route('customers.show', {customer: customer.id })">表示</Link></td>
                                    <td v-if="$page.props.auth.user.admin === 1" class="w-52 px-2 py-3 text-center">
                                  <Link as="button" :href="route('customers.edit', {customer: customer.id })" class="w-20 mx-auto text-white bg-yellow-500 border-0 py-1 px-1 focus:outline-none hover:bg-yellow-600 rounded text-lg">修正</Link>　<button @click="deleteCustomer(customer.id)" class="w-20 mx-auto text-white bg-red-500 border-0 py-1 px-1 focus:outline-none hover:bg-red-600 rounded text-lg">削除</button></td>
                                  </tr>
                                </tbody>
                              </table>
                              <div v-if="$page.props.auth.user.admin === 1" class="text-right pt-5 border-t"><a href="#" id="download_admin" class="mx-auto bg-cyan-500 border-0 py-1.5 px-6 font-black focus:outline-none hover:bg-cyan-600 rounded text-lg">表示情報のCSV出力</a></div>
                              <div v-if="$page.props.auth.user.admin === 0" class="text-right pt-5 border-t"><a href="#" id="download" class="mx-auto bg-cyan-500 border-0 py-1.5 px-6 font-black focus:outline-none hover:bg-cyan-600 rounded text-lg">表示情報のCSV出力</a></div>
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
  
  <css>
    .index tr:nth-child(odd) {
      background: #E1E9EE; /* 奇数行の背景色を指定する */
    }
  </css>