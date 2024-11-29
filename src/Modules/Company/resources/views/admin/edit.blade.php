@extends('layouts.admin-companies-jobs')
@section('title', 'Company')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Company</h1>
            </div>

            <div class="section-body">
                <h2><a href="javascript:void(0)" onclick="history.back()" class="btn btn-icon icon-left btn-primary"><i
                            class="fas fa-chevron-left"></i> Back</a></h2>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Company Information</h5>
                            </div>

                            <form action="{{ route('company.update', $company->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Company Name</label>
                                        <input type="text" name="company_name" id="company_name" class="form-control"
                                            value="{{ $company->company_name }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Logo</label>
                                        <div id="image-preview" class="image-preview"
                                            style="background-image: url('{{ $company->logo_image ? asset($company->logo_image) : '' }}'); background-size: cover; background-position: center center;">
                                            <label for="image-upload" id="image-label">Choose File</label>
                                            <input type="file" name="logo" id="image-upload" />
                                        </div>
                                        <div id="upload-status"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Industry</label>
                                        <input type="text" name="industry" id="industry" class="form-control"
                                            value="{{ $company->industry }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Number of Followers</label>
                                        <input type="number" name="number_of_followers" id="number_of_followers"
                                            class="form-control" value="{{ $company->number_of_followers }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Company Size</label>
                                        <input type="number" name="company_size" id="company_size" class="form-control"
                                            value="{{ $company->company_size }}">
                                    </div>

                                    <div class="form-group">
                                        <label>Location</label>
                                        <input type="text" name="location" id="location" class="form-control"
                                            value="{{ $company->location }}">
                                    </div>
                                    <div class="form-group mb-0">
                                        <label>Description</label>
                                        <textarea class="form-control" name="description" id="description" data-height="150" required=""
                                            style="height: 150px;" spellcheck="false">{{ $company->description }}</textarea>
                                    </div>

                                </div>

                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>

@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/upload-preview/upload-preview.js') }}"></script>

    <!-- Page Specific JS File -->
    <script>
        "use strict";

        $.uploadPreview({
            input_field: "#image-upload",
            preview_box: "#image-preview",
            label_field: "#image-label",
            label_default: "Choose File",
            label_selected: "Change File",
            no_label: false,
            success_callback: null
        });
    </script>

@endpush
