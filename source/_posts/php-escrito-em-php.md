---
extends: _layouts.post
section: content
title: 🧪 PHP sendo escrito em... PHP?
date: 2025-04-01
description: Não é pegadinha de 1º de abril — essa proposta é real.
categories: [ php, phpsrc opensource ]
---

Uma PoC (prova de conceito) recente no Core do PHP me chamou atenção: **a implementação de funções internas usando PHP
puro, em vez de C.**

Link da proposta (PoC): [PR 18204](https://github.com/php/php-src/pull/18204).

Um exemplo prático foi a reescrita de algumas funções `array_*()` inteiramente em PHP.

**Sim, PHP implementando partes do próprio PHP.**

O objetivo não é substituir o C — afinal, o interpretador da linguagem é escrito nele —, mas abrir espaço para que
algumas funções internas possam ser escritas diretamente em PHP, sem impacto relevante em desempenho.

Isso pode:

* Reduzir a complexidade
* Facilitar a colaboração
* Tornar o código interno mais acessível (inclusive para IDEs)
* Diminuir o custo de manutenção e a chance de bugs

Na prática, isso quebra uma barreira que existe hoje para quem quer contribuir com o Core, mas não tem tanta
familiaridade com C, sistemas ou compiladores.

Claro: ainda é uma prova de conceito e está em discussão.
