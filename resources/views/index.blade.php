<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Reem+Kufi+Ink&display=swap" rel="stylesheet">
    <title>Wedding Invitation</title>
</head>
<body class="relative min-h-screen bg-cover bg-center bg-no-repeat font-kufi" style="background-image: url('images/photos/MerieSteven_021.jpg');">
    
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center overflow-auto">
        
        <div class="text-white text-center px-6">
            
            <h4 class="text-lg tracking-wide mb-2 font-kufi fade-in" data-delay="300">The Wedding of</h4>
            <h1 class="text-5xl font-extrabold mb-4 font-playfair fade-in-up" data-delay="600">Merie & Steven</h1>
            <h4 class="text-lg mb-2 font-kufi fade-in" data-delay="900">Friday, 3rd October 2025</h4>
            <h4 class="text-lg mb-6 font-kufi fade-in" data-delay="1200">Dear Sir/Madam</h4>

            <a href="home" 
               class="px-6 py-3 text-white text-lg font-semibold rounded-full shadow-md hover:bg-gray-200 hover:text-black transition duration-300 scale-in shimmer" 
               data-delay="1500">
                Open Invitation
            </a>
        </div>
    </div>

    <!-- Loading Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Preload background image
            const bgImage = new Image();
            bgImage.onload = () => {
                document.body.classList.add('bg-loaded');
            };
            bgImage.src = 'images/photos/MerieSteven_021.jpg';
            
            // Add animation classes after a delay
            setTimeout(() => {
                document.querySelectorAll('.fade-in, .fade-in-up, .scale-in').forEach(el => {
                    const delay = parseInt(el.dataset.delay || 0);
                    setTimeout(() => {
                        el.classList.add('animate');
                    }, delay);
                });
            }, 100);
        });
    </script>
</body>

</html>