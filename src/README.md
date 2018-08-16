#UNIwise backend opgave:

Opgaven går ud på at vise basal forståelse for nogle af de frameworks vi anvender hos UNIwise. Mere specifik er det de to frameworks: Doctrine og Symfony. 

Kort fortalt bruges Doctrine til at beskrive databasen entities og håndtere kommunikationen til databasen. Symfony anvendes til at opbygge API’er og services. 

For at løse opgaven skal følgende være installeret på computeren: 
Docker
Docker-compose

##Installation af Docker:
Mac:
 “Docker for Mac” kan downloades fra: https://docs.docker.com/docker-for-mac/install/

Linux: 

##Opsætning: 
1. Hent projekt fra git (git clone git@github.com:UNIwise/backend-assignment.git)
2. Gå ind i src mappen og kør: Make build
3. Kør: Make run
 

##Opgaven:
Opgaverne bør løses i kronologisk rækkefølge, hvor sværhedsgraden vil variere. 

###Opgaver 1: Liste alle biler i databasen. 

Ved at kalde endpointet: http://localhost/car/all skal alle biler hentes ud af databasen og returneres som JSON. Det er vigtigt at de entities der hentes fra databasen ikke blot returneres direkte, men bliver puttet ind i en form for respons objekt. 

Husk at det er servicen der tager sig af at hente data ud af databasen og mappe det om til respons objekter. 

###Opgave 2: Tilføj ekstra endpoint til controlleren, hvor det er muligt at filtrere på bilmærker. 

Tilføj endpointet http://localhost/car/filtered til controlleren og gøre det muligt at filtrere på bilmærker.

###Opgave 3. Udvidelse af doctrine entities. 
Tilføje ekstra tabel til databasen med udstyr og forbind de to entities. Opdatere response til også at inkludere udstyr. 

Opret de to entities: Equipment og CarEquipment 
Opdatere deres definition, så de matcher det udleverede data og sørg for at relationerne er beskrevet imellem de tre objekter. Det skal være muligt for en bil at have mere end et udstyr tilknyttet og samtidig skal et udstyr kunne tilknyttes flere biler. 

Der kan læses om mapping på: 
https://www.doctrine-project.org/projects/doctrine-orm/en/2.6/reference/association-mapping.html

(Her udleveres queries til at indsætte data i databasen, så det bare at doctrine delen der skal laves)

###Opgave 4. Givet et bil Id og udstyrs Id, skal det være muligt at tilføje ekstra udstyr til en bil. 

Tilføj post endpointet, der givet Id’er på en bil og et udstyr opretter en forbindelse imellem dem. 

