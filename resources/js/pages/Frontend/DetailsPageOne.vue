<template>
    <v-layout v-if="details">
        <v-flex xs12 sm12 offset-sm0>
            <v-card flat>
               
                <div v-for="detail in details" :key="detail.id">
                    <v-img class="animated fadeInRightBig white--text" height="400px"
                        :src="'/storage/images/menus/'+detail.image">
                        <v-container fill-height fluid>
                            <v-layout fill-height>
                                <v-flex xs12 align-end flexbox mt-5 pt-5>
                                    <span class="white--text">{{detail.created_at}}</span>
                                    <br>
                                    <span class="headline"></span>
                                </v-flex>
                            </v-layout>
                        </v-container>
                    </v-img>
                    <v-container fill-height fluid>
                        <v-layout fill-height>
                            <v-flex xs0 sm3 justify offset-sm0 mr-5 mt-3 pt-3>
                            </v-flex>
                            <v-flex xs12 sm6 justify offset-sm0 mr-5 mt-3 pt-3>
                                <span class="headline">{{detail.title}}</span>
                                <p style="line-height:30px; font-size:12px;text-align:justify; word-space:1px">
                                    {{stripHtml(detail.Document1)}}

                                </p>
                                <v-spacer></v-spacer>
                            </v-flex>
                            <v-flex xs0 sm3 justify offset-sm0 mr-5 mt-3 pt-3>
                            </v-flex>
                        </v-layout>
                    </v-container>
                </div>
            </v-card>
        </v-flex>
    </v-layout>
</template>
<script>
    export default {

        
        created() {

            this.routevalue = this.$route.params.token;
            console.log(this.routevalue);
            window.axios.get('api/menu/show/' + this.routevalue).then(res => {
                console.log(res.data);
                this.details = res.data

            })
        },

         beforeRouteLeave(to, from, next) {
            // router.setRoutes;
          },
        //   destroyed() {
        //     console.log("first destroyed", this.$route.path);
        //   },

        data() {
            return {
                details: [],
                routevalue: ''

            }
        },

        watch: {
            $route(to, from) {
                this.show = false;
                console.log(to.params.token);
                this.routevalue = to.params.token;
                window.axios.get('api/menu/show/' + this.routevalue).then(res => {
                    console.log(res.data);
                    this.details = res.data

                })
            },

        },
        methods: {

            stripHtml(html) {
                let tmp = document.createElement("DIV");
                tmp.innerHTML = html;
                return tmp.textContent || tmp.innerText || "";
            }
        }

        //    mounted(){
        //         console.log('mounted');
        //    },

        //  beforeRouteLeave(to, from, next) {
        //     console.log("leaving first");
        //    // this runs before running the destroyed hook
        //   },
        //   destroyed() {
        //     console.log("first destroyed", this.$route.path);
        //   },


    }

</script>
