### How to
docker-compose up -d
docker exec -it app-clients php artisan migrate
docker exec -it app-clients php artisan db:seed

