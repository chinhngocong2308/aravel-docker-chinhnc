@extends('layouts.admin-companies-jobs')
@section('title', 'Job')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush
@section('main')

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Create Job</h1>
            </div>

            <div class="section-body">
                <h2><a href="javascript:void(0)" onclick="history.back()" class="btn btn-icon icon-left btn-primary"><i
                            class="fas fa-chevron-left"></i> Back</a></h2>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Job Information</h4>
                            </div>
                            <form action="{{ route('job.store') }}" method="POST">
                                @csrf

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="job_title">Job Title</label>
                                        <input type="text" name="job_title" id="job_title" class="form-control">
                                    </div>
                                    <div class="form-group">

                                        <label for="company_id">Company</label>
                                        <select class="form-control select2" name="company_id">
                                            @foreach ($companies as $company)
                                                <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="job_location">Job Location</label>
                                        <input type="text" name="job_location" id="job_location" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="job_type">Job Type</label>
                                        <select class="form-control select2" name="job_type[]" id="job_type" multiple="">
                                            <option value="onsite">Onsite</option>
                                            <option value="hybrid">Hybrid</option>
                                            <option value="remote">Remote</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="employment_type">Employment Type</label>
                                        <select class="form-control select2" name="employment_type[]" id="employment_type" multiple="">
                                            <option value="full-time">Full-time</option>
                                            <option value="part-time">Part-time</option>
                                            <option value="temporary">Temporary</option>
                                            <option value="contract">Contract</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="open_date">Open Date</label>
                                        <input type="text" name="open_date" id="open_date"
                                            class="form-control datetimepicker">
                                    </div>
                                    <div class="form-group mb-0">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" class="summernote"></textarea>
                                    </div>
                                    <div class="form-group mb-0">
                                        <label for="requirements">Requirements</label>
                                        <textarea name="requirements" id="requirements" class="summernote"></textarea>
                                    </div>
                                    <div class="form-group mb-0">
                                        <label for="responsibilities">Responsibilities</label>
                                        <textarea name="responsibilities" id="responsibilities" class="summernote"></textarea>
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
    <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>

    <!-- Page Specific JS File -->
@endpush
