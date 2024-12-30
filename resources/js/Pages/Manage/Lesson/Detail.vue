<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head, Link, router } from "@inertiajs/vue3";
import Sortable from "sortablejs";
import Breadcrumb from "@/Components/Breadcrumb.vue";

export default {
    props: { lesson: Object, materials: Array, quizzes: Array },
    components: {
        AuthenticatedLayout,
        Head,
        Link,
        PrimaryButton,
        Breadcrumb,
    },
    data() {
        return {
            selectedMaterial: null,
            selectedQuiz: null,
            isLoading: false,
        };
    },
    methods: {
        showMaterialModal(material) {
            this.selectedMaterial = material;
            materialModal.showModal();
        },
        closeMaterialModal() {
            this.selectedMaterial = null;
            materialModal.close();
        },
        showQuizModal(quiz) {
            this.selectedQuiz = quiz;

            quizModal.showModal();
        },
        closeQuizModal() {
            this.selectedQuiz = null;
            quizModal.close();
        },
        confirmMaterialDelete(material) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to recover this material!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    router.delete(
                        route("manage.lesson.material.destroy", [
                            this.lesson.id,
                            material.id,
                        ]),
                        {
                            onSuccess: () => {
                                Swal.fire(
                                    "Deleted!",
                                    "Material has been deleted.",
                                    "success"
                                );
                            },
                        }
                    );
                }
            });
        },
        confirmQuizDelete(quiz) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to recover this quiz!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    router.delete(
                        route("manage.lesson.quiz.destroy", quiz.id),
                        {
                            onSuccess: () => {
                                Swal.fire(
                                    "Deleted!",
                                    "Quiz has been deleted.",
                                    "success"
                                );
                            },
                        }
                    );
                }
            });
        },
        saveOrder() {
            this.isLoading = true;
            const items = document
                .getElementById("sortableList")
                .getElementsByTagName("li");
            const orderedIds = Array.from(items).map((li) =>
                parseInt(li.dataset.id)
            );
            router.post(
                route("manage.lesson.material.edit_order"),
                { orderedIds },
                {
                    onSuccess: () => {
                        orderModal.close();
                        this.isLoading = false;
                    },
                }
            );
        },
    },
    mounted() {
        const sortableList = document.getElementById("sortableList");
        new Sortable(sortableList, {
            animation: 150,
            ghostClass: "sortable-ghost",
            onEnd: this.handleSortEnd,
        });

        $("#materialTable").DataTable({
            searching: false,
            lengthChange: false,
            ordering: false,
            paging: false,
            info: false,
        });

        $("#quizTable").DataTable({
            searching: false,
            lengthChange: false,
            ordering: false,
            paging: false,
            info: false,
        });
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
                },
            ];
        },
    },
};
</script>

