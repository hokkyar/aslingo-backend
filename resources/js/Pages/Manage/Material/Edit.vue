<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

export default {
  props: { lesson_id: String, material: Object },
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
        material_name: this.material.material_name,
        text_en: this.material.text_en,
        text_id: this.material.text_id,
        text_illustration: this.material.text_illustration,
        cover: null,
        head_pic: null,
        ilustration: null,
        video_illustration: this.material.video,
      }),
      coverImg: '/storage/images/' + this.material.cover,
      headPic: '/storage/images/' + this.material.head_pic,
      ilustration: '/storage/images/' + this.material.ilustration,
      videoIllustration: '/storage/videos/' + this.material.video,
    }
  },
  methods: {
    handleSubmit() {
      this.form.post(route('manage.lesson.material.update', [this.lesson_id, this.material.id]))
    },
    handleCover(event) {
      const selectedFile = event.target.files[0]
      this.coverImg = URL.createObjectURL(selectedFile)
      this.form.cover = selectedFile
    },
    handleHeadPic(event) {
      const selectedFile = event.target.files[0]
      this.headPic = URL.createObjectURL(selectedFile)
      this.form.head_pic = selectedFile
    },
    handleIlustration(event) {
      const selectedFile = event.target.files[0]
      this.ilustration = URL.createObjectURL(selectedFile)
      this.form.ilustration = selectedFile
    },
    handleVideo(event) {
      const selectedFile = event.target.files[0]
      this.videoIllustration = URL.createObjectURL(selectedFile)
      this.form.video_illustration = selectedFile
    },
  },
}

</script>

<template>

  <Head title="Edit Material" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit {{ material.material_name }}</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900">

            ERROR : {{ form.errors }}

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
                <TextInput v-model="form.text_illustration" id="text_illustration" type="text" class="mt-1 block w-full"
                  required />
                <InputError class="mt-2" />
              </div>

              <img :src="coverImg" alt="Cover">
              <div class="flex flex-col my-3">
                <InputLabel for="cover" value="Cover" />
                <input @change="handleCover" id="cover" type="file" class="file-input file-input-bordered w-full"
                  accept="image/*" />
              </div>

              <img :src="headPic" alt="Head Picture">
              <div class="flex flex-col my-3">
                <InputLabel for="head_pic" value="Head Picture" />
                <input @change="handleHeadPic" type="file" class="file-input file-input-bordered w-full"
                  accept="image/*" />
              </div>

              <img :src="ilustration" alt="Illustration">
              <div class="flex flex-col my-3">
                <InputLabel for="illustration" value="Illustration Image" />
                <input @change="handleIlustration" id="illustration" type="file"
                  class="file-input file-input-bordered w-full" accept="image/*" />
              </div>

              <p>Current Video: </p>
              <video v-if="form.video_illustration" controls>
                <source :src="videoIllustration" type="video/mp4">
                Your browser does not support the video tag.
              </video>
              <p v-else>Belum ada video</p>
              <div class="flex flex-col my-3">
                <InputLabel for="video_illustration" value="Illustration Video" />
                <input @change="handleVideo" id="video_illustration" type="file"
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
