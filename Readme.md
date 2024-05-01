# Lab 1: Introducción a Docker 
(https://docs.docker.com/engine/reference/commandline/cli/)


Más información para instalación en otras plataformas: https://docs.docker.com/engine/install/ 

## 1. Instalación de Docker CE en Ubuntu

a) Crear una máquina virtual con Ubuntu.

b) Actualiza el índice del gestor de paquetes APT
```
$ sudo apt-get update
```
c) Instala algunos paquetes necesarios, si aún no están instalados
```
$ sudo apt-get install \
    apt-transport-https \
    ca-certificates \
    curl \
    gnupg \
    lsb-release
```
d) Añade la key oficial para el repositorio de Docker
```
$ curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo gpg --dearmor -o /usr/share/keyrings/docker-archive-keyring.gpg
```
e) Añade el repositorio con la versión deseada
```
$ echo \
  "deb [arch=amd64 signed-by=/usr/share/keyrings/docker-archive-keyring.gpg] https://download.docker.com/linux/ubuntu \
  $(lsb_release -cs) stable" | sudo tee /etc/apt/sources.list.d/docker.list > /dev/null
```
f) Instala la última versión estable de Docker
```
$ sudo apt-get update

$ sudo apt-get install docker-ce docker-ce-cli containerd.io
```
g) Post-instalación
Añade tu usuario, que está registrado en la variable de entorno $USER.
```
$ sudo usermod -aG docker $USER
```
Es necesario volver a entrar al sistema para que los cambios tengan efecto.


Comprueba la versión de Docker instalada
```
$ docker --version
Docker version 26.0.1, build d260a54
```
Muestra la información de Docker
```
$ docker info
Client: Docker Engine - Community
 Version:    26.0.1
 Context:    default
 Debug Mode: false
 Plugins:
  buildx: Docker Buildx (Docker Inc.)
    Version:  v0.13.1
    Path:     /usr/libexec/docker/cli-plugins/docker-buildx
  compose: Docker Compose (Docker Inc.)
    Version:  v2.26.1
    Path:     /usr/libexec/docker/cli-plugins/docker-compose

Server:
 Containers: 0
  Running: 0
  Paused: 0
  Stopped: 0
 Images: 0
 Server Version: 26.0.1
 Storage Driver: overlay2
  Backing Filesystem: extfs
  Supports d_type: true
  Using metacopy: false
  Native Overlay Diff: true
  userxattr: false
 Logging Driver: json-file
 Cgroup Driver: systemd
 Cgroup Version: 2
 Plugins:
  Volume: local
  Network: bridge host ipvlan macvlan null overlay
  Log: awslogs fluentd gcplogs gelf journald json-file local splunk syslog
 Swarm: inactive
 Runtimes: io.containerd.runc.v2 runc
 Default Runtime: runc
 Init Binary: docker-init
 containerd version: e377cd56a71523140ca6ae87e30244719194a521
 runc version: v1.1.12-0-g51d5e94
 init version: de40ad0
 Security Options:
  apparmor
  seccomp
   Profile: builtin
  cgroupns
 Kernel Version: 6.5.0-1018-aws
 Operating System: Ubuntu 22.04.4 LTS
 OSType: linux
 Architecture: x86_64
 CPUs: 1
 Total Memory: 949.2MiB
 Name: ip-172-31-42-25
 ID: 5259afed-a352-4833-940d-5de4600c007b
 Docker Root Dir: /var/lib/docker
 Debug Mode: false
 Username: jluisalvarez
 Experimental: false
 Insecure Registries:
  127.0.0.0/8
 Live Restore Enabled: false

```

También podemos ver la versión tanto del cliente como del servidor
```
$ docker version
Client: Docker Engine - Community
 Version:           26.0.1
 API version:       1.45
 Go version:        go1.21.9
 Git commit:        d260a54
 Built:             Thu Apr 11 10:53:21 2024
 OS/Arch:           linux/amd64
 Context:           default

Server: Docker Engine - Community
 Engine:
  Version:          26.0.1
  API version:      1.45 (minimum version 1.24)
  Go version:       go1.21.9
  Git commit:       60b9add
  Built:            Thu Apr 11 10:53:21 2024
  OS/Arch:          linux/amd64
  Experimental:     false
 containerd:
  Version:          1.6.31
  GitCommit:        e377cd56a71523140ca6ae87e30244719194a521
 runc:
  Version:          1.1.12
  GitCommit:        v1.1.12-0-g51d5e94
 docker-init:
  Version:          0.19.0
  GitCommit:        de40ad0

```

Ayuda comando docker:

