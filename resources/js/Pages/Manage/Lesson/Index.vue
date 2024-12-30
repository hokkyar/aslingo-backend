<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, router, useForm } from "@inertiajs/vue3";
import Swal from "sweetalert2";
import Sortable from "sortablejs";
import Breadcrumb from "@/Components/Breadcrumb.vue";

export default {
    components: {
        AuthenticatedLayout,
        InputError,
        InputLabel,
        PrimaryButton,
        TextInput,
        Head,
        Link,
        Breadcrumb,
    },
    props: { lessons: Array },
    data() {
        return {
            form: useForm({ lesson_name: "", cover: null, class: "7" }),
            formEdit: useForm({ lesson_name: "", cover: null, class: "7" }),
            orderModals: { 7: null, 8: null, 9: null },
            selectedLesson: null,
            imageUrl: "",
            isLoading: false,
            showErrors: false,
            sortedLessonIds: {},
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
        "formEdit.errors"(newVal) {
            if (Object.keys(newVal).length > 0) {
                this.showErrors = true;
                setTimeout(() => {
                    this.showErrors = false;
                }, 5000);
            }
        },
    },
    mounted() {
        [7, 8, 9].forEach((classNumber) => {
            const sortableList = document.getElementById(
                `sortableList${classNumber}`
            );
            if (sortableList) {
                new Sortable(sortableList, {
                    animation: 150,
                    ghostClass: "sortable-ghost",
                    onEnd: (event) => this.handleSortEnd(event, classNumber),
                });
            }
        });
    },
    methods: {
        clearForm() {
            this.showErrors = false;

            this.form = {
                ...this.form,
                lesson_name: "",
                cover: null,
                class: "7",
                cover_preview: null,
            };

            const fileInput = document.getElementById("cover");
            if (fileInput) {
                fileInput.value = "";
            }
        },

        showAddLessonModal() {
            this.$refs.addLessonModal.showModal();
        },
        closeAddLessonModal() {
            this.clearForm();
            this.$refs.addLessonModal.close();
        },
        showOrderModal(classNumber) {
            const orderModal = this.$refs["orderModal" + classNumber][0];
            if (orderModal && orderModal.showModal) {
                orderModal.showModal();
            } else {
                console.warn(
                    "orderModal tidak ditemukan atau tidak mendukung showModal()"
                );
            }
        },
        closeOrderModal(classNumber) {
            const orderModal = this.$refs["orderModal" + classNumber][0];
            if (orderModal && orderModal.close) {
                orderModal.close();
            } else {
                console.warn(
                    "orderModal tidak ditemukan atau tidak mendukung close()"
                );
            }
        },
        handleSortEnd(event, classNumber) {
            this.sortedLessonIds[classNumber] = Array.from(
                event.from.children
            ).map((li) => parseInt(li.dataset.id));
        },
        saveOrder(classNumber) {
            this.isLoading = true;
            const orderedIds = this.sortedLessonIds[classNumber] || [];
            router.post(
                route("manage.lesson.edit_order"),
                { orderedIds },
                {
                    onSuccess: () => {
                        this.isLoading = false;
                        this.closeOrderModal(classNumber);
                    },
                }
            );
        },
        showEditModal(lesson) {
            this.selectedLesson = lesson;
            this.formEdit.lesson_name = lesson.lesson_name;
            this.formEdit.class = lesson.class;
            this.imageUrl = `/storage/images/${lesson.cover}`;
            this.$refs.editModal.showModal();
        },
        closeEditModal() {
            this.$refs.editModal.close();
        },
        handleSubmit() {
            this.form.post(route("manage.lesson.store"), {
                onSuccess: () => {
                    this.clearForm();
                    this.closeAddLessonModal();
                    Swal.fire("Success!", "Lesson Added!", "success");
                },
            });
        },
        handleSubmitEdit() {
            this.formEdit.post(
                route("manage.lesson.update", this.selectedLesson.id),
                {
                    onSuccess: () => {
                        this.closeEditModal();
                        Swal.fire("Success!", "Lesson Updated!", "success");
                    },
                }
            );
        },
        confirmDelete(lesson) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to recover this lesson!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    router.delete(route("manage.lesson.destroy", lesson.id), {
                        onSuccess: () => {
                            Swal.fire(
                                "Deleted!",
                                "Lesson has been deleted.",
                                "success"
                            );
                        },
                    });
                }
            });
        },
        handleFileChange(event) {
            const selectedFile = event.target.files[0];
            this.imageUrl = URL.createObjectURL(selectedFile);
            this.formEdit.cover = selectedFile;
        },
        previewCover(event) {
            const file = event.target.files[0];
            if (file) {
                this.form.cover = file;
                this.form.cover_preview = URL.createObjectURL(file);
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
            ];
        },
    },
};
</script>

