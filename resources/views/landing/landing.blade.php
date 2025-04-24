<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpaceHub - Your Gateway to the Universe</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="bg-gray-900 text-white">
    <!-- Hero Section -->
    <header class="relative overflow-hidden h-screen">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1451187580459-43490279c0fa?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1920&q=80" 
                 alt="Space background" 
                 class="object-cover w-full h-full opacity-40">
        </div>
        
        <div class="relative z-10 flex flex-col items-center justify-center h-full px-4 text-center">
            <nav class="absolute top-0 left-0 right-0 flex items-center justify-between p-6">
                <div class="text-2xl font-bold">SpaceHub</div>
                <div class="space-x-6">
                    <a href="#features" class="hover:text-blue-400 transition">Features</a>
                    <a href="#about" class="hover:text-blue-400 transition">About</a>
                    <a href="#contact" class="hover:text-blue-400 transition">Contact</a>
                    <a href="/login" class="px-4 py-2 rounded bg-blue-600 hover:bg-blue-700 transition">Login</a>
                </div>
            </nav>
            
            <h1 class="text-5xl md:text-7xl font-bold mb-4">Welcome to SpaceHub</h1>
            <p class="text-xl md:text-2xl mb-8 max-w-3xl">Your all-in-one platform for exploring the wonders of space and connecting with fellow space enthusiasts.</p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="/register" class="px-8 py-3 bg-blue-600 hover:bg-blue-700 rounded-lg text-lg font-medium transition">Get Started</a>
                <a href="#learn-more" class="px-8 py-3 bg-transparent border border-white hover:bg-white hover:text-gray-900 rounded-lg text-lg font-medium transition">Learn More</a>
            </div>
        </div>
    </header>
    
    <!-- Features Section -->
    <section id="features" class="py-20 bg-gray-800">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-16">Discover the Universe</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <div class="bg-gray-700 p-8 rounded-lg">
                    <div class="text-blue-400 text-4xl mb-4">🚀</div>
                    <h3 class="text-2xl font-semibold mb-4">Space Exploration</h3>
                    <p class="text-gray-300">Stay updated with the latest missions, discoveries, and breakthroughs in space exploration.</p>
                </div>
                
                <div class="bg-gray-700 p-8 rounded-lg">
                    <div class="text-blue-400 text-4xl mb-4">🔭</div>
                    <h3 class="text-2xl font-semibold mb-4">Astronomical Events</h3>
                    <p class="text-gray-300">Never miss a meteor shower, eclipse, or planetary alignment with our event calendar.</p>
                </div>
                
                <div class="bg-gray-700 p-8 rounded-lg">
                    <div class="text-blue-400 text-4xl mb-4">👨‍🚀</div>
                    <h3 class="text-2xl font-semibold mb-4">Community</h3>
                    <p class="text-gray-300">Connect with space enthusiasts, scientists, and educators around the globe.</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- About Section -->
    <section id="about" class="py-20 bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-10 md:mb-0">
                    <img src="https://images.unsplash.com/photo-1614728894747-a83421e2b9c9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1169&q=80" 
                         alt="Space station" 
                         class="rounded-lg shadow-xl">
                </div>
                
                <div class="md:w-1/2 md:pl-12">
                    <h2 class="text-4xl font-bold mb-6">About SpaceHub</h2>
                    <p class="text-gray-300 mb-6">SpaceHub was founded with a mission to make space exploration accessible to everyone. We believe that the wonders of the universe should be shared and celebrated by all.</p>
                    <p class="text-gray-300 mb-6">Our platform brings together the latest in space technology, research, and community engagement to create a comprehensive hub for all things space-related.</p>
                    <a href="#learn-more" class="text-blue-400 hover:underline">Learn more about our mission →</a>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-gray-800">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-16">Contact Us</h2>
            
            <div class="max-w-2xl mx-auto">
                <form class="space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-medium mb-2">Name</label>
                        <input type="text" id="name" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    
                    <div>
                        <label for="email" class="block text-sm font-medium mb-2">Email</label>
                        <input type="email" id="email" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    
                    <div>
                        <label for="message" class="block text-sm font-medium mb-2">Message</label>
                        <textarea id="message" rows="5" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                    </div>
                    
                    <button type="submit" class="w-full px-6 py-3 bg-blue-600 hover:bg-blue-700 rounded-lg text-lg font-medium transition">Send Message</button>
                </form>
            </div>
        </div>
    </section>
    
    <!-- Footer -->
    <footer class="bg-gray-900 py-12">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-6 md:mb-0">
                    <div class="text-2xl font-bold mb-2">SpaceHub</div>
                    <p class="text-gray-400">Your gateway to the universe</p>
                </div>
                
                <div class="flex space-x-6">
                    <a href="#" class="text-gray-400 hover:text-white transition">
                        <span class="sr-only">Twitter</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition">
                        <span class="sr-only">GitHub</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="mt-8 pt-8 border-t border-gray-800 text-center text-gray-400">
                <p>&copy; 2025 SpaceHub. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>