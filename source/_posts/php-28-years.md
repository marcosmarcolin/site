---
extends: _layouts.post
section: content
title: O PHP completa 28 anos + PHP Core Roundup 13
date: 2023-06-09
description: O PHP completa 28 anos hoje! 🐘🎉 Para comemorar, vou trazer um resumo dos últimos 2 meses no Core da linguagem.
categories: [php, phpfoundation, opensource, php-core-roundup, php-birthday]
---

![PHP Birthday](/assets/images/blog/php-birthday.jpeg)

O PHP completa 28 anos hoje! 🐘 🎉

Para comemorar, vou trazer um resumo dos últimos 2 meses no Core da linguagem.

## Lançamentos

A equipe de desenvolvimento do PHP lançou duas novas versões em maio de 2023.

A versão 8.2.6 inclui várias correções de bugs e melhorias, principalmente em áreas como `Core, Date, DOM, Exif, Intl, PCRE, Reflection, SPL, Standard` e `Streams`.

Em outra versão, a 8.1.19 inclui correções de bugs em vários componentes, como `Core, DOM, Exif, Intl, PCRE` e `Standard`.

## RFCs

Houve muitos debates nas discussões da lista de Internals do PHP, isso é excelente para a linguagem, o que traz diversas melhorias! Abaixo vou citar algumas de destaque.

* PHP Technical Committee

Essa foi a mais discutida nos últimos 2 meses, a qual o objetivo era criar um comitê técnico para tomar decisões sobre aspectos técnicos e ter uma referência para novos desenvolvimentos.

Isso tem muitos prós, como qualidade no desenvolvimento e padronização, mas também iria aumentar a 'burocracia' para novas contribuições, o PHP sempre funcionou muito bem sem isso, por isso a comunidade não aceitou.

Status: recusada.

* Interface Properties

Essa discussão sugere a definição de propriedades em Interfaces, hoje é possível definir apenas métodos que devem ser implementados obrigatoriamente, eu particularmente sou a favor desta melhoria.

Status: em discussão.

* Deprecations for PHP 8.3

Alguns contribuidores iniciaram um RFC com algumas depreciações para a versão 8.3 e removê-las na 9.0, sendo as principais:

1. As constantes `MT_RAND_PHP` e `NumberFormatter::TYPE_CURRENCY`.
2. Constantes relacionadas desnecessárias a função `crypt()`, como `CRYPT_BLOWFISH, CRYPT_MD5` e `CRYPT_SHA256`.
3. Valores negativos passados a função `mb_strimwidth()`.

Status: em discussão.

* Nameof Operator

A proposta é adicionar a função `nameof()`, que retornaria o nome de uma variável, classe, função ou método como uma string. A utilidade será mais para depuração e criação de mensagens de erros mais informativas.

Status: em discussão.

* `mb_str_pad()`

Propõe a adição da função `multibyte string pad` à extensão `mbstring`. Essa função funcionaria de maneira semelhante à `str_pad()`, função existente, mas com suporte para strings multibyte.

Status: em votação.

### Outras contribuições

Foram feitas diversas contribuções e outras RFCs discutidas, eu trouxe apenas um pequeno resumo do PHP Core Roundup #13.

----

### Suporte à Fundação PHP

A PHP Foundation apoia, promove e desenvolve a linguagem PHP. Seja um apoiador você também, ela está na OpenCollective e também no GitHub.

Para conferir todas as novidades, [clique aqui](https://thephp.foundation/blog/2023/06/06/php-core-roundup-13/).