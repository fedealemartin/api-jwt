# api-jwt-ciudades
 api con token para la consulta de ciudades

# levanta el servicio

php -S localhost:7000 -t public

# Registar un usuario en la API por POST

http://localhost:7000/api/register 

{
  "username": "fede6",
  "password": "12345"
}

# Autenticar un usuario en la API por POST

http://localhost:7000/api/login_check 

{
  "username": "fede6",
  "password": "12345"
}

# Consultar listado de ciudades

http://localhost:7000/api/ciudades

# Consultar documentacion

http://localhost:7000/api/doc


