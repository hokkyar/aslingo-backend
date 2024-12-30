<template>
    <h2>
        <span v-for="(item, index) in items" :key="index">
            <Link v-if="item.url" :href="item.url">{{ item.label }}</Link>
            <span v-else>{{ item.label }}</span>
            <span v-if="index < items.length - 1"> &gt; </span>
        </span>
    </h2>
</template>

<script>
import { Link } from "@inertiajs/vue3";

export default {
    components: {
        Link,
    },
    props: {
        items: {
            type: Array,
            required: true,
        },
    },
};
</script>
