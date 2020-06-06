<template>
      <v-container
        class="fill-height"
        fluid
      >
     <v-row
          align="center"
          justify="center"
        >
          <v-col
            cols="12"
            sm="8"
            md="4"
          >
            <v-card class="elevation-12">
              <v-toolbar
                color="primary"
                dark
                flat
              >
                <v-toolbar-title>Login Form Test PT Generasi Multi Indonusa</v-toolbar-title>
                <v-spacer></v-spacer>
              </v-toolbar>
              <v-card-text>
              <span class="red--text" v-if="message != null">{{ message }}</span>
                <v-form>
                  <v-text-field
                    label="Login"
                    name="login"
                    prepend-icon="mdi-account"
                    type="text"
                    v-model="email"
                  ></v-text-field>

                  <v-text-field
                    id="password"
                    label="Password"
                    name="password"
                    prepend-icon="mdi-lock"
                    type="password"
                    v-model="password"
                  ></v-text-field>
                </v-form>
              </v-card-text>
              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn @click="login" color="primary">Login</v-btn>
              </v-card-actions>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
</template>

<script>
  import {axios} from '../plugins/axios'
  export default {
    props: {
      source: String,
    },
    data(){
      return{
        email: null,
        password: null,
        message: null,
      }
    },
    mounted() {
    
    },
    methods: {
      login: function(){
        this.message = null
        var params = {
            'email': this.email,
            'password': this.password
        }
         axios.post(this.base_url+'auth/login', params).then(response=>{
            if(response.data.token){
              localStorage.setItem('token', response.data.token)
              this.$router.push({ path: '/' })
            }
            this.message = "Login Gagal"
         })
         .catch(()=>{
            this.message = "Login Gagal"
         })
      }
    
    }
     
  }
</script>