<template>
    <v-list-tile :to="{ name: menuItem.route }">
        <v-list-tile-action v-if='menuItem.icon'>
            <v-icon color="main">{{ menuItem.icon }}</v-icon>
        </v-list-tile-action>

        <v-list-tile-content>
            <v-list-tile-title>
                {{ menuItem.label }}
            </v-list-tile-title>
        </v-list-tile-content>


    </v-list-tile>
</template>

<script>

export default {
    name: "nav-button",

    props: ["menuItem"],
};
</script>

<style lang="scss" scoped>
.v-navigation-drawer--mini-variant {
    .v-list__group__items--no-action .v-list__tile {
        padding: 0 16px;
    }
}

a:hover {
    text-decoration: none;
}
</style>
