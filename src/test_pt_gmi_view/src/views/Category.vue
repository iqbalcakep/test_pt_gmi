<template>
  <div class="category">
      <burger/>
      <v-toolbar flat color="white">
        <v-toolbar-title>Category List</v-toolbar-title>
       </v-toolbar>
       <hr/>
       <table class="newtable">
        <thead>
          <tr>
            <th
              v-for="header in headers"
              :key="header.value"
              class="text-md-center"
            >
                {{ header.text }}
            </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="item in data" :key="item.id">
            <td class="text-xs-center">
              {{ item.id }}
            </td>
            <td class="text-xs-center">
              {{ item.name }}
            </td>
            <td class="text-xs-center">
              {{ item.description }}
            </td>
            <td class="text-xs-center">
              <v-tooltip top>
                <template v-slot:activator="{ on }">
                  <v-btn
                    text
                    icon
                    color="orange"
                    @click="edit(item.name)"
                    v-on="on"
                  >
                    <v-icon>mdi-pencil</v-icon>
                  </v-btn>
                </template>
                <span>Edit ({{ item.name }})</span>
              </v-tooltip>
            </td>
          </tr>
        </tbody>
       </table>
       <div class="text-xs-center pt-2">
        <v-pagination
          v-model="page"
          :total-visible="5"
          :length="pagination.length"
          @input="input"
        />
      </div>
  </div>
</template>

<script>
// @ is an alias to /src
import {axios} from '../plugins/axios'

export default {
  name: 'Category',
  
  data() {
    return {
      data: [],
      headers: [
        { text: 'ID', value: 'id' },
        { text: 'Name', value: 'name' },
        { text: 'Description', value: 'description' },
        { text: 'Action', value: 'action'}
      ],
      pagination: {
        rowsPerPage: 20,
        totalItems: 1,
        links: {
          previous: '',
          next: '',
        },
        length: 1,
      },
      page: 1,
    }
  },
  mounted() {
    console.log('hai')
    this.fetchApi(this.base_url+'category')
  },
  methods: {
    fetchApi: function(url){
      axios.get(url)
      .then(response=>{
          this.data = response.data.data
          this.pagination.rowsPerPage = response.data.per_page
          this.pagination.totalItems = response.data.total
          this.pagination.links.previous = response.data.prev_page_url
          this.pagination.links.next = response.data.next_page_url
          this.pagination.length = response.data.last_page
      })
      .catch(function(){
       
      })
    },
    input(number) {
      return this.fetchApi(
        this.base_url+'category?page='+number
      )
    },
    next() {
      return this.fetchApi(this.pagination.links.next)
    },
    previous() {
      return this.fetchApi(this.pagination.links.previous)
    },
  }

}
</script>
<style scoped>
  .newtable {
    width: 100%;
    border-collapse: collapse;
    table-layout: fixed;
}
/* Zebra striping */

.newtable tr:nth-of-type(odd) {
    background: #fff;
}

.newtable th {
    background: #fff;
    padding: 10px;
    font-weight: bold;
    border-top: 2px solid #000;
    border-bottom: 2px solid #000;
}

.newtable td {
    padding: 2px;
    text-align: center
}

.longcell {
    width: 45%;
}
</style>