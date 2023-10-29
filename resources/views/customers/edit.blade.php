<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>編集画面</h1>
    <form action="{{ route('customers.update', $customer) }}" method="post">
        @csrf
        @method('PATCH')
        <label for="name">名前</label>
        <input type="text" name="name" value="{{ $customer->name }}"><br>
        <label for="mail">メール</label>
        <input type="text" name="mail" value="{{ $customer->mail }}"><br>
        <label for="zipcode">郵便番号</label>
        <input type="text" name="zipcode" value="{{ $customer->zipcode }}"><br>
        <label for="address">住所</label>
        <textarea name="address">{{ $customer->address }}</textarea><br>
        <label for="tel">電話番号</label>
        <input type="text" name="tel" value="{{ $customer->tel }}"><br>
        <input type="submit" value="更新"><br>
    </form>
</body>
</html>
