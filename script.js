function check()
{
 
if(document.getElementById('id_key').value == '')
{
//funzione che cambia il colore del bordo della casella di testo
document.getElementById('id_key').style.border = "1px solid #ff0000";
 
alert("inserisci il codice fiscale");
 
return false;
}
else
{
return true;
}
 
}