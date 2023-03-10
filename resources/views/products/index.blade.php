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
    @dump(Route::currentRouteName())
    <main>
        <div class="container">
            <div class="row">
                <div class="d-flex justify-content-end p-4 ">
                    <a class="btn btn-primary btn-lg" href="{{ route('products.create') }}" > Add new Comic</a>  
                </div>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Series</th>
                        <th scope="col">Type</th>
                        <th scope="col">Price</th>
                        <th scope="col">Date</th>
                        <th scope="col">Settings</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <th scope="row">{{ $product->id }}</th>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->series }}</td>
                            <td>{{ $product->type }}</td>
                            <td>{{ $product->price }}&euro; </td>
                            <td>{{ $product->sale_date }}</td>
                            <td>
                                <a class="btn btn-success"  href="{{ route('products.show' , $product->id) }}" >Show</a>
                                <a class="btn btn-warning"  href="{{ route('products.edit' , $product->id) }}" >Edit</a>
                                <form class="d-inline" action="{{ route('products.destroy' , $product->id) }}" method="POST" >
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" >Delete</button>

                                </form>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>

            </div>
        </div>
    </main>
</body>
</html>