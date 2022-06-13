<!-- BEGIN: Vendor JS-->
<script src="/admin_assets/app-assets/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->

<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="/admin_assets/app-assets/js/core/app-menu.js"></script>
<script src="/admin_assets/app-assets/js/core/app.js"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<!-- END: Page JS-->

<script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>
@jquery
@toastr_js
@toastr_render
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    $(document).ready(function() {
        $.ajax({
            'url': "{{ route('admin.getInfo') }}",
            'type': 'GET',
            success: function(res) {
                var user = res.user;
                var role = res.role;
                $('.user-name').text(user.full_name);
                $('.user-status').text(role.name);
            }
        });
    })
</script>
