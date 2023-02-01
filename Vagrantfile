# -- mode: ruby --
# vi: set ft=ruby :
#
Vagrant.configure("2") do |config|
    config.vm.box = "generic/debian11"
    config.vm.hostname = "grup3f5act16"
    config.vm.provider "virtualbox" do |mv|
        mv.name = "grup3f5act16"
        mv.memory = 2048
        mv.cpus = 2
        mv.customize ['modifyvm', :id, '--clipboard', 'bidirectional']
    end
    config.vm.network "public_network"
    config.vm.provision "shell", inline: <<-SHELL
        sudo apt-get update -y
        sudo apt-get install -y net-tools
        sudo apt-get install -y whois
        sudo apt-get -y install apt-transport-https ca-certificates curl gnupg2 software-properties-common
        curl -fsSL https://download.docker.com/linux/debian/gpg | sudo apt-key add -
        sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/debian $(lsb_release -cs) stable"
        sudo apt-get update -y
        sudo sudo apt-get -y install docker-ce docker-ce-cli containerd.io docker-compose
        sudo gpasswd -a vagrant docker
    SHELL
end