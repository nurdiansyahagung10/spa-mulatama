
@if(session('success'))
<div class="pb-20 whitespace-normal  toast p-[0.6rem] z-40 toast-end">
  <div class="border text-left text-black alert gap-2 justify-between flex border-stone-200 dark:bg-transparent dark:text-white bg-white/20 backdrop-blur-lg notif">
    <span class="border-r pr-3">{{session('success')}}</span>
    <button class="px-3" onclick="hidden_notif('notif')">X</button>
  </div>
</div>

@endif