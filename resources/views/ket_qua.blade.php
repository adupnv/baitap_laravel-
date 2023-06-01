<html>

<head>
    <title>Calculator</title>
</head>

<body>
    <h1>Calculator</h1>
    <form method="POST" action="">
        @csrf
        <label for="firstNumber">First number:</label>
        <input type="number" name="firstNumber" id="firstNumber"><br><br>
        <label for="operator">Operator:</label>
        <select name="operator" id="operator">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select><br><br>
        <label for="secondNumber">Second number:</label>
        <input type="number" name="secondNumber" id="secondNumber"><br><br>
        <button type="submit">Calculate</button>
    </form>
    @if(isset($result))
    <h2>Kết quả là: {{ $result }}</h2>
    @endif
</body>

</html>