(function() {
    $(document).ready(function() {
        $('.galleryContent').select2();
        $('.social-form-data').select2();
        $('.galleryBlog').select2();
        $('.galleryEvent').select2();
        $('.downloadsBlog').select2();
        $('#tags').select2({
            tags: true
        });
    });
})();