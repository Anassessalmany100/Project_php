<?php
session_start();
if (empty($_SESSION["username"])) {
    header("location:login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookHaven - Buy and Rent Books Online</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Playfair+Display:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <script>tailwind.config = { theme: { extend: { colors: { primary: '#2C3E50', secondary: '#E74C3C' }, borderRadius: { 'none': '0px', 'sm': '4px', DEFAULT: '8px', 'md': '12px', 'lg': '16px', 'xl': '20px', '2xl': '24px', '3xl': '32px', 'full': '9999px', 'button': '8px' } } } }</script>
    <link rel="stylesheet" href="style.css">


</head>

<body class="bg-gray-50">
    <!-- Header Navigation -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-4 py-3 flex items-center justify-between">
            <a href="#" class="text-2xl font-['Pacifico'] text-primary">BookHaven</a>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center space-x-6">
                <a href="#" class="text-primary font-medium">Home</a>
                <a href="#" class="text-gray-600 hover:text-primary transition-colors">Browse Books</a>
                <a href="#" class="text-gray-600 hover:text-primary transition-colors">New Arrivals</a>
                <a href="#" class="text-gray-600 hover:text-primary transition-colors">Bestsellers</a>
                <a href="books.php" class="text-gray-600 hover:text-primary transition-colors">Manage Books</a>
            </nav>

            <!-- Search Bar -->
            <div class="hidden md:flex relative w-1/3">
                <input type="text" placeholder="Search for books, authors..."
                    class="w-full py-2 px-4 pr-10 border border-gray-300 rounded-button focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary">
                <div
                    class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 flex items-center justify-center text-gray-400">
                    <i class="ri-search-line"></i>
                </div>
            </div>

            <!-- User Actions -->
            <div class="flex items-center space-x-4">
                <a href="#" class="hidden md:flex items-center text-gray-600 hover:text-primary transition-colors">
                    <div class="w-5 h-5 flex items-center justify-center mr-1">
                        <i class="ri-heart-line"></i>
                    </div>
                    <span>Wishlist</span>
                </a>
                <a href="#" class="hidden md:flex items-center text-gray-600 hover:text-primary transition-colors">
                    <div class="w-5 h-5 flex items-center justify-center mr-1">
                        <i class="ri-shopping-cart-line"></i>
                    </div>
                    <span>Cart</span>
                </a>

                <!-- Login/Profile Button -->
                <div class="relative" id="profileDropdown">
                    <button id="profileButton"
                        class="flex items-center space-x-1 text-gray-600 hover:text-primary transition-colors">
                        <div class="w-8 h-8 flex items-center justify-center bg-gray-100 rounded-full">
                            <i class="ri-user-line"></i>
                        </div>
                        <span class="hidden md:inline">Profile</span>
                        <div class="w-4 h-4 flex items-center justify-center">
                            <i class="ri-arrow-down-s-line"></i>
                        </div>
                    </button>
                    <div id="profileMenu" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 hidden">
                        <div id="loggedOutMenu">
                            <a href="info.php"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">information</a>
                            <a href="logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">log
                                out</a>
                            <a href="delete.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Delete
                                Account</a>
                        </div>
                        <div id="loggedInMenu" class="hidden">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">My Profile</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">My Orders</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                            <div class="border-t border-gray-100"></div>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                id="logoutButton">Logout</a>
                        </div>
                    </div>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobileMenuButton"
                    class="md:hidden w-10 h-10 flex items-center justify-center text-gray-600">
                    <i class="ri-menu-line text-xl"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Search and Navigation -->
        <div id="mobileMenu" class="md:hidden hidden px-4 py-3 bg-white border-t border-gray-100">
            <div class="relative mb-3">
                <input type="text" placeholder="Search for books, authors..."
                    class="w-full py-2 px-4 pr-10 border border-gray-300 rounded-button focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary">
                <div
                    class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 flex items-center justify-center text-gray-400">
                    <i class="ri-search-line"></i>
                </div>
            </div>
            <nav class="flex flex-col space-y-3">
                <a href="#" class="text-primary font-medium">Home</a>
                <a href="#" class="text-gray-600">Browse Books</a>
                <a href="#" class="text-gray-600">New Arrivals</a>
                <a href="#" class="text-gray-600">Bestsellers</a>
                <a href="#" class="text-gray-600 flex items-center">
                    <div class="w-5 h-5 flex items-center justify-center mr-2">
                        <i class="ri-heart-line"></i>
                    </div>
                    <span>Wishlist</span>
                </a>
                <a href="#" class="text-gray-600 flex items-center">
                    <div class="w-5 h-5 flex items-center justify-center mr-2">
                        <i class="ri-shopping-cart-line"></i>
                    </div>
                    <span>Cart</span>
                </a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero-section text-white">
        <div class="container mx-auto px-4 py-16 md:py-24">
            <div class="max-w-2xl">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Discover Your Next Favorite Book</h1>
                <p class="text-lg mb-8">Buy or rent from our vast collection of books. Enjoy reading without breaking
                    the bank.</p>
                <div class="flex flex-wrap gap-3">
                    <button
                        class="bg-secondary hover:bg-secondary/90 text-white px-6 py-3 rounded-button font-medium transition-colors whitespace-nowrap">
                        Browse Collection
                    </button>
                    <button
                        class="bg-white hover:bg-gray-100 text-primary px-6 py-3 rounded-button font-medium transition-colors whitespace-nowrap">
                        How It Works
                    </button>
                </div>
            </div>
        </div>
    </section>
    <!-- Category Filters -->
    <section class="bg-white py-8 border-b">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap justify-center gap-4">
                <button
                    class="px-6 py-2 bg-primary text-white rounded-full font-medium transition-colors hover:bg-primary/90 whitespace-nowrap">All
                    Books</button>
                <button
                    class="px-6 py-2 bg-gray-100 text-gray-700 rounded-full font-medium transition-colors hover:bg-gray-200 whitespace-nowrap">Buy</button>
                <button
                    class="px-6 py-2 bg-gray-100 text-gray-700 rounded-full font-medium transition-colors hover:bg-gray-200 whitespace-nowrap">Rent</button>
                <button
                    class="px-6 py-2 bg-gray-100 text-gray-700 rounded-full font-medium transition-colors hover:bg-gray-200 whitespace-nowrap">New
                    Arrivals</button>
                <button
                    class="px-6 py-2 bg-gray-100 text-gray-700 rounded-full font-medium transition-colors hover:bg-gray-200 whitespace-nowrap">Bestsellers</button>
                <button
                    class="px-6 py-2 bg-gray-100 text-gray-700 rounded-full font-medium transition-colors hover:bg-gray-200 whitespace-nowrap">Fiction</button>
                <button
                    class="px-6 py-2 bg-gray-100 text-gray-700 rounded-full font-medium transition-colors hover:bg-gray-200 whitespace-nowrap">Non-Fiction</button>
            </div>
        </div>
    </section>

    <!-- Featured Books -->
    <section class="py-12">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl md:text-3xl font-bold">Featured Books</h2>
                <a href="#" class="text-primary hover:underline flex items-center">
                    <span>View All</span>
                    <div class="w-5 h-5 flex items-center justify-center ml-1">
                        <i class="ri-arrow-right-line"></i>
                    </div>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <!-- Book Card 1 -->
                <div class="book-card bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md">
                    <div class="relative">
                        <img src="img/The Midnight Library.jpg" alt="The Midnight Library"
                            class="w-full h-64 object-cover object-top">
                        <button
                            class="wishlist-heart absolute top-3 right-3 w-8 h-8 flex items-center justify-center bg-white/80 backdrop-blur-sm rounded-full text-gray-600 hover:text-secondary">
                            <i class="ri-heart-line"></i>
                        </button>
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="font-medium text-lg line-clamp-1">The Midnight Library</h3>
                            <span class="bg-primary/10 text-primary text-xs px-2 py-1 rounded-full">Bestseller</span>
                        </div>
                        <p class="text-gray-600 mb-2">Matt Haig</p>
                        <div class="flex items-center mb-3">
                            <div class="flex text-yellow-400">
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-half-fill"></i>
                            </div>
                            <span class="text-gray-500 text-sm ml-1">(487)</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-gray-800 font-bold">$15.99</p>
                                <p class="text-gray-500 text-sm">Rent: $4.99/month</p>
                            </div>
                            <div class="flex space-x-2">
                                <button
                                    class="w-10 h-10 flex items-center justify-center bg-gray-100 rounded-full text-primary hover:bg-gray-200 transition-colors">
                                    <i class="ri-shopping-cart-line"></i>
                                </button>
                                <button
                                    class="bg-primary hover:bg-primary/90 text-white px-4 py-2 rounded-button transition-colors whitespace-nowrap">Buy
                                    Now</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Book Card 2 -->
                <div class="book-card bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md">
                    <div class="relative">
                        <img src="img/Atomic Habits.jpg" alt="Atomic Habits"
                            class="w-full h-64 object-cover object-top">
                        <button
                            class="wishlist-heart absolute top-3 right-3 w-8 h-8 flex items-center justify-center bg-white/80 backdrop-blur-sm rounded-full text-gray-600 hover:text-secondary">
                            <i class="ri-heart-line"></i>
                        </button>
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="font-medium text-lg line-clamp-1">Atomic Habits</h3>
                            <span class="bg-secondary/10 text-secondary text-xs px-2 py-1 rounded-full">New</span>
                        </div>
                        <p class="text-gray-600 mb-2">James Clear</p>
                        <div class="flex items-center mb-3">
                            <div class="flex text-yellow-400">
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                            </div>
                            <span class="text-gray-500 text-sm ml-1">(1,243)</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-gray-800 font-bold">$18.99</p>
                                <p class="text-gray-500 text-sm">Rent: $5.99/month</p>
                            </div>
                            <div class="flex space-x-2">
                                <button
                                    class="w-10 h-10 flex items-center justify-center bg-gray-100 rounded-full text-primary hover:bg-gray-200 transition-colors">
                                    <i class="ri-shopping-cart-line"></i>
                                </button>
                                <button
                                    class="bg-primary hover:bg-primary/90 text-white px-4 py-2 rounded-button transition-colors whitespace-nowrap">Buy
                                    Now</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Book Card 3 -->
                <div class="book-card bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md">
                    <div class="relative">
                        <img src="img/Educated.jpg" alt="Educated" class="w-full h-64 object-cover object-top">
                        <button
                            class="wishlist-heart absolute top-3 right-3 w-8 h-8 flex items-center justify-center bg-white/80 backdrop-blur-sm rounded-full text-gray-600 hover:text-secondary">
                            <i class="ri-heart-line"></i>
                        </button>
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="font-medium text-lg line-clamp-1">Educated</h3>
                        </div>
                        <p class="text-gray-600 mb-2">Tara Westover</p>
                        <div class="flex items-center mb-3">
                            <div class="flex text-yellow-400">
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-line"></i>
                            </div>
                            <span class="text-gray-500 text-sm ml-1">(892)</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-gray-800 font-bold">$14.50</p>
                                <p class="text-gray-500 text-sm">Rent: $3.99/month</p>
                            </div>
                            <div class="flex space-x-2">
                                <button
                                    class="w-10 h-10 flex items-center justify-center bg-gray-100 rounded-full text-primary hover:bg-gray-200 transition-colors">
                                    <i class="ri-shopping-cart-line"></i>
                                </button>
                                <button
                                    class="bg-primary hover:bg-primary/90 text-white px-4 py-2 rounded-button transition-colors whitespace-nowrap">Buy
                                    Now</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Book Card 4 -->
                <div class="book-card bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md">
                    <div class="relative">
                        <img src="img/Where the Crawdads Sing.jpg" alt="Where the Crawdads Sing"
                            class="w-full h-64 object-cover object-top">
                        <button
                            class="wishlist-heart absolute top-3 right-3 w-8 h-8 flex items-center justify-center bg-white/80 backdrop-blur-sm rounded-full text-gray-600 hover:text-secondary">
                            <i class="ri-heart-line"></i>
                        </button>
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="font-medium text-lg line-clamp-1">Where the Crawdads Sing</h3>
                        </div>
                        <p class="text-gray-600 mb-2">Delia Owens</p>
                        <div class="flex items-center mb-3">
                            <div class="flex text-yellow-400">
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-half-fill"></i>
                            </div>
                            <span class="text-gray-500 text-sm ml-1">(1,056)</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-gray-800 font-bold">$16.99</p>
                                <p class="text-gray-500 text-sm">Rent: $4.99/month</p>
                            </div>
                            <div class="flex space-x-2">
                                <button
                                    class="w-10 h-10 flex items-center justify-center bg-gray-100 rounded-full text-primary hover:bg-gray-200 transition-colors">
                                    <i class="ri-shopping-cart-line"></i>
                                </button>
                                <button
                                    class="bg-primary hover:bg-primary/90 text-white px-4 py-2 rounded-button transition-colors whitespace-nowrap">Buy
                                    Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- New Arrivals -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl md:text-3xl font-bold">New Arrivals</h2>
                <a href="#" class="text-primary hover:underline flex items-center">
                    <span>View All</span>
                    <div class="w-5 h-5 flex items-center justify-center ml-1">
                        <i class="ri-arrow-right-line"></i>
                    </div>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <!-- Book Card 1 -->
                <div class="book-card bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md">
                    <div class="relative">
                        <img src="img/The Invisible Life of Addie LaRue.jpg" alt="The Invisible Life of Addie LaRue"
                            class="w-full h-64 object-cover object-top">
                        <button
                            class="wishlist-heart absolute top-3 right-3 w-8 h-8 flex items-center justify-center bg-white/80 backdrop-blur-sm rounded-full text-gray-600 hover:text-secondary">
                            <i class="ri-heart-line"></i>
                        </button>
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="font-medium text-lg line-clamp-1">The Invisible Life of Addie LaRue</h3>
                            <span class="bg-secondary/10 text-secondary text-xs px-2 py-1 rounded-full">New</span>
                        </div>
                        <p class="text-gray-600 mb-2">V.E. Schwab</p>
                        <div class="flex items-center mb-3">
                            <div class="flex text-yellow-400">
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-half-fill"></i>
                            </div>
                            <span class="text-gray-500 text-sm ml-1">(723)</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-gray-800 font-bold">$19.99</p>
                                <p class="text-gray-500 text-sm">Rent: $5.99/month</p>
                            </div>
                            <div class="flex space-x-2">
                                <button
                                    class="w-10 h-10 flex items-center justify-center bg-gray-100 rounded-full text-primary hover:bg-gray-200 transition-colors">
                                    <i class="ri-shopping-cart-line"></i>
                                </button>
                                <button
                                    class="bg-primary hover:bg-primary/90 text-white px-4 py-2 rounded-button transition-colors whitespace-nowrap">Buy
                                    Now</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Book Card 2 -->
                <div class="book-card bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md">
                    <div class="relative">
                        <img src="img/Project Hail Mary.jpg" alt="Project Hail Mary"
                            class="w-full h-64 object-cover object-top">
                        <button
                            class="wishlist-heart absolute top-3 right-3 w-8 h-8 flex items-center justify-center bg-white/80 backdrop-blur-sm rounded-full text-gray-600 hover:text-secondary">
                            <i class="ri-heart-line"></i>
                        </button>
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="font-medium text-lg line-clamp-1">Project Hail Mary</h3>
                            <span class="bg-secondary/10 text-secondary text-xs px-2 py-1 rounded-full">New</span>
                        </div>
                        <p class="text-gray-600 mb-2">Andy Weir</p>
                        <div class="flex items-center mb-3">
                            <div class="flex text-yellow-400">
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                            </div>
                            <span class="text-gray-500 text-sm ml-1">(512)</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-gray-800 font-bold">$21.99</p>
                                <p class="text-gray-500 text-sm">Rent: $6.99/month</p>
                            </div>
                            <div class="flex space-x-2">
                                <button
                                    class="w-10 h-10 flex items-center justify-center bg-gray-100 rounded-full text-primary hover:bg-gray-200 transition-colors">
                                    <i class="ri-shopping-cart-line"></i>
                                </button>
                                <button
                                    class="bg-primary hover:bg-primary/90 text-white px-4 py-2 rounded-button transition-colors whitespace-nowrap">Buy
                                    Now</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Book Card 3 -->
                <div class="book-card bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md">
                    <div class="relative">
                        <img src="img/Klara and the Sun.jpg" alt="Klara and the Sun"
                            class="w-full h-64 object-cover object-top">
                        <button
                            class="wishlist-heart absolute top-3 right-3 w-8 h-8 flex items-center justify-center bg-white/80 backdrop-blur-sm rounded-full text-gray-600 hover:text-secondary">
                            <i class="ri-heart-line"></i>
                        </button>
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="font-medium text-lg line-clamp-1">Klara and the Sun</h3>
                            <span class="bg-secondary/10 text-secondary text-xs px-2 py-1 rounded-full">New</span>
                        </div>
                        <p class="text-gray-600 mb-2">Kazuo Ishiguro</p>
                        <div class="flex items-center mb-3">
                            <div class="flex text-yellow-400">
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-line"></i>
                            </div>
                            <span class="text-gray-500 text-sm ml-1">(347)</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-gray-800 font-bold">$17.99</p>
                                <p class="text-gray-500 text-sm">Rent: $4.99/month</p>
                            </div>
                            <div class="flex space-x-2">
                                <button
                                    class="w-10 h-10 flex items-center justify-center bg-gray-100 rounded-full text-primary hover:bg-gray-200 transition-colors">
                                    <i class="ri-shopping-cart-line"></i>
                                </button>
                                <button
                                    class="bg-primary hover:bg-primary/90 text-white px-4 py-2 rounded-button transition-colors whitespace-nowrap">Buy
                                    Now</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Book Card 4 -->
                <div class="book-card bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md">
                    <div class="relative">
                        <img src="img/The Four Winds.jpg" alt="The Four Winds"
                            class="w-full h-64 object-cover object-top">
                        <button
                            class="wishlist-heart absolute top-3 right-3 w-8 h-8 flex items-center justify-center bg-white/80 backdrop-blur-sm rounded-full text-gray-600 hover:text-secondary">
                            <i class="ri-heart-line"></i>
                        </button>
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="font-medium text-lg line-clamp-1">The Four Winds</h3>
                            <span class="bg-secondary/10 text-secondary text-xs px-2 py-1 rounded-full">New</span>
                        </div>
                        <p class="text-gray-600 mb-2">Kristin Hannah</p>
                        <div class="flex items-center mb-3">
                            <div class="flex text-yellow-400">
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-half-fill"></i>
                            </div>
                            <span class="text-gray-500 text-sm ml-1">(629)</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-gray-800 font-bold">$18.50</p>
                                <p class="text-gray-500 text-sm">Rent: $5.50/month</p>
                            </div>
                            <div class="flex space-x-2">
                                <button
                                    class="w-10 h-10 flex items-center justify-center bg-gray-100 rounded-full text-primary hover:bg-gray-200 transition-colors">
                                    <i class="ri-shopping-cart-line"></i>
                                </button>
                                <button
                                    class="bg-primary hover:bg-primary/90 text-white px-4 py-2 rounded-button transition-colors whitespace-nowrap">Buy
                                    Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">How BookHaven Works</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Discover the easiest way to buy or rent your favorite books
                    online. Our process is simple and designed with readers in mind.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Step 1 -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-6">
                        <div class="w-10 h-10 flex items-center justify-center text-primary text-2xl">
                            <i class="ri-search-line"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Browse & Discover</h3>
                    <p class="text-gray-600">Explore our vast collection of books across various genres. Use filters to
                        find exactly what you're looking for.</p>
                </div>

                <!-- Step 2 -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-6">
                        <div class="w-10 h-10 flex items-center justify-center text-primary text-2xl">
                            <i class="ri-shopping-cart-line"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Choose Your Option</h3>
                    <p class="text-gray-600">Decide whether you want to buy the book permanently or rent it for a
                        specific period at a lower cost.</p>
                </div>

                <!-- Step 3 -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-6">
                        <div class="w-10 h-10 flex items-center justify-center text-primary text-2xl">
                            <i class="ri-book-open-line"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Enjoy Reading</h3>
                    <p class="text-gray-600">Receive your books quickly and dive into your reading adventure. Return
                        rentals easily when you're done.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">What Our Readers Say</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Thousands of book lovers trust BookHaven for their reading
                    needs. Here's what some of them have to say.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <div class="flex text-yellow-400 mb-4">
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                    </div>
                    <p class="text-gray-600 mb-6">"J'adore l'option de location ! En tant que stagiaire à l'OFPPT Fès
                        (Liste Al Addarissa), cela m'aide vraiment à économiser sur les manuels scolaires et les romans
                        pour mes cours de littérature. Le processus est simple et les livres arrivent toujours en
                        parfait état."</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center mr-4">
                            <div class="w-6 h-6 flex items-center justify-center text-gray-500">
                                <i class="ri-user-line"></i>
                            </div>
                        </div>
                        <div>
                            <h4 class="font-medium">El Mostafa Belayd</h4>
                            <p class="text-gray-500 text-sm">OFPPT ,student fes</p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <div class="flex text-yellow-400 mb-4">
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                    </div>
                    <p class="text-gray-600 mb-6">"BookHaven has transformed how I build my home library. The prices are
                        competitive, shipping is fast, and their wishlist feature helps me keep track of all the books I
                        want to read next."</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center mr-4">
                            <div class="w-6 h-6 flex items-center justify-center text-gray-500">
                                <i class="ri-user-line"></i>
                            </div>
                        </div>
                        <div>
                            <h4 class="font-medium">Wanelou</h4>
                            <p class="text-gray-500 text-sm">OFPPT ,student fes</p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <div class="flex text-yellow-400 mb-4">
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-half-fill"></i>
                    </div>
                    <p class="text-gray-600 mb-6">"As a parent, I appreciate how easy BookHaven makes it to find
                        age-appropriate books for my children. The detailed descriptions and reviews help me make
                        informed choices, and the kids love the books!"</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center mr-4">
                            <div class="w-6 h-6 flex items-center justify-center text-gray-500">
                                <i class="ri-user-line"></i>
                            </div>
                        </div>
                        <div>
                            <h4 class="font-medium">anass es-salmany</h4>
                            <p class="text-gray-500 text-sm">OFPPT ,student fes</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="py-16 bg-primary text-white">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Join Our Book Lovers Community</h2>
                <p class="mb-8">Subscribe to our newsletter and be the first to know about new releases, exclusive
                    deals, and reading recommendations.</p>
                <div class="flex flex-col sm:flex-row gap-4 max-w-lg mx-auto">
                    <input type="email" placeholder="Your email address"
                        class="flex-grow py-3 px-4 rounded-button border-none focus:outline-none focus:ring-2 focus:ring-white/30 text-gray-800">
                    <button
                        class="bg-secondary hover:bg-secondary/90 text-white py-3 px-6 rounded-button font-medium transition-colors whitespace-nowrap">Subscribe</button>
                </div>
                <p class="text-sm mt-4 text-white/80">We respect your privacy. Unsubscribe at any time.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white pt-12 pb-6">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
                <!-- Company Info -->
                <div>
                    <h3 class="text-xl font-['Pacifico'] mb-4">BookHaven</h3>
                    <p class="text-gray-400 mb-4">Your one-stop destination for buying and renting books online.
                        Discover, read, and share the joy of literature.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <div class="w-8 h-8 flex items-center justify-center">
                                <i class="ri-facebook-fill"></i>
                            </div>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <div class="w-8 h-8 flex items-center justify-center">
                                <i class="ri-twitter-x-fill"></i>
                            </div>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <div class="w-8 h-8 flex items-center justify-center">
                                <i class="ri-instagram-fill"></i>
                            </div>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <div class="w-8 h-8 flex items-center justify-center">
                                <i class="ri-pinterest-fill"></i>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-lg font-bold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Home</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Browse Books</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">New Arrivals</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Bestsellers</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Rental Program</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Gift Cards</a></li>
                    </ul>
                </div>

                <!-- Customer Service -->
                <div>
                    <h4 class="text-lg font-bold mb-4">Customer Service</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">My Account</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Track Orders</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Shipping Policy</a>
                        </li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Returns & Refunds</a>
                        </li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">FAQ</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Contact Us</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h4 class="text-lg font-bold mb-4">Contact Us</h4>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <div class="w-5 h-5 flex items-center justify-center mr-2 mt-1 text-gray-400">
                                <i class="ri-map-pin-line"></i>
                            </div>
                            <span class="text-gray-400">123 Book Street, Reading City, RC 12345, USA</span>
                        </li>
                        <li class="flex items-center">
                            <div class="w-5 h-5 flex items-center justify-center mr-2 text-gray-400">
                                <i class="ri-phone-line"></i>
                            </div>
                            <span class="text-gray-400">(123) 456-7890</span>
                        </li>
                        <li class="flex items-center">
                            <div class="w-5 h-5 flex items-center justify-center mr-2 text-gray-400">
                                <i class="ri-mail-line"></i>
                            </div>
                            <span class="text-gray-400">support@bookhaven.com</span>
                        </li>
                        <li class="flex items-center">
                            <div class="w-5 h-5 flex items-center justify-center mr-2 text-gray-400">
                                <i class="ri-time-line"></i>
                            </div>
                            <span class="text-gray-400">Mon-Fri: 9AM - 6PM</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-700 pt-6 mt-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-400 text-sm mb-4 md:mb-0">&copy; 2025 BookHaven. All rights reserved.</p>
                    <div class="flex flex-wrap justify-center gap-4">
                        <a href="#" class="text-gray-400 hover:text-white text-sm">Privacy Policy</a>
                        <a href="#" class="text-gray-400 hover:text-white text-sm">Terms of Service</a>
                        <a href="#" class="text-gray-400 hover:text-white text-sm">Accessibility</a>
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-5 flex items-center justify-center text-gray-400">
                                <i class="ri-visa-fill"></i>
                            </div>
                            <div class="w-8 h-5 flex items-center justify-center text-gray-400">
                                <i class="ri-mastercard-fill"></i>
                            </div>
                            <div class="w-8 h-5 flex items-center justify-center text-gray-400">
                                <i class="ri-paypal-fill"></i>
                            </div>
                            <div class="w-8 h-5 flex items-center justify-center text-gray-400">
                                <i class="ri-apple-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Login Modal -->
    <div id="loginModal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-lg w-full max-w-md mx-4 overflow-hidden">
            <div class="flex justify-between items-center p-6 border-b">
                <h3 class="text-xl font-bold">Login to Your Account</h3>
                <button class="text-gray-500 hover:text-gray-700" onclick="closeModal('loginModal')">
                    <div class="w-6 h-6 flex items-center justify-center">
                        <i class="ri-close-line"></i>
                    </div>
                </button>
            </div>
            <div class="p-6">
                <form id="loginForm">
                    <div class="mb-4">
                        <label for="loginEmail" class="block text-gray-700 mb-2">Email Address</label>
                        <input type="email" id="loginEmail"
                            class="w-full px-4 py-2 border border-gray-300 rounded-button focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary"
                            required>
                    </div>
                    <div class="mb-6">
                        <label for="loginPassword" class="block text-gray-700 mb-2">Password</label>
                        <input type="password" id="loginPassword"
                            class="w-full px-4 py-2 border border-gray-300 rounded-button focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary"
                            required>
                    </div>
                    <div class="flex items-center justify-between mb-6">
                        <label class="custom-checkbox">
                            <input type="checkbox" checked>
                            <span class="checkmark"></span>
                            <span class="text-sm text-gray-600">Remember me</span>
                        </label>
                        <a href="#" class="text-sm text-primary hover:underline">Forgot password?</a>
                    </div>
                    <button type="submit"
                        class="w-full bg-primary hover:bg-primary/90 text-white py-2 px-4 rounded-button font-medium transition-colors whitespace-nowrap">Login</button>
                </form>

                <div class="mt-6">
                    <div class="relative flex items-center justify-center">
                        <div class="border-t border-gray-300 w-full"></div>
                        <span class="bg-white px-3 text-sm text-gray-500 relative z-10">Or continue with</span>
                    </div>

                    <div class="grid grid-cols-3 gap-3 mt-4">
                        <button
                            class="flex items-center justify-center py-2 px-4 border border-gray-300 rounded-button hover:bg-gray-50 transition-colors whitespace-nowrap">
                            <div class="w-5 h-5 flex items-center justify-center mr-2">
                                <i class="ri-google-fill"></i>
                            </div>
                            <span class="text-sm">Google</span>
                        </button>
                        <button
                            class="flex items-center justify-center py-2 px-4 border border-gray-300 rounded-button hover:bg-gray-50 transition-colors whitespace-nowrap">
                            <div class="w-5 h-5 flex items-center justify-center mr-2">
                                <i class="ri-facebook-fill"></i>
                            </div>
                            <span class="text-sm">Facebook</span>
                        </button>
                        <button
                            class="flex items-center justify-center py-2 px-4 border border-gray-300 rounded-button hover:bg-gray-50 transition-colors whitespace-nowrap">
                            <div class="w-5 h-5 flex items-center justify-center mr-2">
                                <i class="ri-apple-fill"></i>
                            </div>
                            <span class="text-sm">Apple</span>
                        </button>
                    </div>
                </div>

                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        Don't have an account?
                        <a href="#" class="text-primary hover:underline"
                            onclick="switchModal('loginModal', 'registerModal')">Register</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Register Modal -->
    <div id="registerModal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-lg w-full max-w-md mx-4 overflow-hidden">
            <div class="flex justify-between items-center p-6 border-b">
                <h3 class="text-xl font-bold">Create an Account</h3>
                <button class="text-gray-500 hover:text-gray-700" onclick="closeModal('registerModal')">
                    <div class="w-6 h-6 flex items-center justify-center">
                        <i class="ri-close-line"></i>
                    </div>
                </button>
            </div>
            <div class="p-6">
                <form id="registerForm">
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="firstName" class="block text-gray-700 mb-2">First Name</label>
                            <input type="text" id="firstName"
                                class="w-full px-4 py-2 border border-gray-300 rounded-button focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary"
                                required>
                        </div>
                        <div>
                            <label for="lastName" class="block text-gray-700 mb-2">Last Name</label>
                            <input type="text" id="lastName"
                                class="w-full px-4 py-2 border border-gray-300 rounded-button focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary"
                                required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="registerEmail" class="block text-gray-700 mb-2">Email Address</label>
                        <input type="email" id="registerEmail"
                            class="w-full px-4 py-2 border border-gray-300 rounded-button focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="registerPassword" class="block text-gray-700 mb-2">Password</label>
                        <input type="password" id="registerPassword"
                            class="w-full px-4 py-2 border border-gray-300 rounded-button focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary"
                            required>
                    </div>
                    <div class="mb-6">
                        <label for="confirmPassword" class="block text-gray-700 mb-2">Confirm Password</label>
                        <input type="password" id="confirmPassword"
                            class="w-full px-4 py-2 border border-gray-300 rounded-button focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary"
                            required>
                    </div>
                    <div class="mb-6">
                        <label class="custom-checkbox">
                            <input type="checkbox" required>
                            <span class="checkmark"></span>
                            <span class="text-sm text-gray-600">I agree to the <a href="#"
                                    class="text-primary hover:underline">Terms of Service</a> and <a href="#"
                                    class="text-primary hover:underline">Privacy Policy</a></span>
                        </label>
                    </div>
                    <button type="submit"
                        class="w-full bg-primary hover:bg-primary/90 text-white py-2 px-4 rounded-button font-medium transition-colors whitespace-nowrap">Register</button>
                </form>

                <div class="mt-6">
                    <div class="relative flex items-center justify-center">
                        <div class="border-t border-gray-300 w-full"></div>
                        <span class="bg-white px-3 text-sm text-gray-500 relative z-10">Or continue with</span>
                    </div>

                    <div class="grid grid-cols-3 gap-3 mt-4">
                        <button
                            class="flex items-center justify-center py-2 px-4 border border-gray-300 rounded-button hover:bg-gray-50 transition-colors whitespace-nowrap">
                            <div class="w-5 h-5 flex items-center justify-center mr-2">
                                <i class="ri-google-fill"></i>
                            </div>
                            <span class="text-sm">Google</span>
                        </button>
                        <button
                            class="flex items-center justify-center py-2 px-4 border border-gray-300 rounded-button hover:bg-gray-50 transition-colors whitespace-nowrap">
                            <div class="w-5 h-5 flex items-center justify-center mr-2">
                                <i class="ri-facebook-fill"></i>
                            </div>
                            <span class="text-sm">Facebook</span>
                        </button>
                        <button
                            class="flex items-center justify-center py-2 px-4 border border-gray-300 rounded-button hover:bg-gray-50 transition-colors whitespace-nowrap">
                            <div class="w-5 h-5 flex items-center justify-center mr-2">
                                <i class="ri-apple-fill"></i>
                            </div>
                            <span class="text-sm">Apple</span>
                        </button>
                    </div>
                </div>

                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        Already have an account?
                        <a href="#" class="text-primary hover:underline"
                            onclick="switchModal('registerModal', 'loginModal')">Login</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast Notification -->
    <div id="toast" class="toast">
        <div class="flex items-center">
            <div class="w-5 h-5 flex items-center justify-center mr-2">
                <i class="ri-check-line"></i>
            </div>
            <span id="toastMessage">Item added to wishlist</span>
        </div>
    </div>

    <!-- Back to Top Button -->
    <button id="backToTopBtn"
        class="fixed bottom-6 right-6 w-12 h-12 bg-primary text-white rounded-full shadow-lg flex items-center justify-center opacity-0 invisible transition-all duration-300">
        <div class="w-6 h-6 flex items-center justify-center">
            <i class="ri-arrow-up-line"></i>
        </div>
    </button>
    <!-- Scripts -->
    <script id="navigationScript">
        document.addEventListener('DOMContentLoaded', function () {
            // Mobile Menu Toggle
            const mobileMenuButton = document.getElementById('mobileMenuButton');
            const mobileMenu = document.getElementById('mobileMenu');

            mobileMenuButton.addEventListener('click', function () {
                if (mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.remove('hidden');
                } else {
                    mobileMenu.classList.add('hidden');
                }
            });

            // Profile Dropdown Toggle
            const profileButton = document.getElementById('profileButton');
            const profileMenu = document.getElementById('profileMenu');

            profileButton.addEventListener('click', function (e) {
                e.stopPropagation();
                profileMenu.classList.toggle('hidden');
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', function (e) {
                if (!profileButton.contains(e.target) && !profileMenu.contains(e.target)) {
                    profileMenu.classList.add('hidden');
                }
            });
        });
    </script>
    <script id="wishlistScript">
        document.addEventListener('DOMContentLoaded', function () {
            // Wishlist Heart Toggle
            const wishlistHearts = document.querySelectorAll('.wishlist-heart');

            wishlistHearts.forEach(heart => {
                heart.addEventListener('click', function () {
                    const icon = this.querySelector('i');

                    if (icon.classList.contains('ri-heart-line')) {
                        icon.classList.remove('ri-heart-line');
                        icon.classList.add('ri-heart-fill');
                        this.classList.add('active');
                        showToast('Added to your wishlist!');
                    } else {
                        icon.classList.remove('ri-heart-fill');
                        icon.classList.add('ri-heart-line');
                        this.classList.remove('active');
                        showToast('Removed from your wishlist!');
                    }
                });
            });

            // Toast Notification
            window.showToast = function (message) {
                const toast = document.getElementById('toast');
                const toastMessage = document.getElementById('toastMessage');

                toastMessage.textContent = message;
                toast.classList.add('show');

                setTimeout(() => {
                    toast.classList.remove('show');
                }, 3000);
            }
        });
    </script>

    <script id="scrollScript">
        document.addEventListener('DOMContentLoaded', function () {
            const backToTopBtn = document.getElementById('backToTopBtn');

            // Show/hide back to top button based on scroll position
            window.addEventListener('scroll', function () {
                if (window.scrollY > 300) {
                    backToTopBtn.classList.remove('opacity-0', 'invisible');
                    backToTopBtn.classList.add('opacity-100', 'visible');
                } else {
                    backToTopBtn.classList.remove('opacity-100', 'visible');
                    backToTopBtn.classList.add('opacity-0', 'invisible');
                }
            });

            // Scroll to top when button is clicked
            backToTopBtn.addEventListener('click', function () {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>

</html>