<template>
    <Head title="Create Material" />

    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Header -->
                <h2
                    class="font-semibold text-2xl text-gray-800 leading-tight mb-4"
                >
                    Create Material For {{ lesson.lesson_name }}
                </h2>

                <div class="bg-white p-6 shadow-lg rounded-lg">
                    <div v-if="form.errors" class="mb-4 text-danger">
                        <small>{{ form.errors }}</small>
                    </div>

                    <!-- Form -->
                    <form @submit.prevent="handleSubmit" class="space-y-6">
                        <!-- Material Name -->
                        <div>
                            <InputLabel
                                for="material_name"
                                value="Material Name"
                                class="text-lg font-semibold text-gray-700"
                            />
                            <TextInput
                                v-model="form.material_name"
                                id="material_name"
                                type="text"
                                class="block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary1 focus:border-transparent"
                                required
                                autofocus
                            />
                            <InputError class="mt-2 text-danger" />
                        </div>

                        <!-- Text English -->
                        <div>
                            <InputLabel
                                for="text_en"
                                value="Text English"
                                class="text-lg font-semibold text-gray-700"
                            />
                            <TextInput
                                v-model="form.text_en"
                                id="text_en"
                                type="text"
                                class="block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary1 focus:border-transparent"
                                required
                            />
                            <InputError class="mt-2 text-danger" />
                        </div>

                        <!-- Text Indonesia -->
                        <div>
                            <InputLabel
                                for="text_id"
                                value="Text Indonesia"
                                class="text-lg font-semibold text-gray-700"
                            />
                            <TextInput
                                v-model="form.text_id"
                                id="text_id"
                                type="text"
                                class="block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary1 focus:border-transparent"
                                required
                            />
                            <InputError class="mt-2 text-danger" />
                        </div>

                        <!-- Text Illustration -->
                        <div>
                            <InputLabel
                                for="text_illustration"
                                value="Text Illustration"
                                class="text-lg font-semibold text-gray-700"
                            />
                            <TextInput
                                v-model="form.text_illustration"
                                id="text_illustration"
                                type="text"
                                class="block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary1 focus:border-transparent"
                            />
                            <InputError class="mt-2 text-danger" />
                        </div>

                        <!-- File Inputs -->
                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                            <!-- Cover -->
                            <div>
                                <InputLabel
                                    for="cover"
                                    value="Cover"
                                    class="text-lg font-semibold text-gray-700"
                                />
                                <input
                                    @input="form.cover = $event.target.files[0]"
                                    id="cover"
                                    type="file"
                                    class="block w-full p-2 mt-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary1"
                                    accept="image/*"
                                />
                            </div>

                            <!-- Head Picture -->
                            <div>
                                <InputLabel
                                    for="head_pic"
                                    value="Head Picture"
                                    class="text-lg font-semibold text-gray-700"
                                />
                                <input
                                    @input="
                                        form.head_pic = $event.target.files[0]
                                    "
                                    id="head_pic"
                                    type="file"
                                    class="block w-full p-2 mt-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary1"
                                    accept="image/*"
                                />
                            </div>

                            <!-- Image Illustration -->
                            <div>
                                <InputLabel
                                    for="illustration"
                                    value="Image Illustration"
                                    class="text-lg font-semibold text-gray-700"
                                />
                                <input
                                    @input="
                                        form.ilustration =
                                            $event.target.files[0]
                                    "
                                    id="illustration"
                                    type="file"
                                    class="block w-full p-2 mt-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary1"
                                    accept="image/*"
                                />
                            </div>

                            <!-- Illustration Video -->
                            <div>
                                <InputLabel
                                    for="video_illustration"
                                    value="Illustration Video"
                                    class="text-lg font-semibold text-gray-700"
                                />
                                <input
                                    @input="
                                        form.video_illustration =
                                            $event.target.files[0]
                                    "
                                    id="video_illustration"
                                    type="file"
                                    class="block w-full p-2 mt-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary1"
                                    accept="video/*"
                                />
                            </div>
                        </div>

                        <!-- Save Button -->
                        <div class="flex justify-end">
                            <PrimaryButton
                                title="Save"
                                :isLink="false"
                                :disabled="form.processing"
                                class="px-6 py-3 bg-primary1 text-white font-semibold rounded-lg hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary1 focus:ring-offset-2"
                            />
                            <Transition
                                enter-active-class="transition ease-in-out"
                                enter-from-class="opacity-0"
                                leave-active-class="transition ease-in-out"
                                leave-to-class="opacity-0"
                            >
                                <p
                                    v-if="form.recentlySuccessful"
                                    class="text-sm text-gray-600"
                                >
                                    Saved.
                                </p>
                            </Transition>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, useForm } from "@inertiajs/vue3";

export default {
    props: {
        lesson: Object,
    },
    components: {
        AuthenticatedLayout,
        InputError,
        InputLabel,
        PrimaryButton,
        TextInput,
        Head,
    },
    data() {
        return {
            form: useForm({
                material_name: "",
                text_en: "",
                text_id: "",
                text_illustration: "",
                cover: null,
                head_pic: null,
                ilustration: null,
                video_illustration: null,
            }),
        };
    },
    methods: {
        handleSubmit() {
            this.form.post(
                route("manage.lesson.material.store", this.lesson.id)
            );
        },
    },
};
</script>
