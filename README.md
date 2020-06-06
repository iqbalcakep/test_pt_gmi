# TEST PT Genrasi Multi Indonusa
Lumen - Vuejs


## Docker 
```
docker-compose build

docker-compose up -d

```

## Lumen 
copy ./src/.env.example to .env

```
composer install
docker-exec -t php php /var/www/artisan migrate
docker-exec -t php php /var/www/artisan db:seed

```
Open if success http://localhost:8080/ (don't change the port, related with vue)

## Vuejs
move to ./src/test_pt_gmi_view/
```
npm install
npm run dev

```
Open if success http://localhost:8081/
