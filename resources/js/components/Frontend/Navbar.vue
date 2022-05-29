<template>
    <nav>
        <v-toolbar text>
            <v-toolbar-title class="text-uppercase grey--text">
                <span>{{property}}</span>
            </v-toolbar-title>
            <v-spacer></v-spacer>
            <div v-for="item in items" :key="item.title" link>
                <router-link style="text-decoration: none;" data-toggle="collapse" :to="{ name: item.route }">
                    <v-btn text color="grey">{{ item.title }}</v-btn>
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
        created() {
            // alert("Hello Everyone.I am Created");
            this.property = 'Mymensingh Press Club'
        },
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
                items: [{
                        title: 'Home',
                        icon: 'mdi-home-city',
                        route: 'home'
                    },
                    {
                        title: 'About',
                        icon: 'mdi-account',
                        route: 'about'
                    },
                    {
                        title: 'Add Post',
                        icon: 'mdi-account-group-outline',
                        route: 'bannerForm'
                    },
                ],
            }
        }

    }
</script>
