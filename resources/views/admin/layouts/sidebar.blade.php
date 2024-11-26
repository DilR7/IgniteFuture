<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-4 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
       <ul class="space-y-2 font-medium">
            <li class="mb-4">
                <a href="https://flowbite.com" class="flex ms-2 md:me-24">
                    <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 me-3" alt="FlowBite Logo" />
                    <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Ignite Future</span>
                </a>
            </li>
          <li>
             <a href="{{ route('dashboard') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="mr-2 w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                    <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M8 8v1h4V8m4 7H4a1 1 0 0 1-1-1V5h14v9a1 1 0 0 1-1 1ZM2 1h16a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1Z"/>
                </svg>
                <span class="ms-3">Dashboard</span>
             </a>
          </li>
          <li>
             <a href="{{ route('adminmodule') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="mr-2 w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path fill="currentColor" d="M8 1V0v1Zm4 0V0v1Zm2 4v1h1V5h-1ZM6 5H5v1h1V5Zm2-3h4V0H8v2Zm4 0a1 1 0 0 1 .707.293L14.121.879A3 3 0 0 0 12 0v2Zm.707.293A1 1 0 0 1 13 3h2a3 3 0 0 0-.879-2.121l-1.414 1.414ZM13 3v2h2V3h-2Zm1 1H6v2h8V4ZM7 5V3H5v2h2Zm0-2a1 1 0 0 1 .293-.707L5.879.879A3 3 0 0 0 5 3h2Zm.293-.707A1 1 0 0 1 8 2V0a3 3 0 0 0-2.121.879l1.414 1.414ZM2 6h16V4H2v2Zm16 0h2a2 2 0 0 0-2-2v2Zm0 0v12h2V6h-2Zm0 12v2a2 2 0 0 0 2-2h-2Zm0 0H2v2h16v-2ZM2 18H0a2 2 0 0 0 2 2v-2Zm0 0V6H0v12h2ZM2 6V4a2 2 0 0 0-2 2h2Zm16.293 3.293C16.557 11.029 13.366 12 10 12c-3.366 0-6.557-.97-8.293-2.707L.293 10.707C2.557 12.971 6.366 14 10 14c3.634 0 7.444-1.03 9.707-3.293l-1.414-1.414ZM10 9v2a2 2 0 0 0 2-2h-2Zm0 0H8a2 2 0 0 0 2 2V9Zm0 0V7a2 2 0 0 0-2 2h2Zm0 0h2a2 2 0 0 0-2-2v2Z"/>
                </svg>
                <span class="ms-3">Module</span>
             </a>
          </li>
          <li>
             <a href="{{ route('adminbook') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="mr-2 w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 17V2a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H3a2 2 0 0 0-2 2Zm0 0a2 2 0 0 0 2 2h12M5 15V1m8 18v-4"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Books</span>
             </a>
          </li>
          <li>
             <a href="{{ route('admincontent') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="mr-2 w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1v14m8.336-.479-6.5-5.774a1 1 0 0 1 0-1.494l6.5-5.774A1 1 0 0 1 11 2.227v11.546a1 1 0 0 1-1.664.748Z"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Contents</span>
             </a>
          </li>
          <li>
             <a href="{{ route('adminquiz') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="mr-2 w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 22 21">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M7.24 7.194a24.16 24.16 0 0 1 3.72-3.062m0 0c3.443-2.277 6.732-2.969 8.24-1.46 2.054 2.053.03 7.407-4.522 11.959-4.552 4.551-9.906 6.576-11.96 4.522C1.223 17.658 1.89 14.412 4.121 11m6.838-6.868c-3.443-2.277-6.732-2.969-8.24-1.46-2.054 2.053-.03 7.407 4.522 11.959m3.718-10.499a24.16 24.16 0 0 1 3.719 3.062M17.798 11c2.23 3.412 2.898 6.658 1.402 8.153-1.502 1.503-4.771.822-8.2-1.433m1-6.808a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Quiz</span>
             </a>
          </li>
          <li>
             <a href="{{ route('manageuser') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="mr-2 w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4H1m3 4H1m3 4H1m3 4H1m6.071.286a3.429 3.429 0 1 1 6.858 0M4 1h12a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1Zm9 6.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Users</span>
             </a>
          </li>
          <li>
             <a href="{{ route('home') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="mr-2 flex-shrink-0 w-5 h-5 text-black transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Logout</span>
             </a>
            </li>
       </ul>
    </div>
 </aside>