<template>
    <Head title="Show Lesson" />

    <AuthenticatedLayout>
        <template #header>
            <Breadcrumb :items="breadcrumb" />
        </template>

        <!-- LIST MATERIAL -->
        <div class="pb-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h2
                    class="font-semibold text-xl text-center my-5 leading-tight text-primary1 uppercase"
                >
                    {{ lesson.lesson_name }}
                </h2>
                <div
                    class="flex px-3 items-center justify-between py-3 shadow-lg text-center text-2xl font-bold border-r-2 border-t-2 border-l-2 rounded-t-2xl border-primary1"
                >
                    <PrimaryButton
                        class="my-3"
                        :isLink="true"
                        title="Add Materi"
                        routeName="manage.lesson.material.create"
                        :idParam="lesson.id"
                    />
                    <PrimaryButton
                        class="my-3"
                        :isLink="false"
                        title="Edit Order"
                        onclick="orderModal.showModal()"
                    />
                </div>
                <div
                    class="border-2 rounded-b-2xl border-primary1 p-3 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4"
                >
                    <div
                        class="rounded-xl bg-primary1 justify-center flex flex-col items-center py-2"
                        v-for="(material, index) in materials"
                        :key="index"
                    >
                        <div
                            @click="showMaterialModal(material)"
                            class="hover:opacity-80 transition duration-300 ease-in-out cursor-pointer"
                        >
                            <figure class="w-48 h-56 overflow-hidden">
                                <img
                                    class="h-full w-full object-cover"
                                    :src="`/storage/images/${material.cover}`"
                                    alt="Cover"
                                />
                            </figure>
                            <h2
                                class="text-center p-3 font-bold text-xl text-white uppercase"
                            >
                                {{ material.material_name }}
                            </h2>
                        </div>
                        <div class="flex flex-row w-full px-2 gap-2">
                            <Link
                                :href="
                                    route('manage.lesson.material.edit', [
                                        lesson.id,
                                        material.id,
                                    ])
                                "
                                class="btn bg-yellow border-none text-white hover:bg-yellow2 flex-1 text-lg"
                                as="button"
                            >
                                Edit
                            </Link>
                            <button
                                class="btn bg-danger border-none text-white hover:bg-danger2 flex-1 text-lg"
                                @click="confirmMaterialDelete(material)"
                            >
                                Delete
                            </button>
                        </div>
                    </div>
                </div>

                <!-- LIST QUIZ -->
                <div
                    class="flex px-3 items-center justify-between mt-5 py-3 shadow-lg text-center text-2xl font-bold border-r-2 border-t-2 border-l-2 rounded-t-2xl border-primary1"
                >
                    <PrimaryButton
                        class="my-3"
                        :isLink="true"
                        title="Tambah Quiz"
                        routeName="manage.lesson.quiz.create"
                        :idParam="lesson.id"
                    />
                </div>
                <div
                    class="border-2 rounded-b-2xl border-primary1 p-3 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4"
                >
                    <div
                        class="rounded-xl bg-primary1 justify-center flex flex-col items-center py-2"
                        v-for="(quiz, index) in quizzes"
                        :key="index"
                    >
                        <div
                            @click="showQuizModal(quiz)"
                            class="hover:opacity-80 transition duration-300 ease-in-out cursor-pointer"
                        >
                            <figure class="w-48 h-56 overflow-hidden">
                                <img
                                    class="w-full h-full object-cover"
                                    :src="'/storage/images/' + quiz.cover"
                                    alt="Cover"
                                />
                            </figure>

                            <h2
                                class="text-center p-3 font-bold text-xl text-white uppercase"
                            >
                                Question {{ index + 1 }}
                            </h2>
                        </div>
                        <div class="flex flex-row w-full px-2 gap-2">
                            <Link
                                :href="
                                    route('manage.lesson.quiz.edit', [
                                        lesson.id,
                                        quiz.id,
                                    ])
                                "
                                class="btn bg-yellow border-none text-white hover:bg-yellow2 flex-1 text-lg"
                                as="button"
                            >
                                Edit
                            </Link>
                            <button
                                class="btn bg-danger border-none text-white hover:bg-danger2 flex-1 text-lg"
                                @click="confirmQuizDelete(quiz)"
                            >
                                Delete
                            </button>
                        </div>
                    </div>
                </div>

                <!-- VIEW MATERIAL -->
                <dialog id="materialModal" class="modal">
                    <div class="modal-box max-w-6xl bg-white">
                        <h3 class="font-bold text-lg text-black">
                            Material Detail
                        </h3>
                        <div v-if="selectedMaterial" class="py-4 flex">
                            <div class="w-1/2 p-2 text-black">
                                <div class="mb-2">
                                    <p>Material Name</p>
                                    <p
                                        class="border py-1 px-2 rounded-md border-primary1 font-semibold"
                                    >
                                        {{ selectedMaterial.material_name }}
                                    </p>
                                </div>
                                <div class="mb-2">
                                    <p>Text English</p>
                                    <p
                                        class="border py-1 px-2 rounded-md border-primary1 font-semibold"
                                    >
                                        {{ selectedMaterial.text_en }}
                                    </p>
                                </div>
                                <div class="mb-2">
                                    <p>Text Indonesia</p>
                                    <p
                                        class="border py-1 px-2 rounded-md border-primary1 font-semibold"
                                    >
                                        {{ selectedMaterial.text_id }}
                                    </p>
                                </div>
                                <div class="mb-2">
                                    <p>Text Illustration</p>
                                    <p
                                        class="border py-1 px-2 rounded-md border-primary1 font-semibold"
                                    >
                                        {{
                                            selectedMaterial.text_illustration
                                                ? selectedMaterial.text_illustration
                                                : "-"
                                        }}
                                    </p>
                                </div>
                            </div>
                            <div class="w-1/2 p-2">
                                <div class="flex justify-evenly">
                                    <div
                                        class="border-2 border-primary1 rounded-lg text-center font-bold text-black w-48 h-52 overflow-hidden p-2"
                                    >
                                        <img
                                            class="w-full h-full object-cover"
                                            v-if="selectedMaterial.cover"
                                            :src="
                                                '/storage/images/' +
                                                selectedMaterial.cover
                                            "
                                            alt="Cover"
                                        />
                                    </div>

                                    <div
                                        class="border-2 border-primary1 rounded-lg text-center font-bold text-black w-48 h-52 overflow-hidden p-2"
                                    >
                                        <img
                                            class="w-full h-full object-cover"
                                            v-if="selectedMaterial.ilustration"
                                            :src="
                                                '/storage/images/' +
                                                selectedMaterial.ilustration
                                            "
                                            alt="Image Illustration"
                                        />
                                    </div>
                                </div>
                                <div
                                    class="mt-2 border-2 border-primary1 justify-center items-center text-center"
                                >
                                    <div v-if="selectedMaterial.video">
                                        <video controls>
                                            <source
                                                :src="
                                                    '/storage/videos/' +
                                                    selectedMaterial.video
                                                "
                                                type="video/mp4"
                                            />
                                            Your browser does not support the
                                            video tag.
                                        </video>
                                    </div>
                                    <span v-else>Video tidak tersedia</span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-action">
                            <form method="dialog">
                                <button class="btn" @click="closeMaterialModal">
                                    Close
                                </button>
                            </form>
                        </div>
                    </div>
                </dialog>

                <!-- VIEW QUIZ -->
                <dialog id="quizModal" class="modal">
                    <div class="modal-box max-w-6xl bg-white">
                        <h3
                            class="text-lg font-extrabold px-2 text-black text-center"
                        >
                            Quiz Detail
                        </h3>
                        <div v-if="selectedQuiz" class="flex">
                            <div class="p-2 w-1/2">
                                <!-- <div class="mb-2">
                                    <p>Answer</p>
                                    <p
                                        class="border py-1 px-2 rounded-md border-primary1 font-semibold"
                                    >
                                        {{ selectedQuiz.correct_answer }}
                                    </p>
                                </div> -->
                                <div class="mb-2">
                                    <p>Option A</p>
                                    <p
                                        class="border py-1 px-2 rounded-md font-semibold flex items-center justify-between"
                                    >
                                        <span>{{ selectedQuiz.col_1 }}</span>
                                        <span
                                            v-if="
                                                selectedQuiz.col_1 ===
                                                selectedQuiz.correct_answer
                                            "
                                            class="ml-2 text-end"
                                            >✔️</span
                                        >
                                        <span v-else class="ml-2">❌</span>
                                    </p>
                                </div>
                                <div class="mb-2">
                                    <p>Option B</p>
                                    <p
                                        class="border py-1 px-2 rounded-md font-semibold flex items-center justify-between"
                                    >
                                        <span>{{ selectedQuiz.col_2 }}</span>
                                        <span
                                            v-if="
                                                selectedQuiz.col_2 ===
                                                selectedQuiz.correct_answer
                                            "
                                            class="ml-2"
                                            >✔️</span
                                        >
                                        <span v-else class="ml-2">❌</span>
                                    </p>
                                </div>
                                <div class="mb-2">
                                    <p>Option C</p>
                                    <p
                                        :class="{
                                            'border-green-500 text-green-700':
                                                selectedQuiz.col_3 ===
                                                selectedQuiz.correct_answer,
                                            'border-red-500 text-red-700':
                                                selectedQuiz.col_3 !==
                                                selectedQuiz.correct_answer,
                                        }"
                                        class="border py-1 px-2 rounded-md font-semibold flex items-center justify-between"
                                    >
                                        <span>{{ selectedQuiz.col_3 }}</span>
                                        <span
                                            v-if="
                                                selectedQuiz.col_3 ===
                                                selectedQuiz.correct_answer
                                            "
                                            class="ml-2"
                                            >✔️</span
                                        >
                                        <span v-else class="ml-2">❌</span>
                                    </p>
                                </div>
                                <div class="mb-2">
                                    <p>Option D</p>
                                    <p
                                        class="border py-1 px-2 rounded-md font-semibold flex items-center justify-between"
                                    >
                                        <span>{{ selectedQuiz.col_4 }}</span>
                                        <span
                                            v-if="
                                                selectedQuiz.col_4 ===
                                                selectedQuiz.correct_answer
                                            "
                                            class="ml-2"
                                            >✔️</span
                                        >
                                        <span v-else class="ml-2">❌</span>
                                    </p>
                                </div>
                            </div>
                            <div
                                class="flex flex-col w-1/2 justify-center items-center"
                            >
                                <div
                                    class="border-2 p-2 border-primary1 rounded-lg text-center font-bold text-black mb-2"
                                >
                                    <img
                                        class="max-h-56"
                                        v-if="selectedQuiz.cover"
                                        :src="
                                            '/storage/images/' +
                                            selectedQuiz.cover
                                        "
                                        alt="Cover"
                                    />
                                    COVER
                                </div>

                                <div class="text-center font-bold text-black">
                                    <div v-if="selectedQuiz.asset_url">
                                        <video controls>
                                            <source
                                                :src="
                                                    '/storage/videos/' +
                                                    selectedQuiz.asset_url
                                                "
                                                type="video/mp4"
                                            />
                                            Your browser does not support the
                                            video tag.
                                        </video>
                                    </div>
                                    <span v-else>Tidak Ada</span>
                                    VIDEO
                                </div>
                            </div>
                        </div>
                        <div class="modal-action">
                            <form method="dialog">
                                <button class="btn" @click="closeMaterialModal">
                                    Close
                                </button>
                            </form>
                        </div>
                    </div>
                </dialog>

                <!-- ORDER MODAL -->
                <dialog
                    id="orderModal"
                    class="modal modal-bottom sm:modal-middle"
                >
                    <div class="modal-box bg-white">
                        <h3 class="font-bold text-lg">Edit Order</h3>
                        <ul class="cursor-grabbing" id="sortableList" sortable>
                            <li
                                class="p-3 border m-2"
                                v-for="(material, index) in materials"
                                :key="material.id"
                                :data-id="material.id"
                            >
                                {{ material.material_name }}
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
    </AuthenticatedLayout>
</template>
