<template>
  <div class="category">
      <burger/>
      <v-toolbar flat color="white">
        <v-toolbar-title>Log List</v-toolbar-title>
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
              {{ item.user }}
            </td>
            <td class="text-xs-center">
              {{ item.ip }}
            </td>
            <td class="text-xs-center">
              {{ item.userAgent }}
            </td>
            <td class="text-xs-center">
              {{ item.date }}
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
      data:[
        {
          user:null,
          ip: null,
          userAgent: null,
          date:null
        }
      ],
      headers: [
        { text: 'User', value: 'user' },
        { text: 'IP', value: 'ip' },
        { text: 'User Agent', value: 'userAgent' },
        { text: 'Date', value: 'date'}
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
    this.fetchApi(this.base_url+'user/logs')
  },
  methods: {
    fetchApi: function(url){
      axios.get(url)
      .then(response=>{
          response.data.data.map(d=>{
            this.data.push(
              {
                user:d.user.email,
                ip:d.ip,
                userAgent:d.user_agent,
                date:d.created_at
              }
            )
          })
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