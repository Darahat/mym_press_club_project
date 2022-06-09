<template>
    <nav>
        <v-toolbar text class="dense">
            <v-toolbar-side-icon>
          <v-img class="mr-3" height="40" width="40"
                        src="/storage/images/others/logo.png"/>
    </v-toolbar-side-icon> 
            <v-toolbar-title class="text-uppercase black--text">
            
              

                        
                <span>{{property}}</span>
            </v-toolbar-title>
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
        </v-toolbar>
    </nav>
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
