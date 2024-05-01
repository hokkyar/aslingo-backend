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
        material_name: '',
        text_en: '',
        text_id: '',
        text_illustration: '',
        cover: null,
        head_pic: null,
        ilustration: null,
        video_illustration: null,
      }),
    }
  },
  methods: {
    handleSubmit() {
      this.form.post(route('manage.lesson.material.store', this.lesson.id))
    }
  },
}

</script>

<template>

  <Head title="Create Material" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create Material For {{ lesson.lesson_name }}</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900">

            <p>
              ERROR : {{ form.errors }}
            </p>
            <form @submit.prevent="handleSubmit">

              <div class="my-3">
                <InputLabel for="material_name" value="Material Name" />
                <TextInput v-model="form.material_name" id="material_name" type="text" class="mt-1 block w-full"
                  required autofocus />
                <InputError class="mt-2" />
              </div>
              <div class="my-3">
                <InputLabel for="text_en" value="Text English" />
                <TextInput v-model="form.text_en" id="text_en" type="text" class="mt-1 block w-full" required />
                <InputError class="mt-2" />
              </div>
              <div class="my-3">
                <InputLabel for="text_id" value="Text Indonesia" />
                <TextInput v-model="form.text_id" id="text_id" type="text" class="mt-1 block w-full" required />
                <InputError class="mt-2" />
              </div>
              <div class="my-3">
                <InputLabel for="text_illustration" value="Text Illustration" />
                <TextInput v-model="form.text_illustration" id="text_illustration" type="text"
                  class="mt-1 block w-full" />
                <InputError class="mt-2" />
              </div>

              <div class="flex flex-col my-3">
                <InputLabel for="cover" value="Cover" />
                <input @input="form.cover = $event.target.files[0]" id="cover" type="file"
                  class="file-input file-input-bordered w-full" accept="image/*" />
              </div>

              <div class="flex flex-col my-3">
                <InputLabel for="head_pic" value="Head Picture" />
                <input @input="form.head_pic = $event.target.files[0]" id="head_pic" type="file"
                  class="file-input file-input-bordered w-full" accept="image/*" />
              </div>

              <div class="flex flex-col my-3">
                <InputLabel for="illustration" value="Image Illustration" />
                <input @input="form.ilustration = $event.target.files[0]" id="illustration" type="file"
                  class="file-input file-input-bordered w-full" accept="image/*" />
              </div>

              <div class="my-3">
                <InputLabel for="video_illustration" value="Illustration Video" />
                <input @input="form.video_illustration = $event.target.files[0]" id="video_illustration" type="file"
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
