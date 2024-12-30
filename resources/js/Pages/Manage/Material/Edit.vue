<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, useForm } from "@inertiajs/vue3";
import Breadcrumb from "@/Components/Breadcrumb.vue";

export default {
    props: { lesson_id: String, material: Object, lesson: Object },
    components: {
        AuthenticatedLayout,
        Head,
        InputError,
        InputLabel,
        PrimaryButton,
        TextInput,
        Breadcrumb,
    },
    data() {
        return {
            form: useForm({
                material_name: this.material.material_name,
                text_en: this.material.text_en,
                text_id: this.material.text_id,
                text_illustration: this.material.text_illustration,
                cover: null,
                head_pic: null,
                ilustration: null,
                video_illustration: null,
            }),
            coverImg: "/storage/images/" + this.material.cover,
            headPic: "/storage/images/" + this.material.head_pic,
            ilustration: "/storage/images/" + this.material.ilustration,
            videoIllustration: "/storage/videos/" + this.material.video,
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
            const formData = new FormData();

            formData.append("material_name", this.form.material_name);
            formData.append("text_en", this.form.text_en);
            formData.append("text_id", this.form.text_id);
            formData.append("text_illustration", this.form.text_illustration);

            if (this.form.cover) {
                formData.append("cover", this.form.cover);
            }
            if (this.form.head_pic) {
                formData.append("head_pic", this.form.head_pic);
            }
            if (this.form.ilustration) {
                formData.append("ilustration", this.form.ilustration);
            }
            if (this.form.video_illustration) {
                formData.append(
                    "video_illustration",
                    this.form.video_illustration
                );
            }

            this.form.post(
                route("manage.lesson.material.update", [
                    this.lesson_id,
                    this.material.id,
                ]),
                {
                    preserveScroll: true,
                    forceFormData: true,
                    onSuccess: () => {
                        Swal.fire({
                            title: "Success!",
                            text: "Material Updated Successfully!",
                            icon: "success",
                        });
                    },
                }
            );
        },
        handleCover(event) {
            const selectedFile = event.target.files[0];
            this.coverImg = URL.createObjectURL(selectedFile);
            this.form.cover = selectedFile;
        },
        handleHeadPic(event) {
            const selectedFile = event.target.files[0];
            this.headPic = URL.createObjectURL(selectedFile);
            this.form.head_pic = selectedFile;
        },
        handleIlustration(event) {
            const selectedFile = event.target.files[0];
            this.ilustration = URL.createObjectURL(selectedFile);
            this.form.ilustration = selectedFile;
        },
        handleVideo(event) {
            const selectedFile = event.target.files[0];
            this.videoIllustration = URL.createObjectURL(selectedFile);
            this.form.video_illustration = selectedFile;
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
                    label: "Edit Material",
                },
            ];
        },
    },
};
</script>

<template>
    <Head title="Edit Material" />

    <AuthenticatedLayout>
        <template #header>
            <Breadcrumb :items="breadcrumb" />
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h1
                    class="font-extrabold text-2xl text-gray-800 leading-tight mb-4 text-center"
                >
                    Edit Material {{ material.material_name }}
                </h1>
                <div class="bg-white p-6 rounded-lg shadow-lg">
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
                                    class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:outline-none"
                                    required
                                    autofocus
                                />
                                <InputError
                                    :message="form.errors.material_name"
                                    class="mt-2 text-red-600"
                                />
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
                                    class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:outline-none"
                                    required
                                />
                                <InputError
                                    :message="form.errors.text_en"
                                    class="mt-2 text-red-600"
                                />
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
                                    class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:outline-none"
                                    required
                                />
                                <InputError
                                    :message="form.errors.text_id"
                                    class="mt-2 text-red-600"
                                />
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
                                    class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:outline-none"
                                />
                                <InputError
                                    :message="form.errors.text_illustration"
                                    class="mt-2 text-red-600"
                                />
                            </div>
                        </div>

                        <!-- Image Previews and Inputs -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="space-y-4">
                                <!-- Cover -->
                                <div class="flex items-center space-x-4">
                                    <img
                                        :src="coverImg"
                                        alt="Cover Image"
                                        class="w-40 h-40 object-cover rounded-lg shadow-md"
                                        v-if="coverImg"
                                    />
                                    <input
                                        @change="handleCover"
                                        id="cover"
                                        type="file"
                                        class="block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary"
                                        accept="image/*"
                                    />
                                </div>

                                <!-- Illustration -->
                                <div class="flex items-center space-x-4">
                                    <img
                                        :src="ilustration"
                                        alt="Illustration Image"
                                        class="w-40 h-40 object-cover rounded-lg shadow-md"
                                        v-if="ilustration"
                                    />
                                    <input
                                        @change="handleIlustration"
                                        id="illustration"
                                        type="file"
                                        class="block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary"
                                        accept="image/*"
                                    />
                                </div>
                            </div>
                            <div class="items-center space-y-4">
                                <div v-if="videoIllustration">
                                    <video
                                        controls
                                        :src="videoIllustration"
                                        class="w-full max-w-sm mx-auto mt-2 rounded-lg shadow-lg"
                                    />
                                </div>
                                <input
                                    @change="handleVideo"
                                    id="video_illustration"
                                    type="file"
                                    class="block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary"
                                    accept="video/*"
                                />
                            </div>
                        </div>
                        <!-- Video Illustration -->

                        <!-- Save Button -->
                        <div class="flex justify-end">
                            <PrimaryButton
                                class="px-6 py-3 bg-primary text-white font-semibold rounded-lg hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2"
                                title="Save"
                                :disabled="form.processing"
                            />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
