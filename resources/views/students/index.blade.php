@include('partials.header')
<?php $array = array('title' => 'Student System') ;?>
<x-nav :data="$array"/>


<header class="max-w-lg mx-auto mt-5">
   <a href="#">
      <h1 class="text-4xl font-bold text-white text-center">Student List</h1>
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
                  Last Name
               </th>
               <th scope="col" class="py-3 px-6">
                  Email
               </th>
               <th scope="col" class="py-3 px-6">
                  Age
               </th>
               <th scope="col" class="py-3 px-6">
                  Action
               </th>
               <th scope="col" class="py-3 px-6">
                  Delete
               </th>
            </tr>
         </thead>

         <tbody>
            @foreach ($students as $student)
            <tr class="bg-gray-800 border-b text-white bg-opacity-80 font-semibold">
               <td class="py-4 px-6">
                  {{ $student-> first_name }}
               </td>
               <td class="py-4 px-6">
                  {{ $student-> last_name }}
               </td>
               <td class="py-4 px-6">
                  {{ $student-> email }}
               </td>
               <td class="py-4 px-6">
                  {{ $student-> age }}
               </td>   
               <td class="py-4 px-6">
                  <a href="/student/{{$student->id}}" class="bg-sky-600 hover:bg-sky-900 text-white px-4 py-1 rounded">view</a>
               </td>   
               <td class="py-4 px-6">
                  <form action="" method="POST">
            @method('index_delete')
            @csrf
                  <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-1 rounded" type="submit">Delete</button>
               </form>
               </td>   
            </tr>
            @endforeach
         </tbody>
      </table>
      <div class="mx-auto max-w-lg pt-6 p-4">
         {{$students->links()}}
      </div>
   </div>
</section>

@include('partials.footer')

