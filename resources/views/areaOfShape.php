<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>
        <center>Area Of Shape</center>
        <div class="container flex">
            <div style="width:40%">
                <h2>
                    <center>
                        Area of Triagle
                    </center>
                </h2>
                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="a">Enter value of A</label>
                        <input type="text" class="form-control" id="a" name="a">
                    </div>
                    <div class="form-group">
                        <label for="b">Enter value of B</label>
                        <input type="text" class="form-control" id="b" name="b">
                    </div>
                </form>
                <h2>the result:{{$areaTriangle}}</h2>
            </div>
            <div style="width:40%">
                <h2>
                    <center>
                        Area of Quadtangle
                    </center>
                </h2>

                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="c">Enter value of an edge</label>
                        <input type="text" class="form-control" id="c" name="e1">
                    </div>
                    <div class="form-group">
                        <label for="d">Enter value of an edge</label>
                        <input type="text" class="form-control" id="d" name="e2">
                    </div>
                    <div class="form-group">
                        <label for="e">Enter value of an edge</label>
                        <input type="text" class="form-control" id="e" name="e3">
                    </div>
                    <div class="form-group">
                        <label for="f">Enter value of an edge</label>
                        <input type="text" class="form-control" id="f" name="e4">
                    </div>
                    <button type="submit"class="btn btn-primary">Submit</button>
                </form>
                <h2> The result:{{$areaQuadrangle}}</h2>
            </div>
        </div>
        </div>
    </h2>
</body>

</html>