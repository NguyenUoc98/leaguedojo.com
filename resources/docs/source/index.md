---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://leaguedojo.vn/docs/collection.json)

<!-- END_INFO -->

#Khác


<!-- START_9dacb83a000873f5644fac30130aa46f -->
## The action to show widget output via ajax.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/arrilot/load-widget" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/arrilot/load-widget"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET arrilot/load-widget`


<!-- END_9dacb83a000873f5644fac30130aa46f -->

<!-- START_c6c5c00d6ac7f771f157dff4a2889b1a -->
## _debugbar/open
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/_debugbar/open" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/_debugbar/open"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": ""
}
```

### HTTP Request
`GET _debugbar/open`


<!-- END_c6c5c00d6ac7f771f157dff4a2889b1a -->

<!-- START_7b167949c615f4a7e7b673f8d5fdaf59 -->
## Return Clockwork output

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/_debugbar/clockwork/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/_debugbar/clockwork/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": ""
}
```

### HTTP Request
`GET _debugbar/clockwork/{id}`


<!-- END_7b167949c615f4a7e7b673f8d5fdaf59 -->

<!-- START_01a252c50bd17b20340dbc5a91cea4b7 -->
## _debugbar/telescope/{id}
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/_debugbar/telescope/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/_debugbar/telescope/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": ""
}
```

### HTTP Request
`GET _debugbar/telescope/{id}`


<!-- END_01a252c50bd17b20340dbc5a91cea4b7 -->

<!-- START_5f8a640000f5db43332951f0d77378c4 -->
## Return the stylesheets for the Debugbar

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/_debugbar/assets/stylesheets" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/_debugbar/assets/stylesheets"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": ""
}
```

### HTTP Request
`GET _debugbar/assets/stylesheets`


<!-- END_5f8a640000f5db43332951f0d77378c4 -->

<!-- START_db7a887cf930ce3c638a8708fd1a75ee -->
## Return the javascript for the Debugbar

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/_debugbar/assets/javascript" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/_debugbar/assets/javascript"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": ""
}
```

### HTTP Request
`GET _debugbar/assets/javascript`


<!-- END_db7a887cf930ce3c638a8708fd1a75ee -->

<!-- START_0973671c4f56e7409202dc85c868d442 -->
## Forget a cache key

> Example request:

```bash
curl -X DELETE \
    "http://leaguedojo.vn/_debugbar/cache/1/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/_debugbar/cache/1/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE _debugbar/cache/{key}/{tags?}`


<!-- END_0973671c4f56e7409202dc85c868d442 -->

<!-- START_dbbdec5432271c7207f66a514c3d40f3 -->
## Creates a new comment for given model.

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/comments" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/comments"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST comments`


<!-- END_dbbdec5432271c7207f66a514c3d40f3 -->

<!-- START_4be6c9e6ba186c0d21ea11a3179908f0 -->
## Deletes a comment.

> Example request:

```bash
curl -X DELETE \
    "http://leaguedojo.vn/comments/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/comments/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE comments/{comment}`


<!-- END_4be6c9e6ba186c0d21ea11a3179908f0 -->

<!-- START_f6fe4f38e514b3b17ba5e5c8942dfaca -->
## Updates the message of the comment.

> Example request:

```bash
curl -X PUT \
    "http://leaguedojo.vn/comments/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/comments/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT comments/{comment}`


<!-- END_f6fe4f38e514b3b17ba5e5c8942dfaca -->

<!-- START_a8b09ac8dfe0b5776e72b462914d3c05 -->
## Creates a reply &quot;comment&quot; to a comment.

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/comments/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/comments/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST comments/{comment}`


<!-- END_a8b09ac8dfe0b5776e72b462914d3c05 -->

<!-- START_66df3678904adde969490f2278b8f47f -->
## Authenticate the request for channel access.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/broadcasting/auth" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/broadcasting/auth"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (403):

```json
{
    "message": ""
}
```

### HTTP Request
`GET broadcasting/auth`

`POST broadcasting/auth`


<!-- END_66df3678904adde969490f2278b8f47f -->

<!-- START_53be1e9e10a08458929a2e0ea70ddb86 -->
## Show the application dashboard.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET /`


<!-- END_53be1e9e10a08458929a2e0ea70ddb86 -->

<!-- START_cb859c8e84c35d7133b6a6c8eac253f8 -->
## Show the application dashboard.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/home" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/home"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET home`


<!-- END_cb859c8e84c35d7133b6a6c8eac253f8 -->

<!-- START_538b44267d04deb40672f3b54a400f64 -->
## Paginate for students

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/fetch-data" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/fetch-data"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`GET fetch-data`


<!-- END_538b44267d04deb40672f3b54a400f64 -->

<!-- START_7bfa22a5b2bbaaa7af1ecdaf00901436 -->
## Return view NEWS

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/news" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/news"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET news`


<!-- END_7bfa22a5b2bbaaa7af1ecdaf00901436 -->

<!-- START_47f7fbb6bf98ef4cdc54b10f03cb3bdd -->
## Return view Profile

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/profile" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/profile"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET profile`


<!-- END_47f7fbb6bf98ef4cdc54b10f03cb3bdd -->

<!-- START_4ad44e3c9bf18dd82d8c1e551c1b81cb -->
## Display the specified resource.

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/vouchers/getVoucher" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/vouchers/getVoucher"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST vouchers/getVoucher`


<!-- END_4ad44e3c9bf18dd82d8c1e551c1b81cb -->

<!-- START_5410e2dad33090dc0ca30b84c71a4a6f -->
## Find room available

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/rooms/find" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/rooms/find"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST rooms/find`


<!-- END_5410e2dad33090dc0ca30b84c71a4a6f -->

<!-- START_d03c2c6f196aeebdc7c54cd99cfa0815 -->
## Book room

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/rooms/book" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/rooms/book"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST rooms/book`


<!-- END_d03c2c6f196aeebdc7c54cd99cfa0815 -->

<!-- START_d99cf1d74c3ee963c2ab70f207d29381 -->
## Cancel book room registration.

> Example request:

```bash
curl -X DELETE \
    "http://leaguedojo.vn/rooms/cancel-book/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/rooms/cancel-book/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE rooms/cancel-book/{id}`


<!-- END_d99cf1d74c3ee963c2ab70f207d29381 -->

<!-- START_ae13b3904c6c63dde284f95a90a967ab -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/dojos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/dojos"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET dojos`


<!-- END_ae13b3904c6c63dde284f95a90a967ab -->

<!-- START_6bcd11527549118a6550c92d371718c8 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/dojos/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/dojos/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "No query results for model [App\\Models\\Dojo]."
}
```

### HTTP Request
`GET dojos/{dojo}`


<!-- END_6bcd11527549118a6550c92d371718c8 -->

<!-- START_e448059c27b44e4d6f45041c75927d6b -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/posts/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/posts/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "No query results for model [App\\Models\\Post]."
}
```

### HTTP Request
`GET posts/{post}`


<!-- END_e448059c27b44e4d6f45041c75927d6b -->

<!-- START_1038e1f50fce16240ff593d39167770f -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/categories/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/categories/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "No query results for model [App\\Models\\Category]."
}
```

### HTTP Request
`GET categories/{category}`


<!-- END_1038e1f50fce16240ff593d39167770f -->

<!-- START_8cd8ed5c795fc5d0e3a364036cca7598 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/videos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/videos"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET videos`


<!-- END_8cd8ed5c795fc5d0e3a364036cca7598 -->

<!-- START_a1d84d8d9307edcc4ab58cd84b70ef2d -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/videos/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/videos/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "No query results for model [App\\Models\\Video]."
}
```

### HTTP Request
`GET videos/{video}`


<!-- END_a1d84d8d9307edcc4ab58cd84b70ef2d -->

<!-- START_7fe085c671e1b3d51e86136538b1d63f -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://leaguedojo.vn/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/users/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT users/{user}`

`PATCH users/{user}`


<!-- END_7fe085c671e1b3d51e86136538b1d63f -->

<!-- START_96a7f3d67a70d9260f051df89f014e57 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://leaguedojo.vn/students/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/students/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT students/{student}`

`PATCH students/{student}`


<!-- END_96a7f3d67a70d9260f051df89f014e57 -->

<!-- START_0edda28a418ec9d9239ba24205866bad -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/documents" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/documents"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET documents`


<!-- END_0edda28a418ec9d9239ba24205866bad -->

<!-- START_6d5e65be7d8aa25e95ac404bb5f36cb5 -->
## POST BRE(A)D - Store data.

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/documents" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/documents"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST documents`


<!-- END_6d5e65be7d8aa25e95ac404bb5f36cb5 -->

<!-- START_a68ddc0c9b4e7fd2fefcce1e416417e7 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/documents/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/documents/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "No query results for model [App\\Models\\Document]."
}
```

### HTTP Request
`GET documents/{document}`


<!-- END_a68ddc0c9b4e7fd2fefcce1e416417e7 -->

<!-- START_a92f9a522389cba6d19fe0acac0d0218 -->
## documents/{document}
> Example request:

```bash
curl -X PUT \
    "http://leaguedojo.vn/documents/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/documents/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT documents/{document}`

`PATCH documents/{document}`


<!-- END_a92f9a522389cba6d19fe0acac0d0218 -->

<!-- START_e763e44d43a38d89660572eb866aa48c -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/vouchers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/vouchers"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET vouchers`


<!-- END_e763e44d43a38d89660572eb866aa48c -->

<!-- START_f76bff366f921f446f1849ab7ce3a676 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/vouchers/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/vouchers/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET vouchers/{voucher}`


<!-- END_f76bff366f921f446f1849ab7ce3a676 -->

<!-- START_fe62841c55c8bc5d59c072b5cf1f4924 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/tuitions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/tuitions"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET tuitions`


<!-- END_fe62841c55c8bc5d59c072b5cf1f4924 -->

<!-- START_5744f145cb34700aca647d13824e8375 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/transfer-dojos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/transfer-dojos"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET transfer-dojos`


<!-- END_5744f145cb34700aca647d13824e8375 -->

<!-- START_70a49d9da7958622854481a7caff5d2f -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/transfer-dojos/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/transfer-dojos/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET transfer-dojos/create`


<!-- END_70a49d9da7958622854481a7caff5d2f -->

<!-- START_b1523999cf8953247ec776f159a01b56 -->
## POST BRE(A)D - Store data.

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/transfer-dojos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/transfer-dojos"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST transfer-dojos`


<!-- END_b1523999cf8953247ec776f159a01b56 -->

<!-- START_a1b2184064abffa4b42babd2e458ebea -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/rooms" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/rooms"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET rooms`


<!-- END_a1b2184064abffa4b42babd2e458ebea -->

<!-- START_a79685691ae6cd9614b8ee10fecd09a5 -->
## Creates a like to a comment.

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/comments/like/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/comments/like/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST comments/like/{comment}`


<!-- END_a79685691ae6cd9614b8ee10fecd09a5 -->

<!-- START_047beeabe0b033e934d30ac56cd2c51f -->
## Creates a like to a comment.

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/comments/unlike/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/comments/unlike/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST comments/unlike/{comment}`


<!-- END_047beeabe0b033e934d30ac56cd2c51f -->

<!-- START_dd40344ff790e704f94d5891462df771 -->
## Get all user liked this comment

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/comments/get-liker/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/comments/get-liker/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST comments/get-liker/{comment}`


<!-- END_dd40344ff790e704f94d5891462df771 -->

<!-- START_66e08d3cc8222573018fed49e121e96d -->
## Show the application&#039;s login form.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET login`


<!-- END_66e08d3cc8222573018fed49e121e96d -->

<!-- START_ba35aa39474cb98cfb31829e70eb8b74 -->
## Handle a login request to the application.

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST login`


<!-- END_ba35aa39474cb98cfb31829e70eb8b74 -->

<!-- START_e65925f23b9bc6b93d9356895f29f80c -->
## Log the user out of the application.

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST logout`


<!-- END_e65925f23b9bc6b93d9356895f29f80c -->

<!-- START_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->
## Show the application registration form.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET register`


<!-- END_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->

<!-- START_d7aad7b5ac127700500280d511a3db01 -->
## Handle a registration request for the application.

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST register`


<!-- END_d7aad7b5ac127700500280d511a3db01 -->

<!-- START_d72797bae6d0b1f3a341ebb1f8900441 -->
## Display the form to request a password reset link.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/password/reset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET password/reset`


<!-- END_d72797bae6d0b1f3a341ebb1f8900441 -->

<!-- START_feb40f06a93c80d742181b6ffb6b734e -->
## Send a reset link to the given user.

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/password/email" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/password/email"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST password/email`


<!-- END_feb40f06a93c80d742181b6ffb6b734e -->

<!-- START_e1605a6e5ceee9d1aeb7729216635fd7 -->
## Display the password reset view for the given token.

If no token is present, display the link request form.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/password/reset/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/password/reset/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET password/reset/{token}`


<!-- END_e1605a6e5ceee9d1aeb7729216635fd7 -->

<!-- START_cafb407b7a846b31491f97719bb15aef -->
## Reset the given user&#039;s password.

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/password/reset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST password/reset`


<!-- END_cafb407b7a846b31491f97719bb15aef -->

<!-- START_b77aedc454e9471a35dcb175278ec997 -->
## Display the password confirmation view.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/password/confirm" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/password/confirm"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET password/confirm`


<!-- END_b77aedc454e9471a35dcb175278ec997 -->

<!-- START_54462d3613f2262e741142161c0e6fea -->
## Confirm the given user&#039;s password.

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/password/confirm" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/password/confirm"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST password/confirm`


<!-- END_54462d3613f2262e741142161c0e6fea -->

<!-- START_c88fc6aa6eb1bee7a494d3c0a02038b1 -->
## Show the email verification notice.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/email/verify" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/email/verify"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET email/verify`


<!-- END_c88fc6aa6eb1bee7a494d3c0a02038b1 -->

<!-- START_6792598c74b34a271a2e3ab9365adf9e -->
## Mark the authenticated user&#039;s email address as verified.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/email/verify/1/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/email/verify/1/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET email/verify/{id}/{hash}`


<!-- END_6792598c74b34a271a2e3ab9365adf9e -->

<!-- START_38334d357e7e155bf70b9ab94619ca3d -->
## Resend the email verification notification.

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/email/resend" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/email/resend"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST email/resend`


<!-- END_38334d357e7e155bf70b9ab94619ca3d -->

<!-- START_d46f6bd9cb89f6ed45a8d91634f75cc2 -->
## notification/read
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/notification/read" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/notification/read"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST notification/read`


<!-- END_d46f6bd9cb89f6ed45a8d91634f75cc2 -->

<!-- START_03a76d7b7a89853a08696bfe71bbbba7 -->
## admin/login
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET admin/login`


<!-- END_03a76d7b7a89853a08696bfe71bbbba7 -->

<!-- START_fe5fe3a14f04e5648848f1a59ea3da82 -->
## admin/login
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/login`


<!-- END_fe5fe3a14f04e5648848f1a59ea3da82 -->

<!-- START_badb1c937a8c3e56e1a7253ca0cdfacc -->
## admin/hooks
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/hooks" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/hooks"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/hooks`


<!-- END_badb1c937a8c3e56e1a7253ca0cdfacc -->

<!-- START_432230a7228875b5baa5ba6b677e7e59 -->
## admin/hooks/{name}/enable
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/hooks/1/enable" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/hooks/1/enable"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/hooks/{name}/enable`


<!-- END_432230a7228875b5baa5ba6b677e7e59 -->

<!-- START_7e6424294561f7b0a67a2ae22585b58a -->
## admin/hooks/{name}/disable
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/hooks/1/disable" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/hooks/1/disable"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/hooks/{name}/disable`


<!-- END_7e6424294561f7b0a67a2ae22585b58a -->

<!-- START_f8daf1de1f5abe6cbc077b58025c2a27 -->
## admin/hooks/{name}/update
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/hooks/1/update" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/hooks/1/update"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/hooks/{name}/update`


<!-- END_f8daf1de1f5abe6cbc077b58025c2a27 -->

<!-- START_1cb7e187338d4692aa72da2bdd0f6e3c -->
## admin/hooks
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/hooks" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/hooks"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/hooks`


<!-- END_1cb7e187338d4692aa72da2bdd0f6e3c -->

<!-- START_3a2cf4434db868f89c6889d47f06d543 -->
## admin/hooks/{name}
> Example request:

```bash
curl -X DELETE \
    "http://leaguedojo.vn/admin/hooks/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/hooks/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE admin/hooks/{name}`


