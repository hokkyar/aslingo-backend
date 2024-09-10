<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="px-6 pb-4 text-black text-2xl font-semibold">
                    You're logged in!
                </div>
                <div class="px-6 text-black text-xl font-medium">
                    Welcome to ExpreSign Dashboard
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
