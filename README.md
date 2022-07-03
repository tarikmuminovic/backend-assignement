# Assignment completed 

- Exposed only one endpoint (http://localhost:8081/cars) to get all cars safely with limit and filter or sort them optionally
- Filter cars by multiple selections OR related of multiple filters AND related (example: "Give me cars with brand BMW or Mercedes colored Red or Green that have max gas economy of 55.6 MPG"):
- Sort ascending and descending by all fields
- Applies limit and offset (maximum allowed limit set to 100)
- OpenApi spec can be found in src/docs/public.json
- Example of unit test

### Curls to get all cars

Curl example of getting all cars without filters and default limit(20) & offset(0): 
``` 
curl --location --request GET 'http://localhost:8081/cars'
``` 
Curl example of getting all cars with filters and custom sort, limit & offset: 
``` 
curl --location --request GET 'http://localhost:8081/cars?brands=Mercedes,Bmw&colors=Red,Green&limit=50&minGasEconomy=1&maxGasEconomy=111&sortBy=gasEconomy&sortType=DESC'
``` 

Note: feed database with some random Car data before trying out API

### Run tests

To run tests run following:
``` 
docker exec -it [YOUR_PHP_FPM_CONTAINER_ID] bash
``` 
navigate to src/ directory
``` 
app/ext/vendor/phpunit/phpunit/phpunit [PATH_TO_TEST]
``` 

### Further steps

- Columns more frequently used as filters are good candidates for indexing and should be on top of where clause
- Apply rate limiting to GET Cars API


# Assignment

The assignment is intended to assist us in assessing your abilities to design solid architectures and write the code to support these.
The assignment should open up for discssuions in varous topics like testing, scalability, performance, maintainability, extendability etc..


The aim of the assigment is to make some REST endpoints to work with cars.
The cars have a brand, model, color, gas economy and a list of extra accessories.

There should be an endpoint to list all cars from the database
There should be an endpoint to filter the view of the cars and sort them. 
It should be possible to filter and sort on various things like equipment

The endpoint should return JSON. It's not the aim of the assignment to make any UI


There's a mysql database in the docker instance that is reachable on localhost:3306 with user: wiseflow and password: test.

The intention is to use doctrine to describe entities in the database.

However, the important focus is not necessarily on the frameworks, but on. For the record two of the PHP frameworks we currently use are: Doctrine og Symfony. 



# Setup (this is not required for the interview/test)

When entities are create the following command can be run to create/update tables in database:
1) Make run .


To have the system up and running the following should be installed on the computer: 
```
Docker
Docker-compose
```

## Virtual Machine (VM)
* Install VMWare Player / Fusion:  
    * Windows / Linux: https://www.vmware.com/products/workstation-player/workstation-player-evaluation.html
    * MacOS: https://www.vmware.com/products/fusion/fusion-evaluation.html

* Download the compressed VM image: https://wf-setup.s3-eu-west-1.amazonaws.com/developer/assignments/backend/backend-test.zip

* Unzip the contents to a folder on your local machine

* Open the 'backend-test/backed-test.vmx' file in VMWare Player/Fusion.
* When prompted, press the 'I copied it' button.

* The VM should now resume a previous state with the test environment running and the project opened in VS Code.
* You should be able to complete your assignment with tools provided in the VM, but feel free to install other tools to your liking.

Good luck :)

PS: The password for the 'developer' user is 'test'

### Install Docker
Mac:

“Docker for Mac” can be downloaded from: 
[https://docs.docker.com/docker-for-mac/install/](https://docs.docker.com/docker-for-mac/install/)

"Docker for Mac" contains both Docker and Docker-compose 

Ubuntu: 

* Docker:  
```
sudo apt-get update
sudo apt-get install -y curl
sudo su -c 'curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -'
sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable"
sudo apt-get -y update
sudo sudo apt-get install -y docker-ce
sudo update-rc.d docker enable
sudo groupadd docker
sudo gpasswd -a ${USER} docker
echo '{"storage-driver": "devicemapper"}' | sudo tee /etc/docker/daemon.json
sudo systemctl restart docker
sudo chown ${USER}:${USER} /var/run/docker.sock 
```

* Docker-compose:  
```
sudo curl -L -o /usr/local/bin/docker-compose $(curl -s https://api.github.com/repos/docker/compose/releases/latest | grep 'browser_' | cut -d\" -f4 | grep Linux | grep -v sha256)
sudo chmod +x /usr/local/bin/docker-compose
```

* Make:
```
sudo apt-get install -y make
```

### Setup
1. Get the project from git (git clone https://github.com/UNIwise/backend-assignment.git) or download the zip file
2. Navigate into the src foler and run: make build
3. Open [http://localhost/car](http://localhost/car) this is where the assignment starts. Enjoy :)
  
