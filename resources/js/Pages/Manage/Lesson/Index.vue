<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, router, useForm } from "@inertiajs/vue3";
import Sortable from "sortablejs";

export default {
    props: { lessons: Array },
    components: {
        AuthenticatedLayout,
        Head,
        Link,
        PrimaryButton,
        InputError,
        InputLabel,
        TextInput,
    },

    data() {
        return {
            form: useForm({
                lesson_name: "",
                cover: null,
                class: "7",
            }),
            isLoading: false,
        };
    },

    methods: {
        clearForm() {
            this.form.lesson_name = "";
            this.form.cover = null;
        },
        handleSubmit() {
            this.form.post(route("manage.lesson.store"), {
                onSuccess: () => {
                    this.clearForm();
                    addLessonModal.close();
                    Swal.fire({
                        title: "Success!",
                        text: "Lesson Added!",
                        icon: "success",
                    });
                },
            });
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
        saveOrder(elementId) {
            this.isLoading = true;
            const items = document
                .getElementById(elementId)
                .getElementsByTagName("li");
            const orderedIds = Array.from(items).map((li) =>
                parseInt(li.dataset.id)
            );
            router.post(
                route("manage.lesson.edit_order"),
                { orderedIds },
                {
                    onSuccess: () => {
                        orderClass7.close();
                        orderClass8.close();
                        orderClass9.close();
                        this.isLoading = false;
                    },
                }
            );
        },
    },

    mounted() {
        const sortableList7 = document.getElementById("sortableList7");
        const sortableList8 = document.getElementById("sortableList8");
        const sortableList9 = document.getElementById("sortableList9");
        new Sortable(sortableList7, {
            animation: 150,
            ghostClass: "sortable-ghost",
            onEnd: this.handleSortEnd,
        });
        new Sortable(sortableList8, {
            animation: 150,
            ghostClass: "sortable-ghost",
            onEnd: this.handleSortEnd,
        });
        new Sortable(sortableList9, {
            animation: 150,
            ghostClass: "sortable-ghost",
            onEnd: this.handleSortEnd,
        });
    },
};
</script>

<template>
    <Head title="Manage Lesson" />

    <AuthenticatedLayout>
        <div class="pb-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="">
                    <div class="p-6 text-gray-900">
                        <PrimaryButton
                            onclick="addLessonModal.showModal()"
                            title="Add Lesson"
                            :isLink="false"
                        />

                        <!-- MODAL ADD -->
                        <dialog
                            id="addLessonModal"
                            class="modal modal-bottom sm:modal-middle"
                        >
                            <div class="modal-box">
                                <h3 class="font-bold text-lg">
                                    Add a New Lesson
                                </h3>
                                ERROR : {{ form.errors }}
                                <form
                                    @submit.prevent="handleSubmit"
                                    class="mt-6 space-y-6"
                                >
                                    <div>
                                        <InputLabel
                                            for="lesson_name"
                                            value="Lesson Name"
                                        />
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

                                    <div class="flex flex-col gap-2">
                                        <InputLabel for="cover" value="Cover" />
                                        <input
                                            @input="
                                                form.cover =
                                                    $event.target.files[0]
                                            "
                                            id="cover"
                                            type="file"
                                            class="file-input file-input-bordered w-full"
                                            accept="image/*"
                                        />
                                    </div>

                                    <div class="flex flex-col gap-2">
                                        <InputLabel for="class" value="Class" />
                                        <select
                                            id="class"
                                            v-model="form.class"
                                            class="select border border-gray-800 w-full"
                                        >
                                            <option value="7" selected>
                                                7
                                            </option>
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
                                    <form method="dialog">
                                        <button class="btn">Close</button>
                                    </form>
                                </div>
                            </div>
                        </dialog>

                        <!-- KELAS 7 -->
                        <div
                            class="flex px-3 items-center justify-between mt-5 py-3 shadow-lg text-center text-2xl font-bold border-r-2 border-t-2 border-l-2 rounded-t-2xl border-primary1"
                        >
                            <h2 class="text-primary1">Class VII</h2>
                            <button
                                onclick="orderClass7.showModal()"
                                class="btn bg-primary1 border-none text-white hover:bg-lightblue"
                            >
                                Edit Order
                            </button>
                        </div>
                        <div
                            class="border-2 rounded-b-2xl border-primary1 p-3 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4"
                        >
                            <div
                                class="border rounded-xl bg-primary1 justify-center flex flex-col items-center py-2"
                                v-for="lesson in lessons.filter(
                                    (item) => item.class === '7'
                                )"
                            >
                                <Link
                                    class="hover:opacity-80 transition duration-300 ease-in-out"
                                    as="button"
                                    :href="
                                        route('manage.lesson.detail', lesson.id)
                                    "
                                >
                                    <figure>
                                        <img
                                            class="h-48"
                                            :src="
                                                '/storage/images/' +
                                                lesson.cover
                                            "
                                            alt="Lesson"
                                        />
                                    </figure>
                                    <h2
                                        class="text-center p-3 font-bold text-xl text-white uppercase"
                                    >
                                        {{ lesson.lesson_name }}
                                    </h2>
                                </Link>
                                <div
                                    class="flex flex-row card w-full px-2 gap-2"
                                >
                                    <Link
                                        :href="
                                            route(
                                                'manage.lesson.edit',
                                                lesson.id
                                            )
                                        "
                                        as="button"
                                        class="btn bg-yellow border-none text-white hover:bg-yellow2 flex-1 text-lg"
                                    >
                                        Edit
                                    </Link>
                                    <button
                                        class="btn bg-danger border-none text-white hover:bg-danger2 flex-1 text-lg"
                                        @click="confirmDelete(lesson)"
                                    >
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Edit Order KELAS 7 Modal -->
                        <dialog
                            id="orderClass7"
                            class="modal modal-bottom sm:modal-middle"
                        >
                            <div class="modal-box bg-white">
                                <h3 class="font-bold text-lg">Class 7</h3>
                                <ul
                                    class="cursor-grabbing"
                                    id="sortableList7"
                                    sortable
                                >
                                    <li
                                        class="p-3 border m-2"
                                        v-for="lesson in lessons.filter(
                                            (item) => item.class === '7'
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
                                        @click="saveOrder('sortableList7')"
                                    >
                                        Save
                                    </button>
                                    <form method="dialog">
                                        <button
                                            class="btn bg-danger border-none hover:bg-danger2 flex-1 text-lg text-white uppercase"
                                        >
                                            Close
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </dialog>

                        <!-- KELAS 8 -->
                        <div
                            class="flex px-3 items-center justify-between mt-5 py-3 shadow-lg text-center text-2xl font-bold border-r-2 border-t-2 border-l-2 rounded-t-2xl border-primary1"
                        >
                            <h2 class="text-primary1">Class VIII</h2>
                            <button
                                onclick="orderClass7.showModal()"
                                class="btn bg-primary1 border-none text-white hover:bg-lightblue"
                            >
                                Edit Order
                            </button>
                        </div>
                        <div
                            class="border-2 rounded-b-2xl border-primary1 p-3 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4"
                        >
                            <div
                                class="border rounded-xl bg-primary1 justify-center flex flex-col items-center py-2"
                                v-for="lesson in lessons.filter(
                                    (item) => item.class === '8'
                                )"
                            >
                                <Link
                                    class="hover:opacity-80 transition duration-300 ease-in-out"
                                    as="button"
                                    :href="
                                        route('manage.lesson.detail', lesson.id)
                                    "
                                >
                                    <figure>
                                        <img
                                            class="h-48"
                                            :src="
                                                '/storage/images/' +
                                                lesson.cover
                                            "
                                            alt="Lesson"
                                        />
                                    </figure>
                                    <h2
                                        class="text-center p-3 font-bold text-xl text-white uppercase"
                                    >
                                        {{ lesson.lesson_name }}
                                    </h2>
                                </Link>
                                <div
                                    class="flex flex-row card w-full px-2 gap-2"
                                >
                                    <Link
                                        :href="
                                            route(
                                                'manage.lesson.edit',
                                                lesson.id
                                            )
                                        "
                                        as="button"
                                        class="btn bg-yellow border-none text-white hover:bg-yellow2 flex-1 text-lg"
                                    >
                                        Edit
                                    </Link>
                                    <button
                                        class="btn bg-danger border-none text-white hover:bg-danger2 flex-1 text-lg"
                                        @click="confirmDelete(lesson)"
                                    >
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Edit Order KELAS 8 Modal -->
                        <dialog
                            id="orderClass8"
                            class="modal modal-bottom sm:modal-middle"
                        >
                            <div class="modal-box">
                                <h3 class="font-bold text-lg">Class 8</h3>
                                <ul
                                    class="cursor-grabbing"
                                    id="sortableList8"
                                    sortable
                                >
                                    <li
                                        class="p-3 border m-2"
                                        v-for="lesson in lessons.filter(
                                            (item) => item.class === '8'
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
                                        @click="saveOrder('sortableList7')"
                                    >
                                        Save
                                    </button>
                                    <form method="dialog">
                                        <button
                                            class="btn bg-danger border-none hover:bg-danger2 flex-1 text-lg text-white uppercase"
                                        >
                                            Close
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </dialog>

                        <!-- KELAS 9 -->
                        <div
                            class="flex px-3 items-center justify-between mt-5 py-3 shadow-lg text-center text-2xl font-bold border-r-2 border-t-2 border-l-2 rounded-t-2xl border-primary1"
                        >
                            <h2 class="text-primary1">Class IX</h2>
                            <button
                                onclick="orderClass7.showModal()"
                                class="btn bg-primary1 border-none text-white hover:bg-lightblue"
                            >
                                Edit Order
                            </button>
                        </div>
                        <div
                            class="border-2 rounded-b-2xl border-primary1 p-3 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4"
                        >
                            <div
                                class="border rounded-xl bg-primary1 justify-center flex flex-col items-center py-2"
                                v-for="lesson in lessons.filter(
                                    (item) => item.class === '9'
                                )"
                            >
                                <Link
                                    class="hover:opacity-80 transition duration-300 ease-in-out"
                                    as="button"
                                    :href="
                                        route('manage.lesson.detail', lesson.id)
                                    "
                                >
                                    <figure>
                                        <img
                                            class="h-48"
                                            :src="
                                                '/storage/images/' +
                                                lesson.cover
                                            "
                                            alt="Lesson"
                                        />
                                    </figure>
                                    <h2
                                        class="text-center p-3 font-bold text-xl text-white uppercase"
                                    >
                                        {{ lesson.lesson_name }}
                                    </h2>
                                </Link>
                                <div
                                    class="flex flex-row card w-full px-2 gap-2"
                                >
                                    <Link
                                        :href="
                                            route(
                                                'manage.lesson.edit',
                                                lesson.id
                                            )
                                        "
                                        as="button"
                                        class="btn bg-yellow border-none text-white hover:bg-yellow2 flex-1 text-lg"
                                    >
                                        Edit
                                    </Link>
                                    <button
                                        class="btn bg-danger border-none text-white hover:bg-danger2 flex-1 text-lg"
                                        @click="confirmDelete(lesson)"
                                    >
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Edit Order KELAS 9 Modal -->
                        <dialog
                            id="orderClass9"
                            class="modal modal-bottom sm:modal-middle"
                        >
                            <div class="modal-box">
                                <h3 class="font-bold text-lg">Class 9</h3>
                                <ul
                                    class="cursor-grabbing"
                                    id="sortableList9"
                                    sortable
                                >
                                    <li
                                        class="p-3 border m-2"
                                        v-for="lesson in lessons.filter(
                                            (item) => item.class === '9'
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
                                        @click="saveOrder('sortableList7')"
                                    >
                                        Save
                                    </button>
                                    <form method="dialog">
                                        <button
                                            class="btn bg-danger border-none hover:bg-danger2 flex-1 text-lg text-white uppercase"
                                        >
                                            Close
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </dialog>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
