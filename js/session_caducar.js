var pepe;
function ini() {
  pepe = setTimeout('location="session_caduca.php"',600000); // 
  }
function parar() {
  clearTimeout(pepe);
  pepe = setTimeout('location="session_caduca.php"',600000); // 
}