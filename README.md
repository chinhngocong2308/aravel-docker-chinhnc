# Quick Install

```bash
$ make install
$ make mix
# or...

$ docker compose build
$ docker compose up -d
$ docker compose exec app composer install
$ docker compose exec app cp .env.example .env
$ docker compose exec app php artisan key:generate
$ docker compose exec app php artisan storage:link
$ docker compose exec app chmod -R 777 storage bootstrap/cache
$ docker compose exec app npm install
$ docker compose exec app npm run dev

#seed data
$ make seed
$ make seed-logo-image

```
# Quick start

```bash
$ make up
```

### Basic docker compose commands
- Build or rebuild services
    - `docker compose build`
- Create and start containers
    - `docker compose up -d`
- Stop and remove containers, networks
    - `docker compose down`
- Stop all services
    - `docker compose stop`
- Restart service containers
    - `docker compose restart`
- Run a command inside a container
    - `docker compose exec [container] [command]`
    
### Views

- Test task running: http://localhost 
<p align="center">
  <img alt="Companies view" src="./_readme/companies-view-1.png">
</p>
<p align="center">
  <img alt="Jobs view" src="./_readme/1-view-jobs.png">
</p>

- Admin test task running: http://localhost/admin/company
<p align="center">
  <img alt="Companies admin" src="./_readme/companies-admin.png">
</p>

- Database adminer running: http://localhost:9090/