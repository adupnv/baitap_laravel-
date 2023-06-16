<form method="POST" action="" method ="post" style="width:600px; margin-left: 500px;">
    @csrf
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="age">Age:</label>
        <input type="number" class="form-control" id="age" name="age" required>
    </div>
    <div class="form-group">
        <label for="date">Date:</label>
        <input type="date" class="form-control" id="date" name="date" required>
    </div>
    <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="tel" class="form-control" id="phone" name="phone" required>
    </div>
    <div class="form-group">
        <label for="web">Web:</label>
        <input type="url" class="form-control" id="web" name="web" required>
    </div>
    <div class="form-group">
        <label for="address">Address:</label>
        <input type="text" class="form-control" id="address" name="address" required>
    </div>

    <div>
       @include ('block.error')
    </div>

    <button type="submit" class="btn btn-primary" style="left: 200px;">Submit</button>

    <div class="display-infor">
      @if (isset($user))
      <p>Name: {{$user['name']}}</p>
      <p>Age: {{$user['age']}}</p>
      <p>Date: {{$user['date']}}</p>
      <p>Phone: {{$user['phone']}}</p>
      <p>Web: {{$user['web']}}</p>
      <p>Address: {{$user['address']}}</p>
      $endif
    </div>
</form>
