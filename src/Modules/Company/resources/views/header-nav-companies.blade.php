<nav class="navbar navbar-secondary navbar-expand-lg">
    <div class="container">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a href="#" data-toggle="dropdown" class="has-dropdown btn btn-icon icon-right btn-primary">
                    {{ Request::is('/') || Request::is('companies') ? 'Companies' : 'Jobs' }}
                    <i class="fas fa-chevron-down"></i>
                </a>

                <ul class="dropdown-menu">
                    <li class="nav-item"><a href="/" class="nav-link">Companies</a></li>
                    <li class="nav-item"><a href="/jobs/search" class="nav-link">Jobs</a></li>
                </ul>
            </li>
            <li class="search-vertical-divider" style="border-left: 1px solid #e3eaef; height: 36px"></li>
            {{-- LOCATIONS SEARCH --}}
            <li class="nav-item dropdown">
                <a href="#" data-toggle="dropdown" class="has-dropdown btn btn-icon icon-right btn-primary">
                    Locations
                    <span class="search-count filter-location">
                        0
                    </span>
                    <i class="fas fa-chevron-down"></i>
                </a>

                <div class="dropdown-menu">
                    <div class="search-content-params" style="padding: 8px 8px 8px 10px">
                        <div class="input-group" style="margin: 4px 0 8px 0">
                            <input type="text" class="form-control" id="location" placeholder="search by location"
                                style="height: 30px">
                            <div class="invalid-feedback">
                                Search is invalid.
                            </div>
                            {{-- <button class="btn btn-primary" id="search-location" style="padding: 0 8px;">
                                <i class="fas fa-search"></i>
                            </button> --}}


                        </div>
                        <ul class="list-unstyled" id="location-list">

                        </ul>
                        <div class="nav-footer-search">
                            <a href="#" id="reset-filter-location" class="btn"
                                style="padding: 0 8px;line-height: 28px;">Reset</a>
                            <button class="btn btn-primary" id="apply-location" style="padding: 0 8px;">
                                Apply
                            </button>
                        </div>
                    </div>
                </div>
            </li>
            {{-- INDUSTRY SEARCH --}}
            @if (Request::is('/') || Request::is('companies'))
                <li class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown" class="has-dropdown btn btn-icon icon-right btn-primary">
                        Industry
                        <span class="search-count filter-industry">
                            0
                        </span>
                        <i class="fas fa-chevron-down"></i>
                    </a>



                    <div class="dropdown-menu">
                        <div class="search-content-params" style="padding: 8px 8px 8px 10px">
                            <div class="input-group" style="margin: 4px 0 8px 0">
                                <input type="text" class="form-control" id="industry"
                                    placeholder="search by industry" style="height: 30px">
                                <div class="invalid-feedback">
                                    Search is invalid.
                                </div>
                                {{-- <button class="btn btn-primary" id="search-industry" style="padding: 0 8px;">
                                <i class="fas fa-search"></i>
                            </button> --}}


                            </div>
                            <ul class="list-unstyled" id="industry-list">

                            </ul>
                            <div class="nav-footer-search">
                                <a href="#" id="reset-filter-industry" class="btn"
                                    style="padding: 0 8px;line-height: 28px;">Reset</a>
                                <button class="btn btn-primary" id="apply-industry" style="padding: 0 8px;">
                                    Apply
                                </button>
                            </div>
                        </div>
                    </div>


                </li>
            @endif

            {{-- COMPANY SIZE --}}
            @if (Request::is('/') || Request::is('companies'))
                <li class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown" class="has-dropdown btn btn-icon icon-right btn-primary">
                        Company Size
                        <span class="search-count filter-size-company">
                            0
                        </span>
                        <i class="fas fa-chevron-down"></i>
                    </a>


                    <div class="dropdown-menu">
                        <div class="search-content-params" style="padding: 8px 8px 8px 10px">
                            <ul class="list-unstyled">
                                <li>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="company_size" class="custom-control-input"
                                            id="1-10">
                                        <label class="custom-control-label" for="1-10">1-10 employees</label>
                                    </div>
                                </li>

                                <li>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="company_size" class="custom-control-input"
                                            id="11-50">
                                        <label class="custom-control-label" for="11-50">11-50 employees</label>
                                    </div>
                                </li>

                                <li>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="company_size" class="custom-control-input"
                                            id="51-200">
                                        <label class="custom-control-label" for="51-200">51-200 employees</label>
                                    </div>
                                </li>

                                <li>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="company_size" class="custom-control-input"
                                            id="201-500">
                                        <label class="custom-control-label" for="201-500">201-500 employees</label>
                                    </div>
                                </li>

                                <li>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="company_size" class="custom-control-input"
                                            id="501-1000">
                                        <label class="custom-control-label" for="501-1000">501-1000 employees</label>
                                    </div>
                                </li>

                                <li>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="company_size" class="custom-control-input"
                                            id="1001">
                                        <label class="custom-control-label" for="1001">1001+ employees</label>
                                    </div>
                                </li>
                            </ul>
                            <div class="nav-footer-search">
                                <a href="#" id="reset-filter-size" class="btn"
                                    style="padding: 0 8px;line-height: 28px;">Reset</a>
                                <button class="btn btn-primary" id="apply-size" style="padding: 0 8px;">
                                    Apply
                                </button>
                            </div>
                        </div>
                    </div>

                </li>
            @endif
            {{-- JOB TYPE --}}
            @if (Request::is('jobs/search'))
            <li class="nav-item dropdown">
                <a href="#" data-toggle="dropdown" class="has-dropdown btn btn-icon icon-right btn-primary">
                    Job Type
                    <span class="search-count filter-job-type">
                        0
                    </span>
                    <i class="fas fa-chevron-down"></i>
                </a>


                <div class="dropdown-menu">
                    <div class="search-content-params" style="padding: 8px 8px 8px 10px">
                        <ul class="list-unstyled">
                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="job_type" class="custom-control-input"
                                        id="onsite">
                                    <label class="custom-control-label" for="onsite">On-Site</label>
                                </div>
                            </li>

                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="job_type" class="custom-control-input"
                                        id="hybrid">
                                    <label class="custom-control-label" for="hybrid">Hybrid</label>
                                </div>
                            </li>

                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="job_type" class="custom-control-input"
                                        id="remote">
                                    <label class="custom-control-label" for="remote">Remote</label>
                                </div>
                            </li>
                        </ul>
                        <div class="nav-footer-search">
                            <a href="#" id="reset-filter-job-type" class="btn"
                                style="padding: 0 8px;line-height: 28px;">Reset</a>
                            <button class="btn btn-primary" id="apply-job-type" style="padding: 0 8px;">
                                Apply
                            </button>
                        </div>
                    </div>
                </div>

            </li>
            @endif
            {{-- JOB TIME --}}
            @if (Request::is('jobs/search'))
            <li class="nav-item dropdown">
                <a href="#" data-toggle="dropdown" class="has-dropdown btn btn-icon icon-right btn-primary">
                    Job Time
                    <span class="search-count filter-employment-type">
                        0
                    </span>
                    <i class="fas fa-chevron-down"></i>
                </a>


                <div class="dropdown-menu">
                    <div class="search-content-params" style="padding: 8px 8px 8px 10px">
                        <ul class="list-unstyled">
                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="employment_type" class="custom-control-input"
                                        id="part-time">
                                    <label class="custom-control-label" for="part-time">Part Time</label>
                                </div>
                            </li>

                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="employment_type" class="custom-control-input"
                                        id="full-time">
                                    <label class="custom-control-label" for="full-time">Full Time</label>
                                </div>
                            </li>
                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="employment_type" class="custom-control-input"
                                        id="temporary">
                                    <label class="custom-control-label" for="temporary">Temporary</label>
                                </div>
                            </li>
                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="employment_type" class="custom-control-input"
                                        id="contract">
                                    <label class="custom-control-label" for="contract">Contract</label>
                                </div>
                            </li>
                        </ul>
                        <div class="nav-footer-search">
                            <a href="#" id="reset-filter-employment-type" class="btn"
                                style="padding: 0 8px;line-height: 28px;">Reset</a>
                            <button class="btn btn-primary" id="apply-employment-type" style="padding: 0 8px;">
                                Apply
                            </button>
                        </div>
                    </div>
                </div>

            </li>
            @endif

            {{-- OPEN DATE --}}
            @if (Request::is('jobs/search'))
            <li class="nav-item dropdown">
                <a href="#" data-toggle="dropdown" class="has-dropdown btn btn-icon icon-right btn-primary">
                    Open Date
                    <span class="search-count filter-open-date">
                        0
                    </span>
                    <i class="fas fa-chevron-down"></i>
                </a>


                <div class="dropdown-menu">
                    <div class="search-content-params" style="padding: 8px 8px 8px 10px">
                        <ul class="list-unstyled">
                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="open_date" class="custom-control-input"
                                        id="anytime">
                                    <label class="custom-control-label" for="anytime">Anytime</label>
                                </div>
                            </li>

                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="open_date" class="custom-control-input"
                                        id="passmonth">
                                    <label class="custom-control-label" for="passmonth">Passmonth</label>
                                </div>
                            </li>

                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="open_date" class="custom-control-input"
                                        id="passweek">
                                    <label class="custom-control-label" for="passweek">Passweek</label>
                                </div>
                            </li>

                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="open_date" class="custom-control-input"
                                        id="pass24hours">
                                    <label class="custom-control-label" for="pass24hours">Pass24hours</label>
                                </div>
                            </li>
                        </ul>
                        <div class="nav-footer-search">
                            <a href="#" id="reset-filter-open-date" class="btn"
                                style="padding: 0 8px;line-height: 28px;">Reset</a>
                            <button class="btn btn-primary" id="apply-open-date" style="padding: 0 8px;">
                                Apply
                            </button>
                        </div>
                    </div>
                </div>

            </li>
            @endif

            <li class="nav-item dropdown">
                <a href="#" id="reset-filter-all" class="btn">Reset</a>
            </li>
        </ul>
    </div>
