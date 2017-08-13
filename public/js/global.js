$(document).ready(function() {
    $('.deleteBtn').on('click', function(e) {
        e.preventDefault();
        var flag = confirm('Once you delete a record, there is no going back. Please be certain');
        if (flag) {
            $(this).parents('form').submit();
        }
    });
})