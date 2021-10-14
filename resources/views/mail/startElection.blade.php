<body>
    <h1>Hello {{ $voter['voter_nm'] }}</h1>
    <p>Please click the link provided below and use the credentials to begin voting.</p>
    <p><span class="font-bold">Unique Id:</span>{{ ' ' . $voter['unique_id'] }}</p>
    <p><span class="font-bold">Unique Key:</span>{{ ' ' . $voter['unique_key'] }}</p>
    <p>{{ config('app.url') . '/dashboard/election/show/' . $voter['election_id'] }}</p>
</body>
