<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

export default {
  props: { user: Object, class_progress: Array, lesson_progress: Array },
  components: {
    AuthenticatedLayout,
    Head,
    Link
  }
}
</script>

<template>

  <Head title="Show User" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Show User : {{ user.name }}</h2>
    </template>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900">
            {{ user }}

            <br><br>
            <p class="font-bold">PROGRESS CLASS 7 : {{ class_progress[0].progress }}%</p>
            <ul>
              <li v-for="l_progress in lesson_progress" :key="l_progress.id">
                <p v-if="l_progress.lesson.class == 7">
                  {{ l_progress.lesson.lesson_name }} = {{ l_progress.progress }}%
                </p>
              </li>
            </ul>
            <p class="font-bold">PROGRESS CLASS 8 : {{ class_progress[1].progress }}%</p>
            <ul>
              <li v-for="l_progress in lesson_progress" :key="l_progress.id">
                <p v-if="l_progress.lesson.class == 8">
                  {{ l_progress.lesson.lesson_name }} = {{ l_progress.progress }}%
                </p>
              </li>
            </ul>
            <p class="font-bold">PROGRESS CLASS 9 : {{ class_progress[2].progress }}%</p>
            <ul>
              <li v-for="l_progress in lesson_progress" :key="l_progress.id">
                <p v-if="l_progress.lesson.class == 9">
                  {{ l_progress.lesson.lesson_name }} = {{ l_progress.progress }}%
                </p>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>