<!-- END_3a2cf4434db868f89c6889d47f06d543 -->

<!-- START_e40bc60a458a9740730202aaec04f818 -->
## admin
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin`


<!-- END_e40bc60a458a9740730202aaec04f818 -->

<!-- START_d31bd86158f6a5a775c92ea5b5554af9 -->
## admin/logout
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/logout`


<!-- END_d31bd86158f6a5a775c92ea5b5554af9 -->

<!-- START_576736063b80c937d4f6d7cf23dc713c -->
## admin/upload
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/upload" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/upload"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/upload`


<!-- END_576736063b80c937d4f6d7cf23dc713c -->

<!-- START_2b573e6e1d43c73d7cca65562a4e5b27 -->
## admin/profile
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/profile" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/profile"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/profile`


<!-- END_2b573e6e1d43c73d7cca65562a4e5b27 -->

<!-- START_e63b2f0bdbfc13b04a6e95ae794396e1 -->
## Order BREAD items.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/users/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/users/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/users/order`


<!-- END_e63b2f0bdbfc13b04a6e95ae794396e1 -->

<!-- START_3a1e6967e6fc6e75b206a116be6990c3 -->
## admin/users/action
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/users/action" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/users/action"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/users/action`


<!-- END_3a1e6967e6fc6e75b206a116be6990c3 -->

<!-- START_565aba9d8c16a122c48e9e43bfd74d39 -->
## admin/users/order
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/users/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/users/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/users/order`


<!-- END_565aba9d8c16a122c48e9e43bfd74d39 -->

<!-- START_75a91fccfa4b95106e7a8d363cebf5fa -->
## admin/users/{id}/restore
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/users/1/restore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/users/1/restore"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/users/{id}/restore`


<!-- END_75a91fccfa4b95106e7a8d363cebf5fa -->

<!-- START_581a493db08a1fee3478950d342176b3 -->
## Get BREAD relations data.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/users/relation" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/users/relation"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/users/relation`


<!-- END_581a493db08a1fee3478950d342176b3 -->

<!-- START_966aef287a2e493cadea71f52b022ceb -->
## admin/users/remove
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/users/remove" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/users/remove"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/users/remove`


<!-- END_966aef287a2e493cadea71f52b022ceb -->

<!-- START_7614490a3eef5fbcba402080d0369e6a -->
## admin/users
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/users`


<!-- END_7614490a3eef5fbcba402080d0369e6a -->

<!-- START_5480f74e868e50a30ac924242a423503 -->
## admin/users/create
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/users/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/users/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/users/create`


<!-- END_5480f74e868e50a30ac924242a423503 -->

<!-- START_84cdb3581c8df106c62233f1ebb35d8b -->
## POST BRE(A)D - Store data.

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/users`


<!-- END_84cdb3581c8df106c62233f1ebb35d8b -->

<!-- START_efce1b78e6391078c4024f200af60be8 -->
## admin/users/{user}
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/users/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/users/{user}`


<!-- END_efce1b78e6391078c4024f200af60be8 -->

<!-- START_f8b3cec767336a1c2280a2a3173678d9 -->
## admin/users/{user}/edit
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/users/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/users/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/users/{user}/edit`


<!-- END_f8b3cec767336a1c2280a2a3173678d9 -->

<!-- START_d7f417f614d8614811f624203f4e63cd -->
## admin/users/{user}
> Example request:

```bash
curl -X PUT \
    "http://leaguedojo.vn/admin/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/users/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT admin/users/{user}`

`PATCH admin/users/{user}`


<!-- END_d7f417f614d8614811f624203f4e63cd -->

<!-- START_d5165e9382f90b24649e6ea2a27ea85d -->
## admin/users/{user}
> Example request:

```bash
curl -X DELETE \
    "http://leaguedojo.vn/admin/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/users/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE admin/users/{user}`


<!-- END_d5165e9382f90b24649e6ea2a27ea85d -->

<!-- START_d33d20eb4b2146eabfbfc25696c0f1bc -->
## Order BREAD items.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/menus/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/menus/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/menus/order`


<!-- END_d33d20eb4b2146eabfbfc25696c0f1bc -->

<!-- START_5d01b72ada2ff1d9d4b29d15a504d55f -->
## admin/menus/action
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/menus/action" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/menus/action"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/menus/action`


<!-- END_5d01b72ada2ff1d9d4b29d15a504d55f -->

<!-- START_67cd26259e818cdf5671de42660cf592 -->
## admin/menus/order
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/menus/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/menus/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/menus/order`


<!-- END_67cd26259e818cdf5671de42660cf592 -->

<!-- START_69d1eed77c0cfb78139c587c1b8ee8d1 -->
## admin/menus/{id}/restore
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/menus/1/restore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/menus/1/restore"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/menus/{id}/restore`


<!-- END_69d1eed77c0cfb78139c587c1b8ee8d1 -->

<!-- START_d041193c8cda3598ee88c01cb4eb7d6f -->
## Get BREAD relations data.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/menus/relation" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/menus/relation"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/menus/relation`


<!-- END_d041193c8cda3598ee88c01cb4eb7d6f -->

<!-- START_ab85cc3a7ac21476439a36e859a12321 -->
## admin/menus/remove
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/menus/remove" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/menus/remove"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/menus/remove`


<!-- END_ab85cc3a7ac21476439a36e859a12321 -->

<!-- START_7a00d6c45032c03f4ae7d3beec00bb0e -->
## admin/menus
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/menus" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/menus"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/menus`


<!-- END_7a00d6c45032c03f4ae7d3beec00bb0e -->

<!-- START_e1fe606f36d5e0b828b7aa722d401ef1 -->
## admin/menus/create
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/menus/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/menus/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/menus/create`


<!-- END_e1fe606f36d5e0b828b7aa722d401ef1 -->

<!-- START_3ed1f4443877ce5c80a9f8ffdaa4e19c -->
## POST BRE(A)D - Store data.

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/menus" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/menus"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/menus`


<!-- END_3ed1f4443877ce5c80a9f8ffdaa4e19c -->

<!-- START_00170fd0636c9c905a3a765cd98a787e -->
## admin/menus/{menu}
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/menus/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/menus/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/menus/{menu}`


<!-- END_00170fd0636c9c905a3a765cd98a787e -->

<!-- START_6d83290f45dc6c023c2b03628b6cb2e8 -->
## admin/menus/{menu}/edit
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/menus/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/menus/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/menus/{menu}/edit`


<!-- END_6d83290f45dc6c023c2b03628b6cb2e8 -->

<!-- START_3cf779916ca1bbca41a784a2688af997 -->
## admin/menus/{menu}
> Example request:

```bash
curl -X PUT \
    "http://leaguedojo.vn/admin/menus/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/menus/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT admin/menus/{menu}`

`PATCH admin/menus/{menu}`


<!-- END_3cf779916ca1bbca41a784a2688af997 -->

<!-- START_72656acab42ef479668c40a1237c454c -->
## admin/menus/{menu}
> Example request:

```bash
curl -X DELETE \
    "http://leaguedojo.vn/admin/menus/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/menus/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE admin/menus/{menu}`


<!-- END_72656acab42ef479668c40a1237c454c -->

<!-- START_7028d468d28c67da726de2b6abbf0251 -->
## Order BREAD items.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/roles/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/roles/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/roles/order`


<!-- END_7028d468d28c67da726de2b6abbf0251 -->

<!-- START_a842e0d52349702c38488c7bd5eef6de -->
## admin/roles/action
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/roles/action" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/roles/action"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/roles/action`


<!-- END_a842e0d52349702c38488c7bd5eef6de -->

<!-- START_11400608993f2d581f446024f1456f47 -->
## admin/roles/order
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/roles/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/roles/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/roles/order`


<!-- END_11400608993f2d581f446024f1456f47 -->

<!-- START_4fda3e50934366eb4620d3d26faa6686 -->
## admin/roles/{id}/restore
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/roles/1/restore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/roles/1/restore"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/roles/{id}/restore`


<!-- END_4fda3e50934366eb4620d3d26faa6686 -->

<!-- START_fd6ce61c53bbc29b087e7e6bbb5cffa5 -->
## Get BREAD relations data.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/roles/relation" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/roles/relation"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/roles/relation`


<!-- END_fd6ce61c53bbc29b087e7e6bbb5cffa5 -->

<!-- START_1b4990c9ddbcbb4462d6ad2ec61e6042 -->
## admin/roles/remove
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/roles/remove" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/roles/remove"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/roles/remove`


<!-- END_1b4990c9ddbcbb4462d6ad2ec61e6042 -->

<!-- START_879622c0ac94a4a0f4d364d46a42bc7e -->
## admin/roles
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/roles" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/roles"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/roles`


<!-- END_879622c0ac94a4a0f4d364d46a42bc7e -->

<!-- START_d29246d3a43660bb5210bf9aff91c85a -->
## admin/roles/create
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/roles/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/roles/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/roles/create`


<!-- END_d29246d3a43660bb5210bf9aff91c85a -->

<!-- START_9117e54780cf55c5071dfb91b33aaef6 -->
## admin/roles
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/roles" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/roles"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/roles`


<!-- END_9117e54780cf55c5071dfb91b33aaef6 -->

<!-- START_13b678fa4fec2b2a37ef8510c152dc44 -->
## admin/roles/{role}
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/roles/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/roles/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/roles/{role}`


<!-- END_13b678fa4fec2b2a37ef8510c152dc44 -->

<!-- START_beee0bc2c2bf5945907dc7735ae5abfc -->
## admin/roles/{role}/edit
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/roles/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/roles/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/roles/{role}/edit`


<!-- END_beee0bc2c2bf5945907dc7735ae5abfc -->

<!-- START_c7dcda79da31b26bc24750dc109d9724 -->
## admin/roles/{role}
> Example request:

```bash
curl -X PUT \
    "http://leaguedojo.vn/admin/roles/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/roles/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT admin/roles/{role}`

`PATCH admin/roles/{role}`


<!-- END_c7dcda79da31b26bc24750dc109d9724 -->

<!-- START_bf3def166f3885500f81b51b4c2bd978 -->
## admin/roles/{role}
> Example request:

```bash
curl -X DELETE \
    "http://leaguedojo.vn/admin/roles/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/roles/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE admin/roles/{role}`


<!-- END_bf3def166f3885500f81b51b4c2bd978 -->

<!-- START_806e79f28f4e79d82482745b96823bcb -->
## Order BREAD items.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/posts/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/posts/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/posts/order`


<!-- END_806e79f28f4e79d82482745b96823bcb -->

<!-- START_7272370bfb7cf903ff8cb5cb3c48006b -->
## admin/posts/action
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/posts/action" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/posts/action"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/posts/action`


<!-- END_7272370bfb7cf903ff8cb5cb3c48006b -->

<!-- START_55a12aecb37d36c12d9c4ef402409a49 -->
## admin/posts/order
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/posts/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/posts/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/posts/order`


<!-- END_55a12aecb37d36c12d9c4ef402409a49 -->

<!-- START_b49dc999e16bd5893e8166904186c1d6 -->
## admin/posts/{id}/restore
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/posts/1/restore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/posts/1/restore"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/posts/{id}/restore`


<!-- END_b49dc999e16bd5893e8166904186c1d6 -->

<!-- START_7ee0590d04a6bb82d83da94a45dca5ad -->
## Get BREAD relations data.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/posts/relation" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/posts/relation"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/posts/relation`


<!-- END_7ee0590d04a6bb82d83da94a45dca5ad -->

<!-- START_b7506c5f241a4b12efba78709947cbff -->
## admin/posts/remove
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/posts/remove" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/posts/remove"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/posts/remove`


<!-- END_b7506c5f241a4b12efba78709947cbff -->

<!-- START_a8ef477b5c348c0f4b24b4f9b3bc90ad -->
## admin/posts
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/posts" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/posts"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/posts`


<!-- END_a8ef477b5c348c0f4b24b4f9b3bc90ad -->

<!-- START_2e37c90d67a96143863923ff5859c905 -->
## admin/posts/create
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/posts/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/posts/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/posts/create`


<!-- END_2e37c90d67a96143863923ff5859c905 -->

<!-- START_a67af5ec5245a6f896bb7a6169c39d6b -->
## POST BRE(A)D - Store data.

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/posts" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/posts"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/posts`


<!-- END_a67af5ec5245a6f896bb7a6169c39d6b -->

<!-- START_9b8f72bc4e4938f73c30968e35a571c8 -->
## admin/posts/{post}
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/posts/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/posts/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/posts/{post}`


<!-- END_9b8f72bc4e4938f73c30968e35a571c8 -->

<!-- START_649522dca2addc54d4862e8db6413ddd -->
## admin/posts/{post}/edit
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/posts/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/posts/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/posts/{post}/edit`


<!-- END_649522dca2addc54d4862e8db6413ddd -->

<!-- START_93e124efe376a044a56b19551240b7ba -->
## admin/posts/{post}
> Example request:

```bash
curl -X PUT \
    "http://leaguedojo.vn/admin/posts/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/posts/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT admin/posts/{post}`

`PATCH admin/posts/{post}`


<!-- END_93e124efe376a044a56b19551240b7ba -->

<!-- START_64495d195e98183da03753c6fe58a7f4 -->
## admin/posts/{post}
> Example request:

```bash
curl -X DELETE \
    "http://leaguedojo.vn/admin/posts/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/posts/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE admin/posts/{post}`


<!-- END_64495d195e98183da03753c6fe58a7f4 -->

<!-- START_45250c4c23ec5ab724e79385ec427495 -->
## Order BREAD items.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/students/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/students/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/students/order`


<!-- END_45250c4c23ec5ab724e79385ec427495 -->

<!-- START_6afeb7385098eafd6e27ddac89973266 -->
## admin/students/action
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/students/action" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/students/action"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/students/action`


<!-- END_6afeb7385098eafd6e27ddac89973266 -->

<!-- START_cc430bfcd0c746b9f658746ae964d792 -->
## admin/students/order
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/students/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/students/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/students/order`


<!-- END_cc430bfcd0c746b9f658746ae964d792 -->

<!-- START_9ad2baa338f9e12b691c639ee72e4297 -->
## admin/students/{id}/restore
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/students/1/restore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/students/1/restore"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/students/{id}/restore`


<!-- END_9ad2baa338f9e12b691c639ee72e4297 -->

<!-- START_af3b2d014981289e717d47926c10ff84 -->
## Get BREAD relations data.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/students/relation" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/students/relation"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/students/relation`


<!-- END_af3b2d014981289e717d47926c10ff84 -->

<!-- START_d81380bf165738fbcf2187ea8468020f -->
## admin/students/remove
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/students/remove" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/students/remove"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/students/remove`


<!-- END_d81380bf165738fbcf2187ea8468020f -->

<!-- START_71eee2ca08bbd9b020c8e630af077287 -->
## admin/students
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/students" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/students"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/students`


<!-- END_71eee2ca08bbd9b020c8e630af077287 -->

<!-- START_29c0b5b4a133df90f4303182fc1c36f9 -->
## admin/students/create
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/students/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/students/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/students/create`


<!-- END_29c0b5b4a133df90f4303182fc1c36f9 -->

<!-- START_716ef9ccc4dc3d506f2171ea495c72ed -->
## POST BRE(A)D - Store data.

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/students" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/students"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/students`


<!-- END_716ef9ccc4dc3d506f2171ea495c72ed -->

<!-- START_293c53fef9e9c5741ab5ee5a61c89dfb -->
## admin/students/{student}
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/students/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/students/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/students/{student}`


<!-- END_293c53fef9e9c5741ab5ee5a61c89dfb -->

<!-- START_e63eea0d1fc69129355b8a1e1ed45d6f -->
## admin/students/{student}/edit
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/students/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/students/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/students/{student}/edit`


<!-- END_e63eea0d1fc69129355b8a1e1ed45d6f -->

<!-- START_aa6922c71ea83efe1cf98f666f19be6a -->
## admin/students/{student}
> Example request:

```bash
curl -X PUT \
    "http://leaguedojo.vn/admin/students/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/students/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT admin/students/{student}`

`PATCH admin/students/{student}`


<!-- END_aa6922c71ea83efe1cf98f666f19be6a -->

<!-- START_e56b3f804cb85e9b4143f4005bdb70e3 -->
## admin/students/{student}
> Example request:

```bash
curl -X DELETE \
    "http://leaguedojo.vn/admin/students/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/students/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE admin/students/{student}`


<!-- END_e56b3f804cb85e9b4143f4005bdb70e3 -->

<!-- START_f5938bdc6b12dce99ec8fa7217a02c6e -->
## Order BREAD items.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/dojos/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/dojos/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/dojos/order`


