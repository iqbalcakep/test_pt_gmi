<template>
    <div>
         <v-navigation-drawer
          v-model="drawer"
          app
          clipped
        >
          <v-list dense>
           <router-link to="/">
            <v-list-item link>
              <v-list-item-action>
                <v-icon>mdi-view-dashboard</v-icon>
              </v-list-item-action>
              <v-list-item-content>
                <v-list-item-title>Dashboard</v-list-item-title>
              </v-list-item-content>
            </v-list-item>
           </router-link>
           <router-link to="/category">
            <v-list-item link>
              <v-list-item-action>
                <v-icon>mdi-book</v-icon>
              </v-list-item-action>
              <v-list-item-content>
                <v-list-item-title>Category</v-list-item-title>
              </v-list-item-content>
            </v-list-item>
           </router-link>
           <router-link to="/log">
            <v-list-item link>
              <v-list-item-action>
                <v-icon>mdi-cog</v-icon>
              </v-list-item-action>
              <v-list-item-content>
                <v-list-item-title>Log</v-list-item-title>
              </v-list-item-content>
            </v-list-item>
           </router-link>
            <v-list-item link @click="logout">
              <v-list-item-action>
                <v-icon>mdi-account-off</v-icon>
              </v-list-item-action>
              <v-list-item-content>
                <v-list-item-title>Logout</v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </v-list>
        </v-navigation-drawer>
    
        <v-app-bar
          app
          clipped-left
        >
          <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
          <v-toolbar-title>Application</v-toolbar-title>
        </v-app-bar>
    </div>
</template>
<script>
  export default {
    name: 'burger',
    data(){
        return{
            drawer:null
        }
    },
    methods: {
      logout: function(){
        localStorage.removeItem('token')
        this.$router.push({name:'login'})
      }
    }
  }
  
</script>