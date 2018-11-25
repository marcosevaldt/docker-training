# Título do Projeto
Um parágrafo de descrição.

## Instruções
Essas instruções farão com que você tenha uma cópia do projeto em execução na sua máquina local para fins de desenvolvimento e teste.

### Pré-requisitos
Será necessário que você acesse as documentações abaixo e efetue a instalação para pleno funcionamento da aplicação.
```
Docker 							: https://docs.docker.com/install/ 
Docker Compose 					: https://docs.docker.com/compose/install/
Docker Hosts Updater(opcional)	: https://github.com/grachevko/docker-hosts-updater
```
### Instalação

Como é sua primeira execução da aplicação, será necessário criar a rede do projeto localmente, por isso, execute o seguinte comando:
```
$ docker network create skeleton
```

Para facilitar ainda mais a automatização do deploy da aplicação, criei um bash script, por isso, dentro da pasta raiz do projeto devem ser dadas as devidas permissões executando o seguinte comando:
```
$ chmod +x init.sh
```

Logo após, execute o script com o seguinte comando dentro da pasta raíz do projeto:
```
$ ./init.sh
```
Como a aplicação necessita da instalação das bibliotecas através do composer, criei um container específico para instalação, pode haver uma demora dependendo da sua conexão com o packagist, por isso, certifique-se de que o container tenha gerado a mensagem final esperada antes de acessar a aplicação executando o seguinte comando:
```
$ docker-compose logs composer
Mensagem Esperada: Application key set successfully.
```

Se você utilizou o Docker Hosts Updater, poderá acessar a aplicação diretamente pela URL abaixo:
```
http://skeleton-web
```

Caso não tenha instalado, será necessário primeiro atualizar o arquivo hosts localmente, para saber o nome do host e o ip do container basta executar os seguintes comandos abaixo:
```
$ docker inspect --format={{.NetworkSettings.Networks.skeleton.IPAddress}} skeleton-web
$ docker inspect --format={{.Config.Hostname}} skeleton-web
```
Com essas duas informações você deverá acessar o arquivo hosts do seu computador e incluir no final do arquivo como no exemplo abaixo, porém, com as informações coletadas através dos comandos:
```
172.18.0.4 skeleton-web
```

### Rodando os testes
Para executar os testes, executar o comando abaixo caso necessário:
```
docker exec -i skeleton-app vendor/bin/phpunit
```

### Rodando os seeders
Para executar os dados automaticos, executar o comando abaixo caso necessário:
```
docker exec -i skeleton-app php artisan db:seed --class=UsersTableSeeder
```

## Acessando o PHPMyAdmin
Para facilitar a visualização do dados do banco, inclui o PHPMyAdmin, pode ser acesso utilizando a URL abaixo:
```
http://skeleton-phpmyadmin
Usuario: homestead
Senha: secret
```

## Documentação da aplicação
@todo

## Stack escolhida
### Um pouco sobre e por que PHP?

O PHP passou por diversas reescritas de código ao longo do tempo e nunca parou de conquistar novos adeptos, a flexibilidade da linguagem e sua rápida curva de aprendizagem são dois pontos que fazem novas pessoas aderirem a sua utilização assim como fiz há dois anos.

Atualmente, considero o PHP uma linguagem robusta, de alta performance, com uma comunidade forte e que domina grande parte das aplicações web, é uma linguagem open source e orientada a objetos.

A comunidade ajudou a consolidar os frameworks e micro-frameworks que atualmente seguem excelentes padrões definidos pelo PHP-FIG, além de termos um excelente gerenciador de dependências facilitando a interoperabilidade entre componentes, por isso a minha escolha.

### Um pouco sobre e por que Laravel?
Laravel é uma Framework bem conhecido entre os desenvolvedores PHP, acredito que suas duas maiores qualidades são simplicidade e facilidade de se tornar expressivo quando o assunto é código.

O Framework possui uma excelente documentação e foi integrado com diversos componentes que tornam menos doloroso o trabalho do desenvolvedor para tarefas cotidianas e conseqüentemente não sacrificam a funcionalidade da aplicação.

Dos principais componentes, temos o Artisan para gerenciamento da interface de linha de comando que pode ser estendido com facilidade, para a camada de abstração do banco de dados temos o Eloquent facilitando o mapeamento das tabelas e colunas, na engine de template temos o Blade que nos permite manipular os dados e apresentar ao usuário de forma elegante, além do Framework como um todo seguir o padrão MVC, contando com roteamento, middleware, sessão, validação, logging e integração com testes seguindo os padrões da PSR.

Caso sua aplicação se torne mais robusta, pode ser utilizado os componentes de eventos, filas e serviços de mensageria integrados para suportar a demanda, com todos estes serviços, acredito que este Framework possa ser utilizado tanto para pequenas, médias e grande aplicações e por isso a minha escolha.

### Um pouco sobre e por que Docker?
Os contêineres mudaram a maneira de desenvolver, distribuir e executar softwares. Os desenvolvedores agora podem construir softwares localmente, sabendo que será executado de maneira idêntica não importando o ambiente de hospedagem.

Os contêineres são um encapsulamento da aplicação com suas dependências em uma instância isolada de um sistema operacional que pode ser usado na execução de aplicativos.

Escolhi usar pela portabilidade, além de ser uma tecnologia em alta no mercado, porém, não muito explorada no Brasil.

### Por que MySQL?
O banco de dados relacional MySQL possui uma comunidade forte, seu projeto é open source e com licença comercial caso necessária, já está no mercado a bastante tempo mostrando sua maturidade e também é facilimente instalável em qualquer sistema operacional, além de ter alta compatibilidade com a stack escolhida.