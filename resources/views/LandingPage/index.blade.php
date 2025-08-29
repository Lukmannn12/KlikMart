<x-layouts.app title="Situs Jual Beli Online Terpercaya">
  <!-- Banner Slider -->
  <section id="banner">
    <div class="relative w-full h-[380px] container mx-auto mt-6 overflow-hidden rounded-xl">
      <!-- Wrapper -->
      <div id="slider" class="flex transition-transform duration-500 ease-in-out">
        <!-- Slide 1 -->
        <img src="{{ asset('gambar/banner1.jpg') }}" class="w-full flex-shrink-0" />
        <!-- Slide 2 -->
        <img src="{{ asset('gambar/banner2.jpg') }}" class="w-full flex-shrink-0" />
        <!-- Slide 3 -->
        <img src="{{ asset('gambar/banner3.jpg') }}" class="w-full flex-shrink-0" />
      </div>

      <!-- Tombol Prev -->
      <button onclick="prevSlide()"
        class="absolute top-1/2 left-3 -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full">
        &#10094;
      </button>
      <!-- Tombol Next -->
      <button onclick="nextSlide()"
        class="absolute top-1/2 right-3 -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full">
        &#10095;
      </button>
    </div>
  </section>
  <!-- End Banner Slider -->

  {{-- section kategori --}}
  <section id="kategori" class="container mx-auto mt-10 rounded-xl shadow-xl">
    <div class="p-6">
      <h2 class="text-2xl font-bold mb-6">Kategori Produk</h2>
      <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-7 gap-4">
        <!-- Kategori 1 -->
        <div class="flex flex-col p-4 shadow-md border border-gray-200 rounded-lg hover:shadow-lg transition">
          <img src="" alt="" class="w-16 h-16 mb-2">
          <span class="text-center">Elektronik</span>
        </div>
        <!-- Kategori 1 -->
        <div class="flex flex-col p-4 shadow-md border border-gray-200 rounded-lg hover:shadow-lg transition">
          <img src="" alt="" class="w-16 h-16 mb-2">
          <span class="text-center">Elektronik</span>
        </div>
        <!-- Kategori 1 -->
        <div class="flex flex-col p-4 shadow-md border border-gray-200 rounded-lg hover:shadow-lg transition">
          <img src="" alt="" class="w-16 h-16 mb-2">
          <span class="text-center">Elektronik</span>
        </div>
        <!-- Kategori 1 -->
        <div class="flex flex-col p-4 shadow-md border border-gray-200 rounded-lg hover:shadow-lg transition">
          <img src="" alt="" class="w-16 h-16 mb-2">
          <span class="text-center">Elektronik</span>
        </div>
        <!-- Kategori 1 -->
        <div class="flex flex-col p-4 shadow-md border border-gray-200 rounded-lg hover:shadow-lg transition">
          <img src="" alt="" class="w-16 h-16 mb-2">
          <span class="text-center">Elektronik</span>
        </div>
        <!-- Kategori 1 -->
        <div class="flex flex-col p-4 shadow-md border border-gray-200 rounded-lg hover:shadow-lg transition">
          <img src="" alt="" class="w-16 h-16 mb-2">
          <span class="text-center">Elektronik</span>
        </div>
        <!-- Kategori 1 -->
        <div class="flex flex-col p-4 shadow-md border border-gray-200 rounded-lg hover:shadow-lg transition">
          <img src="" alt="" class="w-16 h-16 mb-2">
          <span class="text-center">Elektronik</span>
        </div>
        <!-- Kategori 1 -->
        <div class="flex flex-col p-4 shadow-md border border-gray-200 rounded-lg hover:shadow-lg transition">
          <img src="" alt="" class="w-16 h-16 mb-2">
          <span class="text-center">Elektronik</span>
        </div>
        <!-- Kategori 1 -->
        <div class="flex flex-col p-4 shadow-md border border-gray-200 rounded-lg hover:shadow-lg transition">
          <img src="" alt="" class="w-16 h-16 mb-2">
          <span class="text-center">Elektronik</span>
        </div>
      </div>

  </section>
  {{-- end section kategori --}}

  <!-- Section Produk -->
  <section class="container mx-auto mt-20 px-4">
    <!-- Header -->
    <div class="flex items-center mb-10 space-x-10">
      <h2 class="text-lg font-semibold text-green-600 border-b-2 border-green-600">For Lukman</h2>
      <h2 class="text-lg font-semibold ">Produk Incaranmu</h2>
    </div>

    <!-- Grid Produk -->
    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
      <!-- Card Produk -->
      <div class="rounded-lg shadow-sm overflow-hidden hover:shadow-md transition">
        <img src="{{ asset('gambar/produk1.jpg') }}" alt="Produk" class="w-full h-40 object-cover">
        <div class="p-3">
          <h3 class="text-sm font-medium text-gray-800 line-clamp-2">APPLE iPhone 13 128GB</h3>
          <p class="text-red-600 font-semibold">Rp8.119.000</p>
          <p class="text-xs text-gray-500">Hemat s.d. 5%</p>
          <div class="flex items-center mt-1 text-yellow-500 text-xs">
            ⭐ 4.9 • 10rb+ terjual
          </div>
        </div>
      </div>
      <div class="rounded-lg shadow-sm overflow-hidden hover:shadow-md transition">
        <img src="{{ asset('gambar/produk1.jpg') }}" alt="Produk" class="w-full h-40 object-cover">
        <div class="p-3">
          <h3 class="text-sm font-medium text-gray-800 line-clamp-2">APPLE iPhone 13 128GB</h3>
          <p class="text-red-600 font-semibold">Rp8.119.000</p>
          <p class="text-xs text-gray-500">Hemat s.d. 5%</p>
          <div class="flex items-center mt-1 text-yellow-500 text-xs">
            ⭐ 4.9 • 10rb+ terjual
          </div>
        </div>
      </div>
      <div class="rounded-lg shadow-sm overflow-hidden hover:shadow-md transition">
        <img src="{{ asset('gambar/produk1.jpg') }}" alt="Produk" class="w-full h-40 object-cover">
        <div class="p-3">
          <h3 class="text-sm font-medium text-gray-800 line-clamp-2">APPLE iPhone 13 128GB</h3>
          <p class="text-red-600 font-semibold">Rp8.119.000</p>
          <p class="text-xs text-gray-500">Hemat s.d. 5%</p>
          <div class="flex items-center mt-1 text-yellow-500 text-xs">
            ⭐ 4.9 • 10rb+ terjual
          </div>
        </div>
      </div>
      <div class="rounded-lg shadow-sm overflow-hidden hover:shadow-md transition">
        <img src="{{ asset('gambar/produk1.jpg') }}" alt="Produk" class="w-full h-40 object-cover">
        <div class="p-3">
          <h3 class="text-sm font-medium text-gray-800 line-clamp-2">APPLE iPhone 13 128GB</h3>
          <p class="text-red-600 font-semibold">Rp8.119.000</p>
          <p class="text-xs text-gray-500">Hemat s.d. 5%</p>
          <div class="flex items-center mt-1 text-yellow-500 text-xs">
            ⭐ 4.9 • 10rb+ terjual
          </div>
        </div>
      </div>
    </div>
  </section>
  {{-- end section produk --}}


  <script>
    const slider = document.getElementById('slider');
  const slides = slider.children.length;
  let index = 0;

  function showSlide(i) {
    index = (i + slides) % slides;
    slider.style.transform = `translateX(-${index * 100}%)`;
  }

  function nextSlide() {
    showSlide(index + 1);
  }

  function prevSlide() {
    showSlide(index - 1);
  }

  // Auto-slide setiap 5 detik
  setInterval(nextSlide, 5000);
  </script>

</x-layouts.app>