<!-- END_f5938bdc6b12dce99ec8fa7217a02c6e -->

<!-- START_d2fe1a3aae37a1013c1b68edf95ca976 -->
## admin/dojos/action
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/dojos/action" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/dojos/action"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/dojos/action`


<!-- END_d2fe1a3aae37a1013c1b68edf95ca976 -->

<!-- START_52af064924c45a907153313a4f314d73 -->
## admin/dojos/order
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/dojos/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/dojos/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/dojos/order`


<!-- END_52af064924c45a907153313a4f314d73 -->

<!-- START_ba652555fc9bce03bac2690bc2a5c7bf -->
## admin/dojos/{id}/restore
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/dojos/1/restore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/dojos/1/restore"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/dojos/{id}/restore`


<!-- END_ba652555fc9bce03bac2690bc2a5c7bf -->

<!-- START_e355dd14de3278703b1d76c70f2dfeb8 -->
## Get BREAD relations data.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/dojos/relation" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/dojos/relation"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/dojos/relation`


<!-- END_e355dd14de3278703b1d76c70f2dfeb8 -->

<!-- START_e7cd0c0d7f5077018f6bdfe0ea3e97f9 -->
## admin/dojos/remove
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/dojos/remove" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/dojos/remove"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/dojos/remove`


<!-- END_e7cd0c0d7f5077018f6bdfe0ea3e97f9 -->

<!-- START_0bf224fc993a3a5c208e8b0e4a28a15e -->
## admin/dojos
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/dojos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/dojos"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/dojos`


<!-- END_0bf224fc993a3a5c208e8b0e4a28a15e -->

<!-- START_2d2bbc4130112a9e77a2e54c6333bae9 -->
## admin/dojos/create
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/dojos/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/dojos/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/dojos/create`


<!-- END_2d2bbc4130112a9e77a2e54c6333bae9 -->

<!-- START_bdf7736bca47f1a779934e15f03cd568 -->
## POST BRE(A)D - Store data.

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/dojos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/dojos"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/dojos`


<!-- END_bdf7736bca47f1a779934e15f03cd568 -->

<!-- START_f21149a7854a50994d3e9dc675b0ffb7 -->
## admin/dojos/{dojo}
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/dojos/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/dojos/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/dojos/{dojo}`


<!-- END_f21149a7854a50994d3e9dc675b0ffb7 -->

<!-- START_07050382097dea43ca93e858e3ecb2ec -->
## admin/dojos/{dojo}/edit
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/dojos/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/dojos/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/dojos/{dojo}/edit`


<!-- END_07050382097dea43ca93e858e3ecb2ec -->

<!-- START_a389304c1d3288d5363c4eceec7d16e8 -->
## admin/dojos/{dojo}
> Example request:

```bash
curl -X PUT \
    "http://leaguedojo.vn/admin/dojos/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/dojos/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT admin/dojos/{dojo}`

`PATCH admin/dojos/{dojo}`


<!-- END_a389304c1d3288d5363c4eceec7d16e8 -->

<!-- START_04818049cba49c87c592852a33a2ae2c -->
## admin/dojos/{dojo}
> Example request:

```bash
curl -X DELETE \
    "http://leaguedojo.vn/admin/dojos/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/dojos/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE admin/dojos/{dojo}`


<!-- END_04818049cba49c87c592852a33a2ae2c -->

<!-- START_9caefee5b09bb3bc02655c3964297787 -->
## Order BREAD items.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/slides/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/slides/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/slides/order`


<!-- END_9caefee5b09bb3bc02655c3964297787 -->

<!-- START_c267e54dc2ec42d09e3fd03c8deaf12f -->
## admin/slides/action
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/slides/action" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/slides/action"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/slides/action`


<!-- END_c267e54dc2ec42d09e3fd03c8deaf12f -->

<!-- START_e81e94c9d0811ac0858c222ec133e7fe -->
## admin/slides/order
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/slides/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/slides/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/slides/order`


<!-- END_e81e94c9d0811ac0858c222ec133e7fe -->

<!-- START_3479cf09737edcb9a91b8de557e6deca -->
## admin/slides/{id}/restore
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/slides/1/restore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/slides/1/restore"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/slides/{id}/restore`


<!-- END_3479cf09737edcb9a91b8de557e6deca -->

<!-- START_deb5f9881747880a5b44f53017619eca -->
## Get BREAD relations data.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/slides/relation" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/slides/relation"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/slides/relation`


<!-- END_deb5f9881747880a5b44f53017619eca -->

<!-- START_43f2b9c7bcaa1735762a9ea7a2579290 -->
## admin/slides/remove
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/slides/remove" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/slides/remove"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/slides/remove`


<!-- END_43f2b9c7bcaa1735762a9ea7a2579290 -->

<!-- START_f11a3fc3772f38252ce80df16681c3d9 -->
## admin/slides
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/slides" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/slides"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/slides`


<!-- END_f11a3fc3772f38252ce80df16681c3d9 -->

<!-- START_c3476bc4594c32aaa482dce967f69613 -->
## admin/slides/create
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/slides/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/slides/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/slides/create`


<!-- END_c3476bc4594c32aaa482dce967f69613 -->

<!-- START_84743bfc2f3fc7fc983dd19ca199778d -->
## POST BRE(A)D - Store data.

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/slides" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/slides"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/slides`


<!-- END_84743bfc2f3fc7fc983dd19ca199778d -->

<!-- START_c04d9a65aa6c95aac1d79821242d622d -->
## admin/slides/{slide}
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/slides/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/slides/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/slides/{slide}`


<!-- END_c04d9a65aa6c95aac1d79821242d622d -->

<!-- START_15142f48d57a38cb8834f4f2f6088dd8 -->
## admin/slides/{slide}/edit
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/slides/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/slides/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/slides/{slide}/edit`


<!-- END_15142f48d57a38cb8834f4f2f6088dd8 -->

<!-- START_1fc63dfac63f043f5ffed02ccaca669d -->
## admin/slides/{slide}
> Example request:

```bash
curl -X PUT \
    "http://leaguedojo.vn/admin/slides/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/slides/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT admin/slides/{slide}`

`PATCH admin/slides/{slide}`


<!-- END_1fc63dfac63f043f5ffed02ccaca669d -->

<!-- START_9eb66aae0d6fe792cdfc486fd16cae7f -->
## admin/slides/{slide}
> Example request:

```bash
curl -X DELETE \
    "http://leaguedojo.vn/admin/slides/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/slides/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE admin/slides/{slide}`


<!-- END_9eb66aae0d6fe792cdfc486fd16cae7f -->

<!-- START_c255512f5b0b5d6ac5327f989b5fb98b -->
## Order BREAD items.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/videos/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/videos/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/videos/order`


<!-- END_c255512f5b0b5d6ac5327f989b5fb98b -->

<!-- START_350c256d26013ae5982846473429b4a5 -->
## admin/videos/action
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/videos/action" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/videos/action"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/videos/action`


<!-- END_350c256d26013ae5982846473429b4a5 -->

<!-- START_12acaa0a76a8b88f2720dda5a151822c -->
## admin/videos/order
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/videos/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/videos/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/videos/order`


<!-- END_12acaa0a76a8b88f2720dda5a151822c -->

<!-- START_22070401b95cefe9d19cf5bfdd813690 -->
## admin/videos/{id}/restore
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/videos/1/restore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/videos/1/restore"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/videos/{id}/restore`


<!-- END_22070401b95cefe9d19cf5bfdd813690 -->

<!-- START_d00284d378b0c05b457b9028528a9896 -->
## Get BREAD relations data.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/videos/relation" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/videos/relation"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/videos/relation`


<!-- END_d00284d378b0c05b457b9028528a9896 -->

<!-- START_86488be11e1cee664896605d6b9ccd6f -->
## admin/videos/remove
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/videos/remove" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/videos/remove"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/videos/remove`


<!-- END_86488be11e1cee664896605d6b9ccd6f -->

<!-- START_712c974f59a4aed18772d07ed75fcdf6 -->
## admin/videos
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/videos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/videos"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/videos`


<!-- END_712c974f59a4aed18772d07ed75fcdf6 -->

<!-- START_9aa6c4879c6391ac14f26879f1cffbad -->
## admin/videos/create
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/videos/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/videos/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/videos/create`


<!-- END_9aa6c4879c6391ac14f26879f1cffbad -->

<!-- START_8d792039145140e5a8cfac3cfb255c6f -->
## POST BRE(A)D - Store data.

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/videos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/videos"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/videos`


<!-- END_8d792039145140e5a8cfac3cfb255c6f -->

<!-- START_c0dcd0f38ef6e4c6e9c40553c3b1bee1 -->
## admin/videos/{video}
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/videos/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/videos/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/videos/{video}`


<!-- END_c0dcd0f38ef6e4c6e9c40553c3b1bee1 -->

<!-- START_554d7c079e75bd58a9008e683c4acdf6 -->
## admin/videos/{video}/edit
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/videos/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/videos/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/videos/{video}/edit`


<!-- END_554d7c079e75bd58a9008e683c4acdf6 -->

<!-- START_987d08edfeb0310ede544d0c4571bfaa -->
## admin/videos/{video}
> Example request:

```bash
curl -X PUT \
    "http://leaguedojo.vn/admin/videos/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/videos/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT admin/videos/{video}`

`PATCH admin/videos/{video}`


<!-- END_987d08edfeb0310ede544d0c4571bfaa -->

<!-- START_8f8fd0541a0a6766573e18e68d6e7777 -->
## admin/videos/{video}
> Example request:

```bash
curl -X DELETE \
    "http://leaguedojo.vn/admin/videos/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/videos/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE admin/videos/{video}`


<!-- END_8f8fd0541a0a6766573e18e68d6e7777 -->

<!-- START_f6fe93a819260240ceb28a36fb903412 -->
## Order BREAD items.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/categories/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/categories/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/categories/order`


<!-- END_f6fe93a819260240ceb28a36fb903412 -->

<!-- START_cd3fa62a78fd13928be34bc6ad94228d -->
## admin/categories/action
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/categories/action" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/categories/action"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/categories/action`


<!-- END_cd3fa62a78fd13928be34bc6ad94228d -->

<!-- START_4cc09f271de71024b055b45b283d916b -->
## admin/categories/order
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/categories/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/categories/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/categories/order`


<!-- END_4cc09f271de71024b055b45b283d916b -->

<!-- START_38c925476b5efdcfa882167c1ed89903 -->
## admin/categories/{id}/restore
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/categories/1/restore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/categories/1/restore"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/categories/{id}/restore`


<!-- END_38c925476b5efdcfa882167c1ed89903 -->

<!-- START_19f7514a18df9d0339724e46df712a44 -->
## Get BREAD relations data.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/categories/relation" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/categories/relation"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/categories/relation`


<!-- END_19f7514a18df9d0339724e46df712a44 -->

<!-- START_37017a97de77e630e2870c5cad41a06c -->
## admin/categories/remove
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/categories/remove" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/categories/remove"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/categories/remove`


<!-- END_37017a97de77e630e2870c5cad41a06c -->

<!-- START_9ad08f5d810e5c0f73cfd7c7179bcb08 -->
## admin/categories
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/categories" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/categories"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/categories`


<!-- END_9ad08f5d810e5c0f73cfd7c7179bcb08 -->

<!-- START_ce2c6d94fb61a4bb262563b97e5f7aa3 -->
## admin/categories/create
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/categories/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/categories/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/categories/create`


<!-- END_ce2c6d94fb61a4bb262563b97e5f7aa3 -->

<!-- START_1c760aaf6fa8dfeb072fd2bcda7b6502 -->
## POST BRE(A)D - Store data.

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/categories" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/categories"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/categories`


<!-- END_1c760aaf6fa8dfeb072fd2bcda7b6502 -->

<!-- START_b8d01d523190686bd9a80be751978651 -->
## admin/categories/{category}
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/categories/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/categories/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/categories/{category}`


<!-- END_b8d01d523190686bd9a80be751978651 -->

<!-- START_ebad456b854a248f3c1181386c63d38c -->
## admin/categories/{category}/edit
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/categories/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/categories/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/categories/{category}/edit`


<!-- END_ebad456b854a248f3c1181386c63d38c -->

<!-- START_bf1e99f3a2fb6790a5899b4a7b6172e3 -->
## admin/categories/{category}
> Example request:

```bash
curl -X PUT \
    "http://leaguedojo.vn/admin/categories/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/categories/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT admin/categories/{category}`

`PATCH admin/categories/{category}`


<!-- END_bf1e99f3a2fb6790a5899b4a7b6172e3 -->

<!-- START_94773401487e54a4eef5ba3fffddfdb7 -->
## admin/categories/{category}
> Example request:

```bash
curl -X DELETE \
    "http://leaguedojo.vn/admin/categories/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/categories/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE admin/categories/{category}`


<!-- END_94773401487e54a4eef5ba3fffddfdb7 -->

<!-- START_7439bdae9a83e3146cea207c34f70138 -->
## Order BREAD items.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/playlists/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/playlists/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/playlists/order`


<!-- END_7439bdae9a83e3146cea207c34f70138 -->

<!-- START_6f413c229d07365d8b8512f23c708391 -->
## admin/playlists/action
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/playlists/action" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/playlists/action"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/playlists/action`


<!-- END_6f413c229d07365d8b8512f23c708391 -->

<!-- START_8a5eed016d34697c34a7c7caeea49b29 -->
## admin/playlists/order
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/playlists/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/playlists/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/playlists/order`


<!-- END_8a5eed016d34697c34a7c7caeea49b29 -->

<!-- START_06aa5a6b5668217cbf03918a1de1060d -->
## admin/playlists/{id}/restore
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/playlists/1/restore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/playlists/1/restore"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/playlists/{id}/restore`


<!-- END_06aa5a6b5668217cbf03918a1de1060d -->

<!-- START_0aeb6cd8e4aace119d00f1ae0ccd520a -->
## Get BREAD relations data.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/playlists/relation" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/playlists/relation"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/playlists/relation`


<!-- END_0aeb6cd8e4aace119d00f1ae0ccd520a -->

<!-- START_515afdbe751b9a6a2f34770838401b1e -->
## admin/playlists/remove
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/playlists/remove" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/playlists/remove"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/playlists/remove`


<!-- END_515afdbe751b9a6a2f34770838401b1e -->

<!-- START_edcc878028db86f57f2f9a3666475c45 -->
## admin/playlists
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/playlists" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/playlists"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/playlists`


<!-- END_edcc878028db86f57f2f9a3666475c45 -->

<!-- START_669be5d316539ec7ba57197b9a8b3a93 -->
## admin/playlists/create
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/playlists/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/playlists/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/playlists/create`


<!-- END_669be5d316539ec7ba57197b9a8b3a93 -->

<!-- START_84d206a7cf972150176071dfb3a03e38 -->
## POST BRE(A)D - Store data.

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/playlists" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/playlists"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/playlists`


<!-- END_84d206a7cf972150176071dfb3a03e38 -->

<!-- START_2c75d554ccb6bf5e0ddbcc3df0cbbbb6 -->
## admin/playlists/{playlist}
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/playlists/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/playlists/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/playlists/{playlist}`


<!-- END_2c75d554ccb6bf5e0ddbcc3df0cbbbb6 -->

<!-- START_cc1eac4a0577c3d9ccafc73fe253ce24 -->
## admin/playlists/{playlist}/edit
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/playlists/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/playlists/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/playlists/{playlist}/edit`


<!-- END_cc1eac4a0577c3d9ccafc73fe253ce24 -->

<!-- START_c5312377d3e4cf4a9d3d556e1232165e -->
## admin/playlists/{playlist}
> Example request:

```bash
curl -X PUT \
    "http://leaguedojo.vn/admin/playlists/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/playlists/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT admin/playlists/{playlist}`

`PATCH admin/playlists/{playlist}`


<!-- END_c5312377d3e4cf4a9d3d556e1232165e -->

<!-- START_03eaf723f8ed78781f16abb0f9b392a3 -->
## admin/playlists/{playlist}
> Example request:

```bash
curl -X DELETE \
    "http://leaguedojo.vn/admin/playlists/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/playlists/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE admin/playlists/{playlist}`


<!-- END_03eaf723f8ed78781f16abb0f9b392a3 -->

<!-- START_a594a2b9ce1e635910185b1692a838be -->
## Order BREAD items.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/documents/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/documents/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/documents/order`


<!-- END_a594a2b9ce1e635910185b1692a838be -->

<!-- START_858c6f95e12e5238953fa29c261d6502 -->
## admin/documents/action
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/documents/action" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/documents/action"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/documents/action`


<!-- END_858c6f95e12e5238953fa29c261d6502 -->

<!-- START_f2422d8e638a10429fcc8b8717689334 -->
## admin/documents/order
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/documents/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/documents/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/documents/order`


