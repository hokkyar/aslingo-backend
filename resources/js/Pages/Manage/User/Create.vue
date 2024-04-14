<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import UpdatePasswordForm from '@/Pages/Profile/Partials/UpdatePasswordForm.vue';
import { Head, useForm } from '@inertiajs/vue3';

export default {
  components: {
    AuthenticatedLayout,
    Head,
    UpdatePasswordForm,
    InputError,
    InputLabel,
    PrimaryButton,
    TextInput
  },

  data() {
    return {
      form: useForm({
        name: '',
        email: '',
        password: '',
      })
    }
  },

  methods: {
    handleSubmit() {
      this.form.post(route('manage.user.store'))
    }
  }
}
</script>

<template>

  <Head title="Create User" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah User</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

          <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">

              <header>
                <h2 class="text-lg font-medium text-gray-900">Add a New User</h2>
                <p class="mt-1 text-sm text-gray-600">
                  Ensure the user account is using a long, random password to stay secure.
                </p>
                ERROR: {{ form.errors }}
              </header>

              <form @submit.prevent="handleSubmit" class="mt-6 space-y-6">
                <div>
                  <InputLabel for="name" value="Name" />
                  <TextInput required v-model="form.name" id="name" type="text" class="mt-1 block w-full" autofocus
                    autocomplete="name" />
                  <InputError class="mt-2" />
                </div>

                <div>
                  <InputLabel for="email" value="Email" />
                  <TextInput required v-model="form.email" id="email" type="email" class="mt-1 block w-full"
                    autocomplete="email" />
                  <InputError class="mt-2" />
                </div>

                <div>
                  <InputLabel for="password" value="Password" />
                  <TextInput required v-model="form.password" id="password" type="password" class="mt-1 block w-full"
                    autocomplete="password" />
                  <InputError class="mt-2" />
                </div>

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
