<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

export default {
  props: { lesson: Object },
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
        content: '',
        correct_answer: '',
        col_1: '',
        col_2: '',
        col_3: '',
        col_4: '',
        cover: null,
        asset_url: null,
      })
    }
  },
  methods: {
    handleSubmit() {
      this.form.post(route('manage.lesson.quiz.store', this.lesson.id))
    }
  },
}

</script>

<template>

  <Head title="Create Quiz" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create Quiz For {{ lesson.lesson_name }}</h2>
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
                  required autofocus />
                <InputError class="mt-2" />
              </div>
              <div class="my-3">
                <InputLabel for="col_1" value="Choice A" />
                <TextInput v-model="form.col_1" id="col_1" type="text" class="mt-1 block w-full" required autofocus />
                <InputError class="mt-2" />
              </div>
              <div class="my-3">
                <InputLabel for="col_2" value="Choice B" />
                <TextInput v-model="form.col_2" id="col_2" type="text" class="mt-1 block w-full" required autofocus />
                <InputError class="mt-2" />
              </div>
              <div class="my-3">
                <InputLabel for="col_3" value="Choice C" />
                <TextInput v-model="form.col_3" id="col_3" type="text" class="mt-1 block w-full" required autofocus />
                <InputError class="mt-2" />
              </div>
              <div class="my-3">
                <InputLabel for="col_4" value="Choice D" />
                <TextInput v-model="form.col_4" id="col_4" type="text" class="mt-1 block w-full" required autofocus />
                <InputError class="mt-2" />
              </div>

              <div class="flex flex-col my-3">
                <InputLabel for="cover" value="Cover" />
                <input @input="form.cover = $event.target.files[0]" id="cover" type="file"
                  class="file-input file-input-bordered w-full" accept="image/*" />
              </div>

              <div class="flex flex-col my-3">
                <InputLabel for="asset_url" value="Other (It can be video or gif)" />
                <input @input="form.asset_url = $event.target.files[0]" id="asset_url" type="file"
                  class="file-input file-input-bordered w-full" accept="video/*" />
              </div>

              <PrimaryButton class="mt-4" title="Save" :isLink="false" :disabled="form.processing" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
