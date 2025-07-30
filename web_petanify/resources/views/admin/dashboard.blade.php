@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<div class="row">
    <!-- Statistik Pengguna -->
    <div class="col-md-6 mb-4">
        <div class="card shadow-sm border-start border-success border-4 p-4 animate__animated animate__fadeIn">
            <h5 class="mb-3 text-success">
                <i class="bi bi-people-fill me-2"></i>Statistik Pengguna
            </h5>
            <p><i class="bi bi-person-badge-fill me-2 text-success"></i>Petani: 
                <strong id="totalPetani">{{ $totalPetani ?? 0 }}</strong>
            </p>
            <div class="progress mb-3">
                <div class="progress-bar bg-success" id="petaniProgress" role="progressbar" style="width: {{ $totalPetaniPercentage ?? 0 }}%">
                    {{ $totalPetaniPercentage ?? 0 }}%
                </div>
            </div>
            <p><i class="bi bi-person-check-fill me-2 text-info"></i>Pembeli: 
                <strong id="totalPembeli">{{ $totalPembeli ?? 0 }}</strong>
            </p>
            <div class="progress">
                <div class="progress-bar bg-info" id="pembeliProgress" role="progressbar" style="width: {{ $totalPembeliPercentage ?? 0 }}%">
                    {{ $totalPembeliPercentage ?? 0 }}%
                </div>
            </div>
        </div>
    </div>

    <!-- Statistik Forum -->
    <div class="col-md-6 mb-4">
        <div class="card shadow-sm border-start border-warning border-4 p-4 animate__animated animate__fadeIn">
            <h5 class="mb-3 text-warning">
                <i class="bi bi-chat-left-text-fill me-2"></i>Statistik Forum
            </h5>
            <p><i class="bi bi-file-earmark-text-fill me-2 text-primary"></i>Postingan: 
                <strong id="totalPosts">{{ $totalPosts ?? 0 }}</strong>
            </p>
            <p><i class="bi bi-chat-dots-fill me-2 text-secondary"></i>Komentar: 
                <strong id="totalComments">{{ $totalComments ?? 0 }}</strong>
            </p>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    async function fetchDataAndUpdate() {
        try {
            const response = await fetch("{{ route('admin.dashboard.data') }}");
            const data = await response.json();

            // Update statistik pengguna
            document.getElementById('totalPetani').textContent = data.totalPetani;
            document.getElementById('totalPembeli').textContent = data.totalPembeli;

            // Update statistik forum
            document.getElementById('totalPosts').textContent = data.totalPosts;
            document.getElementById('totalComments').textContent = data.totalComments;

            // Update progress bar
            const petaniProgress = document.getElementById('petaniProgress');
            petaniProgress.style.width = data.totalPetaniPercentage + '%';
            petaniProgress.textContent = data.totalPetaniPercentage + '%';

            const pembeliProgress = document.getElementById('pembeliProgress');
            pembeliProgress.style.width = data.totalPembeliPercentage + '%';
            pembeliProgress.textContent = data.totalPembeliPercentage + '%';
        } catch (e) {
            console.error("Gagal mengambil data:", e);
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        fetchDataAndUpdate();
        setInterval(fetchDataAndUpdate, 10000);
    });
</script>
@endsection
