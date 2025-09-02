 <!-- Header -->
 <header class="bg-white shadow w-100">
     <div class="max-w-7xl mx-auto py-3 px-4 d-flex justify-content-between align-items-center ms-0">
         {{ $header }}

         <!-- Tombol Hamburger (hanya mobile) -->
         <button
             @click="open = true"
             class="btn btn-light border d-md-none"
             type="button"
             aria-label="Buka sidebar"
             style="z-index: 1030;">
             <i class="bi bi-list fs-3"></i>
         </button>
     </div>
 </header>