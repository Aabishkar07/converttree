<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ConvertTree - File Conversion Tools</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <!-- 3-Column LinkedIn-Style Layout -->
    <section class="bg-[#F3F2EF] min-h-screen py-6">
        <div class="max-w-[1400px] mx-auto px-4">
            <div class="grid grid-cols-12 gap-6">
                
                <!-- LEFT SIDEBAR - Essential Tools -->
                <aside class="col-span-12 xl:col-span-3">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 sticky top-20">
                        <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-5">
                            TOOLS
                        </h3>

                        <div class="space-y-3">
                            <a href="#image" class="flex items-center gap-2 text-gray-700 hover:text-purple-600 transition-colors group">
                                <div class="w-8 h-8 bg-purple-50 rounded-lg flex items-center justify-center group-hover:bg-purple-100">
                                    <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <span class="text-sm font-medium">Images</span>
                            </a>

                            <a href="#pdf" class="flex items-center gap-2 text-gray-400">
                                <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <span class="text-sm font-medium block">PDF</span>
                                    <span class="text-xs text-purple-600">Soon</span>
                                </div>
                            </a>

                            <a href="#document" class="flex items-center gap-2 text-gray-400">
                                <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <span class="text-sm font-medium block">Docs</span>
                                    <span class="text-xs text-purple-600">Soon</span>
                                </div>
                            </a>

                            <a href="#email" class="flex items-center gap-2 text-gray-400">
                                <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <span class="text-sm font-medium block">Email</span>
                                    <span class="text-xs text-purple-600">Soon</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </aside>

                <!-- CENTER - All 4 Converter Cards -->
                <main class="col-span-12 xl:col-span-6">
                    <!-- Grid: 2 cards per row on desktop -->
                    <div class="grid md:grid-cols-2 gap-6">
                        
                        <!-- IMAGE CONVERTER CARD -->
                        <div id="image" class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 hover:shadow-md transition-shadow">
                            <div class="flex items-center gap-2 mb-3">
                                <div class="w-9 h-9 bg-purple-50 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-900 text-sm">Image Converter</h3>
                                    <p class="text-xs text-gray-500">25+ formats</p>
                                </div>
                            </div>

                            <div class="mb-3 px-3 py-4">
                                <p class="text-sm text-gray-500 leading-relaxed">
                                    Convert images between 25+ formats including PNG, JPG, WEBP, HEIC, and more.
                                </p>
                            </div>

                            <a href="https://image.converttree.com/" target="_blank" class="block w-full py-2 bg-purple-600 text-white text-center text-xs font-semibold rounded-md hover:bg-purple-700 transition-all">
                                Convert Now →
                            </a>
                        </div>

                        <!-- PDF CONVERTER CARD -->
                        <div id="pdf" class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 hover:shadow-md transition-shadow opacity-70">
                            <div class="flex items-center gap-2 mb-3">
                                <div class="w-9 h-9 bg-blue-50 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-900 text-sm">PDF Converter</h3>
                                    <p class="text-xs text-purple-600 font-medium">Coming Soon</p>
                                </div>
                            </div>

                            <div class="mb-3 px-3 py-4">
                                <p class="text-sm text-gray-500 leading-relaxed">
                                    Convert PDFs to various formats and merge multiple PDFs into one. Full PDF toolkit launching soon.
                                </p>
                            </div>

                            <button disabled class="block w-full py-2 bg-gray-300 text-gray-500 text-center text-xs font-semibold rounded-md cursor-not-allowed">
                                Coming Q1 2025
                            </button>
                        </div>

                        <!-- DOCUMENT CONVERTER CARD -->
                        <div id="document" class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 hover:shadow-md transition-shadow opacity-70">
                            <div class="flex items-center gap-2 mb-3">
                                <div class="w-9 h-9 bg-green-50 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-900 text-sm">Document Converter</h3>
                                    <p class="text-xs text-purple-600 font-medium">Coming Soon</p>
                                </div>
                            </div>

                            <div class="mb-3 px-3 py-4">
                                <p class="text-sm text-gray-500 leading-relaxed">
                                    Convert between Word, PDF, TXT and other document formats seamlessly.
                                </p>
                            </div>

                            <button disabled class="block w-full py-2 bg-gray-300 text-gray-500 text-center text-xs font-semibold rounded-md cursor-not-allowed">
                                Coming Q1 2025
                            </button>
                        </div>

                        <!-- BULK EMAIL CARD -->
                        <div id="email" class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 hover:shadow-md transition-shadow opacity-70">
                            <div class="flex items-center gap-2 mb-3">
                                <div class="w-9 h-9 bg-orange-50 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-900 text-sm">Bulk Email Sender</h3>
                                    <p class="text-xs text-purple-600 font-medium">Coming Soon</p>
                                </div>
                            </div>

                            <div class="mb-3 px-3 py-4">
                                <p class="text-sm text-gray-500 leading-relaxed">
                                    Send personalized bulk emails with templates, scheduling, and analytics tracking.
                                </p>
                            </div>

                            <button disabled class="block w-full py-2 bg-gray-300 text-gray-500 text-center text-xs font-semibold rounded-md cursor-not-allowed">
                                Coming Q2 2025
                            </button>
                        </div>

                    </div>
                </main>

                <!-- RIGHT SIDEBAR - Advertisement -->
                <aside class="col-span-12 xl:col-span-3">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden sticky top-20">
                        <div class="px-4 py-2 bg-gray-50 border-b border-gray-200">
                            <p class="text-xs text-gray-500 text-center font-medium">Ad</p>
                        </div>

                        <div class="p-4">
                            <img src="https://arthakagaj.com/images/20240930074550ads_image.20240925025052ads_image.20240818024834ads_image.ezgif.com-animated-gif-maker.gif" alt="Advertisement" class="w-full h-auto rounded-lg">
                        </div>
                    </div>
                </aside>

            </div>
        </div>
    </section>
</body>
</html>