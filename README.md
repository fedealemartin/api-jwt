# api-jwt-ciudades
 api con token para la consulta de ciudades

# levanta el servicio

php -S localhost:7000 -t public

# Registar un usuario en la API por POST

http://localhost:7000/api/register 

Body

{
  "username": "fede6",
  "password": "12345"
}

# Autenticar un usuario en la API por POST

http://localhost:7000/api/login_check 

Body Post

{
  "username": "fede6",
  "password": "12345"
}

Response

{
"token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpYXQiOjE3MDEwNzYyNDIsImV4cCI6MTcwMTA3OTg0Miwicm9sZXMiOlsiUk9MRV9BRE1JTiIsIlJPTEVfVVNFUiJdLCJ1c2VybmFtZSI6ImZlZGUifQ.F364cuJwSKBbwPC4novRK4P9SThId_VWK4o-a5PQHFQAUkTzYxglYQFHEpPNLfe4qPkRJFkM6Ufec8Hxd-8JoaJttY1gHRasq1TvdrJGkmi-naqZoGwK-kH_PXy5BZ1spBr-2FOvGNIpXex43VuKcjenIuaUf3M4wmz0uwtb_YdhQRcFOt431l9qtt0eOEJOidD-Uyxn4T5NCZSca0Y2YeG-DnQngeUGxkI1zPrCLFmgUS4qO5AjcGmXNQXdSQx63t6yKSIft3JOo6s1v5yQXtS60xpgMmUyGIQpNgzoaov53tISMmR__CYahsphXSiHUpkWcnK6WZW-Bx_C1Rf31g"

}

# Consultar listado de ciudades

Tipo autorizacion Bearer Token

ejemplo

token = eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpYXQiOjE3MDEwNzYyNDIsImV4cCI6MTcwMTA3OTg0Miwicm9sZXMiOlsiUk9MRV9BRE1JTiIsIlJPTEVfVVNFUiJdLCJ1c2VybmFtZSI6ImZlZGUifQ.F364cuJwSKBbwPC4novRK4P9SThId_VWK4o-a5PQHFQAUkTzYxglYQFHEpPNLfe4qPkRJFkM6Ufec8Hxd-8JoaJttY1gHRasq1TvdrJGkmi-naqZoGwK-kH_PXy5BZ1spBr-2FOvGNIpXex43VuKcjenIuaUf3M4wmz0uwtb_YdhQRcFOt431l9qtt0eOEJOidD-Uyxn4T5NCZSca0Y2YeG-DnQngeUGxkI1zPrCLFmgUS4qO5AjcGmXNQXdSQx63t6yKSIft3JOo6s1v5yQXtS60xpgMmUyGIQpNgzoaov53tISMmR__CYahsphXSiHUpkWcnK6WZW-Bx_C1Rf31g

http://localhost:7000/api/ciudades



# Consultar documentacion

http://localhost:7000/api/doc


