@extends('layout.main')

@section('title', 'Profile - TaboKuliner')

@section('css')
<link rel="stylesheet" href="{{asset('css/Profile.css')}}">
@endsection

@section('content')
<div class="profile-container">
    <div class="profile-header">
        <h1>Profil Saya</h1>
        <p>Kelola informasi profil Anda untuk mengontrol, melindungi dan mengamankan akun</p>
    </div>

    {{-- Success & Error Messages --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="profile-content">
        {{-- Sidebar --}}
        <div class="profile-sidebar">
            <div class="sidebar-menu">
                <a href="#profile-info" class="menu-item active" data-tab="profile-info">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    Informasi Profil
                </a>
                <a href="#address" class="menu-item" data-tab="address">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                    Alamat Saya
                </a>
                <a href="#security" class="menu-item" data-tab="security">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                    </svg>
                    Keamanan
                </a>
            </div>
        </div>

        {{-- Main Content --}}
        <div class="profile-main">
            {{-- Tab 1: Profile Info --}}
            <div class="tab-content active" id="profile-info">
                <h2>Informasi Profil</h2>
                
                <form action="{{ route('profile.update') }}" method="POST" class="profile-form">
                    @csrf
                    
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="name" value="{{ $user->name }}" required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ $user->email }}" required>
                    </div>

                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input type="text" name="phone" value="{{ $user->phone }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>

                <hr style="margin: 30px 0;">

                <h3>Foto Profil</h3>
                <div class="photo-section">
                    <div class="current-photo">
                        <img src="{{ $user->profile_photo ? asset('storage/' . $user->profile_photo) : asset('image/default-avatar.png') }}" alt="Profile Photo">
                    </div>
                    <form action="{{ route('profile.update-photo') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="profile_photo" id="profile_photo" accept="image/*" style="display: none;">
                        <label for="profile_photo" class="btn btn-outline">Pilih Foto</label>
                        <button type="submit" class="btn btn-primary">Upload Foto</button>
                        <p class="text-muted">Format: JPG, PNG. Maksimal 2MB</p>
                    </form>
                </div>
            </div>

            {{-- Tab 2: Address --}}
            <div class="tab-content" id="address">
                <div class="address-header">
                    <h2>Alamat Saya</h2>
                    <button class="btn btn-primary" id="btn-add-address">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        Tambah Alamat
                    </button>
                </div>

                <div class="address-list">
                    @forelse ($addresses as $address)
                        <div class="address-card {{ $address->is_default ? 'default' : '' }}">
                            <div class="address-header-card">
                                <div class="address-label">
                                    <strong>{{ $address->label }}</strong>
                                    @if($address->is_default)
                                        <span class="badge-default">Default</span>
                                    @endif
                                </div>
                                <div class="address-actions">
                                    @if(!$address->is_default)
                                        <form action="{{ route('address.set-default', $address->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="btn-link">Set Default</button>
                                        </form>
                                    @endif
                                    <form action="{{ route('address.delete', $address->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin hapus alamat ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-link text-danger">Hapus</button>
                                    </form>
                                </div>
                            </div>
                            <div class="address-body">
                                <p><strong>{{ $user->name }}</strong> | {{ $address->phone }}</p>
                                <p>{{ $address->address }}</p>
                                <p>{{ $address->city }}, {{ $address->postal_code }}</p>
                                @if($address->notes)
                                    <p class="text-muted">Catatan: {{ $address->notes }}</p>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="empty-state">
                            <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            <p>Belum ada alamat tersimpan</p>
                            <button class="btn btn-primary" id="btn-add-address-empty">Tambah Alamat Pertama</button>
                        </div>
                    @endforelse
                </div>
            </div>

            {{-- Tab 3: Security --}}
            <div class="tab-content" id="security">
                <h2>Keamanan Akun</h2>
                <p class="text-muted">Ubah password Anda secara berkala untuk menjaga keamanan akun</p>

                <form action="{{ route('profile.update-password') }}" method="POST" class="profile-form">
                    @csrf
                    
                    <div class="form-group">
                        <label>Password Lama</label>
                        <input type="password" name="current_password" required>
                    </div>

                    <div class="form-group">
                        <label>Password Baru</label>
                        <input type="password" name="new_password" required>
                        <small class="text-muted">Minimal 8 karakter</small>
                    </div>

                    <div class="form-group">
                        <label>Konfirmasi Password Baru</label>
                        <input type="password" name="new_password_confirmation" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Ubah Password</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Modal Add Address --}}
<div class="modal" id="modal-add-address">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Tambah Alamat Baru</h3>
            <button class="modal-close">&times;</button>
        </div>
        <form action="{{ route('address.add') }}" method="POST">
            @csrf
            <div class="modal-body">

                <div class="form-group">
                    <label>Nama Penerima *</label>
                    <input type="text" name="recipient_name"" required>
                </div>

                <div class="form-group">
                    <label>Label Alamat *</label>
                    <input type="text" name="label" placeholder="Rumah, Kantor, Apartemen, dll" required>
                </div>

                <div class="form-group">
                    <label>Alamat Lengkap *</label>
                    <textarea name="full_address" rows="3" placeholder="Nama jalan, nomor rumah, RT/RW" required></textarea>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Kota *</label>
                        <input type="text" name="city" placeholder="Jakarta" required>
                    </div>

                    <div class="form-group">
                        <label>Kode Pos *</label>
                        <input type="text" name="postal_code" placeholder="12345" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Nomor Telepon *</label>
                    <input type="text" name="phone" placeholder="08123456789" required>
                </div>

                <div class="form-group">
                    <label>Catatan (Opsional)</label>
                    <textarea name="notes" rows="2" placeholder="Patokan, warna rumah, dll"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline modal-close">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan Alamat</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
<script src="{{asset('js/Profile.js')}}"></script>
@endsection