@include('partials.header')
<?php $array = array('title' => 'Student System') ;?>
<x-nav :data="$array"/>


<header class="max-w-lg mx-auto pt-10">
   <a href="#">
      <h1 class="text-4xl font-bold text-white text-center">User List</h1>
   </a>
</header>
 
<section class="mt-10">
   <div class="overflow-x-auto relative">
      <table class="w-96 mx-auto text-sm text-left text-gray-500">
         <thead class="text-xs text gray-700 uppercase bg-gray-50">
            <tr>
               <th scope="col" class="py-3 px-6">
                  First Name
               </th>

               <th scope="col" class="py-3 px-6">
                  Email
               </th>

               <th scope="col" class="py-3 px-6">
                  Action
               </th>
            </tr>
         </thead>

         <tbody>
            @foreach ($users as $user)
            <tr class="bg-gray-800 border-b text-white">
               <td class="py-4 px-6">
                  {{ $user-> name }}
               </td>
               <td class="py-4 px-6">
                  {{ $user-> email }}
               <td class="py-4 px-6">
                  <a href="/user/{{$user->id}}" class="bg-sky-600 text-white px-4 py-1 rounded">view</a>
               </td>            
            </tr>
            @endforeach
         </tbody>
      </table>
      <div class="mx-auto max-w-lg pt-6 p-4">
         {{$users->links()}}
      </div>
   </div>
</section>

@include('partials.footer')

