Vagrant.configure(2) do |config|
    config.vm.network :forwarded_port, guest: 22, host: 2222, id: "ssh", auto_correct: false
    config.vm.hostname = 'develop'
    config.vm.define "develop", primary:true do |sps|
        sps.vm.box = "debian/contrib-jessie64"
        sps.vm.network "private_network", ip: "10.10.0.2"
        sps.vm.provision :ansible do |ansible|
            ansible.inventory_path = "provision/hosts"
            ansible.playbook = "provision/playbook.yml"
        end
    end
end