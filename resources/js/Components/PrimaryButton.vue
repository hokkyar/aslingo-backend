<script>
import { Link } from "@inertiajs/vue3";

export default {
    components: { Link },
    props: {
        title: {
            type: String,
            required: true,
        },
        isLink: {
            type: Boolean,
        },
        routeName: {
            type: String,
        },
        idParam: {
            type: Number,
            default: null,
        },
    },
};
</script>

<template>
    <template v-if="isLink">
        <Link
            class="bg-primary1 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-text uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
            as="button"
            :href="route(routeName, idParam)"
        >
            {{ title }}
        </Link>
    </template>

    <template v-else>
        <button
            class="bg-primary1 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-text uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
        >
            {{ title }}
        </button>
    </template>
</template>
