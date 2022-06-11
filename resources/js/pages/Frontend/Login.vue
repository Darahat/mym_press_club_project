<template>

    <v-main>
        <v-container fluid fill-height>
            <v-layout align-center justify-center>
                <v-flex xs12 sm8 md4>
                    <v-card class="elevation-12">
                        <v-toolbar dark color="primary">
                            <v-toolbar-title>{{isRegister ? stateObj.register.name : stateObj.login.name}} form
                            </v-toolbar-title>
                        </v-toolbar>
                        <v-card-text>
                            <form ref="form" @submit.prevent="isRegister ? register() : login()">

                                <v-text-field v-model="name" name="name" label="name" type="text" placeholder="name"
                                    required></v-text-field>

                                <v-text-field v-model="password" name="password" label="Password" type="password"
                                    placeholder="password" required></v-text-field>

                                <v-text-field v-if="isRegister" v-model="confirmPassword" name="confirmPassword"
                                    label="Confirm Password" type="password" placeholder="cocnfirm password" required>
                                </v-text-field>
                                <div class="red--text"> {{errorMessage}}</div>
                                <v-btn type="submit" class="mt-4" color="primary" value="log in">
                                    {{isRegister ? stateObj.register.name : stateObj.login.name}}</v-btn>
                                <div class="grey--text mt-4" v-on:click="isRegister = !isRegister;">
                                    {{toggleMessage}}
                                </div>
                            </form>
                        </v-card-text>
                    </v-card>

                </v-flex>
            </v-layout>
        </v-container>
    </v-main>

</template>

<script>
    export default {
        name: "App",
        data() {
            return {
                name: "",
                csrf: document.head.querySelector('meta[name="csrf-token"]').content,
                password: "",
                confirmPassword: "",
                isRegister: false,
                errorMessage: "",
                stateObj: {
                    register: {
                        name: 'Register',
                        message: 'Aleady have an Acoount? login.'
                    },
                    login: {
                        name: 'Member Login',
                        message: 'Register'
                    }
                }
            };
        },
        methods: {
            login(e) {
                const {
                    name
                } = this;
                const {
                    password
                } = this;
                console.log(name + "logged in")

                var formData = new FormData();
                formData.append('name', name);
                formData.append('password', password);

                axios.post('api/customLogin', formData)
                    .then((response) => {


                        this.$store.dispatch('setToken', response.data.token)
                        this.$store.dispatch('setUser', name)
                        this.$store.dispatch('isUserLoggedIn', true)
                        this.$router.push({
                            name: 'bannerList'
                        })
                    }).catch(function (error) {

                        alert(error);
                    });
            },
            register() {
                if (this.password == this.confirmPassword) {
                    this.isRegister = false;
                    this.errorMessage = "";
                    const {
                        name
                    } = this;
                    const {
                        password
                    } = this;
                    console.log(name + "logged in")

                    var formData = new FormData();
                    formData.append('name', name);
                    formData.append('password', password);
                    axios.post('api/customRegistration', formData)
                        .then((response) => {
                            console.log(response.data);
                            this.snackbar = true;
                            this.message = "Success";
                            console.log(this.snackbar);
                        }).catch(function (error) {

                            alert(error);
                        });
                    this.$refs.form.reset();
                } else {
                    this.errorMessage = "password did not match"
                }
            }
        },
        computed: {
            toggleMessage: function () {
                return this.isRegister ? this.stateObj.register.message : this.stateObj.login.message
            }
        }
    };

</script>
