<template>
    <v-navigation-drawer
      v-model="drawer"
      fixed
      app
    >
      <v-list dense>
            <div class="logo-wrapper">
                <!-- <div style="margin: 10%;" v-html="require(`./../../assets/laravel_logo.png`)" ></div> -->
                <img src="./../../assets/laravel_logo.png" alt="Logo">
            </div>
            <v-list-tile 
                v-for="navItem in navItems" 
                :key='navItem.name'
                @click='navItemClick(navItem.name)' >

                <v-list-tile-action>
                    <v-icon>
                        {{ navItem.icon }}
                    </v-icon>
                </v-list-tile-action>
                <v-list-tile-content>
                    <v-list-tile-title>
                        {{ navItem.label }}
                    </v-list-tile-title>
                </v-list-tile-content>

            </v-list-tile>
      </v-list>
    </v-navigation-drawer>
</template>

<script>
import navItems from './../../navigation';

export default {
    name: 'navigation',
    components: {
        
    },
    props: {
        drawer: {
            default: true
        }
    },
    data() {
        return {
            navItems: navItems
        }
    },
    mounted () {
        // console.log(navItems);
    },
    methods: {
        navItemClick(item) {
            alert(item);
        }
    }
}
</script>

<style lang="scss" scoped>
.logo-wrapper {
    max-width: 100%;

    img {
        max-width: 100%;
    }
}
</style>
