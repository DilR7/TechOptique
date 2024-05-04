@extends('admin.layouts.template')
@section('page_title')
    All Category - TechOptique
@endsection
@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-7 align-self-center">
                    <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">All Sub Category</h4>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0 p-0">
                                <li class="breadcrumb-item"><a href="index.html" class="text-muted">Apps</a></li>
                                <li class="breadcrumb-item text-muted active" aria-current="page">All Sub Category</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Sub Category Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Product</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="border border-dark">
                        @foreach ($allsubcategories as $subcategory)
                            <tr>
                                <td>{{ $subcategory->id }}</td>
                                <td>{{ $subcategory->subcategory_name }}</td>
                                <td>{{ $subcategory->category_name }}</td>
                                <td>{{ $subcategory->product_count }}</td>
                                <td>
                                    <a href="{{ route('editsubcategory', $subcategory->id) }}"
                                        class="btn waves-effect waves-light btn-outline-info">Edit</a>
                                    <a href="{{ route('deletesubcategory', $subcategory->id) }}"
                                        class="btn waves-effect waves-light btn-outline-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
