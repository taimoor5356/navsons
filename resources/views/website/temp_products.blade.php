<!-- resources/views/temp_products.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Temp Products</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        body { font-family: Arial; padding: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 10px; border: 1px solid #ddd; }
    </style>
</head>

<body>

<h2>Temp Products List</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody>
        @foreach($products as $product)
            <tr id="row-{{ $product->id }}">
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>
                    <input type="checkbox"
                           class="status-toggle"
                           data-id="{{ $product->id }}"
                           {{ $product->status == 1 ? 'checked' : '' }}>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<script>
$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.status-toggle').on('change', function () {

        let id = $(this).data('id');
        let status = $(this).is(':checked') ? 1 : 0;

        $.ajax({
            url: '{{ route("update.temp.product.status") }}',
            type: 'POST',
            data: {
                id: id,
                status: status
            },
            success: function (res) {
                console.log(res.message);
            },
            error: function () {
                alert('Something went wrong!');
            }
        });

    });

});
</script>

</body>
</html>