@extends('user.layouts.app')
@section('title', 'Beranda - LPM Ibnu Rusyd STAIM Magetan')
@section('content')
    <!-- Hero Section -->
    <section id="home" class="pt-16 text-white relative">
        <!-- Background Image -->
        <div class="absolute inset-0">
            <img src="{{ asset('images/foto-3.jpeg') }}" alt="LPM Ibnu Rusyd STAIM Magetan" class="w-full h-full object-cover">
            <!-- Gradient overlay -->
            <div class="absolute inset-0 bg-gradient-to-b from-black/30 to-black/10"></div>

        </div>

        <!-- Content -->
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">
                Suara Mahasiswa STAIM Magetan, <br /><span class="text-accent">Berita Terpercaya</span>
            </h1>
            <p class="text-xl md:text-2xl mb-8 text-blue-100 max-w-3xl mx-auto">
                Lembaga Pers Mahasiswa (LPM) Ibnu Rusyd STAIM Magetan yang berkomitmen menyajikan informasi
                berkualitas dan menjadi wadah kreativitas jurnalistik mahasiswa kampus
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
    </section>




    <!-- About Section -->
    <section id="about" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-secondary mb-4">
                    Tentang LPM Ibnu Rusyd STAIM Magetan
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    LPM Ibnu Rusyd dikenal sebagal Lembaga Pers Mahasiswa yang menjadi salah satu Unit Kegiatan Mahasiswa
                    (UKM) di Sekolah Tinggi Agama Islam Ma'arif (STAIM) Magetan. Lembaga ini memiliki fokus utama pada dunla
                    Jurnalistik dan penerbitan, di mana la berfungsi sebagal wadah bagi para dan mahasiswa untuk menyalurkan
                    mengasah minat serta bakat mereka di bidang tersebut. Melalui berbagal keglatan, LPM Ibnu Rusyd berperan
                    aktif dalam menciptakan ekosistem akademik yang informatif dan edukatif di lingkungan kampus.
                </p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Jurnalistik Berkualitas -->
                <div class="text-center p-6 bg-white rounded-lg shadow-md">
                    <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-pen-nib text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Jurnalistik Berkualitas</h3>
                    <p class="text-gray-600">
                        Menghasilkan karya jurnalistik objektif, akurat, dan bermanfaat bagi komunitas STAIM Magetan
                    </p>
                </div>

                <!-- Pengembangan SDM -->
                <div class="text-center p-6 bg-white rounded-lg shadow-md">
                    <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-users-cog text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Pengembangan SDM</h3>
                    <p class="text-gray-600">
                        Membina dan mengembangkan kemampuan jurnalistik mahasiswa STAIM Magetan melalui pelatihan dan
                        praktik
                    </p>
                </div>

                <!-- Media Informasi -->
                <div class="text-center p-6 bg-white rounded-lg shadow-md">
                    <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-broadcast-tower text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Media Informasi</h3>
                    <p class="text-gray-600">
                        Menjadi sumber informasi terpercaya tentang kegiatan dan perkembangan di STAIM Magetan
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
                @foreach ($posts as $post)
                    <a href="{{ route('post.show', $post->slug) }}" class="group">
                        <article
                            class="bg-white rounded-lg shadow-md overflow-hidden border border-transparent hover:border-primary transition-all duration-300 transform hover:-translate-y-1">
                            <img src="{{ $post->thumbnail ? asset('storage/' . $post->thumbnail) : '/images/ino.png' }}"
                                alt="{{ $post->title }}" class="w-full h-48 object-cover" />
                            <div class="p-6">
                                <span
                                    class="text-sm text-accent font-semibold">{{ $post->category->name ?? 'Uncategorized' }}</span>
                                <h3 class="text-xl font-semibold mt-2 mb-3">
                                    {{ Str::limit($post->title, 50, '...') }}
                                </h3>
                                <p class="text-gray-600 text-sm mb-4">
                                    {{ Str::limit(strip_tags($post->content), 100, '...') }}
                                </p>
                                <div class="flex items-center text-sm text-gray-500">
                                    <span>{{ \Carbon\Carbon::parse($post->published_at)->format('d F Y') }}</span>
                                    <span class="mx-2">•</span>
                                    <span>{{ $post->author->name ?? 'Admin' }}</span>
                                </div>
                            </div>
                        </article>
                    </a>
                @endforeach
            </div>




            <div class="text-center mt-12">
                <a href="{{ route('post.index') }}"
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
                    Tim Redaksi LPM Ibnu Rusyd
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Kenali struktur pengurus dan tim redaksi LPM Ibnu Rusyd STAIM Magetan Tahun 2025/2026
                </p>
            </div>

            <!-- Jabatan Utama -->
            <div class="grid md:grid-cols-2 lg:grid-cols-5 gap-8 mb-12 text-center">
                <div>
                    <h3 class="text-lg font-semibold">Bpk. Luthvi Al Hasyimi</h3>
                    <p class="text-primary font-medium">Pelindung</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold">Bpk. Nanang Mulyanto</h3>
                    <p class="text-primary font-medium">Pembimbing</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold">Miftakhur Rohmah</h3>
                    <p class="text-primary font-medium">Ketua Umum</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold">Anis Dawim Musa'adah</h3>
                    <p class="text-primary font-medium">Sekretaris Umum</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold">Naimatul Hidayah</h3>
                    <p class="text-primary font-medium">Bendahara Umum</p>
                </div>
            </div>

            <!-- Tim Redaksi -->
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 text-center">
                <div>
                    <h3 class="text-lg font-semibold">Pemimpin Redaksi</h3>
                    <p class="text-gray-600">Abdurrahman Hadi</p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-2">Redaktur Pelaksana</h3>
                    <p class="text-gray-600">• Akbar Muhammad</p>
                    <p class="text-gray-600">• Wahidatul Istiqomah</p>
                    <p class="text-gray-600">• Khoirunnisa Putri Ramadhanti</p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-2">Redaktur Berita</h3>
                    <p class="text-gray-600">• Fisfa Firdasari</p>
                    <p class="text-gray-600">• Nurike Fatma</p>
                    <p class="text-gray-600">• Khotijah Latifhah N</p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-2">Redaktur Foto & Video</h3>
                    <p class="text-gray-600">• Salsabila Nurhidayu</p>
                    <p class="text-gray-600">• Nur Fattah</p>
                    <p class="text-gray-600">• Reyhan Ardhan</p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-2">Layouter</h3>
                    <p class="text-gray-600">• Mamluatul Hidayah</p>
                    <p class="text-gray-600">• S. Hamidatiz Zahro</p>
                    <p class="text-gray-600">• Faris Ramadhan</p>
                    <p class="text-gray-600">• Fathimah As Sholihah</p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-2">Reporter</h3>
                    <p class="text-gray-600">• Kharisma Putri</p>
                    <p class="text-gray-600">• Dini Melinda</p>
                    <p class="text-gray-600">• Muhamat Asif</p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-2">Percetakan</h3>
                    <p class="text-gray-600">• Hanif Yulfa</p>
                    <p class="text-gray-600">• Haliza Putri</p>
                    <p class="text-gray-600">• Fatkhu Nur Oktaviana</p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-2">Inventaris</h3>
                    <p class="text-gray-600">• Laili Nurizzah</p>
                    <p class="text-gray-600">• M. Fauzan Abdillah</p>
                    <p class="text-gray-600">• Melvin Tiana A</p>
                </div>
            </div>
        </div>
    </section>


@endsection
