<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="mx-lg-5 mt-lg-4 mb-lg-3 ">
        <div class="card rounded bg-success pt-3 pb-3">
            <div class="row">
                <div class="col-md-4">
                    <h1 class="fw-bold ms-3 mb-2 mt-2">List Product</h1>
                </div>
                <div class="col-md-4">
                    <h2 class="text-center fw-bold mt-2">PRODUCTS</h2>
                </div>
                <div class="col-md-4 d-flex justify-content-end">
                    <a href="{{ route('products.create') }}" class="btn btn-md btn-dark me-3 fw-bold  h-75">Tambah
                        Produk</a>
                    <a href="{{ route('products.index') }}" class="btn btn-md btn-dark fw-bold me-3 h-75">Kembali ke
                        Produk</a>
                </div>
            </div>


            <!-- Tabel -->
            <div class="mt-4 mx-4">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Berat</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Kondisi</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>{{ $product->weight }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->condition }}</td>
                                <td>
                                    <a href="{{ route('products.edit', $product->id) }}"
                                        class="btn btn-primary btn-sm">Update</a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
