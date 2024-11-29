@extends('layouts.admin-companies-jobs')
@section('title', 'Company')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Create Company</h1>
            </div>

            <div class="section-body">
                <h2><a href="javascript:void(0)" onclick="history.back()" class="btn btn-icon icon-left btn-primary"><i
                            class="fas fa-chevron-left"></i> Back</a></h2>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Company Information</h4>
                            </div>
                            <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Company Name</label>
                                        <input type="text" name="company_name" id="company_name" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Logo</label>
                                        <div id="image-preview" class="image-preview">
                                            <label for="image-upload" id="image-label">Choose File</label>
                                            <input type="file" name="logo" id="image-upload" />
                                        </div>
                                        <div id="upload-status"></div>
                                    </div>

                                    <div class="form-group">
                                        <label>Industry</label>
                                        <input type="text" name="industry" id="industry" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Number of Followers</label>
                                        <input type="number" name="number_of_followers" id="number_of_followers"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Company Size</label>
                                        <input type="number" name="company_size" id="company_size" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Location</label>
                                        <input type="text" name="location" id="location" class="form-control">
                                    </div>
                                    <div class="form-group mb-0">
                                        <label>Description</label>
                                        <textarea class="form-control" name="description" id="description" data-height="150" required=""
                                            style="height: 150px;" spellcheck="false"></textarea>
                                    </div>

                                </div>

                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary">Create</button>
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

    {{-- <script>
        $(document).ready(function() {
            $('#image-upload').on('change', function(event) {
                var formData = new FormData();
                formData.append('logo', event.target.files[0]);
                formData.append('_token', '{{ csrf_token() }}');

                $('#upload-status').html('<span>Uploading...</span>');

                $.ajax({
                    url: '{{ route('company.uploadLogo') }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success) {
                            $('#upload-status').html('<span>Upload successful!</span>');
                        } else {
                            $('#upload-status').html('<span>Upload failed! Try again.</span>');
                        }
                    },
                    error: function(xhr, status, error) {
                        $('#upload-status').html('<span>Error occurred! Try again.</span>');
                    }
                });
            });
        });
    </script> --}}
@endpush
