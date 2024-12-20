<?php

namespace Modules\Email\App\Console;

use App\Models\DomainSslCertificate;
use App\CheBlade;
use App\CheConfig;
use App\UniversalDatabaseExecutor;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Blade;
use Modules\Email\App\Models\DomainDkim;
use Modules\LetsEncrypt\Models\LetsEncryptCertificate;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class SetupEmailServer extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'email:setup-email-server';

    /**
     * The console command description.
     */
    protected $description = 'Command description.';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $sslPaths = [];
        $findSSL = DomainSslCertificate::where('domain', setting('email.hostname'))->first();
        if ($findSSL) {
            $getSSLPaths = $findSSL->getSSLFiles();
            if ($getSSLPaths) {
                $sslPaths = $getSSLPaths;
            }
        }

        $mysqlDbDetails = [
            'host' => CheConfig::get('MYSQL_HOST', '127.0.0.1'),
            'port' => CheConfig::get('MYSQL_PORT', 3306),
            'username' => CheConfig::get('DB_USERNAME'),
            'password' => CheConfig::get('DB_PASSWORD'),
            'database' => CheConfig::get('DB_DATABASE'),
        ];

        if (!is_dir('/etc/postfix/sql')) {
            mkdir('/etc/postfix/sql');
        }

        $postfixMysqlVirtualAliasMapsCf = CheBlade::render('email::server.postfix.sql.mysql_virtual_alias_maps.cf', $mysqlDbDetails);
        file_put_contents('/etc/postfix/sql/mysql_virtual_alias_maps.cf', $postfixMysqlVirtualAliasMapsCf);

        $postfixMysqlVirtualDomainsMapsCf = CheBlade::render('email::server.postfix.sql.mysql_virtual_domains_maps.cf', $mysqlDbDetails);
        file_put_contents('/etc/postfix/sql/mysql_virtual_domains_maps.cf', $postfixMysqlVirtualDomainsMapsCf);

        $postfixMysqlVirtualMailboxMapsCf = CheBlade::render('email::server.postfix.sql.mysql_virtual_mailbox_maps.cf', $mysqlDbDetails);
        file_put_contents('/etc/postfix/sql/mysql_virtual_mailbox_maps.cf', $postfixMysqlVirtualMailboxMapsCf);

        $findDkim = DomainDkim::where('domain_name', setting('email.domain'))->first();
        $postfixMainCf = CheBlade::render('email::server.postfix.main.cf', [
            'hostName' => setting('email.hostname'),
            'domain' => setting('email.domain'),
            'sslPaths' => $sslPaths,
            'dkim' => $findDkim,
        ]);

        file_put_contents('/etc/postfix/main.cf', $postfixMainCf);

        $postfixMasterCf = CheBlade::render('email::server.postfix.master.cf');
        file_put_contents('/etc/postfix/master.cf', $postfixMasterCf);

        $openDkimConf = CheBlade::render('email::server.opendkim.opendkim.conf', [
            'hostName' => setting('email.hostname'),
            'domain' => setting('email.domain'),
            'mysqlConnectionUrl' =>  $mysqlDbDetails["username"] . ':' . $mysqlDbDetails['password'] . '@' . $mysqlDbDetails['host'] . '/' . $mysqlDbDetails['database'],
        ]);
        file_put_contents('/etc/opendkim.conf', $openDkimConf);

        shell_exec('systemctl restart dovecot');
        shell_exec('systemctl restart postfix');
        shell_exec('systemctl restart opendkim');
    }
}
