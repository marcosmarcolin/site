---
extends: _layouts.post
section: content
title: 🐘 PHP 30 Years – Interview with Derick Rethans
date: 2025-11-17
description: Interview from the PHP 30 Years series with Derick Rethans.
list_in_blog: false
categories: [ php, comunidade, php30anos ]
---

> 🇧🇷 **This interview is also available
in [Portuguese](https://www.marcosmarcolin.com.br/blog/php-30-anos-derick-rethans-pt-br/).**

This interview is part of the **PHP 30 Years – Contributor Interview** series, created to celebrate three decades of the
language and highlight the people who helped and continue to help shape the PHP ecosystem.

Derick Rethans is one of the most influential names in the history of PHP. He is the creator and maintainer of [Xdebug](https://xdebug.org/),
an active core contributor, a member of the [PHP Foundation](https://thephp.foundation/), and has been involved in several key changes that shaped the
evolution of the language.

Below is the full interview.

---

### How did your journey with PHP begin, and what motivated you to keep contributing actively to the language?

I learned about PHP when I was in university, and we wanted to make a website that used a database to store some
information. The options around the year 2000 were quite limited. There was ASP (Classic), which cost money and was
rarely hosted, and there was PHP — something we could use for free and even self-host.

Back then, everything used MySQL. And one of the features MySQL did not yet have was subqueries, something like
`SELECT * FROM table WHERE value IN (SELECT...)`. So, quite naïvely, I implemented this as a feature in the MySQL
extension for PHP. For me, this was mostly an exercise in using C with the PHP extension API, and that code (
fortunately) never made it into the official PHP distribution.

My first actual contribution that landed was an overhaul of the now-deprecated MCrypt extension. At that time, the
extension had changed how its C interface worked, which required a lot of work on the PHP side.

---

### What is your current role, and what kind of work do you do on a daily basis?

I am currently one of the eleven people contracted by the PHP Foundation to work on the PHP project. Most of my time is
currently spent maintaining the server infrastructure, but I’ve also recently worked on improving the Date/Time
extension, created PIE, the new PECL, and many other smaller contributions.

Besides PHP, I am the creator and sole maintainer of Xdebug, the PHP debugging tool. With every new PHP version, Xdebug
requires more work, and there is always a continuous flow of new features to implement.

I also run [Xdebug Cloud](https://xdebug.cloud/), a remote debugging solution designed for distributed teams that need to share a remote PHP
development machine.

---

### What has been the biggest challenge or most defining moment in your journey within the PHP ecosystem?

Through my open source work on the PHP core and on Xdebug, I managed to find jobs at various companies.

I eventually moved to Norway to work for eZ Systems, and after leaving there, I worked as a contractor writing PHP
extensions. One of those contracts was with MongoDB, which eventually turned into a full-time job. Now that I’ve left
that company as well, I continue working on PHP — through the Foundation, through contracting, and of course, through
Xdebug. PHP has been the red thread throughout my entire career.

---

### What do you believe was essential for you to reach your current position within the PHP ecosystem (whether in the core, the Foundation, or the community)?

My contributions to the language and the creation of Xdebug were essential for reaching my current position in the PHP
ecosystem.

---

### What kind of impact do you feel you currently have within the PHP ecosystem or community?

I believe that with the PHP Foundation in place, we can be confident PHP will continue to evolve for another 30 years.
I’m very happy to be part of such a long and meaningful journey.

---

## About PHP and the PHP Foundation

### In your opinion, what have been the most significant advancements in PHP in recent years?

I think the best improvement has been the general ability to type your code. This makes it possible to write more
complete and professional code that is easier to reason about. At the same time, PHP hasn’t lost its roots as a “hacky
language,” still allowing you to quickly build small things in a fun and simple way.

---

### In your view, what are the biggest challenges today for new contributors to get involved with the PHP core?

PHP, like any language, is complex. It takes a long time to understand everything that’s going on. With the PHP
Foundation, we are working on improving the documentation, but most of it is still “the source code itself.”

---

### How do you see the role of the PHP Foundation in the future of the language?

I think it’s very important to have the Foundation as the backbone of the project. I would like to see it evolve into
also handling the governance of the project in a more professional way. Right now, nothing is clearly defined, and some
processes still happen in an improvised manner.

---

### PHP still carries a reputation of being an “old” or “bad” language in certain circles. How do you view this image today?

I ignore this entirely. It’s not a useful way of framing what the PHP language is. What matters is showcasing what PHP
is today.

---

### To wrap up: what change or feature would you like to see in PHP in the coming years?

Not Generics.

---

## Off-topic

### What sources do you follow to stay up to date with PHP and software development?

I read the internals mailing list, participate in the PHP Foundation Slack, the [phpc.chat](https://phpc.chat/) Discord server, and attend
user groups — both local and remote as well as conferences where I talk to people directly.

---

### Would you like to leave a message for the Brazilian PHP community?

I very much enjoyed my time speaking in São Paulo in 2006. I must find an excuse to visit again!

---

Follow **Derick** and explore his work:

- [GitHub](https://github.com/derickr)
- [LinkedIn](https://www.linkedin.com/in/derickrethans)
- [Xdebug](https://xdebug.org/)
- [Website](https://derickrethans.nl/)  
