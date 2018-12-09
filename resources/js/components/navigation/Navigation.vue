<template>
    <v-navigation-drawer
      v-model="drawer"
      fixed
      app
    >
      <v-list dense>
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


        <!-- <v-list-tile @click="alert('1')">
          <v-list-tile-action>
            <v-icon>home</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>Home</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
        <v-list-tile @click="alert(2)">
          <v-list-tile-action>
            <v-icon>contact_mail</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>Contact</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile> -->
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
        console.log(navItems);
    },
    methods: {
        navItemClick(item) {
            alert(item);
        }
    }
}
</script>

<style lang="scss" scoped>

</style>
