---
extends: _layouts.post
section: content
title: Resumo do PHP Core Roundup 18
date: 2023-11-03
description: 🎉 A próxima versão do PHP, a 8.3, está programada para ser lançada em 23 de novembro.
categories: [php, phpfoundation, opensource, php-core-roundup]
---

Essa publicação é um resumo do **PHP Core Roundup #18**, boletim mensal oficial da **PHP Foundation**. 🐘🎉

O último mês foi de algumas excelentes melhorias para o núcleo do **PHP**, em sua maioria serão incluídas no **PHP 8.4**.

# PHP 8.3

A versão está em seus candidatos a lançamentos(_RCs_) finais, programada para ser lançada oficialmente no **dia 23 de Novembro.**

No último mês, eu pude [contribur](https://github.com/php/doc-pt_br/pull/327) com a tradução `pt_BR` de todas as alterações para essa versão, você pode conferir acessando: [Migrando do PHP 8.2.x para o PHP 8.3.x](https://www.php.net/manual/pt_BR/migration83.php).

## Lançamentos

A equipe de desenvolvimento do PHP lançou duas novas versões em outubro de 2023: **PHP 8.2.12** e **PHP 8.1.25.**

Essas versões incluem diversas correções de bugs e melhorias, principalmente em áreas como `Core`, `CLI`, `CType`, `DOM`, `Fileinfo`, `Filter`, `Hash`, `Intl`, `MySQLnd`, `Opcache`, `PCRE`, `SimpleXML`, `Streams`, `XML` e `XSL`.

## PHP 8.0 chegará ao fim de sua vida ):

A versão atingirá seu fim de vida `(EOL)` e não receberá mais atualizações de segurança após 26 de novembro de 2023.

Você pode conferir o calendário de suporte das versões [aqui](https://www.php.net/supported-versions.php).

## RFCs

Vários assuntos foram discutidos no último mês. Por isso, resolvi incluir as quem contém maior relevância em **minha opinião**, as demais você pode conferir na publicação oficial do boletim, que está no final desta publicação.

### [Increasing the default BCrypt cost](https://wiki.php.net/rfc/bcrypt_cost_2023) por Tim Düsterhus

Para o nosso bom português: **Aumentando o custo padrão do BCrypt**.

A RFC foi aprovada por unanimidade, mas na segunda votação, onde foi necessário determinar um novo valor de custo, as opiniões dividiram-se.

Esse _custo_ citado, refere-se ao fator de custo variável do `BCrypt`, que visa fornecer segurança adaptável contra aumentos no poder de processamento e, portanto, maior velocidade de _cracking_.

A mudança será aplicada na função `password_hash()`, ex:

```php
$password = 'minha_senha_super_dificil';
// Anteriormente, o valor padrão era 10
password_hash($password, \PASSWORD_BCRYPT, ['cost' => 10]);

// Agora será 12
password_hash($password, \PASSWORD_BCRYPT, ['cost' => 12]);

// O argumento final com [cost] não é obrigatório, foi inserido apenas para exemplo
```
Isso implicará em uma pequena perda de desempenho, mas ganhará em segurança.

Essa mudança foi proposta a partir de uma [discussão](https://externals.io/message/120993) iniciada pelo Vinicius Dias, do canal [Dias de Dev](https://www.youtube.com/c/DiasdeDev).

### [DOM HTML5 parsing and serialization](https://wiki.php.net/rfc/domdocument_html5_parser) por Niels Dossche

Esse RFC é muito importante, o qual adiciona suporte ao parseamento e serialização de documentos `HTML5`. Isso mesmo, a linguagem só suportava parseamento até `HTML4`.

Com isso, o `PHP 8.4` receberá novas classes a extensão `DOM`, sendo elas: `DOM\HTMLDocument` e `DOM\XMLDocument`.

A class `HTMLDocument` adicionará suporte para análise e serialização de documentos `HTML5`. A classe `XMLDocument` serve como uma alternativa moderna ao `\DOMDocument`, que é mantida para compatibilidade.

### [A new JIT implementation based on IR Framework](https://wiki.php.net/rfc/jit-ir) por Dmitry Stogov

A RFC propôs uma nova implementação `JIT`, a qual foi e será desenvolvida separadamente do Core, através de _Intermediate Representaion (IR)_.

A principal vantagem da nova abordagem é que o código-fonte PHP ficará livre dos detalhes de baixo nível da compilação `JIT`. A desvantagem é um tempo de compilação `JIT` mais longo.

Na maioria das aplicações, não deverá ter grandes mudanças de desempenho nesse momento.

Se você sabe muito de baixo nível ou apenas tenha curiosidade de saber mais sobre essa alteração, confira [essa apresentação](https://www.researchgate.net/publication/374470404_IR_JIT_Framework_a_base_for_the_next_generation_JIT_for_PHP) do autor.

### [Unbundle ext/imap, ext/pspell, ext/oci8, and ext/PDO_OCI](https://wiki.php.net/rfc/unbundle_imap_pspell_oci8) por Derick Rethans

A RFC propõe remover as extensões citadas da distribuição fonte do PHP e movê-las para PECL.

Motivo? Estão bastante desatualizadas e/ou não têm um mantenedor oficial para dar suporte.

## PRs e commits mesclados

O Core do PHP recebeu várias contribuições no último mês, você pode conferir a lista no boletim oficial.

## Apoie a Fundação PHP

A **PHP Foundation** apoia, promove e avança a linguagem PHP. Você pode ajudar a apoiar a PHP Foundation no [OpenCollective](https://opencollective.com/phpfoundation) ou por meio de [GitHub Sponsors](https://github.com/sponsors/ThePHPF).

## Boletim oficial #18

Para conferir todas as novidades do mês, [clique aqui](https://thephp.foundation/blog/2023/11/01/php-core-roundup-18/).

Obrigado por me acompanhar até aqui, te espero no próximo! 🐘🤟