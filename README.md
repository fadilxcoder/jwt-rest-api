# JSON Web Token

- `composer require firebase/php-jwt`
- In .htaccess, add `CGIPassAuth On`
- change `$secret_key` to complex long, binary string - <a href="https://www.grc.com/passwords.htm" target="_blank">Generator</a>
- http://localhost/jwt-rest-api/api/register.php

{
  "fname" : "Amie Schoen",
  "email" : "scruickshank@volkman.com",
  "password" : "tester"
}

- http://localhost/jwt-rest-api/api/login.php

{
  "email" : "scrum-master@volkman.com",
  "password" : "tester"
}

- After running login script via API Tester, return response :

{
  message": "Successful login.",
  "jwt": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJkYXRhIjp7ImlkIjoiMiIsImZ1bGxuYW1lIjoiU2NydW0gTWFzdGVyIn19.ZiwU643dDEfcUVb9b6g1kEvHkFACKRJQ60I7QjEYku8",
  "id": "2",
  "name": "Scrum Master"
}

- http://localhost/jwt-rest-api/api/protected.php
- Use `jwt` value as for header `Authorization` - `Bearer <jwt_value>` : `Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJkYXRhIjp7ImlkIjoiMiIsImZ1bGxuYW1lIjoiU2NydW0gTWFzdGVyIn19.ZiwU643dDEfcUVb9b6g1kEvHkFACKRJQ60I7QjEYku8`
- Response : 

{
  "message": "Access granted:"
}