<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

export default {
  props: { lesson_id: String, quiz: Object },
  components: {
    AuthenticatedLayout,
    Head,
    Link,
    InputError,
    InputLabel,
    PrimaryButton,
    TextInput
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
        asset_url: null,
      }),
      coverImg: '/storage/images/' + this.quiz.cover,
      otherImg: '/storage/images/' + this.quiz.asset_url,
    }
  },
  methods: {
    handleSubmit() {
      this.form.post(route('manage.lesson.quiz.update', [this.lesson_id, this.quiz.id]))
    },
    handleCoverImg(event) {
      const selectedFile = event.target.files[0]
      this.coverImg = URL.createObjectURL(selectedFile)
      this.form.cover = selectedFile
    },
    handleOtherImg(event) {
      const selectedFile = event.target.files[0]
      this.otherImg = URL.createObjectURL(selectedFile)
      this.form.asset_url = selectedFile
    }
  },
}

</script>

<template>

  <Head title="Edit Quiz" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Quiz</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900">

            ERROR : {{ form.errors }}

            <form @submit.prevent="handleSubmit">

              <div class="my-3">
                <InputLabel for="content" value="Content" />
                <TextInput v-model="form.content" id="content" type="text" class="mt-1 block w-full" required
                  autofocus />
                <InputError class="mt-2" />
              </div>
              <div class="my-3">
                <InputLabel for="correct_answer" value="Answer" />
                <TextInput v-model="form.correct_answer" id="correct_answer" type="text" class="mt-1 block w-full"
                  required />
                <InputError class="mt-2" />
              </div>
              <div class="my-3">
                <InputLabel for="col_1" value="Choice A" />
                <TextInput v-model="form.col_1" id="col_1" type="text" class="mt-1 block w-full" />
                <InputError class="mt-2" />
              </div>
              <div class="my-3">
                <InputLabel for="col_2" value="Choice B" />
                <TextInput v-model="form.col_2" id="col_2" type="text" class="mt-1 block w-full" />
                <InputError class="mt-2" />
              </div>
              <div class="my-3">
                <InputLabel for="col_3" value="Choice C" />
                <TextInput v-model="form.col_3" id="col_3" type="text" class="mt-1 block w-full" />
                <InputError class="mt-2" />
              </div>
              <div class="my-3">
                <InputLabel for="col_4" value="Choice D" />
                <TextInput v-model="form.col_4" id="col_4" type="text" class="mt-1 block w-full" />
                <InputError class="mt-2" />
              </div>

              <img :src="coverImg" alt="Cover">
              <div class="flex flex-col my-3">
                <InputLabel for="cover" value="Cover" />
                <input @change="handleCoverImg" id="cover" type="file" class="file-input file-input-bordered w-full"
                  accept="image/*" />
              </div>

              <img :src="otherImg" alt="Other Image">
              <div class="flex flex-col my-3">
                <InputLabel for="asset_url" value="Other" />
                <input @change="handleOtherImg" id="asset_url" type="file"
                  class="file-input file-input-bordered w-full" />
              </div>

              <PrimaryButton class="mt-4" title="Save" :isLink="false" :disabled="form.processing" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
