[program:che-worker]
process_name=%(program_name)s_%(process_num)02d
command=che-php /usr/local/che/web/artisan queue:work --sleep=3 --tries=3 --timeout=0
autostart=true
autorestart=true
stopasgroup=true
killasgroup=true
user=root
numprocs={{ $workersCount }}
redirect_stderr=true
stdout_logfile=/usr/local/che/web/storage/logs/worker.log
stopwaitsecs=3600
