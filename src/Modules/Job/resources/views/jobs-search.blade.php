@extends('layouts.view-companies-jobs')
@section('title', 'Company')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <p class="section-lead" style="margin-left: 0">About {{ $totalJobs }} results</p>

                <div class="row">
                    <div class="col-12 col-md-5 col-lg-5">
                        <div class="card" style="overflow-x: auto;">
                            <div class="card-body jobs-list">
                                <ul style="padding-left: 0">
                                    @foreach ($jobs as $job)
                                        <li class="media job-item" style="cursor: pointer" data-id="{{ $job->id }}"
                                            onclick="fetchJobDetails(this)">
                                            <img class="mr-3" src="{{ resize($job->company->logo_image, 50, 50, 0) }}"
                                                alt="{{ $job->company->company_name }}">
                                            <div class="media-body"
                                                style="border-bottom:1px solid rgb(140 140 140/.2); padding: 12px 0">
                                                <h6 class="media-title"><a href="#">{{ $job->job_title }}</a>
                                                </h6>
                                                <div class="text-secondary text-muted">
                                                    <span style="color: rgb(0 0 0 / .9)">{{ $job->company->company_name }}
                                                        <div class="bullet"></div> {{ $job->job_location }}
                                                    </span>
                                                    <span class="badge badge-warning"><b>{{ $job->job_type ?? $job->job_type }}</b></span>
                                                    <span class="badge badge-success"><b>{{ $job->employment_type ?? $job->employment_type  }}</b></span>
                                                </div>
                                                <span>{{ formatOpenDate($job->open_date) }} </span>

                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="pagination" style="margin: 0 auto;">
                                    {{ $jobs->links('vendor.pagination.general-companies-jobs') }}
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-12 col-md-7 col-lg-7 job-details" style="display: none;">
                        <div class="card">
                            <div class="card-header" style="background-color: #fff">
                                <img class="mr-3 company-image" width="30" src="assets/img/example-image-50.jpg"
                                    alt="Generic placeholder image">
                                <strong class="company-name-data"></strong>
                                <div class="action-buttons">
                                    <button class="btn btn-primary">Apply Now</button>
                                    <button class="btn btn-secondary">Save Job</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body" style="color:#000">
                                        <a href="#">
                                            <h5 id="job-title-data" style="color: #000"></h5>
                                        </a>

                                        <div class="text-secondary text-muted" style="margin-bottom: 8px">
                                            <span style="color: rgb(0 0 0 / .9)"><span class="company-name-data"> </span>
                                                <div class="bullet"></div> <span id="job-location-data"> </span>
                                            </span>
                                        </div>
                                        <div class="buttons" id="job-type-data">

                                        </div>


                                        <div id="job-description">

                                        </div>


                                        {{-- <div id="job-requirements">

                                        </div>

                                        <div id="job-responsibilities">

                                        </div> --}}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Thêm nút phân trang -->

                </div>
            </div>
        </section>
    </div>
@endsection
@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
    <script>
        $(document).ready(function() {
            const firstJobItem = $(".media.job-item").first();
            if (firstJobItem.length) {
                fetchJobDetails(firstJobItem[0]);
            }
    
            $(document).on("scroll", function() {
                const cardHeader = $(".card-header");
                const jobDescription = $("#job-description");
    
                const descriptionTop = jobDescription[0].getBoundingClientRect().top;
    
                if (descriptionTop <= 100) {
                    cardHeader.addClass("fixed");
                } else {
                    cardHeader.removeClass("fixed");
                }
            });
        });
    
        function fetchJobDetails(element) {
            if (element) {
                let maxHeight = $('.jobs-list')?.outerHeight(true);
                const jobDetails = $('.job-details');
                jobDetails.css({
                    'max-height': maxHeight,
                    'background': '#fff'
                });
    
                const jobId = element?.getAttribute('data-id');
    
                const url = `{{ route('jobs.find', ['id' => ':id']) }}`.replace(':id', jobId);
                const imgElement = $(element)?.find('img').first();
                $('.company-image')?.attr('alt', imgElement.attr('alt'));
                $('.company-image')?.attr('src', imgElement.attr('src'));
    
                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function(response) {
                        console.log('Job data:', response);
                        $('.company-name-data').text(response?.data?.company?.company_name);
                        $('#job-title-data').text(response?.data?.job_title);
                        $('#job-location-data').text(response?.data?.job_location);
                        $('#job-type-data').html(
                            '<a href="#" class="btn btn-sm btn-primary">' + response?.data?.job_type +
                            '</a>' +
                            '<a href="#" class="btn btn-sm btn-primary">' + response?.data
                            ?.employment_type +
                            '</a>'
                        );
    
                        $('#job-description').html('<a href="#"><h6 id="job-title-data" style="color:#000">About the job</h6></a>' + response?.data?.description);
                        // $('#job-requirements').html('<a href="#"><h6 id="job-title-data" style="color:#000">Responsibilities</h6></a>' + response?.data?.requirements);
                        // $('#job-responsibilities').html('<a href="#"><h6 id="job-title-data" style="color:#000">Requirements</h6></a>' + response?.data?.responsibilities);

                        $('.job-details').show();
                    },
                    error: function(xhr) {
                        console.error('Error:', xhr.responseJSON.message);
                    }
                });
            }
        }
    </script>
    
    <style>
        .card {
            min-height: 100vh;
            margin-bottom: 0!important
        }
        .job-details {
            position: relative;
            overflow-y: auto;
            overflow-x: hidden;
            padding: 0;
        }

        .card-header {
            position: sticky;
            top: 0;
            z-index: 10;
            background-color: #fff;
            border-bottom: 1px solid #ccc;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
    </style>
@endpush
