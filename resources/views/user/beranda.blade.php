@extends('user.layouts.app')
@section('title', 'Beranda - LPM Ibnu Rusyd')
@section('content')
    <!-- Hero Section -->
    <section id="home" class="pt-16 bg-gradient-to-br from-primary to-slate-800 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="text-center">
                <h1 class="text-4xl md:text-6xl font-bold mb-6">
                    Suara Mahasiswa, <br /><span class="text-accent">Berita Terpercaya</span>
                </h1>
                <p class="text-xl md:text-2xl mb-8 text-blue-100 max-w-3xl mx-auto">
                    Lembaga Pers Mahasiswa yang berkomitmen menyajikan informasi
                    berkualitas dan menjadi wadah kreativitas jurnalistik mahasiswa
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#articles"
                        class="bg-accent hover:bg-yellow-600 text-white px-8 py-3 rounded-lg font-semibold transition-colors">Baca
                        Artikel Terbaru</a>
                    <a href="#about"
                        class="border-2 border-white text-white hover:bg-white hover:text-primary px-8 py-3 rounded-lg font-semibold transition-colors">Pelajari
                        Lebih Lanjut</a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-secondary mb-4">
                    Tentang LPM Suara Kampus
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Organisasi mahasiswa yang berfokus pada pengembangan jurnalistik dan
                    penyebaran informasi berkualitas di lingkungan kampus
                </p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center p-6 bg-white rounded-lg shadow-md">
                    <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Jurnalistik Berkualitas</h3>
                    <p class="text-gray-600">
                        Menghasilkan karya jurnalistik yang objektif, akurat, dan
                        bermanfaat bagi komunitas kampus
                    </p>
                </div>
                <div class="text-center p-6 bg-white rounded-lg shadow-md">
                    <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Pengembangan SDM</h3>
                    <p class="text-gray-600">
                        Membina dan mengembangkan kemampuan jurnalistik mahasiswa melalui
                        pelatihan dan praktik
                    </p>
                </div>
                <div class="text-center p-6 bg-white rounded-lg shadow-md">
                    <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Media Informasi</h3>
                    <p class="text-gray-600">
                        Menjadi sumber informasi terpercaya tentang kegiatan dan
                        perkembangan di lingkungan kampus
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Programs Section -->
    <section id="programs" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-secondary mb-4">
                    Program Kerja
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Berbagai program yang kami jalankan untuk mengembangkan jurnalistik
                    mahasiswa dan menyebarkan informasi
                </p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-gray-50 p-6 rounded-lg hover:shadow-lg transition-shadow">
                    <h3 class="text-lg font-semibold mb-3 text-primary">
                        Pelatihan Jurnalistik
                    </h3>
                    <p class="text-gray-600 text-sm">
                        Workshop dan pelatihan menulis, fotografi, dan videografi untuk
                        anggota LPM
                    </p>
                </div>
                <div class="bg-gray-50 p-6 rounded-lg hover:shadow-lg transition-shadow">
                    <h3 class="text-lg font-semibold mb-3 text-primary">
                        Publikasi Berkala
                    </h3>
                    <p class="text-gray-600 text-sm">
                        Penerbitan majalah dan bulletin kampus secara rutin setiap
                        semester
                    </p>
                </div>
                <div class="bg-gray-50 p-6 rounded-lg hover:shadow-lg transition-shadow">
                    <h3 class="text-lg font-semibold mb-3 text-primary">
                        Liputan Kegiatan
                    </h3>
                    <p class="text-gray-600 text-sm">
                        Meliput berbagai kegiatan kampus dan menyebarkan informasi kepada
                        mahasiswa
                    </p>
                </div>
                <div class="bg-gray-50 p-6 rounded-lg hover:shadow-lg transition-shadow">
                    <h3 class="text-lg font-semibold mb-3 text-primary">
                        Media Digital
                    </h3>
                    <p class="text-gray-600 text-sm">
                        Mengelola website dan media sosial untuk penyebaran informasi yang
                        lebih luas
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Articles Section -->
    <section id="articles" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-secondary mb-4">
                    Artikel Terbaru
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Baca artikel dan berita terkini dari tim redaksi LPM Suara Kampus
                </p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <img src="/images/ino.png" alt="Artikel 1" class="w-full h-48 object-cover" />
                    <div class="p-6">
                        <span class="text-sm text-accent font-semibold">KAMPUS</span>
                        <h3 class="text-xl font-semibold mt-2 mb-3">
                            Mahasiswa Raih Prestasi di Kompetisi Nasional
                        </h3>
                        <p class="text-gray-600 text-sm mb-4">
                            Tim mahasiswa berhasil meraih juara pertama dalam kompetisi
                            inovasi teknologi tingkat nasional...
                        </p>
                        <div class="flex items-center text-sm text-gray-500">
                            <span>15 Januari 2024</span>
                            <span class="mx-2">•</span>
                            <span>Admin LPM</span>
                        </div>
                    </div>
                </article>
                <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <img src="/placeholder.svg?height=200&width=400" alt="Artikel 2" class="w-full h-48 object-cover" />
                    <div class="p-6">
                        <span class="text-sm text-accent font-semibold">KEGIATAN</span>
                        <h3 class="text-xl font-semibold mt-2 mb-3">
                            Seminar Nasional Teknologi dan Inovasi
                        </h3>
                        <p class="text-gray-600 text-sm mb-4">
                            Fakultas Teknik mengadakan seminar nasional dengan menghadirkan
                            pembicara dari berbagai universitas...
                        </p>
                        <div class="flex items-center text-sm text-gray-500">
                            <span>12 Januari 2024</span>
                            <span class="mx-2">•</span>
                            <span>Tim Redaksi</span>
                        </div>
                    </div>
                </article>
                <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <img src="/placeholder.svg?height=200&width=400" alt="Artikel 3" class="w-full h-48 object-cover" />
                    <div class="p-6">
                        <span class="text-sm text-accent font-semibold">PENELITIAN</span>
                        <h3 class="text-xl font-semibold mt-2 mb-3">
                            Penelitian Dosen Dipublikasi di Jurnal Internasional
                        </h3>
                        <p class="text-gray-600 text-sm mb-4">
                            Hasil penelitian tentang energi terbarukan berhasil
                            dipublikasikan di jurnal internasional bereputasi...
                        </p>
                        <div class="flex items-center text-sm text-gray-500">
                            <span>10 Januari 2024</span>
                            <span class="mx-2">•</span>
                            <span>Reporter LPM</span>
                        </div>
                    </div>
                </article>
            </div>
            <div class="text-center mt-12">
                <a href="#"
                    class="bg-primary hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-semibold transition-colors">
                    Lihat Semua Artikel
                </a>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section id="team" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-secondary mb-4">
                    Tim Redaksi
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Kenali tim redaksi LPM Suara Kampus yang berdedikasi menghadirkan
                    informasi berkualitas
                </p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <img src="/placeholder.svg?height=200&width=200" alt="Pemimpin Redaksi"
                        class="w-32 h-32 rounded-full mx-auto mb-4 object-cover" />
                    <h3 class="text-lg font-semibold">Ahmad Rizki</h3>
                    <p class="text-primary font-medium">Pemimpin Redaksi</p>
                    <p class="text-gray-600 text-sm mt-2">
                        Mahasiswa Komunikasi semester 6
                    </p>
                </div>
                <div class="text-center">
                    <img src="/placeholder.svg?height=200&width=200" alt="Wakil Pemimpin Redaksi"
                        class="w-32 h-32 rounded-full mx-auto mb-4 object-cover" />
                    <h3 class="text-lg font-semibold">Sari Indah</h3>
                    <p class="text-primary font-medium">Wakil Pemimpin Redaksi</p>
                    <p class="text-gray-600 text-sm mt-2">
                        Mahasiswa Jurnalistik semester 6
                    </p>
                </div>
                <div class="text-center">
                    <img src="/placeholder.svg?height=200&width=200" alt="Koordinator Liputan"
                        class="w-32 h-32 rounded-full mx-auto mb-4 object-cover" />
                    <h3 class="text-lg font-semibold">Budi Santoso</h3>
                    <p class="text-primary font-medium">Koordinator Liputan</p>
                    <p class="text-gray-600 text-sm mt-2">Mahasiswa DKV semester 4</p>
                </div>
                <div class="text-center">
                    <img src="/placeholder.svg?height=200&width=200" alt="Editor"
                        class="w-32 h-32 rounded-full mx-auto mb-4 object-cover" />
                    <h3 class="text-lg font-semibold">Maya Putri</h3>
                    <p class="text-primary font-medium">Editor</p>
                    <p class="text-gray-600 text-sm mt-2">
                        Mahasiswa Sastra Indonesia semester 4
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
