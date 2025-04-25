<!DOCTYPE html>
 <html lang="fr">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Connexion - DelivriX</title>
     <script src="https://cdn.tailwindcss.com"></script>
     <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
 </head>
 <body class="h-screen">
     <div class="flex h-full">
         <div class="hidden flex-col justify-between p-12 text-white bg-black lg:flex lg:w-1/2">
             <div>
                 <h3 class="my-5 text-2xl font-bold">DelivriX</h3>
             </div>
             <div class="space-y-6">
              <p class="text-sm tracking-wider uppercase">BIENVENUE SUR NOTRE PLATEFORME</p>
              <h1 class="text-6xl font-bold leading-tight">
                  Une solution unique<br>pour gérer et suivre<br>vos commandes
              </h1>
              <p class="max-w-md text-gray-300">
               Que vous soyez une entreprise, un livreur ou un client, profitez d'une expérience simple et fluide pour atteindre vos objectifs.
              </p>
              <a href="{{route('register.page')}}" class="inline-block px-8 py-2 mt-4 text-white rounded-md border-2 border-white transition duration-300 hover:bg-white hover:text-black">
                 S'inscrire
              </a>
          </div>   
             <div></div>
         </div>
         <!--------------------------------- Login Form --------------------------------->
         <div class="flex flex-col justify-center px-8 w-full lg:w-1/2 lg:px-16 xl:px-24">
             <div class="mx-auto space-y-8 w-full max-w-md text-center">
                 <div class="mb-28">
                     <h1 class="text-3xl font-bold">Connexion</h1>
                     <p class="mt-4 mb-8 text-gray-600">
                         Entrez votre email et mot de passe pour accéder à votre compte
                     </p>
                 </div>
 
                 <form action="{{route('login')}}" method="POST" class="space-y-6">
                     @csrf
                     <div class="relative">
                         <div class="absolute left-3 top-1/2 text-gray-400 -translate-y-1/2">
                             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                 <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                 <polyline points="22,6 12,13 2,6"></polyline>
                             </svg>
                         </div>
                         <input type="email" name="email" required 
                             placeholder="Entrez votre email"
                             class="py-3 pr-4 pl-10 w-full text-sm bg-white rounded-md border border-gray-200 focus:outline-none focus:border-black">
                         @error('email')
                             <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                         @enderror
                     </div>
 
                     <div class="relative">
                         <div class="absolute left-3 top-1/2 text-gray-400 -translate-y-1/2">
                             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                 <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                 <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                             </svg>
                         </div>
                         <input type="password" name="password" required 
                             placeholder="Entrez votre mot de passe"
                             class="py-3 pr-12 pl-10 w-full text-sm bg-white rounded-md border border-gray-200 focus:outline-none focus:border-black">
                         <button type="button" onclick="togglePassword(this)" class="absolute right-3 top-1/2 text-gray-400 -translate-y-1/2 hover:text-gray-600">
                             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="hidden show-eye">
                                 <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                 <circle cx="12" cy="12" r="3"></circle>
                             </svg>
                             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="hide-eye">
                                 <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
                                 <line x1="1" y1="1" x2="23" y2="23"></line>
                             </svg>
                         </button>
                         @error('password')
                             <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                         @enderror
                     </div>
                    
                     <div class="flex justify-between items-center">
                         <div class="flex items-center">
                             <input type="checkbox" id="remember" name="remember"
                                 class="w-4 h-4 text-black rounded-md border-gray-200 focus:ring-gray-100">
                             <label for="remember" class="ml-2 text-sm text-gray-600">
                                 Se souvenir de moi
                             </label>
                         </div>
                         <a href="" class="text-sm font-medium text-black hover:underline">
                             Mot de passe oublié?
                         </a>
                     </div>
 
                     <button type="submit" 
                         class="w-full py-3 text-sm font-medium text-white bg-gradient-to-t from-black to-[#000000e8] hover:bg-gradient-to-b rounded-md">
                         Se Connecter
                     </button>
 
                     <div class="relative">
                         <div class="flex absolute inset-0 items-center">
                             <div class="w-full border-t border-gray-200"></div>
                         </div>
                         <div class="flex relative justify-center text-sm">
                             <span class="px-2 text-gray-500 bg-white">Ou</span>
                         </div>
                     </div>
 
                     <button type="button" 
                         class="flex gap-2 justify-center items-center py-3 w-full text-sm text-black bg-white rounded-md border border-gray-300 transition duration-200 hover:bg-gray-100">
                         <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                             <path d="M12.545,10.239v3.821h5.445c-0.712,2.315-2.647,3.972-5.445,3.972c-3.332,0-6.033-2.701-6.033-6.032s2.701-6.032,6.033-6.032c1.498,0,2.866,0.549,3.921,1.453l2.814-2.814C17.503,2.988,15.139,2,12.545,2C7.021,2,2.543,6.477,2.543,12s4.478,10,10.002,10c8.396,0,10.249-7.85,9.426-11.748L12.545,10.239z"/>
                         </svg>
                         Se connecter avec Google
                     </button>
 
                     <p class="text-sm text-center text-gray-600">
                         Vous n'avez pas de compte? 
                         <a href="{{route('register.page')}}" class="font-medium text-black hover:underline">S'inscrire</a>
                     </p>
                 </form>
             </div>
         </div>
     </div>
 
     <script>
         function togglePassword(button) {
             const input = button.parentElement.querySelector('input[name="password"]');
             const showEye = button.querySelector('.show-eye');
             const hideEye = button.querySelector('.hide-eye');
             
             input.type = input.type === 'password' ? 'text' : 'password';
             
             showEye.classList.toggle('hidden');
             hideEye.classList.toggle('hidden');
         }
     </script>
 </body>
 </html>