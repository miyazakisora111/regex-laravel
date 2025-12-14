<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="w-full max-w-md bg-white p-8 rounded shadow">
        <h1 class="text-2xl font-bold mb-6 text-center">ログイン</h1>

        {{-- エラー表示 --}}
        @if ($errors->any())
        <div class="mb-4 text-red-600">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ url('web/user/login') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="email" class="block mb-1">メールアドレス</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                    class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-6">
                <label for="password" class="block mb-1">パスワード</label>
                <input type="password" id="password" name="password"
                    class="w-full border rounded px-3 py-2" required>
            </div>

            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                ログイン
            </button>
        </form>
    </div>

</body>

</html>