<!-- END_f2422d8e638a10429fcc8b8717689334 -->

<!-- START_56f8ec73c6f8f513332de6e5548e24d8 -->
## admin/documents/{id}/restore
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/documents/1/restore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/documents/1/restore"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/documents/{id}/restore`


<!-- END_56f8ec73c6f8f513332de6e5548e24d8 -->

<!-- START_c54f5bafedce84da2d21f6a9f3b68cea -->
## Get BREAD relations data.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/documents/relation" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/documents/relation"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/documents/relation`


<!-- END_c54f5bafedce84da2d21f6a9f3b68cea -->

<!-- START_ca62c667bc6c2ce1a7328f38ba9ffd1d -->
## admin/documents/remove
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/documents/remove" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/documents/remove"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/documents/remove`


<!-- END_ca62c667bc6c2ce1a7328f38ba9ffd1d -->

<!-- START_713a448482de9ec17cc7c56dc5e6fe59 -->
## admin/documents
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/documents" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/documents"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/documents`


<!-- END_713a448482de9ec17cc7c56dc5e6fe59 -->

<!-- START_8b28ad35baf91f7ff40d03ad89804e1c -->
## admin/documents/create
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/documents/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/documents/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/documents/create`


<!-- END_8b28ad35baf91f7ff40d03ad89804e1c -->

<!-- START_8a6d5254bfff6ea3090a2725d35a243a -->
## POST BRE(A)D - Store data.

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/documents" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/documents"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/documents`


<!-- END_8a6d5254bfff6ea3090a2725d35a243a -->

<!-- START_debd3c678d197a7cfa37f5db4af3dd41 -->
## admin/documents/{document}
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/documents/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/documents/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/documents/{document}`


<!-- END_debd3c678d197a7cfa37f5db4af3dd41 -->

<!-- START_5fe803bfb339b3db8f286ab83a334a7e -->
## admin/documents/{document}/edit
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/documents/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/documents/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/documents/{document}/edit`


<!-- END_5fe803bfb339b3db8f286ab83a334a7e -->

<!-- START_9afb7205b53d5e2a02e56dfbecc326d5 -->
## admin/documents/{document}
> Example request:

```bash
curl -X PUT \
    "http://leaguedojo.vn/admin/documents/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/documents/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT admin/documents/{document}`

`PATCH admin/documents/{document}`


<!-- END_9afb7205b53d5e2a02e56dfbecc326d5 -->

<!-- START_cb467af5d8f88c06cac5286c57e3ab92 -->
## admin/documents/{document}
> Example request:

```bash
curl -X DELETE \
    "http://leaguedojo.vn/admin/documents/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/documents/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE admin/documents/{document}`


<!-- END_cb467af5d8f88c06cac5286c57e3ab92 -->

<!-- START_e1955ebaa3fdb2e699ae263e768a4f2c -->
## Order BREAD items.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/tuitions/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/tuitions/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/tuitions/order`


<!-- END_e1955ebaa3fdb2e699ae263e768a4f2c -->

<!-- START_e399e63150a4e3a2fe8670f437f2d16e -->
## admin/tuitions/action
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/tuitions/action" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/tuitions/action"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/tuitions/action`


<!-- END_e399e63150a4e3a2fe8670f437f2d16e -->

<!-- START_63cf80b2fb89dbe1cd9f2d22ceb83c20 -->
## admin/tuitions/order
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/tuitions/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/tuitions/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/tuitions/order`


<!-- END_63cf80b2fb89dbe1cd9f2d22ceb83c20 -->

<!-- START_69acf866ed2e5777038f1b0a72e7d210 -->
## admin/tuitions/{id}/restore
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/tuitions/1/restore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/tuitions/1/restore"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/tuitions/{id}/restore`


<!-- END_69acf866ed2e5777038f1b0a72e7d210 -->

<!-- START_5194a59b94fce4b310de42075fc785e3 -->
## Get BREAD relations data.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/tuitions/relation" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/tuitions/relation"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/tuitions/relation`


<!-- END_5194a59b94fce4b310de42075fc785e3 -->

<!-- START_ab2213d7bfd4e053a81ccf69c3078327 -->
## admin/tuitions/remove
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/tuitions/remove" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/tuitions/remove"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/tuitions/remove`


<!-- END_ab2213d7bfd4e053a81ccf69c3078327 -->

<!-- START_420966fe8fc86b26bfc929855271fdac -->
## admin/tuitions
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/tuitions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/tuitions"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/tuitions`


<!-- END_420966fe8fc86b26bfc929855271fdac -->

<!-- START_bd67ac02250fbfa3f8490849e79cba6a -->
## admin/tuitions/create
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/tuitions/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/tuitions/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/tuitions/create`


<!-- END_bd67ac02250fbfa3f8490849e79cba6a -->

<!-- START_90b6e1f1031a2dee8e8ff9d71b90ed6c -->
## POST BRE(A)D - Store data.

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/tuitions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/tuitions"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/tuitions`


<!-- END_90b6e1f1031a2dee8e8ff9d71b90ed6c -->

<!-- START_00175d366d7ba79ec5c2d298f22db5be -->
## admin/tuitions/{tuition}
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/tuitions/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/tuitions/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/tuitions/{tuition}`


<!-- END_00175d366d7ba79ec5c2d298f22db5be -->

<!-- START_e74e1013c84c3baa06d1e7a91d65f6be -->
## admin/tuitions/{tuition}/edit
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/tuitions/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/tuitions/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/tuitions/{tuition}/edit`


<!-- END_e74e1013c84c3baa06d1e7a91d65f6be -->

<!-- START_5a77ab183c6cb9494f2a829e0ac762de -->
## admin/tuitions/{tuition}
> Example request:

```bash
curl -X PUT \
    "http://leaguedojo.vn/admin/tuitions/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/tuitions/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT admin/tuitions/{tuition}`

`PATCH admin/tuitions/{tuition}`


<!-- END_5a77ab183c6cb9494f2a829e0ac762de -->

<!-- START_4b003cffda0e17cc344fac340f7ba38d -->
## admin/tuitions/{tuition}
> Example request:

```bash
curl -X DELETE \
    "http://leaguedojo.vn/admin/tuitions/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/tuitions/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE admin/tuitions/{tuition}`


<!-- END_4b003cffda0e17cc344fac340f7ba38d -->

<!-- START_c51a73aad64b0ad0cf96d3de3f9d67c6 -->
## Order BREAD items.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/bonus-defaults/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/bonus-defaults/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/bonus-defaults/order`


<!-- END_c51a73aad64b0ad0cf96d3de3f9d67c6 -->

<!-- START_42cc67a711d4bb1bfb315e531dd782a2 -->
## admin/bonus-defaults/action
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/bonus-defaults/action" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/bonus-defaults/action"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/bonus-defaults/action`


<!-- END_42cc67a711d4bb1bfb315e531dd782a2 -->

<!-- START_f60f4e8d3e2f452a4049bace3c6450d3 -->
## admin/bonus-defaults/order
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/bonus-defaults/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/bonus-defaults/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/bonus-defaults/order`


<!-- END_f60f4e8d3e2f452a4049bace3c6450d3 -->

<!-- START_896e270a6821b6ffb8fd1eddc2a04fa6 -->
## admin/bonus-defaults/{id}/restore
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/bonus-defaults/1/restore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/bonus-defaults/1/restore"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/bonus-defaults/{id}/restore`


<!-- END_896e270a6821b6ffb8fd1eddc2a04fa6 -->

<!-- START_c9f82d60fee351d72c438c437acfcf2d -->
## Get BREAD relations data.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/bonus-defaults/relation" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/bonus-defaults/relation"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/bonus-defaults/relation`


<!-- END_c9f82d60fee351d72c438c437acfcf2d -->

<!-- START_57e19495b3a5ea0c5e52f7ea818385cf -->
## admin/bonus-defaults/remove
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/bonus-defaults/remove" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/bonus-defaults/remove"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/bonus-defaults/remove`


<!-- END_57e19495b3a5ea0c5e52f7ea818385cf -->

<!-- START_cf533b39de49fe5f7cecec0a30746c50 -->
## admin/bonus-defaults
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/bonus-defaults" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/bonus-defaults"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/bonus-defaults`


<!-- END_cf533b39de49fe5f7cecec0a30746c50 -->

<!-- START_de11911edc21c33a3a3cff2263c67e18 -->
## admin/bonus-defaults/create
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/bonus-defaults/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/bonus-defaults/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/bonus-defaults/create`


<!-- END_de11911edc21c33a3a3cff2263c67e18 -->

<!-- START_35659a8da361550e73014c465fc48bc0 -->
## POST BRE(A)D - Store data.

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/bonus-defaults" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/bonus-defaults"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/bonus-defaults`


<!-- END_35659a8da361550e73014c465fc48bc0 -->

<!-- START_018a90538ea9b7de2549161d9dc95f81 -->
## admin/bonus-defaults/{bonus_default}
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/bonus-defaults/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/bonus-defaults/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/bonus-defaults/{bonus_default}`


<!-- END_018a90538ea9b7de2549161d9dc95f81 -->

<!-- START_31ff5429b73725441987044a0384cec7 -->
## admin/bonus-defaults/{bonus_default}/edit
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/bonus-defaults/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/bonus-defaults/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/bonus-defaults/{bonus_default}/edit`


<!-- END_31ff5429b73725441987044a0384cec7 -->

<!-- START_b6f656c44e62edbd6decf3a59413243e -->
## admin/bonus-defaults/{bonus_default}
> Example request:

```bash
curl -X PUT \
    "http://leaguedojo.vn/admin/bonus-defaults/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/bonus-defaults/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT admin/bonus-defaults/{bonus_default}`

`PATCH admin/bonus-defaults/{bonus_default}`


<!-- END_b6f656c44e62edbd6decf3a59413243e -->

<!-- START_daf4fa19eef85c19e552d3ff9e8b1761 -->
## admin/bonus-defaults/{bonus_default}
> Example request:

```bash
curl -X DELETE \
    "http://leaguedojo.vn/admin/bonus-defaults/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/bonus-defaults/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE admin/bonus-defaults/{bonus_default}`


<!-- END_daf4fa19eef85c19e552d3ff9e8b1761 -->

<!-- START_4ef78e2b945de0c6d050daee26f4f611 -->
## Order BREAD items.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/vouchers/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/vouchers/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/vouchers/order`


<!-- END_4ef78e2b945de0c6d050daee26f4f611 -->

<!-- START_248d2eda8f0653571e2de537eef9281e -->
## admin/vouchers/action
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/vouchers/action" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/vouchers/action"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/vouchers/action`


<!-- END_248d2eda8f0653571e2de537eef9281e -->

<!-- START_432783146b5d169a66cb55597a683e61 -->
## admin/vouchers/order
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/vouchers/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/vouchers/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/vouchers/order`


<!-- END_432783146b5d169a66cb55597a683e61 -->

<!-- START_c5336933f9f341436c7c1213d7b6a506 -->
## admin/vouchers/{id}/restore
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/vouchers/1/restore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/vouchers/1/restore"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/vouchers/{id}/restore`


<!-- END_c5336933f9f341436c7c1213d7b6a506 -->

<!-- START_1fa6a80a86ed3d51389c6d87daf1f40a -->
## Get BREAD relations data.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/vouchers/relation" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/vouchers/relation"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/vouchers/relation`


<!-- END_1fa6a80a86ed3d51389c6d87daf1f40a -->

<!-- START_8272fc35bfab0cb26cc37f97f2b59b6c -->
## admin/vouchers/remove
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/vouchers/remove" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/vouchers/remove"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/vouchers/remove`


<!-- END_8272fc35bfab0cb26cc37f97f2b59b6c -->

<!-- START_56d6e8b31fdcebb7c47f27fc5f3ed2f5 -->
## admin/vouchers
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/vouchers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/vouchers"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/vouchers`


<!-- END_56d6e8b31fdcebb7c47f27fc5f3ed2f5 -->

<!-- START_2f8aa81ff288b16d706d4381e8bfe23c -->
## admin/vouchers/create
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/vouchers/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/vouchers/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/vouchers/create`


<!-- END_2f8aa81ff288b16d706d4381e8bfe23c -->

<!-- START_2ad7e8b924824f1025ac8cdc88524e53 -->
## POST BRE(A)D - Store data.

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/vouchers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/vouchers"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/vouchers`


<!-- END_2ad7e8b924824f1025ac8cdc88524e53 -->

<!-- START_93699fad42ac1fcc34c7b332207752a5 -->
## admin/vouchers/{voucher}
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/vouchers/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/vouchers/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/vouchers/{voucher}`


<!-- END_93699fad42ac1fcc34c7b332207752a5 -->

<!-- START_9ce77477f10cd9ef8356258c980ad78a -->
## admin/vouchers/{voucher}/edit
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/vouchers/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/vouchers/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/vouchers/{voucher}/edit`


<!-- END_9ce77477f10cd9ef8356258c980ad78a -->

<!-- START_d7d20ebcd7f880d2e484ea444957d31d -->
## admin/vouchers/{voucher}
> Example request:

```bash
curl -X PUT \
    "http://leaguedojo.vn/admin/vouchers/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/vouchers/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT admin/vouchers/{voucher}`

`PATCH admin/vouchers/{voucher}`


<!-- END_d7d20ebcd7f880d2e484ea444957d31d -->

<!-- START_4360af956c17f330aa74f32a0c73420d -->
## admin/vouchers/{voucher}
> Example request:

```bash
curl -X DELETE \
    "http://leaguedojo.vn/admin/vouchers/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/vouchers/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE admin/vouchers/{voucher}`


<!-- END_4360af956c17f330aa74f32a0c73420d -->

<!-- START_f6f9ce7c43e4049422ff5d000ced8054 -->
## Order BREAD items.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/tuition-policies/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/tuition-policies/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/tuition-policies/order`


<!-- END_f6f9ce7c43e4049422ff5d000ced8054 -->

<!-- START_d04cac428fd5c681028d170efc32f5a2 -->
## admin/tuition-policies/action
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/tuition-policies/action" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/tuition-policies/action"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/tuition-policies/action`


<!-- END_d04cac428fd5c681028d170efc32f5a2 -->

<!-- START_feecbc1fc810675b8b31ae2c6cea2cbc -->
## admin/tuition-policies/order
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/tuition-policies/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/tuition-policies/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/tuition-policies/order`


<!-- END_feecbc1fc810675b8b31ae2c6cea2cbc -->

<!-- START_edbc505846b430d0a9178b6b0a8fa113 -->
## admin/tuition-policies/{id}/restore
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/tuition-policies/1/restore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/tuition-policies/1/restore"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/tuition-policies/{id}/restore`


<!-- END_edbc505846b430d0a9178b6b0a8fa113 -->

<!-- START_877f1e2ada94b86e9e987ac8406761ae -->
## Get BREAD relations data.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/tuition-policies/relation" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/tuition-policies/relation"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/tuition-policies/relation`


<!-- END_877f1e2ada94b86e9e987ac8406761ae -->

<!-- START_7ebe24507a6b44ddf39577a1f342f1f2 -->
## admin/tuition-policies/remove
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/tuition-policies/remove" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/tuition-policies/remove"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/tuition-policies/remove`


<!-- END_7ebe24507a6b44ddf39577a1f342f1f2 -->

<!-- START_1d8d42a99e3cc9125c2ce00e727f98ea -->
## admin/tuition-policies
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/tuition-policies" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/tuition-policies"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/tuition-policies`


<!-- END_1d8d42a99e3cc9125c2ce00e727f98ea -->

<!-- START_a66461ea96955a3dae43e71573528b70 -->
## admin/tuition-policies/create
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/tuition-policies/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/tuition-policies/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/tuition-policies/create`


<!-- END_a66461ea96955a3dae43e71573528b70 -->

<!-- START_be9befd6aae39a85d1aeb3a97cbf0b81 -->
## POST BRE(A)D - Store data.

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/tuition-policies" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/tuition-policies"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/tuition-policies`


<!-- END_be9befd6aae39a85d1aeb3a97cbf0b81 -->

<!-- START_03fcb818ce44fb5bd637f422948d38eb -->
## admin/tuition-policies/{tuition_policy}
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/tuition-policies/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/tuition-policies/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/tuition-policies/{tuition_policy}`


<!-- END_03fcb818ce44fb5bd637f422948d38eb -->

<!-- START_f46ef3df2390b50b084be2c0bc132132 -->
## admin/tuition-policies/{tuition_policy}/edit
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/tuition-policies/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/tuition-policies/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/tuition-policies/{tuition_policy}/edit`


