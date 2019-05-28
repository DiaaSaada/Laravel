# Laravel

Restrict phpMyAdmin Access

You can limit access to the phpMyAdmin interface to specific machines by editing the apache.conf file.


vim /etc/phpmyadmin/apache.conf

Navigate to the section starting with:

<Directory /usr/share/phpmyadmin>

Add the following lines at the top:

Order Deny,Allow

Deny from All

Allow from 192.168.1.0/24   #include your ip/subnet here
