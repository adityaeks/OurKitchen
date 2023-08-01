@extends('layouts.mainadmin')
@section('content')
    <div class="container-sm mt-5">
        <form action="{{ route('etalase.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row justify-content-center">
                <div class="p-5 bg-light rounded-3 border col-xl-6">

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show">
                                {{ $error }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endforeach
                    @endif

                    <div class="mb-3 text-center">
                        <h4>{{ $pageTitle }}</h4>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ $product->name }}"
                                placeholder="Nama Madu">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="price" class="form-label">Harga</label>
                            <input class="form-control" type="text" name="price" id="price" value="{{ $product->price }}"
                                placeholder="Harga Madu">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="size" class="form-label">Ukuran</label>
                            <input class="form-control" type="number" name="size" id="size" value="{{ $product->size }}"
                                placeholder="Ukuran Madu">
                        </div>
                        <div class="col-md-12">
                            <label for="image" class="form-label">Foto</label>
                            <input type="file" class="form-control" id="image" name="image" onchange="previewImage(event)">
                            <!-- Conditionally show the preview based on whether a new image is selected -->
                            @if(!empty($product->image))
                                <img id="preview" src="{{ asset('images/' . $product->image) }}" alt="Preview" style="max-width: 200px; margin-top: 10px;">
                            @else
                                <img id="preview" src="" alt="Preview" style="display: none; max-width: 200px; margin-top: 10px;">
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 d-grid">
                            <a href="{{ route('etalase.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i
                                    class="bi-arrow-left-circle me-2"></i> Cancel</a>
                        </div>
                        <div class="col-md-6 d-grid">
                            <button type="submit" class="btn btn-dark btn-lg mt-3"><i class="bi-check-circle me-2"></i>
                                Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        function previewImage(event) {
            var input = event.target;
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    var preview = document.getElementById('preview');
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>




@endsection
