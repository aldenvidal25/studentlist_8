@include('partials.header')
<?php $array = array('title' => 'Student System') ;?>
<x-nav :data="$array"/>
   <header class="max-w-lg mx-auto">
      <a href="#">
         <h1 class="mt-10 text-4xl font-bold text-white text-center"> Admin Login</h1>
      </a>
   </header>
   <main class="bg-white max-w-lg mx-auto p-8 my-10 rounded-lg shadow-2xl bg-opacity-80">
      <section>
         <h3 class="font-bold text-2xl text-center">Welcome to Student System</h3>
             <p class="text-gray-600 pt-2">Sign up a new account <a href="/register" class="text-sky-500 font-bold">here</a></p>           
      </section>

      <section class="mt-10">
         <form action="/login/process" method="POST" class="flex flex-col">
            @csrf
            @error('email')
                  <p class="text-red-500 text-xs mt-2">
                      {{$message}}
                  </p>
            @enderror
            <div class="mb-6 pt-3 rounded bg-gray-200">
               <label for="email" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Email</label>
               <input type="email" name="email" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3">
            </div>
            <div class="mb-6 pt-3 rounded bg-gray-200">
               <label for="password" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Password</label>
               <input type="password" name="password" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3">
            </div>
            <button type="submit" class="bg-sky-600 hover:bg-sky-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transitionduration-200" type="submit">Login</button>
         </form>
      </section>
   </main>
   
@include('partials.footer')