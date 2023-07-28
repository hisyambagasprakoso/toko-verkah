How to Run This Web App (toko-verxah)

1. open XAMPP, start Apache and MySQL
2. open CMD, type <cd C:\xampp\htdocs\toko-verkah>
3. then type <php artisan serve>
4. to migrate db type <php artisan migrate>
5. to seeder execution type <php artisan db:seed>
6. go to http://127.0.0.1:8000/<following endpoints>
====================================================
Credentials

*as admin*
1. username -> adminverxah
2. password -> password

*as merchant*
1. username, 
choose one of them :
adidas
nike
zara
hnm
uniqlo
2. password -> password
====================================================
Endpoints

*admin page*
1. login
http://127.0.0.1:8000/admin
2. dashboard
http://127.0.0.1:8000/welcome
3. manage profile merchant
http://127.0.0.1:8000/merchant
4. see transactions of all merchant
http://127.0.0.1:8000/all-transaction

*merchant page*
1. login
http://127.0.0.1:8000/login-merchant
2. see all transaction of merchant
http://127.0.0.1:8000/transaction

*checkout page*
http://127.0.0.1:8000/checkout






