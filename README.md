### How to

npm install inside /nodejs folder

docker-compose up -d

docker exec -it app-clients php artisan migrate

docker exec -it app-clients php artisan db:seed

docker run -d --name docker-hostmanager --restart=always -v /var/run/docker.sock:/var/run/docker.sock -v /etc/hosts:/hosts iamluc/docker-hostmanager

### Accesses
[Application](http://web.clients/)
`
login: marcos@example.com
password: secret
`

[PHPMyAdmin](http://phpmyadmin.clients)
`
db: mysql-clients
login: root
password: root
`

[pgAdmin 4](http://pgadmin.clients)
`
login: pgadmin4
password: secret
`

[API Clients GET](http://node.clients:5000/clients/list)

[PagSeguro Transactions](https://sandbox.pagseguro.uol.com.br/transacoes.html)