<template>
    <AuthenticatedLayout>
        <template #header>
            <Breadcrumb :items="breadcrumb" />
        </template>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <PrimaryButton
                class="my-5"
                @click="showAddLessonModal"
                title="Add Lesson"
                :isLink="false"
            />

            <!-- Modal ADD -->
            <dialog
                ref="addLessonModal"
                class="modal modal-bottom sm:modal-middle"
            >
                <div class="modal-box bg-white">
                    <h3 class="font-bold text-lg">Add a New Lesson</h3>
                    <div
                        v-if="showErrors && Object.keys(form.errors).length"
                        class="text-danger mb-2"
                    >
                        <small
                            v-for="(error, field) in form.errors"
                            :key="field"
                            class="block"
                        >
                            {{ error }}
                        </small>
                    </div>
                    <form @submit.prevent="handleSubmit" class="mt-2 space-y-6">
                        <div>
                            <InputLabel for="lesson_name" value="Lesson Name" />
                            <TextInput
                                v-model="form.lesson_name"
                                id="lesson_name"
                                type="text"
                                class="mt-1 block w-full"
                                required
                                autofocus
                                autocomplete="name"
                            />
                            <InputError class="mt-2" />
                        </div>
                        <div class="flex flex-col">
                            <InputLabel
                                for="cover"
                                value="Cover"
                                class="text-lg font-semibold text-gray-700"
                            />
                            <div class="flex items-center gap-4">
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
                        <div class="flex flex-col gap-2">
                            <InputLabel for="class" value="Class" />
                            <select
                                id="class"
                                v-model="form.class"
                                class="select border border-black w-full bg-white"
                            >
                                <option value="7" selected>7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                            </select>
                        </div>
                        <PrimaryButton
                            title="Save"
                            :isLink="false"
                            :disabled="form.processing"
                        />
                    </form>
                    <div class="modal-action">
                        <button @click="closeAddLessonModal" class="btn">
                            Close
                        </button>
                    </div>
                </div>
            </dialog>

            <!-- CLASS -->
            <div
                v-for="classNumber in [7, 8, 9]"
                :key="classNumber"
                class="mb-4"
            >
                <!-- Header Kelas -->
                <div
                    class="flex px-3 items-center justify-between py-3 shadow-lg text-center text-2xl font-bold border-r-2 border-t-2 border-l-2 rounded-t-2xl border-primary1"
                >
                    <h2 class="text-primary1">Class {{ classNumber }}</h2>
                    <button
                        @click="showOrderModal(classNumber)"
                        class="btn bg-primary1 border-none text-white hover:bg-lightblue"
                    >
                        Edit Order
                    </button>
                </div>

                <!-- LIST LESSONS -->
                <div
                    class="border-2 rounded-b-2xl border-primary1 p-3 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4"
                >
                    <div
                        class="rounded-xl bg-primary1 justify-center flex flex-col items-center py-2 w-full"
                        v-for="lesson in lessons.filter(
                            (lesson) => lesson.class === String(classNumber)
                        )"
                        :key="lesson.id"
                    >
                        <Link
                            class="hover:opacity-80 transition duration-300 ease-in-out w-full"
                            as="button"
                            :href="route('manage.lesson.detail', lesson.id)"
                        >
                            <div
                                class="px-2 w-full h-60 text-center overflow-hidden"
                            >
                                <img
                                    class="w-full h-full object-cover"
                                    :src="'/storage/images/' + lesson.cover"
                                    alt="Lesson"
                                />
                            </div>

                            <h2
                                class="text-center py-3 font-bold text-xl text-white uppercase"
                            >
                                {{ lesson.lesson_name }}
                            </h2>
                        </Link>
                        <div class="flex flex-row card w-full px-2 gap-2">
                            <button
                                class="btn bg-yellow border-none text-white hover:bg-yellow2 flex-1 text-lg"
                                @click="showEditModal(lesson)"
                            >
                                Edit
                            </button>
                            <button
                                class="btn bg-danger border-none text-white hover:bg-danger2 flex-1 text-lg"
                                @click="confirmDelete(lesson)"
                            >
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal ORDER -->
            <dialog
                v-for="classNumber in [7, 8, 9]"
                :key="'orderModal' + classNumber"
                :ref="'orderModal' + classNumber"
                class="modal modal-bottom sm:modal-middle"
            >
                <div class="modal-box bg-white">
                    <h3 class="font-bold text-lg text-black text-center">
                        Class {{ classNumber }}
                    </h3>
                    <ul
                        class="cursor-grabbing"
                        :id="'sortableList' + classNumber"
                        sortable
                    >
                        <li
                            class="p-3 border m-2"
                            v-for="lesson in lessons.filter(
                                (lesson) => lesson.class === String(classNumber)
                            )"
                            :key="lesson.id"
                            :data-id="lesson.id"
                        >
                            {{ lesson.lesson_name }}
                        </li>
                    </ul>
                    <div class="modal-action w-60">
                        <button
                            v-if="isLoading"
                            class="btn bg-primary1 border-none hover:bg-lightblue flex-1 text-lg text-white uppercase"
                            disabled
                        >
                            Loading...
                        </button>
                        <button
                            v-else
                            class="btn bg-primary1 border-none hover:bg-lightblue flex-1 text-lg text-white uppercase"
                            @click="saveOrder(classNumber)"
                        >
                            Save
                        </button>
                        <button
                            @click="closeOrderModal(classNumber)"
                            class="btn bg-danger border-none text-lg text-white uppercase"
                        >
                            Close
                        </button>
                    </div>
                </div>
            </dialog>

            <!-- Modal EDIT -->
            <dialog ref="editModal" class="modal modal-bottom sm:modal-middle">
                <div class="modal-box bg-white">
                    <h3 class="font-bold text-lg">Edit Lesson</h3>
                    <div
                        v-if="showErrors && Object.keys(formEdit.errors).length"
                        class="text-danger mb-2"
                    >
                        <small
                            v-for="(error, field) in formEdit.errors"
                            :key="field"
                            class="block"
                        >
                            {{ error }}
                        </small>
                    </div>
                    <form
                        @submit.prevent="handleSubmitEdit"
                        class="mt-2 space-y-6"
                    >
                        <div>
                            <InputLabel for="lesson_name" value="Lesson Name" />
                            <TextInput
                                v-model="formEdit.lesson_name"
                                id="lesson_name"
                                type="text"
                                class="mt-1 block w-full"
                                required
                                autofocus
                                autocomplete="name"
                            />
                            <InputError class="mt-2" />
                        </div>
                        <div class="flex flex-col">
                            <InputLabel
                                for="cover"
                                value="Cover"
                                class="text-lg font-semibold text-gray-700"
                            />
                            <div class="flex items-center gap-4">
                                <img
                                    v-if="imageUrl"
                                    :src="imageUrl"
                                    alt="Cover Preview"
                                    class="w-40 h-40 object-cover rounded-lg shadow-md"
                                />
                                <input
                                    @change="handleFileChange"
                                    id="cover"
                                    type="file"
                                    class="block w-full p-2 mt-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary1"
                                    accept="image/*"
                                />
                            </div>
                        </div>
                        <div class="flex flex-col gap-2">
                            <InputLabel for="class" value="Class" />
                            <select
                                id="class"
                                v-model="formEdit.class"
                                class="select border border-black w-full bg-white"
                            >
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                            </select>
                        </div>
                        <PrimaryButton
                            title="Save"
                            :isLink="false"
                            :disabled="formEdit.processing"
                        />
                    </form>
                    <div class="modal-action">
                        <button @click="closeEditModal" class="btn">
                            Close
                        </button>
                    </div>
                </div>
            </dialog>
        </div>
    </AuthenticatedLayout>
</template>
