<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, router, useForm } from '@inertiajs/vue3';

export default {
  props: {
    lesson: Object
  },
  components: {
    AuthenticatedLayout,
    Head,
    InputError,
    InputLabel,
    PrimaryButton,
    TextInput
  },

  data() {
    return {
      form: useForm({
        lesson_name: this.lesson.lesson_name,
        cover: null,
        class: this.lesson.class,
      }),
      imageUrl: '/storage/images/' + this.lesson.cover,
    }
  },

  methods: {
    handleSubmit() {
      this.form.post(route('manage.lesson.update', this.lesson.id))
    },
    handleFileChange(event) {
      const selectedFile = event.target.files[0]
      this.imageUrl = URL.createObjectURL(selectedFile)
      this.form.cover = selectedFile
    }
  }
}
</script>

<template>

  <Head title="Edit Lesson" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Lesson</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

          <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">

              <header>
                <h2 class="text-lg font-medium text-gray-900">Edit Lesson</h2>
                ERROR : {{ form.errors }}
                <p class="mt-1 text-sm text-gray-600">
                  {{ lesson }} (TEMPLATE)
                </p>
              </header>

              <form @submit.prevent="handleSubmit" class="mt-6 space-y-6">
                <div>
                  <InputLabel for="lesson_name" value="Lesson Name" />
                  <TextInput v-model="form.lesson_name" id="lesson_name" type="text" class="mt-1 block w-full" required
                    autofocus />
                  <InputError class="mt-2" />
                </div>

                <div class="flex flex-col gap-2">
                  <InputLabel for="cover" value="Cover" />
                  <img :src="imageUrl" alt="Cover">
                  <input @change="handleFileChange" id="cover" type="file" class="file-input file-input-bordered w-full"
                    accept="image/*" />
                </div>

                <!-- <div class="flex flex-col gap-2">
                  <InputLabel for="class" value="Class" />
                  <select id="class" v-model="form.class" class="select border border-gray-800 w-full">
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                  </select>
                </div> -->

                <div class="flex items-center gap-4">
                  <PrimaryButton title="Save" :isLink="false" :disabled="form.processing" />

                  <Transition enter-active-class="transition ease-in-out" enter-from-class="opacity-0"
                    leave-active-class="transition ease-in-out" leave-to-class="opacity-0">
                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                  </Transition>
                </div>
              </form>

            </div>
          </div>

        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