</nav>

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ asset('library/upload-preview/upload-preview.js') }}"></script>
    <!-- Page Specific JS File -->
    <script>
        $('.dropdown-menu').on('click', function(event) {
            event.stopPropagation();
        });
    </script>
    <script>
        // ============================ FILTER INDUSTRY & LOCATION=================================
        $(document).ready(function() {
            // Format input

            $('#location, #industry').on('input', function() {
                var inputValue = $(this).val();

                if (inputValue.length < 3 || validateInput(inputValue)) {
                    $(this).addClass('is-invalid');
                } else {
                    $(this).removeClass('is-invalid');
                }
            });

            function validateInput(inputValue) {
                let specialCharsPattern = /[\'\";%_&<>]/;

                if (specialCharsPattern.test(inputValue)) {
                    return true;
                } 
                return false;
            }

            $('#search-location, #apply-location').click(function() {
                search('location', '#location');
            });

            $('#location').keydown(function(event) {
                if (event.key === "Enter") {
                    event.preventDefault();
                    search('location', '#location');
                }
            });

            $('#search-industry, #apply-industry').click(function() {
                search('industry', '#industry');
            });

            $('#industry').keydown(function(event) {
                if (event.key === "Enter") {
                    event.preventDefault();
                    search('industry', '#industry');
                }
            });
            // Create checkboxes when the page loads
            createCheckboxes('location', '#location-list');
            createCheckboxes('industry', '#industry-list');

            // Apply filters on button click
            $('#apply-location').click(function() {
                applyFilter('location');
            });

            $('#apply-industry').click(function() {
                applyFilter('industry');
            });

            // Reset filters on button click
            $('#reset-filter-location').click(function(event) {
                event.preventDefault();
                resetFilter('location');
            });

            $('#reset-filter-industry').click(function(event) {
                event.preventDefault();
                resetFilter('industry');
            });

            // Reset All Filters functionality
            $('#reset-filter-all').click(function(event) {
                event.preventDefault();

                var urlParams = new URLSearchParams(window.location.search);
                urlParams.delete('location');
                urlParams.delete('industry');
                urlParams.delete('company_size');
                urlParams.delete('job_type');
                urlParams.delete('open_date');

                var newUrl = window.location.protocol + "//" + window.location.host + window.location
                    .pathname;

                var params = [];
                urlParams.forEach((value, key) => {
                    params.push(key + '=' + encodeURIComponent(value));
                });

                if (params.length > 0) {
                    newUrl += '?' + params.join('&');
                }

                window.history.pushState({
                    path: newUrl
                }, '', newUrl);
                window.location.reload();
            });

            function search(queryParam, inputSelector) {
                var queryValue = $(inputSelector).val().trim();

                if (queryValue && !validateInput(queryValue)) {
                    var urlParams = new URLSearchParams(window.location.search);
                    var queryValues = urlParams.getAll(queryParam);

                    queryValues.push(queryValue);
                    queryValues = [...new Set(queryValues)];

                    var queryString = queryValues.join('+');

                    var newUrl = window.location.protocol + "//" + window.location.host + window.location.pathname;
                    var params = [];

                    params.push(queryParam + '=' + encodeURIComponent(queryString));

                    var currentParams = new URLSearchParams(window.location.search);
                    currentParams.forEach((value, key) => {
                        if (key !== queryParam) {
                            params.push(key + '=' + encodeURIComponent(value));
                        }
                    });

                    if (params.length > 0) {
                        newUrl += '?' + params.join('&');
                    }

                    window.history.pushState({
                        path: newUrl
                    }, '', newUrl);

                    window.location.reload();
                }
            }

            function createCheckboxes(queryParam, listId) {
                var urlParams = new URLSearchParams(window.location.search);
                var queryValues = urlParams.get(queryParam);

                if (queryValues) {
                    queryValues = queryValues.split('+');
                } else {
                    queryValues = [];
                }

                $('.search-count.filter-' + queryParam).text(queryValues.length);

                if (queryValues.length > 0) {
                    $(listId).empty();

                    queryValues.forEach(function(value, index) {
                        var listItem = $('<li class="search-reusables__collection-values-item"></li>');
                        var checkboxWrapper = $('<div class="custom-control custom-checkbox"></div>');
                        var checkbox = $('<input type="checkbox" class="custom-control-input box-' +
                            queryParam + '" id="' +
                            queryParam + '-' + index + '" />');
                        var label = $('<label class="custom-control-label" for="' + queryParam + '-' +
                            index + '">' + value.trim() + '</label>');

                        checkbox.prop('checked', true);

                        checkboxWrapper.append(checkbox);
                        checkboxWrapper.append(label);
                        listItem.append(checkboxWrapper);
                        $(listId).append(listItem);
                    });
                }
            }

            function applyFilter(queryParam) {
                var urlParams = new URLSearchParams(window.location.search);
                var queryValues = urlParams.get(queryParam) ? urlParams.get(queryParam).trim() : "";
                var newQueryValues = [];

                if (queryValues) {
                    newQueryValues = queryValues.split('+');
                }

                // Collect selected checkbox values
                $('.box-' + queryParam + ':checked').each(function() {
                    var value = $(this).siblings('label').text().trim();
                    newQueryValues.push(value);
                });

                // Remove unchecked values from the URL query
                $('.box-' + queryParam + ':not(:checked)').each(function() {
                    var value = $(this).siblings('label').text().trim();
                    var index = newQueryValues.indexOf(value);
                    if (index !== -1) {
                        newQueryValues.splice(index, 1);
                    }
                });

                // Remove duplicates
                newQueryValues = [...new Set(newQueryValues)];

                if (newQueryValues.length === 0) {
                    urlParams.delete(queryParam);
                } else {
                    var queryString = newQueryValues.join('+');
                    urlParams.set(queryParam, queryString);
                }

                var newUrl = window.location.protocol + "//" + window.location.host + window.location.pathname;

                var params = [];
                urlParams.forEach((value, key) => {
                    params.push(key + '=' + encodeURIComponent(value));
                });

                if (params.length > 0) {
                    newUrl += '?' + params.join('&');
                }

                window.history.pushState({
                    path: newUrl
                }, '', newUrl);

                window.location.reload();
            }

            function resetFilter(queryParam) {
                var urlParams = new URLSearchParams(window.location.search);
                urlParams.delete(queryParam);

                var newUrl = window.location.protocol + "//" + window.location.host + window.location.pathname;

                var params = [];
                urlParams.forEach((value, key) => {
                    params.push(key + '=' + encodeURIComponent(value));
                });

                if (params.length > 0) {
                    newUrl += '?' + params.join('&');
                }

                window.history.pushState({
                    path: newUrl
                }, '', newUrl);
                window.location.reload();
            }



        });
    </script>


    <style>
        .search-count {
            align-items: center;
            background-color: #fff;
            border-radius: 20px;
            color: #000;
            display: inline-flex;
            font-size: 14px;
            height: 20px;
            justify-content: center;
            margin: 0 0 0 0.4rem;
            min-width: 20px;
        }

        .nav-footer-search {
            border-top: 1px solid #e3eaef;
            display: flex;
            padding: 8px 0;
            justify-content: flex-end;
        }

        .nav-item {
            margin: 0 8px;
        }

        .list-unstyled {
            max-height: 250px;
            overflow-y: auto;
            padding-left: 0;
            margin-bottom: 0;
        }

        .dropdown-menu.show {
            width: 300px;
            padding: 8px 0 !important;
        }
    </style>
@endpush
