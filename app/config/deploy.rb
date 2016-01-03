set :symfony_console, "bin/console"
set :log_path, "var/logs"
set :cache_path, "var/cache"

set :application, "symfony-application.endroid.nl"
set :domain, "#{application}"
set :deploy_to, "/var/www/#{domain}"

set :repository, "git@github.com:endroid/symfony-application.git"
set :scm, :git

ssh_options[:use_agent] = false

set :user, "endroid"
set :use_sudo, false

role :web, "localhost"
role :app, "localhost", :primary => true

set :keep_releases, 2

set :shared_children, [log_path, cache_path, web_path + "/uploads"]

before "deploy:finalize_update" do
    run "cp #{release_path}/../../app/config/parameters.yml #{release_path}/app/config/parameters.yml"
    run "cp #{release_path}/../../reset.sh.dist #{release_path}/reset.sh"
end

after "deploy:finalize_update" do
  run "setfacl -R -m u:www-data:rwx -m u:endroid:rwx #{latest_release}/#{cache_path} #{latest_release}/#{log_path} #{latest_release}/web/uploads"
  run "setfacl -dR -m u:www-data:rwx -m u:endroid:rwx #{latest_release}/#{cache_path} #{latest_release}/#{log_path} #{latest_release}/web/uploads"
  run "cd #{latest_release} && export SYMFONY_ENV=prod && sh reset.sh"
end

after "deploy:restart", "deploy:cleanup"
