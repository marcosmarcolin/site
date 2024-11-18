---
extends: _layouts.post
section: content
title: Automatize tarefas no banco de dados com Events
date: 2024-11-18
description: Você sabia que não precisa depender de cron jobs ou ferramentas externas para executar tarefas automáticas no seu sistema?
categories: [database, mariadb, mysql]
---

## Automatize tarefas no banco de dados com Events

Você sabia que **não precisa depender de cron jobs** ou ferramentas externas para executar tarefas automáticas no seu sistema? 
No MariaDB e no MySQL, por exemplo, você pode usar os Events, uma funcionalidade que permite agendar e executar tarefas diretamente no banco de dados de forma simples e eficiente.

### O que são Events?

Events são como cron jobs, mas **gerenciados pelo próprio banco**. Com eles, você pode automatizar tarefas recorrentes, como:

* Limpeza de registros antigos.
* Atualização periódica de tabelas.
* Manutenção do banco, sem precisar de scripts externos.

### Vantagens de usar Events

* **Sem dependência de cron:** tudo acontece dentro do banco, sem a necessidade de scripts externos.
* **Gerenciamento centralizado:** todas as tarefas estão no mesmo lugar que seus dados.
* **Agendamento flexível:** execute tarefas de tempos em tempos, em horários específicos, ou apenas uma vez.

### Exemplos de criação para MariaDB/MySQL

1. Imagine que você queira limpar registros antigos de uma tabela chamada logs automaticamente todos os dias:

```mariadb
CREATE EVENT clean_logs
ON SCHEDULE EVERY 1 DAY
DO
  DELETE FROM logs WHERE created_at < NOW() - INTERVAL 30 DAY;
```

2. Faça otimização e atualização de análise de tabelas mensalmente:

```mariadb
CREATE EVENT clean_logs
ON SCHEDULE EVERY 1 DAY
DO
  DELETE FROM logs WHERE created_at < NOW() - INTERVAL 30 DAY;
```

3. Imagine que você tem uma tabela chamada invoices com registros de faturas. Você pode criar um evento para atualizar o status das faturas vencidas:

```mariadb
CREATE EVENT update_overdue_invoices
ON SCHEDULE EVERY 1 DAY
DO
  UPDATE invoices
  SET status = 'overdue'
  WHERE due_date < NOW() AND status != 'paid';
```

### 🎲 Bancos de Dados que oferecem Events nativamente

✅ **MariaDB:** suporte completo com CREATE EVENT, permitindo automação de tarefas diretamente no banco.

✅ **MySQL:** semelhante ao MariaDB.

❎ **PostgreSQL:** não possui suporte nativo a Events, mas você pode usar a extensão pg_cron para agendamento de tarefas.

❎ **MongoDB:** não possui suporte nativo a eventos agendados, necessitando de ferramentas externas.

### Documentação

[MariaDB Events Overview](https://mariadb.com/kb/en/events/?utm_source=blog&utm_medium=post&utm_campaign=marcosmarcolin&utm_id=2024&utm_term=events)

[MySQL Event Scheduler Overview](https://dev.mysql.com/doc/refman/8.4/en/events-overview.html?utm_source=blog&utm_medium=post&utm_campaign=marcosmarcolin&utm_id=2024&utm_term=events)

[pg_cron - Run periodic jobs in PostgreSQL](https://github.com/citusdata/pg_cron?utm_source=blog&utm_medium=post&utm_campaign=marcosmarcolin&utm_id=2024&utm_term=events)

Obrigado por chegar até aqui e até a próxima!