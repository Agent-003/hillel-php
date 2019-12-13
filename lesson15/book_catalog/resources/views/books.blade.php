<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Add books</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">author</th>
                <th scope="col">annotations</th>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)

                <tr>
                    <th scope="row">{{ $book->id}}</th>
                    <td>{{ $book->title}}</td>
                    <td>{{ $book->author}}</td>
                    <td>{{ $book->annotations}}</td>
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>
