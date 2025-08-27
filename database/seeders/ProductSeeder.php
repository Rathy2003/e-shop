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
        Product::create([
           "name" => "UEU Women Oversized T-Shirt Summer Casual Loose Fit Short Sleeve Basic Tops Workout Gym Tee Shirt",
           "slug" => Str::slug("UEU Women Oversized T-Shirt"),
           "description" => "The breathable fabric ensures a cozy and pleasant wear, offering a soft and comfortable feel with added elasticity. Its loose fit and simple design make it suitable for everyone, providing a versatile and inclusive clothing option that complements a diverse range of personal styles.\r\nThis oversize T-shirt stands out with its rolled sleeves, adding a delightful detail to the simple tee. The basic tee shirt is designed for comfort, featuring a relaxed fit that allows for ease of movement. The plain and basic style makes it versatile for all seasons, providing a go-to option for a range of looks.\r\nIdeal for a concise look, this loose shirt can be effortlessly tucked in or left out when paired with jeans, shorts, leggings, pants, or a skirt. It\'s not limited to warm weather – throw on a jacket during cold weather, and you\'ve got a must-have piece that complements your wardrobe.\r\nSuitable for many occasions, from casual daily activities to travel, home, vacation, shopping, street outings, parties, workout, gym and outdoor adventures. Dress it up or down with accessories to suit various occasions while maintaining a fashion-forward, uncomplicated look.\r\nEasy to care for, this summer shirt is machine or hand washable with cold water, and it can be hung or line dried. Avoid bleach and dry cleaning for long-lasting wear. The white option is a bit see-through, so it\'s recommended to pair it with a nude bra or a cardigan for those casual summer vibes.",
           "price" => 14.99,
           "discount" => 0,
           "stock" => 100,
           "image" => "https://m.media-amazon.com/images/I/71ngZ9KGCRL._AC_SY550_.jpg",
           "category_id" => 1,
        ]);

        Product::create([
            "name" => "adidas Men\'s Ultradream DNA Sneaker",
            "slug" => Str::slug("adidas Men\'s Ultradream DNA Sneaker"),
            "description" => "Men\'s adidas shoes with a full-length midsole for extra comfort\r\nDREAMSTRIKE+ MIDSOLE: Full-length Dreamstrike EVA for comfort and support\r\nFLEXIBLE UPPER: Soft textile upper is stretchy and comfortable\r\nSTABILITY: Quarter cage and external heel counter for stability\r\nMADE IN PART WITH RECYCLED CONTENT: This product features at least 20% recycled materials. By reusing materials that have already been created, we help to reduce waste and our reliance on finite resources and reduce the footprint of the products we make",
            "price" => 20.00,
            "discount" => 10,
            "stock" => 68,
            "image" => "https://m.media-amazon.com/images/I/718Sl8Rg38L._AC_SY575_.jpg",
            "category_id" => 2,
        ]);

        Product::create([
            "name" => "Crossbody Bag for Women Waterproof Shoulder Bag Messenger Bag Casual Nylon Purse Handbag",
            "slug" => Str::slug("Crossbody Bag for Women Waterproof Shoulder Bag Messenger Bag Casual Nylon Purse Handbag"),
            "description" => "Size: Large size:12.2 x 4.3 x 8.6 inch ;Small size:10.2 x 3.5 x 7.8 inch (L x W x H),.Lightweight crossbody bags for women travel and everyday use. The New Zipper Feature: The zipper puller may be in the middle of the track while both end is closed. Open the forward end of the zipper with your finger and then you can see a normal functioning zipper. Now zip up all your porckets and get ready for your trip!\r\nMaterial:Made of Polyester lining lightweight water resistant nylon with classic zippers, smooth and easy to open and close.\r\nMultifunctional Structure:Exterior:2 side pockets(These two side pockets only suitable for holding some small items,like keys,lipstick ect;Not suitable to fit water bottle) ,3 client zipped pockets,1 back zipper pocket;Interior:2 zipper pocket and two open pocket,the number of pockets make it easy to compartmentalize things you need to access quickly and readily without pulling everything out to get at it.\r\nMulti-Functional crossbody bag:Fashionable style,can be used as a handbag,shoulder bag or crossbody bag with a variety of storage options & organization features, ideal for travel,shopping,and daily using.\r\nComfortable: Lightweight nylon means less stress on sensitive shoulder muscles.Even after a full day of sightseeing,shopping,or errands this casual yet stylish tote won’t tug.\r\n",
            "price" => 28.95,
            "discount" => 5,
            "stock" => 18,
            "image" => "https://m.media-amazon.com/images/I/61LzOJNh0fL._AC_SY575_.jpg",
            "category_id" => 3,
        ]);
    }
}
