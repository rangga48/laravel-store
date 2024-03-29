@extends('layouts.admin')

@section('title')
    Product
@endsection

@section('content')
<!-- Section Content -->
<div
    class="section-content section-dashboard-home"
    data-aos="fade-up"
    >
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Product</h2>
            <p class="dashboard-subtitle">
                Edit Product
            </p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error )
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('product.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Nama Product</label>
                                        <input type="text" name="name" class="form-control" value="{{ $item->name }}" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label>Pemilik Product</label>
                                        <option value="{{ $item->users_id }}" selected>{{ $item->user->name }}</option>
                                        <select name="users_id" class="form-control">
                                            @foreach ($users as $user )
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label>Kategori Product</label>
                                        <option value="{{ $item->categories_id }}" selected>{{ $item->category->name }}</option>
                                        <select name="categories_id" class="form-control">
                                            @foreach ($categories as $category )
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label>Harga Product</label>
                                        <input type="number" name="price" class="form-control" value="{{ $item->price }}"required>
                                    </div>
                                    <div class="col-md-12">
                                        <label>Description Product</label>
                                        <textarea name="description" id="editor">{!! $item->description !!}</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-right">
                                        <button type="submit" class="btn btn-success px-5 mt-4">
                                            Save Now
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor' );
    </script>
@endpush