
document.addEventListener('DOMContentLoaded', function () {
    // Lắng nghe sự kiện submit của form
    document.querySelectorAll('.product-form.delete').forEach(function(form) {
        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Ngăn chặn việc submit form mặc định
            
            // Sử dụng SweetAlert để xác nhận xóa
            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Nếu người dùng xác nhận, thực hiện submit form
                    form.submit();
                }
            });
        });
    });
});

