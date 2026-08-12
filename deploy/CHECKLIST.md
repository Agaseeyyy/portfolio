# Production Deployment Checklist

Companion to `deploy/htaccess.production`. Follow these steps when deploying
the portfolio to https://agabustarga.indevs.in.

## 1. Push the code

Deploy the latest tree (current state includes commits `2be8dab`, `99237a9`,
`3ab6521`, `6e8a904`, `458ae39`). No schema changes are required: the
migrations were synced to the live database, so the prod DB already has the
hero-stat columns and techstack `proficiency`.

If you rebuild from scratch instead, run `php database/migrations/migrate.php`
(it is idempotent).

## 2. .env (no new keys)

Verify these exact values:

```
APP_ENV=production     # case-insensitive detection; disables DB auto-setup
APP_DEBUG=false        # hides errors from visitors, themed 500 page
APP_PATH=              # empty for a domain-root deployment
APP_URL=https://agabustarga.indevs.in
```

Keep the existing `DB_*`, `ADMIN_USER`, `ADMIN_PASS`, `DEFAULT_AVATAR`,
`HOVER_AVATAR` values.

## 3. Document root / .htaccess

- If the project root IS the document root (domain root): replace the root
  `.htaccess` with `deploy/htaccess.production` (`cp deploy/htaccess.production .htaccess`).
- If your host routes the domain some other way (subfolder, vhost config),
  leave the existing routing in place.

Both layouts were verified against real Apache + mod_rewrite + mod_php in this
repo's local simulation, including the CSRF admin flow and error pages.

## 4. Delete stale files on the server

These are dead and no longer referenced:

```
app/core/autoload.php
resources/js/portfolio.js
resources/js/services.js
public/robots.txt          # now served dynamically by the /robots.txt route
```

Also delete any old `.svg` files under `public/uploads/` (SVG uploads are now
blocked; previously uploaded SVGs are a stored-XSS vector if ever served).

## 5. After deploy

- Run `composer install --no-dev --optimize-autoloader` (or `composer dump-autoload -o`)
  so the helpers are autoloaded.
- Restart PHP-FPM / Apache if opcache has timestamp validation disabled.
- Log in once via `/admin/login` (a fresh session starts after deploy).