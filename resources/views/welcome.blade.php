@extends('layouts.Admin')

@section('testing')
    <!-- Tombol untuk membuka modal -->
<button data-modal-trigger="my-modal" class="bg-blue-500 text-white px-4 py-2 rounded-md">Buka Modal</button>

<!-- Modal -->
<div id="my-modal" class="fixed inset-0 z-50 flex items-center justify-center hidden">
  <!-- Latar belakang semi-transparan untuk modal -->
  <div class="absolute inset-0 bg-black opacity-50"></div>

  <!-- Kontainer modal -->
  <div class="bg-white p-8 rounded-lg shadow-lg">
    <!-- Judul modal -->
    <h2 class="text-xl font-semibold">Judul Modal</h2>

    <!-- Isi modal -->
    <p>Isi modal di sini.</p>

    <!-- Tombol penutup modal -->
    <button data-modal-close="my-modal" class="absolute top-0 right-0 mt-2 mr-2 text-gray-500 hover:text-gray-700 focus:outline-none">
      <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
      </svg>
    </button>
  </div>
</div>
<script>
    // Fungsi untuk membuka modal
function openModal(modalId) {
  const modal = document.getElementById(modalId);
  modal.classList.remove('hidden');
}

// Fungsi untuk menutup modalp
function closeModal(modalId) {
  const modal = document.getElementById(modalId);
  modal.classList.add('hidden');
}

// Event listener untuk tombol pembuka modal
const modalTrigger = document.querySelector('[data-modal-trigger="my-modal"]');
modalTrigger.addEventListener('click', () => {
  openModal('my-modal');
});

// Event listener untuk tombol penutup modal
const modalCloseButton = document.querySelector('[data-modal-close="my-modal"]');
modalCloseButton.addEventListener('click', () => {
  closeModal('my-modal');
});

</script>
@endsection
