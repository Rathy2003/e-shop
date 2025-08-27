# ESHOP Project
ESHOP is a e-commerce project allow user.
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
# Requirement
- php8.3+
- composer v8.2.x
- laravel 12
- mysql 8.2

# Installation
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

