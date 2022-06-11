<template>
    <nav>
        <v-toolbar text>
            <v-app-bar-nav-icon class="grey--text" @click="drawer= !drawer"></v-app-bar-nav-icon>
            <v-toolbar-title class="text-uppercase grey--text">
                <span>Admin Panel</span>
             </v-toolbar-title>
          <v-spacer></v-spacer>
           <v-btn   v-if="$store.state.user" class="btn btn-danger"    @click="logout"
               >Logout
                 </v-btn> 
        </v-toolbar>
        <v-navigation-drawer app absolute temporary floating clipped v-model="drawer">
            <v-list-item>
                <v-list-item-avatar>
                    <v-img src="https://randomuser.me/api/portraits/men/78.jpg"></v-img>
                </v-list-item-avatar>
                <v-list-item-content>
                    <v-list-item-title>{{$store.state.user}}</v-list-item-title>
                </v-list-item-content>
            </v-list-item>
            <v-divider></v-divider>
            <v-list dense>
                <v-list-item v-for="item in items" :key="item.title" link>
                 
                    <v-list-item-icon>
                        <v-icon>{{ item.icon }}</v-icon>
                    </v-list-item-icon>
                    <router-link style="text-decoration: none;" data-toggle="collapse"
                                :to="{ path: item.route }">
                    <v-list-item-content>
                        <v-list-item-title>
                           {{ item.title }} 
                        </v-list-item-title>
                    </v-list-item-content>
                    </router-link>
                </v-list-item>
                
            </v-list>
        </v-navigation-drawer>
    </nav>
</template>
<script>
 
    export default {
        data() {
            return {
                drawer: false,
                items: [{
                        title: 'Add Menu',
                        icon: 'mdi-home-city',
                        route: '/menuform'
                    },
                    {
                        title: 'Menu List',
                        icon: 'mdi-account-group-outline',
                        route: '/menuList'
                    },
                    {
                        title: 'Add New Banner',
                        icon: 'mdi-account',
                        route: 'bannerform'
                    },
                    {
                        title: 'Banner List',
                        icon: 'mdi-account-group-outline',
                        route: '/bannerList'
                    },
                ],
            }
           
        },
         methods:{
            logout(){
                      this.$store.dispatch('setToken', null)
                      this.$store.dispatch('setUser', null)
                      this.$store.dispatch('isUserLoggedIn', false)
                     this.$router.push({
          name: 'home'
        })
            }
            }
              
    }

</script>