```
$  docker help

Usage:  docker [OPTIONS] COMMAND

A self-sufficient runtime for containers

Common Commands:
  run         Create and run a new container from an image
  exec        Execute a command in a running container
  ps          List containers
  build       Build an image from a Dockerfile
  pull        Download an image from a registry
  push        Upload an image to a registry
  images      List images
  login       Log in to a registry
  logout      Log out from a registry
  search      Search Docker Hub for images
  version     Show the Docker version information
  info        Display system-wide information

Management Commands:
  builder     Manage builds
  buildx*     Docker Buildx
  compose*    Docker Compose
  container   Manage containers
  context     Manage contexts
  image       Manage images
  manifest    Manage Docker image manifests and manifest lists
  network     Manage networks
  plugin      Manage plugins
  system      Manage Docker
  trust       Manage trust on Docker images
  volume      Manage volumes

Swarm Commands:
  swarm       Manage Swarm

Commands:
  attach      Attach local standard input, output, and error streams to a running container
  commit      Create a new image from a container's changes
  cp          Copy files/folders between a container and the local filesystem
  create      Create a new container
  diff        Inspect changes to files or directories on a container's filesystem
  events      Get real time events from the server
  export      Export a container's filesystem as a tar archive
  history     Show the history of an image
  import      Import the contents from a tarball to create a filesystem image
  inspect     Return low-level information on Docker objects
  kill        Kill one or more running containers
  load        Load an image from a tar archive or STDIN
  logs        Fetch the logs of a container
  pause       Pause all processes within one or more containers
  port        List port mappings or a specific mapping for the container
  rename      Rename a container
  restart     Restart one or more containers
  rm          Remove one or more containers
  rmi         Remove one or more images
  save        Save one or more images to a tar archive (streamed to STDOUT by default)
  start       Start one or more stopped containers
  stats       Display a live stream of container(s) resource usage statistics
  stop        Stop one or more running containers
  tag         Create a tag TARGET_IMAGE that refers to SOURCE_IMAGE
  top         Display the running processes of a container
  unpause     Unpause all processes within one or more containers
  update      Update configuration of one or more containers
  wait        Block until one or more containers stop, then print their exit codes

Global Options:
      --config string      Location of client config files (default "/home/ubuntu/.docker")
  -c, --context string     Name of the context to use to connect to the daemon (overrides DOCKER_HOST env var and default context set with "docker context use")
  -D, --debug              Enable debug mode
  -H, --host list          Daemon socket to connect to
  -l, --log-level string   Set the logging level ("debug", "info", "warn", "error", "fatal") (default "info")
      --tls                Use TLS; implied by --tlsverify
      --tlscacert string   Trust certs signed only by this CA (default "/home/ubuntu/.docker/ca.pem")
      --tlscert string     Path to TLS certificate file (default "/home/ubuntu/.docker/cert.pem")
      --tlskey string      Path to TLS key file (default "/home/ubuntu/.docker/key.pem")
      --tlsverify          Use TLS and verify the remote
  -v, --version            Print version information and quit

Run 'docker COMMAND --help' for more information on a command.

For more help on how to use Docker, head to https://docs.docker.com/go/guides/

```

Ahora podemos ejecutar contenedores utilizando imáges desde Docker hub:
```
$ docker container run -it ubuntu:18.04 bash

Unable to find image 'ubuntu:18.04' locally
18.04: Pulling from library/ubuntu
23884877105a: Pull complete 
bc38caa0f5b9: Pull complete 
2910811b6c42: Pull complete 
36505266dcc6: Pull complete 
Digest: sha256:3235326357dfb65f1781dbc4df3b834546d8bf914e82cce58e6e6b676e23ce8f
Status: Downloaded newer image for ubuntu:18.04
root@7bd71a3f1fa6:/# ls
bin  boot  dev  etc  home  lib  lib64  media  mnt  opt  proc  root  run  sbin  srv  sys  tmp  usr  var
root@7bd71a3f1fa6:/#
```


## 2. Imágenes y Docker hub

a) Buscar en el Docker Hub (https://hub.docker.com/) la imagen PHP
 
Verás que dispone de varias imágenes etiquetadas (tags) con Apache
 
b) Extraer la imagen php:apache desde el Docker Hub
```
$ docker image pull php:apache
apache: Pulling from library/php
27833a3ba0a5: Pull complete
2d79f6773a3c: Pull complete
f5dd9a448b82: Pull complete
95719e57e42b: Pull complete
cc75e951030f: Pull complete
78873f480bce: Pull complete
1b14116a29a2: Pull complete
95836a0750ea: Pull complete
7f419f7492e4: Pull complete
579567332cdb: Pull complete
9cc8d2923fb7: Pull complete
8dd306eba19f: Pull complete
329ff9bebb9e: Pull complete
Digest: sha256:df1b70df7eadbd94fee6432bfaba40ce54edc72fc9d4d0239780f294ae03c038
Status: Downloaded newer image for php:apache
```
c) Listar las imágenes locales
```
$ docker image ls
REPOSITORY      TAG              IMAGE ID         CREATED          SIZE
php             apache           1dffbbe4a5d3     13 days ago      378MB
```
d) Borrar una imagen
```
$ docker image rm php:apache
Untagged: php:apache
Untagged: ...
```

