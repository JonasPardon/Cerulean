<template>
    <div>
        <router-view :menu="menu"></router-view>
    </div>
</template>

<script>
export default {
    name: "base",
    props: ["menu"],
};
</script>

<style lang="scss">
</style>
