<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comic back-office</title>
    @vite('resources/js/app.js')
</head>
<body>
    <main>
        <section class="container">
            <div class="row">
                <div class="col">
                    <form class="mt-4" action="{{ route('products.store') }}" method="POST" >
                        @csrf
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>
                                    {{ $error }}
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="mb-3">
                          <label for="" class="form-label">Title</label>
                          <input type="text" name="title" class="form-control" id="" >
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">description</label>
                           <textarea name="description" id="" class="form-control"></textarea>
                          </div>
                        <div class="mb-3">
                          <label for="" class="form-label">Link thumb img </label>
                          <input type="text"  name="thumb" class="form-control" id="">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Price </label>
                            <input type="text" name="price" class="form-control" id="">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Series </label>
                            <input type="text" name="series" class="form-control" id="">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Sale data</label>
                            <input type="date" name="sale_date"  class="form-control" id="">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Type </label>
                            <input type="text" name="type"  class="form-control" id="">
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-success">Save Comic</button>
                        </div>
                    </form> 
                </div>
            </div>
        </section>
    </main>
</body>