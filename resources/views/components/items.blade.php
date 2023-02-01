<ul class="flex flex-col md:flex-row">
   @auth
      <li>
         <a href="/add/student" class="block py-2 pr-4 pl-3  hover:bg-gray-900">Add New</a>
      </li>
      <li>
      <form action="/logout" method="POST">
         @csrf
         <button class="block py-2 pr-4 pl-3  hover:bg-gray-900">Logout</a>
         </form>
      </li>    
 
   @else
          
      <li>
         <a href="/login" class="block py-2 pr-4 pl-3 hover:bg-gray-900">Sign In</a>
      </li>
      <li>
         <a href="/register" class="block py-2 pr-4 pl-3  hover:bg-gray-900">Sign Up</a>
      </li>
   @endauth
</ul>