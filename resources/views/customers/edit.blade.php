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
    @if ($errors->any())
        <div class="error" style="color: red;">
            <p>
                <b>{{ count($errors) }}件のエラーがあります。</b>
            </p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('customers.update', $customer) }}" method="post">
        @csrf
        @method('PATCH')
        <label for="name">名前</label>
        <input type="text" name="name" value="{{ old('name', $customer->name) }}"><br>
        <label for="mail">メール</label>
        <input type="text" name="mail" value="{{ old('mail', $customer->mail) }}"><br>
        <label for="zipcode">郵便番号</label>
        <input type="text" name="zipcode" value="{{ old('zipcode', $customer->zipcode) }}"><br>
        <label for="address">住所</label>
        <textarea name="address">{{ old('address', $customer->address) }}</textarea><br>
        <label for="tel">電話番号</label>
        <input type="text" name="tel" value="{{ old('tel', $customer->tel) }}"><br>
        <input type="submit" value="更新"><br>
    </form>
</body>
</html>
