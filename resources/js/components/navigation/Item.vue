<template>

    <v-divider v-if="menuItem.type === 'divider'" />

    <nav-button
        v-else-if="!menuItem.children"
        :menuItem="menuItem" />

    <v-list-group
        v-else
        no-action
        :value="shouldBeExpanded"
        :prepend-icon="menuItem.icon">

        <v-list-tile
            slot="activator">

            <v-list-tile-title>
                {{ menuItem.label }}
            </v-list-tile-title>
        </v-list-tile>

        <nav-button
            v-for="child in menuItem.children"
            :key="child.name"
            :menuItem="child" />
        
    </v-list-group>

</template>

<script>

import Button from "./Button";

export default {
    name: "nav-item",

    components: {
        'nav-button': Button,
    },

    props: ["menuItem"],

    data() {
        return {
            current: null,
        };
    },

    mounted() {
        this.current = this.inModule(this.$route);
    },

    methods: {
        inModule($route) {
            if ($route && $route.name) {
                const parts = $route.name.split(".");
                if (parts.length === 0) {
                    return false;
                }
                return parts[0];
            }
            return false;
        },
    },

    computed: {
        shouldBeExpanded() {
            let $actives = [];
            $actives.push(this.menuItem.route);

            if (this.menuItem.children) {
                this.menuItem.children.forEach((child) => {
                    $actives.push(child.route.split(".")[0]);
                });
            }

            return $actives.indexOf(this.current) > -1;
        },
    },

    watch: {
        $route(to, from) {
            this.current = this.inModule(to);
        },
    },
};
</script>

<style lang="scss">
.navigation-drawer {
    .expansion-panel {
        box-shadow: none;

        .expansion-panel__header {
            font-size: 14px;
            font-weight: 500;
            display: flex;
            height: 48px;
            text-decoration: none;
            align-items: center;
            padding: 0 16px;
            margin: 0;
            position: relative;
            user-select: none;

            &:hover {
                background-color: rgba(0, 0, 0, 0.12);
            }

            .list__tile__action {
                float: left !important;
            }

            .list__tile__title {
                max-width: calc(100% - 56px);
            }
        }

        .expansion-panel__body {
            .list__tile {
                &:hover {
                    background-color: rgba(0, 0, 0, 0.12);
                }
            }

            .list__tile__title {
                padding-left: 56px;
                font-size: 14px;
                font-weight: 500;
            }
        }
    }
}
</style>