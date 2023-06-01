<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        @csrf
        <div class="form-group">
            <label for="c">Name</label>
            <input type="text" class="form-control" id="c" name="name">
        </div>
        <div class="form-group">
            <label for="d">Age</label>
            <input type="text" class="form-control" id="d" name="age">
        </div>
        <div class="form-group">
            <label for="c">Data</label>
            <input type="text" class="form-control" id="c" name="data">
        </div>
        <div class="form-group">
            <label for="d">Phone</label>
            <input type="text" class="form-control" id="d" name="phone">
        </div>
        <div class="form-group">
            <label for="c">web</label>
            <input type="text" class="form-control" id="c" name="web">
        </div>
        <div class="form-group">
            <label for="d">Address</label>
            <input type="text" class="form-control" id="d" name="address">
        </div>
        @include ('error')

        <button type="submit"class="btn btn-primary">Signup</button>

    </form>
   @if(isset($user))
   {{$user['name']}}
   @endif
</body>

</html>