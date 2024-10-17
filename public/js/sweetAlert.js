document.querySelectorAll('.deleteButton').forEach(button => {
    button.addEventListener('click', function (e) {
        e.preventDefault();
        const form = this.closest('form'); // Ambil form terkait

        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "User ini akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});