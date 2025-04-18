## Description
A minimalist **PHP & MySQL** starter‑kit that shows how to:

* spin up or drop a database/tables with one click  
* register users and log them in/out (prepared statements, basic validation)  
* insert extra data (a **student** record) through a tiny form  
* keep everything reachable from a single, responsive **interface page**
---

## Features
| Area | Details |
|------|---------|
| Database | One‐click **Init DB** (creates the DB and both tables)<br>One‐click **Drop DB** (removes the DB if present) |
| Auth     | User **registration** with password length check, duplicate e‑mail check and "0" eye toggle<br>**Login** with prepared statements |
| CRUD demo | Add a **student** (tax‑code, name, etc.) |
| UX        | Always shows *Back* + *Home* buttons after any action<br>Clean CSS, mobile‑friendly |
| Security baseline | `mysqli` prepared statements, `utf8mb4`, session handling (no password hashing yet – left to you) |

---

## Quick start

```bash
# 1. copy / clone into your web‑root (htdocs, public_html, …)
git clone https://github.com/simonc999/simple-php-interface.git
cd simple-php-interface

# 2. make sure PHP + MySQL are running (XAMPP, MAMP, WAMP, LAMP…)

# 3. visit the app
http://localhost/simple-php-interface/interface.html
