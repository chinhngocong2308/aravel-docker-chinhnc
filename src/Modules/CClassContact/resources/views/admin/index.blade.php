@extends('layouts.admin-companies-jobs')
@section('title', 'Company ContactList')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    @include('sweetalert::alert')

    <div class="main-content">
        <section class="section">
            <div class="section-header" style="display:flex;justify-content: space-between;}">
                <h1>CClassContact</h1>
                <a href="{{ route('cclasscontact.create') }}" class="btn btn-primary">Add new</a>
            </div>

            <div class="section-body">
                <h2 class="section-title">List</h2>
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>All CClassContacts</h5>
                            </div>
                            <div class="card-body">
                                <div class="float-left">
                                    <select class="form-control selectric" id="page-length-select"
                                        class="form-control d-inline-block" style="width: auto;">
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>
                                <div class="float-right">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="customSearchInput"
                                            placeholder="Search">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" id="searchButton">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table id="product_table" class="table-bordered table-md table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Fullname</th>
                                                <th>Company Name</th>
                                                <th>Position</th>
                                                <th>Contact Information </th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($contacts as $contact)
                                                <tr>
                                                    <td>{{ $contact->id }} </td>
                                                    <td>{{ $contact->fullname }}</td>
                                                    <td>{{ $contact->company->company_name }}</td>
                                                    <td>{{ $contact->position }}</td>
                                                    <td>{{ $contact->contact_link }}</td>
                                                    <td>
                                                        <a href="{{ route('cclasscontact.show', $contact->id) }}"
                                                            class="btn btn-secondary">View</a>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('cclasscontact.edit', $contact->id) }}"
                                                            class="btn btn-secondary">Edit</a>
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('cclasscontact.destroy', $contact->id) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-secondary" type="submit">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <nav class="d-inline-block">
                                    <ul class="pagination mb-0" id="custom-pagination">
                                        <li class="page-item disabled" id="prev-page">
                                            <a class="page-link" href="#" tabindex="-1"><i
                                                    class="fas fa-chevron-left"></i></a>
                                        </li>
                                        <li class="page-item active" data-page="1"><a class="page-link" href="#">1
                                                <span class="sr-only">(current)</span></a></li>
                                        <li class="page-item" data-page="2"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item" data-page="3"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item" id="next-page">
                                            <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
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
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <!-- Page Specific JS File -->
    <script>
        $(document).ready(function() {
            var table = $('#product_table').DataTable({
                "paging": true,
                "info": false,
                "searching": true,
                "ordering": true,
                "pageLength": 5,
                "dom": 'rt<"dataTable-pagination"p>',
            });

            $('.dataTable-pagination').hide();

            function updateCustomPagination() {
                var info = table.page.info();
                $('#custom-pagination li.page-item:not(#prev-page, #next-page)').remove();
                for (var i = 1; i <= info?.pages; i++) {
                    var activeClass = (i === info?.page + 1) ? 'active' : '';
                    $('<li class="page-item ' + activeClass + '" data-page="' + (i - 1) +
                            '"><a class="page-link" href="#">' + i + '</a></li>')
                        .insertBefore('#next-page');
                }

                if (info?.page === 0) {
                    $('#prev-page').addClass('disabled');
                } else {
                    $('#prev-page').removeClass('disabled');
                }

                if (info?.page === info?.pages - 1) {
                    $('#next-page').addClass('disabled');
                } else {
                    $('#next-page').removeClass('disabled');
                }
            }
            $('#searchButton').on('click', function() {
                var searchValue = $('#customSearchInput').val();
                table.search(searchValue).draw();
            });

            $('#customSearchInput').on('keyup', function(e) {
                $('#searchButton').click();
            });
            updateCustomPagination();

            $('#custom-pagination').on('click', 'li.page-item:not(#prev-page, #next-page)', function(e) {
                e.preventDefault();
                var pageNumber = $(this).data('page');
                table.page(pageNumber).draw('page');
                updateCustomPagination();
            });

            $('#prev-page').click(function(e) {
                e.preventDefault();
                if (!$(this).hasClass('disabled')) {
                    table.page('previous').draw('page');
                    updateCustomPagination();
                }
            });

            $('#next-page').click(function(e) {
                e.preventDefault();
                if (!$(this).hasClass('disabled')) {
                    table.page('next').draw('page');
                    updateCustomPagination();
                }
            });

            table.on('draw', function() {
                updateCustomPagination();
            });

            $('#page-length-select').on('change', function() {
                var newPageLength = $(this).val();
                table.page.len(newPageLength).draw();
                updateCustomPagination();
            });
        });
    </script>
@endpush
