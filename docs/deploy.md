## Deploy

### Authorization to deploy

To deploy the application you must generate a SSH key pair to the project and register it in the stage server. Use the a PHP container to generate the key pair.

    docker-compose run --rm php ssh-keygen -q -t rsa -f /root/.ssh/id_rsa -N ""

Get the generated key and add to the stage server  _authorized_keys_ file that you want deploy.

    docker-compose run --rm php cat /root/.ssh/id_rsa.pub

Copy the key and sent to who has the access to update the authorized keys.

### Deploying

The deploy is managed by Deployer. You need permission to do the deploy. You public key must be registered in the host. To run the deploy you just need

    docker-compose run --rm php dep deploy production --log deploy.log


