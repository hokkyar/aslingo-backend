<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import Breadcrumb from "@/Components/Breadcrumb.vue";
import CustomeDropdown from "@/Components/CustomeDropdown.vue";

export default {
    props: {
        lesson_id: String,
        quiz: Object,
        material: Object,
        lesson: Object,
    },
    components: {
        AuthenticatedLayout,
        Head,
        Link,
        InputError,
        InputLabel,
        PrimaryButton,
        TextInput,
        Breadcrumb,
        CustomeDropdown,
    },
    data() {
        return {
            form: useForm({
                content: this.quiz.content,
                correct_answer: this.quiz.correct_answer,
                col_1: this.quiz.col_1,
                col_2: this.quiz.col_2,
                col_3: this.quiz.col_3,
                col_4: this.quiz.col_4,
                cover: null,
                asset_url: this.quiz.asset_url || "",
            }),
            selectedAnswer: "",
            isDropdownOpen: false,
            materialOptions: this.material.map((item) => ({
                label: item.material_name,
                value: item.video,
            })),
            otherAsset: this.quiz.asset_url
                ? "/storage/videos/" + this.quiz.asset_url
                : "",
        };
    },
    computed: {
        selectedOptionLabel() {
            const selected = this.materialOptions.find(
                (option) => option.value === this.form.asset_url
            );
            return selected ? selected.label : "Choose here";
        },
    },
    mounted() {
        console.log(this.material);
        if (this.form.correct_answer === this.form.col_1) {
            this.selectedAnswer = "A";
        } else if (this.form.correct_answer === this.form.col_2) {
            this.selectedAnswer = "B";
        } else if (this.form.correct_answer === this.form.col_3) {
            this.selectedAnswer = "C";
        } else if (this.form.correct_answer === this.form.col_4) {
            this.selectedAnswer = "D";
        }

        const selectedMaterial = this.material.find(
            (item) => item.video === this.quiz.asset_url
        );

        if (selectedMaterial) {
            this.form.asset_url = selectedMaterial.video;
            this.otherAsset = "/storage/videos/" + this.form.asset_url;
        }
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
        "form.asset_url"(newVal) {
            if (newVal) {
                this.otherAsset = "/storage/videos/" + newVal;
            } else {
                this.otherAsset = "";
            }
        },
    },
    methods: {
        handleSubmit() {
            this.form.post(
                route("manage.lesson.quiz.update", [
                    this.lesson_id,
                    this.quiz.id,
                ])
            );
        },
        toggleDropdown() {
            this.isDropdownOpen = !this.isDropdownOpen;
        },
        selectOption(item) {
            this.form.asset_url = item.value;
            this.otherAsset = "/storage/videos/" + item.value;
            this.isDropdownOpen = false;
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
                    label: "Edit Quiz",
                },
            ];
        },
    },
};
</script>

<template>
    <Head title="Edit Quiz" />

    <AuthenticatedLayout>
        <template #header>
            <Breadcrumb :items="breadcrumb" />
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white p-6 shadow-lg rounded-lg">
                    <!-- Header -->
                    <h1
                        class="font-extrabold text-2xl text-gray-800 leading-tight mb-4 text-center"
                    >
                        Edit Quiz
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
                        <!-- Custom Dropdown for selecting video -->
                        <div>
                            <InputLabel
                                for="asset_url"
                                value="Select Video for Question"
                                class="text-lg font-semibold text-gray-700"
                            />
                            <CustomeDropdown
                                :options="materialOptions"
                                v-model="form.asset_url"
                                @select="handleSelect"
                            />
                        </div>

                        <!-- Video Preview -->
                        <div v-if="form.asset_url">
                            <video
                                controls
                                :src="'/storage/videos/' + form.asset_url"
                                class="w-full max-w-lg mx-auto mt-2 rounded-lg shadow-lg"
                            />
                        </div>

                        <!-- Choices with Correct Answer Selection -->
                        <div>
                            <InputLabel
                                value="Options"
                                class="text-lg font-semibold text-gray-700"
                            />
                            <div
                                class="grid grid-cols-1 sm:grid-cols-2 gap-4 my-2"
                            >
                                <div>
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

                                <div>
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

                                <div>
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

                                <div>
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
