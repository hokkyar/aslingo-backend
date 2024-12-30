<template>
    <h2 class="text-lg">
        <span
            v-for="(item, index) in items"
            :key="index"
            class="inline-flex items-center"
        >
            <!-- Apply blue color to the last item -->
            <Link
                v-if="item.url"
                :href="item.url"
                class="mx-2 text-gray hover:text-primary1"
            >
                {{ item.label }}
            </Link>
            <!-- For items without a URL, style as gray -->
            <span v-else class="text-lightblue">
                {{ item.label }}
            </span>
            <!-- Arrow separator, only show if not the last item -->
            <span v-if="index < items.length - 1" class="mx-2 text-gray">
                &gt;
            </span>
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
