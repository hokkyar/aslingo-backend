<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, Link } from '@inertiajs/vue3';

export default {
  components: {
    AuthenticatedLayout,
    Head,
    Link,
    PrimaryButton,
  },
  mounted() {
    $('#dataTable').DataTable({
      processing: true,
      serverSide: true,
      oLanguage: { sProcessing: `<img class="m-auto opacity-75" src="/images/cube-loading.gif" width="50" alt="Loading...">` },
      ajax: {
        url: '/datatables/user'
      },
      columns: [
        {
          data: 'name',
          render: function (data, type, row) {
            return `
              <div class="relative">
                <input class="nameInput w-full border-transparent focus:border-transparent focus:ring-0" type="text" value="${data}">
                <button data-id="${row.id}" class="saveBtn pointer-events-none opacity-0 absolute top-0 right-0 bg-green-600 text-white mt-[4px] py-1 px-5 rounded">Save</button>
              </div>`
          }
        },
        {
          data: 'email',
          name: 'email'
        },
        {
          data: 'id',
          orderable: false,
          render: function (data, type, row) {
            return `
            <a href='/dashboard/manage/user/${data}' class="viewBtn bg-blue-700 text-white px-6 py-1 rounded">View</a>
            <button class="deleteBtn bg-red-700 text-white px-5 py-1 rounded" data-id="${data}">Delete</button>
            `
          }
        },
      ]
    })

    $('#dataTable').on('click', '.deleteBtn', function () {
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: '/datatables/user/' + $(this).data('id'),
            type: 'DELETE',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function (result) {
              $('#dataTable').DataTable().ajax.reload()
              Swal.fire(
                'Deleted!',
                'User has been deleted.',
                'success'
              )
            },
            error: function (xhr, status, error) {
              console.error(xhr.responseText)
              Swal.fire(
                'Error!',
                'Error deleting user. Please try again later.',
                'error'
              )
            }
          })
        }
      })

    })

    let initialVal = ''
    let newValue = ''

    $('#dataTable').on('focus', '.nameInput', function () {
      initialVal = $(this).val()
      $(this).siblings('.saveBtn').removeClass('opacity-0 pointer-events-none').addClass('opacity-100')

      $('#dataTable').on('keyup', '.nameInput', function () {
        newValue = $(this).val()
      })
    })

    $('#dataTable').on('focus', '.saveBtn', function () {
      if (newValue !== '') {
        $.ajax({
          url: '/datatables/user/' + $(this).data('id'),
          data: {
            name: newValue
          },
          type: 'PUT',
          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
          success: function (result) {
            $('#dataTable').DataTable().ajax.reload()
          },
          error: function (xhr, status, error) {
            console.error(xhr.responseText)
            Swal.fire(
              'Error!',
              'Error updating user. Please try again later.',
              'error'
            )
          }
        })

        $('#dataTable').DataTable().ajax.reload()
      }
    })

    $('#dataTable').on('blur', '.nameInput', function () {
      if (initialVal !== $(this).val()) {
        $('#dataTable').DataTable().ajax.reload()
      }
      $(this).siblings('.saveBtn').removeClass('opacity-100').addClass('opacity-0 pointer-events-none')
    })
  }
}
</script>

<template>

  <Head title="Manage User" />
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Manage User</h2>
    </template>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm sm:rounded-lg px-8 py-3">
          <PrimaryButton class="my-3" :isLink="true" title="Tambah User" routeName="manage.user.create" />
          <div class="mt-2 overflow-hidden md:overflow-visible">
            <table class="table row-border" id="dataTable">
              <thead class="text-left">
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>