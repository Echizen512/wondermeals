$(document).ready(function () {
    // Mostrar modal de añadir producto
    $('#addProductBtn').click(function () {
        $('#productForm')[0].reset();
        $('#productId').val('');
        $('#productModal').modal('show');
    });

    // Editar producto
    $('.edit-product').click(function () {
        const id = $(this).data('id');
        $.ajax({
            url: './Includes/get_product.php',
            method: 'GET',
            data: { id: id },
            success: function (data) {
                const product = JSON.parse(data);
                $('#productId').val(product.id);
                $('#name').val(product.name);
                $('#description').val(product.description);
                $('#price').val(product.price);
                $('#rating').val(product.rating);
                $('#image').val(product.image);
                $('#category').val(product.category);
                $('#type').val(product.type);
                $('#productModal').modal('show');
            }
        });
    });

    // Guardar producto (añadir/editar)
    $('#productForm').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: './Includes/save_product.php',
            method: 'POST',
            data: $(this).serialize(),
            success: function (response) {
                location.reload();
            }
        });
    });

    // Eliminar producto
    $('.delete-product').click(function () {
        const id = $(this).data('id');
        if (confirm('¿Estás seguro de eliminar este producto?')) {
            $.ajax({
                url: './Includes/delete_product.php',
                method: 'POST',
                data: { id: id },
                success: function (response) {
                    location.reload();
                }
            });
        }
    });
});