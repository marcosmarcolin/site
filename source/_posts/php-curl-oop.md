---
extends: _layouts.post
section: content
title: Curl API OOP no PHP 8.4
date: 2024-02-24
description: O PHP *vai receber* uma API POO para a extensão cURL na versão 8.4.0.
categories: [php, phprfc, opensource]
---

## API Orientada à Objetos para a extensão cURL

O PHP *vai receber* uma `API POO` para a extensão cURL na versão `8.4.0`.

É o que propõe a RFC: _Add OOP methods to Curl objects_.

A proposta faz parte do pacote de conversão de `Resources` para `Objects` no PHP, que vem sendo implementada há algum tempo.

A proposta apresenta implementação orientada a objetos à extensão `cURL`, utilizada para fazer requisições web em diversos protocolos, como `HTTP` e `HTTPS`.

De maneira resumida, serão criados aliases para diversas funções `curl_*`, como `curl_init(), curl_exec(), curl_setopt()`, etc. Isso também irá abranger `multi_curl_*()` e `curl_share_*()`.

No momento, está em processo de discussão, o que provavelmente será aprovado quando entrar para votação.

Pessoalmente, será uma excelente adição para a contínua modernização da linguagem.

A seguir, apresentam-se algumas seções das propostas de API.

## CurlHandle

```php
/**
 * @strict-properties
 * @not-serializable
 */
final class CurlHandle
{
        /**
         * Behaves similarly to `curl_init(?string $uri = null): \CurlHandle`,
         * however this constructor implicitly sets CURLOPT_RETURNTRANSFER == true.
         */
	public function __construct(?string $uri = null) {}

	/** @alias curl_errno */
	public function errno(): int {}

	/** @alias curl_error */
	public function error(): string {}

	/** @alias curl_strerror */
	static public function strerror(int $code): string {}

	/** @alias curl_escape */
	public function escape(string $str): string {}

	/** @alias curl_unescape */
	public function unescape(string $str): string {}

	/**
         * @throws CurlHandleException
         *
         * Similar to `curl_exec(\CurlHandle $ch): string|bool`,
         * but never returns False, since errors are promoted to exceptions.
         */
	public function exec(): string|true {}

	/** @alias curl_pause */
	public function pause(int $flags): int {}

	/** @alias curl_reset */
	public function reset(): void {}

	/** @alias curl_getinfo */
	public function getInfo(?int $option = null): mixed {}

#if LIBCURL_VERSION_NUM >= 0x073E00 /* Available since 7.62.0 */
	/** @alias curl_upkeep */
	public function upkeep(): bool {}
#endif

	/**
	 * Varies from curl_setopt() to allow fluent chaining.
	 * @throws CurlHandleException
	 */
	public function setOpt(int $option, mixed $value): \CurlHandle {}

	/**
	 * Returns self to match setOpt() behavior.
	 * @throws CurlHandleException
	 */
	public function setOptArray(array $option): \CurlHandle {}
}
```

## CurlMultiHandle

```php 
/**
 * @strict-properties
 * @not-serializable
 */
final class CurlMultiHandle
{
	/**
	 * Returns self for fluent calling.
	 * @throws CurlException.
	 */
	public function addHandle(\CurlHandle $handle): \CurlMultiHandle {}

	/**
	 * Returns self for fluent calling.
	 * @throws CurlException.
	 */
	public function removeHandle(\CurlHandle $handle): \CurlMultiHandle {}

	/**
	 * Returns self for fluent calling.
	 * @throws CurlException.
	 */
	public function setOpt(int $option, mixed $value): \CurlMultiHandle {}

	/** @alias curl_multi_errno */
	public function errno(): int {}

	/** @alias curl_multi_error */
	public function error(): ?string {}

	/** @alias curl_multi_strerror */
	public function strerror(int $error_code): ?string {}

	/**
	 * Returns TRUE if still running, FALSE otherwise.
	 * @param int $still_running
	 * @throws CurlException.
	 */
	public function exec(&$still_running): bool {}

	/** @alias curl_multi_getcontent */
	static public function getContent(\CurlHandle $handle): ?string {}

	/**
	 * @alias curl_multi_info_read
	 * @param int $queued_messages
	 * @return array<string, int|object>|false
	 * @refcount 1
	 */
	public function infoRead(&$queued_messages = null): array|false {}

	/** @alias curl_multi_select */
	public function select(float $timeout = 1.0): int {}
}
```

## CurlMultiHandle

```php
/**
 * @strict-properties
 * @not-serializable
 */
final class CurlShareHandle
{
	/** @alias curl_share_errno */
	public function errno(): int {}

	/** @alias curl_share_error */
	public function error(): ?string {}

	/** @alias curl_share_strerror */
	static public function strerror(): ?string {}

	/**
	 * Returns self for fluent calling.
	 * @throws CurlException.
	 */
	public function setOpt(int $option, mixed $value): \CurlShareHandle {}
}
```

Você pode ler mais sobre a proposta na publicação oficial: [clique aqui](https://wiki.php.net/rfc/curl-oop).