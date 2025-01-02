@extends('home')

@section('content')
    <!-- Breadcrumb -->
    <nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="dashboard"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    Dashboard
                </a>
            </li>
        </ol>
    </nav>
    <br>
    <br>
    <div class="row">
        <div class="col-md-12 mb-10">
            <div class="relative flex flex-wrap items-center justify-center gap-3 max-sm:gap-8">
                <a href="/category"
                    class="w-full sm:w-80 md:w-72 p-6 bg-white rounded-lg shadow-lg border hover:bg-slate-50 dark:hover:bg-gray-700 flex items-center justify-between dark:bg-gray-800 dark:border-0">
                    <!-- Bagian kiri -->
                    <div>
                        <h5 class="text-base text-gray-400">Category</h5>
                        <h5 class="text-xl font-bold mb-2 text-black dark:text-white">{{ $category->count() }}</h5>
                    </div>

                    <!-- Ikon -->
                    <svg class="w-6 h-6 text-blue-500 transition duration-75 dark:text-blue-500 group-hover:text-blue-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                        <path
                            d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                    </svg>
                </a>


                <a href="/mesin"
                    class="w-full sm:w-80 md:w-72 p-6 bg-white rounded-lg shadow-lg border hover:bg-slate-50 dark:hover:bg-gray-700 flex items-center justify-between dark:bg-gray-800 dark:border-0">
                    <!-- Bagian kiri -->
                    <div>
                        <h5 class="text-base text-gray-400">Mesin</h5>
                        <h5 class="text-xl font-bold mb-2 text-black dark:text-white">{{ $mesin->count() }}</h5>
                    </div>

                    <svg class="flex-shrink-0 w-8 h-8 text-red-500 transition duration-75 dark:text-red-500 group-hover:text-red-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M9.586 2.586A2 2 0 0 1 11 2h2a2 2 0 0 1 2 2v.089l.473.196.063-.063a2.002 2.002 0 0 1 2.828 0l1.414 1.414a2 2 0 0 1 0 2.827l-.063.064.196.473H20a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-.089l-.196.473.063.063a2.002 2.002 0 0 1 0 2.828l-1.414 1.414a2 2 0 0 1-2.828 0l-.063-.063-.473.196V20a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2v-.089l-.473-.196-.063.063a2.002 2.002 0 0 1-2.828 0l-1.414-1.414a2 2 0 0 1 0-2.827l.063-.064L4.089 15H4a2 2 0 0 1-2-2v-2a2 2 0 0 1 2-2h.09l.195-.473-.063-.063a2 2 0 0 1 0-2.828l1.414-1.414a2 2 0 0 1 2.827 0l.064.063L9 4.089V4a2 2 0 0 1 .586-1.414ZM8 12a4 4 0 1 1 8 0 4 4 0 0 1-8 0Z"
                            clip-rule="evenodd" />
                    </svg>
                </a>

                <a href="/history"
                    class="w-full sm:w-80 md:w-72 p-6 bg-white rounded-lg shadow-lg border hover:bg-slate-50 dark:hover:bg-gray-700 flex items-center justify-between dark:bg-gray-800 dark:border-0">
                    <!-- Bagian kiri -->
                    <div>
                        <h5 class="text-base text-gray-400">History</h5>
                        <h5 class="text-xl font-bold mb-2 text-black dark:text-white">{{ $history->count() }}</h5>
                    </div>

                    <svg class="flex-shrink-0 w-7 h-7 text-green-500 transition duration-75 dark:text-green-500 group-hover:text-green-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M20 10H4v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8ZM9 13v-1h6v1a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1Z"
                            clip-rule="evenodd" />
                        <path d="M2 6a2 2 0 0 1 2-2h16a2 2 0 1 1 0 4H4a2 2 0 0 1-2-2Z" />
                    </svg>
                </a>

                <a href="/daftar_user"
                    class="w-full sm:w-80 md:w-72 p-6 bg-white rounded-lg shadow-lg border hover:bg-slate-50 dark:hover:bg-gray-700 flex items-center justify-between dark:bg-gray-800 dark:border-0">
                    <!-- Bagian kiri -->
                    <div>
                        <h5 class="text-base text-gray-400">Daftar User</h5>
                        <h5 class="text-xl font-bold mb-2 text-black dark:text-white">{{ $user->count() }}</h5>
                    </div>

                    <!-- Ikon -->
                    <svg class="flex-shrink-0 w-6 h-6 text-yellow-500 transition duration-75 dark:text-yellow-400 group-hover:text-yellow-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path
                            d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                    </svg>
                </a>
            </div>
        </div>

        <div class="container mx-auto my-8">
            <h1 class="text-2xl font-bold mb-4 dark:text-white">Monitoring Data Kondisi Mesin</h1>
            <div class="w-full mx-auto">
                <div class="chart" id="chart"></div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}

    {{-- <script>
        const ctx = document.getElementById('line-chart').getContext('2d');

        // Data dari server
        const chartData = @json($chartData);

        // Warna acak untuk setiap garis
        const randomColor = () => {
            const r = Math.floor(Math.random() * 255);
            const g = Math.floor(Math.random() * 255);
            const b = Math.floor(Math.random() * 255);
            return `rgba(${r}, ${g}, ${b}`;
        };

        // Format dataset untuk Chart.js
        const datasets = Object.values(chartData).map((item) => {
            const color = randomColor();
            return {
                label: item.label, // Nama dataset
                data: item.data, // Nilai dataset
                labels: item.labels,
                borderColor: `${color}, 1)`, // Warna garis
                backgroundColor: `${color}, 0.2)`, // Warna latar belakang
                fill: false, // Opsional, biarkan garis kosong
                tooltipData: item.status,
            };
        });

        // const labels = chartData[Object.keys(chartData)[0]]?.labels || [];

        // Membuat chart
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: datasets[0].labels, // Label waktu (sumbu x)
                datasets: datasets, // Dataset dari server
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            // Menambahkan `last_checked` pada tooltip
                            label: function(tooltipItem) {
                                const index = tooltipItem.dataIndex;
                                const dataset = datasets[tooltipItem.datasetIndex];
                                const status = dataset.tooltipData[index];
                                const lastChecked = dataset.labels[index];
                                return `Status: ${status}, Temperature: ${tooltipItem.raw}°C, Last Checked: ${lastChecked}`;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Status Mesin',
                        },
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Temperature (°C)',
                        },
                        beginAtZero: true,
                    },
                },
            },
        });
    </script> --}}

    <script>
        // Data dari controller
        const chartData = @json($chartData);
        const categories = @json($categories);

        // Format data untuk ApexCharts
        const series = chartData.map(item => ({
            name: item.name, // Nama mesin
            data: item.data, // Data suhu
        }));

        const isDarkMode = () => document.documentElement.classList.contains('dark');
        const options = {
            chart: {
                type: 'line', // Jenis grafik
                height: 350,
                toolbar: {
                    show: true,
                },
                background: isDarkMode ? '#374151' : '#FFFFFF',
            },
            theme: {
                mode: isDarkMode ? 'dark' : 'light', // Default mode
            },
            series: series,
            xaxis: {
                categories: categories, // Label waktu (sumbu x)
                title: {
                    text: 'Waktu Pengecekan'
                },
                labels: {
                    style: {
                        colors: isDarkMode ? '#FFFFFF' : '#374151', // Warna label
                    },
                },
            },
            yaxis: {
                title: {
                    text: 'Temperature (°C)'
                },
                labels: {
                    style: {
                        colors: isDarkMode ? '#FFFFFF' : '#374151', // Warna label
                    },
                },
                min: 0
            },
            tooltip: {
                shared: true,
                intersect: false,
                custom: function({
                    series,
                    seriesIndex,
                    dataPointIndex,
                    w
                }) {
                    const mesinName = w.globals.seriesNames[seriesIndex];
                    const temperature = series[seriesIndex][dataPointIndex];
                    const lastChecked = categories[dataPointIndex];
                    const status = chartData[seriesIndex].status[dataPointIndex];

                    return `
                    <div style="padding: 10px; border: 1px solid #ccc; background: ${isDarkMode ? '#374151' : '#fff'}; color: ${isDarkMode ? '#fff' : '#374151'}">
                        <strong>${mesinName}</strong><br>
                        Status: ${status}<br>
                        Temperature: ${temperature}°C<br>
                        Last Checked: ${lastChecked}
                    </div>
                `;
                }
            }
        };

        const chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();

        // Tambahkan event listener untuk tombol toggle mode gelap
        const darkModeObserver = new MutationObserver(() => {
            chart.updateOptions({
                chart: {
                    background: isDarkMode ? '#1f2937' : '#',
                },
                theme: {
                    mode: isDarkMode ? 'dark' : 'light',
                },
                xaxis: {
                    labels: {
                        style: {
                            colors: isDarkMode ? '' : '#1f2937',
                        },
                    },
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: isDarkMode ? '#FFFFFF' : '#374151',
                        },
                    },
                },
            });
        });

        darkModeObserver.observe(document.documentElement, {
            attributes: true,
            attributeFilter: ['class']
        });
    </script>
@endsection
