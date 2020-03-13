<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mulheres na Fonte</title>
    <link rel="stylesheet" href="styles/style.css" />
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap"
        rel="stylesheet"
    />
</head>

<body>
<header>
    <img class="logo" src="assets/logo.png" alt="DOE" />
    <h2>Mulheres na Fonte</h2>
    <p>Bem vindas ao melhor lugar do mundo</p>

    {!! Form::open(['route' => 'numbers.store']) !!}
        <button type="submit">Sortear</button>
    {!! Form::close() !!}
</header>
@if($results->count() >  0)
<section class="form">
    <!-- <h2>Número sorteado:</h2> -->
    <h1>
        {{ $number->number }}
    </h1>
</section>

<main>
    <h2>Últimos <span>números</span></h2>

    <section class="donors">
        @foreach($results as $result)
        <div class="donor">
            <div class="blood">{{ $result->number }}</div>
        </div>
        @endforeach
    </section>
</main>
@endif

<footer>
    Feito com ❤️ para Conferência Mulheres na Fonte.
</footer>
</body>
</html>
