<template>
<v-app>
     <v-card>
            <adminNavbar></adminNavbar>
        </v-card>
        <v-container>
            <v-main>
                <v-card class="  pa-6">
                    <router-view></router-view>
                </v-card>
            </v-main>
        </v-container>
        <v-footer class="caption" app inset>
            <div class="px-2">
                Copyright &copy; &mdash; Your company
            </div>
        </v-footer>
</v-app>
</template>