<!-- END_f46ef3df2390b50b084be2c0bc132132 -->

<!-- START_c76c6fe06bad6ffc9a79ef3413cd8fe6 -->
## admin/tuition-policies/{tuition_policy}
> Example request:

```bash
curl -X PUT \
    "http://leaguedojo.vn/admin/tuition-policies/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/tuition-policies/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT admin/tuition-policies/{tuition_policy}`

`PATCH admin/tuition-policies/{tuition_policy}`


<!-- END_c76c6fe06bad6ffc9a79ef3413cd8fe6 -->

<!-- START_6b0e485526a70e9301a9078cdc27baef -->
## admin/tuition-policies/{tuition_policy}
> Example request:

```bash
curl -X DELETE \
    "http://leaguedojo.vn/admin/tuition-policies/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/tuition-policies/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE admin/tuition-policies/{tuition_policy}`


<!-- END_6b0e485526a70e9301a9078cdc27baef -->

<!-- START_e1f0840e5c80951cfe0b1fee93c3c8bf -->
## Order BREAD items.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/transfer-dojos/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/transfer-dojos/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/transfer-dojos/order`


<!-- END_e1f0840e5c80951cfe0b1fee93c3c8bf -->

<!-- START_6ac42d26088fcbcf318fbb6dc5d84bb7 -->
## admin/transfer-dojos/action
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/transfer-dojos/action" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/transfer-dojos/action"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/transfer-dojos/action`


<!-- END_6ac42d26088fcbcf318fbb6dc5d84bb7 -->

<!-- START_11866270b8e2a9e3f369800f60afc086 -->
## admin/transfer-dojos/order
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/transfer-dojos/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/transfer-dojos/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/transfer-dojos/order`


<!-- END_11866270b8e2a9e3f369800f60afc086 -->

<!-- START_96d45a78fc953182e89c210eb335a40d -->
## admin/transfer-dojos/{id}/restore
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/transfer-dojos/1/restore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/transfer-dojos/1/restore"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/transfer-dojos/{id}/restore`


<!-- END_96d45a78fc953182e89c210eb335a40d -->

<!-- START_f04d75f53737222ae8e5ae6ab49c2b14 -->
## Get BREAD relations data.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/transfer-dojos/relation" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/transfer-dojos/relation"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/transfer-dojos/relation`


<!-- END_f04d75f53737222ae8e5ae6ab49c2b14 -->

<!-- START_5d9578f412a50ed6dc0954f0c8a544f3 -->
## admin/transfer-dojos/remove
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/transfer-dojos/remove" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/transfer-dojos/remove"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/transfer-dojos/remove`


<!-- END_5d9578f412a50ed6dc0954f0c8a544f3 -->

<!-- START_45bb9103276f0dbc2d95a04422fdcc25 -->
## admin/transfer-dojos
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/transfer-dojos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/transfer-dojos"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/transfer-dojos`


<!-- END_45bb9103276f0dbc2d95a04422fdcc25 -->

<!-- START_cc03a6a32a9105bfffed32b94d439072 -->
## admin/transfer-dojos/create
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/transfer-dojos/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/transfer-dojos/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/transfer-dojos/create`


<!-- END_cc03a6a32a9105bfffed32b94d439072 -->

<!-- START_0db77da65b64c53e2f6c1188e1d1bfe0 -->
## POST BRE(A)D - Store data.

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/transfer-dojos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/transfer-dojos"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/transfer-dojos`


<!-- END_0db77da65b64c53e2f6c1188e1d1bfe0 -->

<!-- START_5a82a7d10de4a301c66ba5b5b4aabf05 -->
## admin/transfer-dojos/{transfer_dojo}
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/transfer-dojos/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/transfer-dojos/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/transfer-dojos/{transfer_dojo}`


<!-- END_5a82a7d10de4a301c66ba5b5b4aabf05 -->

<!-- START_caece1f0c78ba545ff435a7ad892d67f -->
## admin/transfer-dojos/{transfer_dojo}/edit
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/transfer-dojos/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/transfer-dojos/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/transfer-dojos/{transfer_dojo}/edit`


<!-- END_caece1f0c78ba545ff435a7ad892d67f -->

<!-- START_2a892e5f077e6d4fc8b4340bf93fb76a -->
## admin/transfer-dojos/{transfer_dojo}
> Example request:

```bash
curl -X PUT \
    "http://leaguedojo.vn/admin/transfer-dojos/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/transfer-dojos/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT admin/transfer-dojos/{transfer_dojo}`

`PATCH admin/transfer-dojos/{transfer_dojo}`


<!-- END_2a892e5f077e6d4fc8b4340bf93fb76a -->

<!-- START_65827f2ecb6a300f6420a9d15e1840d8 -->
## admin/transfer-dojos/{transfer_dojo}
> Example request:

```bash
curl -X DELETE \
    "http://leaguedojo.vn/admin/transfer-dojos/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/transfer-dojos/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE admin/transfer-dojos/{transfer_dojo}`


<!-- END_65827f2ecb6a300f6420a9d15e1840d8 -->

<!-- START_b43bf3768c0868ffebd2a82a71020e1d -->
## Order BREAD items.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/operation-logs/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/operation-logs/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/operation-logs/order`


<!-- END_b43bf3768c0868ffebd2a82a71020e1d -->

<!-- START_464340d05d49ea7c42e034c8e218127a -->
## admin/operation-logs/action
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/operation-logs/action" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/operation-logs/action"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/operation-logs/action`


<!-- END_464340d05d49ea7c42e034c8e218127a -->

<!-- START_d18546bf1139a5832a3b90a4326dfd2e -->
## admin/operation-logs/order
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/operation-logs/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/operation-logs/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/operation-logs/order`


<!-- END_d18546bf1139a5832a3b90a4326dfd2e -->

<!-- START_4c33550c96fda065ad5e1929a20d837f -->
## admin/operation-logs/{id}/restore
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/operation-logs/1/restore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/operation-logs/1/restore"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/operation-logs/{id}/restore`


<!-- END_4c33550c96fda065ad5e1929a20d837f -->

<!-- START_6fa53bf5c472b317826de4cd680ae64e -->
## Get BREAD relations data.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/operation-logs/relation" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/operation-logs/relation"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/operation-logs/relation`


<!-- END_6fa53bf5c472b317826de4cd680ae64e -->

<!-- START_bf8db22eb55871e656963f6e2ee88768 -->
## admin/operation-logs/remove
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/operation-logs/remove" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/operation-logs/remove"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/operation-logs/remove`


<!-- END_bf8db22eb55871e656963f6e2ee88768 -->

<!-- START_518396e458fc15f56d94f5bd99e5a74a -->
## admin/operation-logs
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/operation-logs" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/operation-logs"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/operation-logs`


<!-- END_518396e458fc15f56d94f5bd99e5a74a -->

<!-- START_372122321ceb6b1ddec539001ef2453a -->
## admin/operation-logs/create
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/operation-logs/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/operation-logs/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/operation-logs/create`


<!-- END_372122321ceb6b1ddec539001ef2453a -->

<!-- START_32acfa9a4698270313da812383495b4c -->
## POST BRE(A)D - Store data.

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/operation-logs" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/operation-logs"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/operation-logs`


<!-- END_32acfa9a4698270313da812383495b4c -->

<!-- START_92846ff22a40c0ca21dd72a4e5d76577 -->
## admin/operation-logs/{operation_log}
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/operation-logs/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/operation-logs/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/operation-logs/{operation_log}`


<!-- END_92846ff22a40c0ca21dd72a4e5d76577 -->

<!-- START_a97d4c33263b546ecc527ed7a6205203 -->
## admin/operation-logs/{operation_log}/edit
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/operation-logs/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/operation-logs/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/operation-logs/{operation_log}/edit`


<!-- END_a97d4c33263b546ecc527ed7a6205203 -->

<!-- START_c9e7bd4114310c80e37669c636d479cc -->
## admin/operation-logs/{operation_log}
> Example request:

```bash
curl -X PUT \
    "http://leaguedojo.vn/admin/operation-logs/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/operation-logs/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT admin/operation-logs/{operation_log}`

`PATCH admin/operation-logs/{operation_log}`


<!-- END_c9e7bd4114310c80e37669c636d479cc -->

<!-- START_f0d6179a3aca28a90ddfa418144ea2fc -->
## admin/operation-logs/{operation_log}
> Example request:

```bash
curl -X DELETE \
    "http://leaguedojo.vn/admin/operation-logs/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/operation-logs/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE admin/operation-logs/{operation_log}`


<!-- END_f0d6179a3aca28a90ddfa418144ea2fc -->

<!-- START_9522e0c625ca91a9cb9b1f31ed7f7af7 -->
## Order BREAD items.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/achievements/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/achievements/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/achievements/order`


<!-- END_9522e0c625ca91a9cb9b1f31ed7f7af7 -->

<!-- START_260b8f40e023d915b9a7e11ee354caf6 -->
## admin/achievements/action
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/achievements/action" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/achievements/action"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/achievements/action`


<!-- END_260b8f40e023d915b9a7e11ee354caf6 -->

<!-- START_1cd7d2a7d7c377d735bd5abf6ab22521 -->
## admin/achievements/order
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/achievements/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/achievements/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/achievements/order`


<!-- END_1cd7d2a7d7c377d735bd5abf6ab22521 -->

<!-- START_85682e16cf7df938b8fb17145e01e8a2 -->
## admin/achievements/{id}/restore
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/achievements/1/restore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/achievements/1/restore"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/achievements/{id}/restore`


<!-- END_85682e16cf7df938b8fb17145e01e8a2 -->

<!-- START_af42a0eb72f96ecb0ea4739253e06c02 -->
## Get BREAD relations data.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/achievements/relation" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/achievements/relation"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/achievements/relation`


<!-- END_af42a0eb72f96ecb0ea4739253e06c02 -->

<!-- START_83dd15c733901e189f2df4cf5f95f287 -->
## admin/achievements/remove
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/achievements/remove" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/achievements/remove"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/achievements/remove`


<!-- END_83dd15c733901e189f2df4cf5f95f287 -->

<!-- START_9a5f4fd2ca836dd04c551c5ab8fd1eda -->
## admin/achievements
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/achievements" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/achievements"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/achievements`


<!-- END_9a5f4fd2ca836dd04c551c5ab8fd1eda -->

<!-- START_eab2fa52e00b68374f69fd431e3104c3 -->
## admin/achievements/create
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/achievements/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/achievements/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/achievements/create`


<!-- END_eab2fa52e00b68374f69fd431e3104c3 -->

<!-- START_e6e2b236803527b0af7649df7e0c8d56 -->
## POST BRE(A)D - Store data.

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/achievements" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/achievements"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/achievements`


<!-- END_e6e2b236803527b0af7649df7e0c8d56 -->

<!-- START_182b7487fc8be50e0d5952a981606a6c -->
## admin/achievements/{achievement}
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/achievements/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/achievements/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/achievements/{achievement}`


<!-- END_182b7487fc8be50e0d5952a981606a6c -->

<!-- START_23cdb7a324ab896928312f5c264ec81c -->
## admin/achievements/{achievement}/edit
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/achievements/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/achievements/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/achievements/{achievement}/edit`


<!-- END_23cdb7a324ab896928312f5c264ec81c -->

<!-- START_cf1b451f4626471463a8c8ba041cbbd8 -->
## admin/achievements/{achievement}
> Example request:

```bash
curl -X PUT \
    "http://leaguedojo.vn/admin/achievements/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/achievements/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT admin/achievements/{achievement}`

`PATCH admin/achievements/{achievement}`


<!-- END_cf1b451f4626471463a8c8ba041cbbd8 -->

<!-- START_4f1485a7cc4e2f10ba9fdb341e3ce61c -->
## admin/achievements/{achievement}
> Example request:

```bash
curl -X DELETE \
    "http://leaguedojo.vn/admin/achievements/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/achievements/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE admin/achievements/{achievement}`


<!-- END_4f1485a7cc4e2f10ba9fdb341e3ce61c -->

<!-- START_5d48fbfecb38c131f0b65ebf749894d3 -->
## Order BREAD items.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/test-scores/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/test-scores/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/test-scores/order`


<!-- END_5d48fbfecb38c131f0b65ebf749894d3 -->

<!-- START_517656255834a5f3f7597884abfe97f7 -->
## admin/test-scores/action
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/test-scores/action" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/test-scores/action"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/test-scores/action`


<!-- END_517656255834a5f3f7597884abfe97f7 -->

<!-- START_16ff335d20b58f6988b8329baaa87179 -->
## admin/test-scores/order
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/test-scores/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/test-scores/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/test-scores/order`


<!-- END_16ff335d20b58f6988b8329baaa87179 -->

<!-- START_eb5b03783d5dd89ee5ba7dfc4f39394b -->
## admin/test-scores/{id}/restore
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/test-scores/1/restore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/test-scores/1/restore"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/test-scores/{id}/restore`


<!-- END_eb5b03783d5dd89ee5ba7dfc4f39394b -->

<!-- START_4966f9b4f01f0d8d9a292ce817969513 -->
## Get BREAD relations data.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/test-scores/relation" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/test-scores/relation"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/test-scores/relation`


<!-- END_4966f9b4f01f0d8d9a292ce817969513 -->

<!-- START_d65c4d7638594231ed34e8294ae025bf -->
## admin/test-scores/remove
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/test-scores/remove" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/test-scores/remove"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/test-scores/remove`


<!-- END_d65c4d7638594231ed34e8294ae025bf -->

<!-- START_a376cda740dab5303b4b4d46973bbfe4 -->
## admin/test-scores
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/test-scores" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/test-scores"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/test-scores`


<!-- END_a376cda740dab5303b4b4d46973bbfe4 -->

<!-- START_788126de0f4b9b0df2784d725bcbd9c4 -->
## admin/test-scores/create
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/test-scores/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/test-scores/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/test-scores/create`


<!-- END_788126de0f4b9b0df2784d725bcbd9c4 -->

<!-- START_7de0eb6c70384bb6eb452ef7146c50b8 -->
## POST BRE(A)D - Store data.

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/test-scores" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/test-scores"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/test-scores`


<!-- END_7de0eb6c70384bb6eb452ef7146c50b8 -->

<!-- START_e4a5ef2888e58ce5ab15684b335715f6 -->
## admin/test-scores/{test_score}
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/test-scores/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/test-scores/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/test-scores/{test_score}`


<!-- END_e4a5ef2888e58ce5ab15684b335715f6 -->

<!-- START_8e8519a8a13983aa3c6d6d48b5c75301 -->
## admin/test-scores/{test_score}/edit
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/test-scores/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/test-scores/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/test-scores/{test_score}/edit`


<!-- END_8e8519a8a13983aa3c6d6d48b5c75301 -->

<!-- START_5a45e54ea077bbbda269e083d6e8bebb -->
## admin/test-scores/{test_score}
> Example request:

```bash
curl -X PUT \
    "http://leaguedojo.vn/admin/test-scores/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/test-scores/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT admin/test-scores/{test_score}`

`PATCH admin/test-scores/{test_score}`


<!-- END_5a45e54ea077bbbda269e083d6e8bebb -->

<!-- START_a406b1d245deff3cd69bcbb15e309f9b -->
## admin/test-scores/{test_score}
> Example request:

```bash
curl -X DELETE \
    "http://leaguedojo.vn/admin/test-scores/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/test-scores/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE admin/test-scores/{test_score}`


<!-- END_a406b1d245deff3cd69bcbb15e309f9b -->

<!-- START_5976d6ca6beff42c128a7e1b302b178b -->
## Order BREAD items.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/attends/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/attends/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/attends/order`


<!-- END_5976d6ca6beff42c128a7e1b302b178b -->

<!-- START_7f731a0d1c1c39b6b529f9410f70bbce -->
## admin/attends/action
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/attends/action" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/attends/action"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/attends/action`


<!-- END_7f731a0d1c1c39b6b529f9410f70bbce -->

<!-- START_464e807d8bdfdaea45df396e4357298c -->
## admin/attends/order
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/attends/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/attends/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/attends/order`


<!-- END_464e807d8bdfdaea45df396e4357298c -->

<!-- START_254f77ab6f71960e5ed774abdab52148 -->
## admin/attends/{id}/restore
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/attends/1/restore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/attends/1/restore"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/attends/{id}/restore`


<!-- END_254f77ab6f71960e5ed774abdab52148 -->

<!-- START_f7516402f0b99ddfe295ca09ddbfaad3 -->
## Get BREAD relations data.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/attends/relation" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/attends/relation"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/attends/relation`


