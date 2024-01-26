---
extends: _layouts.post
section: content
title: BLAKE3 no PHP 
date: 2024-01-26
description: Um Pull Request (PR) foi submetido ao projeto PHP com o intuito de adicionar suporte à função de criptografia BLAKE3.
categories: [php, phpfoundation, opensource]
---

No dia 19/01, um Pull Request (PR) foi submetido ao projeto PHP com o intuito de adicionar suporte à função de criptografia `BLAKE3`. 🐘🔑

Até então, eu não tinha conhecimento sobre essa função. No entanto, ao realizar uma pesquisa, constatei que se trata de uma função notavelmente rápida (como demonstrado na imagem), além de ser segura em comparação com o `MD5` e `SHA1`, por exemplo.

As funções de hash são frequentemente utilizadas para validar arquivos, garantir a autenticidade de mensagens, gerar chaves, entre outras aplicações. A eventual inclusão dessa funcionalidade certamente trará benefícios significativos para a linguagem.

É provável que esse PR resulte na criação de uma RFC e mais discussão.

O `PR` está no `php-src`: [#13194](https://github.com/php/php-src/pull/13194).

Também, entrou na lista de discussão do PHP, você pode acompanhar em [BLAKE3 hash](https://externals.io/message/122198).

## BLAKE3

A implementação oficial é feita em `Rust` e `C`, confira no repositório oficial [BLAKE3](https://github.com/BLAKE3-team/BLAKE3).

O Repositório acima informa o seguinte:

* Consideravelmente mais rápida que MD5, SHA-1, SHA-2, SHA-3 e BLAKE2.
* Segura, ao contrário de MD5 e SHA-1. E segura contra extensão de comprimento, ao contrário de SHA-2.
* Altamente paralelizável em qualquer número de threads e pistas SIMD, porque é uma árvore de Merkle internamente.
* Capaz de streaming verificado e atualizações incrementais, novamente devido à sua natureza de árvore de Merkle.
* Funciona como uma Função de Pseudoaleatoriedade (PRF), Código de Autenticação de Mensagem (MAC), Função Derivadora de Chave (KDF) e Função de Saída Expansível (XOF), além de ser uma hash regular.
* Um único algoritmo sem variantes, otimizado para x86-64 e também eficiente em arquiteturas menores.

