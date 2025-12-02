<center><h1>ESHOP</h1></center>
EHSOP Project propose is integrate with payment gateway.sent notification to telegram, email when user place order.

## Project Description
___
+ Screen
 Step 1
 - Product catalog
 - Product Details
 - Cart list
 - Checkout Page
 Step 2
 - User registration (e-mail)
 - User Profile
 - Intergrade KHQR
 - Send Notification to store owner telegram
 - Send invoice to customer via e-mail
 - SEO
 Step 3
  - Project deployment

+ Database 
 - user(default)
 - category(id,name,description)
 - product(id, name, price, category, discount, image, description)
 - user_cart(id, user_id, product_id, qty) 
 - order (id, user_id, date_time, total, paid, delivery)
 - order_detail (id, order_id, product_id, qty, price)

## Project Screenshot
___
<div>
    <img width="280" src="https://i.imgur.com/DO6TOkQ.jpeg"/>
    <img width="280" src="https://i.imgur.com/oREu413.jpeg"/>
    <img width="280" src="https://i.imgur.com/xEs8GmH.jpeg"/>
    <img width="280" src="https://i.imgur.com/rnwJMFl.jpeg"/>
    <img width="280" src="https://i.imgur.com/jBRiOVi.jpeg"/>
    <img width="280" src="https://i.imgur.com/At7OVLH.jpeg"/>
    <img width="280" src="https://i.imgur.com/PLl3Z9J.jpeg"/>
    <img width="280" src="https://i.imgur.com/PTvbiQT.jpeg"/>
</div>

## Project Link
___
- url: https://www.eshopcambodia.shop/

## Technologies
___
- Frontend
  - Blade, VueJS CDN
  - Tailwind CSS
- Backend
  - Laravel
- Database
  - MySQL

## Requirement
___
- php8.3+
- composer v8.2.x
- laravel 12
- mysql 8.2

## Installation
___
#### Step 1
```git clone https://github.com/Rathy2003/e-shop```
#### Step 2
- run command ```composer install```
- copy .env.example and rename to .env
- run command to generate app key : ```php artisan key:generate```
- config database connection like this:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=e_shop_db
DB_USERNAME=root
DB_PASSWORD=123456
```