<!-- END_f7516402f0b99ddfe295ca09ddbfaad3 -->

<!-- START_7ade4f8350bd3c695a23243e8f49d971 -->
## admin/attends/remove
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/attends/remove" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/attends/remove"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/attends/remove`


<!-- END_7ade4f8350bd3c695a23243e8f49d971 -->

<!-- START_33e5d5e15bf8713e5406fd232d122b4d -->
## admin/attends
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/attends" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/attends"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/attends`


<!-- END_33e5d5e15bf8713e5406fd232d122b4d -->

<!-- START_5233d5b5e981f9c7eb41cbfef4a454a6 -->
## admin/attends/create
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/attends/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/attends/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/attends/create`


<!-- END_5233d5b5e981f9c7eb41cbfef4a454a6 -->

<!-- START_2027720a2f50540bc5305c8b0402ff45 -->
## POST BRE(A)D - Store data.

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/attends" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/attends"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/attends`


<!-- END_2027720a2f50540bc5305c8b0402ff45 -->

<!-- START_afa2bcb7177dd48530f6bfca0427f7b4 -->
## admin/attends/{attend}
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/attends/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/attends/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/attends/{attend}`


<!-- END_afa2bcb7177dd48530f6bfca0427f7b4 -->

<!-- START_fca6c44d15a757e1a788c612a074afc7 -->
## admin/attends/{attend}/edit
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/attends/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/attends/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/attends/{attend}/edit`


<!-- END_fca6c44d15a757e1a788c612a074afc7 -->

<!-- START_2e2689d305889f7d1f3bacde1698f143 -->
## admin/attends/{attend}
> Example request:

```bash
curl -X PUT \
    "http://leaguedojo.vn/admin/attends/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/attends/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT admin/attends/{attend}`

`PATCH admin/attends/{attend}`


<!-- END_2e2689d305889f7d1f3bacde1698f143 -->

<!-- START_536badb90e0cc4043625b0df81ea6bd2 -->
## admin/attends/{attend}
> Example request:

```bash
curl -X DELETE \
    "http://leaguedojo.vn/admin/attends/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/attends/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE admin/attends/{attend}`


<!-- END_536badb90e0cc4043625b0df81ea6bd2 -->

<!-- START_89c9c8f2978befd381f26c985b5ce4de -->
## Order BREAD items.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/events/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/events/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/events/order`


<!-- END_89c9c8f2978befd381f26c985b5ce4de -->

<!-- START_b3e532c91e860bf912811f4e5d7ce8be -->
## admin/events/action
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/events/action" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/events/action"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/events/action`


<!-- END_b3e532c91e860bf912811f4e5d7ce8be -->

<!-- START_e767fa24fbfee38591b9dd7465de1e4c -->
## admin/events/order
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/events/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/events/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/events/order`


<!-- END_e767fa24fbfee38591b9dd7465de1e4c -->

<!-- START_0872724b16faf30e87c7a9d26533033d -->
## admin/events/{id}/restore
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/events/1/restore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/events/1/restore"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/events/{id}/restore`


<!-- END_0872724b16faf30e87c7a9d26533033d -->

<!-- START_9e8cb7faaea2b95ea7ee29f3f6d56771 -->
## Get BREAD relations data.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/events/relation" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/events/relation"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/events/relation`


<!-- END_9e8cb7faaea2b95ea7ee29f3f6d56771 -->

<!-- START_1f15b9f0c5287915cac79ef2d5985594 -->
## admin/events/remove
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/events/remove" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/events/remove"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/events/remove`


<!-- END_1f15b9f0c5287915cac79ef2d5985594 -->

<!-- START_5a2c2b2a7d0664e0be3af7a1efb24ace -->
## admin/events
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/events"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/events`


<!-- END_5a2c2b2a7d0664e0be3af7a1efb24ace -->

<!-- START_eceeee62f7792c3f49c89123e82bb181 -->
## admin/events/create
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/events/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/events/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/events/create`


<!-- END_eceeee62f7792c3f49c89123e82bb181 -->

<!-- START_3649aa6acc8ccc97bfea0e38cc15dd83 -->
## POST BRE(A)D - Store data.

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/events"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/events`


<!-- END_3649aa6acc8ccc97bfea0e38cc15dd83 -->

<!-- START_d9fe80b1c68360323d232b11d6b3c840 -->
## admin/events/{event}
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/events/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/events/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/events/{event}`


<!-- END_d9fe80b1c68360323d232b11d6b3c840 -->

<!-- START_93dc4ae4c13811b6f2073ce819704c19 -->
## admin/events/{event}/edit
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/events/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/events/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/events/{event}/edit`


<!-- END_93dc4ae4c13811b6f2073ce819704c19 -->

<!-- START_12a590842939d9e4749f35803cc7ba56 -->
## admin/events/{event}
> Example request:

```bash
curl -X PUT \
    "http://leaguedojo.vn/admin/events/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/events/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT admin/events/{event}`

`PATCH admin/events/{event}`


<!-- END_12a590842939d9e4749f35803cc7ba56 -->

<!-- START_9fd37640c956939a61d82c171b68999b -->
## admin/events/{event}
> Example request:

```bash
curl -X DELETE \
    "http://leaguedojo.vn/admin/events/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/events/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE admin/events/{event}`


<!-- END_9fd37640c956939a61d82c171b68999b -->

<!-- START_8b21a70173a72e7a77162722c715ae7e -->
## Order BREAD items.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/rooms/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/rooms/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/rooms/order`


<!-- END_8b21a70173a72e7a77162722c715ae7e -->

<!-- START_f4e73cfae8b3359d695f7e7f5aff7568 -->
## admin/rooms/action
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/rooms/action" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/rooms/action"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/rooms/action`


<!-- END_f4e73cfae8b3359d695f7e7f5aff7568 -->

<!-- START_659f222f0dc46d176bf38d504aea544c -->
## admin/rooms/order
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/rooms/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/rooms/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/rooms/order`


<!-- END_659f222f0dc46d176bf38d504aea544c -->

<!-- START_c9bce81766dfe4e008b4253a559e6cd7 -->
## admin/rooms/{id}/restore
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/rooms/1/restore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/rooms/1/restore"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/rooms/{id}/restore`


<!-- END_c9bce81766dfe4e008b4253a559e6cd7 -->

<!-- START_72c53d079205e3bb71fce867d86c1a01 -->
## Get BREAD relations data.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/rooms/relation" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/rooms/relation"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/rooms/relation`


<!-- END_72c53d079205e3bb71fce867d86c1a01 -->

<!-- START_3b17fbacf338cef3517ff01d5d3a51ee -->
## admin/rooms/remove
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/rooms/remove" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/rooms/remove"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/rooms/remove`


<!-- END_3b17fbacf338cef3517ff01d5d3a51ee -->

<!-- START_f29b1098c0c8fd969d8d5217a0d8c510 -->
## admin/rooms
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/rooms" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/rooms"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/rooms`


<!-- END_f29b1098c0c8fd969d8d5217a0d8c510 -->

<!-- START_fc9662273f6c99b29308ab3f2f9f7534 -->
## admin/rooms/create
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/rooms/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/rooms/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/rooms/create`


<!-- END_fc9662273f6c99b29308ab3f2f9f7534 -->

<!-- START_112edb7360d75679286bec599eeee736 -->
## POST BRE(A)D - Store data.

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/rooms" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/rooms"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/rooms`


<!-- END_112edb7360d75679286bec599eeee736 -->

<!-- START_609a7de2e4b492949e41f882c04c87da -->
## admin/rooms/{room}
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/rooms/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/rooms/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/rooms/{room}`


<!-- END_609a7de2e4b492949e41f882c04c87da -->

<!-- START_0630aa7ebed932e4872936ea94477000 -->
## admin/rooms/{room}/edit
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/rooms/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/rooms/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/rooms/{room}/edit`


<!-- END_0630aa7ebed932e4872936ea94477000 -->

<!-- START_8049d4739f5e83a1bbed989ea2072ca9 -->
## admin/rooms/{room}
> Example request:

```bash
curl -X PUT \
    "http://leaguedojo.vn/admin/rooms/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/rooms/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT admin/rooms/{room}`

`PATCH admin/rooms/{room}`


<!-- END_8049d4739f5e83a1bbed989ea2072ca9 -->

<!-- START_d40f0893d7b6022213c420add3ea2034 -->
## admin/rooms/{room}
> Example request:

```bash
curl -X DELETE \
    "http://leaguedojo.vn/admin/rooms/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/rooms/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE admin/rooms/{room}`


<!-- END_d40f0893d7b6022213c420add3ea2034 -->

<!-- START_00c50f0c4f691d7e9a9e1914f2e018f4 -->
## Order BREAD items.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/book-rooms/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/book-rooms/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/book-rooms/order`


<!-- END_00c50f0c4f691d7e9a9e1914f2e018f4 -->

<!-- START_92e93fcbcc9b86d0c60d0942c15ae555 -->
## admin/book-rooms/action
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/book-rooms/action" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/book-rooms/action"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/book-rooms/action`


<!-- END_92e93fcbcc9b86d0c60d0942c15ae555 -->

<!-- START_a02b55554d49b406f33fbb53e34bdd68 -->
## admin/book-rooms/order
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/book-rooms/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/book-rooms/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/book-rooms/order`


<!-- END_a02b55554d49b406f33fbb53e34bdd68 -->

<!-- START_e3747f32b08e600447f475c04372f668 -->
## admin/book-rooms/{id}/restore
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/book-rooms/1/restore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/book-rooms/1/restore"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/book-rooms/{id}/restore`


<!-- END_e3747f32b08e600447f475c04372f668 -->

<!-- START_f0a59c4ab4f0e3610c096d0467d3cef9 -->
## Get BREAD relations data.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/book-rooms/relation" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/book-rooms/relation"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/book-rooms/relation`


<!-- END_f0a59c4ab4f0e3610c096d0467d3cef9 -->

<!-- START_8db4b4bc9cf5f7f53ae16c254bf1838d -->
## admin/book-rooms/remove
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/book-rooms/remove" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/book-rooms/remove"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/book-rooms/remove`


<!-- END_8db4b4bc9cf5f7f53ae16c254bf1838d -->

<!-- START_500ddce1ef813600d4f0a52a5ffdfc17 -->
## admin/book-rooms
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/book-rooms" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/book-rooms"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/book-rooms`


<!-- END_500ddce1ef813600d4f0a52a5ffdfc17 -->

<!-- START_b05b7b09886c8a4151d41e0dc68f828b -->
## admin/book-rooms/create
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/book-rooms/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/book-rooms/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/book-rooms/create`


<!-- END_b05b7b09886c8a4151d41e0dc68f828b -->

<!-- START_e40f6440c129592466ecd1f30384ea8c -->
## POST BRE(A)D - Store data.

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/book-rooms" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/book-rooms"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/book-rooms`


<!-- END_e40f6440c129592466ecd1f30384ea8c -->

<!-- START_d2dd355c3b4c2a3094a6fdd716e4afbb -->
## admin/book-rooms/{book_room}
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/book-rooms/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/book-rooms/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/book-rooms/{book_room}`


<!-- END_d2dd355c3b4c2a3094a6fdd716e4afbb -->

<!-- START_93059c76d64c9005d8c2229a7ddf1d77 -->
## admin/book-rooms/{book_room}/edit
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/book-rooms/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/book-rooms/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/book-rooms/{book_room}/edit`


<!-- END_93059c76d64c9005d8c2229a7ddf1d77 -->

<!-- START_2760974303c65efac1eda66ffd95e966 -->
## admin/book-rooms/{book_room}
> Example request:

```bash
curl -X PUT \
    "http://leaguedojo.vn/admin/book-rooms/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/book-rooms/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT admin/book-rooms/{book_room}`

`PATCH admin/book-rooms/{book_room}`


<!-- END_2760974303c65efac1eda66ffd95e966 -->

<!-- START_fc2bd2c234c3627716785d03a485fd05 -->
## admin/book-rooms/{book_room}
> Example request:

```bash
curl -X DELETE \
    "http://leaguedojo.vn/admin/book-rooms/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/book-rooms/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE admin/book-rooms/{book_room}`


<!-- END_fc2bd2c234c3627716785d03a485fd05 -->

<!-- START_2bb3f48eb820610e97bd21fe5db1ae9d -->
## Order BREAD items.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/uptimes/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/uptimes/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/uptimes/order`


<!-- END_2bb3f48eb820610e97bd21fe5db1ae9d -->

<!-- START_ef0a51d38557271e4e9ccb7afd6a0dbd -->
## admin/uptimes/action
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/uptimes/action" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/uptimes/action"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/uptimes/action`


<!-- END_ef0a51d38557271e4e9ccb7afd6a0dbd -->

<!-- START_6d2542859859bc02270c89d9b01eac3f -->
## admin/uptimes/order
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/uptimes/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/uptimes/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/uptimes/order`


<!-- END_6d2542859859bc02270c89d9b01eac3f -->

<!-- START_e64c94be9de27e83fe60258116cda31d -->
## admin/uptimes/{id}/restore
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/uptimes/1/restore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/uptimes/1/restore"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/uptimes/{id}/restore`


<!-- END_e64c94be9de27e83fe60258116cda31d -->

<!-- START_ddaba743ec52b24d2607332ca2f55970 -->
## Get BREAD relations data.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/uptimes/relation" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/uptimes/relation"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/uptimes/relation`


<!-- END_ddaba743ec52b24d2607332ca2f55970 -->

<!-- START_46388f784fe27f45389123a92a80e4d7 -->
## admin/uptimes/remove
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/uptimes/remove" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/uptimes/remove"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/uptimes/remove`


<!-- END_46388f784fe27f45389123a92a80e4d7 -->

<!-- START_00a56e208f244e7b05145fcd39ebea47 -->
## admin/uptimes
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/uptimes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/uptimes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/uptimes`


<!-- END_00a56e208f244e7b05145fcd39ebea47 -->

<!-- START_1f60f5e936c9fbf51eeac71f48a970e7 -->
## admin/uptimes/create
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/uptimes/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/uptimes/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/uptimes/create`


<!-- END_1f60f5e936c9fbf51eeac71f48a970e7 -->

<!-- START_b2216f0c24dbb33fd0e63eed9d0f5698 -->
## POST BRE(A)D - Store data.

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/uptimes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/uptimes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/uptimes`


<!-- END_b2216f0c24dbb33fd0e63eed9d0f5698 -->

<!-- START_5c0d020be6d68d463b023861093ccabc -->
## admin/uptimes/{uptime}
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/uptimes/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/uptimes/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/uptimes/{uptime}`


<!-- END_5c0d020be6d68d463b023861093ccabc -->

<!-- START_8f6e350ddc931e9547f9bd586cd58684 -->
## admin/uptimes/{uptime}/edit
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/uptimes/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/uptimes/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/uptimes/{uptime}/edit`


<!-- END_8f6e350ddc931e9547f9bd586cd58684 -->

<!-- START_99f8726949f0d54f43f21deab6e3b48d -->
## admin/uptimes/{uptime}
> Example request:

```bash
curl -X PUT \
    "http://leaguedojo.vn/admin/uptimes/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/uptimes/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT admin/uptimes/{uptime}`

`PATCH admin/uptimes/{uptime}`


<!-- END_99f8726949f0d54f43f21deab6e3b48d -->

<!-- START_16f92038b8b61a1d4572b32a82861e3a -->
## admin/uptimes/{uptime}
> Example request:

```bash
curl -X DELETE \
    "http://leaguedojo.vn/admin/uptimes/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/uptimes/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE admin/uptimes/{uptime}`


<!-- END_16f92038b8b61a1d4572b32a82861e3a -->

<!-- START_ac435d45ee5407d2fdccbca88267dcbd -->
## admin/menus/{menu}/builder
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/menus/1/builder" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/menus/1/builder"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/menus/{menu}/builder`


<!-- END_ac435d45ee5407d2fdccbca88267dcbd -->

<!-- START_5856165be043e948232bc2f197b0793e -->
## admin/menus/{menu}/order
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/menus/1/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/menus/1/order"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/menus/{menu}/order`


<!-- END_5856165be043e948232bc2f197b0793e -->

<!-- START_4bfd90bde1365e61894a8540ac98a254 -->
## admin/menus/{menu}/item/{id}
> Example request:

```bash
curl -X DELETE \
    "http://leaguedojo.vn/admin/menus/1/item/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/menus/1/item/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE admin/menus/{menu}/item/{id}`


<!-- END_4bfd90bde1365e61894a8540ac98a254 -->

