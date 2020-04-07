var request = new XMLHtppRequest();

request.open('GET','historique.php', true);
request.send();

if(XHR.status != '200' ) alert('problème côté serveur! '); 