@extends('layouts.view-companies-jobs')
@section('title', 'Company')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <p class="section-lead" style="margin-left: 0">About {{ $totalCompanies }} results</p>

                <div class="row">
                    <div class="col-12 col-md-9 col-lg-9">
                        <div class="card" style="overflow-x: auto;">
                            <div class="card-body">
                                <ul style="padding-left: 0">
                                    @foreach ($companies as $company)
                                        <li class="media company-item" data-id="{{ $company->id }}">
                                            <img class="mr-3" src="{{ resize($company->logo_image, 50, 50, 0) }}"
                                                alt="{{ $company->company_name }}">
                                            <div class="media-body"
                                                style="border-bottom:1px solid rgb(140 140 140/.2); padding: 12px 0">
                                                <div style="cursor: pointer;"
                                                    class="follow-btn badge badge-pill badge-primary float-right">
                                                    Follow
                                                </div>
                                                <h6 class="media-title"><a href="#">{{ $company->company_name }}</a>
                                                </h6>
                                                <div class="text-secondary text-muted">
                                                    <span style="color: rgb(0 0 0 / .9)">{{ $company->industry }} <div
                                                            class="bullet"></div> {{ $company->location }}</span>
                                                </div>
                                                <div><strong>{{ $company->company_size ? $company->company_size . ' employees' : '' }}</strong></div>
                                                <span>{{ formatNumberFollows($company->number_of_followers) }}</span>
                                                <p style="font-size: 12px; margin-bottom: 0">
                                                    {{ limitString($company->description, 241) }}</p>
                                                @if ($company->jobs()->count() > 0)
                                                    <a href="{{ route('job.search') }}?company_id={{ $company->id }}"><i
                                                            class="fa fa-briefcase"></i>
                                                        <span>{{ $company->jobs()->count() }} jobs </span></a>
                                                @endif
                                                @if ($company->cclasscontact()->count() > 0)
                                                    <div class="badges">
                                                        @foreach ($company->cclasscontact as $contact)
                                                            <button type="button"
                                                                onclick="window.location.href='{{ $contact->contact_link }}'"
                                                                class="btn btn-primary" data-toggle="tooltip"
                                                                data-placement="bottom" title=""
                                                                data-original-title="{{ limitString($contact->fullname, 30) }}">
                                                                {{ $contact->position }}
                                                            </button>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="pagination" style="margin: 0 auto;">
                                {{ $companies->links('vendor.pagination.general-companies-jobs') }}
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
@endpush
