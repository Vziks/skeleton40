server '89.207.88.3', user: 'webmaster', roles: %w{app db web}, port: 222

set :deploy_to, '/data/sites/skeleton4.demo.isobar.ru/public'
set :branch, 'dev'
set :controllers_to_clear, [] #keep app_dev.php
set :symfony_env,  "prod"

set :php_version, 71 #allowed: 55,56,70,71

set :default_env, {
    "PATH" => "/opt/php/php#{fetch(:php_version)}/bin:$PATH"
}
SSHKit.config.command_map[:composer] = "php#{fetch(:php_version)} $(which composer)"

after 'deploy:starting', 'deploy:phpinfo'
after 'deploy:finishing', 'deploy:fpm_nginx_restart'

namespace :deploy do
    desc "Using php version"
    task :phpinfo do
        on roles(:all) do
          puts "This php version will be used in all tasks"
          execute :php, "-v"
        end
    end

    task :fpm_nginx_restart do
        on roles(:app) do
          execute "sudo /etc/init.d/php-fpm-#{fetch(:php_version)} restart"
          execute "sudo /etc/init.d/nginx restart"
        end
    end
end