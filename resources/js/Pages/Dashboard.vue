<template>
    <AppLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <main class="bg-gray-100 dark:bg-gray-800 rounded-2xl relative relative">
    <div class="flex items-start justify-between">
        <div class="h-screen hidden lg:block my-4 ml-4 shadow-lg relative w-80">
            <div class="bg-white rounded-2xl dark:bg-gray-700">
                <div class="flex items-center justify-center pt-6">
                </div>
                <div class="flex-shrink-0 m-6 relative overflow-hidden bg-purple-500 rounded-lg max-w-xs shadow-lg">
                    <svg class="absolute bottom-0 left-0 mb-8" viewBox="0 0 375 283" fill="none" style="transform: scale(1.5); opacity: 0.1;">
                        <rect x="159.52" y="175" width="152" height="152" rx="8" transform="rotate(-45 159.52 175)" fill="white"/>
                        <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)" fill="white"/>
                    </svg>
                    <div class="relative pt-10 px-10 flex items-center justify-center">
                        <div class="block absolute w-48 h-48 bottom-0 left-0 -mb-24 ml-3" style="background: radial-gradient(black, transparent 60%); transform: rotate3d(0, 0, 1, 20deg) scale3d(1, 0.6, 1); opacity: 0.2;"></div>
                        <img class="relative w-40" src="http://localhost:8000/minerales/thumbs/1171.png" alt="">
                    </div>
                    <div class="relative text-white px-6 pb-6 mt-6">
                        <span class="block opacity-75 -mb-1">Mineral más Producido</span>
                        <div class="flex justify-between">
                        <span class="block font-semibold text-xl">Torio</span>
                        <span class="block bg-white rounded-full text-purple-500 text-xs font-bold px-3 py-2 leading-none flex items-center">$68.50</span>
                        </div>
                    </div>
                </div>
                <div class="flex-shrink-0 m-6 relative overflow-hidden bg-orange-500 rounded-lg max-w-xs shadow-lg">
                    <svg class="absolute bottom-0 left-0 mb-8" viewBox="0 0 375 283" fill="none" style="transform: scale(1.5); opacity: 0.1;">
                        <rect x="159.52" y="175" width="152" height="152" rx="8" transform="rotate(-45 159.52 175)" fill="white"/>
                        <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)" fill="white"/>
                    </svg>
                    <div class="relative pt-10 px-10 flex items-center justify-center">
                        <div class="block absolute w-48 h-48 bottom-0 left-0 -mb-24 ml-3" style="background: radial-gradient(black, transparent 60%); transform: rotate3d(0, 0, 1, 20deg) scale3d(1, 0.6, 1); opacity: 0.2;"></div>
                        <img class="relative w-40" src="http://localhost:8000/minerales/thumbs/1132.png" alt="">
                    </div>
                    <div class="relative text-gray px-6 pb-6 mt-6">
                        <span class="block opacity-75 -mb-1">2° Mineral más Producido</span>
                        <div class="flex justify-between">
                        <span class="block font-semibold text-xl">Litio</span>
                        <span class="block bg-white rounded-full text-orange-500 text-xs font-bold px-3 py-2 leading-none flex items-center">$36.00</span>
                        </div>
                    </div>
                </div>
                <div class="flex-shrink-0 m-6 relative overflow-hidden bg-teal-500 rounded-lg max-w-xs shadow-lg">
                    <svg class="absolute bottom-0 left-0 mb-8" viewBox="0 0 375 283" fill="none" style="transform: scale(1.5); opacity: 0.1;">
                        <rect x="159.52" y="175" width="152" height="152" rx="8" transform="rotate(-45 159.52 175)" fill="white"/>
                        <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)" fill="white"/>
                    </svg>
                    <div class="relative pt-10 px-10 flex items-center justify-center">
                        <div class="block absolute w-48 h-48 bottom-0 left-0 -mb-24 ml-3" style="background: radial-gradient(black, transparent 60%); transform: rotate3d(0, 0, 1, 20deg) scale3d(1, 0.6, 1); opacity: 0.2;"></div>
                        <img class="relative w-40" src="http://localhost:8000/minerales/thumbs/1104.png" alt="">
                    </div>
                    <div class="relative text-gray px-6 pb-6 mt-6">
                        <span class="block opacity-75 -mb-1">3° Mineral más vendido</span>
                        <div class="flex justify-between">
                        <span class="block font-semibold text-xl">Berilio</span>
                        <span class="block bg-white rounded-full text-teal-500 text-xs font-bold px-3 py-2 leading-none flex items-center">$45.00</span>
                        </div>
                    </div>
                    
                </div>
                <br>
                <!-- <nav class="mt-6">
                    <div>
                        <a class="w-full font-thin uppercase text-blue-500 flex items-center p-4 my-2 transition-colors duration-200 justify-start bg-gradient-to-r from-white to-blue-100 border-r-4 border-blue-500 dark:from-gray-700 dark:to-gray-800 border-r-4 border-blue-500" href="#">
                            <span class="text-left">
                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 2048 1792" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1070 1178l306-564h-654l-306 564h654zm722-282q0 182-71 348t-191 286-286 191-348 71-348-71-286-191-191-286-71-348 71-348 191-286 286-191 348-71 348 71 286 191 191 286 71 348z">
                                    </path>
                                </svg>
                            </span>
                            <span class="mx-4 text-sm font-normal">
                                Dashboard
                            </span>
                        </a>
                        <a class="w-full font-thin uppercase text-gray-500 dark:text-gray-200 flex items-center p-4 my-2 transition-colors duration-200 justify-start hover:text-blue-500" href="#">
                            <span class="text-left">
                                <svg width="20" height="20" fill="currentColor" class="m-auto" viewBox="0 0 2048 1792" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1024 1131q0-64-9-117.5t-29.5-103-60.5-78-97-28.5q-6 4-30 18t-37.5 21.5-35.5 17.5-43 14.5-42 4.5-42-4.5-43-14.5-35.5-17.5-37.5-21.5-30-18q-57 0-97 28.5t-60.5 78-29.5 103-9 117.5 37 106.5 91 42.5h512q54 0 91-42.5t37-106.5zm-157-520q0-94-66.5-160.5t-160.5-66.5-160.5 66.5-66.5 160.5 66.5 160.5 160.5 66.5 160.5-66.5 66.5-160.5zm925 509v-64q0-14-9-23t-23-9h-576q-14 0-23 9t-9 23v64q0 14 9 23t23 9h576q14 0 23-9t9-23zm0-260v-56q0-15-10.5-25.5t-25.5-10.5h-568q-15 0-25.5 10.5t-10.5 25.5v56q0 15 10.5 25.5t25.5 10.5h568q15 0 25.5-10.5t10.5-25.5zm0-252v-64q0-14-9-23t-23-9h-576q-14 0-23 9t-9 23v64q0 14 9 23t23 9h576q14 0 23-9t9-23zm256-320v1216q0 66-47 113t-113 47h-352v-96q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v96h-768v-96q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v96h-352q-66 0-113-47t-47-113v-1216q0-66 47-113t113-47h1728q66 0 113 47t47 113z">
                                    </path>
                                </svg>
                            </span>
                            <span class="mx-4 text-sm font-normal">
                                Projects
                            </span>
                        </a>
                        <a class="w-full font-thin uppercase text-gray-500 dark:text-gray-200 flex items-center p-4 my-2 transition-colors duration-200 justify-start hover:text-blue-500" href="#">
                            <span class="text-left">
                                <svg width="20" height="20" fill="currentColor" class="m-auto" viewBox="0 0 2048 1792" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M685 483q16 0 27.5-11.5t11.5-27.5-11.5-27.5-27.5-11.5-27 11.5-11 27.5 11 27.5 27 11.5zm422 0q16 0 27-11.5t11-27.5-11-27.5-27-11.5-27.5 11.5-11.5 27.5 11.5 27.5 27.5 11.5zm-812 184q42 0 72 30t30 72v430q0 43-29.5 73t-72.5 30-73-30-30-73v-430q0-42 30-72t73-30zm1060 19v666q0 46-32 78t-77 32h-75v227q0 43-30 73t-73 30-73-30-30-73v-227h-138v227q0 43-30 73t-73 30q-42 0-72-30t-30-73l-1-227h-74q-46 0-78-32t-32-78v-666h918zm-232-405q107 55 171 153.5t64 215.5h-925q0-117 64-215.5t172-153.5l-71-131q-7-13 5-20 13-6 20 6l72 132q95-42 201-42t201 42l72-132q7-12 20-6 12 7 5 20zm477 488v430q0 43-30 73t-73 30q-42 0-72-30t-30-73v-430q0-43 30-72.5t72-29.5q43 0 73 29.5t30 72.5z">
                                    </path>
                                </svg>
                            </span>
                            <span class="mx-4 text-sm font-normal">
                                My tasks
                            </span>
                        </a>
                        <a class="w-full font-thin uppercase text-gray-500 dark:text-gray-200 flex items-center p-4 my-2 transition-colors duration-200 justify-start hover:text-blue-500" href="#">
                            <span class="text-left">
                                <svg width="20" height="20" fill="currentColor" class="m-auto" viewBox="0 0 2048 1792" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M960 0l960 384v128h-128q0 26-20.5 45t-48.5 19h-1526q-28 0-48.5-19t-20.5-45h-128v-128zm-704 640h256v768h128v-768h256v768h128v-768h256v768h128v-768h256v768h59q28 0 48.5 19t20.5 45v64h-1664v-64q0-26 20.5-45t48.5-19h59v-768zm1595 960q28 0 48.5 19t20.5 45v128h-1920v-128q0-26 20.5-45t48.5-19h1782z">
                                    </path>
                                </svg>
                            </span>
                            <span class="mx-4 text-sm font-normal">
                                Calendar
                            </span>
                        </a>
                        <a class="w-full font-thin uppercase text-gray-500 dark:text-gray-200 flex items-center p-4 my-2 transition-colors duration-200 justify-start hover:text-blue-500" href="#">
                            <span class="text-left">
                                <svg width="20" height="20" class="m-auto" fill="currentColor" viewBox="0 0 2048 1792" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1070 1178l306-564h-654l-306 564h654zm722-282q0 182-71 348t-191 286-286 191-348 71-348-71-286-191-191-286-71-348 71-348 191-286 286-191 348-71 348 71 286 191 191 286 71 348z">
                                    </path>
                                </svg>
                            </span>
                            <span class="mx-4 text-sm font-normal">
                                Time manage
                            </span>
                        </a>
                        <a class="w-full font-thin uppercase text-gray-500 dark:text-gray-200 flex items-center p-4 my-2 transition-colors duration-200 justify-start hover:text-blue-500" href="#">
                            <span class="text-left">
                                <svg width="20" height="20" fill="currentColor" class="m-auto" viewBox="0 0 2048 1792" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1024 1131q0-64-9-117.5t-29.5-103-60.5-78-97-28.5q-6 4-30 18t-37.5 21.5-35.5 17.5-43 14.5-42 4.5-42-4.5-43-14.5-35.5-17.5-37.5-21.5-30-18q-57 0-97 28.5t-60.5 78-29.5 103-9 117.5 37 106.5 91 42.5h512q54 0 91-42.5t37-106.5zm-157-520q0-94-66.5-160.5t-160.5-66.5-160.5 66.5-66.5 160.5 66.5 160.5 160.5 66.5 160.5-66.5 66.5-160.5zm925 509v-64q0-14-9-23t-23-9h-576q-14 0-23 9t-9 23v64q0 14 9 23t23 9h576q14 0 23-9t9-23zm0-260v-56q0-15-10.5-25.5t-25.5-10.5h-568q-15 0-25.5 10.5t-10.5 25.5v56q0 15 10.5 25.5t25.5 10.5h568q15 0 25.5-10.5t10.5-25.5zm0-252v-64q0-14-9-23t-23-9h-576q-14 0-23 9t-9 23v64q0 14 9 23t23 9h576q14 0 23-9t9-23zm256-320v1216q0 66-47 113t-113 47h-352v-96q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v96h-768v-96q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v96h-352q-66 0-113-47t-47-113v-1216q0-66 47-113t113-47h1728q66 0 113 47t47 113z">
                                    </path>
                                </svg>
                            </span>
                            <span class="mx-4 text-sm font-normal">
                                Reports
                            </span>
                        </a>
                        <a class="w-full font-thin uppercase text-gray-500 dark:text-gray-200 flex items-center p-4 my-2 transition-colors duration-200 justify-start hover:text-blue-500" href="#">
                            <span class="text-left">
                                <svg width="20" fill="currentColor" height="20" class="h-5 w-5" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1088 1256v240q0 16-12 28t-28 12h-240q-16 0-28-12t-12-28v-240q0-16 12-28t28-12h240q16 0 28 12t12 28zm316-600q0 54-15.5 101t-35 76.5-55 59.5-57.5 43.5-61 35.5q-41 23-68.5 65t-27.5 67q0 17-12 32.5t-28 15.5h-240q-15 0-25.5-18.5t-10.5-37.5v-45q0-83 65-156.5t143-108.5q59-27 84-56t25-76q0-42-46.5-74t-107.5-32q-65 0-108 29-35 25-107 115-13 16-31 16-12 0-25-8l-164-125q-13-10-15.5-25t5.5-28q160-266 464-266 80 0 161 31t146 83 106 127.5 41 158.5z">
                                    </path>
                                </svg>
                            </span>
                            <span class="mx-4 text-sm font-normal">
                                Settings
                            </span>
                        </a>
                    </div>
                </nav> -->
            </div>
        </div>
        <div class="flex flex-col w-full pl-0 md:p-4 md:space-y-4">
            <header class="w-full shadow-lg bg-white dark:bg-gray-700 items-center rounded-2xl z-40">
                <div class=" flex p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="flex-auto">
                        <!-- <jet-application-logo class="block h-12 w-auto" /> -->
                        <jet-authentication-card-logo />
                        
                    </div>
                    <div class="flex-auto">
                        <h1>
                            Bienvenido a RPM!
                        </h1>
                        Laravel Jetstream provides a beautiful, robust starting point for your next Laravel application. Laravel is designed
                        ecosystem to be a breath of fresh air. We hope you love it.
                    </div>
                </div>
            </header>
            <header class="w-full shadow-lg bg-white dark:bg-gray-700 items-center h-16 rounded-2xl z-40">
                <div class="relative z-20 flex flex-col justify-center h-full px-3 mx-auto flex-center">
                    <div class="relative items-center pl-1 flex w-full lg:max-w-68 sm:pr-2 sm:ml-0">
                        <div class="container relative left-0 z-50 flex w-1/4 h-auto h-full">
                            <div class="relative flex items-center w-full lg:w-64 h-full group">
                                <div class="absolute z-50 flex items-center justify-center block w-auto h-10 p-3 pr-2 text-sm text-gray-500 uppercase cursor-pointer sm:hidden">
                                    <svg fill="none" class="relative w-5 h-5" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                        <path d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z">
                                        </path>
                                    </svg>
                                </div>
                                <svg class="absolute left-0 z-20 hidden w-4 h-4 ml-4 text-gray-500 pointer-events-none fill-current group-hover:text-gray-400 sm:block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z">
                                    </path>
                                </svg>
                                <input type="text" class="block w-full py-1.5 pl-10 pr-4 leading-normal rounded-2xl focus:border-transparent focus:outline-none focus:ring-2 focus:ring-blue-500 ring-opacity-90 bg-gray-100 dark:bg-gray-800 text-gray-400 aa-input" placeholder="Search"/>
                                    <div class="absolute right-0 hidden h-auto px-2 py-1 mr-2 text-xs text-gray-400 border border-gray-300 rounded-2xl md:block">
                                        +
                                    </div>
                            </div>
                        </div>
                        <div class="relative p-1 flex items-center justify-end w-1/4 ml-5 mr-4 sm:mr-0 sm:right-auto">
                            <a href="#" class="block relative">
                                <img alt="profil" src="http://localhost:8000/storage/profile-photos/eYIUn5nN4rFHDsjnHqmsvg1XUoZAOi6ijrKQYq0W.png" class="mx-auto object-cover rounded-full h-10 w-10 "/>
                            </a>
                        </div>
                    </div>
                </div>
            </header>
            <header class="w-full h-28 shadow-lg bg-white dark:bg-gray-700 items-center h-16 rounded-2xl z-40">
                <div class="grid grid-cols-12 gap-2">
                <div class="col-span-12 sm:col-span-6 md:col-span-3">
                    <div class="flex flex-row bg-white shadow-sm rounded p-4">
                    <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-blue-100 text-blue-500">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <div class="flex flex-col flex-grow ml-4">
                        <div class="text-sm text-gray-500">Users</div>
                        <div class="font-bold text-lg">5</div>
                    </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-3">
                    <div class="flex flex-row bg-white shadow-sm rounded p-4">
                    <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-green-100 text-green-500">
                        <a  :href="route('pagos.index')">
                        <svg 
                        class="w-10 h-10" 
                        fill="none" 
                        stroke="currentColor" 
                        viewBox="0 0 24 24" 
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"></path></svg>
                        </a>
                    </div>
                    
                    <div class="flex flex-col flex-grow ml-4">
                        <div class="text-sm text-gray-500">Canon Mineros</div>
                        <div class="font-bold text-lg">3</div>
                    </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-3">
                    <div class="flex flex-row bg-white shadow-sm rounded p-4">
                    <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-orange-100 text-orange-500">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    </div>
                    <div class="flex flex-col flex-grow ml-4">
                        <div class="text-sm text-gray-500">Productores</div>
                        <div class="font-bold text-lg">4</div>
                    </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-3">
                    <div class="flex flex-row bg-white shadow-sm rounded p-4">
                    <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-red-100 text-red-500">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div class="flex flex-col flex-grow ml-4">
                        <div class="text-sm text-gray-500">Minas/Cant</div>
                        <div class="font-bold text-lg">3</div>
                    </div>
                    </div>
                </div>
                </div>
            </header>

            




            



                <div class="pb-24 pt-2 pr-2 pl-2 md:pt-0 md:pr-0 md:pl-0">
                    <div class="flex flex-col flex-wrap sm:flex-row ">
                        <div class="w-full sm:w-1/2 xl:w-3/12">
                            <div class="mb-4">
                                <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full">
                                    <div class="flex items-center justify-between mb-6">
                                        <div class="flex items-center">
                                            <span class="rounded-xl relative p-2 bg-blue-100">
                                               <a  :href="route('users.index')" >
                                                    <svg
                                                    class="w-10 h-10"
                                                    aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke="currentColor"
                                                    >
                                                    <path 
                                                    fill-rule="evenodd" 
                                                    d="M4 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2zm0 1a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm8-1a1 1 0 1 1 0-2 1 1 0 0 1 0 2zm0 1a2 2 0 1 0 0-4 2 2 0 0 0 0 4zM.115 3.18A.5.5 0 0 1 .5 3h15a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 14 12H2a.5.5 0 0 1-.491-.408l-1.5-8a.5.5 0 0 1 .106-.411zm.987.82 1.313 7h11.17l1.313-7H1.102z"/>
                                                    <path fill-rule="evenodd" d="M6 1a2.498 2.498 0 0 1 4 0c.818 0 1.545.394 2 1 .67 0 1.552.57 2 1h-2c-.314 0-.611-.15-.8-.4-.274-.365-.71-.6-1.2-.6-.314 0-.611-.15-.8-.4a1.497 1.497 0 0 0-2.4 0c-.189.25-.486.4-.8.4-.507 0-.955.251-1.228.638-.09.13-.194.25-.308.362H3c.13-.147.401-.432.562-.545a1.63 1.63 0 0 0 .393-.393A2.498 2.498 0 0 1 6 1z"/>
                                                    </svg>
                                                </a>
                                            </span>
                                            <div class="flex flex-col">
                                                <span class="font-bold text-md text-black dark:text-white ml-2">
                                                    Productores
                                                </span>
                                                <span class="text-sm text-gray-500 dark:text-white ml-2">
                                                    Últimos productores
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex items-center">
                                            <button class="border p-1 border-gray-200 rounded-full">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 1792 1792">
                                                    <path d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                                                    </path>
                                                </svg>
                                            </button>
                                            <button class="text-gray-200">
                                                <svg width="25" height="25" fill="currentColor" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1088 1248v192q0 40-28 68t-68 28h-192q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h192q40 0 68 28t28 68zm0-512v192q0 40-28 68t-68 28h-192q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h192q40 0 68 28t28 68zm0-512v192q0 40-28 68t-68 28h-192q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h192q40 0 68 28t28 68z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between mb-4 space-x-12">
                                        <span class="px-2 py-1 flex items-center font-semibold text-xs rounded-md text-gray-500 bg-gray-200">
                                            EN EVALUACIÓN
                                        </span>
                                        <span class="px-2 py-1 flex items-center font-semibold text-xs rounded-md text-red-400 border border-red-400  bg-white">
                                            RESPUESTA PENDIENTE
                                        </span>
                                    </div>
                                    <div class="block m-auto">
                                        <div>
                                            <span class="text-sm inline-block text-gray-500 dark:text-gray-100">
                                                Campos evaluados :
                                                <span class="text-gray-700 dark:text-white font-bold">
                                                    25
                                                </span>
                                                /50
                                            </span>
                                        </div>
                                        <div class="w-full h-2 bg-gray-200 rounded-full mt-2">
                                            <div class="w-1/2 h-full text-center text-xs text-white bg-purple-500 rounded-full">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-start my-4 space-x-4">
                                        <span class="px-2 py-1 flex items-center text-xs rounded-md font-semibold text-green-500 bg-green-50">
                                            Mina Primer Categoría
                                        </span>
                                        <span class="px-2 py-1 flex items-center text-xs rounded-md text-blue-500 font-semibold bg-blue-100">
                                            Mineral: Cobre
                                        </span>
                                    </div>
                                    <div class="flex -space-x-2">
                                        <a href="#" class="">
                                            <img class="inline-block h-10 w-10 rounded-full object-cover ring-2 ring-white" src="http://localhost:8000/storage/profile-photos/eYIUn5nN4rFHDsjnHqmsvg1XUoZAOi6ijrKQYq0W.png" alt="Guy"/>
                                        </a>
                                    </div>
                                    <span class="px-2 py-1 flex w-48 mt-4 items-center text-xs rounded-md font-semibold text-yellow-500 bg-yellow-100">
                                        Presentado: Hace 15 días
                                    </span>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full">
                                    <div class="flex items-center justify-between mb-6">
                                        <div class="flex items-center">
                                            <span class="rounded-xl relative p-2 bg-blue-100">
                                                <a  :href="route('pagos.index')" >
                                                    <svg
                                                    class="w-14 h-14"
                                                    aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke="currentColor"
                                                    >
                                                    <path 
                                                    stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"/>
                                                    </svg>
                                                </a>
                                            </span>
                                            <div class="flex flex-col">
                                                <span class="font-bold text-md text-black dark:text-white ml-2">
                                                    Pagos Canon Minero
                                                </span>
                                                <span class="text-sm text-gray-500 dark:text-white ml-2">
                                                    Próximos vencimientos
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex items-center">
                                            <button class="border p-1 border-gray-200 rounded-full">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 1792 1792">
                                                    <path d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                                                    </path>
                                                </svg>
                                            </button>
                                            <button class="text-gray-200">
                                                <svg width="25" height="25" fill="currentColor" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1088 1248v192q0 40-28 68t-68 28h-192q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h192q40 0 68 28t28 68zm0-512v192q0 40-28 68t-68 28h-192q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h192q40 0 68 28t28 68zm0-512v192q0 40-28 68t-68 28h-192q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h192q40 0 68 28t28 68z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between mb-4 space-x-12">
                                        <span class="px-2 py-1 flex items-center font-semibold text-xs rounded-md text-green-700 bg-green-50">
                                            Por Vencer
                                        </span>
                                        <span class="px-2 py-1 flex items-center font-semibold text-xs rounded-md text-green-600 border border-green-600 bg-white">
                                            Requiere Aviso
                                        </span>
                                    </div>
                                    <div class="block m-auto">
                                        <div>
                                            <span class="text-sm inline-block text-gray-500 dark:text-gray-100">
                                                Días restantes :
                                                <span class="text-gray-700 dark:text-white font-bold">
                                                    10
                                                </span>
                                                /10
                                            </span>
                                        </div>
                                        <div class="w-full h-2 bg-gray-200 rounded-full mt-2">
                                            <div class="w-full h-full text-center text-xs text-white bg-pink-400 rounded-full">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-start my-4 space-x-4">
                                        <span class="px-2 py-1 flex items-center text-xs rounded-md font-semibold text-green-500 bg-green-50">
                                            Mina Primer Categoria
                                        </span>
                                        <span class="px-2 py-1 flex items-center text-xs rounded-md text-yellow-600 font-semibold bg-yellow-200">
                                            Mineral: Litio
                                        </span>
                                    </div>
                                    <div class="flex -space-x-2">
                                        <a href="#" class="">
                                            <img class="inline-block h-10 w-10 rounded-full object-cover ring-2 ring-white" src="http://localhost:8000/storage/profile-photos/xrQp3HSR1OOcnFIveCX6ZdVFH2gwCZ7PZxLP5G1E.jpg" alt="Guy"/>
                                        </a>
                                    </div>
                                    <span class="px-2 py-1 flex w-48 mt-4 items-center text-xs rounded-md font-semibold text-yellow-500 bg-yellow-100">
                                        Dueda Actual: $ 15.000
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="w-full sm:w-1/2 xl:w-4/12">
                            <div class="mb-4 mx-0 sm:ml-4 xl:mr-4">
                                <div class="shadow-lg rounded-2xl bg-white dark:bg-gray-700 w-full">
                                    <p class="font-bold text-md p-4 text-black dark:text-white">
                                        Solicitudes Presentadas
                                        <span class="text-sm text-gray-500 dark:text-gray-300 dark:text-white ml-2">
                                            (05)
                                        </span>
                                    </p>
                                    <ul>
                                        <li class="flex items-center text-gray-600 dark:text-gray-200 justify-between py-3 border-b-2 border-gray-100 dark:border-gray-800">
                                            <div class="flex items-center justify-start text-sm">
                                                <span class="mx-4">
                                                    01
                                                </span>
                                                <span>
                                                    Mina Primer Categoria
                                                </span>
                                            </div>
                                            <svg width="20" height="20" fill="currentColor" class="mx-4 text-gray-400 dark:text-gray-300" viewBox="0 0 1024 1024">
                                                <path d="M699 353h-46.9c-10.2 0-19.9 4.9-25.9 13.3L469 584.3l-71.2-98.8c-6-8.3-15.6-13.3-25.9-13.3H325c-6.5 0-10.3 7.4-6.5 12.7l124.6 172.8a31.8 31.8 0 0 0 51.7 0l210.6-292c3.9-5.3.1-12.7-6.4-12.7z" fill="currentColor">
                                                </path>
                                                <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372s372 166.6 372 372s-166.6 372-372 372z" fill="currentColor">
                                                </path>
                                            </svg>
                                        </li>
                                        <li class="flex items-center text-gray-600 dark:text-gray-200 justify-between py-3 border-b-2 border-gray-100 dark:border-gray-800">
                                            <div class="flex items-center justify-start text-sm">
                                                <span class="mx-4">
                                                    02
                                                </span>
                                                <span>
                                                    Mina Segunda Categoria
                                                </span>
                                                
                                            </div>
                                            <svg width="20" height="20" fill="currentColor" class="mx-4 text-gray-400 dark:text-gray-300" viewBox="0 0 1024 1024">
                                                <path d="M699 353h-46.9c-10.2 0-19.9 4.9-25.9 13.3L469 584.3l-71.2-98.8c-6-8.3-15.6-13.3-25.9-13.3H325c-6.5 0-10.3 7.4-6.5 12.7l124.6 172.8a31.8 31.8 0 0 0 51.7 0l210.6-292c3.9-5.3.1-12.7-6.4-12.7z" fill="currentColor">
                                                </path>
                                                <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372s372 166.6 372 372s-166.6 372-372 372z" fill="currentColor">
                                                </path>
                                            </svg>
                                        </li>
                                        <li class="flex items-center text-gray-600 dark:text-gray-200 justify-between py-3 border-b-2 border-gray-100 dark:border-gray-800">
                                            <div class="flex items-center justify-start text-sm">
                                                <span class="mx-4">
                                                    03
                                                </span>
                                                <span>
                                                    Mina Primer Categoria
                                                </span>
                                                <span class="lg:ml-6 ml-2 flex items-center text-gray-400 dark:text-gray-300">
                                                    3
                                                    <svg width="15" height="15" fill="currentColor" class="ml-1" viewBox="0 0 512 512">
                                                        <path d="M256 32C114.6 32 0 125.1 0 240c0 47.6 19.9 91.2 52.9 126.3C38 405.7 7 439.1 6.5 439.5c-6.6 7-8.4 17.2-4.6 26S14.4 480 24 480c61.5 0 110-25.7 139.1-46.3C192 442.8 223.2 448 256 448c141.4 0 256-93.1 256-208S397.4 32 256 32zm0 368c-26.7 0-53.1-4.1-78.4-12.1l-22.7-7.2l-19.5 13.8c-14.3 10.1-33.9 21.4-57.5 29c7.3-12.1 14.4-25.7 19.9-40.2l10.6-28.1l-20.6-21.8C69.7 314.1 48 282.2 48 240c0-88.2 93.3-160 208-160s208 71.8 208 160s-93.3 160-208 160z" fill="currentColor">
                                                        </path>
                                                    </svg>
                                                </span>
                                            </div>
                                            <svg width="20" height="20" fill="currentColor" class="mx-4 text-gray-400 dark:text-gray-300" viewBox="0 0 1024 1024">
                                                <path d="M699 353h-46.9c-10.2 0-19.9 4.9-25.9 13.3L469 584.3l-71.2-98.8c-6-8.3-15.6-13.3-25.9-13.3H325c-6.5 0-10.3 7.4-6.5 12.7l124.6 172.8a31.8 31.8 0 0 0 51.7 0l210.6-292c3.9-5.3.1-12.7-6.4-12.7z" fill="currentColor">
                                                </path>
                                                <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372s372 166.6 372 372s-166.6 372-372 372z" fill="currentColor">
                                                </path>
                                            </svg>
                                        </li>
                                        <li class="flex items-center text-gray-400 justify-between py-3 border-b-2 border-gray-100 dark:border-gray-800">
                                            <div class="flex items-center justify-start text-sm">
                                                <span class="mx-4">
                                                    04
                                                </span>
                                                <span class="line-through">
                                                    Cantera Tercer Categoria
                                                </span>
                                            </div>
                                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 1024 1024" class="text-green-500 mx-4">
                                                <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm193.5 301.7l-210.6 292a31.8 31.8 0 0 1-51.7 0L318.5 484.9c-3.8-5.3 0-12.7 6.5-12.7h46.9c10.2 0 19.9 4.9 25.9 13.3l71.2 98.8l157.2-218c6-8.3 15.6-13.3 25.9-13.3H699c6.5 0 10.3 7.4 6.5 12.7z" fill="currentColor">
                                                </path>
                                            </svg>
                                        </li>
                                        <li class="flex items-center text-gray-400  justify-between py-3 border-b-2 border-gray-100 dark:border-gray-800">
                                            <div class="flex items-center justify-start text-sm">
                                                <span class="mx-4">
                                                    05
                                                </span>
                                                <span class="line-through">
                                                    Cantera Tercer Categoria
                                                </span>
                                            </div>
                                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 1024 1024" class="text-green-500 mx-4">
                                                <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm193.5 301.7l-210.6 292a31.8 31.8 0 0 1-51.7 0L318.5 484.9c-3.8-5.3 0-12.7 6.5-12.7h46.9c10.2 0 19.9 4.9 25.9 13.3l71.2 98.8l157.2-218c6-8.3 15.6-13.3 25.9-13.3H699c6.5 0 10.3 7.4 6.5 12.7z" fill="currentColor">
                                                </path>
                                            </svg>
                                        </li>
                                        <li class="flex items-center text-gray-600 dark:text-gray-200 justify-between py-3 border-b-2 border-gray-100 dark:border-gray-800">
                                            <div class="flex items-center justify-start text-sm">
                                                <span class="mx-4">
                                                    06
                                                </span>
                                                <span>
                                                    Mina Primer Categoria
                                                </span>
                                                <span class="lg:ml-6 ml-2 flex items-center text-gray-400 dark:text-gray-300">
                                                    3
                                                    <svg width="15" height="15" fill="currentColor" class="ml-1" viewBox="0 0 512 512">
                                                        <path d="M256 32C114.6 32 0 125.1 0 240c0 47.6 19.9 91.2 52.9 126.3C38 405.7 7 439.1 6.5 439.5c-6.6 7-8.4 17.2-4.6 26S14.4 480 24 480c61.5 0 110-25.7 139.1-46.3C192 442.8 223.2 448 256 448c141.4 0 256-93.1 256-208S397.4 32 256 32zm0 368c-26.7 0-53.1-4.1-78.4-12.1l-22.7-7.2l-19.5 13.8c-14.3 10.1-33.9 21.4-57.5 29c7.3-12.1 14.4-25.7 19.9-40.2l10.6-28.1l-20.6-21.8C69.7 314.1 48 282.2 48 240c0-88.2 93.3-160 208-160s208 71.8 208 160s-93.3 160-208 160z" fill="currentColor">
                                                        </path>
                                                    </svg>
                                                </span>
                                            </div>
                                            <svg width="20" height="20" fill="currentColor" class="mx-4 text-gray-400 dark:text-gray-300" viewBox="0 0 1024 1024">
                                                <path d="M699 353h-46.9c-10.2 0-19.9 4.9-25.9 13.3L469 584.3l-71.2-98.8c-6-8.3-15.6-13.3-25.9-13.3H325c-6.5 0-10.3 7.4-6.5 12.7l124.6 172.8a31.8 31.8 0 0 0 51.7 0l210.6-292c3.9-5.3.1-12.7-6.4-12.7z" fill="currentColor">
                                                </path>
                                                <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372s372 166.6 372 372s-166.6 372-372 372z" fill="currentColor">
                                                </path>
                                            </svg>
                                        </li>
                                        <li class="flex items-center text-gray-600 dark:text-gray-200 justify-between py-3">
                                            <div class="flex items-center justify-start text-sm">
                                                <span class="mx-4">
                                                    07
                                                </span>
                                                <span>
                                                    Cantera de Tercer Categoria
                                                </span>
                                            </div>
                                            <svg width="20" height="20" fill="currentColor" class="mx-4 text-gray-400 dark:text-gray-300" viewBox="0 0 1024 1024">
                                                <path d="M699 353h-46.9c-10.2 0-19.9 4.9-25.9 13.3L469 584.3l-71.2-98.8c-6-8.3-15.6-13.3-25.9-13.3H325c-6.5 0-10.3 7.4-6.5 12.7l124.6 172.8a31.8 31.8 0 0 0 51.7 0l210.6-292c3.9-5.3.1-12.7-6.4-12.7z" fill="currentColor">
                                                </path>
                                                <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372s372 166.6 372 372s-166.6 372-372 372z" fill="currentColor">
                                                </path>
                                            </svg>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mb-4 sm:ml-4 xl:mr-4">
                                <div class="shadow-lg rounded-2xl bg-white dark:bg-gray-700 w-full">
                                    <div class="flex items-center p-4 justify-between">
                                        <p class="font-bold text-md text-black dark:text-white">
                                            Google
                                        </p>
                                        <button class="text-sm p-1 text-gray-400 border rounded border-gray-400 mr-4">
                                            <svg width="15" height="15" fill="currentColor" viewBox="0 0 20 20">
                                                <g fill="none">
                                                    <path d="M17.222 8.685a1.5 1.5 0 0 1 0 2.628l-10 5.498A1.5 1.5 0 0 1 5 15.496V4.502a1.5 1.5 0 0 1 2.223-1.314l10 5.497z" fill="currentColor">
                                                    </path>
                                                </g>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="py-2 px-4 bg-blue-100 dark:bg-gray-800 text-gray-600 border-l-4 border-blue-500 flex items-center justify-between">
                                        <p class="text-xs flex items-center dark:text-white">
                                            <svg width="20" height="20" fill="currentColor" class="text-blue-500 mr-2" viewBox="0 0 24 24">
                                                <g fill="none">
                                                    <path d="M12 5a8.5 8.5 0 1 1 0 17a8.5 8.5 0 0 1 0-17zm0 3a.75.75 0 0 0-.743.648l-.007.102v4.5l.007.102a.75.75 0 0 0 1.486 0l.007-.102v-4.5l-.007-.102A.75.75 0 0 0 12 8zm7.17-2.877l.082.061l1.149 1a.75.75 0 0 1-.904 1.193l-.081-.061l-1.149-1a.75.75 0 0 1 .903-1.193zM14.25 2.5a.75.75 0 0 1 .102 1.493L14.25 4h-4.5a.75.75 0 0 1-.102-1.493L9.75 2.5h4.5z" fill="currentColor">
                                                    </path>
                                                </g>
                                            </svg>
                                            Create wireframe
                                        </p>
                                        <div class="flex items-center">
                                            <span class="font-bold text-xs dark:text-gray-200 mr-2 ml-2 md:ml-4">
                                                25 min 20s
                                            </span>
                                            <button class="text-sm p-1 text-gray-400 border rounded bg-blue-500 mr-4">
                                                <svg width="17" height="17" fill="currentColor" viewBox="0 0 24 24" class="text-white">
                                                    <g fill="none">
                                                        <path d="M9 6a1 1 0 0 1 1 1v10a1 1 0 1 1-2 0V7a1 1 0 0 1 1-1zm6 0a1 1 0 0 1 1 1v10a1 1 0 1 1-2 0V7a1 1 0 0 1 1-1z" fill="currentColor">
                                                        </path>
                                                    </g>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="flex items-center p-4 justify-between border-b-2 border-gray-100">
                                        <p class="font-bold text-md text-black dark:text-white">
                                            Slack
                                        </p>
                                        <button class="text-sm p-1 text-gray-400 border rounded border-gray-400 mr-4">
                                            <svg width="15" height="15" fill="currentColor" viewBox="0 0 20 20">
                                                <g fill="none">
                                                    <path d="M17.222 8.685a1.5 1.5 0 0 1 0 2.628l-10 5.498A1.5 1.5 0 0 1 5 15.496V4.502a1.5 1.5 0 0 1 2.223-1.314l10 5.497z" fill="currentColor">
                                                    </path>
                                                </g>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="py-2 px-4 text-gray-600 flex items-center justify-between border-b-2 border-gray-100">
                                        <p class="text-xs flex items-center dark:text-white">
                                            <svg width="20" height="20" fill="currentColor" class="mr-2" viewBox="0 0 24 24">
                                                <g fill="none">
                                                    <path d="M12 5a8.5 8.5 0 1 1 0 17a8.5 8.5 0 0 1 0-17zm0 3a.75.75 0 0 0-.743.648l-.007.102v4.5l.007.102a.75.75 0 0 0 1.486 0l.007-.102v-4.5l-.007-.102A.75.75 0 0 0 12 8zm7.17-2.877l.082.061l1.149 1a.75.75 0 0 1-.904 1.193l-.081-.061l-1.149-1a.75.75 0 0 1 .903-1.193zM14.25 2.5a.75.75 0 0 1 .102 1.493L14.25 4h-4.5a.75.75 0 0 1-.102-1.493L9.75 2.5h4.5z" fill="currentColor">
                                                    </path>
                                                </g>
                                            </svg>
                                            International
                                        </p>
                                        <div class="flex items-center">
                                            <span class="text-xs text-gray-400 mr-2 ml-2 md:ml-4">
                                                30 min
                                            </span>
                                            <button class="text-sm p-1 text-gray-400 border rounded border-gray-400 mr-4">
                                                <svg width="15" height="15" fill="currentColor" viewBox="0 0 20 20">
                                                    <g fill="none">
                                                        <path d="M17.222 8.685a1.5 1.5 0 0 1 0 2.628l-10 5.498A1.5 1.5 0 0 1 5 15.496V4.502a1.5 1.5 0 0 1 2.223-1.314l10 5.497z" fill="currentColor">
                                                        </path>
                                                    </g>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="py-2 px-4 text-gray-600 flex items-center justify-between border-b-2 border-gray-100">
                                        <p class="text-xs flex items-center dark:text-white">
                                            <svg width="20" height="20" fill="currentColor" class="mr-2" viewBox="0 0 24 24">
                                                <g fill="none">
                                                    <path d="M12 5a8.5 8.5 0 1 1 0 17a8.5 8.5 0 0 1 0-17zm0 3a.75.75 0 0 0-.743.648l-.007.102v4.5l.007.102a.75.75 0 0 0 1.486 0l.007-.102v-4.5l-.007-.102A.75.75 0 0 0 12 8zm7.17-2.877l.082.061l1.149 1a.75.75 0 0 1-.904 1.193l-.081-.061l-1.149-1a.75.75 0 0 1 .903-1.193zM14.25 2.5a.75.75 0 0 1 .102 1.493L14.25 4h-4.5a.75.75 0 0 1-.102-1.493L9.75 2.5h4.5z" fill="currentColor">
                                                    </path>
                                                </g>
                                            </svg>
                                            Slack logo design
                                        </p>
                                        <div class="flex items-center">
                                            <span class="text-xs text-gray-400 mr-2 ml-2 md:ml-4">
                                                30 min
                                            </span>
                                            <button class="text-sm p-1 text-gray-400 border rounded border-gray-400 mr-4">
                                                <svg width="15" height="15" fill="currentColor" viewBox="0 0 20 20">
                                                    <g fill="none">
                                                        <path d="M17.222 8.685a1.5 1.5 0 0 1 0 2.628l-10 5.498A1.5 1.5 0 0 1 5 15.496V4.502a1.5 1.5 0 0 1 2.223-1.314l10 5.497z" fill="currentColor">
                                                        </path>
                                                    </g>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="py-2 px-4 text-gray-600 flex items-center justify-between">
                                        <p class="text-xs flex items-center dark:text-white">
                                            <svg width="20" height="20" fill="currentColor" class="mr-2" viewBox="0 0 24 24">
                                                <g fill="none">
                                                    <path d="M12 5a8.5 8.5 0 1 1 0 17a8.5 8.5 0 0 1 0-17zm0 3a.75.75 0 0 0-.743.648l-.007.102v4.5l.007.102a.75.75 0 0 0 1.486 0l.007-.102v-4.5l-.007-.102A.75.75 0 0 0 12 8zm7.17-2.877l.082.061l1.149 1a.75.75 0 0 1-.904 1.193l-.081-.061l-1.149-1a.75.75 0 0 1 .903-1.193zM14.25 2.5a.75.75 0 0 1 .102 1.493L14.25 4h-4.5a.75.75 0 0 1-.102-1.493L9.75 2.5h4.5z" fill="currentColor">
                                                    </path>
                                                </g>
                                            </svg>
                                            Dahboard template
                                        </p>
                                        <div class="flex items-center">
                                            <span class="text-xs text-gray-400 mr-2 ml-2 md:ml-4">
                                                30 min
                                            </span>
                                            <button class="text-sm p-1 text-gray-400 border rounded border-gray-400 mr-4">
                                                <svg width="15" height="15" fill="currentColor" viewBox="0 0 20 20">
                                                    <g fill="none">
                                                        <path d="M17.222 8.685a1.5 1.5 0 0 1 0 2.628l-10 5.498A1.5 1.5 0 0 1 5 15.496V4.502a1.5 1.5 0 0 1 2.223-1.314l10 5.497z" fill="currentColor">
                                                        </path>
                                                    </g>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full sm:w-1/2 xl:w-5/12">
                            <div class="mb-4">
                                <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700">
                                    <div class="flex flex-wrap overflow-hidden">
                                        <div class="w-full rounded shadow-sm">
                                            <div class="flex items-center justify-between mb-4">
                                                <div class="text-left font-bold text-xl text-black dark:text-white">
                                                    Agosto 2021
                                                </div>
                                                <div class="flex space-x-4">
                                                    <button class="p-2 rounded-full bg-blue-500 text-white">
                                                        <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24">
                                                            <path fill="currentColor" d="M13.83 19a1 1 0 0 1-.78-.37l-4.83-6a1 1 0 0 1 0-1.27l5-6a1 1 0 0 1 1.54 1.28L10.29 12l4.32 5.36a1 1 0 0 1-.78 1.64z">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                    <button class="p-2 rounded-full bg-blue-500 text-white">
                                                        <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24">
                                                            <path fill="currentColor" d="M10 19a1 1 0 0 1-.64-.23a1 1 0 0 1-.13-1.41L13.71 12L9.39 6.63a1 1 0 0 1 .15-1.41a1 1 0 0 1 1.46.15l4.83 6a1 1 0 0 1 0 1.27l-5 6A1 1 0 0 1 10 19z">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="-mx-2">
                                                <table class="w-full dark:text-white">
                                                    <tr>
                                                        <th class="py-3 px-2 md:px-3 ">
                                                            D
                                                        </th>
                                                        <th class="py-3 px-2 md:px-3 ">
                                                            L
                                                        </th>
                                                        <th class="py-3 px-2 md:px-3 ">
                                                            M
                                                        </th>
                                                        <th class="py-3 px-2 md:px-3 ">
                                                            M
                                                        </th>
                                                        <th class="py-3 px-2 md:px-3 ">
                                                            J
                                                        </th>
                                                        <th class="py-3 px-2 md:px-3 ">
                                                            V
                                                        </th>
                                                        <th class="py-3 px-2 md:px-3 ">
                                                            S
                                                        </th>
                                                    </tr>
                                                    <tr class="text-gray-400 dark:text-gray-500">
                                                        <td class="py-3 px-2 md:px-3  text-center text-gray-300 dark:text-gray-500">
                                                            25
                                                        </td>
                                                        <td class="py-3 px-2 md:px-3  text-center text-gray-300 dark:text-gray-500">
                                                            26
                                                        </td>
                                                        <td class="py-3 px-2 md:px-3  text-center text-gray-300 dark:text-gray-500">
                                                            27
                                                        </td>
                                                        <td class="py-3 px-2 md:px-3  text-center text-gray-300 dark:text-gray-500">
                                                            28
                                                        </td>
                                                        <td class="py-3 px-2 md:px-3  text-center text-gray-300 dark:text-gray-500">
                                                            29
                                                        </td>
                                                        <td class="py-3 px-2 md:px-3  text-center text-gray-300 dark:text-gray-500">
                                                            30
                                                        </td>
                                                        <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center text-gray-800 cursor-pointer">
                                                            1
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">
                                                            2
                                                        </td>
                                                        <td class="py-3 relative px-1  hover:text-blue-500 text-center cursor-pointer">
                                                            3
                                                            <span class="absolute rounded-full h-2 w-2 bg-blue-500 bottom-0 left-1/2 transform -translate-x-1/2">
                                                            </span>
                                                        </td>
                                                        <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">
                                                            <span class="p-2 rounded-full bg-blue-500">
                                                                4
                                                            </span>
                                                        </td>
                                                        <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">
                                                            5
                                                        </td>
                                                        <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">
                                                            6
                                                        </td>
                                                        <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">
                                                            7
                                                        </td>
                                                        <td class="py-3 px-2 md:px-3 md:px-2 relative lg:px-3 hover:text-blue-500 text-center cursor-pointer">
                                                            8
                                                            <span class="absolute rounded-full h-2 w-2 bg-yellow-500 bottom-0 left-1/2 transform -translate-x-1/2">
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">
                                                            9
                                                        </td>
                                                        <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">
                                                            10
                                                        </td>
                                                        <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">
                                                            11
                                                        </td>
                                                        <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">
                                                            12
                                                        </td>
                                                        <td class="py-3 px-2 md:px-3  text-center text-white cursor-pointer">
                                                            13
                                                        </td>
                                                        <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">
                                                            14
                                                        </td>
                                                        <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">
                                                            15
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">
                                                            16
                                                        </td>
                                                        <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">
                                                            17
                                                        </td>
                                                        <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">
                                                            18
                                                        </td>
                                                        <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">
                                                            19
                                                        </td>
                                                        <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">
                                                            20
                                                        </td>
                                                        <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">
                                                            21
                                                        </td>
                                                        <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">
                                                            22
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">
                                                            23
                                                        </td>
                                                        <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">
                                                            24
                                                        </td>
                                                        <td class="py-3 px-2 md:px-3  hover:text-blue-500 relative text-center cursor-pointer">
                                                            25
                                                            <span class="absolute rounded-full h-2 w-2 bg-red-500 bottom-0 left-1/2 transform -translate-x-1/2">
                                                            </span>
                                                        </td>
                                                        <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">
                                                            26
                                                        </td>
                                                        <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">
                                                            27
                                                        </td>
                                                        <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">
                                                            28
                                                        </td>
                                                        <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">
                                                            29
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">
                                                            30
                                                        </td>
                                                        <td class="py-3 px-2 md:px-3  hover:text-blue-500 text-center cursor-pointer">
                                                            31
                                                        </td>
                                                        <td>
                                                        </td>
                                                        <td>
                                                        </td>
                                                        <td>
                                                        </td>
                                                        <td>
                                                        </td>
                                                        <td>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full">
                                    <!-- <p class="font-bold text-md text-black dark:text-white">
                                        Messages
                                    </p>
                                    <ul>
                                        <li class="flex items-center my-6 space-x-2">
                                            <a href="#" class="block relative">
                                                <img alt="profil" src="/images/person/1.jpg" class="mx-auto object-cover rounded-full h-10 w-10 "/>
                                            </a>
                                            <div class="flex flex-col">
                                                <span class="text-sm text-gray-900 font-semibold dark:text-white ml-2">
                                                    Charlie Rabiller
                                                </span>
                                                <span class="text-sm text-gray-400 dark:text-gray-300 ml-2">
                                                    Hey John ! Do you read the NextJS doc ?
                                                </span>
                                            </div>
                                        </li>
                                        <li class="flex items-center my-6 space-x-2">
                                            <a href="#" class="block relative">
                                                <img alt="profil" src="/images/person/5.jpg" class="mx-auto object-cover rounded-full h-10 w-10 "/>
                                            </a>
                                            <div class="flex flex-col">
                                                <span class="text-sm text-gray-900 font-semibold dark:text-white ml-2">
                                                    Marie Lou
                                                </span>
                                                <span class="text-sm text-gray-400 dark:text-gray-300 ml-2">
                                                    No I think the dog is better...
                                                </span>
                                            </div>
                                        </li>
                                        <li class="flex items-center my-6 space-x-2">
                                            <a href="#" class="block relative">
                                                <img alt="profil" src="/images/person/6.jpg" class="mx-auto object-cover rounded-full h-10 w-10 "/>
                                            </a>
                                            <div class="flex flex-col">
                                                <span class="text-sm text-gray-900 font-semibold dark:text-white ml-2">
                                                    Ivan Buck
                                                </span>
                                                <span class="text-sm text-gray-400 dark:text-gray-300 ml-2">
                                                    Seriously ? haha Bob is not a children !
                                                </span>
                                            </div>
                                        </li>
                                        <li class="flex items-center my-6 space-x-2">
                                            <a href="#" class="block relative">
                                                <img alt="profil" src="/images/person/7.jpg" class="mx-auto object-cover rounded-full h-10 w-10 "/>
                                            </a>
                                            <div class="flex flex-col">
                                                <span class="text-sm text-gray-900 font-semibold dark:text-white ml-2">
                                                    Marina Farga
                                                </span>
                                                <span class="text-sm text-gray-400 dark:text-gray-300 ml-2">
                                                    Do you need that deisgn ?
                                                </span>
                                            </div>
                                        </li>
                                    </ul> -->
                                    <div><ChartPie /></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col flex-wrap sm:flex-row ">
                        <ChartBar />
                    </div>
                    <div class="flex items-center bg-gray-200 text-gray-800">
                        <div class="w-full flex px-3">
                            <div class="bg-white p-2 w-80 max-w-3xl sm:w-full sm:p-4 h-auto sm:h-64 rounded-2xl shadow-lg flex flex-col sm:flex-row gap-5 select-none">
                                <div
                                    style='background: url("http://localhost:8000/minerales/Molibden.png")'
                                    class="h-52 sm:h-full sm:w-72 rounded-xl bg-gray-100 bg-center bg-cover"
                                ></div>
                                <div class="flex sm:flex-1 flex-col gap-2 p-1">
                                    <h1 class="text-lg sm:text-xl font-semibold  text-gray-600">
                                        Molibden
                                    </h1>
                                    <p class="text-gray-500 text-sm sm:text-base line-clamp-3">
                                        Cantidad de Molibden producida durante el mes de Julio
                                    </p>
                                    <div class="flex gap-4 mt-auto">
                                    
                                    <button
                                        class='ml-auto flex items-center gap-1 sm:text-lg border border-gray-300 px-3 py-1 rounded-full hover:bg-gray-50 transition-colors focus:bg-gray-100 focus:outline-none focus-visible:border-gray-500'
                                    >
                                        <span>Ver más</span>
                                    </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full flex px-3">
                            <div class="bg-white p-2 w-80 max-w-3xl sm:w-full sm:p-4 h-auto sm:h-64 rounded-2xl shadow-lg flex flex-col sm:flex-row gap-5 select-none">
                                <div
                                    style='background: url("http://localhost:8000/minerales/thumbs/1175.png")'
                                    class="h-52 sm:h-full sm:w-72 rounded-xl bg-gray-100 bg-center bg-cover"
                                ></div>
                                <div class="flex sm:flex-1 flex-col gap-2 p-1">
                                    <h1 class="text-lg sm:text-xl font-semibold  text-gray-600">
                                        Vanadio
                                    </h1>
                                    <p class="text-gray-500 text-sm sm:text-base line-clamp-3">
                                        Cantidad de Vanadio producida durante el mes de Julio
                                    </p>
                                    <div class="flex gap-4 mt-auto">
                                    <button
                                        class='flex items-center gap-1 sm:text-lg border border-gray-300 px-3 py-1 rounded-full hover:bg-gray-50 transition-colors focus:bg-gray-100 focus:outline-none focus-visible:border-gray-500'
                                    >
                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M923 283.6a260.04 260.04 0 0 0-56.9-82.8 264.4 264.4 0 0 0-84-55.5A265.34 265.34 0 0 0 679.7 125c-49.3 0-97.4 13.5-139.2 39-10 6.1-19.5 12.8-28.5 20.1-9-7.3-18.5-14-28.5-20.1-41.8-25.5-89.9-39-139.2-39-35.5 0-69.9 6.8-102.4 20.3-31.4 13-59.7 31.7-84 55.5a258.44 258.44 0 0 0-56.9 82.8c-13.9 32.3-21 66.6-21 101.9 0 33.3 6.8 68 20.3 103.3 11.3 29.5 27.5 60.1 48.2 91 32.8 48.9 77.9 99.9 133.9 151.6 92.8 85.7 184.7 144.9 188.6 147.3l23.7 15.2c10.5 6.7 24 6.7 34.5 0l23.7-15.2c3.9-2.5 95.7-61.6 188.6-147.3 56-51.7 101.1-102.7 133.9-151.6 20.7-30.9 37-61.5 48.2-91 13.5-35.3 20.3-70 20.3-103.3.1-35.3-7-69.6-20.9-101.9zM512 814.8S156 586.7 156 385.5C156 283.6 240.3 201 344.3 201c73.1 0 136.5 40.8 167.7 100.4C543.2 241.8 606.6 201 679.7 201c104 0 188.3 82.6 188.3 184.5 0 201.2-356 429.3-356 429.3z"></path></svg>
                                        <span>556</span>
                                    </button>
                                    <button
                                        class='flex items-center gap-1 sm:text-lg border border-gray-300 px-3 py-1 rounded-full hover:bg-gray-50 transition-colors focus:bg-gray-100 focus:outline-none focus-visible:border-gray-500'
                                    >
                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M464 512a48 48 0 1 0 96 0 48 48 0 1 0-96 0zm200 0a48 48 0 1 0 96 0 48 48 0 1 0-96 0zm-400 0a48 48 0 1 0 96 0 48 48 0 1 0-96 0zm661.2-173.6c-22.6-53.7-55-101.9-96.3-143.3a444.35 444.35 0 0 0-143.3-96.3C630.6 75.7 572.2 64 512 64h-2c-60.6.3-119.3 12.3-174.5 35.9a445.35 445.35 0 0 0-142 96.5c-40.9 41.3-73 89.3-95.2 142.8-23 55.4-34.6 114.3-34.3 174.9A449.4 449.4 0 0 0 112 714v152a46 46 0 0 0 46 46h152.1A449.4 449.4 0 0 0 510 960h2.1c59.9 0 118-11.6 172.7-34.3a444.48 444.48 0 0 0 142.8-95.2c41.3-40.9 73.8-88.7 96.5-142 23.6-55.2 35.6-113.9 35.9-174.5.3-60.9-11.5-120-34.8-175.6zm-151.1 438C704 845.8 611 884 512 884h-1.7c-60.3-.3-120.2-15.3-173.1-43.5l-8.4-4.5H188V695.2l-4.5-8.4C155.3 633.9 140.3 574 140 513.7c-.4-99.7 37.7-193.3 107.6-263.8 69.8-70.5 163.1-109.5 262.8-109.9h1.7c50 0 98.5 9.7 144.2 28.9 44.6 18.7 84.6 45.6 119 80 34.3 34.3 61.3 74.4 80 119 19.4 46.2 29.1 95.2 28.9 145.8-.6 99.6-39.7 192.9-110.1 262.7z"></path></svg>
                                        <span>56</span>
                                    </button>
                                    <button
                                        class='ml-auto flex items-center gap-1 sm:text-lg border border-gray-300 px-3 py-1 rounded-full hover:bg-gray-50 transition-colors focus:bg-gray-100 focus:outline-none focus-visible:border-gray-500'
                                    >
                                        <span>Read more</span>
                                    </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    
                    
                    
                </div>
            </div>
        </div>
    </main>


        
        <div class="flex items-center bg-gray-200 text-gray-800">
                
            <div class="w-full items-center justify-center">
                <div class="col-span-12">
                    <div class="overflow-auto lg:overflow-visible ">
                        <table class="table text-gray-400 border-separate space-y-6 text-sm">
                            <thead class="bg-gray-800 text-gray-500">
                                <tr>
                                    <th class="p-3">Productor</th>
                                    <th class="p-3 text-left">Productos</th>
                                    <th class="p-3 text-left">Precio</th>
                                    <th class="p-3 text-left">Mineral</th>
                                    <th class="p-3 text-left">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-gray-800">
                                    <td class="p-3">
                                        <div class="flex align-items-center">
                                            <img class="rounded-full h-12 w-12  object-cover" src="https://images.unsplash.com/photo-1613588718956-c2e80305bf61?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=634&q=80" alt="unsplash image">
                                            <div class="ml-3">
                                                <div class="">Minas Argentinas</div>
                                                <div class="text-gray-500">minas_argentinas@rgmail.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-3">
                                        Oro y Plata
                                    </td>
                                    <td class="p-3 font-bold">
                                        200.00$ / tonelada
                                    </td>
                                    <td class="p-3">
                                        <span class="bg-green-400 text-gray-50 rounded-md px-2">Oro</span>
                                    </td>
                                    <td class="p-3 ">
                                        <a href="#" class="text-gray-400 hover:text-gray-100 mr-2">
                                            <i class="material-icons-outlined text-base">Ver</i>
                                        </a>
                                        <a href="#" class="text-gray-400 hover:text-gray-100  mx-2">
                                            <i class="material-icons-outlined text-base">Editar</i>
                                        </a>
                                        <a href="#" class="text-gray-400 hover:text-gray-100  ml-2">
                                            <i class="material-icons-round text-base">Contactar</i>
                                        </a>
                                    </td>
                                </tr>
                                <tr class="bg-gray-800">
                                    <td class="p-3">
                                        <div class="flex align-items-center">
                                            <img class="rounded-full h-12 w-12   object-cover" src="https://images.unsplash.com/photo-1423784346385-c1d4dac9893a?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80" alt="unsplash image">
                                            <div class="ml-3">
                                                <div class="">Yamana Gold</div>
                                                <div class="text-gray-500">mail@rgmail.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-3">
                                        Oro
                                    </td>
                                    <td class="p-3 font-bold">
                                        200.00$ / tonelada
                                    </td>
                                    <td class="p-3">
                                        <span class="bg-red-400 text-gray-50 rounded-md px-2">Plata</span>
                                    </td>
                                    <td class="p-3">
                                        <a href="#" class="text-gray-400 hover:text-gray-100  mr-2">
                                            <i class="material-icons-outlined text-base">Ver</i>
                                        </a>
                                        <a href="#" class="text-gray-400 hover:text-gray-100 mx-2">
                                            <i class="material-icons-outlined text-base">Editar</i>
                                        </a>
                                        <a href="#" class="text-gray-400 hover:text-gray-100 ml-2">
                                            <i class="material-icons-round text-base">Contactar</i>
                                        </a>
                                    </td>
                                </tr>
                                <tr class="bg-gray-800">
                                    <td class="p-3">
                                        <div class="flex align-items-center">
                                            <img class="rounded-full h-12 w-12   object-cover" src="https://images.unsplash.com/photo-1600856209923-34372e319a5d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2135&q=80" alt="unsplash image">
                                            <div class="ml-3">
                                                <div class="">Minas del Sol</div>
                                                <div class="text-gray-500">mail@rgmail.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-3">
                                        Cobre
                                    </td>
                                    <td class="p-3 font-bold">
                                        200.00$ / tonelada
                                    </td>
                                    <td class="p-3">
                                        <span class="bg-yellow-400 text-gray-50  rounded-md px-2">Cobre</span>
                                    </td>
                                    <td class="p-3">
                                        <a href="#" class="text-gray-400 hover:text-gray-100 mr-2">
                                            <i class="material-icons-outlined text-base">Ver</i>
                                        </a>
                                        <a href="#" class="text-gray-400 hover:text-gray-100 mx-2">
                                            <i class="material-icons-outlined text-base">Editar</i>
                                        </a>
                                        <a href="#" class="text-gray-400 hover:text-gray-100 ml-2">
                                            <i class="material-icons-round text-base">Contactar</i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

       



        
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <welcome />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
<script>
    import JetApplicationLogo from '@/Jetstream/ApplicationLogo'
    import AppLayout from '@/Layouts/AppLayout'
    import Welcome from '@/Jetstream/Welcome'
    import ChartPie from '@/Components/charts/pie'
    import ChartBar from '@/Components/charts/bar'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo'

    export default {
        components: {
            JetApplicationLogo,
            AppLayout,
            Welcome,
            ChartPie,
            ChartBar,
            JetAuthenticationCardLogo,
        },

        
        data() {
            return {
                autoridad_minera: false,
            };
        }
    }
</script>
<style>
	.table {
		border-spacing: 0 15px;
	}

	i {
		font-size: 1rem !important;
	}

	.table tr {
		border-radius: 20px;
	}

	tr td:nth-child(n+5),
	tr th:nth-child(n+5) {
		border-radius: 0 .625rem .625rem 0;
	}

	tr td:nth-child(1),
	tr th:nth-child(1) {
		border-radius: .625rem 0 0 .625rem;
	}
</style>