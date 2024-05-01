<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, Link, router } from '@inertiajs/vue3';
import Sortable from 'sortablejs';

export default {
  props: { lesson: Object, materials: Array, quizzes: Array },
  components: {
    AuthenticatedLayout,
    Head,
    Link,
    PrimaryButton
  },
  data() {
    return {
      selectedMaterial: null,
      selectedQuiz: null,
      isLoading: false,
    }
  },
  methods: {
    showMaterialModal(material) {
      this.selectedMaterial = material
      materialModal.showModal()
    },
    closeMaterialModal() {
      this.selectedMaterial = null
      materialModal.close()
    },
    showQuizModal(quiz) {
      this.selectedQuiz = quiz
      quizModal.showModal()
    },
    closeQuizModal() {
      this.selectedQuiz = null
      quizModal.close()
    },
    confirmMaterialDelete(material) {
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to recover this material!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          router.delete(
            route('manage.lesson.material.destroy', [this.lesson.id, material.id]),
            {
              onSuccess: () => {
                Swal.fire(
                  'Deleted!',
                  'Material has been deleted.',
                  'success'
                )
              }
            }
          )
        }
      })
    },
    confirmQuizDelete(quiz) {
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to recover this quiz!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          router.delete(
            route('manage.lesson.quiz.destroy', quiz.id),
            {
              onSuccess: () => {
                Swal.fire(
                  'Deleted!',
                  'Quiz has been deleted.',
                  'success'
                )
              }
            }
          )
        }
      })
    },
    saveOrder() {
      this.isLoading = true
      const items = document.getElementById('sortableList').getElementsByTagName('li')
      const orderedIds = Array.from(items).map(li => parseInt(li.dataset.id))
      router.post(route('manage.lesson.material.edit_order'), { orderedIds }, {
        onSuccess: () => {
          orderModal.close()
          this.isLoading = false
        }
      })
    }
  },
  mounted() {
    const sortableList = document.getElementById('sortableList')
    new Sortable(sortableList, {
      animation: 150,
      ghostClass: 'sortable-ghost',
      onEnd: this.handleSortEnd
    })

    $('#materialTable').DataTable({
      searching: false,
      lengthChange: false,
      ordering: false,
      paging: false,
      info: false,
    })

    $('#quizTable').DataTable({
      searching: false,
      lengthChange: false,
      ordering: false,
      paging: false,
      info: false,
    })
  }
}

</script>

