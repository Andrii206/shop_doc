# Інтернет-магазин (Shop Project)

Монорепозиторій, що містить бекенд на Laravel у Docker та окремий клієнтський SPA-додаток на Vue 3.

## Структура репозиторію

- `shop_new/` — Бекенд API (Laravel 10, Nginx, MySQL 8.0 у Docker).
- `shop_vue/` — Клієнтська частина (Vue 3, Vue Router, Vite).

---

## Швидкий старт

### 1. Вимоги
- Docker та Docker Compose v2
- WSL2 (Ubuntu)
- Node.js (LTS v20+) та npm

---

### 2. Запуск бекенду (Docker + Laravel)

1. Перейдіть у папку бекенду:
   ```bash
   cd shop_new