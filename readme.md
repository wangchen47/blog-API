## composer install

执行该命令后：

1. 项目根目录下会新建一个 vendor 文件夹
2. 命令会将 composer.json 写的一些 lib 下载到 vendor 文件夹下

## composer dump-autoload

- 自动加载 composer.json 的 autoload。

## copy .env.example .env or cp .env.example .env

复制 .env.example 并新建一个 .env 文件

- Windows环境下 copy .env.example .env。
- Mac环境下 cp .env.example .env。

## php artisan key:generate

- 执行该命令会输出：**Application** **key** [XXXXXX] set successfully.
- 该命令会自动在 .env文件中生成**App_Key**的值。

## 修改 .env 数据库配置

- DB_CONNECTION 为你所使用的数据库类别，该项目使用 **mysql**，无需更改
- DB_HOST 为数据库访问的 IP，对于开发者，设置为 **localhost** 即可，无需更改
- DB_PORT 为数据库的访问端口，mysql 一般为 **3306**，无需更改
- DB_DATABASE 为该项目使用的数据库名称，我们定义为 **myblog**，如果本地数据无则新建一个 **myblog** 数据库
- DB_USERNAME 为数据库访问用户名，设置为你本地的数据库访问用户名即可
- DB_PASSWORD 为数据库用户的访问密码，设置为你本地的数据库访问用户密码即可

注意：

- 新建数据库的编码请使用 utf8mb4

## 新建 storage/logs/sql 文件夹

- Mac / Linux 命令：mkdir storage/logs/sql
- Windows：自己右键新建即可

如存在就不用新建了

- 由于引入了 mabiakek/laravel-sql-logger依赖包用来记录sql查询，所以需要新建sql文件夹。

## php artisan vendor:publish --all
- 将vendor下的一些文件复制到项目中。

## php artisan migrate

- 该命令会执行项目根目录 database/migrations 下文件代码，根据你本地数据库表情况执行对应的 migration
- 如果觉得创建出问题了，可以使用 php artisan migrate:rollback
- [更多命令，请看文档](https://laravel-china.org/docs/laravel/5.6/migrations/1400)

## php artisan db:seed

- 如果提示：Class XxxSeeder does not exist，请使用命令 composer dump-autoload 
- 再查看 **myblog** 数据库，你会发现数据被添加到一些表中。
- 具体代码请阅读 database/seeds 下面的 Seeds 代码文件。

## 配置 nginx 的 conf

我的本地配置文件如下：

    server {
        listen 8000; # IPv4
        server_name localhost;
    
        ## Parametrization using hostname of access and log filenames.
        access_log logs/localhost_access.log;
        error_log logs/localhost_error.log;
    
        ## Root and index files.
        root d:/Wang/myblog/public;
        index  index.php index.html index.htm;
    
        ## If no favicon exists return a 204 (no content error).
        location = /favicon.ico {
            try_files $uri =204;
            log_not_found off;
            access_log off;
        }
            
        ## Don't log robots.txt requests.
        location = /robots.txt {
            allow all;
            log_not_found off;
            access_log off;
        }
        ## Try the requested URI as files before handling it to PHP.
        location / {
    
            ## Regular PHP processing.
            location ~ \.php$ {
                try_files  $uri =404;
                fastcgi_pass   php_processes;
                fastcgi_index  index.php;
                fastcgi_param  SCRIPT_FILENAME    $document_root$fastcgi_script_name;
                include        fastcgi_params;
            }
    		
    		location / {
            try_files $uri $uri/ /index.php?$query_string;
      }
    
            ## Static files
            location ~* \.(?:css|gif|htc|ico|js|jpe?g|png|swf)$ {
                expires max;
                log_not_found off;
                ## No need to bleed constant updates. Send the all shebang in one
                ## fell swoop.
                tcp_nodelay off;
                ## Set the OS file cache.
                open_file_cache max=1000 inactive=120s;
                open_file_cache_valid 45s;
                open_file_cache_min_uses 2;
                open_file_cache_errors off;
            }
    
            ## Keep a tab on the 'big' static files.
            location ~* ^.+\.(?:ogg|pdf|pptx?)$ {
                expires 30d;
                ## No need to bleed constant updates. Send the all shebang in one
                ## fell swoop.
                tcp_nodelay off;
            }
            } # / location
    
    } 
    # End HTTP Server
    
    