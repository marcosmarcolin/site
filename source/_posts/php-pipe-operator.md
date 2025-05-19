---
extends: _layouts.post
section: content
title: Operador "Pipe" |> no PHP 8.5
date: 2025-05-18
description: O PHP 8.5 trará um novo operador, o Pipe Operator |>.
categories: [ php, php85, phprfc, opensource ]
---

🐘 O **PHP 8.5** trará um novo operador: o Pipe Operator `|>`.

Sim, uma antiga proposta da linguagem finalmente será implementada, **adicionando um novo operador ao PHP.**

O operador possui a seguinte sintaxe:

```php
<?php

mixed |> callable;
```

O operador |>, conhecido como **pipe**, **avalia a expressão à esquerda e a passa como argumento para a função ou
invocável à direita,** retornando o resultado da chamada.

Isso significa que os dois trechos de código abaixo são logicamente equivalentes:

```php
<?php

// Sem Pipe
echo strlen("Hello World"); // 11
// Com Pipe
echo "Hello World" |> strlen(...); // 11

// Encadeando chamadas de funções

// Sem Pipe
$input = "  Marcos Marcolin  ";
$temp = trim($input);
$temp = strtolower($temp);
$temp = ucwords($temp);
echo $temp; // Marcos Marcolin

// Com Pipe
echo "  Marcos Marcolin  "
    |> trim(...)
    |> strtolower(...)
    |> ucwords(...); // Marcos Marcolin
```

À primeira vista, pode parecer pouco útil. Mas, ao encadear várias chamadas, o operador pipe torna o código muito mais
legível e expressivo:

* O lado esquerdo do operador pode ser qualquer valor ou expressão.
* O lado direito deve ser um invocável válido do PHP (função, método ou closure) que aceite apenas um parâmetro.
* Funções que exigem mais de um argumento obrigatório não são compatíveis e gerarão erro por argumentos insuficientes.
* Se o lado direito não for avaliado como um invocável válido, um erro será lançado.

Exemplo prático com transformação de string:

```php
<?php

// Sem pipe
$temp = "Hello World";
$temp = htmlentities($temp);
$temp = str_split($temp);
$temp = array_map(strtoupper(...), $temp);
$temp = array_filter($temp, fn($v) => $v != 'O');
$result = $temp;

// Com pipe
$result = "Hello World"
    |> htmlentities(...)
    |> str_split(...)
    |> fn($x) => array_map(strtoupper(...), $x)
    |> fn($x) => array_filter($x, fn($v) => $v != 'O');
```

Exemplo com pipe em funções e objetos:

```php
<?php

function getUsers(): array {
    return [
        new User('root', isAdmin: true),
        new User('marcos.marcolin', isAdmin: false),
    ];
}
 
function isAdmin(User $user): bool {
    return $user->isAdmin;
}
 
// This is the new syntax.
$numberOfAdmins = getUsers()
    |> fn ($list) => array_filter($list, isAdmin(...)) 
    |> count(...);
 
var_dump($numberOfAdmins); // int(1);
```

Num primeiro momento, a sintaxe pode soar um pouco estranha para quem está acostumado com os operadores tradicionais.
Mas, após entender a proposta, ela se mostra uma adição elegante e poderosa à linguagem.

Você pode ler mais sobre a **RFC** na publicação oficial: [clique aqui](https://wiki.php.net/rfc/pipe-operator-v3).