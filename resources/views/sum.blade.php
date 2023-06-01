<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sum A AND B</title>
</head>
<body>
    <form method="post">
        @csrf
        <div class="form-group">
            <input type="number" class="form-control" placeholder="Số a" name="soA">

        </div>
        <div class="form-group">
            <input type="number" class="form-control" placeholder="Số b" name="soB">

        </div>
        <button type="submit" class="btn btn-primary">Tính</button>
        <div class="form-group">
            <input type="number" class="form-control" placeholder="kết quả" disabled="" value="<?php if(isset($sum)) echo $sum;?>">
        </div>

    </form>
</body>
</html>