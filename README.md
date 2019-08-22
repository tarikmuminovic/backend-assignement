# Setup
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

## Local machine (in danish)

### Installation af Docker
Mac:

“Docker for Mac” kan downloades fra: 
[https://docs.docker.com/docker-for-mac/install/](https://docs.docker.com/docker-for-mac/install/)

"Docker for Mac" indeholder både Docker og Docker-compose 

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

### Opsætning
1. Hent projektet fra git (git clone https://github.com/UNIwise/backend-assignment.git)
2. Gå ind i src mappen og kør: make build
3. Kør: make run
4. Åben [http://localhost/car](http://localhost/car) det er her opgaven begynder :)
  

# Assignment (in danish)

Opgaven går ud på at vise basal forståelse for nogle af de frameworks vi anvender hos UNIwise. Mere specifikt er det to PHP frameworks: Doctrine og Symfony. 

Kort fortalt bruges Doctrine til at beskrive database entities og håndtere kommunikationen til databasen. Symfony anvendes til at opbygge API’er og services. 

For at løse opgaven skal følgende være installeret på computeren: 
```
Docker
Docker-compose
```

## Opgaven

Opgaven går ud på at lave REST endpoints til at arbejde med biler.
Bilerne skal have mærke, model, farve, benzin-niveau og en liste af ekstra udstyr.

Der skal være endpoints til at liste alle bilerne fra databasen.
Lave en filtreret visning af bilerne. Det kunne fx være en filtrering på et givet equipment eller lignende 
samt muligheden for at tilføje og fjerne ekstra udstyr fra bilerne.

Endpoints skal returnere json og skal kunne testes via fx. postman. Det er ikke nødvendigt at lave en ui til opgaven da fokus er på backenden.

Der er en mysql database i docker instansen som kan nåes på localhost:3306 med bruger wiseflow og kode test.
Brug doctrine til at beskrive entities i databasen.

Der kan læses om mapping på: 
https://www.doctrine-project.org/projects/doctrine-orm/en/2.6/reference/association-mapping.html#many-to-many-unidirectional

Når entities er oprettet, skal følgende kommando køres for at tabellerene oprettes/opdateres i databasen:
1) Make run (sørger for at tilføje de nye tabeller i databasen).

## Ekstra hygge opgave ;)
Skriv nogle kommentarer ned til hvad du synes om opgaven
    - Hvad kunne den mangle?
    - Hvor kunne den forbedres?
    - Andre kommentarer du synes kunne være relevante
