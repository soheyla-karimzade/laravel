<!--suppress ALL -->



    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <input type='text' x-model="search" class="my-3 mx-3 inline-block"><svg class="h-8 w-8 text-gray-500 inline-block"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <circle cx="11" cy="11" r="8" />  <line x1="21" y1="21" x2="16.65" y2="16.65" /></svg>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 table table-hover">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Post id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Post name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Post body
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Action
                    </th>

                </tr>
            </thead>
                 <tbody>
                        <template x-for="post in SearchItem" :key="post.id">
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600" x-html="`  <td class='px-6 py-4'> ${post.id}</td>
            <td class='px-6 py-4'> ${post.name} - ${post.user_id}</td>
             <td class='px-6 py-4'> ${post.body}</td>
            <td class=''>

           <template x-if='post.can'>
                            <button @click='editPost(post)' class='text-white'>
            <svg class='h-6 w-6 text-gray-500 mt-5 ' <svg  width='24'  height='24'  viewBox='0 0 24 24'  xmlns='http://www.w3.org/2000/svg'  fill='none'  stroke='currentColor'  stroke-width='2'  stroke-linecap='round'  stroke-linejoin='round'>  <path d='M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z' /></svg>
                            </button>
                            </template>
            <template x-if='post.can'> <button @click='deletePost(post.id)'  class='text-white'>
                <svg class='h-6 w-6 text-gray-500 mt-5  '  viewBox='0 0 24 24'  fill='none'  stroke='currentColor'  stroke-width='2'  stroke-linecap='round'  stroke-linejoin='round'>  <rect x='3' y='3' width='18' height='18' rx='2' ry='2' />  <line x1='9' y1='9' x2='15' y2='15' />  <line x1='15' y1='9' x2='9' y2='15' /></svg>
             </button>       </template></td>`
    "> </tr>
        </template>
                 </tbody>
            </table>

        <button @click='getPosts' :disabled='nextUrl===null ' class='button text-bold my-5 mx-5 border-b-2 py-2 px-2 bg-blue-500 hover:bg-blue-700'>read more</button>

     </div>





