Symfony Tunisia Community

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/b942e021-0577-42e7-846e-d21b46b3ee48/big.png)](https://insight.sensiolabs.com/projects/b942e021-0577-42e7-846e-d21b46b3ee48)

Install using Vagrant
---------------------

From the host

    git clone https://github.com/SymfonyTunisia/web-site.git
    cd web-site
    vagrant up
    vagrant ssh


Inside the VM

    cd /var/www/stc
    composer update
    make install


Edit your hosts file (/etc/hosts) and add :

    192.168.56.103  stc.dev www.stc.dev

You can now access project page at

[https://stc.dev/](https://stc.dev/) (prod env)

[https://stc.dev/app_dev.php](https://stc.dev/app_dev.php) (dev env)

[http://www.stc.dev:1080/](http://www.stc.dev:1080/) (mailcatcher)

Admin Mysql : [adminer](http://192.168.56.102/adminer/)
