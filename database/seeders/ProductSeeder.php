<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Start Category 1 (Shoes)
        Product::firstOrCreate([
           "name" => "Dunk Low Basketball Sneaker (Women)",
           "slug" => Str::slug("Dunk Low Basketball Sneaker (Women)"),
           "description" => "A streamlined profile keeps the old-school vibes shooting and scoring in a heritage basketball shoe that's still winning games as a modern off-court sneaker. Timeless details frame the look in vintage authenticity, while the padded collar and underfoot pivot circle kick up the sneakerhead energy.Not Removable insoleLace-up styleSynthetic upper/textile lining/rubber sole Imported Item #7434624",
           "price" => 100,
           "discount" => 0,
           "stock" => 100,
           "image" => "https://n.nordstrommedia.com/it/40e95e7c-c1ce-4c8a-a898-34a95afefa7d.jpeg?crop=pad&trim=color&w=780&h=1196%201x,%20https://n.nordstrommedia.com/it/40e95e7c-c1ce-4c8a-a898-34a95afefa7d.jpeg?crop=pad&trim=color&w=780&h=1196&dpr=2%202x",
           "category_id" => 1,
        ]);

        Product::firstOrCreate([
            "name" => "adidas Men\'s Ultradream DNA Sneaker",
            "slug" => Str::slug("adidas Men\'s Ultradream DNA Sneaker"),
            "description" => "Men\'s adidas shoes with a full-length midsole for extra comfort\r\nDREAMSTRIKE+ MIDSOLE: Full-length Dreamstrike EVA for comfort and support\r\nFLEXIBLE UPPER: Soft textile upper is stretchy and comfortable\r\nSTABILITY: Quarter cage and external heel counter for stability\r\nMADE IN PART WITH RECYCLED CONTENT: This product features at least 20% recycled materials. By reusing materials that have already been created, we help to reduce waste and our reliance on finite resources and reduce the footprint of the products we make",
            "price" => 200,
            "discount" => 2,
            "stock" => 68,
            "image" => "https://m.media-amazon.com/images/I/718Sl8Rg38L._AC_SY575_.jpg",
            "category_id" => 1,
        ]);

        Product::firstOrCreate([
            "name" => "Sloane Ankle Strap Sandal (Women)",
            "slug" => Str::slug("Sloane Ankle Strap Sandal (Women)"),
            "description" => "Set your style to vacation mode whenever you're in this leather and suede sandal cushioned by a OrthoLite® Eco™ footbed for all-day comfort.",
            "price" => 300,
            "discount" => 2,
            "stock" => 100,
            "image" => "https://n.nordstrommedia.com/it/242261e8-2924-4697-83d8-c8bc253f5bab.jpeg?crop=pad&trim=color&w=780&h=1196",
            "category_id" => 1,
        ]);

        Product::firstOrCreate([
            "name" => "Gender Inclusive 1906R Running Shoe",
            "slug" => Str::slug("Gender Inclusive 1906R Running Shoe"),
            "description" => "A fusion of cushioning and shock-absorbing technologies puts performance comfort under every step in a stabilizing running shoe designed for a smooth ride and everyday versatility.
Perfect for: Everyday runners looking for a well-cushioned shoe with a stabilizing, shock-absorbing base and reliable comfort for sprints, miles and gym workouts.
Upper: NLOCK webbing provides a secure, stay-put fit. Breathable mesh promotes cooling air circulation. Layered architecture maintains shape as you run, walk or work out.",
            "price" => 100,
            "discount" => 0,
            "stock" => 68,
            "image" => "https://n.nordstrommedia.com/it/28f88e28-02ac-4cfe-9b07-7a9cb0e266c0.jpeg?crop=pad&trim=color&w=780&h=1196",
            "category_id" => 1,
        ]);

        // End Category 1 (Shoes)


        // Start Category 2 (Clothes)
        Product::firstOrCreate([
            "name" => "Nike Men's Sportswear Club Fleece Hoodie",
            "slug" => Str::slug("Nike Men's Sportswear Club Fleece Hoodie"),
            "description" => "Soft fleece hoodie with kangaroo pocket and adjustable drawstring hood. Perfect for casual wear and workouts.",
            "price" => 1000,
            "discount" => 15,
            "stock" => 120,
            "image" => "https://m.media-amazon.com/images/I/81bwT2oMCPL._AC_SY550_.jpg",
            "category_id" => 2,
        ]);

        Product::firstOrCreate([
            "name" => "Levi's Men's 511 Slim Fit Jeans",
            "slug" => Str::slug("Levi's Men's 511 Slim Fit Jeans"),
            "description" => "Classic slim-fit jeans made with stretch denim for comfort and mobility.",
            "price" => 100,
            "discount" => 2,
            "stock" => 85,
            "image" => "https://m.media-amazon.com/images/I/61td+aqeZdL._AC_SX522_.jpg",
            "category_id" => 2,
        ]);

        Product::firstOrCreate([
            "name" => "Calvin Klein Women's Modern Cotton Bralette",
            "slug" => Str::slug("Calvin Klein Women's Modern Cotton Bralette"),
            "description" => "Iconic bralette with racerback design and Calvin Klein logo band.",
            "price" => 300,
            "discount" => 2,
            "stock" => 60,
            "image" => "https://m.media-amazon.com/images/I/71M1y7Lv8RL._AC_SY500_.jpg",
            "category_id" => 2,
        ]);

        Product::firstOrCreate([
            "name" => "Tommy Hilfiger Men's Classic Polo Shirt",
            "slug" => Str::slug("Tommy Hilfiger Men's Classic Polo Shirt"),
            "description" => "Short-sleeve polo shirt with embroidered flag logo, made of breathable cotton.",
            "price" => 100,
            "discount" => 0,
            "stock" => 95,
            "image" => "https://m.media-amazon.com/images/I/71er25xUN9L._AC_SX466_.jpg",
            "category_id" => 2,
        ]);

        Product::firstOrCreate([
            "name" => "Adidas Originals Women's Trefoil Tee",
            "slug" => Str::slug("Adidas Originals Women's Trefoil Tee"),
            "description" => "Soft cotton tee featuring the iconic Adidas Trefoil logo.",
            "price" => 5000,
            "discount" => 8,
            "stock" => 75,
            "image" => "https://m.media-amazon.com/images/I/61WOpWUGzOL._AC_SX466_.jpg",
            "category_id" => 2,
        ]);

        Product::firstOrCreate([
            "name" => "Columbia Men's Watertight II Jacket",
            "slug" => Str::slug("Columbia Men's Watertight II Jacket"),
            "description" => "Lightweight waterproof rain jacket with adjustable hood and packable design.",
            "price" => 200,
            "discount" => 0,
            "stock" => 40,
            "image" => "https://m.media-amazon.com/images/I/61BXwcaSWWL._AC_SX466_.jpg",
            "category_id" => 2,
        ]);

        Product::firstOrCreate([
            "name" => "Champion Men's Powerblend Sweatpants",
            "slug" => Str::slug("Champion Men's Powerblend Sweatpants"),
            "description" => "Fleece jogger pants with adjustable waistband and side pockets.",
            "price" => 100,
            "discount" => 0,
            "stock" => 110,
            "image" => "https://m.media-amazon.com/images/I/615Tm+rtCML._AC_SX466_.jpg",
            "category_id" => 2,
        ]);

        Product::firstOrCreate([
            "name" => "Under Armour Women's Tech Twist V-Neck",
            "slug" => Str::slug("Under Armour Women's Tech Twist V-Neck"),
            "description" => "Lightweight quick-dry V-neck tee for workouts and training.",
            "price" => 8000,
            "discount" => 2,
            "stock" => 130,
            "image" => "https://m.media-amazon.com/images/I/71dUrbnRRuL._AC_SY500_.jpg",
            "category_id" => 2,
        ]);

        Product::firstOrCreate([
            "name" => "The North Face Men's Resolve 2 Jacket",
            "slug" => Str::slug("The North Face Men's Resolve 2 Jacket"),
            "description" => "Durable waterproof, windproof jacket with breathable mesh lining.",
            "price" => 300,
            "discount" => 1,
            "stock" => 55,
            "image" => "https://m.media-amazon.com/images/I/718KQi-Z3WL._AC_SX425_.jpg",
            "category_id" => 2,
        ]);

        Product::firstOrCreate([
            "name" => "Dockers Men's Classic Fit Easy Khaki Pants",
            "slug" => Str::slug("Dockers Men's Classic Fit Easy Khaki Pants"),
            "description" => "Stretch khakis with wrinkle-free fabric and classic straight fit.",
            "price" => 100,
            "discount" => 0,
            "stock" => 90,
            "image" => "https://m.media-amazon.com/images/I/71De-IPZoeL._AC_SX679_.jpg",
            "category_id" => 2,
        ]);
        // End Category 2 (Clothes)


        // Start Category 3 (Bags)
        Product::firstOrCreate([
            "name" => "Crossbody Bag for Women Waterproof Shoulder Bag Messenger Bag Casual Nylon Purse Handbag",
            "slug" => Str::slug("Crossbody Bag for Women Waterproof Shoulder Bag Messenger Bag Casual Nylon Purse Handbag"),
            "description" => "Size: Large size:12.2 x 4.3 x 8.6 inch ;Small size:10.2 x 3.5 x 7.8 inch (L x W x H),.Lightweight crossbody bags for women travel and everyday use. The New Zipper Feature: The zipper puller may be in the middle of the track while both end is closed. Open the forward end of the zipper with your finger and then you can see a normal functioning zipper. Now zip up all your porckets and get ready for your trip!\r\nMaterial:Made of Polyester lining lightweight water resistant nylon with classic zippers, smooth and easy to open and close.\r\nMultifunctional Structure:Exterior:2 side pockets(These two side pockets only suitable for holding some small items,like keys,lipstick ect;Not suitable to fit water bottle) ,3 client zipped pockets,1 back zipper pocket;Interior:2 zipper pocket and two open pocket,the number of pockets make it easy to compartmentalize things you need to access quickly and readily without pulling everything out to get at it.\r\nMulti-Functional crossbody bag:Fashionable style,can be used as a handbag,shoulder bag or crossbody bag with a variety of storage options & organization features, ideal for travel,shopping,and daily using.\r\nComfortable: Lightweight nylon means less stress on sensitive shoulder muscles.Even after a full day of sightseeing,shopping,or errands this casual yet stylish tote won’t tug.\r\n",
            "price" => 800,
            "discount" => 5,
            "stock" => 18,
            "image" => "https://m.media-amazon.com/images/I/61LzOJNh0fL._AC_SY575_.jpg",
            "category_id" => 3,
        ]);

        Product::firstOrCreate([
            "name" => "The Canvas Medium Tote Bag",
            "slug" => Str::slug("The Canvas Medium Tote Bag"),
            "description" => "Easy top handles and an optional, adjustable strap provide convenient carrying options for this roomy canvas tote that folds flat for storage or travel.
                            Top zip closure
                            Top handles; optional, adjustable strap
                            Interior one zip pocket; two wall pockets
                            Canvas
                            Imported
                            Handbags
                            Item #5998351",
            "price" => 100,
            "discount" => 0,
            "stock" => 5,
            "image" => "https://n.nordstrommedia.com/it/1da1a6b6-24b7-4bb8-abd8-c1e61f869b08.jpeg?crop=pad&trim=color&w=780&h=1196",
            "category_id" => 3,
        ]);

        Product::firstOrCreate([
            "name" => "F Gear Tricoder 32 Ltrs Casual Backpack",
            "slug" => Str::slug("F Gear Tricoder 32 Ltrs Casual Backpack"),
            "description" => "Outer Material: Polyester
            Water resistant
            Number of compartments: 2
            Laptop Compatibility: NoS trap Type: Adjustable
            DIMENSIONS: 31 x 24 x 48 cms (L x W x H) Weight - 570G. Capacity - 32L.
            The backpack comes with a 1-year carry-in warranty for all manufacturing defects.",
            "price" => 200,
            "discount" => 1,
            "stock" => 82,
            "image" => "https://m.media-amazon.com/images/I/81-h0VqCjNL._SX679_.jpg",
            "category_id" => 3,
        ]);

        Product::firstOrCreate([
            "name" => "The Leather Small Tote Bag",
            "slug" => Str::slug("The Leather Small Tote Bag"),
            "description" => "Richly grained leather elevates this compact tote sized to hold the daily essentials and subtly branded with tonal logo embossing. Rolled top handles and a removable strap offer extra carrying options for your look.
            Top zip closure
            Rolled top handles; removable, adjustable strap
            Interior wall pocket
            Structured silhouette with flat base for stability
            Leather
            Imported",
            "price" => 100,
            "discount" => 0,
            "stock" => 20,
            "image" => "https://n.nordstrommedia.com/it/45ec674d-ac70-410a-af5d-1bbd20266bbf.jpeg?crop=pad&trim=color&w=780&h=1196",
            "category_id" => 3,
        ]);

        Product::firstOrCreate([
            "name" => "The Cristina Small Satchel",
            "slug" => Str::slug("The Cristina Small Satchel"),
            "description" => "Antique logo hardware and a ruched topline highlight the sleek leather exterior and geometric profile of a scaled-down satchel fitted with an optional crossbody strap for hands-free wear.
            Top zip closure
            Top carry handles; removable, adjustable crossbody strap
            Flat base for stability
            Lined
            Leather
            Imported",
            "price" => 500,
            "discount" => 2,
            "stock" => 100,
            "image" => "https://n.nordstrommedia.com/it/7d373fdd-ff26-4c66-bfc6-d3d866fbbbe2.jpeg?crop=pad&trim=color&w=780&h=1196",
            "category_id" => 3,
        ]);

        // End Category 3 (Bags)
    }
}
