<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif

        <div class="row">
            <div class="col-md-4 offset-4 rounded bg-info mt-3 py-3">
                <h2 class="text-center fw-bold" style="font-size:20px;"> Edit Product</h2>
                <form action="{{ route('products.update', $product->id) }}" class="mt-3" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-1">
                        <label for="">Gambar Produk</label>
                        <input type="text" class="form-control" name="image" value="{{ $product->image }}"
                            placeholder="Masukan Gambar Product">
                    </div>
                    <div class="mb-1">
                        <label for="">Nama Produk</label>
                        <input type="text" class="form-control" name="name" value="{{ $product->name }}"
                            placeholder="Masukan Nama Product">
                    </div>
                    <div class="mb-1">
                        <label for="">Kondisi Produk</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="condition" id="flexRadioDefault1"
                                value="bekas" {{ $product->condition == 'bekas' ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Bekas
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="condition" id="flexRadioDefault2"
                                value="baru" {{ $product->condition == 'baru' ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Baru
                            </label>
                        </div>
                    </div>
                    <div class="mb-1">
                        <label for="">Stok Produk</label>
                        <input type="text" class="form-control" name="stock" value="{{ $product->stock }}"
                            placeholder="Masukan Stok Product">
                    </div>
                    <div class="mb-1">
                        <label for="">Harga Produk</label>
                        <input type="text" class="form-control" name="price" value="{{ $product->price }}"
                            placeholder="Masukan Harga Product">
                    </div>
                    <div class="mb-1">
                        <label for="">Berat Produk</label>
                        <input type="text" class="form-control" name="weight" value="{{ $product->weight }}"
                            placeholder="Masukan Berat Product">
                    </div>
                    <div class="mb-1">
                        <label for="">Deskripsi Produk</label>
                        <input type="text" class="form-control" name="description"
                            value="{{ $product->description }}" placeholder="Masukan Deskripsi Product">
                    </div>

                    <div class="d-flex">
                        <button class="btn btn-dark mx-auto w-100" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
