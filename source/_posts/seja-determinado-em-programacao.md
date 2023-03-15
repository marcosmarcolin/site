---
extends: _layouts.post
section: content
title: Seja determinado para resolver problemas desafiadores em Programação
date: 2022-11-28
description: Um caso real sobre otimização para geração de cobertura de código em PHP
categories: [php, c, extensoes, phpsrc]
---

O presente artigo tem a intenção de compartilhar uma experiência que tive recentemente, com o intuito de demonstrar que muitas vezes a persistência e a comunicação são por vezes, mas importante que o próprio conhecimento técnico.

## Contexto

Estava com um impedimento em uma tarefa que não era de minha alçada, talvez nem tinha definição para quem seria, mas eu sabia que era necessária para escalar uma aplicação. Sendo um bom curioso, me envolvi a fim de aumentar meu conhecimento e aprender algo novo, pois gosto de problemas desafiadores.

Esse _‘problema’_ já vinha de alguns anos na empresa em que atuo e algumas pessoas até tentaram a resolução e não conseguiram, acredito que até não tentaram o suficiente para isso, pois são pessoas com mais experiências e capacidade lógica. Porém, mesmo eu tendo muitos defeitos em programação e mais ainda na vida social, tenho uma qualidade forte: persistência. Caso percebo que um colega está com alguma dificuldade ou melhor ainda: apresente-me um problema que consiga me envolver e irei até o fim.

## Problema

O desafio em si era prestar manutenção em uma extensão legada escrita na Linguagem C(relacionada à segurança), que conecta-se ao _core_ do **PHP** para executar uma determinada ação. A questão central era atualiza-lá para ser compatível com as ‘novas’ versões do PHP, à exemplo das versões 7.4 e 8.0. Hoje ela é funcional até a versão 7.3 e tinha incompatibilidades com [OPcache](https://www.php.net/manual/pt_BR/book.opcache.php).


Antes de prosseguir, preciso lhe contar que não tenho conhecimento do _Core_ da linguagem, não sou programador C, mas tenho uma ótima base de programação, consigo interpretar um código indiferente da linguagem, identificar seu funcionamento mesmo que não 100% e também sei em partes como o PHP funciona, ou melhor, como é o ciclo de vida de um script, entre outras pequenas coisas.

Partindo disso, comecei a pesquisar e estudar como funciona a criação, execução e compilação de uma extensão. Em alguns dias já sabia em partes como funcionava, já tinha escrito alguns exemplos e compilado algumas extensões, e isso tudo consumiu algumas boas noites de estudos.

Aproximadamente 2 semanas depois, já tinha chegado à uma solução alternativa, apresentei a diretoria da empresa e resolvi o problema. Porém e ainda bem, posteriormente a mesma não foi aprovada em testes de segurança, mas recebi total apoio(contarei em outro artigo).

## Solução

No tópico anterior, citei que a minha solução alternativa não foi aprovada, mas como um bom persistente não me dei por vencido e retornei a rotina de estudos.

As noites em que estava por casa dedicava-se a resolução do problema, mas não era tão fácil, não era minha área. A cada passo dado era uma felicidade indescritível pois sonhei várias noites com uma solução, tentava encaixar e não rolava de nenhum jeito, até que conseguia avançar.

Isso me fez lembrar de uma frase que ouvi de um atual Diretor da Empresa(o qual era gerente de Desenvolvimento na época), em um feedback ele me disse:

> Você não precisa saber de tudo, as vezes só precisa conhecer quem saiba

Não foram exatamente essas palavras, mas próximo disso e nunca esqueci. Essa pessoa é o [Luciano Vaz](https://br.linkedin.com/in/vazcaino).

**Então pensei: vou recorrer a comunidade PHP, porque não?!** Sei a importância dela e quanto ela é ativa, porém não conheço ninguém no Brasil que trabalhe com isso: extensões para PHP em C. Acredito que tenha algumas, mas não tenho networking para isso até o momento.

Com isso, fui atrás de algumas pessoas envolvidas com o projeto(extensão) e mandei um simples email, mas direto. Algumas não me responderam, porém um cara me respondeu, sendo Johannes Schlüter.

![Resposta do Johannes](/assets/images/blog/seja-determinado-johannes.png)

Não sou fluente em inglês, então traduzi pelo Google a mensagem e enviei. O mesmo retornou no dia seguinte informando que não estava mais envolvido com PHP e indicou a falar com Derick Rethans. Quem é ele? U**m grande contribuidor do core da linguagem e mais conhecido pelo Xdebug, o qual admiro muito.**

Então lá vou novamente, imaginando que nem responderia…mudei algumas linhas da mensagem e encaminhei pra ele. Pimba! Respondeu no dia seguinte(ou talvez no mesmo dia por causa do fuso horário), veja abaixo:

![Resposta do Derick](/assets/images/blog/seja-determinado-derick.png)

**O mesmo respondeu citando cada tópico do email,** sugerindo para verificar um solução parecida no GitHub, informou que compilou/testou a extensão nas versão 5, 7 e 7.3(tendo problemas), identificou _memory leak_(vazamento de memória) que poderiam ser corrigidos e também quanto tempo levaria para corrigir.

Já fiquei incrivelmente animado pelo retorno, então comecei a ‘juntar’ as coisas: a solução que ele indicou, o que tínhamos aqui feito por outras pessoas e o que fiz neste tempo.

```C
// Definição da versão do ZEND_ENGINE
#if ZEND_MODULE_API_NO >= 20151012 && ZEND_MODULE_API_NO < 20200930
#define PHP_ZEND_ENGINE_7_0
#endif

#if ZEND_MODULE_API_NO >= 20200930
#define PHP_ZEND_ENGINE_8_0
#endif
```

```C
// Validação com a versão do ZEND_ENGINE definida anteriormente
#ifdef PHP_ZEND_ENGINE_7_0
	value = zend_compile_string(&ctt, name TSRMLS_CC);
#endif

#ifdef PHP_ZEND_ENGINE_8_0
	value = zend_compile_string(Z_STR(ctt), name);
#endif
```

**Pronto, algumas noites depois e ajustes em C, já tinha a solução funcionando perfeitamente no PHP 7.4 e 8.0, foram questões de compatibilidade de versão(não somente isso), pois cada release da linguagem, a engine passar por mudanças.** Daí em diante foi só alegria, a satisfação por ter conseguido me deixou orgulhoso, confiante, pois foram diversas noites envolvido, pensando, quebrando a cabeça, muitas vezes dando murro em ponta de faca por não ter o conhecimento necessário, me sentido pífio de vez em quando, mas estava sempre ali, persistindo.

## Conclusões

Quando apresentei aos meus empregadores a solução, quase não acreditaram, percebi feições de surpresa, não duvidando da minha capacidade(sinto que confiam em mim), mas por conseguir a solução que precisávamos.

A lição que gostaria de repassar é que para conseguir resolver algum problema desafiador, seja persistente, tenha iniciativa, indiferente do tamanho e da entrega, corra atrás, converse com colegas, tire dúvidas, mas não abandone o barco, mesmo que não tenha o conhecimento necessário.

Neste tempo que estive pesquisando e insistindo, aprendi coisas que jamais imaginei que aprenderia e que com certeza acrescentaram na minha carreira.

Para você, leitor, pode parecer besteira, ou poderia ser até fácil resolver. Mas para mim foi umas das melhores sensações que tive até hoje na área, a de dever cumprido por saber que entreguei um bom valor para nossa equipe.

**Viva a comunidade, viva a linguagem PHP, viva o open-source!**

Obrigado por sua atenção e até o próximo relato!
