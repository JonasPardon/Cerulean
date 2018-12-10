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

            <nav-item
                v-for="(item, index) in menuItems"
                :key="index"
                :menuItem="item" />

            <!-- <v-list-tile 
                v-for="navItem in menuItems" 
                :key='navItem.name'
                @click='navItemClick(navItem)' >

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

            </v-list-tile> -->
      </v-list>
    </v-navigation-drawer>
</template>

<script>
// components
import NavItem from './Item';

// variables
import menuItems from './../../navigation';

export default {
    name: 'navigation',
    components: {
        'nav-item': NavItem,
    },
    props: {
        drawer: {
            default: true
        }
    },
    data() {
        return {
            menuItems: menuItems
        }
    },
    mounted () {
        // console.log(menuItems);
    },
    methods: {
        navItemClick(item) {
            alert(item.name);
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
