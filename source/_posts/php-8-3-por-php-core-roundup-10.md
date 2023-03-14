---
extends: _layouts.post
section: content
title: PHP Core Roundup 10
date: 2023-03-06
description: Em fevereiro, o trabalho continuou acontecendo com diversos RFCs sendo discutidos, melhorias, lançamentos de segurança para versões anteriores, etc
categories: [php, phpfoundation, opensource, php-core-roundup]
---

Em fevereiro, o trabalho continuou acontecendo com diversos RFCs sendo discutidos, melhorias, lançamentos de segurança para versões anteriores, etc. Abaixo, destaquei alguns tópicos:

* Se você quer se envolver com o PHP e já tem um conhecimento do Core, pode se candidatar a ser um Release Manager para a versão 8.3 até o dia 31 deste mês.

* PHP 8.2.3, 8.1.16 e 8.0.28 foram lançados em 14 de fevereiro, contendo correções para três vulnerabilidades de segurança com várias correções de bugs.

* O PHP 7.4 atingiu seu fim de vida e não haverá lançamentos de correções de segurança.

## RFCs

Em votação:

* Saner array_(sum|product)() por George Peter Banyard
* Typed class constants por Benas Seliuginas e Máté Kocsi

Parcialmente aceito:

* Readonly amendments por Nicolas Grekas e Máté Kocsis

Implementado

* More Appropriate Date/Time Exceptions por Derick Rethans

Lista de discussão

Foram discutidos diversos assunto, dentre eles:

* Criação de parâmetro na função json_validate() para validar o schema JSON.

* Tipagem de variável em linha, ex:

```php
<?php

int $number = 10;
$value = 'foo'; // TypeError
```

Particularmente, isso me agrada muito, ao tornar a tipagem de dados mais segura e menos propensa a inconsistências.

Para conferir todas as novidades do mês, [clique aqui](https://thephp.foundation/blog/2023/03/01/php-core-roundup-10/).

* * *

Este mês, em especial, tive dois humildes PRs aceitos no Core(estão listados na publicação oficial). Estou me envolvendo aos poucos e em meu tempo livre, o qual não é muito.

É um sentimento de gratidão que tenho, de poder retribuir um pouco ao #PHP e a comunidade da linguagem às conquistas que venho tendo, utilizando ela como minha ferramenta principal. Além, claro, de estar aprendendo algo novo. 🙂


