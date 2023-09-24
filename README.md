# Bike Service Cost Estimation Web app - Interview Task

#### Built with Laravel 10, Inertia, Vue 3, Vuetify and Tailwind

Welcome to my project! This is a brief guide on how to set up and run this application locally.

## Prerequisites

Before you begin, ensure you have met the following requirements:

-   WSL
-   Docker and Docker Compose (for Sail)

---

## Getting Started

### Installation

1. Clone this repository to your local machine:
   If you are a Windows user you will need to open the Ubuntu terminal from your cmd and navigate to the installation directory, then clone it though there.

    ```bash
    git clone https://github.com/DomVournias/bike-app
    ```

2. Navigate to the project forlder

    ```bash
    cd YourProjectFolder/bike-app
    ```

3. Open Vscode

    ```bash
    code .
    ```

4. Install Composer Dependencies

    ```bash
    docker run --rm \
        -u "$(id -u):$(id -g)" \
        -v "$(pwd):/var/www/html" \
        -w /var/www/html \
        laravelsail/php82-composer:latest \
        composer install --ignore-platform-reqs
    ```

5. Generate the .env

    ```bash
    cp .env.example .env
    ```

6. Add the .env variables

    ```bash
    APP_KEY=base64:apnzJrxBslOoIGxL9GyeJazgStzAGVD9CxZVwkZappc=
    DB_HOST=mysql
    DB_USERNAME=sail
    DB_PASSWORD=password
    REDIS_HOST=redis
    ```

7. Run it

    ```bash
    sail up
    sail npm run dev
    sail artisan serve
    ```

    Open it on http://localhost

---

### Seed

##### Users

```bash
sail artisan db:seed —class=UserSeeder
```

##### Bikes

```bash
sail artisan db:seed —class=BikeSeeder
```

##### Service Requests

```bash
sail artisan db:seed —class=ServiceRequestSeeder
```

---
