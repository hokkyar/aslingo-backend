<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, useForm } from "@inertiajs/vue3";
import Breadcrumb from "@/Components/Breadcrumb.vue";

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
        Breadcrumb,
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
            showErrors: false,
        };
    },
    watch: {
        "form.errors"(newVal) {
            if (Object.keys(newVal).length > 0) {
                this.showErrors = true;
                setTimeout(() => {
                    this.showErrors = false;
                }, 5000);
            }
        },
    },
    methods: {
        handleSubmit() {
            this.form.post(
                route("manage.lesson.material.store", this.lesson.id)
            );
        },
        previewVideo(event) {
            const file = event.target.files[0];
            if (file) {
                this.form.video_illustration = file;
                this.form.video_preview = URL.createObjectURL(file);
            }
        },
        previewCover(event) {
            const file = event.target.files[0];
            if (file) {
                this.form.cover = file;
                this.form.cover_preview = URL.createObjectURL(file);
            }
        },
        previewIllustration(event) {
            const file = event.target.files[0];
            if (file) {
                this.form.ilustration = file;
                this.form.illustration_preview = URL.createObjectURL(file);
            }
        },
    },
    computed: {
        breadcrumb() {
            return [
                {
                    label: "Manage Lessons",
                    url: route("manage.lesson.index"),
                },
                {
                    label: this.lesson.lesson_name,
                    url: route("manage.lesson.detail", this.lesson.id),
                },
                {
                    label: "Add Material",
                },
            ];
        },
    },
};
</script>

<template>
    <Head title="Create Material" />

    <AuthenticatedLayout>
        <template #header>
            <Breadcrumb :items="breadcrumb" />
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Header -->
                <h1
                    class="font-extrabold text-2xl text-gray-800 leading-tight mb-4 text-center"
                >
                    Create Material For {{ lesson.lesson_name }}
                </h1>
                <div class="bg-white p-6 shadow-lg rounded-lg">
                    <div
                        v-if="showErrors && Object.keys(form.errors).length"
                        class="mb-4 text-danger"
                    >
                        <small
                            v-for="(error, field) in form.errors"
                            :key="field"
                            class="block mb-1"
                        >
                            {{ error }}
                        </small>
                    </div>

                    <!-- Form -->
                    <form @submit.prevent="handleSubmit" class="space-y-6">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
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
                        </div>

                        <!-- File Inputs -->
                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                            <div class="space-y-4">
                                <!-- Cover -->
                                <div>
                                    <InputLabel
                                        for="cover"
                                        value="Cover"
                                        class="text-lg font-semibold text-gray-700"
                                    />
                                    <div class="flex items-center space-x-4">
                                        <img
                                            v-if="form.cover_preview"
                                            :src="form.cover_preview"
                                            alt="Cover Preview"
                                            class="w-40 h-40 object-cover rounded-lg shadow-md"
                                        />
                                        <input
                                            @change="previewCover"
                                            id="cover"
                                            type="file"
                                            class="block w-full p-2 mt-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary1"
                                            accept="image/*"
                                        />
                                    </div>
                                </div>

                                <!-- Image Illustration -->
                                <div>
                                    <InputLabel
                                        for="illustration"
                                        value="Image Illustration"
                                        class="text-lg font-semibold text-gray-700"
                                    />
                                    <div class="flex items-center space-x-4">
                                        <img
                                            v-if="form.illustration_preview"
                                            :src="form.illustration_preview"
                                            alt="Illustration Preview"
                                            class="w-40 h-40 object-cover rounded-lg shadow-md"
                                        />
                                        <input
                                            @change="previewIllustration"
                                            id="illustration"
                                            type="file"
                                            class="block w-full p-2 mt-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary1"
                                            accept="image/*"
                                        />
                                    </div>
                                </div>
                            </div>

                            <!-- Illustration Video -->
                            <div>
                                <InputLabel
                                    for="video_illustration"
                                    value="Illustration Video"
                                    class="text-lg font-semibold text-gray-700"
                                />
                                <div v-if="form.video_preview">
                                    <video
                                        controls
                                        :src="form.video_preview"
                                        class="w-full max-w-lg mx-auto mt-2 rounded-lg shadow-lg"
                                    />
                                </div>
                                <input
                                    @change="previewVideo"
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
