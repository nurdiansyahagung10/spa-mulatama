<!DOCTYPE html>
<html  lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('layout.css.top.css')
    @include('layout.js.top.js')
</head>
<body>
    @yield('header')
    <section class=" container px-4 mx-auto">
        <div class="absolute inset-0 -z-10 mx-0 max-w-none overflow-hidden">
            <div
                class="absolute left-1/2 scale-125 top-0 ml-[-38rem] h-[25rem] w-[81.25rem]">
                <div
                    class="absolute inset-0 bg-gradient-to-r from-[#36b49f] to-[#DBFF75] opacity-40 [mask-image:radial-gradient(farthest-side_at_top,white,transparent)]">
                    <svg aria-hidden="true"
                        class="absolute inset-x-0 inset-y-[-50%] h-[200%] w-full skew-y-[-18deg] fill-black/40 stroke-black/20 ">
                        <defs>
                            <pattern id=":S1:" width="72" height="56" patternUnits="userSpaceOnUse" x="-12" y="4">
                                <path d="M.5 56V.5H72" fill="none"></path>
                            </pattern>
                        </defs>
                        <rect width="100%" height="100%" stroke-width="0" fill="url(#:S1:)"></rect><svg x="-12" y="4"
                            class="overflow-visible">
                            <rect stroke-width="0" width="73" height="57" x="288" y="168"></rect>
                            <rect stroke-width="0" width="73" height="57" x="144" y="56"></rect>
                            <rect stroke-width="0" width="73" height="57" x="504" y="168"></rect>
                            <rect stroke-width="0" width="73" height="57" x="720" y="336"></rect>
                        </svg>
                    </svg>
                </div><svg viewBox="0 0 1113 440" aria-hidden="true"
                    class="absolute dark:hidden left-1/2 top-0 ml-[-19rem] w-[69.5625rem] fill-white blur-[26px]">
                    <path d="M.016 439.5s-9.5-300 434-300S882.516 20 882.516 20V0h230.004v439.5H.016Z"></path>
                </svg>
        
            </div>
            <svg viewBox="0 0 1113 440" aria-hidden="true"
                class="absolute dark:hidden left-1/2 top-0 ml-[-19rem] w-[69.5625rem] fill-white blur-[26px] ">
                <path d="M.016 439.5s-9.5-300 434-300S882.516 20 882.516 20V0h230.004v439.5H.016Z"></path>
            </svg>
            <div class="absolute inset-0 -z-10 mx-0 max-w-none overflow-hidden">
                <div
                    class="absolute left-1/2 top-0 ml-[-38rem] h-[25rem] w-[81.25rem]">
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-[#36b49f] to-[#DBFF75] opacity-40 [mask-image:radial-gradient(farthest-side_at_top,white,transparent)]">
                        <svg aria-hidden="true"
                            class="absolute inset-x-0 inset-y-[-50%] h-[200%] w-full skew-y-[-18deg] fill-black/40 stroke-black/50 mix-blend-overlay">
                            <defs>
                                <pattern id=":S1:" width="72" height="56" patternUnits="userSpaceOnUse" x="-12"
                                    y="4">
                                    <path d="M.5 56V.5H72" fill="none"></path>
                                </pattern>
                            </defs>
                            <rect width="100%" height="100%" stroke-width="0" fill="url(#:S1:)"></rect><svg x="-12" y="4"
                                class="overflow-visible">
                                <rect stroke-width="0" width="73" height="57" x="288" y="168"></rect>
                                <rect stroke-width="0" width="73" height="57" x="144" y="56"></rect>
                                <rect stroke-width="0" width="73" height="57" x="504" y="168"></rect>
                                <rect stroke-width="0" width="73" height="57" x="720" y="336"></rect>
                            </svg>
                        </svg></div><svg viewBox="0 0 1113 440" aria-hidden="true"
                        class="absolute dark:hidden left-1/2 top-0 ml-[-19rem] w-[69.5625rem] fill-white blur-[26px]">
                        <path d="M.016 439.5s-9.5-300 434-300S882.516 20 882.516 20V0h230.004v439.5H.016Z"></path>
                    </svg>
                </div>
            </div>
        </div>
        </div>
    @yield('main')
    </section>
    @include('layout.css.bottom.css')
    @include('layout.js.bottom.js')

    <script>
        function hidden_notif(id){
          document.querySelector('.'+id).classList.add('hidden');
        }
      </script>
      
</body>
</html>