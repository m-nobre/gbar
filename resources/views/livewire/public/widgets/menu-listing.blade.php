<div class="pt-3">
    <div class="scroll-container h-screen overflow-y-auto overflow-x-hidden">
        <!-- Section 1 -->
        <section class="scroll-section relative h-screen flex flex-col md:flex-row">
            <!-- Left content -->
            <div class="w-full md:w-1/2 h-1/2 md:h-full relative overflow-hidden group shine-effect">
                <img src="https://images.unsplash.com/photo-1682687220742-aba13b6e50ba" 
                     alt="Architectural detail" 
                     class="absolute inset-0 w-full h-full object-cover transition-all duration-1000 group-hover:scale-110 group-hover:rotate-1" />
                <div class="absolute inset-0 bg-gradient-to-r from-neutral-950/70 to-neutral-950/50 transition-opacity duration-500 group-hover:opacity-0"></div>
            </div>
            <!-- Right content -->
            <div class="w-full md:w-1/2 h-1/2 md:h-full flex items-center justify-center p-8 bg-neutral-950">
                <div class="max-w-lg float-animation">
                    <span class="text-neutral-400 tracking-wider text-sm font-mono">01 / VISION</span>
                    <h2 class="mt-4 text-5xl md:text-7xl font-bold leading-none bg-gradient-to-r from-white to-neutral-400 bg-clip-text text-transparent">Modern Architecture</h2>
                    <p class="mt-6 text-neutral-400 text-lg leading-relaxed">Exploring the intersection of form and function in contemporary design.</p>
                    <button class="mt-8 px-6 py-3 bg-white/10 hover:bg-white/20 rounded-full text-sm font-medium transition-all duration-300 hover:tracking-wider">Explore More →</button>
                </div>
            </div>
        </section>

        <!-- Section 2 -->
        <section class="scroll-section relative h-screen flex flex-col md:flex-row">
            <!-- Right content -->
            <div class="w-full md:w-1/2 h-1/2 md:h-full flex items-center justify-center p-8 bg-neutral-900">
                <div class="max-w-lg float-animation">
                    <span class="text-neutral-400 tracking-wider text-sm font-mono">02 / DESIGN</span>
                    <h2 class="mt-4 text-5xl md:text-7xl font-bold leading-none bg-gradient-to-r from-white to-neutral-400 bg-clip-text text-transparent">Urban Spaces</h2>
                    <p class="mt-6 text-neutral-400 text-lg leading-relaxed">Creating environments that inspire and transform daily life.</p>
                    <button class="mt-8 px-6 py-3 bg-white/10 hover:bg-white/20 rounded-full text-sm font-medium transition-all duration-300 hover:tracking-wider">Learn More →</button>
                </div>
            </div>
            <!-- Left content -->
            <div class="w-full md:w-1/2 h-1/2 md:h-full relative overflow-hidden group shine-effect">
                <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab" 
                     alt="Urban landscape" 
                     class="absolute inset-0 w-full h-full object-cover transition-all duration-1000 group-hover:scale-110 group-hover:rotate-1" />
                <div class="absolute inset-0 bg-gradient-to-l from-neutral-950/70 to-neutral-950/50 transition-opacity duration-500 group-hover:opacity-0"></div>
            </div>
        </section>

        <!-- Section 3 -->
        <section class="scroll-section relative h-screen flex flex-col md:flex-row">
            <!-- Left content -->
            <div class="w-full md:w-1/2 h-1/2 md:h-full relative overflow-hidden group shine-effect">
                <img src="https://images.unsplash.com/photo-1682687220067-dced0a5865c5" 
                     alt="Minimalist interior" 
                     class="absolute inset-0 w-full h-full object-cover transition-all duration-1000 group-hover:scale-110 group-hover:rotate-1" />
                <div class="absolute inset-0 bg-gradient-to-r from-neutral-950/70 to-neutral-950/50 transition-opacity duration-500 group-hover:opacity-0"></div>
            </div>
            <!-- Right content -->
            <div class="w-full md:w-1/2 h-1/2 md:h-full flex items-center justify-center p-8 bg-neutral-950">
                <div class="max-w-lg float-animation">
                    <span class="text-neutral-400 tracking-wider text-sm font-mono">03 / SPACE</span>
                    <h2 class="mt-4 text-5xl md:text-7xl font-bold leading-none bg-gradient-to-r from-white to-neutral-400 bg-clip-text text-transparent">Interior Flow</h2>
                    <p class="mt-6 text-neutral-400 text-lg leading-relaxed">Harmonizing space and light to create immersive experiences.</p>
                    <button class="mt-8 px-6 py-3 bg-white/10 hover:bg-white/20 rounded-full text-sm font-medium transition-all duration-300 hover:tracking-wider">Discover More →</button>
                </div>
            </div>
        </section>

        <!-- Navigation dots -->
        <div class="fixed right-8 top-1/2 -translate-y-1/2 flex flex-col gap-4 z-50">
            <button onclick="scrollToSection(0)" class="w-3 h-3 rounded-full bg-white/20 hover:bg-white transition-colors hover:scale-150" title="Go to section 1"></button>
            <button onclick="scrollToSection(1)" class="w-3 h-3 rounded-full bg-white/20 hover:bg-white transition-colors hover:scale-150" title="Go to section 2"></button>
            <button onclick="scrollToSection(2)" class="w-3 h-3 rounded-full bg-white/20 hover:bg-white transition-colors hover:scale-150" title="Go to section 3"></button>
        </div>
    </div>

    <script>
        const container = document.querySelector('.scroll-container');
        const sections = document.querySelectorAll('.scroll-section');
        const dots = document.querySelectorAll('.fixed.right-8 button');
        let isScrolling = false;

        function scrollToSection(index) {
            if (!isScrolling) {
                isScrolling = true;
                sections[index].scrollIntoView({ behavior: 'smooth' });
                updateDots(index);
                setTimeout(() => {
                    isScrolling = false;
                }, 1000);
            }
        }

        function updateDots(index) {
            dots.forEach((dot, i) => {
                dot.className = `w-3 h-3 rounded-full transition-all duration-300 ${
                    i === index ? 'bg-white scale-150' : 'bg-white/20 hover:bg-white hover:scale-150'
                }`;
            });
        }

        // Update dots on scroll
        container.addEventListener('scroll', () => {
            const index = Math.round(container.scrollTop / window.innerHeight);
            updateDots(index);
        });

        // Initialize first dot
        updateDots(0);
    </script>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg border border-solid border-zinc-100 dark:border-zinc-600 py-8 rounded">
        <div class="grid grid-flow-row auto-rows-max rounded-lg">
            @foreach ($products as $category) 
                <fieldset class="border border-solid border-zinc-100 dark:border-zinc-700 dark:bg-gray-600 p-3 my-1 rounded-md">
                    <legend class="">
                        <span class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs  ring-1 ring-gray-500/10 ring-inset" style="
                        border-color:{{ App\Helper\Tools::adjustBrightness($category['data']['color'], 0.2) ?? '#666' }};
                        background-color:{{ App\Helper\Tools::adjustBrightness($category['data']['color'], -0.7) ?? '#333' }};
                        color:{{ App\Helper\Tools::adjustBrightness($category['data']['color'], 0.8) ?? '#999' }}">
                            {{$category['data']['name']}}
                        </span>

                    </legend>
                    @foreach ($category as $key => $product)
                        @if ($key != 'data')
                            
                            <div class="flex items-center grid col-span-full grid-cols-4 shadow shadow-b-xs align-middle {{ $loop->iteration % 2 == 0 ? 'bg-gray-50' : 'bg-gray-100' }} box-content rounded-md">
                                <div class=" p-3 pl-3 text-gray-500 dark:border-gray-700 dark:text-gray-600">
                                        <div class="flex flex-row gap-1">
                                            <div class="p-1 border border-gray-400 rounded-full" style="
                                                border-color:{{ App\Helper\Tools::adjustBrightness($category['data']['color'], 0.2) ?? '#666' }};
                                                background-color:{{ App\Helper\Tools::adjustBrightness($category['data']['color'], -0.8) ?? '#666' }};
                                                text-color:{{ App\Helper\Tools::adjustBrightness($category['data']['color'], 0.8) ?? '#666' }}">
    
                                                @if ($product['image'])                                    
                                                    <div class="rounded-full">
                                                        <img class="w-9 h-9 rounded-full" src="{{ $product['image'] }}">
                                                    </div>
                                                @else
                                                    @if (isSet($product['icon']))
                                                        
                                                        <i class="bi {{ $product['icon'] ?? 'bi-question-circle' }}" style="color:{{ $product['color'] ?? '#000' }}"></i>
                                                    @else
                                                        <span class="text-3xl" style="color:{{ $category['data']['color'] ?? '#000' }}">{{ucwords($product['name'][0])}} </span>
                                                        <span class="text-sm -ml-2" style="color:{{ $category['data']['color'] ?? '#000' }}">{{ substr($product['name'], '1')}} </span>
                                                    @endif
                                                @endif
                                            </div>
                                            <div class="mx-1 p-1 text-2xl my-auto">
                                                {{ _($product['name']) }}
                                            </div>
                                        </div>
                                </div>
                                <div class="col-span-2  p-3 pl-3 text-gray-500 dark:border-gray-700 dark:text-gray-400">
                                        {{ _($product['description'] ?? '') }}
                                </div>
                            </div>
                        @endif      
                    @endforeach
                </fieldset>
                @endforeach
          </div>
    </div>
</div>
