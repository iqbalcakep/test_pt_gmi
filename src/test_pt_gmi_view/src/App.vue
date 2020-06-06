<template>
  <div id="app">
    <v-app id="inspire">
      <v-app id="inspire">  
        <v-content>
          <router-view></router-view>
        </v-content>

        <v-footer app>
          <span>&copy; 2020</span>
        </v-footer>
      </v-app>
    </v-app>
  </div>
</template>

<script>
 
export default {
  name: 'App',
  

  components: {
  },

  data: () => ({
     drawer: null,
  }),
};
</script>
