# -*- mode: ruby -*-
#vi: set ft=ruby :

Vagrant.configure("2") do |config|
  # All Vagrant configuration is done here. The most common configuration
  # options are documented and commented below. For a complete reference,
  # please see the online documentation at vagrantup.com.

  # Every Vagrant virtual environment requires a box to build off of.
  config.vm.box = "precise-chef-omnibus"

  # The url from where the 'config.vm.box' box will be fetched if it
  # doesn't already exist on the user's system.
  config.vm.box_url = "http://grahamc.com/vagrant/ubuntu-12.04-omnibus-chef.box"

  # Create a forwarded port mapping which allows access to a specific port
  # within the machine from a port on the host machine. In the example below,
  # accessing "localhost:8080" will access port 80 on the guest machine.
  #config.vm.network :forwarded_port, guest: 80, host: 22800 
  #config.vm.network :forwarded_port, guest: 3306, host: 22801
  #config.vm.network :forwarded_port, guest: 22, host: 22802

  # Create a private network, which allows host-only access to the machine
  # using a specific IP.
  config.vm.network :private_network, ip: "10.0.0.200"
  #config.vm.network :private_network, ip: "192.168.0.100"
 
  # Create a public network, which generally matched to bridged network.
  # Bridged networks make the machine appear as another physical device on
  # your network.
  # config.vm.network :public_network

  # Share an additional folder to the guest VM. The first argument is
  # the path on the host to the actual folder. The second argument is
  # the path on the guest to mount the folder. And the optional third
  # argument is a set of non-required options.
  config.vm.synced_folder ".", "/var/www/apps/localhost"

  # Provider-specific configuration so you can fine-tune various
  # backing providers for Vagrant. These expose provider-specific options.
  # 
  config.vm.provider :virtualbox do |vb|
     # Use VBoxManage to customize the VM. For example to change memory:
     vb.customize ["modifyvm", :id, "--memory", "256"]
  end

  # Enable provisioning with chef solo, specifying a cookbooks path, roles
  # path, and data_bags path (all relative to this Vagrantfile), and adding
  # some recipes and/or roles.
  # 
  config.vm.provision :chef_solo do |chef|

    chef.cookbooks_path = "setup/vg_recipes/cookbooks"
    chef.roles_path     = "setup/vg_recipes/roles"
    chef.data_bags_path = "setup/vg_recipes/data_bags"

    db_pass = "save_money"

    chef.json = { 
    	:postfix => {
          :mail_type => "master",
          :mydomain  => "finappses.com",
          :myorigin  => "finappses.com"
        	},
    	:mysql => {
          :server_root_password   => db_pass,
          :server_repl_password   => db_pass,
          :server_debian_password => db_pass,
          :allow_remote_root      => true,
          :remove_test_database   => true,
          :bind_address           => '0.0.0.0'
        	},
    	:apache => {
    	   :owner => "vagrant",
    	   :group => "vagrant",
    	   :sites => [
    		    {:domain => 'localhost', :aka => [], :enable_ssl => false}
    	   ]
    	}
    }
    
    chef.add_recipe "apt"
    chef.add_recipe "build-essential"
    chef.add_recipe "postfix"
    chef.add_recipe "imagemagick"
    chef.add_recipe "mysql::client"
    chef.add_recipe "mysql::server"
    chef.add_recipe "apache"
    chef.add_recipe "apache-php54"

  end

end
