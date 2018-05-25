set :deploy_to, "/home/vedjserver/#{fetch(:application)}"
set :use_sudo, false
set :laravel_set_acl_paths, false
set :laravel_upload_dotenv_file_on_deploy, false
set :composer_install_flags, '--no-dev --prefer-dist --no-interaction --optimize-autoloader'

SSHKit.config.command_map[:composer] = "php -d allow_url_fopen=true #{shared_path.join('composer')}"
SSHKit.config.command_map[:readlink] = "readlink"	#avoid problem with readlink

server "vedjserver.mycpnv.ch", user: "vedjserver", roles: %w{app db web},   ssh_options: {
     # keys: %w(./config/ssh_pub),
     forward_agent: false,
     auth_methods: %w(publickey)
}

after  'composer:run', "copy_dotenv"

#Copy .env in the current release
task :copy_dotenv do
    on roles(:all) do
        execute :cp, "#{shared_path}/.env #{release_path}/.env"
    end
end

Rake::Task["laravel:optimize"].clear_actions