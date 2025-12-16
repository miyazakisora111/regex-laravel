<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gradient-to-br from-indigo-50 to-purple-100 flex items-center justify-center">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">
            ログイン
        </h1>

        <!-- フォーム -->
        <form method="POST" action="{{ route('login.submit') }}" class="space-y-5">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                    メールアドレス
                </label>
                <input
                    id="email"
                    name="email"
                    type="email"
                    required
                    autofocus
                    class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:border-indigo-500 focus:ring-indigo-500"
                    placeholder="example@example.com">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                    パスワード
                </label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    required
                    class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:border-indigo-500 focus:ring-indigo-500"
                    placeholder="••••••••">
            </div>

            <button
                type="submit"
                class="w-full bg-indigo-600 text-white font-semibold py-2 rounded-lg hover:bg-indigo-700 transition">
                ログイン
            </button>
        </form>

        <div class="mt-6 text-center text-sm text-gray-600">
            <a href="#" class="text-indigo-600 hover:underline">
                パスワードを忘れた方
            </a>
        </div>
    </div>

</body>

</html>