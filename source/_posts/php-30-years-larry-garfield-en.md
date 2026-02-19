---
extends: _layouts.post
section: content
title: 🐘 PHP 30 Years – A Conversation with Larry Garfield
date: 2026-02-18
description: Interview from the PHP 30 Years series with Larry Garfield.
list_in_blog: false
categories: [ php, comunidade, php30anos ]
---

> 🇧🇷 **This interview is also available
in [Portuguese](https://www.marcosmarcolin.com.br/blog/php-30-anos-larry-garfield-pt-br/).**

This interview is part of the **PHP 30 Years – Contributor Interview** series, created to celebrate three decades of the
language and highlight the people who have helped, and continue to help, shape the PHP ecosystem.

Larry Garfield is one of the most respected voices in the modern PHP ecosystem.
A long-time Drupal contributor, he led the Drupal 8 *Web Services* initiative, which helped transform Drupal into a modern
PHP platform.
He has served as *Principal Engineer* at MakersHub, *Staff Engineer* at TYPO3 and LegalZoom, and *Director of Developer
Experience* at Platform.sh.

Larry is a member of the PHP-FIG *Core Committee* and has co-authored several important PHP RFCs, including proposals
around **`Enums`**, **`Property Hooks`**, and the **`Pipe Operator`**.

He is also the author of multiple books on PHP, including _Thinking Functionally in PHP_ and _Exploring PHP 8.0_.

Below is the full interview.

---

### Was there a mentor, person, or reference who influenced your journey with PHP?

I have not had a specific active mentor, but I have certainly been influenced by many people over the years, directly and
indirectly.

Fabien Potencier of Symfony fame stands out as someone that I learned a lot from, even if not directly.

My RFC collaborator Ilija Tovilo has been highly educational as well.

### How did your journey with PHP begin, and what motivated you to keep contributing actively to the language?

We’d like to hear how you discovered PHP, what drew you to it, and what has kept you engaged with it over the years.

I first came across PHP 3 back in 1999, in college, at the recommendation of a friend. I found it more approachable than
a lot of other things and, as I was already interested in web development, I dove in. I eventually started doing
freelance consulting for local politicians, which is how I went through my "every PHP dev invents their own CMS and then
abandons it" phase. I am pleased to say none of my code from those days still exists.

After grad school and a brief detour into tech journalism, I landed a job at a small local agency that used PHP, although,
in hindsight, not very well. Around that time (2005), I also got involved in Drupal, initially because I was looking for
a project to learn from so I could build a new BBS for my online Star Trek RPG club. (Yes, I'm a nerd.) I ended up using
Drupal for it, and also got pulled into Drupal itself. It was the first *Open Source* project I ever contributed to, and,
over the next decade, I became one of the lead developers. Over time, due in part (but not exclusively) to my
involvement, that agency grew into one of the leading Drupal consultancies in the world.

In 2007, at DrupalCon Sunnyvale, Rasmus Lerdorf begged the Drupal community to drop PHP 4 support and focus on PHP 5,
something few projects were doing out of fear they'd lose market share, since most web hosts (it seemed) did not offer
PHP 5 support. Jonah Braun, from Joomla, suggested to another Drupal colleague of mine, during a picnic, that projects
should coordinate moving to PHP 5 at the same time. That colleague mentioned it in a blog comment, I read it, and so
began the GoPHP5 campaign: coordinating many projects and hosts committing to PHP 5.2 support all at once (at the time,
the latest release).

We launched on January 5, 2007, with 6 projects and 3 hosts signed on to only support PHP 5.2 in our next releases. A
month later, we had over 100 projects and 200 hosts signed on, and the **PHP Internals** team had decided to drop support
for PHP 4 as well. We successfully assassinated a language (PHP 4) and, I believe, saved PHP.

I then went on to write the new DBAL for Drupal 7, which is still used to this day. For Drupal 8, I led the effort to
modernize the codebase, integrate Symfony components, and otherwise overhaul the entire system. This was against the
backdrop of the "PHP Renaissance" of PHP 5.3–5.6. Dozens of people, from dozens of projects, spent thousands of hours
working to break down walls between PHP projects and create a more integrated, broader PHP community. *Composer/Packagist*
was instrumental in that, as was what became the PHP-FIG. While I was not a founding member of the PHP-FIG, I quickly got
involved and became a long-time leader in that effort. (I still sit on the PHP-FIG *Core Committee*, having co-authored
most of the current bylaws along with Michael Cullom.)

I unfortunately left Drupal in 2017 under less-than-ideal circumstances (project leadership turned out to be far more
bigoted and dishonest than I could have imagined), but I remained active in the broader community, especially on the
conference circuit, where I was a frequent speaker at events around the world. At that time, I was working in developer
relations (*DevRel*) for a hosting startup, while doing my own PHP work on the side.

I joined the **PHP Internals** list during the GoPHP5 project, but I did not really get involved in contributing to PHP
itself until around 2020. The first RFC I ever posted was for Python-style *comprehensions*, although it had no meaningful
implementation and was met with lukewarm reception, so I abandoned it. The first one that actually went anywhere was
**`Enums`**, which I collaborated with Ilija Tovilo on. He did the code, but did not want to be bothered with writing the
RFC in English or arguing on the *mailing list*. I, fortunately, am very good at writing technical English and did not
mind arguing. :-) That was the first of several collaborations, and we have been working together ever since.

I also self-published my first solo book, _Thinking Functionally in PHP_, in 2020, based on the then newly released PHP
7.4. It was reasonably successful, and has since served as a guide for me in picking what features to work on for PHP.
How can we make PHP a better functional language? How can we make functional techniques easier to do? The **`Pipe
Operator`**, **`partial function application`**, **`Enums`**, and similar RFCs are all part of that overarching story.

While I have published a few of my own PHP libraries over the years, my most ambitious was `Crell/Serde`, released in
2022.

I started it originally while working for TYPO3, as we needed a new *config-loader/deserializer* that was more flexible
than anything else on the market, so I built it. Of course, TYPO3 ended up not using it, but yay, *Open Source*: I was
still able to release it.

---

### What is your current role, and what kind of work do you do on a daily basis?

As I write this, I am looking for a new job, so that is what I do.

On the side, I have been working on a new "mostly static" site management tool for my own blog that is, I think, finally
close to done. (Famous last words.) I am also working on multiple PHP RFCs, in partnership with others, and planning an
update to my FP book, now that PHP has advanced significantly enough to warrant it.

What I would like to be doing is leading a team, helping them level up their skills and modernize and improve an older
codebase. I find that fun, as long as management does not fight me on it. I'm weird. :-)

---

### What has been the biggest challenge or most defining moment in your journey within the PHP ecosystem?

I do not think there has been just one!

GoPHP5 was my first real foray into the broader community, and I think it set the stage for most of what came after for
me: collaboration, cross-project cooperation, and pushing the language forward. There was not even any code in it, just
people-wrangling and marketing. But it worked.

The work we did to break Drupal out of its shell, as part of the overall PHP Renaissance, was the next logical step in
that process. That was a 5-year slog, and while the result was not quite what I had hoped, it was still a defining moment
for the project, and for me personally. It was in this era that I really made a name for myself in the PHP community
outside of Drupal.

I have been a functional programming advocate since 2011, when I first gave a functional programming talk at a Drupal
conference. Of course, my knowledge in that area has grown considerably since then, and with my 2020 book I carved out a
position for myself as "the FP guy" in many PHP circles. Which I am OK with, and that has been one of the through-lines
of much of my **PHP Internals** work.

Getting **`Enums`** into PHP was easier than some of the RFCs that came after, but it was also a major pivot point where I
became "a core contributor." I do not know that it has gotten me anything beyond a need for heartburn medication, but it
was still a great feeling.

---

### What do you believe was essential for you to reach your current position within the PHP ecosystem (whether in the core, the Foundation, or the community)?

Naivete and stubbornness.

It did not occur to me what a big deal GoPHP5 was until I was well into it. I just wanted to be able to use `PDO` for
Drupal's database layer. I did not set out to change the direction of the ecosystem, I just scratched an itch. Had I
realized just how big a deal it was, I may not have even gotten started. But once I was in, I followed through.

My nominal remit for Drupal 8 was *web services*. I did not set out to rewrite the whole system, but somewhere along the
way that became the way to make *web services* work better, and so off we went. Had I realized I was signing up for 5
years of stress in a dysfunctional dev organization culminating in rewriting most of Drupal, I may not have even gotten
started. But once I was in, I followed through.

I did not set out to get into *DevRel*, but I enjoyed speaking at conferences, and that led into a _full-time_ *DevRel*
position for 5 years, with tons of travel to all sorts of cool places.

I did not set out to be "the FP guy." I just wanted to make my code better, and share what I learned with others.

As the old Engineers Creed goes, "We do these things not because they are easy, but because we thought they would be
easy."

Sometimes, "just do it" is the best way through. You do not know how big or small a task will be until you are in it. If
it is important, try. Sometimes you will fail, but that is OK. You got further than you would have if you had not tried.
And when you succeed, it is a really good feeling.

---

### What kind of impact do you feel you currently have within the PHP ecosystem or community?

It is hard to judge. I would like to think I am a force for “taking the time to do it right.” The best feedback I
generally get is "you made me think" or "I never thought of it that way, but you are right."

Most recently, I had a long screed against the massive and negative environmental impacts of AI in my article
[Selfish AI](https://www.garfieldtech.com/blog/selfish-ai), calling out those who embrace AI while ignoring those negative
externalities. I have had a lot of people thank me for putting into words what they were thinking.

Perhaps that is my best impact: distilling squishy concepts into understandable steps and making them actionable. Whether
that is large-scale things like "here's why we should convert Drupal to OOP" or smaller things like "here's how to think
about `null`" ([Much Ado About Null](https://www.garfieldtech.com/blog/much-ado-about-null)), I hope I am able to make the
people I work with smarter, more skilled, and open their minds to just what is out there.

None of us know everything. All of us know very, very little, relative to what there is to know.

---

## About PHP and the PHP Foundation

### In your opinion, what have been the most significant advancements in PHP in recent years?

This seems minor, but **`constructor property promotion`**.

Before `PHP 8.0`, making the case for clean dependency injection was... honestly kind of hard. Doing proper DI involved
typing out nearly the same series of characters (type and variable name) at least 4 times. Many devs, understandably,
just did not want to bother, and so did not. That is where ugly hacks like Laravel's "facades" come from.

*Constructor promotion*, while it is really "just" syntax sugar that compiles away, cuts that number down to 1. It makes
specifying "this class requires X, Y, and Z" just stupid easy. Combined with a good *autowiring* DI container, in most
cases it is: "write a class, list what you want, and you're done." The ergonomic benefits of that cannot be overstated.
(It also means Laravel facades are now addressing a problem that has not existed for 6 years, so everyone needs to stop
using them, right the heck now.)

**`Named arguments`** and **`attributes`** came out at the same time, and the three of them dovetailed together
perfectly. `PHP 8.0` really was a revolution.

More recently, it may be self-serving to talk up the **`Asymmetric Visibility`** and **`Property Hooks`** RFCs that Ilija
and I wrote, but taken together (and with *interface properties* we got along the way), they have completely changed how
one writes PHP code. (Or could/should.) "Get me information about this object" is now just a *property*. Whether it is
*backed* by a real value or not is irrelevant. It can be dynamic, cached, or just internally-writable-only. We are still
internalizing the effects of this change, but it is huge.

And of course, the overall push toward a stronger type system, which has been an incremental process for years. I am a
strong believer in *type-driven development*: the more logic you can push into your type system, and let the type system
force your code into certain shapes, the less code you actually need. PHP has the strongest enforced type system of any
major interpreted language. It really deserves more credit for that than it gets.

---

### In your view, what are the biggest challenges today for new contributors to get involved with the PHP core?

PHP is a "structureless" organization. This... has pros and cons. I strongly recommend everyone read
"[The Tyranny of Structurelessness](https://www.jofreeman.com/joreen/tyranny.htm)" by Jo Freeman.

Even though the RFC process is nominally quite open and documented, the on-ramps are not clear. There are lots of
informal, unwritten rules about what is and is not acceptable, and who among the common reviewers is going to care about
what, and what informal gates you need to get past. (E.g., who is going to nitpick the language of the RFC, who is going
to nitpick the code, who is going to not review anything but just vote no in the end without any notice, etc.) If you are
not already "in," it is quite daunting. Unfortunately, efforts to address this always run into a wall.

The other big issue is that the PHP codebase itself is a mess. It is not actually written in C; it is written in a custom
macro language written in C, and the inline documentation in the code is paltry at best. Again, explanations and
documentation exist, at least for some of it, but an awful lot is just "read this 10,000-line undocumented file with a
whole bunch of macros using terms you do not know yet, good luck."

There are people who have managed to successfully learn the codebase in its current form. I envy them. I am still lost to
this day in most of it.

---

### How do you see the role of the PHP Foundation in the future of the language?

The PHP Foundation is, and has been, absolutely crucial to PHP's continued growth in the past half-decade. Around half of
all the merges to `php-src` these days come from one of the Foundation's paid developers. That is not just RFCs and other
improvements (of which there are many), but also lots of bug fixing and unsung maintenance.

I would really like the Foundation to take a stronger, more leading role in PHP. Not just in the code (where more
internal planning could be very helpful), but also in marketing to the broader community. We likely will not ever be able
to make PHP "cool", but at least making it "not uncool" seems achievable.

If your business uses PHP, you need to be donating to the Foundation. Not small amounts. This is our language, and if we
want it to continue to thrive, we need to collectively put our money where our mouth is.

---

### PHP still carries a reputation of being an “old” or “bad” language in certain circles. How do you view this image today?

"JavaScript is such a stupid language. It does not even have classes, you have this callback hell nonsense, and what's up
with having to `parseInt()` everything?"

That was a completely valid criticism of JavaScript... in 2005. If you tried to make that claim today, you'd be laughed
at because your knowledge is 20 years out of date. (Although the type coercion is still bad.)

The same is true of PHP... or at least it should be. Modern, properly written PHP is a really, really nice language, with
most of the features you would expect from a "modern" language. There are still a few gaps, sure; the same is true of
every other language. `PHP 8.6` will have a more flexible **`partial function application`** syntax than any other
language I know of. The type system is remarkably robust, lacking only *generics*, which are, well, hard in an
interpreted language. (No one has it yet.)

Yet PHP still carries the reputation of PHP 4, while JavaScript does not carry the reputation of JS 2005.

Frankly, this disconnect is the single biggest threat to PHP. The language itself is fine. The ecosystem is strong. But
perception and marketing have been lacking for 20 years, and we are still feeling the pain of a generation of
programmers whose only knowledge of PHP was the "fractal" hit-piece from 14 years ago.

It is not helped by the state of the WordPress codebase (the most famous and widely used PHP code on the planet), or some
of the... interesting design decisions in Laravel, neither of which use the language to its fullest modern extent.

I firmly believe that addressing this image problem, proactively and aggressively, is the single biggest challenge for
PHP. It is not about the code, it is about perception. It is about running *bootcamps* for new devs to learn PHP,
properly from the get-go. (Why are JS and React so popular? Because there are a million *bootcamps* that churn out cheap
JS and React programmers.)

I wish I had the time and energy to work on that, but it is not really where my skill set is, nor do I have the
bandwidth to do it as a side project. Hopefully this is an area the Foundation can help with, but it would require
expanding its scope beyond just the codebase. If we do not address that, it is going to strangle the language.

---

### To wrap up: what change or feature would you like to see in PHP in the coming years?

*Generics*, obviously. :-)

But more seriously, the most important shift that has been brewing, that we need to push harder on and make sure to get
right, is persistent-process PHP. FrankenPHP, Swoole, etc. are all part of that, but not quite right yet.

It is not just about *async*, though that is absolutely a critical part of it. We have had *async* for years, but without
a unified *IO* to handle blocking and non-blocking code, it has never really caught on. That is why the current efforts at
a new native **`Async API`** are so compelling, though I do feel they still need work.

FrankenPHP *worker mode* is also part of the picture, and for current projects is likely the easiest way forward. The
performance upsides are huge, but just as important, when PHP is not getting restarted every request you can spend less
effort on making the bootstrap process super-optimized.

Think about how much work goes into compiling perfectly optimized DI containers, *event dispatchers*, *template engines*,
etc. Now imagine if none of that mattered. If it takes 100 extra milliseconds to start up a process, but only once, and
it takes 100 times less code effort than squeezing it down to 10 ms on every request, that is a massive win, both for
performance and for giving developers less work.

FrankenPHP is still strictly *request/response/end*, though, at least on a per-request level.

Modern HTTP means lots of *micro-requests*, *websockets*, persistent connections, *push events*, and using HTTP/3 and UDP.
That is not the world PHP and PHP-FPM were created for, but it is the world we need to be able to easily play in.

I want to be able to spin up a new PHP server that will boot once and stay booted, has a simple API for firing up
*websockets* and *push events*, and lets me use all of my existing libraries and knowledge without having to relearn
everything.

We are not there yet. But we are closer than PHP has ever been, and that is, on a technical level, the most important
feature we can be working on. Whether that means FrankenPHP, the "true async" RFC, something new built on top of both, I
do not know. But that is where PHP needs to go.

---

## Off-topic

### Are there any tools, libraries, or practices in the PHP ecosystem that you really enjoy using today?

Basically every PHP project I create these days starts with **PHPUnit** and **PHPStan**. I also have **PHPBench** and
**PHPMetrics** in my standard kit, although I do not use those as often.

My Docker environment almost always comes from [PHPDocker.io](https://phpdocker.io/). (Great for dev, not sure it is great
for prod.)

I have also mostly replaced *Makefiles* with [Taskfiles](https://github.com/Enrise/Taskfile). They are pure bash and
easier to maintain since they do not need funky work to avoid GNU Make's C-oriented caching.

My IDE of choice is IntelliJ by JetBrains. It is their "generic" version, and adding the PHP plugins turns it into
PHPStorm, but I also have some other language plugins installed as well.

I do not do strict TDD, but I am a strong proponent of tests. Tests should be written in concert with the code being
tested. Which actually gets typed first can vary, and I do a little of each, but they should be written close enough
together that they show up in the same commit. Testable code is a really good proxy for decoupled, easy to modify, easy
to repurpose, easy to make faster when needed, etc.

---

### What sources do you follow to stay up to date with PHP and software development?

I am a regular reader of the **PHP Internals** list, naturally.

I also follow the `#PHP` tag on Mastodon, which gets me a lot of content I can see or ignore. I am on the [PHPC.social](https://phpc.social/about)
Mastodon server, where I am also a low-level moderator.

---

### Would you like to leave a message for the Brazilian PHP community?

The PHP-verse has long been dominated by Europeans, and secondarily by Americans. It does not have to be that way. That is
the beauty of *Free Software*. Anyone, anywhere, can get involved. Help review proposals for Internals, release
libraries, contribute to existing projects, blog, write documentation, whatever suits your personal interest. You do not
need permission from anyone. You just need a little naivete and stubbornness. :-)

---

Follow **Larry** and explore his work:

- [GitHub](https://github.com/crell)
- [LinkedIn](https://www.linkedin.com/in/larry-garfield/)
- [Mastodon (@Crell)](https://phpc.social/@Crell)
- [Garfield Tech](https://www.garfieldtech.com/)
