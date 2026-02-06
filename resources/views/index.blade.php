<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tifawin Souk</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>

<body class="space-y-6 bg-gray-50">
    <nav class="h-20 bg-white flex items-center justify-around">
        <h1 class="text-2xl font-thin">Tifawin Souk</h1>
        <div>
            <input
                class="border border-gray-200 bg-white py-1.5 w-192 pl-4 rounded shadow-sm hover:shadow-md transition-shadow"
                type="text" placeholder="Cherchez un produit, une marque ou une catégorie">
            <button
                class="bg-[#f5891d] hover:bg-[#e07e1b] text-white py-1.5 px-2 rounded shadow-sm hover:shadow-md transition-shadow cursor-pointer">Recherche</button>
        </div>
        <div class="flex gap-4">
            <a class="hover:text-[#f5891d]" href="">Se Connecter</a>
            <a class="hover:text-[#f5891d]" href="">Panier</a>
        </div>
    </nav>
    <main>
        <section class="flex gap-4 max-w-6xl mx-auto rounded py-2 px-4">
            <div class="flex flex-col bg-white max-w-fit mx-auto rounded border border-gray-200 shadow-sm py-2 px-4">
                @foreach ($categories as $category)
                <div class="pb-2">
                    <a class="hover:text-orange-500 text-sm" href="#">{{$category->name}}</a>
                </div>
                @endforeach
            </div>
            <div style="background-image: url('/images/SX.jpg');" class="flex-1 rounded bg-cover bg-center" >
            </div>
            <div class="flex flex-col max-w-fit gap-2 ">
                <div class="flex-1 bg-white rounded border border-gray-200 shadow-sm py-2 px-4">
                    <div class="pb-2">
                        <p class="text-sm">Centre d'assistance</p>
                        <p class="text-gray-400 text-xs">Guide du service client</p>
                    </div>
                    <div class="pb-2">
                        <p class="text-sm">WhatsApp</p>
                        <p class="text-gray-400 text-xs">Discuter pour commander</p>
                    </div>
                    <div class="pb-2">
                        <p class="text-sm">Vendez sur TifawinSouk</p>
                        <p class="text-gray-400 text-xs">Ouvrez votre shop ici</p>
                    </div>
                </div>
                <div class="flex-1 w-56 h-56">
                    <img src="/images/TF.png" alt="">
                </div>
            </div>
        </section>
        <section class="max-w-6xl mx-auto rounded py-2 px-4">
            <div class="bg-[#7b1fa2] w-full text-white text-2xl py-2 px-4 shadow-sm">Profitez des meilleurs deals</div>
            <div class="flex flex-wrap gap-4 bg-white w-full text-2xl py-2 px-4 shadow-sm">
                <article class="w-64 bg-white rounded-lg border border-gray-200 p-6 hover:shadow-md transition-shadow ">
                    <a href="#">
                        <div class="border border-black"><img src="/images/12.jpg" alt="cover"></div>
                        <div class="text-sm text-gray-500 p-2 pb-1">Kraft line Machine</div>
                        <div class="text-xs text-black p-2 pb-1">99.00 Dhs</div>
                    </a>
                </article>
            </div>
            
        </section>
    </main>
    <footer class="text-[#f2f2f2] bg-[#535357] max-w-full space-y-6 mx-auto p-4">
        <div class="flex">
            <div class="p-2">
                <span class="font-bold text-sm text-white pl-2 pr-2 pb-4 block">BESOIN D'AIDE?</span>
                <ul class="pl-2">
                    <li class="hover:underline text-xs pb-1"><a href="#">Discuter avec nous</a></li>
                    <li class="hover:underline text-xs pb-1"><a href="#">Centre d'assistance</a></li>
                    <li class="hover:underline text-xs pb-1"><a href="#">Contactez-nous</a></li>
                </ul>
                <span class="font-bold text-sm text-white pl-2 pr-2 pb-4 block">LIENS UTILES</span>
                <ul class="pl-2">
                    <li class="hover:underline text-xs pb-1"><a href="#">Commandez par Tél: 06.00.00.00.00</a></li>
                    <li class="hover:underline text-xs pb-1"><a href="#">Acheter sur TifawinSouk</a></li>
                    <li class="hover:underline text-xs pb-1"><a href="#">Utiliser un Bon d'achat</a></li>
                    <li class="hover:underline text-xs pb-1"><a href="#">Utiliser un Bon d'achat</a></li>
                    <li class="hover:underline text-xs pb-1"><a href="#">Modalités de Livraison</a></li>
                    <li class="hover:underline text-xs pb-1"><a href="#">Retour et Remboursement</a></li>
                    <li class="hover:underline text-xs pb-1"><a href="#">Signaler un Produit</a></li>
                    <li class="hover:underline text-xs pb-1"><a href="#">Politique de Résolution des Litiges</a></li>
                    <li class="hover:underline text-xs pb-1"><a href="#">Points de relais</a></li>
                </ul>
            </div>
            <div class="p-2">
                <span class="font-bold text-sm text-white pl-2 pr-2 pb-4 block">À PROPOS</span>
                <ul class="pl-2">
                    <li class="hover:underline text-xs pb-1"><a href="#">Qui sommes-nous</a></li>
                    <li class="hover:underline text-xs pb-1"><a href="#">Carrières chez TifawinSouk</a></li>
                    <li class="hover:underline text-xs pb-1"><a href="#">Conditions Générales d'Utilisation</a></li>
                    <li class="hover:underline text-xs pb-1"><a href="#">Notification sur la confidentialité</a></li>
                    <li class="hover:underline text-xs pb-1"><a href="#">Notification sur les cookies</a></li>
                    <li class="hover:underline text-xs pb-1"><a href="#">Directives relatives aux informations de paiement de TifawinSouk</a></li>
                    <li class="hover:underline text-xs pb-1"><a href="#">Conditions générales d'utilisation du Crédit magasin TifawinSouk</a></li>
                    <li class="hover:underline text-xs pb-1"><a href="#">Politique de Retours et de Remboursements</a></li>
                    <li class="hover:underline text-xs pb-1"><a href="#">Livraison à 0 DH</a></li>
                    <li class="hover:underline text-xs pb-1"><a href="#">Toutes les boutiques officielles</a></li>
                    <li class="hover:underline text-xs pb-1"><a href="#">Ventes Flash</a></li>
                </ul>
            </div>
            <div class="p-2">
                <span class="font-bold text-sm text-white pl-2 pr-2 pb-4 block">GAGNEZ DE L'ARGENT AVEC TifawinSouk</span>
                <ul class="pl-2">
                    <li class="hover:underline text-xs pb-1"><a href="#">Vendez sur TifawinSouk</a></li>
                    <li class="hover:underline text-xs pb-1"><a href="#">Assistant vendeur</a></li>
                    <li class="hover:underline text-xs pb-1"><a href="#">Devenez Consultant TifawinSouk</a></li>
                    <li class="hover:underline text-xs pb-1"><a href="#">Coupon Nouveaux Clients</a></li>
                </ul>
            </div>
            <div class="p-2">
                <span class="font-bold text-sm text-white pl-2 pr-2 pb-4 block">TifawinSouk À L'INTERNATIONAL</span>
                <div class="flex">
                    <ul class="pl-2 pr-2">
                        <li class="hover:underline text-xs pb-1"><a href="#">Algérie</a></li>
                        <li class="hover:underline text-xs pb-1"><a href="#">Côte d'Ivoire</a></li>
                        <li class="hover:underline text-xs pb-1"><a href="#">Egypte</a></li>
                        <li class="hover:underline text-xs pb-1"><a href="#">Ghana</a></li>
                    </ul>
                    <ul class="pl-2 pr-2">
                        <li class="hover:underline text-xs pb-1"><a href="#">Kenya</a></li>
                        <li class="hover:underline text-xs pb-1"><a href="#">Nigeria</a></li>
                        <li class="hover:underline text-xs pb-1"><a href="#">Sénégal</a></li>
                        <li class="hover:underline text-xs pb-1"><a href="#">Uganda</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div>
            <div class="flex gap-6">
                <div>
                    <span class="font-bold text-sm text-white pl-2 pr-2 pb-4 block">RETROUVEZ-NOUS SUR</span>
                    <div class="flex">
                        <a href="#">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white hover:text-orange-500" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M13.135 6H15V3h-1.865a4.147 4.147 0 0 0-4.142 4.142V9H7v3h2v9.938h3V12h2.021l.592-3H12V6.591A.6.6 0 0 1 12.592 6h.543Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="#">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white hover:text-orange-500" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path fill="currentColor" fill-rule="evenodd"
                                    d="M3 8a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v8a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5V8Zm5-3a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8a3 3 0 0 0-3-3H8Zm7.597 2.214a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2h-.01a1 1 0 0 1-1-1ZM12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm-5 3a5 5 0 1 1 10 0 5 5 0 0 1-10 0Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="#">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white hover:text-orange-500" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M21.7 8.037a4.26 4.26 0 0 0-.789-1.964 2.84 2.84 0 0 0-1.984-.839c-2.767-.2-6.926-.2-6.926-.2s-4.157 0-6.928.2a2.836 2.836 0 0 0-1.983.839 4.225 4.225 0 0 0-.79 1.965 30.146 30.146 0 0 0-.2 3.206v1.5a30.12 30.12 0 0 0 .2 3.206c.094.712.364 1.39.784 1.972.604.536 1.38.837 2.187.848 1.583.151 6.731.2 6.731.2s4.161 0 6.928-.2a2.844 2.844 0 0 0 1.985-.84 4.27 4.27 0 0 0 .787-1.965 30.12 30.12 0 0 0 .2-3.206v-1.516a30.672 30.672 0 0 0-.202-3.206Zm-11.692 6.554v-5.62l5.4 2.819-5.4 2.801Z"
                                    clip-rule="evenodd" />
                            </svg>
    
                        </a>
                        <a href="#">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white hover:text-orange-500" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M22 5.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.343 8.343 0 0 1-2.605.981A4.13 4.13 0 0 0 15.85 4a4.068 4.068 0 0 0-4.1 4.038c0 .31.035.618.105.919A11.705 11.705 0 0 1 3.4 4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 6.1 13.635a4.192 4.192 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 2 18.184 11.732 11.732 0 0 0 8.291 20 11.502 11.502 0 0 0 19.964 8.5c0-.177 0-.349-.012-.523A8.143 8.143 0 0 0 22 5.892Z"
                                    clip-rule="evenodd" />
                            </svg>
    
                        </a>
                        <a href="#">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white hover:text-orange-500" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M12.51 8.796v1.697a3.738 3.738 0 0 1 3.288-1.684c3.455 0 4.202 2.16 4.202 4.97V19.5h-3.2v-5.072c0-1.21-.244-2.766-2.128-2.766-1.827 0-2.139 1.317-2.139 2.676V19.5h-3.19V8.796h3.168ZM7.2 6.106a1.61 1.61 0 0 1-.988 1.483 1.595 1.595 0 0 1-1.743-.348A1.607 1.607 0 0 1 5.6 4.5a1.601 1.601 0 0 1 1.6 1.606Z"
                                    clip-rule="evenodd" />
                                <path d="M7.2 8.809H4V19.5h3.2V8.809Z" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div>
                    <span class="font-bold text-sm text-white pl-2 pr-2 pb-4 block">MODES DE PAIEMENT ET LIVRAISON</span>
                    <div class="flex">
                        <a class="" href="#">
                            <svg class="w-6 h-6 text-white hover:text-orange-500" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 48 48" fill="currentColor" aria-hidden="true">
                                <path
                                    d="M34.3 20.1a6.7 6.7 0 0 1-4.1-1.3 2 2 0 0 0-2.8.6 1.8 1.8 0 0 0 .3 2.6A10.9 10.9 0 0 0 32 23.8V26a2 2 0 0 0 4 0v-2.2a6.3 6.3 0 0 0 3-1.3 4.9 4.9 0 0 0 2-4c0-3.7-3.4-4.9-6.3-5.5s-3.5-1.3-3.5-1.8.2-.6.5-.9a3.4 3.4 0 0 1 1.8-.4 6.3 6.3 0 0 1 3.3.9 1.8 1.8 0 0 0 2.7-.5 1.9 1.9 0 0 0-.4-2.8A9.1 9.1 0 0 0 36 6.3V4a2 2 0 0 0-4 0v2.2c-3 .5-5 2.5-5 5.2s3.3 4.9 6.5 5.5 3.3 1.3 3.3 1.8-1.1 1.6-2.5 1.6Z" />
                                <path
                                    d="M42.2 31.7a5.2 5.2 0 0 0-4-1.1l-9.9 1.8a4.5 4.5 0 0 0-1.4-3.3L19.8 22H5a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h3.3l11.2 9.1 20.4-3.7a5 5 0 0 0 2.3-8.7Zm-3 4.8-18.7 3.4L10 31.2V26h8.2l5.9 5.9a.8.8 0 0 1-1.2 1.2l-3.5-3.5a2 2 0 0 0-2.8 2.8l3.5 3.5a4.5 4.5 0 0 0 3.4 1.4 5.7 5.7 0 0 0 1.8-.3l13.6-2.4a1.1 1.1 0 0 1 .8.2.9.9 0 0 1 .3.7 1 1 0 0 1-.8 1Z" />
                            </svg>
    
                        </a>
                        <a href="#">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white hover:text-orange-500" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M14.3 3H7.9a1 1 0 0 0-1 .8L4.5 20.2a.7.7 0 0 0 .7.8h3.6l.5-3.6a1 1 0 0 1 1-.8h2.9c4 0 7.1-2.9 7.7-6.9.4-3.3-1.3-5.8-4.2-6.6A8.5 8.5 0 0 0 14.3 3Z"
                                    clip-rule="evenodd" />
                            </svg>
    
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>