<!-- START_2be02546bd540da5155ba0e0dbf8c113 -->
## admin/menus/{menu}/item
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/menus/1/item" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/menus/1/item"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/menus/{menu}/item`


<!-- END_2be02546bd540da5155ba0e0dbf8c113 -->

<!-- START_d21b9fa978200b00c673801429975965 -->
## admin/menus/{menu}/item
> Example request:

```bash
curl -X PUT \
    "http://leaguedojo.vn/admin/menus/1/item" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/menus/1/item"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT admin/menus/{menu}/item`


<!-- END_d21b9fa978200b00c673801429975965 -->

<!-- START_56195363f828f4391ab90cab97490d06 -->
## admin/settings
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/settings" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/settings"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/settings`


<!-- END_56195363f828f4391ab90cab97490d06 -->

<!-- START_dbe0c0df09e7e235b9b689cb9fcae29d -->
## admin/settings
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/settings" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/settings"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/settings`


<!-- END_dbe0c0df09e7e235b9b689cb9fcae29d -->

<!-- START_1982c6133076517feb5c960d3a668ad3 -->
## admin/settings
> Example request:

```bash
curl -X PUT \
    "http://leaguedojo.vn/admin/settings" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/settings"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT admin/settings`


<!-- END_1982c6133076517feb5c960d3a668ad3 -->

<!-- START_3e89dd8d1c7ef761119e2e4d1ffbf58d -->
## admin/settings/{id}
> Example request:

```bash
curl -X DELETE \
    "http://leaguedojo.vn/admin/settings/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/settings/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE admin/settings/{id}`


<!-- END_3e89dd8d1c7ef761119e2e4d1ffbf58d -->

<!-- START_a92e1c75e6f1f7e5bfc7e8f9af7bfa8a -->
## admin/settings/{id}/move_up
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/settings/1/move_up" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/settings/1/move_up"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/settings/{id}/move_up`


<!-- END_a92e1c75e6f1f7e5bfc7e8f9af7bfa8a -->

<!-- START_966203d204987e656790f588ae269fab -->
## admin/settings/{id}/move_down
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/settings/1/move_down" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/settings/1/move_down"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/settings/{id}/move_down`


<!-- END_966203d204987e656790f588ae269fab -->

<!-- START_f2808f0fe68c171b71bbc620c53c9814 -->
## admin/settings/{id}/delete_value
> Example request:

```bash
curl -X PUT \
    "http://leaguedojo.vn/admin/settings/1/delete_value" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/settings/1/delete_value"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT admin/settings/{id}/delete_value`


<!-- END_f2808f0fe68c171b71bbc620c53c9814 -->

<!-- START_8535e162b521fec6ac2854e0b45b0865 -->
## admin/media
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/media" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/media"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/media`


<!-- END_8535e162b521fec6ac2854e0b45b0865 -->

<!-- START_b9bfa3e54948328fe9e640713ffbb8ac -->
## admin/media/files
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/media/files" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/media/files"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/media/files`


<!-- END_b9bfa3e54948328fe9e640713ffbb8ac -->

<!-- START_732712e0f9183c0a58b257957c42a646 -->
## admin/media/new_folder
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/media/new_folder" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/media/new_folder"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/media/new_folder`


<!-- END_732712e0f9183c0a58b257957c42a646 -->

<!-- START_f0238327580fef0d49dc4d3f252e2296 -->
## admin/media/delete_file_folder
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/media/delete_file_folder" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/media/delete_file_folder"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/media/delete_file_folder`


<!-- END_f0238327580fef0d49dc4d3f252e2296 -->

<!-- START_0a9c8a4cfde0499377a310965635a256 -->
## admin/media/move_file
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/media/move_file" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/media/move_file"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/media/move_file`


<!-- END_0a9c8a4cfde0499377a310965635a256 -->

<!-- START_549f6358b83f1994b056587ba821e84c -->
## admin/media/rename_file
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/media/rename_file" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/media/rename_file"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/media/rename_file`


<!-- END_549f6358b83f1994b056587ba821e84c -->

<!-- START_db32070506fe9f0d1e93032c76683518 -->
## admin/media/upload
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/media/upload" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/media/upload"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/media/upload`


<!-- END_db32070506fe9f0d1e93032c76683518 -->

<!-- START_65f31e29983c7311498c341756abadbc -->
## admin/media/crop
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/media/crop" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/media/crop"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/media/crop`


<!-- END_65f31e29983c7311498c341756abadbc -->

<!-- START_6d01b2e192e7acf2bd66a19221e71e8b -->
## admin/bread
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/bread" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/bread"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/bread`


<!-- END_6d01b2e192e7acf2bd66a19221e71e8b -->

<!-- START_fe750dce50adc03bce6ca5c32c18c555 -->
## Create BREAD.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/bread/1/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/bread/1/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/bread/{table}/create`


<!-- END_fe750dce50adc03bce6ca5c32c18c555 -->

<!-- START_80678edaf586a13044e3fc4f2efcf842 -->
## Store BREAD.

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/bread" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/bread"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/bread`


<!-- END_80678edaf586a13044e3fc4f2efcf842 -->

<!-- START_ee4aae2eec925b7340c9ccd28a961cdb -->
## Edit BREAD.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/bread/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/bread/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/bread/{table}/edit`


<!-- END_ee4aae2eec925b7340c9ccd28a961cdb -->

<!-- START_95876b46e11e16b75bfd3ee0d5c1985d -->
## Update BREAD.

> Example request:

```bash
curl -X PUT \
    "http://leaguedojo.vn/admin/bread/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/bread/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT admin/bread/{id}`


<!-- END_95876b46e11e16b75bfd3ee0d5c1985d -->

<!-- START_c2414cf3144da6f70492b6a4d7dd9a6d -->
## Delete BREAD.

> Example request:

```bash
curl -X DELETE \
    "http://leaguedojo.vn/admin/bread/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/bread/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE admin/bread/{id}`


<!-- END_c2414cf3144da6f70492b6a4d7dd9a6d -->

<!-- START_9a48d0467832bca5077b94b831a3824d -->
## Add Relationship.

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/bread/relationship" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/bread/relationship"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/bread/relationship`


<!-- END_9a48d0467832bca5077b94b831a3824d -->

<!-- START_4120860e469ee34d870163fb232e4ef5 -->
## Delete Relationship.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/bread/delete_relationship/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/bread/delete_relationship/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/bread/delete_relationship/{id}`


<!-- END_4120860e469ee34d870163fb232e4ef5 -->

<!-- START_1ed560c8752fd0a83f683505d15c8174 -->
## admin/database
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/database" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/database"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/database`


<!-- END_1ed560c8752fd0a83f683505d15c8174 -->

<!-- START_1864a4a7a1cb48a8bd933ae196e239d4 -->
## Create database table.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/database/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/database/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/database/create`


<!-- END_1864a4a7a1cb48a8bd933ae196e239d4 -->

<!-- START_b260cb184bed3d655fdff4d3e7fad87b -->
## Store new database table.

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/database" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/database"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/database`


<!-- END_b260cb184bed3d655fdff4d3e7fad87b -->

<!-- START_9c8aa3a06542eda4f36959ec8136a6a4 -->
## Show table.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/database/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/database/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/database/{database}`


<!-- END_9c8aa3a06542eda4f36959ec8136a6a4 -->

<!-- START_758e5f292cb134d0fc806839e3802bd8 -->
## Edit database table.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/database/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/database/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/database/{database}/edit`


<!-- END_758e5f292cb134d0fc806839e3802bd8 -->

<!-- START_72b9abf607fd326a9041578c4d3a2eaa -->
## Update database table.

> Example request:

```bash
curl -X PUT \
    "http://leaguedojo.vn/admin/database/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/database/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT admin/database/{database}`

`PATCH admin/database/{database}`


<!-- END_72b9abf607fd326a9041578c4d3a2eaa -->

<!-- START_32e253d3d95d0cd173cbe86372c32d7d -->
## Destroy table.

> Example request:

```bash
curl -X DELETE \
    "http://leaguedojo.vn/admin/database/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/database/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE admin/database/{database}`


<!-- END_32e253d3d95d0cd173cbe86372c32d7d -->

<!-- START_5eb3e5d8b71d7f55cdba8200e55279ff -->
## admin/compass
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/compass" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/compass"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/compass`


<!-- END_5eb3e5d8b71d7f55cdba8200e55279ff -->

<!-- START_7c23f251af6f7d8aaa6a897cd2e34067 -->
## admin/compass
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/compass" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/compass"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/compass`


<!-- END_7c23f251af6f7d8aaa6a897cd2e34067 -->

<!-- START_5f55435a12cc0885d93f73a26bae6d37 -->
## admin/voyager-assets
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/voyager-assets" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/voyager-assets"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET admin/voyager-assets`


<!-- END_5f55435a12cc0885d93f73a26bae6d37 -->

<!-- START_74542d987f25664ea2e15641992af601 -->
## Get BREAD relations data.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/alone-users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/alone-users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET admin/alone-users`


<!-- END_74542d987f25664ea2e15641992af601 -->

<!-- START_56e062650bcc87899e44cf2f3505b016 -->
## Add objects from belongsTo relationship

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/add-into-users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/add-into-users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/add-into-users`


<!-- END_56e062650bcc87899e44cf2f3505b016 -->

<!-- START_552c5f974652ecc45d9835fd444a9fc7 -->
## Export excel file

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/users/export" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/users/export"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/users/export`


<!-- END_552c5f974652ecc45d9835fd444a9fc7 -->

<!-- START_abd6c242c720d502110a92bf4a4fdd6d -->
## Get BREAD relations data.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/alone-menus" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/alone-menus"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET admin/alone-menus`


<!-- END_abd6c242c720d502110a92bf4a4fdd6d -->

<!-- START_7db15b764af62550a9cb1614de354c1d -->
## Add objects from belongsTo relationship

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/add-into-menus" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/add-into-menus"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/add-into-menus`


<!-- END_7db15b764af62550a9cb1614de354c1d -->

<!-- START_8152f4009b19d73fe120a438eba98726 -->
## Export excel file

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/menus/export" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/menus/export"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/menus/export`


<!-- END_8152f4009b19d73fe120a438eba98726 -->

<!-- START_a2ca67c4b455e8420407d8599c4a6a0c -->
## Get BREAD relations data.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/alone-roles" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/alone-roles"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET admin/alone-roles`


<!-- END_a2ca67c4b455e8420407d8599c4a6a0c -->

<!-- START_c7d746d81477be863fe33cf5c67654f0 -->
## Add objects from belongsTo relationship

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/add-into-roles" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/add-into-roles"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/add-into-roles`


<!-- END_c7d746d81477be863fe33cf5c67654f0 -->

<!-- START_bc202a905266e699a7450526ab0da636 -->
## Export excel file

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/roles/export" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/roles/export"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/roles/export`


<!-- END_bc202a905266e699a7450526ab0da636 -->

<!-- START_a943eac9ee7c918945b690021c5f8555 -->
## Get BREAD relations data.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/alone-posts" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/alone-posts"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET admin/alone-posts`


<!-- END_a943eac9ee7c918945b690021c5f8555 -->

<!-- START_4e5e72303b6f4091343c6bacf61a6a2b -->
## Add objects from belongsTo relationship

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/add-into-posts" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/add-into-posts"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/add-into-posts`


<!-- END_4e5e72303b6f4091343c6bacf61a6a2b -->

<!-- START_7c352ed894a74d0da8184f91b9355aae -->
## Export excel file

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/posts/export" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/posts/export"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/posts/export`


<!-- END_7c352ed894a74d0da8184f91b9355aae -->

<!-- START_9ee09bfbf8c7c5a9500c666c012fc99a -->
## Get BREAD relations data.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/alone-students" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/alone-students"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET admin/alone-students`


<!-- END_9ee09bfbf8c7c5a9500c666c012fc99a -->

<!-- START_8b0fa0268b53301f7a909d964f5abc33 -->
## Add objects from belongsTo relationship

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/add-into-students" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/add-into-students"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/add-into-students`


<!-- END_8b0fa0268b53301f7a909d964f5abc33 -->

<!-- START_1ef7bbcdb2771ffe8136bf6f756b064d -->
## Export excel file

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/students/export" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/students/export"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/students/export`


<!-- END_1ef7bbcdb2771ffe8136bf6f756b064d -->

<!-- START_6940f7c635249fe2f6f78e8d2d0f3ad9 -->
## Get BREAD relations data.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/alone-dojos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/alone-dojos"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET admin/alone-dojos`


<!-- END_6940f7c635249fe2f6f78e8d2d0f3ad9 -->

<!-- START_e62a43ad76dd16e8cd961c633fd3a070 -->
## Add objects from belongsTo relationship

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/add-into-dojos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/add-into-dojos"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/add-into-dojos`


<!-- END_e62a43ad76dd16e8cd961c633fd3a070 -->

<!-- START_52a44668e087876e905b05b5b9e68112 -->
## Export excel file

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/dojos/export" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/dojos/export"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/dojos/export`


<!-- END_52a44668e087876e905b05b5b9e68112 -->

<!-- START_6283e6b26fe5189db33dbecbc5266456 -->
## Get BREAD relations data.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/alone-slides" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/alone-slides"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET admin/alone-slides`


<!-- END_6283e6b26fe5189db33dbecbc5266456 -->

<!-- START_55692c49ec41968a7d02318b3603167e -->
## Add objects from belongsTo relationship

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/add-into-slides" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/add-into-slides"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/add-into-slides`


<!-- END_55692c49ec41968a7d02318b3603167e -->

<!-- START_3dc032a9d2f9a63492d100979230fab5 -->
## Export excel file

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/slides/export" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/slides/export"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/slides/export`


<!-- END_3dc032a9d2f9a63492d100979230fab5 -->

<!-- START_af0ed9c84a24b48f249d228cd51c969f -->
## Get BREAD relations data.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/alone-videos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/alone-videos"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET admin/alone-videos`


<!-- END_af0ed9c84a24b48f249d228cd51c969f -->

<!-- START_06143ed3519185cbaede6c8a15f4e50b -->
## Add objects from belongsTo relationship

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/add-into-videos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/add-into-videos"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/add-into-videos`


<!-- END_06143ed3519185cbaede6c8a15f4e50b -->

<!-- START_c2e1dc18655ebf7459def9170b930095 -->
## Export excel file

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/videos/export" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/videos/export"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/videos/export`


<!-- END_c2e1dc18655ebf7459def9170b930095 -->

<!-- START_6c683e12165af4649050bed052df2c98 -->
## Get BREAD relations data.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/alone-categories" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/alone-categories"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET admin/alone-categories`


<!-- END_6c683e12165af4649050bed052df2c98 -->

<!-- START_fb62c6ed86fc06cb5e8198d3f363a773 -->
## Add objects from belongsTo relationship

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/add-into-categories" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/add-into-categories"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/add-into-categories`


<!-- END_fb62c6ed86fc06cb5e8198d3f363a773 -->

<!-- START_31e12be31fa5ac430677d85a260d997b -->
## Export excel file

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/categories/export" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/categories/export"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/categories/export`


<!-- END_31e12be31fa5ac430677d85a260d997b -->

<!-- START_7eb62c0541bef00f5ff424137a8e50dc -->
## Get BREAD relations data.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/alone-playlists" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/alone-playlists"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET admin/alone-playlists`


<!-- END_7eb62c0541bef00f5ff424137a8e50dc -->

<!-- START_a77458eb841ec94db93bde36c0ee7faa -->
## Add objects from belongsTo relationship

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/add-into-playlists" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/add-into-playlists"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/add-into-playlists`


<!-- END_a77458eb841ec94db93bde36c0ee7faa -->

<!-- START_c78ced58863863778e4bcb816a9fae66 -->
## Export excel file

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/playlists/export" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/playlists/export"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/playlists/export`


<!-- END_c78ced58863863778e4bcb816a9fae66 -->

<!-- START_1dfed5bf92da51432490f17a4342bf1f -->
## Get BREAD relations data.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/alone-documents" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/alone-documents"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET admin/alone-documents`


<!-- END_1dfed5bf92da51432490f17a4342bf1f -->

<!-- START_db3a4e7ddd2aae03150e871cd8671b08 -->
## Add objects from belongsTo relationship

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/add-into-documents" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/add-into-documents"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/add-into-documents`


<!-- END_db3a4e7ddd2aae03150e871cd8671b08 -->

<!-- START_d26c280afb0d278b58e91180550dadb0 -->
## Export excel file

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/documents/export" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/documents/export"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/documents/export`


<!-- END_d26c280afb0d278b58e91180550dadb0 -->

<!-- START_42bb283be19f4a04a539841a1263e6f5 -->
## Get BREAD relations data.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/alone-tuitions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/alone-tuitions"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET admin/alone-tuitions`


