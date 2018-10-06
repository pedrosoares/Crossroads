## Auth Microservice

This project use a microservice to controll the auth and permission

https://github.com/pedrosoares/AuthService

## Router File

/storage/app/router.json
``` 
[
  {
    "domain": "http://localhost:8080",
    "uri": "/help",
    "method": "get",
    "permission": []
  },{
    "domain": "http://localhost:8080",
    "uri": "/home/{id}",
    "method": "post",
    "permission": [
      "home"
    ]
  }
]
```