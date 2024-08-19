@if ($errors->any())
<div class=" whitespace-normal   toast p-[0.6rem] z-40 toast-end">
        @foreach ($errors->all() as $error)
        <div class="border text-left text-black alert gap-2 justify-between flex border-stone-200 dark:bg-transparent dark:text-white bg-white/20 backdrop-blur-lg notif{{$loop->iteration}}">
          <span class="border-r pr-3">{{$error}}</span>
          <button class="px-3" onclick="hidden_notif('notif{{$loop->iteration}}')">X</button>
        </div>
        @endforeach
      </div>
@endif
