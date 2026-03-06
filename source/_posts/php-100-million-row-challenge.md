---
extends: _layouts.post
section: content
title: 🌪️ O desafio das 100 milhões de linhas em PHP - Como participar
date: 2026-03-02
description: Um desafio de performance em PHP que consiste em processar 100 milhões de linhas e gerar um JSON final. Resolvi participar e explorar o problema.
categories: [ php, comunidade ]
---

**Como você processaria 100 milhões de linhas de um arquivo CSV no menor tempo possível?**

Recentemente descobri, através do LinkedIn, um desafio interessante para quem gosta de explorar performance,
eficiência e otimizações de código.

Trata-se do **100-million-row challenge in PHP**, um desafio inspirado em iniciativas semelhantes em outras linguagens,
mas adaptado para o ecossistema PHP.

🔗 O repositório oficial do desafio está disponível
em: <a href="https://github.com/tempestphp/100-million-row-challenge" target="_blank">
tempestphp/100-million-row-challenge</a>.

Resolvi participar para explorar o problema, estudar diferentes abordagens de eficiência e também contribuir com a
comunidade.

Se você gosta desse tipo de problema, fica aqui o convite para participar também e testar suas próprias ideias. Em algum
momento da carreira, todo desenvolvedor acaba precisando **ler, processar e transformar grandes volumes de dados**, e
nesses cenários cada detalhe de implementação pode fazer diferença no desempenho final.

Além disso, é um desafio que mistura **aprendizado, competição e diversão**.

## O desafio

> 💡 O desafio foi inspirado no **1 Billion Row Challenge** da comunidade Java, mas adaptado para o ecossistema PHP.

A proposta é simples: ler um arquivo com 100 milhões de linhas, processar essas informações e gerar um JSON final
com os dados agregados.

Cada linha do arquivo contém uma _URL completa_ e um _timestamp_.

A solução deve extrair o **path da URL**, agrupar os acessos **por dia** e produzir um JSON no seguinte formato:

```json
{
  "/blog/11-million-rows-in-seconds": {
    "2025-01-24": 1,
    "2026-01-24": 2
  },
  "/blog/php-enums": {
    "2024-01-24": 1
  }
}
```

Ou seja, cada página contém um mapa com a quantidade de visitas por data.

## Regras importantes

O desafio possui algumas restrições interessantes:

* A solução deve ser escrita apenas em PHP
* Não é permitido usar ferramentas externas
* O script deve funcionar apenas dentro do projeto
* Não é permitido utilizar FFI
* JIT desabilitado por padrão

Essas restrições tornam o desafio mais interessante, pois obrigam a focar em:

* eficiência de leitura de arquivo
* uso de memória
* manipulação eficiente de strings
* estruturas de dados

### Como começar

Para participar, basta fazer um fork do repositório e rodar o ambiente local.

```bash
# Instalar dependências
composer install

# Gerar dataset de desenvolvimento(1_000_000 é o padrão)
php tempest data:generate

# Gerar um dataset maior
php tempest data:generate 50_000_000
```

O benchmark real utiliza **100 milhões de linhas**.

Depois disso, basta implementar sua solução na classe:

```php
final class Parser
{
    public function parse(string $inputPath, string $outputPath): void
    {
        throw new Exception('TODO');
    }
}
```

Durante o desenvolvimento é possível executar o parser com:

```bash
php tempest data:parse
```

E validar o resultado com:

```bash
php tempest data:validate
```

Se a validação passar, sua implementação está correta.

## Rodando o desafio com Docker (opcional)

Para padronizar o ambiente e facilitar a execução do desafio, utilizei um container simples com PHP 8.5.

#### Dockerfile

```dockerfile
FROM php:8.5-cli-alpine

WORKDIR /app

RUN apk add --no-cache \
        git \
        icu-dev \
        $PHPIZE_DEPS \
    && docker-php-ext-install intl \
    && docker-php-ext-install pcntl \
    && apk del --no-network $PHPIZE_DEPS \
    && git config --global --add safe.directory /app \
    && { \
        echo "opcache.enable_cli=1"; \
        echo "opcache.jit=0"; \
        echo "opcache.jit_buffer_size=0"; \
    } > /usr/local/etc/php/conf.d/99-disable-jit.ini

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER=1
```

#### docker-compose.yml

```yaml
services:
  app:
    build: .
    working_dir: /app
    volumes:
      - ./:/app
    tty: true
```

Instalar dependências e executar comandos:

```bash
docker compose run --rm app composer install
docker compose run --rm app php tempest data:generate
docker compose run --rm app php tempest data:parse
docker compose run --rm app php tempest data:validate
```

### Enviando sua solução

A submissão é feita através de um Pull Request no repositório. O título do PR deve ser o seu _username_ do GitHub.

Após validação manual, os organizadores executam o benchmark em um servidor oficial e registram o tempo no leaderboard.

Também é possível solicitar uma nova execução comentando `/bench` no PR.

### Categorias e Ranking

O desafio possui duas categorias principais:

- **multi-process**, onde a solução pode utilizar múltiplos processos (por exemplo com `pcntl`)
- **single-thread**, onde a solução deve rodar utilizando apenas em um processo

A categoria _single-thread_ é particularmente interessante, pois permite comparar a eficiência do algoritmo sem
depender de múltiplos processos.

Durante o desafio, também contribui criando um site com o ranking para facilitar a visualização dos resultados e das
soluções
submetidas: <a href="https://marcosmarcolin.github.io/leaderboard-100-million-row-challenge/" target="_blank">PHP 100M
Row Challenge Explorer</a>.

A ideia foi tornar mais fácil acompanhar a evolução das submissões e explorar as diferentes implementações da
comunidade.

Posteriormente, esse ranking acabou sendo **referenciado diretamente no repositório oficial do desafio**.

### Premiação

Os ganhadores recebem prêmios patrocinados pela JetBrains e Tideways, incluindo ElePHPants do PhpStorm e Tideways,
licenças JetBrains All Products e acesso ao Tideways Team.

O desafio está aberto até 15 de março de 2026.

## Conclusão

Esse tipo de desafio é interessante porque envolve processar uma quantidade considerável de dados. Situações assim
exigem atenção a diversos aspectos técnicos, como eficiência de I/O, uso de memória e estratégias para lidar com
processamento em larga escala.

Resolvi participar principalmente como um exercício técnico e também para explorar diferentes abordagens para o
problema.

Durante esse processo, inclusive, acabei utilizando na prática a extensão **pcntl**, algo que eu já conhecia, mas ainda
não havia aplicado de fato em um projeto. Foi uma ótima oportunidade para experimentar esse tipo de abordagem e perceber
o quanto o uso de múltiplos processos pode ampliar as possibilidades de solução.

No final, é um desafio que exige bastante atenção aos detalhes e um bom conhecimento da linguagem, principalmente porque
cada milissegundo pode fazer diferença no resultado final.

Obrigado por ler até aqui. Nos vemos no próximo!