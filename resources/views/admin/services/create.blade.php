@extends('admin.layouts.app')

@section('title', 'Tambah Layanan Baru')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.services') }}">Layanan</a></li>
<li class="breadcrumb-item active">Tambah Baru</li>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.services.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="name" class="form-label">Nama Layanan</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label class="form-label">Fitur</label>
                
                <div id="features-container">
                    @if(old('features'))
                        @foreach(old('features') as $index => $feature)
                        <div class="feature-input-group">
                            <div class="input-group mb-2">
                                <input type="text" class="form-control @error('features.'.$index) is-invalid @enderror" name="features[]" value="{{ $feature }}" required>
                                <button type="button" class="btn btn-danger remove-feature" onclick="removeFeature(this)">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                            @error('features.'.$index)
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        @endforeach
                    @else
                        <div class="feature-input-group">
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" name="features[]" required>
                                <button type="button" class="btn btn-danger remove-feature" onclick="removeFeature(this)">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    @endif
                </div>
                
                <button type="button" class="btn btn-sm btn-success btn-add-feature" onclick="addFeature()">
                    <i class="fas fa-plus"></i> Tambah Fitur
                </button>
            </div>
            
            <!-- Packages Section -->
            <div class="mb-3">
                <label class="form-label">Paket</label>
                
                <div id="packages-container" class="mb-3">
                    <!-- Packages will be added here -->
                </div>
                
                <button type="button" class="btn btn-sm btn-success" onclick="addPackage()">
                    <i class="fas fa-plus"></i> Tambah Paket
                </button>
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.services') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Feature management
    function addFeature() {
        const container = document.getElementById('features-container');
        const newFeature = document.createElement('div');
        newFeature.classList.add('feature-input-group');
        newFeature.innerHTML = `
            <div class="input-group mb-2">
                <input type="text" class="form-control" name="features[]" required>
                <button type="button" class="btn btn-danger remove-feature" onclick="removeFeature(this)">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        `;
        container.appendChild(newFeature);
    }
    
    function removeFeature(button) {
        // Get the features container
        const featuresContainer = document.getElementById('features-container');
        
        // Only remove if there's more than one feature
        if (featuresContainer.children.length > 1) {
            // Get the parent feature-input-group div and remove it
            const featureInputGroup = button.closest('.feature-input-group');
            featuresContainer.removeChild(featureInputGroup);
        } else {
            alert('Minimal satu fitur harus ada.');
        }
    }
    
    // Package management
    let packageCount = 0;
    
    function addPackage() {
        const container = document.getElementById('packages-container');
        const packageId = packageCount++;
        
        const packageCard = document.createElement('div');
        packageCard.classList.add('card', 'mb-3', 'package-card');
        packageCard.dataset.packageId = packageId;
        
        packageCard.innerHTML = `
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Paket ${packageId + 1}</h5>
                <button type="button" class="btn btn-sm btn-danger" onclick="removePackage(${packageId})">
                    <i class="fas fa-trash"></i> Hapus Paket
                </button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Paket</label>
                        <input type="text" class="form-control" name="packages[${packageId}][name]" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Harga (Rp)</label>
                        <input type="number" class="form-control" name="packages[${packageId}][price]" required>
                    </div>
                </div>
                
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="popularPackage${packageId}" name="packages[${packageId}][popular]">
                    <label class="form-check-label" for="popularPackage${packageId}">
                        Tandai sebagai paket populer
                    </label>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Fitur Paket</label>
                    <div class="package-features-container" id="package-features-${packageId}">
                        <div class="package-feature-input-group">
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" name="packages[${packageId}][features][]" required>
                                <button type="button" class="btn btn-danger" onclick="removePackageFeature(this)">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-sm btn-info" onclick="addPackageFeature(${packageId})">
                        <i class="fas fa-plus"></i> Tambah Fitur Paket
                    </button>
                </div>
            </div>
        `;
        
        container.appendChild(packageCard);
    }
    
    function removePackage(packageId) {
        const container = document.getElementById('packages-container');
        const packageCard = container.querySelector(`.package-card[data-package-id="${packageId}"]`);
        
        if (packageCard) {
            container.removeChild(packageCard);
        }
    }
    
    function addPackageFeature(packageId) {
        const container = document.getElementById(`package-features-${packageId}`);
        const newFeature = document.createElement('div');
        newFeature.classList.add('package-feature-input-group');
        newFeature.innerHTML = `
            <div class="input-group mb-2">
                <input type="text" class="form-control" name="packages[${packageId}][features][]" required>
                <button type="button" class="btn btn-danger" onclick="removePackageFeature(this)">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        `;
        container.appendChild(newFeature);
    }
    
    function removePackageFeature(button) {
        const featureContainer = button.closest('.package-features-container');
        const featureGroup = button.closest('.package-feature-input-group');
        
        if (featureContainer.children.length > 1) {
            featureContainer.removeChild(featureGroup);
        } else {
            alert('Minimal satu fitur paket harus ada.');
        }
    }
    
    // Add initial package on load
    document.addEventListener('DOMContentLoaded', function() {
        addPackage();
    });
</script>
@endsection