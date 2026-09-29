# Pritam Limbu — Portfolio

Personal portfolio website for **Pritam Limbu**, Computer Engineering Student & Web Developer (Nepal).

Built with Laravel + Blade, custom CSS (no framework dependency) and vanilla JavaScript.

---

## Quick Start (SQLite — zero database setup)

A ready-to-use `database/database.sqlite` file ships with this project:

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

Visit http://localhost:8000 — done. `.env.example` already defaults to:

```
DB_CONNECTION=sqlite
```

No MySQL server needed. The contact form will work immediately.

---

## MySQL Setup (optional)

1. Create the database:

```sql
CREATE DATABASE portfolio CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

2. In `.env`, comment out the SQLite line and uncomment the MySQL block:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portfolio
DB_USERNAME=root
DB_PASSWORD=
```

3. Run the migrations:

```bash
php artisan migrate
```

---

## Database Structure

**Table: `contact_messages`** (created by the migration)

| Column     | Type            | Notes                                  |
|------------|-----------------|----------------------------------------|
| id         | bigint (PK)     | auto-increment                         |
| name       | varchar(100)    | required                               |
| email      | varchar(255)    | required                               |
| subject    | varchar(150)    | nullable                               |
| message    | text            | required                               |
| read_at    | timestamp       | nullable (mark messages as read later) |
| created_at | timestamp       |                                        |
| updated_at | timestamp       |                                        |

## Contact Form Reliability

`POST /contact` never loses a message:

1. Input is validated.
2. The message is saved to the `contact_messages` table.
3. An email notification is sent to `MAIL_TO_ADDRESS` (set it in `.env`).
4. If the **database is unavailable**, the message is still emailed and written to the log.
5. If **email fails too**, the message is still in `storage/logs/laravel.log`.

Set `MAIL_MAILER=log` (default) to capture emails in the log while developing,
or configure SMTP for real delivery.

## Useful Commands

```bash
php artisan migrate              # create the contact_messages table
php artisan migrate:rollback     # undo the last migration batch
php artisan tinker               # inspect messages, e.g.:
#   App\Models\ContactMessage::latest()->get();
#   App\Models\ContactMessage::count();

# Seed 5 fake messages for local testing:
#   1. Uncomment the line in database/seeders/DatabaseSeeder.php
#   2. php artisan migrate:fresh --seed
```

## What Works Out of the Box

| Feature | Status |
|---|---|
| Responsive navigation, scroll-spy, mobile menu | Working |
| Scroll-reveal animations (reduced-motion aware) | Working |
| Download CV buttons (hero + resume) | Working — serves `public/cv/pritam-limbu-cv.pdf` via `GET /cv` |
| Contact form (validation + DB storage + email) | Working — SQLite by default, MySQL ready |
| Placeholder links (GitHub / LinkedIn / live demo) | Show a "coming soon" toast instead of dead `#` links |

## Replacing Placeholders

Search for `PLACEHOLDER` in `resources/views/` and `.env.example`:
- `MAIL_TO_ADDRESS` in `.env` — where contact notifications go
- Email / GitHub / LinkedIn URLs — swap `href="#"` for real URLs and **remove the `data-soon` attribute**
- Live demo / repository URLs on the Saptashree Futsal project — same, remove `data-soon`
- Profile photo → put `profile.jpg` in `public/images/` and replace the placeholder card in `hero.blade.php`
- Project screenshot → put an image in `public/images/projects/` and replace the placeholder in `projects.blade.php`
- CV → replace `public/cv/pritam-limbu-cv.pdf` with your own file (keep the name, or update the route)

## Structure

```
app/
  Http/Controllers/ContactController.php   # validated, stores + emails, never loses a message
  Mail/ContactMessageMail.php              # notification mailable
  Models/ContactMessage.php                # Eloquent model
database/
  database.sqlite                          # pre-created empty SQLite DB (zero setup)
  factories/ContactMessageFactory.php      # for seeding test messages
  migrations/                              # contact_messages table
  seeders/DatabaseSeeder.php
config/
  app.php · database.php · mail.php        # complete config (SQLite default, MySQL ready)
resources/views/
  layouts/app.blade.php                    # master layout (nav, toast, footer)
  home.blade.php                           # page composer
  sections/*.blade.php                     # Hero, About, Skills, Projects, Resume, Contact
  emails/contact-message.blade.php         # notification template
public/
  css/style.css                            # all styles
  js/main.js                               # nav, reveal, scroll-spy, toasts
  cv/pritam-limbu-cv.pdf                   # downloadable CV
storage/                                   # app skeleton (sessions, logs, cache, views)
routes/web.php                             # home, /cv download, /contact
```

