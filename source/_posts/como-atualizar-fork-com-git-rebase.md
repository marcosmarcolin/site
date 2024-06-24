---
extends: _layouts.post
section: content
title: Como atualizar um fork com git rebase
date: 2024-06-24
description: Aprenda como manter seu fork no GitHub atualizado com o repositório original usando git rebase. Este guia passo a passo explica como sincronizar seu fork de forma eficiente.

categories: [git, github]
---

## Como atualizar um _fork_ com git rebase

### O que é um _Fork_?

Um _fork_ é uma cópia de um repositório, permitindo que você faça mudanças no código de forma independente. 
No GitHub, _forkar_ um repositório é comum para colaborar em projetos de código aberto. 
Depois de fazer alterações, você pode enviar um _pull request_ para que suas mudanças sejam revisadas e integradas ao projeto original.

### Atualizando seu _Fork_

Para manter seu _fork_ atualizado com o repositório original, você pode usar o `git rebase`. 

Aqui está um guia passo a passo para atualizar seu _fork_:

#### 1: Adicione o repositório remoto você forkou e chame-o de upstream:

```shell
git remote add upstream https://github.com/repositorio-original/aqui.git
```

#### 2: Busque todas as _branches_ do repositório remoto upstream

```shell
git fetch upstream
```

#### 3: Reescreva a sua _branch master_ com a _master_ do _upstream_ usando `git rebase`

```shell
git rebase upstream/master
```

#### 4: Envie suas atualizações para a branch master do seu _fork_. Você pode precisar forçar o envio usando --force

```shell
git push origin master --force
```

### Conclusão

Manter seu _fork_ atualizado com o repositório original é crucial para uma colaboração eficaz. 
Usar o `git rebase` garante que seu _fork_ esteja alinhado com as últimas mudanças, facilitando a integração de novas funcionalidades e minimizando conflitos.