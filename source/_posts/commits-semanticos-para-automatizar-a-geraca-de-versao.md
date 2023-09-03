---
extends: _layouts.post
section: content
title: Utilize Commits Semânticos para automatizar a geração de versões em suas bibliotecas PHP 🐘🚀
date: 2023-08-28
description: Os Commits Semânticos não são apenas uma forma de manter um histórico bem organizado e documentado do seu código(embora isso seja fundamental), mas também podem desencadear várias automações essenciais.
categories: [php, conventional-commits, semantic-versioning]
---

Os Commits Semânticos não são apenas uma forma de manter um histórico bem organizado e documentado do seu código(embora isso seja fundamental), mas também podem desencadear várias automações essenciais.

Um dos benefícios, especialmente no contexto do PHP, é a geração automatizada de tags ou versões para projetos, ou bibliotecas que podem ser instalados via Composer, seguindo o padrão de Versionamento Semântico(SemVer).

Em processos de Deploy com `CI/CD`, por exemplo, é possível gerar automaticamente uma nova versão da sua biblioteca com base no commit que acionou a pipeline.

Há alguns anos, cerca de três anos, automatizei o processo de geração de versões para bibliotecas que publicávamos em um GitLab Self Hosted. Antes, as versões eram lançadas manualmente por cada desenvolvedor após um push, com comandos como `git tag -a v1.0.0 && git push origin v1.0.0`, ou similares.

Para automatizar esse processo, utilizei a biblioteca `marcocesarato/php-conventional-changelog`, a qual pode ser facilmente instalada com: `composer require marcocesarato/php-conventional-changelog --dev`.

Uma vez instalada, é necessário criar um Job na sua pipeline para que, a cada novo push na branch principal, por exemplo, uma nova versão seja gerada com base no commit semântico(como `feat, fix, test, refactor, chore`, etc.), seguindo o padrão do Versionamento Semântico.

Por exemplo, imagine que você tenha uma biblioteca na versão `1.5.0` e faça um commit com a mensagem 'feat: add user authentication to API'. A próxima versão gerada automaticamente será a `1.6.0`. Se fosse um commit fix, a versão gerada seria a `1.5.1`, e assim por diante.

![SemVer](/assets/images/blog/semantic_versioning.jpeg)

Além disso, você pode configurar scripts no arquivo `composer.json` para facilitar o uso nos jobs. Um exemplo de configuração:

```json
{
...
    "scripts": {
      "changelog": "conventional-changelog",
      "release": "conventional-changelog --commit",
    },
    ...
}
```

No job, você poderia simplesmente executar `composer release`, e a biblioteca se encarregaria do lançamento e do controle de versão. O mesmo se aplicaria se você quisesse gerar somente o changelog das alterações.

Você pode verificar o resultado na imagem deste post, trata-se apenas de um exemplo e pode ser personalizado de acordo com suas necessidades.

Essa abordagem é uma excelente prática que pode aumentar a produtividade da sua equipe.

Se você está interessado em estudar mais e implementar isso, pode saber mais sobre:

1. Commits Semânticos: https://lnkd.in/dzGeMpS8
2. Versionamento Semântico: https://lnkd.in/d5JwzRbn
3. marcocesarato/php-conventional-changelog: https://lnkd.in/dXxgnBxv