---

## Admin CMS (Phase 1 — Authentication + Dashboard)

**URL:** `/admin` (redirects to `/admin/login` when logged out)

### Setup

```bash
# 1. Run the new migrations (users, projects, skills tables)
php artisan migrate

# 2. Create YOUR admin account — the command prompts for credentials
#    (nothing is hardcoded, no public registration exists)
php artisan admin:create

# 3. Serve and log in at http://localhost:8000/admin
php artisan serve
```

### What Phase 1 includes

| Feature | How it works |
|---|---|
| `/admin/login` | Guest-only login form, CSRF-protected, rate-limited (5 attempts / min) |
| `/admin/logout` | Destroys session + remember token |
| `admin` middleware | Guests → login page; logged-in non-admins → 403 |
| `/admin` dashboard | Cards: Total/Published Projects, Total Skills, Total/Unread Messages, Resume Status |

### Files added in Phase 1

```
database/migrations/2026_01_01_000001_create_users_table.php
database/migrations/2026_01_01_000002_create_projects_table.php
database/migrations/2026_01_01_000003_create_skills_table.php
app/Models/User.php · Project.php · Skill.php
app/Http/Middleware/EnsureUserIsAdmin.php
app/Http/Controllers/Admin/AuthController.php
app/Http/Controllers/Admin/DashboardController.php
app/Console/Commands/CreateAdminUser.php
resources/views/admin/layout.blade.php · login.blade.php · dashboard.blade.php
```

### Security notes

- Passwords hashed with bcrypt; credentials are typed at the terminal, never stored in code
- `password` cast on the User model auto-hashes on assignment
- Login throttling via RateLimiter (email + IP key)
- Session regenerated on login, invalidated on logout
- Admin pages send `noindex, nofollow`

---

## Admin CMS — Phases 2–7 (complete)

All sidebar functions are live. Everything below assumes you completed Phase 1 setup.

### First-time data setup

The seeder loads your real starting content (profile, skills, the Saptashree Futsal
project, your GitHub link, and imports the existing CV into secure storage):

```bash
php artisan migrate
php artisan db:seed
php artisan storage:link     # makes project/profile images publicly readable
```

### Feature map

| Admin page | What it does | Public effect |
|---|---|---|
| `/admin` | Dashboard counts + resume status | — |
| `/admin/projects` | Add/edit/delete, publish/unpublish, feature/unfeature, order, image upload (2 MB max) | Projects section is fully database-driven; only published projects show, sorted by `sort_order`; featured project gets the big card |
| `/admin/skills` | Add/edit/delete, category, level, order | Skills section loads groups from MySQL |
| `/admin/messages` | Open (auto-marks read), read/unread, delete, reply via email | Dashboard unread count updates live |
| `/admin/profile` | Name, headline, location, short intro, about, profile photo (2 MB max) | Hero + About sections load from the database |
| `/admin/resume` | Upload/replace/delete CV (5 MB max, stored in non-public `storage/app/cv`) | Download CV buttons appear **only** when a CV exists |
| `/admin/social-links` | Add/edit/delete, active/hidden, order | Footer + Contact sections load active links (your GitHub is pre-seeded) |

### File storage layout

```
storage/app/public/projects/    project images   → served via storage:link
storage/app/public/profile/     profile photo    → served via storage:link
storage/app/cv/                 CV file          → NOT public; downloaded via /cv route only
```

Old images/files are deleted automatically on replace and on record deletion.

### New tables

`profiles` · `projects` · `skills` · `social_links` · `resumes` (plus `users` and `contact_messages` from earlier phases)

### Admin UI additions

Tables with badges and row actions, quick publish/feature toggles, delete
confirmation prompts, plain CSS pagination, form grids, level bars, and a
mobile slide-in sidebar — all in the same dark/green design language.