<!-- END_42bb283be19f4a04a539841a1263e6f5 -->

<!-- START_86ad2fbd3fa7be8536631f55a711ff04 -->
## Add objects from belongsTo relationship

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/add-into-tuitions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/add-into-tuitions"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/add-into-tuitions`


<!-- END_86ad2fbd3fa7be8536631f55a711ff04 -->

<!-- START_f9b3283908f25000e60c934be0a2d817 -->
## Export excel file

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/tuitions/export" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/tuitions/export"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/tuitions/export`


<!-- END_f9b3283908f25000e60c934be0a2d817 -->

<!-- START_9172b664dc8b39d9703f55dbf2f95bc4 -->
## Get BREAD relations data.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/alone-bonus-defaults" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/alone-bonus-defaults"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET admin/alone-bonus-defaults`


<!-- END_9172b664dc8b39d9703f55dbf2f95bc4 -->

<!-- START_6328d4e103ed014581227568131c69cc -->
## Add objects from belongsTo relationship

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/add-into-bonus-defaults" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/add-into-bonus-defaults"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/add-into-bonus-defaults`


<!-- END_6328d4e103ed014581227568131c69cc -->

<!-- START_3bd42e482e44836703e93c288158391d -->
## Export excel file

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/bonus-defaults/export" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/bonus-defaults/export"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/bonus-defaults/export`


<!-- END_3bd42e482e44836703e93c288158391d -->

<!-- START_a61795c2030d720bfb222851ab85de72 -->
## Get BREAD relations data.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/alone-vouchers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/alone-vouchers"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET admin/alone-vouchers`


<!-- END_a61795c2030d720bfb222851ab85de72 -->

<!-- START_154e5bc412ae62856ff9aca8c04383ea -->
## Add objects from belongsTo relationship

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/add-into-vouchers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/add-into-vouchers"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/add-into-vouchers`


<!-- END_154e5bc412ae62856ff9aca8c04383ea -->

<!-- START_7439d1226c06443d78ea28f9d5bae5a8 -->
## Export excel file

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/vouchers/export" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/vouchers/export"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/vouchers/export`


<!-- END_7439d1226c06443d78ea28f9d5bae5a8 -->

<!-- START_4bb282b8e24dcd3e39d24ab6026654c4 -->
## Get BREAD relations data.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/alone-tuition-policies" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/alone-tuition-policies"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET admin/alone-tuition-policies`


<!-- END_4bb282b8e24dcd3e39d24ab6026654c4 -->

<!-- START_5e0f090b269fcb7cd434fbc0ce71dc90 -->
## Add objects from belongsTo relationship

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/add-into-tuition-policies" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/add-into-tuition-policies"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/add-into-tuition-policies`


<!-- END_5e0f090b269fcb7cd434fbc0ce71dc90 -->

<!-- START_dbbc6472d5a0f6d7a6b4736511259bf8 -->
## Export excel file

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/tuition-policies/export" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/tuition-policies/export"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/tuition-policies/export`


<!-- END_dbbc6472d5a0f6d7a6b4736511259bf8 -->

<!-- START_68d44e15504f8930533f72c3a5fb2f02 -->
## Get BREAD relations data.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/alone-transfer-dojos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/alone-transfer-dojos"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET admin/alone-transfer-dojos`


<!-- END_68d44e15504f8930533f72c3a5fb2f02 -->

<!-- START_3f322fdae3ef47f3224cdc31f7d8b68b -->
## Add objects from belongsTo relationship

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/add-into-transfer-dojos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/add-into-transfer-dojos"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/add-into-transfer-dojos`


<!-- END_3f322fdae3ef47f3224cdc31f7d8b68b -->

<!-- START_d5d76af69ab5d9fa30748b259ffdcb34 -->
## Export excel file

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/transfer-dojos/export" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/transfer-dojos/export"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/transfer-dojos/export`


<!-- END_d5d76af69ab5d9fa30748b259ffdcb34 -->

<!-- START_3e849ac49086e96f05463e619786a3dc -->
## Get BREAD relations data.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/alone-operation-logs" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/alone-operation-logs"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET admin/alone-operation-logs`


<!-- END_3e849ac49086e96f05463e619786a3dc -->

<!-- START_9a3bfa9261782c9c651dbeb4cdc7d437 -->
## Add objects from belongsTo relationship

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/add-into-operation-logs" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/add-into-operation-logs"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/add-into-operation-logs`


<!-- END_9a3bfa9261782c9c651dbeb4cdc7d437 -->

<!-- START_bab04bacd6912d318639094f1a8963ee -->
## Export excel file

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/operation-logs/export" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/operation-logs/export"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/operation-logs/export`


<!-- END_bab04bacd6912d318639094f1a8963ee -->

<!-- START_11c0fd3a3c1ef4b52ee09ad27e2a3a4b -->
## Get BREAD relations data.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/alone-achievements" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/alone-achievements"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET admin/alone-achievements`


<!-- END_11c0fd3a3c1ef4b52ee09ad27e2a3a4b -->

<!-- START_174709022764a29e338840ff92978103 -->
## Add objects from belongsTo relationship

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/add-into-achievements" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/add-into-achievements"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/add-into-achievements`


<!-- END_174709022764a29e338840ff92978103 -->

<!-- START_4019dfbecc08c5d760d68d4f3a8b89ec -->
## Export excel file

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/achievements/export" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/achievements/export"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/achievements/export`


<!-- END_4019dfbecc08c5d760d68d4f3a8b89ec -->

<!-- START_f28be24a35a983e98f4c602b85af8de0 -->
## Get BREAD relations data.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/alone-test-scores" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/alone-test-scores"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET admin/alone-test-scores`


<!-- END_f28be24a35a983e98f4c602b85af8de0 -->

<!-- START_61875664c585a7a3fb7bf25d18083226 -->
## Add objects from belongsTo relationship

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/add-into-test-scores" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/add-into-test-scores"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/add-into-test-scores`


<!-- END_61875664c585a7a3fb7bf25d18083226 -->

<!-- START_315964251fea1ca4e6982f91022a65af -->
## Export excel file

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/test-scores/export" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/test-scores/export"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/test-scores/export`


<!-- END_315964251fea1ca4e6982f91022a65af -->

<!-- START_e6fa3b525cc478471649cdc775009323 -->
## Get BREAD relations data.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/alone-attends" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/alone-attends"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET admin/alone-attends`


<!-- END_e6fa3b525cc478471649cdc775009323 -->

<!-- START_bc662fe077e955d584e1fbdfbf5945f9 -->
## Add objects from belongsTo relationship

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/add-into-attends" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/add-into-attends"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/add-into-attends`


<!-- END_bc662fe077e955d584e1fbdfbf5945f9 -->

<!-- START_250f2211491e0cd36f16fa70632318d1 -->
## Export excel file

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/attends/export" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/attends/export"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/attends/export`


<!-- END_250f2211491e0cd36f16fa70632318d1 -->

<!-- START_e7a03a6d785dfc856b07d8efeebc8d51 -->
## Get BREAD relations data.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/alone-events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/alone-events"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET admin/alone-events`


<!-- END_e7a03a6d785dfc856b07d8efeebc8d51 -->

<!-- START_10a889706951ad14a634560493f9bfb2 -->
## Add objects from belongsTo relationship

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/add-into-events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/add-into-events"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/add-into-events`


<!-- END_10a889706951ad14a634560493f9bfb2 -->

<!-- START_f03c35176e579593816358e5b07e0da6 -->
## Export excel file

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/events/export" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/events/export"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/events/export`


<!-- END_f03c35176e579593816358e5b07e0da6 -->

<!-- START_3c52aa5319a5dac35109085d745de9d2 -->
## Get BREAD relations data.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/alone-rooms" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/alone-rooms"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET admin/alone-rooms`


<!-- END_3c52aa5319a5dac35109085d745de9d2 -->

<!-- START_5c14343e16acbd419f0070b669fab113 -->
## Add objects from belongsTo relationship

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/add-into-rooms" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/add-into-rooms"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/add-into-rooms`


<!-- END_5c14343e16acbd419f0070b669fab113 -->

<!-- START_96f3c4d8f2b703562d22b64241cb653e -->
## Export excel file

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/rooms/export" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/rooms/export"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/rooms/export`


<!-- END_96f3c4d8f2b703562d22b64241cb653e -->

<!-- START_259a165a13a763d0952e57b8893cd7e9 -->
## Get BREAD relations data.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/alone-book-rooms" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/alone-book-rooms"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET admin/alone-book-rooms`


<!-- END_259a165a13a763d0952e57b8893cd7e9 -->

<!-- START_5b42bed50748b76f170678f68d0e4ec7 -->
## Add objects from belongsTo relationship

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/add-into-book-rooms" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/add-into-book-rooms"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/add-into-book-rooms`


<!-- END_5b42bed50748b76f170678f68d0e4ec7 -->

<!-- START_5131d4e4ce203ae7b04c296455c390ef -->
## Export excel file

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/book-rooms/export" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/book-rooms/export"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/book-rooms/export`


<!-- END_5131d4e4ce203ae7b04c296455c390ef -->

<!-- START_109607af958f4942f01c19ec1c0c5c90 -->
## Get BREAD relations data.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/alone-uptimes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/alone-uptimes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET admin/alone-uptimes`


<!-- END_109607af958f4942f01c19ec1c0c5c90 -->

<!-- START_fe60af05f91e00297d06fdaf8e2b8b0d -->
## Add objects from belongsTo relationship

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/add-into-uptimes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/add-into-uptimes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/add-into-uptimes`


<!-- END_fe60af05f91e00297d06fdaf8e2b8b0d -->

<!-- START_8f21b1cd60fa9855d0aea181f81d9625 -->
## Export excel file

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/uptimes/export" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/uptimes/export"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/uptimes/export`


<!-- END_8f21b1cd60fa9855d0aea181f81d9625 -->

<!-- START_820ac75bf16bf9725b769adff4695368 -->
## Import file excel

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/students/import" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/students/import"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/students/import`


<!-- END_820ac75bf16bf9725b769adff4695368 -->

<!-- START_f6a1e93ab909cf9cb43004f71ee8a8ee -->
## Import file excel

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/test-scores/import" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/test-scores/import"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/test-scores/import`


<!-- END_f6a1e93ab909cf9cb43004f71ee8a8ee -->

<!-- START_b4ae78bf48e9bae2890275e658d1f96c -->
## Sync all video in DB with information on Youtube

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/sync" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/sync"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/sync`


<!-- END_b4ae78bf48e9bae2890275e658d1f96c -->

<!-- START_da1cedb2b61f399c12fb020fbcef53a0 -->
## Remove Videos outside Playlist

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/videos/remove/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/videos/remove/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET admin/videos/remove/{video}`


<!-- END_da1cedb2b61f399c12fb020fbcef53a0 -->

<!-- START_f14889c9f459b36be8c48e8466e9a42d -->
## Check infomation of link video on Youtube.

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/videos/check" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/videos/check"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/videos/check`


<!-- END_f14889c9f459b36be8c48e8466e9a42d -->

<!-- START_8eb259f1c22413a51f36c1cd2bf52b6b -->
## Check history tuition and get bonus default

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/tuitions/check" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/tuitions/check"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/tuitions/check`


<!-- END_8eb259f1c22413a51f36c1cd2bf52b6b -->

<!-- START_b88115e12d65c0f6499ea98fd63e0793 -->
## Check vouchers and apply it

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/tuitions/apply-voucher" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/tuitions/apply-voucher"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/tuitions/apply-voucher`


<!-- END_b88115e12d65c0f6499ea98fd63e0793 -->

<!-- START_5251f7bcfc2b8314723c4b29c328403f -->
## Get all vouchers student collected and haven&#039;t used yet

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/students/vouchers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/students/vouchers"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/students/vouchers`


<!-- END_5251f7bcfc2b8314723c4b29c328403f -->

<!-- START_eab6e6f372cabd7ff9e55430faf97834 -->
## Confirm transfer dojo from student and caculate tuitions again

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/transfer-dojos/confirm" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/transfer-dojos/confirm"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/transfer-dojos/confirm`


<!-- END_eab6e6f372cabd7ff9e55430faf97834 -->

<!-- START_795a9c896c66ab7fbf5c3f260856e9e3 -->
## Reject transfer dojo from student and caculate tuitions again

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/transfer-dojos/reject" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/transfer-dojos/reject"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/transfer-dojos/reject`


<!-- END_795a9c896c66ab7fbf5c3f260856e9e3 -->

<!-- START_752b0b0c6302987eb4040711c2015547 -->
## Confirm attends event

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/attends/confirm" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/attends/confirm"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/attends/confirm`


<!-- END_752b0b0c6302987eb4040711c2015547 -->

<!-- START_d43b0b7b5d55a486323d863b318036bf -->
## Reject attends event

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/attends/reject" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/attends/reject"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/attends/reject`


<!-- END_d43b0b7b5d55a486323d863b318036bf -->

<!-- START_7fb43769570ec30ae45ddd0bf3f4c413 -->
## Confirm attends event

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/book-rooms/confirm" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/book-rooms/confirm"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/book-rooms/confirm`


<!-- END_7fb43769570ec30ae45ddd0bf3f4c413 -->

<!-- START_3e054337573cbc1083ba54fffb50a08e -->
## Reject attends event

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/book-rooms/reject" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/book-rooms/reject"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/book-rooms/reject`


<!-- END_3e054337573cbc1083ba54fffb50a08e -->

<!-- START_4b420eabcf53c5dcf8aac65a9547eff5 -->
## Get view field

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/uptimes/clone-fields" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/uptimes/clone-fields"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/uptimes/clone-fields`


<!-- END_4b420eabcf53c5dcf8aac65a9547eff5 -->

<!-- START_b580e0d17aebf6e18dc7de2125e5b2a1 -->
## Get view field

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/posts/clone-fields" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/posts/clone-fields"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/posts/clone-fields`


<!-- END_b580e0d17aebf6e18dc7de2125e5b2a1 -->

<!-- START_fef5903bc8a425496d9453777e0a9735 -->
## Get view field

> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/admin/videos/clone-fields" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/videos/clone-fields"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/videos/clone-fields`


<!-- END_fef5903bc8a425496d9453777e0a9735 -->

<!-- START_99510b837b3d5fb8a503e18792f8a5f2 -->
## admin/logs
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/logs" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/logs"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (403):

```json
{
    "message": "This action is unauthorized."
}
```

### HTTP Request
`GET admin/logs`


<!-- END_99510b837b3d5fb8a503e18792f8a5f2 -->

<!-- START_ba7d746019273f0345a9f607358542f9 -->
## admin/reports/competition
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/admin/reports/competition" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/admin/reports/competition"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET admin/reports/competition`


<!-- END_ba7d746019273f0345a9f607358542f9 -->

#Điểm rèn luyện


Quản lý sự kiện
<!-- START_594be8c9540192efb0119f5855b0bca7 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/events"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET events`


<!-- END_594be8c9540192efb0119f5855b0bca7 -->

<!-- START_e2a40d23702d532b3cd056fff3977ee3 -->
## Hiển thị trang danh sách các đăng ký xác nhận sự kiện.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/attends" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/attends"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "Page not found"
}
```
> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET attends`


<!-- END_e2a40d23702d532b3cd056fff3977ee3 -->

<!-- START_798db8a8c4268cc847917012a333f12b -->
## Hiển thị trang đăng ký xác nhận sự kiện.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://leaguedojo.vn/attends/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://leaguedojo.vn/attends/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{}
```
> Example response (403):

```json
{
    "message": "Forbidden"
}
```

### HTTP Request
`GET attends/create`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | Id của sự kiện.

<!-- END_798db8a8c4268cc847917012a333f12b -->

<!-- START_4ece0d2c5fceccc24095e46c56bf0f3c -->
## Lưu thông tin đăng ký xác nhận sự kiện.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://leaguedojo.vn/attends" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"image":"ipsum","event_id":"1","note":"qui"}'

```

```javascript
const url = new URL(
    "http://leaguedojo.vn/attends"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "image": "ipsum",
    "event_id": "1",
    "note": "qui"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "Đăng ký thành công"
}
```
> Example response (200):

```json
{
    "message": "Bạn đã đăng ký sự kiện này rồi"
}
```
> Example response (403):

```json
{
    "message": "Forbidden"
}
```

### HTTP Request
`POST attends`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `image` | file |  optional  | The image student upload.
        `event_id` | required |  optional  | The id of event.
        `note` | string |  optional  | The note student want to tell.
    
<!-- END_4ece0d2c5fceccc24095e46c56bf0f3c -->