## 3. Contenedores.

a) Ejecutar la imagen en un contenedor (docker run)
```
$ docker container run -d -it --name front-end -p 8080:80 php:apache
```
Donde:

-d: (detach). Ejecución en segundo plano

-i: (interactive): Ejecución interactiva

-t: (Terminal): Ejecución en un terminal

--name nombre: asigna nombre al contenedor

-p p1:p2: Mapea el puerto p1 del host al puerto p2 del contenedor

httpd: imagen a ejecutar. Si no está disponible la obtiene del Docker hub

Comprueba que desde la IP de la máquina virtual accedes al servidor Apache del contenedor

b) Mostar listado de contenedores en ejecución
```
$ docker container ls
```
c) Parar un contenedor en ejecución
```
$ docker container stop front-end
```
d) Listar de todos los contenedores
```
$ docker container ls -a
```
e) Reiniciar el contenedor
```
$ docker container start front-end
```
f) Ejecutar un comando, en este caso la Shell bash, en el contenedor en ejecución
```
$ docker container exec -it front-end bash
```

También, de forma alternativa, puedes ejecutar un comando sobre un contenedor al iniciarlo con
```
$ docker container run -dit --name front-end -p 80:80 php:apache bash
```
En la Shell, crea un fichero index.html ejecutando:
```
  # echo '<h1>Hola Mundo</h1>' > index.html
```
Comprueba desde el navegador los cambios 

g) Eliminar un contenedor 
```
$ docker container stop front-end
$ docker container rm front-end
```

h) Asignar un volumen persistente, en este caso el directorio actual, al contenedor
```
$ docker container run -d --name front-end -p 8080:80 -v "$PWD":/var/www/html php:apache 
```

Incluir un fichero index.php con el contenido siguiente en el directorio actual de la máquina virtual y comprueba los resultados desde el navegador
```php
<h1>Mi WebApp</h1>
<?php
  echo "<h2>con PHP</h2>"
?>
```
Puedes eliminar un contenedor en ejecución con:
```
$ docker container rm -f front-end
```

i) Conectar (link) un contenedor con otro

Ejecutar un nuevo contenedor con mySQL; para ello, buscar en el Docker Hub la imagen MySQL para obtener más información. Como podrás ver en la documentación, ejecuta el contenedor con:
```
$ docker run -d --name database -e MYSQL_DATABASE=bd -e MYSQL_USER=web -e MYSQL_PASSWORD=web -e MYSQL_ROOT_PASSWORD=pass_root mysql:5.7
```
NOTA: En este ejemplo no estamos teniendo en cuenta la persistencia de los datos del contenedor, si deseamos hacerlo crearíamos un volumen para mapear la ruta /var/lib/mysql del contenedor.

Para comprobar los logs de un contenedor:
```
$ docker container logs database 
```
Para lanzar de nuevo el contenedor PHP-Apache pero ahora conectado con la Base de datos:
```
$ docker run -d --name front-end -p 8080:80 --link database -v "$PWD":/var/www/html php:apache 
```
Para instalar en el contenedor de PHP la librería para acceso a MySQL
```
$ docker container exec -it front-end bash 
root@56600b9eb1c1:/var/www/html# docker-php-ext-install mysqli
root@56600b9eb1c1:/var/www/html# docker-php-ext-enable mysqli
```

Para crear una imagen a partir del contenedor:
```
$ docker container commit -p front-end php:apache-mysql
```

Para subir la nueva imagen a Docker hub
```
$ docker login
$ docker image tag php:apache-mysql <usuasio_docker>/php-apache-mysql-app:v1
$ docker image push <usuasio_docker>/php-apache-mysql-app:v1
```
Puedes parar y borrar el contenedor front-end anterior y lanzar uno con la nueva imagen creada
```
$ docker container stop front-end
$ docker container rm front-end
$ docker run -d --name front-end -p 8080:80 --link database -v "$PWD":/var/www/html <usuasio_docker>/php-apache-app:v1
```
Modificar el fichero index.php con el siguiente contenido
```php
<h1>Mi WebApp</h1>
<?php
  echo "<h2>con PHP</h2>"
?>
<?php
$servername = "database";
$username = "web";
$password = "web";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
```

j) En esta guía, hemos trabajado con la red (network) por defecto (bridge), pero podríamos a ver creado nuevas redes para ubicar en ella los contenedores. Algunos comandos de interés son:

Mostrar las redes:
```
$ docker network ls 
```
Crear una red:
```
$ docker network create --driver bridge mi-red
```
Conectar un contenedor a una red:
```
$ docker network connect mi-contenedor
```
O bien, conectarlo al ejecutarlo
```
$ docker run --network=mi-red mi-imagen
```
Podemos inspeccionar las características de una red:
```
$ docker inspect mi-red
```


