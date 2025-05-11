---
extends: _layouts.post
section: content
title: array_first() e array_last() no PHP 8.5
date: 2025-05-07
description: PHP 8.5 terá duas novas funções para arrays — array_first() e array_last(), que facilitam o acesso ao primeiro e ao último elemento.
categories: [php, php85, phprfc, opensource]
---

🐘 O **PHP 8.5** terá mais duas funções de array: `array_first()` e `array_last()`.

Finalmente, teremos funções específicas para pegar o primeiro e o último elemento de um array, sem precisar usar funções sem padrão ou que alteram o array internamente.

Essas funções complementam as já existentes `array_key_first()` e `array_key_last()`.

```php
<?php

$colors = ['red', 'green', 'blue'];

/* Antes do PHP 8.5 */

// Primeiro elemento
echo reset($colors); // red
echo $colors[array_key_first($colors)]; // red

// Último elemento
echo end($colors); // blue
echo $colors[array_key_last($colors)]; // blue

/* 🐘 Com PHP 8.5 */
echo array_first($colors); // red
echo array_last($colors); // blue
```
Você pode ler mais sobre a RFC na publicação oficial: [clique aqui](https://wiki.php.net/rfc/array_first_last).