<template>

  <Head title="Show Lesson" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Show Lesson : {{ lesson.lesson_name }}</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900">

            <div class="flex items-center justify-between">
              <PrimaryButton class="my-3" :isLink="true" title="Tambah Materi" routeName="manage.lesson.material.create"
                :idParam="lesson.id" />
              <PrimaryButton class="my-3" :isLink="false" title="Edit Order" onclick="orderModal.showModal()" />
            </div>

            <table id="materialTable" class="display text-center">
              <thead>
                <tr>
                  <th class="w-[10px]">No</th>
                  <th>Cover</th>
                  <th>Materi</th>
                  <th class="min-w-[300px]">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(material, index) in materials">
                  <td>
                    {{ index + 1 }}
                  </td>
                  <td>
                    <img class="max-w-52" :src="'/storage/images/' + material.cover" alt="Cover">
                  </td>
                  <td>{{ material.material_name }}</td>
                  <td>
                    <button class="btn btn-primary" @click="showMaterialModal(material)">View</button>
                    <Link :href="route('manage.lesson.material.edit', [lesson.id, material.id])"
                      class="btn btn-warning mx-2" as="button">Edit
                    </Link>
                    <button class="btn btn-error" @click="confirmMaterialDelete(material)">Delete</button>
                  </td>
                </tr>
              </tbody>
            </table>

            <dialog id="materialModal" class="modal">
              <div class="modal-box max-w-3xl">
                <h3 class="font-bold text-lg">Material Detail</h3>
                <div v-if="selectedMaterial" class="py-4">
                  <p>
                    COVER : <img class="max-w-52" v-if="selectedMaterial.cover"
                      :src="'/storage/images/' + selectedMaterial.cover" alt="Cover" />
                    <span v-else>Tidak Ada</span>
                  </p>
                  <p class="my-2">
                    HEAD PICTURE : <img class="max-w-52" v-if="selectedMaterial.head_pic"
                      :src="'/storage/images/' + selectedMaterial.head_pic" alt="Head Picture" />
                    <span v-else>Tidak Ada</span>
                  </p>
                  <p class="my-2">MATERIAL NAME : {{ selectedMaterial.material_name }}</p>
                  <p class="my-2">TEXT ENGLISH : {{ selectedMaterial.text_en }}</p>
                  <p class="my-2">TEXT INDONESIA : {{ selectedMaterial.text_id }}</p>
                  <p class="my-2">TEXT ILLUSTRATION : {{ selectedMaterial.text_illustration }}</p>
                  <p class="my-2">
                    IMAGE ILLUSTRATION : <img class="max-w-52" v-if="selectedMaterial.ilustration"
                      :src="'/storage/images/' + selectedMaterial.ilustration" alt="Image Illustration" />
                    <span v-else>Tidak Ada</span>
                  </p>
                  <p class="my-2">
                    VIDEO ILLUSTRATION :
                  <div v-if="selectedMaterial.video">
                    <video controls>
                      <source :src="'/storage/videos/' + selectedMaterial.video" type="video/mp4">
                      Your browser does not support the video tag.
                    </video>
                  </div>
                  <span v-else>Tidak Ada</span>
                  </p>
                </div>
                <div class="modal-action">
                  <form method="dialog">
                    <button class="btn" @click="closeMaterialModal">Close</button>
                  </form>
                </div>
              </div>
            </dialog>

            <!-- ORDER MODAL -->
            <dialog id="orderModal" class="modal modal-bottom sm:modal-middle">
              <div class="modal-box">
                <h3 class="font-bold text-lg">Edit Order</h3>
                <ul class="cursor-grabbing" id="sortableList" sortable>
                  <li class="p-3 border m-2" v-for="(material, index) in materials" :key="material.id"
                    :data-id="material.id">
                    {{ material.material_name }}
                  </li>
                </ul>
                <div class="modal-action">
                  <button v-if="isLoading" class="btn btn-primary" disabled>Loading...</button>
                  <button v-else class="btn btn-primary" @click="saveOrder">Save</button>
                  <form method="dialog">
                    <button class="btn">Close</button>
                  </form>
                </div>
              </div>
            </dialog>

            <PrimaryButton class="my-5" :isLink="true" title="Tambah Quiz" routeName="manage.lesson.quiz.create"
              :idParam="lesson.id" />

            <table id="quizTable" class="display text-center">
              <thead>
                <tr>
                  <th>Cover</th>
                  <th>Content</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="quiz in quizzes">
                  <td>
                    <img class="max-w-52" :src="'/storage/images/' + quiz.cover" alt="Cover">
                  </td>
                  <td>{{ quiz.content }}</td>
                  <td>
                    <button class="btn btn-primary" @click="showQuizModal(quiz)">View</button>
                    <Link :href="route('manage.lesson.quiz.edit', [lesson.id, quiz.id])" class="btn btn-warning mx-2"
                      as="button">Edit
                    </Link>
                    <button class="btn btn-error" @click="confirmQuizDelete(quiz)">Delete</button>
                  </td>
                </tr>
              </tbody>
            </table>

            <dialog id="quizModal" class="modal">
              <div class="modal-box">
                <h3 class="font-bold text-lg">Quiz Detail</h3>
                <div v-if="selectedQuiz" class="py-4">
                  <p class="my-3">
                    COVER : <img v-if="selectedQuiz.cover" class="max-w-52"
                      :src="'/storage/images/' + selectedQuiz.cover" alt="Cover">
                    <span v-else>Tidak Ada</span>
                  </p>

                  <p class="my-3">
                    OTHER :
                  <div v-if="selectedQuiz.asset_url">
                    <video controls>
                      <source :src="'/storage/videos/' + selectedQuiz.asset_url" type="video/mp4">
                      Your browser does not support the video tag.
                    </video>
                  </div>
                  <span v-else>Tidak Ada</span>
                  </p>

                  <p>CONTENT : {{ selectedQuiz.content }}</p>
                  <p>
                    CHOICE A :
                    <span v-if="selectedQuiz.correct_answer == selectedQuiz.col_1" class="text-success">{{
        selectedQuiz.col_1 }}</span>
                    <span v-else>{{ selectedQuiz.col_1 }}</span>
                  </p>
                  <p>
                    CHOICE B :
                    <span v-if="selectedQuiz.correct_answer == selectedQuiz.col_2" class="text-success">{{
        selectedQuiz.col_2 }}</span>
                    <span v-else>{{ selectedQuiz.col_2 }}</span>
                  </p>
                  <p>
                    CHOICE C :
                    <span v-if="selectedQuiz.correct_answer == selectedQuiz.col_3" class="text-success">{{
        selectedQuiz.col_3 }}</span>
                    <span v-else>{{ selectedQuiz.col_3 }}</span>
                  </p>
                  <p>
                    CHOICE D :
                    <span v-if="selectedQuiz.correct_answer == selectedQuiz.col_4" class="text-success">{{
        selectedQuiz.col_4 }}</span>
                    <span v-else>{{ selectedQuiz.col_4 }}</span>
                  </p>
                </div>
                <div class="modal-action">
                  <form method="dialog">
                    <button class="btn" @click="closeMaterialModal">Close</button>
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
