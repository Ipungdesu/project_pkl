@extends('layouts.admin')

@section('title', 'Pengaturan Akun & Profil')

@section('content')
<div class="flex flex-col w-full">
    <div class="w-full px-space-xl py-space-xl flex flex-col gap-space-xl">
        <!-- Top Bar: Title & Primary Actions -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-space-md">
            <div class="flex flex-col gap-space-xxs">
                <div class="flex items-center gap-space-xs text-secondary">
                    <span class="material-symbols-outlined text-[18px]">tune</span>
                    <span class="font-micro-uppercase text-micro-uppercase tracking-wider">Modul Administrasi Pengguna</span>
                </div>
                <h1 class="font-heading-2 text-heading-2 text-on-surface tracking-tight">Pengaturan Akun &amp; Profil</h1>
                <p class="font-body-md text-body-md text-stone">Kelola informasi data diri, foto profil, kredensial keamanan kata sandi, dan preferensi akun Anda.</p>
            </div>
            <div class="flex items-center gap-space-sm self-start md:self-auto">
                <a href="{{ route('admin.dashboard') }}" class="px-space-md py-space-xs rounded-lg bg-surface-container-high text-on-surface font-button-md text-button-md hover:bg-surface-variant transition-colors no-underline">
                    Batal
                </a>
                <button type="submit" form="profileForm" class="flex items-center gap-space-xs px-space-md py-space-xs rounded-lg bg-primary hover:bg-primary-deep text-on-primary font-button-md text-button-md shadow-sm transition-colors border-0 cursor-pointer">
                    <span class="material-symbols-outlined text-[18px]">check</span>
                    <span>Simpan Perubahan</span>
                </button>
            </div>
        </div>

        <!-- Editorial Header Profile Card -->
        <div class="relative overflow-hidden rounded-xl bg-surface-cream p-space-lg lg:p-space-xl shadow-sm">
            <div class="absolute -right-16 -top-16 w-64 h-64 rounded-full bg-sunshine-300/30 blur-2xl pointer-events-none"></div>
            <div class="relative z-10 flex flex-col lg:flex-row lg:items-center justify-between gap-space-lg">
                <div class="flex flex-col sm:flex-row items-start sm:items-center gap-space-md">
                    <!-- Monogram Avatar -->
                    <div class="relative flex-shrink-0">
                        <div class="w-20 h-20 rounded-full bg-gradient-to-tr from-primary to-sunshine-700 flex items-center justify-center shadow-md">
                            <span class="font-display-lg-mobile text-display-lg-mobile font-serif text-on-primary select-none font-bold">
                                {{ substr($user?->name ?? 'Mahendra', 0, 1) }}
                            </span>
                        </div>
                        <div class="absolute -bottom-1 -right-1 w-6 h-6 rounded-full bg-secondary-container flex items-center justify-center shadow-sm">
                            <span class="material-symbols-outlined text-on-secondary-container text-[14px]">verified</span>
                        </div>
                    </div>
                    <!-- Profile Details -->
                    <div class="flex flex-col gap-space-xxs">
                        <div class="flex flex-wrap items-center gap-space-xs">
                            <h2 class="font-heading-4 text-heading-4 text-ink font-semibold">{{ $user?->name ?? 'Mahendra Kusuma, S.E., M.M.' }}</h2>
                            <span class="px-space-xs py-0.5 rounded-full bg-cream-deeper font-micro-uppercase text-micro-uppercase text-secondary flex items-center gap-1">
                                <span class="w-1.5 h-1.5 rounded-full bg-secondary"></span> Aktif &amp; Terverifikasi
                            </span>
                        </div>
                        <p class="font-body-sm-medium text-body-sm-medium text-slate">
                            {{ $user?->role === 'operator' ? 'Operator EWF' : 'Super Admin / HR Executive' }} • PT Equityworld Futures
                        </p>
                        <div class="flex flex-wrap items-center gap-x-space-md gap-y-space-xxs pt-space-xxs text-stone font-caption text-caption">
                            <div class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-[15px]">mail</span>
                                <span class="font-code-md text-code-md text-ink">{{ $user?->email ?? 'mahendra@equityworld-futures.co.id' }}</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-[15px]">calendar_month</span>
                                <span>Bergabung: {{ $user?->created_at ? $user->created_at->format('M Y') : 'Maret 2020' }}</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-[15px]">apartment</span>
                                <span>Cyber 2 Tower, Jakarta</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Avatar Controls -->
                <div class="flex items-center gap-space-sm pt-space-xs lg:pt-0">
                    <button onclick="alert('Pilih foto profil baru (JPG, PNG, maksimal 2MB).')" class="flex items-center gap-space-xs px-space-md py-space-xs rounded-lg bg-charcoal hover:bg-ink text-on-dark font-button-md text-button-md shadow-sm transition-colors border-0 cursor-pointer" type="button">
                        <span class="material-symbols-outlined text-[18px]">photo_camera</span>
                        <span>Unggah Foto Baru</span>
                    </button>
                    <button onclick="alert('Foto profil dikembalikan ke avatar bawaan.')" class="px-space-md py-space-xs rounded-lg bg-cream-light hover:bg-cream-deeper text-slate font-button-md text-button-md transition-colors border-0 cursor-pointer" type="button">
                        Hapus
                    </button>
                </div>
            </div>
        </div>

        <!-- Editorial Horizontal Navigation -->
        <div class="flex items-center gap-space-xs overflow-x-auto pb-space-xxs">
            <button class="px-space-md py-space-xs rounded-lg bg-surface-cream text-primary font-body-sm-medium text-body-sm-medium shadow-sm flex items-center gap-space-xs whitespace-nowrap border-0 cursor-pointer">
                <span class="material-symbols-outlined text-[18px]">badge</span>
                <span>Profil Saya</span>
            </button>
            <a href="#card-password" class="px-space-md py-space-xs rounded-lg bg-surface-container-low hover:bg-surface-container text-stone hover:text-on-surface font-body-sm text-body-sm flex items-center gap-space-xs whitespace-nowrap transition-colors no-underline">
                <span class="material-symbols-outlined text-[18px]">lock_reset</span>
                <span>Keamanan &amp; Kata Sandi</span>
            </a>
            <a href="#card-notifikasi" class="px-space-md py-space-xs rounded-lg bg-surface-container-low hover:bg-surface-container text-stone hover:text-on-surface font-body-sm text-body-sm flex items-center gap-space-xs whitespace-nowrap transition-colors no-underline">
                <span class="material-symbols-outlined text-[18px]">notifications</span>
                <span>Notifikasi</span>
            </a>
            <a href="#card-sesi" class="px-space-md py-space-xs rounded-lg bg-surface-container-low hover:bg-surface-container text-stone hover:text-on-surface font-body-sm text-body-sm flex items-center gap-space-xs whitespace-nowrap transition-colors no-underline">
                <span class="material-symbols-outlined text-[18px]">devices</span>
                <span>Sesi Aktif</span>
            </a>
        </div>

        <!-- Main Settings Two-Column Form Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-lg">
            <!-- LEFT COLUMN (Profile Data & Password Reset) -->
            <div class="lg:col-span-7 flex flex-col gap-space-lg">
                <!-- CARD 1: Data Diri & Informasi Kontak -->
                <div class="bg-surface rounded-xl p-space-lg shadow-sm flex flex-col gap-space-md" id="card-profil">
                    <div class="flex items-center justify-between pb-space-xs">
                        <div class="flex items-center gap-space-xs">
                            <span class="material-symbols-outlined text-primary text-[22px]">contact_page</span>
                            <div>
                                <h3 class="font-heading-5 text-heading-5 text-on-surface">Data Diri &amp; Informasi Kontak</h3>
                                <p class="font-caption text-caption text-stone">Informasi kedinasan dan jalur komunikasi resmi internal EWF.</p>
                            </div>
                        </div>
                        <span class="font-micro-uppercase text-micro-uppercase px-space-xs py-space-xxs rounded bg-cream-deeper text-secondary">Identitas HR</span>
                    </div>

                    <form id="profileForm" method="POST" action="{{ route('admin.pengaturan.profile') }}" class="flex flex-col gap-space-md">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-space-md">
                            <!-- Nama Lengkap -->
                            <div class="flex flex-col gap-space-xxs">
                                <label class="font-caption-bold text-caption-bold text-on-surface">Nama Lengkap</label>
                                <div class="h-11 bg-surface-container-lowest rounded-lg px-space-sm flex items-center shadow-sm">
                                    <input class="w-full bg-transparent font-body-sm text-body-sm text-on-surface focus:outline-none border-0" 
                                           type="text" 
                                           name="name"
                                           value="{{ old('name', $user?->name ?? 'Mahendra Kusuma') }}" 
                                           required>
                                </div>
                            </div>
                            <!-- Gelar Akademis -->
                            <div class="flex flex-col gap-space-xxs">
                                <label class="font-caption-bold text-caption-bold text-on-surface">Gelar Akademis</label>
                                <div class="h-11 bg-surface-container-lowest rounded-lg px-space-sm flex items-center shadow-sm">
                                    <input class="w-full bg-transparent font-body-sm text-body-sm text-on-surface focus:outline-none border-0" 
                                           type="text" 
                                           value="S.E., M.M.">
                                </div>
                            </div>
                            <!-- NIP / ID Karyawan -->
                            <div class="flex flex-col gap-space-xxs">
                                <label class="font-caption-bold text-caption-bold text-on-surface">NIP / ID Karyawan</label>
                                <div class="h-11 bg-surface-container-high rounded-lg px-space-sm flex items-center justify-between">
                                    <input class="w-full bg-transparent font-code-md text-code-md text-stone focus:outline-none select-none border-0" 
                                           readonly 
                                           type="text" 
                                           value="EWF-EMP-2018-042">
                                    <span class="material-symbols-outlined text-stone text-[18px]">lock</span>
                                </div>
                            </div>
                            <!-- Jabatan & Divisi -->
                            <div class="flex flex-col gap-space-xxs">
                                <label class="font-caption-bold text-caption-bold text-on-surface">Jabatan &amp; Divisi</label>
                                <div class="h-11 bg-surface-container-lowest rounded-lg px-space-sm flex items-center shadow-sm">
                                    <input class="w-full bg-transparent font-body-sm text-body-sm text-on-surface focus:outline-none border-0" 
                                           type="text" 
                                           value="Super Admin / HR Executive">
                                </div>
                            </div>
                            <!-- Email Kantor -->
                            <div class="flex flex-col gap-space-xxs">
                                <label class="font-caption-bold text-caption-bold text-on-surface">Email Kantor</label>
                                <div class="h-11 bg-surface-container-lowest rounded-lg px-space-sm flex items-center gap-space-xs shadow-sm">
                                    <span class="material-symbols-outlined text-stone text-[18px]">alternate_email</span>
                                    <input class="w-full bg-transparent font-body-sm text-body-sm text-on-surface focus:outline-none border-0" 
                                           type="email" 
                                           name="email"
                                           value="{{ old('email', $user?->email ?? 'mahendra@equityworld-futures.co.id') }}" 
                                           required>
                                </div>
                            </div>
                            <!-- WhatsApp / HP -->
                            <div class="flex flex-col gap-space-xxs">
                                <label class="font-caption-bold text-caption-bold text-on-surface">Nomor WhatsApp / HP</label>
                                <div class="h-11 bg-surface-container-lowest rounded-lg px-space-sm flex items-center gap-space-xs shadow-sm">
                                    <span class="material-symbols-outlined text-stone text-[18px]">call</span>
                                    <input class="w-full bg-transparent font-body-sm text-body-sm text-on-surface focus:outline-none border-0" 
                                           type="tel" 
                                           value="+62 811-9283-771">
                                </div>
                            </div>
                            <!-- Lokasi Penugasan -->
                            <div class="sm:col-span-2 flex flex-col gap-space-xxs">
                                <label class="font-caption-bold text-caption-bold text-on-surface">Lokasi Kantor / Penugasan</label>
                                <div class="h-11 bg-surface-container-lowest rounded-lg px-space-sm flex items-center shadow-sm">
                                    <select class="w-full bg-transparent font-body-sm text-body-sm text-on-surface focus:outline-none border-0">
                                        <option selected>Jakarta Cyber 2 Tower (Head Office)</option>
                                        <option>Surabaya Trillium Office</option>
                                        <option>Semarang Gajahmada Branch</option>
                                        <option>Medan Forum Nine Branch</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Bio Singkat -->
                            <div class="sm:col-span-2 flex flex-col gap-space-xxs">
                                <label class="font-caption-bold text-caption-bold text-on-surface">Bio Singkat</label>
                                <div class="bg-surface-container-lowest rounded-lg p-space-sm shadow-sm">
                                    <textarea class="w-full bg-transparent font-body-sm text-body-sm text-on-surface focus:outline-none resize-none leading-relaxed border-0" rows="3">Pengelola administrasi SDM, rekrutmen pendaftar magang dan akun portal resmi EWF.</textarea>
                                </div>
                                <span class="font-micro text-micro text-stone text-right">Maksimal 160 karakter</span>
                            </div>
                        </div>
                        <div class="flex justify-end pt-space-xs">
                            <button class="px-space-md py-space-xs rounded-lg bg-primary hover:bg-primary-deep text-on-primary font-button-md text-button-md shadow-sm transition-colors border-0 cursor-pointer" type="submit">
                                Simpan Profil
                            </button>
                        </div>
                    </form>
                </div>

                <!-- CARD 2: Ubah Kata Sandi -->
                <div class="bg-surface rounded-xl p-space-lg shadow-sm flex flex-col gap-space-md" id="card-password">
                    <div class="flex items-center justify-between pb-space-xs">
                        <div class="flex items-center gap-space-xs">
                            <span class="material-symbols-outlined text-secondary text-[22px]">key</span>
                            <div>
                                <h3 class="font-heading-5 text-heading-5 text-on-surface">Ubah Kata Sandi</h3>
                                <p class="font-caption text-caption text-stone">Perbarui kredensial sandi akun secara berkala.</p>
                            </div>
                        </div>
                        <span class="px-space-xs py-space-xxs rounded bg-surface-container font-micro-uppercase text-micro-uppercase text-stone">Otoritas Enkripsi</span>
                    </div>

                    <form method="POST" action="{{ route('admin.pengaturan.password') }}" class="flex flex-col gap-space-md">
                        @csrf
                        @method('PUT')
                        <div class="flex flex-col gap-space-sm">
                            <!-- Kata Sandi Saat Ini -->
                            <div class="flex flex-col gap-space-xxs">
                                <label class="font-caption-bold text-caption-bold text-on-surface">Kata Sandi Saat Ini</label>
                                <div class="h-11 bg-surface-container-lowest rounded-lg px-space-sm flex items-center justify-between shadow-sm">
                                    <input class="w-full bg-transparent font-body-sm text-body-sm text-on-surface focus:outline-none border-0" 
                                           placeholder="Masukkan kata sandi lama" 
                                           type="password" 
                                           name="current_password"
                                           required>
                                    <span class="material-symbols-outlined text-stone text-[18px] cursor-pointer hover:text-on-surface" onclick="const i = this.previousElementSibling; i.type = i.type === 'password' ? 'text' : 'password'">visibility</span>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-space-sm">
                                <!-- Kata Sandi Baru -->
                                <div class="flex flex-col gap-space-xxs">
                                    <label class="font-caption-bold text-caption-bold text-on-surface">Kata Sandi Baru</label>
                                    <div class="h-11 bg-surface-container-lowest rounded-lg px-space-sm flex items-center justify-between shadow-sm">
                                        <input class="w-full bg-transparent font-body-sm text-body-sm text-on-surface focus:outline-none border-0" 
                                               placeholder="Minimal 8 karakter" 
                                               type="password"
                                               name="password"
                                               required>
                                        <span class="material-symbols-outlined text-stone text-[18px] cursor-pointer hover:text-on-surface" onclick="const i = this.previousElementSibling; i.type = i.type === 'password' ? 'text' : 'password'">visibility</span>
                                    </div>
                                </div>
                                <!-- Konfirmasi Kata Sandi -->
                                <div class="flex flex-col gap-space-xxs">
                                    <label class="font-caption-bold text-caption-bold text-on-surface">Konfirmasi Kata Sandi Baru</label>
                                    <div class="h-11 bg-surface-container-lowest rounded-lg px-space-sm flex items-center justify-between shadow-sm">
                                        <input class="w-full bg-transparent font-body-sm text-body-sm text-on-surface focus:outline-none border-0" 
                                               placeholder="Ulangi sandi baru" 
                                               type="password"
                                               name="password_confirmation"
                                               required>
                                        <span class="material-symbols-outlined text-stone text-[18px] cursor-pointer hover:text-on-surface" onclick="const i = this.previousElementSibling; i.type = i.type === 'password' ? 'text' : 'password'">visibility</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Password Notice -->
                            <div class="rounded-lg bg-surface-cream-soft p-space-sm flex items-start gap-space-xs">
                                <span class="material-symbols-outlined text-secondary text-[20px] flex-shrink-0 mt-0.5">info</span>
                                <p class="font-caption text-caption text-on-surface-variant leading-relaxed">
                                    Gunakan minimal 8 karakter kombinasi huruf besar, huruf kecil, angka, dan simbol untuk perlindungan optimal akun administrasi Anda.
                                </p>
                            </div>
                        </div>
                        <div class="flex justify-end pt-space-xs">
                            <button class="px-space-md py-space-xs rounded-lg bg-charcoal hover:bg-ink text-on-dark font-button-md text-button-md shadow-sm transition-colors border-0 cursor-pointer" type="submit">
                                Perbarui Kata Sandi
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- RIGHT COLUMN (Notifications & Active Sessions) -->
            <div class="lg:col-span-5 flex flex-col gap-space-lg">
                <!-- CARD 3: Preferensi Notifikasi -->
                <div class="bg-surface rounded-xl p-space-lg shadow-sm flex flex-col gap-space-md" id="card-notifikasi">
                    <div class="flex items-center justify-between pb-space-xs">
                        <div class="flex items-center gap-space-xs">
                            <span class="material-symbols-outlined text-sunshine-800 text-[22px]">notifications_active</span>
                            <div>
                                <h3 class="font-heading-5 text-heading-5 text-on-surface">Preferensi Notifikasi</h3>
                                <p class="font-caption text-caption text-stone">Saluran peringatan &amp; laporan harian.</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-space-md">
                        <!-- Toggle 1: Email Pendaftar Baru -->
                        <div class="flex items-center justify-between p-space-sm rounded-lg bg-surface-container-lowest shadow-sm">
                            <div class="flex flex-col pr-space-sm">
                                <span class="font-body-sm-medium text-body-sm-medium text-on-surface">Email Pendaftar Baru</span>
                                <span class="font-caption text-caption text-stone">Kirim email saat ada lamaran magang atau berkas masuk.</span>
                            </div>
                            <button aria-checked="true" class="w-11 h-6 bg-primary rounded-full p-0.5 transition-colors relative flex-shrink-0 cursor-pointer border-0" onclick="this.classList.toggle('bg-primary'); this.classList.toggle('bg-hairline-strong'); const circle = this.querySelector('div'); circle.classList.toggle('translate-x-5');" role="switch" type="button">
                                <div class="w-5 h-5 bg-canvas rounded-full shadow-sm transform translate-x-5 transition-transform"></div>
                            </button>
                        </div>
                        <!-- Toggle 2: Notifikasi WhatsApp -->
                        <div class="flex items-center justify-between p-space-sm rounded-lg bg-surface-container-lowest shadow-sm">
                            <div class="flex flex-col pr-space-sm">
                                <span class="font-body-sm-medium text-body-sm-medium text-on-surface">Notifikasi WhatsApp</span>
                                <span class="font-caption text-caption text-stone">Pemberitahuan instan via WA nomor terdaftar.</span>
                            </div>
                            <button aria-checked="true" class="w-11 h-6 bg-primary rounded-full p-0.5 transition-colors relative flex-shrink-0 cursor-pointer border-0" onclick="this.classList.toggle('bg-primary'); this.classList.toggle('bg-hairline-strong'); const circle = this.querySelector('div'); circle.classList.toggle('translate-x-5');" role="switch" type="button">
                                <div class="w-5 h-5 bg-canvas rounded-full shadow-sm transform translate-x-5 transition-transform"></div>
                            </button>
                        </div>
                        <!-- Dropdown Bahasa Sistem -->
                        <div class="flex flex-col gap-space-xxs pt-space-xs">
                            <label class="font-caption-bold text-caption-bold text-on-surface">Bahasa Antarmuka Sistem</label>
                            <div class="h-11 bg-surface-container-lowest rounded-lg px-space-sm flex items-center shadow-sm">
                                <select class="w-full bg-transparent font-body-sm text-body-sm text-on-surface focus:outline-none border-0">
                                    <option selected>Bahasa Indonesia (ID)</option>
                                    <option>English (US)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CARD 4: Sesi Login Aktif -->
                <div class="bg-surface rounded-xl p-space-lg shadow-sm flex flex-col gap-space-md" id="card-sesi">
                    <div class="flex items-center justify-between pb-space-xs">
                        <div class="flex items-center gap-space-xs">
                            <span class="material-symbols-outlined text-secondary text-[22px]">devices</span>
                            <div>
                                <h3 class="font-heading-5 text-heading-5 text-on-surface">Sesi Login Aktif</h3>
                                <p class="font-caption text-caption text-stone">Daftar perangkat yang terhubung dengan akun ini.</p>
                            </div>
                        </div>
                        <span class="w-2.5 h-2.5 rounded-full bg-secondary-container animate-pulse"></span>
                    </div>
                    <!-- Active Device 1 -->
                    <div class="flex items-center justify-between p-space-sm rounded-lg bg-surface-container-lowest shadow-sm">
                        <div class="flex items-center gap-space-sm">
                            <div class="w-10 h-10 rounded-lg bg-cream flex items-center justify-center text-primary flex-shrink-0">
                                <span class="material-symbols-outlined text-[20px]">laptop_mac</span>
                            </div>
                            <div class="flex flex-col">
                                <div class="flex items-center gap-space-xs">
                                    <span class="font-body-sm-medium text-body-sm-medium text-on-surface">MacBook Pro 16"</span>
                                    <span class="px-space-xs py-0.5 rounded-full bg-cream-deeper font-micro text-micro text-secondary font-medium">Aktif Sekarang</span>
                                </div>
                                <span class="font-caption text-caption text-stone">Jakarta, Indonesia • Chrome (Sesi Anda)</span>
                            </div>
                        </div>
                    </div>
                    <!-- Active Device 2 -->
                    <div class="flex items-center justify-between p-space-sm rounded-lg bg-surface-container-lowest shadow-sm">
                        <div class="flex items-center gap-space-sm">
                            <div class="w-10 h-10 rounded-lg bg-surface-container flex items-center justify-center text-stone flex-shrink-0">
                                <span class="material-symbols-outlined text-[20px]">smartphone</span>
                            </div>
                            <div class="flex flex-col">
                                <div class="flex items-center gap-space-xs">
                                    <span class="font-body-sm text-body-sm text-on-surface">iPhone 14 Pro Max</span>
                                    <span class="font-micro text-micro text-stone">1 jam lalu</span>
                                </div>
                                <span class="font-caption text-caption text-stone">Jakarta • Safari Mobile iOS</span>
                            </div>
                        </div>
                    </div>
                    <div class="pt-space-xs">
                        <button class="w-full py-space-xs px-space-md rounded-lg bg-surface-variant hover:bg-surface-dim text-on-surface font-button-md text-button-md transition-colors flex items-center justify-center gap-space-xs border-0 cursor-pointer" onclick="alert('Permintaan berhasil. Semua sesi perangkat lain telah diakhiri.');" type="button">
                            <span class="material-symbols-outlined text-[18px]">logout</span>
                            <span>Keluar Dari Semua Perangkat Lain</span>
                        </button>
                    </div>
                </div>

                <!-- Compliance Badge -->
                <div class="rounded-xl bg-surface-cream p-space-md flex items-center gap-space-sm shadow-sm">
                    <div class="w-10 h-10 rounded-lg bg-sunshine-300 flex items-center justify-center text-on-secondary-fixed flex-shrink-0">
                        <span class="material-symbols-outlined text-[20px]">verified_user</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-caption-bold text-caption-bold text-ink">Keamanan Berlapis Bappebti &amp; KBI</span>
                        <span class="font-caption text-caption text-slate leading-tight">Seluruh perubahan profil dicatat dalam audit log compliance EWF.</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer status -->
        <div class="w-full flex flex-col gap-space-md pt-space-xl">
            <div class="w-full h-1.5 rounded-full bg-gradient-to-r from-yellow-saturated via-sunshine-700 to-primary"></div>
            <div class="flex flex-col sm:flex-row items-center justify-between text-stone font-caption text-caption py-space-xs gap-space-xs">
                <div class="flex items-center gap-space-xs">
                    <span class="w-2 h-2 rounded-full bg-secondary"></span>
                    <span>Portal Administrasi PT Equityworld Futures</span>
                    <span>•</span>
                    <span class="text-on-surface">Akun Terverifikasi Super Admin &amp; HR Executive</span>
                </div>
                <div class="font-code-md text-code-md text-stone">
                    Sistem Normal Versi 4.2.0
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
