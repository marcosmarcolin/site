---
extends: _layouts.post
section: content
title: 🐘 PHP 30 Anos - Entrevista com Derick Rethans
date: 2025-11-17
description: Entrevista da série PHP 30 Anos com Derick Rethans.
categories: [ php, comunidade, php30anos ]
---

> 🇺🇸 **Esta entrevista também está disponível
em [Inglês](https://www.marcosmarcolin.com.br/blog/php-30-years-derick-rethans-en/).**

Esta entrevista faz parte da série **PHP 30 Anos – Entrevista com Contribuidores**, criada para celebrar as três décadas
da linguagem e destacar as pessoas que ajudaram e continuam ajudando a moldar o ecossistema do PHP.

**Derick Rethans** é um dos grandes nomes da história do PHP. Criador e mantenedor do [Xdebug](https://xdebug.org/), contribuidor
ativo do core, membro da [PHP Foundation](https://thephp.foundation/) e envolvido em várias mudanças que marcaram a evolução da linguagem.

A seguir, você confere a entrevista completa.

---

### Como começou a sua jornada com PHP e o que te motivou a continuar contribuindo ativamente com a linguagem?

Conheci o PHP quando estava na universidade e queríamos criar um site que usasse um banco de dados para armazenar
informações. As opções naquela época, por volta do ano 2000, eram bem limitadas. Existia o ASP (Classic), que custava
dinheiro e quase ninguém hospedava, e existia o PHP, algo que podíamos usar de graça e até hospedar nós mesmos.

Naqueles tempos, tudo usava MySQL. E uma das funcionalidades que o MySQL ainda não tinha eram subqueries, algo como
`SELECT * FROM tabela WHERE valor IN (SELECT...)`. Então, de forma bem ingênua, implementei isso como um recurso na
extensão do MySQL para PHP. Para mim, aquilo foi principalmente um exercício de como usar C com a API de extensões do
PHP, e esse código (felizmente) nunca entrou na distribuição oficial do PHP.

A primeira contribuição real que foi aceita foi uma reformulação da antiga extensão MCrypt. Naquele momento, ela havia
mudado a forma como sua interface em C funcionava, e isso exigia muito trabalho do lado do PHP.

---

### Qual é o seu papel atualmente, e que tipo de trabalho você faz no dia a dia?

Atualmente, sou uma das onze pessoas contratadas pela PHP Foundation para trabalhar no projeto PHP. A maior parte do meu
tempo hoje é dedicada à manutenção da infraestrutura de servidores, mas recentemente também trabalhei em melhorias na
extensão Date/Time, criei o PIE, o novo PECL e várias outras pequenas contribuições.

Além do PHP, sou o criador e único mantenedor do Xdebug, a ferramenta de depuração do PHP. A cada nova versão do PHP, o
Xdebug exige ainda mais trabalho, e há sempre uma fila contínua de novos recursos para implementar.

Além disso, eu também opero o [Xdebug Cloud](https://xdebug.cloud/), uma solução de depuração remota pensada para equipes distribuídas que
precisam compartilhar uma máquina de desenvolvimento PHP.

---

### Qual foi o maior desafio ou o momento mais marcante da sua trajetória dentro do ecossistema PHP?

Por meio do meu trabalho open source no core do PHP e no Xdebug, consegui oportunidades em diversas empresas.

Acabei me mudando para a Noruega para trabalhar na eZ Systems e, depois que saí de lá, passei a atuar como contratado
para desenvolver extensões em PHP. Um desses contratos foi com a MongoDB, que acabou se tornando um emprego formal.
Agora que já deixei essa empresa também, continuo trabalhando com PHP pela Foundation, em contratos e, claro, no Xdebug.
O PHP é o fio condutor de toda a minha carreira.

---

### O que você considera essencial para ter chegado à posição que ocupa hoje dentro do ecossistema PHP (seja no core, na Foundation ou na comunidade)?

As contribuições que fiz para a linguagem e a criação do Xdebug foram essenciais para eu chegar onde estou no
ecossistema PHP.

---

### Que tipo de impacto você acredita exercer hoje no ecossistema ou na comunidade PHP?

Acredito que, com a existência da PHP Foundation, temos confiança de que o PHP continuará evoluindo pelos próximos 30
anos. Fico muito feliz por fazer parte dessa história tão longa.

---

## Sobre o PHP e a PHP Foundation

### Na sua opinião, quais foram os avanços mais significativos do PHP nos últimos anos?

Acho que a melhor coisa que aconteceu foi a possibilidade de tipar o código de forma geral. Isso tornou possível
escrever código mais completo e profissional, além de facilitar bastante o entendimento. E, ao mesmo tempo, o PHP não
perdeu suas raízes de linguagem “hacky”, permitindo que pequenas soluções rápidas continuem sendo divertidas de
escrever.

---

### Na sua visão, quais são os maiores desafios hoje para novos contribuidores se envolverem com o core do PHP?

O PHP, como qualquer linguagem, é complexo. Leva muito tempo até entender tudo o que está acontecendo. Com a PHP
Foundation, estamos trabalhando para melhorar a documentação, mas hoje grande parte da documentação ainda é “o próprio
código-fonte”.

---

### Como você enxerga o papel da PHP Foundation no futuro da linguagem?

Acho muito importante ter a Foundation como estrutura de apoio. Gostaria de vê-la evoluir para também assumir a
governança do projeto de uma forma mais profissional. Hoje, não existe algo realmente definido nesse sentido, e alguns
processos ainda acontecem de maneira improvisada, dependendo da situação.

---

### O PHP ainda carrega a fama de ser uma linguagem “velha” ou “ruim” em alguns círculos. Como você vê essa imagem atualmente?

Eu simplesmente ignoro isso. Não é uma forma útil de definir o que o PHP é. O importante é mostrar o que a linguagem PHP
é hoje.

---

### Para encerrar: qual mudança ou recurso você gostaria de ver no PHP nos próximos anos?

Não é Generics.

---

## Off-topic

### Quais fontes você acompanha para se manter atualizado sobre PHP e desenvolvimento de software?

Leio a lista de e-mails do internals, participo do Slack da PHP Foundation, do Discord [phpc.chat](https://phpc.chat/) e também frequento
grupos de usuários (locais e de outros lugares), além de conversar com as pessoas em conferências.

---

### Você gostaria de deixar uma mensagem para a comunidade PHP do Brasil?

Aproveitei muito meu tempo palestrando em São Paulo em 2006. Preciso encontrar uma desculpa para visitar novamente!

---

Acompanhe o **Derick** e conheça seus projetos:

* [GitHub](https://github.com/derickr)
* [LinkedIn](https://www.linkedin.com/in/derickrethans)
* [Xdebug](https://xdebug.org/)
* [Site](https://derickrethans.nl/)