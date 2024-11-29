$(document).ready(function() {
    function handleFilter(queryParam, checkboxName, countSelector, applyButtonId, resetButtonId) {
        var urlParams = new URLSearchParams(window.location.search);
        var selectedValues = urlParams.get(queryParam);

        if (selectedValues) {
            selectedValues = selectedValues.split(',');
            $('input[name="' + checkboxName + '"]').each(function() {
                var checkboxId = $(this).attr('id');
                if (selectedValues.indexOf(checkboxId) !== -1) {
                    $(this).prop('checked', true);
                }
            });
        }

        function updateCheckedCount() {
            var checkedCount = $('input[name="' + checkboxName + '"]:checked').length;
            $(countSelector).text(checkedCount);
        }

        $('input[name="' + checkboxName + '"]').change(function() {
            updateCheckedCount();
        });

        $(applyButtonId).click(function(event) {
            event.preventDefault();
            var selectedItems = [];

            $('input[name="' + checkboxName + '"]:checked').each(function() {
                selectedItems.push($(this).attr('id'));
            });

            var urlParams = new URLSearchParams(window.location.search);
            var existingItems = urlParams.get(queryParam);

            if (existingItems) {
                existingItems = existingItems.split(',');

                existingItems = existingItems.filter(function(item) {
                    return selectedItems.indexOf(item) !== -1;
                });
            }

            if (selectedItems.length > 0) {
                selectedItems = [...new Set(selectedItems)];
                urlParams.set(queryParam, selectedItems.join(','));
            } else {
                urlParams.delete(queryParam);
            }

            var newUrl = window.location.protocol + "//" + window.location.host + window.location
                .pathname + '?' + urlParams.toString();
            window.history.pushState({
                path: newUrl
            }, '', newUrl);
            window.location.reload();
        });

        $(resetButtonId).click(function(event) {
            event.preventDefault();

            var urlParams = new URLSearchParams(window.location.search);
            urlParams.delete(queryParam);
            var newUrl = window.location.protocol + "//" + window.location.host + window.location
                .pathname + '?' + urlParams.toString();
            window.history.pushState({
                path: newUrl
            }, '', newUrl);
            window.location.reload();
        });

        updateCheckedCount();
    }

    handleFilter('company_size', 'company_size', '.search-count.filter-size-company', '#apply-size',
        '#reset-filter-size');
    
    handleFilter('job_type', 'job_type', '.search-count.filter-job-type', '#apply-job-type',
        '#reset-filter-job-type');

    handleFilter('open_date', 'open_date', '.search-count.filter-open-date', '#apply-open-date',
        '#reset-filter-open-date');    
    handleFilter('employment_type', 'employment_type', '.search-count.filter-employment-type', '#apply-employment-type',
        '#reset-filter-employment-type');   
        
});