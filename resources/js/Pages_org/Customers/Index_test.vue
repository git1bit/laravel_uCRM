<script setup>
  import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
  import { Head } from '@inertiajs/inertia-vue3';
  //import { onMounted } from 'vue'
  import Pagination from '@/Components/Pagination.vue'

  defineProps({
    customers: Object
  })

  // onMounted(() => {
  //   console.log(props.customers)
  //   console.log(props.customers.last_page)
  // })
  </script>
  
  <template>
    <ul v-for="customer in customers.data" :key="customer.id">
      <li>{{ customer.id }}</li>
      <li>{{ customer.s_name1 }} {{ customer.f_name1 }}</li>
    </ul>
    <Pagination class="mt-6" :links="customers.links"></Pagination>
    
  </template>
  