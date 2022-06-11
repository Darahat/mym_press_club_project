<style>
.v-toolbar--prominent .v-toolbar__content {
    align-items: center;
}
</style>
<template>
     <!-- <v-card
    color="grey lighten-4"
    flat
    height="200px"
    tile
  >
    <v-toolbar extended>
            <v-toolbar-content>
            <v-app-bar-nav-icon>
          <v-img class="mr-3" height="40" width="40"
                        src="/storage/images/others/logo.png"/>
    </v-app-bar-nav-icon> 
            <v-toolbar-title class="text-uppercase black--text">
            
              

                        
                <span>{{property}}</span>
            </v-toolbar-title>
            <v-spacer></v-spacer>
           
            </v-toolbar-content>
        </v-toolbar>
    </v-card> -->


    
    <v-toolbar  dense
  elevation="10"
  flat
  outlined
  prominent
  rounded
  shaped>
  
          
    
     <v-app-bar-nav-icon style="align-items: center;margin-left: 50px;">
            <v-img class="mr-3"  src="/storage/images/others/logo.png"  height="80" width="80"> 
            </v-img>
     </v-app-bar-nav-icon>
      <v-toolbar-title  style="align-self: center">{{property}}</v-toolbar-title>

      <v-spacer></v-spacer>

      <a style="text-decoration: none;" href="/"> <v-btn text color="black"  >  Home</v-btn></a>
                
            <div v-for="item in menues" :key="item.id" link>
                <router-link style="text-decoration: none;" data-toggle="collapse" :to="{
                 name: 'detailsPageOne',
                params: {
                  token: item.name,
                }}"
               >
                    <v-btn text color="black">{{ item.name }}</v-btn>
                </router-link>
            </div>
             <router-link style="text-decoration: none;" data-toggle="collapse" :to="{
                 name: 'auth',
                }"
               >
                    <v-btn text color="black">Login</v-btn>
                </router-link>
        <!-- <a style="text-decoration: none;" href="/auth"> <v-btn text color="black"  >  login</v-btn></a> -->
    </v-toolbar>
 
</template>
<script>
    export default {
//         beforeCreate() {
//             alert("Hello Everyone.I am Before Created");
//             this.property = 'Mymensingh Press Club'

//         },
      
//         beforeMount() {
//             alert("Hello Everyone.I am beforeMount");
//         },
//         mounted() {
//     console.log(`At this point, vm.$el has been created and el has been replaced.`);
//     console.log(this.$el.textContent) // Example component.
//     alert(this.$el);
//   },
        data() {
            return {
                property: '',
                drawer: false,
                menues:[],
               
            }
        },
        created() {
               this.property = 'ময়মনসিংহ প্রেসক্লাব'
            window.axios.get('/api/menus').then(res => {
                console.log(res.data);
                this.menues = res.data

            })
        },
        methods:{
            alertme(route){
                alert('adf');
              this.$router.push(route)

            }
        }

    }
</script>
