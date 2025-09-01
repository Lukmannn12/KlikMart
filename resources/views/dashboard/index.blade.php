<x-dashboard.layouts.app title="Dashboard">
    <div class="p-10 space-y-5 flex flex-col border border-gray-200 rounded-xl">
        <!-- Card Utama -->
        <div class="bg-white border border-gray-300 rounded-xl p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">

                <!-- Total Users -->
                <div class="flex items-center border border-gray-200 p-4 rounded-xl shadow hover:shadow-lg transition">
                    <div class="bg-blue-500 text-white p-3 rounded-full mr-4">
                        <!-- Icon User -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5.121 17.804A8 8 0 1112 20a8 8 0 01-6.879-2.196z" />
                        </svg>
                    </div>
                    <div class="space-y-1">
                        <h2 class="font-semibold">Total Users</h2>
                        <p class="text-xl font-bold">{{ $userCount }}</p>
                    </div>
                </div>

                <!-- Total Products -->
                <div class="flex items-center border border-gray-200 p-4 rounded-xl shadow hover:shadow-lg transition">
                    <div class="bg-green-500 text-white p-3 rounded-full mr-4">
                        <!-- Icon Box/Product -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 13V7a2 2 0 00-2-2h-4m0 0H6a2 2 0 00-2 2v6m16 0l-8 8-8-8" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="font-semibold">Total Products</h2>
                        <p class="text-xl font-bold">{{ $productCount }}</p>
                    </div>
                </div>

                <!-- Total Categories -->
                <div class="flex items-center border border-gray-200 p-4 rounded-xl shadow hover:shadow-lg transition">
                    <div class="bg-purple-500 text-white p-3 rounded-full mr-4">
                        <!-- Icon Category -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="font-semibold">Total Categories</h2>
                        <p class="text-xl font-bold">{{ $categoryCount }}</p>
                    </div>
                </div>

                <!-- Total Orders -->
                <div class="flex items-center border border-gray-200 p-4 rounded-xl shadow hover:shadow-lg transition">
                    <div class="bg-yellow-500 text-white p-3 rounded-full mr-4">
                        <!-- Icon Order -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 10h18M3 14h18M5 6h14M5 18h14" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="font-semibold">Total Orders</h2>
                        <p class="text-xl font-bold">{{ $orderCount }}</p>
                    </div>
                </div>

                <!-- Orders by Status (Pending) -->
                <div class="flex items-center border border-gray-200 p-4 rounded-xl shadow hover:shadow-lg transition">
                    <div class="bg-red-500 text-white p-3 rounded-full mr-4">
                        <!-- Icon Pending -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="font-semibold">Pending</h2>
                        <p class="text-xl font-bold">{{ $orderPending }}</p>
                    </div>
                </div>

                <!-- Paid -->
                <div class="flex items-center border border-gray-200 p-4 rounded-xl shadow hover:shadow-lg transition">
                    <div class="bg-blue-500 text-white p-3 rounded-full mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="font-semibold">Paid</h2>
                        <p class="text-xl font-bold">{{ $orderPaid }}</p>
                    </div>
                </div>

                <!-- Shipped -->
                <div class="flex items-center border border-gray-200 p-4 rounded-xl shadow hover:shadow-lg transition">
                    <div class="bg-purple-500 text-white p-3 rounded-full mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 10h18M3 14h18" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="font-semibold">Shipped</h2>
                        <p class="text-xl font-bold">{{ $orderShipped }}</p>
                    </div>
                </div>

                <!-- Completed -->
                <div class="flex items-center border border-gray-200 p-4 rounded-xl shadow hover:shadow-lg transition">
                    <div class="bg-green-500 text-white p-3 rounded-full mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="font-semibold">Completed</h2>
                        <p class="text-xl font-bold">{{ $orderCompleted }}</p>
                    </div>
                </div>

                <!-- Cancelled -->
                <div class="flex items-center border border-gray-200 p-4 rounded-xl shadow hover:shadow-lg transition">
                    <div class="bg-red-500 text-white p-3 rounded-full mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="font-semibold">Cancelled</h2>
                        <p class="text-xl font-bold">{{ $orderCancelled }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full py-8 border border-gray-200 rounded-xl">
            <!-- Grid Grafik -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 px-5">

                <!-- Grafik Pemasukan Bulanan -->
                <div class="bg-white shadow-md rounded-xl p-5 border border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-700 mb-3">Pemasukan Bulanan</h2>
                    <canvas id="incomeChart" class="w-full h-48"></canvas>
                </div>


                <!-- Grafik User Baru -->
                <div class="bg-white shadow-md rounded-xl p-5 border border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-700 mb-3">Total Orders Per Bulan</h2>
                    <canvas id="userChart" class="w-full h-48"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        function formatRupiah(angka) {
                    if (typeof angka !== "number") angka = parseInt(angka);
                    return "Rp " + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                }

            const ctx = document.getElementById('incomeChart');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: @json($months), // ['Jan', 'Feb', ...]
                    datasets: [{
                        label: 'Pemasukan',
                        data: @json($incomeData), // [2000000, 3500000, ...]
                        borderColor: 'rgb(59, 130, 246)',
                        backgroundColor: 'rgba(59, 130, 246, 0.2)',
                        tension: 0.4,
                        fill: true,
                        pointRadius: 6,
                        pointBackgroundColor: 'rgb(59, 130, 246)',
                        pointHoverRadius: 8
                    }]
                },
                options: {
                    responsive: true,
                    animation: {
                        duration: 2000,
                        easing: 'easeOutQuart'
                    },
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let value = context.raw;
                                    return formatRupiah(value);
                                }
                            }
                        },
                        legend: {
                            display: true,
                            labels: {
                                color: '#374151'
                            }
                        }
                    },
                    scales: {
                        y: {
                            ticks: {
                                callback: function(value) {
                                    return formatRupiah(value);
                                }
                            }
                        }
                    }
                }
            });

            new Chart(document.getElementById('userChart'), {
                    type: 'bar',
                    data: {
                        labels: @json($months),
                        datasets: [{
                            label: 'Total Orders',
                            data: @json($ordersData),
                            backgroundColor: '#8B5CF6',
                            borderRadius: 8 // biar bar chart lebih smooth
                        }]
                    },
                    options: {
                        responsive: true,
                        animation: {
                            duration: 1500
                        },
                        plugins: {
                            legend: {
                                display: true,
                                labels: {
                                    color: '#374151'
                                }
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        return context.raw + ' Orders';
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                ticks: {
                                    stepSize: 1
                                }
                            }
                        }
                    }
                });
    </script>
</x-dashboard.layouts.app>