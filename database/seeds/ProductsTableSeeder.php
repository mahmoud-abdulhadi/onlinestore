<?php

use Illuminate\Database\Seeder;

use App\Product ; 

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'title' => 'The Da Vinci Code',
            'description' => 'The Da Vinci Code is a 2003 mystery thriller novel by Dan Brown. It follows "symbologist" Robert Langdon and cryptologist Sophie Neveu after a murder in the Louvre Museum in Paris causes them to become involved in a battle between the Priory of Sion and Opus Dei over the possibility of Jesus Christ having been a companion to Mary Magdalene.',
            'cover' => 'https://upload.wikimedia.org/wikipedia/en/thumb/6/6b/DaVinciCode.jpg/220px-DaVinciCode.jpg',
            'price' => 8.15,
            'category_id' => 1


        ]);
      
        Product::create([
            'title' => 'Inferno',
            'description' => 'Inferno is a 2013 mystery thriller novel by American author Dan Brown and the fourth book in his Robert Langdon series, following Angels & Demons, The Da Vinci Code and The Lost Symbol. The book was published on May 14, 2013, ten years after publication of The Da Vinci Code (2003), by Doubleday.[1] It was number one on the New York Times Best Seller list for hardcover fiction and Combined Print & E-book fiction for the first eleven weeks of its release, and also remained on the list of E-book fiction for the first seventeen weeks of its release. A film adaptation was released in the United States on October 28, 2016.',
            'cover' => 'https://upload.wikimedia.org/wikipedia/en/b/bb/Inferno-cover.jpg',
            'price' => 10.0,
            'category_id' => 1


        ]);
       
        Product::create([
            'title' => 'The 48 Laws of Power',
            'description' => 'The 48 Laws of Power (1998) is the first book by American author Robert Greene. The book is a bestseller, selling over 1.2 million copies in the United States, and is popular with prison inmates and celebritie',
            'cover' => 'https://upload.wikimedia.org/wikipedia/en/9/9d/GreeneRobert-48LawsOfPower.jpg',
            'price' => 7.5,
            'category_id' => 1


        ]);
        Product::create([
            'title' => 'Digital Fortress',
            'description' => 'Digital Fortress is a techno-thriller novel written by American author Dan Brown and published in 1998 by St. Martin\'s Press. The book explores the theme of government surveillance of electronically stored information on the private lives of citizens, and the possible civil liberties and ethical implications of using such technology.',
            'cover' => 'https://upload.wikimedia.org/wikipedia/en/c/c9/DigitalFortress.jpg',
            'price' => 9.45,
            'category_id' => 1,
            'category_id' => 1


        ]);
        Product::create([
            'title' => 'The Lost Symbol',
            'description' => 'The Lost Symbol is a 2009 novel written by American writer Dan Brown.It is a thriller set in Washington, D.C., after the events of The Da Vinci Code, and relies on Freemasonry for both its recurring theme and its major characters.',
            'cover' => 'https://upload.wikimedia.org/wikipedia/en/0/07/LostSymbol.jpg',
            'price' => 6.99,
            'category_id' => 1


        ]);
        Product::create([
            'title' => 'The C Programming Language',
            'description' => 'The C Programming Language (sometimes termed K&R, after its authors\' initials) is a computer programming book written by Brian Kernighan and Dennis Ritchie, the latter of whom originally designed and implemented the language, as well as co-designed the Unix operating system with which development of the language was closely intertwined. The book was central to the development and popularization of the C programming language and is still widely read and used today. Because the book was co-authored by the original language designer, and because the first edition of the book served for many years as the de facto standard for the language, the book was regarded by many to be the authoritative reference on C.',
            'cover' => 'https://upload.wikimedia.org/wikipedia/en/thumb/5/5e/The_C_Programming_Language_cover.svg/464px-The_C_Programming_Language_cover.svg.png',
            'price' => 4.5,
            'category_id' => 1


        ]);


        Product::create([
            'title' => 'The Greatest Showman ',
            'description' => 'Hugh Jackman stars in this bold and original musical - inspired by the ambition and imagination of P.T. Barnum - celebrating the birth of show business and dreams coming to life.',
            'cover' => 'https://images-na.ssl-images-amazon.com/images/I/A10dWOrYXFL._RI_SX200_.jpg',
            'price' => 19.99,
            'category_id' => 7
        ]);

        Product::create([
            'title' => 'Doctor Strange',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'cover' => 'https://images-na.ssl-images-amazon.com/images/I/61guD9AYg7L._SX342_.jpg',
            'price' => 19.99,
            'category_id' => 7
        ]);

         Product::create([
            'title' => 'Logan',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'cover' => 'https://images-na.ssl-images-amazon.com/images/I/81AQG8qncDL._SX342_.jpg',
            'price' => 14.99,
            'category_id' => 7
        ]);


         Product::create([
            'title' => 'The Essential Stevie Ray Vaughan and Double Trouble',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'cover' => 'https://images-na.ssl-images-amazon.com/images/I/91cTAyZuReL._SX425_.jpg',
            'price' => 11.88,
            'category_id' => 2
        ]);

        Product::create([
            'title' => 'Night Train',
            'description' => 'Bluesers, old school soul fans, surfers, skaterheads and lotsa girls are lining up to follow the groove massive of superb singer, sax man and songwriter Terry Hanck. Night Train\'s twelve impressive tracks (five Hanck originals) revel in core traditions.Tvr Records.2005.',
            'cover' => 'https://images-na.ssl-images-amazon.com/images/I/51K87Z6536L._SX425_.jpg',
            'price' => 7.99,
            'category_id' => 2
        ]);


        Product::create([
            'title' => 'GOODTHREADS',
            'description' => '100% Cotton,Imported,machine wash',
            'cover' => 'https://images-na.ssl-images-amazon.com/images/I/A1PoY1tJkNL._UX425_.jpg',
            'price' => 25,
            'category_id' => 3
        ]);

        Product::create([
            'title' => 'Showyoo Women\'s Casual Short Sleeve Solid Criss Cross Front V-Neck T-Shirt TopsS',
            'description' => 'Material: 95% Rayon and 5% Spandex, Soft and Lightweight Fabric with Stretch,Casual and Loose, Premium Material Gives You Comfortable Feeling',
            'cover' => 'https://images-na.ssl-images-amazon.com/images/I/814lrsFyJeL._UY500_.jpg',
            'price' => 10.99,
            'category_id' => 3
        ]);


        Product::create([
            'title' => 'Chase & Chloe Kimmy-36 Women\'s Teardrop Cut Out T-Strap Mid Heel Dress Pumps',
            'description' => 'Synthetic-Imported-Synthetic sole-Platform measures approximately .25"',
            'cover' => 'https://images-na.ssl-images-amazon.com/images/I/71XN1FnR3EL._UY500_.jpg',
            'price' => 17.20,
            'category_id' => 3
        ]);


        Product::create([
            'title' => 'Samsung Electronics UN43MU6300 43-Inch 4K Ultra HD Smart LED TV (2017 Model)',
            'description' => '4X more pixels than Full HD means you’re getting 4X the resolution, so you’ll clearly see the difference,See vibrant and pure color for a realistic experience, smooth action on fast-moving content with Motion Rate 12',
            'cover' => 'https://images-na.ssl-images-amazon.com/images/I/616%2BK6M825L._SL1000_.jpg',
            'price' => 418.61,
            'category_id' => 4
        ]);


        Product::create([
            'title' => 'Sony Alpha a6000 Mirrorless Digitial Camera 24.3MP SLR Camera with 3.0-Inch LCD (Black) w/ 16-50mm Power Zoom Lens',
            'description' => '24 MP APS-C CMOS sensor and Focus Sensitivity Range :EV 0 to EV 20 (at ISO 100 equivalent with F2.8 lens attached),ISO 100-25600 (expandable to 51200). Lens compatibility- Sony E-mount lenses',
            'cover' => 'https://images-na.ssl-images-amazon.com/images/I/41AEqhgdLtL.jpg',
            'price' => 548.00,
            'category_id' => 4
        ]);

        Product::create([
            'title' => 'Acer Aspire E 15, 15.6" Full HD, 8th Gen Intel Core i3-8130U, 6GB RAM Memory, 1TB HDD, 8X DVD, E5-576-392H',
            'description' => '8th Generation Intel Core i3-8130U Processor (Up to 3.4GHz)-15.6" Full HD (1920 x 1080) widescreen LED-lit Display',
            'cover' => 'http://d2pa5gi5n2e1an.cloudfront.net/global/images/product/laptops/Aspire_One_14_Z1_402_34M3/Aspire_One_14_Z1_402_34M3_L_1.jpg',
            'price' => 379.00,
            'category_id' => 5
        ]);


    
        Product::create([
            'title' => '(Updated Version) Soundbar, TaoTronics Sound Bar Wired and Wireless Bluetooth Audio Speakers (25-Inch, Included Optical Cable, Dual Connection Methods, Remote Control with Learning Function)',
            'description' => '25" Sound Bar: No need to have a spacious living room to enjoy better audio playback! This compact soundbar installs unobtrusively in bedrooms and small environments.',
            'cover' => 'https://www.legrandintegratedsolutions.com/content/uploads/2018/01/xp500-soundabar-555x437.jpg.pagespeed.ic.D4nz9VxviG.jpg',
            'price' => 86.00,
            'category_id' => 5
        ]);


        Product::create([
            'title' => 'Minecraft',
            'description' => 'The Better Together update is here! Explore massive multiplayer servers directly from the game menu and play with friends on all different devices.',
            'cover' => 'https://images-na.ssl-images-amazon.com/images/I/61GA3lSuDNL.png',
            'price' => 6.99,
            'category_id' => 6
        ]);



        Product::create([
            'title' => 'Geometry Dash',
            'description' => 'Jump and fly your way through danger in this rhythm-based action platformer!

Prepare for a near impossible challenge in the world of Geometry Dash. Push your skills to the limit as you jump, fly and flip your way through dangerous passages and spiky obstacles.

Simple one touch game play with lots of levels that will keep you entertained for hours!
',
            'cover' => 'https://images-na.ssl-images-amazon.com/images/I/61mVIP6Oo1L.png',
            'price' => 1.99,
            'category_id' => 6
        ]);


        Product::create([
            'title' => 'Geometry Dash',
            'description' => 'Jump and fly your way through danger in this rhythm-based action platformer!

Prepare for a near impossible challenge in the world of Geometry Dash. Push your skills to the limit as you jump, fly and flip your way through dangerous passages and spiky obstacles.

Simple one touch game play with lots of levels that will keep you entertained for hours!
',
            'cover' => 'https://images-na.ssl-images-amazon.com/images/I/61mVIP6Oo1L.png',
            'price' => 1.99,
            'category_id' => 6
        ]);


          Product::create([
            'title' => 'Crime Town Police Car Driver',
            'description' => 'It’s time for a wild chase in COP vs CRIMINAL!

                The rivalry between criminals and police takes a new TWIST with this latest sequel. You are presented with various missions, and you have to emerge as the real hero by instilling justice, and cleaning up the streets. Chase and catch criminals with your superior driving and running skills to restore peace for town dwellers. Leave no avenue of escape!

                Put on your badge and start the engine. You have a reputation to maintain, and a city to save! Lawful citizens and peaceful pedestrians are awaiting your rescue! Root out the thugs and gangsters with your detective skills. Crash and smash their escape vehicles with your driving skills! Chase and hunt down the thieves with your complimentary stash of police weapons. Utilize your arsenal of guns to scare evil forces back into jail. Run through the alleys and streets of an exciting urban environment. Emerge as the hero!
',
            'cover' => 'https://images-na.ssl-images-amazon.com/images/I/81%2BwcX5OvGL.png',
            'price' => 0.99,
            'category_id' => 6
        ]);


          Product::create([
            'title' => 'iHeartRadio - Free Music & Internet Radio',
            'description' => 'It’s time for a wild chase in COP vs CRIMINAL!

                The rivalry between criminals and police takes a new TWIST with this latest sequel. You are presented with various missions, and you have to emerge as the real hero by instilling justice, and cleaning up the streets. Chase and catch criminals with your superior driving and running skills to restore peace for town dwellers. Leave no avenue of escape!

                Put on your badge and start the engine. You have a reputation to maintain, and a city to save! Lawful citizens and peaceful pedestrians are awaiting your rescue! Root out the thugs and gangsters with your detective skills. Crash and smash their escape vehicles with your driving skills! Chase and hunt down the thieves with your complimentary stash of police weapons. Utilize your arsenal of guns to scare evil forces back into jail. Run through the alleys and streets of an exciting urban environment. Emerge as the hero!
',
            'cover' => 'https://images-na.ssl-images-amazon.com/images/I/41mbGzKzgWL.png',
            'price' => 2.99,
            'category_id' => 6
        ]);






















        
    }
}
