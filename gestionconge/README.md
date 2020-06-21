# Brief_Demande-de-Conge
## -------------------------- Les fonctionnalités de l’application sont : -----------------
1. Une interface pour gérer les salariés (Ajout, Modification, Suppression)  avec le maximum des informations pour chaque employé (nom, prénom, CIN, tél., email, grade et service) dans la BD.
2. Possibilité de gérer les congés de chaque employé à condition de valider le congé par un administrateur. Les demandes sont caractérisées par : 
    - Numéro, date demande, type congé demandé, date de début, date de retour, nombre de jour et décision, 
    - Dont on a 3 type de congé :  
        * Congé annuel : 21 jours par an, cumulable.  
        * Congé exceptionnel ou permissions d’absence : 
            - 10 jours par an. Liée aux évènements familiaux. 
            - Le pèlerinage aux Lieux saints de l’Islam.  
        * Congé de maladie : Les congés pour raison de santé.  
        * Maternité 14 semaines.

***Pour les congés exceptionnels et les congés annuels, on ne compte que les jours ouvrables.***

3. Un calcul automatique et exact des soldes de congés.
4. Impression de bulletin de paiement pour les salariés et attestation de travail.
5. Deux interfaces d’authentification une pour l’administrateur et l’autre pour les salariés.
6. Un calendrier comporte les congés accordés selon les services

## ------------------------------------- Partie conception ------------------------------
Analyse et conception du projet en utilisant ```le langage de modélisation UML``` :
 - Le diagramme de cas d’utilisation
 - Le diagramme de séquence
 - Le diagramme d’activité de l’authentification
 - Le diagramme de classe 

**à partir du diagramme de classe modéliser une BD en réalisant un MPD**

## --------------------------------------- WorkFlow --------------------------------------
- Initialisez votre projet comme un dépôt public sur GitHub.
- Ajouter votre formateur comme collaborateur sur le repo.
- Configurez votre dépôt pour publier votre code sur les pages GitHub ou Netlify.
    
## ------------------------------------- Modalités du travail ----------------------------
Travail individuel

## -------------------------------------- Livrables --------------------------------------
- Site web hébergé et fonctionnel
- Repo github

## ------------------------------------- Liens Utiles ------------------------------------

# Backend
- CodeIgniter MVC framework http://www.codeigniter.com/
- RSA Encryption in pure PHP https://github.com/phpseclib/phpseclib
- Excel import/export https://github.com/PHPOffice/PHPExcel
- OAuth2 Server https://github.com/bshaffer/oauth2-server-php
- OAuth2 Client https://github.com/thephpleague/oauth2-client
- OAuth2 Google Provider https://github.com/thephpleague/oauth2-google
- Sabre/VObject https://github.com/fruux/sabre-vobject
- PHPMailer https://github.com/PHPMailer/PHPMailer
- PHPMailer CI wrapper https://github.com/ivantcholakov/codeigniter-phpmailer

# Frontend
- bootstrap 2.3, bootbox, datepicker and FontAwesome
- JQuery and JQuery-UI
- FullCalendar https://fullcalendar.io/
- Datatable https://datatables.net/
- RSA implementation https://github.com/travist/jsencrypt
- Moment (JS dates library) http://momentjs.com/
- Select2 https://select2.org/
- JavaScript Cookie https://github.com/js-cookie/js-cookie
- clipboard.js https://github.com/zenorocha/clipboard.js
- Google noto fonts https://www.google.com/get/noto/
