# take-home

## Program Discription
Program can price a cart of products from different countries, accept multiple products, combine offers, and display a total detailed invoice in USD.

### How it works :
- user enter cart list which contain specified products
- program calculate subtotal price of products
- add shipping cost and VAT for products
- calculate discount which debends on available offers
- calculate total price
- response with final details invoice


## Program design and archtecture :
- the program foucses on back-end development
- developed with **laravel** framework
- Object Oriented Designed
- used [**Command**](https://refactoring.guru/design-patterns/command) design pattern to calculate invoice discount
- no database used
- simple API designed for input

> **Hint:** At first, I didn't intend to use any framework for the program but for easy, organized and maintainable code i decieded to use laravel

## Why Laravel framework ?
- PHP framework
- it makes program scalable
- easy to maintain
- OOP design
- easy to make rest api
- Software testing can be automated
- Helps reduce Server overhead
- it can make integration with multiple technologies


## How to run the program :
- clone program in your local repo
- you can use **XAMPP** control pannel to run program localy
- start your **Apache** server from XAMPP
- open directory take-home > project
- open project folder in any **Editor** such as phpstorme,vscode
- open **terminal** and write php artisan serve
- open API plateform like **Postman**
- use "domain/api/invoice" as an api endpoint
- example : "http://127.0.0.1:8000/api/invoice"
- use **post** method
- select **body**
- selest **row** and **JSON** format
- make input in format ["item1","item2","item3"] and click send


> **Hint:** You can write items in uppercase or lowercase ,and you can duplicate items
> EX: ["blouse","shoes","SHOES","Jacket"]
