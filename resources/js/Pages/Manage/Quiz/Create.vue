<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, useForm } from "@inertiajs/vue3";

export default {
    props: { lesson: Object },
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
                content: "",
                correct_answer: "",
                col_1: "",
                col_2: "",
                col_3: "",
                col_4: "",
                cover: null,
                asset_url: null,
            }),
            selectedAnswer: "",
        };
    },
    watch: {
        selectedAnswer(newVal) {
            if (newVal === "A") {
                this.form.correct_answer = this.form.col_1;
            } else if (newVal === "B") {
                this.form.correct_answer = this.form.col_2;
            } else if (newVal === "C") {
                this.form.correct_answer = this.form.col_3;
            } else if (newVal === "D") {
                this.form.correct_answer = this.form.col_4;
            }
        },
        "form.col_1"(newVal) {
            if (this.selectedAnswer === "A") {
                this.form.correct_answer = newVal;
            }
        },
        "form.col_2"(newVal) {
            if (this.selectedAnswer === "B") {
                this.form.correct_answer = newVal;
            }
        },
        "form.col_3"(newVal) {
            if (this.selectedAnswer === "C") {
                this.form.correct_answer = newVal;
            }
        },
        "form.col_4"(newVal) {
            if (this.selectedAnswer === "D") {
                this.form.correct_answer = newVal;
            }
        },
    },
    methods: {
        handleSubmit() {
            // console.log(this.form);
            this.form.post(route("manage.lesson.quiz.store", this.lesson.id));
        },
    },
};
</script>

<template>
    <Head title="Create Quiz" />

    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white p-6 shadow-lg rounded-lg">
                    <!-- Header -->
                    <h1
                        class="font-extrabold text-2xl text-gray-800 leading-tight mb-4 text-center"
                    >
                        Create Quiz For {{ lesson.lesson_name }}
                    </h1>
                    <div
                        v-if="Object.keys(form.errors).length"
                        class="mb-4 text-danger"
                    >
                        <small
                            v-for="(error, field) in form.errors"
                            :key="field"
                            >{{ error }}</small
                        >
                    </div>

                    <!-- Form -->
                    <form @submit.prevent="handleSubmit" class="space-y-6">
                        <!-- Content -->
                        <div>
                            <InputLabel
                                for="content"
                                value="Title"
                                class="text-lg font-semibold text-gray-700"
                            />
                            <TextInput
                                v-model="form.content"
                                id="content"
                                type="text"
                                placeholder="Enter title question"
                                class="block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary1 focus:border-transparent"
                                required
                                autofocus
                            />
                            <InputError class="mt-2 text-danger" />
                        </div>

                        <!-- Choices with Correct Answer Selection -->
                        <div>
                            <InputLabel
                                value="Options"
                                class="text-lg font-semibold text-gray-700"
                            />

                            <div class="my-2">
                                <label class="flex items-center">
                                    <input
                                        type="radio"
                                        v-model="selectedAnswer"
                                        value="A"
                                        class="mr-2"
                                    />
                                    <TextInput
                                        v-model="form.col_1"
                                        id="col_1"
                                        type="text"
                                        placeholder="Option A"
                                        class="w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary1 focus:border-transparent"
                                        required
                                    />
                                </label>
                                <InputError class="mt-2 text-danger" />
                            </div>

                            <div class="my-2">
                                <label class="flex items-center">
                                    <input
                                        type="radio"
                                        v-model="selectedAnswer"
                                        value="B"
                                        class="mr-2"
                                    />
                                    <TextInput
                                        v-model="form.col_2"
                                        id="col_2"
                                        type="text"
                                        placeholder="Option B"
                                        class="w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary1 focus:border-transparent"
                                        required
                                    />
                                </label>
                                <InputError class="mt-2 text-danger" />
                            </div>

                            <div class="my-2">
                                <label class="flex items-center">
                                    <input
                                        type="radio"
                                        v-model="selectedAnswer"
                                        value="C"
                                        class="mr-2"
                                    />
                                    <TextInput
                                        v-model="form.col_3"
                                        id="col_3"
                                        type="text"
                                        placeholder="Option C"
                                        class="w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary1 focus:border-transparent"
                                        required
                                    />
                                </label>
                                <InputError class="mt-2 text-danger" />
                            </div>

                            <div class="my-2">
                                <label class="flex items-center">
                                    <input
                                        type="radio"
                                        v-model="selectedAnswer"
                                        value="D"
                                        class="mr-2"
                                    />
                                    <TextInput
                                        v-model="form.col_4"
                                        id="col_4"
                                        type="text"
                                        placeholder="Option D"
                                        class="w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary1 focus:border-transparent"
                                        required
                                    />
                                </label>
                                <InputError class="mt-2 text-danger" />
                            </div>
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

                            <!-- Asset URL -->
                            <div>
                                <InputLabel
                                    for="asset_url"
                                    value="Question"
                                    class="text-lg font-semibold text-gray-700"
                                />
                                <input
                                    @input="
                                        form.asset_url = $event.target.files[0]
                                    "
                                    id="asset_url"
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
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
